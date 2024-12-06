<head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head2.php';?>

    <title>Check Phạt Nguội |
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
                                    Check Phạt Nguội</h1>
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
                            
                            <!-- Form Nhập Biển Số và Loại Xe -->
                            <form id="check-fine-form" method="POST">
                                <div class="mb-3">
                                    <label for="bsx" class="form-label">Nhập biển số xe:</label>
                                    <input type="text" name="bsx" id="bsx" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="loaixe" class="form-label">Chọn loại xe:</label>
                                    <select name="loaixe" id="loaixe" class="form-control" required>
                                        <option value="1">Ô tô</option>
                                        <option value="2">Xe máy</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Tra Cứu</button>
                            </form>

                            <!-- Hiển thị kết quả -->
                            <div id="results" class="mt-4" style="display: none;">
                                <h6>Kết quả tra cứu:</h6>
                                <pre id="result-content"></pre>
                            </div>

                            <!-- Thông báo lỗi -->
                            <div id="error" class="text-danger mt-3" style="display: none;">
                                Không tìm thấy thông tin vi phạm!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
document.getElementById('check-fine-form').addEventListener('submit', function(e) {
    e.preventDefault(); // Ngăn submit form mặc định

    var bsx = document.getElementById('bsx').value;
    var loaixe = document.getElementById('loaixe').value;

    // URL API với biển số xe và loại xe
    var apiUrl = 'https://vietcheckcar.com/api/api.php?api_key=sfund&bsx=' + bsx + '&bypass_cache=0&loaixe=' + loaixe + '&vip=0';

    fetch(apiUrl)
    .then(response => response.json())
    .then(data => {
        // Xóa thông báo lỗi trước đó nếu có
        document.getElementById('error').style.display = 'none';

        // Kiểm tra nếu có dữ liệu vi phạm
        if (data && data.violations && data.violations.length > 0) {
            var resultContent = '';

            // Hiển thị chi tiết các vi phạm
            data.violations.forEach(violation => {
                resultContent += `Biển kiểm soát: ${violation.bien_kiem_sat}\n`;
                resultContent += `Màu biển: ${violation.mau_bien}\n`;
                resultContent += `Loại phương tiện: ${violation.loai_phuong_tien}\n`;
                resultContent += `Thời gian vi phạm: ${violation.thoi_gian_vi_pham}\n`;
                resultContent += `Địa điểm vi phạm: ${violation.dia_diem_vi_pham}\n`;
                resultContent += `Hành vi vi phạm: ${violation.hanh_vi_vi_pham}\n`;
                resultContent += `Đơn vị phát hiện: ${violation.don_vi_phat_hien_vi_pham}\n`;
                resultContent += `Nơi giải quyết: ${violation.noi_giai_quyet_vu_viec}\n`;
                resultContent += `Mức phạt: ${violation.muc_phat ? violation.muc_phat : 'Chưa có thông tin'}\n`;
                resultContent += `\n----------------------------\n\n`;
            });

            document.getElementById('results').style.display = 'block';
            document.getElementById('result-content').innerText = resultContent;
        } else {
            // Không có vi phạm, hiển thị thông báo lỗi
            document.getElementById('error').style.display = 'block';
            document.getElementById('results').style.display = 'none';
        }
    })
    .catch(error => {
        // Nếu có lỗi trong quá trình gọi API, hiển thị thông báo lỗi
        document.getElementById('error').innerText = 'Đã xảy ra lỗi khi kiểm tra phạt nguội.';
        document.getElementById('error').style.display = 'block';
        document.getElementById('results').style.display = 'none';
    });
});
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
     <?php
ob_start();
?>
<?php
$script = ob_get_clean();
?>
 <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/foot.php';?>
