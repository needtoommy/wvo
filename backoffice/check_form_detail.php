<?php

session_start();
if ($_SESSION['PERMISSION'] == 'KORN') {
    include '../connect/db.php';
    $db = new DB();

    $level = $_SESSION['m_level'];



?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>ระบบสวัสดิการสงเคราะห์ทหารผ่านศึก</title>
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <!-- ================== BEGIN BASE CSS STYLE ================== -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <link href="../assets/css/default/app.min.css" rel="stylesheet" />
        <!-- ================== END BASE CSS STYLE ================== -->

        <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
        <link href="../assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
        <link href="../assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet" />
        <link href="../assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
        <link href="../assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
        <link href="../assets/plugins/datatables.net-fixedcolumns-bs4/css/fixedcolumns.bootstrap4.min.css" rel="stylesheet" />
        <!-- ================== END PAGE LEVEL STYLE ================== -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100;300;400&display=swap" rel="stylesheet">
    </head>
    <style>
        body {
            font-family: 'Prompt', sans-serif !important;
        }
    </style>

    <body>
        <!-- begin #page-loader -->
        <div id="page-loader" class="fade show">
            <span class="spinner"></span>
        </div>
        <!-- end #page-loader -->

        <!-- begin #page-container -->
        <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
            <!-- begin #header -->
            <div id="header" class="header navbar-default">
                <!-- begin navbar-header -->
                <div class="navbar-header">
                    <a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> <b>ระบบสวัสดิการสงเคราะห์ทหารผ่านศึก</b> </a>
                    <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- end navbar-header -->
                <!-- begin header-nav -->
                <ul class="navbar-nav navbar-right">

                    <li class="dropdown navbar-user">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php
                            $sql = "SELECT * FROM tbl_member WHERE m_id = " . $_SESSION['m_id'] . " AND m_alive <> 0";
                            $db->Execute($sql);
                            $res = $db->getData();
                            echo $res['m_name'];
                            ?>
                            <img src="m_img/<?php echo $res['m_img'] ?>" alt="" />
                            <span class="d-none d-md-inline"></span> <b class="caret"></b>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="javascript:;" class="dropdown-item">Edit Profile</a>
                            <div class="dropdown-divider"></div>
                            <a href="check_logout.php" class="dropdown-item">Log Out</a>
                        </div>
                    </li>
                </ul>
                <!-- end header-nav -->
            </div>
            <!-- end #header -->

            <!-- begin #sidebar -->
            <div id="sidebar" class="sidebar">
                <!-- begin sidebar scrollbar -->
                <div data-scrollbar="true" data-height="100%">
                    <!-- begin sidebar user -->
                    <ul class="nav">
                        <li class="nav-profile">
                            <a href="javascript:;" data-toggle="nav-profile">
                                <div class="cover with-shadow"></div>
                                <div class="image">
                                    <img src="m_img/<?php echo $res['m_img'] ?>" alt="" />
                                </div>
                                <div class="info">
                                    <b class="caret pull-right"></b><?php
                                                                    $sql = "SELECT * FROM tbl_member WHERE m_id = " . $_SESSION['m_id'] . " AND m_alive <> 0";
                                                                    $db->Execute($sql);
                                                                    $res = $db->getData();
                                                                    echo $res['m_name'];
                                                                    // print_r($res);
                                                                    ?>

                                </div>
                            </a>
                        </li>

                    </ul>
                    <!-- end sidebar user -->
                    <!-- begin sidebar nav -->
                    <ul class="nav">
                        <li class="nav-header"></li>


                        <!-- --------------****Start******-------------------- -->
                        <?php
                        if ($level == "admin") {
                        ?>
                            <li class="has-sub active">
                                <a href="#">
                                    <i class="fa fa-edit"></i>
                                    <span> จัดการบัญชีผู้ใช้</span>
                                </a>
                                <ul class="sub-menu">
                                    <li <?php echo $_GET['tab'] == 1 ? 'class="active"' : '' ?>><a href="admin_tab1.php?tab=1">จัดการบัญชีผู้ใช้(พนักงาน)</a></li>
                                    <li <?php echo $_GET['tab'] == 2 ? 'class="active"' : '' ?>><a href="admin_tab2.php?tab=2">จัดการบัญชีผู้ใช้ (ทหารผ่านศึก)</a></li>

                                </ul>
                            </li>
                            <li class="has-sub <?php echo $_GET['type'] == "manage_assist" ? 'active' : '' ?>">
                                <a href="manage_assist.php?type=manage_assist">
                                    <i class="fa fa-edit"></i>
                                    <span>จัดการวงเงินสงเคราะห์</span>
                                </a>
                            </li>


                            <li class="has-sub ">
                                <a href="#">
                                    <i class="fa fa-edit"></i>
                                    <span> จัดการค่าเริ่มต้น</span>
                                </a>
                                <ul class="sub-menu">
                                    <li <?php echo $_GET['tab'] == 1 ? 'class="active"' : '' ?>><a href="manage_status.php?type=status">จัดการสถานะรายการ</a></li>
                                    <li <?php echo $_GET['tab'] == 2 ? 'class="active"' : '' ?>><a href="position.php">จัดการตำแหน่ง</a></li>

                                </ul>
                            </li>

                        <?php
                        }
                        if ($level == 'vsofficer') {
                        ?>
                            <li class="has-sub active">
                                <a href="calendar.html">
                                    <i class="fa fa-edit"></i>
                                    <span> พิจารณาคำร้อง</span>
                                </a>
                                <ul class="sub-menu">
                                    <li <?php echo $_GET['type'] == 1 ? 'class="active"' : '' ?>><a href="index.php?type=1&level=<?php echo $level ?>">ค่ารักษาพยาบาล</a></li>
                                    <li <?php echo $_GET['type'] == 2 ? 'class="active"' : '' ?>><a href="index.php?type=2&level=<?php echo $level ?>">เงินช่วยเหลือครั้งคราว</a></li>
                                    <li <?php echo $_GET['type'] == 3 ? 'class="active"' : '' ?>><a href="index.php?type=3&level=<?php echo $level ?>">ค่าประสบภัยพิบัติ</a></li>
                                    <li <?php echo $_GET['type'] == 4 ? 'class="active"' : '' ?>><a href="index.php?type=4&level=<?php echo $level ?>">ค่าคลอดบุตร</a></li>
                                    <li <?php echo $_GET['type'] == 5 ? 'class="active"' : '' ?>><a href="index.php?type=5&level=<?php echo $level ?>">ค่าการศึกษาบุตร</a></li>
                                    <li <?php echo $_GET['type'] == 6 ? 'class="active"' : '' ?>><a href="index.php?type=6&level=<?php echo $level ?>">เงินช่วยเหลือรายเดือน</a></li>
                                </ul>
                            </li>

                        <?php } ?>


                        <!-- --------------****Start******-------------------- -->
                        <?php
                        if ($level == 'vsmanager') {
                        ?>
                            <li class="has-sub active">
                                <a href="calendar.html">
                                    <i class="fa fa-edit"></i>
                                    <span>รายงาน</span>
                                </a>
                                <ul class="sub-menu">
                                    <li <?php echo $_GET['type'] == 1 ? 'class="active"' : '' ?>><a href="report.php?type=1&level=<?php echo $level ?>">รายงานค่ารักษาพยาบาล</a></li>
                                    <li <?php echo $_GET['type'] == 2 ? 'class="active"' : '' ?>><a href="report.php?type=2&level=<?php echo $level ?>">รายงานเงินช่วยเหลือครั้งคราว</a></li>
                                    <li <?php echo $_GET['type'] == 3 ? 'class="active"' : '' ?>><a href="report.php?type=3&level=<?php echo $level ?>">รายงานค่าประสบภัยพิบัติ</a></li>
                                    <li <?php echo $_GET['type'] == 4 ? 'class="active"' : '' ?>><a href="report.php?type=4&level=<?php echo $level ?>">รายงานค่าคลอดบุตร</a></li>
                                    <li <?php echo $_GET['type'] == 5 ? 'class="active"' : '' ?>><a href="report.php?type=5&level=<?php echo $level ?>">รายงานค่าการศึกษาบุตร</a></li>
                                    <li <?php echo $_GET['type'] == 6 ? 'class="active"' : '' ?>><a href="report.php?type=6&level=<?php echo $level ?>">รายงานเงินช่วยเหลือรายเดือน</a></li>
                                </ul>
                            </li>

                        <?php } ?>



                        <!-- --------------****finmanager******-------------------- -->
                        <?php
                        if ($level == 'finmanager') {
                        ?>
                            <li class="has-sub active">
                                <a href="calendar.html">
                                    <i class="fa fa-edit"></i>
                                    <span>รายงาน</span>
                                </a>
                                <ul class="sub-menu">
                                    <li <?php echo $_GET['type'] == 1 ? 'class="active"' : '' ?>><a href="report_finmanager.php?type=1&level=<?php echo $level ?>">รายงานค่ารักษาพยาบาล</a></li>
                                    <li <?php echo $_GET['type'] == 2 ? 'class="active"' : '' ?>><a href="report_finmanager.php?type=2&level=<?php echo $level ?>">รายงานเงินช่วยเหลือครั้งคราว</a></li>
                                    <li <?php echo $_GET['type'] == 3 ? 'class="active"' : '' ?>><a href="report_finmanager.php?type=3&level=<?php echo $level ?>">รายงานค่าประสบภัยพิบัติ</a></li>
                                    <li <?php echo $_GET['type'] == 4 ? 'class="active"' : '' ?>><a href="report_finmanager.php?type=4&level=<?php echo $level ?>">รายงานค่าคลอดบุตร</a></li>
                                    <li <?php echo $_GET['type'] == 5 ? 'class="active"' : '' ?>><a href="report_finmanager.php?type=5&level=<?php echo $level ?>">รายงานค่าการศึกษาบุตร</a></li>
                                    <li <?php echo $_GET['type'] == 6 ? 'class="active"' : '' ?>><a href="report_finmanager.php?type=6&level=<?php echo $level ?>">รายงานเงินช่วยเหลือรายเดือน</a></li>
                                </ul>
                            </li>

                        <?php } ?>



                        <!-- --------------****Start******-------------------- -->
                        <?php
                        if ($level == 'finoffice') {
                        ?>
                            <li class="has-sub active">
                                <a href="calendar.html">
                                    <i class="fa fa-edit"></i>
                                    <span> อนุมัติเบิกจ่าย</span>
                                </a>
                                <ul class="sub-menu">
                                    <li <?php echo $_GET['type'] == 1 ? 'class="active"' : '' ?>><a href="index.php?type=1&level=<?php echo $level ?>">ค่ารักษาพยาบาล</a></li>
                                    <li <?php echo $_GET['type'] == 2 ? 'class="active"' : '' ?>><a href="index.php?type=2&level=<?php echo $level ?>">เงินช่วยเหลือครั้งคราว</a></li>
                                    <li <?php echo $_GET['type'] == 3 ? 'class="active"' : '' ?>><a href="index.php?type=3&level=<?php echo $level ?>">ค่าประสบภัยพิบัติ</a></li>
                                    <li <?php echo $_GET['type'] == 4 ? 'class="active"' : '' ?>><a href="index.php?type=4&level=<?php echo $level ?>">ค่าคลอดบุตร</a></li>
                                    <li <?php echo $_GET['type'] == 5 ? 'class="active"' : '' ?>><a href="index.php?type=5&level=<?php echo $level ?>">ค่าการศึกษาบุตร</a></li>
                                    <li <?php echo $_GET['type'] == 6 ? 'class="active"' : '' ?>><a href="index.php?type=6&level=<?php echo $level ?>">เงินช่วยเหลือรายเดือน</a></li>
                                </ul>
                            </li>

                        <?php } ?>


                        <!-- -----------------**********************************--------------------- -->
                        <?php if ($level == 'finoffice') {
                        ?>
                            <li <?php echo $_GET['type'] == 7 ? 'class="active"' : '' ?>>
                                <a href="vs_pay.php?type=7">
                                    <i class="fa fa-edit"></i>
                                    <span>จ่ายเงินสงเคราะห์</span>
                                </a>
                            </li>
                        <?php } ?>


                        <!-- -----------------**********************************--------------------- -->
                        <?php if ($level == 'finoffice') {
                        ?>
                            <li <?php echo $_GET['type'] == 8 ? 'class="active"' : '' ?>>
                                <a href="vs_pay_m.php?type=8">
                                    <i class="fa fa-edit"></i>
                                    <span>จ่ายเงินรายเดือน</span>
                                </a>
                            </li>
                        <?php } ?>


                        <!-- -----------------**********************************--------------------- -->
                        <?php if ($level == 'vsofficer' || $level == 'vsmanager') {
                        ?>
                            <li <?php echo $_GET['type'] == 9 ? 'class="active"' : '' ?>>
                                <a href="death_list.php?type=9">
                                    <i class="fa fa-edit"></i>
                                    <span>บันทึกการสงเคราะห์กรณีถึงแก่ความตาย</span>
                                </a>
                            </li>
                        <?php } ?>



                        <!-- -----------------**********************************--------------------- -->
                        <?php if ($level == '') {
                        ?>
                            <li <?php echo $_GET['type'] == 7 ? 'class="active"' : '' ?>>
                                <a href="calendar.html">
                                    <i class="fa fa-edit"></i>
                                    <span>ตรวจสอบใบคำร้องเงินครั้งคราว</span>
                                </a>
                            </li>
                        <?php } ?>


                        <!-- -----------------**********************************--------------------- -->
                        <?php if ($level == '') {
                        ?>
                            <li <?php echo $_GET['type'] == 8 ? 'class="active"' : '' ?>>
                                <a href="calendar.html">
                                    <i class="fa fa-edit"></i>
                                    <span>จัดการสมาชิก</span>
                                </a>
                            </li>
                        <?php } ?>


                        <!-- -----------------**********************************--------------------- -->
                        <?php if ($level == '') { ?>
                            <li <?php echo $_GET['type'] == 9 ? 'class="active"' : '' ?>>
                                <a href="calendar.html">
                                    <i class="fa fa-edit"></i>
                                    <span>จัดการตำแหน่ง</span>
                                </a>
                            </li>
                        <?php } ?>


                        <!-- -----------------**********************************--------------------- -->
                        <?php if ($level == '') { ?>
                            <li <?php echo $_GET['type'] == 10 ? 'class="active"' : '' ?>>
                                <a href="calendar.html">
                                    <i class="fa fa-edit"></i>
                                    <span>จัดการสถานะ</span>
                                </a>
                            </li>
                        <?php } ?>


                        <!-- -----------------**********************************--------------------- -->
                        <?php if ($level == 'vsofficer' || $level == 'vsmanager') { ?>
                            <li <?php echo $_GET['type'] == 11 ? 'class="active"' : '' ?>>
                                <a href="vtp_add_form.php?type=11&level=<?php echo $level ?>">
                                    <i class="fa fa-edit"></i>
                                    <span>จัดการประวัติทหารผ่านศึก</span>
                                </a>
                            </li>
                        <?php } ?>
                        <!-- -----------------*************END*************--------------------- -->


                        <!-- -----------------**********************************--------------------- -->
                        <?php if ($level == '') { ?>
                            <li <?php echo $_GET['type'] == 12 ? 'class="active"' : '' ?>>
                                <a href="calendar.html">
                                    <i class="fa fa-edit"></i>
                                    <span>จัดการแผนก</span>
                                </a>
                            </li>
                        <?php } ?>




                        <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
                        <!-- end sidebar minify button -->
                    </ul>
                    <!-- end sidebar nav -->
                </div>
                <!-- end sidebar scrollbar -->
            </div>
            <div class="sidebar-bg"></div>
            <!-- end #sidebar -->

            <!-- begin #content -->
            <div id="content" class="content">
                <!-- begin breadcrumb -->
                <ol class="breadcrumb float-xl-right">
                    <!-- <li class="breadcrumb-item"><a href="javascript:;">หน้าหลัก</a></li> -->
                    <!-- <li class="breadcrumb-item active">ค่ารักษาพยาบาล</li> -->
                </ol>
                <!-- end breadcrumb -->
                <!-- begin page-header -->
                <!-- <h1 class="page-header">ค่ารักษาพยาบาล <small></small></h1> -->
                <!-- end page-header -->


                <!-- begin row -->
                <div class="row">
                    <!-- begin col-3 -->
                    <div style="width:20%; padding:10px;">
                        <?php


                        if ($_GET['type'] == 1) {
                            $sql = "SELECT count(*) as count from req_health where s_id =1";
                        } else if ($_GET['type'] == 2) {
                            $sql = "SELECT count(*) as count from req_occ where s_id =1";
                        } else if ($_GET['type'] == 3) {
                            $sql = "SELECT count(*) as count from req_disa where s_id =1";
                        } else if ($_GET['type'] == 4) {
                            $sql = "SELECT count(*) as count from req_maternity where s_id =1";
                        } else if ($_GET['type'] == 5) {
                            $sql = "SELECT count(*) as count from req_edu where s_id =1";
                        } else if ($_GET['type'] == 6) {
                            $sql = "SELECT count(*) as count from req_monthly where s_id =1";
                        }
                        $db->Execute($sql);
                        $res = $db->getData();
                        ?>
                        <div class="widget widget-stats bg-blue">
                            <div class="stats-icon"><i class="fa fa-pause"></i></div>
                            <div class="stats-info">
                                <h3>รออนุมัติ</h3>
                                <p><?php echo $res['count']; ?></p>
                            </div>
                            <div class="stats-link">
                                <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- end col-3 -->
                    <!-- begin col-3 -->
                    <div style="width:20%; padding:10px;">

                        <?php


                        if ($_GET['type'] == 1) {
                            $sql = "SELECT count(*) count from req_health where s_id =3";
                        } else if ($_GET['type'] == 2) {
                            $sql = "SELECT count(*) count from req_occ where s_id =3";
                        } else if ($_GET['type'] == 3) {
                            $sql = "SELECT count(*) count from req_disa where s_id =3";
                        } else if ($_GET['type'] == 4) {
                            $sql = "SELECT count(*) count from req_maternity where s_id =3";
                        } else if ($_GET['type'] == 5) {
                            $sql = "SELECT count(*) count from req_edu where s_id =3";
                        } else if ($_GET['type'] == 6) {
                            $sql = "SELECT count(*) count from req_monthly where s_id =3";
                        }
                        $db->Execute($sql);
                        $res = $db->getData();
                        ?>

                        <div class="widget widget-stats bg-info">
                            <div class="stats-icon"><i class="fa fa-check"></i></div>
                            <div class="stats-info">
                                <h3>อนุมัติ</h3>
                                <p><?php echo $res['count'] ?></p>
                            </div>
                            <div class="stats-link">
                                <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- end col-3 -->
                    <!-- begin col-3 -->
                    <div style="width:20%; padding:10px;">
                        <?php


                        if ($_GET['type'] == 1) {
                            $sql = "SELECT count(*) count from req_health where s_id =5";
                        } else if ($_GET['type'] == 2) {
                            $sql = "SELECT count(*) count from req_occ where s_id =5";
                        } else if ($_GET['type'] == 3) {
                            $sql = "SELECT count(*) count from req_disa where s_id =5";
                        } else if ($_GET['type'] == 4) {
                            $sql = "SELECT count(*) count from req_maternity where s_id =5";
                        } else if ($_GET['type'] == 5) {
                            $sql = "SELECT count(*) count from req_edu where s_id =5";
                        } else if ($_GET['type'] == 6) {
                            $sql = "SELECT count(*) count from req_monthly where s_id =5";
                        }
                        $db->Execute($sql);
                        $res = $db->getData();
                        ?>




                        <div class="widget widget-stats bg-orange">
                            <div class="stats-icon"><i class="fa fa-check"></i></div>
                            <div class="stats-info">
                                <h3>อนุมัติเบิกจ่าย</h3>
                                <p><?php echo $res['count'] ?></p>
                            </div>
                            <div class="stats-link">
                                <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- end col-3 -->

                    <!-- begin col-3 -->
                    <div style="width:20%; padding:10px;">
                        <?php


                        if ($_GET['type'] == 1) {
                            $sql = "SELECT count(*) count from req_health where s_id =8";
                        } else if ($_GET['type'] == 2) {
                            $sql = "SELECT count(*) count from req_occ where s_id =8";
                        } else if ($_GET['type'] == 3) {
                            $sql = "SELECT count(*) count from req_disa where s_id =8";
                        } else if ($_GET['type'] == 4) {
                            $sql = "SELECT count(*) count from req_maternity where s_id =8";
                        } else if ($_GET['type'] == 5) {
                            $sql = "SELECT count(*) count from req_edu where s_id =8";
                        } else if ($_GET['type'] == 6) {
                            $sql = "SELECT count(*) count from req_monthly where s_id =8";
                        }
                        $db->Execute($sql);
                        $res = $db->getData();
                        ?>




                        <div class="widget widget-stats bg-success">
                            <div class="stats-icon"><i class="fa fa-check"></i></div>
                            <div class="stats-info">
                                <h3>จ่ายแล้ว</h3>
                                <p><?php echo $res['count'] ?></p>
                            </div>
                            <div class="stats-link">
                                <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- end col-3 -->



                    <!-- begin col-3 -->
                    <div style="width:20%; padding:10px;">
                        <?php


                        if ($_GET['type'] == 1) {
                            $sql = "SELECT count(*) count from req_health where s_id =7";
                        } else if ($_GET['type'] == 2) {
                            $sql = "SELECT count(*) count from req_occ where s_id =7";
                        } else if ($_GET['type'] == 3) {
                            $sql = "SELECT count(*) count from req_disa where s_id =7";
                        } else if ($_GET['type'] == 4) {
                            $sql = "SELECT count(*) count from req_maternity where s_id =7";
                        } else if ($_GET['type'] == 5) {
                            $sql = "SELECT count(*) count from req_edu where s_id =7";
                        } else if ($_GET['type'] == 6) {
                            $sql = "SELECT count(*) count from req_monthly where s_id =7";
                        }
                        $db->Execute($sql);
                        $res = $db->getData();
                        ?>


                        <div class="widget widget-stats bg-red">
                            <div class="stats-icon"><i class="fa fa-times"></i></div>
                            <div class="stats-info">
                                <h3>ยกเลิก</h3>
                                <p><?php echo $res['count'] ?></p>
                            </div>
                            <div class="stats-link">
                                <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- end col-3 -->
                </div>
                <!-- end row -->
                <!-- begin row -->
                <div class="row">
                    <!-- begin col-6 -->
                    <div class="col-xl-12">
                        <!-- begin panel -->
                        <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                            <!-- begin panel-heading -->
                            <div class="panel-heading">
                                <h4 class="panel-title"> </h4>
                                <div class="panel-heading-btn">
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                            <!-- end panel-heading -->
                            <?php

                            if (isset($_GET['REQ_HEL_ID'])) {

                                $sql_check = "SELECT * FROM req_health  WHERE REQ_HEL_ID=" . $_GET['REQ_HEL_ID'] . "";
                                $db->Execute($sql_check);
                                $res_check = $db->getData();
                                if ($res_check['VT_FM_ID'] != "") {
                                    $sql = "SELECT * FROM req_health as rh 
                                    INNER JOIN tbl_member as m ON m.m_id = rh.m_id 
                                    INNER JOIN tbl_status as st ON st.s_id = rh.s_id 
                                    INNER JOIN health_value_bal as hvb ON rh.m_id = hvb.m_id
                                    INNER JOIN veteran as vt ON rh.m_id = vt.m_id
                                    INNER JOIN veteran_family ON rh.VT_FM_ID =veteran_family.VT_FM_ID
                                    WHERE rh.REQ_HEL_ID=" . $_GET['REQ_HEL_ID'] . " AND m.m_alive <> 0
                                    ORDER BY rh.m_id DESC
                                    ";
                                } else {
                                    $sql = "SELECT * FROM req_health as rh 
                                    INNER JOIN tbl_member as m ON m.m_id = rh.m_id 
                                    INNER JOIN tbl_status as st ON st.s_id = rh.s_id 
                                    INNER JOIN health_value_bal as hvb ON rh.m_id = hvb.m_id
                                    INNER JOIN veteran as vt ON rh.m_id = vt.m_id
                                    WHERE rh.REQ_HEL_ID=" . $_GET['REQ_HEL_ID'] . " AND m.m_alive <> 0
                                    ORDER BY rh.m_id DESC
                            ";
                                }
                            }

                            if (isset($_GET['REQ_OCC_ID'])) {
                                $sql = "SELECT * FROM req_occ as oc 
                            INNER JOIN tbl_member as m ON m.m_id = oc.m_id 
                            INNER JOIN tbl_status as st ON st.s_id = oc.s_id 
                            INNER JOIN occ_value_bal as ovb ON m.m_id = ovb.m_id
                            INNER JOIN veteran as vt ON m.m_id = vt.m_id
                            WHERE oc.REQ_OCC_ID=" . $_GET['REQ_OCC_ID'] . " AND m.m_alive <> 0
                             ORDER BY oc.REQ_OCC_ID DESC";
                            }
                            // echo $sql;

                            if (isset($_GET['REQ_DISA_ID'])) {
                                $sql = "SELECT * FROM req_disa as rdisa
                            INNER JOIN tbl_member as m ON m.m_id = rdisa.vm_id 
                            INNER JOIN tbl_status as st ON st.s_id = rdisa.s_id
                            INNER JOIN veteran as vt ON m.m_id = vt.m_id 
                            INNER JOIN disaster_type ON rdisa.REQ_DST_ID = disaster_type.DST_ID
                            WHERE rdisa.REQ_DISA_ID=" . $_GET['REQ_DISA_ID'] . " AND m.m_alive <> 0";
                            }


                            //4
                            if (isset($_GET['REQ_MAT_ID'])) {
                                $sql = "SELECT * FROM req_maternity as rmat
                            INNER JOIN tbl_member as m ON m.m_id = rmat.m_id 
                            INNER JOIN tbl_status as st ON st.s_id = rmat.s_id 
                            INNER JOIN veteran ON veteran.m_id= m.m_id
                            INNER JOIN veteran as vt ON m.m_id = vt.m_id
                            INNER JOIN veteran_family ON veteran.VT_ID = veteran_family.VT_ID
                            WHERE rmat.REQ_MAT_ID = " . $_GET['REQ_MAT_ID'] . "
                            AND veteran_family.VT_FM_RELATION ='ภรรยา' and veteran.VT_ALIVE <>0
                            ";
                            }



                            //5
                            if (isset($_GET['REQ_EDU_ID'])) {
                                $sql = "SELECT * FROM req_edu as red
                            INNER JOIN tbl_member as m ON m.m_id = red.m_id 
                              INNER JOIN tbl_status as st ON st.s_id = red.s_id 
                              INNER JOIN veteran ON veteran.m_id= m.m_id
                              INNER JOIN veteran as vt ON m.m_id = vt.m_id
                              INNER JOIN veteran_family ON veteran.VT_ID = veteran_family.VT_ID
                              INNER JOIN education_level ON education_level.ELV_ID = red.ELV_ID
                              WHERE red.REQ_EDU_ID = " . $_GET['REQ_EDU_ID'] . "
                              AND veteran_family.VT_FM_RELATION ='บุตร' and veteran.VT_ALIVE <>0";
                            }



                            //6
                            if (isset($_GET['REQ_MOTHLY_ID'])) {
                                $sql = "SELECT * FROM req_monthly as rmonth
                            INNER JOIN tbl_member as m ON m.m_id = rmonth.m_id 
                            INNER JOIN tbl_status as st ON st.s_id = rmonth.s_id 
                            INNER JOIN veteran as vt ON m.m_id = vt.m_id
                            INNER JOIN veteran ON veteran.m_id= m.m_id
                            WHERE rmonth.REQ_MOTHLY_ID =" . $_GET['REQ_MOTHLY_ID'] . " and veteran.VT_ALIVE <>0";
                            }




                            $db->Execute($sql);
                            $res = $db->getData();

                            $REQ_HEL_ID = $res['REQ_HEL_ID'];
                            //echo $sql;
                            // print_r($res);

                            ?>

                            <button id="loadding" class="btn btn-primary" type="button" style="display: none;" disabled>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Loading...
                            </button>

                            <?php if (isset($_GET['REQ_HEL_ID'])) { ?>
                                <!-- begin panel-body -->
                                <div class="panel-body">
                                    <div class="alert alert-muted">
                                        ยืนคำร้องขอเบิกค่ารักษาพยาบาล โดย
                                        <br>
                                        ชั้นบัตร <?php echo $res['VT_CARD_STEP'] ?> เลขที่บัตร <?php echo $res['VT_CARD_NO'] ?>
                                        <br>
                                        ชื่อ - นามสกุล <?php echo $res['VT_TITLE'] . $res['VT_FNAME'] . $res['VT_LNAME'] ?>
                                        <hr>
                                        สิทธิเบิก :
                                        <?php echo number_format($res['health_value_bal_begin'], 2) ?> บาท
                                        <br>
                                        สิทธิที่ใช้ไป :
                                        <?php echo number_format($res['health_value_bal_use'], 2) ?> บาท
                                        <br>
                                        สิทธิคงเหลือ :
                                        <?php echo number_format($res['health_value_bal_bal'], 2) ?> บาท
                                    </div>
                                    <form>
                                        <div class="form-group row m-b-15">
                                            <label class="col-form-label col-md-3">วันที่ยื่นคำร้อง</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control m-b-5" value="<?php echo date('d/m/Y', strtotime('+543 year')) ?>" readonly />
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-15">
                                            <label class="col-form-label col-md-3">สถานะ</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control m-b-5" value="<?php echo $res['s_name'] ?>" readonly />
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-15">
                                            <label class="col-form-label col-md-3">เบิกให้</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control m-b-5" value="<?php echo $res['VT_FM_TITLE'] == "" ? 'ตนเอง' : $res['VT_FM_TITLE'] . $res['VT_FM_NAME'] . ' ' . $res['VT_FM_LNAME'] ?>" readonly />
                                            </div>
                                        </div>

                                        <div class="form-group row m-b-15">
                                            <label class="col-form-label col-md-3">จำนวนเงินขอเบิก</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control m-b-5" value="<?php echo number_format($res['REQ_HEL_VALUE'], 2) ?>" readonly />
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-15">
                                            <label class="col-form-label col-md-3">รายละเอียด</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control m-b-5" value="<?php echo $res['REQ_HEL_DETAIL'] ?>" readonly />
                                            </div>
                                        </div>
                                        <?php
                                        $sql = "SELECT file_name, is_image FROM multi_file where req_id= " . $_GET['REQ_HEL_ID'] . " AND vs_id=1";
                                        //echo $sql;

                                        $db->Execute($sql);
                                        $i = 1;
                                        while ($row = $db->getData()) {

                                            // 0 = image, 1 not image
                                            if ($row['is_image'] == 0) {
                                        ?>
                                                <div class="form-group row m-b-15">
                                                    <label class="col-form-label col-md-3">
                                                        ดูใบเสร็จ <?php echo $i ?>
                                                    </label>
                                                    <div class="col-md-12" style="text-align:center">
                                                        <img src="../c_img/<?php echo $row['file_name']; ?>" alt="<?php echo $row['file_name']; ?>" width="500" height="500">
                                                    </div>
                                                </div>

                                </div>
                            <?php
                                            } else {
                            ?>

                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">
                                        ดูใบเสร็จ <?php echo $i ?>:
                                    </label>
                                    <div class="col-md-12">
                                        <a href="../c_img/<?php echo $row['file_name']; ?>" download>
                                            โหลดเอกสาร <?php echo $i ?>
                                        </a>

                                    </div>
                                </div>
                        <?php }
                                            $i++;
                                        } ?>
                        <?php
                                if ($_SESSION['level'] == "finoffice") {
                        ?>
                            <div class="col-md-12 mt-3 mb-3" style="text-align: center;">
                                <button style="display: inline-block;" type="button" class="btn btn-primary" onclick="send_con(5, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_HEL_ID'] ?>,'<?php echo ($res['REQ_HEL_VALUE']) ?>', <?php echo $res['m_id'] ?>)">อนุมติใบคำร้อง</button>
                                <button style="display: inline-block;" type="button" class="btn btn-danger" onclick="send_can(7, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_HEL_ID'] ?>,  <?php echo $res['m_id'] ?>)">ยกเลิกใบคำร้อง</button>
                            </div>
                        <?php
                                } else {
                        ?>
                            <div class="col-md-12 mt-3 mb-3" style="text-align: center;">
                                <button style="display: inline-block;" type="button" class="btn btn-primary  mt-3 mb-3" onclick="send_con(3, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_HEL_ID'] ?>,'<?php echo ($res['REQ_HEL_VALUE']) ?>', <?php echo $res['m_id'] ?>)">อนุมติใบคำร้อง</button>
                                <button style="display: inline-block;" type="button" class="btn btn-danger" onclick="send_can(7, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_HEL_ID'] ?>,  <?php echo $res['m_id'] ?>)">ยกเลิกใบคำร้อง</button>
                            </div>
                        <?php } ?>

                        </form>
                        </div>
                        <!-- end panel-body -->
                    <?php } ?>


                    <?php if (isset($_GET['REQ_OCC_ID'])) { ?>
                        <!-- begin panel-body -->
                        <div class="panel-body">
                            <div class="alert alert-muted">
                                ยืนคำร้องขอเบิกเงินช่วยเหลือครั้งคราว โดย
                                <br>
                                ชั้นบัตร <?php echo $res['VT_CARD_STEP'] ?> เลขที่บัตร <?php echo $res['VT_CARD_NO'] ?>
                                <br>
                                ชื่อ - นามสกุล <?php echo $res['VT_TITLE'] . $res['VT_FNAME'] . $res['VT_LNAME'] ?>
                                <hr>
                                สิทธิเบิก :
                                <?php echo number_format($res['occ_value_bal_begin'], 2) ?> บาท
                                <br>
                                สิทธิที่ใช้ไป :
                                <?php echo number_format($res['occ_value_bal_use'], 2) ?> บาท
                                <br>
                                สิทธิคงเหลือ :
                                <?php echo number_format($res['occ_value_bal_bal'], 2) ?> บาท
                            </div>

                            <form enctype="multipart/form-data">
                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">วันที่ยื่นคำร้อง</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control m-b-5" value="<?php echo $res['REQ_OCC_DATE'] ?>" readonly />
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">สถานะ</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control m-b-5" value="<?php echo $res['s_name'] ?>" readonly />
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">จำนวนเงินขอเบิก</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control m-b-5" value="<?php echo $res['REQ_OCC_VALUE'] ?>" readonly />
                                    </div>
                                </div>


                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">เหตุผลขอรับการสงเคราะห์</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control m-b-5" value="<?php echo $res['REQ_OCC_REASON'] ?>" readonly />
                                    </div>
                                </div>



                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">หมายเหตุ</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control m-b-5" value="<?php echo $res['REQ_OCC_REMARK'] ?>" readonly />
                                    </div>
                                </div>

                                <?php
                                $sql = "SELECT file_name, is_image FROM multi_file where m_id = " . $_SESSION['m_id'] . " and req_id= " . $_GET['REQ_HEL_ID'] . "";
                                // echo $sql;

                                $db->Execute($sql);
                                $i = 1;
                                while ($row = $db->getData()) {

                                    // 0 = image, 1 not image
                                    if ($row['is_image'] == 0) {
                                ?>
                                        <div class="form-group">
                                            <div class="col-sm-2 control-label">
                                                ดูใบเสร็จ <?php echo $i ?>:
                                            </div>
                                            <div class="col-sm-3">
                                                <img src="../c_img/<?php echo $row['file_name']; ?>" alt="<?php echo $row['file_name']; ?>" width="500" height="500">
                                            </div>
                                        </div>
                                    <?php
                                    } else {
                                    ?>

                                        <div class="form-group">
                                            <div class="col-sm-2 control-label">
                                                ดูใบเสร็จ <?php echo $i ?>:
                                            </div>
                                            <div class="col-sm-3">
                                                <a href="../c_img/<?php echo $row['file_name']; ?>" download>
                                                    โหลดเอกสาร <?php echo $i ?>
                                                </a>

                                            </div>
                                        </div>
                                    <?php }
                                    $i++;
                                }
                                if ($_SESSION['level'] == "finoffice") {
                                    ?>
                                    <div class="col-md-12 mt-3 mb-3" style="text-align: center;">
                                        <button type="button" class="btn btn-primary" onclick="send_con(5, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_OCC_ID'] ?>,'<?php echo ($res['REQ_OCC_VALUE']) ?>', <?php echo $res['m_id'] ?>)">อนุมติใบคำร้อง</button>
                                        <button type="button" class="btn btn-danger" onclick="send_can(7, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_OCC_ID'] ?>,  <?php echo $res['m_id'] ?>)">ยกเลิกใบคำร้อง</button>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="col-md-12 mt-3 mb-3" style="text-align: center;">
                                        <button type="button" class="btn btn-primary" onclick="send_con(3, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_OCC_ID'] ?>,'<?php echo ($res['REQ_OCC_VALUE']) ?>', <?php echo $res['m_id'] ?>)">อนุมติใบคำร้อง</button>
                                        <button type="button" class="btn btn-danger" onclick="send_can(7, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_OCC_ID'] ?>,  <?php echo $res['m_id'] ?>)">ยกเลิกใบคำร้อง</button>
                                    </div>
                                <?php } ?>
                            </form>
                        </div>
                        <!-- end panel-body -->
                    <?php } ?>




                    <?php if (isset($_GET['REQ_DISA_ID'])) {  ?>
                        <!-- begin panel-body -->
                        <div class="panel-body">
                            <div class="alert alert-muted">
                                ยืนคำร้องขอเบิกค่าประสบภัยพิบัติ โดย
                                <br>
                                ชั้นบัตร <?php echo $res['VT_CARD_STEP'] ?> เลขที่บัตร <?php echo $res['VT_CARD_NO'] ?>
                                <br>
                                ชื่อ - นามสกุล <?php echo $res['VT_TITLE'] . $res['VT_FNAME'] . ' ' . $res['VT_LNAME'] ?>


                            </div>
                            <form id="form_disa">
                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">วันที่ยื่นคำร้อง</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control m-b-5" value="<?php echo $res['REQ_DISA_DATE'] ?>" readonly />
                                    </div>
                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">สถานะ</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control m-b-5" value="<?php echo $res['s_name'] ?>" readonly />
                                    </div>
                                </div>



                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">วันที่ประสบภัยพิบัติ </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control m-b-5" value="<?php echo $res['REQ_DISA_DATE_FROM'] ?>" readonly />
                                    </div>

                                </div>
                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">วันที่สิ้นสุด</label>

                                    <div class="col-md-9">
                                        <input type="text" class="form-control m-b-5" value="<?php echo $res['REQ_DISA_DATE_TO'] ?>" readonly />
                                    </div>

                                </div>



                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">ประเภทความเสียหาย</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control m-b-5" value="<?php echo $res['REQ_DMT_TYPE'] ?>" readonly />
                                    </div>
                                </div>

                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">ประเภทภัยพิบัติ </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control m-b-5" value="<?php echo $res['DST_NAME'] ?>" readonly />
                                    </div>
                                </div>





                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">รายละเอียด</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control m-b-5" value="<?php echo $res['REQ_DISA_DETAIL'] ?>" readonly />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="mr-sm-2">รายละเอียด</label>
                                    <div class="input-group">
                                        <textarea name="REQ_DISA_DETAIL" id="REQ_DISA_DETAIL" class="form-control" placeholder="รายละเอียด" rows="4" cols="50"><?php echo $res['REQ_DISA_DETAIL'] ?></textarea>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="mr-sm-2">ที่อยู่</label>
                                    <div class="input-group">
                                        <textarea name="REQ_DISA_DETAIL" id="REQ_DISA_DETAIL" class="form-control" placeholder="รายละเอียด" rows="4" cols="50" readonly><?php echo $VT_ADD_CONTACT ?></textarea>

                                    </div>
                                </div>




                                <hr />
                                <?php
                                if ($res['REQ_DMT_TYPE'] == 'ที่อยู่อาศัย') {
                                    if ($_SESSION['level'] == "finoffice") {
                                ?>
                                        <div class="form-group row m-b-15">
                                            <label class="col-form-label col-md-3">ประเมินความเสียหาย </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control m-b-5" value="<?php echo $res['REQ_DISA_RATE'] ?>" readonly />
                                            </div>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="form-group row m-b-15">
                                            <label class="col-form-label col-md-3">ประเมินความเสียหาย </label>
                                            <div class="col-md-9">
                                                <select name="REQ_DISA_RATE" id="REQ_DISA_RATE" class="form-control">
                                                    <option value="เสียหายบางส่วน">เสียหายบางส่วน</option>
                                                    <option value="เสียหาทั้งหลัง">เสียหาทั้งหลัง</option>
                                                </select>
                                            </div>
                                        </div>
                                <?php }
                                } ?>


                                <?php
                                if ($_SESSION['level'] == "finoffice") {
                                ?>

                                    <!-- <div class="form-group row m-b-15">
                                        <label class="col-form-label col-md-3">รายละเอียดการสำรวจ</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="REQ_DISA_SURVEY_DTL" id="REQ_DISA_SURVEY_DTL" value="<?php echo $res['REQ_DISA_SURVEY_DTL'] ?>" readonly>
                                        </div>
                                    </div> -->
                                <?php
                                } else {
                                ?>

                                    <div class="form-group row m-b-15">
                                        <label class="col-form-label col-md-3">รายละเอียดการสำรวจ</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="REQ_SURVEY_DETAIL" id="REQ_SURVEY_DETAIL">
                                        </div>
                                    </div>


                                    <div class="form-group row m-b-15">
                                        <label class="col-form-label col-md-3">แนบไฟล์ 1</label>
                                        <div class="col-md-9">
                                            <input type="file" name="REQ_DISA_FILE[1]" id="REQ_DISA_FILE[1]">
                                        </div>
                                    </div>


                                    <div class="form-group row m-b-15">
                                        <label class="col-form-label col-md-3">แนบไฟล์ 2</label>
                                        <div class="col-md-9">
                                            <input type="file" name="REQ_DISA_FILE[2]" id="REQ_DISA_FILE[2]">
                                        </div>
                                    </div>

                                <?php } ?>







                                <?php
                                $sql = "SELECT file_name, is_image FROM multi_file where req_id= " . $_GET['REQ_DISA_ID'] . " and vs_id=4 and flag_up_by=0";
                                ///echo $sql;

                                $db->Execute($sql);
                                $i = 1;
                                while ($row = $db->getData()) {

                                    // 0 = image, 1 not image
                                    if ($row['is_image'] == 0) {
                                ?>
                                        <div class="form-group row m-b-15">
                                            <label class="col-form-label col-md-3">
                                                ไฟล์แนบ <?php echo $i ?>:
                                            </label>
                                            <div class="col-sm-12" style="text-align:center;">
                                                <img src="../c_img/<?php echo $row['file_name']; ?>" alt="<?php echo $row['file_name']; ?>" width="500" height="500">
                                            </div>
                                        </div>
                                    <?php
                                    } else {
                                    ?>


                                        <div class="form-group row m-b-15">
                                            <label class="col-form-label col-md-3">
                                                ดูใบเสร็จ <?php echo $i ?>:
                                            </label>
                                            <div class="col-sm-12" style="text-align:center;">
                                                <a href="../c_img/<?php echo $row['file_name']; ?>" download>
                                                    โหลดเอกสาร <?php echo $i ?>
                                                </a>
                                            </div>
                                        </div>
                                    <?php }
                                    $i++;
                                }
                                if ($_SESSION['level'] == "finoffice") {
                                    $REQ_DISA_ID = $_GET['REQ_DISA_ID'];
                                    $sql = "SELECT *
                                    FROM req_disa a, veteran b
                                    WHERE a.REQ_DISA_ID=$REQ_DISA_ID AND a.vm_id=b.m_id";
                                    $db->Execute($sql);
                                    $res = $db->getData();
                                    $m_id = $res['m_id'];
                                    $VT_ADD_CONTACT = $res['VT_ADD_CONTACT'];
                                    $REQ_DST_LV = $res['REQ_DST_LV'];
                                    ?>


                                    <hr />
                                    <br>
                                    <h3 style="text-align: center;">ส่วนของเจ้าหน้าที่สำรวจ</h3>

                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="mr-sm-2">ความเสียหายของผู้ประสบภัย</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="radio" style="width: 20px;height:20px;" name="REQ_DST_LV" value="1" <?php echo $REQ_DST_LV == 1 ? 'checked' : '' ?>>
                                                <label for="">&nbsp;บางส่วน</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="radio" style="width: 20px;height:20px;" name="REQ_DST_LV" value="2" <?php echo $REQ_DST_LV == 2 ? 'checked' : '' ?>>
                                                <label for="">&nbsp;ทั้งหลัง</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <br />
                                        <label class="mr-sm-2" style="font-size: 28px;">ทรัพสินย์ที่เสียหาย</label>

                                        <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                                            <thead>
                                                <tr style="background-color: tan;">
                                                    <td>
                                                        รายการ
                                                    </td>
                                                    <td>
                                                        ราคา
                                                    </td>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $total = 0;
                                                $count = 0;
                                                $REQ_DISA_ID = $_GET['REQ_DISA_ID'];
                                                $sql = "SELECT * FROM disa_item_list WHERE REQ_DISA_ID=$REQ_DISA_ID";
                                                $db->Execute($sql);
                                                while ($res = $db->getData()) {
                                                    $count++;
                                                    $total += $res['DISA_ITEM_PRICE'];
                                                ?>
                                                    <tr>
                                                        <td><?php echo $res['DISA_ITEM_NAME'] ?></td>
                                                        <td><?php echo $res['DISA_ITEM_PRICE'] ?></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                                <tr>
                                                    <td>ทั้งหมด <?php echo $count ?> รายการ</td>
                                                    <td>ราคาทั้งหมด <?php echo $total ?> บาท</td>
                                                </tr>
                                            </tbody>

                                        </table>

                                        <?php
                                        $sql = "SELECT file_name, is_image FROM multi_file where req_id= " . $_GET['REQ_DISA_ID'] . " and vs_id=4 and flag_up_by=1";
                                        ///echo $sql;

                                        $db->Execute($sql);
                                        $i = 1;
                                        while ($row = $db->getData()) {

                                            // 0 = image, 1 not image
                                            if ($row['is_image'] == 0) {
                                        ?>
                                                <div class="form-group row m-b-15">
                                                    <label class="col-form-label col-md-3">
                                                        ไฟล์แนบ <?php echo $i ?>:
                                                    </label>
                                                    <div class="col-sm-12" style="text-align:center;">
                                                        <img src="../c_img/<?php echo $row['file_name']; ?>" alt="<?php echo $row['file_name']; ?>" width="500" height="500">
                                                    </div>
                                                </div>
                                            <?php
                                            } else {
                                            ?>


                                                <div class="form-group row m-b-15">
                                                    <label class="col-form-label col-md-3">
                                                        ดูใบเสร็จ <?php echo $i ?>:
                                                    </label>
                                                    <div class="col-sm-12" style="text-align:center;">
                                                        <a href="../c_img/<?php echo $row['file_name']; ?>" download>
                                                            โหลดเอกสาร <?php echo $i ?>
                                                        </a>
                                                    </div>
                                                </div>
                                        <?php }
                                            $i++;
                                        }
                                        ?>

                                    </div>

                                    <div class="col-md-12 mt-3 mb-3" style="text-align: center;">
                                        <button type="button" class="btn btn-primary" onclick="send_con_disa(5, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_DISA_ID'] ?>,<?php echo $m_id ?>)">อนุมติใบคำร้อง</button>
                                        <button type="button" class="btn btn-danger" onclick="send_can_disa(7, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_DISA_ID'] ?>,<?php echo $m_id ?>)">ยกเลิกใบคำร้อง</button>
                                    </div>
                                <?php
                                } ?>
                            </form>
                        </div>
                        <!-- end panel-body -->
                    <?php } ?>



                    <?php if (isset($_GET['REQ_MAT_ID'])) { ?>
                        <!-- begin panel-body -->
                        <div class="panel-body">
                            <div class="alert alert-muted">
                                ยืนคำร้องขอเบิกค่าคลอดบุตร โดย
                                <br>
                                ชั้นบัตร <?php echo $res['VT_CARD_STEP'] ?> เลขที่บัตร <?php echo $res['VT_CARD_NO'] ?>
                                <br>
                                ชื่อ - นามสกุล <?php echo $res['VT_TITLE'] . $res['VT_FNAME'] . $res['VT_LNAME'] ?>
                                <hr>
                                <?php
                                $year = date('Y') + 543;
                                $sql  = "SELECT * FROM mat_value_bal WHERE m_id = '" . $res['m_id'] . "' and mat_value_bal_BG_YEAR = $year";

                                $db->Execute($sql);
                                $res_y = $db->getData();
                                ?>
                                สิทธิเบิก :
                                <?php echo number_format($res_y['mat_value_bal_begin'], 2) ?> บาท
                                <br>
                                สิทธิที่ใช้ไป :
                                <?php echo number_format($res_y['mat_value_bal_use'], 2) ?> บาท
                                <br>
                                สิทธิคงเหลือ :
                                <?php echo number_format($res_y['mat_value_bal_bal'], 2) ?> บาท
                            </div>
                            <form>
                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">วันที่ยื่นคำร้อง</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control m-b-5" value="<?php echo $res['REQ_MAT_DATE'] ?>" readonly />
                                    </div>
                                </div>

                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">ชื่อคู่สมรส</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control m-b-5" value="<?php echo $res["VT_FM_TITLE"] . $res["VT_FM_NAME"] . ' ' . $res["VT_FM_LNAME"] ?>" readonly />
                                    </div>
                                </div>

                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">วันที่คลอด</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control m-b-5" value="<?php echo $res['MAT_BIRTH_DATE'] ?>" readonly />
                                    </div>
                                </div>



                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">สถานะ</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control m-b-5" value="<?php echo $res['s_name'] ?>" readonly />
                                    </div>
                                </div>

                                <?php
                                $sql = "SELECT file_name, is_image FROM multi_file where req_id= " . $_GET['REQ_MAT_ID'] . " and vs_id=3";
                                //echo $sql;

                                $db->Execute($sql);
                                $i = 1;
                                while ($row = $db->getData()) {

                                    // 0 = image, 1 not image
                                    if ($row['is_image'] == 0) {
                                ?>
                                        <div class="form-group row m-b-15">
                                            <label class="col-form-label col-md-3">
                                                ดูใบเสร็จ <?php echo $i ?>:
                                            </label>
                                            <div class="col-sm-12" style="text-align: center;">
                                                <img src="../c_img/<?php echo $row['file_name']; ?>" alt="<?php echo $row['file_name']; ?>" width="500" height="500">
                                            </div>
                                        </div>
                                    <?php
                                    } else {
                                    ?>

                                        <div class="form-group row m-b-15">
                                            <label class="col-form-label col-md-3">
                                                ดูใบเสร็จ <?php echo $i ?>:
                                            </label>
                                            <div class="col-sm-12" style="text-align: center;">
                                                <a href="../c_img/<?php echo $row['file_name']; ?>" download>
                                                    โหลดเอกสาร <?php echo $i ?>
                                                </a>
                                            </div>
                                        </div>
                                    <?php }
                                    $i++;
                                }
                                if ($_SESSION['level'] == "finoffice") {
                                    ?>
                                    <div class="col-md-12 mt-3 mb-3" style="text-align: center;">
                                        <button type="button" class="btn btn-primary" onclick="send_con(5, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_MAT_ID'] ?>,'<?php echo ($res['REQ_MAT_VALUE']) ?>', <?php echo $res['m_id'] ?>)">อนุมติใบคำร้อง</button>
                                        <button type="button" class="btn btn-danger" onclick="send_can(7, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_MAT_ID'] ?>,  <?php echo $res['m_id'] ?>)">ยกเลิกใบคำร้อง</button>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="col-md-12 mt-3 mb-3" style="text-align: center;">
                                        <button type="button" class="btn btn-primary" onclick="send_con(3, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_MAT_ID'] ?>,'<?php echo ($res['REQ_MAT_VALUE']) ?>', <?php echo $res['m_id'] ?>)">อนุมติใบคำร้อง</button>
                                        <button type="button" class="btn btn-danger" onclick="send_can(7, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_MAT_ID'] ?>,  <?php echo $res['m_id'] ?>)">ยกเลิกใบคำร้อง</button>
                                    </div>
                                <?php } ?>
                            </form>
                        </div>
                        <!-- end panel-body -->
                    <?php } ?>


                    <?php if (isset($_GET['REQ_EDU_ID'])) { ?>
                        <!-- begin panel-body -->
                        <div class="panel-body">
                            <div class="alert alert-muted">
                                ยืนคำร้องขอเบิกค่าการศึกษาบุตร โดย
                                <br>
                                ชั้นบัตร <?php echo $res['VT_CARD_STEP'] ?> เลขที่บัตร <?php echo $res['VT_CARD_NO'] ?>
                                <br>
                                ชื่อ - นามสกุล <?php echo $res['VT_TITLE'] . $res['VT_FNAME'] . $res['VT_LNAME'] ?>
                                <hr>
                                <?php
                                $year = date('Y') + 543;
                                $sql = "SELECT *
                                FROM edu_value_bal
                                WHERE
                                seq=
                                (SELECT MAX(seq)
                                FROM edu_value_bal
                                WHERE m_id =" . $res['m_id'] . " and edu_value_bal_BG_YEAR = $year )";

                                $db->Execute($sql);
                                $res_y = $db->getData();

                                ?>
                                สิทธิเบิก :
                                <?php echo number_format($res_y['edu_value_bal_begin'], 2) ?> บาท
                                <br>
                                สิทธิที่ใช้ไป :
                                <?php echo number_format($res_y['edu_value_bal_use'], 2) ?> บาท
                                <br>
                                สิทธิคงเหลือ :
                                <?php echo $res_y['edu_value_bal_bal'] > 100000 ? 'วงเงินไม่จำกัด' : number_format($res_y['edu_value_bal_bal'], 2) . "บาท" ?>
                            </div>
                            <form>
                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">วันที่ยื่นคำร้อง</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control m-b-5" value="<?php echo $res['REQ_EDU_DATE'] ?>" readonly />
                                    </div>
                                </div>

                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">เบิกให้</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control m-b-5" value=" <?php echo $res['VT_FM_TITLE'] . $res['VT_FM_NAME'] . ' ' . $res['VT_FM_LNAME'] ?>" readonly />
                                    </div>
                                </div>


                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">สถานะ</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control m-b-5" value="<?php echo $res['s_name'] ?>" readonly />
                                    </div>
                                </div>


                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">ประเภทสถาบัน</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control m-b-5" value="<?php echo $res['REQ_EDU_INSTITUTION_TYPE'] ?>" readonly />
                                    </div>
                                </div>

                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">ชื่อสถาบัน</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control m-b-5" value="<?php echo $res['REQ_EDU_INSTITUTION_NAME'] ?>" readonly />
                                    </div>
                                </div>

                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">ภาคเรียน</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control m-b-5" value="<?php echo $res['REQ_EDU_SEMESTER'] ?>" readonly />
                                    </div>
                                </div>


                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">ระดับชั้น</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control m-b-5" value="<?php echo $res['ELV_NAME'] ?>" readonly />
                                    </div>
                                </div>

                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">คณะ</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control m-b-5" value="<?php echo $res['REQ_EDU_FACULTY'] ?>" readonly />
                                    </div>
                                </div>

                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">สาขา</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control m-b-5" value="<?php echo $res['REQ_EDU_PROGRAM'] ?>" readonly />
                                    </div>
                                </div>

                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">เกรดเฉลี่ย</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control m-b-5" value="<?php echo $res['REQ_EDU_GRADE'] ?>" readonly />
                                    </div>
                                </div>

                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">จำนวนเงินที่ขอเบิก</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control m-b-5" value="<?php echo $res['REQ_EDU_VALUE'] ?>" readonly />
                                    </div>
                                </div>





                                <?php
                                $sql = "SELECT file_name, is_image FROM multi_file where req_id= " . $_GET['REQ_EDU_ID'] . " and vs_id=5";


                                $db->Execute($sql);
                                $i = 1;
                                while ($row = $db->getData()) {

                                    // 0 = image, 1 not image
                                    if ($row['is_image'] == 0) {
                                ?>
                                        <div class="form-group row m-b-15">
                                            <label class="col-form-label col-md-3">
                                                ดูใบเสร็จ <?php echo $i ?>:
                                            </label>
                                            <div class="col-md-12" style="text-align: center;">
                                                <img src="../c_img/<?php echo $row['file_name']; ?>" alt="<?php echo $row['file_name']; ?>" width="500" height="500">
                                            </div>
                                        </div>
                                    <?php
                                    } else {
                                    ?>

                                        <div class="form-group row m-b-15">
                                            <label class="col-form-label col-md-3">
                                                ดูใบเสร็จ <?php echo $i ?>:
                                            </label>
                                            <div class="col-sm-12" style="text-align: center;">
                                                <a href="../c_img/<?php echo $row['file_name']; ?>" download>
                                                    โหลดเอกสาร <?php echo $i ?>
                                                </a>

                                            </div>
                                        </div>
                                    <?php }
                                    $i++;
                                }
                                if ($_SESSION['level'] == "finoffice") {
                                    ?>
                                    <div class="col-md-12 mt-3 mb-3" style="text-align: center;">
                                        <button type="button" class="btn btn-primary" onclick="send_con(5, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_EDU_ID'] ?>,'<?php echo ($res['REQ_EDU_VALUE']) ?>', <?php echo $res['m_id'] ?>)">อนุมติใบคำร้อง</button>
                                        <button type="button" class="btn btn-danger" onclick="send_can(7, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_EDU_ID'] ?>,  <?php echo $res['m_id'] ?>)">ยกเลิกใบคำร้อง</button>
                                    </div>
                                <?php
                                } else {

                                ?>
                                    <div class="col-md-12 mt-3 mb-3" style="text-align: center;">
                                        <button type="button" class="btn btn-primary" onclick="send_con(3, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_EDU_ID'] ?>,'<?php echo ($res['REQ_EDU_VALUE']) ?>', <?php echo $res['m_id'] ?>)">อนุมติใบคำร้อง</button>
                                        <button type="button" class="btn btn-danger" onclick="send_can(7, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_EDU_ID'] ?>,  <?php echo $res['m_id'] ?>)">ยกเลิกใบคำร้อง</button>
                                    </div>
                                <?php } ?>
                            </form>
                        </div>
                        <!-- end panel-body -->
                    <?php } ?>



                    <?php if (isset($_GET['REQ_MOTHLY_ID'])) { ?>
                        <!-- begin panel-body -->
                        <div class="panel-body">
                            <div class="alert alert-muted">
                                ยืนคำร้องขอรับการสงเคราะห์เงินเลี้ยงชีพรายเดือน โดย
                                <br>
                                ชั้นบัตร <?php echo $res['VT_CARD_STEP'] ?> เลขที่บัตร <?php echo $res['VT_CARD_NO'] ?>
                                <br>
                                ชื่อ - นามสกุล <?php echo $res['VT_TITLE'] . $res['VT_FNAME'] . $res['VT_LNAME'] ?>
                                <hr>

                            </div>
                            <form>
                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">วันที่ยื่นคำร้อง</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control m-b-5" value="<?php echo $res['REQ_MOTHLY_DATE'] ?>" readonly />
                                    </div>
                                </div>

                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control m-b-5" value="<?php echo $res['REQ_MOTHLY_DATE'] ?>" readonly />
                                    </div>
                                </div>


                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">รายได้ปัจจุบัน</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control m-b-5" value="<?php echo $res['VT_INCOME'] ?>" readonly />
                                    </div>
                                </div>

                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">อาชีพปัจจุบัน</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control m-b-5" value="<?php echo $res['VT_OCCU'] ?>" readonly />
                                    </div>
                                </div>

                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">เงินบำนาญปกติ</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control m-b-5" value="<?php echo $res['NORMAL_PENSION_ST'] == 1 ? 'ได้เงินบำนาญปกติ ' . $res['NORMAL_PENSION_VALUE'] : 'ไม่ได้เงินบำนาญปกติ' ?> บาท" id="" readonly />
                                    </div>
                                </div>
                                <input type="hidden" name="NORMAL_PENSION_VALUE" id="NORMAL_PENSION_VALUE" value="<?php echo $res['NORMAL_PENSION_VALUE'] ?>">

                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">เงินบำนาญพิเศษ</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control m-b-5" value="<?php echo $res['EXTRA_PENSION_ST'] == 1 ? 'ได้เงินบำนาญพิเศษ' . $res['EXTRA_PENSION_VALUE'] : 'ไม่ได้เงินบำนาญพิเศษ' ?> บาท" readonly />
                                        <input type="hidden" name="EXTRA_PENSION_VALUE" id="EXTRA_PENSION_VALUE" value="<?php echo $res['EXTRA_PENSION_VALUE'] ?>">
                                    </div>
                                </div>


                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">เงินค่าครองชีพ</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control m-b-5" value="<?php echo $res['CLIVE_VALUE'] ?> บาท" id="CLIVE_VALUE" readonly />

                                    </div>
                                </div>

                                <div class="form-group row m-b-15">
                                    <label class="col-form-label col-md-3">สถานะ</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control m-b-5" value="<?php echo $res['s_name'] ?>" readonly />
                                    </div>
                                </div>





                                <?php
                                $sql = "SELECT file_name, is_image FROM multi_file where req_id= " . $_GET['REQ_MONTHLY_ID'] . " and vs_id=6";


                                $db->Execute($sql);
                                $i = 1;
                                while ($row = $db->getData()) {

                                    // 0 = image, 1 not image
                                    if ($row['is_image'] == 0) {
                                ?>
                                        <div class="form-group">
                                            <div class="col-sm-2 control-label">
                                                ดูใบเสร็จ <?php echo $i ?>:
                                            </div>
                                            <div class="col-sm-3">
                                                <img src="../c_img/<?php echo $row['file_name']; ?>" alt="<?php echo $row['file_name']; ?>" width="500" height="500">
                                            </div>
                                        </div>
                                    <?php
                                    } else {
                                    ?>

                                        <div class="form-group">
                                            <div class="col-sm-2 control-label">
                                                ดูใบเสร็จ <?php echo $i ?>:
                                            </div>
                                            <div class="col-sm-3">
                                                <a href="../c_img/<?php echo $row['file_name']; ?>" download>
                                                    โหลดเอกสาร <?php echo $i ?>
                                                </a>

                                            </div>
                                        </div>
                                    <?php }
                                    $i++;
                                }
                                if ($_SESSION['level'] == "finoffice") {
                                    ?>
                                    <div class="col-md-12 mt-3 mb-3" style="text-align: center;">
                                        <button type="button" class="btn btn-primary" onclick="send_con(5, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_MOTHLY_ID'] ?>,1, <?php echo $res['m_id'] ?>)">อนุมติใบคำร้อง</button>
                                        <button type="button" class="btn btn-danger" onclick="send_can(7, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_MOTHLY_ID'] ?>, 1, <?php echo $res['m_id'] ?>)">ยกเลิกใบคำร้อง</button>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="col-md-12 mt-3 mb-3" style="text-align: center;">
                                        <button type="button" class="btn btn-primary" onclick="send_con(3, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_MOTHLY_ID'] ?>,1, <?php echo $res['m_id'] ?>)">อนุมติใบคำร้อง</button>
                                        <button type="button" class="btn btn-danger" onclick="send_can(7, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_MOTHLY_ID'] ?>, 1, <?php echo $res['m_id'] ?>)">ยกเลิกใบคำร้อง</button>
                                    </div>
                                <?php } ?>
                            </form>
                        </div>
                        <!-- end panel-body -->
                    <?php } ?>







                    </div>
                    <!-- end panel -->
                </div>
                <!-- end col-6 -->
                <input type="hidden" id="level" value="<?php echo $_SESSION['level'] ?>">
            </div>
            <!-- end row -->
        </div>
        <!-- end #content -->


        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
        </div>
        <!-- end page container -->

        <!-- ================== BEGIN BASE JS ================== -->
        <script src="../assets/js/app.min.js"></script>
        <script src="../assets/js/theme/default.min.js"></script>
        <!-- ================== END BASE JS ================== -->

        <!-- ================== BEGIN PAGE LEVEL JS ================== -->
        <script src="../assets/plugins/flot/jquery.flot.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.time.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.resize.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.pie.js"></script>
        <script src="../assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="../assets/plugins/jvectormap-next/jquery-jvectormap.min.js"></script>
        <script src="../assets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js"></script>
        <script src="../assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
        <script src="../assets/js/demo/dashboard.js"></script>
        <script src="../assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../assets/plugins/datatables.net-fixedcolumns/js/dataTables.fixedcolumns.min.js"></script>
        <script src="../assets/plugins/datatables.net-fixedcolumns-bs4/js/fixedcolumns.bootstrap4.min.js"></script>
        <script src="../assets/js/demo/table-manage-fixed-columns.demo.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            const send_con = (s_id, type, id, moneys, m_id) => {
                if (type == 6) {

                    $.ajax({
                        type: "POST",
                        url: "cancel.php",
                        data: {
                            id: id,
                            s_id: s_id,
                            type: type,
                            m_id: m_id,
                            NORMAL_PENSION_VALUE: $('#NORMAL_PENSION_VALUE').val(),
                            EXTRA_PENSION_VALUE: $('#EXTRA_PENSION_VALUE').val(),
                            CLIVE_VALUE: $('#CLIVE_VALUE').val(),
                        },
                        success: function(data) {
                            if (data === 'success') {
                                swal('อนุมัติรายการสำเร็จ', '', 'success');
                                if (type == 1 || type == 2 || type == 3 || type == 4 || type == 5 || type == 6) {
                                    setTimeout(function() {
                                        window.location = "index.php?type=" + type + "&level=" + $('#level').val();
                                    }, 2000);
                                }

                            } else {
                                swal('อนุมัติรายการไม่สำเร็จ', '', 'error');
                            }

                        }
                    });
                    return false;
                }
                let money = prompt("จำนวนเงิน:", moneys);
                if (money == null || money == "") {
                    swal('กรุณาใส่จำนวนเงิน', '', 'warning');
                } else {
                    var memo = ''
                    moneys = parseFloat(moneys)
                    money = parseFloat(money)
                    if (money < moneys) {
                        memo = prompt("เหตุผล:");

                        if (memo == '') {
                            return false;
                        }
                    }


                    $.ajax({
                        type: "POST",
                        url: "cancel.php",
                        data: {
                            id: id,
                            s_id: s_id,
                            type: type,
                            money: money,
                            m_id: m_id,
                            memo: memo
                        },
                        success: function(data) {
                            if (data === 'success') {
                                swal('อนุมัติรายการสำเร็จ', '', 'success');
                                // if (type == 1 || type == 2 || type == 3 || type == 4 || type == 5 || type == 6) {
                                //     setTimeout(function() {
                                //         window.location = "index.php?type=" + type + "&level=" + $('#level').val();
                                //     }, 2000);
                                // }
                            } else {
                                swal('อนุมัติรายการไม่สำเร็จ', '', 'error');
                            }

                        }
                    });
                }
            }

            const send_can = (s_id, type, id, m_id) => {
                let person = prompt("เหตุผลที่ยกเลิก:", "");
                if (person == null || person == "") {
                    swal('กรณาใส่เหตุผลที่ยกเลิก', '', 'warning');
                } else {

                    if (type == 6) {
                        $.ajax({
                            type: "POST",
                            url: "cancel.php",
                            data: {
                                id: id,
                                s_id: s_id,
                                type: type,
                                reason: person,
                                m_id: m_id,
                                NORMAL_PENSION_VALUE: $('#NORMAL_PENSION_VALUE').val(),
                                EXTRA_PENSION_VALUE: $('#EXTRA_PENSION_VALUE').val()
                            },
                            success: function(data) {
                                if (data == 'success') {
                                    swal('ยกเลิกรายการสำเร็จ', '', 'success');
                                    if (type == 1 || type == 2 || type == 3 || type == 4 || type == 5 || type == 6) {
                                        setTimeout(function() {
                                            window.location = "index.php?type=" + type + "&level=" + $('#level').val();
                                        }, 2000);
                                    }
                                } else {
                                    swal('ยกเลิกรายการไมสำเร็จ', '', 'error');
                                }

                            }
                        });
                        return false
                    }

                    $.ajax({
                        type: "POST",
                        url: "cancel.php",
                        data: {
                            id: id,
                            s_id: s_id,
                            type: type,
                            reason: person,
                            m_id: m_id
                        },
                        success: function(data) {
                            if (data == 'success') {
                                swal('ยกเลิกรายการสำเร็จ', '', 'success');
                                if (type == 1 || type == 2 || type == 3 || type == 4 || type == 5 || type == 6) {
                                    setTimeout(function() {
                                        window.location = "index.php?type=" + type + "&level=" + $('#level').val();
                                    }, 2000);
                                }
                            } else {
                                swal('ยกเลิกรายการไมสำเร็จ', '', 'error');
                            }

                        }
                    });
                }
            }

            //disa

            const send_con_disa = (s_id, type, id, m_id) => {
                //form Submit
                $.ajax({
                    type: "POST",
                    url: "cancel.php",
                    data: {
                        s_id: s_id,
                        id: id,
                        type: type,
                        m_id: m_id
                    },
                    success: function(data) {
                        if (data == 'success') {
                            swal("อนุมัติรายการสำเร็จ", "", "success");
                            setTimeout(function() {
                                window.location = "index.php?type=3&level=finoffice"
                            }, 2000);

                        } else {
                            swal("อนุมัติรายการไม่สำเร็จ", "", "error");
                            setTimeout(function() {
                                window.location = "index.php?type=3&level=finoffice"
                            }, 2000);
                        }

                    }
                });
            }


            const send_can_disa = (s_id, type, id, m_id) => {
                let reason = prompt("เหตุผลที่ยกเลิก:", "");

                if (reason == null || reason == "") {
                    swal("กรุณาใส่เหตุผลที่ยกเลิก", "", "warning");
                } else {

                    $.ajax({
                        type: "POST",
                        url: "cancel.php",
                        data: {
                            id: id,
                            s_id: s_id,
                            reason: reason,
                            type: type,
                            m_id: m_id
                        },
                        success: function(data) {
                            if (data === 'success') {
                                swal("อนุมัติรายการสำเร็จ", "", "success");
                                setTimeout(function() {
                                    window.location = "index.php?type=3&level=finoffice"
                                }, 2000);

                            } else {
                                swal("อนุมัติรายการไม่สำเร็จ", "", "error");
                                setTimeout(function() {
                                    window.location = "index.php?type=3&level=finoffice"
                                }, 2000);
                            }

                        }
                    });

                }
            }
        </script>



        <!-- ================== END PAGE LEVEL JS ================== -->
    </body>

    </html>

<?php
} else {
    header('Location: login.php');
}
?>