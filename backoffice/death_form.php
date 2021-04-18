<?php

session_start();
if ($_SESSION['PERMISSION'] == 'KORN') {
    include '../connect/db.php';
    $db = new DB();
    $db2 = new DB();

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
        <link href="../assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
        <link href="../assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
        <link href="../assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
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


                <!-- begin row -->
                <div class="row">
                    <!-- begin col-6 -->
                    <div class="col-xl-12">


                        <!-- begin panel -->
                        <div class="panel panel-inverse" data-sortable-id="ui-general-2">
                            <!-- begin panel-heading -->
                            <div class="panel-heading">
                               <!-- <h4 class="panel-title"> <span class="label label-success">NEW</span></h4>
                                <div class="panel-heading-btn">
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                                </div>-->
                            </div>
                            <!-- end panel-heading -->
                            <!-- begin panel-body -->
                            <form enctype="multipart/form-data" method="POST" name="search_form" id="search_form" action="death_form_db.php">
                                <?php 
                                ////echo $_GET['m_id'];

                                $sql = "SELECT * FROM veteran  WHERE m_id =" . $_GET['m_id'] . " and VT_ALIVE <>0";
                                $db->Execute($sql);
                                $res = $db->getData();

                                ?>

                                <input type="hidden" name="m_id" value="<?php echo $_GET['m_id'] ?>">
                                <!-- begin step-1 -->
                                <div id="step-1">
                                    <!-- begin fieldset -->
                                    <fieldset>
                                        <!-- begin row -->
                                        <div class="row">
                                            <!-- begin col-8 -->
                                            <div class="col-xl-12 offset-xl-">
                                            <br> 
                                                <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse"><h3> &nbsp; &nbsp; &nbsp; &nbsp;บันทึกการสงเคราะห์กรณีถึงแก่ความตาย</h3></legend>
                                                <hr>
                                                <!-- ถ้าต้องการ data-parsley-required="true" -->

                                                <!-- begin form- กรอกประวัติ-->
                                                <div class="form-group row m-b-12">
                                                    <label class="col-lg-2 text-lg-right col-form-label">คำนำหน้าชื่อ <span class="text-danger">*</span></label>
                                                    <div class="col-lg-2 col-xl-2">
                                                        <input type="text" name="VT_TITLE" id="VT_TITLE" placeholder="คำนำหน้าชื่อ" value="<?php echo $res['VT_TITLE'] ?>" data-parsley-group="step-1" class="form-control" />
                                                    </div>

                                                    <label class="col-lg-1 text-lg-right col-form-label">ชื่อ <span class="text-danger">*</span></label>
                                                    <div class="col-lg-2 col-xl-2">
                                                        <input type="text" name="VT_FNAME" id="VT_FNAME" value="<?php echo $res['VT_FNAME'] ?>" placeholder="ชื่อ" data-parsley-group="step-1" class="form-control" />
                                                    </div>
                                                    <label class="col-lg-1 text-lg-right col-form-label">นามสกุล <span class="text-danger">*</span></label>
                                                    <div class="col-lg-2 col-xl-2">
                                                        <input type="text" name="VT_LNAME" id="VT_LNAME" value="<?php echo $res['VT_LNAME'] ?>" placeholder="นามสกุล" data-parsley-group="step-1" class="form-control" />
                                                    </div>
                                                </div>
                                                <!-- end form-group -->

                                                <!-- begin form- กรอกประวัติ2-->
                                                <div class="form-group row m-b-12">


                                                    <label class="col-lg-2 text-lg-right col-form-label">อายุ <span class="text-danger">*</span></label>
                                                    <div class="col-lg-2 col-xl-2">
                                                        <input type="number" name="VT_AGE" id="VT_AGE" value="<?php echo (date('Y') + 543) - explode("/", $res['VT_BRITH_DATE'])[2]; ?>" placeholder="อายุ" data-parsley-group="step-1" class="form-control" />
                                                    </div>


                                                    <!-- end form-group -->
                                                    <!-- begin form- กรอกประวัติ3-->
                                                    <label class="col-lg-1 text-lg-right col-form-label">วันที่เสียชีวิต <span class="text-danger">*</span></label>
                                                    <div class="col-lg-2 col-xl-2">
                                                        <input type="text" name="REQ_DEATH_DATE" id="REQ_DEATH_DATE" data-parsley-group="step-1" class="form-control" />
                                                    </div>

                                                    <label class="col-lg-1 text-lg-right col-form-label">ประเภทการเสียชีวิต<span class="text-danger">*</span></label>

                                                    <div class="col-lg-2 col-xl-2">
                                                        <div class="row row-space-10">
                                                            <div class="col-12">
                                                                <select class="form-control" name="REQ_DEATH_TYPE" id="REQ_DEATH_TYPE">

                                                                    <option value="ไม่ระบุ">--ไม่ระบุ--</option>
                                                                    <option value="ชราภาพ">ชราภาพ</option>
                                                                    <option value="เจ็บป่วย">เจ็บป่วย</option>
                                                                    <option value="อุบัติเหตุ">อุบัติเหตุ</option>
                                                                    <option value="ปฏิบัติหน้าที่">ปฏิบัติหน้าที่</option>
                                                                    <option value="ชราภาพ">ชราภาพ</option>

                                                                    <option value="อื่นๆ">อื่นๆ</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>





                                                <!-- begin form- ที่อยู่ที่ติดต่อได้ -->
                                                <div class="form-group row m-b-12">
                                                    <label class="col-lg-2 text-lg-right col-form-label">สาเหตุการเสียชีวิต<span class="text-danger">*</span></label>
                                                    <div class="col-lg-2 col-xl-9">
                                                        <input type="text" name="REQ_DEATH_CAUSE" id="REQ_DEATH_CAUSE" placeholder="" data-parsley-group="step-1" class="form-control" />
                                                    </div>
                                                </div>
                                                <!-- end form-group -->

                                                <!-- begin form- ที่อยู่ที่ติดต่อได้ -->
                                                <div class="form-group row m-b-12">
                                                    <label class="col-lg-2 text-lg-right col-form-label">หลักฐานการเสียชีวิต<span class="text-danger">*</span></label>
                                                    <div class="col-lg-2 col-xl-9">
                                                        <input type="text" name="REQ_DEATH_EVIDENCE" id="REQ_DEATH_EVIDENCE" placeholder="" data-parsley-group="step-1" class="form-control" />
                                                    </div>
                                                </div>
                                                <!-- end form-group -->



                                                <!-- begin form- เบอร์ -->
                                                <div class="form-group row m-b-12">
                                                    <label class="col-lg-2 text-lg-right col-form-label">ชื่อผู้จัดการศพ <span class="text-danger">*</span></label>
                                                    <div class="col-lg-2 col-xl-2">
                                                        <input type="text" name="REQ_DEATH_UDERTAKER" id="REQ_DEATH_UDERTAKER" placeholder="" data-parsley-group="step-1" class="form-control" />
                                                    </div>
                                                    <label class="col-lg-2 text-lg-right col-form-label">ความสัมพันธ์กับผู้เสียชีวิต<span class="text-danger">*</span></label>
                                                    <div class="col-lg-2 col-xl-2">
                                                        <input type="text" name="REQ_DEATH_REL" id="REQ_DEATH_REL" placeholder="" data-parsley-group="step-1" class="form-control" />
                                                    </div>
                                                </div>
                                                <!-- end form-group -->

                                                <div class="form-group row m-b-12">
                                                    <label class="col-lg-2 text-lg-right col-form-label">เสียชีวิต ณ ที่/โรงพยาบาล<span class="text-danger">*</span></label>
                                                    <div class="col-lg-2 col-xl-2">
                                                        <input type="text" name="REQ_DEATH_PLACE" id="REQ_DEATH_PLACE" placeholder="" data-parsley-group="step-1" class="form-control" />
                                                    </div>

                                                    <label class="col-lg-2 text-lg-right col-form-label">บำเพ็ญกุศล ณ<span class="text-danger">*</span></label>
                                                    <div class="col-lg-2 col-xl-2">
                                                        <input type="text" name="REQ_DEATH_MERIT_PLACE" id="REQ_DEATH_MERIT_PLACE" placeholder="" data-parsley-group="step-1" class="form-control" />
                                                    </div>
                                                    <label class="col-lg-1 text-lg-right col-form-label">เสียชีวิตที่จังหวัด<span class="text-danger">*</span></label>
                                                    <div class="col-lg-1 col-xl-2">
                                                        <input type="text" name="REQ_DEATH_PROVINCE" id="REQ_DEATH_PROVINCE" placeholder="" data-parsley-group="step-1" class="form-control" />
                                                    </div>

                                                </div>

                                                <?php
                                                for ($i = 1; $i <= 5; $i++) {
                                                ?>
                                                    <div class="form-group row m-b-12">
                                                    <label class="col-lg-2 text-lg-right col-form-label">รูปที่ <?php echo $i; ?></label>
                                                        <div class="col-lg-2 col-xl-2">
                                                            <input type="file" name="REQ_DEATH_FILE[<?php echo $i; ?>]" id="">
                                                        </div>
                                                    </div>

                                                <?php
                                                }
                                                ?>



                                                <!-- end col-8 -->
                                            </div>
                                            <!-- end row -->
                                    </fieldset>
                                    <!-- end fieldset -->
                                </div>
                                <!-- end step-1 -->
                                <div class="col-md-12" style="justify-content:center; display:flex;">
                                    <button type="submit" class="btn btn-green" style="padding:10px;width:150px;">ยืนยันรายการ</button>
                                </div>


                            </form>
                            <!-- end panel-body -->






                        </div>
                        <!-- end panel -->
                    </div>
                    <!-- end col-6 -->

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
        <script src="../assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <script src="../assets/js/demo/table-manage-default.demo.js"></script>

        <script>
            const appv = (req_id, m_id, s_id, id) => {


                $.ajax({
                    type: "POST",
                    url: "vt_appv.php",
                    data: {
                        req_id: req_id,
                        m_id: m_id,
                        s_id: s_id,
                        id: id
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
        </script>



        <!-- ================== END PAGE LEVEL JS ================== -->
    </body>

    </html>

<?php
} else {
    header('Location: login.php');
}
?>