            <!--
//////////////////////////////////////////////////////////////////////
//  Thế gian không nợ ta điều gì, nhân quả báo ứng không chừa một ai//
//                          _ooOoo_                               ////
//                         o8888888o                              ////
//                         88" . "88                              ////
//                         (| ^_^ |)                              ////
//                         O\  =  /O                              ////
//                      ____/`---'\____                           ////
//                    .'  \\|     |//  `.                         ////
//                   /  \\|||  :  |||//  \                        ////
//                  /  _||||| -:- |||||-  \                       ////
//                  |   | \\\  -  /// |   |                       ////
//                  | \_|  ''\---/''  |   |                       ////
//                  \  .-\__  `-`  ___/-. /                       ////
//                ___`. .'  /--.--\  `. . ___                     ////
//              ."" '<  `.___\_<|>_/___.'  >'"".                  ////
//            | | :  `- \`.;`\ _ /`;.`/ - ` : | |                 ////
//            \  \ `-.   \_ __\ /__ _/   .-` /  /                 ////
//      ========`-.____`-.___\_____/___.-`____.-'========         ////
//                           `=---='                              ////
//      ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^        ////
//          Phật pháp từ bi, quay đầu là bờ                       ////
//          Mong đức phật phù hộ cho code con không bug           ////
//          Còn Thằng Lồn Kia Mau Tắt DevTool                     ////
//                      DichVuMight.Com                           ////
/////////////////////////////////////////////////////////////////////-->
<!DOCTYPE html>
<html lang="en">
<style>

</style>
<head>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head2.php';?>
    <title>Trang Chủ | <?=$chinhapi['ten_web'];?></title>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/nav.php';?>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>

<body id="kt_app_body" data-kt-app-layout="light-sidebar" data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <!--begin::Theme mode setup on page load-->
    <script>var defaultThemeMode = "light"; var themeMode; if (document.documentElement) { if (document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if (localStorage.getItem("data-bs-theme") !== null) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/sider.php';?>
            </div>
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <div class="d-flex flex-column flex-column-fluid">
                    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Mã Nguồn</h1>
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                    <li class="breadcrumb-item text-muted">
                                        <a href="../../demo1/dist/index.html"
                                            class="text-muted text-hover-primary">Home</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                    </li>
                                    <li class="breadcrumb-item text-muted">Dashboards</li>
                                </ul>
                            </div>
                            <!--begin::Actions-->
                            <div class="d-flex align-items-center gap-2 gap-lg-3">
                                <!--begin::Filter menu-->
                                    <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_create_app">
                                    <?=tien($user['money']);?>đ
                                </a>
                                <!--end::Primary button-->
                                    <script>
        window.onload = function() {
            const audio = document.getElementById('background-music');
            audio.volume = 0.5; // Đặt âm lượng từ 0.0 đến 1.0
            audio.play().catch(error => {
                console.error('Không thể tự động phát nhạc:', error);
                // Nếu trình duyệt chặn phát nhạc tự động, có thể yêu cầu người dùng nhấn nút
                document.getElementById('play-button').style.display = 'block';
            });
        };

        function playMusic() {
            const audio = document.getElementById('background-music');
            audio.play();
            document.getElementById('play-button').style.display = 'none'; // Ẩn nút sau khi phát
        }
    </script>
</head>
<body>
    <audio id="background-music">
        <source src="manguon.mp3" type="audio/mpeg">
        Your browser does not support the audio tag.
    </audio>
                            </div>
                        </div>
                    </div>
    <style>
      .box-hmanh {
   background: white;
   border-radius: 10px;
   width: 22%;
   box-sizing: border-box;
   padding: 7px;
   margin: 5px;
   
}
.img-hmanh{
   width: 100%;
   height: 100px;
   border-radius: 12px;
}

.active-hmanh {
   background-image: linear-gradient(to right, rgba(39, 245, 199, 0.8), rgba(82, 204, 253, 0.8), rgba(255, 110, 241, 0.8)) ! important;
}

.tab-hmanh {
   width: 95%;
   padding: 10px;
   margin-left: 15px;
}

.page {
   background: white;
   box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
   border-radius: 6px;
   margin: 4px;
   width: 36px;
   height: 36px;
   display: flex;
   align-items: center;
   text-align: center;
   justify-content: center;
}

.page-right {
   background: white;
   padding: 9px;
   box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
   border-radius: 6px;
   margin: 4px;
   width: 36px;
   height: 36px;
   display: flex;
   align-items: center;
   justify-content: center;
   text-align: center;
}

.page-left {
   background: white;
   padding: 9px;
   box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
   border-radius: 6px;
   margin: 4px;
   width: 36px;
   height: 36px;
   display: flex;
   align-items: center;
   text-align: center;
   justify-content: center;
}

@media only screen and (max-width: 600px) {
.box-hmanh {
   background: white;
   border-radius: 10px;
   width: 45%;
   box-sizing: border-box;
   margin: 5px;
}
.img-hmanh{
   width: 100%;
   height: 85px;
   border-radius: 12px;
}
}
.flex-hmanh {
   display: flex;
   width: 100%;
   flex-wrap: wrap;
   justify-content: center;
}
.hmanh-css {
   width: 0;
   height: 0;
   padding: 5px;
   border-radius: 50%; 
   margin: 4px 4px 7px 4px;
}
.flex-css {
   display: flex;
}

.title-hmanh {
   font-weight: bold;
   font-size: 13px;
   user-select: none;
   margin-top: 5px;
}
.title-hmanh:hover {
   font-weight: bold;
   font-size: 13px;
   color: red;
   user-select: none;
   margin-top: 5px;
}
.flex-gia {
   user-select: none;
   display: flex;
   white-space: nowrap;
   overflow-x: auto;
   overflow-y: hidden;
   text-overflow: ellipsis;
}
.flex-gia::-webkit-scrollbar {
    display: none;
}

.money-hmanh {
   background-image: linear-gradient(to right, rgba(198, 173, 60, 0.72), rgba(237, 189, 44, 0.8), rgba(198, 173, 60, 0.72));
   padding: 3px;
   border-radius: 5px;
   font-size: 11px;
   margin-right: 3px;
}

.tam-hmanh {
   background-image: linear-gradient(to right, rgba(237, 41, 41, 0.74), rgba(237, 41, 41, 1));
   padding: 3px;
   border-radius: 5px;
   font-size: 11px;
   color: white;
   margin-right: 3px;
}

.free-hmanh {
   background: rgba(13, 181, 74, 0.23);
   color: rgba(13, 181, 74, 1);
   padding: 3px;
   border-radius: 5px;
   font-size: 11px;
   margin-right: 3px;
}

.text-title {
   padding: 3px;
   border-radius: 5px;
   color: rgba(57, 163, 255, 1);
   background: rgba(57, 163, 255, 0.27);
   font-size: 11px;
}
.access-hmanh {
   border-radius: 15px;
   padding: 6px;
   background-image: linear-gradient(to right, rgba(0, 63, 255, 0.8), rgba(28, 162, 255, 0.8));
   margin: 0 auto;
   width: 90%;
   color: white;
   text-align: center;
   margin-top: 7px;
   margin-bottom: 7px;
}


#tabs {
    margin: 0 !important;
    padding: 0;
    border: none;
    background: transparent;
}

#tabs ul {
    list-style: none;
    padding: 0;
    margin: 0;
    background: transparent; 
    border: none;
}

#tabs ul li {
    margin: 5px ! important;
    padding: 0;
    display: inline-block;
    background: transparent; 
    border: none;
    font-size: 14px ! important;
    
}

#tabs ul li a {
    padding: 4px !important;
    text-decoration: none;
    color: black;
    background: transparent; 
    font-weight: normal;
    border: none;
    border-radius: 15px !important;
}

.ui-tabs .ui-tabs-active {
    background: rgba(255, 0, 72, 0.8) !important; 
    border: none !important;
    border-radius: 15px !important;
    margin: 5px !important;
}

.ui-tabs .ui-tabs-active a {
    color: white !important; 
    background: rgba(255, 0, 72, 0.8) !important; 
    padding: 4px !important;
    border: none !important; 
    border-radius: 15px !important;
}

#tab-1, #tab-2 {
    padding: 0;
    border: none;
    border-radius: 15px !important;
    background: transparent; 
}

#tabs .ui-tabs-nav {
    border-bottom: none;
    padding: 0;
    background: transparent;
}

#tabs .ui-tabs-panel {
    padding: 20px 0;
    background: transparent;
    border: none;
    border-radius: 13px !important;
}

.ui-widget-content {
    background: transparent !important;
    border: none !important;
}  
    </style>               
                    </div>
    <!-- Tab 1: Lượt Xem Nhiều Nhất -->
    <div id="tab-1">
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div class="container-xxl" id="kt_content_container">
                <!--begin::Row-->
                <div class="row gy-5 g-xl-8">
                    <div class="flex-hmanh">
                        
                        <?php 
                        $itemsPerPage = 12;
                        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                        $start = ($page - 1) * $itemsPerPage;
                        $totalItemsQuery = mysqli_query($ketnoi, "SELECT COUNT(*) AS total FROM `khocode` WHERE `status`='ON'");
                        $totalItemsResult = mysqli_fetch_assoc($totalItemsQuery);
                        $totalItems = $totalItemsResult['total'];
                        $totalPages = ceil($totalItems / $itemsPerPage);
                        $result = mysqli_query($ketnoi, "SELECT * FROM `khocode` WHERE `status`='ON' ORDER BY `id` DESC LIMIT $start, $itemsPerPage");

                        while($row = mysqli_fetch_assoc($result)) {
                            $title = $row['title'];
                            $maxLength = 25;

                            if (strlen($title) > $maxLength) {
                                $shortTitle = mb_substr($title, 0, $maxLength) . '...';
                            } else {
                                $shortTitle = $title;
                            }
                        ?>
                        <div class="box-hmanh">
                            <div class="flex-css">
                                <div class="hmanh-css" style="background: rgba(245, 0, 0, 0.61);"></div>
                                <div class="hmanh-css" style="background: rgba(253, 171, 67, 0.76);"></div>
                                <div class="hmanh-css" style="background: rgba(72, 167, 27, 1);"></div>
                            </div>
                            <img src="<?=$row['img'];?>" alt="<?=$shortTitle;?>" class="img-hmanh">
                            <p class="title-hmanh"><?=$shortTitle;?></p>
                            <div class="flex-gia">
                            <?php
                                $gia = $row['gia'];

                                if ($gia == 0) {
                                    echo '<div class="free-hmanh">Source Miễn phí</div>';
                                } elseif ($gia > 0) {
                                    echo '<div class="money-hmanh">'. 'Source Có Phí </div>';
                                } else {
                                    echo number_format($gia) . 'đ';
                                }
                                ?>
                                <div class="text-title">
                                    <i style="color:rgba(57, 163, 255, 1);" class="fa-solid fa-code"></i> Mã Nguồn Website
                                </div>
                            </div>
                            <a href="/ma-nguon/<?=$row['id'];?>">
                                <div class="access-hmanh">Xem Ngay</div>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- Pagination -->
            <div class="pagination">
                <?php if($page > 1): ?>
                    <a class="page-left" href="/ma-nguon-page/<?=$page-1;?>"><i class="fa-solid fa-chevron-left"></i></a>
                <?php endif; ?>

                <?php for($i = 1; $i <= $totalPages; $i++): ?>
                    <a href="/ma-nguon-page/<?=$i;?>" class="page <?php if($i == $page) echo 'active-hmanh'; ?>"><?=$i;?></a>
                <?php endfor; ?>

                <?php if($page < $totalPages): ?>
                    <a class="page-right" href="/ma-nguon-page/<?=$page+1;?>"><i class="fa-solid fa-chevron-right"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
                </div>
                <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/foot.php';?>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#tabs").tabs();
        });
    </script>