<?php

session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require '../../db/connect.php';
$us_username = $_POST['us_username'];
$us_aill = $_POST['us_aill'];
$us_id = $_POST['us_id'];

$sql = "UPDATE `user` SET `us_username`='" . $us_username . "',`us_ali`='" . $us_aill . "' WHERE us_id = '" . $us_id . "'";
$insert = mysqli_query($conn, $sql);
?>