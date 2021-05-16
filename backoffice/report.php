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
        <link href="../assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" />
        <!-- <link href="../assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" /> -->
        <link href="../assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
        <link href="../assets/plugins/datatables.net-fixedcolumns-bs4/css/fixedcolumns.bootstrap4.min.css" rel="stylesheet" />
        <!-- ================== END PAGE LEVEL STYLE ================== -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100;300;400&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>

    <style>
        body {
            font-family: 'Prompt', sans-serif !important;
        }
    </style>

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
                    <a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> <b>ระบบสวัสดิการสงเคราะห์ทหารผ่านศึก</b> </a>
                    <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- end navbar-header -->
                <!-- begin header-nav -->
                <ul class="navbar-nav navbar-right">

                    <li class="dropdown navbar-user">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php
                            $sql = "SELECT * FROM tbl_member WHERE m_id = " . $_SESSION['m_id'] . " AND m_alive <> 0";
                            $db->Execute($sql);
                            $res = $db->getData();
                            echo $res['m_name'];
                            ?>
                            <img src="m_img/<?php echo $res['m_img'] ?>" alt="" />
                            <span class="d-none d-md-inline"></span> <b class="caret"></b>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="javascript:;" class="dropdown-item">Edit Profile</a>
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
                                    <img src="m_img/<?php echo $res['m_img'] ?>" alt="" />
                                </div>
                                <div class="info">
                                    <b class="caret pull-right"></b><?php
                                                                    $sql = "SELECT * FROM tbl_member WHERE m_id = " . $_SESSION['m_id'] . " AND m_alive <> 0";
                                                                    $db->Execute($sql);
                                                                    $res = $db->getData();
                                                                    echo $res['m_name'];
                                                                    // print_r($res);
                                                                    ?>

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
                        <li class="nav-header"></li>

                        <!-- --------------****Start******-------------------- -->
                        <?php
                        if ($level == 'vsmanager') {
                        ?>
                            <li class="has-sub active">
                                <a href="#">
                                    <i class="fa fa-edit"></i>
                                    <span>รายงาน</span>
                                </a>
                                <ul class="sub-menu">
                                    <li <?php echo $_GET['type'] == 1 ? 'class="active"' : '' ?>><a href="report.php?type=1&level=<?php echo $level ?>">รายงานค่ารักษาพยาบาล</a></li>
                                    <li <?php echo $_GET['type'] == 2 ? 'class="active"' : '' ?>><a href="report.php?type=2&level=<?php echo $level ?>">รายงานเงินช่วยเหลือครั้งคราว</a></li>
                                    <li <?php echo $_GET['type'] == 3 ? 'class="active"' : '' ?>><a href="report.php?type=3&level=<?php echo $level ?>">รายงานค่าประสบภัยพิบัติ</a></li>
                                    <li <?php echo $_GET['type'] == 4 ? 'class="active"' : '' ?>><a href="report.php?type=4&level=<?php echo $level ?>">รายงานค่าคลอดบุตร</a></li>
                                    <li <?php echo $_GET['type'] == 5 ? 'class="active"' : '' ?>><a href="report.php?type=5&level=<?php echo $level ?>">รายงานค่าการศึกษาบุตร</a></li>
                                    <li <?php echo $_GET['type'] == 6 ? 'class="active"' : '' ?>><a href="report.php?type=6&level=<?php echo $level ?>">รายงานเงินช่วยเหลือรายเดือน</a></li>
                                </ul>
                            </li>
                            <li <?php echo $_GET['type'] == 9 ? 'class="active"' : '' ?>>
                                <a href="death_list.php?type=9">
                                    <i class="fa fa-edit"></i>
                                    <span>บันทึกการสงเคราะห์กรณีถึงแก่ความตาย</span>
                                </a>
                            </li>
                            <li <?php echo $_GET['type'] == 11 ? 'class="active"' : '' ?>>
                                <a href="vtp_add_form.php?type=11&level=<?php echo $level ?>">
                                    <i class="fa fa-edit"></i>
                                    <span>จัดการประวัติทหารผ่านศึก</span>
                                </a>
                            </li>

                            <li>
                                <a href="assign_em_search.php">
                                    <i class="fa fa-edit"></i>
                                    <span>ส่งมอบงานกรณีประสบภัยพิบัตร</span>
                                </a>
                            </li>

                        <?php } ?>



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
                    <!-- begin col-3 -->
                    <!-- <div class="col-xl-3 col-md-6">
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
                    </div> -->
                    <!-- end col-3 -->
                    <!-- begin col-3 -->
                    <!-- <div class="col-xl-3 col-md-6">

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
                    </div> -->
                    <!-- end col-3 -->
                    <!-- begin col-3 -->
                    <!-- <div class="col-xl-3 col-md-6">
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
                    </div> -->
                    <!-- end col-3 -->
                    <!-- begin col-3 -->
                    <!-- <div class="col-xl-3 col-md-6">
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
                    </div> -->
                    <!-- end col-3 -->
                </div>
                <!-- end row -->
                <!-- begin row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-inverse">
                            <!-- begin panel-heading -->
                            <div class="panel-heading">
                                <h4 class="panel-title"></h4>
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
                                <div>
                                    <canvas id="myChart"></canvas>
                                </div>
                                <hr>
                                <h4>เงื่อนไขในการค้นหา</h4> <br>

                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">สถานะ</label>
                                        <select name="status" id="status" class="form-control form-control-lg">
                                            <option value="1">รออนุมัติ</option>
                                            <option value="3">อนุมัติ</option>
                                            <option value="5">อนุมัติเบิกจ่าย</option>
                                            <option value="7">ยกเลิก</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">วันที่รับคำร้อง</label>
                                        <input type="date" class="form-control form-control-lg" name="date" id="date" value="<?php echo date('Y-m-d', strtotime('+543 years')) ?>" />
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">ถึง</label>
                                        <input type="date" class="form-control form-control-lg" name="dateto" id="dateto" value="<?php echo date('Y-m-d', strtotime('+543 years')) ?>" />
                                    </div>





                                    <div class="col-md-12 mt-3" style="text-align: center;">
                                        <button style="display: inline-block;" type="submit" onclick="view_report(0)" class="btn btn-primary" style="display: block;">
                                            รางานผู้มายื่นคำร้อง
                                        </button>


                                        <button style="display: inline-block;" type="submit" onclick="view_report(1)" class="btn btn-primary" style="display: block; position:center;">
                                            รายงานสถิติผู้มายื่นคำร้อง
                                        </button>
                                    </div>




                                    <input type="hidden" name="type" id="type" value="<?php echo $_GET['type'] ?>">
                                    <?php echo $_GET['date'];
                                    echo $_GET['status'] ?>


                                </div>

                            </div>

                        </div>
                    </div>
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
        <!-- <script src="../assets/plugins/gritter/js/jquery.gritter.js"></script> -->
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
            function view_report(type_report) {
                window.open("../TCPDF/examples/example_011.php?status=" + $('#status').val() + "&dateto=" + $('#dateto').val() + "&date=" + $('#date').val() + "&type=" + $('#type').val() + "&type_report=" + type_report, '_blank')
            }



            const labels = [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
            ];
            const data = {
                labels: labels,
                datasets: [{
                    label: 'สรุปการเงิน',
                    data: [65, 59, 80, 81, 56, 55, 40],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    layout:{
                        padding: '80'
                    }
                },
            };

            var myChart = new Chart(
                document.getElementById('myChart'),
                config
            );
        </script>

        <!-- ================== END PAGE LEVEL JS ================== -->
    </body>

    </html>
<?php
} else {
    header('Location: login.php');
}
?>