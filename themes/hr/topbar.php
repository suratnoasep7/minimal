<!-- Header -->
<div class="header">
    <!-- Logo -->
    <div class="header-left">
        <a href="<?= base_url(); ?>" class="logo">
            <img src="https://ptbst.id/shuttle-2021/img/bhisa-hori-wh.svg" width="150" height="40" alt="">
        </a>
    </div>
    <!-- /Logo -->

    <a id="toggle_btn" href="javascript:void(0);">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

    <!-- Header Menu -->

    <style>
        /*  Navigation Menu Horizontal Scroll by igniel.com */
        .navbar-custom-menu ul {
            max-width: 100%;
            /* float: left !important; */
        }

        .navbar-custom-menu {
            color: #fff;
            line-height: 0px;
            overflow-x: auto;
            overflow-y: hidden;
            /* max-width: 70%; */
            max-width: calc(100vw - 350px);
            float: left !important;
            height: 60px;
        }


        .navbar-custom-menu ul,
        .navbar-custom-menu li {
            /* list-style: none; */
            display: inline-block;
            white-space: nowrap;
            margin: 0px;
            padding: 0px;
            height: 65px;
        }

        .navbar-custom-menu li:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .navbar-custom-menu .active {
            background: rgba(255, 255, 255, 0.2);
            font-weight: bold;
        }

        .navbar-custom-menu::-webkit-scrollbar {
            background: #fff;
            height: 7px;
            border-radius: 4px;
        }

        .navbar-custom-menu::-webkit-scrollbar-thumb {
            background: #eee;
            border-radius: 4px;
            cursor: pointer;
        }

        .navbar-custom-menu:hover::-webkit-scrollbar-thumb {
            background: #9c0001;
            border-radius: 4px;
        }

        .user-menus a {
            color: #fff !important;
        }

        @media screen and (max-width: 992px) {
            .navbar-custom-menu {
                margin-left: 60px;
                /* max-width: 80%; */
                max-width: calc(100vw - 120px);
            }

            .header-left {
                display: none;
            }
        }
    </style>
    <div class="navbar-custom-menu">
        <ul class="user-menus text-center ">
            <!-- <div style="float:left;"> -->
            <?php
            $module_menu = modules::run('navigation/menu_module', "HR");
            // $module_menu = modules::run('navigation/menu_module');
            foreach ($module_menu as $row) {
            ?>
                <li class="<?= $this->uri->segment(1) == strtolower($row->name) ? "active" : ""; ?>">
                    <a href="<?= site_url(strtolower($row->name)) ?>" class=" nav-link" style="line-height:20px; ;">
                        <b><i class="<?= str_replace("fa fa", "la la", $row->icon) ?>" style="font-size: 29px;"></i></b>
                        <div>
                            <small>
                                <?= $row->caption ?>
                            </small>
                        </div>
                    </a>
                </li>
            <?php
            }
            ?>
            <!-- </div> -->

        </ul>
    </div>

    <ul class="nav user-menu">
        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span class="user-img"><img src="<?= base_url(); ?>assets/smarthr/assets/img/profiles/avatar-21.jpg" alt="">
                    <span class="status online"></span></span>
                <span></span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="profile.php">My Profile</a>
                <a class="dropdown-item" href="settings.php">Settings</a>
                <a class="dropdown-item" href="index.php">Logout</a>
            </div>
        </li>
    </ul>
    <!-- /Header Menu -->

    <!-- Mobile Menu -->
    <div class="dropdown mobile-user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="profile.php">My Profile</a>
            <a class="dropdown-item" href="settings.php">Settings</a>
            <a class="dropdown-item" href="index.php">Logout</a>
        </div>
    </div>
    <!-- /Mobile Menu -->
</div>
<!-- /Header -->