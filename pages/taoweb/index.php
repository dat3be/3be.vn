<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head2.php';?>
    <title>Trang Chủ | <?=$chinhapi['ten_web'];?></title>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/nav.php';?>
 
 

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
                                    <li class="breadcrumb-item text-muted">Dashboards</li>
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
                    <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div class="container-xxl" id="kt_content_container">
                <!--begin::Row-->
                <div class="row gy-5 g-xl-8">
                    <div class="flex-hmanh">
                        <?php 
                        $itemsPerPage = 10;
                        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                        $start = ($page - 1) * $itemsPerPage;
                        $totalItemsQuery = mysqli_query($ketnoi, "SELECT COUNT(*) AS total FROM `list_mau_web` WHERE `status`='ON'");
                        $totalItemsResult = mysqli_fetch_assoc($totalItemsQuery);
                        $totalItems = $totalItemsResult['total'];
                        $totalPages = ceil($totalItems / $itemsPerPage);
                        $result = mysqli_query($ketnoi, "SELECT * FROM `list_mau_web` WHERE `status`='ON' ORDER BY `id` DESC LIMIT $start, $itemsPerPage");

                        while($row = mysqli_fetch_assoc($result)) {
                            $title = $row['title'];
                            $maxLength = 25;

                            if (strlen($title) > $maxLength) {
                                $shortTitle = mb_substr($title, 0, $maxLength) . '...';
                            } else {
                                $shortTitle = $title;
                            }
                        ?>
                        <div class="box-hmanh">
                            <div class="flex-css">
                                <div class="hmanh-css" style="background: rgba(245, 0, 0, 0.61);"></div>
                                <div class="hmanh-css" style="background: rgba(253, 171, 67, 0.76);"></div>
                                <div class="hmanh-css" style="background: rgba(72, 167, 27, 1);"></div>
                            </div>
                            <img src="<?=$row['img'];?>" alt="<?=$shortTitle;?>" class="img-hmanh">
                            <p class="title-hmanh"><?=$shortTitle;?></p>
                            <div class="flex-gia">
                                <?php
                                $gia = $row['gia'];

                                if ($gia == 0) {
                                    echo '<div class="free-hmanh">Miễn phí</div>';
                                } elseif ($gia > 100000) {
                                    echo '<div class="money-hmanh">' . number_format($gia) . 'đ</div>';
                                } elseif ($gia > 0) {
                                    echo '<div class="tam-hmanh">' . number_format($gia) . 'đ</div>';
                                } else {
                                    echo number_format($gia) . 'đ';
                                }
                                ?>
                                <div class="text-title">
                                    <i style="color:rgba(57, 163, 255, 1);" class="fa-solid fa-code"></i> Mã Nguồn Website
                                </div>
                            </div>
                            <a href="/tao-web/<?=$row['id'];?>">
                                <div class="access-hmanh">Xem Ngay</div>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- Pagination -->
            <div class="pagination">
                <?php if($page > 1): ?>
                    <a class="page-left" href="/tao-web-page/<?=$page-1;?>"><i class="fa-solid fa-chevron-left"></i></a>
                <?php endif; ?>

                <?php for($i = 1; $i <= $totalPages; $i++): ?>
                    <a href="/tao-web-page/<?=$i;?>" class="page <?php if($i == $page) echo 'active-hmanh'; ?>"><?=$i;?></a>
                <?php endfor; ?>

                <?php if($page < $totalPages): ?>
                    <a class="page-right" href="/tao-web-page/<?=$page+1;?>"><i class="fa-solid fa-chevron-right"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
                </div>
                <!--end::Content wrapper-->
                <!--begin::Footer-->
                <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/foot.php';?>
                <!--end::Footer-->
            </div>
            <!--end:::Main-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    </div>



</body>
<!--end::Body-->

</html>