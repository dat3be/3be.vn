<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';?>
<?php
$username = strip_tags($_POST['username']);
$idhost = strip_tags($_POST['idhost']);
$host = $ketnoi->query("SELECT * FROM `lich_su_mua_host` WHERE `id` = '$idhost' ")->fetch_array();
$user = $ketnoi->query("SELECT * FROM `users` WHERE `username` = '$username' ")->fetch_array();
if($username==""){
    $response = array('success' => false, 'message' => 'Đăng nhập để thực hiện tính năng này');
}elseif ($username != $host['username']) {
   $response = array('success' => false, 'message' => 'Bạn không thể thao tác host này');
}elseif($host['status']!="hoatdong"){
   $response = array('success' => false, 'message' => 'Hãy đợi tiến trình trước đó chạy xong!');
}else{    
$check = $ketnoi->query("UPDATE `lich_su_mua_host` SET `status` = 'xoa' WHERE `id` = '".$idhost."' ");
if (isset($check)) {
    $response = array('success' => true);
} else {
    $response = array('success' => false, 'message' => 'Có lỗi xảy ra, hãy liên hệ admin');
}
}
echo json_encode($response);
?>