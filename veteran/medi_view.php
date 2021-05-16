<?php
session_start();
include '../connect/db.php';
echo $_SESSION["m_id"];
$db = new DB;
$ID = $_GET['REQ_HEL_ID'];

$sql = "SELECT VT_ID, VT_FM_ID FROM  req_health WHERE REQ_HEL_ID=$ID";
$db->Execute($sql);
$res = $db->getData();

if ($res['VT_ID'] != "") {
    $sql = "SELECT * FROM req_health 
    INNER JOIN tbl_status ON req_health.s_id =tbl_status.s_id 
    INNER JOIN health_value_bal ON req_health.m_id = health_value_bal.m_id
    INNER JOIN veteran ON req_health.m_id = veteran.m_id
    INNER JOIN gov_hos ON gov_hos.GOV_HOS_ID = req_health.GOV_HOS_ID
    WHERE req_health.REQ_HEL_ID=$ID AND veteran.VT_ALIVE <>0
    AND req_health.VT_ID = veteran.VT_ID";
    $db->Execute($sql);
} else {
    $sql = "SELECT * FROM req_health 
    INNER JOIN tbl_status ON req_health.s_id =tbl_status.s_id 
    INNER JOIN health_value_bal ON req_health.m_id = health_value_bal.m_id
    INNER JOIN veteran ON req_health.m_id = veteran.m_id
    INNER JOIN veteran_family ON veteran.VT_ID = veteran_family.VT_ID
    INNER JOIN gov_hos ON gov_hos.GOV_HOS_ID = req_health.GOV_HOS_ID
    WHERE req_health.REQ_HEL_ID=$ID AND veteran.VT_ALIVE <>0
    AND req_health.VT_FM_ID = veteran_family.VT_FM_ID";
    $db->Execute($sql);
}

$res = $db->getData();

$sql2 = "SELECT * from tbl_member 
INNER JOIN veteran ON veteran.m_id = tbl_member.m_id
WHERE tbl_member.m_id = " . intval($_SESSION["m_id"]) . "  AND veteran.VT_ALIVE <>0";
$db->Execute($sql2);
$res2 = $db->getData();



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ระบบสวัสดิการสงเคราะห์ทหารผ่านศึก</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="./vendor/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="./vendor/waves/waves.min.css">
    <link rel="stylesheet" href="./vendor/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100;300;400&display=swap" rel="stylesheet">
</head>
<style>
    body {
        font-family: 'Prompt', sans-serif !important;
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
                            <a class="navbar-brand" href="index.html"><img src="./images/logo.png" alt="">
                            </a>
                            <div class="dashboard_log my-2">
                                <div class="d-flex align-items-center">

                                    <div class="profile_log dropdown">
                                        <div class="user" data-toggle="dropdown">
                                            <span>
                                                <img style="border-radius: 50%;" src="../m_img/<?php echo $res2['m_img'] ?>" alt="User Image" width="45" height="45"></span>
                                            &nbsp;
                                            <p><?php echo $res2['VT_TITLE'] . ' ' . $res2['VT_FNAME'] . ' ' . $res2['VT_LNAME'] ?></p>
                                            <span class="arrow"><i class="la la-angle-down"></i></span>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="../index.php" class="dropdown-item logout">
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
                        <a href="index.php" data-toggle="tooltip" data-placement="right" title="Home" class="active">
                            <span><i class="la la-home"></i></span>
                        </a>
                    </li>
                    <li>
                        <a href="profile_vt.php" data-toggle="tooltip" data-placement="right" title="Account">
                            <span><i class="la la-user"></i></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="page-title dashboard">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-title-content">
                            <p>ยื่นคำร้องขอเบิกค่ารักษาพยาบาล โดย
                                <!--<span>  <p><?php echo $res['VT_TITLE'] . ' ' . $res['VT_FNAME'] . ' ' . $res['VT_LNAME'] ?></p></span> -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="buyer-seller">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="buyer-info">
                                            <div class="media">

                                                <div class="media-body">
                                                    <h4> <?php echo $res2['VT_TITLE'] . ' ' . $res2['VT_FNAME'] . ' ' . $res2['VT_LNAME'] ?></h4>
                                                    <h5>ชั้นบัตร <?php echo $res2['VT_CARD_STEP']; ?> &nbsp;&nbsp;&nbsp;เลขที่บัตร <?php echo $res2['VT_CARD_NO']; ?></h5>

                                                    <h5>เลขปรจำตัวประชาชน <?php echo $res2['VT_ID_NUM']; ?> </h5>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>

                                                <tr>
                                                    <?php
    // print_r($res);
                                                    ?>
                                                    <td>วันที่ยื่นคำร้อง</td>
                                                    <td><?php echo $res['REQ_HEL_DATE']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>สถานะรายการ</td>
                                                    <td> <?php
                                                            $s_id = $res["s_id"];
                                                            if ($s_id == 1) {
                                                                echo '<font color="yellow">';
                                                                echo $res['s_name'];
                                                                echo '</font>';
                                                            } else if ($s_id == 3) {
                                                                echo '<font color="#FFC300 ">';
                                                                echo $res['s_name'];
                                                                echo '</font>';
                                                            } else if ($s_id == 5) {
                                                                echo '<font color="#1DEC72">';
                                                                echo $res['s_name'];
                                                                echo '</font>';
                                                            } else {
                                                                echo '<font color="green">';
                                                                echo 'กำลังดำเนินการ';
                                                                echo '</font>';
                                                            }
                                                            ?>


                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>เบิกให้</td>
                                                    <td><?php echo $res['VT_FM_TITLE'] . ' ' . $res['VT_FM_NAME'] . ' ' . $res['VT_FM_LNAME'] ?>&nbsp;&nbsp;เกี่ยวข้องเป็น&nbsp;<?php echo $res['VT_FM_RELATION'] ? $res['VT_FM_RELATION'] : 'ตนเอง' ?></td>
                                                </tr>
                                                <tr>
                                                    <td>ชื่อสถานพยาบาล</td>
                                                    <td><?php echo $res['GOV_HOS_NAME']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>ป่วยเป็นโรค</td>
                                                    <td><?php echo $res['REQ_HEL_SICKNESS']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>รายละเอียด</td>
                                                    <td><?php echo $res['REQ_HEL_DETAIL']; ?></td>
                                                </tr>

                                                <tr>
                                                    <td>จำนวนเงินขอเบิก</td>
                                                    <td><?php echo $res['REQ_HEL_VALUE']; ?>&nbsp;บาท</td>
                                                </tr>

                                                <tr>
                                                    <td>วิธีการรับเงิน</td>
                                                    <td>

                                                        <?php
                                                        $REQ_HEL_PAY_TYPE = $res["REQ_HEL_PAY_TYPE"];
                                                        if ($REQ_HEL_PAY_TYPE == 1) {
                                                            echo '<font color="#82E0AA ">';
                                                            echo 'รับเงินด้วยตนเองที่ อผศ.';
                                                            echo '</font>';
                                                        } else {
                                                            echo '<font color="#85C1E9">';
                                                            echo 'โอนผ่านธนาคาร';
                                                            echo '</font>';
                                                        }
                                                        ?>



                                                    </td>
                                                </tr>
                                                <!--<tr>
                                                    <td>Vat</td>
                                                    <td>
                                                        <div class="text-danger">$25.00 USD</div>
                                                    </td>
                                                </tr>-->
                                                <tr>
                                                    <td>ไฟล์แนบ</td>
                                                    <td> <?php
                                                            $sql3 = "SELECT file_name, is_image FROM multi_file where m_id = " . $res['m_id'] . " and vs_id ='1' and req_id= " . $res['REQ_HEL_ID'] . "";
                                                            // exit;
                                                            $db->Execute($sql3);

                                                            $i = 1;
                                                            while ($res3 = $db->getData()) {

                                                                // 0 = image, 1 not image
                                                                if ($res3['is_image'] == 0) {
                                                            ?>
                                                                <div class="form-group">
                                                                    <div class="col-sm-2 control-label">
                                                                        ดูใบเสร็จ <?php echo $i ?>:
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <img src="../c_img/<?php echo $res3['file_name']; ?>" alt="<?php echo $res3['file_name']; ?>" width="500" height="500">
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
                                                                        <a href="../c_img/<?php echo $res3['file_name']; ?>" download>
                                                                            โหลดเอกสาร <?php echo $i ?>
                                                                        </a>

                                                                    </div>
                                                                </div>
                                                        <?php }
                                                                $i++;
                                                            } ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <center>
                                            <a href='medi_history.php' style="color:white;" class='btn btn-warning btn-s'>กลับหน้าหลัก</a>

                                        </center>

                                    </div>
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
                        <p><a href="#">ระบบสวัสดิการสงเคราะห์</a> </p>
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


    </div>



    <script src="./js/global.js"></script>


    <script src="./vendor/magnific-popup/magnific-popup.js"></script>
    <script src="./vendor/magnific-popup/magnific-popup-init.js"></script>



    <script src="./vendor/validator/jquery.validate.js"></script>
    <script src="./vendor/validator/validator-init.js"></script>
    <script src="./js/scripts.js"></script>

    <script src="./js/settings.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/styleSwitcher.js"></script>
</body>

</html>