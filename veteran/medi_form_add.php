<?php
session_start();
include '../connect/db.php';
echo $_SESSION["m_id"];
$db = new DB;

$sql = "SELECT * from tbl_member 
INNER JOIN veteran ON veteran.m_id = tbl_member.m_id
WHERE tbl_member.m_id = " . intval($_SESSION["m_id"]) . " AND veteran.VT_ALIVE <>0";
$db->Execute($sql);
$res = $db->getData();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ค่ารักษาพยาบาล </title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="./vendor/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="./vendor/waves/waves.min.css">
    <link rel="stylesheet" href="./vendor/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100;300;400&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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


                            <div class="card-body">


                                <div class="buy-sell-widget">
                                    <div class="form-group">
                                        <label class="mr-sm-2">วันที่ยื่นคำร้อง</label>
                                        <div class="input-group mb-3">
                                            <input type="text" name="REQ_HEL_DATE" id="REQ_HEL_DATE" class="form-control" value="<?php echo date('d/m/Y', strtotime('+543 year')) ?>" style="background-color: #31383c;" readonly>
                                        </div>
                                    </div>

                                    <div class="buy-sell-widget">
                                        <div class="form-group">
                                            <label class="mr-sm-2">เบิกให้</label>
                                            <div class="input-group mb-3">
                                                <?php
                                                $sql = "SELECT * FROM veteran WHERE m_id = " . $_SESSION['m_id'] . " ";
                                                $db->Execute($sql);
                                                $res = $db->getData();
                                                ?>


                                            </div>

                                            <div class="col-md-2">
                                                <button name="submit" class="btn btn-success btn-block" onclick="add_self('<?php echo $res['VT_ID'] ?>')">เพิ่มตัวเอง</button>
                                            </div>

                                        </div>

                                        <table id="example" class="display" style="width:100%; color:black">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <th width=''>ลำดับ</th>
                                                    <th width=''>เลขปรจำตัวประชาชน</th>
                                                    <th width=''>ยศ/คำนำหน้า</th>
                                                    <th width=''>ชื่อ-นามสกุล</th>
                                                    <th width=''>ความสัมพันธ์</th>

                                                </tr>
                                            </thead>
                                            <tbody>



                                                <?php
                                                $query = "SELECT * FROM veteran_family  as A
                                             INNER JOIN veteran as B on A.VT_ID = B.VT_ID
                                             WHERE 
                                             B.m_id = " . $_SESSION['m_id'] . "
                                             AND B.VT_ID = A.VT_ID
                                             AND A.VT_FM_ALIVE='1' AND B.VT_ALIVE <>0
                                             ORDER BY A.VT_FM_ID ASC";

                                                $db->Execute($query);

                                                $i = 1;
                                                while ($row4 =  $db->getData()) {

                                                ?>
                                                    <tr>
                                                        <td align="center"> <input type="checkbox" name="VT_FM_ID" id="VT_FM_ID<?php echo $i ?>" value="<?php echo $row4["VT_FM_ID"] ?>" onclick="chec_getdata(this.value)"></td>
                                                        <td><?php echo $i ?></td>
                                                        <td><?php echo $row4["VT_FM_IDCARD"] ?></td>
                                                        <td><?php echo $row4["VT_FM_TITLE"] ?> </td>
                                                        <td><?php echo $row4["VT_FM_NAME"] . ' ' . $row4["VT_FM_LNAME"] ?></td>
                                                        <td><?php echo $row4["VT_FM_RELATION"] ?></td>

                                                    </tr>
                                                <?php
                                                    $i++;
                                                }
                                                ?>


                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td>#</td>
                                                    <th width=''>ลำดับ</th>
                                                    <th width=''>เลขปรจำตัวประชาชน</th>
                                                    <th width=''>ยศ/คำนำหน้า</th>
                                                    <th width=''>ชื่อ-นามสกุล</th>
                                                    <th width=''>ความสัมพันธ์</th>
                                                </tr>
                                            </tfoot>
                                        </table>

                                        <br>
                                        <div class="tab-pane fade show active" id="buy" role="tabpanel">
                                            <form enctype="multipart/form-data" method="post" name="myform" id="myform" class="currency_validate">
                                                <input type="hidden" name="check_hidden" id="check_hidden">
                                                <input type="hidden" name="m_id" id="m_id" value="<?php echo $_SESSION['m_id']; ?>" />
                                                <input type="hidden" name="s_id" value="1" />
                                                <input type="hidden" name="ref_d_id" value="<?php echo $_SESSION['m_id']; ?>" />
                                                <input type="hidden" name="create_datetime" value="<?php echo date('d/m/Y h:i:sa', strtotime('+543 years')); ?>">

                                                <!--  <div class="form-group">
                                                <div class="input-group mb-3">
                                                <input type="text" name="REQ_HEL_DATE" id="REQ_HEL_DATE" class="form-control" value="<?php echo date('d/m/Y', strtotime('+543 year')) ?>" style="background-color: #31383c;" readonly>
                                                </div>
                                            </div> -->

                                                <div class="form-group">
                                                    <label class="mr-sm-2">ชื่อสถานพยาบาล</label>

                                                    <div class="input-group mb-3">
                                                        <select class="form-control" id="editable-select">
                                                            <option value=""> กรุณาเลือกจังหวัด</option>
                                                            <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
                                                            <option value="กระบี่">กระบี่</option>
                                                            <option value="กาญจนบุรี">กาญจนบุรี</option>
                                                            <option value="กาฬสินธุ์">กาฬสินธุ์</option>
                                                            <option value="กำแพงเพชร">กำแพงเพชร</option>
                                                            <option value="ขอนแก่น">ขอนแก่น</option>
                                                            <option value="จันทบุรี">จันทบุรี</option>
                                                            <option value="ฉะเชิงเทรา">ฉะเชิงเทรา</option>
                                                            <option value="ชลบุรี">ชลบุรี</option>
                                                            <option value="ชัยนาท">ชัยนาท</option>
                                                            <option value="ชัยภูมิ">ชัยภูมิ</option>
                                                            <option value="ชุมพร">ชุมพร</option>
                                                            <option value="เชียงราย">เชียงราย</option>
                                                            <option value="เชียงใหม่">เชียงใหม่</option>
                                                            <option value="ตราด">ตราด</option>
                                                            <option value="ตรัง">ตรัง</option>
                                                            <option value="ตาก">ตาก</option>
                                                            <option value="นครนายก">นครนายก</option>
                                                            <option value="นครปฐม">นครปฐม</option>
                                                            <option value="นครพนม">นครพนม</option>
                                                            <option value="นครราชสีมา">นครราชสีมา</option>
                                                            <option value="นครศรีธรรมราช">นครศรีธรรมราช</option>
                                                            <option value="นครสวรรค์">นครสวรรค์</option>
                                                            <option value="นนทบุรี">นนทบุรี</option>
                                                            <option value="นราธิวาส">นราธิวาส</option>
                                                            <option value="น่าน">น่าน</option>
                                                            <option value="เบตง">เบตง</option>
                                                            <option value="บึงกาฬ">บึงกาฬ</option>
                                                            <option value="บุรีรัมย์">บุรีรัมย์</option>
                                                            <option value="ปทุมธานี">ปทุมธานี</option>
                                                            <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์</option>
                                                            <option value="ปราจีนบุรี">ปราจีนบุรี</option>
                                                            <option value="ปัตตานี">ปัตตานี</option>
                                                            <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา</option>
                                                            <option value="พะเยา">พะเยา</option>
                                                            <option value="พิจิตร">พิจิตร</option>
                                                            <option value="พิษณุโลก">พิษณุโลก</option>
                                                            <option value="เพชรบูรณ์">เพชรบูรณ์</option>
                                                            <option value="เพชรบุรี">เพชรบุรี</option>
                                                            <option value="แพร่">แพร่</option>
                                                            <option value="พังงา">พังงา</option>
                                                            <option value="พัทลุง">พัทลุง</option>
                                                            <option value="ภูเก็ต">ภูเก็ต</option>
                                                            <option value="มุกดาหาร">มุกดาหาร</option>
                                                            <option value="มหาสารคาม">มหาสารคาม</option>
                                                            <option value="แม่ฮ่องสอน">แม่ฮ่องสอน</option>
                                                            <option value="ยะลา">ยะลา</option>
                                                            <option value="ยโสธร">ยโสธร</option>
                                                            <option value="ร้อยเอ็ด">ร้อยเอ็ด</option>
                                                            <option value="ระนอง">ระนอง</option>
                                                            <option value="ระยอง">ระยอง</option>
                                                            <option value="ราชบุรี">ราชบุรี</option>
                                                            <option value="ลพบุรี">ลพบุรี</option>
                                                            <option value="ลำปาง">ลำปาง</option>
                                                            <option value="ลำพูน">ลำพูน</option>
                                                            <option value="เลย">เลย</option>
                                                            <option value="ศรีสะเกษ">ศรีสะเกษ</option>
                                                            <option value="สกลนคร">สกลนคร</option>
                                                            <option value="สงขลา">สงขลา</option>
                                                            <option value="สตูล">สตูล</option>
                                                            <option value="สมุทรสาคร">สมุทรสาคร</option>
                                                            <option value="สมุทรสงคราม">สมุทรสงคราม</option>
                                                            <option value="สมุทรปราการ">สมุทรปราการ</option>
                                                            <option value="สระแก้ว">สระแก้ว</option>
                                                            <option value="สระบุรี">สระบุรี</option>
                                                            <option value="สิงห์บุรี">สิงห์บุรี</option>
                                                            <option value="สุโขทัย">สุโขทัย</option>
                                                            <option value="สุพรรณบุรี">สุพรรณบุรี</option>
                                                            <option value="สุราษฎร์ธานี">สุราษฎร์ธานี</option>
                                                            <option value="สุรินทร์">สุรินทร์</option>
                                                            <option value="หนองคาย">หนองคาย</option>
                                                            <option value="หนองบัวลำภู">หนองบัวลำภู</option>
                                                            <option value="อ่างทอง">อ่างทอง</option>
                                                            <option value="อุบลราชธานี">อุบลราชธานี</option>
                                                            <option value="อุทัยธานี">อุทัยธานี</option>
                                                            <option value="อุดรธานี">อุดรธานี</option>
                                                            <option value="อุตรดิตถ์">อุตรดิตถ์</option>
                                                            <option value="อำนาจเจริญ">อำนาจเจริญ</option>
                                                        </select>
                                                        <select class="form-control" name="GOV_HOS_ID" id="editable-select1">
                                                            <option value="">-- โรงพยาบาล --</option>
                                                        </select>
                                                        <!-- <input type="text" name="usd_amount" class="form-control" value="125.00 USD"> -->
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="mr-sm-2">ป่วยเป็นโรค</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" name="REQ_HEL_SICKNESS" id="REQ_HEL_SICKNESS" class="form-control" placeholder="กรอกชื่อโรค/อาการ">

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="mr-sm-2">รายละเอียด</label>
                                                    <div class="input-group">
                                                        <textarea name="REQ_HEL_DETAIL" id="REQ_HEL_DETAIL" class="form-control" placeholder="รายละเอียด" rows="4" cols="50"></textarea>

                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="mr-sm-2">จำนวนขอเบิก</label>
                                                    <div class="input-group mb-3">
                                                        <input type="number" name="REQ_HEL_VALUE" id="REQ_HEL_VALUE" class="form-control" placeholder="จำนวนเงินขอเบิก">

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="mr-sm-2"> วิธีการรับเงิน</label>
                                                    <div class="input-group mb-3">

                                                        <input value="1" type="radio" id="REQ_HEL_PAY_TYPE" name="REQ_HEL_PAY_TYPE" style="width: 20px;height:20px;"> &nbsp; &nbsp; &nbsp; รับเงินด้วยตัวเองที่ อผศ. &nbsp; &nbsp; &nbsp;

                                                        <input value="2" type="radio" id="REQ_HEL_PAY_TYPE" name="REQ_HEL_PAY_TYPE" style="width: 20px;height:20px;"> &nbsp; &nbsp; &nbsp; โอนเงินผ่านธนาคาร


                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="mr-sm-2">อัพโหลดไฟล์</label>
                                                    <label class="mr-sm-2"></label>

                                                    <div class="input-group">

                                                        <input type="file" name="REQ_HEL_FILE[1]" id="REQ_HEL_FILE[1]" class="form-control">
                                                    </div>
                                                </div>
                                                <span style="cursor:pointer" onclick="addmore();">เพิ่มไฟล์อัพโหลด <span style="color:red;">*</span></span>
                                                <br />
                                                <select name="select_file" id="select_file" style="display: none;" onchange="change_file()">
                                                    <?php for ($i = 0; $i < 20; $i++) {
                                                    ?> <option value="<?php echo $i + 1 ?>"><?php echo $i + 1; ?></option> <?php
                                                                                                                        } ?>
                                                </select>
                                                <div id="file_x">

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
                                <p>© Copyright 2021 <a href="#">ระบบสวัสดิการสงเคราะห์</a> I All Rights Reserved</p>
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
                    swal('กรุณากรอกข้อมูลให้ครบ', '', 'warning');
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
                            swal('เงินเกิน', '', 'warning');
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
                                        swal('บันทึกรายการสำเร็จ', '', 'success');
                                        setTimeout(function(){window.location = "index.php"}, 2000);
                                    } else {
                                        swal('บันทึกรายการไม่สำเร็จ', '', 'error');
                                        setTimeout(function(){window.location = "index.php"}, 2000);
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


            function add_self(txt) {
                window.location = "medi_form_add_own.php"
            }
        </script>
</body>

</html>