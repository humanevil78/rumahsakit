<?php 
require_once '_config/config.php';

if(!(isset($_SESSION['user']))){
    echo "<script> window.location='" . baseUrl('auth/login.php')."';</script>";
}
?>
Hello. <a href="auth/logout.php">Logout</a>