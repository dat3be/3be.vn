<?php
require $_SERVER['DOCUMENT_ROOT'] . '/hethong/config.php';

if (isset($_GET['id'], $_GET['action'])) {
    $id = $_GET['id'];
    $action = $_GET['action'];

   
    if (!$expired) {
        // Kiểm tra trạng thái của cron
        $sqlCheckStatus = "SELECT `status` FROM `license_key` WHERE `id` = '$id'";
        $statusResult = $ketnoi->query($sqlCheckStatus);

        if ($statusResult->num_rows > 0) {
            $currentStatus = $statusResult->fetch_assoc()['status'];

  

            // Allow actions even when the status is 'loi'
            if (($action === 'hoatdong' && $currentStatus === 'tamdung') || ($action === 'tamdung' && $currentStatus === 'hoatdong') || $currentStatus === '') {
                $status = ($action === 'hoatdong') ? 'hoatdong' : 'tamdung';

                $sql = "UPDATE `license_key` SET `status` = '$status' WHERE `id` = '$id'";
                $successMessage = ($ketnoi->query($sql) === TRUE) ? ucfirst($action) . ' thành công' : 'Lỗi khi cập nhật trạng thái: ' . $ketnoi->error;

                $response = array('success' => $ketnoi->query($sql) === TRUE, 'message' => $successMessage);
            } else {
                $response = array('success' => false, 'message' => 'Hành động không hợp lệ với trạng thái hiện tại');
            }
        } else {
            $response = array('success' => false, 'message' => 'Lỗi khi kiểm tra trạng thái: ' . $ketnoi->error);
        }
    } else {
        $response = array('success' => false, 'message' => 'Bạn đã gian lận, không thể thực hiện thao tác');
    }

    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    $response = array('success' => false, 'message' => 'Yêu cầu không hợp lệ');
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
