<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require '../../db/connect.php';
$mo_id = $_POST['mo_id'];
$mo_fname = $_POST['mo_fname'];
$mo_oname = $_POST['mo_oname'];
$mo_sol = $_POST['mo_sol'];
$mo_lname = $_POST['mo_lname'];
$mo_soso = $_POST['mo_soso'];
$mo_sll = $_POST['mo_sll'];
$sql = "UPDATE `monk` SET `mo_fname`='" . $mo_fname . "',`mo_lname`='" . $mo_lname . "',`mo_oname`='" . $mo_oname . "',`mo_sol`='" . $mo_sol . "',`mo_soso`='" . $mo_soso . "',`mo_sll`='" . $mo_sll . "' WHERE mo_id = '" . $mo_id . "'";
$query = mysqli_query($conn, $sql);
?>