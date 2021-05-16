<?php
session_start();
include '../connect/db.php';
echo $_SESSION["m_id"];
$db = new DB;

$sql = "SELECT * from tbl_member 
INNER JOIN veteran ON veteran.m_id = tbl_member.m_id
WHERE tbl_member.m_id = " . intval($_SESSION["m_id"]) . " AND veteran.VT_ALIVE <>0 ";
$db->Execute($sql);
$res = $db->getData();

$sql2 = "SELECT * FROM health_value_bal 
    WHERE m_id = " . intval($_SESSION["m_id"]) . " ";
$db->Execute($sql2);
$res2 = $db->getData();

$sql3 = "SELECT * FROM occ_value_bal 
    WHERE m_id = " . intval($_SESSION["m_id"]) . " ";
$db->Execute($sql3);
$res3 = $db->getData();

$sql4 = "SELECT * FROM mat_value_bal 
    WHERE m_id = " . intval($_SESSION["m_id"]) . " ";
$db->Execute($sql4);
$res4 = $db->getData();



//$sql5 ="SELECT *
//FROM edu_value_bal 
//  WHERE m_id = " . intval($_SESSION["m_id"]) . " ";
//$db->Execute($sql5);
//$res5 = $db->getData();

$sql5 = "SELECT * FROM
    (SELECT MAX(seq) as seq,m_id  FROM edu_value_bal GROUP BY m_id) a
LEFT JOIN
    (SELECT * FROM edu_value_bal) b
    ON a.m_id =b.m_id
WHERE a.m_id =" . intval($_SESSION["m_id"]) . " ";

$db->Execute($sql5);
$res5 = $db->getData();

$sql6 = "SELECT * FROM education_policy
INNER JOIN veteran ON veteran.VT_CARD_STEP = education_policy.VT_CARD_STEP
WHERE m_id = " . intval($_SESSION["m_id"]) . " ";

$db->Execute($sql6);
$res6 = $db->getData();

$sql7 = "SELECT *
FROM edu_value_bal
WHERE
seq=
(SELECT MAX(seq)
FROM edu_value_bal
WHERE m_id =" . intval($_SESSION["m_id"]) . ")
AND  m_id =" . intval($_SESSION["m_id"]) . " ";
$db->Execute($sql7);
$res7 = $db->getData();


$year = date("Y") + 543;

$sql8 = "SELECT 
SUM(edu_value_bal_use) AS baluse
FROM edu_value_bal
WHERE
edu_value_bal_bg_year= $year
AND m_id =" . intval($_SESSION["m_id"]) . "";


$db->Execute($sql8);
$res8 = $db->getData();



$sql9 = "SELECT 
SUM(REQ_DISA_VALUE_APPROVE) AS balusedisa
FROM req_disa
WHERE
REQ_DISA_BG_YEAR= $year
AND s_id ='5'
AND m_id =" . intval($_SESSION["m_id"]) . "";

echo $sql9;
$db->Execute($sql9);
$res9 = $db->getData();



?>



<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ระบบสวัสดิการสงเคราะห์</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="./vendor/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="./vendor/waves/waves.min.css">
    <link rel="stylesheet" href="./vendor/toastr/toastr.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link href="../assets/fontawesome/css/all.css" rel="stylesheet">
    <!--load all styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100;300;400&display=swap" rel="stylesheet">

</head>
<style>
    .dataTables_wrapper {
        background-color: #39D679;
    }

    .dataTables_info {
        display: none;

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
                        <div class="card balance-widget">
                            <div class="card-header border-0 py-0">
                                <h4 class="card-title">สิทธิการสงเคราะห์ด้านสวัสดิการ</h4>
                            </div>
                            <br />
                            <div class="card-body pt-0">
                                <div class="balance-widget">

                                    <ul class="list-unstyled">
                                        <li class="media">

                                            <span style="font-size: 5rem; color: Dodgerblue;">
                                                <i class="fas fa-heartbeat" style="font-size: 3rem;"></i>
                                            </span> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <div class="media-body">
                                                <h5 class="m-0">ค่ารักษาพยาบาล</h5>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span style="float: right;">สิทธิเบิก : </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="float: right;"> <?php echo number_format($res2['health_value_bal_begin'], 2) ?> บาท</span>

                                                    </div>

                                                    <div class="col-md-6">
                                                        <span style="float: right;">สิทธิที่ใช้ไป : </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="float: right;"><?php echo number_format($res2['health_value_bal_use'], 2) ?> บาท</span>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <span style="float: right;">สิทธิคงเหลือ : </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="float: right;"><?php echo number_format($res2['health_value_bal_bal'], 2) ?> บาท</span>
                                                    </div>

                                                    <div class="col-md-4">
                                                    </div>
                                                    <div class="col-md-8">

                                                        <a href='medi_form_add.php' class='btn btn-warning btn-xs' style="color:white; float:right">ยื่นคำร้อง</a>

                                                        <a href='medi_history.php' class='btn btn-warning btn-xs' style="color:white;" style="">ตรวจสอบสถานะ</a>
                                                    </div>
                                                </div>
                                            </div>


                                        </li>
                                        <li class="media">
                                            <span style="font-size: 5rem; color: Dodgerblue;">
                                                <i class="fas fa-hands-helping" style="font-size: 3rem;"></i>
                                            </span> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <div class="media-body">
                                                <h5 class="m-0">เงินช่วยเหลือครั้งคราว</h5>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span style="float: right;">สิทธิเบิก : </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="float: right;"> <?php echo number_format($res3['occ_value_bal_begin'], 2) ?> บาท</span>

                                                    </div>

                                                    <div class="col-md-6">
                                                        <span style="float: right;">สิทธิที่ใช้ไป : </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="float: right;"><?php echo number_format($res3['occ_value_bal_use'], 2) ?> บาท</span>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <span style="float: right;">สิทธิคงเหลือ : </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="float: right;"><?php echo number_format($res3['occ_value_bal_bal'], 2) ?> บาท</span>
                                                    </div>

                                                    <div class="col-md-4">
                                                    </div>
                                                    <div class="col-md-8">

                                                        <a href='occ_form_add.php' class='btn btn-warning btn-xs' style="color:white; float:right">ยื่นคำร้อง</a>

                                                        <a href='occ_history.php' class='btn btn-warning btn-xs' style="color:white;" style="">ตรวจสอบสถานะ</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <?php
                                        $sql = "SELECT a.m_id FROM tbl_member a, veteran b, marital_status c, veteran_family d 
                                        WHERE a.m_id = b.m_id 
                                        AND b.VT_MARITAL_ST_ID = c.MARI_ID 
                                        AND b.VT_ID = d.VT_ID 
                                        AND d.VT_FM_ALIVE = 1
                                        AND a.m_id = " . $_SESSION['m_id'] . "
                                        AND d.VT_FM_RELATION = 'ภรรยา'
                                        AND b.VT_ALIVE <>0
                                    ";

                                        $db->Execute($sql);
                                        $res = $db->getData();

                                        if ($res) {
                                        ?>

                                            <li class="media">
                                                <!-- <i class="fa fa-child mr-3"></i> -->
                                                <span style="font-size: 5rem; color: Dodgerblue;">
                                                    <i class="fas fa-baby" style="font-size: 3rem;"></i>
                                                </span> &nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="media-body">
                                                    <h5 class="m-0">ค่าคลอดบุตร</h5>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <span style="float: right;">สิทธิเบิก : </span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <span style="float: right;"> <?php echo number_format($res4['mat_value_bal_begin'], 2) ?> บาท</span>

                                                        </div>

                                                        <div class="col-md-6">
                                                            <span style="float: right;">สิทธิที่ใช้ไป : </span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <span style="float: right;"><?php echo number_format($res4['mat_value_bal_use'], 2) ?> บาท</span>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <span style="float: right;">สิทธิคงเหลือ : </span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <span style="float: right;"><?php echo number_format($res4['mat_value_bal_bal'], 2) ?> บาท</span>
                                                        </div>

                                                        <div class="col-md-4">
                                                        </div>
                                                        <div class="col-md-8">

                                                            <a href='mat_form_add.php' class='btn btn-warning btn-xs' style="color:white; float:right">ยื่นคำร้อง</a>

                                                            <a href='mat_history.php' class='btn btn-warning btn-xs' style="color:white;" style="">ตรวจสอบสถานะ</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php  } ?>


                                        <li class="media">

                                            <span style="font-size: 5rem; color: Dodgerblue;">
                                                <i class="fas fa-house-damage" style="font-size: 3rem;"></i>
                                            </span> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <div class="media-body">
                                                <h5 class="m-0">ค่าประสบภัยพิบัติ</h5>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span style="float: right;">สิทธิเบิก : </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="float: right;"> มีสิทธิเบิก</span>

                                                    </div>

                                                    <div class="col-md-6">
                                                        <span style="float: right;">สิทธิที่ใช้ไป : </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="float: right;"><?php echo number_format($res9['balusedisa'], 2 )?> บาท</span>

                                                    </div>

                                                    

                                                    <div class="col-md-4">
                                                    </div>
                                                    <div class="col-md-8">

                                                        <a href='disa_form_add.php' class='btn btn-warning btn-xs' style="color:white; float:right">ยื่นคำร้อง</a>

                                                        <a href='disa_history.php' class='btn btn-warning btn-xs' style="color:white;" style="">ตรวจสอบสถานะ</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="media">
                                            <span style="font-size: 5rem; color: Dodgerblue;">
                                                <i class="fas fa-user-graduate" style="font-size: 3rem;"></i>
                                            </span> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <div class="media-body">
                                                <h5 class="m-0">ค่าการศึกษาบุตร</h5>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span style="float: right;">วงเงินสูงสุดที่สามารถเบิก : </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="float: right;"> <?php echo number_format($res5['edu_value_bal_begin'], 2) ?> บาท</span>

                                                    </div>

                                                    <div class="col-md-6">
                                                        <span style="float: right;">วงเงินสูงสุดที่เบิกได้ภายในปีนี้: </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="float: right;"> <?php echo number_format($res6['EDU_YEAR_LIMIT'], 2) ?> บาท</span>

                                                    </div>

                                                    <div class="col-md-6">
                                                        <span style="float: right;">สิทธิที่ใช้ไป : </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="float: right;"><?php echo number_format($res7['edu_value_bal_use'], 2) ?> บาท</span>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <span style="float: right;">สิทธิที่ใช้ไปภายในปีนี้ : </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="float: right;"><?php echo number_format($res8['baluse'], 2) ?> บาท</span>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <span style="float: right;">สิทธิคงเหลือปีนี้ : </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="float: right;"><?php echo number_format($res5['edu_value_bal_bal'], 2) ?> บาท</span>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <span style="float: right;">สิทธิคงเหลือทั้งหมด : </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="float: right;"><?php echo number_format($res7['edu_value_bal_bal'], 2) ?> บาท</span>
                                                    </div>

                                                    <div class="col-md-4">
                                                    </div>
                                                    <div class="col-md-8">

                                                        <a href='edu_form_add.php' class='btn btn-warning btn-xs' style="color:white; float:right">ยื่นคำร้อง</a>

                                                        <a href='edu_history.php' class='btn btn-warning btn-xs' style="color:white;" style="">ตรวจสอบสถานะ</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="media">
                                            <span style="font-size: 5rem; color: Dodgerblue;">
                                                <i class="fas fa-hand-holding-usd" style="font-size: 3rem;"></i>
                                            </span> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <div class="media-body">
                                                <h5 class="m-0">เงินเลี้ยงชีพรายเดือน</h5>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span style="float: right;">สิทธิเบิก : </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="float: right;"> มีสิทธิเบิก</span>

                                                    </div>

                                                    <div class="col-md-6">
                                                        <span style="float: right;">สิทธิที่ใช้ไป : </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="float: right;"><?php echo number_format($res3['occ_value_bal_use'], 2) ?> บาท</span>
                                                    </div>

                                                   

                                                    <div class="col-md-4">
                                                    </div>
                                                    <div class="col-md-8">

                                                        <a href='monthly_form_add.php' class='btn btn-warning btn-xs' style="color:white; float:right">ยื่นคำร้อง</a>

                                                        <a href='monthly_history.php' class='btn btn-warning btn-xs' style="color:white;" style="">ตรวจสอบสถานะ</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
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
        </script>
</body>

</html>