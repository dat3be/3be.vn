<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head2.php';?>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head.php';?>
    <title>Nạp Thẻ | <?=$chinhapi['ten_web'];?></title>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/nav.php';?>
</head>

<script>
function menhGia() {
    var typeThe = document.getElementById("type_the").value;
    $.ajax({
        type: "POST",
        url: "/ajax/naptien/laymenhgia",
        data: {
            type_the: typeThe
        },
        success: function(result) {
            // Xử lý kết quả nhận được tại đây
            var select = document.getElementById("menh_gia");
            select.innerHTML = '<option value="">Chọn mệnh giá</option>';

            // Xử lý kết quả trả về để tạo các option cho select
            var menhGiaList = JSON.parse(result);
            for (var i = 0; i < menhGiaList.length; i++) {
                var option = document.createElement("option");
                option.value = menhGiaList[i].value;
                option.textContent = menhGiaList[i].label;
                select.appendChild(option);
            }
        },
        error: function() {
            // Hiển thị thông báo lỗi
            alert("Đã xảy ra lỗi khi gửi yêu cầu.");
        }
    });
}
</script>
<!--end::Head-->
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
                                    Nạp Thẻ</h1>
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
                                        <!--begin::Header-->
                                        <div class="col-xl-12 px-10 mt-5">
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-3">Loại
                                            thẻ</label>
                                        <div class="col-lg-10 fv-row">
                                                <select name="type_the" id="type_the" onchange="menhGia()"
                                                aria-label="Select a Currency" data-control="select2"
                                                    class="form-select form-select-solid form-select-lg">
                                                <option value="">Chọn loại thẻ</option>
                                                <option value="VIETTEL">Viettel</option>
                                                <option value="VINAPHONE">Vinaphone</option>
                                                <option value="MOBIFONE">Mobifone</option>
                                                <option value="VNMOBI">Vietnammobile</option>
                                                <option value="ZING">Zing</option>
                                                <option value="GARENA">Garena</option>
                                                <option value="GATE">GATE</option>
                                                <option value="VCOIN">Vcoin</option>
                                            </select>
                                        </div>
                                    </div>

                                        <div class="col-xl-12 px-10">
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-3">Mệnh giá
                                                thẻ</label>
                                            <div class="col-lg-10 fv-row">
                                                <select name="menh_gia" id="menh_gia" aria-label="Select a Currency"
                                                    data-control="select2"
                                                    class="form-select form-select-solid form-select-lg">
                                                    <option value="">Chọn mệnh giá</option>
                                                    <div id="menh_gia_container"></div>
                                                </select>
                                            </div>
                                        </div>

                                        <!--end::Header-->
                                        <div class="col-xl-12 px-10">
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-3">Mã
                                                thẻ</label>
                                            <div class="col-lg-10 fv-row">
                                                <input type="text" name="ma_the" id="ma_the"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="Nhập mã thẻ" />
                                            </div>
                                        </div>
                                        <div class="col-xl-12 px-10 mb-10">
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-3">Seri
                                                thẻ</label>
                                            <div class="col-lg-10 fv-row">
                                                <input type="text" name="seri_the" id="seri_the"
                                                    class="form-control form-control-lg form-control-solid"
                                                    placeholder="Nhập seri thẻ" />
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                                            <button id="napthe" class="btn btn-primary" onclick="nap_the()">
                                                <span id="button1" class="indicator-label">Nạp ngay</span>
                                                <span id="button2" class="indicator-progress"
                                                    style="display: none;">Đang xử lý
                                                    <span
                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                </span>
                                            </button>
                                        </div>
                                        <script>
                                        function nap_the() {
                                            const button1 = document.getElementById("button1");
                                            const button2 = document.getElementById("button2");

                                            button1.style.display = "none";
                                            button2.style.display = "inline-block";
                                            button2.disabled = true; // Chặn người dùng bấm vào button2

                                            const username = "<?=$username?>";
                                            const type_the = document.getElementById("type_the").value;
                                            const menh_gia = document.getElementById("menh_gia").value;
                                            const ma_the = document.getElementById("ma_the").value;
                                            const seri_the = document.getElementById("seri_the").value;

                                            // Hiển thị sweet alert với nội dung xác nhận nạp thẻ
                                            Swal.fire({
                                                title: 'Xác nhận nạp thẻ',
                                                text: "Bạn đã kiểm tra chính xác mệnh giá, mã thẻ và seri, nếu sai thông tin sẽ bị mất 50% giá trị thẻ",
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Đồng ý',
                                                cancelButtonText: 'Hủy bỏ'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    const xhr = new XMLHttpRequest();
                                                    xhr.open("POST", "/ajax/naptien/napthe");
                                                    xhr.setRequestHeader("Content-Type",
                                                        "application/x-www-form-urlencoded");
                                                    xhr.onload = function() {
                                                        button1.style.display = "inline-block";
                                                        button2.style.display = "none";
                                                        button2.disabled =
                                                            false; // Cho phép người dùng bấm vào button2 lại

                                                        if (xhr.status === 200) {
                                                            const response = JSON.parse(xhr.responseText);
                                                            if (response.success) {
                                                                Swal.fire({
                                                                    icon: "success",
                                                                    text: "Nạp thẻ thành công, vui lòng đợi hệ thống xử lý!",
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
                                                        button1.style.display = "inline-block";
                                                        button2.style.display = "none";
                                                        button2.disabled =
                                                            false; // Cho phép người dùng bấm vào button2 lại

                                                        Swal.fire({
                                                            icon: "error",
                                                            text: "Error: " + xhr.statusText,
                                                        });
                                                    };
                                                    xhr.send(
                                                        "username=" + encodeURIComponent(username) +
                                                        "&type_the=" + encodeURIComponent(type_the) +
                                                        "&menh_gia=" + encodeURIComponent(menh_gia) +
                                                        "&ma_the=" + encodeURIComponent(ma_the) +
                                                        "&seri_the=" + encodeURIComponent(seri_the)
                                                    );
                                                } else {
                                                    button1.style.display = "inline-block";
                                                    button2.style.display = "none";
                                                    button2.disabled =
                                                        false; // Cho phép người dùng bấm vào button2 lại
                                                }
                                            });
                                        }
                                        </script>
                                    </div>
                                    <div class="card mb-5 mt-6">
                                        <!--begin::Header-->
                                        <div class="card-header border-0 pt-5">
                                            <h3 class="card-title align-items-start flex-column">
                                                <span class="card-label fw-bold fs-3 mb-1">Lịch sử nạp tiền</span>

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
                                                            <th class="min-w-180px text-center">Mã thẻ</th>
                                                            <th class="min-w-180px text-center">Loại thẻ</th>
                                                            <th class="min-w-180px text-center">Mệnh giá</th>
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
                                            $result = mysqli_query($ketnoi,"SELECT * FROM `history_nap_the` WHERE `username` = '$username' ORDER BY `id` DESC ");
                                            while($row = mysqli_fetch_assoc($result)) { ?>
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
                                                                <center><?=$row['pin'];?></center>
                                                            </a>
                                                        </td>

                                                        <td>
                                                            <a
                                                                class="text-dark fw-bold text-hover-primary d-block fs-6">
                                                                <center><?=$row['loaithe'];?></center>
                                                            </a>
                                                        </td>

                                                        <td>
                                                            <a
                                                                class="text-dark fw-bold text-hover-primary d-block fs-6">
                                                                <center><?=tien($row['menhgia']);?></center>
                                                            </a>
                                                        </td>

                                                        <td>
                                                            <a
                                                                class="text-dark fw-bold text-hover-primary d-block fs-6">
                                                                <center><?=tien($row['thucnhan']);?></center>
                                                            </a>
                                                        </td>

                                                        <td>
                                                            <a
                                                                class="text-dark fw-bold text-hover-primary d-block fs-7">
                                                                <center><?=napthe($row['status']);?></center>
                                                            </a>
                                                        </td>

                                                        <td>
                                                            <a
                                                                class="text-dark fw-bold text-hover-primary d-block fs-6">
                                                                <center><?php echo $row['time']; ?></center>
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