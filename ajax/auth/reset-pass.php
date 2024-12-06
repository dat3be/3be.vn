<?php
require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';

$username = antixss($_POST['username']);

if ($_POST['username'] == "") {
  $response = array('success' => false, 'message' => 'Vui lòng nhập đầy đủ thông tin');
} elseif (filter_var($username, FILTER_VALIDATE_EMAIL)) {
  $check = $ketnoi->query("SELECT * FROM `users` WHERE `email` = '$username' ")->fetch_array();
} else {
  $check = $ketnoi->query("SELECT * FROM `users` WHERE `username` = '$username' ")->fetch_array();
}

if (isset($check)) {
  $otpcode = random('0123456789qwertyuiopasdfghjlkzxcvbnmQEWRWROIWCJHSCNJKFBJWQ', 32);
  $guitoi = $check['email'];   
  $subject = 'Bạn đã yêu cầu đặt lại mật khẩu cho tài khoản '.$check['username'].'.';
  $bcc = 'Đặt Lại Mật Khẩu';
  $hoten ='SERVER';
  $noi_dung = '<p>Kính chào quý khách hàng <b>'.$check['username'].'</b>,</p>
  <p>Chúng tôi nhận được yêu cầu đặt lại mật khẩu của bạn, nếu bạn là người thực hiện yêu cầu này, hãy bấm vào liên kết bên dưới để đặt lại mật khẩu, nếu không ĐỪNG NHẤP VÀO, KHÔNG CHIA SẺ cho bất cứ ai.</p>
  <p>Liên kết đặt lại mật khẩu <a href="https://'.$_SERVER['SERVER_NAME'].'/resetpass?id='.$otpcode.'" target="_blank">tại đây</a>.</p>
  <p>Cảm ơn quý khách đã sử dụng dịch vụ của chúng tôi. Cảm ơn!</p>
  <p>Website: <b><a href="https://'.$_SERVER['SERVER_NAME'].'/" target="_blank">'.$_SERVER['SERVER_NAME'].'</a></b></p>';
  $toz = sendCSM($guitoi, $hoten, $subject, $noi_dung, $bcc);
  $ketnoi->query("UPDATE users SET `otpcode` = '$otpcode' WHERE `username` = '".$check['username']."' ");
  $response = array('success' => true);
} else {
    $response = array('success' => false, 'message' => 'Lỗi ròi');
}
echo json_encode($response);
?>
