<?php
session_start();
include '../connect/db.php';
echo $_SESSION["m_id"];
$db = new DB;

$sql = "SELECT * from tbl_member 
INNER JOIN veteran ON veteran.m_id = tbl_member.m_id
WHERE tbl_member.m_id = " . intval($_SESSION["m_id"]) . " ";
$db->Execute($sql);
$res = $db->getData();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ค่าครั้งคราว </title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="./vendor/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="./vendor/waves/waves.min.css">
    <link rel="stylesheet" href="./vendor/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
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
                            <h4>ยื่นคำร้องขอเงินช่วยเหลือครั้งคราว</h4>
                            <a class="navbar-brand" href="index.html"><img src="./images/logo.png" alt="">
                            </a>


                            <div class="dashboard_log my-2">
                                <div class="d-flex align-items-center">
                                    <div class="account_money">
                                        <!-- <ul>
                                            <li class="crypto">
                                                <span>0.0025</span>
                                                <i class="cc BTC-alt"></i>
                                            </li>
                                            <li class="usd">
                                                <span>19.93 USD</span>
                                            </li>
                                        </ul> -->
                                    </div>
                                    <div class="profile_log dropdown">
                                        <div class="user" data-toggle="dropdown">
                                            <span class="thumb"><i class="la la-user"></i></span>
                                            <span class="name"><?php echo $res['VT_TITLE'] . ' ' . $res['VT_FNAME'] . ' ' . $res['VT_LNAME']; ?></span>
                                            <span class="arrow"><i class="la la-angle-down"></i></span>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="accounts.html" class="dropdown-item">
                                                <i class="la la-user"></i> Account
                                            </a>
                                            <a href="medi_history.php" class="dropdown-item">
                                                <i class="la la-book"></i> History
                                            </a>
                                            <a href="settings.html" class="dropdown-item">
                                                <i class="la la-cog"></i> Setting
                                            </a>
                                            <a href="lock.html" class="dropdown-item">
                                                <i class="la la-lock"></i> Lock
                                            </a>
                                            <a href="signin.html" class="dropdown-item logout">
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
                        <a href="index.php" data-toggle="tooltip" data-placement="right" title="Home">
                            <span><i class="la la-igloo"></i></span>
                        </a>
                    </li>
                    <li><a href="buy-sell.html" data-toggle="tooltip" data-placement="right" title="Exchange" class="active">
                            <span><i class="la la-exchange-alt"></i></span>
                        </a>
                    </li>
                    <li><a href="accounts.html" data-toggle="tooltip" data-placement="right" title="Account">
                            <span><i class="la la-user"></i></span>
                        </a>
                    </li>
                    <li><a href="settings.html" data-toggle="tooltip" data-placement="right" title="Setting">
                            <span><i class="la la-tools"></i></span>
                        </a>
                    </li>
                    <li><a href="medi_history.php" data-toggle="tooltip" data-placement="right" title="Setting">
                            <span><i class="la la-tools"></i></span>
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



                            <div class="card-body">


                                <div class="buy-sell-widget">
                                    <div class="form-group">
                                        <label class="mr-sm-2">วันที่ยื่นคำร้อง</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="REQ_OCC_DATE" id="REQ_OCC_DATE" class="form-control" value="<?php echo date('d/m/Y', strtotime('+543 year')) ?>" style="background-color: #31383c;" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="mr-sm-2">เหตุผลขอรับการสงเคราะห์</label>
                                        <div class="input-group mb-3">
                                            <select name="REQ_OCC_REASON" class="form-control" required>
                                                <option value="">เลือกข้อมูล</option>
                                                <option value="เดือนร้อนเฉพาะหน้า">เดือนร้อนเฉพาะหน้า</option>
                                                <option value="ค่าใช้จ่ายเดินทาง">ค่าใช้จ่ายเดินทาง</option>
                                                <option value="อื่นๆ">อื่นๆ</option>
                                            </select>
                                            
                                        </div>
                                    </div>






                                    <div class="form-group">
                                        <label class="mr-sm-2">จำนวนขอเบิก</label>
                                        <div class="input-group mb-3">
                                            <input type="number" name="REQ_OCC_VALUE" id="REQ_OCC_VALUE" class="form-control" placeholder="จำนวนเงินขอเบิก">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                    <label class="mr-sm-2">วิธีการรับเงิน</label>
                                     
                                        <div class="input-group mb-3">

                                            <input value="1" type="radio" name="REQ_OCC_PAY_TYPE" style="width: 20px;height:20px;"> &nbsp; &nbsp; &nbsp; รับเงินด้วยตัวเองที่ อผศ. &nbsp; &nbsp; &nbsp;

                                            <input value="2" type="radio" name="REQ_OCC_PAY_TYPE" style="width: 20px;height:20px;"> &nbsp; &nbsp; &nbsp; โอนเงินผ่านธนาคาร


                                        </div>
                                    </div>

                                    
                                    <div class="form-group">
                                        <label class="mr-sm-2">หมายเหตุ</label>
                                        <div class="input-group">
                                            <textarea name="REQ_OCC_REMARK" id="REQ_OCC_REMARK" class="form-control" placeholder="หมายเหตุ" rows="4" cols="50"></textarea>

                                        </div>
                                    </div>

                                    </div>



                                    </form>
                                    <button id="form_data" name="submit" class="btn btn-success btn-block">ยืนยันรายการ</button>
                                </div>
                            </div>
                        </div>
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
                        <p>© Copyright 2019 <a href="#">Tradix</a> I All Rights Reserved</p>
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

    <!--removeIf(production)-->
    <!--**********************************
            Right sidebar start
        ***********************************-->
    <div class="sidebar-right">
        <a class="sidebar-right-trigger" href="javascript:void(0)">
            <span><i class="fa fa-cog fa-spin"></i></span>
        </a>
        <div class="sidebar-right-inner">
            <div class="admin-settings">
                <div class="opt-background">
                    <p>Font Family</p>
                    <select class="form-control" name="theme_font" id="theme_font">
                        <option value="nunito">Nunito</option>
                        <option value="opensans">Open Sans</option>

                    </select>
                </div>
                <div>
                    <p>Primary Color</p>
                    <div class="opt-nav-header-color">
                        <span>
                            <input type="radio" name="navigation_header" value="color_1" class="filled-in chk-col-primary" id="nav_header_color_1" />
                            <label for="nav_header_color_1"></label>
                        </span>
                        <span>
                            <input type="radio" name="navigation_header" value="color_2" class="filled-in chk-col-primary" id="nav_header_color_2" />
                            <label for="nav_header_color_2"></label>
                        </span>
                        <span>
                            <input type="radio" name="navigation_header" value="color_3" class="filled-in chk-col-primary" id="nav_header_color_3" />
                            <label for="nav_header_color_3"></label>
                        </span>
                        <span>
                            <input type="radio" name="navigation_header" value="color_4" class="filled-in chk-col-primary" id="nav_header_color_4" />
                            <label for="nav_header_color_4"></label>
                        </span>
                        <span>
                            <input type="radio" name="navigation_header" value="color_5" class="filled-in chk-col-primary" id="nav_header_color_5" />
                            <label for="nav_header_color_5"></label>
                        </span>
                    </div>
                </div>
                <div class="opt-header-color">
                    <p>Background Color</p>
                    <div>
                        <span>
                            <input type="radio" name="header_bg" value="color_1" class="filled-in chk-col-primary" id="header_color_1">
                            <label for="header_color_1"></label>
                        </span>
                        <span>
                            <input type="radio" name="header_bg" value="color_2" class="filled-in chk-col-primary" id="header_color_2">
                            <label for="header_color_2"></label>
                        </span>
                        <span>
                            <input type="radio" name="header_bg" value="color_3" class="filled-in chk-col-primary" id="header_color_3">
                            <label for="header_color_3"></label>
                        </span>
                        <span>
                            <input type="radio" name="header_bg" value="color_4" class="filled-in chk-col-primary" id="header_color_4">
                            <label for="header_color_4"></label>
                        </span>
                        <span>
                            <input type="radio" name="header_bg" value="color_5" class="filled-in chk-col-primary" id="header_color_5">
                            <label for="header_color_5"></label>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
            Right sidebar end
        ***********************************-->
    <!--endRemoveIf(production)-->

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
                url: "add_file.php",
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
            if ($('#REQ_HEL_DETAIL').val() == "") {
                alert('กรุณากรอกข้อมูลให้ครบ')
                return false;
            }
            $.ajax({
                type: "POST",
                url: "check_val.php",
                data: {
                    money: $('#REQ_HEL_VALUE').val(),
                    id: $('#m_id').val()
                },

                success: function(data) {
                    if (data != 'success') {
                        alert('เงินเกิน')
                    } else {
                        var form = $('form')[0]; // You need to use standard javascript object here
                        var formData = new FormData(form);
                        $.ajax({
                            type: "POST",
                            url: "medi_form_add_db.php",
                            processData: false,
                            contentType: false,
                            data: formData,
                            success: function(data) {

                                if (data == "success") {
                                    alert('บันทึกรายการสำเร็จ')
                                    window.location = "index.php"
                                } else {
                                    alert('บันทึกรายการไม่สำเร็จ')
                                    //  window.location = "case_medi.php"
                                }

                            }
                        })
                    }
                }
            });
        });


        function chec_getdata(v) {
            $('#check_hidden').val(v);
        }
    </script>
</body>

</html>