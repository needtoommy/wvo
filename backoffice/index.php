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
		<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
		<link href="../assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
		<link href="../assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
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

							<li <?php echo $_GET['type'] == 8 ? 'class="active"' : '' ?>>
								<a href="vs_pay_m.php?type=8">
									<i class="fa fa-edit"></i>
									<span>จ่ายเงินรายเดือน</span>
								</a>
							</li>

							<li <?php echo $_GET['type'] == 9 ? 'class="active"' : '' ?>>
								<a href="death_list.php?type=9">
									<i class="fa fa-edit"></i>
									<span>บันทึกการสงเคราะห์กรณีถึงแก่ความตาย</span>
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

							<li class="has-sub">
								<a href="#">
									<i class="fa fa-edit"></i>
									<span>จัดการประสบภัยพิบัตร</span>
								</a>
								<ul class="sub-menu">
									<li><a href="view_disa_request.php">งานที่ต้องไปสำรวจ</a></li>
                                
                                    <li><a href="assign_em_search_add.php">เพิ่มคำร้อง</a></li>
                                </ul>
								
								</ul>
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

				<?php

				if ($_SESSION['m_level'] !== 'admin') {
				?>
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
									<a href="index.php?type=<?php echo $_GET['type'] ?>&level=vsofficer&status=1">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
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
									<a  href="index.php?type=<?php echo $_GET['type'] ?>&level=vsofficer&status=3">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
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
									<a  href="index.php?type=<?php echo $_GET['type'] ?>&level=vsofficer&status=5">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
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
									<a  href="index.php?type=<?php echo $_GET['type'] ?>&level=vsofficer&status=8">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
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
									<a  href="index.php?type=<?php echo $_GET['type'] ?>&level=vsofficer&status=7">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
								</div>
							</div>
						</div>
						<!-- end col-3 -->
					</div>

				<?php } ?>
				<!-- end row -->
				<!-- begin row -->
				<div class="row">
					<?php

					$_SESSION['level'] = $_GET['level'];
					$_GET['type'] . $_GET['level'];



					if ($_SESSION['m_level'] == 'admin') {
					?>

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

									<table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">

										<!--<table class="table table-striped table-bordered table-td-valign-middle">-->
										<thead>
											<tr>
												<td>#</td>
												<td>ชื่อ-นามสกุล</td>
												<td>ชื่อบัญชีผู้ใช้</td>
												<td>สิทธิ์ผู้ใช้งาน</td>
											</tr>
										</thead>
										<tbody>
											<?php
											$sql = "SELECT * FROM tbl_member ORDER BY m_id DESC";
											$db->Execute($sql);
											$i = 1;
											while ($res = $db->getData()) {
											?>
												<tr>
													<td><?php echo $i ?></td>
													<td><?php echo $res['m_fname'] . ' ' . $res['m_name'] . ' ' . $res['m_lname'] ?></td>
													<td><?php echo $res['m_username'] ?></td>
													<td><?php echo $res['m_level'] ?></td>
												</tr>
											<?php
												$i++;
											}
											?>

										</tbody>
									</table>
								</div>
							</div>
						</div>

					<?php
					} else {
						include "check_form.php";
					}


					?>
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
		<script src="../assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
		<script src="../assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
		<script src="../assets/js/demo/table-manage-default.demo.js"></script>

		<!-- ================== END PAGE LEVEL JS ================== -->
	</body>

	</html>
<?php
} else {
	header('Location: login.php');
}
?>