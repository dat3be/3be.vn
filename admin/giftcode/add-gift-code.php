<!DOCTYPE html>
<html lang="vi">

<head>
    <?php require_once('../head.php'); ?>
    <title>AdminLTE 3 | Add Gift Code</title>
    <?php require_once('../nav.php'); ?>
</head>

<?php
if (isset($_POST["submit"])) {
    // Sanitize and validate input
    $giftcode = trim($_POST['giftcode']);
    $giamgia = intval($_POST['giamgia']);
    $soluong = intval($_POST['soluong']);
    $dadung = intval($_POST['dadung']) ?: 0; // Default to 0 if empty
    $type = trim($_POST['type']);
    $status = trim($_POST['status']);
    $current_time = date('Y-m-d H:i:s'); // Current timestamp

    // Valid service types
    $valid_types = ['domain', 'code', 'smm-service', 'sms-service', 'other-service', 'all'];

    // Basic validation
    if (empty($giftcode) || $giamgia <= 0 || $soluong <= 0 || !in_array($type, $valid_types) || empty($status)) {
        echo '<script>alert("Vui lòng điền đầy đủ thông tin hợp lệ."); history.back();</script>';
    } else {
        // Prepared statement to prevent SQL injection
        $stmt = $ketnoi->prepare("
            INSERT INTO `gift_code` (`giftcode`, `giamgia`, `type`, `soluong`, `dadung`, `status`, `time`) 
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->bind_param("sisisss", $giftcode, $giamgia, $type, $soluong, $dadung, $status, $current_time);

        if ($stmt->execute()) {
            echo '<script>alert("Thêm Gift Code thành công!"); location.href="giftcode.php";</script>';
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
                            <h1 class="m-0">Add Gift Code</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Add Gift Code</li>
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
                                    <h3 class="card-title">Thêm Gift Code</h3>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post">
                                        <!-- Gift Code -->
                                        <div class="form-group">
                                            <label for="giftcode">Gift Code *</label>
                                            <input type="text" class="form-control" id="giftcode" name="giftcode"
                                                placeholder="Nhập mã gift code (ví dụ: HELLO123)" required>
                                            <small class="form-text text-muted">
                                                Mã gift code sẽ được gửi đến khách hàng để áp dụng giảm giá.
                                            </small>
                                        </div>

                                        <!-- Discount -->
                                        <div class="form-group">
                                            <label for="giamgia">Giảm Giá (%) *</label>
                                            <input type="number" class="form-control" id="giamgia" name="giamgia"
                                                placeholder="Nhập giảm giá (ví dụ: 10 cho 10%)" min="1" max="100" required>
                                            <small class="form-text text-muted">
                                                Nhập phần trăm giảm giá cho gift code này (1% - 100%).
                                            </small>
                                        </div>

                                        <!-- Quantity -->
                                        <div class="form-group">
                                            <label for="soluong">Số Lượng *</label>
                                            <input type="number" class="form-control" id="soluong" name="soluong"
                                                placeholder="Nhập số lượng gift code" min="1" required>
                                            <small class="form-text text-muted">
                                                Tổng số lượng gift code khả dụng.
                                            </small>
                                        </div>

                                        <!-- Used -->
                                        <div class="form-group">
                                            <label for="dadung">Đã Dùng</label>
                                            <input type="number" class="form-control" id="dadung" name="dadung"
                                                placeholder="Số lần gift code đã được sử dụng" value="0" readonly>
                                            <small class="form-text text-muted">
                                                Trường này không cần chỉnh sửa. Mặc định là 0.
                                            </small>
                                        </div>

                                        <!-- Service -->
                                        <div class="form-group">
                                            <label for="type">Dịch Vụ *</label>
                                            <select class="form-control" id="type" name="type" required>
                                                <option value="domain">Tên miền</option>
                                                <option value="code">Mã nguồn</option>
                                                <option value="smm-service">Dịch vụ MXH</option>
                                                <option value="sms-service">Dịch vụ SMS</option>
                                                <option value="other-service">Dịch vụ khác</option>
                                                <option value="all">Tất cả</option>
                                            </select>
                                            <small class="form-text text-muted">
                                                Chọn loại dịch vụ mà gift code áp dụng.
                                            </small>
                                        </div>

                                        <!-- Status -->
                                        <div class="form-group">
                                            <label for="status">Trạng Thái *</label>
                                            <select class="form-control" id="status" name="status" required>
                                                <option value="ON">Hiển Thị (ON)</option>
                                                <option value="OFF">Ẩn (OFF)</option>
                                            </select>
                                            <small class="form-text text-muted">
                                                Hiển Thị (ON): Cho phép gift code hoạt động. Ẩn (OFF): Tạm dừng gift code.
                                            </small>
                                        </div>

                                        <!-- Submit Button -->
                                        <button type="submit" name="submit" class="btn btn-success">Lưu</button>
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
