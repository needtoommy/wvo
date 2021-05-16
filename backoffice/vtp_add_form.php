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
									<li class="active"><a href="vtp_add_form.php?type=11&level=<?php echo $level ?>">เพิ่มประวัติทหารผ่านศึก</a></li>
									<li><a href="vtp_edit_form.php">ค้นหาประวัติทหารผ่านศึก</a></li>

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
				<h1 class="page-header">เพิ่มประวัติทหารผ่านศึก <small></small></h1>
				<!-- end page-header -->
				<!-- begin wizard-form -->
				<form action="vtp_add_form_db.php" method="POST" name="form-wizard" class="form-control-with-bg">
					<!-- begin wizard -->
					<div id="wizard">
						<!-- begin wizard-step -->
						<ul>
							<li>
								<a href="#step-1">
									<span class="number">1</span>
									<span class="info">
										บันทึกข้อมูลส่วนตัว
										<small></small>
									</span>
								</a>
							</li>
							<li>
								<a href="#step-2">
									<span class="number">2</span>
									<span class="info">
										บันทึกประวัติครอบครัว
										<small></small>
									</span>
								</a>
							</li>
							<li>
								<a href="#step-3">
									<span class="number">3</span>
									<span class="info">
										สร้างบัญชีผู้ใช้
										<small></small>
									</span>
								</a>
							</li>
							<li>
								<a href="#step-4">
									<span class="number">4</span>
									<span class="info">
										บันทึกรายกรเสร็จสิ้น
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

												<!-- ถ้าต้องการ data-parsley-required="true" -->

												<!-- begin form- กรอกประวัติ-->
												<div class="form-group row m-b-12">
													<label class="col-lg-2 text-lg-right col-form-label">คำนำหน้าชื่อ <span class="text-danger">*</span></label>
													<div class="col-lg-2 col-xl-1">
														<input type="text" name="VT_TITLE" id="VT_TITLE" placeholder="คำนำหน้าชื่อ" data-parsley-group="step-1" class="form-control" />
													</div>

													<label class="col-lg-1 text-lg-right col-form-label">ชื่อ <span class="text-danger">*</span></label>
													<div class="col-lg-2 col-xl-3">
														<input type="text" name="VT_FNAME" id="VT_FNAME" placeholder="ชื่อ" data-parsley-group="step-1" class="form-control" />
													</div>
													<label class="col-lg-1 text-lg-right col-form-label">นามสกุล <span class="text-danger">*</span></label>
													<div class="col-lg-2 col-xl-3">
														<input type="text" name="VT_LNAME" id="VT_LNAME" placeholder="นามสกุล" data-parsley-group="step-1" class="form-control" />
													</div>
												</div>
												<!-- end form-group -->
												<!-- begin form- กรอกประวัติ-->

												<div class="form-group row m-b-12">
													<label class="col-lg-2 text-lg-right col-form-label">เลขประจำตัวประชาชน <span class="text-danger">*</span></label>
													<div class="col-lg-2 col-xl-9">
														<input type="number" name="VT_ID_NUM" id="VT_ID_NUM" placeholder="" data-parsley-group="step-1" class="form-control" />
													</div>
												</div>




												<!-- begin form- กรอกประวัติ2-->
												<div class="form-group row m-b-12">
													<label class="col-lg-2 text-lg-right col-form-label">วันเดือนปีเกิด <span class="text-danger">*</span></label>
													<div class="col-lg-2 col-xl-2">
														<input type="date" name="VT_BRITH_DATE" id="VT_BRITH_DATE" data-parsley-group="step-1" class="form-control" />
													</div>

													<label class="col-lg-1 text-lg-right col-form-label">อายุ <span class="text-danger">*</span></label>
													<div class="col-lg-2 col-xl-2">
														<input type="number" name="VT_AGE" id="VT_AGE" placeholder="อายุ" data-parsley-group="step-1" class="form-control" />
													</div>
													<label class="col-lg-1 text-lg-right col-form-label">เพศ <span class="text-danger">*</span></label>
													<div class="col-lg-9 col-xl-3">
														<div class="row row-space-6">
															<div class="col-7">
																<select class="form-control" name="VT_SEX" id="VT_SEX">
																	<option>-- เพศ --</option>
																	<option value="ชาย">ชาย</option>
																	<option value="หญิง">หญิง</option>

																</select>
															</div>

														</div>
													</div>

												</div>
												<!-- end form-group -->
												<!-- begin form- กรอกประวัติ3-->
												<div class="form-group row m-b-12">
													<label class="col-lg-2 text-lg-right col-form-label">ส่วนสูง <span class="text-danger">*</span></label>
													<div class="col-lg-2 col-xl-2">
														<input type="number" name="VT_HEIGHT" id="VT_HEIGHT" data-parsley-group="step-1" class="form-control" />
													</div>

													<label class="col-lg-1 text-lg-right col-form-label">น้ำหนัก <span class="text-danger">*</span></label>
													<div class="col-lg-2 col-xl-2">
														<input type="number" name="VT_WEIGHT" id="VT_WEIGHT" placeholder="" data-parsley-group="step-1" class="form-control" />
													</div>
													<label class="col-lg-1 text-lg-right col-form-label">โทรศัทพ์<span class="text-danger">*</span></label>
													<div class="col-lg-9 col-xl-3">
														<input type="number" name="VT_PHONE" id="VT_PHONE" data-parsley-group="step-1" class="form-control" />
													</div>

												</div>
												<!-- end form-group -->
												<!-- begin form- กรอกประวัติ4-->
												<div class="form-group row m-b-12">
													<label class="col-lg-2 text-lg-right col-form-label">เชื้อชาติ <span class="text-danger">*</span></label>
													<div class="col-lg-2 col-xl-2">
														<input type="text" name="VT_RACE" id="VT_RACE" data-parsley-group="step-1" class="form-control" />
													</div>

													<label class="col-lg-1 text-lg-right col-form-label">สัญชาติ <span class="text-danger">*</span></label>
													<div class="col-lg-2 col-xl-2">
														<input type="text" name="VT_NATIONALITY" id="VT_NATIONALITY" placeholder="" data-parsley-group="step-1" class="form-control" />
													</div>
													<label class="col-lg-1 text-lg-right col-form-label">ศาสนา<span class="text-danger">*</span></label>
													<div class="col-lg-2 col-xl-2">
														<input type="text" name="VT_RELIGION" id="VT_RELIGION" data-parsley-group="step-1" class="form-control" />
													</div>

												</div>
												<!-- end form-group -->

												<div class="form-group row m-b-12">


													<label class="col-lg-2 text-lg-right col-form-label">อาชีพ<span class="text-danger">*</span></label>

													<div class="col-lg-2 col-xl-2">

														<select class="form-control" id="VT_OCCU" name="VT_OCCU">
															<option value="">อาชีพ</option>
															<option value="ไม่ระบุอาชีพ" selected="">ไม่ระบุอาชีพ</option>
															<option value="ว่างงาน">ว่างงาน</option>
															<option value="ผู้บริหาร">ผู้บริหาร</option>
															<option value="พนักงาน">พนักงาน</option>
															<option value="พนักงานขาย">พนักงานขาย</option>
															<option value="นักเรียน">นักเรียน</option>
															<option value="นักศึกษา">นักศึกษา</option>
															<option value="แม่บ้าน">แม่บ้าน</option>
															<option value="พนักงานธนาคาร">พนักงานธนาคาร</option>
															<option value="รับจ้าง">รับจ้าง</option>
															<option value="ข้าราชการ">ข้าราชการ</option>
															<option value="นักเรียนอนุบาล ประถม">นักเรียนอนุบาล ประถม</option>
															<option value="นักเรียน อนุบาล ประถม มัธยม">นักเรียน อนุบาล ประถม มัธยม</option>
															<option value="นักเรียนมัธยม">นักเรียนมัธยม</option>
															<option value="นักศึกษาระดับอุดมศึกษา">นักศึกษาระดับอุดมศึกษา</option>
															<option value="นักศึกษาการอาชีพ">นักศึกษาการอาชีพ</option>
															<option value="นักศึกษาเกษตรและเทคโนโลยี">นักศึกษาเกษตรและเทคโนโลยี</option>
															<option value="นักศึกษาสารพัดช่าง">นักศึกษาสารพัดช่าง</option>
															<option value="นักศึกษาอาชีวะ">นักศึกษาอาชีวะ</option>
															<option value="นักศึกษาเทคนิค">นักศึกษาเทคนิค</option>
															<option value="อาจารย์ เจ้าหน้าที่">อาจารย์ เจ้าหน้าที่</option>
															<option value="ครู อาจารย์">ครู อาจารย์</option>
															<option value="นักจิตวิทยา">นักจิตวิทยา</option>
															<option value="เภสัชกร">เภสัชกร</option>
															<option value="เจ้าของธุรกิจ">เจ้าของธุรกิจ</option>

															<option value="ที่ปรึกษาโภชนาการ">ที่ปรึกษาโภชนาการ</option>
															<option value="พ่อบ้าน">พ่อบ้าน</option>
															<option value="พนักงานรัฐวิสาหกิจ">พนักงานรัฐวิสาหกิจ</option>
															<option value="พยาบาล">พยาบาล</option>
															<option value="ตัวแทนประกัน">ตัวแทนประกัน</option>
															<option value="นายหน้าประกัน">นายหน้าประกัน</option>
															<option value="ทนายความ">ทนายความ</option>
															<option value="วิศวกร">วิศวกร</option>
															<option value="สถาปนิก">สถาปนิก</option>
															<option value="เจ้าของกิจการ">เจ้าของกิจการ</option>
															<option value="ผู้พิพากษา">ผู้พิพากษา</option>
															<option value="อัยการ">อัยการ</option>
															<option value="แคดดี้">แคดดี้</option>
															<option value="แพทย์">แพทย์</option>
															<option value="หัวหน้าช่าง">หัวหน้าช่าง</option>
															<option value="ผู้โดยสารทางเรือ">ผู้โดยสารทางเรือ</option>
															<option value="ตัวแทนประกันชีวิต">ตัวแทนประกันชีวิต</option>
															<option value="ผู้รับเหมาก่อสร้าง">ผู้รับเหมาก่อสร้าง</option>
															<option value="นายหน้าอสังหาริมทรัพย์">นายหน้าอสังหาริมทรัพย์</option>
															<option value="มัคคุเทศก์">มัคคุเทศก์</option>
															<option value="นักร้อง">นักร้อง</option>
															<option value="นักแสดง">นักแสดง</option>
															<option value="นักข่าว พิธีกร">นักข่าว พิธีกร</option>
															<option value="ช่างภาพ">ช่างภาพ</option>
															<option value="พนักงานสำรวจภัย">พนักงานสำรวจภัย</option>
															<option value="พนักงานขับรถ">พนักงานขับรถ</option>
															<option value="พนักงานปฎิบัติการ">พนักงานปฎิบัติการ</option>
															<option value="หัวหน้างาน">หัวหน้างาน</option>
															<option value="ทหาร">ทหาร</option>
															<option value="ตำรวจ">ตำรวจ</option>
															<option value="นักบิน">นักบิน</option>
															<option value="พนักงานบริการบนเครื่องบิน">พนักงานบริการบนเครื่องบิน</option>
															<option value="ช่าง">ช่าง</option>
															<option value="คนครัว">คนครัว</option>
															<option value="คนขับรถบรรทุก">คนขับรถบรรทุก</option>
															<option value="คนขับรถแท็กซี่">คนขับรถแท็กซี่</option>
															<option value="พนง.รักษาความปลอดภัย">พนง.รักษาความปลอดภัย</option>
															<option value="พนักงานรับ - ส่ง สินค้า">พนักงานรับ - ส่ง สินค้า</option>
															<option value="พนักงานรับ - ส่งเอกสาร">พนักงานรับ - ส่งเอกสาร</option>
															<option value="คนงาน">คนงาน</option>
															<option value="นักบวช">นักบวช</option>
															<option value="พระสงฆ์/นักบวช">พระสงฆ์/นักบวช</option>
														</select>

													</div>

													<label class="col-lg-1 text-lg-right col-form-label">รายได้ <span class="text-danger">*</span></label>
													<div class="col-lg-2 col-xl-2">
														<input type="number" class="form-control" name="VT_INCOME" id="VT_INCOME">
													</div>

													<label class="col-lg-1 text-lg-right col-form-label">สถานะสมรส <span class="text-danger">*</span></label>
													<div class="col-lg-2 col-xl-2">
														<select class="form-control" name="VT_MARITAL_ST_ID" id="VT_MARITAL_ST_ID">
															<?php
															$sql = "SELECT * FROM marital_status";
															$db->Execute($sql);
															while ($res = $db->getData()) {
															?>
																<option value="<?php echo $res['MARI_ID'] ?>"><?php echo $res['MARI_NAME'] ?></option>
															<?php
															}

															?>
														</select>
													</div>



												</div>



												<!-- begin form- ที่อยู่ที่ติดต่อได้ -->
												<legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">ข้อมูลที่อยู่</legend>
												<hr>
												<div class="form-group row m-b-12">
													<label class="col-lg-2 text-lg-right col-form-label">ที่อยู่ที่ติดต่อได้ <span class="text-danger">*</span></label>
													<div class="col-lg-2 col-xl-9">
														<input type="text" name="VT_ADD_CONTACT" id="VT_ADD_CONTACT" placeholder="" data-parsley-group="step-1" class="form-control" />
													</div>
												</div>
												<!-- end form-group -->

												<!-- begin form- ที่อยู่ที่ติดต่อได้ -->
												<div class="form-group row m-b-12">
													<label class="col-lg-2 text-lg-right col-form-label">ที่อยู่ตามทะเบียนบ้าน <span class="text-danger">*</span></label>
													<div class="col-lg-2 col-xl-9">
														<input type="text" name="VT_ADD_REG" id="VT_ADD_REG" placeholder="" data-parsley-group="step-1" class="form-control" />
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
													<label class="col-lg-2 text-lg-right col-form-label">ชั้นบัตร <span class="text-danger">*</span></label>
													<div class="col-lg-2 col-xl-2">
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
													<label class="col-lg-1 text-lg-right col-form-label">เลขที่บัตร <span class="text-danger">*</span></label>
													<div class="col-lg-2 col-xl-2">
														<input type="text" name="VT_CARD_NO" id="VT_CARD_NO" placeholder="" data-parsley-group="step-1" class="form-control" />
													</div>
												</div>
												<!-- end form-group -->


												<!-- begin form- เหล่าทัพ -->
												<div class="form-group row m-b-12">


													<label class="col-lg-2 text-lg-right col-form-label">เหล่าทัพ(ประจำการ) <span class="text-danger">*</span></label>

													<div class="col-lg-2 col-xl-2">

														<select class="form-control" name="VT_ARMY_ST" id="VT_ARMY_ST">

															<option value="ไม่ระบุ">--ไม่ระบุ--</option>
															<option value="ประจำการ">ประจำการ</option>
															<option value="นอกประจำการ">นอกประจำการ</option>
														</select>

													</div>

													<label class="col-lg-1 text-lg-right col-form-label">กองทัพ <span class="text-danger">*</span></label>

													<div class="col-lg-2 col-xl-2">

														<select class="form-control" name="VT_ARMY" id="VT_ARMY">
															<?php

															$sql = "SELECT * from veteran_army WHERE ARM_ACTIVE='Y'";
															$db->Execute($sql);
															while ($res = $db->getData()) {
															?>
																<option value="<?php echo $res['ARM_ID'] ?>"><?php echo $res['ARM_NAME'] ?></option>
															<?php
															}
															?>

														</select>

													</div>


												</div>





												<!-- begin form-  BANK INFO-->
												<br>
												<legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">ข้อมูลธนาคาร</legend>
												<hr>

												<!--
												<div class="form-group row m-b-12">


													<label class="col-lg-2 text-lg-right col-form-label">อาชีพ<span class="text-danger">*</span></label>

													<div class="col-lg-2 col-xl-2">

														<select class="form-control" id="VT_OCCU" name="VT_OCCU">
															<option value="">อาชีพ</option>
															<option value="ไม่ระบุอาชีพ" selected="">ไม่ระบุอาชีพ</option>
															<option value="ว่างงาน">ว่างงาน</option>
															<option value="ผู้บริหาร">ผู้บริหาร</option>
															<option value="พนักงาน">พนักงาน</option>
															<option value="พนักงานขาย">พนักงานขาย</option>
															<option value="นักเรียน">นักเรียน</option>
															<option value="นักศึกษา">นักศึกษา</option>
															<option value="แม่บ้าน">แม่บ้าน</option>
															<option value="พนักงานธนาคาร">พนักงานธนาคาร</option>
															<option value="รับจ้าง">รับจ้าง</option>
															<option value="ข้าราชการ">ข้าราชการ</option>
															<option value="นักเรียนอนุบาล ประถม">นักเรียนอนุบาล ประถม</option>
															<option value="นักเรียน อนุบาล ประถม มัธยม">นักเรียน อนุบาล ประถม มัธยม</option>
															<option value="นักเรียนมัธยม">นักเรียนมัธยม</option>
															<option value="นักศึกษาระดับอุดมศึกษา">นักศึกษาระดับอุดมศึกษา</option>
															<option value="นักศึกษาการอาชีพ">นักศึกษาการอาชีพ</option>
															<option value="นักศึกษาเกษตรและเทคโนโลยี">นักศึกษาเกษตรและเทคโนโลยี</option>
															<option value="นักศึกษาสารพัดช่าง">นักศึกษาสารพัดช่าง</option>
															<option value="นักศึกษาอาชีวะ">นักศึกษาอาชีวะ</option>
															<option value="นักศึกษาเทคนิค">นักศึกษาเทคนิค</option>
															<option value="อาจารย์ เจ้าหน้าที่">อาจารย์ เจ้าหน้าที่</option>
															<option value="ครู อาจารย์">ครู อาจารย์</option>
															<option value="นักจิตวิทยา">นักจิตวิทยา</option>
															<option value="เภสัชกร">เภสัชกร</option>
															<option value="เจ้าของธุรกิจ">เจ้าของธุรกิจ</option>

															<option value="ที่ปรึกษาโภชนาการ">ที่ปรึกษาโภชนาการ</option>
															<option value="พ่อบ้าน">พ่อบ้าน</option>
															<option value="พนักงานรัฐวิสาหกิจ">พนักงานรัฐวิสาหกิจ</option>
															<option value="พยาบาล">พยาบาล</option>
															<option value="ตัวแทนประกัน">ตัวแทนประกัน</option>
															<option value="นายหน้าประกัน">นายหน้าประกัน</option>
															<option value="ทนายความ">ทนายความ</option>
															<option value="วิศวกร">วิศวกร</option>
															<option value="สถาปนิก">สถาปนิก</option>
															<option value="เจ้าของกิจการ">เจ้าของกิจการ</option>
															<option value="ผู้พิพากษา">ผู้พิพากษา</option>
															<option value="อัยการ">อัยการ</option>
															<option value="แคดดี้">แคดดี้</option>
															<option value="แพทย์">แพทย์</option>
															<option value="หัวหน้าช่าง">หัวหน้าช่าง</option>
															<option value="ผู้โดยสารทางเรือ">ผู้โดยสารทางเรือ</option>
															<option value="ตัวแทนประกันชีวิต">ตัวแทนประกันชีวิต</option>
															<option value="ผู้รับเหมาก่อสร้าง">ผู้รับเหมาก่อสร้าง</option>
															<option value="นายหน้าอสังหาริมทรัพย์">นายหน้าอสังหาริมทรัพย์</option>
															<option value="มัคคุเทศก์">มัคคุเทศก์</option>
															<option value="นักร้อง">นักร้อง</option>
															<option value="นักแสดง">นักแสดง</option>
															<option value="นักข่าว พิธีกร">นักข่าว พิธีกร</option>
															<option value="ช่างภาพ">ช่างภาพ</option>
															<option value="พนักงานสำรวจภัย">พนักงานสำรวจภัย</option>
															<option value="พนักงานขับรถ">พนักงานขับรถ</option>
															<option value="พนักงานปฎิบัติการ">พนักงานปฎิบัติการ</option>
															<option value="หัวหน้างาน">หัวหน้างาน</option>
															<option value="ทหาร">ทหาร</option>
															<option value="ตำรวจ">ตำรวจ</option>
															<option value="นักบิน">นักบิน</option>
															<option value="พนักงานบริการบนเครื่องบิน">พนักงานบริการบนเครื่องบิน</option>
															<option value="ช่าง">ช่าง</option>
															<option value="คนครัว">คนครัว</option>
															<option value="คนขับรถบรรทุก">คนขับรถบรรทุก</option>
															<option value="คนขับรถแท็กซี่">คนขับรถแท็กซี่</option>
															<option value="พนง.รักษาความปลอดภัย">พนง.รักษาความปลอดภัย</option>
															<option value="พนักงานรับ - ส่ง สินค้า">พนักงานรับ - ส่ง สินค้า</option>
															<option value="พนักงานรับ - ส่งเอกสาร">พนักงานรับ - ส่งเอกสาร</option>
															<option value="คนงาน">คนงาน</option>
															<option value="นักบวช">นักบวช</option>
															<option value="พระสงฆ์/นักบวช">พระสงฆ์/นักบวช</option>
														</select>

													</div>

													<label class="col-lg-1 text-lg-right col-form-label">รายได้ <span class="text-danger">*</span></label>
													<div class="col-lg-2 col-xl-2">
														<input type="number" class="form-control" name="VT_INCOME" id="VT_INCOME">
													</div>

													<label class="col-lg-1 text-lg-right col-form-label">สถานะสมรส <span class="text-danger">*</span></label>
													<div class="col-lg-2 col-xl-2">
														<select class="form-control" name="VT_MARITAL_ST_ID" id="VT_MARITAL_ST_ID">
															<?php
															$sql = "SELECT * FROM marital_status";
															$db->Execute($sql);
															while ($res = $db->getData()) {
															?>
																<option value="<?php echo $res['MARI_ID'] ?>"><?php echo $res['MARI_NAME'] ?></option>
															<?php
															}

															?>
														</select>
													</div>



												</div>-->

												<div class="form-group row m-b-12">
													<label class="col-lg-2 text-lg-right col-form-label">ชื่อธนาคาร<span class="text-danger">*</span></label>
													<div class="col-lg-2 col-xl-2">
														<select class="form-control" name="VT_BANK_NAME" id="VT_BANK_NAME">
															<option value="">--ระบุชื่อธนาคาร--</option>
															<option value="ธนาคารกรุงเทพ">ธนาคารกรุงเทพ</option>
															<option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
															<option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option>
															<option value="ธนาคารทหารไทย">ธนาคารทหารไทย</option>
															<option value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์</option>
															<option value="ธนาคารกรุงศรีอยุธยา">ธนาคารกรุงศรีอยุธยา</option>
															<option value="ธนาคารเกียรตินาคินภัทร">ธนาคารเกียรตินาคินภัทร</option>
															<option value="ธนาคารซีไอเอ็มบีไทย">ธนาคารซีไอเอ็มบีไทย</option>
															<option value="ธนาคารทิสโก้">ธนาคารทิสโก้</option>
															<option value="ธนาคารธนชาต">ธนาคารธนชาต</option>
															<option value="ธนาคารยูโอบี">ธนาคารยูโอบี</option>
															<option value="ธนาคารไทยเครดิตเพื่อรายย่อย">ธนาคารไทยเครดิตเพื่อรายย่อย</option>
															<option value="ธนาคารออมสิน">ธนาคารออมสิน</option>
															<option value="ธนาคารเพื่อการเกษตรและสหกรณ์การเกษตร">ธนาคารเพื่อการเกษตรและสหกรณ์การเกษตร</option>
															<option value="ธนาคารเพื่อการส่งออกและนำเข้าแห่งประเทศไทย">ธนาคารเพื่อการส่งออกและนำเข้าแห่งประเทศไทย</option>
															<option value="ธนาคารอาคารสงเคราะห์">ธนาคารอาคารสงเคราะห์</option>
															<option value="ธนาคารอิสลามแห่งประเทศไทย">ธนาคารอิสลามแห่งประเทศไทย</option>

														</select>
													</div>



													<label class="col-lg-1 text-lg-right col-form-label">เลขบัญชี <span class="text-danger">*</span></label>
													<div class="col-lg-2 col-xl-2">
														<input type="number" class="form-control" name="VT_BANK_ACC_NUM" id="VT_BANK_ACC_NUM">
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
													<label class="col-lg-3 text-lg-right col-form-label">เลือกจำนวนบุคคลภายในครอบครัว <span class="text-danger">*</span></label>
													<div class="col-lg-8 col-xl-8">
														<select name="select_family" id="select_family" data-parsley-group="step-1" class="form-control" onchange="loop_family(this.value)">
															<?php
															for ($i = 0; $i < 8; $i++) {
															?>
																<option value="<?php echo $i + 1 ?>"><?php echo $i + 1 ?></option>
															<?php
															}
															?>

														</select>

													</div>
												</div>
												<hr />

												<div class="family_class"></div>
												<!-- ถ้าต้องการ data-parsley-required="true" -->


												<!-- end col-8 -->
											</div>
										</div>
										<!-- end row -->
									</fieldset>
									<!-- end fieldset -->
								</div>
								<!-- end step-2 -->
								<!-- begin step-3 -->
								<div id="step-3">
									<input type="hidden" name="VT_ID" id="VT_ID">
									<!-- begin fieldset -->
									<fieldset>
										<!-- begin row -->
										<div class="row">
											<!-- begin col-8 -->
											<div class="col-xl-8 offset-xl-2">
												<legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Select your login username and password</legend>
												<!-- begin form-group -->
												<div class="form-group row m-b-10">
													<label class="col-lg-3 text-lg-right col-form-label">Username <span class="text-danger">*</span></label>
													<div class="col-lg-9 col-xl-6">
														<input type="text" name="m_username" placeholder="johnsmithy" class="form-control" data-parsley-group="step-3" data-parsley-type="alphanum" />
													</div>
												</div>
												<!-- end form-group -->
												<!-- begin form-group -->
												<div class="form-group row m-b-10">
													<label class="col-lg-3 text-lg-right col-form-label">Pasword <span class="text-danger">*</span></label>
													<div class="col-lg-9 col-xl-6">
														<input type="password" name="m_password" placeholder="Your password" class="form-control" data-parsley-group="step-3" value="1234" />
													</div>
												</div>
												<!-- end form-group -->

												<!-- begin form-group -->
												<div class="form-group row m-b-10">
													<label class="col-lg-3 text-lg-right col-form-label">E-mail <span class="text-danger">*</span></label>
													<div class="col-lg-9 col-xl-6">
														<input type="email" name="m_email" placeholder="" class="form-control" data-parsley-group="step-3" />
													</div>
												</div>
												<!-- end form-group -->






											</div>
											<!-- end col-8 -->
										</div>
										<!-- end row -->
									</fieldset>
									<!-- end fieldset -->
								</div>
								<!-- end step-3 -->
								<!-- begin step-4 -->
								<div id="step-4">
									<div class="jumbotron m-b-0 text-center">
										<h2 class="display-4">บันทึกข้อมูลรประวัติสำเร็จ</h2>
										<p class="lead mb-4"> <br /> </p>
										<p><a href="javascript:;" class="btn btn-primary btn-lg">Proceed to User Profile</a></p>
									</div>
								</div>
								<!-- end step-4 -->
							</form>
						</div>

						<!-- end wizard-content -->
					</div>
					<!-- end wizard -->

					<!-- end wizard-form -->

				</form>
			</div>
			<!-- end #content -->


			<!-- begin scroll to top btn -->
			<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
			<!-- end scroll to top btn -->
		</div>
		<!-- end page container -->

		<!-- ================== BEGIN BASE JS ================== -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
		</script>
	</body>

	</html>

<?php
} else {
	header('Location: login.php');
}

?>