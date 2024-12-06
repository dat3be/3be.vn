<html lang="en">
<!--begin::Head-->

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head2.php';?>

    <title>Up Ảnh |
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
                                    Up Ảnh Lấy Link</h1>
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

                            <!-- Form Upload Hình Ảnh -->
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Chọn hình ảnh để upload</label>
                                    <input type="file" name="image" class="form-control" id="image" required>
                                </div>
                                <button type="submit" name="upload" class="btn btn-primary">Upload và Lấy Link</button>
                            </form>

                            <!-- Ô riêng để hiển thị link hình ảnh và nút sao chép -->
                            <div id="image-link-box" class="mt-4 p-3 border border-white rounded" style="display: none;">
                                <h6 class="text-dark">Link hình ảnh:</h6>
                                <div class="input-group">
                                    <button class="btn btn-dark" id="copy-button">Sao chép</button>
                                    <input type="text" class="form-control" id="image-link" readonly>
                                </div>
                            </div>

                            <!-- Thông báo Toast -->

                            <?php
                            if (isset($_POST['upload'])) {
                                // Client ID từ Imgur
                                $client_id = '3352c129079eb4b'; //

                                // Đọc file ảnh
                                $image = file_get_contents($_FILES['image']['tmp_name']);
                                $image_base64 = base64_encode($image);

                                // Gửi yêu cầu POST lên API của Imgur
                                $ch = curl_init();
                                curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/image');
                                curl_setopt($ch, CURLOPT_POST, TRUE);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
                                curl_setopt($ch, CURLOPT_POSTFIELDS, array('image' => $image_base64));

                                // Lấy phản hồi từ Imgur
                                $response = curl_exec($ch);
                                curl_close($ch);

                                // Giải mã JSON trả về
                                $data = json_decode($response, true);

                                if ($data['success']) {
                                    // Link hình ảnh
                                    $image_link = $data['data']['link'];
                                    echo "<script>
                                            document.getElementById('image-link-box').style.display = 'block';
                                            document.getElementById('image-link').value = '$image_link';
                                          </script>";
                                } else {
                                    echo "<p class='mt-3 text-danger'>Upload thất bại!</p>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    // Hàm sao chép link vào clipboard
    document.getElementById('copy-button').addEventListener('click', function() {
        var copyText = document.getElementById('image-link');
        copyText.select();
        document.execCommand('copy');

        // Hiển thị thông báo sao chép thành công
        alert('Link đã được sao chép vào clipboard!');
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
