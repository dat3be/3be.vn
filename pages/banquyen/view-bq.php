<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head2.php';?>
    <title>Bản Quyền | <?=$chinhapi['ten_web'];?></title>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/nav.php';?>
 </head>
  <?php
    $check_id = antixss($_GET['id']);
    $api_checkid = $ketnoi->query("SELECT * FROM `list-license` WHERE `id` = '$check_id' AND `status`='ON' ")->fetch_array();
    if (!($api_checkid)) {
        header("Location: /ban-quyen");
        exit();
    } else {
        $id = antixss($_GET['id']);
        $api_code = $ketnoi->query("SELECT * FROM `list-license` WHERE `id` = '$id' AND `status`='ON'  ")->fetch_array();
}
?>


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
                                    Bản Quyền</h1>
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
                        <!--end::Actions-->
                        </div>
                    <!--begin::Content-->
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
                            <div class="row gx-5 gx-xl-10">
                                <div class="col-xl-12">
                                    <!--begin::Label-->
                                                        <!--begin::Label-->
                                                        <label class="required form-label">ID</label>
                                                        <!--end::Label-->

                                                        <!--begin::Input-->
                                                        <input type="text" name="id_code" id="id_code"
                                                            class="form-control mb-2" readonly=""
                                                            value="<?=$api_code['id'];?>" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="mb-10 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="required form-label">Product Name</label>
                                                        <!--end::Label-->

                                                        <!--begin::Input-->
                                                        <input type="text" name="product_name" id="product_name"
                                                            class="form-control mb-2" readonly=""
                                                            value="<?=$api_code['name'];?>" />
                                                    <div>
                                                    <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="required form-label">Tên Miền</label>
                                                <!--end::Label-->

                                                <!--begin::Input-->
                                                <input type="text" id="domain" class="form-control mb-2"
                                                    placeholder="dichvucodes.net" />
                                                <!--end::Input-->
                                            </div>
                                                    <!--end::Input group-->
                                                    <div class="d-flex justify-content-end mt-8"
                                                        style="margin-right: 20px;">
                                                        <!--begin::Button-->
                                                        <a href="/ma-nguon" class="btn btn-light me-5">
                                                            Quay lại
                                                        </a>
                                                        <!--end::Button-->
                                                        <!--begin::Button-->
                                                        <button type="button" onclick="muangay()"
                                                            class="btn btn-primary">
                                                            <span id="button1" class="indicator-label">Mua ngay</span>
                                                            <span id="button2" class="indicator-progress"
                                                                style="display: none;">Đang xử lý
                                                                <span
                                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                            </span>
                                                        </button>
                                                        <!--end::Button-->
                                                    </div>
                                                </div>
                                                <!--end::Card header-->
                                            </div>
                                            <!--end::General options-->
                                        </div>
                                    </div>
                                    <!--end::Tab pane-->

                                </div>
                                <!--end::Tab content-->
                                <!--end::Main column-->

                            </div>

                        </form>
                        <!--end::Container-->
                        <script>
                        function muangay() {
                            const button1 = document.getElementById("button1");
                            const button2 = document.getElementById("button2");

                            button1.style.display = "none";
                            button2.style.display = "inline-block";
                            button2.disabled = true;

                            const username = "<?=$username?>";
                            const id_code = "<?=$id?>";
                            const domain = document.getElementById("domain").value;

                            // Hiển thị sweet alert với nội dung xác nhận mua code
                            Swal.fire({
                                title: 'Xác nhận mua bản quyền',
                                text: "Bạn có chắc chắn muốn mua bản quyền này?",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Đồng ý',
                                cancelButtonText: 'Hủy bỏ'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    const xhr = new XMLHttpRequest();
                                    xhr.open("POST", "/ajax/banquyen/xulybanquyen.php");
                                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                    xhr.onload = function() {
                                        button1.style.display = "inline-block";
                                        button2.style.display = "none";
                                        button2.disabled = false;

                                        if (xhr.status === 200) {
                                            const response = JSON.parse(xhr.responseText);
                                            if (response.success) {
                                                cuteToast({
                                                    type: "success",
                                                    message: "Mua bản quyền thành công",
                                                    timer:2000
                                                }).then(function() {
                                                    // Tải lại trang sau khi nhấn OK
                                                     window.location.href = "/history-ban-quyen";
                                                });
                                            } else {
                                                cuteToast({
                                                    type: "error",
                                                    message: response.message,
                                                    timer:2000
                                                });
                                            }
                                        } else {
                                            cuteToast({
                                                type: "error",
                                                message: "Error: " + xhr.statusText,
                                                timer:2000
                                            });
                                        }
                                    };
                                    xhr.onerror = function() {
                                        button1.style.display = "inline-block";
                                        button2.style.display = "none";
                                        button2.disabled = false;

                                        cuteToast({
                                            icon: "error",
                                            text: "Error: " + xhr.statusText,
                                        });
                                    };
                                    xhr.send(
                                        "username=" + encodeURIComponent(username) +
                                        "&domain=" + encodeURIComponent(domain) +
                                        "&id_code=" + encodeURIComponent(id_code)
                                    );
                                } else {
                                    button1.style.display = "inline-block";
                                    button2.style.display = "none";
                                    button2.disabled = false;
                                }
                            });
                        }
                        </script>
                           </div>
            <!--end:::Main-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    </div>
    
    </div>
            <!--end:::Main-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    </div>
    </div>
            <!--end:::Main-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    </div>
                       
                    </div>
                    
                    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/foot.php';?>
                    <!--end::Content-->
                