<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';?>
<?php
// Lấy giá trị của username và password được post từ form đăng nhập
$email     = antixss($_POST['email']);
$username  = antixss($_POST['username']);
$password  = antixss($_POST['password']);
$repassword  = antixss($_POST['repassword']);
$check_user = $ketnoi->query("SELECT * FROM `users` WHERE `username` = '$username' ");
$check_mail   = $ketnoi->query("SELECT * FROM `users` WHERE `email` = '$email' ");
// Kiểm tra thông tin đăng nhập
if ($username == '' || $password == ''|| $repassword == '' || $email == '') {
  // Thông tin đăng nhập đúng, trả về kết quả thành công
  $response = array('success' => false, 'message' => 'Vui lòng nhập đầy đủ thông tin');
}else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
  // Thông tin đăng nhập sai, trả về kết quả thất bại
  $response = array('success' => false, 'message' => 'Tên đăng nhập không bao gồm các kí tự đặc biệt và có dấu');
}else if ($check_user->num_rows != 0) {
  // Thông tin đăng nhập sai, trả về kết quả thất bại
  $response = array('success' => false, 'message' => 'Tên đăng nhập đã được sử dụng, vui lòng chọn tên khác');
}else if ($check_mail->num_rows != 0) {
  // Thông tin đăng nhập sai, trả về kết quả thất bại
  $response = array('success' => false, 'message' => 'Email đã được sử dụng, vui lòng chọn tên khác');
} elseif ($password != $repassword) { 
        $response = array('success' => false, 'message' => 'Nhập lại mật khẩu không khớp');
} else {
  $api = random('0123456789qwertyuiopasdfghjlkzxcvbnmQEWRWROIWCJHSCNJKFBJWQ', 25);
  $new_pass=sha1(md5($password));    
  $toz = $ketnoi->query("INSERT INTO `users` SET 
        `username` = '$username',
        `api_key` = '$api',
        `password` = '$new_pass',
        `email` = '$email',
        `chiet_khau` = '0',
        `loai` = 'Account',
        `level` = '0',
        `tong_nap` = '0',
        `money` = '0',
        `bannd` = '0',
        `ip` = '".$ip_address."',
        `otpcode` = '',
        `session` = '',
        `time` = '".$time."' ");
        sendTele("Tài Khoản: ".$username." Đăng Kí Thành Công Trên IP: ".$ip_address.".");
        $guitoi = $email;
        $subject = 'Chào Mừng Bạn Đến Với DichVuMight.Com';
        $bcc = 'Chào Mừng Bạn Đến Với DichVuMight.Com';
        $hoten = 'DichVuMight.Com';

        $noi_dung = '
        <html>
        <body>
            <table cellspacing="0" cellpadding="0" width="400" style="border: 1px solid #ccc; border-radius: 30px; margin: 0 auto;">
                <tr>
                    <td style="text-align: center; font-family: Arial, sans-serif; padding: 20px;">
                        <h1 style="color: #FF5733;">Chào Mừng Bạn Đến Với Dịch Vụ Của Chúng Tôi</h1>
                        <p>Xin chào ' . $username . ',</p>
                        <p>Chúng tôi xin chân thành cảm ơn bạn đã lựa chọn DichVuMight.Com làm đối tác trong hành trình kinh doanh của bạn.</p>
                        <p>Hãy để chúng tôi đồng hành cùng bạn trong việc phát triển và tạo nên những thành công đáng nhớ.</p>
                        <p>Chúng tôi xin trân trọng mời bạn sử dụng các dịch vụ của chúng tôi:</p>
                        <ul>
                            <li>Mời Bạn Trãi Nghiệm Dịch Vụ Hosting - Mã Nguồn- Domain </li>
                            <li>Bạn sẽ nhận được hỗ trợ 24/7 cho dịch vụ tên miền.</li>
                            <li>Chúng tôi luôn sẵn sàng hỗ trợ bạn mọi lúc mọi nơi!</li>
                        </ul>
                        <p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi và chúng tôi rất vui được phục vụ bạn!</p>
                        <p>Trân trọng,</p>
                        <p>' . $hoten . '</p>
                    </td>
                </tr>
            </table>
        </body>
        </html>
        ';

        sendCSM($guitoi, $hoten, $subject, $noi_dung, $bcc);

        if($toz){
    $now_ss = random('0123456789qwertyuiopasdfghjlkzxcvbnmQEWRWROIWCJHSCNJKFBJWQ', 32);
    $ketnoi->query("UPDATE `users` SET `session` = '$now_ss' WHERE `username` = '".$username."' ");
    $_SESSION['session'] = $now_ss;
    $response = array('success' => true);
        }
 
}

// Trả về kết quả dưới dạng JSON
echo json_encode($response);
?>