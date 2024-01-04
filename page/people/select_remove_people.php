<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require '../../db/connect.php';
$select_id = $_GET['select_id'];
$sql = "SELECT * FROM citizens as p1 INNER JOIN province as p2 ON p1.pro_id = p2.pro_id INNER JOIN district as p3 ON p1.dis_id = p3.dis_id INNER JOIN village as p4 ON p1.vi_id = p4.vi_id WHERE p1.ci_how = '" . $select_id . "'";
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

    .img {
        width: 60px;
        height: 70px;
        object-fit: cover;
        border: 2px solid #007bff;
    }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div class="my-auto">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="" class="form-label">ເລກທີ່ໃຫມ່</label>
                            <input type="text" class="form-control" name="" id="pe_how" aria-describedby="helpId"
                                placeholder="" />
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">ຍົກເລີກ</button>
                        <button type="button" class="btn btn-primary go_insert">ຍ້າຍ</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="go_in_one" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="" class="form-label">ເລກທີ່ໃຫມ່</label>
                            <input type="text" class="form-control" name="" id="pe_how_one" aria-describedby="helpId"
                                placeholder="" />
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">ຍົກເລີກ</button>
                        <button type="button" class="btn btn-primary d-none go_insert_one">ຍ້າຍ</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <h6 class="m-0 font-weight-bold w-100 text-center fs-4 text-success">ຂໍ້ມູນ ພົນລະເມືອງ</h6>
            <div class="card-header py-3">


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
                                <th>ດຳເນີນການ</th>
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
                                <th>ດຳເນີນການ</th>
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
                                    <img class="img-profile img" src="../../img/<?php echo $row['ci_img'] ?>"
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
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <button type="button" class="btn btn-danger dis_out"
                                            id="<?php echo $row['ci_id'] ?>" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">ແຕ່ງດອງ</button>
                                        <button class="btn btn-warning dis_out_one" id="<?php echo $row['ci_id'] ?> "
                                            data-bs-toggle="modal" data-bs-target="#go_in_one">ຍ້າຍອອກ</button>
                                        <button class="btn btn-warning dis_out_all"
                                            id="<?php echo $row['ci_id'] ?>">ເສຍຊິວິດ
                                        </button>
                                    </div>
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

        $("#pe_how_one").keyup((e) => {
            var ci_how = e.target.value
            $.ajax({
                type: "post",
                url: "check_how.php",
                data: {
                    ci_how
                },
                success: function(response) {
                    var data = JSON.parse(response)
                    if (data > 0) {
                        $(".go_insert_one").removeClass('d-none')
                    } else {
                        $(".go_insert_one").addClass('d-none')
                    }
                }
            });
        })
        $(".dis_out").click((e) => {
            var ci_id = e.target.id;
            $.ajax({
                type: "post",
                url: "select_ci.php",
                data: {
                    ci_id
                },
                success: function(response) {
                    var data = JSON.parse(response);

                    $(".go_insert").click(() => {
                        var pe_how = $("#pe_how").val();
                        if (pe_how == "") {
                            Swal.fire({
                                icon: "error",
                                title: "ກະລຸນາປ້ອນເລກທີ່ເຮືອນທີ່ຕ້ອງການຍ້າຍ",
                                confirmButtonText: "ຕົກລົງ"
                            });
                        } else {
                            var newData = {
                                pe_how
                            }
                            data = Object.assign({}, data, newData);
                            $.ajax({
                                type: "post",
                                url: "insert_remove.php",
                                data: data,
                                success: function(response) {
                                    Swal.fire({
                                        icon: "success",
                                        title: "ຍ້າຍສຳເລັດ",
                                        showConfirmButton: false,
                                        timer: 1500,
                                    });
                                    setTimeout(() => {
                                        window.location =
                                            "select_people.php"
                                    }, 1500);
                                }
                            });
                        }

                    })

                }
            });
        })
        // todo ຍ້າຍ
        $(".dis_out_one").click((e) => {
            var ci_id = e.target.id;
            $.ajax({
                type: "post",
                url: "select_ci.php",
                data: {
                    ci_id
                },
                success: function(response) {
                    var data = JSON.parse(response);

                    $(".go_insert_one").click(() => {
                        var pe_how = $("#pe_how_one").val();
                        if (pe_how == "") {
                            Swal.fire({
                                icon: "error",
                                title: "ກະລຸນາປ້ອນເລກທີ່ເຮືອນທີ່ຕ້ອງການຍ້າຍ",
                                confirmButtonText: "ຕົກລົງ"
                            });
                        } else {
                            var newData = {
                                pe_how
                            }
                            data = Object.assign({}, data, newData);
                            $.ajax({
                                type: "post",
                                url: "insert_remove_one.php",
                                data: data,
                                success: function(response) {
                                    Swal.fire({
                                        icon: "success",
                                        title: "ຍ້າຍສຳເລັດ",
                                        showConfirmButton: false,
                                        timer: 1500,
                                    });
                                    setTimeout(() => {
                                        window.location =
                                            "select_people.php"
                                    }, 1500);
                                }
                            });
                        }

                    })

                }
            });
        })
        // todo ເສຍຊິວິດ
        $(".dis_out_all").click((e) => {
            var ci_id = e.target.id;
            $.ajax({
                type: "post",
                url: "select_ci.php",
                data: {
                    ci_id
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    $.ajax({
                        type: "post",
                        url: "insert_remove_all.php",
                        data: data,
                        success: function(response) {
                            Swal.fire({
                                icon: "success",
                                title: "ສຳເລັດ",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(() => {
                                window.location =
                                    "select_people.php"
                            }, 1500);
                        }
                    });

                }
            });
        })
    })
    </script>
</body>

</html>