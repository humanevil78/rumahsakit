<?php 
date_default_timezone_set('Asia/Jakarta');
session_start();

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'rumahsakit';
$con = mysqli_connect($host, $user, $pass, $db);
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}

function baseUrl($url = null){
    $baseUrl = "http://localhost/rumahsakit";

    if(!($url == null)){
        return $baseUrl."/".$url;
    } else{
        return $baseUrl;
    }
}