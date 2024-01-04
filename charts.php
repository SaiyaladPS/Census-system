<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: 404.php");
}
require "db/connect.php";
$sql_ci = mysqli_query($conn, "SELECT * FROM citizens");
$rows_ci = mysqli_num_rows($sql_ci);
$sql_di = mysqli_query($conn, "SELECT * FROM different");
$rows_di = mysqli_num_rows($sql_di);
$sql_mo = mysqli_query($conn, "SELECT * FROM monk");
$rows_mo = mysqli_num_rows($sql_mo);
$rows_fll = $rows_ci + $rows_di + $rows_mo;
$sql_ci_girl = mysqli_query($conn, "SELECT * FROM citizens WHERE ci_gander = 'Girl'");
$rows_ci_girl = mysqli_num_rows($sql_ci_girl);
$sql_di_girl = mysqli_query($conn, "SELECT * FROM different WHERE di_gander = 'Girl'");
$rows_di_girl = mysqli_num_rows($sql_di_girl);
$rows_fll_girl = $rows_ci_girl + $rows_di_girl;
$sql_dob = mysqli_query($conn, "select year(curdate())-year(ci_dob) as age from citizens where year(curdate())-year(ci_dob)>'15'");
$rows_dob = mysqli_num_rows($sql_dob);
$sql_dob_di = mysqli_query($conn, "select year(curdate())-year(di_dob) as age from different where year(curdate())-year(di_dob)>'15';");
$rows_dob_di = mysqli_num_rows($sql_dob_di);
$sql_cisol = mysqli_query($conn, "SELECT DISTINCT ci_son FROM citizens");
$rows_cisol = mysqli_num_rows($sql_cisol);
$sql_cisol_how = mysqli_query($conn, "SELECT DISTINCT ci_how FROM citizens");
$rows_cisol_how = mysqli_num_rows($sql_cisol_how);
$sql_ci_mok = mysqli_query($conn, "SELECT * FROM `monk`");
$rows_monk = mysqli_num_rows($sql_ci_mok);
// todo ຈຳນວນຄົນເສຍຊິວິດ
$sql_dar = mysqli_query($conn, "SELECT * FROM `people` WHERE pe_remak = 'ເສຍຊິວິດ'");
$row_dar = mysqli_num_rows($sql_dar);
// todo ຈຳນວນຄົນຍົກຍ້າຍ
$sql_dis_out = mysqli_query($conn, "SELECT * FROM `people` WHERE pe_remak = 'ຍ້າຍເຂົ້າໃຫມ່'");
$row_disout = mysqli_num_rows($sql_dis_out);
// todo ຈຳນວນຄົນເກີດໃຫມ່
$sql_dis_in = mysqli_query($conn, "SELECT * FROM `people` WHERE pe_remak = 'ເກີດໃຫມ່'");
$row_disin = mysqli_num_rows($sql_dis_in);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Charts</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        @font-face {
            font-family: "NotoSansLao";
            src: url("font/NotoSansLao-VariableFont_wdth\,wght.ttf") format("woff2"),
                url("font/NotoSansLao-VariableFont_wdth\,wght.ttf") format("woff"),
                url("font/NotoSansLao-VariableFont_wdth\,wght.ttf") format("truetype");
            /* Add other font properties as needed, e.g., font-weight, font-style */
        }

        * {
            font-family: "NotoSansLao", sans-serif;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-3 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                ຈຳນວນຄົນທັງໝົດ</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $rows_fll ?>
                                                ຄົນ
                                            </div>
                                        </div>

                                        <div class="col-auto">

                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-3 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                ຍິງ</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $rows_fll_girl ?>
                                                ຄົນ
                                            </div>
                                        </div>

                                        <div class="col-auto">

                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-3 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                ພົນລະເມືອງອາຍຸ15ປີຂື້ນໄປ</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $rows_dob ?>
                                                ຄັນ
                                            </div>
                                        </div>
                                        <div class="col-auto">

                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-3 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                ຕ່າງດາ້ວອາຍຸ15ປີຂື້ນໄປ</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $rows_dob_di ?>
                                                ຄັນ
                                            </div>
                                        </div>
                                        <div class="col-auto">

                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-3 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                ຊົນເຜົ່າ</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $rows_cisol ?>
                                                ຊົນເຜົ່າ
                                            </div>
                                        </div>
                                        <div class="col-auto">

                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-3 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                ຈຳນວນຫຼັງຄາເຮືອນ</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $rows_cisol_how ?>
                                                ຫຼັງຄາເຮືອນ
                                            </div>
                                        </div>
                                        <div class="col-auto">

                                            <i class="fas fa-home fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-3 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                ຈຳນວນພະສົງ</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $rows_monk ?>
                                                ອົງ
                                            </div>
                                        </div>
                                        <div class="col-auto">

                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-3 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                ຈຳນວນຄົນເສຍຊິວິດ</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $row_dar ?>
                                                ຄົນ
                                            </div>
                                        </div>
                                        <div class="col-auto">

                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-3 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                ຈຳນວນຄົນຍົກຍ້າຍ</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $row_disout ?>
                                                ຄົນ
                                            </div>
                                        </div>
                                        <div class="col-auto">

                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-3 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                ຈຳນວນຄົ້ນເກີດໃຫມ່</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $row_disin ?>
                                                ຄົນ
                                            </div>
                                        </div>
                                        <div class="col-auto">

                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->
            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="js/demo/datatables-demo.js"></script>
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="js/sweetalert2.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/bootstrap.js"></script>
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>
        <script src="js/demo/chart-bar-demo.js"></script>
        <script>
            $(document).ready(function () {
                $(".goout").click((e) => {
                    var car_id = e.target.id;
                    $(e.target).addClass("d-none"); // Add "d-none" class to the clicked button
                    $(e.target).siblings(".goin").removeClass("d-none");
                    var button2 = $(e.target).siblings(".goin");
                    $.ajax({
                        type: "post",
                        url: "update_car.php",
                        data: {
                            car_id
                        },
                        success: function (response) {
                            Swal.fire({
                                icon: "success",
                                title: "ອະນຸຍາດສຳເລັດ",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(() => {
                                window.location = "charts.php"
                            }, 1500)
                        }
                    });
                });

                $(".goin").click((e) => {
                    var car_id = e.target.id;
                    $(e.target).addClass("d-none"); // Add "d-none" class to the clicked button
                    $(e.target).siblings(".goout").removeClass("d-none");
                    var button2 = $(e.target).siblings(".goin");
                    $.ajax({
                        type: "post",
                        url: "update_car_in.php",
                        data: {
                            car_id
                        },
                        success: function (response) {
                            Swal.fire({
                                icon: "success",
                                title: "ເລິ່ມຕົ້ນສຳເລັດ",
                                showConfirmButton: false,
                                timer: 1500,
                            });
                            setTimeout(() => {
                                window.location = "charts.php"
                            }, 1500)
                        }
                    });
                });
            })
        </script>

</body>

</html>