<!DOCTYPE html>

<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="<?= base_url('assets/'); ?>" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?= $title ?></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/favicon/favicon.ico'); ?>" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Bootstrap Select CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css" rel="stylesheet">


    <!-- {{-- date range picker --}} -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- {{-- moment js --}} -->
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.34/moment-timezone.min.js" crossorigin="anonymous"></script>

    <link href='https://cdn.datatables.net/2.0.6/css/dataTables.bootstrap5.min.css' rel='stylesheet'>
    <script src="https://cdn.datatables.net/2.0.6/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.6/js/dataTables.bootstrap5.min.js"></script>

    <link rel="stylesheet" href="<?= base_url('assets/vendor/fonts/boxicons.css'); ?>" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/core.css'); ?>" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/theme-default.css'); ?>" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url('assets/css/demo.css'); ?>" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css'); ?>" />

    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/pages/page-auth.css'); ?>" />
    <script src="<?= base_url('assets/vendor/js/helpers.js'); ?>"></script>
    <script src="<?= base_url('assets/js/config.js'); ?>"></script>
</head>

<body>
    <?= $this->renderSection('body_auth'); ?>

    <?= $this->renderSection('body'); ?>

    <script src="<?= base_url('assets/vendor/libs/jquery/jquery.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/popper/popper.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/js/bootstrap.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/js/menu.js'); ?>"></script>



    <!-- {{-- bootstrap select --}} -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>

    <!-- {{-- date range picker --}} -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <!-- Main JS -->
    <script src="<?= base_url('assets/js/main.js'); ?>"></script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>