<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>MK &rsaquo; <?= $title; ?></title>

    <!-- Favicon -->
    <link href="<?= base_url('assets/img/general/' . $general['favicon']); ?>" rel="icon">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>modules/fontawesome/css/all.min.css">
    <script src="<?= base_url('assets/'); ?>modules/jquery.min.js"></script>

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>modules/chocolat/dist/css/chocolat.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>modules/codemirror/lib/codemirror.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>modules/codemirror/theme/duotone-dark.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>modules/jquery-selectric/selectric.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>modules/owlcarousel2/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>modules/owlcarousel2/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/components.css">

    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>

    <!-- Midtrans -->
    <!-- 
        Sandbox    = src="https://app.sandbox.midtrans.com/snap/snap.js"
        Production = src="https://app.midtrans.com/snap/snap.js" 
    -->
    <script type="text/javascript" src="<?= $general['url_status']; ?>" data-client-key="<?= $general['client_key']; ?>"></script>
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
    <script src="<?= base_url('assets/'); ?>modules/jquery.min.js"></script>


    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">