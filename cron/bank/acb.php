<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';?>

<?php
$token_acb = "72d5467473796cd3287ce5881e4e1f60";// Thay thế token acb tại api.dailysieure.vn

function locid($chuoi)
{
   global $chinhapi;
   $noidungnap = $chinhapi['cuphap'];
   $vi_tri_TOZPIE = strpos($chuoi, $noidungnap);
   if ($vi_tri_TOZPIE === false) {
       return "";
   }
   $phantu_sau_TOZPIE = substr($chuoi, $vi_tri_TOZPIE + strlen($noidungnap));
   preg_match('/\d+/', $phantu_sau_TOZPIE, $matches);
   if (isset($matches[0])) {
       return $matches[0];
   } else {
       return "";
   }
}

// Kiểm tra biến $chinhapi
if (!isset($chinhapi) || !isset($chinhapi['cuphap'])) {
    die("Cấu hình không hợp lệ.");
}

// Gửi yêu cầu cURL
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.vpnfast.vn/api/historyacb/'.$token_acb,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
));

$response = curl_exec($curl);

if ($response === false) {
    die("Lỗi cURL: " . curl_error($curl));
}

curl_close($curl);

$data = json_decode($response, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    die("Lỗi JSON: " . json_last_error_msg());
}

if($data['messageStatus']=="success"){
    foreach ($data['data'] as $acb) {
        if($acb['type']=="IN"){ 
            $amount = $acb['amount'];
            $comment = $acb['description'];
            $idnap = locid($comment);
            $now = time();
            $toz_checkidnap =  $ketnoi->query("SELECT * FROM `users` WHERE `id` = '$idnap' ")->fetch_array();
            if ($toz_checkidnap) {
                $tranId = $acb['transactionNumber'];
                
                $toz_total_trans =  $ketnoi->query("SELECT * FROM `history_nap_bank` WHERE `trans_id` = '$tranId'  ")->fetch_array();
                if (!$toz_total_trans) {
                     echo $comment.'</br>';
                   
                        $username =  $toz_checkidnap['username'];
                        $ketnoi->query("INSERT INTO `history_nap_bank` SET 
                          `trans_id` = '$tranId',
                          `username` = '$username',
                          `type` = 'ACB',
                          `thucnhan` = '$amount',
                          `status` = 'hoantat',
                          `time` = '$now' ");
                        $create = mysqli_query($ketnoi, "UPDATE `users` SET `money`=`money`+ '$amount', `tong_nap` = `tong_nap` + '$amount' WHERE `username`='$username'");
                        sendTele("Tài Khoản: ".$username." Nạp Tiền Thành Công Với Số Tiền là :".$amount." Đ");
                    
                }
            }
              
           
        }
    }
}
?>
