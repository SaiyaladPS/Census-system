<?php

session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require '../../db/connect.php';
$us_username = $_POST['us_username'];
$us_password = $_POST['us_password'];
$us_aill = $_POST['us_aill'];

$sql = "INSERT INTO `user`(`us_username`, `us_password`, `us_ali`) 
VALUES ('" . $us_username . "',md5('" . $us_password . "'),'" . $us_aill . "')";
$insert = mysqli_query($conn, $sql);
?>