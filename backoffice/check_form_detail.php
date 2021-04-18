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
                    <a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> <b>ระบบสวัสดิการสงเคราะห์ทหารผ่านศึก</b></a>
                    <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- end navbar-header -->
                <!-- begin header-nav -->
                <ul class="navbar-nav navbar-right">
                    <!--<li class="navbar-form">
                        <form action="" method="POST" name="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter keyword" />
                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
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
                    </li>-->
                    <li class="dropdown navbar-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="../assets/img/user/user-13.jpg" alt="" />
                            <span class="d-none d-md-inline"><?php
                                                                $sql = "SELECT * FROM tbl_member WHERE m_id = " . $_SESSION['m_id'] . "";
                                                                $db->Execute($sql);
                                                                $res = $db->getData();
                                                                echo $res['m_name'];
                                                                // print_r($res);
                                                                ?></span> <b class="caret"></b>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="javascript:;" class="dropdown-item">Edit Profile</a>
                            <a href="javascript:;" class="dropdown-item"><span class="badge badge-danger pull-right">2</span> Inbox</a>
                            <a href="javascript:;" class="dropdown-item">Calendar</a>
                            <a href="javascript:;" class="dropdown-item">Setting</a>
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


                        <!-- --------------****Start******-------------------- -->
                        <?php
                        if ($level == 'vsofficer' ||  $level == 'finoffice') {
                        ?>
                            <li class="has-sub active">
                                <a href="calendar.html">
                                    <i class="fa fa-edit"></i>
                                    <span> ตรวจสอบใบคำร้อง</span>
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
                        <?php if ($level == 'vsofficer') {
                        ?>
                            <li>
                                <a href="calendar.html">
                                    <i class="fa fa-edit"></i>
                                    <span>ตรวจสอบใบคำร้องเงินครั้งคราว</span>
                                </a>
                            </li>
                        <?php } ?>


                        <!-- -----------------**********************************--------------------- -->
                        	<!-- -----------------**********************************--------------------- -->
						<?php if ($level == 'vsofficer' || $level == 'vsmanager') { ?>
							<li <?php echo $_GET['type'] == 11 ? 'class="active"' : '' ?>>
								<a href="vtp_add_form.php">
									<i class="fa fa-edit"></i>
									<span>จัดการประวัติทหารผ่านศึก</span>
								</a>
							</li>
						<?php } ?>
						<!-- -----------------*************END*************--------------------- -->

                        <?php if ($level == 'vsofficer') {
                        ?>
                            <li>
                                <a href="calendar.html">
                                    <i class="fa fa-edit"></i>
                                    <span>จัดการสมาชิก</span>
                                </a>
                            </li>
                        <?php } ?>


                        <!-- -----------------**********************************--------------------- -->
                        <?php if ($level == 'vsofficer') { ?>
                            <li>
                                <a href="calendar.html">
                                    <i class="fa fa-edit"></i>
                                    <span>จัดการตำแหน่ง</span>
                                </a>
                            </li>
                        <?php } ?>


                        <!-- -----------------**********************************--------------------- -->
                        <?php if ($level == 'vsofficer') { ?>
                            <li>
                                <a href="calendar.html">
                                    <i class="fa fa-edit"></i>
                                    <span>จัดการสถานะ</span>
                                </a>
                            </li>
                        <?php } ?>


                        <!-- -----------------**********************************--------------------- -->
                        <?php if ($level == 'vsofficer') { ?>
                            <li>
                                <a href="calendar.html">
                                    <i class="fa fa-edit"></i>
                                    <span>จัดการแผนก</span>
                                </a>
                            </li>
                        <?php } ?>
                        <!-- -----------------*************END*************--------------------- -->


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
                    <li class="breadcrumb-item"><a href="javascript:;">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active">ค่ารักษาพยาบาล</li>
                </ol>
                <!-- end breadcrumb -->
                <!-- begin page-header -->
                <h1 class="page-header">ค่ารักษาพยาบาล <small></small></h1>
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
                                $sql = "SELECT * FROM req_health as rh 
                            INNER JOIN tbl_member as m ON m.m_id = rh.m_id 
                            INNER JOIN tbl_status as st ON st.s_id = rh.s_id 
                            INNER JOIN health_value_bal as hvb ON rh.m_id = hvb.m_id
                            INNER JOIN veteran as vt ON rh.m_id = vt.m_id
                            INNER JOIN veteran_family ON rh.VT_FM_ID =veteran_family.VT_FM_ID
                            WHERE rh.REQ_HEL_ID=" . $_GET['REQ_HEL_ID'] . " AND m.m_alive <> 0
                            ORDER BY rh.m_id DESC
                            ";
                            }

                            if (isset($_GET['REQ_OCC_ID'])) {
                                $sql = "SELECT * FROM req_occ as oc 
                            INNER JOIN tbl_member as m ON m.m_id = oc.m_id 
                            INNER JOIN tbl_status as st ON st.s_id = oc.s_id 
                            INNER JOIN occ_value_bal as ovb ON m.m_id = ovb.m_id
                            INNER JOIN veteran as vt ON rh.m_id = vt.m_id
                            WHERE oc.REQ_OCC_ID=" . $_GET['REQ_OCC_ID'] . " AND m.m_alive <> 0
                             ORDER BY oc.REQ_OCC_ID DESC";
                            }
                            // echo $sql;

                            if (isset($_GET['REQ_DISA_ID'])) {
                                $sql = "SELECT * FROM req_disa as rdisa
                            INNER JOIN tbl_member as m ON m.m_id = rdisa.m_id 
                            INNER JOIN tbl_status as st ON st.s_id = rdisa.s_id
                            INNER JOIN veteran as vt ON rh.m_id = vt.m_id 
                            INNER JOIN disaster_type ON rdisa.REQ_DST_ID = disaster_type.DST_ID
                            WHERE rdisa.REQ_DISA_ID=" . $_GET['REQ_DISA_ID'] . " AND m.m_alive <> 0";
                            }


                            //4
                            if (isset($_GET['REQ_MAT_ID'])) {
                                $sql = "SELECT * FROM req_maternity as rmat
                            INNER JOIN tbl_member as m ON m.m_id = rmat.m_id 
                            INNER JOIN tbl_status as st ON st.s_id = rmat.s_id 
                            INNER JOIN veteran ON veteran.m_id= m.m_id
                            INNER JOIN veteran as vt ON rh.m_id = vt.m_id
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
                              INNER JOIN veteran as vt ON rh.m_id = vt.m_id
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
                            INNER JOIN veteran as vt ON rh.m_id = vt.m_id
                            INNER JOIN veteran ON veteran.m_id= m.m_id
                            WHERE rmonth.REQ_MOTHLY_ID =" . $_GET['REQ_MOTHLY_ID'] . " and veteran.VT_ALIVE <>0";
                            }




                            $db->Execute($sql);
                            $res = $db->getData();

                            $REQ_HEL_ID = $res['REQ_HEL_ID'];
                            //echo $sql;
                            // print_r($res);

                            ?>

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
                                                <input type="email" class="form-control m-b-5" value="<?php echo date('d/m/Y', strtotime('+543 year')) ?>" readonly />
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-15">
                                            <label class="col-form-label col-md-3">สถานะ</label>
                                            <div class="col-md-9">
                                                <input type="email" class="form-control m-b-5" value="<?php echo $res['s_name'] ?>" readonly />
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-15">
                                            <label class="col-form-label col-md-3">เบิกให้</label>
                                            <div class="col-md-9">
                                                <input type="email" class="form-control m-b-5" value="<?php echo $res['VT_FM_TITLE'] . $res['VT_FM_NAME'] . ' ' . $res['VT_FM_LNAME'] ?>" readonly />
                                            </div>
                                        </div>

                                        <div class="form-group row m-b-15">
                                            <label class="col-form-label col-md-3">จำนวนเงินขอเบิก</label>
                                            <div class="col-md-9">
                                                <input type="email" class="form-control m-b-5" value="<?php echo number_format($res['REQ_HEL_VALUE'], 2) ?>" readonly />
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-15">
                                            <label class="col-form-label col-md-3">รายละเอียด</label>
                                            <div class="col-md-9">
                                                <input type="email" class="form-control m-b-5" value="<?php echo $res['REQ_HEL_DETAIL'] ?>" readonly />
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
                                        } ?>
                                        <?php
                                        if ($_SESSION['level'] == "finoffice") {
                                        ?>
                                   <div class="col-md-12 mt-3" style="text-align: center;">
                                            <button  style="display: inline-block;" type="button" class="btn btn-primary" onclick="send_con(5, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_HEL_ID'] ?>,'<?php echo number_format($res['REQ_HEL_VALUE'], 2) ?>', <?php echo $res['m_id'] ?>)">อนุมติใบคำร้อง</button>
                                            <button  style="display: inline-block;" type="button" class="btn btn-danger" onclick="send_can(7, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_HEL_ID'] ?>,  <?php echo $res['m_id'] ?>)">ยกเลิกใบคำร้อง</button>
                                        <?php
                                        } else {
                                        ?>
                                            <button  style="display: inline-block;" type="button" class="btn btn-primary" onclick="send_con(3, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_HEL_ID'] ?>,'<?php echo number_format($res['REQ_HEL_VALUE'], 2) ?>', <?php echo $res['m_id'] ?>)">อนุมติใบคำร้อง</button>
                                            <button  style="display: inline-block;" type="button" class="btn btn-danger" onclick="send_can(7, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_HEL_ID'] ?>,  <?php echo $res['m_id'] ?>)">ยกเลิกใบคำร้อง</button>
                                        <?php } ?>
                                   </div>
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
                                                <input type="text" class="form-control m-b-5" value="<?php $res['REQ_HEL_VALUE'] ?>" readonly />
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
                                            <button type="button" class="btn btn-primary" onclick="send_con(5, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_OCC_ID'] ?>,'<?php echo number_format($res['REQ_OCC_VALUE'], 2) ?>', <?php echo $res['m_id'] ?>)">อนุมติใบคำร้อง</button>
                                            <button type="button" class="btn btn-danger" onclick="send_can(7, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_OCC_ID'] ?>,  <?php echo $res['m_id'] ?>)">ยกเลิกใบคำร้อง</button>
                                        <?php
                                        } else {
                                        ?>

                                            <button type="button" class="btn btn-primary" onclick="send_con(3, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_OCC_ID'] ?>,'<?php echo number_format($res['REQ_OCC_VALUE'], 2) ?>', <?php echo $res['m_id'] ?>)">อนุมติใบคำร้อง</button>
                                            <button type="button" class="btn btn-danger" onclick="send_can(7, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_OCC_ID'] ?>,  <?php echo $res['m_id'] ?>)">ยกเลิกใบคำร้อง</button>
                                        <?php } ?>
                                    </form>
                                </div>
                                <!-- end panel-body -->
                            <?php } ?>




                            <?php if (isset($_GET['REQ_DISA_ID'])) { ?>
                                <!-- begin panel-body -->
                                <div class="panel-body">
                                    <div class="alert alert-muted">
                                        ยืนคำร้องขอเบิกค่าประสบภัยพิบัติ โดย
                                        <br>
                                        ชั้นบัตร <?php echo $res['VT_CARD_STEP'] ?> เลขที่บัตร <?php echo $res['VT_CARD_NO'] ?>
                                        <br>
                                        ชื่อ - นามสกุล <?php echo $res['VT_TITLE'] . $res['VT_FNAME'] . ' '.$res['VT_LNAME'] ?>
                                     
                                      
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
                                                ถึง

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
                                                <input type="email" class="form-control m-b-5" value="<?php echo $res['REQ_DISA_DETAIL'] ?>" readonly />
                                            </div>
                                        </div>



                                        <hr />
                                        <?php
                                        if ($res['REQ_DMT_TYPE'] == 'ที่อยู่อาศัย') {
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
                                        <?php } ?>



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





                                        <?php
                                        $sql = "SELECT file_name, is_image FROM multi_file where req_id= " . $_GET['REQ_DISA_ID'] . " and vs_id=4";
                                        ///echo $sql;

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
                                            <button type="button" class="btn btn-primary" onclick="send_con_disa(5, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_DISA_ID'] ?>,'<?php echo number_format($res['REQ_DISA_VALUE'], 2) ?>', <?php echo $res['m_id'] ?>, '<?php echo $res['REQ_DMT_TYPE'] ?>')">อนุมติใบคำร้อง</button>
                                            <button type="button" class="btn btn-danger" onclick="send_can_disa(7, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_DISA_ID'] ?>,  <?php echo $res['m_id'] ?>)">ยกเลิกใบคำร้อง</button>
                                        <?php
                                        } else {
                                        ?>
                                            <button type="button" class="btn btn-primary" onclick="send_con_disa(3, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_DISA_ID'] ?>,'<?php echo number_format($res['REQ_DISA_VALUE'], 2) ?>', <?php echo $res['m_id'] ?>, '<?php echo $res['REQ_DMT_TYPE'] ?>')">อนุมติใบคำร้อง</button>
                                            <button type="button" class="btn btn-danger" onclick="send_can_disa(7, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_DISA_ID'] ?>,  <?php echo $res['m_id'] ?>)">ยกเลิกใบคำร้อง</button>
                                        <?php } ?>
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
                                        สิทธิเบิก :
                                        <?php echo number_format($res['mat_value_bal_begin'], 2) ?> บาท
                                        <br>
                                        สิทธิที่ใช้ไป :
                                        <?php echo number_format($res['mat_value_bal_use'], 2) ?> บาท
                                        <br>
                                        สิทธิคงเหลือ :
                                        <?php echo number_format($res['mat_value_bal_bal'], 2) ?> บาท
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
                                            <button type="button" class="btn btn-primary" onclick="send_con(5, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_MAT_ID'] ?>,'<?php echo number_format($res['REQ_MAT_VALUE'], 2) ?>', <?php echo $res['m_id'] ?>)">อนุมติใบคำร้อง</button>
                                            <button type="button" class="btn btn-danger" onclick="send_can(7, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_MAT_ID'] ?>,  <?php echo $res['m_id'] ?>)">ยกเลิกใบคำร้อง</button>
                                        <?php
                                        } else {
                                        ?>
                                            <button type="button" class="btn btn-primary" onclick="send_con(3, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_MAT_ID'] ?>,'<?php echo number_format($res['REQ_MAT_VALUE'], 2) ?>', <?php echo $res['m_id'] ?>)">อนุมติใบคำร้อง</button>
                                            <button type="button" class="btn btn-danger" onclick="send_can(7, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_MAT_ID'] ?>,  <?php echo $res['m_id'] ?>)">ยกเลิกใบคำร้อง</button>
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
                                        สิทธิเบิก :
                                        <?php echo number_format($res['disa_value_bal_begin'], 2) ?> บาท
                                        <br>
                                        สิทธิที่ใช้ไป :
                                        <?php echo number_format($res['disa_value_bal_use'], 2) ?> บาท
                                        <br>
                                        สิทธิคงเหลือ :
                                        <?php echo number_format($res['disa_value_bal_bal'], 2) ?> บาท
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
                                        echo $sql;

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
                                            <button type="button" class="btn btn-primary" onclick="send_con(5, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_EDU_ID'] ?>,'<?php echo number_format($res['REQ_EDU_VALUE'], 2) ?>', <?php echo $res['m_id'] ?>)">อนุมติใบคำร้อง</button>
                                            <button type="button" class="btn btn-danger" onclick="send_can(7, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_EDU_ID'] ?>,  <?php echo $res['m_id'] ?>)">ยกเลิกใบคำร้อง</button>
                                        <?php
                                        } else {

                                        ?>
                                            <button type="button" class="btn btn-primary" onclick="send_con(3, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_EDU_ID'] ?>,'<?php echo number_format($res['REQ_EDU_VALUE'], 2) ?>', <?php echo $res['m_id'] ?>)">อนุมติใบคำร้อง</button>
                                            <button type="button" class="btn btn-danger" onclick="send_can(7, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_EDU_ID'] ?>,  <?php echo $res['m_id'] ?>)">ยกเลิกใบคำร้อง</button>
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
                                        ชื่อ - นามสกุล <?php echo $res['VT_TITLE'] . $res['VT_FNAME'] . $res['VT_LNAME'] ?>ยอด ภักดี
                                        <hr>
                                        สิทธิเบิก :
                                        <?php echo number_format($res['disa_value_bal_begin'], 2) ?> บาท
                                        <br>
                                        สิทธิที่ใช้ไป :
                                        <?php echo number_format($res['disa_value_bal_use'], 2) ?> บาท
                                        <br>
                                        สิทธิคงเหลือ :
                                        <?php echo number_format($res['disa_value_bal_bal'], 2) ?> บาท
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
                                                >
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
                                        echo $sql;

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
                                            <button type="button" class="btn btn-primary" onclick="send_con(3, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_MOTHLY_ID'] ?>,1, <?php echo $res['m_id'] ?>)">อนุมติใบคำร้อง</button>
                                            <button type="button" class="btn btn-danger" onclick="send_can(7, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_MOTHLY_ID'] ?>, 1, <?php echo $res['m_id'] ?>)">ยกเลิกใบคำร้อง</button>
                                        <?php
                                        } else {
                                        ?>
                                            <button type="button" class="btn btn-primary" onclick="send_con(1, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_MOTHLY_ID'] ?>,1, <?php echo $res['m_id'] ?>)">อนุมติใบคำร้อง</button>
                                            <button type="button" class="btn btn-danger" onclick="send_can(7, <?php echo $_GET['type'] ?>,<?php echo $_GET['REQ_MOTHLY_ID'] ?>, 1, <?php echo $res['m_id'] ?>)">ยกเลิกใบคำร้อง</button>
                                        <?php } ?>
                                    </form>
                                </div>
                                <!-- end panel-body -->
                            <?php } ?>







                        </div>
                        <!-- end panel -->
                    </div>
                    <!-- end col-6 -->
                    <?php





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
        <script src="../assets/plugins/gritter/js/jquery.gritter.js"></script>
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
                                alert('อนุมัติรายการสำเร็จ')
                            } else {
                                alert('อนุมัติรายการไม่สำเร็จ')
                            }

                        }
                    });
                    return false;
                }
                let money = prompt("จำนวนเงิน:", moneys);
                if (money == null || money == "") {
                    alert('กรุณาใส่จำนวนเงิน')
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
                                alert('อนุมัติรายการสำเร็จ')
                            } else {
                                alert('อนุมัติรายการไม่สำเร็จ')
                            }

                        }
                    });
                }
            }

            const send_can = (s_id, type, id, m_id) => {
                let person = prompt("เหตุผลที่ยกเลิก:", "");
                if (person == null || person == "") {
                    alert('กรณาใส่เหตุผลที่ยกเลิก')
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
                                    alert('ยกเลิกรายการสำเร็จ')
                                } else {
                                    alert('ยกเลิกรายการไมสำเร็จ')
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
                                alert('ยกเลิกรายการสำเร็จ')
                            } else {
                                alert('ยกเลิกรายการไมสำเร็จ')
                            }

                        }
                    });
                }
            }

            //disa

            const send_con_disa = (s_id, type, id, moneys, m_id, req_dmt_type) => {
                //form Submit


                var form = $("form")[1];
                var formData = new FormData(form);

                let REQ_DISA_RATE = $('#REQ_DISA_RATE').val()
                let money = prompt("จำนวนเงิน:", moneys);
                if (money == null || money == "") {
                    alert('กรุณาใส่จำนวนเงิน')
                } else {

                    if (req_dmt_type == 'ที่อยู่อาศัย' && REQ_DISA_RATE == 'เสียหายบางส่วน') {
                        if (money > 5000) {
                            alert('เงินต้องไม่เกิน 5000 บาท')
                        } else {
                            formData.append('id', id)
                            formData.append('s_id', s_id)
                            formData.append('type', type)
                            formData.append('money', money)
                            formData.append('m_id', m_id)
                            formData.append('REQ_DISA_RATE', REQ_DISA_RATE)

                            $.ajax({
                                type: "POST",
                                url: "cancel.php",
                                processData: false,
                                contentType: false,
                                data: formData,

                                success: function(data) {
                                    if (data == 'success') {
                                        alert('อนุมัติรายการสำเร็จ')
                                    } else {
                                        alert('อนุมัติรายการไม่สำเร็จ')
                                    }

                                }
                            });
                        }

                    } else if (req_dmt_type == 'ที่อยู่อาศัย' && REQ_DISA_RATE == 'เสียหาทั้งหลัง') {
                        if (money > 10000) {
                            alert('เงินต้องไม่เกิน 10000 บาท')
                        } else {
                            $.ajax({
                                type: "POST",
                                url: "cancel.php",
                                data: {
                                    id: id,
                                    s_id: s_id,
                                    type: type,
                                    money: money,
                                    m_id: m_id,
                                    REQ_DISA_RATE: REQ_DISA_RATE,
                                    REQ_DISA_FILE1: $('#REQ_DISA_FILE1').val(),
                                    REQ_DISA_FILE2: $('#REQ_DISA_FILE2').val(),
                                },
                                success: function(data) {
                                    if (data == 'success') {
                                        alert('อนุมัติรายการสำเร็จ')
                                    } else {
                                        alert('อนุมัติรายการไม่สำเร็จ')
                                    }

                                }
                            });
                        }
                    } else {
                        if (money > 2000) {
                            alert('จำนวนเงินไม้เกิน 2000 บาท')
                        } else {
                            $.ajax({
                                type: "POST",
                                url: "cancel.php",
                                data: {
                                    id: id,
                                    s_id: s_id,
                                    type: type,
                                    money: money,
                                    m_id: m_id,
                                    REQ_DISA_RATE: REQ_DISA_RATE,
                                    REQ_DISA_FILE1: $('#REQ_DISA_FILE1').val(),
                                    REQ_DISA_FILE2: $('#REQ_DISA_FILE2').val(),
                                },
                                success: function(data) {
                                    if (data == 'success') {
                                        alert('อนุมัติรายการสำเร็จ')
                                    } else {
                                        alert('อนุมัติรายการไม่สำเร็จ')
                                    }

                                }
                            });
                        }
                    }
                }

            }


            const send_can_disa = (s_id, type, id, m_id, req_dmt_type) => {
                let person = prompt("เหตุผลที่ยกเลิก:", "");

                if (person == null || person == "") {
                    alert('กรณาใส่เหตุผลที่ยกเลิก')
                } else {

                    $.ajax({
                        type: "POST",
                        url: "cancel.php",
                        data: {
                            id: id,
                            s_id: s_id,
                            type: type,
                            money: money,
                            m_id: m_id,
                            REQ_DISA_RATE: REQ_DISA_RATE
                        },
                        success: function(data) {
                            if (data === 'success') {
                                alert('อนุมัติรายการสำเร็จ')
                            } else {
                                alert('อนุมัติรายการไม่สำเร็จ')
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