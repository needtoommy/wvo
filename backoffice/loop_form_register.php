<?php
session_start();
if ($_SESSION['PERMISSION'] == 'KORN') {
    for ($i = 0; $i < $_GET['count']; $i++) {
?>
        <h5> บุคคลที่ <?php echo $i + 1 ?></h5>
        <hr>
        <div class="form-group row m-b-12">
            <label class="col-lg-2 text-lg-right col-form-label">คำนำหน้าชื่อ <span class="text-danger">*</span></label>
            <div class="col-lg-2 col-xl-1">
                <input type="text" name="VT_FM_TITLE[<?php echo $i + 1 ?>]" placeholder="คำนำหน้าชื่อ" data-parsley-group="step-1" class="form-control" />
            </div>

            <label class="col-lg-1 text-lg-right col-form-label">ชื่อ <span class="text-danger">*</span></label>
            <div class="col-lg-2 col-xl-3">
                <input type="text" name="VT_FM_NAME[<?php echo $i ?>]" placeholder="ชื่อ" data-parsley-group="step-1" class="form-control" />
            </div>
            <label class="col-lg-1 text-lg-right col-form-label">นามสกุล <span class="text-danger">*</span></label>
            <div class="col-lg-2 col-xl-3">
                <input type="text" name="VT_FM_LNAME[<?php echo $i + 1 ?>]" placeholder="นามสกุล" data-parsley-group="step-1" class="form-control" />
            </div>
        </div>
        <div class="form-group row m-b-12">
            <label class="col-lg-2 text-lg-right col-form-label">วันเดือนปีเกิด <span class="text-danger">*</span></label>
            <div class="col-lg-2 col-xl-2">
                <input type="date" name="VT_FM_BRITH_DATE[<?php echo $i + 1 ?>]" data-parsley-group="step-1" class="form-control" />
            </div>

            <label class="col-lg-1 text-lg-right col-form-label">อายุ <span class="text-danger">*</span></label>
            <div class="col-lg-2 col-xl-2">
                <input type="text" name="VT_FM_AGE[<?php echo $i + 1 ?>]" placeholder="อายุ" data-parsley-group="step-1" class="form-control" />
            </div>
            <label class="col-lg-1 text-lg-right col-form-label">เกี่ยวข้องเป็น <span class="text-danger">*</span></label>
            <div class="col-lg-9 col-xl-3">
                <div class="row row-space-6">
                    <div class="col-7">
                        <select class="form-control" name="VT_SEX[<?php echo $i ?>]">
                            <option>เลือกความสัมพันธ์</option>
                            <option value="บิดา">บิดา</option>
                            <option value="มารดา">มารดา</option>
                            <option value="สามี">สามี</option>
                            <option value="ภรรยา">ภรรยา</option>
                            <option value="บุตร">บุตร</option>
                            <option value="บุตรบุญธรรม">บุตรบุญธรรม</option>

                        </select>
                    </div>

                </div>
            </div>

        </div>




        <div class="form-group row m-b-12">
            <label class="col-lg-2 text-lg-right col-form-label">วันเดือนปีเกิด <span class="text-danger">*</span></label>
            <div class="col-lg-2 col-xl-2">
                <input type="number" name="VT_ID_NUM" id="VT_ID_NUM" placeholder="" data-parsley-group="step-1" class="form-control" />
            </div>
        </div>



        </div>

<?php
    }
} else {
    header('Location: login.php');
}
?>