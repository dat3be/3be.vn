<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../"/>
		<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head2.php';?>
    <title>Đăng Ký |
        <?=$chinhapi['ten_web'];?>
    </title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
<body style="background: url('https://i.imgur.com/QBiwR6p.jpeg') fixed bottom no-repeat; background-size: cover;" id="kt_body" class="auth-bg">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div
            class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <!--begin::Wrapper-->
                <div class="w-lg-500px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto">

                    <!--begin::Form-->
                    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form"
                        data-kt-redirect-url="/?page=index" action="#">
                        <!--begin::Heading-->
                        <div class="text-center mb-10">
                            <!--begin::Title-->
                            <h1 class="text-dark mb-3">
                                                            Quên Mật Khẩu </h1>
                            <!--end::Title-->

                            <!--begin::Link-->
                            <div class="text-gray-400 fw-bold fs-4">
                                Đã có tài khoản?

                                <a href="auth/login" class="link-primary fw-bolder">
                                    Đăng Nhập
                                </a>
                            </div>
                            <!--end::Link-->
                        </div>
                        <!--begin::Heading-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label fs-6 fw-bolder text-dark">Username OR Email</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control form-control-lg form-control-solid" type="text" id="username"
                                autocomplete="off" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Actions-->
                        <div class="text-center">
                            <!--begin::Submit button-->
                            <button type="button" onclick="register()" class="btn btn-lg btn-primary w-100 mb-5">
                                <span id="button1" class="indicator-label">Continue</span>
                                <span id="button2" class="indicator-progress" style="display: none;">Đang xử lý
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
            <script>
            function register() {
                const button1 = document.getElementById("button1");
                const button2 = document.getElementById("button2");

                button1.style.display = "none";
                button2.style.display = "inline-block";
                button2.disabled = true; // Chặn người dùng bấm vào button2

                const username = document.getElementById("username").value;

                const xhr = new XMLHttpRequest();
                xhr.open("POST", "/ajax/auth/reset-pass");
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
                                text: "Nếu username của bạn tồn tại, hệ thống sẽ gửi liên kết đặt lại mật khẩu cho bạn!",
                            }).then(() => {
                                window.location.href = "";
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
                    "username=" + encodeURIComponent(username)
                );
            }
            </script>
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Main-->


    <!--begin::Javascript-->
    <script>
    var hostUrl = "/assets/";
    </script>

    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="/assets/plugins/global/plugins.bundle.js"></script>
    <script src="/assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->


    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="/assets/js/custom/authentication/sign-in/general.js"></script>
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>