<?php
require_once '_config/config.php';

require '_assets/libs/vendor/autoload.php';

if (!(isset($_SESSION['user']))) {
    echo "<script> window.location='" . baseUrl('auth/login.php') . "';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - SB Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= baseUrl('_assets/css/bootstrap.css'); ?>" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="<?= baseUrl('_assets/css/sb-admin.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= baseUrl('_assets/font-awesome/css/font-awesome.min.css'); ?>">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">

    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SB Admin</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li><a href="<?= baseUrl('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="<?= baseUrl('obat'); ?>"><i class="fa fa-bar-chart-o"></i> Data Obat</a></li>
                    <li><a href="<?= baseUrl('pasien'); ?>"><i class="fa fa-table"></i> Data Pasien</a></li>
                    <li><a href="<?= baseUrl('poliklinik'); ?>"><i class="fa fa-edit"></i> Data Poliklinik</a></li>
                    <li><a href="<?= baseUrl('dokter'); ?>"><i class="fa fa-font"></i> Data Dokter</a></li>
                    <li><a href="<?= baseUrl('rekam'); ?>"><i class="fa fa-desktop"></i> Rekam Medis</a></li>
                    <li><a href="<?= baseUrl('auth/logout.php'); ?>"><i class="fa fa-file"></i> Logout</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">