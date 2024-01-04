<?php
require '../../db/connect.php';
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
$ty_name = $_POST['type_name'];
$ty_remak = $_POST['type_remak'];
$sql = "INSERT INTO `type`(`ty_name`, `ty_remak`) VALUES ('" . $ty_name . "','" . $ty_remak . "')";
mysqli_query($conn, $sql);
?>