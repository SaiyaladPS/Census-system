<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require '../../db/connect.php';
$ci_id = $_POST['ci_id'];
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
$ci_img = $_POST['ci_img'];
$pe_how = $_POST['pe_how'];
$sql = "INSERT INTO `people`(`pe_img`, `pe_fname`, `pe_lname`, `pe_gander`, `pe_tel`, `vi_id`, `pe_date`, `pe_dob`, `pro_id`, `dis_id`, `pe_how`, `pe_son`, `pe_soso`, `pe_sol`, `pe_sll`, `pe_aso`, `pe_date_in`, `pe_remak`) 
VALUES ('" . $ci_img . "','" . $ci_fname . "','" . $ci_lname . "','" . $ci_gander . "','" . $ci_tel . "','" . $vi_id . "','" . $ci_date . "','" . $ci_dob . "','" . $pro_id . "','" . $dis_id . "','0','" . $ci_son . "','" . $ci_soso . "','" . $ci_sol . "','" . $ci_sll . "','" . $ci_aso . "',curdate(),'ເສຍຊິວິດ')";
$query = mysqli_query($conn, $sql);
if ($query) {
    $sql_update = "UPDATE `citizens` SET `ci_how`='ເສຍຊິວິດ',`ci_out` =curdate() WHERE ci_id = '" . $ci_id . "'";
    mysqli_query($conn, $sql_update);
}
?>