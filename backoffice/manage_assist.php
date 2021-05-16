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
        <!-- <link href="../assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" /> -->
        <link href="../assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
        <link href="../assets/plugins/datatables.net-fixedcolumns-bs4/css/fixedcolumns.bootstrap4.min.css" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100;300;400&display=swap" rel="stylesheet">
        <!-- ================== END PAGE LEVEL STYLE ================== -->
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

                    </ul>
                    <!-- end sidebar user -->
                    <!-- begin sidebar nav -->
                    <ul class="nav">
                        <li class="nav-header"></li>

                        <?php
                        if ($level == "admin") {
                        ?>
                            <li class="has-sub">
                                <a href="#">
                                    <i class="fa fa-edit"></i>
                                    <span> จัดการบัญชีผู้ใช้</span>
                                </a>
                                <ul class="sub-menu">
                                    <li <?php echo $_GET['tab'] == 1 ? 'class="active"' : '' ?>><a href="admin_tab1.php?tab=1">จัดการบัญชีผู้ใช้(พนักงาน)</a></li>
                                    <li <?php echo $_GET['tab'] == 2 ? 'class="active"' : '' ?>><a href="admin_tab2.php?tab=2">จัดการบัญชีผู้ใช้ (ทหารผ่านศึก)</a></li>

                                </ul>
                            </li>
                            <li class="has-sub <?php echo $_GET['type'] == "manage_assist" ? 'active' : '' ?>">
                                <a href="manage_assist.php?type=manage_assist">
                                    <i class="fa fa-edit"></i>
                                    <span>จัดการวงเงินสงเคราะห์</span>
                                </a>
                            </li>


                            <li class="has-sub ">
                                <a href="#">
                                    <i class="fa fa-edit"></i>
                                    <span> จัดการค่าเริ่มต้น</span>
                                </a>
                                <ul class="sub-menu">
                                    <li <?php echo $_GET['tab'] == 1 ? 'class="active"' : '' ?>><a href="manage_status.php?type=status">จัดการสถานะรายการ</a></li>
                                    <li <?php echo $_GET['tab'] == 2 ? 'class="active"' : '' ?>><a href="position.php">จัดการตำแหน่ง</a></li>

                                </ul>
                            </li>

                        <?php
                        }
                        ?>

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
                    <div class="col-md-12">
                        <!-- begin panel -->
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

                                <!-- <button type="button" class="btn btn-success">เพิ่มข้อมูล</button> -->
                                <br />
                                <div class="findyear mt-3 mb-3" style="padding: 10px;background-color:blanchedalmond">
                                    <form action="#" method="get">
                                        <label for="">ปีงบประมาณ</label>
                                        <select class="form-control" name="year" id="year">
                                            <?php
                                            for ($i = date('Y') + 543; $i >  date('Y') - 5 + 543; $i--) {
                                            ?>
                                                <option value="<?php echo $i ?>" <?php $_GET['year'] == $i ? 'selected' : '' ?>><?php echo $i ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <div class="btsearch mt-3" style="text-align:center;">
                                            <button type="submit" class="btn btn-info">ค้นหา</button>

                                        </div>
                                    </form>
                                </div>

                                <form action="manage_assist_db.php" method="post">
                                    <div class="col-md-12">
                                        <table id="data-table-fixed-columns" class="table table-striped table-bordered table-td-valign-middle" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <td>#</td>
                                                    <td>การสงเคราะห์</td>
                                                    <td>จำนวนเงิน</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $sql = "SELECT * FROM assist_policy_log WHERE ATP_STATUS='Y'";
                                                if ($_GET['year']) {
                                                    $sql .= " AND ATP_BG_YEAR=" . $_GET['year'];
                                                } else {

                                                    $dt = date('Y') + 543;
                                                    $sql .= " AND ATP_BG_YEAR= $dt";
                                                }


                                                // $sql2 = "SELECT * FROM assist_policy_log WHERE ATP_STATUS='Y'";
                                                $db->Execute($sql);
                                                $res2 = $db->getData();


                                                $db->Execute($sql);
                                                $i = 1;
                                                if (!empty($res2)) {
                                                    while ($res = $db->getData()) {
                                                ?>
                                                        <tr>
                                                            <td> <?php echo $i; ?></td>
                                                            <td>
                                                                <?php echo $res['ATP_NAME'] ?>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="ATP_ID[<?php echo $i; ?>]" value="<?php echo $res['ATP_ID']; ?>">
                                                                <input class="form-control" type="text" name="ATP_VALUE[<?php echo $i; ?>]" id="ATP_VALUE" value=" <?php echo $res['ATP_VALUE'] ?>">
                                                                <input type="hidden" name="ATP_BG_YEAR" value=" <?php echo $res['ATP_BG_YEAR'] ?>">
                                                            </td>
                                                        </tr>
                                                    <?php $i++;
                                                    }
                                                } else {
                                                    ?>
                                                    <?php

                                                    $i = 1;
                                                    $sql = "SELECT *  FROM assist_policy WHERE ATP_STATUS='Y'";
                                                    $db->Execute($sql);
                                                    while ($res = $db->getData()) {
                                                    ?>
                                                        <tr>
                                                            <td> <?php echo $i; ?></td>
                                                            <td>
                                                                <?php echo $res['ATP_NAME'] ?>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="never" value="never">
                                                                <input type="hidden" name="ATP_NAME[<?php echo $i; ?>]" id="ATP_NAME" value="<?php echo $res['ATP_NAME'] ?>">
                                                                <input type="hidden" name="vs_id[<?php echo $i; ?>]" id="vs_id" value="<?php echo $res['vs_id']; ?>">
                                                                <input type="text" name="ATP_VALUE[<?php echo $i; ?>]" id="ATP_VALUE" value="">
                                                                <input type="hidden" name="ATP_BG_YEAR" value=" <?php echo $_GET['year'] ?>">
                                                            </td>
                                                        </tr>
                                                <?php $i++;
                                                    }
                                                }


                                                ?>
                                            </tbody>
                                        </table>
                                        <div class="btnsubmit" style="text-align: center;">
                                            <button type="submit" class="btn btn-primary">อัปเดตข้อมูล</button>

                                        </div>
                                    </div>
                                </form>
                                <!-- end row -->
                            </div>
                        </div>
                    </div>
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

            <!-- ================== END PAGE LEVEL JS ================== -->
    </body>

    </html>
<?php
} else {
    header('Location: login.php');
}
?>