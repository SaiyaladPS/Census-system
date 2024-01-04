<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require '../../db/connect.php';
$id = $_GET['select_id'];
$sql_select = "SELECT * FROM `monk` WHERE mo_id = '" . $id . "'";
$query = mysqli_query($conn, $sql_select);
$rows_select = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>SB Admin 2 - Buttons</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet" />
    <style>
    @font-face {
        font-family: "NotoSansLao";
        src: url("../../font/NotoSansLao-VariableFont_wdth\,wght.ttf") format("woff2"),
            url("../../font/NotoSansLao-VariableFont_wdth\,wght.ttf") format("woff"),
            url("../../font/NotoSansLao-VariableFont_wdth\,wght.ttf") format("truetype");
        /* Add other font properties as needed, e.g., font-weight, font-style */
    }

    body {
        font-family: "NotoSansLao", sans-serif;
    }

    .coutnform {
        transform: translateX(-50%);
        left: 50%;
        position: relative;
        border-radius: 20px;
    }

    .profile-container {
        text-align: center;
    }

    .profile-picture {
        position: relative;
        display: inline-block;
    }

    .img {
        width: 3cm;
        height: 4cm;
        object-fit: cover;
        border: 2px solid #007bff;
    }

    input[type="file"] {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .label {
        display: block;
        margin-top: 10px;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border-radius: 4px;
        cursor: pointer;
    }

    .label:hover {
        background-color: #0056b3;
    }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div class="my-auto">
        <form class=" w-75 bg-gradient-success text-white px-5 py-5 coutnform rounded-4 mt-4" id="form_province">
            <div class="profile-container">
                <div class="profile-picture">
                    <img src="../../img/<?php echo $rows_select['mo_img'] ?>" class="img" alt="Default Avatar"
                        id="preview">
                    <input type="hidden" value="<?php echo $rows_select['mo_id'] ?>" id="mo_id">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ຄຳນຳໜ້າ</label>
                        <select class="form-select form-control" id="mo_fname" aria-label="Default select example">
                            <option selected value="<?php echo $rows_select["mo_fname"] ?>" hidden>
                                <?php echo $rows_select["mo_fname"] ?>
                            </option>
                            <option value="ພະອາຈານ">ພະອາຈານ</option>
                            <option value="ຄູບາ">ຄູບາ</option>
                            <option value="ສະມະເນນ">ສະມະເນນ</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ຊື່ວັດ</label>
                        <input type="text" class="form-control" value="<?php echo $rows_select["mo_oname"] ?>"
                            id="mo_oname" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ເຊື້ອຊາດ</label>
                        <input type="text" class="form-control" value="<?php echo $rows_select["mo_sol"] ?>" id="mo_sol"
                            aria-describedby="emailHelp">
                    </div>

                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ຊື່</label>
                        <input type="text" class="form-control" value="<?php echo $rows_select["mo_lname"] ?>"
                            id="mo_lname" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ສາສະໜາ</label>
                        <input type="text" class="form-control" value="<?php echo $rows_select["mo_sll"] ?>" id="mo_sll"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ສັນຊາດ</label>
                        <input type="text" class="form-control" value="<?php echo $rows_select["mo_soso"] ?>"
                            id="mo_soso" aria-describedby="emailHelp">
                    </div>
                </div>

            </div>
            <button type="submit" class="btn btn-primary ">ບັນທືກ</button>
            <button type="reset" class="btn btn-danger ">ລ້າງ</button>
            <a href="select_province.php" class="btn btn-success ">ຂໍ້ມູນ</a>
        </form>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

    <script src="../../js/sweetalert2.js"></script>

    <script>
    $(document).ready(() => {
        $('#form_province').submit((e) => {
            e.preventDefault()
            var mo_fname = $("#mo_fname").val()
            var mo_oname = $("#mo_oname").val()
            var mo_sol = $("#mo_sol").val()
            var mo_lname = $("#mo_lname").val()
            var mo_soso = $("#mo_soso").val()
            var mo_sll = $("#mo_sll").val()
            var mo_id = $("#mo_id").val()

            if (mo_fname == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາປ້ອນຄຳນຳໜ້າ",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else if (mo_oname == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາປ້ອນຊື່ວັດ",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else if (mo_sol == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາປ້ອນເຊື້ອຊາດ",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else if (mo_lname == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາປ້ອນຊື່",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else if (mo_sll == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາປ້ອນສາສະໜາ",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else if (mo_soso == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາປ້ອນສັນຊາດ",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else {
                // Create a FormData object
                var formData = new FormData();

                // Append the form data to the FormData object
                formData.append('mo_fname', mo_fname);
                formData.append('mo_oname', mo_oname);
                formData.append('mo_sol', mo_sol);
                formData.append('mo_lname', mo_lname);
                formData.append('mo_soso', mo_soso);
                formData.append('mo_sll', mo_sll);
                formData.append('mo_id', mo_id)
                // chekc data
                $.ajax({
                    type: "post",
                    url: "update_monk.php",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        Swal.fire({
                            icon: "success",
                            title: "ແກ້ໄຂ້ຂໍ້ມູນສຳເລັດ",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                        setTimeout(() => {
                            window.location =
                                "select_monk.php"
                        }, 1500);
                    }
                });
            }
        })
    })
    </script>
    <script>
    function previewImage(input) {
        var preview = document.getElementById('preview');
        var file = input.files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "default-avatar.png"; // Display default image if no file selected
        }
    }
    </script>
</body>

</html>