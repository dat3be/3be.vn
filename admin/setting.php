<!DOCTYPE html>
<html lang="vi">

<head>
    <?php require_once('head.php');?>
    <title>AdminLTE 3 | Dashboard</title>
    <?php require_once('nav.php');?>
    <?php 
$total_money = mysqli_fetch_assoc($ketnoi->query("SELECT SUM(`money`) FROM `users` WHERE `money` >= 0 AND `level`!=1")) ['SUM(`money`)']; 

$total_thanhvien = mysqli_fetch_assoc(mysqli_query($ketnoi, "SELECT COUNT(*) FROM `users` ")) ['COUNT(*)']; 

$total_code = mysqli_fetch_assoc(mysqli_query($ketnoi, "SELECT COUNT(*) FROM `lich_su_mua_code` ")) ['COUNT(*)']; 

$total_thanhvienbanned = mysqli_fetch_assoc(mysqli_query($ketnoi, "SELECT COUNT(*) FROM `users` WHERE `bannd` = '1' ")) ['COUNT(*)']; 
?>
</head>
<?php

    if (isset($_POST["submit"]) && isset($_SESSION['admin'])) {
       
      $create = $ketnoi->query("UPDATE `setting` SET
        `ten_web` = '".$_POST['ten_web']."',
        `logo` = '".$_POST['logo']."',
        `favicon` = '".$_POST['favicon']."',
        `banner` = '".$_POST['banner']."',
        `key_words` = '".$_POST['key_words']."',
        `mo_ta` = '".$_POST['mo_ta']."',
        `token_tele` = '".$_POST['token_tele']."',
        `id_tele` = '".$_POST['id_tele']."',
        `name_ad` = '".$_POST['name_ad']."',
        `fb_admin` = '".$_POST['fb_admin']."',
        `email_cf` = '".$_POST['email_cf']."',
        `api_cf` = '".$_POST['api_cf']."',
        `cuphap` = '".$_POST['cuphap']."',
        `baotri` = '".$_POST['baotri']."',
        `status_code` = '".$_POST['status_code']."',
        `status_domain` = '".$_POST['status_domain']."',
        `status_hosting` = '".$_POST['status_hosting']."',
        `sdt_admin` = '".$_POST['sdt_admin']."' ");

      if ($create) {
        echo '<script type="text/javascript">if(!alert("Cập nhật thành công !")){window.history.back().location.reload();}</script>'; 
        die;
      } else {
        echo '<script type="text/javascript">if(!alert("Có lỗi xảy ra !")){window.history.back().location.reload();}</script>'; 
        die;
      }
    }
?>
<?php
    if (isset($_POST["submit2"]) && isset($_SESSION['admin'])) {
       
      $create = $ketnoi->query("UPDATE `setting` SET
        `partner_id` = '".$_POST['partner_id']."',
        `chiet_khau_card` = '".$_POST['chiet_khau_card']."',
        `partner_key` = '".$_POST['partner_key']."',
        `gach_the` = '".$_POST['gach_the']."' ");

      if ($create) {
        echo '<script type="text/javascript">if(!alert("Cập nhật thành công !")){window.history.back().location.reload();}</script>'; 
        die;
      } else {
        echo '<script type="text/javascript">if(!alert("Có lỗi xảy ra !")){window.history.back().location.reload();}</script>'; 
        die;
      }
    }

?>
<?php
    if (isset($_POST["submit_smtp"]) && isset($_SESSION['admin'])) {
       
      $create = $ketnoi->query("UPDATE `setting` SET
        `smtp` = '".$_POST['smtp']."',
        `port_smtp` = '".$_POST['port_smtp']."',
        `email_auto` = '".$_POST['email_auto']."',
        `pass_mail_auto` = '".$_POST['pass_mail_auto']."' ");

      if ($create) {
        echo '<script type="text/javascript">if(!alert("Cập nhật thành công !")){window.history.back().location.reload();}</script>'; 
        die;
      } else {
        echo '<script type="text/javascript">if(!alert("Có lỗi xảy ra !")){window.history.back().location.reload();}</script>'; 
        die;
      }
    }


?>
<?php
    if (isset($_POST["submit3"]) && isset($_SESSION['admin'])) {
       
      $create = $ketnoi->query("UPDATE `setting` SET
        `thongbao` = '".$_POST['thongbao']."' ");

      if ($create) {
        echo '<script type="text/javascript">if(!alert("Cập nhật thành công !")){window.history.back().location.reload();}</script>'; 
        die;
      } else {
        echo '<script type="text/javascript">if(!alert("Có lỗi xảy ra !")){window.history.back().location.reload();}</script>'; 
        die;
      }
    }

?>
<?php
    if (isset($_POST["submit4"]) && isset($_SESSION['admin'])) {
       
      $create = $ketnoi->query("UPDATE `setting` SET
        `thongbao_nt` = '".$_POST['thongbao_nt']."' ");

      if ($create) {
        echo '<script type="text/javascript">if(!alert("Cập nhật thành công !")){window.history.back().location.reload();}</script>'; 
        die;
      } else {
        echo '<script type="text/javascript">if(!alert("Có lỗi xảy ra !")){window.history.back().location.reload();}</script>'; 
        die;
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
                            <h1 class="m-0">Settings</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Settings</li>
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
                                <form class="form-horizontal" enctype="multipart/form-data" action="" method="post">
                                    <div class="card-header">
                                        <h3 class="text-center">Thông Tin</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">TÊN WEBSITE</label>
                                                    <input type="text" class="form-control" name="ten_web"
                                                        placeholder="" value="<?=$chinhapi['ten_web'];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">LINK ẢNH LOGO</label>
                                                    <input type="text" class="form-control" name="logo" placeholder=""
                                                        value="<?=$chinhapi['logo'];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">FAVICON</label>
                                                    <input type="text" class="form-control" name="favicon"
                                                        placeholder="" value="<?=$chinhapi['favicon'];?>">
                                                        <i>Icon nhỏ ở tab nhé</i>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Ảnh giới thiệu</label>
                                                    <input type="text" class="form-control" name="banner"
                                                        placeholder="" value="<?=$chinhapi['banner'];?>">
                                                        <i>Ảnh Bìa Ở Ngoài ( cũng là ảnh khi share lên các mxh)</i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">MÔ TẢ WEBSITE</label>
                                                    <input type="text" class="form-control" name="mo_ta" placeholder=""
                                                        value="<?=$chinhapi['mo_ta'];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">KEYWORDS</label>
                                                    <input type="text" class="form-control" name="key_words" placeholder=""
                                                        value="<?=$chinhapi['key_words'];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">HỌ VÀ TÊN</label>
                                                    <input type="text" class="form-control" name="name_ad" placeholder=""
                                                        value="<?=$chinhapi['name_ad'];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">SDT ZALO ADMIN</label>
                                                    <input type="number" class="form-control" name="sdt_admin"
                                                        placeholder="" value="<?=$chinhapi['sdt_admin'];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">LINK FB ADMIN</label>
                                                    <input type="url" class="form-control" name="fb_admin"
                                                        placeholder="" value="<?=$chinhapi['fb_admin'];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">LINK TELEGRAM ADMIN</label>
                                                    <input type="url" class="form-control" name="telegram_admin"
                                                        placeholder="" value="<?=$chinhapi['telegram_admin'];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">API GLOBAL Cloudflare</label>
                                                    <input type="text" class="form-control" name="api_cf"
                                                        placeholder="" value="<?=$chinhapi['api_cf'];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">EMAIL Cloudflare</label>
                                                    <input type="text" class="form-control" name="email_cf"
                                                        placeholder="" value="<?=$chinhapi['email_cf'];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Token Telegram</label>
                                                    <input type="text" class="form-control" name="token_tele"
                                                        placeholder="" value="<?=$chinhapi['token_tele'];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Id Telegram</label>
                                                    <input type="text" class="form-control" name="id_tele"
                                                        placeholder="" value="<?=$chinhapi['id_tele'];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">NỘI DUNG NẠP</label>
                                            <input type="text" class="form-control" name="cuphap"
                                                value="<?=$chinhapi['cuphap'];?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                       <label>BẢO TRÌ WEBSITE</label>
                                       <select class="form-control select2bs4" name="baotri">
                                          <option value="<?=$chinhapi['baotri'];?>">
                                             <?=$chinhapi['baotri'];?>
                                          </option>
                                          <option value="ON">ON</option>
                                          <option value="OFF">OFF</option>
                                       </select>
                                       <i>Chọn ON hệ thống sẽ bảo trì website</i>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>ON/OFF MÃ NGUỒN</label>
                                       <select class="form-control select2bs4" name="status_code">
                                          <option value="<?=$chinhapi['status_code'];?>">
                                             <?=$chinhapi['status_code'];?>
                                          </option>
                                          <option value="ON">ON</option>
                                          <option value="OFF">OFF</option>
                                       </select>
                                       <i>Chọn OFF sẽ bảo trì</i>
                                                </div>
                                            </div>
                               <div class="col-md-6">
                                    <div class="form-group">
                                       <label>ON/OFF HOSTING</label>
                                       <select class="form-control select2bs4" name="status_hosting">
                                          <option value="<?=$chinhapi['status_hosting'];?>">
                                             <?=$chinhapi['status_hosting'];?>
                                          </option>
                                          <option value="ON">ON</option>
                                          <option value="OFF">OFF</option>
                                       </select>
                                       <i>Chọn OFF sẽ bảo trì</i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                    <div class="form-group">
                                       <label>ON/OFF DOMAIN</label>
                                       <select class="form-control select2bs4" name="status_domain">
                                          <option value="<?=$chinhapi['status_domain'];?>">
                                             <?=$chinhapi['status_domain'];?>
                                          </option>
                                          <option value="ON">ON</option>
                                          <option value="OFF">OFF</option>
                                       </select>
                                       <i>Chọn OFF sẽ bảo trì</i>
                                                </div>
                                            </div>
                                            </div>
                                        <button name="submit" type="submit" class="btn btn-info btn-block">LƯU THAY
                                            ĐỔI</button>
                                </form>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                <div class="col-md-12">
                    <div class="card">
                        <form class="form-horizontal" enctype="multipart/form-data" action="" method="post">
                            <div class="card-header">
                                <h3 class="text-center">Cấu Hình Token API.DICHVUDARK.VN</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">TOKEN MOMO</label>
                                            <input type="text" class="form-control" name="token_momo"
                                                value="<?=$chinhapi['token_momo'];?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">TOKEN MB BANK</label>
                                            <input type="text" class="form-control" name="token_mb"
                                                value="<?=$chinhapi['token_mb'];?>">
                                        </div>
                                    </div>
                                </div>
                                <button name="submit_token" type="submit" class="btn btn-info btn-block">LƯU THAY
                                    ĐỔI</button>
                        </form>
                    </div>
                </div>
                <div class="row lg-12">
                    <section class="col-lg-6 connectedSortable">
                        <form action="" method="POST">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-cogs mr-1"></i>
                                        CẤU HÌNH NẠP THẺ
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn bg-success btn-sm" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn bg-warning btn-sm"
                                            data-card-widget="maximize"><i class="fas fa-expand"></i>
                                        </button>
                                        <button type="button" class="btn bg-danger btn-sm" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Link Web cần đấu</label>
                                        <input type="text" name="gach_the" value="<?=$chinhapi['gach_the'];?>"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Partner ID </label>
                                        <input type="text" name="partner_id" value="<?=$chinhapi['partner_id'];?>"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Partner Key</label>
                                        <input type="text" name="partner_key" value="<?=$chinhapi['partner_key'];?>"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ck Nạp Thẻ (Tiền lời thêm khi nạp thẻ)</label>
                                        <input type="text" class="form-control" name="chiet_khau_card"
                                            value="<?=$chinhapi['chiet_khau_card'];?>"
                                            placeholder="Nhập ck nạp thẻ nếu cần">

                                    </div>

                                    <div class="card-footer clearfix">
                                        <button name="submit2" class="btn btn-info btn-icon-left m-b-10"
                                            type="submit"><i class="fas fa-save mr-1"></i>Lưu Ngay</button>
                                    </div>
                                </div>
                        </form>
                    </section>
                    <section class="col-lg-6 connectedSortable">
                        <form action="" method="POST">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-cogs mr-1"></i>
                                        CẤU HÌNH GỬI MAIL AUTO
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn bg-success btn-sm" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn bg-warning btn-sm"
                                            data-card-widget="maximize"><i class="fas fa-expand"></i>
                                        </button>
                                        <button type="button" class="btn bg-danger btn-sm" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Máy chủ SMTP</label>
                                        <input type="text" name="smtp" value="<?=$chinhapi['smtp'];?>"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Port </label>
                                        <input type="text" name="port_smtp" value="<?=$chinhapi['port_smtp'];?>"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Email auto</label>
                                        <input type="text" name="email_auto" value="<?=$chinhapi['email_auto'];?>"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Pass mail auto</label>
                                        <input type="text" name="pass_mail_auto" value="<?=$chinhapi['pass_mail_auto'];?>"
                                            class="form-control">
                                    </div>
                                    <div class="card-footer clearfix">
                                        <button name="submit_smtp" class="btn btn-info btn-icon-left m-b-10"
                                            type="submit"><i class="fas fa-save mr-1"></i>Lưu Ngay</button>
                                    </div>
                                </div>
                        </form>
                    </section>
                </div>
                

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal" enctype="multipart/form-data" action="" method="post">
                                <div class="card-header">
                                    <h3 class="text-center">Cấu Hình Thông Báo</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> CẤU HÌNH THÔNG BÁO:</label>
                                        <textarea class="textarea" name="thongbao" placeholder="Place some text here"
                                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$chinhapi['thongbao'];?></textarea>
                                    </div>

                                
                                <button name="submit3" type="submit" class="btn btn-info btn-block">LƯU THAY
                                    ĐỔI</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
        </div>
    </div>
    <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal" enctype="multipart/form-data" action="" method="post">
                                <div class="card-header">
                                    <h3 class="text-center">Cấu Hình Thông Báo Nạp Tiền</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> CẤU HÌNH THÔNG BÁO NẠP TIỀN:</label>
                                        <textarea class="textarea" name="thongbao_nt" placeholder="Place some text here"
                                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$chinhapi['thongbao_nt'];?></textarea>
                                    </div>

                                
                                <button name="submit4" type="submit" class="btn btn-info btn-block">LƯU THAY
                                    ĐỔI</button>
                            </form>
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