<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../" />
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head2.php';?>
    <title>Đăng Nhập |
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

<body style="background: url('https://i.imgur.com/QBiwR6p.jpeg') fixed bottom no-repeat; background-size: cover;" id="kt_body" class="app-blank">
    <!--begin::Theme mode setup on page load-->
    <script>var defaultThemeMode = "light"; var themeMode; if (document.documentElement) { if (document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if (localStorage.getItem("data-bs-theme") !== null) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
    <!--end::Theme mode setup on page load-->
    <!--begin::Root-->
            <!--end::Logo-->
            <!--begin::Aside-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div
            class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <!--begin::Wrapper-->
                <div class="w-lg-400px bg-white rounded shadow-sm p-10 p-lg-8 mx-auto">

                    <!--begin::Form-->
                    <form class="form w-120" novalidate="novalidate" id="kt_sign_in_form"
                        data-kt-redirect-url="/?page=index" action="#">
                        <!--begin::Heading-->
                        <div class="text-center mb-10">
                            <!--begin::Title-->
                            <h1 class="text-dark mb-3">
                                Đăng Nhập </h1>
                            <!--end::Title-->
                        </div>
                        <!--begin::Heading-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label fs-6 fw-bolder text-dark">Email Or Username</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control is-valid" type="text" id="username"
                                autocomplete="off" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack mb-2">
                                <!--begin::Label-->
                                <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                                <!--end::Label-->

                                <!--begin::Link-->
                                <a href="auth/password-reset" class="link-primary fs-6 fw-bolder">
                                    Quên mật khẩu ?
                                </a>
                                <!--end::Link-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Input-->
                            <input class="form-control is-invalid" type="password" id="password"
                                autocomplete="off" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Actions-->
                        <div class="text-center">
                            <!--begin::Submit button-->
                            <button type="button" onclick="login()" class="btn btn-lg btn-primary w-100 mb-5">
                                <span id="button1" class="indicator-label">Continue</span>
                                <span id="button2" class="indicator-progress" style="display: none;">Đang xử lý
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div> 
       <div class="d-flex align-items-center mb-5"> 
        <div class="border-bottom border-gray-300 mw-50 w-100"></div> 
        <span class="fw-semibold text-gray-400 fs-7 mx-2">Hoặc</span> 
        <div class="border-bottom border-gray-300 mw-50 w-100"></div> 
       </div> 
       <a href="/auth/login-google" class="btn btn-outline btn-outline-dashed btn-outline-primary btn-active-light-primary w-100 mb-5"> 
        <img src="https://cdn1.iconfinder.com/data/icons/google-s-logo/150/Google_Icons-09-1024.png" trigger="loop" delay="1000" style="width:30px;height:30px"></lord-icon> <span id="button1_fb" class="indicator-label">Google</span> </a> 
        <!--begin::Link-->
    <center>
                            <div class="text-gray-400 fw-bold fs-5">
                                Chưa có tài khoản?

                                <a href="auth/register" class="link-primary fw-bolder">
                                    Đăng Kí Ngay
                                </a>
                            </div>
                            <!--end::Link-->
       <!--end::Actions--> 
      </form>
      <!--end::Form--> 
     </div> 
     <!--end::Wrapper--> 
    </div> 
    <!--end::Content-->
            <!--end::Content-->
            <script>
            function login() {
                const button1 = document.getElementById("button1");
                const button2 = document.getElementById("button2");

                button1.style.display = "none";
                button2.style.display = "inline-block";
                button2.disabled = true;

                const username = document.getElementById("username").value;
                const password = document.getElementById("password").value;

                const xhr = new XMLHttpRequest();
                xhr.open("POST", "/ajax/auth/xulylogin");
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
                                message: "Đăng nhập thành công!",
                                timer:1000
                            }).then(() => {
                                window.location.href = "/home";
                            });
                        } else {
                            cuteToast({
                                type: "error",
                                message: response.message,
                                timer:1000
                            });
                        }
                    } else {
                        cuteToast({
                            type: "error",
                            message: "Error: " + xhr.statusmessage,
                            timer:1000
                        });
                    }
                };
                xhr.onerror = function() {
                    button1.style.display = "inline-block";
                    button2.style.display = "none";

                    cuteToast({
                        type: "error",
                        message: "Error: " + xhr.statusmessage,
                        timer:1000
                    });
                };
                xhr.send(
                    "username=" + encodeURIComponent(username) + 
                    "&password=" + encodeURIComponent(password)
                );
            }
            </script>
            <!--begin::Footer-->
            <!--end::Footer-->
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