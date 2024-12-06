<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head2.php';?>
    <title>Trang Chủ | <?=$chinhapi['ten_web'];?></title>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/nav.php';?>
        <?php
$id_host = ($_GET['id']);
$toz_host = $ketnoi->query("SELECT * FROM `list_host` WHERE `id` = '$id_host' AND `status` = 'ON' ")->fetch_array();
?>
<?php
   if ($chinhapi['status_hosting'] == 'OFF'){
        echo '<script type="text/javascript">if(!alert("Dịch vụ này hiện đang bảo trì!")){window.history.back().location.reload();}</script>';
   }
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
                                    Thanh Toán Host</h1>
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
                                    <!--end::Header-->
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Container-->
                    <div class="container-xxl" id="kt_content_container">
                        <!--begin::Row-->
                        <!--begin::Engage Widget 1-->
                        <div class="card card-xxl-stretch">
                            <div class="row gy-5 g-xl-8">
                                <!--begin::Col-->
                                <!--begin::Col-->
                            
                                <!--begin::Engage Widget 1-->
                                <div class="card card-xxl-stretch">
                                    <!--begin::Card body-->
                                    <div class="card-body d-flex flex-column justify-content-between h-100">
                                        <div class="card-body">
                                            <div class="row gx-5 gx-xl-10">
                                   <!--begin::Plans-->
                                                <div class="col-xl-12">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-3">Gói
                                                                                              host:</label>

                                        <div class="col-lg-10 fv-row">
                                            <select name="goi" id="goi" aria-label="Select a Currency"
                                                data-control="select2"
                                                class="form-select form-select-solid form-select-lg"
                                                onchange="gotoPage()">
                                                <option value="<?=$toz_host['id'];?>"><?=$toz_host['name_host'];?> -
                                                    <?=$toz_host['dung_luong'];?> - <?=tien($toz_host['gia_host'] - $toz_host['gia_host'] * $user['chiet_khau'] /100);?>đ
                                                </option>
                                                <?php
                                            $result = mysqli_query($ketnoi,"SELECT * FROM `list_host` WHERE `id` != '$id_host' ");
                                            while($row = mysqli_fetch_assoc($result)) { ?>
                                                <option value="<?=$row['id'];?>">
                                                    <?=$row['name_host'];?> - <?=$row['dung_luong'];?> -
                                                    <?=tien($row['gia_host'] - $row['gia_host'] * $user['chiet_khau'] /100);?>đ
                                                </option>
                                                <?php } ?>
                                            </select>
                                            <script>
                                            function gotoPage() {
                                                var selectBox = document.getElementById("goi");
                                                var selectedValue = selectBox.options[selectBox.selectedIndex].value;
                                                window.location.href = "/thanh-toan-host/" + selectedValue;
                                            }
                                            </script>
                                        </div>
                                    </div>
                                                <!--end::Content-->
                                                <div class="col-xl-12">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-3">Tên
                                                        miền:</label>
                                                    <div class="col-lg-10 fv-row">
                                                        <input type="text" name="domain" id="domain"
                                                            class="form-control form-control-lg form-control-solid"
                                                            placeholder="Nhập tên miền của bạn" />
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <!--begin::Label-->
                                                    <label
                                                        class="col-lg-4 col-form-label required fw-semibold fs-3">Email:</label>
                                                    <div class="col-lg-10 fv-row">
                                                        <input type="text" name="email" id="email"
                                                            class="form-control form-control-lg form-control-solid"
                                                            placeholder="Nhập email của bạn" />
                                                    </div>
                                                </div>
                                            </div>
                                                                                        <!--end::Content-->
                                        </div>
                                                                                    <!--end::Content-->
                                        </div>
                                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                                            <a href="/server-hosting/<?=$toz_host['server_host'];?>"
                                                class="btn btn-light btn-active-light-primary me-2">Cancel</a>
                                            <button class="btn btn-primary" type="button" onclick="thanhtoan()">
                                                <span id="button1" class="indicator-label">Thanh toán</span>
                                                <span id="button2" class="indicator-progress"
                                                    style="display: none;">Đang xử lý
                                                    <span
                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                </span>
                                            </button>
                                            <script>
                                            function thanhtoan() {
                                                const button1 = document.getElementById("button1");
                                                const button2 = document.getElementById("button2");

                                                button1.style.display = "none";
                                                button2.style.display = "inline-block";
                                                button2.disabled = true; // Chặn người dùng bấm vào button2

                                                const username = "<?=$username;?>";
                                                const goi = "<?=$id_host;?>";
                                                const domain = document.getElementById("domain").value;
                                                const email = document.getElementById("email").value;

                                                // Hiển thị sweet alert với nội dung xác nhận mua host
                                                Swal.fire({
                                                    title: 'Xác nhận mua host',
                                                    text: "Bạn có chắc chắn muốn mua host này?",
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#3085d6',
                                                    cancelButtonColor: '#d33',
                                                    confirmButtonText: 'Đồng ý',
                                                    cancelButtonText: 'Hủy bỏ'
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        const xhr = new XMLHttpRequest();
                                                        xhr.open("POST", "/ajax/hosting/xulyhost");
                                                        xhr.setRequestHeader("Content-Type",
                                                            "application/x-www-form-urlencoded");
                                                        xhr.onload = function() {
                                                            button1.style.display = "inline-block";
                                                            button2.style.display = "none";
                                                            button2.disabled =
                                                                false; // Cho phép người dùng bấm vào button2 lại

                                                            if (xhr.status === 200) {
                                                                const response = JSON.parse(xhr
                                                                    .responseText);
                                                                if (response.success) {
                                                                    Swal.fire({
                                                                        icon: "success",
                                                                        text: "Mua host thành công, vui lòng đợi!",
                                                                    }).then(function() {
                                                    // Tải lại trang sau khi nhấn OK
                                                     window.location.href = "/history-hosting";
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
                                                                    text: "Error: " + xhr
                                                                        .statusText,
                                                                });
                                                            }
                                                        };
                                                        xhr.onerror = function() {
                                                            button1.style.display = "inline-block";
                                                            button2.style.display = "none";
                                                            button2.disabled =
                                                                false; // Cho phép người dùng bấm vào button2 lại

                                                            Swal.fire({
                                                                icon: "error",
                                                                text: "Error: " + xhr.statusText,
                                                            });
                                                        };
                                                        xhr.send(
                                                            "username=" + encodeURIComponent(username) +
                                                            "&goi=" + encodeURIComponent(goi) +
                                                            "&domain=" + encodeURIComponent(domain) +
                                                            "&email=" + encodeURIComponent(email)
                                                        );
                                                    } else {
                                                        button1.style.display = "inline-block";
                                                        button2.style.display = "none";
                                                        button2.disabled =
                                                            false; // Cho phép người dùng bấm vào button2 lại
                                                    }
                                                });
                                            }
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Card body-->
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Container-->
                </div>
                <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/foot.php';?>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->

</html>