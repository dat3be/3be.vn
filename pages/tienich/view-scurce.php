<html lang="en">
<!--begin::Head-->

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head2.php';?>

    <title>Xem Mã Nguồn HTML |
        <?=$chinhapi['ten_web'];?>
    </title>
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
                                    Xem Mã Nguồn HTML</h1>
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
                            <form action="view-source" method="GET" class="mb-4">
                                <div class="mb-3">
                                    <label for="url" class="form-label">Nhập URL</label>
                                    <input type="text" name="url" id="url" class="form-control" placeholder="Nhập URL" value="<?= htmlspecialchars($_GET['url'] ?? ''); ?>" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Xem Mã Nguồn</button>
                            </form>
                            
<br>
                                                            <h3>Cách sử dụng công cụ này:</h3>
                                                            <ul>
                                                                <li>Quý khách vui lòng nhập https://domain.com để tránh không bị lấy được</li>
                                                            </ul>
                                                            <br>
                            <!-- Ô riêng để hiển thị mã nguồn HTML và nút sao chép -->
                            <?php if (isset($_GET['url']) && !empty($_GET['url'])): ?>
                                <?php
                                $url = filter_var($_GET['url'], FILTER_SANITIZE_URL);
                                if (filter_var($url, FILTER_VALIDATE_URL)) {
                                    $html = @file_get_contents($url);
                                    if ($html !== FALSE) {
                                        echo '<h6 class="text-dark">Mã nguồn HTML:</h6>';
                                        echo '<div class="code-box">';
                                        echo '<textarea id="html-code" readonly>' . htmlspecialchars($html) . '</textarea>';
                                        echo '</div>';
                                        echo '</br>';
                                        echo '<button class="btn btn-white" id="copy-button">Sao Chép</button>';
                                    } else {
                                        echo '<p class="mt-3 text-danger">Không thể lấy mã nguồn từ URL.</p>';
                                    }
                                } else {
                                    echo '<p class="mt-3 text-danger">URL không hợp lệ.</p>';
                                }
                                ?>
                            <?php endif; ?>
                        

<style>
    .code-box {
        border: 1px solid #ddd;
        padding: 15px;
        background-color: #f8f9fa;
        overflow-x: auto;
    }

    #html-code {
        width: 100%;
        height: 300px;
        border: none;
        background-color: #f8f9fa;
        overflow-y: auto;
    }
</style>

<script>
    // Hàm sao chép mã nguồn vào clipboard
    document.getElementById('copy-button').addEventListener('click', function() {
        var copyText = document.getElementById('html-code');
        copyText.select();
        document.execCommand('copy');

        // Hiển thị thông báo sao chép thành công
        alert('Mã nguồn đã được sao chép vào clipboard!');
    });
</script>

                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
            <!--end:::Main-->
        </div>
        <!--end::Wrapper-->
    </div>
    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</br>
</br>
</br>
   <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/foot.php';?>
    </div>
</body>
<!--end::Body-->

</html>