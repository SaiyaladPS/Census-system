<?php
session_start();

if ($_SESSION['username'] == "") {
    header("location: ../../404.php");
}
require '../../db/connect.php';
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
        <div class="row">
            <div class="col-3">
                <p>
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseWidthExample" aria-expanded="false"
                        aria-controls="collapseWidthExample">
                        ແຈ້ງຄົນເພິ່ມສັບສຳລັບພົນລະເມືອງ
                    </button>
                </p>

            </div>
            <div class="col-3">
                <p>
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseWidthExample2" aria-expanded="false"
                        aria-controls="collapseWidthExample2">
                        ແຈ້ງຄົນເພິ່ມສຳລັບຕ່າງດ້າວ
                    </button>
                </p>

                <p>
            </div>
            <div class="col-3">
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseWidthExample3" aria-expanded="false" aria-controls="collapseWidthExample3">
                    ແຈ້ງຄົ້ນເພິ່ມສຳລັບພະສົງ
                </button>
                </p>
            </div>
        </div>
        <!-- // todo ແຈ້ງຄົ້ນເພິ່ມສຳລັບພົນລະເມືອງ -->
        <div class="w-100">
            <div class="collapse collapse-horizontal" id="collapseWidthExample">
                <div class="card card-body">
                    <form class=" w-75 bg-gradient-success text-white px-5 py-5 coutnform rounded-4 mt-4"
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
                                    <input type="number" class="form-control" id="ci_tel" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="exampleInputEmail1" class="form-label">ບ້ານ</label>
                                    <select class="form-select form-control" id="vi_id"
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
                                    <input type="text" class="form-control" id="ci_lname" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ວັນເດືອນປີເກີດ</label>
                                    <input type="date" class="form-control" id="ci_dob" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ແຂວງ</label>
                                    <select class="form-select form-control" id="pro_id"
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
                                    <select class="form-select form-control" id="dis_id"
                                        aria-label="Default select example">
                                        <option selected value="" hidden>ເລືອກເມືອງ</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ເລກທີ່ເຮືອນ</label>
                                    <input type="text" class="form-control" id="ci_how" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ຊົນເຜົ່າ</label>
                                    <input type="text" class="form-control" id="ci_son" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ຊັນຊາດ</label>
                                    <input type="text" class="form-control" id="ci_soso" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ເຊືອຊາດ</label>
                                    <input type="text" class="form-control" id="ci_sol" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ສາສະໜາ</label>
                                    <input type="text" class="form-control" id="ci_sll" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ອາຊີບ</label>
                                    <input type="text" class="form-control" id="ci_aso" aria-describedby="emailHelp">
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
        <!-- // todo ແຈ້ງຄົ້ນເພິ່ມສຳລັບຕ່າງດ້າວ -->
        <div style="min-height: 120px;">
            <div class="collapse collapse-horizontal" id="collapseWidthExample2">
                <div class="card card-body">
                    <form class=" w-75 bg-gradient-success text-white px-5 py-5 coutnform rounded-4 mt-4"
                        id="form_different">
                        <div class="profile-container">
                            <div class="profile-picture">
                                <img src="../../img/icon.png" class="img" alt="Default Avatar" id="preview">
                                <input class="input" type="file" id="profilePicture" accept="image/*"
                                    onchange="previewImage(this)">
                                <label class="label" for="profilePicture">ຮູບພາບ 3x4</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">ຊື່</label>
                                    <input type="text" class="form-control" id="di_fname">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label d-block ">ເພດ</label>
                                    <div class=" form-control ">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="di_gander"
                                                id="inlineRadio1" value="Girl">
                                            <label class="form-check-label" for="inlineRadio1">ຍິງ</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="di_gander"
                                                id="inlineRadio2" value="Male">
                                            <label class="form-check-label" for="inlineRadio2">ຊາຍ</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ເລກທີໜັງສຶຜ່ານແດນ</label>
                                    <input type="number" class="form-control" id="di_num" aria-describedby="emailHelp">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ຊື່ປະເທດ</label>
                                    <input type="text" class="form-control" id="di_pn" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ນາມສະກຸນ</label>
                                    <input type="text" class="form-control" id="di_lname" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ວັນເດືອນປີເກີດ</label>
                                    <input type="date" class="form-control" id="di_dob" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ສັນຊາດ</label>
                                    <input type="text" class="form-control" id="di_soso" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ສາສະໜາ</label>
                                    <input type="text" class="form-control" id="di_sll" aria-describedby="emailHelp">
                                </div>

                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary ">ບັນທືກ</button>
                        <button type="reset" class="btn btn-danger ">ລ້າງ</button>
                        <a href="select_different.php" class="btn btn-success ">ຂໍ້ມູນ</a>
                    </form>
                </div>
            </div>
        </div>

        <!-- // todo ແຈ້ງຄົ້ນເພິ່ມສຳລັບພະສົງ -->
        <div style="min-height: 120px;">
            <div class="collapse collapse-horizontal" id="collapseWidthExample3">
                <div class="card card-body">
                    <form class=" w-75 bg-gradient-success text-white px-5 py-5 coutnform rounded-4 mt-4"
                        id="form_monk">
                        <div class="profile-container">
                            <div class="profile-picture">
                                <img src="../../img/icon.png" class="img" alt="Default Avatar" id="preview">
                                <input class="input" type="file" id="profilePicture" accept="image/*"
                                    onchange="previewImage(this)">
                                <label class="label" for="profilePicture">ຮູບພາບ 3x4</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ຄຳນຳໜ້າ</label>
                                    <select class="form-select form-control" id="mo_fname"
                                        aria-label="Default select example">
                                        <option selected value="" hidden>ເລືອກຄຳນຳໜ້າ</option>
                                        <option value="ພະອາຈານ">ພະອາຈານ</option>
                                        <option value="ຄູບາ">ຄູບາ</option>
                                        <option value="ສະມະເນນ">ສະມະເນນ</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ຊື່ວັດ</label>
                                    <input type="text" class="form-control" id="mo_oname" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ເຊື້ອຊາດ</label>
                                    <input type="text" class="form-control" id="mo_sol" aria-describedby="emailHelp">
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ຊື່</label>
                                    <input type="text" class="form-control" id="mo_lname" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ສາສະໜາ</label>
                                    <input type="text" class="form-control" id="mo_sll" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ສັນຊາດ</label>
                                    <input type="text" class="form-control" id="mo_soso" aria-describedby="emailHelp">
                                </div>


                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary ">ບັນທືກ</button>
                        <button type="reset" class="btn btn-danger ">ລ້າງ</button>
                        <a href="select_monk.php" class="btn btn-success ">ຂໍ້ມູນ</a>
                    </form>
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

    <script>
    $(document).ready(() => {
        function setToday() {
            // Get the current date in the format "YYYY-MM-DD"
            var currentDate = new Date().toISOString().split('T')[0];

            // Set the date input field value to the current date
            $('.dateTo').val(currentDate);
        }
        $("#basic-addon2").click(() => {
            setToday()
        })
        $("#pro_id").change((e) => {
            $("#dis_id").empty()
            var pro_id = e.target.value;
            $.ajax({
                type: "post",
                url: "select_dis.php",
                data: {
                    pro_id
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    $.each(data, function(indexInArray, valueOfElement) {
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
                url: "select_vi.php",
                data: {
                    dis_id
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    $.each(data, function(indexInArray, valueOfElement) {
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
                    url: "check_citizens.php",
                    data: {
                        ci_fname,
                        ci_lname,
                        ci_how
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
                                url: "insert_citizens.php",
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function(response) {
                                    if (response === "1") {
                                        Swal.fire({
                                            icon: "success",
                                            title: "ບັນທືກຂໍ້ມູນສຳເລັດ",
                                            showConfirmButton: false,
                                            timer: 1500,
                                        });
                                        setTimeout(() => {
                                            window.location =
                                                "select_citizens.php"
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
    <script>
    $(document).ready(function() {
        // Button 1 click event
        $("#collapseWidthExample").on('show.bs.collapse', function() {
            // Hide the content of button 2 and button 3
            $("#collapseWidthExample2, #collapseWidthExample3").collapse('hide');
        });

        // Button 2 click event
        $("#collapseWidthExample2").on('show.bs.collapse', function() {
            // Hide the content of button 1 and button 3
            $("#collapseWidthExample, #collapseWidthExample3").collapse('hide');
        });

        // Button 3 click event
        $("#collapseWidthExample3").on('show.bs.collapse', function() {
            // Hide the content of button 1 and button 2
            $("#collapseWidthExample, #collapseWidthExample2").collapse('hide');
        });
    });
    </script>
    <script src="../../js/bootstrap.js"></script>
</body>

</html>