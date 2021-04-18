 <?php
    include '../connect/db.php';
    $db = new DB();
    ?>



 <div class="modal-header">
     <h5 class="modal-title" id="exampleModalLongTitle">รายการใบคำร้อง</h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
     </button>
 </div>
 <div class="modal-body">
     <?php
        $sql = "SELECT * FROM req_health 
                INNER JOIN tbl_status ON req_health.s_id =tbl_status.s_id 
                INNER JOIN health_value_bal ON req_health.m_id = health_value_bal.m_id 
                INNER JOIN veteran ON req_health.m_id = veteran.m_id
                INNER JOIN veteran_family ON veteran.VT_ID = veteran_family.VT_ID
                WHERE REQ_HEL_ID= " . $_POST['popupid'] . "
                AND veteran_family.VT_FM_ID =req_health.VT_FM_ID and veteran.VT_ALIVE <>0 ";

        $db->Execute($sql);
        $res = $db->getData();

        print_r($res);
    
        ?>



     <!-- begin panel-body -->
     <div class="panel-body">
         <div class="note note-primary m-b-15">
             <div class="note-icon"><i class="fab fa-facebook-f"></i></div>
             <div class="note-content">
                 <h4><b>ยืนคำร้องขอเบิกค่ารักษาพยาบาล โดย</b></h4>
                 <p>
                     Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                     Maecenas id gravida libero. Etiam semper id sem a ultricies.
                 </p>
             </div>
         </div>
         <div class="note note-warning note-with-right-icon m-b-15">
             <div class="note-content text-right">
                 <h4><b>Note with right icon!</b></h4>
                 <p>
                     Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                     Maecenas id gravida libero. Etiam semper id sem a ultricies.
                 </p>
             </div>
             <div class="note-icon"><i class="fa fa-lightbulb"></i></div>
         </div>

     </div>
     <!-- end panel-body -->




     <!-- begin panel -->
     <div class="panel panel-inverse" data-sortable-id="form-validation-1">
         <!-- begin panel-heading -->
         <div class="panel-heading">
             <h4 class="panel-title">Basic Form Validation</h4>
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
             <form class="form-horizontal" data-parsley-validate="true" name="demo-form" id="req_form">
             <input type="hidden" name="REQ_HEL_ID" value="<?php echo $_POST['popupid'] ?>">
                 <div class="form-group row m-b-15">
                     <label class="col-md-4 col-sm-4 col-form-label" for="fullname">วันที่ยื่นคำร้อง  :</label>
                     <div class="col-md-8 col-sm-8">
                         <span><?php echo $res['REQ_HEL_DATE']; ?></span>
                     </div>
                 </div>
                 <div class="form-group row m-b-15">
                     <label class="col-md-4 col-sm-4 col-form-label" for="fullname">เบิกให้  :</label>
                     <div class="col-md-8 col-sm-8">
                         <span><?php echo $res['VT_FM_TITLE'].' '.$res['VT_FM_NAME'].' '. $res['VT_FM_LNAME'].' เกี่ยวข้องเป็น : '.$res['VT_FM_RELATION'] ?></span>
                     </div>
                 </div>
                 <div class="form-group row m-b-15">
                     <label class="col-md-4 col-sm-4 col-form-label" for="fullname">จำนวนที่ขอเบิก :</label>
                     <div class="col-md-8 col-sm-8">
                        <span><?php echo $res['REQ_HEL_VALUE']; ?></span>
                     </div>
                 </div>
                 <div class="form-group row m-b-15">
                     <label class="col-md-4 col-sm-4 col-form-label" for="fullname">รายละเอียด :</label>
                     <div class="col-md-8 col-sm-8">

                         <span><?php echo $res['REQ_HEL_DETAIL']; ?></span>
                     </div>
                 </div>

                 <div class="form-group row m-b-15" id="reason" style="display: none;">
                     <label class="col-md-4 col-sm-4 col-form-label" for="fullname">เหตุผลยกเลิก :</label>
                     <div class="col-md-8 col-sm-8">
                         <textarea name="REQ_HEL_CC_REASON" id="REQ_HEL_CC_REASON" cols="40" rows="2"></textarea>
                     </div>
                 </div>



                 <?php
                    $sql = "SELECT file_name, is_image FROM multi_file where m_id = 2 and req_id= " . $_POST['popupid'] . "";
                    // echo $sql;
                    // exit;
                    $db->Execute($sql);
                    $i = 1;
                    while ($row = $db->getData()) {


                        // 0 = image, 1 not image
                        if ($row['is_image'] == 0) {
                    ?>
                         <div class="form-group row m-b-15">
                             <label class="col-md-4 col-sm-4 col-form-label" for="fullname"> ดูใบเสร็จ <?php echo $i ?>:</label>
                             <div class="col-md-8 col-sm-8">
                            <a href="../c_img/<?php echo $row['file_name']; ?>" download><img src="../c_img/<?php echo $row['file_name']; ?>" alt="<?php echo $row['file_name']; ?>" style="max-width: 300px;"></a>
                             </div>
                         </div>
                     <?php
                        } else {
                        ?>

                         <div class="form-group row m-b-15">
                             <label class="col-md-4 col-sm-4 col-form-label" for="fullname"> ดูใบเสร็จ <?php echo $i ?>: <?php echo $i ?>:</label>
                             <div class="col-md-8 col-sm-8">

                                 <a href="../c_img/<?php echo $row['file_name']; ?>" download>
                                     โหลดเอกสาร <?php echo $i ?>
                                 </a>
                             </div>
                         </div>
                 <?php }
                        $i++;
                    } ?>
             </form>
         </div>
         <!-- end panel-body -->
     </div>
 </div>
 <div class="modal-footer">
     <button type="button" class="btn btn-secondary"  onclick="send(7)">ยกเลิกใบคำร้อง</button>
     <button type="button" class="btn btn-primary" onclick="send(3)">อนุมติใบคำร้อง</button>
 </div>