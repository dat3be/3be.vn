<!DOCTYPE html>
<html lang="vi">

<head>
    <?php require_once('head.php');?>
    <title>AdminLTE 3 | Dashboard</title>
    <?php require_once('nav.php');?>
</head>
<?php
if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];

    mysqli_begin_transaction($ketnoi);

    try {
        
        $result2 = mysqli_query($ketnoi, "SELECT `key_random` FROM `lich_su_mua_key` WHERE `id` = '$delete'");
        if (!$result2) {
            throw new Exception('Lỗi khi truy vấn dữ liệu key_random từ bảng lich_su_mua_key: ' . mysqli_error($ketnoi));
        }

        $row = mysqli_fetch_assoc($result2);
        if (!$row) {
            throw new Exception('Không tìm thấy mục để xóa từ bảng lich_su_mua_key.');
        }

        $key_random = $row['key_random'];

        
        $result1 = mysqli_query($ketnoi, "DELETE FROM `lich_su_mua_key` WHERE `id` = '$delete'");
        if (!$result1) {
            throw new Exception('Lỗi khi xóa dữ liệu từ bảng lich_su_mua_key: ' . mysqli_error($ketnoi));
        }

        
        $result3 = mysqli_query($ketnoi, "DELETE FROM `keys` WHERE `key_name` = '$key_random'");
        if (!$result3) {
            throw new Exception('Lỗi khi xóa dữ liệu từ bảng keys: ' . mysqli_error($ketnoi));
        }

        if (mysqli_affected_rows($ketnoi) === 0) {
            throw new Exception('Không tìm thấy mục để xóa từ bảng keys.');
        }

        mysqli_commit($ketnoi);
        echo '<script type="text/javascript">swal("Thành công","Xóa dữ liệu thành công","success");setTimeout(function(){ location.href = "concac" },1000);</script>';
    } catch (Exception $e) {
        mysqli_rollback($ketnoi);
        echo '<script type="text/javascript">swal("Lỗi","' . $e->getMessage() . '","error");setTimeout(function(){ location.href = "concac" },1000);</script>';
    }
}
?>





<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Danh sách người dùng key bản quyền</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">KEY</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Danh sách key</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <style>
                                        .pagination-container {
                                            text-align: right;
                                            margin-top: 10px;
                                        }

                                        #datatable1 {
                                            margin-bottom: 20px;
                                        }
                                        </style>

                                        <table id="datatable1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">ID</th>
                                                    <th>USERNAME</th>
                                                    <th>TÊN MIỀN</th>
                                                    <th>KEY</th>
                                                    <th>GÓI KEY</th>
                                                    <th>THỜI GIAN</th>
                                                    <th>THAO TÁC</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Thực hiện JOIN giữa bảng lich_su_mua_key và khocode
                                                $result = mysqli_query($ketnoi, "
                                                    SELECT lsmk.id, lsmk.username, lsmk.url, lsmk.key_random, lsmk.time, kc.title AS goi_key
                                                    FROM lich_su_mua_key lsmk
                                                    LEFT JOIN khocode kc ON lsmk.goi_key = kc.id
                                                    ORDER BY lsmk.id DESC
                                                ");

                                                while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <tr>
                                                    <td><?=$row['id'];?></td>
                                                    <td><?=$row['username'];?></td>
                                                    <td><?=$row['url'];?></td>
                                                    <td><?=$row['key_random'];?></td>
                                                    <td><?=$row['goi_key'];?></td>
                                                    <td><?=date("d-m-Y H:i:s", $row['time']);?></td>
                                                    <td>
                                                        <a href="lsmuakey.php?delete=<?=$row['id'];?>" class="btn btn-default">
                                                            <i class="fas fa-edit"></i> xoá
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php }?>
                                            </tbody>
                                        </table>

                                        <div id="pagination-container" class="pagination-container"></div>

                                        <script>
                                        $(document).ready(function() {
                                            var $table = $('#datatable1');
                                            var $rows = $table.find('tbody tr');
                                            var $paginationContainer = $('#pagination-container');

                                            var limitPerPage = 10;
                                            var totalPages = Math.ceil($rows.length / limitPerPage);

                                            // Tạo chuyển trang
                                            if (totalPages > 1) {
                                                var pagination = '<ul class="pagination">';

                                                for (var i = 1; i <= totalPages; i++) {
                                                    pagination +=
                                                        '<li class="page-item"><a class="page-link" href="javascript:void(0);">' +
                                                        i + '</a></li>';
                                                }

                                                pagination += '</ul>';

                                                $paginationContainer.html(pagination).show();

                                                // Ẩn các bảng không ở trang hiện tại
                                                $rows.hide().slice(0, limitPerPage).show();

                                                // Sự kiện chuyển trang
                                                $paginationContainer.on('click', '.page-link', function() {
                                                    var currentPage = $(this).text();
                                                    var start = (currentPage - 1) * limitPerPage;
                                                    var end = start + limitPerPage;

                                                    $rows.hide().slice(start, end).show();

                                                    $paginationContainer.find('.page-link').removeClass('active');
                                                    $(this).addClass('active');
                                                });
                                            }
                                        });
                                        </script>
                                    </div>
                                    <!-- /.row -->
                                </div><!-- /.container-fluid -->
                            </div><!-- /.container-fluid -->
                        </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php require_once('foot.php');?>
</body>

</html>
