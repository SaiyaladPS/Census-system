<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require '../../db/connect.php';
$sql = "SELECT * FROM people as p1 INNER JOIN province as p2 ON p1.pro_id = p2.pro_id INNER JOIN district as p3 ON p1.dis_id = p3.dis_id INNER JOIN village as p4 ON p1.vi_id = p4.vi_id ORDER BY p1.pe_id DESC";
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

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <h6 class="m-0 font-weight-bold w-100 text-center fs-4 text-success">ຂໍ້ມູນ ພົນລະເມືອງ</h6>
            <div class="card-header py-3">
                <a href="select_people.php" class="btn btn-success">ເພິ່ມຂໍ້ມູນ</a>
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
                                <th>ວັນທີ່ອະນຸມັດ</th>
                                <th>ຈຸດປະສົງ</th>

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
                                <th>ວັນທີ່ອະນຸມັດ</th>
                                <th>ຈຸດປະສົງ</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php
                            $number = 1;
                            while ($row = mysqli_fetch_assoc($query)) { ?>
                            <tr>
                                <td>
                                    <?php echo $row['pe_how'] ?>
                                </td>
                                <td>
                                    <img class="img-profile img" src="../../img/<?php echo $row['pe_img'] ?>"
                                        alt="user">
                                </td>
                                <td>
                                    <?php echo $row['pe_fname'] . " " . $row['pe_lname'] ?>
                                </td>
                                <td>
                                    <?php if ($row['pe_gander'] == 'Male') {
                                            echo "ຊາຍ";
                                        } else {
                                            echo "ຍິງ";
                                        } ?>
                                </td>
                                <td>
                                    <?php echo $row['pe_dob'] ?>
                                </td>
                                <td>
                                    <?php echo $row['pe_son'] ?>
                                </td>
                                <td>
                                    <?php echo $row['pe_soso'] ?>
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
                                    <?php echo $row['pe_date'] ?>
                                </td>
                                <td>
                                    <?php echo $row['pe_remak'] ?>
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

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

    <script src="../../js/sweetalert2.js"></script>
    <!-- dataTable -->
    <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../js/demo/datatables-demo.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script>
    $(document).ready(() => {
        $(".delete").click((e) => {
            var delete_id = e.target.id
            Swal.fire({
                title: "ຕ້ອງການລົບຫຼຶບໍ່?",
                text: "ຖ້າຕ້ອງການກົດທີຢືນຢັນ",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "ຢືນຢັນ",
                cancelButtonText: "ຍົກເລິກ"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "post",
                        url: "delete_citizens.php",
                        data: {
                            delete_id
                        },
                        success: function(response) {
                            if (response == 200) {
                                Swal.fire({
                                    icon: "success",
                                    title: "ລົບຂໍ້ມູນສຳເລັດ",
                                    showConfirmButton: false,
                                    timer: 1500,
                                });
                                setTimeout(() => {
                                    window.location =
                                        "select_user.php"
                                }, 1500);
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "ບໍ່ສາມາດລົບໄດ້",
                                    text: "ເນືອງຈາກອາດເກີດຂໍ້ຜິດພາດບາງຢ່າງ",
                                    confirmButtonText: "ຕົກລົງ"
                                });
                            }
                        }
                    });
                }
            });

        })
    })
    </script>
</body>

</html>