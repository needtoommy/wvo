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

            -->

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
                                <h4 class="panel-title"> <span class="label label-success">NEW</span></h4>
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
                            
                            <h3>จ่ายเงินสงเคราะห์</h3>
                                <hr>
                                <h5>ระบุเงื่อนไข</h5><br>
                                <form action="#" method="post">
                                    <div class="row row-space-10">

                                        <div class="col-md-4">
                                            <label for="">วันที่</label>
                                            <input type="date" name="date" id="date" value="<?php echo date('Y-m-d', strtotime('+543 years')) ?>" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">ถึง</label>
                                            <input type="date" name="dateto" id="dateto" value="<?php echo date('Y-m-d', strtotime('+543 years')) ?>" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">ประเภทการสงเคราะห์</label>
                                            <select name="assist" id="assist" class="form-control">
                                                <option value="">ทั้งหมด</option>
                                                <option value="ค่ารักษาพยาบาล">ค่ารักษาพยาบาล</option>
                                                <option value="เงินช่วยเหลือครั้งคราว">เงินช่วยเหลือครั้งคราว</option>
                                                <option value="ค่าประสบภัยพิบัติ">ค่าประสบภัยพิบัติ</option>
                                                <option value="ค่าคลอดบุตร">ค่าคลอดบุตร</option>
                                                <option value="ค่าการศึกษาบุตร">ค่าการศึกษาบุตร</option>
                                            </select>
                                        </div>

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
                                            <label for="">เลขบัตร</label>
                                            <input type="text" name="VT_CARD_NO" id="VT_CARD_NO" class="form-control">
                                        </div>

                                        <div class="col-md-3">
                                            <label for="">ชื่อ</label>
                                            <input type="text" name="VT_FNAME" id="VT_FNAME" class="form-control">
                                        </div>

                                        <div class="col-md-3" style="margin-bottom: 20px;">
                                            <label for="">นามสกุล</label>
                                            <input type="text" name="VT_LNAME" id="VT_LNAME" class="form-control">
                                        </div>

                                        <div class="col-md-12" style="text-align:center;">
                                            <button type="submit" class="btn btn-primary">ค้นหา</button>
                                        </div>
                                    </div>
                                </form>


                                <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                                    <thead>
                                        <tr>
                                            <th width="5%">เลขที่ใบคำร้อง</th>
                                            <th width="10%">วันที่ยื่นคำร้อง</th>
                                            <th  width="5%"class="text-nowrap">ชั้นบัตร</th>
                                            <th  width="5%"class="text-nowrap">เลขบัตร</th>
                                            <th class="text-nowrap">ชื่อ-สกุล</th>
                                            <th class="text-nowrap">การสงเคราห์</th>
                                            <th class="text-nowrap">จำนวนเงิน</th>
                                            <th width="8%"></th>
                                            <th width="3%"></th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php


                                        if (!empty($_POST['date'])) {
                                            $date = $_POST['date'];
                                            $date = explode("-", $date)[2] . '/' . explode("-", $date)[1] . '/' . explode("-", $date)[0];
                                            $date_1  = " and REQ_DISA_DATE >= '$date'";
                                            $date_2  = " and REQ_EDU_DATE >= '$date'";
                                            $date_3  = " and REQ_HEL_DATE >= '$date'";
                                            $date_4  = " and REQ_MAT_DATE >= '$date'";
                                            $date_5  = " and REQ_OCC_DATE >= '$date'";
                                        }

                                        if (!empty($_POST['dateto'])) {
                                            $dateto = $_POST['dateto'];
                                            $dateto = explode("-", $dateto)[2] . '/' . explode("-", $dateto)[1] . '/' . explode("-", $dateto)[0];
                                            $dateto_1 = " and REQ_DISA_DATE <= '$dateto'  ";
                                            $dateto_2 = " and REQ_EDU_DATE <= '$dateto'  ";
                                            $dateto_3 = " and REQ_HEL_DATE <= '$dateto'  ";
                                            $dateto_4 = " and REQ_MAT_DATE <= '$dateto'  ";
                                            $dateto_5 = " and REQ_OCC_DATE <= '$dateto'  ";
                                        }



                                        if ($_POST['VT_CARD_STEP'] != "") {
                                            $VT_CARD_STEP = $_POST['VT_CARD_STEP'];
                                            $VT_CARD_STEP = "  AND VT_CARD_STEP='$VT_CARD_STEP'";
                                        } else {
                                            $VT_CARD_STEP = "";
                                        }

                                        if (!empty($_POST['VT_CARD_NO'])) {
                                            $VT_CARD_NO = $_POST['VT_CARD_NO'];
                                            $VT_CARD_NO = "  AND VT_CARD_NO='$VT_CARD_NO'";
                                        } else {
                                            $VT_CARD_NO = "";
                                        }

                                        if (!empty($_POST['VT_FNAME'])) {
                                            $VT_FNAME = $_POST['VT_FNAME'];
                                            $VT_FNAME = "  AND VT_FNAME='$VT_FNAME'";
                                        } else {
                                            $VT_FNAME = "";
                                        }

                                        if (!empty($_POST['VT_LNAME'])) {
                                            $VT_LNAME = $_POST['VT_LNAME'];
                                            $VT_LNAME = " AND VT_LNAME='$VT_LNAME'";
                                        } else {
                                            $VT_LNAME = "";
                                        }


                                        if ($_POST['assist'] == "") {


                                            $sql = "SELECT * from req_disa a WHERE a.s_id=5 $date_1 $dateto_1";

                                            $db->Execute($sql);
                                            $count =1;
                                            while ($res = $db->getData()) {

                                                $sqll = "SELECT * from veteran WHERE m_id=" . $res['m_id'] . " and VT_ALIVE <>0 $VT_CARD_STEP  $VT_CARD_NO $VT_FNAME $VT_LNAME";
                                                $db2->Execute($sqll);
                                                $res_v = $db2->getData();

                                                $res_mid = $res_v['VT_CARD_STEP'];
                                                $res_no = $res_v['VT_CARD_NO'];
                                                $res_name = $res_v['VT_TITLE'] . $res_v['VT_FNAME'] . ' ' . $res_v['VT_LNAME'];

                                                if (!empty($res_v)) {
                                        ?>
                                                    <tr>
                                                        <td><?php echo $res['REQ_DISA_ID'] ?></td>
                                                        <td><?php echo $res['REQ_DISA_DATE'] ?></td>
                                                        <td><?php echo $res_mid ?></td>
                                                        <td><?php echo $res_no ?></td>
                                                        <td><?php echo $res_name ?></td>
                                                        <td>ค่าประสบภัยพิบัติ</td>
                                                        <td><?php echo $res['REQ_DISA_VALUE_APPROVE'] ?></td>
                                                        <td><button type="button" class="btn btn-green" onclick="appv(<?php echo $res['REQ_DISA_ID'] ?>, <?php echo $res['m_id'] ?>,8,3)">จ่ายเงิน</button></td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger" onclick="appv(<?php echo $res['REQ_DISA_ID'] ?>, <?php echo $res['m_id'] ?>,7,3)">ยกเลิก</button>
                                                        </td>


                                                    </tr>
                                                <?php
                                                }
                                            }

                                            $sql = "SELECT * from req_edu WHERE s_id=5 $date_2 $dateto_2";
                                            $db->Execute($sql);
                                            while ($res = $db->getData()) {

                                                $sqll = "SELECT * from veteran WHERE m_id=" . $res['m_id'] . " and VT_ALIVE <>0 $VT_CARD_STEP  $VT_CARD_NO $VT_FNAME $VT_LNAME";
                                                $db2->Execute($sqll);
                                                $res_v = $db2->getData();

                                                $res_mid = $res_v['VT_CARD_STEP'];
                                                $res_no = $res_v['VT_CARD_NO'];
                                                $res_name = $res_v['VT_TITLE'] . $res_v['VT_FNAME'] . ' ' . $res_v['VT_LNAME'];

                                                if (!empty($res_v)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $res['REQ_EDU_ID'] ?></td>
                                                        <td><?php echo $res['REQ_EDU_DATE'] ?></td>
                                                        <td><?php echo $res_mid ?></td>
                                                        <td><?php echo $res_no ?></td>
                                                        <td><?php echo $res_name ?></td>
                                                        <td>ค่าการศึกษาบุตร</td>
                                                        <td><?php echo $res['REQ_EDU_VALUE_APPROVE'] ?></td>
                                                        <td><button type="button" class="btn btn-green" onclick="appv(<?php echo $res['REQ_EDU_ID'] ?>, <?php echo $res['m_id'] ?>,8,5)">จ่ายเงิน</button></td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger" onclick="appv(<?php echo $res['REQ_EDU_ID'] ?>, <?php echo $res['m_id'] ?>,7,5)">ยกเลิก</button>
                                                        </td>

                                                    </tr>
                                                <?php

                                                }
                                            }

                                            $sql = "SELECT * from req_health WHERE s_id=5 $date_3 $dateto_3";
                                            $db->Execute($sql);
                                            while ($res = $db->getData()) {

                                                $sqll = "SELECT * from veteran WHERE m_id=" . $res['m_id'] . " and VT_ALIVE <>0 $VT_CARD_STEP  $VT_CARD_NO $VT_FNAME $VT_LNAME";
                                                $db2->Execute($sqll);
                                                $res_v = $db2->getData();

                                                $res_mid = $res_v['VT_CARD_STEP'];
                                                $res_no = $res_v['VT_CARD_NO'];
                                                $res_name = $res_v['VT_TITLE'] . $res_v['VT_FNAME'] . ' ' . $res_v['VT_LNAME'];

                                                if (!empty($res_v)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $res['REQ_HEL_ID'] ?></td>
                                                        <td><?php echo $res['REQ_HEL_DATE'] ?></td>
                                                        <td><?php echo $res_mid ?></td>
                                                        <td><?php echo $res_no ?></td>
                                                        <td><?php echo $res_name ?></td>
                                                        <td>ค่ารักษาพยาบาล</td>
                                                        <td><?php echo number_format ($res['REQ_HEL_VALUE_APPROVE'],2)?></td>
                                                        <td><button type="button" class="btn btn-green" onclick="appv(<?php echo $res['REQ_HEL_ID'] ?>, <?php echo $res['m_id'] ?>,8,1)">จ่ายเงิน</button></td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger" onclick="appv(<?php echo $res['REQ_HEL_ID'] ?>, <?php echo $res['m_id'] ?>,7,1)">ยกเลิก</button>

                                                    </tr>
                                                <?php
                                                }
                                            }


                                            $sql = "SELECT * from req_maternity WHERE s_id=5 $date_4 $dateto_4";
                                            $db->Execute($sql);
                                            while ($res = $db->getData()) {

                                                $sqll = "SELECT * from veteran WHERE m_id=" . $res['m_id'] . " and VT_ALIVE <>0 $VT_CARD_STEP  $VT_CARD_NO $VT_FNAME $VT_LNAME";
                                                $db2->Execute($sqll);
                                                $res_v = $db2->getData();

                                                $res_mid = $res_v['VT_CARD_STEP'];
                                                $res_no = $res_v['VT_CARD_NO'];
                                                $res_name = $res_v['VT_TITLE'] . $res_v['VT_FNAME'] . ' ' . $res_v['VT_LNAME'];
                                                if (!empty($res_v)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $res['REQ_MAT_ID'] ?></td>
                                                        <td><?php echo $res['REQ_MAT_DATE'] ?></td>
                                                        <td><?php echo $res_mid ?></td>
                                                        <td><?php echo $res_no ?></td>
                                                        <td><?php echo $res_name ?></td>
                                                        <td>ค่าคลอดบุตร</td>
                                                        <td><?php echo $res['REQ_MAT_VALUE'] ?></td>
                                                        <td><button type="button" class="btn btn-green" onclick="appv(<?php echo $res['REQ_MAT_ID'] ?>, <?php echo $res['m_id'] ?>,8,4)">จ่ายเงิน</button></td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger" onclick="appv(<?php echo $res['REQ_MAT_ID'] ?>, <?php echo $res['m_id'] ?>,7,4)">ยกเลิก</button>

                                                    </tr>
                                                <?php
                                                }
                                            }



                                            $sql = "SELECT * from req_occ WHERE s_id=5 $date_5 $dateto_5";
                                            $db->Execute($sql);
                                            while ($res = $db->getData()) {

                                                $sqll = "SELECT * from veteran WHERE m_id=" . $res['m_id'] . " and VT_ALIVE <>0 $VT_CARD_STEP  $VT_CARD_NO $VT_FNAME $VT_LNAME";
                                                $db2->Execute($sqll);
                                                $res_v = $db2->getData();

                                                $res_mid = $res_v['VT_CARD_STEP'];
                                                $res_no = $res_v['VT_CARD_NO'];
                                                $res_name = $res_v['VT_TITLE'] . $res_v['VT_FNAME'] . ' ' . $res_v['VT_LNAME'];
                                                if (!empty($res_v)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $res['REQ_OCC_ID'] ?></td>
                                                        <td><?php echo $res['REQ_OCC_DATE'] ?></td>
                                                        <td><?php echo $res_mid ?></td>
                                                        <td><?php echo $res_no ?></td>
                                                        <td><?php echo $res_name ?></td>
                                                        <td>ค่าเงินช่วยเหลือครั้งคราว</td>
                                                        <td><?php echo $res['REQ_OCC_VALUE_APPROVE'] ?></td>
                                                        <td><button type="button" class="btn btn-green" onclick="appv(<?php echo $res['REQ_OCC_ID'] ?>, <?php echo $res['m_id'] ?>,8,2)">จ่ายเงิน</button></td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger" onclick="appv(<?php echo $res['REQ_OCC_ID'] ?>, <?php echo $res['m_id'] ?>,7,2)">ยกเลิก</button>

                                                    </tr>
                                                <?php
                                                }
                                            }
                                        } else if ($_POST['assist'] == "ค่าประสบภัยพิบัติ") {
                                            $sql = "SELECT * from req_disa a WHERE a.s_id=5 $date_1 $dateto_1";

                                            $db->Execute($sql);
                                            while ($res = $db->getData()) {

                                                $sqll = "SELECT * from veteran WHERE m_id=" . $res['m_id'] . " and VT_ALIVE <>0 $VT_CARD_STEP  $VT_CARD_NO $VT_FNAME $VT_LNAME";
                                                $db2->Execute($sqll);
                                                $res_v = $db2->getData();

                                                $res_mid = $res_v['VT_CARD_STEP'];
                                                $res_no = $res_v['VT_CARD_NO'];
                                                $res_name = $res_v['VT_TITLE'] . $res_v['VT_FNAME'] . ' ' . $res_v['VT_LNAME'];
                                                if (!empty($res_v)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $res['REQ_DISA_ID'] ?></td>
                                                        <td><?php echo $res['REQ_DISA_DATE'] ?></td>
                                                        <td><?php echo $res_mid ?></td>
                                                        <td><?php echo $res_no ?></td>
                                                        <td><?php echo $res_name ?></td>
                                                        <td>ค่าประสบภัยพิบัติ</td>
                                                        <td><?php echo $res['REQ_DISA_VALUE_APPROVE'] ?></td>
                                                        <td><button type="button" class="btn btn-green" onclick="appv(<?php echo $res['REQ_DISA_ID'] ?>, <?php echo $res['m_id'] ?>,8,3)">จ่ายเงิน</button></td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger" onclick="appv(<?php echo $res['REQ_DISA_ID'] ?>, <?php echo $res['m_id'] ?>,7,3)">ยกเลิก</button>
                                                        </td>


                                                    </tr>
                                                <?php
                                                }
                                            }
                                        } else if ($_POST['assist'] == "ค่าการศึกษาบุตร") {
                                            $sql = "SELECT * from req_edu WHERE s_id=5 $date_2 $dateto_2";
                                            $db->Execute($sql);
                                            while ($res = $db->getData()) {

                                                $sqll = "SELECT * from veteran WHERE m_id=" . $res['m_id'] . " and VT_ALIVE <>0 $VT_CARD_STEP  $VT_CARD_NO $VT_FNAME $VT_LNAME";
                                                $db2->Execute($sqll);
                                                $res_v = $db2->getData();

                                                $res_mid = $res_v['VT_CARD_STEP'];
                                                $res_no = $res_v['VT_CARD_NO'];
                                                $res_name = $res_v['VT_TITLE'] . $res_v['VT_FNAME'] . ' ' . $res_v['VT_LNAME'];
                                                if (!empty($res_v)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $res['REQ_EDU_ID'] ?></td>
                                                        <td><?php echo $res['REQ_EDU_DATE'] ?></td>
                                                        <td><?php echo $res_mid ?></td>
                                                        <td><?php echo $res_no ?></td>
                                                        <td><?php echo $res_name ?></td>
                                                        <td>ค่าการศึกษาบุตร</td>
                                                        <td><?php echo $res['REQ_EDU_VALUE_APPROVE'] ?></td>
                                                        <td><button type="button" class="btn btn-green" onclick="appv(<?php echo $res['REQ_EDU_ID'] ?>, <?php echo $res['m_id'] ?>,8,5)">จ่ายเงิน</button></td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger" onclick="appv(<?php echo $res['REQ_EDU_ID'] ?>, <?php echo $res['m_id'] ?>,7,5)">ยกเลิก</button>
                                                        </td>

                                                    </tr>
                                                <?php
                                                }
                                            }
                                        } else if ($_POST['assist'] == "ค่ารักษาพยาบาล") {
                                            $sql = "SELECT * from req_health WHERE s_id=5 $date_3 $dateto_3";
                                            $db->Execute($sql);
                                            while ($res = $db->getData()) {

                                                $sqll = "SELECT * from veteran WHERE m_id=" . $res['m_id'] . " and VT_ALIVE <>0 $VT_CARD_STEP  $VT_CARD_NO $VT_FNAME $VT_LNAME";
                                                $db2->Execute($sqll);
                                                $res_v = $db2->getData();

                                                $res_mid = $res_v['VT_CARD_STEP'];
                                                $res_no = $res_v['VT_CARD_NO'];
                                                $res_name = $res_v['VT_TITLE'] . $res_v['VT_FNAME'] . ' ' . $res_v['VT_LNAME'];
                                                if (!empty($res_v)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $res['REQ_HEL_ID'] ?></td>
                                                        <td><?php echo $res['REQ_HEL_DATE'] ?></td>
                                                        <td><?php echo $res_mid ?></td>
                                                        <td><?php echo $res_no ?></td>
                                                        <td><?php echo $res_name ?></td>
                                                        <td>ค่ารักษาพยาบาล</td>
                                                        <td><?php echo $res['REQ_HEL_VALUE_APPROVE'] ?></td>
                                                        <td><button type="button" class="btn btn-green" onclick="appv(<?php echo $res['REQ_HEL_ID'] ?>, <?php echo $res['m_id'] ?>,8,1)">จ่ายเงิน</button></td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger" onclick="appv(<?php echo $res['REQ_HEL_ID'] ?>, <?php echo $res['m_id'] ?>,7,1)">ยกเลิก</button>

                                                    </tr>
                                                <?php
                                                }
                                            }
                                        } else if ($_POST['assist'] == "ค่าคลอดบุตร") {
                                            $sql = "SELECT * from req_maternity WHERE s_id=5 $date_4 $dateto_4";
                                            $db->Execute($sql);
                                            while ($res = $db->getData()) {

                                                $sqll = "SELECT * from veteran WHERE m_id=" . $res['m_id'] . " and VT_ALIVE <>0 $VT_CARD_STEP  $VT_CARD_NO $VT_FNAME $VT_LNAME";
                                                $db2->Execute($sqll);
                                                $res_v = $db2->getData();

                                                $res_mid = $res_v['VT_CARD_STEP'];
                                                $res_no = $res_v['VT_CARD_NO'];
                                                $res_name = $res_v['VT_TITLE'] . $res_v['VT_FNAME'] . ' ' . $res_v['VT_LNAME'];
                                                if (!empty($res_v)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $res['REQ_MAT_ID'] ?></td>
                                                        <td><?php echo $res['REQ_MAT_DATE'] ?></td>
                                                        <td><?php echo $res_mid ?></td>
                                                        <td><?php echo $res_no ?></td>
                                                        <td><?php echo $res_name ?></td>
                                                        <td>ค่าคลอดบุตร</td>
                                                        <td><?php echo $res['REQ_MAT_VALUE'] ?></td>
                                                        <td><button type="button" class="btn btn-green" onclick="appv(<?php echo $res['REQ_MAT_ID'] ?>, <?php echo $res['m_id'] ?>,8,4)">จ่ายเงิน</button></td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger" onclick="appv(<?php echo $res['REQ_MAT_ID'] ?>, <?php echo $res['m_id'] ?>,7,4)">ยกเลิก</button>

                                                    </tr>
                                                <?php

                                                }
                                            }
                                        } else if ($_POST['assist'] == "เงินช่วยเหลือครั้งคราว") {
                                            $sql = "SELECT * from req_occ WHERE s_id=5 $date_5 $dateto_5";
                                            $db->Execute($sql);
                                            while ($res = $db->getData()) {

                                                $sqll = "SELECT * from veteran WHERE m_id=" . $res['m_id'] . " and VT_ALIVE <>0 $VT_CARD_STEP  $VT_CARD_NO $VT_FNAME $VT_LNAME";
                                                $db2->Execute($sqll);
                                                $res_v = $db2->getData();

                                                $res_mid = $res_v['VT_CARD_STEP'];
                                                $res_no = $res_v['VT_CARD_NO'];
                                                $res_name = $res_v['VT_TITLE'] . $res_v['VT_FNAME'] . ' ' . $res_v['VT_LNAME'];
                                                if (!empty($res_v)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $res['REQ_OCC_ID'] ?></td>
                                                        <td><?php echo $res['REQ_OCC_DATE'] ?></td>
                                                        <td><?php echo $res_mid ?></td>
                                                        <td><?php echo $res_no ?></td>
                                                        <td><?php echo $res_name ?></td>
                                                        <td>ค่าเงินช่วยเหลือครั้งคราว</td>
                                                        <td><?php echo $res['REQ_OCC_VALUE_APPROVE'] ?></td>
                                                        <td><button type="button" class="btn btn-green" onclick="appv(<?php echo $res['REQ_OCC_ID'] ?>, <?php echo $res['m_id'] ?>,8,2)">จ่ายเงิน</button></td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger" onclick="appv(<?php echo $res['REQ_OCC_ID'] ?>, <?php echo $res['m_id'] ?>,7,2)">ยกเลิก</button>

                                                    </tr>
                                        <?php
                                                }
                                            }
                                        }

                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
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