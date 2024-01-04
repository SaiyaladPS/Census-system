<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require '../../db/connect.php';
$ci_id = $_POST['ci_id'];
$sql = "SELECT *
FROM citizens
INNER JOIN province
ON citizens.pro_id = province.pro_id
INNER JOIN district
ON citizens.dis_id = district.dis_id
INNER JOIN village
ON citizens.vi_id = village.vi_id
WHERE ci_id = '" . $ci_id . "'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);
?>