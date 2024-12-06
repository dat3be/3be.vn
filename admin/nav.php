<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake"
         src="https://cdn.jsdelivr.net/gh/quangtuu2006/admin_lite@main/dist/img/AdminLTELogo.png" alt="AdminLTELogo"
         height="60" width="60">
</div>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">Home</a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="https://cdn.jsdelivr.net/gh/quangtuu2006/admin_lite@main/dist/img/AdminLTELogo.png"
             alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="https://cdn.jsdelivr.net/gh/quangtuu2006/admin_lite@main/dist/img/user2-160x160.jpg"
                     class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= htmlspecialchars($username); ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="/admin" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Members -->
                <li class="nav-item">
                    <a href="users.php" class="nav-link">
                        <i class="nav-icon fas fa-user-alt"></i>
                        <p>Thành Viên</p>
                    </a>
                </li>

                <!-- Manage Payments -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-credit-card"></i>
                        <p>
                            Quản lý nạp tiền
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="setbank.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách ngân hàng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="lsnapthe.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lịch sử nạp thẻ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="lsnapbank.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lịch sử nạp bank</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Categories -->
                <li class="nav-header">DANH MỤC</li>

                <!-- Gift Codes -->
                <li class="nav-item">
                    <a href="giftcode.php" class="nav-link">
                        <i class="nav-icon fas fa-tag"></i>
                        <p>Giftcode</p>
                    </a>
                </li>

                <!-- Other Sections -->
                <?php
                $categories = [
                    [
                        "title" => "Bản Quyền",
                        "icon" => "fas fa-tag",
                        "subitems" => [
                            ["link" => "listbq.php", "name" => "Danh sách bản quyền"],
                            ["link" => "lsmuabq.php", "name" => "Lịch sử mua bản quyền"],
                        ],
                    ],
                    [
                        "title" => "Hosting",
                        "icon" => "fas fa-server",
                        "subitems" => [
                            ["link" => "listserverhost.php", "name" => "Server hosting"],
                            ["link" => "listgoihost.php", "name" => "Gói hosting"],
                            ["link" => "lsmuahost.php", "name" => "Lịch sử mua host"],
                        ],
                    ],
                    [
                        "title" => "Mã nguồn",
                        "icon" => "fas fa-code",
                        "subitems" => [
                            ["link" => "listcode.php", "name" => "Danh sách mã nguồn"],
                            ["link" => "lsmuacode.php", "name" => "Lịch sử mua code"],
                        ],
                    ],
                    [
                        "title" => "Domain",
                        "icon" => "fas fa-globe",
                        "subitems" => [
                            ["link" => "domain.php", "name" => "Domain"],
                            ["link" => "lsmuamien.php", "name" => "Lịch sử mua miền"],
                        ],
                    ],
                    [
                        "title" => "Bài viết",
                        "icon" => "fas fa-edit",
                        "subitems" => [
                            ["link" => "list-news.php", "name" => "Danh sách bài viết"],
                        ],
                    ],
                    [
                        "title" => "Giá Web",
                        "icon" => "fas fa-money-check-alt",
                        "subitems" => [
                            ["link" => "list-giaweb.php", "name" => "Danh sách giá web"],
                        ],
                    ],
                ];

                foreach ($categories as $category) {
                    echo '<li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="nav-icon ' . $category["icon"] . '"></i>
                                  <p>' . $category["title"] . '<i class="right fas fa-angle-left"></i></p>
                              </a>
                              <ul class="nav nav-treeview">';
                    foreach ($category["subitems"] as $subitem) {
                        echo '<li class="nav-item">
                                  <a href="' . $subitem["link"] . '" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>' . $subitem["name"] . '</p>
                                  </a>
                              </li>';
                    }
                    echo '</ul></li>';
                }
                ?>

                <!-- Settings -->
                <li class="nav-header">CÀI ĐẶT</li>
                <li class="nav-item">
                    <a href="setting.php" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Settings</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
