<!DOCTYPE html>
<html lang="vi">

<head>
    <?php require_once('head.php'); ?>
    <title>AdminLTE 3 | Danh Sách Gift Code</title>
    <?php require_once('nav.php'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Content Header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Danh Sách Gift Code</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Gift Code</li>
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
                                    <h3 class="card-title">Danh Sách Gift Code</h3>
                                    <div class="text-right">
                                        <a class="btn btn-primary btn-icon-left m-b-10" href="giftcode/add-gift-code.php"
                                            type="button">
                                            <i class="fas fa-plus-circle mr-1"></i> Thêm Gift Code
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">ID</th>
                                                    <th>Gift Code</th>
                                                    <th>Giảm Giá (%)</th>
                                                    <th>Dịch Vụ</th>
                                                    <th>Số Lượng</th>
                                                    <th>Đã Dùng</th>
                                                    <th>Trạng Thái</th>
                                                    <th>Thao Tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Fetch data from the gift_code table in ascending order
                                                $result = $ketnoi->query("SELECT * FROM `gift_code` ORDER BY id ASC");

                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                ?>
                                                        <tr>
                                                            <td><?= $row['id']; ?></td>
                                                            <td><?= htmlspecialchars($row['giftcode']); ?></td>
                                                            <td><?= htmlspecialchars($row['giamgia']); ?>%</td>
                                                            <td>
                                                                <?php
                                                                // Convert `type` to user-friendly names
                                                                switch ($row['type']) {
                                                                    case 'domain':
                                                                        echo 'Tên miền';
                                                                        break;
                                                                    case 'code':
                                                                        echo 'Mã nguồn';
                                                                        break;
                                                                    case 'smm-service':
                                                                        echo 'Dịch vụ MXH';
                                                                        break;
                                                                    case 'sms-service':
                                                                        echo 'Dịch vụ SMS';
                                                                        break;
                                                                    case 'other-service':
                                                                        echo 'Dịch vụ khác';
                                                                        break;
                                                                    case 'all':
                                                                        echo 'Tất cả';
                                                                        break;
                                                                    default:
                                                                        echo 'Không xác định';
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><?= htmlspecialchars($row['soluong']); ?></td>
                                                            <td><?= htmlspecialchars($row['dadung']); ?></td>
                                                            <td>
                                                                <?php
                                                                if ($row['status'] === 'ON') {
                                                                    echo '<span class="badge badge-success">Hiển Thị</span>';
                                                                } else {
                                                                    echo '<span class="badge badge-danger">Ẩn</span>';
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <a href="giftcode/edit-gift.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">
                                                                    <i class="fas fa-edit"></i> Sửa
                                                                </a>
                                                                <a href="giftcode/delete-gift.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm"
                                                                    onclick="return confirm('Bạn có chắc muốn xóa gift code này?');">
                                                                    <i class="fas fa-trash"></i> Xóa
                                                                </a>
                                                            </td>
                                                        </tr>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<tr><td colspan="8" class="text-center">Không có gift code nào trong hệ thống.</td></tr>';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <?php require_once('foot.php'); ?>
</body>

</html>
