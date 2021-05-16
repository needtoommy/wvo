<?php
session_start();
include '../connect/db.php';
echo $_SESSION["m_id"];
$db = new DB;




$sql1 = "SELECT * from tbl_member 
INNER JOIN veteran ON veteran.m_id = tbl_member.m_id
INNER JOIN marital_status ON veteran.VT_MARITAL_ST_ID = marital_status.MARI_ID
WHERE tbl_member.m_id = " . intval($_SESSION["m_id"]) . " AND veteran.VT_ALIVE <>0 ";
$db->Execute($sql1);
$res = $db->getData();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tradix </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="./vendor/waves/waves.min.css">
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
                        <a href="index.php" data-toggle="tooltip" data-placement="right" title="Home">
                            <span><i class="la la-home"></i></span>
                        </a>
                    </li>

                    <li>
                        <a href="profile_vt.php" data-toggle="tooltip" data-placement="right" title="Account" class="active">
                            <span><i class="la la-user"></i></span>
                        </a>
                    </li>


                </ul>
            </div>
        </div>



        <div class="content-body">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-xl-12 col-md-8">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">ประวัติส่วนตัว</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="#">
                                            <div class="form-row">
                                                <div class="form-group col-xl-2">
                                                    <div class="media align-items-center mb-3">
                                                        <img src="../m_img/<?php echo $res['m_img'] ?>" width="150" height="150" alt="">
                                                        <div class="media-body">


                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="form-group col-xl-10">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label class="mr-sm-5">ชื่อ - นามสกุล :</label>
                                                            <?php echo $res['VT_TITLE'] . ' ' . $res['VT_FNAME'] . ' ' . $res['VT_LNAME'] ?>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="mr-sm-5"> เลขประจำตัวประชาชน : </label>
                                                            <?php echo $res['VT_ID_NUM'] ?>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="mr-sm-5"> ชั้นบัตร-เลขที่บัตร : </label>
                                                            <?php echo $res['VT_CARD_STEP'] . ' - ' . $res['VT_CARD_NO'] ?>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label class="mr-sm-5">วัน/เดือน/ปี เกิด :</label>
                                                            <?php echo $res['VT_BRITH_DATE'] ?>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="mr-sm-3"> อายุ : </label>
                                                            <?php echo (date('Y') + 543) - explode("/", $res['VT_BRITH_DATE'])[2]; ?> ปี
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="mr-sm-3">โทรศัพท์ :</label>
                                                            <?php echo $res['VT_PHONE'] ?>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label class="mr-sm-3">สถานภาพการสมรส :</label>
                                                            <?php echo $res['MARI_NAME'] ?>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="mr-sm-3">สถานะ :</label>
                                                            <?php

                                                            $VT_ALIVE = $res["VT_ALIVE"];
                                                            if ($VT_ALIVE == 1) {
                                                                echo '<font color="#82E0AA ">';
                                                                echo 'มีชีวิต';
                                                                echo '</font>';
                                                            } else {
                                                                echo '<font color="#E74C3C">';
                                                                echo 'เสียชีวิต';
                                                                echo '</font>';
                                                            }

                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group col-xl-10">

                                                    <label class="mr-sm-5">ที่อยู่ที่ติดต่อได้ :</label>
                                                    <?php echo $res['VT_ADD_CONTACT'] ?>
                                                    <label class="mr-sm-5"></label>

                                                </div>

                                                <div class="form-group col-xl-2">
                                                </div>
                                                <div class="form-group col-xl-10">

                                                    <label class="mr-sm-5">ที่อยู่ตามทะเบียนบ้าน :</label>
                                                    <?php echo $res['VT_ADD_REG'] ?>
                                                    <label class="mr-sm-5"></label>

                                                </div>


                                                <div class="form-group col-xl-2">
                                                </div>
                                                <div class="form-group col-xl-10">
                                                    <label class="mr-sm-5">เชื่อชาติ :</label>

                                                    <?php echo $res['VT_RACE']  ?>
                                                    <label class="mr-sm-5"></label>

                                                    <label class="mr-sm-5"> สัญชาติ : </label>
                                                    <?php echo $res['VT_NATIONALITY'] ?>
                                                    <label class="mr-sm-5"></label>

                                                    <label class="mr-sm-5"> ศาสนา :</label>
                                                    <?php echo $res['VT_RELIGION'] ?>
                                                </div>

                                                <div class="form-group col-xl-2">
                                                </div>
                                                <div class="form-group col-xl-10">
                                                    <label class="mr-sm-5">ส่วนสูง :</label>

                                                    <?php echo $res['VT_HEIGHT']  ?>
                                                    <label class="mr-sm-5"></label>

                                                    <label class="mr-sm-5"> น้ำหนัก : </label>
                                                    <?php echo $res['VT_WEIGHT'] ?>
                                                    <label class="mr-sm-5"></label>

                                                    <label class="mr-sm-5"> เพศ : </label>
                                                    <?php echo $res['VT_SEX'] ?>

                                                </div>

                                                <div class="form-group col-xl-2">
                                                </div>
                                                <div class="form-group col-xl-10">
                                                    <label class="mr-sm-5">เหล่าทัพ (ประจำการ) :</label>
                                                    <?php echo $res['VT_ARMY_ST'] ?>
                                                    <label class="mr-sm-5"></label>

                                                    <label class="mr-sm-5">เหล่าทัพ :</label>
                                                    <?php echo $res['VT_ARMY'] ?>

                                                </div>


                                                <div class="form-group col-xl-2">
                                                </div>
                                                <div class="form-group col-xl-10">
                                                    <label class="mr-sm-5">อาชีพ :</label>
                                                    <?php echo $res['VT_OCCU'] ?>
                                                    <label class="mr-sm-5"></label>

                                                    <label class="mr-sm-5">รายได้ :</label>
                                                    <?php echo  number_format($res['VT_INCOME'], 2) ?> บาท

                                                </div>


                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">ประวัติครอบครัว</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="#">
                                            <div class="form-row">
                                                <div class="form-group col-xl-12">

                                                    <?php
                                                    $sql = "
                                                    SELECT * FROM veteran_family  as A
                                                    INNER JOIN veteran as B on A.VT_ID = B.VT_ID
                                                    WHERE 
                                                     B.m_id = " . $_SESSION['m_id'] . "
                                                    AND B.VT_ID = A.VT_ID
                                                    AND A.VT_FM_ALIVE='1' AND B.VT_ALIVE <>0
                                                    ORDER BY A.VT_FM_ID ASC";

                                                    $db->Execute($sql);


                                                    echo ' <table id="example1" class="table table-bordered table-striped">';
                                                    echo "<thead>";
                                                    echo "<tr class='warning'>
    
                                                    <th width='15%'>เลขประจำตัวประชาชน</th>
                                                    <th width='15%'>ชื่อ-นามสกุล</th>
                                                    <th width='15%'>ความสัมพันธ์</th>
                                                
                                                </tr>";
                                                    echo "</thead>";
                                                    while ($row = $db->getData()) {
                                                        echo "<tr>";

                                                        echo "<td>" . $row["VT_FM_IDCARD"] .  "</td> ";
                                                        echo "<td>" .  $row["VT_FM_TITLE"] . $row["VT_FM_NAME"] . '  ' . $row["VT_FM_LNAME"]  . "</td> ";
                                                        echo "<td>" . $row["VT_FM_RELATION"] .  "</td> ";



                                                        //echo "<td><a href='member_del_db.php?ID=$row[1]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
                                                        echo "</tr>";
                                                    }
                                                    echo "</table>";
                                                    mysqli_close($con);
                                                    ?>















                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>



                        <script src="./js/global.js"></script>


                        <script src="./vendor/jquery-ui/jquery-ui.min.js"></script>
                        <script src="./js/plugins/jquery-ui-init.js"></script>
                        <script src="./vendor/validator/jquery.validate.js"></script>
                        <script src="./vendor/validator/validator-init.js"></script>
                        <script src="./js/scripts.js"></script>

                        <script src="./js/settings.js"></script>
                        <script src="./js/quixnav-init.js"></script>
                        <script src="./js/styleSwitcher.js"></script>
</body>

</html>