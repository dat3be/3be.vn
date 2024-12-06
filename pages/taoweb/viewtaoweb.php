<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head2.php';?>
    <title>Quản lý web | <?=$chinhapi['ten_web'];?></title>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/nav.php';?>
</head>
<?php
if(isset($_GET['id'])) {
$id = $_GET['id'];
$check_host = $ketnoi->query("SELECT * FROM `lich_su_tao_web` WHERE `id` = '$id' ");
if($check_host->num_rows == 1){
    $api_site = $ketnoi->query("SELECT * FROM `lich_su_tao_web` WHERE `id` = '$id' ")->fetch_array();
    $loai_site = $ketnoi->query("SELECT * FROM `list_mau_web` WHERE `id` = '".$api_site['loaiweb']."' ")->fetch_array();
    if($api_site['username']!=$username){
    echo '<script type="text/javascript">if(!alert("Website không tồn tại hay không phải của bạn!")){window.location.href = "/history-host";}</script>';
    }
}else{
    echo '<script type="text/javascript">if(!alert("Website không tồn tại hay không phải của bạn!")){window.location.href = "/history-host";}</script>';
}
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
                                    Quản lý web </h1>
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
                       
                    <!--begin::Engage Widget 1-->
                    <div class="card card-xxl-stretch">
                        <!--begin::Card body-->
                        <div class="card-body d-flex flex-column justify-content-between h-100">
                            <div class="card-body p-lg-17">
                                <!--begin::Hero-->
                                <div class="position-relative mb-4">
                                    <!--begin::Overlay-->
                                    <div class="overlay overlay-show">
                                    <h1>
                                                <center>THÔNG TIN QUẢN LÝ WEB</center>
                                            </h1>
                                            <h2 style="margin-top: 10px;">
                                                <center>
                                                    <span style="color: red;">(<?=$api_site['domain'];?>)</span>
                                                </center>
                                            </h2>
                                        </div>
                                    </div>
                                    <!--end::-->
                                    <div class="d-flex flex-column flex-lg-row">
                                        <!--begin::Sidebar-->
                                        <div class="flex-column flex-lg-row-auto w-100 w-lg-200px mb-8 me-lg-20">
                                            <!--begin::Catigories-->
                                            <div class="mb-15">
                                                <h4 class="text-dark mb-7">Thao tác</h4>

                                                <!--begin::Menu-->
                                                <div
                                                    class="menu menu-rounded menu-column menu-title-gray-700 menu-state-title-primary menu-active-bg-light-primary fw-semibold">
                                                    <!--begin::Item-->
                                                    <div class="menu-item mb-1">
                                                        <!--begin::Link-->
                                                        <a type="button" onclick="showitem1()"
                                                            class="menu-link py-3 active" id="btn1">
                                                            Thông tin quản lý
                                                        </a>
                                                        <!--end::Link-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="menu-item mb-1">
                                                        <!--begin::Link-->
                                                        <a type="button" onclick="showitem2()" class="menu-link py-3"
                                                            id="btn4">
                                                            Gia hạn
                                                        </a>
                                                        <!--end::Link-->
                                                    </div>
                                                    <!--end::Item-->
                                                </div>
                                                <!--end::Menu-->
                                            </div>
                                        </div>
                                        <!--end::Catigories-->
                                        <!--begin::Content-->
                                        <div class="flex-lg-row-fluid">
                                            <!--begin::Extended content-->
                                            <div class="mb-13">
                                                <!--begin::Content-->
                                                <div class="mb-15">
                                                    <div class="row">
                                                        <!--begin::Content-->
                                                        <!--begin::Card body-->
                                                        <div class="card-body p-9" id="item1">
                                                            <!--begin::Row-->
                                                            <div class="row mb-7">
                                                                <!--begin::Label-->
                                                                <label class="col-lg-4 fs-4 fw-semibold">Tên
                                                                    miền</label>
                                                                <!--end::Label-->
                                                                <!--begin::Col-->
                                                                <div class="col-lg-8">
                                                                    <a href="https://<?=$api_site['domain'];?>/"
                                                                        target="_blank"
                                                                        class="text-dark fw-bold text-hover-primary d-block fs-4">
                                                                        <?=$api_site['domain'];?>
                                                                    </a>

                                                                </div>
                                                                <!--end::Col-->
                                                            </div>
                                                            <!--end::Row-->
                                                            <!--begin::Input group-->
                                                            <div class="row mb-7">
                                                                <!--begin::Label-->
                                                                <label class="col-lg-4 fs-4 fw-semibold">Tài khoản
                                                                    admin<span class="ms-1" data-bs-toggle="tooltip"
                                                                        title="Tài khoản dùng để quản lý">
                                                                        <i class="ki-duotone ki-information fs-7">
                                                                            <span class="path1"></span>
                                                                            <span class="path2"></span>
                                                                            <span class="path3"></span>
                                                                        </i>
                                                                    </span></label>
                                                                <!--end::Label-->
                                                                <!--begin::Col-->
                                                                <div class="col-lg-8">
                                                                    <span
                                                                        class="fw-bold fs-4 text-gray-800"><?=$api_site['user_admin'];?></span>
                                                                    <i class="fa-regular fa-copy"
                                                                        onclick="copytk_admin()"></i>
                                                                </div>

                                                                <script>
                                                                function copytk_admin() {
                                                                    var username = "<?=$api_site['user_admin'];?>";

                                                                    var tempInput = document.createElement("input");
                                                                    tempInput.setAttribute("value", username);
                                                                    document.body.appendChild(tempInput);
                                                                    tempInput.select();
                                                                    document.execCommand("copy");
                                                                    document.body.removeChild(tempInput);

                                                                    var copy = document.querySelector(".fa-copy");
                                                                    copy.classList.remove("fa-copy");
                                                                    copy.classList.add("fa-check-circle");
                                                                    setTimeout(function() {
                                                                        copy.classList.remove(
                                                                            "fa-check-circle");
                                                                        copy.classList.add("fa-copy");
                                                                    }, 1000);
                                                                }
                                                                </script>

                                                                <!--end::Col-->
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="row mb-7">
                                                                <!--begin::Label-->
                                                                <label class="col-lg-4 fs-4 fw-semibold">Mật khẩu
                                                                    admin<span class="ms-1" data-bs-toggle="tooltip"
                                                                        title="Mật khẩu dùng để đăng nhập host">
                                                                        <i class="ki-duotone ki-information fs-7">
                                                                            <span class="path1"></span>
                                                                            <span class="path2"></span>
                                                                            <span class="path3"></span>
                                                                        </i>
                                                                    </span></label>
                                                                <!--end::Label-->
                                                                <div class="col-lg-8" id="pass">
                                                                    <span class="fw-bold fs-4 text-gray-800"
                                                                        id="password">******</span>
                                                                    <i class="fa-regular fa-eye-slash"
                                                                        id="toggle-password"
                                                                        onclick="showpass_admin()"></i>
                                                                    <i class="fa-regular fa-copy" id="copy-password"
                                                                        onclick="copypass_admin()"></i>
                                                                </div>

                                                                <script>
                                                                function showpass_admin() {
                                                                    var password = document.getElementById("password");
                                                                    var toggle = document.getElementById(
                                                                        "toggle-password");

                                                                    if (password.innerHTML === "******") {
                                                                        password.innerHTML =
                                                                            "<?=$api_site['pass_admin'];?>";
                                                                        toggle.classList.remove("fa-eye-slash");
                                                                        toggle.classList.add("fa-eye");
                                                                    } else {
                                                                        password.innerHTML = "******";
                                                                        toggle.classList.remove("fa-eye");
                                                                        toggle.classList.add("fa-eye-slash");
                                                                    }
                                                                }

                                                                function copypass_admin() {
                                                                    var password = document.getElementById("password");
                                                                    var copy = document.getElementById("copy-password");

                                                                    var tempInput = document.createElement("input");
                                                                    var passwordValue = password.innerHTML ===
                                                                        "******" ?
                                                                        "<?=$api_site['pass_admin'];?>" : password
                                                                        .innerHTML;
                                                                    tempInput.setAttribute("value", passwordValue);
                                                                    document.body.appendChild(tempInput);
                                                                    tempInput.select();
                                                                    document.execCommand("copy");
                                                                    document.body.removeChild(tempInput);

                                                                    copy.classList.remove("fa-copy");
                                                                    copy.classList.add("fa-check-circle");
                                                                    setTimeout(function() {
                                                                        copy.classList.remove(
                                                                            "fa-check-circle");
                                                                        copy.classList.add("fa-copy");
                                                                    }, 1000);
                                                                }
                                                                </script>

                                                                <!--end::Col-->
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="row mb-7">
                                                                <!--begin::Label-->
                                                                <label class="col-lg-4 fs-4 fw-semibold">Trạng thái
                                                                    web</label>
                                                                <!--end::Label-->
                                                                <!--begin::Col-->
                                                                <div class="col-lg-8">
                                                                    <span><?=status($api_site['status']);?></span>
                                                                </div>
                                                                <!--end::Col-->
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--end::Notice-->
                                                        </div>
                                                        <!--begin::Card body-->
                                                        <div class="card-body p-9" id="item2" style="display: none;">
                                                            <!--begin::Row-->
                                                            <div class="row mb-7">
                                                                <!--begin::Label-->
                                                                <label class="col-lg-4 fs-4 fw-semibold">Ngày
                                                                    mua</label>
                                                                <!--end::Label-->
                                                                <!--begin::Col-->
                                                                <div class="col-lg-8">
                                                                    <span
                                                                        class="fw-bold fs-4 text-gray-800"><?=ngay($api_site['ngay_mua']);?></span>
                                                                </div>
                                                                <!--end::Col-->
                                                            </div>
                                                            <!--end::Row-->
                                                            <!--begin::Row-->
                                                            <div class="row mb-7">
                                                                <!--begin::Label-->
                                                                <label class="col-lg-4 fs-4 fw-semibold">Ngày hết
                                                                    hạn<span class="ms-1" data-bs-toggle="tooltip"
                                                                        title="Host sẽ tạm khoá sau ngày này">
                                                                        <i class="ki-duotone ki-information fs-7">
                                                                            <span class="path1"></span>
                                                                            <span class="path2"></span>
                                                                            <span class="path3"></span>
                                                                        </i>
                                                                    </span>
                                                                </label>
                                                                <!--end::Label-->
                                                                <!--begin::Col-->
                                                                <div class="col-lg-8">
                                                                    <span
                                                                        class="fw-bold fs-4 text-gray-800"><?=ngay($api_site['ngay_het']);?></span>
                                                                </div>
                                                            </div>
                                                            <!--end::Col-->
                                                            <!--begin::Row-->
                                                            <div class="row mb-7">
                                                                <!--begin::Label-->
                                                                <label class="col-lg-4 fs-4 fw-semibold">Phí gia hạn
                                                                    <span class="ms-1" data-bs-toggle="tooltip"
                                                                        title="Phí duy trì dịch vụ hosting hằng tháng">
                                                                        <i class="ki-duotone ki-information fs-7">
                                                                            <span class="path1"></span>
                                                                            <span class="path2"></span>
                                                                            <span class="path3"></span>
                                                                        </i>
                                                                    </span></label>
                                                                <!--end::Label-->
                                                                <!--begin::Col-->
                                                                <div class="col-lg-8">
                                                                    <span
                                                                        class="fw-bold fs-4 text-gray-800"><?=tien($loai_site['gia_han']);?>đ/
                                                                        tháng</span>
                                                                </div>
                                                                <!--end::Col-->
                                                            </div>
                                                            <!--end::Row-->
                                                            <div class="row mb-7">
                                                                <!--begin::Label-->
                                                                <label class="col-lg-4 fs-4 fw-semibold mb-3">
                                                                    Gia hạn
                                                                </label>
                                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                                    title="">
                                                                    <select name="giahan" id="giahan"
                                                                        aria-label="Select a Currency"
                                                                        data-control="select2"
                                                                        class="form-select form-select-solid form-select-lg">
                                                                        <option value="1">1 tháng</option>
                                                                        <option value="2">2 tháng</option>
                                                                        <option value="3">3 tháng</option>
                                                                    </select>
                                                            </div>
                                                            <!--end::Row-->
                                                            <div
                                                                class="card-footer d-flex justify-content-end py-6 px-9">
                                                                <button class="btn btn-primary"
                                                                    id="kt_account_profile_details_submit" type="button"
                                                                    onclick="giahan()">
                                                                    <span id="button1" class="indicator-label">Gia hạn
                                                                        Web</span>
                                                                    <span id="button2" class="indicator-progress"
                                                                        style="display: none;">Đang xử lý
                                                                        <span
                                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                         
                                            <!--end::Content-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!--end::Engage Widget 1-->
                     <script>
                        function giahan() {
                            const button1 = document.getElementById("button1");
                            const button2 = document.getElementById("button2");

                            button1.style.display = "none";
                            button2.style.display = "inline-block";
                            button2.disabled = true;

                            const username = "<?=$username;?>";
                            const id_web = "<?=$_GET['id'];?>";
                            const giahan = document.getElementById("giahan").value;


                            // Hiển thị sweet alert với nội dung xác nhận thanh toán
                            Swal.fire({
                                title: 'Xác nhận',
                                text: "Bạn có chắc chắn muốn gia hạn?",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Đồng ý',
                                cancelButtonText: 'Hủy bỏ'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    const xhr = new XMLHttpRequest();
                                    xhr.open("POST", "/ajax/taoweb/giahan.php");
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
                                                    text: "Gia hạn thành công, vui lòng đợi hệ thống kích hoạt trở lại",
                                                }).then(function() {
                                                    // Tải lại trang sau khi nhấn OK
                                                    location.reload();
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
                                        "&giahan=" + encodeURIComponent(giahan)
                                    );
                                } else {
                                    button1.style.display = "inline-block";
                                    button2.style.display = "none";
                                    button2.disabled = false;
                                }
                            });
                        }
                        </script>

                        <script>
                        function showitem1() {
                            document.getElementById("item1").style.display = "block";
                            document.getElementById("item2").style.display = "none";
                            document.getElementById("btn1").classList.add("active");
                            document.getElementById("btn2").classList.remove("active");
                        }

                        function showitem2() {
                            document.getElementById("item1").style.display = "none";
                            document.getElementById("item2").style.display = "block";
                            document.getElementById("btn1").classList.remove("active");
                            document.getElementById("btn2").classList.add("active");
                        }
                        </script>
                   
                </div>
            </div>
        <!--end::Col-->
    </div>
    <!--End::Row-->
    </div>
    <!--end::Container-->
    </div>
    <!--end::Content-->
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/foot.php';?>