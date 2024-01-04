<?php
session_start();

require "db/connect.php";
$username = $_POST['username'];
$password = $_POST['password'];

$sql = mysqli_query($conn, "SELECT * FROM user WHERE us_username = '" . $username . "' AND us_password = md5('" . $password . "')");
$row = mysqli_num_rows($sql);
$sqls = mysqli_query($conn, "SELECT * FROM user WHERE us_username = '" . $username . "' AND us_password = md5('" . $password . "')");
$rows = mysqli_fetch_assoc($sqls);
if ($row == 1) {
    $_SESSION['username'] = $rows['us_username'];
    $_SESSION['ali'] = $rows['us_ali'];
}
echo json_encode($row);
?>