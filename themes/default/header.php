<?php
Assets::add_css(array('bootstrap.min.css', 'bootstrap-responsive.min.css'));
$inline = '$(".select2").select2({allowClear: true});';
Assets::add_js($inline, 'inline');

?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <title><?php
        echo isset($page_title) ? "{$page_title} : " : '';
        e(class_exists('Settings_lib') ? settings_item('site.title') : 'kioslinecom');
    ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php e(isset($meta_description) ? $meta_description : ''); ?>">
    <meta name="author" content="<?php e(isset($meta_author) ? $meta_author : ''); ?>">
    <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo js_path(); ?>jquery-1.7.2.min.js"><\/script>');</script>
    <?php echo Assets::js(); ?>
    <?php
    /* Modernizr is loaded before CSS so CSS can utilize its features */
    echo Assets::js('modernizr-2.5.3.js');
	//select2
    echo Assets::js('select2/4.0.0/select2.full.js');
	?>
    <?php echo Assets::css(); ?>
    <?php echo Assets::css('select2/4.0.0/select2.css'); ?>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico">
</head>
<body>