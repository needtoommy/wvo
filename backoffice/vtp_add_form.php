<?php
session_start();
if ($_SESSION['PERMISSION'] == 'KORN') {
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
	</head>

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
					<a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> <b>Color</b> Admin</a>
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- end navbar-header -->
				<!-- begin header-nav -->
				<ul class="navbar-nav navbar-right">
					<li class="navbar-form">

						<div class="form-group">
							<input type="text" class="form-control" placeholder="Enter keyword" />
							<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
						</div>

					</li>
					<li class="dropdown">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle f-s-14">
							<i class="fa fa-bell"></i>
							<span class="label">5</span>
						</a>
						<div class="dropdown-menu media-list dropdown-menu-right">
							<div class="dropdown-header">NOTIFICATIONS (5)</div>
							<a href="javascript:;" class="dropdown-item media">
								<div class="media-left">
									<i class="fa fa-bug media-object bg-silver-darker"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading">Server Error Reports <i class="fa fa-exclamation-circle text-danger"></i></h6>
									<div class="text-muted f-s-10">3 minutes ago</div>
								</div>
							</a>
							<a href="javascript:;" class="dropdown-item media">
								<div class="media-left">
									<img src="../assets/img/user/user-1.jpg" class="media-object" alt="" />
									<i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading">John Smith</h6>
									<p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
									<div class="text-muted f-s-10">25 minutes ago</div>
								</div>
							</a>
							<a href="javascript:;" class="dropdown-item media">
								<div class="media-left">
									<img src="../assets/img/user/user-2.jpg" class="media-object" alt="" />
									<i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading">Olivia</h6>
									<p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
									<div class="text-muted f-s-10">35 minutes ago</div>
								</div>
							</a>
							<a href="javascript:;" class="dropdown-item media">
								<div class="media-left">
									<i class="fa fa-plus media-object bg-silver-darker"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading"> New User Registered</h6>
									<div class="text-muted f-s-10">1 hour ago</div>
								</div>
							</a>
							<a href="javascript:;" class="dropdown-item media">
								<div class="media-left">
									<i class="fa fa-envelope media-object bg-silver-darker"></i>
									<i class="fab fa-google text-warning media-object-icon f-s-14"></i>
								</div>
								<div class="media-body">
									<h6 class="media-heading"> New Email From John</h6>
									<div class="text-muted f-s-10">2 hour ago</div>
								</div>
							</a>
							<div class="dropdown-footer text-center">
								<a href="javascript:;">View more</a>
							</div>
						</div>
					</li>
					<li class="dropdown navbar-user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="../assets/img/user/user-13.jpg" alt="" />
							<span class="d-none d-md-inline">Adam Schwartz</span> <b class="caret"></b>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<a href="javascript:;" class="dropdown-item">Edit Profile</a>
							<a href="javascript:;" class="dropdown-item"><span class="badge badge-danger pull-right">2</span> Inbox</a>
							<a href="javascript:;" class="dropdown-item">Calendar</a>
							<a href="javascript:;" class="dropdown-item">Setting</a>
							<div class="dropdown-divider"></div>
							<a href="javascript:;" class="dropdown-item">Log Out</a>
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
									<b class="caret pull-right"></b>Sean Ngu
									<small>Front end developer</small>
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
						<li class="nav-header">Navigation</li>
						<li class="has-sub">
							<a href="javascript:;">
								<b class="caret"></b>
								<i class="fa fa-th-large"></i>
								<span>Dashboard</span>
							</a>
							<ul class="sub-menu">
								<li><a href="index.html">Dashboard v1</a></li>
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
						<li class="has-sub active">
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
								<li class="active"><a href="form_wizards_validation.html">Wizards + Validation</a></li>
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
						<!-- begin sidebar minify button -->
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
					<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
					<li class="breadcrumb-item"><a href="javascript:;">Form Stuff</a></li>
					<li class="breadcrumb-item active">Wizards + Validation</li>
				</ol>
				<!-- end breadcrumb -->
				<!-- begin page-header -->
				<h1 class="page-header">Wizards + Validation <small>header small text goes here...</small></h1>
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
										Personal Info
										<small>Name, Address, IC No and DOB</small>
									</span>
								</a>
							</li>
							<li>
								<a href="#step-2">
									<span class="number">2</span>
									<span class="info">
										Enter your contact
										<small>Email and phone no. is required</small>
									</span>
								</a>
							</li>
							<li>
								<a href="#step-3">
									<span class="number">3</span>
									<span class="info">
										Login Account
										<small>Enter your username and password</small>
									</span>
								</a>
							</li>
							<li>
								<a href="#step-4">
									<span class="number">4</span>
									<span class="info">
										Completed
										<small>Complete Registration</small>
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
												<legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">บันทึกประวัติทหารผ่านศึก</legend>

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
														<input type="text" name="VT_PHONE" id="VT_PHONE" data-parsley-group="step-1" class="form-control" />
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

												<!-- begin form- ที่อยู่ที่ติดต่อได้ -->
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
												<div class="form-group row m-b-12">
													<label class="col-lg-2 text-lg-right col-form-label">เลขประจำตัวประชาชน <span class="text-danger">*</span></label>
													<div class="col-lg-2 col-xl-9">
														<input type="number" name="VT_ID_NUM" id="VT_ID_NUM" placeholder="" data-parsley-group="step-1" class="form-control" />
													</div>
												</div>
												<!-- end form-group -->

												<!-- begin form- เบอร์ -->
												<div class="form-group row m-b-12">
													<label class="col-lg-2 text-lg-right col-form-label">ชั้นบัตร <span class="text-danger">*</span></label>
													<div class="col-lg-2 col-xl-2">
														<input type="text" name="VT_CARD_STEP" id="VT_CARD_STEP" placeholder="" data-parsley-group="step-1" class="form-control" />
													</div>
													<label class="col-lg-2 text-lg-right col-form-label">เลขที่บัตร <span class="text-danger">*</span></label>
													<div class="col-lg-2 col-xl-2">
														<input type="text" name="VT_CARD_NO" id="VT_CARD_NO" placeholder="" data-parsley-group="step-1" class="form-control" />
													</div>
												</div>
												<!-- end form-group -->

												<!-- begin form- เหล่าทัพ -->
												<div class="form-group row m-b-12">
													<label class="col-lg-2 text-lg-right col-form-label">เหล่าทัพ(ประจำการ) <span class="text-danger">*</span></label>

													<div class="col-lg-5 col-xl-3">
														<div class="row row-space-6">
															<div class="col-5">
																<select class="form-control" name="VT_ARMY_ST" id="VT_ARMY_ST">

																	<option value="ไม่ระบุ">--ไม่ระบุ--</option>
																	<option value="ประจำการ">ประจำการ</option>
																	<option value="นอกประจำการ">นอกประจำการ</option>
																</select>
															</div>

														</div>
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
										<h2 class="display-4">Register Successfully</h2>
										<p class="lead mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat commodo porttitor. <br />Vivamus eleifend, arcu in tincidunt semper, lorem odio molestie lacus, sed malesuada est lacus ac ligula. Aliquam bibendum felis id purus ullamcorper, quis luctus leo sollicitudin. </p>
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
			</div>
			</form>
			<!-- end #content -->

			<!-- begin theme-panel -->
			<div class="theme-panel theme-panel-lg">
				<a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
				<div class="theme-panel-content">
					<h5>App Settings</h5>
					<ul class="theme-list clearfix">
						<li><a href="javascript:;" class="bg-red" data-theme="red" data-theme-file="../assets/css/default/theme/red.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a></li>
						<li><a href="javascript:;" class="bg-pink" data-theme="pink" data-theme-file="../assets/css/default/theme/pink.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Pink">&nbsp;</a></li>
						<li><a href="javascript:;" class="bg-orange" data-theme="orange" data-theme-file="../assets/css/default/theme/orange.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange">&nbsp;</a></li>
						<li><a href="javascript:;" class="bg-yellow" data-theme="yellow" data-theme-file="../assets/css/default/theme/yellow.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Yellow">&nbsp;</a></li>
						<li><a href="javascript:;" class="bg-lime" data-theme="lime" data-theme-file="../assets/css/default/theme/lime.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Lime">&nbsp;</a></li>
						<li><a href="javascript:;" class="bg-green" data-theme="green" data-theme-file="../assets/css/default/theme/green.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Green">&nbsp;</a></li>
						<li class="active"><a href="javascript:;" class="bg-teal" data-theme="default" data-theme-file="" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default">&nbsp;</a></li>
						<li><a href="javascript:;" class="bg-aqua" data-theme="aqua" data-theme-file="../assets/css/default/theme/aqua.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Aqua">&nbsp;</a></li>
						<li><a href="javascript:;" class="bg-blue" data-theme="blue" data-theme-file="../assets/css/default/theme/blue.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue">&nbsp;</a></li>
						<li><a href="javascript:;" class="bg-purple" data-theme="purple" data-theme-file="../assets/css/default/theme/purple.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple">&nbsp;</a></li>
						<li><a href="javascript:;" class="bg-indigo" data-theme="indigo" data-theme-file="../assets/css/default/theme/indigo.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Indigo">&nbsp;</a></li>
						<li><a href="javascript:;" class="bg-black" data-theme="black" data-theme-file="../assets/css/default/theme/black.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black">&nbsp;</a></li>
					</ul>
					<div class="divider"></div>
					<div class="row m-t-10">
						<div class="col-6 control-label text-inverse f-w-600">Header Fixed</div>
						<div class="col-6 d-flex">
							<div class="custom-control custom-switch ml-auto">
								<input type="checkbox" class="custom-control-input" name="header-fixed" id="headerFixed" value="1" checked />
								<label class="custom-control-label" for="headerFixed">&nbsp;</label>
							</div>
						</div>
					</div>
					<div class="row m-t-10">
						<div class="col-6 control-label text-inverse f-w-600">Header Inverse</div>
						<div class="col-6 d-flex">
							<div class="custom-control custom-switch ml-auto">
								<input type="checkbox" class="custom-control-input" name="header-inverse" id="headerInverse" value="1" />
								<label class="custom-control-label" for="headerInverse">&nbsp;</label>
							</div>
						</div>
					</div>
					<div class="row m-t-10">
						<div class="col-6 control-label text-inverse f-w-600">Sidebar Fixed</div>
						<div class="col-6 d-flex">
							<div class="custom-control custom-switch ml-auto">
								<input type="checkbox" class="custom-control-input" name="sidebar-fixed" id="sidebarFixed" value="1" checked />
								<label class="custom-control-label" for="sidebarFixed">&nbsp;</label>
							</div>
						</div>
					</div>
					<div class="row m-t-10">
						<div class="col-6 control-label text-inverse f-w-600">Sidebar Grid</div>
						<div class="col-6 d-flex">
							<div class="custom-control custom-switch ml-auto">
								<input type="checkbox" class="custom-control-input" name="sidebar-grid" id="sidebarGrid" value="1" />
								<label class="custom-control-label" for="sidebarGrid">&nbsp;</label>
							</div>
						</div>
					</div>
					<div class="row m-t-10">
						<div class="col-md-6 control-label text-inverse f-w-600">Sidebar Gradient</div>
						<div class="col-md-6 d-flex">
							<div class="custom-control custom-switch ml-auto">
								<input type="checkbox" class="custom-control-input" name="sidebar-gradient" id="sidebarGradient" value="1" />
								<label class="custom-control-label" for="sidebarGradient">&nbsp;</label>
							</div>
						</div>
					</div>
					<div class="divider"></div>
					<h5>Admin Design (5)</h5>
					<div class="theme-version">
						<a href="../template_html/index_v2.html" class="active">
							<span style="background-image: url(../assets/img/theme/default.jpg);"></span>
						</a>
						<a href="../template_transparent/index_v2.html">
							<span style="background-image: url(../assets/img/theme/transparent.jpg);"></span>
						</a>
					</div>
					<div class="theme-version">
						<a href="../template_apple/index_v2.html">
							<span style="background-image: url(../assets/img/theme/apple.jpg);"></span>
						</a>
						<a href="../template_material/index_v2.html">
							<span style="background-image: url(../assets/img/theme/material.jpg);"></span>
						</a>
					</div>
					<div class="theme-version">
						<a href="../template_facebook/index_v2.html">
							<span style="background-image: url(../assets/img/theme/facebook.jpg);"></span>
						</a>
						<a href="../template_google/index_v2.html">
							<span style="background-image: url(../assets/img/theme/google.jpg);"></span>
						</a>
					</div>
					<div class="divider"></div>
					<h5>Language Version (7)</h5>
					<div class="theme-version">
						<a href="../template_html/index_v2.html" class="active">
							<span style="background-image: url(../assets/img/version/html.jpg);"></span>
						</a>
						<a href="../template_ajax/index_v2.html">
							<span style="background-image: url(../assets/img/version/ajax.jpg);"></span>
						</a>
					</div>
					<div class="theme-version">
						<a href="../template_angularjs/index_v2.html">
							<span style="background-image: url(../assets/img/version/angular1x.jpg);"></span>
						</a>
						<a href="../template_angularjs8/index_v2.html">
							<span style="background-image: url(../assets/img/version/angular8x.jpg);"></span>
						</a>
					</div>
					<div class="theme-version">
						<a href="../template_laravel/index_v2.html">
							<span style="background-image: url(../assets/img/version/laravel.jpg);"></span>
						</a>
						<a href="../template_vuejs/index_v2.html">
							<span style="background-image: url(../assets/img/version/vuejs.jpg);"></span>
						</a>
					</div>
					<div class="theme-version">
						<a href="../template_reactjs/index_v2.html">
							<span style="background-image: url(../assets/img/version/reactjs.jpg);"></span>
						</a>
					</div>
					<div class="divider"></div>
					<h5>Frontend Design (4)</h5>
					<div class="theme-version">
						<a href="../../../frontend/template/template_one_page_parallax/index.html">
							<span style="background-image: url(../assets/img/theme/one-page-parallax.jpg);"></span>
						</a>
						<a href="../../../frontend/template/template_e_commerce/index.html">
							<span style="background-image: url(../assets/img/theme/e-commerce.jpg);"></span>
						</a>
					</div>
					<div class="theme-version">
						<a href="../../../frontend/template/template_blog/index.html">
							<span style="background-image: url(../assets/img/theme/blog.jpg);"></span>
						</a>
						<a href="../../../frontend/template/template_forum/index.html">
							<span style="background-image: url(../assets/img/theme/forum.jpg);"></span>
						</a>
					</div>
					<div class="divider"></div>
					<div class="row m-t-10">
						<div class="col-md-12">
							<a href="https://seantheme.com/color-admin/documentation/" class="btn btn-inverse btn-block btn-rounded" target="_blank"><b>Documentation</b></a>
							<a href="javascript:;" class="btn btn-default btn-block btn-rounded" data-click="reset-local-storage"><b>Reset Local Storage</b></a>
						</div>
					</div>
				</div>
			</div>
			<!-- end theme-panel -->

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
		</script>
	</body>

	</html>

<?php
} else {
	header('Location: login.php');
}

?>