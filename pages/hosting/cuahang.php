<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head2.php';?>
    <?php
    $id_server = antixss($_GET['server']);
    $server = $ketnoi->query("SELECT * FROM `list_server_host` WHERE `id` = '$id_server' AND `status` = 'ON' ")->fetch_array();
    if(empty($server)){
        echo '<script type="text/javascript">setTimeout(function(){ location.href = "/" }, 0);</script>';
    }
    ?>
    <title><?=$server['name_server'];?> | <?=$chinhapi['ten_web'];?></title>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/nav.php';?>
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
                                     Danh Sách Server</h1>
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
                              <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_create_app"><?=tien($user['money']);?>đ</a>
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
                                <div class="card-body d-flex flex-column justify-content-between h-100">
                                    <div class="mb-13 text-center">
                                        <h1 class="fs-2hx fw-bold mb-5"><?=$server['name_server'];?></h1>

                                        <div class="text-gray-400 fw-semibold fs-5">
                                            Cần host có cấu hình cao hơn, vui lòng liên hệ <a href="<?=$chinhapi['telegram_admin'];?>"
                                                class="link-primary fw-bold">Admin</a>.
                                        </div>
                                    </div>
                                    <div id="host1">
                                        <div class="row g-10">
                                            <?php
                                    $result = mysqli_query($ketnoi,"SELECT * FROM `list_host` WHERE `server_host`='$id_server' ");
                                    while($row = mysqli_fetch_assoc($result)) { ?>
                                            <!--begin::item-->
                                            <div class="col-xl-4">
                                                <div class="d-flex h-100 align-items-center">
                                                    <!--begin::Option-->
                                                    <div
                                                        class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
                                                        <!--begin::Heading-->
                                                        <div class="mb-7 text-center">
                                                            <!--begin::Title-->
                                                            <h1 class="text-dark mb-5 fw-bolder">
                                                                <?=$row['name_host'];?>
                                                            </h1>
                                                            <!--end::Title-->

                                                            <!--begin::Description-->
                                                            <div class="text-gray-400 fw-semibold mb-5">
                                                                <?=$row['title_host'];?>
                                                            </div>
                                                            <!--end::Description-->

                                                            <!--begin::Price-->
                                                            <div class="text-center">
                                                                <span class="fs-2x fw-bold text-primary">
                                                                    <?=tien($row['gia_host']);?>
                                                                </span>
                                                                <span class="mb-2 text-primary">đ</span>
                                                                <span class="fs-7 fw-semibold opacity-50">/
                                                                    <span data-kt-element="period">Tháng</span>
                                                                </span>
                                                            </div>
                                                            <!--end::Price-->
                                                        </div>
                                                        <!--end::Heading-->

                                                        <!--begin::Features-->
                                                        <div class="w-100 mb-10">
                                                            <!--begin::Item-->
                                                            <div class="d-flex align-items-center mb-5">
                                                                <span
                                                                    class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">
                                                                    Dung Lượng: <?=$row['dung_luong'];?> </span>
                                                            </div>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <div class="d-flex align-items-center mb-5">
                                                                <span
                                                                    class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">
                                                                    Băng Thông: Không Giới Hạn
                                                                </span>
                                                                
                                                            </div>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <div class="d-flex align-items-center mb-5">
                                                                <span
                                                                    class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">
                                                                    Miền Khác: <?=$row['mien_khac'];?>
                                                                </span>
                                                                
                                                            </div>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <div class="d-flex align-items-center mb-5">
                                                                <span
                                                                    class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">
                                                                    Miền Bí Danh: <?=$row['bi_danh'];?>
                                                                </span>
                                                                
                                                            </div>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <div class="d-flex align-items-center mb-5">
                                                                <span
                                                                    class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">
                                                                    Các Thông Số Khác: Không Giới Hạn
                                                                </span>
                                                                
                                                            </div>
                                                            
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <div class="d-flex align-items-center mb-5">
                                                                <span
                                                                    class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">
                                                                    Giao diện: cPanel
                                                                </span>
                                                                
                                                            </div>
                                                            <!--end::Item-->
                                                            <!--begin::Item-->
                                                            <div class="d-flex align-items-center mb-5">
                                                                <span
                                                                    class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">
                                                                    Máy chủ: <?=$server['name_server'];?>
                                                                </span>
                                                                
                                                            
                                                            </div>
                                                            <div class="d-flex align-items-center mb-5">
                                                                <span
                                                                    class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3">
                                                                    Backup: Không Có 
                                                                </span>
                                                                </div>
                                                            <!--end::Item-->
                                                        </div>
                                                        <!--end::Features-->

                                                        <!--begin::Select-->
                                                        <a href="/thanh-toan-host/<?=$row['id'];?>"
                                                            class="btn btn-sm btn-primary">Lựa
                                                            chọn</a>
                                                        <!--end::Select-->
                                                    </div>
                                                    <!--end::Option-->
                                                </div>
                                            </div>
                                            <!--end::Col-->
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Container-->
                <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/foot.php';?>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->

</html>