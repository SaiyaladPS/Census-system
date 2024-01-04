<?php
session_start();
require "../../db/connect.php";
if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
$select_id = $_POST['delete_id'];
$sql = "DELETE FROM `different` WHERE di_id = '" . $select_id . "'";
$query = mysqli_query($conn, $sql);
if ($query) {
    echo json_encode(200);
} else {
    echo json_encode(500);
}
?>