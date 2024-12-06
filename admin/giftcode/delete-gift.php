<?php
require_once('../head.php'); // Include your database connection and necessary files

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Validate the ID

    // Fetch the record to verify it exists before deleting
    $stmt = $ketnoi->prepare("SELECT * FROM `gift_code` WHERE `id` = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $giftcode = $result->fetch_assoc();
    $stmt->close();

    if (!$giftcode) {
        echo '<script>alert("Gift code không tồn tại!"); location.href="giftcode.php";</script>';
        exit();
    }

    // Proceed to delete
    $stmt = $ketnoi->prepare("DELETE FROM `gift_code` WHERE `id` = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo '<script>alert("Gift code đã được xóa thành công!"); location.href="giftcode.php";</script>';
    } else {
        echo '<script>alert("Có lỗi xảy ra khi xóa gift code!"); location.href="giftcode.php";</script>';
    }
    $stmt->close();
} else {
    echo '<script>alert("Không tìm thấy ID Gift Code!"); location.href="giftcode.php";</script>';
}
