<?php
define("IN_SITE", true);
require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';


$result = $ketnoi->query("SELECT * FROM `users`");
while ($user = $result->fetch_array()) {
    $guitoi = $user['email'];   
    $subject = 'DICHVUMIGHT.COM chào bạn';
    $bcc = 'DICHVUMIGHT';
    $hoten ='SERVER';
    $noi_dung = '<p>Kính chào quý khách hàng <b>'.$user['username'].'</b>,</p>';
        
  sendCSM($guitoi, $hoten, $subject, $noi_dung, $bcc);
  echo "Gửi thành công mail .$guitoi ";
}
?>