<?php
require $_SERVER['DOCUMENT_ROOT'] . '/hethong/config.php';
$id_cron = strip_tags($_POST['id_cron']);
$mien = strip_tags($_POST['mien']);
$license = strip_tags($_POST['license']);
$status = strip_tags($_POST['status']);
$now = time();
if ($username == "") {
    $response = array('success' => false, 'message' => 'Đăng nhập để thực hiện tính năng này');
} else {
    $check_license = $ketnoi->query("SELECT * FROM `license_key` WHERE `id` = '$id_cron'");
    if ($check_license->num_rows == 1) {
        if ($_POST['mien'] == '' || $_POST['license'] == '') {
            $response = array('success' => false, 'message' => 'Vui lòng nhập đầy đủ thông tin');
        } else {  
            $sql = $ketnoi->query("UPDATE `license_key` SET 
                        `mien` = '$mien',
                        `license` = '$license',
                        `status` = '$status'
                        WHERE `id` = '$id_cron'");
            if ($sql) {
                $response = array('success' => true, 'message' => 'Cập nhật thành công');
            } else {
                $response = array('success' => false, 'message' => 'Có lỗi xảy ra khi cập nhật');
            }
        }
    } else {
        $response = array('success' => false, 'message' => 'Không tồn tại cron này');
    }
}

echo json_encode($response);
?>
