<?php
session_start();
include '../connect/db.php';
echo $_SESSION["m_id"];
$db = new DB;

$sql = "SELECT * from tbl_member 
INNER JOIN veteran ON veteran.m_id = tbl_member.m_id
INNER JOIN veteran_family ON veteran.VT_ID = veteran_family.VT_ID
WHERE tbl_member.m_id = " . intval($_SESSION["m_id"]) . " 
AND VT_FM_RELATION ='ภรรยา' AND veteran.VT_ALIVE <>0";

$db->Execute($sql);
$res = $db->getData();

$sql2 = "SELECT * FROM disaster_type ORDER BY DST_ID asc";
$db->Execute($sql2);


?>
<!DOCTYPE html>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ค่าคลอดบุตร</title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="./vendor/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="./vendor/waves/waves.min.css">
    <link rel="stylesheet" href="./vendor/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100;300;400&display=swap" rel="stylesheet">
</head>
<style>
    .dataTables_wrapper {
        background-color: whitesmoke;
    }

    .dataTables_filter {
        display: none;
    }

    .dataTables_length {
        display: none;
    }

    .dataTables_info {
        display: none;
    }

    .dataTables_paginate {
        display: none;
    }

    option {
        color: black;
    }

    body {
        font-family: 'Prompt', sans-serif !important;
    }
</style>

<body>

    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    <div id="main-wrapper">

<div class="header dashboard">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <nav class="navbar navbar-expand-lg navbar-light px-0 justify-content-between">
                    <a class="navbar-brand" href="index.html"><img src="./images/logo.png" alt="">
                    </a>
                    <div class="dashboard_log my-2">
                        <div class="d-flex align-items-center">

                            <div class="profile_log dropdown">
                                <div class="user" data-toggle="dropdown">
                                    <span>
                                        <img style="border-radius: 50%;" src="../m_img/<?php echo $res['m_img'] ?>" alt="User Image" width="45" height="45"></span>
                                    &nbsp;
                                    <p><?php echo $res['VT_TITLE'] . ' ' . $res['VT_FNAME'] . ' ' . $res['VT_LNAME'] ?></p>
                                    <span class="arrow"><i class="la la-angle-down"></i></span>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="../index.php" class="dropdown-item logout">
                                        <i class="la la-sign-out"></i> Logout
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
        <!--  สไลด์สีเขียวด้านข้าง-->
        <div class="sidebar">
            <div class="menu">
                <ul>
                    <li>
                        <a href="index.php" data-toggle="tooltip" data-placement="right" title="Home" class="active">
                            <span><i class="la la-home"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="profile_vt.php" data-toggle="tooltip" data-placement="right" title="Account">
                            <span><i class="la la-user"></i></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>


        <div class="content-body">
            <div class="container-fluid">
                <div class="row">


                    <div class="col-md-12">
                        <div class="card">
                            <!-- <div class="card-header border-0">
                                <h4>ยื่นคำร้องขอเบิกค่ารักษาพยาบาล</h4>
                            </div> -->


                            <form enctype="multipart/form-data" method="post" name="myform" id="myform" class="currency_validate">
                                <div class="card-body">


                                    <div class="buy-sell-widget">
                                        <div class="form-group">
                                            <label class="mr-sm-2">วันที่ยื่นคำร้อง</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="REQ_MAT_DATE" id="REQ_MAT_DATE" class="form-control" value="<?php echo date('d/m/Y', strtotime('+543 year')) ?>" style="background-color: #31383c;" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-group">
                                                <label class="mr-sm-2">วันที่คลอด</label>

                                                <div class="input-group mb-3">
                                                    <input type="text" name="MAT_BIRTH_DATE" required class="form-control" class="form-control" id="MAT_BIRTH_DATE" value="<?php echo date('d/m/Y', strtotime('+543 year')) ?>" placeholder="วัน/เดือน/ปี">
                                                </div>








                                                <div class="tab-pane fade show active" id="buy" role="tabpanel">

                                                    <input type="hidden" name="check_hidden" id="check_hidden">
                                                    <input type="hidden" name="m_id" id="m_id" value="<?php echo $_SESSION['m_id']; ?>" />
                                                    <input type="hidden" name="s_id" value="1" />

                                                    <input type="hidden" name="create_datetime" value="<?php echo date('d/m/Y h:i:sa', strtotime('+543 years')); ?>">




                                                    <div class="form-group">
                                                        <label class="mr-sm-2"> วิธีการรับเงิน</label>
                                                        <div class="input-group mb-3">

                                                            <input value="1" type="radio" name="REQ_MAT_PAY_TYPE" style="width: 20px;height:20px;"> &nbsp; &nbsp; &nbsp; รับเงินด้วยตัวเองที่ อผศ. &nbsp; &nbsp; &nbsp;

                                                            <input value="2" type="radio" name="REQ_MAT_PAY_TYPE" style="width: 20px;height:20px;"> &nbsp; &nbsp; &nbsp; โอนเงินผ่านธนาคาร


                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="mr-sm-2">อัพโหลดไฟล์สูติบัตร</label>
                                                        <label class="mr-sm-2"></label>

                                                        <div class="input-group">

                                                            <input type="file" name="REQ_MAT_BRITH_FILE[1]" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="mr-sm-2">หนังสือรับรองผู้บังคับบัญชาต้นสังกัด</label>
                                                        <label class="mr-sm-2"></label>

                                                        <div class="input-group">

                                                            <input type="file" name="REQ_MAT_BRITH_FILE[2]" id="REQ_MAT_BRITH_FILE" class="form-control">
                                                        </div>
                                                    </div>
                                                    <!-- <span style="cursor:pointer" onclick="addmore();">เพิ่มไฟล์อัพโหลด <span style="color:red;">*</span></span> -->
                                                    <br />
                                                    <select name="select_file" id="select_file" style="display: none;" onchange="change_file()">
                                                        <?php for ($i = 0; $i < 20; $i++) {
                                                        ?> <option value="<?php echo $i + 1 ?>"><?php echo $i + 1; ?></option> <?php
                                                                                                                            } ?>
                                                    </select>
                                                    <div id="file_x">

                                                    </div>





                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                            <div class="card-body">
                                <button id="form_data" class="btn btn-success btn-block">ยืนยันรายการ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="footer dashboard">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="copyright">
                                <p><a href="#">ระบบสวัสดิการสงเคราะห์</a> I All Rights Reserved</p>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="footer-social">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>


        <script src="./js/global.js"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>


        <script src="./vendor/circle-progress/circle-progress.min.js"></script>
        <script src="./vendor/circle-progress/circle-progress-init.js"></script>


        <!--  flot-chart js -->
        <script src="./vendor/apexchart/apexcharts.min.js"></script>
        <script src="./vendor/apexchart/apexchart-init.js"></script>


        <!-- <script src="./js/dashboard.js"></script> -->
        <script src="./js/dashboard.js"></script>
        <script src="./js/scripts.js"></script>

        <script src="./js/settings.js"></script>
        <script src="./js/quixnav-init.js"></script>
        <script src="./js/styleSwitcher.js"></script>

        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });

            $("#editable-select").change(function() {
                $.ajax({
                    type: "POST",
                    url: "hospital.php",
                    data: {
                        GOV_HOS_NAME: $('#editable-select').val()
                    },

                    success: function(data) {
                        $('#editable-select1').html(data)
                    }
                });
            });



            function addmore() {
                $('#select_file').css('display', 'inline-block');
                $.ajax({
                    type: "POST",
                    url: "add_file.php",
                    data: {
                        select_file: 1
                    },

                    success: function(data) {
                        console.log(data)
                        $('#file_x').html(data)
                    }
                });
            }

            function change_file() {
                $.ajax({
                    type: "POST",
                    url: "add_file_disa.php",
                    data: {
                        select_file: $('#select_file').val()
                    },

                    success: function(data) {
                        console.log(data)
                        $('#file_x').html(data)
                    }
                });
            }

            $('#form_data').click(function(e) {
                if ($('#REQ_MAT_BRITH_FILE').val() == "") {
                    swal('กรุณากรอกข้อมูลให้ครบ', '', 'warning');
                    return false;
                }

                var form = $('form')[0]; // You need to use standard javascript object here
                var formData = new FormData(form);
                $.ajax({
                    type: "POST",
                    url: "mat_form_add_db.php",
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(data) {

                        if (data == "success") {
                            swal('บันทึกรายการสำเร็จ', '', 'success');
                            setTimeout(function(){window.location = "index.php"}, 2000);
                        } else {
                            swal('บันทึกรายการไม่สำเร็จ', '', 'error');
                            setTimeout(function(){window.location = "index.php"}, 2000);
                        }

                    }
                })
            });


            function chec_getdata(v) {
                $('#check_hidden').val(v);
            }
        </script>
</body>

</html>