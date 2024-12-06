<?php
require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';
$type_bank = strip_tags($_POST['type_bank']);
$bank = $ketnoi->query("SELECT * FROM `ds_bank` WHERE `type` = '$type_bank' ")->fetch_array();
  if ($bank) {
    $loai = $bank['type'];
    $stk = $bank['taikhoan'];
    $ctk = $bank['name'];
    $toithieu = $bank['min'];
    $img = $bank['img'];
    $noidung = $bank['noidung'];
    $ds_bank[] = array(
      "bank" => "$loai",
      "stk" => "$stk",
      "ctk" => "$ctk",
      "toithieu" => tien($toithieu)."đ",
      "img" => "$img",
      "noidung" => "$noidung"
    );
  }
echo json_encode($ds_bank);
?>
