<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
$toolbar = "";
foreach ($segment as $i => $isi) {
    $toolbar .= strlen(trim($toolbar)) > 0 ? " - " : "";
    $toolbar .= $isi->caption;
}
?>

<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-sidebar="dark" data-sidebar-size="sm" data-sidebar-image="none" data-layout-style="default" data-layout-mode="maroon" data-layout-width="fluid" data-layout-position="fixed">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- <title><?= isset($page_title) ? "{$page_title} : " : '';  ?> - <?= isset($toolbar_title) ? "{$toolbar_title}" : ''; ?> </title> -->
    <title> <?= $toolbar ?></title>

    <link rel="shortcut icon" type="image/x-icon" href="https://ptbst.id/shuttle-2021/img/bhisa-hori-wh.svg">

    <?php
    include 'head-css.php';
    include 'vendor-scripts.php';

    ?>
</head>

<body>
    <div id="toolbar-template" style="display: none;">
        <ul class="breadcrumb">
            <?php foreach ($segment as $i => $isi) { ?>
                <li class="breadcrumb-item <?= ($i > 1) ? 'active' : '' ?>"><a href="<?= ($i == 1) ? site_url($isi->name) : '' ?>" <?= $i == 1 ? '' : 'onclick="return false"' ?>><?= ucwords($isi->caption) ?></a></li>
            <?php } ?>
        </ul>
    </div>
    <div class="main-wrapper">

        <div id="loader-wrapper">
            <div id="loader">
                <div class="loader-ellips">
                    <span class="loader-ellips__dot"></span>
                    <span class="loader-ellips__dot"></span>
                    <span class="loader-ellips__dot"></span>
                    <span class="loader-ellips__dot"></span>
                </div>
            </div>
        </div>

        <?php
        include 'topbar.php';
        include 'sidebar.php';
        ?>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <?php
                echo Template::message();
                echo isset($content) ? $content : Template::content();
                ?>
            </div>
        </div>
    </div>

    <script>
        $("#toolbar-template").children().clone().appendTo(".page-header .row .col")
    </script>
</body>

</html>