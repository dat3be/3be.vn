<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';?>
<?php
$now = time(); 
$date = date('h:i d-m-Y', $now);
$days_to_add ='30';
$het = $now;
$het += $days_to_add * 24 * 60 * 60;

$goi = strip_tags($_POST['goi']);
$domain = strip_tags($_POST['domain']);
$emailuser = strip_tags($_POST['email']);
$host = $ketnoi->query("SELECT * FROM `list_host` WHERE `id` = '$goi' ")->fetch_array();
if($username==""){
    $response = array('success' => false, 'message' => 'Đăng nhập để thực hiện tính năng này');
}elseif ($goi == '' || $domain==''|| $emailuser=='') {
    $response = array('success' => false, 'message' => 'Vui lòng nhập đầy đủ thông tin');
}elseif(strpos($domain, '.') < -1) {
    $response = array('success' => false, 'message' => 'Tên miền bạn nhập không hợp lệ!!');
}elseif($user['money']<$gia_host) {
    $response = array('success' => false, 'message' => 'Số dư trong tài khoản không đủ, vui lòng nạp thêm');

}else{
$server_host = $host['server_host'];
$sv_host = $ketnoi->query("SELECT * FROM `list_server_host` WHERE `id` = '$server_host' ")->fetch_array();
$tk_whm = $sv_host['tk_whm'];
$mk_whm = $sv_host['mk_whm'];
$linklogin = $sv_host['link_login'];
$user_host = ''.random('abcdefghijklmnopqrstuvwxyz', 8);
$pass_host = ''.random('0123456789qwertyuiopasdfghjlkzxcvbnmQEWRWROIWCJHSCNJKFBJWQ', 15);
$goi_host = $host['code'];
$gia_host = $host['gia_host'] - $host['gia_host'] * $user['chiet_khau'] /100 ;
$ip_host = $sv_host['ip_whm'];
$ns1 = $sv_host['ns1'];
$ns2 = $sv_host['ns2'];
if ($tk_whm == 'root') {
    $goiChuan = $goi_host; // Use only the package name
} else {
    $goiChuan = $tk_whm . '_' . $goi_host; // Prefix WHM user for resellers
}
$query = $linklogin.':2087/json-api/createacct?api.version=1&username='.$user_host.'&domain='.$domain.'&plan='.$goiChuan.'&featurelist=default&password='.$pass_host.'&ip=n&cgi=1&hasshell=1&contactemail='.$emailuser.'&cpmod=jupiter'.$reseller.'&language=vi'; 
$curl = curl_init(); // Create Curl Object 
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // Allow self-signed certs 
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0); // Allow certs that do not match the hostname 
curl_setopt($curl, CURLOPT_HEADER, 0); // Do not include header in output 
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
$header[0] = "Authorization: Basic " . base64_encode($tk_whm . ":" . $mk_whm) . "\n\r";
curl_setopt($curl, CURLOPT_HTTPHEADER, $header); // set the username and password 
curl_setopt($curl, CURLOPT_URL, $query); // execute the query 
$result = curl_exec($curl); 
curl_close($curl);
$reghost = json_decode($result, true);
$reghost = $reghost['metadata'];

if ($reghost['result'] == 1) {
            $sql = $ketnoi->query("INSERT INTO `lich_su_mua_host` SET 
            `username`    = '$username',
            `domain`      = '$domain',
            `goi_host`    = '$goi_host',
            `server_host` = '$server_host',
            `gia_host`    = '$gia_host',
            `tk_host`     = '$user_host',
            `mk_host`     = '$pass_host',
            `ngay_mua`    = '$now',
            `ngay_het`    = '$het',
            `status`      = 'hoatdong',
            `note`        = 'hoatdong',
            `time`        = '$now' ");
            $mienan = hideName($domain);
            sendTele("Tài Khoản: ".$username." Đã Mua Host Trên Tên Miền " .$domain." Với Giá ".$gia_host."đ Thành Công.");
           if(isset($sql)){
           $toz = $ketnoi->query("INSERT INTO `lich_su_hoat_dong` SET 
                `username` = '$username',
                `hoatdong` = 'Mua hosting cho " . $mienan . "',
                `gia` = '".$gia_host."',
                `time` = '".$time."' ");
                
               
                $newmoney = $user['money']-$gia_host;
                $check_money = $ketnoi->query("UPDATE `users` SET `money` = '$newmoney' WHERE `username` = '".$username."' ");
                if($check_money){
                $response = array('success' => true);
                }
            }
} else {
    $response = array('success' => false, 'message' => 'HOST: '.$reghost['reason']);
}
}
echo json_encode($response);
?>