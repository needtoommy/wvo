<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>

<?php
session_start();
if ($_SESSION['PERMISSION'] == 'KORN') {

    include '../connect/db.php';
    $db = new DB();

  for ($i=0; $i < count( $_POST['s_name']); $i++) { 
      $s_name = $_POST['s_name'][$i+1];
      $sql  = "UPDATE tbl_status SET s_name='$s_name' WHERE s_id=$i+1";
 
      $db->Execute($sql);
  }
  echo '
  <script type="text/javascript">
  
  $(document).ready(function(){
  
    swal("อับเดตสำเร็จ", "", "success");
      
      setTimeout(function(){window.history.back()}, 2000);
  });
  </script>
  ';


}

