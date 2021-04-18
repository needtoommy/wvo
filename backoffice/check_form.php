<?php
session_start();
if ($_SESSION['PERMISSION'] == 'KORN') {
?>
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
                <div class="col-md-12">
                    <table id="data-table-fixed-columns" class="table table-striped table-bordered table-td-valign-middle" style="width:100%;">
                        <thead>
                            <tr>
                                <?php
                                $array_columns = array();
                                if (($_GET['level'] == "vsofficer" || $_GET['level'] == "finoffice") && $_GET['type'] == 1) {
                                    $array_columns = array("เลขใบคำร้อง", "วันที่รับคำร้อง", "ชั้นบัตร", "เลขที่บัตร", "ชื่อ_สกุล", "รายละเอียดการเบิก", "จำนวนเงินขอเบิก", "จำนวนเงินอนุมัติ", "สถานะ", "ปรับสถานะ");
                                }

                                if (($_GET['level'] == "vsofficer" || $_GET['level'] == "finoffice")  && $_GET['type'] == 2) {
                                    $array_columns = array("เลขใบคำร้อง", "วันที่รับคำร้อง", "ชั้นบัตร", "เลขที่บัตร", "ชื่อ_สกุล", "เหตุผลขอรับการสงเคราะห์", "จำนวนเงินขอเบิก", "จำนวนเงินอนุมัติ", "สถานะ", "ปรับสถานะ");
                                }

                                if (($_GET['level'] == "vsofficer" || $_GET['level'] == "finoffice")  && $_GET['type'] == 3) {
                                    $array_columns = array("เลขใบคำร้อง", "วันที่รับคำร้อง", "ชั้นบัตร", "เลขที่บัตร", "ชื่อ_สกุล", "รายละเอียดการเบิก", "จำนวนเงินอนุมัติ", "สถานะ", "ปรับสถานะ");
                                }

                                if (($_GET['level'] == "vsofficer" || $_GET['level'] == "finoffice")  && $_GET['type'] == 4) {
                                    $array_columns = array("เลขใบคำร้อง", "วันที่รับคำร้อง", "ชั้นบัตร", "เลขที่บัตร", "ชื่อ_สกุล", "ชื่อคู่สมรส",  "สถานะ", "ปรับสถานะ");
                                }

                                if (($_GET['level'] == "vsofficer" || $_GET['level'] == "finoffice")  && $_GET['type'] == 5) {
                                    $array_columns = array("เลขใบคำร้อง", "วันที่รับคำร้อง", "ชื่อ_สกุล", "เบิกให้",  "ปีการศึกษา", "จำนวนเงินที่ขอเบิก", "สถานะ", "ปรับสถานะ");
                                }


                                if (($_GET['level'] == "vsofficer" || $_GET['level'] == "finoffice")  && $_GET['type'] == 6) {
                                    $array_columns = array("เลขใบคำร้อง", "วันที่รับคำร้อง", "ชั้นบัตร", "เลขที่บัตร", "เลขบัตรประชาชน", "ชื่อ_สกุล", "สถานะ", "ปรับสถานะ");
                                }

                                for ($i = 0; $i < count($array_columns); $i++) {
                                    echo '<th class="text-nowrap" style="text-align:center" >' . $array_columns[$i] . '</th>';
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <h3>รายการยื่นคำร้อง</h3>
                            <hr>
                            <?php

                            if (($_GET['level'] == "vsofficer" || $_GET['level'] == "vsmanger") && $_GET['type'] == 1) {
                                $sql = "SELECT * FROM req_health as rh 
                        INNER JOIN tbl_member as m ON m.m_id = rh.m_id 
                        INNER JOIN tbl_status as st ON st.s_id = rh.s_id 
                        INNER JOIN veteran ON veteran.m_id= m.m_id
                        WHERE st.s_id ='1' AND m.m_alive <> 0
                        ORDER BY rh.m_id DESC";
                                $db->Execute($sql);
                                while ($array_rows =  $db->getData()) {
                            ?>
                                    <tr>
                                        <td><?php echo $array_rows["REQ_HEL_ID"] ?></td>
                                        <td><?php echo $array_rows["REQ_HEL_DATE"] ?></td>
                                        <td><?php echo $array_rows["VT_CARD_STEP"] ?></td>
                                        <td><?php echo  $array_rows["VT_CARD_NO"] ?></td>
                                        <td><?php echo $array_rows["m_fname"] . $array_rows["m_name"] . ' ' . $array_rows["m_lname"] ?></td>
                                        <td><?php echo $array_rows["REQ_HEL_DETAIL"] ?></td>
                                        <td><?php echo $array_rows["REQ_HEL_VALUE"] ?></td>
                                        <td><?php echo $array_rows["REQ_HEL_VALUE_APPROVE"] ?></td>
                                        <td><?php echo $array_rows["s_name"] ?></td>
                                        <td><a href='check_form_detail.php?REQ_HEL_ID=<?php echo $array_rows['REQ_HEL_ID'] ?>&type=1' class='btn btn-warning btn-xs'>ปรับสถานะ</a></td>
                                    </tr>
                                <?php
                                }
                            }


                            //สิทธื FINOFFICE
                            if (($_GET['level'] == "finoffice") && $_GET['type'] == 1) {
                                $sql = "SELECT * FROM req_health as rh 
                        INNER JOIN tbl_member as m ON m.m_id = rh.m_id 
                        INNER JOIN tbl_status as st ON st.s_id = rh.s_id 
                        INNER JOIN veteran ON veteran.m_id= m.m_id
                        WHERE st.s_id ='3' AND m.m_alive <> 0
                        ORDER BY rh.m_id DESC";
                                $db->Execute($sql);
                                while ($array_rows =  $db->getData()) {
                                ?>
                                    <tr>
                                        <td><?php echo $array_rows["REQ_HEL_ID"] ?></td>
                                        <td><?php echo $array_rows["REQ_HEL_DATE"] ?></td>
                                        <td><?php echo $array_rows["VT_CARD_STEP"] ?></td>
                                        <td><?php echo  $array_rows["VT_CARD_NO"] ?></td>
                                        <td style="width:20%"><?php echo $array_rows["m_fname"] . $array_rows["m_name"] . ' ' . $array_rows["m_lname"] ?></td>
                                        <td><?php echo $array_rows["REQ_HEL_DETAIL"] ?></td>
                                        <td><?php echo $array_rows["REQ_HEL_VALUE"] ?></td>
                                        <td><?php echo $array_rows["REQ_HEL_VALUE_APPROVE"] ?></td>
                                        <td><?php echo $array_rows["s_name"] ?></td>
                                        <td><a href='check_form_detail.php?REQ_HEL_ID=<?php echo $array_rows['REQ_HEL_ID'] ?>&type=1' class='btn btn-warning btn-xs'>ปรับสถานะ</a></td>
                                    </tr>
                                <?php
                                }
                            }






                            if (($_GET['level'] == "vsofficer" || $_GET['level'] == "vsmanger") && $_GET['type'] == 2) {
                                $sql = "SELECT * FROM req_occ as oc 
                        INNER JOIN tbl_member as m ON m.m_id = oc.m_id 
                        INNER JOIN tbl_status as st ON st.s_id = oc.s_id 
                        INNER JOIN veteran ON veteran.m_id= m.m_id
                        WHERE st.s_id ='1' AND m.m_alive <> 0
                        ORDER BY oc.REQ_OCC_ID DESC";

                                $db->Execute($sql);
                                while ($array_rows =  $db->getData()) {
                                ?>
                                    <tr>
                                        <td><?php echo $array_rows['REQ_OCC_ID'] ?></td>
                                        <td><?php echo $array_rows['REQ_OCC_DATE'] ?></td>
                                        <td><?php echo $array_rows["VT_CARD_STEP"] ?></td>
                                        <td><?php echo  $array_rows["VT_CARD_NO"] ?></td>
                                        <td><?php echo $array_rows["m_fname"] . $array_rows["m_name"] . ' ' . $array_rows["m_lname"] ?></td>
                                        <td><?php echo $array_rows['REQ_OCC_REASON'] ?></td>
                                        <td><?php echo $array_rows['REQ_OCC_REMARK'] ?></td>
                                        <td><?php echo $array_rows['REQ_OCC_VALUE'] ?></td>
                                        <td><?php echo $array_rows['REQ_OCC_VALUE_APPROVE'] ?></td>
                                        <td><?php echo $array_rows['s_name'] ?></td>
                                        <td><a href='check_form_detail.php?REQ_OCC_ID=<?php echo $array_rows[0] ?>&type=2' class='btn btn-warning btn-xs'>ปรับสถานะ</a></td>

                                    </tr>
                                <?php
                                }
                            }


                            //สิทธื FINOFFICE
                            if (($_GET['level'] == "finoffice") && $_GET['type'] == 2) {
                                $sql = "SELECT * FROM req_occ as oc 
                        INNER JOIN tbl_member as m ON m.m_id = oc.m_id 
                        INNER JOIN tbl_status as st ON st.s_id = oc.s_id 
                        INNER JOIN veteran ON veteran.m_id= m.m_id
                        WHERE st.s_id ='3' AND m.m_alive <> 0
                        ORDER BY oc.REQ_OCC_ID DESC";

                                $db->Execute($sql);
                                while ($array_rows =  $db->getData()) {
                                ?>
                                    <tr>
                                        <td><?php echo $array_rows['REQ_OCC_ID'] ?></td>
                                        <td><?php echo $array_rows['REQ_OCC_DATE'] ?></td>
                                        <td><?php echo $array_rows["VT_CARD_STEP"] ?></td>
                                        <td><?php echo  $array_rows["VT_CARD_NO"] ?></td>
                                        <td><?php echo $array_rows["m_fname"] . $array_rows["m_name"] . ' ' . $array_rows["m_lname"] ?></td>
                                        <td><?php echo $array_rows['REQ_OCC_REASON'] ?></td>
                                        <td><?php echo $array_rows['REQ_OCC_REMARK'] ?></td>
                                        <td><?php echo $array_rows['REQ_OCC_VALUE'] ?></td>
                                        <td><?php echo $array_rows['REQ_OCC_VALUE_APPROVE'] ?></td>
                                        <td><?php echo $array_rows['s_name'] ?></td>
                                        <td><a href='check_form_detail.php?REQ_OCC_ID=<?php echo $array_rows[0] ?>&type=2' class='btn btn-warning btn-xs'>ปรับสถานะ</a></td>

                                    </tr>
                                <?php
                                }
                            }




                            if (($_GET['level'] == "vsofficer" || $_GET['level'] == "vsmanger") && $_GET['type'] == 3) {
                                $sql = "SELECT * FROM req_disa as rdisa
                        INNER JOIN tbl_member as m ON m.m_id = rdisa.m_id 
                        INNER JOIN tbl_status as st ON st.s_id = rdisa.s_id 
                        INNER JOIN veteran ON veteran.m_id= m.m_id
                        INNER JOIN disaster_type ON rdisa.REQ_DST_ID = disaster_type.DST_ID
                        WHERE rdisa.s_id = '1' AND m.m_alive <> 0
                        ORDER BY rdisa.m_id DESC";
                                $db->Execute($sql);
                                while ($array_rows =  $db->getData()) {
                                ?>
                                    <tr>
                                        <td><?php echo $array_rows['REQ_DISA_ID'] ?></td>
                                        <td><?php echo $array_rows['REQ_DISA_DATE'] ?></td>
                                        <td><?php echo $array_rows["VT_CARD_STEP"] ?></td>
                                        <td><?php echo  $array_rows["VT_CARD_NO"] ?></td>
                                        <td><?php echo $array_rows["m_fname"] . $array_rows["m_name"] . ' ' . $array_rows["m_lname"] ?></td>
                                        <td><?php echo $array_rows['REQ_DISA_DETAIL'] ?></td>
                                        <td><?php echo $array_rows['REQ_HEL_VALUE_APPROVE'] ?></td>
                                        <td><?php echo $array_rows['s_name'] ?></td>
                                        <td><a href='check_form_detail.php?REQ_DISA_ID=<?php echo $array_rows[0] ?>&type=3' class='btn btn-warning btn-xs'>ปรับสถานะ</a></td>
                                    </tr>
                                <?php
                                }
                            }



                            //สิทธื FINOFFICE
                            if (($_GET['level'] == "finoffice") && $_GET['type'] == 3) {
                                $sql = "SELECT * FROM req_disa as rdisa
                        INNER JOIN tbl_member as m ON m.m_id = rdisa.m_id 
                        INNER JOIN tbl_status as st ON st.s_id = rdisa.s_id 
                        INNER JOIN disaster_type ON rdisa.REQ_DST_ID = disaster_type.DST_ID
                        INNER JOIN veteran ON veteran.m_id= m.m_id
                        WHERE rdisa.s_id = '3' AND m.m_alive <> 0
                        ORDER BY rdisa.m_id DESC";
                                $db->Execute($sql);
                                while ($array_rows =  $db->getData()) {
                                ?>
                                    <tr>
                                        <td><?php echo $array_rows['REQ_DISA_ID'] ?></td>
                                        <td><?php echo $array_rows['REQ_DISA_DATE'] ?></td>
                                        <td><?php echo $array_rows["VT_CARD_STEP"] ?></td>
                                        <td><?php echo  $array_rows["VT_CARD_NO"] ?></td>
                                        <td><?php echo $array_rows["m_fname"] . $array_rows["m_name"] . ' ' . $array_rows["m_lname"] ?></td>
                                        <td><?php echo $array_rows['REQ_DISA_DETAIL'] ?></td>
                                        <td><?php echo $array_rows['REQ_HEL_VALUE_APPROVE'] ?></td>
                                        <td><?php echo $array_rows['s_name'] ?></td>
                                        <td><a href='check_form_detail.php?REQ_DISA_ID=<?php echo $array_rows[0] ?>&type=3' class='btn btn-warning btn-xs'>ปรับสถานะ</a></td>
                                    </tr>
                                <?php
                                }
                            }




                            if (($_GET['level'] == "vsofficer" || $_GET['level'] == "vsmanger") && $_GET['type'] == 4) {
                                $sql = "SELECT * FROM req_maternity as rmat
                            INNER JOIN tbl_member as m ON m.m_id = rmat.m_id 
                            INNER JOIN tbl_status as st ON st.s_id = rmat.s_id 
                            INNER JOIN veteran ON veteran.m_id= m.m_id
                            INNER JOIN veteran_family ON veteran.VT_ID = veteran_family.VT_ID
                            WHERE rmat.s_id = '1'
                            AND veteran_family.VT_FM_RELATION ='ภรรยา' and veteran.VT_ALIVE <>0";

                                $db->Execute($sql);
                                while ($array_rows =  $db->getData()) {
                                ?>
                                    <tr>
                                        <td><?php echo $array_rows['REQ_MAT_ID'] ?></td>
                                        <td><?php echo $array_rows['REQ_MAT_DATE'] ?></td>
                                        <td><?php echo $array_rows["VT_CARD_STEP"] ?></td>
                                        <td><?php echo  $array_rows["VT_CARD_NO"] ?></td>
                                        <td><?php echo $array_rows["m_fname"] . $array_rows["m_name"] . ' ' . $array_rows["m_lname"] ?></td>
                                        <td><?php echo $array_rows["VT_FM_TITLE"] . $array_rows["VT_FM_NAME"] . ' ' . $array_rows["VT_FM_LNAME"] ?></td>
                                        <td><?php echo $array_rows['s_name'] ?></td>
                                        <td><a href='check_form_detail.php?REQ_MAT_ID=<?php echo $array_rows[0] ?>&type=4' class='btn btn-warning btn-xs'>ปรับสถานะ</a></td>
                                    </tr>
                                <?php
                                }
                            }


                            //สิทธื FINOFFICE
                            if (($_GET['level'] == "finoffice") && $_GET['type'] == 4) {
                                $sql = "SELECT * FROM req_maternity as rmat
                            INNER JOIN tbl_member as m ON m.m_id = rmat.m_id 
                            INNER JOIN tbl_status as st ON st.s_id = rmat.s_id 
                            INNER JOIN veteran ON veteran.m_id= m.m_id
                            INNER JOIN veteran_family ON veteran.VT_ID = veteran_family.VT_ID
                            WHERE rmat.s_id = '3'
                            AND veteran_family.VT_FM_RELATION ='ภรรยา' and veteran.VT_ALIVE <>0";

                                $db->Execute($sql);
                                while ($array_rows =  $db->getData()) {
                                ?>
                                    <tr>
                                        <td><?php echo $array_rows['REQ_MAT_ID'] ?></td>
                                        <td><?php echo $array_rows['REQ_MAT_DATE'] ?></td>
                                        <td><?php echo $array_rows["VT_CARD_STEP"] ?></td>
                                        <td><?php echo  $array_rows["VT_CARD_NO"] ?></td>
                                        <td><?php echo $array_rows["m_fname"] . $array_rows["m_name"] . ' ' . $array_rows["m_lname"] ?></td>
                                        <td><?php echo $array_rows["VT_FM_TITLE"] . $array_rows["VT_FM_NAME"] . ' ' . $array_rows["VT_FM_LNAME"] ?></td>
                                        <td><?php echo $array_rows['s_name'] ?></td>
                                        <td><a href='check_form_detail.php?REQ_MAT_ID=<?php echo $array_rows[0] ?>&type=4' class='btn btn-warning btn-xs'>ปรับสถานะ</a></td>
                                    </tr>
                                <?php
                                }
                            }




                            if (($_GET['level'] == "vsofficer" || $_GET['level'] == "vsmanger") && $_GET['type'] == 5) {
                                $sql = "SELECT * FROM req_edu as red
                        INNER JOIN tbl_member as m ON m.m_id = red.m_id 
                          INNER JOIN tbl_status as st ON st.s_id = red.s_id 
                          INNER JOIN veteran ON veteran.m_id= m.m_id
                          INNER JOIN veteran_family ON veteran.VT_ID = veteran_family.VT_ID
                          WHERE red.s_id = '1'
                          AND veteran_family.VT_FM_RELATION ='บุตร' and veteran.VT_ALIVE <>0";
                                $db->Execute($sql);
                                while ($array_rows =  $db->getData()) {
                                ?>
                                    <tr>
                                        <td><?php echo $array_rows['REQ_EDU_ID'] ?></td>
                                        <td><?php echo $array_rows['REQ_EDU_DATE'] ?></td>
                                        <td><?php echo $array_rows["m_fname"] . $array_rows["m_name"] . ' ' . $array_rows["m_lname"] ?></td>
                                        <td><?php echo $array_rows["VT_FM_TITLE"] . $array_rows["VT_FM_NAME"] . ' ' . $array_rows["VT_FM_LNAME"] ?></td>
                                        <td><?php echo $array_rows['REQ_EDU_YEAR'] ?></td>

                                        <td><?php echo $array_rows['REQ_EDU_VALUE'] ?></td>
                                        <td><?php echo $array_rows['s_name'] ?></td>
                                        <td><a href='check_form_detail.php?REQ_EDU_ID=<?php echo $array_rows[0] ?>&type=5' class='btn btn-warning btn-xs'>ปรับสถานะ</a></td>
                                    </tr>
                                <?php
                                }
                            }



                            //สิทธื FINOFFICE
                            if (($_GET['level'] == "finoffice") && $_GET['type'] == 5) {
                                $sql = "SELECT * FROM req_edu as red
                        INNER JOIN tbl_member as m ON m.m_id = red.m_id 
                          INNER JOIN tbl_status as st ON st.s_id = red.s_id 
                          INNER JOIN veteran ON veteran.m_id= m.m_id
                          INNER JOIN veteran_family ON veteran.VT_ID = veteran_family.VT_ID
                          WHERE red.s_id = '3'
                          AND veteran_family.VT_FM_RELATION ='บุตร' and veteran.VT_ALIVE <>0";
                                $db->Execute($sql);
                                while ($array_rows =  $db->getData()) {
                                ?>
                                    <tr>
                                        <td><?php echo $array_rows['REQ_EDU_ID'] ?></td>
                                        <td><?php echo $array_rows['REQ_EDU_DATE'] ?></td>
                                        <td><?php echo $array_rows["m_fname"] . $array_rows["m_name"] . ' ' . $array_rows["m_lname"] ?></td>
                                        <td><?php echo $array_rows["VT_FM_TITLE"] . $array_rows["VT_FM_NAME"] . ' ' . $array_rows["VT_FM_LNAME"] ?></td>
                                        <td><?php echo $array_rows['REQ_EDU_YEAR'] ?></td>

                                        <td><?php echo $array_rows['REQ_EDU_VALUE'] ?></td>
                                        <td><?php echo $array_rows['s_name'] ?></td>
                                        <td><a href='check_form_detail.php?REQ_EDU_ID=<?php echo $array_rows[0] ?>&type=5' class='btn btn-warning btn-xs'>ปรับสถานะ</a></td>
                                    </tr>
                                <?php
                                }
                            }







                            if ($_GET['level'] == "vsofficer" && $_GET['type'] == 6) {
                                $sql = "SELECT * FROM req_monthly as rmonth
                            INNER JOIN tbl_member as m ON m.m_id = rmonth.m_id 
                            INNER JOIN tbl_status as st ON st.s_id = rmonth.s_id 
                            INNER JOIN veteran ON veteran.m_id= m.m_id
                            WHERE rmonth.s_id = '1' and veteran.VT_ALIVE <>0
                            ORDER BY rmonth.REQ_MOTHLY_ID DESC";
                                $db->Execute($sql);
                                while ($array_rows =  $db->getData()) {
                                ?>
                                    <tr>
                                        <td><?php echo $array_rows['REQ_MOTHLY_ID'] ?></td>
                                        <td><?php echo $array_rows['REQ_MOTHLY_DATE'] ?></td>
                                        <td><?php echo $array_rows["VT_CARD_STEP"] ?></td>
                                        <td><?php echo  $array_rows["VT_CARD_NO"] ?></td>
                                        <td><?php echo  $array_rows["VT_ID_NUM"] ?></td>
                                        <td style="width:30%"><?php echo $array_rows["m_fname"] . $array_rows["m_name"] . ' ' . $array_rows["m_lname"] ?></td>
                                        <td><?php echo $array_rows['s_name'] ?></td>
                                        <td><a href='check_form_detail.php?REQ_MOTHLY_ID=<?php echo $array_rows[0] ?>&type=6' class='btn btn-warning btn-xs'>ปรับสถานะ</a></td>
                                    </tr>
                                <?php
                                }
                            }



                            //สิทธื FINOFFICE
                            if ($_GET['level'] == "finoffice" && $_GET['type'] == 6) {
                                $sql = "SELECT * FROM req_monthly as rmonth
                            INNER JOIN tbl_member as m ON m.m_id = rmonth.m_id 
                            INNER JOIN tbl_status as st ON st.s_id = rmonth.s_id 
                            INNER JOIN veteran ON veteran.m_id= m.m_id
                            WHERE rmonth.s_id = '3' and veteran.VT_ALIVE <>0
                            ORDER BY rmonth.REQ_MOTHLY_ID DESC";
                                $db->Execute($sql);
                                while ($array_rows =  $db->getData()) {
                                ?>
                                    <tr>
                                        <td><?php echo $array_rows['REQ_MOTHLY_ID'] ?></td>
                                        <td><?php echo $array_rows['REQ_MOTHLY_DATE'] ?></td>
                                        <td><?php echo $array_rows["VT_CARD_STEP"] ?></td>
                                        <td><?php echo  $array_rows["VT_CARD_NO"] ?></td>
                                        <td><?php echo  $array_rows["VT_ID_NUM"] ?></td>
                                        <td><?php echo $array_rows["m_fname"] . $array_rows["m_name"] . ' ' . $array_rows["m_lname"] ?></td>
                                        <td><?php echo $array_rows['s_name'] ?></td>
                                        <td><a href='check_form_detail.php?REQ_MOTHLY_ID=<?php echo $array_rows[0] ?>&type=6' class='btn btn-warning btn-xs'>ปรับสถานะ</a></td>
                                    </tr>
                                <?php
                                }
                            }



                            // จัดการทหารผ่านศึก
                            if ($_GET['level'] == "vsofficer" && $_GET['type'] == 11) {
                                ?>


                            <?php
                            }










                            /*
                        if ($_GET['level'] == "vsofficer" && $_GET['type'] == 4) {
                            $sql = "SELECT * FROM req_maternity as rmat
                            INNER JOIN tbl_member as m ON m.m_id = rmat.m_id 
                            INNER JOIN tbl_status as st ON st.s_id = rmat.s_id 
                            INNER JOIN veteran ON veteran.m_id= m.m_id
                            INNER JOIN veteran_family ON veteran.VT_ID = veteran_family.VT_ID
                            WHERE rmat.s_id = '1'
                            AND veteran_family.VT_FM_RELATION ='ภรรยา'";
                            $db->Execute($sql);

                            echo '<pre>';
                            print_r($sql);
                            echo '</pre>';
                            
                            while ($array_rows =  $db->getData()) {
                            ?>
                                <tr>
                                    <td><?php echo $array_rows['REQ_MAT_ID'] ?></td>
                                    <td><?php echo $array_rows['REQ_MAT_DATE'] ?></td>
                                    <td><?php echo $array_rows["m_fname"] . $array_rows["m_name"] . ' ' . $array_rows["m_lname"] ?></td>
                                    <td><?php echo $array_rows["VT_FM_TITLE"] . $array_rows["VT_FM_NAME"] . ' ' . $array_rows["VT_FM_LNAME"] ?></td>
                                    <td><?php echo $array_rows['s_name'] ?></td>
                                    <td><a href='check_form_detail.php?REQ_MAT_ID=<?php echo $array_rows[0] ?>&type=3' class='btn btn-warning btn-xs'>ปรับสถานะ</a></td>
                                </tr>
                            <?php
                            }
                        }



                       



                        if ($_GET['level'] == "vsofficer" && $_GET['type'] == 5) {
                            $sql = "SELECT * FROM req_disa as rdisa
                            INNER JOIN tbl_member as m ON m.m_id = rdisa.m_id 
                            INNER JOIN tbl_status as st ON st.s_id = rdisa.s_id 
                            INNER JOIN disaster_type ON rdisa.REQ_DST_ID = disaster_type.DST_ID
                            WHERE rdisa.s_id = '1'
                            ORDER BY rdisa.m_id DESC";
                            $db->Execute($sql);
                            while ($array_rows =  $db->getData()) {
                            ?>
                                <tr>
                                    <td><?php echo $array_rows['REQ_DISA_ID'] ?></td>
                                    <td><?php echo $array_rows['REQ_DISA_DATE'] ?></td>
                                    <td><?php echo $array_rows["m_fname"] . $array_rows["m_name"] . ' ' . $array_rows["m_lname"] ?></td>
                                    <td><?php echo $array_rows["VT_FM_TITLE"] . $array_rows["VT_FM_NAME"] . ' ' . $array_rows["VT_FM_LNAME"] ?></td>
                                    <td><?php echo $array_rows['REQ_EDU_YEAR'] ?></td>
                                    <td><?php echo $array_rows['REQ_EDU_VALUE'] ?></td>
                                    <td><?php echo $array_rows['s_name'] ?></td>
                                    <td><a href='check_form_detail.php?REQ_EDU_ID=<?php echo $array_rows[0] ?>&type=3' class='btn btn-warning btn-xs'>ปรับสถานะ</a></td>
                                </tr>
                    <?php
                            }
                        }
                        */

                            ?>


                        </tbody>
                    </table>
                </div>

            </div>
            <!-- end panel-body -->
        </div>
        <!-- end panel -->
    </div>
<?php
} else {
    header('Location: login.php');
}
?>