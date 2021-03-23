<?php
session_start();
include '../connect/db.php';
$db = new DB();
$type = $_GET['type'];
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
    <link href="../assets/plugins/gritter/css/jquery.gritter.css" rel="style+sheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->


    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="../assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="../assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
    <link href="../assets/plugins/datatables.net-autofill-bs4/css/autofill.bootstrap4.min.css" rel="stylesheet" />
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
                    <form method="POST" name="search" id="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter keyword" />


                        </div>
                        <input type="hidden" name="popupid" id="popupid">
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
                    <?php

                    $level = $_SESSION['m_level'];
                    $level = 'vsofficer';
                    if ($level == 'vsofficer') {
                    ?>
                        <li class="has-sub active">
                            <a href="calendar.html">
                                <i class="fa fa-edit"></i>
                                <span> ตรวจสอบใบคำร้อง</span>
                            </a>
                            <ul class="sub-menu">
                                <li class="active"><a href="req_verify.php?type=a">ค่ารักษาพยาบาล</a></li>
                                <li><a href="req_verify.php?type=b">เงินช่วยเหลือครั้งคราว</a></li>
                                <li><a href="req_verify.php?type=c">ค่าประสบภัยพิบัติ</a></li>
                                <li><a href="req_verify.php?type=d">ค่าคลอดบุตร</a></li>
                                <li><a href="req_verify.php?type=e">ค่าการศึกษาบุตร</a></li>
                                <li><a href="req_verify.php?type=f">เงินช่วยเหลือรายเดือน</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fa fa-edit"></i>
                                <span>ตรวจสอบใบคำร้องเงินครั้งคราว</span>
                            </a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fa fa-edit"></i>
                                <span>จัดการสมาชิก</span>
                            </a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fa fa-edit"></i>
                                <span>จัดการตำแหน่ง</span>
                            </a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fa fa-edit"></i>
                                <span>จัดการสถานะ</span>
                            </a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fa fa-edit"></i>
                                <span>จัดการแผนก</span>
                            </a>
                        </li>
                    <?php
                    } else if ($level == 'finoffice') {
                    ?>
                        <li>
                            <a href="calendar.html">
                                <i class="fa fa-edit"></i>
                                <span> ตรวจสอบใบคำร้องค่ารักษาฯ</span>
                            </a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fa fa-edit"></i>
                                <span> อนุมัติใบคำร้องเงินครั้งคราวฯ</span>
                            </a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fa fa-edit"></i>
                                <span>จัดการสมาชิก</span>
                            </a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fa fa-edit"></i>
                                <span>จัดการตำแหน่ง</span>
                            </a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fa fa-edit"></i>
                                <span>จัดการสถานะ</span>
                            </a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fa fa-edit"></i>
                                <span>จัดการแผนก</span>
                            </a>
                        </li>
                    <?php
                    } else if ($level == 'finmanager') {
                    ?>
                        <li>
                            <a href="calendar.html">
                                <i class="fa fa-edit"></i>
                                <span> ตรวจสอบใบคำร้องค่ารักษาฯ</span>
                            </a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fa fa-edit"></i>
                                <span> อนุมัติใบคำร้องเงินครั้งคราวฯ</span>
                            </a>
                        </li>
                    <?php
                    } else if ($level == 'vsmanager') {
                    ?>
                        <li>
                            <a href="calendar.html">
                                <i class="fa fa-edit"></i>
                                <span> ตรวจสอบใบคำร้องค่ารักษาฯ</span>
                            </a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fa fa-edit"></i>
                                <span> อนุมัติใบคำร้องเงินครั้งคราวฯ</span>
                            </a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fa fa-edit"></i>
                                <span>ดูรายงาน</span>
                            </a>
                        </li>

                    <?php
                    } else if ($level == 'admin') {
                    ?>
                        <li>
                            <a href="calendar.html">
                                <i class="fa fa-edit"></i>
                                <span> ตรวจสอบใบคำร้องค่ารักษาฯ</span>
                            </a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fa fa-edit"></i>
                                <span> อนุมัติใบคำร้องเงินครั้งคราวฯ</span>
                            </a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fa fa-edit"></i>
                                <span>จัดการสมาชิก</span>
                            </a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fa fa-edit"></i>
                                <span>จัดการตำแหน่ง</span>
                            </a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fa fa-edit"></i>
                                <span>จัดการสถานะ</span>
                            </a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fa fa-edit"></i>
                                <span>จัดการแผนก</span>
                            </a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fa fa-edit"></i>
                                <span>จัดการบัญชี</span>
                            </a>
                        </li>
                    <?php
                    }
                    ?>


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
            <h1 class="page-header">ค่ารักษาพยาบาล <small>header small text goes here...</small></h1>
            <!-- end page-header -->

            <!-- begin row -->
            <div class="row">
                <!-- begin col-3 -->
                <div class="col-xl-3 col-md-5">
                    <div class="widget widget-stats bg-yellow">
                        <div class="stats-icon"><i class="fa fa-desktop"></i></div>
                        <div class="stats-info">
                            <h4>รออนุมัติ</h4>
                            <?php
                            $sql = "SELECT count(*) as count from req_health where s_id = 1";
                            $db->Execute($sql);
                            $res =  $db->getData();
                            ?>
                            <p><?php echo $res['count']; ?></p>
                        </div>
                        <div class="stats-link">
                            <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end col-3 -->
                <!-- begin col-3 -->
                <div class="col-xl-3 col-md-5">
                    <div class="widget widget-stats bg-info">
                        <div class="stats-icon"><i class="fa fa-link"></i></div>
                        <div class="stats-info">
                            <h4>อนุมัติ</h4>
                            <?php
                            $sql = "SELECT count(*) as count from req_health where s_id = 3";
                            $db->Execute($sql);
                            $res =  $db->getData();
                            ?>
                            <p><?php echo $res['count']; ?></p>
                        </div>
                        <div class="stats-link">
                            <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end col-3 -->
                <!-- begin col-3 -->
                <div class="col-xl-3 col-md-5">
                    <div class="widget widget-stats bg-green">
                        <div class="stats-icon"><i class="fa fa-link"></i></div>
                        <div class="stats-info">
                            <h4>อนุมัติเบิกจ่าย</h4>
                            <?php
                            $sql = "SELECT count(*) as count from req_health where s_id = 5";
                            $db->Execute($sql);
                            $res =  $db->getData();
                            ?>
                            <p><?php echo $res['count']; ?></p>
                        </div>
                        <div class="stats-link">
                            <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end col-3 -->
                <!-- begin col-3 -->
                <div class="col-xl-3 col-md-5">
                    <div class="widget widget-stats bg-red">
                        <div class="stats-icon"><i class="fa fa-users"></i></div>
                        <div class="stats-info">
                            <h4>ยกเลิก</h4>
                            <?php
                            $sql = "SELECT count(*) as count from req_health where s_id = 7";
                            $db->Execute($sql);
                            $res =  $db->getData();
                            ?>
                            <p><?php echo $res['count']; ?></p>
                        </div>
                        <div class="stats-link">
                            <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end col-3 -->
                <!-- begin col-3 
                <div class="col-xl-3 col-md-5">
                    <div class="widget widget-stats bg-orange">
                        <div class="stats-icon"><i class="fa fa-clock"></i></div>
                        <div class="stats-info">
                            <h4>รวมรายการยื่นคำร้อง</h4>
                            <?php
                            $sql = "SELECT count(*) as count from req_health";
                            $db->Execute($sql);
                            $res =  $db->getData();
                            ?>
                            <p><?php echo $res['count']; ?></p>
                        </div>
                        <div class="stats-link">
                            <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                        </div>
                    </div>
                </div>-->
                <!-- end col-3 -->
            </div>
            <!-- end row -->
            <!-- begin col-10 -->
            <div class="col-xl-12">
                <!-- begin panel -->
                <div class="panel panel-inverse">
                    <!-- begin panel-heading -->
                    <div class="panel-heading">
                        <h4 class="panel-title">ข้อมูลค่ารักษาพยาบาล</h4>
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <!-- end panel-heading -->
                    <!-- begin alert -->
                    <div class="alert alert-info fade show">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        AutoFill gives an Excel like option to a DataTable to click and drag over multiple cells,
                        filling in information over the selected cells and incrementing numbers as needed.
                        Try to mouseover and drag over any table column below.
                    </div>
                    <!-- end alert -->
                    <!-- begin panel-body -->
                    <div class="panel-body">
                        <table id="data-table-autofill" class="table table-striped table-bordered table-td-valign-middle">
                            <thead>
                                <tr>
                                    <th width='2%' class="text-nowrap">เลขใบคำร้อง</th>
                                    <th class="text-nowrap">วันที่รับคำร้อง</th>
                                    <th class="text-nowrap">ชื่อ_สกุล</th>
                                    <th class="text-nowrap">รายละเอียดรับการสงเคราะห์</th>
                                    <th class="text-nowrap">จำนวนเงินขอเบิก</th>

                                    <th class="text-nowrap">จำนวนเงินอนุมัติ</th>
                                    <th class="text-nowrap">สถานะ</th>
                                    <th class="text-nowrap">ปรับสถานะ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "
                                    SELECT * FROM req_health as rh 
                                    INNER JOIN tbl_member as m ON m.m_id = rh.m_id 
                                    INNER JOIN tbl_status as st ON st.s_id = rh.s_id 
                                    WHERE rh.s_id ='1'
                                    ORDER BY rh.REQ_HEL_ID DESC";

                                $db->Execute($query);
                                while ($row = $db->getData()) {

                                    echo "<tr class='gradeA'>";
                                    echo "<td>" . $row["REQ_HEL_ID"] .  "</td> ";
                                    echo "<td>" . $row["REQ_HEL_DATE"] .  "</td> ";
                                    echo "<td>" . $row["m_fname"] . $row["m_name"] . ' ' . $row["m_lname"] . "</td> ";
                                    echo "<td>" . $row["REQ_HEL_DETAIL"] .  "</td> ";
                                    echo "<td>" . $row["REQ_HEL_VALUE"] .  "</td> ";
                                    echo "<td>" . $row["REQ_HEL_VALUE_APPROVE"] .  "</td> ";
                                    echo "<td>" . $row["s_name"] .  "</td> ";
                                    echo "<td> <a  data-toggle='modal' data-target='.bd-example-modal-lg' onclick='popup(REQ_HEL_ID=$row[0])' class='btn btn-warning btn-xs'>ดูรายการ</a> </td> ";

                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>



                    </div>
                    <!-- end panel-body -->
                </div>
                <!-- end panel -->
            </div>
            <!-- end col-10 -->
        </div>
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

    <script>
        function popup(n) {
            $('#popupid').val(n)

            $.ajax({
                type: "POST",
                url: "modal.php",
                data: $("#search").serialize(),

                success: function(data) {
                    $('.modal-content').html(data)
                }
            });
            /*$('#search').submit();*/
        }


        function send(n) {

            $pass = 1;
            if (n == 7) {
                $('#reason').css('display', '');
                if ($('#REQ_HEL_CC_REASON').val() == '') {

                    pass = 0
                    return false
                }else{
                    pass = 1
                }
            }



            if (pass == 1) {
                $.ajax({
                    type: "POST",
                    url: "req_verify_edit_db.php",
                    data: $("#req_form").serialize() + "&status=" + n,

                    success: function(data) {
                        if (data == "success") {
                            alert('อนุมัติสำเร็จ')
                            $('#myModal').modal('hide')
                            window.location = "req_verify.php";
                        } else {
                            $('#myModal').modal('hide')
                            window.location = "req_verify.php";
                        }

                    }
                });
            }



        }
    </script>

    <!-- ================== END PAGE LEVEL JS ================== -->


    <div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

            </div>
        </div>
    </div>

</body>

</html>