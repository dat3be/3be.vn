<?php

$qrcodeImageUrl = null;  // Khởi tạo biến trước khi sử dụng

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_get'])) {
    $bankCode = $_POST['bank_code'];
    $accountNumber = $_POST['account_number'];
    $accountName = $_POST['account_name'];
    $amount = $_POST['amount'];
    $additionalInfo = $_POST['additional_info'];

    $apiUrl = "https://api.vietqr.io/image/{$bankCode}-{$accountNumber}-wgEtlNH.jpg?accountName={$accountName}&amount={$amount}&addInfo={$additionalInfo}";
    $qrcodeImageUrl = htmlentities($apiUrl);
}
$bankList = [
    '970415' => 'Ngân hàng TMCP Công thương Việt Nam - VietinBank',
    '970436' => 'Ngân hàng TMCP Ngoại Thương Việt  - Vietcombank',
    '970448' => 'Ngân hàng TMCP Phương Đông - OCB',
    '970418' => 'Ngân hàng TMCP Đầu tư và Phát triển Việt Nam - BIDV',
    '970405' => 'Ngân hàng Nông nghiệp và Phát triển Nông thôn Việt Nam - Agribank',
    '970422' => 'Ngân hàng TMCP Quân đội - MB',
    '970407' => 'Ngân hàng TMCP Kỹ thương Việt Nam - Techcombank',
    '970416' => 'Ngân hàng TMCP Á Châu - ACB',
    '970432' => 'Ngân hàng TMCP Việt Nam Thịnh Vượng - VPBank',
    '970423' => 'Ngân hàng TMCP Tiên Phong - TPBank',
    '970403' => 'Ngân hàng TMCP Sài Gòn Thương Tín - Sacombank',
    '970437' => 'Ngân hàng TMCP Phát triển Thành phố Hồ Chí Minh - HDBank',
    '970454' => 'Ngân hàng TMCP Bản Việt - VietCapitalBank',
    '970429' => 'Ngân hàng TMCP Sài Gòn - SCB',
    '970441' => 'Ngân hàng TMCP Quốc tế Việt Nam - VIB',
    '970443' => 'Ngân hàng TMCP Sài Gòn - Hà Nội - SHB',
    '970431' => 'Ngân hàng TMCP Xuất Nhập khẩu Việt Nam - Eximbank',
    '970426' => 'Ngân hàng TMCP Hàng Hải - MSB',
    '546034' => 'TMCP Việt Nam Thịnh Vượng - Ngân hàng số CAKE by VPBank  - CAKE',
    '546035' => 'TMCP Việt Nam Thịnh Vượng - Ngân hàng số Ubank by VPBank  - Ubank',
    '963388' => 'Ngân hàng số Timo by Ban Viet Bank (Timo by Ban Viet Bank)  - TIMO',
    '971005' => 'Viettel Money  - ViettelMoney',
    '971011' => 'VNPT Money  - VNPTMoney',
];
?> 
<head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head2.php';?>

    <title>Tạo Qr Bank |
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
                                    Tạo QR Bank</h1>
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
                                        <label for="" class="form-label">Chọn Ngân Hàng:</label>
                                        <select class="form-control" name="bank_code" required>
                                            <?php foreach ($bankList as $bin => $name) : ?>
                                                <option value="<?= $bin ?>"><?= $name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Số Tài Khoản:</label>
                                        <input type="text" class="form-control" placeholder="Nhập số tài khoản" name="account_number">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Số Tiền:</label>
                                        <input type="text" class="form-control" placeholder="Nhập số tiền" name="amount">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Nội Dung Chuyển Tiền:</label>
                                        <input type="text" class="form-control" placeholder="Nhập nội dung" name="additional_info">
                                    </div><br>

                                    <div class="form-group">
                                        <button type="submit" name="btn_get" class="btn-primary btn btn-sm mt-2 col-12">
                                             <strong>Tạo ngay </strong>
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
        <?php if (isset($qrcodeImageUrl)) : ?>
            <h2>Mã QR được tạo:</h2>
            <img src="<?= $qrcodeImageUrl ?>" alt="QR Code" style="width: 200px; height: 200px;">

        <?php endif; ?>
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

