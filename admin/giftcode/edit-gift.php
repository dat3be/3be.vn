<!DOCTYPE html>
<html lang="vi">

<head>
    <?php require_once('../head.php'); ?>
    <title>AdminLTE 3 | Edit Gift Code</title>
    <?php require_once('../nav.php'); ?>
</head>

<?php
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $ketnoi->prepare("SELECT * FROM `gift_code` WHERE `id` = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $toz_code = $stmt->get_result()->fetch_assoc();
    $stmt->close();
} else {
    echo '<script>alert("Không tìm thấy ID Gift Code!"); location.href="giftcode.php";</script>';
    exit;
}

if (isset($_POST["submit"])) {
    // Sanitize and validate input
    $giftcode = trim($_POST['giftcode']);
    $giamgia = intval($_POST['giamgia']);
    $soluong = intval($_POST['soluong']);
    $dadung = intval($_POST['dadung']);
    $type = trim($_POST['type']);
    $status = trim($_POST['status']);

    // Basic validation
    if (empty($giftcode) || $giamgia <= 0 || $soluong <= 0 || empty($type) || empty($status)) {
        echo '<script>alert("Vui lòng điền đầy đủ thông tin hợp lệ."); history.back();</script>';
    } else {
        // Update query
        $stmt = $ketnoi->prepare("
            UPDATE `gift_code` SET 
                `giftcode` = ?, 
                `giamgia` = ?, 
                `type` = ?, 
                `soluong` = ?, 
                `dadung` = ?, 
                `status` = ? 
            WHERE `id` = ?
        ");
        $stmt->bind_param("sisissi", $giftcode, $giamgia, $type, $soluong, $dadung, $status, $id);

        if ($stmt->execute()) {
            echo '<script>alert("Cập nhật Gift Code thành công!"); location.href="giftcode.php";</script>';
        } else {
            echo '<script>alert("Có lỗi xảy ra: ' . htmlspecialchars($stmt->error) . '"); history.back();</script>';
        }

        $stmt->close();
    }
}
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Content Header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Chỉnh Sửa Gift Code</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit Gift Code</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Chỉnh Sửa Gift Code</h3>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post">
                                        <!-- Gift Code -->
                                        <div class="form-group">
                                            <label for="giftcode">Gift Code *</label>
                                            <input type="text" class="form-control" id="giftcode" name="giftcode"
                                                value="<?= htmlspecialchars($toz_code['giftcode']); ?>" required>
                                        </div>

                                        <!-- Discount -->
                                        <div class="form-group">
                                            <label for="giamgia">Giảm Giá (%) *</label>
                                            <input type="number" class="form-control" id="giamgia" name="giamgia"
                                                value="<?= htmlspecialchars($toz_code['giamgia']); ?>" min="1" max="100" required>
                                        </div>

                                        <!-- Quantity -->
                                        <div class="form-group">
                                            <label for="soluong">Số Lượng *</label>
                                            <input type="number" class="form-control" id="soluong" name="soluong"
                                                value="<?= htmlspecialchars($toz_code['soluong']); ?>" min="1" required>
                                        </div>

                                        <!-- Used -->
                                        <div class="form-group">
                                            <label for="dadung">Đã Dùng</label>
                                            <input type="number" class="form-control" id="dadung" name="dadung"
                                                value="<?= htmlspecialchars($toz_code['dadung']); ?>" readonly>
                                        </div>

                                        <!-- Service -->
                                        <div class="form-group">
                                            <label for="type">Dịch Vụ *</label>
                                            <select class="form-control" id="type" name="type" required>
                                                <option value="domain" <?= $toz_code['type'] == 'domain' ? 'selected' : ''; ?>>Tên miền</option>
                                                <option value="code" <?= $toz_code['type'] == 'code' ? 'selected' : ''; ?>>Mã nguồn</option>
                                                <option value="smm-service" <?= $toz_code['type'] == 'smm-service' ? 'selected' : ''; ?>>Dịch vụ MXH</option>
                                                <option value="sms-service" <?= $toz_code['type'] == 'sms-service' ? 'selected' : ''; ?>>Dịch vụ SMS</option>
                                                <option value="other-service" <?= $toz_code['type'] == 'other-service' ? 'selected' : ''; ?>>Dịch vụ khác</option>
                                                <option value="all" <?= $toz_code['type'] == 'all' ? 'selected' : ''; ?>>Tất cả</option>
                                            </select>
                                        </div>

                                        <!-- Status -->
                                        <div class="form-group">
                                            <label for="status">Trạng Thái *</label>
                                            <select class="form-control" id="status" name="status" required>
                                                <option value="ON" <?= $toz_code['status'] == 'ON' ? 'selected' : ''; ?>>Hiển Thị (ON)</option>
                                                <option value="OFF" <?= $toz_code['status'] == 'OFF' ? 'selected' : ''; ?>>Ẩn (OFF)</option>
                                            </select>
                                        </div>

                                        <!-- Submit Button -->
                                        <button type="submit" name="submit" class="btn btn-success">Cập Nhật</button>
                                        <a href="giftcode.php" class="btn btn-secondary">
                                            <i class="fas fa-arrow-left"></i> Về Danh Sách Gift Code
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <?php require_once('../foot.php'); ?>
</body>

</html>
