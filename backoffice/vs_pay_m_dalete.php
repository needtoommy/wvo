<?php
session_start();
include '../connect/db.php';
$db = new DB();
$id = $_GET['id'];

$sql = "UPDATE monthly_approve_list SET status = '3' WHERE REQ_MONTHLY_ID='$id'";
$db->Execute($sql);
?>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>

<?php

echo '
<script type="text/javascript">

$(document).ready(function(){

    swal("ระงับสิทธิสำเร็จ!!", "", "success");
    
    setTimeout(function(){ window.location = "vs_pay_m.php" }, 2000);
});
</script>
';
 ?>
