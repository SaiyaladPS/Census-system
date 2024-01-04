<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require "../../db/connect.php";
$type_name = $_POST['type_name'];

$sql = "SELECT * FROM type WHERE ty_name = '" . $type_name . "'";
$query = mysqli_query($conn, $sql);
$row = mysqli_num_rows($query);
echo json_encode($row);
?>