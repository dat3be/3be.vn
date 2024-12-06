<!DOCTYPE html>
<!--begin::Head-->

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head.php';?>
    <title>Quản Lý Miền | <?=$tozpie['ten_web'];?></title>
    <?php $titleweb="Quản Lý Miền";?>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/nav.php';?>
</head>
<!--end::Head-->
<?php
if(isset($_GET['id'])) {
$id = antixss($_GET['id']);
$check_host = $ketnoi->query("SELECT * FROM `history_domain` WHERE `id` = '$id' ");
if($check_host->num_rows == 1){
    $toz_mien = $ketnoi->query("SELECT * FROM `history_domain` WHERE `id` = '$id' ")->fetch_array();
    $loai_mien = $ketnoi->query("SELECT * FROM `khodomain` WHERE `duoimien` = '".$toz_mien['duoimien']."' ")->fetch_array();
    if($toz_mien['username']!=$username){
    echo '<script type="text/javascript">if(!alert("Miền không tồn tại hay không phải của bạn!")){window.location.href = "/";}</script>';
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
                            <!--begin::Hero-->
                            <div class="position-relative mb-4">
                                <!--begin::Overlay-->
                                <div class="overlay overlay-show">
                                    <h1>
                                        <center>THÔNG TIN QUẢN LÝ MIỀN</center>
                                    </h1>
                                    <h2 style="margin-top: 10px;">
                                        <center><span style="color: red;">(ID: <?=$toz_mien['id'];?>)</span>
                                        </center>
                                    </h2>
                                </div>
                            </div>
                            <!--end::-->
                            <div class="d-flex flex-column flex-lg-row">
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
                                                        <label class="col-lg-4 fs-4 fw-semibold">Tên miền</label>
                                                        <!--end::Label-->
                                                        <!--begin::Col-->
                                                        <div class="col-lg-8">
                                                            <a href="https://<?=$toz_mien['tenmien'].$toz_mien['duoimien'];?>/"
                                                                target="_blank"
                                                                class="text-dark fw-bold text-hover-primary d-block fs-4">
                                                                <?=$toz_mien['tenmien'].$toz_mien['duoimien'];?>
                                                            </a>

                                                        </div>
                                                        <!--end::Col-->
                                                    </div>
                                                    <!--end::Row-->
                                                    <!--begin::Input group-->
                                                    <div class="row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="col-lg-4 fs-4 fw-semibold">Ngày Mua<span
                                                                class="ms-1" data-bs-toggle="tooltip"
                                                                title="Ngày mua miền">
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
                                                                class="fw-bold fs-4 text-gray-800"><?=ngay($toz_mien['ngaymua']);?></span>
                                                        </div>
                                                        <!--end::Col-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="col-lg-4 fs-4 fw-semibold">Ngày hết hạn<span
                                                                class="ms-1" data-bs-toggle="tooltip"
                                                                title="Ngày hết hạn của miền">
                                                                <i class="ki-duotone ki-information fs-7">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                </i>
                                                            </span></label>
                                                        <!--end::Label-->
                                                        <div class="col-lg-8">
                                                            <span
                                                                class="fw-bold fs-4 text-gray-800"><?=ngay($toz_mien['ngayhet']);?></span>
                                                        </div>
                                                        <!--end::Col-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="col-lg-4 fs-4 fw-semibold">Phí gia hạn<span
                                                                class="ms-1" data-bs-toggle="tooltip"
                                                                title="Phí gia hạn của miền">
                                                                <i class="ki-duotone ki-information fs-7">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                </i>
                                                            </span></label>
                                                        <!--end::Label-->
                                                        <div class="col-lg-8">
                                                            <span
                                                                class="fw-bold fs-4 text-gray-800"><?=tien($loai_mien['gia']);?>đ/
                                                                <?=($loai_mien['thoihan']);?> ngày</span>
                                                        </div>
                                                        <!--end::Col-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="row mb-7">
                                                        <!--begin::Label-->
                                                        <label class="col-lg-4 fs-4 fw-semibold">Trạng thái
                                                            host</label>
                                                        <!--end::Label-->
                                                        <!--begin::Col-->
                                                        <div class="col-lg-8">
                                                            <span><?=status($toz_mien['status']);?></span>
                                                        </div>
                                                        <!--end::Col-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--end::Notice-->
                                                </div>
                                                <!--begin::Card body-->

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
            </div>
            <?php
            if(isset($_GET['add_record'])&&$_GET['add_record']==true){ ?>
            <div class="card card-xxl-stretch mt-5">
                <!--begin::Card body-->
                <div class="card-body d-flex flex-column justify-content-between h-100">
                    <div class="card-body">
                        <div class="row gx-5 gx-xl-10">
                            <div class="col-xl-12">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-semibold fs-3">Tên
                                    miền:</label>
                                <div class="col-lg-10 fv-row">
                                    <input type="text" id="tenmien"
                                        class="form-control form-control-lg form-control-solid"
                                        placeholder="Ví dụ: tozpie" />
                                </div>
                            </div>
                            <!--begin::Plans-->
                            <div class="col-xl-12">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-semibold fs-3">Domain:</label>
                                <div class="col-lg-10 fv-row">
                                    <input type="text" id="domain"
                                        class="form-control form-control-lg form-control-solid"
                                        placeholder="Vui lòng chọn tên miền" />
                                </div>
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <a href="/" class="btn btn-light btn-active-light-primary me-2">Cancel</a>
                        <button class="btn btn-primary" type="button" onclick="thanhtoan()">
                            <span id="button1" class="indicator-label">Thanh toán</span>
                            <span id="button2" class="indicator-progress" style="display: none;">Đang xử lý
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <?php } ?>
            <div class="card card-xxl-stretch mt-5">
                <!--begin::Card body-->
                <div class="card-body d-flex flex-column justify-content-between h-100">
                      <div class="col-xl">
                                <!--begin::Tables Widget 3-->
                                <div class="card card-xl-stretch mb-5 mb-xl">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 pt-5">
                                        <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold fs-3 mb-1">Danh sách bản ghi record</span>
                                    </br>
                                    <span class="text-muted mt-1 fw-semibold fs-7">Cập nhật <?=$time;?></span>

                                </h3>
                                <?php if($loai_mien['zone_id']==""){?>
                                <div class="card-toolbar ms-end" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-trigger="hover" title="Bấm để thêm bản ghi" style="text-align: right;">
                                    <a href="/add-record/<?=$toz_mien['id'];?>" class="btn btn-sm btn-light-primary">
                                        Thêm bản ghi <i class="fa-solid fa-plus"></i>
                                    </a>
                                </div>
                                <?php }?>
                            </div>
                            <!--end::Header-->
                            <div class="card-body py-3">
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                        <!--begin::Table head-->
                                        <thead>
                                            <tr class="fw-bold text-muted">
                                                <th class="w-25px">
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            data-kt-check="true"
                                                            data-kt-check-target=".widget-9-check" />
                                                    </div>
                                                </th>
                                                <th class="min-w-30px text-center">ID</th>
                                                <th class="min-w-180px text-center">Type</th>
                                                <th class="min-w-180px text-center">Name</th>
                                                <th class="min-w-180px text-center">Content</th>
                                                <th class="min-w-100px text-end">Thao Tác</th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <?php $i=1;?>
                                        <!--begin::Table body-->
                                        <tbody>

                                            <?php
                                            $result = mysqli_query($ketnoi,"SELECT * FROM `list_record_domain` WHERE `id_domain` = '".$toz_mien['id']."' ORDER BY id");
                                            while($row1 = mysqli_fetch_assoc($result)) { ?>
                                            <tr>
                                                <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input widget-9-check" type="checkbox"
                                                            value="1" />
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="text-dark fw-bold text-hover-primary d-block fs-6">
                                                        <center><?=$i++;?></center>
                                                    </div>
                                                </td>

                                                <td>
                                                    <a class="text-dark fw-bold text-hover-primary d-block fs-6">
                                                        <center><?=$row1['type'];?></center>
                                                    </a>
                                                </td>

                                                <td>
                                                    <a class="text-dark fw-bold text-hover-primary d-block fs-6">
                                                        <center><?=$row1['name'];?></center>
                                                    </a>
                                                </td>

                                                <td>
                                                    <a class="text-dark fw-bold text-hover-primary d-block fs-6">
                                                        <center><?=$row1['content'];?></center>
                                                    </a>
                                                </td>

                                                <td>
                                                    <div class="d-flex justify-content-end flex-shrink-0">
                                                        <a href="/edit-record/<?=$row1['id'];?>"
                                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                            <i class="fa-solid fa-pen-to-square fs-2"><span
                                                                    class="path1"></span><span class="path2"></span></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table container-->
                            </div>
                            <!--end::Card body-->
                        </div>
                    </div>
                </div>
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