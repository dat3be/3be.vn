<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';?>
<?php
if (isset($_POST['type']) && $_POST['type'] == 'license') {
    $key = strip_tags($_POST['key']);
    $domain = strip_tags($_POST['domain']);
    $check = $ketnoi->query("SELECT * FROM `license_key` WHERE `license` = '" . $key . "' AND `mien`='" . $domain . "' ")->fetch_array();
    if (empty($key) || empty($domain)) {
        echo json_encode(array('status' => '99', 'msg' => 'Info is required'));
    } else {
        if ($check) {
            if ($check['status'] == 'tamdung') {
                echo json_encode(array('status' => '198', 'msg' => 'Key của bạn hiện đang tạm dừng'));
            } elseif ($check['status'] == 'gianlan') {
                echo json_encode(array('status' => '222', 'msg' => 'Key của bạn hiện đang bị khóa'));
            } elseif ($check['date'] >= time()) {
                echo json_encode(array('status' => '100', 'msg' => 'key cua ban da het han'));
            } else {
                echo json_encode(array('status' => '200', 'msg' => 'key hop le'));
            }
        } else {
            echo json_encode(array('status' => '999', 'msg' => 'License và domain không hợp lệ'));
        }
    }
} else {
    echo json_encode(array('status' => '999', 'msg' => 'License và domain không hợp lệ'));
}
?>
