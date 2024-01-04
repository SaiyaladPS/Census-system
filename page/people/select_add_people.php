<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require '../../db/connect.php';
$select_id = $_GET['select_id'];
$sql = "SELECT * FROM citizens as p1 INNER JOIN province as p2 ON p1.pro_id = p2.pro_id INNER JOIN district as p3 ON p1.dis_id = p3.dis_id INNER JOIN village as p4 ON p1.vi_id = p4.vi_id WHERE p1.ci_how = '" . $select_id . "'";
$query = mysqli_query($conn, $sql);
$sql_btn = "SELECT * FROM citizens as p1 INNER JOIN province as p2 ON p1.pro_id = p2.pro_id INNER JOIN district as p3 ON p1.dis_id = p3.dis_id INNER JOIN village as p4 ON p1.vi_id = p4.vi_id WHERE p1.ci_how = '" . $select_id . "'";
$query_btn = mysqli_query($conn, $sql_btn);
$row_btn = mysqli_fetch_assoc($query_btn);
$sql_pro = "SELECT * FROM province";
$query_pro = mysqli_query($conn, $sql_pro);

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
    <link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.min.css">

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

        .coutomcheck {

            transform: translateY(-50%);
            top: 50%;
            position: relative;
        }

        .profile-container {
            text-align: center;
        }

        .profile-picture {
            position: relative;
            display: inline-block;
        }

        .img {
            width: 90px;
            height: 100px;
            object-fit: cover;
            border: 2px solid #007bff;
        }

        .img-1 {
            width: 50px;
            height: 60px;
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
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="bg-gradient-success text-white px-5 py-5 coutnform rounded-4 mt-4"
                            id="form_province">
                            <div class="profile-container">
                                <div class="profile-picture">
                                    <img src="../../img/icon.png" class="img" alt="Default Avatar" id="preview">
                                    <input class="input" type="file" id="profilePicture" accept="image/*"
                                        onchange="previewImage(this)">
                                    <label class="label" for="profilePicture">ຮູບພາບ 3x4</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">ຊື່</label>
                                        <input type="text" class="form-control" id="ci_fname">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label d-block ">ເພດ</label>
                                        <div class=" form-control ">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="ci_gander"
                                                    id="inlineRadio1" value="Girl">
                                                <label class="form-check-label" for="inlineRadio1">ຍິງ</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="ci_gander"
                                                    id="inlineRadio2" value="Male">
                                                <label class="form-check-label" for="inlineRadio2">ຊາຍ</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">ເບີໂທ</label>
                                        <input type="number" class="form-control" id="ci_tel"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="exampleInputEmail1" class="form-label">ບ້ານ</label>
                                        <select disabled class="form-select form-control" id="vi_id"
                                            aria-label="Default select example">
                                            <option value="" hidden selected>ເລືອກບ້ານ</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">ວັນເດືອນປີອອກສຳມະໂນ</label>
                                        <div class="input-group">
                                            <input type="date" class="form-control dateTo" id="ci_date"
                                                placeholder="Recipient's username" aria-label="Recipient's username"
                                                aria-describedby="basic-addon2">
                                            <button type="button" class="btn btn-info "
                                                id="basic-addon2">ເລືອກວັນນີ້</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">ນາມສະກຸນ</label>
                                        <input type="text" class="form-control" id="ci_lname"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">ວັນເດືອນປີເກີດ</label>
                                        <input type="date" class="form-control" id="ci_dob"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">ແຂວງ</label>
                                        <select disabled class="form-select form-control" id="pro_id"
                                            aria-label="Default select example">
                                            <option selected hidden value="">ເລືອກແຂວງ</option>
                                            <?php while ($rows_pro = mysqli_fetch_assoc($query_pro)) { ?>
                                                <option value="<?php echo $rows_pro['pro_id'] ?>">
                                                    <?php echo $rows_pro['pro_name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">ເມືອງ</label>
                                        <select disabled class="form-select form-control" id="dis_id"
                                            aria-label="Default select example">
                                            <option selected value="" hidden>ເລືອກເມືອງ</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">ເລກທີ່ເຮືອນ</label>
                                        <input type="text" class="form-control" disabled id="ci_how"
                                            aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">ຊົນເຜົ່າ</label>
                                        <input type="text" class="form-control" id="ci_son"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">ຊັນຊາດ</label>
                                        <input type="text" class="form-control" id="ci_soso"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">ເຊືອຊາດ</label>
                                        <input type="text" class="form-control" id="ci_sol"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">ສາສະໜາ</label>
                                        <input type="text" class="form-control" id="ci_sll"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">ອາຊີບ</label>
                                        <input type="text" class="form-control" id="ci_aso"
                                            aria-describedby="emailHelp">
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary ">ບັນທືກ</button>
                            <button type="reset" class="btn btn-danger ">ລ້າງ</button>
                            <a href="select_citizens.php" class="btn btn-success ">ຂໍ້ມູນ</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="go_in_one" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="bg-gradient-success text-white px-5 py-5 coutnform rounded-4 mt-4"
                            id="form_province_new">
                            <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">ຊື່</label>
                                        <input type="text" class="form-control" id="ci_fname_new">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label d-block ">ເພດ</label>
                                        <div class=" form-control ">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="ci_gander_new"
                                                    id="inlineRadio1" value="Girl">
                                                <label class="form-check-label" for="inlineRadio1">ຍິງ</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="ci_gander_new"
                                                    id="inlineRadio2" value="Male">
                                                <label class="form-check-label" for="inlineRadio2">ຊາຍ</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="exampleInputEmail1" class="form-label">ບ້ານ</label>
                                        <select disabled class="form-select form-control" id="vi_id_new"
                                            aria-label="Default select example">
                                            <option value="" hidden selected>ເລືອກບ້ານ</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">ວັນເດືອນປີອອກສຳມະໂນ</label>
                                        <div class="input-group">
                                            <input type="date" class="form-control dateTo_new" id="ci_date_new"
                                                placeholder="Recipient's username" aria-label="Recipient's username"
                                                aria-describedby="basic-addon2">
                                            <button type="button" class="btn btn-info "
                                                id="basic-addon2_new">ເລືອກວັນນີ້</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">ນາມສະກຸນ</label>
                                        <input type="text" class="form-control" id="ci_lname_new"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">ວັນເດືອນປີເກີດ</label>
                                        <input type="date" class="form-control" id="ci_dob_new"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">ແຂວງ</label>
                                        <select disabled class="form-select form-control" id="pro_id_new"
                                            aria-label="Default select example">
                                            <option selected hidden value="">ເລືອກແຂວງ</option>
                                            <?php while ($rows_pro = mysqli_fetch_assoc($query_pro)) { ?>
                                                <option value="<?php echo $rows_pro['pro_id'] ?>">
                                                    <?php echo $rows_pro['pro_name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">ເມືອງ</label>
                                        <select disabled class="form-select form-control" id="dis_id_new"
                                            aria-label="Default select example">
                                            <option selected value="" hidden>ເລືອກເມືອງ</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">ເລກທີ່ເຮືອນ</label>
                                        <input type="text" class="form-control" disabled id="ci_how_new"
                                            aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">ຊົນເຜົ່າ</label>
                                        <input type="text" class="form-control" id="ci_son_new"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">ຊັນຊາດ</label>
                                        <input type="text" class="form-control" id="ci_soso_new"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">ເຊືອຊາດ</label>
                                        <input type="text" class="form-control" id="ci_sol_new"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">ສາສະໜາ</label>
                                        <input type="text" class="form-control" id="ci_sll_new"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">ອາຊີບ</label>
                                        <input type="text" class="form-control" id="ci_aso_new"
                                            aria-describedby="emailHelp">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary ">ບັນທືກ</button>
                            <button type="reset" class="btn btn-danger ">ລ້າງ</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <h6 class="m-0 font-weight-bold w-100 text-center fs-4 text-success">ຂໍ້ມູນ ພົນລະເມືອງ</h6>
            <div class="card-header py-3">

                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <button type="button" class="btn btn-success dis_out" id="<?php echo $row_btn['ci_id'] ?>"
                        data-bs-toggle="modal" data-bs-target="#exampleModal">ຍ້າຍເຂົ້າ</button>
                    <button class="btn btn-warning dis_out_one" id="<?php echo $row_btn['ci_id'] ?> "
                        data-bs-toggle="modal" data-bs-target="#go_in_one">ເກີດໃຫມ່</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ເລກທີ່ເຮືອນ</th>
                                <th>ຮູບພາບ</th>
                                <th>ຊື່ ແລະ ນາມສະກຸນ</th>
                                <th>ເພດ</th>
                                <th>ວັນເດືອນປີເກີດ</th>
                                <th>ຊົນເຜົ່າ</th>
                                <th>ສັນຊາດ</th>
                                <th>ບ້ານ</th>
                                <th>ເມືອງ</th>
                                <th>ແຂວງ</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ເລກທີ່ເຮືອນ</th>
                                <th>ຮູບພາບ</th>
                                <th>ຊື່ ແລະ ນາມສະກຸນ</th>
                                <th>ເພດ</th>
                                <th>ວັນເດືອນປີເກີດ</th>
                                <th>ຊົນເຜົ່າ</th>
                                <th>ສັນຊາດ</th>
                                <th>ບ້ານ</th>
                                <th>ເມືອງ</th>
                                <th>ແຂວງ</th>

                            </tr>
                        </tfoot>
                        <tbody>

                            <?php
                            $number = 1;
                            while ($row = mysqli_fetch_assoc($query)) { ?>
                                <tr class=" <?php
                                if ($row['ci_remak'] == "ຫົວໜ້າຄອບຄົວ") {
                                    echo "text-danger";
                                }
                                ?>">
                                    <td>
                                        <?php echo $row['ci_how'] ?>
                                    </td>
                                    <td>
                                        <img class="img-profile img-1" src="../../img/<?php echo $row['ci_img'] ?>"
                                            alt="user">
                                    </td>
                                    <td>
                                        <?php echo $row['ci_fname'] . " " . $row['ci_lname'] ?>
                                    </td>
                                    <td>
                                        <?php if ($row['ci_gander'] == 'Male') {
                                            echo "ຊາຍ";
                                        } else {
                                            echo "ຍິງ";
                                        } ?>
                                    </td>
                                    <td>
                                        <?php echo $row['ci_dob'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['ci_son'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['ci_soso'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['vi_name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['dis_name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['pro_name'] ?>
                                    </td>

                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <script src="../../js/bootstrap.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

    <script src="../../js/sweetalert2.js"></script>
    <!-- dataTable -->
    <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../js/demo/datatables-demo.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(() => {
            $(".dis_out").click((e) => {
                var ci_id = e.target.id;
                $.ajax({
                    type: "post",
                    url: "select_ci.php",
                    data: {
                        ci_id
                    },
                    success: function (response) {
                        var data = JSON.parse(response);
                        $("#ci_how").val(data.ci_how)
                        $("#vi_id").append(`
                    <option selected value="${data.vi_id}">${data.vi_name}</option>
                    `)
                        $("#dis_id").append(`
                    <option selected value="${data.dis_id}">${data.dis_name}</option>
                    `)
                        $("#pro_id").append(`
                    <option selected value="${data.pro_id}">${data.pro_name}</option>
                    `)
                    }
                });
            })
            $(".dis_out_one").click((e) => {
                var ci_id = e.target.id;
                $.ajax({
                    type: "post",
                    url: "select_ci.php",
                    data: {
                        ci_id
                    },
                    success: function (response) {
                        var data = JSON.parse(response);
                        $("#ci_how_new").val(data.ci_how)
                        $("#vi_id_new").append(`
                    <option selected value="${data.vi_id}">${data.vi_name}</option>
                    `)
                        $("#dis_id_new").append(`
                    <option selected value="${data.dis_id}">${data.dis_name}</option>
                    `)
                        $("#pro_id_new").append(`
                    <option selected value="${data.pro_id}">${data.pro_name}</option>
                    `)
                    }
                });
            })
        })
    </script>
    <script>
        $(document).ready(() => {
            function setToday1() {
                // Get the current date in the format "YYYY-MM-DD"
                var currentDate = new Date().toISOString().split('T')[0];

                // Set the date input field value to the current date
                $('.dateTo').val(currentDate);
            }
            $("#basic-addon2").click(() => {
                setToday1()
            })

            $("#pro_id").change((e) => {
                $("#dis_id").empty()
                var pro_id = e.target.value;
                $.ajax({
                    type: "post",
                    url: "../citizens/select_dis.php",
                    data: {
                        pro_id
                    },
                    success: function (response) {
                        var data = JSON.parse(response);
                        $.each(data, function (indexInArray, valueOfElement) {
                            $("#dis_id").append(`
                        <option selected value="" hidden>ເລືອກເມືອງ</option>
                        <option value="${valueOfElement.dis_id}">${valueOfElement.dis_name}</option>
                        `)
                        });
                    }
                });
            })
            $("#dis_id").change((e) => {
                $("#vi_id").empty()
                var dis_id = e.target.value;
                $.ajax({
                    type: "post",
                    url: "../citizens/select_vi.php",
                    data: {
                        dis_id
                    },
                    success: function (response) {
                        var data = JSON.parse(response);
                        $.each(data, function (indexInArray, valueOfElement) {
                            $("#vi_id").append(`
                        <option selected value="" hidden>ເລືອກເມືອງ</option>
                        <option value="${valueOfElement.vi_id}">${valueOfElement.vi_name}</option>
                        `)
                        });
                    }
                });
            })
            $('#form_province').submit((e) => {
                e.preventDefault()
                var ci_fname = $("#ci_fname").val()
                var ci_gander = $("input[name='ci_gander']:checked").val();
                var ci_tel = $("#ci_tel").val()
                var vi_id = $("#vi_id").val()
                var ci_date = $("#ci_date").val()
                var ci_lname = $("#ci_lname").val()
                var ci_dob = $("#ci_dob").val()
                var pro_id = $("#pro_id").val()
                var dis_id = $("#dis_id").val()
                var ci_how = $("#ci_how").val()
                var ci_son = $("#ci_son").val()
                var ci_soso = $("#ci_soso").val()
                var ci_sol = $("#ci_sol").val()
                var ci_sll = $("#ci_sll").val()
                var ci_aso = $("#ci_aso").val()
                var img = $("#profilePicture").val()

                if (ci_fname == "") {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາປ້ອນຊື່",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else if (ci_gander == "" || ci_gander == undefined) {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາເລືອກເພດ",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else if (img == "" || img == undefined) {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາປ້ອນຮູບພາບ",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else if (ci_tel == "") {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາປ້ອນເບີໂທ",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else if (vi_id == "") {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາເລືອກບ້ານ",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else if (ci_date == "") {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາປ້ອນວັນທີອອກສຳມະໂນ",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else if (ci_lname == "") {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາປ້ອນນາມສະກຸນ",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else if (ci_dob == "") {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາປ້ອນວັນທີ່ເກີດ",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else if (pro_id == "") {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາເລືອກແຂວງ",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else if (dis_id == "") {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາເລືອກເມືອງ",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else if (ci_how == "") {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາປ້ອນເລກທີ່ເຮືອນ",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else if (ci_son == "") {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາປ້ອນຊົນເຜົ່າ",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else if (ci_soso == "") {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາປ້ອນຊັນຊາດ",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else if (ci_sol == "") {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາປ້ອນເຊືອຊາດ",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else if (ci_sll == "") {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາປ້ອນສາສະໜາ",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else if (ci_aso == "") {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາປ້ອນອາຊີບ",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else {
                    var fileInputId = "profilePicture";
                    var formData = new FormData();
                    formData.append("fileInputId", fileInputId);
                    formData.append("img", $("#" + fileInputId)[0].files[0]);
                    formData.append('ci_fname', $("#ci_fname").val());
                    formData.append('ci_gander', $("input[name='ci_gander']:checked").val());
                    formData.append('ci_tel', $("#ci_tel").val());
                    formData.append('vi_id', $("#vi_id").val());
                    formData.append('ci_date', $("#ci_date").val());
                    formData.append('ci_lname', $("#ci_lname").val());
                    formData.append('ci_dob', $("#ci_dob").val());
                    formData.append('pro_id', $("#pro_id").val());
                    formData.append('dis_id', $("#dis_id").val());
                    formData.append('ci_how', $("#ci_how").val());
                    formData.append('ci_son', $("#ci_son").val());
                    formData.append('ci_soso', $("#ci_soso").val());
                    formData.append('ci_sol', $("#ci_sol").val());
                    formData.append('ci_sll', $("#ci_sll").val());
                    formData.append('ci_aso', $("#ci_aso").val());
                    // chekc data
                    $.ajax({
                        type: "post",
                        url: "../citizens/check_citizens.php",
                        data: {
                            ci_fname,
                            ci_lname,
                            ci_how
                        },
                        success: function (response) {
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
                                    url: "insert_people.php",
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function (response) {
                                        if (response === "1") {
                                            Swal.fire({
                                                icon: "success",
                                                title: "ເພິ່ມສຳເລັດ",
                                                showConfirmButton: false,
                                                timer: 1500,
                                            });
                                            setTimeout(() => {
                                                window.location =
                                                    "select_people.php"
                                            }, 1500);
                                        } else {
                                            Swal.fire({
                                                icon: "error",
                                                text: `${response}`,
                                                confirmButtonText: "ຕົກລົງ"
                                            });
                                        }
                                    }
                                });
                            }
                        }
                    });
                }
            })

            // todo New
            function setToday() {
                // Get the current date in the format "YYYY-MM-DD"
                var currentDate = new Date().toISOString().split('T')[0];

                // Set the date input field value to the current date
                $('.dateTo_new').val(currentDate);
            }
            $("#basic-addon2_new").click(() => {
                setToday()
            })

            $("#pro_id_new").change((e) => {
                $("#dis_id_new").empty()
                var pro_id = e.target.value;
                $.ajax({
                    type: "post",
                    url: "../citizens/select_dis.php",
                    data: {
                        pro_id
                    },
                    success: function (response) {
                        var data = JSON.parse(response);
                        $.each(data, function (indexInArray, valueOfElement) {
                            $("#dis_id_new").append(`
                        <option selected value="" hidden>ເລືອກເມືອງ</option>
                        <option value="${valueOfElement.dis_id}">${valueOfElement.dis_name}</option>
                        `)
                        });
                    }
                });
            })
            $("#dis_id_new").change((e) => {
                $("#vi_id_new").empty()
                var dis_id = e.target.value;
                $.ajax({
                    type: "post",
                    url: "../citizens/select_vi.php",
                    data: {
                        dis_id
                    },
                    success: function (response) {
                        var data = JSON.parse(response);
                        $.each(data, function (indexInArray, valueOfElement) {
                            $("#vi_id_new").append(`
                        <option selected value="" hidden>ເລືອກເມືອງ</option>
                        <option value="${valueOfElement.vi_id}">${valueOfElement.vi_name}</option>
                        `)
                        });
                    }
                });
            })
            $('#form_province_new').submit((e) => {
                e.preventDefault()
                var ci_fname = $("#ci_fname_new").val()
                var ci_gander = $("input[name='ci_gander_new']:checked").val();

                var vi_id = $("#vi_id_new").val()
                var ci_date = $("#ci_date_new").val()
                var ci_lname = $("#ci_lname_new").val()
                var ci_dob = $("#ci_dob_new").val()
                var pro_id = $("#pro_id_new").val()
                var dis_id = $("#dis_id_new").val()
                var ci_how = $("#ci_how_new").val()
                var ci_son = $("#ci_son_new").val()
                var ci_soso = $("#ci_soso_new").val()
                var ci_sol = $("#ci_sol_new").val()
                var ci_sll = $("#ci_sll_new").val()
                var ci_aso = $("#ci_aso_new").val()
                if (ci_fname == "") {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາປ້ອນຊື່",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else if (ci_gander == "" || ci_gander == undefined) {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາເລືອກເພດ",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else if (vi_id == "") {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາເລືອກບ້ານ",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else if (ci_date == "") {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາປ້ອນວັນທີອອກສຳມະໂນ",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else if (ci_lname == "") {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາປ້ອນນາມສະກຸນ",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else if (ci_dob == "") {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາປ້ອນວັນທີ່ເກີດ",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else if (pro_id == "") {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາເລືອກແຂວງ",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else if (dis_id == "") {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາເລືອກເມືອງ",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else if (ci_how == "") {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາປ້ອນເລກທີ່ເຮືອນ",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else if (ci_son == "") {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາປ້ອນຊົນເຜົ່າ",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else if (ci_soso == "") {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາປ້ອນຊັນຊາດ",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else if (ci_sol == "") {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາປ້ອນເຊືອຊາດ",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else if (ci_sll == "") {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາປ້ອນສາສະໜາ",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else if (ci_aso == "") {
                    Swal.fire({
                        icon: "error",
                        title: "ກະລຸນາປ້ອນອາຊີບ",
                        confirmButtonText: "ຕົກລົງ"
                    });
                } else {
                    var formData = new FormData();
                    formData.append('ci_fname', $("#ci_fname_new").val());
                    formData.append('ci_gander', $("input[name='ci_gander_new']:checked").val());

                    formData.append('vi_id', $("#vi_id_new").val());
                    formData.append('ci_date', $("#ci_date_new").val());
                    formData.append('ci_lname', $("#ci_lname_new").val());
                    formData.append('ci_dob', $("#ci_dob_new").val());
                    formData.append('pro_id', $("#pro_id_new").val());
                    formData.append('dis_id', $("#dis_id_new").val());
                    formData.append('ci_how', $("#ci_how_new").val());
                    formData.append('ci_son', $("#ci_son_new").val());
                    formData.append('ci_soso', $("#ci_soso_new").val());
                    formData.append('ci_sol', $("#ci_sol_new").val());
                    formData.append('ci_sll', $("#ci_sll_new").val());
                    formData.append('ci_aso', $("#ci_aso_new").val());
                    // chekc data
                    $.ajax({
                        type: "post",
                        url: "../citizens/check_citizens.php",
                        data: {
                            ci_fname,
                            ci_lname,
                            ci_how
                        },
                        success: function (response) {
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
                                    url: "insert_people_new.php",
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function (response) {
                                        if (response === "1") {
                                            Swal.fire({
                                                icon: "success",
                                                title: "ເພິ່ມສຳເລັດ",
                                                showConfirmButton: false,
                                                timer: 1500,
                                            });
                                            setTimeout(() => {
                                                window.location =
                                                    "select_people.php"
                                            }, 1500);
                                        } else {
                                            Swal.fire({
                                                icon: "error",
                                                text: `${response}`,
                                                confirmButtonText: "ຕົກລົງ"
                                            });
                                        }
                                    }
                                });
                            }
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

            reader.onloadend = function () {
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