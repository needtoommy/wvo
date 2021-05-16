<?php
session_start();
if ($_SESSION['PERMISSION'] == 'KORN') {
    include '../connect/db.php';
    $level = $_SESSION['m_level'];
    $db = new DB();
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Color Admin | Wizards + Validation</title>
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <!-- ================== BEGIN BASE CSS STYLE ================== -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <link href="../assets/css/default/app.min.css" rel="stylesheet" />
        <!-- ================== END BASE CSS STYLE ================== -->

        <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
        <link href="../assets/plugins/smartwizard/dist/css/smart_wizard.css" rel="stylesheet" />
        <!-- ================== END PAGE LEVEL STYLE ================== -->

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100;300;400&display=swap" rel="stylesheet">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
            <div id="header" class="header navbar-default" style="background-color: white; color:black;">
                <!-- begin navbar-header -->
                <div class="navbar-header">
                    <a href="index.html" style="background-color: white; color:black;" class="navbar-brand"><span class="navbar-logo"></span> <b>ระบบสวัสดิการสงเคราะห์ทหารผ่านศึก</b></a>
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

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background-color: white; color:black;">
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
                        <li>
                            <ul class="nav nav-profile">
                                <li><a href="javascript:;"><i class="fa fa-cog"></i> Settings</a></li>
                                <li><a href="javascript:;"><i class="fa fa-pencil-alt"></i> Send Feedback</a></li>
                                <li><a href="javascript:;"><i class="fa fa-question-circle"></i> Helps</a></li>
                            </ul>
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
                                <a href="#">
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
                                <a href="#">
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
                                <a href="#">
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
                                <a href="#">
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
                            <li>
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
                                <a href="#">
                                    <i class="fa fa-edit"></i>
                                    <span>ตรวจสอบใบคำร้องเงินครั้งคราว</span>
                                </a>
                            </li>
                        <?php } ?>


                        <!-- -----------------**********************************--------------------- -->
                        <?php if ($level == '') {
                        ?>
                            <li <?php echo $_GET['type'] == 8 ? 'class="active"' : '' ?>>
                                <a href="#">
                                    <i class="fa fa-edit"></i>
                                    <span>จัดการสมาชิก</span>
                                </a>
                            </li>
                        <?php } ?>


                        <!-- -----------------**********************************--------------------- -->
                        <?php if ($level == '') { ?>
                            <li <?php echo $_GET['type'] == 9 ? 'class="active"' : '' ?>>
                                <a href="#">
                                    <i class="fa fa-edit"></i>
                                    <span>จัดการตำแหน่ง</span>
                                </a>
                            </li>
                        <?php } ?>


                        <!-- -----------------**********************************--------------------- -->
                        <?php if ($level == '') { ?>
                            <li <?php echo $_GET['type'] == 10 ? 'class="active"' : '' ?>>
                                <a href="#">
                                    <i class="fa fa-edit"></i>
                                    <span>จัดการสถานะ</span>
                                </a>
                            </li>
                        <?php } ?>


                        <!-- -----------------**********************************--------------------- -->
                        <?php if ($level == 'vsofficer' || $level == 'vsmanager') { ?>
                            <li class="has-sub active">
                                <a>
                                    <i class="fa fa-edit"></i>
                                    <span>จัดการประวัติทหารผ่านศึก</span>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="vtp_add_form.php?type=11&level=<?php echo $level ?>">เพิ่มประวัติทหารผ่านศึก</a></li>
                                    <li class="active"><a href="vtp_edit_form.php">ค้นหาประวัติทหารผ่านศึก</a></li>

                                </ul>
                            </li>
                        <?php } ?>
                        <!-- -----------------*************END*************--------------------- -->


                        <!-- -----------------**********************************--------------------- -->
                        <?php if ($level == '') { ?>
                            <li <?php echo $_GET['type'] == 12 ? 'class="active"' : '' ?>>
                                <a href="#">
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

                <?php


                $sql = "SELECT * FROM veteran a, tbl_member b WHERE a.m_id = b.m_id  and a.m_id = '" . $_GET['id'] . "'";
                $db->Execute($sql);
                $res = $db->getData($sql);
                $resss = $res['VT_ID'];

                ?>
                <h1 class="page-header">ประวัติทหารผ่านศึก</h1>
                <div class="row">
                    <div class="col-md-12">

                        <form action="vtp_add_form_db.php" method="POST" name="form-wizard" class="form-control-with-bg">
                            <!-- begin wizard -->
                            <div id="wizard">
                                <!-- begin wizard-step -->
                                <ul>
                                    <li>
                                        <a href="#step-1">
                                            <span class="number">1</span>
                                            <span class="info">
                                                ข้อมูลส่วนตัว
                                                <small></small>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#step-2">
                                            <span class="number">2</span>
                                            <span class="info">
                                                ประวัติครอบครัวและความสัมพันธ์
                                                <small></small>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#step-3">
                                            <span class="number">3</span>
                                            <span class="info">
                                                เสร็จสิ้น
                                                <small></small>
                                            </span>
                                        </a>
                                    </li>

                                </ul>
                                <!-- end wizard-step -->
                                <!-- begin wizard-content -->
                                <div>
                                    <form method="POST" name="search_form" id="search_form">
                                        <!-- begin step-1 -->
                                        <div id="step-1">
                                            <!-- begin fieldset -->
                                            <fieldset>
                                                <!-- begin row -->
                                                <div class="row">
                                                    <!-- begin col-8 -->
                                                    <div class="col-xl-12 offset-xl-">
                                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">ข้อมูลส่วนตัว</legend>
                                                        <hr>

                                                        <input type="hidden" id="search_1" value="search_1">
                                                        <!-- ถ้าต้องการ data-parsley-required="true" -->

                                                        <!-- begin form- กรอกประวัติ-->
                                                        <div class="form-group row m-b-12">
                                                            <label class="col-lg-2 text-lg-right col-form-label">คำนำหน้าชื่อ </label>
                                                            <div class="col-lg-2 col-xl-1">
                                                                <input type="text" name="VT_TITLE" id="VT_TITLE" placeholder="คำนำหน้าชื่อ" data-parsley-group="step-1" class="form-control" value="<?php echo $res['VT_TITLE'] ?>" readonly />
                                                            </div>

                                                            <label class="col-lg-1 text-lg-right col-form-label">ชื่อ </label>
                                                            <div class="col-lg-2 col-xl-3">
                                                                <input type="text" name="VT_FNAME" id="VT_FNAME" placeholder="ชื่อ" data-parsley-group="step-1" class="form-control" value="<?php echo $res['VT_FNAME'] ?>" readonly />
                                                            </div>
                                                            <label class="col-lg-1 text-lg-right col-form-label">นามสกุล </label>
                                                            <div class="col-lg-2 col-xl-3">
                                                                <input type="text" name="VT_LNAME" id="VT_LNAME" placeholder="นามสกุล" data-parsley-group="step-1" class="form-control" value="<?php echo $res['VT_LNAME'] ?>" readonly />
                                                            </div>
                                                        </div>
                                                        <!-- end form-group -->
                                                        <!-- begin form- กรอกประวัติ-->

                                                        <div class="form-group row m-b-12">
                                                            <label class="col-lg-2 text-lg-right col-form-label">เลขประจำตัวประชาชน </label>
                                                            <div class="col-lg-2 col-xl-9">
                                                                <input type="text" name="VT_ID_NUM" id="VT_ID_NUM" placeholder="" data-parsley-group="step-1" class="form-control" value="<?php echo $res['VT_ID_NUM'] ?>" readonly />
                                                            </div>
                                                        </div>




                                                        <!-- begin form- กรอกประวัติ2-->
                                                        <div class="form-group row m-b-12">
                                                            <label class="col-lg-2 text-lg-right col-form-label">วันเดือนปีเกิด </label>
                                                            <div class="col-lg-2 col-xl-2">
                                                                <input type="text" name="VT_BRITH_DATE" id="VT_BRITH_DATE" data-parsley-group="step-1" class="form-control" value="<?php echo $res['VT_BRITH_DATE'] ?>" readonly />
                                                            </div>

                                                            <label class="col-lg-1 text-lg-right col-form-label">อายุ </label>
                                                            <div class="col-lg-2 col-xl-2">
                                                                <input type="number" name="VT_AGE" id="VT_AGE" data-parsley-group="step-1" class="form-control" value="<?php echo $res['VT_AGE'] ?>" readonly />
                                                            </div>
                                                            <label class="col-lg-1 text-lg-right col-form-label">เพศ </label>
                                                            <div class="col-lg-9 col-xl-3">
                                                                <div class="row row-space-6">
                                                                    <div class="col-7">
                                                                        <input type="text" name="VT_SEX" id="VT_SEX" data-parsley-group="step-1" class="form-control" value="<?php echo $res['VT_SEX'] ?>" readonly />
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                        <!-- end form-group -->
                                                        <!-- begin form- กรอกประวัติ3-->
                                                        <div class="form-group row m-b-12">
                                                            <label class="col-lg-2 text-lg-right col-form-label">ส่วนสูง </label>
                                                            <div class="col-lg-2 col-xl-2">
                                                                <input type="text" name="VT_HEIGHT" id="VT_HEIGHT" data-parsley-group="step-1" class="form-control" value="<?php echo $res['VT_HEIGHT'] ?>" readonly />
                                                            </div>

                                                            <label class="col-lg-1 text-lg-right col-form-label">น้ำหนัก </label>
                                                            <div class="col-lg-2 col-xl-2">
                                                                <input type="text" name="VT_WEIGHT" id="VT_WEIGHT" placeholder="" data-parsley-group="step-1" class="form-control" value="<?php echo $res['VT_WEIGHT'] ?>" readonly />
                                                            </div>
                                                            <label class="col-lg-1 text-lg-right col-form-label">โทรศัทพ์</label>
                                                            <div class="col-lg-9 col-xl-3">
                                                                <input type="number" name="VT_PHONE" id="VT_PHONE" data-parsley-group="step-1" class="form-control" value="<?php echo $res['VT_PHONE'] ?>" readonly />
                                                            </div>

                                                        </div>
                                                        <!-- end form-group -->
                                                        <!-- begin form- กรอกประวัติ4-->
                                                        <div class="form-group row m-b-12">
                                                            <label class="col-lg-2 text-lg-right col-form-label">เชื้อชาติ </label>
                                                            <div class="col-lg-2 col-xl-2">
                                                                <input type="text" name="VT_RACE" id="VT_RACE" data-parsley-group="step-1" class="form-control" value="<?php echo $res['VT_RACE'] ?>" readonly />
                                                            </div>

                                                            <label class="col-lg-1 text-lg-right col-form-label">สัญชาติ </label>
                                                            <div class="col-lg-2 col-xl-2">
                                                                <input type="text" name="VT_NATIONALITY" id="VT_NATIONALITY" placeholder="" data-parsley-group="step-1" class="form-control" value="<?php echo $res['VT_NATIONALITY'] ?>" readonly />
                                                            </div>
                                                            <label class="col-lg-1 text-lg-right col-form-label">ศาสนา</label>
                                                            <div class="col-lg-2 col-xl-2">
                                                                <input type="text" name="VT_RELIGION" id="VT_RELIGION" data-parsley-group="step-1" class="form-control" value="<?php echo $res['VT_RELIGION'] ?>" readonly />
                                                            </div>

                                                        </div>
                                                        <!-- end form-group -->

                                                        <div class="form-group row m-b-12">


                                                            <label class="col-lg-2 text-lg-right col-form-label">อาชีพ</label>

                                                            <div class="col-lg-2 col-xl-2">
                                                                <input type="text" name="VT_OCCU" id="VT_OCCU" data-parsley-group="step-1" class="form-control" value="<?php echo $res['VT_OCCU'] ?>" readonly />

                                                            </div>

                                                            <label class="col-lg-1 text-lg-right col-form-label">รายได้ </label>
                                                            <div class="col-lg-2 col-xl-2">
                                                                <input type="number" class="form-control" name="VT_INCOME" id="VT_INCOME" value="<?php echo $res['VT_INCOME'] ?>" readonly>
                                                            </div>

                                                            <label class="col-lg-1 text-lg-right col-form-label">สถานะสมรส </label>
                                                            <div class="col-lg-2 col-xl-2">
                                                                <input type="number" class="form-control" name="VT_MARITAL_ST_ID" id="VT_MARITAL_ST_ID" value="<?php echo $res['VT_MARITAL_ST_ID'] ?>" readonly>
                                                            </div>
                                                        </div>



                                                        <!-- begin form- ที่อยู่ที่ติดต่อได้ -->
                                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">ข้อมูลที่อยู่</legend>
                                                        <hr>
                                                        <div class="form-group row m-b-12">
                                                            <label class="col-lg-2 text-lg-right col-form-label">ที่อยู่ที่ติดต่อได้ </label>
                                                            <div class="col-lg-2 col-xl-9">
                                                                <input type="text" name="VT_ADD_CONTACT" id="VT_ADD_CONTACT" placeholder="" data-parsley-group="step-1" class="form-control" value="<?php echo $res['VT_ADD_CONTACT'] ?>" readonly />
                                                            </div>
                                                        </div>
                                                        <!-- end form-group -->

                                                        <!-- begin form- ที่อยู่ที่ติดต่อได้ -->
                                                        <div class="form-group row m-b-12">
                                                            <label class="col-lg-2 text-lg-right col-form-label">ที่อยู่ตามทะเบียนบ้าน </label>
                                                            <div class="col-lg-2 col-xl-9">
                                                                <input type="text" name="VT_ADD_REG" id="VT_ADD_REG" placeholder="" data-parsley-group="step-1" class="form-control" value="<?php echo $res['VT_ADD_REG'] ?>" readonly />
                                                            </div>
                                                        </div>
                                                        <!-- end form-group -->

                                                        <!-- begin form- เบอร์ -->
                                                        <br>
                                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">ข้อมูลบัตรทหารผ่านศึก</legend>
                                                        <hr>

                                                        <!-- end form-group -->



                                                        <!-- begin form- เบอร์ -->
                                                        <div class="form-group row m-b-12">
                                                            <label class="col-lg-2 text-lg-right col-form-label">ชั้นบัตร </label>
                                                            <div class="col-lg-2 col-xl-2">
                                                                <input type="text" name="VT_CARD_STEP" id="VT_CARD_STEP" placeholder="" data-parsley-group="step-1" class="form-control" value="<?php echo $res['VT_CARD_STEP'] ?>" readonly />

                                                            </div>
                                                            <label class="col-lg-1 text-lg-right col-form-label">เลขที่บัตร </label>
                                                            <div class="col-lg-2 col-xl-2">
                                                                <input type="text" name="VT_CARD_NO" id="VT_CARD_NO" placeholder="" data-parsley-group="step-1" class="form-control" value="<?php echo $res['VT_CARD_NO'] ?>" readonly />
                                                            </div>
                                                        </div>
                                                        <!-- end form-group -->


                                                        <!-- begin form- เหล่าทัพ -->
                                                        <div class="form-group row m-b-12">


                                                            <label class="col-lg-2 text-lg-right col-form-label">เหล่าทัพ(ประจำการ) </label>

                                                            <div class="col-lg-2 col-xl-2">

                                                                <input type="text" name="VT_ARMY_ST" id="VT_ARMY_ST" placeholder="" data-parsley-group="step-1" class="form-control" value="<?php echo $res['VT_ARMY_ST'] ?>" readonly />
                                                            </div>

                                                            <label class="col-lg-1 text-lg-right col-form-label">กองทัพ </label>
                                                            <div class="col-lg-2 col-xl-2">
                                                                <input type="text" name="VT_ARMY" id="VT_ARMY" placeholder="" data-parsley-group="step-1" class="form-control" value="<?php echo $res['VT_ARMY'] ?>" readonly />

                                                            </div>


                                                        </div>





                                                        <!-- begin form-  BANK INFO-->
                                                        <br>
                                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">ข้อมูลธนาคาร</legend>
                                                        <hr>

                                                        <div class="form-group row m-b-12">
                                                            <label class="col-lg-2 text-lg-right col-form-label">ชื่อธนาคาร</label>
                                                            <div class="col-lg-2 col-xl-2">

                                                                <input type="text" name="VT_BANK_NAME" id="VT_BANK_NAME" placeholder="" data-parsley-group="step-1" class="form-control" value="<?php echo $res['VT_BANK_NAME'] ?>" readonly />

                                                            </div>



                                                            <label class="col-lg-1 text-lg-right col-form-label">เลขบัญชี </label>
                                                            <div class="col-lg-2 col-xl-2">
                                                                <input type="number" class="form-control" name="VT_BANK_ACC_NUM" id="VT_BANK_ACC_NUM" value="<?php echo $res['VT_BANK_ACC_NUM'] ?>" readonly>
                                                            </div>
                                                        </div>



                                                        <!-- end col-8 -->
                                                    </div>
                                                    <!-- end row -->
                                            </fieldset>
                                            <!-- end fieldset -->
                                        </div>
                                        <!-- end step-1 -->



                                        <!-- begin step-2 -->
                                        <div id="step-2">
                                            <!-- begin fieldset -->
                                            <fieldset>
                                                <!-- begin row -->
                                                <div class="row">
                                                    <div class="col-xl-12 offset-xl-">
                                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">บันทึกประวัติครอบครัว


                                                        </legend>

                                                        <div class="form-group row m-b-12">

                                                            <?php
                                                            $sql = "SELECT * FROM veteran_family WHERE VT_ID='$resss'";
                                                            $db->Execute($sql);
                                                            $i = 1;
                                                            while ($res = $db->getData()) {
                                                            ?>
                                                                <div style="width:100%" class="family_see_<?php echo $i; ?>">


                                                                    <h5> ดูข้อมูล บุคคลที่ <?php echo $i ?></h5>
                                                                    <input type="hidden" id="VT_FM_ID<?php echo $i; ?>" value="<?php echo $res['VT_FM_ID'] ?>">
                                                                    <input type="hidden" id="VT_ID<?php echo $i; ?>" value="<?php echo $res['VT_ID'] ?>">
                                                                    <hr>
                                                                    <div class="form-group row m-b-12">
                                                                        <label class="col-lg-2 text-lg-right col-form-label">คำนำหน้าชื่อ <span class="text-danger">*</span></label>
                                                                        <div class="col-lg-2 col-xl-1">
                                                                            <input type="text" name="VT_FM_TITLE[<?php echo $i ?>]" id="VT_FM_TITLE<?php echo $i ?>" placeholder="คำนำหน้าชื่อ" data-parsley-group="step-1" class="form-control" value="<?php echo $res['VT_FM_TITLE'] ?>" />
                                                                        </div>

                                                                        <label class="col-lg-1 text-lg-right col-form-label">ชื่อ <span class="text-danger">*</span></label>
                                                                        <div class="col-lg-2 col-xl-3">
                                                                            <input type="text" name="VT_FM_NAME[<?php echo $i ?>]" id="VT_FM_NAME<?php echo $i ?>" placeholder="ชื่อ" data-parsley-group="step-1" class="form-control" value="<?php echo $res['VT_FM_NAME'] ?>" />
                                                                        </div>
                                                                        <label class="col-lg-1 text-lg-right col-form-label">นามสกุล <span class="text-danger">*</span></label>
                                                                        <div class="col-lg-2 col-xl-3">
                                                                            <input type="text" id="VT_FM_LNAME<?php echo $i ?>" name="VT_FM_LNAME[<?php echo $i ?>]" placeholder="นามสกุล" data-parsley-group="step-1" class="form-control" value="<?php echo $res['VT_FM_LNAME'] ?>" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row m-b-12">
                                                                        <label class="col-lg-2 text-lg-right col-form-label">วันเดือนปีเกิด <span class="text-danger">*</span></label>
                                                                        <div class="col-lg-2 col-xl-2">
                                                                            <input type="date" name="VT_FM_BRITH_DATE[<?php echo $i ?>]" id="VT_FM_BRITH_DATE<?php echo $i ?>" data-parsley-group="step-1" class="form-control" value="<?php echo $res['VT_FM_BRITH_DATE'] ?>" />
                                                                        </div>

                                                                        <label class="col-lg-1 text-lg-right col-form-label">อายุ <span class="text-danger">*</span></label>
                                                                        <div class="col-lg-2 col-xl-2">
                                                                            <input type="number" name="VT_FM_AGE[<?php echo $i ?>]" id="VT_FM_AGE<?php echo $i ?>" placeholder="อายุ" data-parsley-group="step-1" class="form-control" value="<?php echo $res['VT_FM_AGE'] ?>" />
                                                                        </div>
                                                                        <label class="col-lg-1 text-lg-right col-form-label">เกี่ยวข้องเป็น <span class="text-danger">*</span></label>
                                                                        <div class="col-lg-9 col-xl-3">
                                                                            <div class="row row-space-6">
                                                                                <div class="col-12">
                                                                                    <select class="form-control" name="VT_FM_RELATION[<?php echo $i ?>]" id="VT_FM_RELATION<?php echo $i ?>">
                                                                                        <option>เลือกความสัมพันธ์</option>
                                                                                        <option value="บิดา" <?php echo $res['VT_FM_RELATION'] == 'บิดา' ? 'selected' : '' ?>>บิดา</option>
                                                                                        <option value="มารดา" <?php echo $res['VT_FM_RELATION'] == 'มารดา' ? 'selected' : '' ?>>มารดา</option>
                                                                                        <option value="สามี" <?php echo $res['VT_FM_RELATION'] == 'สามี' ? 'selected' : '' ?>>สามี</option>
                                                                                        <option value="ภรรยา" <?php echo $res['VT_FM_RELATION'] == 'ภรรยา' ? 'selected' : '' ?>>ภรรยา</option>
                                                                                        <option value="บุตร" <?php echo $res['VT_FM_RELATION'] == 'บุตร' ? 'selected' : '' ?>>บุตร</option>
                                                                                        <option value="บุตรบุญธรรม" <?php echo $res['VT_FM_RELATION'] == 'บุตรบุญธรรม' ? 'selected' : '' ?>>บุตรบุญธรรม</option>

                                                                                    </select>
                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="form-group row m-b-12">
                                                                        <label class="col-lg-2 text-lg-right col-form-label">เพศ <span class="text-danger">*</span></label>
                                                                        <div class="col-lg-2 col-xl-2">
                                                                            <select name="VT_SEX[<?php echo $i ?>]" id="VT_SEX<?php echo $i ?>" class="form-control">
                                                                                <option value="ไม่ระบุ">ไม่ระบุ</option>
                                                                                <option value="ชาย" <?php echo $res['VT_SEX'] == "ชาย" ? 'selected' : '' ?>>ชาย</option>
                                                                                <option value="หญิง" <?php echo $res['VT_SEX'] == "หญิง" ? 'selected' : '' ?>>หญิง</option>
                                                                            </select>
                                                                        </div>

                                                                        <label class="col-lg-1 text-lg-right col-form-label">เลขบัตรประชาชน <span class="text-danger">*</span></label>
                                                                        <div class="col-lg-2 col-xl-2">
                                                                            <input type="text" name="VT_FM_IDCARD[<?php echo $i ?>]" id="VT_FM_IDCARD<?php echo $i ?>" class="form-control" value="<?php echo $res['VT_FM_IDCARD'] ?>">
                                                                        </div>

                                                                        <label class="col-lg-1 text-lg-right col-form-label">สถานะการมีชีวิต <span class="text-danger">*</span></label>
                                                                        <div class="col-lg-2 col-xl-2">
                                                                            <select name="VT_FM_ALIVE[<?php echo $i ?>]" id="VT_FM_ALIVE<?php echo $i ?>" class="form-control">

                                                                                <option value="1" <?php echo $res['VT_FM_ALIVE'] == "1" ? 'selected' : '' ?>>มีชิวิต</option>
                                                                                <option value="0" <?php echo $res['VT_FM_ALIVE'] == "0" ? 'selected' : '' ?>>ไม่มีชีวิต</option>
                                                                            </select>
                                                                        </div>


                                                                        <div class="col-12" style="text-align: center;">
                                                                            <button type="button" class="btn btn-primary" onclick="update(<?php echo $i ?>);">บันทึกการแก้ไข</button>
                                                                        </div>

                                                                    </div>



                                                                </div>

                                                            <?php $i++;
                                                            } ?>

                                                            <div class="col-md-12" style="text-align: center;">
                                                                <hr>
                                                                <label class="col-lg-3 text-lg-right col-form-label">เลือกจำนวนบุคคลภายในครอบครัว </label>
                                                                <select name="select_family" id="select_family" data-parsley-group="step-1" class="form-control" onchange="loop_family(this.value)">
                                                                    <?php
                                                                    for ($i = 0; $i < 8; $i++) {
                                                                    ?>
                                                                        <option value="<?php echo $i + 1  ?>"><?php echo $i + 1 ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>

                                                                </select>
                                                                <br>
                                                            </div>



                                                            <form id="form_add" method="post">

                                                                <input type="hidden" name="VT_ID_ADD" value=" <?php echo $resss; ?>">
                                                                <div class="family_class">

                                                                    <h5> บุคคลที่ 1</h5>
                                                                    <hr>

                                                                    <div class="form-group row m-b-12">
                                                                        <label class="col-lg-2 text-lg-right col-form-label">คำนำหน้าชื่อ <span class="text-danger">*</span></label>
                                                                        <div class="col-lg-2 col-xl-1">
                                                                            <input type="text" name="VT_FM_TITLE_ADD[1]" placeholder="คำนำหน้าชื่อ" data-parsley-group="step-1" class="form-control" />
                                                                        </div>

                                                                        <label class="col-lg-1 text-lg-right col-form-label">ชื่อ <span class="text-danger">*</span></label>
                                                                        <div class="col-lg-2 col-xl-3">
                                                                            <input type="text" name="VT_FM_NAME_ADD[1]" placeholder="ชื่อ" data-parsley-group="step-1" class="form-control" />
                                                                        </div>
                                                                        <label class="col-lg-1 text-lg-right col-form-label">นามสกุล <span class="text-danger">*</span></label>
                                                                        <div class="col-lg-2 col-xl-3">
                                                                            <input type="text" name="VT_FM_LNAME_ADD[1]" placeholder="นามสกุล" data-parsley-group="step-1" class="form-control" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row m-b-12">
                                                                        <label class="col-lg-2 text-lg-right col-form-label">วันเดือนปีเกิด <span class="text-danger">*</span></label>
                                                                        <div class="col-lg-2 col-xl-2">
                                                                            <input type="date" name="VT_FM_BRITH_DATE_ADD[1]" data-parsley-group="step-1" class="form-control" />
                                                                        </div>

                                                                        <label class="col-lg-1 text-lg-right col-form-label">อายุ <span class="text-danger">*</span></label>
                                                                        <div class="col-lg-2 col-xl-2">
                                                                            <input type="number" name="VT_FM_AGE_ADD[1]" placeholder="อายุ" data-parsley-group="step-1" class="form-control" />
                                                                        </div>
                                                                        <label class="col-lg-1 text-lg-right col-form-label">เกี่ยวข้องเป็น <span class="text-danger">*</span></label>
                                                                        <div class="col-lg-9 col-xl-3">
                                                                            <div class="row row-space-6">
                                                                                <div class="col-7">
                                                                                    <select class="form-control" name="VT_FM_RELATION_ADD[1]">
                                                                                        <option>เลือกความสัมพันธ์</option>
                                                                                        <option value="บิดา">บิดา</option>
                                                                                        <option value="มารดา">มารดา</option>
                                                                                        <option value="สามี">สามี</option>
                                                                                        <option value="ภรรยา">ภรรยา</option>
                                                                                        <option value="บุตร">บุตร</option>
                                                                                        <option value="บุตรบุญธรรม">บุตรบุญธรรม</option>

                                                                                    </select>
                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="form-group row m-b-12">
                                                                        <label class="col-lg-2 text-lg-right col-form-label">เพศ <span class="text-danger">*</span></label>
                                                                        <div class="col-lg-2 col-xl-2">
                                                                            <select name="VT_SEX_ADD[1]" class="form-control">
                                                                                <option value="ไม่ระบุ">ไม่ระบุ</option>
                                                                                <option value="ชาย">ชาย</option>
                                                                                <option value="หญิง">หญิง</option>
                                                                            </select>
                                                                        </div>

                                                                        <label class="col-lg-1 text-lg-right col-form-label">เลขบัตรประชาชน <span class="text-danger">*</span></label>
                                                                        <div class="col-lg-2 col-xl-2">
                                                                            <input type="text" name="VT_FM_IDCARD_ADD[1]" class="form-control">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </form>

                                                        </div>
                                                        <!-- ถ้าต้องการ data-parsley-required="true" -->


                                                        <!-- end col-8 -->
                                                    </div>
                                                </div>
                                                <!-- end row -->
                                            </fieldset>
                                            <!-- end fieldset -->
                                        </div>
                                        <!-- end step-2 -->

                                    </form>
                                </div>

                                <!-- end wizard-content -->
                            </div>
                            <!-- end wizard -->

                            <!-- end wizard-form -->

                        </form>

                    </div>
                </div>
                <!-- end page-header -->
                <!-- begin wizard-form -->

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
            <script src="../assets/plugins/parsleyjs/dist/parsley.js"></script>
            <script src="../assets/plugins/smartwizard/dist/js/jquery.smartWizard.js"></script>
            <script src="../assets/js/demo/form-wizards-validation.demo.js"></script>
            <!-- ================== END PAGE LEVEL JS ================== -->
            <script>
                const loop_family = (c) => {
                    $.ajax({
                        type: "GET",
                        url: "loop_form_register_add.php",
                        data: 'count=' + c,
                        cache: false,
                        success: function(data) {
                            $(".family_class").html(data);
                        }
                    });
                }

                function submit_order(id) {
                    window.location = "vtp_edit_form_sub.php?id=" + id
                }


                function update(id) {


                    $.ajax({
                        type: "POST",
                        url: "vtp_edit_form_sub_db.php",
                        data: {
                            VT_FM_TITLE: $('#VT_FM_TITLE' + id).val(),
                            VT_FM_NAME: $('#VT_FM_NAME' + id).val(),
                            VT_FM_LNAME: $('#VT_FM_LNAME' + id).val(),
                            VT_FM_BRITH_DATE: $('#VT_FM_BRITH_DATE' + id).val(),
                            VT_FM_AGE: $('#VT_FM_AGE' + id).val(),
                            VT_FM_RELATION: $('#VT_FM_RELATION' + id).val(),
                            VT_SEX: $('#VT_SEX' + id).val(),
                            VT_FM_IDCARD: $('#VT_FM_IDCARD' + id).val(),
                            VT_ID: $('#VT_ID' + id).val(),
                            VT_FM_ID: $('#VT_FM_ID' + id).val(),
                            VT_FM_ALIVE : $('#VT_FM_ALIVE'+id).val()
                        },
                        cache: false,
                        success: function(data) {
                            swal("แก้ไขรายการสำเร็จ", "", "success");
                            // setTimeout(function() {
                            //     window.location = "vtp_edit_form_sub.php?id=" + $('#m_id').val()
                            // }, 3000);
                        }
                    });

                }
            </script>
    </body>

    </html>

<?php
} else {
    header('Location: login.php');
}

?>