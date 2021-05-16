<?php
session_start();
if ($_SESSION['PERMISSION'] == 'KORN') {

    include '../connect/db.php';
    $db = new DB();

    $level = $_SESSION['m_level'];

    if ($_POST['m_name']) {
        $m_name = $_POST['m_name'];
        $m_lname = $_POST['m_lname'];
        $p_id = $_POST['p_id'];
        $m_level = $_POST['m_level'];
        $m_role = $_POST['m_role'];
        $m_memo = $_POST['m_memo'];
        $id = $_POST['id'];

        $sql = "UPDATE tbl_member SET m_name='$m_name', m_lname='$m_lname',ref_p_id='$p_id', m_level='$m_level', m_role='$m_role', m_memo='$m_memo'  WHERE m_id=$id";
        $db->Execute($sql);
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Color Admin | Dashboard</title>
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
        <!-- <link href="../assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" /> -->
        <link href="../assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
        <link href="../assets/plugins/datatables.net-fixedcolumns-bs4/css/fixedcolumns.bootstrap4.min.css" rel="stylesheet" />
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
                            <img src="../assets/img/user/user-13.jpg" alt="" />
                            <span class="d-none d-md-inline"><?php
                                                                $sql = "SELECT * FROM tbl_member WHERE m_id = " . $_SESSION['m_id'] . " AND m_alive <> 0";
                                                                $db->Execute($sql);
                                                                $res = $db->getData();
                                                                echo $res['m_name'];
                                                                // print_r($res);
                                                                ?></span> <b class="caret"></b>
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
                                    <img src="../assets/img/user/user-13.jpg" alt="" />
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
                        <li class="nav-header">Navigation</li>


                        <!-- --------------****Start******-------------------- -->
                        <?php
                        if ($level == "admin") {
                        ?>
                            <li class="has-sub active">
                                <a href="calendar.html">
                                    <i class="fa fa-edit"></i>
                                    <span> จัดการบัญชีผู้ใช้</span>
                                </a>
                                <ul class="sub-menu">
                                    <li <?php echo $_GET['tab'] == 1 ? 'class="active"' : '' ?>><a href="admin_tab1.php?tab=1">จัดการบัญชีผู้ใช้(พนักงาน)</a></li>
                                    <li <?php echo $_GET['tab'] == 2 ? 'class="active"' : '' ?>><a href="admin_tab2.php?tab=2">จัดการบัญชีผู้ใช้(ทหารผ่านศึก)</a></li>

                                </ul>
                            </li>
                            <li class="has-sub <?php echo $_GET['type'] == "manage_assist" ? 'active' : '' ?>">
                                <a href="manage_assist.php?type=manage_assist">
                                    <i class="fa fa-edit"></i>
                                    <span>จัดการวงเงินสงเคราะห์</span>
                                </a>
                            </li>


                            <li class="has-sub active">
                                <a href="calendar.html">
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


                        <!--
						<li class="has-sub active">
							<a href="javascript:;">
								<b class="caret"></b>
								<i class="fa fa-th-large"></i>
								<span>Dashboard</span>
							</a>
							<ul class="sub-menu">
								<li class="active"><a href="index.html">Dashboard v1</a></li>
								<li><a href="index_v2.html">Dashboard v2</a></li>
								<li><a href="index_v3.html">Dashboard v3</a></li>
							</ul>
						</li>
						<li class="has-sub">
							<a href="javascript:;">
								<span class="badge pull-right">10</span>
								<i class="fa fa-hdd"></i>
								<span>Email</span>
							</a>
							<ul class="sub-menu">
								<li><a href="email_inbox.html">Inbox</a></li>
								<li><a href="email_compose.html">Compose</a></li>
								<li><a href="email_detail.html">Detail</a></li>
							</ul>
						</li>
						<li>
							<a href="widget.html">
								<i class="fab fa-simplybuilt"></i>
								<span>Widgets <span class="label label-theme">NEW</span></span>
							</a>
						</li>
						<li class="has-sub">
							<a href="javascript:;">
								<b class="caret"></b>
								<i class="fa fa-gem"></i>
								<span>UI Elements <span class="label label-theme">NEW</span></span>
							</a>
							<ul class="sub-menu">
								<li><a href="ui_general.html">General <i class="fa fa-paper-plane text-theme"></i></a></li>
								<li><a href="ui_typography.html">Typography</a></li>
								<li><a href="ui_tabs_accordions.html">Tabs & Accordions</a></li>
								<li><a href="ui_unlimited_tabs.html">Unlimited Nav Tabs</a></li>
								<li><a href="ui_modal_notification.html">Modal & Notification <i class="fa fa-paper-plane text-theme"></i></a></li>
								<li><a href="ui_widget_boxes.html">Widget Boxes</a></li>
								<li><a href="ui_media_object.html">Media Object</a></li>
								<li><a href="ui_buttons.html">Buttons <i class="fa fa-paper-plane text-theme"></i></a></li>
								<li><a href="ui_icons.html">Icons</a></li>
								<li><a href="ui_simple_line_icons.html">Simple Line Icons</a></li>
								<li><a href="ui_ionicons.html">Ionicons</a></li>
								<li><a href="ui_tree.html">Tree View</a></li>
								<li><a href="ui_language_bar_icon.html">Language Bar & Icon</a></li>
								<li><a href="ui_social_buttons.html">Social Buttons</a></li>
								<li><a href="ui_tour.html">Intro JS</a></li>
							</ul>
						</li>
						<li>
							<a href="bootstrap_4.html">
								<div class="icon-img">
									<img src="../assets/img/logo/logo-bs4.png" alt="" />
								</div>
								<span>Bootstrap 4 <span class="label label-theme">NEW</span></span>
							</a>
						</li>
						<li class="has-sub">
							<a href="javascript:;">
								<b class="caret"></b>
								<i class="fa fa-list-ol"></i>
								<span>Form Stuff <span class="label label-theme">NEW</span></span>
							</a>
							<ul class="sub-menu">
								<li><a href="form_elements.html">Form Elements <i class="fa fa-paper-plane text-theme"></i></a></li>
								<li><a href="form_plugins.html">Form Plugins <i class="fa fa-paper-plane text-theme"></i></a></li>
								<li><a href="form_slider_switcher.html">Form Slider + Switcher</a></li>
								<li><a href="form_validation.html">Form Validation</a></li>
								<li><a href="form_wizards.html">Wizards</a></li>
								<li><a href="form_wizards_validation.html">Wizards + Validation</a></li>
								<li><a href="form_wysiwyg.html">WYSIWYG</a></li>
								<li><a href="form_editable.html">X-Editable</a></li>
								<li><a href="form_multiple_upload.html">Multiple File Upload</a></li>
								<li><a href="form_summernote.html">Summernote</a></li>
								<li><a href="form_dropzone.html">Dropzone</a></li>
							</ul>
						</li>
						<li class="has-sub">
							<a href="javascript:;">
								<b class="caret"></b>
								<i class="fa fa-table"></i>
								<span>Tables</span>
							</a>
							<ul class="sub-menu">
								<li><a href="table_basic.html">Basic Tables</a></li>
								<li class="has-sub">
									<a href="javascript:;"><b class="caret"></b> Managed Tables</a>
									<ul class="sub-menu">
										<li><a href="table_manage.html">Default</a></li>
										<li><a href="table_manage_autofill.html">Autofill</a></li>
										<li><a href="table_manage_buttons.html">Buttons</a></li>
										<li><a href="table_manage_colreorder.html">ColReorder</a></li>
										<li><a href="table_manage_fixed_columns.html">Fixed Column</a></li>
										<li><a href="table_manage_fixed_header.html">Fixed Header</a></li>
										<li><a href="table_manage_keytable.html">KeyTable</a></li>
										<li><a href="table_manage_responsive.html">Responsive</a></li>
										<li><a href="table_manage_rowreorder.html">RowReorder</a></li>
										<li><a href="table_manage_scroller.html">Scroller</a></li>
										<li><a href="table_manage_select.html">Select</a></li>
										<li><a href="table_manage_combine.html">Extension Combination</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li class="has-sub">
							<a href="javascript:;">
								<b class="caret"></b>
								<i class="fa fa-star"></i>
								<span>Front End</span>
							</a>
							<ul class="sub-menu">
								<li><a href="../../../frontend/template/template_one_page_parallax/index.html" target="_blank">One Page Parallax</a></li>
								<li><a href="../../../frontend/template/template_blog/index.html" target="_blank">Blog</a></li>
								<li><a href="../../../frontend/template/template_forum/index.html" target="_blank">Forum</a></li>
								<li><a href="../../../frontend/template/template_e_commerce/index.html" target="_blank">E-Commerce</a></li>
							</ul>
						</li>
						<li class="has-sub">
							<a href="javascript:;">
								<b class="caret"></b>
								<i class="fa fa-envelope"></i>
								<span>Email Template</span>
							</a>
							<ul class="sub-menu">
								<li><a href="email_system.html">System Template</a></li>
								<li><a href="email_newsletter.html">Newsletter Template</a></li>
							</ul>
						</li>
						<li class="has-sub">
							<a href="javascript:;">
								<b class="caret"></b>
								<i class="fa fa-chart-pie"></i>
								<span>Chart <span class="label label-theme">NEW</span></span>
							</a>
							<ul class="sub-menu">
								<li><a href="chart-flot.html">Flot Chart</a></li>
								<li><a href="chart-morris.html">Morris Chart</a></li>
								<li><a href="chart-js.html">Chart JS</a></li>
								<li><a href="chart-d3.html">d3 Chart</a></li>
								<li><a href="chart-apex.html">Apex Chart <i class="fa fa-paper-plane text-theme"></i></a></li>
							</ul>
						</li>
						<li>
							<a href="calendar.html">
								<i class="fa fa-calendar"></i>
								<span>Calendar</span>
							</a>
						</li>
						<li class="has-sub">
							<a href="javascript:;">
								<b class="caret"></b>
								<i class="fa fa-map"></i>
								<span>Map</span>
							</a>
							<ul class="sub-menu">
								<li><a href="map_vector.html">Vector Map</a></li>
								<li><a href="map_google.html">Google Map</a></li>
							</ul>
						</li>
						<li class="has-sub">
							<a href="javascript:;">
								<b class="caret"></b>
								<i class="fa fa-image"></i>
								<span>Gallery</span>
							</a>
							<ul class="sub-menu">
								<li><a href="gallery.html">Gallery v1</a></li>
								<li><a href="gallery_v2.html">Gallery v2</a></li>
							</ul>
						</li>
						<li class="has-sub">
							<a href="javascript:;">
								<b class="caret"></b>
								<i class="fa fa-cogs"></i>
								<span>Page Options <span class="label label-theme">NEW</span></span>
							</a>
							<ul class="sub-menu">
								<li><a href="page_blank.html">Blank Page</a></li>
								<li><a href="page_with_footer.html">Page with Footer</a></li>
								<li><a href="page_without_sidebar.html">Page without Sidebar</a></li>
								<li><a href="page_with_right_sidebar.html">Page with Right Sidebar</a></li>
								<li><a href="page_with_minified_sidebar.html">Page with Minified Sidebar</a></li>
								<li><a href="page_with_two_sidebar.html">Page with Two Sidebar</a></li>
								<li><a href="page_with_line_icons.html">Page with Line Icons</a></li>
								<li><a href="page_with_ionicons.html">Page with Ionicons</a></li>
								<li><a href="page_full_height.html">Full Height Content</a></li>
								<li><a href="page_with_wide_sidebar.html">Page with Wide Sidebar</a></li>
								<li><a href="page_with_light_sidebar.html">Page with Light Sidebar</a></li>
								<li><a href="page_with_mega_menu.html">Page with Mega Menu</a></li>
								<li><a href="page_with_top_menu.html">Page with Top Menu</a></li>
								<li><a href="page_with_boxed_layout.html">Page with Boxed Layout</a></li>
								<li><a href="page_with_mixed_menu.html">Page with Mixed Menu</a></li>
								<li><a href="page_boxed_layout_with_mixed_menu.html">Boxed Layout with Mixed Menu</a></li>
								<li><a href="page_with_transparent_sidebar.html">Page with Transparent Sidebar</a></li>
								<li><a href="page_with_search_sidebar.html">Page with Search Sidebar <i class="fa fa-paper-plane text-theme"></i></a></li>
							</ul>
						</li>
						<li class="has-sub">
							<a href="javascript:;">
								<b class="caret"></b>
								<i class="fa fa-gift"></i>
								<span>Extra <span class="label label-theme">NEW</span></span>
							</a>
							<ul class="sub-menu">
								<li><a href="extra_timeline.html">Timeline</a></li>
								<li><a href="extra_coming_soon.html">Coming Soon Page</a></li>
								<li><a href="extra_search_results.html">Search Results</a></li>
								<li><a href="extra_invoice.html">Invoice</a></li>
								<li><a href="extra_404_error.html">404 Error Page</a></li>
								<li><a href="extra_profile.html">Profile Page</a></li>
								<li><a href="extra_scrum_board.html">Scrum Board <i class="fa fa-paper-plane text-theme"></i></a></li>
								<li><a href="extra_cookie_acceptance_banner.html">Cookie Acceptance Banner <i class="fa fa-paper-plane text-theme"></i></a></li>
							</ul>
						</li>
						<li class="has-sub">
							<a href="javascript:;">
								<b class="caret"></b>
								<i class="fa fa-key"></i>
								<span>Login & Register</span>
							</a>
							<ul class="sub-menu">
								<li><a href="login.html">Login</a></li>
								<li><a href="login_v2.html">Login v2</a></li>
								<li><a href="login_v3.html">Login v3</a></li>
								<li><a href="register_v3.html">Register v3</a></li>
							</ul>
						</li>
						<li class="has-sub">
							<a href="javascript:;">
								<b class="caret"></b>
								<i class="fa fa-cubes"></i>
								<span>Version <span class="label label-theme">NEW</span></span>
							</a>
							<ul class="sub-menu">
								<li><a href="../template_html/index_v3.html">HTML</a></li>
								<li><a href="../template_ajax/">AJAX</a></li>
								<li><a href="../template_angularjs/">ANGULAR JS</a></li>
								<li><a href="../template_angularjs8/">ANGULAR JS 8</a></li>
								<li><a href="../template_laravel/">LARAVEL</a></li>
								<li><a href="../template_vuejs/">VUE JS</a></li>
								<li><a href="../template_reactjs/">REACT JS</a></li>
								<li><a href="../template_material/index_v3.html">MATERIAL DESIGN</a></li>
								<li><a href="../template_apple/index_v3.html">APPLE DESIGN</a></li>
								<li><a href="../template_transparent/index_v3.html">TRANSPARENT DESIGN <i class="fa fa-paper-plane text-theme"></i></a></li>
								<li><a href="../template_facebook/index_v3.html">FACEBOOK DESIGN <i class="fa fa-paper-plane text-theme"></i></a></li>
								<li><a href="../template_google/index_v3.html">GOOGLE DESIGN <i class="fa fa-paper-plane text-theme"></i></a></li>
							</ul>
						</li>
						<li class="has-sub">
							<a href="javascript:;">
								<b class="caret"></b>
								<i class="fa fa-medkit"></i>
								<span>Helper</span>
							</a>
							<ul class="sub-menu">
								<li><a href="helper_css.html">Predefined CSS Classes</a></li>
							</ul>
						</li>
						<li class="has-sub">
							<a href="javascript:;">
								<b class="caret"></b>
								<i class="fa fa-align-left"></i>
								<span>Menu Level</span>
							</a>
							<ul class="sub-menu">
								<li class="has-sub">
									<a href="javascript:;">
										<b class="caret"></b>
										Menu 1.1
									</a>
									<ul class="sub-menu">
										<li class="has-sub">
											<a href="javascript:;">
												<b class="caret"></b>
												Menu 2.1
											</a>
											<ul class="sub-menu">
												<li><a href="javascript:;">Menu 3.1</a></li>
												<li><a href="javascript:;">Menu 3.2</a></li>
											</ul>
										</li>
										<li><a href="javascript:;">Menu 2.2</a></li>
										<li><a href="javascript:;">Menu 2.3</a></li>
									</ul>
								</li>
								<li><a href="javascript:;">Menu 1.2</a></li>
								<li><a href="javascript:;">Menu 1.3</a></li>
							</ul>
						</li>
						 begin sidebar minify button -->


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


                <!-- begin row -->
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

                                <h3>แก้ไขบัญชีผู้ใช้</h3>
                                <hr>
                                <?php
                                $id = $_GET['id'];
                                $sql = "SELECT * FROM tbl_member a, tbl_position b WHERE a.ref_p_id=b.p_id and a.m_role=1 and m_id=$id";
                                $db->Execute($sql);
                                $res = $db->getData();
                                $m_level = $res['m_level'];

                                ?>
                                <form action="#" method="POST">
                                    <input type="hidden" name="id" id="id" value="<?php echo $_GET['id'] ?>">
                                    <div class="form-group row m-b-15">
                                        <label class="col-form-label col-md-3">ชื่อบัญชีผู้ใช้</label>
                                        <div class="col-md-9">
                                            <input type="email" class="form-control m-b-5" value="<?php echo $res['m_username']; ?>" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group row m-b-15">
                                        <label class="col-form-label col-md-3">ชื่อ</label>
                                        <div class="col-md-9">
                                            <input type="text" name="m_name" id="m_name" class="form-control m-b-5" value="<?php echo $res['m_name']; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group row m-b-15">
                                        <label class="col-form-label col-md-3">นามสกุล</label>
                                        <div class="col-md-9">
                                            <input type="text" name="m_lname" id="m_lname" class="form-control m-b-5" value="<?php echo $res['m_lname']; ?>" />
                                        </div>
                                    </div>

                                    <div class="form-group row m-b-15">
                                        <label class="col-form-label col-md-3">ตำแหน่ง</label>
                                        <div class="col-md-9">
                                            <select name="p_id" id="p_id" class="form-control">
                                                <?php

                                                $sql = "SELECT * FROM tbl_position";
                                                $db->Execute($sql);
                                                while ($res = $db->getData()) {
                                                ?>
                                                    <option value="<?php echo $res['p_id']; ?>"><?php echo $res['p_name']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row m-b-15">
                                        <label class="col-form-label col-md-3">สิทธิ</label>
                                        <div class="col-md-9">
                                            <?php echo $res['m_level'] ?>
                                            <select name="m_level" id="m_level" class="form-control">
                                                <?php

                                                $sql = "SELECT m_level FROM tbl_member group by m_level";
                                                $db->Execute($sql);
                                                while ($res1 = $db->getData()) {
                                                ?>
                                                    <option value="<?php echo $res1['m_level']; ?>" <?php echo $res1['m_level'] == $m_level ? 'selected' : '' ?>><?php echo $res1['m_level']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <hr />
                                    <div class="form-group row m-b-15">
                                        <label class="col-form-label col-md-3">ยกเลิก <span style="color:red">กรณียกเลิกต้องระบุเหตุผล</span></label>
                                        <div class="col-md-9">
                                            <select name="m_role" id="m_role" class="form-control">

                                                <option value="1" <?php echo $res['m_level'] == 1 ? 'selected' : ''; ?>>เปิดสิทธิ</option>
                                                <option value="0" <?php echo $res['m_level'] == 2 ? 'selected' : ''; ?>>ระงับสิทธิ</option>

                                            </select>
                                        </div>
                                    </div>

                                    <input type="hidden" name="m_memo" id="m_memo">



                                </form>
                                <button style="display: inline-block;" type="button" class="btn btn-primary" onclick="submit()">ยืนยัน</button>
                            </div>
                        </div>
                        <!-- end panel-body -->

                    </div>

                </div>
                <!-- end row -->
            </div>
            <!-- end #content -->



            <!-- begin scroll to top btn -->
            <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
            <!-- end scroll to top btn -->
        </div>
        <!-- end page container -->
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เหตุผลยกเลิก</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-12">
                            <textarea name="" id="memo" cols="65" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        <button type="button" onclick="save_memo()" class="btn btn-primary">บันทึกเหตุผล</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================== BEGIN BASE JS ================== -->
        <script src="../assets/js/app.min.js"></script>
        <script src="../assets/js/theme/default.min.js"></script>
        <!-- ================== END BASE JS ================== -->

        <!-- ================== BEGIN PAGE LEVEL JS ================== -->
        <!-- <script src="../assets/plugins/gritter/js/jquery.gritter.js"></script> -->
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
        <script>
            function link(id) {
                window.location = "admin_tab1_sub.php?id=" + id
            }

            function submit() {

                if ($('#m_role').val() == 0) {

                    if ($('#m_memo').val() == "") {
                        $('#exampleModal').modal('show')
                        return false;
                        F
                    }

                }

                $.ajax({
                    type: "POST",
                    url: "admin_tab1_sub.php",
                    data: {
                        m_name: $('#m_name').val(),
                        m_lname: $('#m_lname').val(),
                        p_id: $('#p_id').val(),
                        m_level: $('#m_level').val(),
                        m_role: $('#m_role').val(),
                        m_memo: $("#m_memo").val(),
                        id: $('#id').val(),

                    },
                    success: function(data) {
                        swal('test', '', 'บันทึกเหตุผลสำเร็จ');
                        setTimeout(function(){window.location = "admin_tab1_sub.php?id=" + $('#id').val()}, 2000);
                        
                    }
                });


            }


            function save_memo() {
                $('#exampleModal').modal('hide')
                $('#m_memo').val($('#memo').val())
                swal('test', '', 'บันทึกเหตุผลยกเลิกสำเร็จ');

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