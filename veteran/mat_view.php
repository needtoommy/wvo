<?php
session_start();
include '../connect/db.php';
echo $_SESSION["m_id"];
$db = new DB;
$ID = $_GET['REQ_MAT_ID'];


$sql = "SELECT * FROM req_maternity as rmat
INNER JOIN tbl_member as m ON m.m_id = rmat.m_id 
INNER JOIN tbl_status as st ON st.s_id = rmat.s_id 
INNER JOIN veteran ON veteran.m_id = m.m_id
WHERE REQ_MAT_ID=$ID 
AND veteran.VT_ALIVE <>0
AND m.m_alive <> 0";



$db->Execute($sql);
$res = $db->getData();





?>


<!DOCTYPE html>
<html lang="en">

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
                                                <img style="border-radius: 50%;" src="../m_img/<?php echo $res['m_img'] ?>" alt="User Image" width="45" height="45"></span>
                                            &nbsp;
                                            <p><?php echo $res['VT_TITLE'] . ' ' . $res['VT_FNAME'] . ' ' . $res['VT_LNAME'] ?></p>
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
                            <p>ยื่นคำร้องขอเบิกค่าคลอดบุตร โดย
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
                                                    <h4> <?php echo $res['VT_TITLE'] . ' ' . $res['VT_FNAME'] . ' ' . $res['VT_LNAME'] ?></h4>
                                                    <h5>ชั้นบัตร <?php echo $res['VT_CARD_STEP']; ?> &nbsp;&nbsp;&nbsp;เลขที่บัตร <?php echo $res['VT_CARD_NO']; ?></h5>

                                                    <h5>เลขปรจำตัวประชาชน <?php echo $res['VT_ID_NUM']; ?> </h5>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>

                                                <tr>
                                                    <td>วันที่ยื่นคำร้อง</td>
                                                    <td><?php echo $res['REQ_MAT_DATE']; ?></td>
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
                                                                echo '<font color="#FFFF33 ">';
                                                                echo $res['s_name'];
                                                                echo '</font>';
                                                            } else if ($s_id == 5) {
                                                                echo '<font color="#FFC300">';
                                                                echo $res['s_name'];
                                                                echo '</font>';
                                                            } else if ($s_id == 8) {
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
                                                    <td>วันที่คลอด</td>
                                                    <td><?php echo $res['MAT_BIRTH_DATE']; ?></td>
                                                </tr>



                                                <tr>
                                                    <td>วิธีการรับเงิน</td>
                                                    <td>

                                                        <?php
                                                        $REQ_HEL_PAY_TYPE = $res["REQ_MAT_PAY_TYPE"];
                                                        if ($REQ_MAT_PAY_TYPE == 1) {
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

                                                <tr>
                                                    <td>ไฟล์แนบ</td>
                                                    <td> <?php
                                                            $sql3 = "SELECT file_name, is_image FROM multi_file where m_id = " . $res['m_id'] . " and vs_id ='3'and req_id= " . $res['REQ_MAT_ID'] . "";
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
                                            <a style="color:white;" href='mat_history.php' class='btn btn-warning btn-s'>กลับหน้าหลัก</a>

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
                        <p>© Copyright 2021 <a href="#">ระบบสวัสดิการสงเคราะห์</a> I All Rights Reserved</p>
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