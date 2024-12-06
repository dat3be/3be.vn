<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head2.php';?>
    <title>Key | <?=$chinhapi['ten_web'];?></title>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/nav.php';?>
</head>
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
                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            
                            
                            
                    </div>
                     <div class="d-flex align-items-center gap-2 gap-lg-3">
                              
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
                                    <div class=" text-center">
                                        <div class="row">
                           <center>
                                     <h3><strong>CLICK</strong> Vào Ô Bên Duoi Để Sao Chép Key</h3>
</center>
</div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            
       <div class="text-center">
           
            <p>
                <button class="custom-btn" name="submit" onclick="copyToClipboard('#keytool')" type="submit">
                    <span id="keytool">BẠN CHƯA LẤY KEY</span>
                </button>
            </p>
        </div>
    </div>
    </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <style>
                                    .custom-btn {
        border: 2px solid #0066FF; /* Màu viền */
        background-color: #f4f4f4; /* Màu nền mặc định */
        color: #000000; /* Màu chữ */
        padding: 10px 25px; /* Khoảng cách lề */
        border-radius: 5px; /* Bo góc viền */
        text-decoration: none; /* Loại bỏ gạch chân */
        transition: background-color 0.3s; /* Thời gian chuyển đổi màu nền */
    }

    .custom-btn:hover {
        background-color: #0066FF; /* Màu nền khi hover */
        color: #ffffff; /* Màu chữ khi hover */
        text-decoration: none; /* Loại bỏ gạch chân khi hover */
    }
</style>
<script>
      	var key = GetURLParameter('key');
      	if(key != ""){
	        document.getElementById("keytool").innerHTML = key;
        }
      
        function GetURLParameter(sParam) {
            var sPageURL = window.location.search.substring(1);
            var sURLVariables = sPageURL.split('&');
            for (var i = 0; i < sURLVariables.length; i++) {
                var sParameterName = sURLVariables[i].split('=');
                if (sParameterName[0] == sParam) {
                    return sParameterName[1];
                }
            }
        }
        function copyToClipboard(element) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).text()).select();
            document.execCommand("copy");
            $temp.remove();
            
            cuteToast({
        type: "success",
        message: "Đã sao chép vào bộ nhớ tạm",
        timer: 5000
    });
}
    </script>
<br>
                                                            
                                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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