<?php


for ($i = 0; $i < $_POST['select_file']; $i++) {
?>
  <div class="form-group">
    <!-- <div class="col-sm-2 control-label">
        อัพโหลดใบเสร็จ <?php echo $i + 2; ?> :
    </div> -->
    <div class="col-sm-12">
        <input type="file" name="REQ_MAT_BRITH_FILE[<?php echo $i + 2 ?>]" class="form-control">
    </div>
    <div class="col-sm-7">
     <input type="hidden" name="">
    </div>
  </div>
<?php
}
