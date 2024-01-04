<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require '../../db/connect.php';
$di_id = $_POST['di_id'];
$di_fname = $_POST['di_fname'];
$di_num = $_POST['di_num'];
$di_pn = $_POST['di_pn'];
$di_lname = $_POST['di_lname'];
$di_dob = $_POST['di_dob'];
$di_soso = $_POST['di_soso'];
$di_sll = $_POST['di_sll'];
$di_gander = $_POST['di_gander'];

$sql = "UPDATE `different` SET `di_fname`='" . $di_fname . "',`di_lname`='" . $di_lname . "',`di_num`='" . $di_num . "',`di_pn`='" . $di_pn . "',`di_dob`='" . $di_dob . "',`di_soso`='" . $di_soso . "',`di_sll`='" . $di_sll . "',`di_gander`='" . $di_gander . "' WHERE di_id = '" . $di_id . "'";
$query = mysqli_query($conn, $sql);

?>