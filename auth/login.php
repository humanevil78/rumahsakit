<?php
require_once '../_config/config.php';


if (isset($_POST["submit"])) {

    $user = trim(mysqli_real_escape_string($con, $_POST["user"]));
    $pass = sha1(trim(mysqli_real_escape_string($con, $_POST["pass"])));

    $query = "SELECT * FROM tuser WHERE username = '" . $user . "' AND userpass = '" . $pass . "'";
    $sql_login = mysqli_query($con, $query) or die(mysqli_error($con));

    if (mysqli_num_rows($sql_login) > 0) {
        $_SESSION['user'] = $user;
        echo "<script> window.location='" . baseUrl() . "';</script>";
    } else {
        $gagalLogin = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login - Rumah Sakit</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= baseUrl(); ?>/_assets/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="<?= baseUrl(); ?>/_assets/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= baseUrl(); ?>/_assets/font-awesome/css/font-awesome.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <div class="row" style="margin-top: 200px;">
                <div class="col-md-4"></div>
                <div class="col-md-5">
                    <?php if (isset($gagalLogin)) : ?>
                        <div class="alert alert-danger alert-dismissable">
                            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Login gagal!</strong>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
                        <input name="user" type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock"></i></span>
                        <input name="pass" type="text" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-md-2">
                    <button name="submit" type="submit" class="btn btn-primary">Login</button>
                </div>
                <div class="col-md-2">
                </div>
            </div>
        </form>
    </div>
    <!-- JavaScript -->
    <script src="<?= baseUrl(); ?>/js/jquery-1.10.2.js"></script>
    <script src="<?= baseUrl(); ?>/js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="<?= baseUrl(); ?>/js/morris/chart-data-morris.js"></script>
    <script src="<?= baseUrl(); ?>/js/tablesorter/jquery.tablesorter.js"></script>
    <script src="<?= baseUrl(); ?>/js/tablesorter/tables.js"></script>

</body>

</html>