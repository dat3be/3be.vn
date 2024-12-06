<?php
require $_SERVER['DOCUMENT_ROOT'] . '/hethong/config.php';
require $_SERVER['DOCUMENT_ROOT'] . '/hethong/Google/vendor/autoload.php';

// Google Client Configuration
$client_id = "912900974102-t5tfkvir2g9ig3kthdiianjnhcf9k0k7.apps.googleusercontent.com";
$client_secret = "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";
$redirect_uri = "https://3be.vn/auth/login-google";

$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");

$service = new Google_Service_Oauth2($client);

// Logout Handling
if (isset($_GET['logout'])) {
    unset($_SESSION['access_token']);
    $client->revokeToken();
    session_destroy();
    header("Location: /auth/login-google");
    exit();
}

// Login with Google
if (isset($_GET['code'])) {
    $code = $_GET['code'];

    try {
        $token = $client->fetchAccessTokenWithAuthCode($code);

        if (!isset($token['error'])) {
            $client->setAccessToken($token['access_token']);
            $_SESSION['access_token'] = $token['access_token'];

            // Fetch Google User Info
            $userInfo = $service->userinfo->get();
            $gg_id = $userInfo->id;
            $gg_email = $userInfo->email;

            // Hash the Google ID for the password
            $hashed_password = password_hash($gg_id, PASSWORD_BCRYPT);

            // Check if the user exists by Google ID and email
            $stmt = $ketnoi->prepare("SELECT * FROM `users` WHERE `username` = ? AND `email` = ?");
            $stmt->bind_param("ss", $gg_id, $gg_email);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            // If user exists, update session and log in
            if ($user) {
                $now_ss = bin2hex(random_bytes(16)); // Generate a secure session token
                $stmt = $ketnoi->prepare("UPDATE `users` SET `session` = ? WHERE `username` = ?");
                $stmt->bind_param("ss", $now_ss, $gg_id);
                $stmt->execute();
                $_SESSION['session'] = $now_ss;
                header("Location: /home");
                exit();
            }

            // Check if the email exists but is not a Google account
            $stmt = $ketnoi->prepare("SELECT * FROM `users` WHERE `email` = ? AND `loai` != 'Google'");
            $stmt->bind_param("s", $gg_email);
            $stmt->execute();
            $email_exists = $stmt->get_result()->num_rows > 0;
            $stmt->close();

            if ($email_exists) {
                echo "Email của bạn đã được đăng ký trên hệ thống của chúng tôi bằng phương pháp khác.";
                exit();
            }

            // If email doesn't exist, create a new user
            $now_ss = bin2hex(random_bytes(16)); // Generate a secure session token
            $api_key = bin2hex(random_bytes(12)); // Generate an API key

            $stmt = $ketnoi->prepare("
                INSERT INTO `users` 
                (`username`, `password`, `loai`, `email`, `api_key`, `chiet_khau`, `level`, `tong_nap`, `money`, `bannd`, `ip`, `otpcode`, `session`, `time`)
                VALUES (?, ?, 'Google', ?, ?, '0', '0', '0', '0', '0', ?, '', ?, ?)
            ");
            $stmt->bind_param("sssssss", $gg_id, $hashed_password, $gg_email, $api_key, $ip_address, $now_ss, $time);
            $stmt->execute();

            $_SESSION['session'] = $now_ss;
            header("Location: /home");
            exit();
        } else {
            echo "Error fetching access token: " . $token['error'];
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    // Redirect to Google Login Page
    $authUrl = $client->createAuthUrl();
    header("Location: $authUrl");
    exit();
}
?>
