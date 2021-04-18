<?php
session_start();
include '../connect/db.php';
echo $_SESSION["m_id"];
$db = new DB;

$sql = "SELECT * from tbl_member 
INNER JOIN veteran ON veteran.m_id = tbl_member.m_id
WHERE tbl_member.m_id = " . intval($_SESSION["m_id"]) . "  AND veteran.VT_ALIVE <>0";
$db->Execute($sql);
$res = $db->getData();

$sql2 = "SELECT * FROM health_value_bal 
    WHERE m_id = " . intval($_SESSION["m_id"]) . " ";
$db->Execute($sql2);
$res2 = $db->getData();

?>



<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ระบบสวัสดิการสงเคราะห์</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="./vendor/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="./vendor/waves/waves.min.css">
    <link rel="stylesheet" href="./vendor/toastr/toastr.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
</head>
<style>
    .dataTables_wrapper {
        background-color: #39D679;
    }

    .dataTables_info{
        display: none;

    }

</style>

<body>

    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    <div id="main-wrapper">

        <div class="header dashboard">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <nav class="navbar navbar-expand-lg navbar-light px-0 justify-content-between">
                            <a class="navbar-brand" href="index.php"><img src="./images/logo.png" alt=""></a>

                            <div class="dashboard_log my-2">
                                <div class="d-flex align-items-center">
                                    <!--<div class="account_money">
                                        <ul>
                                            <li class="crypto">
                                                <span>0.0025</span>
                                                <i class="cc BTC"></i>
                                            </li>
                                            <li class="usd">
                                                <span>19.93 USD</span>
                                            </li>
                                        </ul>
                                    </div>-->
                                    <div class="profile_log dropdown">
                                        <div   class="user" data-toggle="dropdown">
                                        
                                        <img src="../m_img/<?php echo $res['m_img'] ?>" class="rounded" alt="User Image" width="10%" >
                                           
                                            <span  class="name">
                                                <p><?php echo $res['VT_TITLE'].' '.$res['VT_FNAME'].' '. $res['VT_LNAME'] ?></p>
                                            </span>
                                            <span class="arrow"><i class="la la-angle-down"></i></span>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="accounts.html" class="dropdown-item">
                                                <i class="la la-user"></i> Account
                                            </a>
                                            <a href="history.html" class="dropdown-item">
                                                <i class="la la-book"></i> History
                                            </a>
                                            <a href="settings.html" class="dropdown-item">
                                                <i class="la la-cog"></i> Setting
                                            </a>
                                            <a href="lock.html" class="dropdown-item">
                                                <i class="la la-lock"></i> Lock
                                            </a>
                                            <a href="signin.html" class="dropdown-item logout">
                                                <i class="la la-sign-out"></i> Logout
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="sidebar">
            <div class="menu">
                <ul>
                    <li>
                        <a href="dashboard.html" data-toggle="tooltip" data-placement="right" title="Home" class="active">
                            <span><i class="la la-igloo"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="buy-sell.html" data-toggle="tooltip" data-placement="right" title="Exchange">
                            <span><i class="la la-exchange"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="accounts.html" data-toggle="tooltip" data-placement="right" title="Account">
                            <span><i class="la la-user"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="settings.html" data-toggle="tooltip" data-placement="right" title="Setting">
                            <span><i class="la la-tools"></i></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>



        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card balance-widget">
                            <div class="card-header border-0 py-0">
                                <h4 class="card-title">สิทธิการสงเคราะห์</h4>
                            </div>
                            <br />
                            <div class="card-body pt-0">
                                <div class="balance-widget">

                                    <ul class="list-unstyled">
                                        <li class="media">
                                            <i class="fa fa-medkit"aria-hidden="true"></i>
                                            <div class="media-body">
                                                <h5 class="m-0">ค่ารักษาพยาบาล</h5>
                                            </div>
                                            <div class="text-right">
                                                <p>สิทธิเ<?php echo number_format($res2['health_value_bal_begin'],2) ?></p>
                                                <p>0.125 USD</p>
                                                <a href='medi_form_add.php' class='btn btn-warning btn-xs' style="color:white">ยื่นคำร้อง</a> 
                                            </div>
                                        </li>
                                        <li class="media">
                                            <i class="cc LTC mr-3"></i>
                                            <div class="media-body">
                                                <h5 class="m-0">เงินช่วยเหลือครั้งคราว</h5>
                                            </div>
                                            <div class="text-right">
                                                <p>0.125 USD</p>
                                                <p>0.125 USD</p>
                                                <a href='case_medi.php?act=view&REQ_HEL_ID=$row[0]' class='btn btn-warning btn-xs' style="color:white">ยื่นคำร้อง</a>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <i class="cc XRP mr-3"></i>
                                            <div class="media-body">
                                                <h5 class="m-0">ค่าคลอดบุตร</h5>
                                            </div>
                                            <div class="text-right">
                                                <h5>0.000242 XRP</h5>
                                                <span>0.125 USD</span>
                                                <a href='case_medi.php?act=view&REQ_HEL_ID=$row[0]' class='btn btn-warning btn-xs' style="color:white">ยื่นคำร้อง</a>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <i class="cc DASH mr-3"></i>
                                            <div class="media-body">
                                                <h5 class="m-0">ค่าประสบภัยพิบัติ</h5>
                                            </div>
                                            <div class="text-right">
                                                <h5>0.000242 XRP</h5>
                                                <span>0.125 USD</span>
                                                <a href='case_medi.php?act=view&REQ_HEL_ID=$row[0]' class='btn btn-warning btn-xs' style="color:white">ยื่นคำร้อง</a>
                                            </div>
                                        </li>

                                        <li class="media">
                                            <i class="cc DASH mr-3"></i>
                                            <div class="media-body">
                                                <h5 class="m-0">ค่าการศึกษาบุตร</h5>
                                            </div>
                                            <div class="text-right">
                                                <h5>0.000242 XRP</h5>
                                                <span>0.125 USD</span>
                                                <a href='case_medi.php?act=view&REQ_HEL_ID=$row[0]' class='btn btn-warning btn-xs' style="color:white">ยื่นคำร้อง</a>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <table id="example" class="display" style="width:100%; color:black">
                            <thead>
                                <tr>
                                    <th width='5%'>เลขใบคำร้อง</th>
                                    <th width='10%'>วันที่รับคำร้อง</th>
                                    <th width='15%'>ชื่อ-สกุล</th>
                                    <th width='15%'>รายละเอียดการเบิก</th>
                                    <th width='10%'>จำนวนเงินขอเบิก</th>
                                    <th width='10%'>จำนวนเงินอนุมัติ</th>
                                    <th width='10%'>สถานะ</th>
                                    <th width='8%'>ดูรายละเอียด</th>

                                </tr>
                            </thead>

                            <tbody>

                                <?php


                                $query = "
                                    SELECT * FROM req_health as rh 
                                    INNER JOIN tbl_member as m ON m.m_id = rh.m_id 
                                    INNER JOIN tbl_status as st ON st.s_id = rh.s_id 
                                    WHERE rh.m_id = " . intval($_SESSION['m_id']) . " AND m.m_alive <> 0
                                    ORDER BY rh.m_id DESC";

                                $db->Execute($query);
                                while ($res = $db->getData()) {

                                    echo "<tr>";
                                    echo "<td>" . $res["REQ_HEL_ID"] .  "</td> ";

                                    echo "<td>" . $res["REQ_HEL_DATE"] .  "</td> ";
                                    
                                    echo "<td>" . $res["m_fname"] . $res["m_name"] . ' ' . $res["m_lname"] . "</td> ";
                                    echo "<td>" . $res["REQ_HEL_DETAIL"] .  "</td> ";
                                    echo "<td>" . $res["REQ_HEL_VALUE"] .  "</td> ";
                                    echo "<td>" . $res["REQ_HEL_VALUE_APPROVE"] .  "</td> ";
                                    echo "<td>" . $res["s_name"] .  "</td> ";
                                    echo "<td><a href='case_medi.php?act=view&REQ_HEL_ID=$res[0]' class='btn btn-warning btn-xs'>ดูรายละเอียด</a> 
                                        </td> ";
                                    
                                    echo "</tr>";
                                }

                                ?>

                            </tbody>
                           <!-- <tfoot>
                                <tr>
                                <th width='5%'>เลขใบคำร้อง</th>
                                    <th width='10%'>วันที่รับคำร้อง</th>
                                    <th width='15%'>ชื่อ-สกุล</th>
                                    <th width='15%'>รายละเอียดการเบิก</th>
                                    <th width='10%'>จำนวนเงินขอเบิก</th>
                                    <th width='10%'>จำนวนเงินอนุมัติ</th>
                                    <th width='10%'>สถานะ</th>
                                    <th width='8%'>ดูรายละเอียด</th>

                                </tr>
                            </tfoot> -->
                        </table>
                    </div>


                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-xxl-4">
                        <div class="card">
                            <div class="card-header border-0 py-0">
                                <h4 class="card-title">Exchange</h4>
                            </div>
                            <div class="card-body">
                                <div class="buy-sell-widget">
                                    <form method="post" name="myform" class="currency_validate">
                                        <div class="form-group">
                                            <label class="mr-sm-2">Currency</label>
                                            <div class="input-group mb-3">
                                                <select name='currency' class="form-control">
                                                    <option data-display="Bitcoin" value="bitcoin">Bitcoin</option>
                                                    <option value="litecoin">Litecoin</option>
                                                </select>
                                                <input type="text" name="usd_amount" class="form-control" value="125.00 USD">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="mr-sm-2">Payment Method</label>
                                            <div class="input-group mb-3">
                                                <select name='currency' class="form-control">
                                                    <option data-display="Bitcoin" value="bitcoin">Bitcoin</option>
                                                    <option value="litecoin">Litecoin</option>
                                                </select>
                                                <input type="text" name="usd_amount" class="form-control" value="125.00 USD">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="mr-sm-2">Enter your amount</label>
                                            <div class="input-group">
                                                <input type="text" name="currency_amount" class="form-control" placeholder="0.0214 BTC">
                                                <input type="text" name="usd_amount" class="form-control" placeholder="125.00 USD">
                                            </div>
                                            <div class="d-flex justify-content-between mt-3">
                                                <p class="mb-0">Monthly Limit</p>
                                                <h6 class="mb-0">$49750 remaining</h6>
                                            </div>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-success btn-block">Exchange
                                            Now</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8 col-xxl-8">
                        <div class="card">
                            <div class="card-header border-0 py-0">
                                <h4 class="card-title">Recent Activities</h4>
                                <a href="#">View More </a>
                            </div>
                            <div class="card-body">
                                <div class="transaction-table">
                                    <div class="table-responsive">
                                        <table class="table mb-0 table-responsive-sm">
                                            <tbody>
                                                <tr>
                                                    <td><span class="sold-thumb"><i class="la la-arrow-down"></i></span>
                                                    </td>

                                                    <td>
                                                        <span class="badge badge-danger">Sold</span>
                                                    </td>
                                                    <td>
                                                        <i class="cc BTC"></i> Bitcoin
                                                    </td>
                                                    <td>
                                                        Using - Bank *******5264
                                                    </td>
                                                    <td class="text-danger">-0.000242 BTC</td>
                                                    <td>-0.125 USD</td>
                                                </tr>
                                                <tr>
                                                    <td><span class="buy-thumb"><i class="la la-arrow-up"></i></span>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-success">Buy</span>
                                                    </td>
                                                    <td>
                                                        <i class="cc LTC"></i> Litecoin
                                                    </td>
                                                    <td>
                                                        Using - Card *******8475
                                                    </td>
                                                    <td class="text-success">-0.000242 BTC</td>
                                                    <td>-0.125 USD</td>
                                                </tr>
                                                <tr>
                                                    <td><span class="sold-thumb"><i class="la la-arrow-down"></i></span>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-danger">Sold</span>
                                                    </td>
                                                    <td>
                                                        <i class="cc XRP"></i> Ripple
                                                    </td>
                                                    <td>
                                                        Using - Card *******8475
                                                    </td>
                                                    <td class="text-danger">-0.000242 BTC</td>
                                                    <td>-0.125 USD</td>
                                                </tr>
                                                <tr>
                                                    <td><span class="buy-thumb"><i class="la la-arrow-up"></i></span>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-success">Buy</span>
                                                    </td>
                                                    <td>
                                                        <i class="cc DASH"></i> Dash
                                                    </td>
                                                    <td>
                                                        Using - Card *******2321
                                                    </td>
                                                    <td class="text-success">-0.000242 BTC</td>
                                                    <td>-0.125 USD</td>
                                                </tr>
                                                <tr>
                                                    <td><span class="sold-thumb"><i class="la la-arrow-down"></i></span>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-danger">Sold</span>
                                                    </td>
                                                    <td>
                                                        <i class="cc BTC"></i> Bitcoin
                                                    </td>
                                                    <td>
                                                        Using - Card *******2321
                                                    </td>
                                                    <td class="text-danger">-0.000242 BTC</td>
                                                    <td>-0.125 USD</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="footer dashboard">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="copyright">
                            <p>© Copyright 2019 <a href="#">Tradix</a> I All Rights Reserved</p>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="footer-social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--removeIf(production)-->
        <!--**********************************
            Right sidebar start
        ***********************************-->
        <div class="sidebar-right">
            <a class="sidebar-right-trigger" href="javascript:void(0)">
                <span><i class="fa fa-cog fa-spin"></i></span>
            </a>
            <div class="sidebar-right-inner">
                <div class="admin-settings">
                    <div class="opt-background">
                        <p>Font Family</p>
                        <select class="form-control" name="theme_font" id="theme_font">
                            <option value="nunito">Nunito</option>
                            <option value="poppins">Poppins</option>

                            <option value="opensans">Open Sans</option>

                        </select>
                    </div>
                    <div>
                        <p>Primary Color</p>
                        <div class="opt-nav-header-color">
                            <span>
                                <input type="radio" name="navigation_header" value="color_1" class="filled-in chk-col-primary" id="nav_header_color_1" />
                                <label for="nav_header_color_1"></label>
                            </span>
                            <span>
                                <input type="radio" name="navigation_header" value="color_2" class="filled-in chk-col-primary" id="nav_header_color_2" />
                                <label for="nav_header_color_2"></label>
                            </span>
                            <span>
                                <input type="radio" name="navigation_header" value="color_3" class="filled-in chk-col-primary" id="nav_header_color_3" />
                                <label for="nav_header_color_3"></label>
                            </span>
                            <span>
                                <input type="radio" name="navigation_header" value="color_4" class="filled-in chk-col-primary" id="nav_header_color_4" />
                                <label for="nav_header_color_4"></label>
                            </span>
                            <span>
                                <input type="radio" name="navigation_header" value="color_5" class="filled-in chk-col-primary" id="nav_header_color_5" />
                                <label for="nav_header_color_5"></label>
                            </span>
                        </div>
                    </div>
                    <div class="opt-header-color">
                        <p>Background Color</p>
                        <div>
                            <span>
                                <input type="radio" name="header_bg" value="color_1" class="filled-in chk-col-primary" id="header_color_1">
                                <label for="header_color_1"></label>
                            </span>
                            <span>
                                <input type="radio" name="header_bg" value="color_2" class="filled-in chk-col-primary" id="header_color_2">
                                <label for="header_color_2"></label>
                            </span>
                            <span>
                                <input type="radio" name="header_bg" value="color_3" class="filled-in chk-col-primary" id="header_color_3">
                                <label for="header_color_3"></label>
                            </span>
                            <span>
                                <input type="radio" name="header_bg" value="color_4" class="filled-in chk-col-primary" id="header_color_4">
                                <label for="header_color_4"></label>
                            </span>
                            <span>
                                <input type="radio" name="header_bg" value="color_5" class="filled-in chk-col-primary" id="header_color_5">
                                <label for="header_color_5"></label>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Right sidebar end
        ***********************************-->
        <!--endRemoveIf(production)-->

    </div>


    <script src="./js/global.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>


    <script src="./vendor/circle-progress/circle-progress.min.js"></script>
    <script src="./vendor/circle-progress/circle-progress-init.js"></script>


    <!--  flot-chart js -->
    <script src="./vendor/apexchart/apexcharts.min.js"></script>
    <script src="./vendor/apexchart/apexchart-init.js"></script>


    <!-- <script src="./js/dashboard.js"></script> -->
    <script src="./js/dashboard.js"></script>
    <script src="./js/scripts.js"></script>

    <script src="./js/settings.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/styleSwitcher.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>