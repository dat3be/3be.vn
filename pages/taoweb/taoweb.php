<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head2.php';?>
    <title>View Web | <?=$chinhapi['ten_web'];?></title>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/nav.php';?>
</head>
 <?php
    $check_id = antixss($_GET['id']);
    $api_checkid = $ketnoi->query("SELECT * FROM `list_mau_web` WHERE `id` = '$check_id' AND `status`='ON' ")->fetch_array();
    if (!($api_checkid)) {
        header("Location: /tao-web");
        exit();
    } else {
        $id = antixss($_GET['id']);
        $api_code = $ketnoi->query("SELECT * FROM `list_mau_web` WHERE `id` = '$id' AND `status`='ON'  ")->fetch_array();
        mysqli_query($ketnoi, "UPDATE `list_mau_web` SET `view` = `view` + '1' WHERE `id` = '$id' ");
}
?>

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
                                    Tạo Trang Web</h1>
                                <!--end::Title-->
                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        <a href="/"
                                            class="text-muted text-hover-primary">Home</a>
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
                            <div class="d-flex align-items-center gap-2 gap-lg-3">
                                <!--begin::Filter menu-->
                                <a href="#" class="btn btn-sm fw-bold btn-success" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_create_app">
                                    Chiết khấu <?php if($username!=""){echo ($user['chiet_khau']);}else{echo'0';}?>%
                                </a>
                                <row>
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
                    <!--end::Toolbar-->
                    <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Container-->
                    <div class="container-xxl" id="kt_content_container">
                        <!--begin::Row-->
                        <form class="form d-flex flex-column flex-lg-row">
                            <!--begin::Aside column-->
                            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                                <!--begin::Thumbnail settings-->
                                <div class=".  card-flush py-6 mt-20">

                                    <!--begin::Card body-->
                                    <div class="d-flex justify-content-center align-items-center">
                                        <!--begin::Image input-->
                                        <div class="text-center mb-3" data-kt-image-input="true">
                                            <!--begin::Preview existing avatar-->
                                            <div class="image-input-wrapper" style="background-image: url(<?=$api_code['img'];?>);
                                                background-size: cover;
                                                background-position: center;
                                                width: 260px;
                                                height: 150px;
                                                border-radius: 4px;">
                                            </div>
                                            <!--end::Preview existing avatar-->
                                            <!--begin::Label-->
                                            <label class="w-200px h-20px bg-body text-center">
                                                <div class="text-black-800 fs-4 fw-semibold"><?=$api_code['title'];?>
                                                </div>
                                                <a
                                                    class="text-black-800 fs-4 fw-semibold"><?=tien($api_code['gia']);?>đ</a></br>
                                                Gia hạn: <a
                                                    class="text-black-800 fs-4 fw-semibold"><?=tien($api_code['gia_han']);?>đ/
                                                    1 tháng</a>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Image input-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Thumbnail settings-->
                            </div>

                            <!--end::Aside column-->

                            <!--begin::Main column-->
                            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                                <!--begin:::Tabs-->
                                <ul
                                    class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
                                    <!--begin:::Tab item-->
                                    <li class="nav-item">
                                        <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                            href="#kt_ecommerce_add_product_general">Thông tin</a>
                                    </li>
                                    <!--end:::Tab item-->
                                    <!--begin:::Tab item-->
                                    <li class="nav-item">
                                        <a class="nav-link text-active-primary pb-4" href="#">Đánh giá</a>
                                    
                                    </li>
                                    <!--end:::Tab item-->
                                </ul>
                                <!--end:::Tabs-->
                                <!--begin::Tab content-->
                               <div class="tab-content">
                                    <!--begin::Tab pane-->
                                    <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general"
                                        role="tab-panel">
                                        <div class="d-flex flex-column gap-7 gap-lg-10">

                                            <!--begin::General options-->
                                            <div class="card card-flush py-4">
                                                <!--begin::Card header-->
                                                <div class="card-header">
                                                    <div class="card-title">
                                                        <h2>Thông tin</h2>
                                                    </div>
                                                </div>
                                                <!--end::Card header-->

                                                <!--begin::Card body-->
                                                <div class="card-body pt-0">
                                                    <!--begin::Input group-->
                                                    <div class="mb-5 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required form-label">Product Name</label>
                                                        <!--end::Label-->

                                                        <!--begin::Input-->
                                                        <input type="text" name="product_name" class="form-control mb-2"
                                                            readonly="" value="<?=$api_code['title'];?>" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Input group-->
                                                    <div class="mb-5 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required form-label">Tên Miền</label>
                                                        <!--end::Label-->

                                                        <!--begin::Input-->
                                                        <input type="domain" id="domain" class="form-control mb-2"
                                                             placeholder="Nhập tên miền bạn đã mua" />
                                                            <label class="form-label">Nếu chưa có miền bạn có thể mua miền <a href="https://tenten.vn" target="_blank">tại đây</a></label>
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Input group-->
                                                    <div class="mb-5 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required form-label">User Admin</label>
                                                        <!--end::Label-->

                                                        <!--begin::Input-->
                                                        <input type="text" id="user_admin" class="form-control mb-2"
                                                            placeholder="Tên tài khoản admin" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Input group-->
                                                    <div class="mb-5 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required form-label">Pass Admin</label>
                                                        <!--end::Label-->

                                                        <!--begin::Input-->
                                                        <input type="text" id="pass_admin" class="form-control mb-2"
                                                            placeholder="Mật khẩu admin" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->

                                                    <!--begin::Input group-->
                                                    <div>
                                                        <!--begin::Label-->
                                                        <label class="form-label">Name Server</label>
                                                        <!--end::Label-->

                                                        <!--begin::Editor-->
                                                        <div class="mb-2"></div>
                                                        <!--end::Editor-->
                                                        <div class="mb-2 text-gray-800 fs-4" readonly="">
                                                        NS1: <?=$api_code['ns1'];?>
                                                        </br>NS2: <?=$api_code['ns2'];?>
                                                        <!--end::Label-->
                                                        </br>IP: <?=$api_code['ip'];?>
                                                        </div>
                                                        <label class="form-label">Mô Tả</label>
                                                      </br><?=$api_code['mo_ta'];?>
                                                        </div>
                                                    </div>
                                                    <!--end::Input group-->
                                                    <div class="d-flex justify-content-end mt-8"
                                                        style="margin-right: 20px;">
                                                        <!--begin::Button-->
                                                        <a href="/tao-web" class="btn btn-light me-5">
                                                            Quay lại
                                                        </a>
                                                        <!--end::Button-->
                                                        <!--begin::Button-->
                                                        <button type="button" onclick="thanhtoan()"
                                                            class="btn btn-primary">
                                                            <span id="button1" class="indicator-label">Mua ngay</span>
                                                            <span id="button2" class="indicator-progress"
                                                                style="display: none;">Đang xử lý
                                                                <span
                                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                            </span>
                                                        </button>
                                                        <!--end::Button-->
                                                    </div>
                                                </div>
                                                <!--end::Card header-->
                                            </div>
                                            <!--end::General options-->
                                        </div>
                                    </div>
                                    <!--end::Tab pane-->

                                </div>
                                <!--end::Tab content-->
                                <!--end::Main column-->

                            </div>

                        </form>
                        <script>
                        function thanhtoan() {
                            const button1 = document.getElementById("button1");
                            const button2 = document.getElementById("button2");

                            button1.style.display = "none";
                            button2.style.display = "inline-block";
                            button2.disabled = false;

                            const username = "<?=$username?>";
                            const id_web = "<?=$_GET['id']?>";
                            const domain = document.getElementById("domain").value;
                            const user_admin = document.getElementById("user_admin").value;
                            const pass_admin = document.getElementById("pass_admin").value;


                            // Hiển thị sweet alert với nội dung xác nhận thanh toán
                            Swal.fire({
                                title: 'Xác nhận',
                                text: "Thông tin đã chính xác?",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Đồng ý',
                                cancelButtonText: 'Hủy bỏ'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    const xhr = new XMLHttpRequest();
                                    xhr.open("POST", "/ajax/taoweb/xulytaoweb");
                                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                    xhr.onload = function() {
                                        button1.style.display = "inline-block";
                                        button2.style.display = "none";
                                        button2.disabled = false;

                                        if (xhr.status === 200) {
                                            const response = JSON.parse(xhr.responseText);
                                            if (response.success) {
                                                Swal.fire({
                                                    icon: "success",
                                                    text: "Tạo web thành công, vui lòng đợi admin duyệt",
                                                }).then(function() {
                                                    // Tải lại trang sau khi nhấn OK
                                                    window.location.href = "/history-tao-web";
                                                });
                                            } else {
                                                Swal.fire({
                                                    icon: "error",
                                                    text: response.message,
                                                });
                                            }
                                        } else {
                                            Swal.fire({
                                                icon: "error",
                                                text: "Error: " + xhr.statusText,
                                            });
                                        }
                                    };
                                    xhr.onerror = function() {
                                        button1.style.display = "inline-block";
                                        button2.style.display = "none";
                                        button2.disabled = false;

                                        Swal.fire({
                                            icon: "error",
                                            text: "Error: " + xhr.statusText,
                                        });
                                    };
                                    xhr.send(
                                        "username=" + encodeURIComponent(username) +
                                        "&id_web=" + encodeURIComponent(id_web) +
                                        "&domain=" + encodeURIComponent(domain) +
                                        "&user_admin=" + encodeURIComponent(user_admin) +
                                        "&pass_admin=" + encodeURIComponent(pass_admin)
                                    );
                                } else {
                                    button1.style.display = "inline-block";
                                    button2.style.display = "none";
                                    button2.disabled = false;
                                }
                            });
                        }
                        </script>
                      <?php
$lines = explode("\n", $api_code['list_img']); 
if (!empty($lines)) {
    foreach ($lines as $line) {
?>
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <div class="card-l-stretch mt-8">
                    <!--begin::Image-->
                    <img class="d-block card-rounded position-relative min-h-175px mb-5"
                        src="<?=trim($line);?>" alt="Image"
                        style="width: 100%; height: auto; cursor: pointer;" 
                        loading="lazy" 
                        onclick="zoomImage(this);">
                    <!--end::Image-->
                </div>
            </div>
        </div>
<?php


                            }
                        }
                        ?>
                        <!-- Add the following CSS code -->
                        <style>
                        .zoomed-image {
                            position: fixed;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            background-color: rgba(0, 0, 0, 0.8);
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            z-index: 9999;
                            cursor: zoom-out;
                        }

                        .zoomed-image img {
                            max-width: 90%;
                            max-height: 90%;
                        }
                        </style>

                        <!-- Add the following JavaScript code -->
                        <style>
                        .zoomed-image {
                            position: fixed;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            background-color: rgba(0, 0, 0, 0.8);
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            z-index: 9999;
                            cursor: zoom-out;
                        }

                        .zoomed-image img {
                            max-width: 90%;
                            max-height: 90%;
                            border-radius: 0.375rem;
                        }
                        </style>

                        <!-- Add the following JavaScript code -->
                        <script>
                        function zoomImage(image) {
                            var zoomedContainer = document.createElement('div');
                            zoomedContainer.className = 'zoomed-image';
                            zoomedContainer.onclick = function(event) {
                                if (event.target === zoomedContainer || event.target === zoomedImage) {
                                    zoomedContainer.remove();
                                }
                            };

                            var zoomedImage = document.createElement('img');
                            zoomedImage.src = image.src;
                            zoomedImage.classList.add('card-rounded'); // Add the 'card-rounded' class

                            zoomedContainer.appendChild(zoomedImage);
                            document.body.appendChild(zoomedContainer);
                        }
                        </script>

                        <!-- Add the following JavaScript code -->
                        
    
                    </div>
                    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/foot.php';?>
                    <!--end::Content-->
                </div>
            <!--end:::Main-->
        </div>

    </div>

    </div>
