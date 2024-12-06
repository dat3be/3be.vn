<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head2.php';?>
   
    <title>Nạp Tiền | <?=$chinhapi['ten_web'];?></title>
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
                                   Chọn Cổng Thanh Toán</h1>
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
                              <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_create_app"><?=tien($user['money']);?>đ</a>
                                <!--end::Primary button-->
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar container-->
                    </div>
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
        <source src="nhacnt.mp3" type="audio/mpeg">
        Your browser does not support the audio tag.
    </audio>
                    <!--begin::Content-->
           <div class="container-xxl" id="kt_content_container">
                        <!--begin::Row-->
                        <div class="row gy-5 g-xl">
                            <!--begin::Col-->
                                   <div class="col-xl-4">
                                <div class="card card-xl-stretch mb-5 mb-xl-4">
                                    <!--begin::Option-->
                                    <div class="w-100 d-flex flex-column flex-center rounded-3 bg-opacity-55 py-8 px-8">
                                        <!--begin::Heading-->
                                        <div class="mb-3 text-center position-relative">
                                            <!--begin::Title-->
                                            <h1 class="text-dark mb-5 fw-bolder">
                                                <center>
                                                <img class="card-img-top rounded"
                                                    src="https://i.imgur.com/vshsIzG.png"
                                                    alt="img" />
                                            </h1>
                                            <!--end::Title-->

                                            <!--begin::Description-->
                                            <center>
                                            <div class="text-black-800 fs-4 fw-semibold mb-3">
                                                Nạp Thẻ Cào
                                            </div>
                                            <!--end::Description-->

                                            <!--begin::Price-->
                                            <div class="text-center">
                                                <span class="fs-2 fw-bold text-primary">
                                                    Auto nạp thẻ cào, xử lý nhanh
                                                </span>
                                            </div>
                                            <!--end::Price-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Select-->
                                        <a href="/nap-the" class="btn btn-sm btn-primary">Nạp
                                            Ngay</a>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Option-->
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::item-->
                            <div class="col-xl-4">
                                <div class="card card-xl-stretch mb-5 mb-xl-4">
                                    <!--begin::Option-->
                                    <div class="w-100 d-flex flex-column flex-center rounded-3 bg-opacity-55 py-8 px-8">
                                        <!--begin::Heading-->
                                        <div class="mb-3 text-center position-relative">
                                            <!--begin::Title-->
                                            <h1 class="text-dark mb-5 fw-bolder">
                                                <img class="card-img-top rounded"
                                                    src="https://websitecukcukvn.misacdn.net/wp-content/uploads/2023/01/media.png"
                                                    alt="img" />
                                            </h1>
                                            <!--end::Title-->

                                            <!--begin::Description-->
                                            <div class="text-black-800 fs-4 fw-semibold mb-3">
                                                Nạp ATM/ Ví điện tử
                                            </div>
                                            <!--end::Description-->

                                            <!--begin::Price-->
                                            <div class="text-center">
                                                <span class="fs-2 fw-bold text-primary">
                                                    Auto Bank, Duyệt Tiền 1-5p
                                                </span>
                                            </div>
                                            <!--end::Price-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Select-->
                                        <a href="/nap-bank" class="btn btn-sm btn-primary">Nạp
                                            Ngay</a>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Option-->
                                </div>
                            </div>
                            <!--begin::item-->
                            <div class="col-xl-4">
                                <div class="card card-xl-stretch mb-5 mb-xl-4">
                                    <!--begin::Option-->
                                    <div class="w-100 d-flex flex-column flex-center rounded-3 bg-opacity-55 py-8 px-8">
                                        <!--begin::Heading-->
                                        <div class="mb-3 text-center position-relative">
                                            <!--begin::Title-->
                                            <h1 class="text-dark mb-5 fw-bolder">
                                                <img class="card-img-top rounded"
                                                    src="https://i.imgur.com/I3q4HpT.png"
                                                    alt="img" />
                                            </h1>
                                            <!--end::Title-->

                                            <!--begin::Description-->
                                            <div class="text-black-800 fs-4 fw-semibold mb-3">
                                                Chăm Sóc Khách Hàng
                                            </div>
                                            <!--end::Description-->

                                            <!--begin::Price-->
                                            <div class="text-center">
                                                <span class="fs-2 fw-bold text-primary">
                                                   Team Support 24/7, Nhiệt Tình
                                                </span>
                                            </div>
                                            <!--end::Price-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Select-->
                                        <a href="/nap-bank" class="btn btn-sm btn-primary">Xem Ngay</a>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Option-->
                                </div>
                            </div>
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