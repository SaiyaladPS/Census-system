<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require '../../db/connect.php';
$di_num = $_POST["di_num"];

$sql = "SELECT * FROM `different` WHERE di_num = '" . $di_num . "'";
$query = mysqli_query($conn, $sql);
$row = mysqli_num_rows($query);

echo json_encode($row);

?>