<?php
$qrcodeImageUrl = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_get'])) {
    $input_url = $_POST["url"];
    $api_url = "https://is.gd/create.php?format=json&url=" . urlencode($input_url);
    $result = file_get_contents($api_url);

    if ($result !== false) {
        $response = json_decode($result, true);

        if (isset($response['shorturl'])) {
            $fake_link = $response['shorturl'];
            // Không có mã QR code
        } else {
            echo "<p>Failed to generate fake link. Check your input or try again later.</p>";
        }
    } else {
        echo "<p>Failed to connect to is.gd API. Check your internet connection.</p>";
    }
}

?>
<head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head2.php';?>

    <title>Fake Link |
        <?=$chinhapi['ten_web'];?>
    </title>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/nav.php';?>
    </head>
<style>
    #show_data {
    text-align: center; /* Căn giữa nội dung */
    max-width: 640px;   /* Kích thước tối đa của khung */
    margin: 0 auto;     /* Căn giữa khung trên trình duyệt */
}

/* Video */
#show_data video {
    width: 100%;        /* Độ rộng video 100% của khung */
    height: auto;       /* Chiều cao tự động để giữ tỷ lệ khung hình */
    max-height: 360px;  /* Chiều cao tối đa của video */
}
</style>
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
                                    Fake Link</h1>
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
                                <form method="POST" action="">
                                    <div class="form-group">
                                        <label for="url" class="form-label">URL:</label>
                                        <input type="text" class="form-control" id="url" placeholder="https://dichvucodes.net" name="url">
                                    </div><br>
                                    <div class="form-group">
                                        <button type="submit" name="btn_get" class="btn-primary btn btn-sm mt-2 col-12">
                                           <strong> Tạo ngay </strong>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="mt-4">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div id="show_data" class="d-inline-block align-middle">
                                        <?php if (isset($fake_link)) : ?>
                                            <h2>Liên kết đã được tạo:</h2>
                                            <div class="fake-link-container">
                                            <p id="fakeLink" style="font-size: 20px; color: red;"><?= $fake_link ?> <i class="fa fa-clone copy-icon" onclick="copyFakeLink()"></i></p>
                                            </div>
                                        <?php endif; ?>
<script>
    function copyFakeLink() {
        const fakeLink = document.getElementById('fakeLink');
        const range = document.createRange();
        range.selectNode(fakeLink);
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(range);
        document.execCommand('copy');
        window.getSelection().removeAllRanges();

        // Sử dụng SweetAlert để hiển thị thông báo
        Swal.fire({
            title: 'Đã sao chép!',
            text: 'Liên kết đã được sao chép vào clipboard.',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    }
</script>
</div>
                                                </div>
                                            </div>
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
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
     <?php
ob_start();
?>
<?php
$script = ob_get_clean();
?>
 <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/foot.php';?>
