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
    $toz_code =  $ketnoi->query("SELECT * FROM `users` WHERE `id` = '$id' ")->fetch_array();
}
?>
<?php
$now = time();
if (isset($_POST["submit"]))
{
  $create = mysqli_query($ketnoi,"UPDATE `users` SET 
    `username` = '".$_POST['username']."',
    `email` = '".$_POST['email']."',
    `chiet_khau` = '".$_POST['chiet_khau']."',
    `money` = '".$_POST['money']."',
    `bannd` = '".$_POST['bannd']."',
    `level` = '".$_POST['level']."',
    `capbac` = '".$_POST['capbac']."',
    `tong_nap` = `tong_nap`+'".$_POST['money']."' WHERE `id` = '".$id."' ");
    if($_POST['money']!=$toz_code['money']){
        if($toz_code['money']>$_POST['money']){
            $reason = "Admin trừ tiền";
        }elseif($toz_code['money']<$_POST['money']){
            $reason = "Success";
        }$magd = random('ABCDEFGHIJKLMNOPQRSTUVWXYZ',3).rand(1000000000, 9999999999);
        $ketnoi->query("INSERT INTO `history_nap_bank` SET 
                  `trans_id` = '$magd',
                  `username` =  '".$_POST['username']."',
                  `type` = 'Hệ Thống',
                  `ctk` = '$reason',
                  `stk` = 'Null',
                  `thucnhan` = '".$_POST['money']."',
                  `status` = 'hoantat',
                  `time` = '$now' ");
    }

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
                            <h1 class="m-0">Edit User</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit User</li>
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
                                    <h3 class="card-title">EDIT USER</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form role="form" action="" method="post">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">USERNAME</label>
                                            <input type="text" class="form-control" name="username"
                                                value="<?=$toz_code['username'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">EMAIL</label>
                                            <input type="text" class="form-control" name="email"
                                                value="<?=$toz_code['email'];?>" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">LOẠI ĐĂNG NHẬP</label>
                                            <input type="text" class="form-control"
                                                value="<?=$toz_code['loai'];?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">SỐ DƯ</label>
                                            <input type="text" class="form-control" name="money"
                                                value="<?=$toz_code['money'];?>" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Cấp Bậc</label>
                                            <input type="text" class="form-control" name="capbac"
                                                value="<?=$toz_code['capbac'];?>" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">CHIẾT KHẤU GIẢM</label>
                                            <input type="text" class="form-control" name="chiet_khau"
                                                value="<?=$toz_code['chiet_khau'];?>" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">LEVEL</label>
                                            <select class="form-control" name="level">
                                                <option value="<?=$toz_code['level'];?>">
                                                    <?php if($toz_code['level']==0){echo 'Thành Viên';}else{echo 'Admin'; };?>
                                                </option>
                                                <option value="0">Thành Viên</option>
                                                <option value="9">Admin</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">BAND</label>
                                            <select class="form-control" name="bannd">
                                                <option value="<?=$toz_code['bannd'];?>">
                                                    <?php if($toz_code['bannd']==0){echo 'Un Band';}else{echo 'Band'; };?>
                                                </option>
                                                <option value="0">Un Band</option>
                                                <option value="1">Band</option>
                                            </select>
                                        </div>

                                        <button type="submit" name="submit" class="btn btn-primary">Lưu</button>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer clearfix">
                                    <a href="users.php" class="btn btn-info">Về Danh Sách User</a>
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