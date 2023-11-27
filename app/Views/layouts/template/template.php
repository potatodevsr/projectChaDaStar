<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- <link rel="stylesheet" href="<?php echo PUBLIC_URL ?>/font/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_URL ?>/font/css/css.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo PUBLIC_URL ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- <link rel="stylesheet" href="<?php echo PUBLIC_URL ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_URL ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
    <link rel="stylesheet" href="<?php echo PUBLIC_URL ?>/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_URL ?>/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_URL ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_URL ?>/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo PUBLIC_URL ?>/plugins/summernote/summernote-bs4.min.css">
    <link href="<?php echo PUBLIC_URL ?>/DataTables/datatables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/busy-load@0.1.2/dist/app.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo PUBLIC_URL ?>/css/baseCss.css">
    <script>
        var BASE_URL = '<?php echo BASE_URL ?>';
        var ADMIN_URL = '<?php echo ADMIN_URL ?>';
    </script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php echo $sidebar; ?>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <!-- <div class="col-sm-6"> -->
                        <?php echo $contents; ?>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
        <?php echo $footer ?>

        <script src="<?php echo PUBLIC_URL ?>/plugins/jquery/jquery.min.js"></script>
        <script src="<?php echo PUBLIC_URL ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo PUBLIC_URL ?>/serializeToJSON/src/jquery.serializeToJSON.js"></script>
        <!-- <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script> -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/busy-load@0.1.2/dist/app.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>        <!-- <script src="<?php echo PUBLIC_URL ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
        <script src="<?php echo PUBLIC_URL ?>/plugins/chart.js/Chart.min.js"></script>
        <script src="<?php echo PUBLIC_URL ?>/plugins/sparklines/sparkline.js"></script>
        <script src="<?php echo PUBLIC_URL ?>/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="<?php echo PUBLIC_URL ?>/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <script src="<?php echo PUBLIC_URL ?>/plugins/jquery-knob/jquery.knob.min.js"></script>
        <script src="<?php echo PUBLIC_URL ?>/plugins/moment/moment.min.js"></script>
        <script src="<?php echo PUBLIC_URL ?>/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- <script src="<?php echo PUBLIC_URL ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
        <script src="<?php echo PUBLIC_URL ?>/plugins/summernote/summernote-bs4.min.js"></script>
        <script src="<?php echo PUBLIC_URL ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <script src="<?php echo PUBLIC_URL ?>/dist/js/adminlte.js"></script>
        <script src="<?php echo PUBLIC_URL ?>/dist/js/demo.js"></script>
        <script src="<?php echo PUBLIC_URL ?>/DataTables/datatables.min.js"></script>
        <script src="<?php echo PUBLIC_URL ?>/js/mainJs.js"></script>

        <?php if (isset($scripts) && is_array($scripts)) : ?>
            <?php foreach ($scripts as $scriptName => $scriptPaths) : ?>
                <?php foreach ($scriptPaths as $_js) : ?>
                    <?= script_tag($_js) ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if (isset($single_script)) : ?>
            <?= script_tag($single_script) ?>
        <?php endif; ?>
</body>

</html>