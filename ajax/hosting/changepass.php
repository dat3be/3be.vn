<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';?>
<?php
$idhost = strip_tags($_POST['idhost']);
$host = $ketnoi->query("SELECT * FROM `lich_su_mua_host` WHERE `id` = '$idhost' ")->fetch_array();
$id_sv = $host['server_host'];
$sv_host = $ketnoi->query("SELECT * FROM `list_server_host` WHERE `id` = '$id_sv' ")->fetch_array();
if($username==""){
    $response = array('success' => false, 'message' => 'Đăng nhập để thực hiện tính năng này');
}elseif ($username != $host['username']) {
   $response = array('success' => false, 'message' => 'Bạn không thể thao tác host này');
}elseif($host['status']!="hoatdong"){
    $response = array('success' => false, 'message' => 'Hãy đợi tiến trình trước đó chạy xong!');
}else{
$user_host = $host['tk_host'];
$pass_host = ''.random('0123456789qwertyuiopasdfghjlkzxcvbnmQEWRWROIWCJHSCNJKFBJWQ', 15);
// Thông tin rsl
$tkWHM = $sv_host['tk_whm'];
$mkWHM = $sv_host['mk_whm'];
$linklogin = $sv_host['link_login'];
// Mua host rsl
$query = $linklogin.':2087/json-api/passwd?api.version=1&user='.$user_host.'&password='.$pass_host.'&enabledigest=0&db_pass_update=1'; 
$curl = curl_init(); // Create Curl Object 
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // Allow self-signed certs 
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0); // Allow certs that do not match the hostname 
curl_setopt($curl, CURLOPT_HEADER, 0); // Do not include header in output 
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
$header[0] = "Authorization: Basic " . base64_encode($tkWHM . ":" . $mkWHM) . "\n\r";
curl_setopt($curl, CURLOPT_HTTPHEADER, $header); // set the username and password 
curl_setopt($curl, CURLOPT_URL, $query); // execute the query 
$result = curl_exec($curl); 
curl_close($curl);
$reghost = json_decode($result, true);
$data = $reghost['metadata'];
if ($data['result'] == '1') {
    $check_pass = $ketnoi->query("UPDATE `lich_su_mua_host` SET `mk_host` = '$pass_host' WHERE `id` = '".$idhost."' ");
    if($check_pass){
    $response = array('success' => true);
    }
} else {
    $response = array('success' => false, 'message' => 'HOST: '.$data['reason']);
}
}
echo json_encode($response);
?>