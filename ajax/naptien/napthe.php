<?php 
require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';
$type_the = strip_tags($_POST['type_the']);
$menh_gia = strip_tags($_POST['menh_gia']);
$ma_the   = strip_tags($_POST['ma_the']);
$seri_the = strip_tags($_POST['seri_the']);
$code1 = random('qwertyuiopasdfghjklzxcvbnm1234567890QWERTYUIOPASDFGHJKLZXCVBNM', 12);
// Kiểm tra thông tin đăng nhập
if($username==""){
    $response = array('success' => false, 'message' => 'Đăng nhập để thực hiện tính năng này');
} elseif ($type_the == '') {
  // Thông tin đăng nhập sai, trả về kết quả thất bại
  $response = array('success' => false, 'message' => 'Vui lòng chọn loại thẻ');
} elseif($menh_gia == '') {
    // Thông tin đăng nhập sai, trả về kết quả thất bại
    $response = array('success' => false, 'message' => 'Vui lòng chọn mệnh giá thẻ');
}elseif($ma_the == ''|| $seri_the== '') {
    // Thông tin đăng nhập sai, trả về kết quả thất bại
    $response = array('success' => false, 'message' => 'Vui lòng nhập đầy đủ thông tin');
} elseif(!(ctype_digit($ma_the))|| !(ctype_digit($seri_the))) {
    // Thông tin đăng nhập sai, trả về kết quả thất bại
    $response = array('success' => false, 'message' => 'Hãy nhập giá trị là số!');
} else{
            $data = dv_the($chinhapi['gach_the'], $chinhapi['partner_id']);
                                            foreach ($data as $item) {
                                                if($item['telco']== $type_the){
                                                    if($item['value'] ==$menh_gia){
                                                        $tiennn = $item['value']*((100-($item['fees']+$chinhapi['chiet_khau_card']))/100);
                                                        $thucnhan = $tiennn + (($tiennn*$chinhapi['thuong'])/100);
                                                    }
                                                }
                                            }
        $command = 'charging'; // Nap the
        require $_SERVER['DOCUMENT_ROOT'].'/hethong/xulythe.php';
        $request_id = rand(100000000, 999999999);
        $telco = $type_the;
        $amount = $menh_gia;
        $code = $ma_the;
        $serial = $seri_the;
        $dataPost = array();
        $dataPost['partner_id'] = $partner_id;
        $dataPost['request_id'] = $request_id;
        $dataPost['telco'] = $telco;
        $dataPost['amount'] = $menh_gia;
        $dataPost['serial'] = $serial;
        $dataPost['code'] = $code;
        $dataPost['command'] = $command;
        $sign = creatSign($partner_key, $dataPost);
        $dataPost['sign'] = $sign;
        $data = http_build_query($dataPost);

        // CHẠY CURL
        $ch = curl_init();
        // QUÁ TRÌNH GỬI LÊN (ĐỪNG THAY ĐỔI)
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $SERVER_NAME = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        curl_setopt($ch, CURLOPT_REFERER, $SERVER_NAME);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        // ĐÓNG GỬI LÊN
        curl_close($ch);
        $obj = json_decode($result);
        $msg = $obj->message;
        if ($obj->status == 99) {
        $create = $ketnoi->query("INSERT INTO `history_nap_the` SET 
              `code` = '$code1',
              `seri` = '$seri_the',
              `pin` = '$ma_the',
              `loaithe` = '$type_the',
              `menhgia` = '$menh_gia',
              `thucnhan` = '$thucnhan',
              `username` = '$username',
              `status` = 'xuly',
              `note` = '$msg',
              `time` = '$time' ");
              sendTele("Tài Khoản: ".$username." Nạp Thẻ Mệnh Giá ".$menh_gia." Thực Nhận ".$thucnhan);
              
              
 if($create){
             $toz = $ketnoi->query("INSERT INTO `lich_su_nap_tien` SET 
                `username` = '$username',
                `hoatdong` = 'Nạp Thẻ Cào',
                `gia` = '".$menh_gia."',
                `time` = '".$time."' ");
                $response = array('success' => true);
              }
        }else{
         $response = array('success' => false, 'message' => $msg );
        }

}

// Trả về kết quả dưới dạng JSON
echo json_encode($response);

?>