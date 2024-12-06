<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';?>
<?php
$token = $chinhapi['token_thesieure'];
$nd = $chinhapi['cuphap'];
$result = curl_get("https://api.sieuthicode.net/historyapithesieure/$token");

$result = json_decode($result, true);
if ($result['status'] == 'success') {
foreach ($result['tranList'] as $tsr) {
    $tranId = explode('\\', $tsr['transId'])[0];
    $amount = $tsr['amount'];
    $comment = $tsr['description'];
    $partnerId = $tsr['username'];
    $partnerName = $tsr['username'];
    $idnap = parse_order_id($comment, $nd);
    $now = time();
    $toz_checkidnap =  $ketnoi->query("SELECT * FROM `users` WHERE `id` = '$idnap' ")->fetch_array();
    if ($toz_checkidnap) {
       $total_trans = mysqli_fetch_assoc(mysqli_query($ketnoi, "SELECT COUNT(*) FROM `history_nap_bank` WHERE `trans_id` = '$tranId' ")) ['COUNT(*)']; 
      if ($total_trans == 0) {
            if ($amount > 0) {
                $username =  $toz_checkidnap['username'];
              $insertSv2 = $ketnoi->query("INSERT INTO `history_nap_bank` SET 
                  `trans_id` = '$tranId',
                  `username` = '$username',
                  `type` = 'Thesieure',
                  `stk` = '$partnerId',
                  `ctk` = '$partnerName',
                  `thucnhan` = '$amount',
                  `status` = 'hoantat',
                  `time` = '$now' ");
                  if ($insertSv2) {
                    $received = $amount;
                    $create = mysqli_query($ketnoi, "UPDATE `users` SET `money`=`money`+ '$amount', `tong_nap` = `tong_nap` + '$amount' WHERE `username`='$username'");
                    if ($create) {
                        echo '[<b style="color:green">-</b>] Xử lý thành công 1 hoá đơn.' . PHP_EOL . "\n";
                    }
                }
                  
            }
        }
    }
 }
} else {
    echo "không có đơn gì hoặc token ko tồn tại";
}