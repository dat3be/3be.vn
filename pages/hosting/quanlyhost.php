<head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head2.php';?>
    <title>Quản lý host | <?=$chinhapi['ten_web'];?></title>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/nav.php';?>
    <?php
if(isset($_GET['id'])) {
$id = $_GET['id'];
$check_host = $ketnoi->query("SELECT * FROM `lich_su_mua_host` WHERE `id` = '$id' ");
if($check_host->num_rows == 1){
    $toz_host = $ketnoi->query("SELECT * FROM `lich_su_mua_host` WHERE `id` = '$id' ")->fetch_array();
    $loai_host = $ketnoi->query("SELECT * FROM `list_host` WHERE `name_host` = '".$toz_host['goi_host']."' ")->fetch_array();
    if($toz_host['username']!=$username){
    echo '<script type="text/javascript">if(!alert("Hosting không tồn tại hay không phải của bạn!")){window.location.href = "/history-hosting";}</script>';
    }
}else{
    echo '<script type="text/javascript">if(!alert("Hosting không tồn tại hay không phải của bạn!")){window.location.href = "/history-hosting";}</script>';
}
}
?>
<?php $server_host = $ketnoi->query("SELECT * FROM `list_server_host` WHERE `id` = '".$toz_host['server_host']."' ")->fetch_array();?>
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
                            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Container-->
                    <div class="container-xxl" id="kt_content_container">
                        <!--begin::Row-->
                       
                    <!--begin::Engage Widget 1-->
                    <div class="card card-xxl-stretch">
                        <!--begin::Card body-->
                        <div class="card-body d-flex flex-column justify-content-between h-100">
                            <div class="card-body p-lg-17">
                                <!--begin::Hero-->
                                <div class="position-relative mb-4">
                                    <!--begin::Overlay-->
                                    <div class="overlay overlay-show">
                                        <h1>
                                            <center>THÔNG TIN QUẢN LÝ HOST</center>
                                        </h1>
                                        <h2 style="margin-top: 10px;">
                                            <center><span style="color: red;">(ID: <?=$toz_host['id'];?>)</span>
                                            </center>
                                        </h2>
                                    </div>
                                </div>
                                <!--end::-->
                                <div class="d-flex flex-column flex-lg-row">
                                    <!--begin::Sidebar-->
                                    <div class="flex-column flex-lg-row-auto w-100 w-lg-200px mb-8 me-lg-20">
                                        <!--begin::Catigories-->
                                        <div class="mb-15">
                                            <h4 class="text-dark mb-7">Thao tác</h4>

                                            <!--begin::Menu-->
                                            <div
                                                class="menu menu-rounded menu-column menu-title-gray-700 menu-state-title-primary menu-active-bg-light-primary fw-semibold">
                                                <!--begin::Item-->
                                                <div class="menu-item mb-1">
                                                    <!--begin::Link-->
                                                    <a type="button" onclick="showitem1()" class="menu-link py-3 active"
                                                        id="btn1">
                                                        Thông tin đăng nhập
                                                    </a>
                                                    <!--end::Link-->
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="menu-item mb-1">
                                                    <!--begin::Link-->
                                                    <a type="button" onclick="showitem2()" class="menu-link py-3"
                                                        id="btn2">
                                                        Thông tin máy chủ
                                                    </a>
                                                    <!--end::Link-->
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="menu-item mb-1">
                                                    <!--begin::Link-->
                                                    <a type="button" onclick="showitem3()" class="menu-link py-3"
                                                        id="btn3">
                                                        Thao tác khác
                                                    </a>
                                                    <!--end::Link-->
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="menu-item mb-1">
                                                    <!--begin::Link-->
                                                    <a type="button" onclick="showitem4()" class="menu-link py-3"
                                                        id="btn4">
                                                        Gia hạn
                                                    </a>
                                                    <!--end::Link-->
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Menu-->
                                        </div>
                                    </div>
                                    <!--end::Catigories-->
                                    <!--begin::Content-->
                                    <div class="flex-lg-row-fluid">
                                        <!--begin::Extended content-->
                                        <div class="mb-13">
                                            <!--begin::Content-->
                                            <div class="mb-15">
                                                <div class="row">
                                                    <!--begin::Content-->
                                                    <!--begin::Card body-->
                                                    <div class="card-body p-9" id="item1">
                                                        <!--begin::Row-->
                                                        <div class="row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="col-lg-4 fs-4 fw-semibold">Tên miền</label>
                                                            <!--end::Label-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-8">
                                                                <a href="https://<?=$toz_host['domain'];?>/"
                                                                    target="_blank"
                                                                    class="text-dark fw-bold text-hover-primary d-block fs-4">
                                                                    <?=$toz_host['domain'];?>
                                                                </a>

                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Row-->
                                                        <!--begin::Input group-->
                                                        <div class="row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="col-lg-4 fs-4 fw-semibold">Tài khoản host<span
                                                                    class="ms-1" data-bs-toggle="tooltip"
                                                                    title="Tài khoản dùng để đăng nhập host">
                                                                    <i class="ki-duotone ki-information fs-7">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                    </i>
                                                                </span></label>
                                                            <!--end::Label-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-8">
                                                                <span
                                                                    class="fw-bold fs-4 text-gray-800"><?=$toz_host['tk_host'];?></span>
                                                                <i class="fa-regular fa-copy"
                                                                    onclick="copytk_host()"></i>
                                                            </div>

                                                            <script>
                                                            function copytk_host() {
                                                                var username = "<?=$toz_host['tk_host'];?>";

                                                                var tempInput = document.createElement("input");
                                                                tempInput.setAttribute("value", username);
                                                                document.body.appendChild(tempInput);
                                                                tempInput.select();
                                                                document.execCommand("copy");
                                                                document.body.removeChild(tempInput);

                                                                var copy = document.querySelector(".fa-copy");
                                                                copy.classList.remove("fa-copy");
                                                                copy.classList.add("fa-check-circle");
                                                                setTimeout(function() {
                                                                    copy.classList.remove("fa-check-circle");
                                                                    copy.classList.add("fa-copy");
                                                                }, 1000);
                                                            }
                                                            </script>

                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="col-lg-4 fs-4 fw-semibold">Mật khẩu host<span
                                                                    class="ms-1" data-bs-toggle="tooltip"
                                                                    title="Mật khẩu dùng để đăng nhập host">
                                                                    <i class="ki-duotone ki-information fs-7">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                    </i>
                                                                </span></label>
                                                            <!--end::Label-->
                                                            <div class="col-lg-8" id="pass">
                                                                <span class="fw-bold fs-4 text-gray-800"
                                                                    id="password">******</span>
                                                                <i class="fa-regular fa-eye-slash" id="toggle-password"
                                                                    onclick="showmk_host()"></i>
                                                                <i class="fa-regular fa-copy" id="copy-password"
                                                                    onclick="copymk_host()"></i>
                                                            </div>

                                                            <script>
                                                            function showmk_host() {
                                                                var password = document.getElementById("password");
                                                                var toggle = document.getElementById("toggle-password");

                                                                if (password.innerHTML === "******") {
                                                                    password.innerHTML = "<?=$toz_host['mk_host'];?>";
                                                                    toggle.classList.remove("fa-eye-slash");
                                                                    toggle.classList.add("fa-eye");
                                                                } else {
                                                                    password.innerHTML = "******";
                                                                    toggle.classList.remove("fa-eye");
                                                                    toggle.classList.add("fa-eye-slash");
                                                                }
                                                            }

                                                            function copymk_host() {
                                                                var password = document.getElementById("password");
                                                                var copy = document.getElementById("copy-password");

                                                                var tempInput = document.createElement("input");
                                                                var passwordValue = password.innerHTML === "******" ?
                                                                    "<?=$toz_host['mk_host'];?>" : password.innerHTML;
                                                                tempInput.setAttribute("value", passwordValue);
                                                                document.body.appendChild(tempInput);
                                                                tempInput.select();
                                                                document.execCommand("copy");
                                                                document.body.removeChild(tempInput);

                                                                copy.classList.remove("fa-copy");
                                                                copy.classList.add("fa-check-circle");
                                                                setTimeout(function() {
                                                                    copy.classList.remove("fa-check-circle");
                                                                    copy.classList.add("fa-copy");
                                                                }, 1000);
                                                            }
                                                            </script>

                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Row-->
                                                        <div class="row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="col-lg-4 fs-4 fw-semibold">Login Panel</label>
                                                            <!--end::Label-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-8">
                                                                <a href="<?=$server_host['link_login'];?>:2083/login/?user=<?=$toz_host['tk_host'];?>&pass=<?=$toz_host['mk_host'];?>"
                                                                    target="_blank"
                                                                    class="text-dark fw-bold text-hover-primary d-block fs-4">
                                                                    Login
                                                                </a>
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Row-->
                                                        <!--begin::Input group-->
                                                        <div class="row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="col-lg-4 fs-4 fw-semibold">Trạng thái
                                                                host</label>
                                                            <!--end::Label-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-8">
                                                                <span><?=host($toz_host['status']);?></span>
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--end::Notice-->
                                                    </div>
                                                    <!--begin::Card body-->
                                                    <div class="card-body p-9" id="item2" style="display: none;">
                                                        <!--begin::Row-->
                                                        <div class="row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="col-lg-4 fs-4 fw-semibold">Máy chủ</label>
                                                            <!--end::Label-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-8">
                                                                <a
                                                                    class="text-dark fw-bold text-hover-primary d-block fs-4">
                                                                   <?=$toz_host['goi_host'];?> - <?=$server_host['name_server'];?> 
                                                                </a>
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Row-->
                                                        <!--begin::Row-->
                                                        <div class="row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="col-lg-4 fs-4 fw-semibold">IP</label>
                                                            <!--end::Label-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-8">
                                                                <a
                                                                    class="text-dark fw-bold text-hover-primary d-block fs-4">
                                                                    <?=$server_host['ip_whm'];?>
                                                                </a>
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Row-->
                                                        <!--begin::Row-->
                                                        <div class="row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="col-lg-4 fs-4 fw-semibold">Name Server</label>
                                                            <!--end::Label-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-8">
                                                                <a
                                                                    class="text-dark fw-bold text-hover-primary d-block fs-4">
                                                                    <?=$server_host['ns1'];?></br>
                                                                    <?=$server_host['ns2'];?>
                                                                </a>
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Row-->
                                                    </div>
                                                    <!--begin::Card body-->
                                                    <div class="card-body p-9" id="item3" style="display: none;">
                                                        <div class="row mb-7">
                                                            <span type="button" onclick="changepass()"
                                                                class="btn btn-info">
                                                                <span id="button1_1" class="indicator-label">Đặt lại mật
                                                                    khẩu</span>
                                                                <span id="button2_1" class="indicator-progress"
                                                                    style="display: none;">Đang xử lý
                                                                    <span
                                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                                </span>
                                                            </span>
                                                        </div>
                                                        <div class="row mb-7" style="display: none;">
                                                            <button type="button" style="display: none;"
                                                                onclick="nangcap()" class="btn btn-success">Nâng
                                                                cấp</button>
                                                        </div>
                                                        <div class="row mb-7">
                                                            <button type="button" onclick="changemien()"
                                                                class="btn btn-dark"><span id="button1_3"
                                                                    class="indicator-label">Đổi miền
                                                                    chính </span>
                                                                <span id="button2_3" class="indicator-progress"
                                                                    style="display: none;">Đang xử lý
                                                                    <span
                                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                                </span></button>
                                                        </div>
                                                        <div class="row mb-7">
                                                            <button type="button" onclick="resethost()"
                                                                class="btn btn-warning">
                                                                <span id="button1_4" class="indicator-label">Reset
                                                                    host</span>
                                                                <span id="button2_4" class="indicator-progress"
                                                                    style="display: none;">Đang xử lý
                                                                    <span
                                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <div class="row mb-7">
                                                            <button type="button" onclick="xoahost()"
                                                                class="btn btn-danger">
                                                                <span id="button1_5" class="indicator-label">Xoá
                                                                    host</span>
                                                                <span id="button2_5" class="indicator-progress"
                                                                    style="display: none;">Đang xử lý
                                                                    <span
                                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body p-9" id="item4" style="display: none;">
                                                        <!--begin::Row-->
                                                        <div class="row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="col-lg-4 fs-4 fw-semibold">Ngày mua</label>
                                                            <!--end::Label-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-8">
                                                                <span
                                                                    class="fw-bold fs-4 text-gray-800"><?=ngay($toz_host['ngay_mua']);?></span>
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Row-->
                                                        <!--begin::Row-->
                                                        <div class="row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="col-lg-4 fs-4 fw-semibold">Ngày hết hạn<span
                                                                    class="ms-1" data-bs-toggle="tooltip"
                                                                    title="Host sẽ tạm khoá sau ngày này">
                                                                    <i class="ki-duotone ki-information fs-7">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                    </i>
                                                                </span>
                                                            </label>
                                                            <!--end::Label-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-8">
                                                                <span
                                                                    class="fw-bold fs-4 text-gray-800"><?=ngay($toz_host['ngay_het']);?></span>
                                                            </div>
                                                        </div>
                                                        <!--end::Col-->
                                                        <!--begin::Row-->
                                                        <div class="row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="col-lg-4 fs-4 fw-semibold">Phí gia hạn <span
                                                                    class="ms-1" data-bs-toggle="tooltip"
                                                                    title="Phí duy trì dịch vụ hosting hằng tháng">
                                                                    <i class="ki-duotone ki-information fs-7">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                    </i>
                                                                </span></label>
                                                            <!--end::Label-->
                                                            <!--begin::Col-->
                                                            <div class="col-lg-8">
                                                                <span
                                                                    class="fw-bold fs-4 text-gray-800"><?=tien($toz_host['gia_host']);?>đ/
                                                                    tháng</span>
                                                            </div>
                                                            <!--end::Col-->
                                                        </div>
                                                        <!--end::Row-->
                                                        <div class="row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="col-lg-4 fs-4 fw-semibold mb-3">
                                                                Gia hạn
                                                            </label>
                                                            <span class="ms-1" data-bs-toggle="tooltip"
                                                                title="Bạn có thể gia hạn theo tháng tại đây.">
                                                                <select name="giahan" id="giahan"
                                                                    aria-label="Select a Currency"
                                                                    data-control="select2"
                                                                    class="form-select form-select-solid form-select-lg">
                                                                    <option value="1">1 tháng</option>
                                                                    <option value="2">2 tháng</option>
                                                                    <option value="3">3 tháng</option>
                                                                </select>
                                                        </div>
                                                        <!--end::Row-->
                                                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                                                            <button class="btn btn-primary"
                                                                id="kt_account_profile_details_submit" type="button"
                                                                onclick="giahan()">
                                                                <span id="button1_0" class="indicator-label">Gia hạn
                                                                    host</span>
                                                                <span id="button2_0" class="indicator-progress"
                                                                    style="display: none;">Đang xử lý
                                                                    <span
                                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                           
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Engage Widget 1-->
                    <script>
                    function giahan() {
                        const button1_0 = document.getElementById("button1_0");
                        const button2_0 = document.getElementById("button2_0");

                        button1_0.style.display = "none";
                        button2_0.style.display = "inline-block";
                        button2_0.disabled = true; // Chặn người dùng bấm vào button2_0

                        const username = "<?=$username;?>";
                        const idhost = "<?=$id;?>";
                        const gia_host = "<?=$toz_host['gia_host'];?>";
                        const giahan = document.getElementById("giahan").value;

                        // Hiển thị sweet alert với nội dung xác nhận reset host
                        Swal.fire({
                            title: 'Xác nhận',
                            text: "Bạn có muốn gia hạn hosting này thêm " + giahan + " tháng với " + gia_host *
                                giahan + "đ",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Đồng ý',
                            cancelButtonText: 'Hủy bỏ'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                const xhr = new XMLHttpRequest();
                                xhr.open("POST", "/ajax/hosting/giahan");
                                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                xhr.onload = function() {
                                    button1_0.style.display = "inline-block";
                                    button2_0.style.display = "none";
                                    button2_0.disabled = false; // Cho phép người dùng bấm vào button2_0 lại

                                    if (xhr.status === 200) {
                                        const response = JSON.parse(xhr.responseText);
                                        if (response.success) {
                                            Swal.fire({
                                                icon: "success",
                                                text: "Gia hạn thành công!",
                                            }).then(function() {
                                                // Tải lại trang sau khi nhấn OK
                                                location.reload();
                                            });
                                        } else {
                                            Swal.fire({
                                                icon: "error",
                                                text: response.message,
                                            });
                                        }
                                    } else {
                                        Swal.fire({
                                            icon: "error",
                                            text: "Error: " + xhr.statusText,
                                        });
                                    }
                                };
                                xhr.onerror = function() {
                                    button1_0.style.display = "inline-block";
                                    button2_0.style.display = "none";
                                    button2_0.disabled = false; // Cho phép người dùng bấm vào button2_0 lại

                                    Swal.fire({
                                        icon: "error",
                                        text: "Error: " + xhr.statusText,
                                    });
                                };
                                xhr.send(
                                    "username=" + encodeURIComponent(username) +
                                    "&idhost=" + encodeURIComponent(idhost) +
                                    "&giahan=" + encodeURIComponent(giahan)
                                );
                            } else {
                                button1_0.style.display = "inline-block";
                                button2_0.style.display = "none";
                                button2_0.disabled = false; // Cho phép người dùng bấm vào button2_0 lại
                            }
                        });
                    }
                    </script>
                    <script>
                    function changepass() {
                        const button1_1 = document.getElementById("button1_1");
                        const button2_1 = document.getElementById("button2_1");

                        button1_1.style.display = "none";
                        button2_1.style.display = "inline-block";
                        button2_1.disabled = true; // Chặn người dùng bấm vào button2_1

                        const username = "<?=$username;?>";
                        const idhost = "<?=$id;?>";

                        // Hiển thị sweet alert với nội dung xác nhận reset host
                        Swal.fire({
                            title: 'Xác nhận',
                            text: "Bạn có chắc chắn muốn đặt lại mật khẩu cho hosting này?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Đồng ý',
                            cancelButtonText: 'Hủy bỏ'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                const xhr = new XMLHttpRequest();
                                xhr.open("POST", "/ajax/hosting/changepass");
                                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                xhr.onload = function() {
                                    button1_1.style.display = "inline-block";
                                    button2_1.style.display = "none";
                                    button2_1.disabled = false; // Cho phép người dùng bấm vào button2_1 lại

                                    if (xhr.status === 200) {
                                        const response = JSON.parse(xhr.responseText);
                                        if (response.success) {
                                            Swal.fire({
                                                icon: "success",
                                                text: "Đặt lại mật khẩu thành công!",
                                            }).then(function() {
                                                // Tải lại trang sau khi nhấn OK
                                                location.reload();
                                            });
                                        } else {
                                            Swal.fire({
                                                icon: "error",
                                                text: response.message,
                                            });
                                        }
                                    } else {
                                        Swal.fire({
                                            icon: "error",
                                            text: "Error: " + xhr.statusText,
                                        });
                                    }
                                };
                                xhr.onerror = function() {
                                    button1_1.style.display = "inline-block";
                                    button2_1.style.display = "none";
                                    button2_1.disabled = false; // Cho phép người dùng bấm vào button2_1 lại

                                    Swal.fire({
                                        icon: "error",
                                        text: "Error: " + xhr.statusText,
                                    });
                                };
                                xhr.send(
                                    "username=" + encodeURIComponent(username) +
                                    "&idhost=" + encodeURIComponent(idhost)
                                );
                            } else {
                                button1_1.style.display = "inline-block";
                                button2_1.style.display = "none";
                                button2_1.disabled = false; // Cho phép người dùng bấm vào button2_1 lại
                            }
                        });
                    }
                    </script>
                    <script>
                    function changemien() {
                        const button1_3 = document.getElementById("button1_3");
                        const button2_3 = document.getElementById("button2_3");

                        button1_3.style.display = "none";
                        button2_3.style.display = "inline-block";
                        button2_3.disabled = true; // Chặn người dùng bấm vào button2_3

                        const username = "<?=$username;?>";
                        const idhost = "<?=$id;?>";

                        // Hiển thị sweet alert với nội dung xác nhận reset host
                        Swal.fire({
                            title: 'Xác nhận',
                            text: "Nhập tên miền bạn muốn thay đổi:",
                            input: 'text',
                            inputPlaceholder: 'Nhập tên miền...',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Đồng ý',
                            cancelButtonText: 'Hủy bỏ',
                            inputValidator: (value) => {
                                if (!value) {
                                    return 'Bạn cần nhập tên miền!';
                                }
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                const domain = result.value;
                                const xhr = new XMLHttpRequest();
                                xhr.open("POST", "/ajax/hosting/changedomain");
                                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                xhr.onload = function() {
                                    button1_3.style.display = "inline-block";
                                    button2_3.style.display = "none";
                                    button2_3.disabled = false; // Cho phép người dùng bấm vào button2_3 lại

                                    if (xhr.status === 200) {
                                        const response = JSON.parse(xhr.responseText);
                                        if (response.success) {
                                            Swal.fire({
                                                icon: "success",
                                                text: "Đổi tên miền thành công!",
                                            }).then(function() {
                                                // Tải lại trang sau khi nhấn OK
                                                location.reload();
                                            });
                                        } else {
                                            Swal.fire({
                                                icon: "error",
                                                text: response.message,
                                            });
                                        }
                                    } else {
                                        Swal.fire({
                                            icon: "error",
                                            text: "Error: " + xhr.statusText,
                                        });
                                    }
                                };
                                xhr.onerror = function() {
                                    button1_3.style.display = "inline-block";
                                    button2_3.style.display = "none";
                                    button2_3.disabled = false; // Cho phép người dùng bấm vào button2_3 lại

                                    Swal.fire({
                                        icon: "error",
                                        text: "Error: " + xhr.statusText,
                                    });
                                };
                                xhr.send(
                                    "username=" + encodeURIComponent(username) +
                                    "&idhost=" + encodeURIComponent(idhost) +
                                    "&domain=" + encodeURIComponent(domain)
                                );
                            } else {
                                button1_3.style.display = "inline-block";
                                button2_3.style.display = "none";
                                button2_3.disabled = false; // Cho phép người dùng bấm vào button2_3 lại
                            }
                        });
                    }
                    </script>
                    <script>
                    function resethost() {
                        const button1_4 = document.getElementById("button1_4");
                        const button2_4 = document.getElementById("button2_4");

                        button1_4.style.display = "none";
                        button2_4.style.display = "inline-block";
                        button2_4.disabled = true; // Chặn người dùng bấm vào button2_4

                        const username = "<?=$username;?>";
                        const idhost = "<?=$id;?>";

                        // Hiển thị sweet alert với nội dung xác nhận reset host
                        Swal.fire({
                            title: 'Xác nhận',
                            text: "Khi reset sẽ xoá toàn bộ dữ liệu có trên host, bạn có chắc chắn muốn reset hosting này?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Đồng ý',
                            cancelButtonText: 'Hủy bỏ'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                const xhr = new XMLHttpRequest();
                                xhr.open("POST", "/ajax/hosting/resethost");
                                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                xhr.onload = function() {
                                    button1_4.style.display = "inline-block";
                                    button2_4.style.display = "none";
                                    button2_4.disabled = false; // Cho phép người dùng bấm vào button2_4 lại

                                    if (xhr.status === 200) {
                                        const response = JSON.parse(xhr.responseText);
                                        if (response.success) {
                                            Swal.fire({
                                                icon: "success",
                                                text: "Gửi yêu cầu reset thành công, vui lòng đợi 2-3 phút để hệ thống xử lý!",
                                            }).then(function() {
                                                // Tải lại trang sau khi nhấn OK
                                                location.reload();
                                            });
                                        } else {
                                            Swal.fire({
                                                icon: "error",
                                                text: response.message,
                                            });
                                        }
                                    } else {
                                        Swal.fire({
                                            icon: "error",
                                            text: "Error: " + xhr.statusText,
                                        });
                                    }
                                };
                                xhr.onerror = function() {
                                    button1_4.style.display = "inline-block";
                                    button2_4.style.display = "none";
                                    button2_4.disabled = false; // Cho phép người dùng bấm vào button2_4 lại

                                    Swal.fire({
                                        icon: "error",
                                        text: "Error: " + xhr.statusText,
                                    });
                                };
                                xhr.send(
                                    "username=" + encodeURIComponent(username) +
                                    "&idhost=" + encodeURIComponent(idhost)
                                );
                            } else {
                                button1_4.style.display = "inline-block";
                                button2_4.style.display = "none";
                                button2_4.disabled = false; // Cho phép người dùng bấm vào button2_4 lại
                            }
                        });
                    }
                    </script>
                    <script>
                    function xoahost() {
                        const button1_5 = document.getElementById("button1_5");
                        const button2_5 = document.getElementById("button2_5");

                        button1_5.style.display = "none";
                        button2_5.style.display = "inline-block";
                        button2_5.disabled = true; // Chặn người dùng bấm vào button2_5

                        const username = "<?=$username;?>";
                        const idhost = "<?=$id;?>";

                        // Hiển thị sweet alert với nội dung xác nhận reset host
                        Swal.fire({
                            title: 'Xác nhận',
                            text: "Bạn có chắc chắn muốn thực hiện xoá hosting này? Một khi đã xoá sẽ không khôi phục được kể cả dữ liệu!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Đồng ý',
                            cancelButtonText: 'Hủy bỏ'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                const xhr = new XMLHttpRequest();
                                xhr.open("POST", "/ajax/hosting/xoahost");
                                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                xhr.onload = function() {
                                    button1_5.style.display = "inline-block";
                                    button2_5.style.display = "none";
                                    button2_5.disabled = false; // Cho phép người dùng bấm vào button2_5 lại

                                    if (xhr.status === 200) {
                                        const response = JSON.parse(xhr.responseText);
                                        if (response.success) {
                                            Swal.fire({
                                                icon: "success",
                                                text: "Yêu cầu xoá host thành công!",
                                            }).then(function() {
                                                // Tải lại trang sau khi nhấn OK
                                                location.reload();
                                            });
                                        } else {
                                            Swal.fire({
                                                icon: "error",
                                                text: response.message,
                                            });
                                        }
                                    } else {
                                        Swal.fire({
                                            icon: "error",
                                            text: "Error: " + xhr.statusText,
                                        });
                                    }
                                };
                                xhr.onerror = function() {
                                    button1_5.style.display = "inline-block";
                                    button2_5.style.display = "none";
                                    button2_5.disabled = false; // Cho phép người dùng bấm vào button2_5 lại

                                    Swal.fire({
                                        icon: "error",
                                        text: "Error: " + xhr.statusText,
                                    });
                                };
                                xhr.send(
                                    "username=" + encodeURIComponent(username) +
                                    "&idhost=" + encodeURIComponent(idhost)
                                );
                            } else {
                                button1_5.style.display = "inline-block";
                                button2_5.style.display = "none";
                                button2_5.disabled = false; // Cho phép người dùng bấm vào button2_5 lại
                            }
                        });
                    }
                    </script>
                    <script>
                    function showitem1() {
                        document.getElementById("item1").style.display = "block";
                        document.getElementById("item2").style.display = "none";
                        document.getElementById("item3").style.display = "none";
                        document.getElementById("item4").style.display = "none";
                        document.getElementById("btn1").classList.add("active");
                        document.getElementById("btn2").classList.remove("active");
                        document.getElementById("btn3").classList.remove("active");
                        document.getElementById("btn4").classList.remove("active");
                    }

                    function showitem2() {
                        document.getElementById("item1").style.display = "none";
                        document.getElementById("item2").style.display = "block";
                        document.getElementById("item3").style.display = "none";
                        document.getElementById("item4").style.display = "none";
                        document.getElementById("btn1").classList.remove("active");
                        document.getElementById("btn2").classList.add("active");
                        document.getElementById("btn3").classList.remove("active");
                        document.getElementById("btn4").classList.remove("active");
                    }

                    function showitem3() {
                        document.getElementById("item1").style.display = "none";
                        document.getElementById("item2").style.display = "none";
                        document.getElementById("item3").style.display = "block";
                        document.getElementById("item4").style.display = "none";
                        document.getElementById("btn1").classList.remove("active");
                        document.getElementById("btn2").classList.remove("active");
                        document.getElementById("btn3").classList.add("active");
                        document.getElementById("btn4").classList.remove("active");
                    }

                    function showitem4() {
                        document.getElementById("item1").style.display = "none";
                        document.getElementById("item2").style.display = "none";
                        document.getElementById("item3").style.display = "none";
                        document.getElementById("item4").style.display = "block";
                        document.getElementById("btn1").classList.remove("active");
                        document.getElementById("btn2").classList.remove("active");
                        document.getElementById("btn3").classList.remove("active");
                        document.getElementById("btn4").classList.add("active");
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
                        <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/foot.php';?>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Page-->
            </div>
            <!--end::Root-->

</html>