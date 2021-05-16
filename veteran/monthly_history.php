<?php
session_start();
include '../connect/db.php';
echo $_SESSION["m_id"];
$db = new DB;



$sql2 = "SELECT * from tbl_member 
INNER JOIN veteran ON veteran.m_id = tbl_member.m_id
WHERE tbl_member.m_id = " . intval($_SESSION["m_id"]) . " AND veteran.VT_ALIVE <>0 ";
$db->Execute($sql2);
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
                            <p>ประวัติการยื่นคำร้องขอรับการสงเคราะห์เงินช่วยเหลือรายเดือน

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        $sql = "
                        SELECT * FROM req_monthly as rmonth
                        INNER JOIN tbl_member as m ON m.m_id = rmonth.m_id 
                        INNER JOIN tbl_status as st ON st.s_id = rmonth.s_id 
                        WHERE rmonth.m_id = " . intval($_SESSION["m_id"]) . " AND m.m_alive <> 0
                        ORDER BY rmonth.m_id DESC";

                        $db->Execute($sql);


                        echo ' <table id="example1" class="table table-bordered table-striped">';
                        echo "<thead>";
                        echo "<tr class='warning'>
    
        <th width='10%'>เลขใบคำร้อง</th>
      <th width='10%'>วันที่รับคำร้อง</th>
      <th width='10%'>ชื่อ-สกุล</th>
      <th width='15%'>รายละเอียดการเบิก</th>
      <th width='12%'>จำนวนเงินอนุมัติ</th>
      <th width='10%'>สถานะ</th>
      <th width='8%'>ดูรายละเอียด</th>
      
    
    </tr>";
                        echo "</thead>";
                        while ($row = $db->getData()) {
                            echo "<tr>";
                            echo "<td>" . $row["REQ_MOTHLY_ID"] .  "</td> ";

                            echo "<td>" . $row["REQ_MOTHLY_DATE"] .  "</td> ";
                            //echo "<td>"."<img src='../m_img/".$row['m_img']."' width='100%'>"."</td>";
                            //echo "<td>" .$row["m_username"].  "</td> ";
                            echo "<td>" . $row["m_fname"] . $row["m_name"] . ' ' . $row["m_lname"] . "</td> ";
                            echo "<td>" . $row["REQ_MONTHLY_REMARK"] .  "</td> ";
                            echo "<td>" . $row["MONTHLY_VALUE_APPROVE"] .  "</td> ";
                            echo "<td>" . $row["s_name"] .  "</td> ";
                            echo "<td><a href='monthly_view.php?&REQ_MOTHLY_ID=".$row['REQ_MOTHLY_ID']."' class='btn btn-primary mt-3 waves-effect'>ดูรายการ</a> 
    <br></br>
            
    </td> ";
                            //echo "<td><a href='member_del_db.php?ID=$row[1]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
                            echo "</tr>";
                        }
                        echo "</table>";
                        mysqli_close($con);
                        ?>

                        <hr />

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <td>วันที่จ่ายเงิน</td>
                                    <td>ประจำเดือน</td>
                                    <td>ปีงบประมาณ</td>
                                    <td>จำนวนเงินที่จ่าย</td>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <?php
                                    $sql = "SELECT * FROM pay_monthly WHERE m_id2 = '" . $_SESSION['m_id'] . "' ";
                                    $db->Execute($sql);
                                    while ($res = $db->getData()) {
                                        $m2 = $res['PAY_MON_MONTH'];
                                        if ($m2 == '01') {
                                            $m2 = "มกราคม";
                                        }
                                        if ($m2 == '02') {
                                            $m2 = "กุมภาพันธ์";
                                        }
                                        if ($m2 == '03') {
                                            $m2 = "มีนาคม";
                                        }
                                        if ($m2 == '04') {
                                            $m2 = "เมษายน";
                                        }
                                        if ($m2 == '05') {
                                            $m2 = "พฤษภาคม";
                                        }
                                        if ($m2 == '06') {
                                            $m2 = "มิถุนายน";
                                        }
                                        if ($m2 == '07') {
                                            $m2 = "กรกฎาคม";
                                        }
                                        if ($m2 == '08') {
                                            $m2 = "สิงหาคม";
                                        }
                                        if ($m2 == '09') {
                                            $m2 = "กันยายน";
                                        }
                                        if ($m2 == '10') {
                                            $m2 = "ตุลาคม";
                                        }
                                        if ($m2 == '11') {
                                            $m2 = "พฤศจิกายน";
                                        }
                                        if ($m2 == '12') {
                                            $m2 = "ธันวาคม";
                                        }
                                    ?>
                                        <td><?php echo $res['PAY_MON_P_DATE']; ?></td>
                                        <td><?php echo $m2 ?></td>
                                        <td><?php echo $res['PAY_MON_BG_YEAR'] ?></td>
                                        <td><?php echo $res['PAY_MON_VALUE'] ?></td>
                                    <?php
                                    }
                                    ?>

                                </tr>
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>

        </div>



        <script src="./js/global.js"></script>


        <script src="./js/scripts.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="./js/settings.js"></script>
        <script src="./js/quixnav-init.js"></script>
        <script src="./js/styleSwitcher.js"></script>
</body>

</html>