<?php session_start();?>
<?php
include('h.php');
?>
<style type="text/css">
#btn{
width:100%;
}
</style>
<div class="container" style="padding-top:100px">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-7" style="background-color:#f4f4f4">
      
      <h4>
<h1 align="center"> ระบบสวัสดิการสงเคราะห์ทหารผ่านศึก</h1>
    

      <hr>
      <h3 align="center">
    
      <span class="glyphicon glyphicon-lock"> </span>
      ลงชื่อเข้าใช้ระบบ </h3>
      
      <form  name="formlogin" action="chklogin.php" method="POST" id="login" class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-12">
            <input type="text"  name="m_username" class="form-control" required placeholder="Username" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <input type="password" name="m_password" class="form-control" required placeholder="Password" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary" id="btn">
            <span class="glyphicon glyphicon-log-in"> </span>
            Login </button>
          </div>
        </div>
      </form>
    <!--<h1>แหล่งศึกษาเพิ่มเติม (php+mysqli)</h1>
      <iframe width="560" height="315" src="https://www.youtube.com/embed/videoseries?list=PLEA4F1w-xYVbTBwfq8J5mT7GkyxlqXNkJ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      <br>
      <h4>
      ตัว 100% ราคาพิเศษ สนใจ inbox มาที่แฟนเพจ
      * รายละเอียดใต้คลิป
    </h4>
      <iframe width="560" height="315" src="https://www.youtube.com/embed/bkYBKfFauB8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

      <br>
      <br>
      หมายเหตุ : <br>
      *Source code ชุดนี้มอบให้กลุ่ม devbanbanVIP สำหรับศึกษาและพัฒนาต่อยอด <br>
      *ไม่แนะนำให้เอาไปใช้งานจริง เพราะต้องมีการพัฒนาเพิ่มเติมอีกหลาย Modules <br>
      พิศิษฐ์ บวรเลิศสุธี 15 ธันวาคม 2562 <br>
      <a href="https://devbanban.com/"> devbanban.com </a>
      <br>
      <br>-->
    </div>
  </div>
</div>