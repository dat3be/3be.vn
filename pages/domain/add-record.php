<!DOCTYPE html>
<!--begin::Head-->

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head.php';?>
    <title>Add Record | <?=$tozpie['ten_web'];?></title>
    <?php $titleweb="Add Record";?>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/nav.php';?>
</head>
<!--end::Head-->
<?php
if(isset($_GET['id'])) {
$id = antixss($_GET['id']);
$check_host = $ketnoi->query("SELECT * FROM `history_domain` WHERE `id` = '$id' ");
if($check_host->num_rows == 1){
    $toz_mien = $ketnoi->query("SELECT * FROM `history_domain` WHERE `id` = '$id' ")->fetch_array();
    if($toz_mien['username']!=$username){
    echo '<script type="text/javascript">if(!alert("Miền không tồn tại hay không phải của bạn!")){window.location.href = "/";}</script>';
    }else{
        $loaimien = $ketnoi->query("SELECT * FROM `khodomain` WHERE `duoimien` = '".$toz_mien['duoimien']."' ")->fetch_array();
        if($loaimien['zone_id']!=""){
        echo '<script type="text/javascript">if(!alert("Miền này không hỗ trợ thêm Record!")){window.location.href = "/";}</script>';
        }
    }
}else{
    echo '<script type="text/javascript">if(!alert("Miền không tồn tại hay không phải của bạn!")){window.location.href = "/";}</script>';
}
}
?>
<!--begin::Body-->

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
                                    Mua Miền</h1>
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
                            <div class="d-flex align-items-center gap-2 gap-lg-3">
                                <!--begin::Filter menu-->
                                <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_create_app">
                                    <?=tien($user['money']);?>đ
                                </a>
                                <!--end::Primary button-->
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar container-->
                    </div>
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Container-->
                    <div class="container-xxl" id="kt_content_container">
                        <!--begin::Row-->
                        <div class="row gy-5 g-xl">
                            <div class="col-xl">
                            <div class="row">
            <div class="container">
                <div class="main-grid">
                    <div class="main-content ">
                        <div class="card border">
                            <div class="card-body">
                            <div class="row gx-5 gx-xl-10">
                                <!--begin::Plans-->
                                <div class="col-xl-12">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-3">
                                        Type
                                    </label>
                                    <div class="col-lg-10 fv-row">
                                        <select name="type" id="type" aria-label="Select a DNS Record Type"
                                            data-control="select2" class="form-select form-select-solid form-select-lg">
                                            <option value="A">A (IPv4 Address)</option>
                                            <option value="AAAA">AAAA (IPv6 Address)</option>
                                            <option value="CNAME">CNAME (Canonical Name)</option>
                                            <option value="MX">MX (Mail Exchange)</option>
                                            <option value="TXT">TXT (Text)</option>
                                            <option value="PTR">PTR (Pointer)</option>
                                            <option value="SOA">SOA (Start of Authority)</option>
                                            <option value="SRV">SRV (Service)</option>
                                            <option value="TLSA">TLSA (TLSA Certificate Association)</option>
                                        </select>
                                    </div>

                                </div>
                                <!--end::Content-->
                                <div class="col-xl-12">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-3">Name</label>
                                    <div class="col-lg-10 fv-row">
                                        <input type="text" name="name" id="name"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Nhập thông tin bản ghi, sử dụng @ cho root" />
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-3">Content</label>
                                    <div class="col-lg-10 fv-row">
                                        <input type="text" name="content" id="content"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Nhập địa chỉ ip,..." />
                                    </div>
                                </div>
                            </div>
                            <!--end::Content-->
                        </div>
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <a href="javascript:history.back()" class="btn btn-light btn-active-light-primary me-2">Quay
                                lại</a>
                            <button class="btn btn-primary" type="button" onclick="luu()">
                                <span id="button1" class="indicator-label">Thêm Bản Ghi</span>
                                <span id="button2" class="indicator-progress" style="display: none;">Đang xử lý
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Engage Widget 1-->
                <script>
                function luu() {
                    const button1 = document.getElementById("button1");
                    const button2 = document.getElementById("button2");

                    button1.style.display = "none";
                    button2.style.display = "inline-block";
                    button2.disabled = true; // Chặn người dùng bấm vào button2

                    const id = "<?=$id;?>";
                    const type = document.getElementById("type").value;
                    const name = document.getElementById("name").value;
                    const content = document.getElementById("content").value;

                    // Hiển thị sweet alert với nội dung xác nhận mua host
                    Swal.fire({
                        title: 'Xác nhận',
                        text: "Bạn có chắc chắn thông tin chính xác",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Đồng ý',
                        cancelButtonText: 'Hủy bỏ'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const xhr = new XMLHttpRequest();
                            xhr.open("POST", "/ajax/domain/add-record.php");
                            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                            xhr.onload = function() {
                                button1.style.display = "inline-block";
                                button2.style.display = "none";
                                button2.disabled = false; // Cho phép người dùng bấm vào button2 lại

                                if (xhr.status === 200) {
                                    const response = JSON.parse(xhr.responseText);
                                    if (response.success) {
                                        Swal.fire({
                                            icon: "success",
                                            text: "Thêm record thành công",
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
                                button2.disabled = false; // Cho phép người dùng bấm vào button2 lại

                                Swal.fire({
                                    icon: "error",
                                    text: "Error: " + xhr.statusText,
                                });
                            };
                            xhr.send(
                                "id=" + encodeURIComponent(id) +
                                "&type=" + encodeURIComponent(type) +
                                "&name=" + encodeURIComponent(name) +
                                "&content=" + encodeURIComponent(content)
                            );
                        } else {
                            button1.style.display = "inline-block";
                            button2.style.display = "none";
                            button2.disabled = false; // Cho phép người dùng bấm vào button2 lại
                        }
                    });
                }
                </script>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Col-->
    </div>
    <!--End::Row-->
    </div>
            <!--end::Col-->
        </div>
        <!--end::Col-->
    </div>
    <!--End::Row-->
    </div>
            <!--end::Col-->
        </div>
        <!--end::Col-->
    </div>
    <!--End::Row-->
    </div>
            <!--end::Col-->
        </div>
        <!--end::Col-->
    </div>
    <!--End::Row-->
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/foot.php';?>