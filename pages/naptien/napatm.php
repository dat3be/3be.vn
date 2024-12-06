<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head2.php';?>
   
    <title>Nạp ATM | <?=$chinhapi['ten_web'];?></title>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/nav.php';?>
  <?php 
    if(!empty($username=="")){
        $noidungnap = "Đăng nhập để thực hiện";
    }else{
        $noidungnap = $chinhapi['cuphap'].$user['id'];
    }
    ?>
    <script>
    function nganhang() {
        var typeThe = document.getElementById("type_bank").value;
        $.ajax({
            type: "POST",
            url: "/ajax/naptien/laynganhang.php",
            data: {
                type_bank: typeThe
            },
            success: function(result) {
                // Xử lý kết quả nhận được tại đây
                // Ví dụ: tạo select từ kết quả
                var selectHtml =
                    '<div class="col-xl-12">';
                selectHtml +=
                    '<label class="col-lg-4 col-form-label required fw-semibold fs-3">Thông tin chuyển khoản</label>';
                selectHtml += '<div class="col-lg-10 fv-row">';

                // Xử lý kết quả trả về để tạo các option cho select
                // Ví dụ: giả sử kết quả là một mảng các mệnh giá
                var listbank = JSON.parse(result);
                for (var i = 0; i < listbank.length; i++) {

                    selectHtml += '<div class="row mb-7">';
                    selectHtml += '<label class="col-lg-4 fw-semibold  fs-4">Ngân hàng:</label>';
                    selectHtml += '<div class="col-lg-4">';
                    selectHtml += '<span class="fw-bold fs-6 text-gray-800">';
                    selectHtml += listbank[i].bank;
                    selectHtml += '</span>';
                    selectHtml += '</div>';
                    selectHtml += '</div>';

                    selectHtml += '<div class="row mb-7">';
                    selectHtml += '<label class="col-lg-4 fw-semibold  fs-4">Số tài khoản:</label>';
                    selectHtml += '<div class="col-lg-4">';
                    selectHtml += '<span class="fw-bold fs-6 text-gray-800">';
                    selectHtml += listbank[i].stk;
                    selectHtml += '</span>';
                    selectHtml += '</div>';
                    selectHtml += '</div>';

                    selectHtml += '<div class="row mb-7">';
                    selectHtml += '<label class="col-lg-4 fw-semibold  fs-4">Chủ tài khoản:</label>';
                    selectHtml += '<div class="col-lg-4">';
                    selectHtml += '<span class="fw-bold fs-6 text-gray-800">';
                    selectHtml += listbank[i].ctk;
                    selectHtml += '</span>';
                    selectHtml += '</div>';
                    selectHtml += '</div>';

                    selectHtml += '<div class="row mb-7">';
                    selectHtml +=
                        '<label class="col-lg-4 fw-semibold  fs-4">Nội dung chuyển khoản:</label>';
                    selectHtml += '<div class="col-lg-4">';
                    selectHtml += '<span class="fw-bold fs-6 text-gray-800">';
                    selectHtml += '<?=$noidungnap;?>';
                    selectHtml += '</span>';
                    selectHtml += '</div>';
                    selectHtml += '</div>';
                    
                     selectHtml += '<div class="row mb-7">';
                    selectHtml += '<label class="col-lg-4 fw-semibold  fs-4">Nạp tối thiểu:</label>';
                    selectHtml += '<div class="col-lg-4">';
                    selectHtml += '<span class="fw-bold fs-6 text-gray-800">';
                    selectHtml += listbank[i].toithieu;
                    selectHtml += '</span>';
                    selectHtml += '</div>';
                    selectHtml += '</div>';

                    selectHtml += '<div class="row mb-7">';
                selectHtml += '<label class="col-lg-4 fw-semibold fs-3">Qr Bank Auto :</label>';
                selectHtml += '<div class="col-lg-4">';
                selectHtml += '<div class="symbol symbol-160px symbol-lg-440px symbol-fixed position-relative">';
            //   https://img.vietqr.io/image/" + listbank[i].bank + "-" + listbank[i].stk + "-<TEMPLATE>.png?amount=" + listbank[i].toithieu + "&addInfo=<?=$noidungnap?>&accountName=" + listbank[i].ctk +"=
                
                var qrUrl = "https://img.vietqr.io/image/" + listbank[i].bank + "-" + listbank[i].stk + "-<TEMPLATE>.png?amount=" + listbank[i].toithieu + "&addInfo=<?=$noidungnap?>&accountName=" + listbank[i].ctk +"=";
                selectHtml += '<img src="' + qrUrl + '" alt="img">';
                selectHtml += '</div>';
                selectHtml += '</div>';
                selectHtml += '</div>';
                }

                selectHtml += '</div>';
                selectHtml += '</div>';

                // Gán HTML của select vào một phần tử trên trang
                document.getElementById("danh_sach_bank").innerHTML = selectHtml;
            },
            error: function() {
                // Hiển thị thông báo lỗi
                alert("Đã xảy ra lỗi khi gửi yêu cầu.");
            }
        });
    }
    </script>
 

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
                                   Nạp ATM</h1>
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
                                <a href="#" class="btn btn-sm fw-bold btn-success" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_create_app">
                                    Chiết khấu <?php if($username!=""){echo ($user['chiet_khau']);}else{echo'0';}?>%
                                </a>
                                <row>
                                    <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_create_app">
                                    <?=tien($user['money']);?>đ
                                </a>
                                </row>
                                <!--end::Primary button-->
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Toolbar container-->
                    </div>
                    <!--end::Toolbar-->
                    <div id="kt_app_content_container" class="app-container container-fluid">
                    
            <!--begin::Alert-->
<div class="alert alert-primary d-flex align-items-center p-5">
    <!--begin::Icon-->
    <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4"><span class="path1"></span><span class="path2"></span></i>
    <!--end::Icon-->

    <!--begin::Wrapper-->
    <div class="d-flex flex-column">

        <!--begin::Content-->
        <span>
            <?= htmlspecialchars_decode($chinhapi['thongbao_nt'], ENT_QUOTES); ?>
        </span>
        <!--end::Content-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Alert-->

                    <!--begin::Content-->
         <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Container-->
                    <div class="container-xxl" id="kt_content_container">
                        <!--begin::Row-->

                        <div class="row gy-5 g-xl">
                            <!--begin::Col-->
                            <div class="col-xl">
                                <div class="row">
                                    <!--begin::Tables Widget 3-->
                                    <div class="card card-xl-stretch mb-5 mb-xl">
                                        <!--begin::Row-->
                                      <div class="card-body">
                            <div class="row gx-5 gx-xl-10">
                                <div class="col-xl-12">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-3">Danh sách ngân
                                        hàng</label>
                                    <div class="col-lg-10 fv-row">
                                        <select name="type_bank" id="type_bank" onchange="nganhang()"
                                            aria-label="Select a Currency" data-control="select2"
                                            class="form-select form-select-solid form-select-lg">
                                            <option value="">--- Vui lòng chọn ---</option>
                                            <?php
                                    $result = mysqli_query($ketnoi,"SELECT * FROM `ds_bank` WHERE `status`='ON' ");
                                    while($row = mysqli_fetch_assoc($result)) { ?>
                                            <option value="<?=$row['type'];?>"><?=$row['type'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div id="danh_sach_bank"></div>
                            </div>
                            <!--end::Content-->
                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <div class="card mb-5 mt-6">
                                        <!--begin::Header-->
                                        <div class="card-header border-0 pt-5">
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bold fs-3 mb-1">Lịch sử nạp ngân hàng</span>

                                                <span class="text-muted mt-1 fw-semibold fs-7">Cập nhật
                                                    <?=$time;?></span>
                                            </h3>
                                        </div>
                                        <!--end::Header-->

                                        <!--begin::Body-->
                                        <div class="card-body py-3">
                                            <!--begin::Table container-->
                                            <div class="table-responsive">
                                                <!--begin::Table-->
                                                <table
                                                    class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                                    <!--begin::Table head-->
                                                    <thead>
                                                        <tr class="fw-bold text-muted">
                                                            <th class="w-25px">
                                                                <div
                                                                    class="form-check form-check-sm form-check-custom form-check-solid">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="1" data-kt-check="true"
                                                                        data-kt-check-target=".widget-9-check" />
                                                                </div>
                                                            </th>
                                                            <th class="min-w-30px text-center">ID</th>
                                                            <th class="min-w-180px text-center">Loại</th>
                                                            <th class="min-w-180px text-center">Mã giao dịch</th>
                                                            <th class="min-w-180px text-center">Tài khoản</th>
                                                            <th class="min-w-180px text-center">Thực nhận</th>
                                                            <th class="min-w-180px text-center">Trạng thái</th>
                                                            <th class="min-w-100px text-center">Thời gian</th>
                                                        </tr>
                                                    </thead>
                                                    <!--end::Table head-->
                                                    <?php $i=1;?>
                                                    <!--begin::Table body-->
                                                    <tbody>

                                                        <!-- begin - code -->
                                                        <?php
                                            $result = mysqli_query($ketnoi,"SELECT * FROM `history_nap_bank` WHERE `username` = '$username' ORDER BY id desc ");
                                            while($row2 = mysqli_fetch_assoc($result)) { ?>
                                                        <td>
                                                            <div
                                                                class="form-check form-check-sm form-check-custom form-check-solid">
                                                                <input class="form-check-input widget-9-check"
                                                                    type="checkbox" value="1" />
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div
                                                                class="text-dark fw-bold text-hover-primary d-block fs-6">
                                                                <center><?=$i++;?></center>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <a
                                                                class="text-dark fw-bold text-hover-primary d-block fs-6">
                                                                <center><?=$row2['type'];?></center>
                                                            </a>
                                                        </td>

                                                        <td>
                                                            <a
                                                                class="text-dark fw-bold text-hover-primary d-block fs-6">
                                                                <center><?=$row2['trans_id'];?></center>
                                                            </a>
                                                        </td>

                                                        <td>
                                                            <a
                                                                class="text-dark fw-bold text-hover-primary d-block fs-6">
                                                                <center><?=$row2['ctk'];?></center>
                                                            </a>
                                                        </td>

                                                        <td>
                                                            <a
                                                                class="text-dark fw-bold text-hover-primary d-block fs-6">
                                                                <center><?=tien($row2['thucnhan']);?></center>
                                                            </a>
                                                        </td>

                                                        <td>
                                                            <a
                                                                class="text-dark fw-bold text-hover-primary d-block fs-7">
                                                                <center><?=napthe($row2['status']);?></center>
                                                            </a>
                                                        </td>

                                                        <td>
                                                            <a
                                                                class="text-dark fw-bold text-hover-primary d-block fs-6">
                                                                <center><?=ngay($row2['time']);?></center>
                                                            </a>
                                                        </td>
                                                        </tr>
                                                        <?php } ?>
                                                        <!-- end - code -->
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
                                <!--end::Row-->
                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Container-->
                </div>

                        </div>
                        <!--end::Content container-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Content wrapper-->
                <!--begin::Footer-->
                <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/foot.php';?>
                <!--end::Footer-->
            </div>
            <!--end:::Main-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    </div>



</body>
<!--end::Body-->

</html>