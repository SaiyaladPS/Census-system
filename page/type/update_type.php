<?php
require '../../db/connect.php';
session_start();
if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
$ty_id = $_POST['ty_id'];
$ty_name = $_POST['type_name'];
$ty_remak = $_POST['type_remak'];
$sql = "UPDATE `type` SET `ty_name`='" . $ty_name . "',`ty_remak`='" . $ty_remak . "' WHERE ty_id = '" . $ty_id . "'";
mysqli_query($conn, $sql);
?>