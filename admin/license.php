 <!DOCTYPE html>
<html lang="vi">
<head>
    <?php require_once('head.php');?>
    <title>AdminLTE 3 | Dashboard</title>
    <?php require_once('nav.php');?>
</head>
<?php
if (isset($_GET['delete'])) 
{
    $delete = $_GET['delete'];

    $create = mysqli_query($ketnoi,"DELETE FROM `kho_key` WHERE `id` = '".$delete."' ");

    if ($create)
    {
      
    }
    else
    {
      echo '<script type="text/javascript">swal("Lỗi","Lỗi máy chủ","error");setTimeout(function(){ location.href = "hmanh.php" },1000);</script>'; 
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
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">KEY BẢN QUYỀN</h3>
                                <div class="text-right">
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">TẠO KEY BẢN QUYỀN</button>
                                </div>
                            </div>
                            <div class="card-body">
    <div class="table-responsive">
        <table id="datatable1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 10px">ID</th>
                    <th>SOURCE CODE</th>
                    <th>GIÁ KEY</th>
                    <th>THỜI GIAN TẠO</th>
                    <th>THAO TÁC</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($ketnoi, 
                    "SELECT kho_key.id, khocode.title AS source_title, kho_key.gia_key_source, kho_key.time 
                     FROM kho_key 
                     JOIN khocode ON kho_key.title_key_source = khocode.id 
                     ORDER BY kho_key.id DESC");
                
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['source_title']; ?></td>
                        <td><?= $row['gia_key_source']; ?></td>
                        <td><?= date("Y-m-d H:i:s", $row['time']); ?></td>
                        <td>
                            <a href="license.php?delete=<?= $row['id']; ?>" class="btn btn-default">
                                <i class="fas fa-trash"></i> Xóa
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

                            <div class="card-footer clearfix">
                                VUI LÒNG THAO TÁC CẨN THẬN
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">TẠO KEY BẢN QUYỀN CHO SOURCE</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form role="form" action="" method="post">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">CHỌN SOURCE THÊM KEY</label>
                                        <select class="custom-select" name="title_key_source">
                                            <?php
                                            $result = mysqli_query($ketnoi, "SELECT * FROM `khocode`");
                                            while ($row1 = mysqli_fetch_array($result)) { ?>
                                                <option value="<?= $row1['id']; ?>"><?= $row1['title']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Giá Tiền</label>
                                        <input type="text" class="form-control" name="gia_key_source" placeholder="Nhập Giá Tiền Vđ: 100000 = 100 nghìn" required="">
                                    </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">ĐÓNG</button>
                                <button type="submit" name="submit" class="btn btn-primary">TẠO</button>
                            </div>
                                </form>
                        </div>
                    </div>
                </div>

                <?php
                if (isset($_POST["submit"])) {
                    $title_key_source = mysqli_real_escape_string($ketnoi, $_POST['title_key_source']);
                    $gia_key_source = mysqli_real_escape_string($ketnoi, $_POST['gia_key_source']);
                    $time = time();

                    $create = mysqli_query($ketnoi, "INSERT INTO `kho_key` (`title_key_source`, `gia_key_source`, `time`) VALUES ('$title_key_source', '$gia_key_source', '$time')");

                    if ($create) {
                            echo '<script type="text/javascript">if(!alert("Tạo Thành Công")){window.history.back().location.reload();}</script>';
  } else {
                        echo '<script type="text/javascript">
                                swal("Lỗi", "Lỗi máy chủ", "error");
                              </script>';
                    }
                }
                ?>

            </div>
        </div>
    </div>

    <?php require_once('foot.php'); ?>
</body>

</html>
