<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head2.php';?>

    <title>
        <?=$chinhapi['ten_web'];?>
    </title>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/nav.php';?>
    <?php
     $code = mysqli_fetch_assoc($ketnoi->query("SELECT COUNT(*) FROM `lich_su_mua_code` WHERE `username`='" . $user['username'] . "' ")) ['COUNT(*)']; 
 $tongdv = $code ;
 ?>


</head>


<body id="kt_app_body" data-kt-app-layout="light-sidebar" data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <!--begin::Theme mode setup on page load-->
    <script>var defaultThemeMode = "light"; var themeMode; if (document.documentElement) { if (document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if (localStorage.getItem("data-bs-theme") !== null) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
    
    
    
    <!--end::Theme mode setup on page load-->
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->

            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <!--begin::Sidebar-->
                <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/sider.php';?>
                <!--end::sidebar menu-->
                <!--begin::Footer-->

                <!--end::Footer-->
            </div>
            <!--end::Sidebar-->
            <!--begin::Main-->
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <!--begin::Content wrapper-->
                <div class="d-flex flex-column flex-column-fluid">
                    <!--begin::Toolbar-->
                    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                        <!--begin::Toolbar container-->
                        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                            <!--begin::Page title-->
                            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                                <!--begin::Title-->
                                <h1
                                    class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                    Trang Chủ</h1>
                                <!--end::Title-->
                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        <a href="/" class="text-muted text-hover-primary">Home</a>
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item">
                                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">Bảng Tính</li>
                                    <!--end::Item-->
                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Page title-->
                            <!--begin::Actions-->
                                    <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_create_app">
                                    <?=tien($user['money']);?>đ
                                </a>
                                </row>
                                <!--end::Primary button-->
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar container-->
                    </div>
                    <?php if(empty($_SESSION['session'])){ ?>
                    
<?php }?>
<?php if(empty($_SESSION['session'])){ ?>
                    <script>
     function khangapi() {
                cuteToast({
                    type: "error",
                    message: "Bạn Chưa Đăng Nhập",
                    timer: 2000
                });
            }
            khangapi();
</script>
<?php }?>
                    <!--end::Toolbar-->

                    <script>
        window.onload = function() {
            const audio = document.getElementById('background-music');
            audio.volume = 0.5; // Đặt âm lượng từ 0.0 đến 1.0
            audio.play().catch(error => {
                console.error('Không thể tự động phát nhạc:', error);
                // Nếu trình duyệt chặn phát nhạc tự động, có thể yêu cầu người dùng nhấn nút
                document.getElementById('play-button').style.display = 'block';
            });
        };

        function playMusic() {
            const audio = document.getElementById('background-music');
            audio.play();
            document.getElementById('play-button').style.display = 'none'; // Ẩn nút sau khi phát
        }
    </script>
</head>
<body>
    <audio id="background-music">
        <source src="chao3.mp3" type="audio/mpeg">
        Your browser does not support the audio tag.
    </audio>

                    <!--begin::Content-->
                    <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-fluid">
                    
      <!--  <div class="col-lg-12">
                <div class="alert bg-white alert-primary" role="alert">
                    <div class="iq-alert-icon">
                        <i class="ri-alert-line"></i>
                        <center>
                        <p style="font-size: 15px; font-weight: bold; color: rgba(30 144 255); text-align: center;">
                    </div>
                    <div class="card-hmanh">
                        <style>
                            .card-hmanh {
   width: 98%;
   margin: 0 auto; 
   background: white;
   padding: 15px;
   border-radius: 8px;
   box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.flex_ad_hmanh {
   display: flex;
   margin: 5px 10px 5px 0px ;
   align-items: center;
}

.flex_img {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 10px;
    max-height: 100%;
    height: auto;
    margin-top: 10px;
}

.box_img {
    flex: 1 1 45%; 
    max-width: 45%; 
}

.box_img img {
    width: 100%;
    height: auto;
    display: block;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    border-radius: 10px;
}

@media only screen and (max-width: 600px) {
.box_img img {
    width: 100%;
    height: auto;
    display: block;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    border-radius: 10px;
}
.flex_img {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 10px;
    max-height: 100%;
    height: auto;
    margin-top: 10px;
}

.box_img {
    flex: 1 1 95%; 
    max-width: 95%; 
}
}

.time_recently {
   width: 100%;
   background: rgba(0, 0, 0, 0.1);
   padding: 7px;
   border-radius: 5px;
}

.submit_hmanh {
   float: right;
   font-weight: bold;
   border: none;
   padding: 5px;
   clear: both;
   background-image: linear-gradient(to right bottom, rgba(21, 61, 216, 0.84), rgba(75, 103, 208, 0.84));
   border-radius: 5px;
   color: white;
}

.name_ad {
   font-weight: bold;
   font-size: 15px;
   margin-left: 10px;
}

.flex_giam_gia {
  display: flex;
  justify-content: center;
}

.giam_gia {
   background-image: linear-gradient(to bottom right, rgba(237, 207, 46, 0.74), rgba(226, 212, 133, 0.84), rgba(237, 207, 46, 0.74));
   padding: 5px;
   border-radius: 4px;
   margin: 5px 2px 5px 2px;
   width: 50%;
   text-align: center;
}

.img_ad_hmanh {
   height: 31px;
   width: 31px;
}

.text_con {
   color: rgba(255, 0, 0, 0.8);
   border-radius: 8px;
   padding: 6px;
   width: 100%;
   border: solid 1px rgba(255, 97, 0, 0.8);
}

.noidungphu {
   color: rgba(0, 0, 0, 0.48);
   font-size: 14px;
   font-family: 'Open sans';
}

.title_noidung {
   font-size: 14px;
   font-weight: bold;
   font-family: 'Open sans';
   margin-top: 10px;
}

.time_ad_source {
   font-weight: bold;
   font-size: 12px;
   margin-left: 10px;
   color: rgba(0, 0, 0, 0.48);
}

.right_view {
   background: rgba(0, 0, 0, 0.05);
   padding: 5px;
   border-radius: 15px;
}

.box_noidung {
   width: 97%;
   margin: 0 auto;
   border: dashed 1px black;
   padding: 8px;
   border-radius: 13px;
   overflow: hidden; 
}

                        </style>
                                                        
                                                        <div class="flex_ad_hmanh">
                                                        <div>
                                                        <img class="img_ad_hmanh" src="https://i.imgur.com/TaGLiwN.png" style="border-radius: 30%;" alt="hmanh-img">
                                                        </div>
                                                        <div>
                                                        <div class="name_ad">
                                                        <?=$chinhapi['name_ad'];?> <img src="https://i.imgur.com/Fcupuom.gif" alt="hmanh" style="height: 13px;">
                                                        </div>
                                                        <div class="time_ad_source">
                                                        Cập Nhật Lúc  <?=$time;?>
                                                        </div>
                                                        </div>
                                                        
                                                        </div>
                    <div class="iq-alert-text"><?=$chinhapi['thongbao'];?></div>
                </div>
            </div>
            </br>-->
                            <!--begin::Row-->

                            <div class="row gy-5 g-xl-10">
					<?php if(isset($_SESSION['session'])){ ?>
									  <div class="col-md-3 mb-4">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="fw-medium text-muted mb-0">Số Dư Khả Dụng</p>
                            <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value counted" data-kt-countup="true" data-kt-countup-value=" 37 " data-kt-initialized="1"><?=tien($user['money']);?><sup>đ</sup></span></h2>
                            <p class="mb-0 text-muted text-truncate"><span class="badge bg-light text-success mb-0">Số Dư Khả Dụng </span></p>
                        </div>
                        <div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-warning-subtle rounded-circle fs-2">
                                   <span class="svg-icon svg-icon-2x">
                                <script src="https://cdn.lordicon.com/lordicon.js"></script>
<lord-icon src="https://cdn.lordicon.com/jtiihjyw.json" trigger="loop" delay="1000" style="width:40px;height:40px">
</lord-icon>
                            </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mb-4">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="fw-medium text-muted mb-0">Tiền đã tiêu</p>
                            <h2 class="mt-4 ff-secondary fw-semibold">
                                <span class="counter-value"> <?=tien($user['tong_nap']-$user['money']);?><sup>đ</sup></span>
                            </h2>
                            <p class="mb-0 text-muted text-truncate"><span class="badge bg-light text-danger mb-0">Tổng Tiền Đã Tiêu</span></p>
                        </div>
                        <div>
                            <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-danger-subtle rounded-circle fs-2 svg-icon svg-icon-2x">
                               <script src="https://cdn.lordicon.com/lordicon.js"></script>
<lord-icon src="https://cdn.lordicon.com/dypzookn.json" trigger="hover" style="width:40px;height:40px">
</lord-icon> </span>
                           
                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="fw-medium text-muted mb-0">Mã Nguồn Đã Mua</p>
                            <h2 class="mt-4 ff-secondary fw-semibold">
                                <span class="counter-value counted" data-target="3" data-kt-countup="true" data-kt-countup-value=" 17 " data-kt-initialized="1"><?=$code;?></span>
                            </h2>
                            <p class="mb-0 text-muted text-truncate"><span class="badge bg-light text-danger mb-0">Mã Nguồn Đã Mua</span></p>
                        </div>
                        <div>
                            <div class="avatar-sm flex-shrink-0">
                               <span class="avatar-title bg-primary-subtle rounded-circle fs-2 svg-icon svg-icon-2x">
                               <script src="https://cdn.lordicon.com/lordicon.js"></script>
<lord-icon src="https://cdn.lordicon.com/yedgackm.json" trigger="loop" delay="1000" style="width:40px;height:40px">
</lord-icon>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="fw-medium text-muted mb-0">Dịch Vụ Đang Sử Dụng</p>
                            <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value counted" data-kt-countup="true" data-kt-countup-value=" 50 " data-kt-initialized="1"><?=$tongdv;?></span></h2>
                            <p class="mb-0 text-muted text-truncate"><span class="badge bg-light text-success mb-0">Tổng Dịch Vụ Đang Sử Dụng</span></p>
                        </div>
                        <div>
                            <div class="avatar-sm flex-shrink-0">
                                <script src="https://cdn.lordicon.com/lordicon.js"></script>
                                <span class="avatar-title bg-primary-subtle rounded-circle fs-2">
                                   <lord-icon src="https://cdn.lordicon.com/pcllgpqm.json" trigger="loop" delay="1000" style="width:40px;height:40px">
</lord-icon>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <script>
     function khangapi() {
                cuteToast({
                    type: "success",
                    message: "Chúc Bạn Sd Dịch Vụ Vui Vẻ :)",
                    timer: 3000
                });
            }
            khangapi();
</script>
        
                                <?php }?>
                                
<style>
/* Mobile (max-width: 576px) */
@media (max-width: 400px) {
    .title-responsive {
        display: block;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        max-width: 150px; /* Adjust this width based on your design */
    }
}

/* Desktop (min-width: 500px) */
@media (min-width: 500px) {
    .title-responsive {
        display: block;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        max-width: 200px; /* Adjust this width for desktop */
    }
}

</style>
<div id="flower-container"></div>
<style>
    #flower-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none; /* Để không cản trở việc tương tác với các thành phần khác */
    overflow: hidden;
}

.flower {
    position: absolute;
    width: 30px;
    height: 30px;
    background-image: url('path_to_flower_image.png'); /* Đường dẫn tới hình ảnh hoa */
    background-size: cover;
    animation: fall linear infinite;
}

@keyframes fall {
    0% {
        transform: translateY(-100px);
        opacity: 1;
    }
    100% {
        transform: translateY(100vh);
        opacity: 0;
    }
}

</style>
<script>
    function createFlower() {
    const flower = document.createElement('div');
    flower.classList.add('flower');
    
    // Đặt vị trí hoa rơi ngẫu nhiên trên màn hình
    flower.style.left = Math.random() * 100 + 'vw'; // vị trí ngang ngẫu nhiên
    flower.style.animationDuration = Math.random() * 3 + 2 + 's'; // thời gian rơi ngẫu nhiên từ 2s đến 5s
    flower.style.opacity = Math.random(); // độ trong suốt ngẫu nhiên
    
    document.getElementById('flower-container').appendChild(flower);

    // Loại bỏ hoa khi rơi xong
    setTimeout(() => {
        flower.remove();
    }, 5000); // 5 giây sau khi rơi hết
}

// Tạo hoa liên tục
setInterval(createFlower, 300);
</script>

                                <?php
function truncateTitle($title, $maxLength = 25) {
    if (strlen($title) > $maxLength) {
        return substr($title, 0, $maxLength) . '...'; // Add ellipsis
    }
    return $title;
}

$result = mysqli_query($ketnoi, "SELECT * FROM `khocode` WHERE `ghim`='ON' ORDER BY `id` DESC ");
while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="col-xl-3 col-md-6 col-6"> <!-- Adjust to make 2 equal columns on mobile (col-6) -->
        <div class="card shadow-sm card-xl-stretch mb-3 mb-xl-3 rainbow-border"> <!-- Use rainbow-border class for the effect -->
            <badge class="hk-pinned img-badge left jb-red"><i>Ghim Đầu Trang</i></badge>
            <div class="w-100 d-flex flex-column flex-center rounded-3 bg-opacity-55 py-4 px-4">

                <div class="mb-3 text-center position-relative">
                    <h1 class="text-dark mb-5 fw-bolder">
                        <img class="hover-elevate-up card-animate card-img-top rounded" src="<?=$row['img'];?>" data-src="<?=$row['img'];?>" alt="" loading="lazy" onclick="if (!window.__cfRLUnblockHandlers) return false; zoomImage(this);">
                    </h1>
                    <div class="text-black-800 fs-5 fw-semibold mb-3 title-responsive">
                        <?=htmlspecialchars($row['title']);?> <!-- Full title -->
                    </div>
                </div>

                <a href="/ma-nguon/<?=$row['id'];?>" class="access-lxtdeptrai btn btn-sm btn-primary"><i class="fas fa-shopping-cart mr-1"></i>Xem Ngay</a>
                </br>
            </div>
        </div>
    </div>
<?php } ?>
                                    <div class="col-lg-12 mb-3">
        <div class="text-center home-heading mb-3">
            <h3><i class="fa-solid fa-cart-shopping m-2 fs-3"></i> HOẠT ĐỘNG GẦN ĐÂY</h3>
        </div>
        <div style="height: 350px; overflow-x: hidden; overflow-y: auto;">
                                               <?php
                                            $result = mysqli_query($ketnoi, "SELECT * FROM `lich_su_hoat_dong` ORDER BY id DESC LIMIT 50");
                                            while ($row1 = mysqli_fetch_assoc($result)) {  ?>
                                <div class="feature-card">
                        <div class="feature-content d-flex justify-content-between align-items-start">
                            <div class="content-text">
                              <b>Username: </b>  <b style="color: green;"><?=hideName($row1['username']);?></b> <b style="color: red;">Vừa <?=ucwords($row1['hoatdong']);?></b> <b> Vào Lúc </b> <b style="color: blue;"> <?=$row1['time'];?></b>
                            </div>
                            <span class="badge bg-primary"><strong>Giá: <?=tien($row1['gia']);?>đ</strong></span>
                        </div>
                    </div>
                                        <?php } ?>   
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    
                                    <!--end::Statistics Widget 2-->
                                </div>
                                            
                                    <!--end::Statistics Widget 2-->
                <!--end::Content wrapper-->
                <!--begin::Footer-->
                </div>
                </div>
                </div>
                <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/foot.php';?>
                <!--end::Footer-->
                <!-- LIBRARY -->
    <script src="libs/typed.js@2.0.12/typed.js"></script>
    <script src="libs/sweetalert2@11/sweetalert2.js"></script>
    <script src='libs/jquery-v3.4.1/jquery.min.js'></script>
            <!-- DATA JS -->
    <script src="particles.js"></script>
    <script src="app.js"></script>
    <script src="index.js"></script>
    <?php if(isset($_SESSION['session'])){ ?>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/thongbao.php';?>
    <?php }?>
