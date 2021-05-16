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

                            <li class="has-sub active">
                                <a href="assign_em_search.php">
                                    <i class="fa fa-edit"></i>
                                    <span>ส่งมอบงานกรณีประสบภัยพิบัตร</span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="active"><a href="assign_em_search.php">ดูคำร้อง</a></li>
                                    <li><a href="view_survey.php">ตรวจสอบการสำรวจ</a></li>
                                    <?php
                                    if ($_SESSION['m_level'] == "vsofficer") {
                                    ?>
                                        <li><a href="assign_em_search_add.php">เพิ่มคำร้อง</a></li>
                                    <?php } ?>
                                </ul>
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

                                <?php
                                $id = $_GET['id'];
                                $sql = "SELECT * FROM req_disa WHERE REQ_DISA_ID='$id'";
                                echo $sql;
                                $db->Execute($sql);
                                $res = $db->getData();
                                ?>

                                <h4 style="text-align: center;">เพิ่มใบคำร้องค่าประสบบภัย</h4> <br>

                                <form action="assign_em_search_view_form_db.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="check_hidden" id="check_hidden">
                                    <input type="hidden" name="m_id" id="m_id" value="<?php echo $_SESSION['m_id']; ?>" />
                                    <input type="hidden" name="s_id" value="1" />
                                    <input type="hidden" name="ref_d_id" value="<?php echo $_SESSION['m_id']; ?>" />
                                    <input type="hidden" name="create_datetime" value="<?php echo date('d/m/Y h:i:sa', strtotime('+543 years')); ?>">
                                    <input type="hidden" name="vm_id" value="<?php echo $res['vm_id'] ?>">
                                    <input type="hidden" name="REQ_DISA_ID" value="<?php echo $id ?>">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <label class="mr-sm-2">วันที่ยื่นคำร้อง</label>
                                            <input type="text" name="REQ_DISA_DATE" id="REQ_DISA_DATE" class="form-control" value="<?php echo date('d/m/Y', strtotime('+543 year')) ?>" readonly>
                                        </div>


                                        <div class="col-md-4">
                                            <label class="mr-sm-2">วันที่เริ่มประสบภัยพิบัติ</label>
                                            <input type="text" name="REQ_DISA_DATE_FROM" required class="form-control" class="form-control" id="REQ_DISA_DATE_FROM" value="<?php echo $res['REQ_DISA_DATE_FROM'] ?>" placeholder="วัน/เดือน/ปี" readonly>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="mr-sm-2">วันที่สิ้นสุดประสบภัยพิบัติ</label>
                                            <input type="text" name="REQ_DISA_DATE_TO" id="REQ_DISA_DATE_TO" required class="form-control" value="<?php echo $res['REQ_DISA_DATE_TO'] ?>" placeholder="วัน/เดือน/ปี" readonly>
                                        </div>


                                        <div class="col-md-4">
                                            <label class="mr-sm-2">ประเภทภัยพิบัติ </label>
                                            <select name="REQ_DST_ID" class="form-control" readonly>
                                                <option value="">-เลือกประเภทภัยพิบัติ-</option>
                                                <?php

                                                $sql2 = "SELECT * FROM disaster_type ORDER BY DST_ID asc";
                                                $db->Execute($sql2);
                                                while ($res2 = $db->getData()) { ?>
                                                    <option value="<?php echo $res2["DST_ID"]; ?>" <?php echo $res2["DST_ID"] == $res['REQ_DST_ID'] ? 'selected' : ''; ?>>
                                                        <?php echo $res2["DST_NAME"]; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>



                                        <div class="col-md-4">
                                            <label class="mr-sm-2">ประเภทความเสียหาย</label>
                                            <select name="REQ_DMT_TYPE" class="form-control" readonly>
                                                <option value="">เลือกข้อมูล</option>
                                                <option value="ที่อยู่อาศัย" <?php echo $res['REQ_DMT_TYPE'] == "ที่อยู่อาศัย" ? 'selected' : '' ?>>ที่อยู่อาศัย</option>
                                                <option value="พืชผลทางการเกษตร,สัตว์เลี้ยง" <?php echo $res['REQ_DMT_TYPE'] == "พืชผลทางการเกษตร,สัตว์เลี้ยง" ? 'selected' : '' ?>>พืชผลทางการเกษตร,สัตว์เลี้ยง</option>
                                            </select>
                                        </div>


                                      
                                    </div>

                                    <div class="tab-pane fade show active" id="buy" role="tabpanel">





                                        <div class="form-group">
                                            <label class="mr-sm-2">รายละเอียด</label>
                                            <div class="input-group">
                                                <textarea name="REQ_DISA_DETAIL" id="REQ_DISA_DETAIL" class="form-control" placeholder="รายละเอียด" rows="4" cols="50" readonly><?php echo $res['REQ_DISA_DETAIL'] ?></textarea>

                                            </div>
                                        </div>




                                        <div class="form-group">
                                            <label class="mr-sm-2"> วิธีการรับเงิน</label>
                                            <div class="input-group mb-3">

                                                <input value="1" type="radio" name="REQ_DISA_PAY_TYPE" style="width: 20px;height:20px;" <?php echo $res['REQ_DISA_PAY_TYPE'] == 1 ? 'checked' : '' ?> readonly> &nbsp; &nbsp; &nbsp; รับเงินด้วยตัวเองที่ อผศ. &nbsp; &nbsp; &nbsp;

                                                <input value="2" type="radio" name="REQ_DISA_PAY_TYPE" style="width: 20px;height:20px;" <?php echo $res['REQ_DISA_PAY_TYPE'] == 2 ? 'checked' : '' ?> readonly> &nbsp; &nbsp; &nbsp; โอนเงินผ่านธนาคาร


                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="mr-sm-2">ดูไฟล์</label>
                                            <label class="mr-sm-2"></label>

                                            <div class="input-group">
                                                <?php
                                                $m_id = $res['vm_id'];
                                                $sql = "SELECT * from multi_file WHERE m_id='$m_id' AND req_id='$id' AND vs_id=4";
                                                $db->Execute($sql);
                                                while ($res = $db->getData()) {
                                                ?>
                                                    <img style="padding:10px;" width="300" src="../c_img/<?php echo $res['file_name'] ?>" alt="">
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    if ($_SESSION['m_level'] != "vsmanager") {
                                    ?>
                                        <hr />
                                        <br>
                                        <h3 style="text-align: center;">ส่วนของเจ้าหน้าที่สำรวจ</h3>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label class="mr-sm-2">ความเสียหายของผู้ประสบภัย</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="radio" style="width: 20px;height:20px;" name="REQ_DST_LV" value="1">
                                                    <label for="">&nbsp;บางส่วน</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="radio" style="width: 20px;height:20px;" name="REQ_DST_LV" value="2">
                                                    <label for="">&nbsp;ทั้งหลัง</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <label class="mr-sm-2">ทรัพสินย์ที่เสียหาย</label>
                                            <input type="button" value="+เพิ่มรายการ" onclick="myFunction('data-table-default')">
                                            <input type="button" value="+ลบรายการ" onclick="myFunction2('data-table-default')">
                                            <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                                                <thead>
                                                    <tr>
                                                        <td>
                                                            รายการ
                                                        </td>
                                                        <td>
                                                            ราคา
                                                        </td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><input class="form-control" type="text" name="list[1]"></td>
                                                        <td><input class="form-control" type="text" name="price[1]"></td>
                                                    </tr>
                                                </tbody>

                                            </table>

                                            <div class="form-group">
                                                <label class="mr-sm-2">อัพโหลดไฟล์</label>
                                                <label class="mr-sm-2"></label>

                                                <div class="input-group">

                                                    <input type="file" name="REQ_DISA_FILE_NAME[1]" class="form-control">
                                                </div>
                                            </div>
                                            <span style="cursor:pointer" onclick="addmore();">เพิ่มไฟล์อัพโหลด <span style="color:red;">*</span></span>
                                            <br />
                                            <select name="select_file" id="select_file" style="display: none;" onchange="change_file()">
                                                <?php for ($i = 0; $i < 20; $i++) {
                                                ?> <option value="<?php echo $i + 1 ?>"><?php echo $i + 1; ?></option> <?php
                                                                                                                } ?>
                                            </select>
                                            <div id="file_x">

                                            </div>
                                        </div>
                                    <?php } ?>

                                    <hr>
                                    <?php
                                        if ($_SESSION['m_level'] == "vsmanager") {
                                        ?>
                                            <div class="col-md-4">
                                                <label class="mr-sm-2">ส่งให้พนักงานสำรวจ</label>
                                                <select name="REQ_DISA_EMP_ID" class="form-control" required>
                                                    <option value="">เลือกข้อมูล</option>
                                                    <?php
                                                    $sql = "SELECT * FROM tbl_member WHERE m_level='vsofficer'";
                                                    $db->Execute($sql);
                                                    while ($res_m = $db->getData()) {
                                                    ?>
                                                        <option value="<?php echo $res_m['m_id'] ?>" <?php echo $res_m['m_id'] == $res['REQ_DISA_EMP_ID'] ? 'selected' : '' ?>><?php echo $res_m['m_fname'] . ' ' . $res_m['m_name'] . ' ' . $res_m['m_lname'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                        <?php } ?>



                                    <div style="text-align: center;">
                                        <button type="submit" class="btn btn-primary">บันทึก</button>

                                    </div>
                                </form>



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
                var count = 1;

                function myFunction(myTable) {
                    count++;
                    $("#" + myTable).find('tbody')
                        .append($('<tr>')
                            .append($('<td>')
                                .append($('<input type="text" class="form-control" name="list[' + count + ']" >')
                                    // .attr('src', 'img.png')
                                    // .text('Image cell')
                                )
                            )
                            .append($('<td>')
                                .append($('<input type="text" class="form-control" name="price[' + count + ']" >')
                                    // .attr('src', 'img.png')
                                    // .text('Image cell')
                                )
                            )
                        );
                }

                function myFunction2(myTable) {
                    if (count != 1) {
                        count--;
                        var table = document.getElementById(myTable);
                        var row = table.getElementsByTagName('tr');
                        if (row.length != '1') {
                            row[row.length - 1].outerHTML = '';
                        }
                    }

                }

                function addmore() {
                    $('#select_file').css('display', 'inline-block');
                    // $.ajax({
                    //     type: "POST",
                    //     url: "add_file.php",
                    //     data: {
                    //         select_file: 1
                    //     },

                    //     success: function(data) {
                    //         console.log(data)
                    //         $('#file_x').html(data)
                    //     }
                    // });
                }

                function change_file() {
                    $.ajax({
                        type: "POST",
                        url: "add_file_disa.php",
                        data: {
                            select_file: $('#select_file').val()
                        },

                        success: function(data) {
                            console.log(data)
                            $('#file_x').html(data)
                        }
                    });
                }

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
                        layout: {
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