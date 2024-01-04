<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require '../../db/connect.php';

$sql = "SELECT * FROM province";
$query = mysqli_query($conn, $sql);
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

    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
    </style>

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div class="my-auto">
        <form class=" w-50 h-50 bg-gradient-success text-white px-5 py-5 coutnform rounded-4 mt-4" id="form_province">
            <input type="hidden" value="<?php echo $rows_select['vi_id'] ?>" id="vi_id">
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" id="pro_id">
                    <option selected value="" hidden>ເລືອກແຂວງ</option>
                    <?php while ($rows = mysqli_fetch_assoc($query)) { ?>
                    <option value="<?php echo $rows['pro_id'] ?>">
                        <?php echo $rows['pro_name'] ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" id="dis_id">
                    <option selected value="" hidden>ເລືອກເມືອງ</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">ຊື່ບ້ານ</label>
                <input type="text" class="form-control" id="vi_name" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">ໜາຍເຫດ</label>
                <input type="text" class="form-control" id="vi_remak">
            </div>
            <button type="submit" class="btn btn-primary ">ບັນທືກ</button>
            <button type="reset" class="btn btn-danger ">ລ້າງ</button>
            <a href="select_village.php" class="btn btn-success ">ຂໍ້ມູນ</a>
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

        $('#pro_id').change((e) => {
            $("#dis_id").empty()
            var pro_id = e.target.value;

            $.ajax({
                type: "post",
                url: "select_dis.php",
                data: {
                    "pro_id": pro_id
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    $.each(data, function(indexInArray, valueOfElement) {
                        $("#dis_id").append(`
                            <option value="" selected hidden>
                            ເລືອກເມືອງ
                        </option>
                            <option value="${valueOfElement.dis_id}">
                            ${valueOfElement.dis_name}
                        </option>
                        `)
                    });
                }
            });
        });
        $('#form_province').submit((e) => {
            e.preventDefault()
            var dis_id = $("#dis_id").val()
            var vi_name = $("#vi_name").val()
            var vi_remak = $("#vi_remak").val()
            var pro_id = $("#pro_id").val()
            var vi_id = $("#vi_id").val()

            if (pro_id == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາປ້ອນຊື່ແຂວງ",
                    confirmButtonText: "ຕົກລົງ"
                });
                s
            } else if (dis_id == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາປ້ອນຊື່ເມືອງ",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else if (vi_name == "") {
                Swal.fire({
                    icon: "error",
                    title: "ກະລຸນາປ້ອນຊື່ບ້ານ",
                    confirmButtonText: "ຕົກລົງ"
                });
            } else {
                var sendata = {
                    pro_id,
                    dis_id,
                    vi_name,
                    vi_remak,
                    vi_id
                }
                // chekc data
                $.ajax({
                    type: "post",
                    url: "check_village.php",
                    data: {
                        vi_name: vi_name,
                        dis_id: dis_id
                    },
                    success: function(response) {

                        var data = JSON.parse(response);
                        if (data > 0) {
                            Swal.fire({
                                icon: "warning",
                                title: "ທ່ານມີຂໍ້ມູນນີ້ແລ້ວ",
                                confirmButtonText: "ຕົກລົງ"
                            });
                        } else {
                            $.ajax({
                                type: "post",
                                url: "insert_village.php",
                                data: sendata,
                                success: function(response) {
                                    Swal.fire({
                                        icon: "success",
                                        title: "ບັນທືກຂໍ້ມູນສຳເລັດ",
                                        showConfirmButton: false,
                                        timer: 1500,
                                    });
                                    setTimeout(() => {
                                        window.location =
                                            "select_village.php"
                                    }, 1500);
                                }
                            });
                        }
                    }
                });
            }
        })
    })
    </script>
</body>

</html>