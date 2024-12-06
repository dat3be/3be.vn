<?php
require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';

$nd = $chinhapi['cuphap'];
$token = $chinhapi['token_mbbank'];
$api_url = "https://api.dichvucodes.net/api/historyviettel/$token";
$result = curl_get($api_url);

$result = json_decode($result, true);

if (isset($result['status']['code']) && $result['status']['code'] == '00' && isset($result['data']['content'])) {
    foreach ($result['data']['content'] as $mb) {
        $tranId = $mb['clientId'];
        $amount = $mb['amount'];
        $comment = $mb['msgContent'];
        $partnerId = $mb['msisdn'];
        $idnap = parse_order_id($comment, $nd);
        $now = time();

        // Kiểm tra người dùng với idnap
        $dvr_nap = $ketnoi->query("SELECT * FROM `users` WHERE `id` = '$idnap'")->fetch_array();
        if ($dvr_nap) {
            $total_trans = mysqli_fetch_assoc(mysqli_query($ketnoi, "SELECT COUNT(*) FROM `history_nap_bank` WHERE `trans_id` = '$tranId'"))['COUNT(*)'];

            if ($total_trans == 0 && $amount > 0) {
                $username = $dvr_nap['username'];

                // Chèn giao dịch vào bảng history_nap_bank
                $insertSv2 = $ketnoi->query("INSERT INTO `history_nap_bank` SET 
                    `trans_id` = '$tranId',
                    `username` = '$username',
                    `type` = 'Viettel',
                    `stk` = '$partnerId',
                    `ctk` = '$partnerId',
                    `thucnhan` = '$amount',
                    `status` = 'hoantat',
                    `time` = '$now'");

                if ($insertSv2) {
                    // Cập nhật số tiền cho người dùng
                    $create = mysqli_query($ketnoi, "UPDATE `users` SET `money`=`money` + '$amount', `tong_nap` = `tong_nap` + '$amount' WHERE `username`='$username'");
                    if ($create) {
                        echo '[<b style="color:green">-</b>] Xử lý thành công 1 hoá đơn.' . PHP_EOL . "\n";
                    }
                }
            }
        }
    }
} else {
    echo "Không có đơn gì hoặc token không tồn tại.";
}
?>
