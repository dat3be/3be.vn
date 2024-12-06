<?php 
require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';
$response = array();
if (!isset($username) || empty($username)) {
    $response = array('success' => false, 'message' => 'Đăng nhập để thực hiện tính năng này');
} else {
    $pwm1 =  strip_tags($_POST['pwm1']);
    $pwm2 =  strip_tags($_POST['pwm2']);
    if (empty($pwm1) || empty($pwm2)) { 
        $response = array('success' => false, 'message' => 'Vui lòng nhập đầy đủ thông tin');
    } elseif(strlen($pwm1)<6 ||strlen($pwm2)<6) {
        $response = array('success' => false, 'message' => 'Độ dài của mật khẩu phải hơn 6 ký tự');
    } elseif ($pwm1 != $pwm2) { 
        $response = array('success' => false, 'message' => 'Mật khẩu mới không khớp');
    } else {
       $newpass = sha1(md5($pwm1));
        $NTC = $ketnoi->query("UPDATE `users` SET 
        `password` = '$newpass'
        WHERE 
        `username` = '$username'");
        if ($NTC) {
            $response = array('success' => true, 'message' => 'Mật khẩu đã được cập nhật thành công');
        } else {
            $response = array('success' => false, 'message' => 'Có lỗi xảy ra khi cập nhật mật khẩu');
        }
    }
}

echo json_encode($response);
?>
