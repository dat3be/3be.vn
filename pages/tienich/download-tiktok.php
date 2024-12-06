<?php
$downloadLink = '';  // Biến để lưu trữ liên kết tải xuống
$downloadmusic = '';  // Biến để lưu trữ liên kết tải xuống
$videoInfo = '';     // Biến để lưu trữ thông tin thêm về video

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_get'])) {
    $videoUrl = $_POST['video_url'];

    // Gửi yêu cầu API để lấy đường dẫn
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://tiktok-full-info-without-watermark.p.rapidapi.com/vid/index?url=$videoUrl",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: tiktok-full-info-without-watermark.p.rapidapi.com",
            "X-RapidAPI-Key: ca6181bda3msh7d3414d442373d2p1d915bjsnd909d7fb935b"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        // Decode JSON response
        $responseArray = json_decode($response, true);

        // Kiểm tra xem có lỗi hay không
        if (isset($responseArray['error'])) {
            echo "Error: " . $responseArray['error'];
        } else {
            // Sử dụng chỉ một URL từ mảng
            $urlToDownload = $responseArray['video'][0];
            $music = $responseArray['music'][0];
            $description = $responseArray['description'][0];
         $downloadLink = "<a href=\"$urlToDownload\" download target=\"_blank\"><button class=\"btn btn-dark btn-sm\">Video Không Logo</button></a>";
$downloadmusic = "<a href=\"$music\" download target=\"_blank\"><button class=\"btn btn-primary btn-sm\">Nhạc Video</button></a>";
$downloaddescription = "<a href=\"$description\" download target=\"_blank\"><button class=\"btn btn-danger btn-sm\">Mô Tả Video</button></a>";

            // Trích xuất thông tin thêm về video
            // Thêm thẻ video vào biến videoInfo
            $videoInfo .= "<video width='640' height='360' controls>";
            $videoInfo .= "<source src='$urlToDownload' type='video/mp4'>";
            $videoInfo .= "</video>";
            // Thêm các trường khác nếu cần
        }
    }
}

?>
<head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head2.php';?>

    <title>Tải Video Tiktok |
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
                                    Tải Video Tiktok</h1>
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
                                                <form action="" method="post">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">Link video</label>
                                                        <input type="text" class="form-control" id="video_url" placeholder="Nhập link video tiktok" name="video_url">
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" id="btn_get" name="btn_get" class="btn-primary btn btn-sm mt-2 col-12">
                                                            <strong> Kiểm tra </strong>
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
                                                <div class="col-md-12">
                                                    <!-- Hiển thị liên kết tải xuống và thông tin thêm về video ở đây -->
                                                      <div id="show_data">
                                                    
                                                        <?php echo $downloadLink; ?> <?php echo $downloadmusic; ?>
                                                       <br>
                                                       
                                                        <br>
                                                        <strong><?php
                                // Hiển thị mô tả video
                                if (isset($responseArray['description'])) {
                                    echo "<p>{$responseArray['description'][0]}</p>";
                                }
                            ?> </strong>
                            <br>
                                                        <?php echo $videoInfo; ?>
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
     <?php
ob_start();
?>
<?php
$script = ob_get_clean();
?>
 <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/foot.php';?>
