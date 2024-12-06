<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';?>
<?php
// Lấy giá trị của username và password được post từ form đăng nhập
$password  = antixss($_POST['password']);
$otpcode  = antixss($_POST['otpcode']);
$check_otp = $ketnoi->query("SELECT * FROM `users` WHERE `otpcode` = '$otpcode' ");
if ($otpcode == '' || $password == '') {
  $response = array('success' => false, 'message' => 'Vui lòng nhập đầy đủ thông tin');
}else if ($check_otp->num_rows != 1) {
  $response = array('success' => false, 'message' => 'OTP Code không đúng'.$otpcode);
}else {
  $new_pass=sha1(md5($password));    
  $ketnoi->query("UPDATE users SET `password` = '$new_pass' WHERE `otpcode` = '".$otpcode."' ");
  $ketnoi->query("UPDATE users SET `otpcode` = '' WHERE `otpcode` = '".$otpcode."' ");
    $response = array('success' => true);
}

// Trả về kết quả dưới dạng JSON
echo json_encode($response);
?>