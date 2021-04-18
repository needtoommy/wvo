<?php
session_start();
include '../connect/db.php';
echo $_SESSION["m_id"];
$db = new DB;

$sql = "SELECT * from tbl_member 
INNER JOIN veteran ON veteran.m_id = tbl_member.m_id
WHERE tbl_member.m_id = " . intval($_SESSION["m_id"]) . " AND veteran.VT_ALIVE <>0 ";
$db->Execute($sql);
$res = $db->getData();

$sql2 = "SELECT * FROM health_value_bal 
    WHERE m_id = " . intval($_SESSION["m_id"]) . " ";
$db->Execute($sql2);
$res2 = $db->getData();

$sql3 = "SELECT * FROM occ_value_bal 
    WHERE m_id = " . intval($_SESSION["m_id"]) . " ";
$db->Execute($sql3);
$res3 = $db->getData();

$sql4 = "SELECT * FROM mat_value_bal 
    WHERE m_id = " . intval($_SESSION["m_id"]) . " ";
$db->Execute($sql4);
$res4 = $db->getData();


//$sql5 ="SELECT *
//FROM edu_value_bal 
//  WHERE m_id = " . intval($_SESSION["m_id"]) . " ";
//$db->Execute($sql5);
//$res5 = $db->getData();

$sql5 = "SELECT * FROM
    (SELECT MAX(seq) as seq,m_id  FROM edu_value_bal GROUP BY m_id) a
LEFT JOIN
    (SELECT * FROM edu_value_bal) b
    ON a.m_id =b.m_id
WHERE a.m_id =" . intval($_SESSION["m_id"]) . " ";

$db->Execute($sql5);
$res5 = $db->getData();

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
    <link href="../assets/fontawesome/css/all.css" rel="stylesheet">
    <!--load all styles -->
</head>
<style>
    .dataTables_wrapper {
        background-color: #39D679;
    }

    .dataTables_info {
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
                                        <div class="user" data-toggle="dropdown">

                                            <img src="../m_img/<?php echo $res['m_img'] ?>" class="rounded" alt="User Image" width="10%">

                                            <span class="name">
                                                <p><?php echo $res['VT_TITLE'] . ' ' . $res['VT_FNAME'] . ' ' . $res['VT_LNAME'] ?></p>
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
                    <div class="col-md-12">
                        <div class="card balance-widget">
                            <div class="card-header border-0 py-0">
                                <h4 class="card-title">สิทธิการสงเคราะห์ด้านสวัสดิการ</h4>
                            </div>
                            <br />
                            <div class="card-body pt-0">
                                <div class="balance-widget">

                                    <ul class="list-unstyled">
                                        <li class="media">

                                            <span style="font-size: 5rem; color: Dodgerblue;">
                                                <i class="fas fa-heartbeat" style="font-size: 3rem;"></i>
                                            </span> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <div class="media-body">
                                                <h5 class="m-0">ค่ารักษาพยาบาล</h5>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span style="float: right;">สิทธิเบิก : </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="float: right;"> <?php echo number_format($res2['health_value_bal_begin'], 2) ?> บาท</span>

                                                    </div>

                                                    <div class="col-md-6">
                                                        <span style="float: right;">สิทธิที่ใช้ไป : </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="float: right;"><?php echo number_format($res2['health_value_bal_use'], 2) ?> บาท</span>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <span style="float: right;">สิทธิคงเหลือ : </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="float: right;"><?php echo number_format($res2['health_value_bal_bal'], 2) ?> บาท</span>
                                                    </div>

                                                    <div class="col-md-4">
                                                    </div>
                                                    <div class="col-md-8">

                                                        <a href='medi_form_add.php' class='btn btn-warning btn-xs' style="color:white; float:right">ยื่นคำร้อง</a>

                                                        <a href='medi_history.php' class='btn btn-warning btn-xs' style="color:white;" style="">ตรวจสอบสถานะ</a>
                                                    </div>
                                                </div>
                                            </div>


                                        </li>
                                        <li class="media">
                                            <span style="font-size: 5rem; color: Dodgerblue;">
                                                <i class="fas fa-hands-helping" style="font-size: 3rem;"></i>
                                            </span> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <div class="media-body">
                                                <h5 class="m-0">เงินช่วยเหลือครั้งคราว</h5>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span style="float: right;">สิทธิเบิก : </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="float: right;"> <?php echo number_format($res3['occ_value_bal_begin'], 2) ?> บาท</span>

                                                    </div>

                                                    <div class="col-md-6">
                                                        <span style="float: right;">สิทธิที่ใช้ไป : </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="float: right;"><?php echo number_format($res3['occ_value_bal_use'], 2) ?> บาท</span>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <span style="float: right;">สิทธิคงเหลือ : </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="float: right;"><?php echo number_format($res3['occ_value_bal_bal'], 2) ?> บาท</span>
                                                    </div>

                                                    <div class="col-md-4">
                                                    </div>
                                                    <div class="col-md-8">

                                                        <a href='occ_form_add.php' class='btn btn-warning btn-xs' style="color:white; float:right">ยื่นคำร้อง</a>

                                                        <a href='occ_history.php' class='btn btn-warning btn-xs' style="color:white;" style="">ตรวจสอบสถานะ</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <?php
                                        $sql = "SELECT a.m_id FROM tbl_member a, veteran b, marital_status c, veteran_family d 
                                    WHERE a.m_id = b.m_id AND b.VT_MARITAL_ST_ID = c.MARI_ID AND b.VT_ID = d.VT_ID AND d.VT_FVT_ALIVE = 1
                                    AND a.m_id = " . $_SESSION['m_id'] . " AND d.VT_FM_RELATION = 'ภรรยา' AND b.VT_ALIVE <>0
                                    ";

                                        $db->Execute($sql);
                                        $res = $db->getData();
                                        if ($res) {
                                        ?>

                                            <li class="media">
                                                <!-- <i class="fa fa-child mr-3"></i> -->
                                                <span style="font-size: 5rem; color: Dodgerblue;">
                                                    <i class="fas fa-baby" style="font-size: 3rem;"></i>
                                                </span> &nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="media-body">
                                                    <h5 class="m-0">ค่าคลอดบุตร</h5>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <span style="float: right;">สิทธิเบิก : </span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <span style="float: right;"> <?php echo number_format($res4['mat_value_bal_begin'], 2) ?> บาท</span>

                                                        </div>

                                                        <div class="col-md-6">
                                                            <span style="float: right;">สิทธิที่ใช้ไป : </span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <span style="float: right;"><?php echo number_format($res4['mat_value_bal_use'], 2) ?> บาท</span>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <span style="float: right;">สิทธิคงเหลือ : </span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <span style="float: right;"><?php echo number_format($res4['mat_value_bal_bal'], 2) ?> บาท</span>
                                                        </div>

                                                        <div class="col-md-4">
                                                        </div>
                                                        <div class="col-md-8">

                                                            <a href='mat_form_add.php' class='btn btn-warning btn-xs' style="color:white; float:right">ยื่นคำร้อง</a>

                                                            <a href='mat_form_add.php' class='btn btn-warning btn-xs' style="color:white;" style="">ตรวจสอบสถานะ</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php  } ?>


                                        <li class="media">

                                            <span style="font-size: 5rem; color: Dodgerblue;">
                                                <i class="fas fa-house-damage" style="font-size: 3rem;"></i>
                                            </span> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <div class="media-body">
                                                <h5 class="m-0">ค่าประสบภัยพิบัติ</h5>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span style="float: right;">สิทธิเบิก : </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="float: right;"> <?php echo number_format($res3['occ_value_bal_begin'], 2) ?> บาท</span>

                                                    </div>

                                                    <div class="col-md-6">
                                                        <span style="float: right;">สิทธิที่ใช้ไป : </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="float: right;"><?php echo number_format($res3['occ_value_bal_use'], 2) ?> บาท</span>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <span style="float: right;">สิทธิคงเหลือ : </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="float: right;"><?php echo number_format($res3['occ_value_bal_bal'], 2) ?> บาท</span>
                                                    </div>

                                                    <div class="col-md-4">
                                                    </div>
                                                    <div class="col-md-8">

                                                        <a href='disa_form_add.php' class='btn btn-warning btn-xs' style="color:white; float:right">ยื่นคำร้อง</a>

                                                        <a href='disa_history.php' class='btn btn-warning btn-xs' style="color:white;" style="">ตรวจสอบสถานะ</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="media">
                                            <span style="font-size: 5rem; color: Dodgerblue;">
                                                <i class="fas fa-user-graduate" style="font-size: 3rem;"></i>
                                            </span> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <div class="media-body">
                                                <h5 class="m-0">ค่าการศึกษาบุตร</h5>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span style="float: right;">วงเงินสูงสุดที่สามารถเบิก : </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="float: right;"> <?php echo number_format($res5['edu_value_bal_begin'], 2) ?> บาท</span>

                                                    </div>

                                                    <div class="col-md-6">
                                                        <span style="float: right;">วงเงินสูงสุดที่เบิกได้ภายในปีนี้: </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="float: right;"> <?php echo number_format($res5['edu_value_bal_begin'], 2) ?> บาท</span>

                                                    </div>

                                                    <div class="col-md-6">
                                                        <span style="float: right;">สิทธิที่ใช้ไป : </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="float: right;"><?php echo number_format($res5['edu_value_bal_use'], 2) ?> บาท</span>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <span style="float: right;">สิทธิคงเหลือ : </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="float: right;"><?php echo number_format($res5['edu_value_bal_bal'], 2) ?> บาท</span>
                                                    </div>

                                                    <div class="col-md-4">
                                                    </div>
                                                    <div class="col-md-8">

                                                        <a href='edu_form_add.php' class='btn btn-warning btn-xs' style="color:white; float:right">ยื่นคำร้อง</a>

                                                        <a href='edu_history.php' class='btn btn-warning btn-xs' style="color:white;" style="">ตรวจสอบสถานะ</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="media">
                                            <span style="font-size: 5rem; color: Dodgerblue;">
                                                <i class="fas fa-hand-holding-usd" style="font-size: 3rem;"></i>
                                            </span> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <div class="media-body">
                                                <h5 class="m-0">เงินเลี้ยงชีพรายเดือน</h5>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <span style="float: right;">สิทธิเบิก : </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="float: right;"> <?php echo number_format($res3['occ_value_bal_begin'], 2) ?> บาท</span>

                                                    </div>

                                                    <div class="col-md-6">
                                                        <span style="float: right;">สิทธิที่ใช้ไป : </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="float: right;"><?php echo number_format($res3['occ_value_bal_use'], 2) ?> บาท</span>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <span style="float: right;">สิทธิคงเหลือ : </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span style="float: right;"><?php echo number_format($res3['occ_value_bal_bal'], 2) ?> บาท</span>
                                                    </div>

                                                    <div class="col-md-4">
                                                    </div>
                                                    <div class="col-md-8">

                                                        <a href='monthly_form_add.php' class='btn btn-warning btn-xs' style="color:white; float:right">ยื่นคำร้อง</a>

                                                        <a href='occ_form_add.php' class='btn btn-warning btn-xs' style="color:white;" style="">ตรวจสอบสถานะ</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>



            </div>
            <!--
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
    </div> -->


            <!--
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
    </div> -->

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