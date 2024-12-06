<?php
require $_SERVER['DOCUMENT_ROOT'].'/hethong/helpers.php';

$id_code = antixss($_POST['id_code']);
$domain = antixss($_POST['domain']);

// Ensure $username is defined
if (empty($username)) {
    echo json_encode(array('success' => false, 'message' => 'Đăng nhập để thực hiện!'));
    exit;
}

// Check if license exists
$check_code = $ketnoi->query("SELECT * FROM `list-license` WHERE `id` = '$id_code'");
if ($check_code->num_rows === 0) {
    echo json_encode(array('success' => false, 'message' => 'Bản quyền không tồn tại'));
    exit;
}

$code = $check_code->fetch_array();
if (empty($domain)) {
    echo json_encode(array('success' => false, 'message' => 'Vui lòng nhập đầy đủ thông tin'));
    exit;
}

// Get discount data
$tinhtien = $code['money'] - ($code['money'] * $user['chiet_khau'] / 100);
if ($user['money'] < $tinhtien) {
    echo json_encode(array('success' => false, 'message' => 'Số dư trong tài khoản không đủ, vui lòng nạp thêm'));
    exit;
}
// Processing the purchase
function generateRandomString($length = 20) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// Processing the purchase
$now = time();
$key = generateRandomString(20); // Generates a random string of length 15
$sql = $ketnoi->query("INSERT INTO `license_key` SET 
    `username` = '$username',
    `mien` = '$domain',
    `status` = 'hoatdong',
    `license` = '$key',
    `date` = '".$now."' ");
sendTele($username." Mua Thành Công License: ".$code['name']." | Giá: ".$code['money']."đ");

if ($sql) {
    $newmoney = $user['money'] - $tinhtien;
    $check_money = $ketnoi->query("UPDATE `users` SET `money` = '$newmoney' WHERE `username` = '".$username."'");

    if ($check_money) {
        $ketnoi->query("INSERT INTO `lich_su_hoat_dong` SET 
            `username` = '$username',
            `hoatdong` = 'Mua license',
            `gia` = '".$tinhtien."',
            `time` = '".$now."' ");
        echo json_encode(array('success' => true));
        exit;
    }
}

echo json_encode(array('success' => false, 'message' => 'Có lỗi xảy ra trong quá trình xử lý'));
?>
