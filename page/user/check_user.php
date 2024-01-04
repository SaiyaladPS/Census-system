<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require '../../db/connect.php';
$us_username = $_POST['us_username'];
$us_password = $_POST['us_password'];

$sql = "SELECT * FROM user WHERE us_username ='" . $us_username . "' AND md5('" . $us_password . "')";
$query = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($query);
echo json_encode($rows);

?>