<html lang="en">
<!--begin::Head-->

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head2.php';?>

    <title>Mã Hóa và Giải Mã |
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
                                    Mã Hóa và Giải Mã</h1>
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
                            <!-- Form chọn chức năng -->
                            <form action="" method="POST" class="mb-4">
                                <div class="mb-3">
                                    <label for="input" class="form-label">Nhập Dữ Liệu</label>
                                    <input type="text" name="input" id="input" class="form-control" placeholder="Nhập dữ liệu" value="<?= htmlspecialchars($_POST['input'] ?? ''); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="function" class="form-label">Chọn Chức Năng</label>
                                    <select name="function" id="function" class="form-control">
                                        <option value="md5_enc" <?= ($_POST['function'] ?? '') === 'md5_enc' ? 'selected' : ''; ?>>MD5 Encode</option>
                                        <option value="base64_enc" <?= ($_POST['function'] ?? '') === 'base64_enc' ? 'selected' : ''; ?>>Base64 Encode</option>
                                        <option value="base64_dec" <?= ($_POST['function'] ?? '') === 'base64_dec' ? 'selected' : ''; ?>>Base64 Decode</option>
                                        <option value="icube_enc" <?= ($_POST['function'] ?? '') === 'icube_enc' ? 'selected' : ''; ?>>ICube Encode</option>
                                        <option value="password_hash" <?= ($_POST['function'] ?? '') === 'password_hash' ? 'selected' : ''; ?>>Password Hash</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Thực Hiện</button>
                            </form>

                            <!-- Hiển thị kết quả -->
                            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                                <?php
                                $input = $_POST['input'];
                                $function = $_POST['function'];
                                $result = '';

                                switch ($function) {
                                    case 'md5_enc':
                                        $result = md5($input);
                                        break;
                                    case 'base64_enc':
                                        $result = base64_encode($input);
                                        break;
                                    case 'base64_dec':
                                        $result = base64_decode($input);
                                        break;
                                    case 'icube_enc':
                                        $result = icube_encode($input);
                                        break;
                                    case 'password_hash':
                                        $result = password_hash($input, PASSWORD_DEFAULT);
                                        break;
                                    default:
                                        $result = 'Chức năng không hợp lệ.';
                                        break;
                                }
                                ?>

                                <div class="mt-4">
        <h6 class="text-info">Kết Quả:</h6>
        <textarea id="resultText" class="form-control" readonly><?= htmlspecialchars($result); ?></textarea>
        <button class="btn btn-dark mt-2" onclick="copyToClipboard()">Sao chép</button>
    </div>
<?php endif; ?>

<script>
function copyToClipboard() {
    const resultText = document.getElementById('resultText');
    resultText.select();
    document.execCommand('copy');
    alert('Đã sao chép vào clipboard!');
}
</script>
                       
<style>
    .form-control[readonly] {
        background-color: #f8f9fa;
        cursor: not-allowed;
    }
</style>

<?php
// Hàm mã hóa ICube (giả định - tùy vào cách mã hóa ICube thực tế)
function icube_encode($input) {
    return base64_encode(str_rot13($input)); // Đây chỉ là ví dụ, thay đổi theo yêu cầu thực tế
}

function icube_decode($input) {
    return str_rot13(base64_decode($input)); // Đây chỉ là ví dụ, thay đổi theo yêu cầu thực tế
}
?>
<!--end::Content-->
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