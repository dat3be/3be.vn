<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';?>
<?php
$now = time(); 
$idhost = strip_tags($_POST['idhost']);
$giahan = strip_tags($_POST['giahan']);
$host = $ketnoi->query("SELECT * FROM `lich_su_mua_host` WHERE `id` = '$idhost' ")->fetch_array();
$tongtien = $host['gia_host']*$giahan;
$date = date('h:i d-m-Y', $now);
$days_to_add =30*$giahan;
$het = $host['ngay_het'];
$het += $days_to_add * 24 * 60 * 60;
if($username==""){
$response = array('success' => false, 'message' => 'Đăng nhập để thực hiện tính năng này');
}elseif ($username == '' || $giahan=='') {
$response = array('success' => false, 'message' => 'Vui lòng nhập đầy đủ thông tin');
}elseif($username!=$host['username']) {
    $response = array('success' => false, 'message' => 'Bạn không có quyền thực hiện yêu cầu này!');
}elseif($user['money']<$tongtien) {
    $response = array('success' => false, 'message' => 'Số dư trong tài khoản không đủ, vui lòng nạp thêm');
}else{
    $checkhost = $ketnoi->query("UPDATE `lich_su_mua_host` SET `ngay_het` = '$het' WHERE `id` = '".$idhost."' ");
        if(isset($checkhost)){
            $newmoney = $user['money']-$tongtien;
            $check_money = $ketnoi->query("UPDATE `users` SET `money` = '$newmoney' WHERE `username` = '".$username."' ");
            if(isset($check_money)&&$check_money>=0){
            $response = array('success' => true);
            }else{
                $response = array('success' => false, 'message' => 'Vui lòng nhập đầy đủ thông tin');
            }
        }
}
echo json_encode($response);
?>