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
                <!-- begin breadcrumb -->
                <!--<ol class="breadcrumb float-xl-right">
					<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
					<li class="breadcrumb-item"><a href="javascript:;">Form Stuff</a></li>
					<li class="breadcrumb-item active">Wizards + Validation</li>
				</ol> -->
                <!-- end breadcrumb -->
                <!-- begin page-header -->
                <h1 class="page-header">ค้นหาประวัติทหารผ่านศึก</h1>
                <div class="row">
                    <div class="col-md-12">
                        <!-- begin panel -->
                        <div class="panel panel-inverse" data-sortable-id="ui-general-2">
                            <!-- begin panel-heading -->
                            <div class="panel-heading">
                                <div class="panel-heading-btn">
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                            <!-- end panel-heading -->
                            <!-- begin panel-body -->
                            <div class="panel-body">

                                <div class="row row-space-10">
                                    <div class="col-md-3">
                                        <label for="">ชั้นบัตร</label>
                                        <select name="VT_CARD_STEP" id="VT_CARD_STEP" class="form-control">
                                            <option value="">ทั้งหมด</option>
                                            <option value="1ท.">1ท.</option>
                                            <option value="1ค.">1ค.</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="3ป.">3ป.</option>
                                            <option value="4">4</option>
                                            <option value="4ป.">4ป.</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="">เลขที่บัตร</label>
                                        <input type="text" name="VT_CARD_NO" id="VT_CARD_NO" class="form-control">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="">ชื่อ</label>
                                        <input type="text" name="firstname" id="firstname" class="form-control">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="">นามสกุล</label>
                                        <input type="text" name="lastname" id="lastname" class="form-control">
                                    </div>
                                    <div class="col-md-12 mt-3" style="text-align: center;">
                                        <button type="botton" class="btn btn-primary" onclick="search()">ค้นหา</button>
                                    </div>

                                    <input type="hidden" name="type" id="type" value="<?php $_GET['type'] ?>">

                                    <div class="col-md-12 mt-2">
                                        <table id="data-table-fixed-columns" class="table table-striped table-bordered table-td-valign-middle">
                                            <thead>
                                                <tr>
                                                    <th width="10%">ชั้นบัตร</th>
                                                    <th width="30%">เลขที่บัตร</th>
                                                    <th width="30%" class="text-nowrap">ชื่อ-สกุล</th>
                                                    <th width="30%" class="text-nowrap">อายุ</th>
                                                    <th width="3%"></th>
                                                </tr>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $sql = "SELECT * from veteran where VT_ALIVE <>0";
                                                if ($_GET['VT_CARD_STEP'] != "") {
                                                    $VT_CARD_STEP = $_GET['VT_CARD_STEP'];
                                                    $sql .= " and VT_CARD_STEP = '$VT_CARD_STEP'";
                                                }
                                                if ($_GET['VT_CARD_NO'] != "") {
                                                    $VT_CARD_NO = $_GET['VT_CARD_NO'];
                                                    $sql .= " and VT_CARD_NO = '$VT_CARD_NO'";
                                                }
                                                if ($_GET['firstname'] != "") {
                                                    $firstname = $_GET['firstname'];
                                                    $sql .= " and VT_FNAME = '$firstname'";
                                                }
                                                if ($_GET['lastname'] != "") {
                                                    $lastname = $_GET['lastname'];
                                                    $sql .= " and VT_LNAME = '$lastname'";
                                                }
                                                $db->Execute($sql);
                                                while ($res = $db->getData()) {
                                                ?>

                                                    <!-- begin panel-body -->
                                                    <tr>
                                                        <input type="hidden" id="m_id" name="m_id" value="<?php echo $res['m_id'] ?>">
                                                        <td> <?php echo $res['VT_CARD_STEP'] ?></td>
                                                        <td><?php echo $res['VT_CARD_NO'] ?></td>
                                                        <td><?php echo $res['VT_TITLE'] . $res['VT_FNAME'] . ' ' . $res['VT_LNAME'] ?></td>
                                                        <td><?php echo (date('Y') + 543) - explode("/", $res['VT_BRITH_DATE'])[2]; ?></td>
                                                        <td>
                                                            <button onclick="submit_order(<?php echo $res['m_id'] ?>)" type="submit" class="btn btn-warning">เลือก</button>
                                                        </td>
                                                    </tr>
                                                <?php

                                                }

                                                ?>

                                            </tbody>
                                        </table>

                                    </div>

                                </div>
                            </div>
                        </div>
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
                        url: "loop_form_register.php",
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
            </script>
    </body>

    </html>

<?php
} else {
    header('Location: login.php');
}

?>