<?php
// Xử lý giá trị type_the và tạo mảng các mệnh giá tương ứng
require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';
$typeThe = strip_tags($_POST['type_the']);
$data = dv_the($chinhapi['gach_the'], $chinhapi['partner_id']);
$menhGiaList = array();
foreach ($data as $item) {
  if ($item['telco'] == $typeThe) {
    $type = $item['telco'];
    $menhgia = $item['value'];
    $value = tien($menhgia).'đ';
    $fees = 'Thực nhận '.tien($item['value']*((100-$item['fees'])/100)).'đ';
    $menhGiaList[] = array("value" => "$menhgia", "label" => "$value - $fees");
  }
}

// Trả về kết quả dưới dạng JSON
echo json_encode($menhGiaList);
?>