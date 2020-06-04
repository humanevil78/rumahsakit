<?php 
date_default_timezone_set('Asia/Jakarta');
session_start();

include_once "conn.php";

$con = mysqli_connect($connect['host'], $connect['user'], $connect['pass'], $connect['db']);

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

function queryGetData($query){
    $con = mysqli_connect('localhost', 'root', '', 'rumahsakit');
    $result = mysqli_query($con, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}
?>