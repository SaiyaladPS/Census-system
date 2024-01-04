<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require '../../db/connect.php';
$ci_fname = $_POST["ci_fname"];
$ci_gander = $_POST['ci_gander'];
$ci_tel = $_POST['ci_tel'];
$vi_id = $_POST['vi_id'];
$ci_date = $_POST['ci_date'];
$ci_lname = $_POST['ci_lname'];
$ci_dob = $_POST['ci_dob'];
$pro_id = $_POST['pro_id'];
$dis_id = $_POST['dis_id'];
$ci_how = $_POST['ci_how'];
$ci_son = $_POST['ci_son'];
$ci_soso = $_POST['ci_soso'];
$ci_sol = $_POST['ci_sol'];
$ci_sll = $_POST['ci_sll'];
$ci_aso = $_POST['ci_aso'];
$ci_id = $_POST['ci_id'];

$sql = "UPDATE `citizens` SET `ci_fname`='" . $ci_fname . "',`ci_lname`='" . $ci_lname . "',`ci_gander`='" . $ci_gander . "',`ci_tel`='" . $ci_tel . "',`vi_id`='" . $vi_id . "',`ci_date`='" . $ci_date . "',`ci_dob`='" . $ci_dob . "',`pro_id`='" . $pro_id . "',`dis_id`='" . $dis_id . "',`ci_how`='" . $ci_how . "',`ci_son`='" . $ci_son . "',`ci_soso`='" . $ci_soso . "',`ci_sol`='" . $ci_sol . "',`ci_sll`='" . $ci_sll . "',`ci_aso`='" . $ci_aso . "' WHERE ci_id = '" . $ci_id . "'";
$query = mysqli_query($conn, $sql);

?>