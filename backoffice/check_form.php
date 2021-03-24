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
            <table id="data-table-fixed-columns" class="table table-striped table-bordered table-td-valign-middle">
                <thead>
                    <tr>
                        <?php
                        $array_columns = array();
                        if ($_GET['level'] == "vsofficer" && $_GET['type'] == 1) {
                            $array_columns = array("REQ_HEL_ID", "วันที่รับคำร้อง", "ชื่อ_สกุล", "รายละเอียดการเบิก", "จำนวนเงินขอเบิก", "จำนวนเงินอนุมัติ", "สถานะ", "ปรับสถานะ");
                        }

                        if ($_GET['level'] == "vsofficer" && $_GET['type'] == 2) {
                            $array_columns = array("เลขใบคำร้อง", "วันที่รับคำร้อง", "ชื่อ_สกุล", "เหตุผลขอรับการสงเคราะห์", "รายละเอียดการเบิก", "จำนวนเงินขอเบิก", "จำนวนเงินอนุมัติ", "สถานะ", "ปรับสถานะ");
                        }

                        if ($_GET['level'] == "vsofficer" && $_GET['type'] == 3) {
                            $array_columns = array("เลขใบคำร้อง", "วันที่รับคำร้อง", "ชื่อ_สกุล", "รายละเอียดการเบิก", "จำนวนเงินอนุมัติ", "สถานะ", "ปรับสถานะ");
                        }

                        for ($i = 0; $i < count($array_columns); $i++) {
                            echo '<th class="text-nowrap">' . $array_columns[$i] . '</th>';
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($_GET['level'] == "vsofficer" && $_GET['type'] == 1) {
                        $sql = "SELECT * FROM req_health as rh 
                        INNER JOIN tbl_member as m ON m.m_id = rh.m_id 
                        INNER JOIN tbl_status as st ON st.s_id = rh.s_id 
                        WHERE st.s_id ='1'
                        ORDER BY rh.m_id DESC";
                        $db->Execute($sql);
                        while ($array_rows =  $db->getData()) {
                    ?>
                            <tr>
                                <td><?php echo $array_rows["REQ_HEL_ID"] ?></td>
                                <td><?php echo $array_rows["REQ_HEL_DATE"] ?></td>
                                <td><?php echo $array_rows["m_fname"] . $array_rows["m_name"] . ' ' . $array_rows["m_lname"] ?></td>
                                <td><?php echo $array_rows["REQ_HEL_DETAIL"] ?></td>
                                <td><?php echo $array_rows["REQ_HEL_VALUE"] ?></td>
                                <td><?php echo $array_rows["REQ_HEL_VALUE_APPROVE"] ?></td>
                                <td><?php echo $array_rows["s_name"] ?></td>
                                <td><a href='check_form_detail.php?REQ_HEL_ID=<?php echo $array_rows['REQ_HEL_ID'] ?>' class='btn btn-warning btn-xs'>ปรับสถานะ</a></td>
                            </tr>
                        <?php
                        }
                    }


                    if ($_GET['level'] == "vsofficer" && $_GET['type'] == 2) {
                        $sql = "SELECT * FROM req_occ as oc 
                        INNER JOIN tbl_member as m ON m.m_id = oc.m_id 
                        INNER JOIN tbl_status as st ON st.s_id = oc.s_id 
                        WHERE st.s_id ='1'
                        ORDER BY oc.REQ_OCC_ID DESC";

                        $db->Execute($sql);
                        while ($array_rows =  $db->getData()) {
                        ?>
                            <tr>
                                <td><?php echo $array_rows['REQ_OCC_ID'] ?></td>
                                <td><?php echo $array_rows['REQ_OCC_DATE'] ?></td>
                                <td><?php echo $array_rows["m_fname"] . $array_rows["m_name"] . ' ' . $array_rows["m_lname"] ?></td>
                                <td><?php echo $array_rows['REQ_OCC_REASON'] ?></td>
                                <td><?php echo $array_rows['REQ_OCC_REMARK'] ?></td>
                                <td><?php echo $array_rows['REQ_OCC_VALUE'] ?></td>
                                <td><?php echo $array_rows['REQ_OCC_VALUE_APPROVE'] ?></td>
                                <td><?php echo $array_rows['s_name'] ?></td>
                                <td><a href='case_occ.php?act=edit&REQ_OCC_ID=<?php echo $row[0] ?>' class='btn btn-warning btn-xs'>ปรับสถานะ</a></td>

                            </tr>
                        <?php
                        }
                    }

                    if ($_GET['level'] == "vsofficer" && $_GET['type'] == 3) {
                        ?>

                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- end panel-body -->
    </div>
    <!-- end panel -->
</div>