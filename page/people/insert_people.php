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

if (isset($_FILES["img"]) && $_FILES["img"]["error"] == 0) {
    $targetDir = "../../img/"; // Specify the directory where you want to store uploaded images
    $targetFile = $targetDir . basename($_FILES["img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is an actual image
    $check = getimagesize($_FILES["img"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo json_encode("File is not an image.");
        $uploadOk = 0;
    }

    // Check if the file already exists
    if (file_exists($targetFile)) {
        echo json_encode("Sorry, the file already exists.");
        $uploadOk = 0;
    }

    // Check file size (adjust the limit as needed)
    if ($_FILES["img"]["size"] > 500000) {
        echo json_encode("Sorry, your file is too large.");
        $uploadOk = 0;
    }

    // Allow certain file formats (adjust the formats as needed)
    $allowedFormats = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($imageFileType, $allowedFormats)) {
        echo json_encode("Sorry, only JPG, JPEG, PNG, and GIF files are allowed.");
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo json_encode("Sorry, your file was not uploaded.");
    } else {
        // Move the file to the specified directory
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $targetFile)) {
            // Insert image information into the database
            $sql = "INSERT INTO `citizens`(`ci_img`,`ci_fname`, `ci_lname`, `ci_gander`, `ci_tel`, `vi_id`, `ci_date`, `ci_dob`, `pro_id`, `dis_id`, `ci_how`, `ci_son`, `ci_soso`, `ci_sol`, `ci_sll`, `ci_aso`, `ci_out`, `ci_in`, `ci_remak`) 
            VALUES ('" . basename($targetFile) . "','" . $ci_fname . "','" . $ci_lname . "','" . $ci_gander . "','" . $ci_tel . "','" . $vi_id . "','" . $ci_date . "','" . $ci_dob . "','" . $pro_id . "','" . $dis_id . "','" . $ci_how . "','" . $ci_son . "','" . $ci_soso . "','" . $ci_sol . "','" . $ci_sll . "','" . $ci_aso . "','',curdate(),'ຍ້າຍເຂົ້າໃຫມ່')";
            if (mysqli_query($conn, $sql)) {

                $sql_add = "INSERT INTO `people`(`pe_img`, `pe_fname`, `pe_lname`, `pe_gander`, `pe_tel`, `vi_id`, `pe_date`, `pe_dob`, `pro_id`, `dis_id`, `pe_how`, `pe_son`, `pe_soso`, `pe_sol`, `pe_sll`, `pe_aso`, `pe_date_in`, `pe_remak`) 
                VALUES ('" . basename($targetFile) . "','" . $ci_fname . "','" . $ci_lname . "','" . $ci_gander . "','" . $ci_tel . "','" . $vi_id . "','" . $ci_date . "','" . $ci_dob . "','" . $pro_id . "','" . $dis_id . "','" . $ci_how . "','" . $ci_son . "','" . $ci_soso . "','" . $ci_sol . "','" . $ci_sll . "','" . $ci_aso . "',curdate(),'ຍ້າຍເຂົ້າໃຫມ່')";
                if (mysqli_query($conn, $sql_add)) {
                    echo json_encode(1);
                }
            } else {
                echo json_encode("Error: " . $sql . "<br>" . mysqli_error($conn));
            }
        } else {
            echo json_encode("Sorry, there was an error uploading your file.");
        }
    }
} else {
    echo json_encode("No file was uploaded.");
}
?>