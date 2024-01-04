<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require '../../db/connect.php';
$ci_fname = $_POST["ci_fname"];
$ci_lname = $_POST['ci_lname'];
$ci_how = $_POST['ci_how'];

$sql = "SELECT * FROM citizens WHERE ci_fname = '" . $ci_fname . "' AND ci_lname = '" . $ci_lname . "' AND ci_how ='" . $ci_how . "' ";
$query = mysqli_query($conn, $sql);
$row = mysqli_num_rows($query);

echo json_encode($row);

?>