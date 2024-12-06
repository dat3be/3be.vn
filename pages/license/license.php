<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head2.php';?>
    <title>Quản Lý License | <?=$chinhapi['ten_web'];?></title>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/nav.php';?>
    <?php
   if ($chinhapi['status_code'] == 'OFF'){
        echo '<script type="text/javascript">if(!alert("Dịch vụ này hiện đang bảo trì!")){window.history.back().location.reload();}</script>';
   }
   ?>
   <?php
if(isset($_GET['edit'])) {
$id_cron = $_GET['edit'];
$check_code = $ketnoi->query("SELECT * FROM `license_key` WHERE `id` = '$id_cron' AND `username`='$username'");
if($check_code->num_rows != 0){
    $api_lic = $ketnoi->query("SELECT * FROM `license_key` WHERE `id` = '$id_cron' ")->fetch_array();
}else{
    header('Location: /quanly-license');
}
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
        <!--begin::Page--!>
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
                    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                        <!--begin::Toolbar container-->
                        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                            <!--begin::Page title-->
                            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                                <!--begin::Title-->
                                <h1
                                    class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                    Quản lý license</h1>
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
                                                         <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Container-->
                    <div class="container-xxl" id="kt_content_container">
                        <?php if(empty($id_cron)){ ?>
                        <!-- begin-buy -->

                        <?php }else{ ?>
                        <!-- begin-edit -->
                        <div class="card" id="kt_pricing">
                            <div class="card-body">
                                <div class="row gx-5 gx-xl-10">
                                    <div class="col-xl-12">
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-3">Tên Miền
                                        </label>
                                        <div class="col-lg-10 fv-row">
                                            <input type="text" name="mien" id="mien"
                                                class="form-control form-control-lg form-control-solid"
                                                placeholder="Tên Miền" value="<?=$api_lic['mien'];?>" />
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-3">Mã License
                                        </label>
                                        <div class="col-lg-10 fv-row">
                                            <input type="text" name="license" id="license"
                                                class="form-control form-control-lg form-control-solid"
                                                placeholder="Mã Licese" value="<?=$api_lic['license'];?>" readonly />
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-3">Status</label>
                                        <div class="col-lg-10 fv-row">
                                            <select name="status" id="status" aria-label="Select a Currency"
                                                data-control="select2"
                                                class="form-select form-select-solid form-select-lg">
                                                <?php if ($api_lic['status'] == "gianlan") { ?>
                                                <option value="gianlan">Gian Lận</option>
                                                <?php } else { ?>
                                                <option value="<?= $api_lic['status']; ?>">
                                                    <?= $api_lic['status']; ?>
                                                </option>
                                                <?php if ($api_lic['status'] == "hoatdong") { $st2 = "tamdung"; } else { $st2 = "hoatdong"; } ?>
                                                <option value="<?= $st2; ?>">
                                                    <?= $st2; ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <a href="/cron-jobs" class="btn btn-light btn-active-light-primary me-2">Cancel</a>
                                <button class="btn btn-primary" id="kt_account_profile_details_submit" type="button"
                                    onclick="luungay()">
                                    <span id="button1" class="indicator-label">lưu ngay</span>
                                    <span id="button2" class="indicator-progress" style="display: none;">Đang xử lý
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <?php } ?>
                        <!-- end-edit -->
                        <script>
                            function luungay() {
                                const button1 = document.getElementById("button1");
                                const button2 = document.getElementById("button2");

                                button1.style.display = "none";
                                button2.style.display = "inline-block";
                                button2.disabled = true;

                                const username = "<?=$username;?>";
                                const id_cron = "<?=$api_lic['id'];?>";
                                const mien = encodeURIComponent(document.getElementById("mien").value);
                                const license = encodeURIComponent(document.getElementById("license").value);
                                const status = document.getElementById("status").value;

                                const xhr = new XMLHttpRequest();
                                xhr.open("POST", "/ajax/license/edit-license.php");
                                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                xhr.onload = function () {
                                    button1.style.display = "inline-block";
                                    button2.style.display = "none";
                                    button2.disabled = false;

                                    if (xhr.status === 200) {
                                        const response = JSON.parse(xhr.responseText);
                                        if (response.success) {
                                            Swal.fire({
                                                icon: "success",
                                                text: "Cập nhật thành công!",
                                            }).then(() => {
                                                window.location.href = "/quanly-license";
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
                                xhr.onerror = function () {
                                    button1.style.display = "inline-block";
                                    button2.style.display = "none";
                                    button2.disabled = false;

                                    Swal.fire({
                                        icon: "error",
                                        text: "Error: " + xhr.statusText,
                                    });
                                };
                                xhr.send(
                                    "username=" + username +
                                    "&id_cron=" + id_cron +
                                    "&mien=" + mien +
                                    "&license=" + license +
                                    "&status=" + encodeURIComponent(status)

                                );
                            }

                        </script>



                        <div class="card mb-5 mt-6">
                            <!--begin::Header-->
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold fs-3 mb-1">Danh sách License của bạn</span>

                                    <span class="text-muted mt-1 fw-semibold fs-7">Cập nhật
                                        <?=$time;?>
                                    </span>
                                </h3>
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="card-body py-3">
                                <!--begin::Table container-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                        <!--begin::Table head-->
                                        <thead>
                                            <tr class="fw-bolder text-muted">
                                                <th class="w-25px">
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            data-kt-check="true"
                                                            data-kt-check-target=".widget-9-check" />
                                                    </div>
                                                </th>
                                                <th class="min-w-150px">Tên Miền</th>
                                                <th class="min-w-150px">Mã License</th>
                                                <th class="min-w-140px">Ngày Mua</th>
                                                <th class="min-w-120px">Trạng Thái</th>
                                                <th class="min-w-100px">Thao Tác</th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <?php $i=1;?>
                                        <!--begin::Table body-->
                                        <tbody>
                                            <?php
                                            $result = mysqli_query($ketnoi,"SELECT * FROM `license_key` WHERE `username` = '$username'ORDER BY `id` DESC ");
                                            if(mysqli_num_rows($result) > 0) {
                                            while($row = mysqli_fetch_assoc($result)) { ?>
                                            <tr>
                                                <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input widget-9-check" type="checkbox"
                                                            value="1" />
                                                    </div>
                                                </td>

                                                <td>
                                                    <a class="text-dark fw-bolder text-hover-primary d-block fs-6">
                                                        <?=$row['mien'];?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a 
                                                        class="text-dark fw-bolder text-hover-primary d-block fs-6">
                                                        <?=$row['license'];?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="text-dark fw-bolder text-hover-primary d-block fs-6">
                                                        <?=ngay($row['date']);?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="text-dark fw-bolder text-hover-primary d-block fs-6">
                                                        <?=license($row['status']);?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="?edit=<?=$row['id'];?>"
                                                        class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                        <i class="fa-solid fa-pen-to-square fs-2"><span
                                                                class="path1"></span><span class="path2"></span></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php
    }
} else {
   
              ?>

                          <tr>
                            <td colspan="6" style="text-align: center;">
                              <script src="https://cdn.lordicon.com/lordicon.js"></script>
                              <lord-icon src="https://cdn.lordicon.com/anqzffqz.json" trigger="loop" delay="1000"
                                style="width:50px;height:50px">
                              </lord-icon>
                              <p class="alert text-dark fw-bolder text-hover-primary">Không có dữ liệu!</p>
                            </td>

                          </tr>

                          <?php }?>
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table container-->
                            </div>
                            <!--begin::Body-->
                        </div>
                    </div>
                    <!--end::Table container-->
                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Container-->
                        </div>
                        
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
            <!--end:::Main-->
        </div>
        <!--end::Wrapper-->
    </div>
   <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/foot.php';?>
    </div>
</body>
<!--end::Body-->

</html>