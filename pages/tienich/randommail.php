<html lang="en">
<!--begin::Head-->

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head2.php';?>

    <title>Tạo Random Email |
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
                                    Tạo Random Email</h1>
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
                            <h5 class="mb-3">Nhập thông tin để tạo email</h5>

                            <div class="row">
                                <div class="col-lg-4 mb-3">
                                    <label>Loại username:</label>
                                    <select class="form-control" id="type_username" onchange="checkUsernameField()">
                                        <option value="tu_chon" checked>No</option>
                                        <option value="random">Random</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label>Username:</label>
                                    <input type="text" id="user_name" class="form-control" placeholder="Ex: david" required>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label>Loại tên:</label>
                                    <select class="form-control" id="name_type" disabled>
                                        <option value="vn">Tên Việt Nam</option>
                                        <option value="foreign">Tên nước ngoài</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label>Kí tự:</label>
                                    <select class="form-control" id="ki_tu">
                                        <option value="no">No</option>
                                        <option value="-">"-"</option>
                                        <option value="_">"_"</option>
                                        <option value=".">"."</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label>Number type:</label>
                                    <select class="form-control" id="number">
                                        <option value="random">Random</option>
                                        <option value="theo_thu_tu">Theo thứ tự</option>
                                        <option value="dao_thu_tu">Đảo thứ tự</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label>Số đầu:</label>
                                    <input type="number" id="so_dau" class="form-control" value="1" required>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label>Số cuối:</label>
                                    <input type="number" id="so_cuoi" class="form-control" value="100" required>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label>Domain:</label>
                                    <input type="text" id="domain" class="form-control" placeholder="Ex: yahoo.com" required>
                                </div>
                            </div>
                            <center>
                                <button type="button" class="btn btn-primary" id="tao_btn" onclick="taoEmail();">Tạo Ngay</button>
                            </center>
                            <br>
                            
                            <!-- Kết quả -->
                            <div class="mt-3">
                                <label>Kết Quả</label>
                                <textarea readonly id="return_email" class="form-control" rows="10" placeholder="Danh sách email sẽ hiện ở đây"></textarea>
                                <center>
                                    <br>
                                    <a onclick="tai_file('return_email');">
                                        <button class="btn btn-dark">
                                            <i class="glyphicon glyphicon-save"></i> Download
                                        </button>
                                    </a>
                                    
                                    <a id="new_tab_1" onclick="view_new_tab('return_email', 'new_tab_1');">
                                        <button class="btn btn-info">
                                            <i class="glyphicon glyphicon-export"></i> View New Tab
                                        </button>
                                    </a>
                                    </br>
                                    </br>
                                    <a>
                                        <button class="btn btn-primary" onclick="copyToClipboard('return_email');">
                                            <i class="fa fa-clone"></i> Coppy
                                        </button>
                                    </a>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Hàm kiểm tra trường username
        function checkUsernameField() {
            const typeUsername = document.getElementById('type_username').value;
            const usernameField = document.getElementById('user_name');
            const nameTypeDropdown = document.getElementById('name_type');

            if (typeUsername === 'random') {
                usernameField.value = ''; // Xóa giá trị hiện tại
                usernameField.disabled = true; // Không cho nhập
                nameTypeDropdown.disabled = false; // Kích hoạt dropdown loại tên
            } else {
                usernameField.disabled = false; // Cho phép nhập
                nameTypeDropdown.disabled = true; // Vô hiệu hóa dropdown loại tên
                nameTypeDropdown.selectedIndex = 0; // Đặt lại giá trị chọn về mặc định
            }
        }

        // Hàm tạo email ngẫu nhiên
        function taoEmail() {
            const typeUsername = document.getElementById('type_username').value;
            const nameType = document.getElementById('name_type').value; // Lấy loại tên
            const username = typeUsername === 'random' ? (nameType === 'vn' ? generateRandomVNName() : generateRandomForeignName()) : document.getElementById('user_name').value || 'user';
            const kiTu = document.getElementById('ki_tu').value;
            const numberType = document.getElementById('number').value;
            const soDau = parseInt(document.getElementById('so_dau').value);
            const soCuoi = parseInt(document.getElementById('so_cuoi').value);
            const domain = document.getElementById('domain').value || 'example.com';
            let emails = [];

            for (let i = soDau; i <= soCuoi; i++) {
                let emailUsername = username;

                // Thêm số ngẫu nhiên nếu đã chọn
                if (numberType === 'random') {
                    emailUsername += Math.floor(Math.random() * 1000);
                } else if (numberType === 'theo_thu_tu') {
                    emailUsername += i;
                } else if (numberType === 'dao_thu_tu') {
                    emailUsername += (soCuoi - i + 1);
                }

                // Thêm ký tự nếu đã chọn
                if (kiTu !== 'no') {
                    emailUsername += kiTu;
                }

                emails.push(`${emailUsername}@${domain}`);
            }

            // Hiển thị kết quả trong textarea
            document.getElementById('return_email').value = emails.join('\n');
        }

        // Hàm sinh tên người Việt ngẫu nhiên không có dấu
        function generateRandomVNName() {
            const lastNames = ['nguyen', 'tran', 'le', 'pham', 'huynh', 'vu', 'dang', 'bui', 'ngo', 'duong'];
            const middleNames = ['van', 'thi', 'minh', 'duc', 'huyen', 'thu', 'tuan'];
            const firstNames = ['anh', 'hai', 'phong', 'tam', 'long', 'nhat', 'hung', 'minh', 'thang', 'bao'];

            const randomLastName = lastNames[Math.floor(Math.random() * lastNames.length)];
            const randomMiddleName = middleNames[Math.floor(Math.random() * middleNames.length)];
            const randomFirstName = firstNames[Math.floor(Math.random() * firstNames.length)];

            return randomLastName + randomMiddleName + randomFirstName; // Trả về tên không dấu
        }

        // Hàm sinh tên nước ngoài ngẫu nhiên
        function generateRandomForeignName() {
            const firstNames = ['John', 'Michael', 'Sarah', 'Jessica', 'David', 'Emily', 'Robert', 'Laura', 'James', 'Linda'];
            const lastNames = ['Smith', 'Johnson', 'Williams', 'Jones', 'Brown', 'Davis', 'Miller', 'Wilson', 'Moore', 'Taylor'];

            const randomFirstName = firstNames[Math.floor(Math.random() * firstNames.length)];
            const randomLastName = lastNames[Math.floor(Math.random() * lastNames.length)];

            return randomFirstName + randomLastName; // Trả về tên nước ngoài
        }

        // Hàm sao chép vào clipboard
        function copyToClipboard(elementId) {
            const copyText = document.getElementById(elementId);
            copyText.select();
            document.execCommand('copy');
            alert("Đã sao chép vào clipboard: " + copyText.value);
        }

        // Hàm tải file
        function tai_file(elementId) {
            const content = document.getElementById(elementId).value;
            const blob = new Blob([content], { type: 'text/plain' });
            const link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);
            link.download = 'email_list.txt';
            link.click();
        }

        // Hàm mở trong tab mới
        function view_new_tab(elementId, newTabId) {
            const content = document.getElementById(elementId).value;
            const newTab = window.open();
            newTab.document.write(`<pre>${content}</pre>`);
            newTab.document.close();
        }
    </script>
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
