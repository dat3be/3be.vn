<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head2.php';?>
    <title>Thông Tin | <?=$chinhapi['ten_web'];?></title>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/nav.php';?>

  <?php
    $check_id = antixss($_GET['id']);
    $api_checkid = $ketnoi->query("SELECT * FROM `giaweb` WHERE `code` = '$check_id' AND `status`='ON' ")->fetch_array();
    if (!($api_checkid)) {
        header("Location: /news");
        exit();
    } else {
        $id = antixss($_GET['id']);
        $api_code = $ketnoi->query("SELECT * FROM `giaweb` WHERE `code` = '$id' AND `status`='ON'  ")->fetch_array();
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
                                    Thông Tin Giá Tạo Website</h1>
                                <!--end::Title-->
                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-muted">
                                        <a href="../../demo1/dist/index.html"
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

                            <!--begin::Main column-->
                            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                                <!--begin:::Tabs-->
                                <ul
                                    class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
                                    <!--begin:::Tab item-->
                                    
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
                                            <style>
                                                .hoa-pcs {
                                                    border:5px;
                                                }
                                            </style>
                                            <div class="card card-flush py-0">
                                    <div class="ws-mb-4 ws--mx-2 md:ws--mx-0 ws-bg-white md:ws-rounded hoa-pcs"
                        style="background-image: url(https://cdns.diongame.com/static/Wbt9g97I1bTcyMc.png);background-position: top right; background-repeat:  no-repeat">
                                    <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general"
                                        role="tab-panel">
                                        </br>
                                                <!--begin::Card header-->
                                                <div class="card-header">
                                                    <div class="card-title">
                                                        <div style="text-align: center;">
    <h3><?=$api_code['name'];?></h3>
</div>


                                                    </div>
                                                </div>
                                                <!--end::Card header-->

                                                <!--begin::Card body-->
                                                <div class="card-body pt-0">

                                                    <!--begin::Input group-->
                                                        <!--end::Label-->

                                                        <!--begin::Editor-->
                                                        </br>
                                                        <div class="mb-2"></div>
                                                        <!--end::Editor-->
                                                        <div class="mb-2 text-gray-800 fs-4" readonly="">
                                                            <?=$api_code['content'];?>
                                                            <style>
    .btn-right {
        float: right;
    }
</style>
</br>
</br>
<a href="https://dichvumight.com/taoweb" class="btn btn-primary btn-right">
    Trở Lại Giá Tạo Website
</a>
</br>
</br>
                                                        </div>
                                                    </div>
                                                    
                                                    <!--end::Input group-->
                                                    
                    </div>
                                                    </div>
                                                    <!--end::Input group-->
                                                    
                    </div>
                    </div>
                                                    </div>


                                                    <!--end::Input group-->
                                                    
                    </div>
                    </div>
                                                    </div>
                                                    <!--end::Input group-->
                                                    
                    </div>
                    </div>
                                                    </div>
                                                    <!--end::Input group-->
                                                    
                    </div>
                    </div>
                                                    </div>
                                                    <!--end::Input group-->
                                                    
                    </div>
                    </div>
                                                    </div>
                                                    <!--end::Input group-->
                                                    
                    </div>
                    </div>
                                                    </div>
                                                    <!--end::Input group-->
                                                    
                    </div>
                    </div>
                                                    </div>
                                                    <!--end::Input group-->
                                                    
                    </div>
                    </div>
                                                    </div>
                                                    <!--end::Input group-->
                                                    
                    </div>
                    </div>
                                                    </div>
                                                    <!--end::Input group-->
                                                    
                    </div>
                    </div>
                                                    <!--end::Input group-->
                                                    
                    </div>
                    </div>
                                                    </div>
                                                    <!--end::Input group-->
                                                    
                    </div>
                    </div>
                                                    <!--end::Input group-->
                                                    
                    </div>
                    </div>
                                                    </div>
                                                    <!--end::Input group-->
                                                    
                    </div>
                    </br>
                    </br>
                    </br>
                    </br>
                    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/foot.php';?>
                    <!--end::Content-->
                </div>
            <!--end:::Main-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    </div>
