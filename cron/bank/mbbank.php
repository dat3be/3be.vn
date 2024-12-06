<?php
require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';

$nd = $chinhapi['cuphap'];
$token = $chinhapi['token_mbbank'];
$result = curl_get("https://api.sieuthicode.net/historyapimbbank/$token");

$result = json_decode($result, true);
if ($result['status'] == 'success') {
    foreach ($result['TranList'] as $mb) {
        $tranId = explode('\\', $mb['refNo'])[0];
        $amount = (float)$mb['creditAmount']; // Chuyển đổi sang kiểu số
        $comment = $mb['description'];
        $partnerId = $mb['accountNo'];
        $partnerName = $mb['beneficiaryAccount'];
        $idnap = parse_order_id($comment, $nd);
        $now = time();

        // Kiểm tra người dùng
        $dvr_nap = $ketnoi->query("SELECT * FROM `users` WHERE `id` = '$idnap'")->fetch_array();
        if ($dvr_nap) {
            // Kiểm tra giao dịch đã tồn tại chưa
            $total_trans = mysqli_fetch_assoc(mysqli_query($ketnoi, "SELECT COUNT(*) FROM `history_nap_bank` WHERE `trans_id` = '$tranId'"))['COUNT(*)'];
            if ($total_trans == 0 && $amount > 0) {
                $username = $dvr_nap['username']; // Lấy tên người dùng từ kết quả truy vấn

                // Chèn giao dịch mới vào lịch sử
                $insertSv2 = $ketnoi->query("INSERT INTO `history_nap_bank` SET 
                    `trans_id` = '$tranId',
                    `username` = '$username',
                    `type` = 'Mbbank',
                    `stk` = '$partnerId',
                    `ctk` = '$partnerName',
                    `thucnhan` = '$amount',
                    `status` = 'hoantat',
                    `time` = '$now'");

                if ($insertSv2) {
                    // Cập nhật số dư người dùng
                    $create = mysqli_query($ketnoi, "UPDATE `users` SET `money` = `money` + '$amount', `tong_nap` = `tong_nap` + '$amount' WHERE `username` = '$username'");
                    if ($create) {
                        echo '[<b style="color:green">-</b>] Xử lý thành công 1 hóa đơn: ' . $amount . ' VND.' . PHP_EOL;
                    }
                }
            }
        }
    }
}
?>
