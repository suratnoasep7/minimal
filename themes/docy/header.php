<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>themes/docy/img/favicon.ico" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/docy/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/docy/assets/bootstrap/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/docy/assets/slick/slick.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/docy/assets/slick/slick-theme.css">
    <!-- icon css-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/docy/assets/elagent-icon/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/docy/assets/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/docy/assets/niceselectpicker/nice-select.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/docy/assets/animation/animate.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/docy/assets/mcustomscrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/docy/assets/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/docy/css/style-main.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/docy/css/responsive.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/docy/css/font-awesome.min.css">
    <script src="<?php echo base_url(); ?>themes/docy/js/jquery-3.5.1.min.js"></script>
    <title><?php echo isset($toolbar_title) ? "{$toolbar_title} : " : '';?> Docs Bhisa</title>
</head>
<body class="doc wide-container" data-spy="scroll" data-target="#navbar-example3" data-scroll-animation="true">
<div id="preloader">
    <div id="ctn-preloader" class="ctn-preloader">
        <div class="round_spinner">
            <div class="spinner"></div>
            <div class="text">
                <img src="<?php echo base_url(); ?>themes/docy/img/spinner_logo.png" alt="">
            </div>
        </div>
    </div>
</div>
<div class="body_wrapper">
    <div class="click_capture"></div>
    <!--================Forum Breadcrumb Area =================-->
    <section class="page_breadcrumb">
        <div class="container custom_container">
            <div class="row">
                <div class="col-sm-7">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Docs</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Docy WordPress Theme</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-sm-5">
                    <a href="#" class="date"><i class="icon_clock_alt"></i>Updated on March 03, 2020</a>
                </div>
            </div>
        </div>
    </section>
    <!--================End Forum Breadcrumb Area =================-->
    <!--================Topic Area =================-->
    <section class="doc_documentation_area" id="sticky_doc">
        <div class="overlay_bg"></div>
        <div class="container custom_container">
            <div class="row">