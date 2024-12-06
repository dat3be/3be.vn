<?php
require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';

$id = strip_tags($_POST['id']);
$type = strip_tags($_POST['type']);
$name = strip_tags($_POST['name']);
$content = strip_tags($_POST['content']);
$now = time();

$record = $ketnoi->query("SELECT * FROM `list_record_domain` WHERE `id` = '$id' ")->fetch_array();
$mien = $ketnoi->query("SELECT * FROM `history_domain` WHERE `id` = '".$record['id_domain']."' ")->fetch_array();

if ($username == "") {
    $response = array('success' => false, 'message' => 'Đăng nhập để thực hiện tính năng này');
} elseif (!$user['username']) {
    $response = array('success' => false, 'message' => 'Vui lòng đăng nhập');
} elseif ($mien['status'] !== 'hoatdong') {
    $response = array('success' => false, 'message' => 'Domain Chưa Hoạt Động!');
} elseif ($_POST['type'] == "" || $_POST['name'] == '' || $_POST['content'] == '') {
    $response = array('success' => false, 'message' => 'Vui lòng nhập đầy đủ thông tin');
} else {
    if ($mien['zone_id'] != "") {
        // Thông tin xác thực API
        $api_key = $chinhapi['api_cf'];
        $email =  $chinhapi['email_cf'];
        $zone_id = $mien['zone_id']; // ID của vùng chứa tên miền chính
        $record_id = $record['record_id']; // ID của bản ghi cần cập nhật

        // Tạo yêu cầu PUT để cập nhật bản ghi DNS cho tên miền phụ
        $data = array(
            'type' => $type,
            'name' => $name,
            'content' => $content,
            'ttl' => 1,
            'proxied' => true
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.cloudflare.com/client/v4/zones/$zone_id/dns_records/$record_id");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "X-Auth-Email: {$email}",
            "X-Auth-Key: {$api_key}",
            "Content-Type: application/json"
        ));

        // Gửi yêu cầu API đến Cloudflare
        $response = curl_exec($ch);
        curl_close($ch);

        // Xử lý kết quả trả về từ Cloudflare
        $result = json_decode($response, true);
        if ($result['success']) {
        $rc = $ketnoi->query("UPDATE `list_record_domain` SET 
        `type` = '$type',
        `name` = '$name',
        `content` = '$content'
        WHERE `id` = '".$id."' ");
          if($rc){
            $response = array('success' => true);
        } else {
            $response = array('success' => false, 'message' => 'Lỗi: ' . $result['errors'][0]['message']);
        }
    }
}
}
echo json_encode($response);
