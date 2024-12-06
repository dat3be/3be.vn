<!DOCTYPE html>
<html lang="vi">

<head>
    <?php require_once('head.php');?>
    <title>AdminLTE 3 | Dashboard</title>
    <?php require_once('nav.php');?>
</head>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $toz_bank =  $ketnoi->query("SELECT * FROM `ds_bank` WHERE `id` = '$id' ")->fetch_array();
}
?>
<?php
if (isset($_POST["submit"]))
{
  $create = mysqli_query($ketnoi,"UPDATE `ds_bank` SET 
    `name` = '".$_POST['name']."',
    `taikhoan` = '".$_POST['taikhoan']."',
    `type` = '".$_POST['type']."',
    `qr_code` = '".$_POST['qr_code']."',
    `min` = '".$_POST['min']."',
    `status` = '".$_POST['status']."' WHERE `id` = '".$id."' ");

  if($create)
  {
    echo '<script type="text/javascript">if(!alert("Cập nhật thành công !")){window.history.back().location.reload();}</script>';
  }
  else
  {
    echo '<script type="text/javascript">if(!alert("Có lỗi xảy ra !")){window.history.back().location.reload();}</script>'; 
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
                            <h1 class="m-0">Edit Bank</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit Bank</li>
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
                                    <h3 class="card-title">EDIT BANK</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form role="form" action="" method="post">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">CHỦ TÀI KHOẢN</label>
                                            <input type="text" class="form-control" name="name"
                                                value="<?=$toz_bank['name'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">SỐ TÀI KHOẢN</label>
                                            <input type="text" class="form-control" name="taikhoan"
                                                value="<?=$toz_bank['taikhoan'];?>" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Loại</label>
                                            <input type="text" class="form-control" name="type"
                                                value="<?=$toz_bank['type'];?>" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">QR CODE</label>
                                            <select class="form-control" name="qr_code">
                                                <option value="<?=$toz_bank['qr_code'];?>"><?=$toz_bank['qr_code'];?>
                                                </option>
                                        <option value="VCB">Vietcombank</option>
                                        <option value="ACB">ACB</option>
                                        <option value="MB">MBBank</option>
                                        <option value="VPB">VPBank</option>
                                        <option value="TCB">Techcombank</option>
                                        <option value="TPB">TPBank</option>
                                        <option value="VPB">VPBank</option>
                                        <option value="BIDV">BIDV</option>
                                        <option value="VIB">VIB</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nạp tối thiểu</label>
                                            <input type="text" class="form-control" name="min"
                                                value="<?=$toz_bank['min'];?>" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Status</label>
                                            <select class="form-control" name="status">
                                                <option value="<?=$toz_bank['status'];?>"><?=$toz_bank['status'];?>
                                                </option>
                                                <option value="ON">Hiển Thị(ON)</option>
                                                <option value="OFF">Ẩn(OFF)</option>
                                            </select>
                                        </div>

                                        <button type="submit" name="submit" class="btn btn-primary">Lưu</button>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer clearfix">
                                    <a href="setbank.php" class="btn btn-info">Về Danh Sách Bank</a>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
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