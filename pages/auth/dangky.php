<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head2.php';?>
    <title>Đăng Ký | <?=$tozpie['ten_web'];?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" />
    <link href="/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagid(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-5FS8GGP');
    </script>
    <!--End::Google Tag Manager -->
</head>
<!--end::Head-->

<!--begin::Body-->

<body style="background: url('https://i.imgur.com/QBiwR6p.jpeg') fixed bottom no-repeat; background-size: cover;" id="kt_body" class="auth-bg">

    <!--Begin::Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!--End::Google Tag Manager (noscript) -->

    <!--begin::Main-->
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
                                Đăng Kí Tài Khoản </h1>
                            <!--end::Title-->

                            <!--begin::Link-->
                            
                            <!--end::Link-->
                        </div>
                        <!--begin::Heading-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label fs-6 fw-bolder text-dark">Tài khoản đăng nhập</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control form-control-lg form-control-solid" type="text" id="username"
                                autocomplete="off" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control form-control-lg form-control-solid" type="text" id="email"
                                autocomplete="off" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                      
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack mb-2">
                                <!--begin::Label-->
                                <label class="form-label fw-bolder text-dark fs-6 mb-0">Mật khẩu</label>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Input-->
                            <input class="form-control form-control-lg form-control-solid" type="password" id="password"
                                autocomplete="off" />
                            <!--end::Input-->
                        </div>
                    <div class="fv-row mb-10">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack mb-2">
                                <!--begin::Label-->
                                <label class="form-label fw-bolder text-dark fs-6 mb-0">Nhập lại mật khẩu</label>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Input-->
                            <input class="form-control form-control-lg form-control-solid" type="password" id="repassword"
                                autocomplete="off" />
                            <!--end::Input-->
                        </div>
                        <!--begin::Actions-->
                        <div class="text-center">
                            <!--begin::Submit button-->
                            <button type="button" onclick="register()" class="btn btn-lg btn-primary w-100 mb-5">
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
    <center>
        <div class="text-gray-400 fw-bold fs-5">
                                Đã có tài khoản?

                                <a href="login" class="link-primary fw-bolder">
                                    Đăng Nhập
                                </a>
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
                const password = document.getElementById("password").value;
                const repassword = document.getElementById("repassword").value;
                const email = document.getElementById("email").value;

                const xhr = new XMLHttpRequest();
                xhr.open("POST", "/ajax/auth/xulyregister");
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onload = function() {
                    button1.style.display = "inline-block";
                    button2.style.display = "none";
                    button2.disabled = false; // Cho phép người dùng bấm vào button2 lại

                    if (xhr.status === 200) {
                        const response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            cuteToast({
                                type: "success",
                                message: "Đăng ký thành công!",
                                timer: 2000
                            }).then(() => {
                                window.location.href = "/home";
                            });
                        } else {
                            cuteToast({
                                type: "error",
                                message: response.message,
                                timer : 2000
                            });
                        }
                    } else {
                        cuteToast({
                            type: "error",
                            message: "Error: " + xhr.statusText,
                            timer: 2000
                        });
                    }
                };
                xhr.onerror = function() {
                    button1.style.display = "inline-block";
                    button2.style.display = "none";
                    button2.disabled = false; // Cho phép người dùng bấm vào button2 lại

                    cuteToast({
                        type: "error",
                        message: "Error: " + xhr.statusText,
                        timer:2000
                    });
                };
                xhr.send(
                    "username=" + encodeURIComponent(username) +
                    "&password=" + encodeURIComponent(password) +
                    "&repassword=" + encodeURIComponent(repassword) +
                    "&email=" + encodeURIComponent(email)
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