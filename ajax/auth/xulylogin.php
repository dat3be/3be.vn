<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';

$username = antixss($_POST['username']);
$password = antixss($_POST['password']);

if ($_POST['username'] == "" || $_POST['password'] == "") {
  $response = array('success' => false, 'message' => 'Vui lòng nhập đầy đủ thông tin');
} elseif(filter_var($username, FILTER_VALIDATE_EMAIL)) {
  $check = $ketnoi->query("SELECT * FROM `users` WHERE `email` = '$username' ")->fetch_array();
} else {
  $check = $ketnoi->query("SELECT * FROM `users` WHERE `username` = '$username' ")->fetch_array();
}
if(empty($check)) {
    $response = array('success' => false, 'message' => 'Thông tin đăng nhập không chính xác');
} elseif($check['password'] != sha1(md5($password))) {
    $response = array('success' => false, 'message' => 'Mật khẩu không chính xác');
} else {
  $now_ss = random('0123456789qwertyuiopasdfghjlkzxcvbnmQEWRWROIWCJHSCNJKFBJWQ', 32);
  $ketnoi->query("UPDATE `users` SET `session` = '$now_ss' WHERE `username` = '".$check['username']."' ");
    $_SESSION['session'] = $now_ss;
    $response = array('success' => true);
}
echo json_encode($response);

?>