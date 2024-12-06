<?php
require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';

$id_code = antixss($_POST['id_code']);
$giftcode = antixss($_POST['giftcode']);

// Ensure $username is defined (set it as per your logic)
if (empty($username)) {
    echo json_encode(array('success' => false, 'message' => 'Đăng nhập để thực hiện!'));
    exit;
}

$check_code = $ketnoi->query("SELECT * FROM `khocode` WHERE `id` = '$id_code'");
if ($check_code->num_rows === 0) {
    echo json_encode(array('success' => false, 'message' => 'Code không tồn tại'));
    exit;
}

$user = $ketnoi->query("SELECT * FROM `users` WHERE `username` = '$username'")->fetch_array();
if (!$user) {
    echo json_encode(array('success' => false, 'message' => 'Người dùng không tồn tại'));
    exit;
}

$code = $check_code->fetch_array();
if (!$code) {
    echo json_encode(array('success' => false, 'message' => 'Mã nguồn không hợp lệ'));
    exit;
}

$discount_data = $ketnoi->query("SELECT * FROM `gift_code` WHERE `type` = 'code'")->fetch_array();
$tinhtien = $code['gia'] - $code['gia'] * $user['chiet_khau'] / 100;

// Validate gift code
if ($giftcode != "" && giftcode($giftcode, 'code') == 0 && $code['gia'] != 0) {
    echo json_encode(array('success' => false, 'message' => 'Mã giảm giá không hợp lệ'));
    exit;
}

if ($code['trangthai'] == 'ON') {
    $discounted_price = $code['gia'] - $code['giam_gia'] ;
   
} else {
    $discounted_price = $tinhtien * (1 - (giftcode($giftcode, 'code') / 100));
}
if ($code['gia'] <= 0 && $giftcode != "") {
    echo json_encode(array('success' => false, 'message' => 'Mã nguồn có giá trị 0đ, không áp dụng mã giảm giá'));
    exit;
}

if ($user['money'] < $discounted_price) {
    echo json_encode(array('success' => false, 'message' => 'Số dư trong tài khoản không đủ, vui lòng nạp thêm'));
    exit;
}

if ($discount_data['soluong'] <= $discount_data['dadung'] && $giftcode != "") {
    echo json_encode(array('success' => false, 'message' => 'Mã bạn nhập đã đến giới hạn!'));
    exit;
}

// Processing the purchase
$now = time();
$magd = random('ABCDEFGHIJKLMNOPQRSTUVWXYZ', 3) . rand(1000000000, 9999999999);
$sql = $ketnoi->query("INSERT INTO `lich_su_mua_code` SET 
    `trans_id` = '$magd',
    `username` = '$username',
    `loaicode` = '".$code['id']."',
    `status` = 'thanhcong',
    `time` = '".$now."'");

sendTele($username." Mua Thành Công Mã Nguồn: ".$code['title']." | Giá: ".$code['gia']."đ");

$guitoi = $user['email'];
$subject = 'Bạn đã mua mã nguồn '.$code['title'].' thành công';
$bcc = 'Mua Code Thành Công';
$hoten ='SERVER';
$noi_dung = '<p>Cảm ơn quý khách <b>'.$user['username'].'</b>,</p>
<p>Bạn đã mua mã nguồn <b>'.$code['title'].'</b> thành công.</p>
<p>Bạn có thể tải code <a href="https://'.$_SERVER['SERVER_NAME'].'/history-ma-nguon" target="_blank">tại đây</a>.</p>
<p>Cảm ơn quý khách đã sử dụng dịch vụ của chúng tôi!</p>
<p>Website: <b><a href="https://'.$_SERVER['SERVER_NAME'].'/" target="_blank">'.$_SERVER['SERVER_NAME'].'</a></b></p>';

$api = sendCSM($guitoi, $hoten, $subject, $noi_dung, $bcc);

if ($sql) {
    if ($giftcode != "" && giftcode($giftcode, 'code') != 0) {
        update_code($giftcode);
    }
    $newmoney = $user['money'] - $discounted_price;
    $ketnoi->query("UPDATE `khocode` SET `buy` =  `buy` + 1 WHERE `id` = '".$code['id']."'");
    $check_money = $ketnoi->query("UPDATE `users` SET `money` = '$newmoney' WHERE `username` = '".$username."'");

    if ($check_money) {
        $ketnoi->query("INSERT INTO `lich_su_hoat_dong` SET 
            `username` = '$username',
            `hoatdong` = 'Mua mã nguồn',
            `gia` = '".$discounted_price."',
            `time` = '".$now."' ");
        echo json_encode(array('success' => true));
        exit;
    }
}

echo json_encode(array('success' => false, 'message' => 'Có lỗi xảy ra trong quá trình xử lý'));
?>
