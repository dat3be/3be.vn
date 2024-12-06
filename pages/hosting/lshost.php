<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head2.php';?>
    <title>Lịch Sử Mua Host | <?=$chinhapi['ten_web'];?></title>
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
                                    Lịch Sử Mua Host</h1>
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

                        <div class="row gy-5 g-xl">
                            <!--begin::Col-->
                            <div class="col-xl">
                                <!--begin::Tables Widget 3-->
                                <div class="card card-xl-stretch mb-5 mb-xl">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 pt-5">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bolder fs-3 mb-1">Lịch sử mua hosting</span>
                                            <span class="text-muted mt-1 fw-bold fs-7">Cập nhật <?=$time;?></span>
                                        </h3>
                                        <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-trigger="hover" title="Bấm để kiểm tra lại lịch sử mua">
                                            <a href="" class="btn btn-sm btn-light-primary">
                                                Reload
                                            </a>
                                        </div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body py-3">
                                        <!--begin::Table container-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table
                                                class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                                <!--begin::Table head-->
                                                <thead>
                                                    <tr class="fw-bolder text-muted">
                                                        <th class="w-25px">
                                                            <div
                                                                class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="1" data-kt-check="true"
                                                                    data-kt-check-target=".widget-9-check" />
                                                            </div>
                                                        </th>
                                                        <th class="min-w-30px text-center">ID</th>
                                                        <th class="min-w-180px text-center">Tên Miền</th>
                                                        <th class="min-w-100px text-center">Gói</th>
                                                        <th class="min-w-180px text-center">Ngày Bắt Đầu</th>
                                                        <th class="min-w-180px text-center">Ngày Hết Hạn</th>
                                                        <th class="min-w-150px text-center">Trạng Thái</th>
                                                        <th class="min-w-100px text-end">Thao Tác</th>
                                                    </tr>
                                                </thead>
                                                <!--end::Table head-->
                                                <!--begin::Table body-->
                                                <tbody>
                                                <?php
                                                $i =1;
                                            $result = mysqli_query($ketnoi,"SELECT * FROM `lich_su_mua_host` WHERE `username` = '$username' ORDER BY id");
                                            while($row1 = mysqli_fetch_assoc($result)) { ?>
                                                    <tr>
                                                        <td>
                                                            <div
                                                                class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input widget-9-check"
                                                                    type="checkbox" value="1" />
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div
                                                                class="text-dark fw-bold text-hover-primary d-block fs-6">
                                                                <center><?=$i++;?></center>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <a href="https://<?=$row1['domain'];?>/"
                                                                class="text-dark fw-bold text-hover-primary d-block fs-6">
                                                                <center><?=$row1['domain'];?></center>
                                                            </a>
                                                        </td>

                                                        <td>
                                                            <a
                                                                class="text-dark fw-bold text-hover-primary d-block fs-6">
                                                                <center><?=$row1['goi_host'];?></center>
                                                            </a>
                                                        </td>

                                                        <td>
                                                            <a
                                                                class="text-dark fw-bold text-hover-primary d-block fs-6">
                                                                <center>
                                                                    <?php echo date('h:i d-m-Y', $row1['ngay_mua']); ?>
                                                                </center>
                                                            </a>
                                                        </td>

                                                        <td>
                                                            <a
                                                                class="text-dark fw-bold text-hover-primary d-block fs-6">
                                                                <center>
                                                                    <?php echo date('h:i d-m-Y', $row1['ngay_het']); ?>
                                                                </center>
                                                            </a>
                                                        </td>

                                                        <td>
                                                            <center><?=host($row1['status']);?><center>
                                                        </td>

                                                        <td>
                                                            <div class="d-flex justify-content-end flex-shrink-0">
                                                                <a href="/quan-ly-host/<?=$row1['id'];?>"
                                                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                                    <i class="fa-solid fa-pen-to-square fs-2"><span
                                                                            class="path1"></span><span
                                                                            class="path2"></span></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Container-->
                        </div>
                        
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
            <!--end:::Main-->
        </div>
        <!--end::Wrapper-->
    </div>
   <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/foot.php';?>
    </div>
</body>
<!--end::Body-->

</html>