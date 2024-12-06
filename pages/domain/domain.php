<html lang="en">
<!--begin::Head-->

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head2.php';?>

    <title>Mua Miền |
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
                                    Mua Miền</h1>
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
                        <div class="card card-flush py-0">
                                    <div class="ws-mb-4 ws--mx-2 md:ws--mx-0 ws-bg-white md:ws-rounded"
                        style="background-image: url(https://cdns.diongame.com/static/Wbt9g97I1bTcyMc.png);background-position: top right; background-repeat:  no-repeat">
                                    <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general"
                                        role="tab-panel">
                                        </br>
            <div class="container">
                <div class="main-grid">
                    <div class="main-content ">
                            <div class="card-body">
                            <div class="row gx-5 gx-xl-10">
                                <div class="col-xl-12">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-3">Tên
                                        miền:</label>
                                    <div class="col-lg-10 fv-row">
                                        <input type="text" id="tenmien"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Ví dụ: dichvucodes" />
                                    </div>
                                </div>
                                <!--begin::Plans-->
                                <div class="col-xl-12">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-3">Đuôi miền</label>

                                    <div class="col-lg-10 fv-row">
                                        <select id="duoimien" aria-label="Select a Currency" data-control="select2"
                                            class="form-select form-select-solid form-select-lg">
                                            <?php
                                            $result = mysqli_query($ketnoi,"SELECT * FROM `khodomain` WHERE `status` = 'ON' ");
                                            while($row = mysqli_fetch_assoc($result)) { ?>
                                            <option value="<?=$row['duoimien'];?>">
                                                <?=$row['duoimien'];?> - <?=$row['thoihan'];?> ngày -
                                                <?=tien($row['gia']);?>đ
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-3">Domain:</label>
                                    <div class="col-lg-10 fv-row">
                                        <input type="text" id="domain"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Vui lòng chọn tên miền" readonly="">
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-3">Mã giảm giá:</label>
                                    <div class="col-lg-10 fv-row">
                                        <input type="text" id="giftcode"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Bỏ qua nếu không có mã giảm giá" />
                                    </div>
                                </div>
                                <!--end::Content-->
                            </div>
                            </div>
                            <!--end::Content-->
                        </div>
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <a href="/" class="btn btn-light btn-active-light-primary me-2">Cancel</a>
                            <button class="btn btn-primary" type="button" onclick="thanhtoan()">
                                <span id="button1" class="indicator-label">Thanh toán</span>
                                <span id="button2" class="indicator-progress" style="display: none;">Đang xử lý
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                    <!--end::Card body-->
                </div>
                <!--end::Engage Widget 1-->
                </div>
                </div>
                </div>
            <!-- Pagination -->
            <div class="pagination">

            </div>
                       
                                
                <script>
                function thanhtoan() {
                    const button1 = document.getElementById("button1");
                    const button2 = document.getElementById("button2");

                    button1.style.display = "none";
                    button2.style.display = "inline-block";
                    button2.disabled = true; // Chặn người dùng bấm vào button2

                    const tenmien = document.getElementById("tenmien").value;
                    const duoimien = document.getElementById("duoimien").value;
                    const giftcode = document.getElementById("giftcode").value;

                    // Hiển thị sweet alert với nội dung xác nhận mua host
                    Swal.fire({
                        title: 'Xác nhận mua miền',
                        text: "Bạn có chắc chắn muốn mua miền này?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Đồng ý',
                        cancelButtonText: 'Hủy bỏ'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const xhr = new XMLHttpRequest();
                            xhr.open("POST", "/ajax/domain/xulydomain.php");
                            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                            xhr.onload = function() {
                                button1.style.display = "inline-block";
                                button2.style.display = "none";
                                button2.disabled = false; // Cho phép người dùng bấm vào button2 lại

                                if (xhr.status === 200) {
                                    const response = JSON.parse(xhr.responseText);
                                    if (response.success) {
                                        Swal.fire({
                                            icon: "success",
                                            text: response.message,
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
                                button2.disabled = false; // Cho phép người dùng bấm vào button2 lại

                                Swal.fire({
                                    icon: "error",
                                    text: "Error: " + xhr.statusText,
                                });
                            };
                            xhr.send(
                                "tenmien=" + encodeURIComponent(tenmien) +
                                "&giftcode=" + encodeURIComponent(giftcode) +
                                "&duoimien=" + encodeURIComponent(duoimien)
                            );
                        } else {
                            button1.style.display = "inline-block";
                            button2.style.display = "none";
                            button2.disabled = false; // Cho phép người dùng bấm vào button2 lại
                        }
                    });
                }
                </script>
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Lấy các phần tử HTML
                    var tenmienInput = document.getElementById('tenmien');
                    var duoimienSelect = document.getElementById('duoimien');
                    var domainInput = document.getElementById('domain');

                    // Thêm sự kiện khi giá trị thay đổi trong trường tenmien
                    tenmienInput.addEventListener('input', updateDomain);

                    // Thêm sự kiện khi giá trị thay đổi trong trường duoimien
                    duoimienSelect.addEventListener('change', updateDomain);

                    function updateDomain() {
                        // Lấy giá trị từ trường tenmien và duoimien
                        var tenmienValue = tenmienInput.value;
                        var duoimienValue = duoimienSelect.value; // Sử dụng giá trị value thay vì text

                        // Kiểm tra nếu tenmien hoặc duoimien rỗng
                        if (tenmienValue.trim() === '' || duoimienValue.trim() === '') {
                            // Hiển thị thông báo và không cập nhật giá trị domain
                            alert('Vui lòng chọn tên miền và đuôi miền');
                        } else if (!isValidDomain(tenmienValue)) {
                            // Kiểm tra tên miền không hợp lệ
                            alert('Tên miền không hợp lệ');
                        } else {
                            // Ghép giá trị và chèn vào trường domain
                            domainInput.value = tenmienValue + duoimienValue;
                        }
                    }

                    function isValidDomain(domain) {
                        // Sử dụng biểu thức chính quy để kiểm tra tên miền
                        // Trong ví dụ này, kiểm tra chỉ chấp nhận chữ cái và số, không chấp nhận ký tự đặc biệt
                        var domainRegex = /^[a-zA-Z0-9]+$/;
                        return domainRegex.test(domain);
                    }
                });
                </script>
                

                                </div>
                            </div>
                            <!--end::Card body-->
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Container-->
                </div>
                </br>
                <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/foot.php';?>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->

</html>