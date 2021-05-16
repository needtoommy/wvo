<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>
<?php

session_start();
include '../connect/db.php';
$db = new DB();

$y = date('Y') + 543;
$m = date('m');
$d = date('d/m/Y h:i:s', strtotime('+543 years'));
$type = $_POST['type'];

$sql = "SELECT PAY_MON_MONTH,PAY_MON_BG_YEAR FROM
pay_monthly 
WHERE PAY_MON_MONTH = '$m' AND PAY_MON_BG_YEAR = '$y'
 GROUP BY PAY_MON_MONTH,PAY_MON_BG_YEAR";
$db->Execute($sql);
// echo $sql;
$res = $db->getData();
// print_r($res);
if (!empty($res)) {
    echo '
    <script type="text/javascript">
    
    $(document).ready(function(){
    
      swal("คุณได้ทำการอนุมัติเงินของเดือนนี้ไปแล้ว!!!!!", "", "warning");
        
        setTimeout(function(){window.location="vs_pay_m.php?type='.$type.'"}, 2000);
    });
    </script>
    ';
    exit;
} else {
    for ($i = 1; $i <= count($_POST['MAL_ID']); $i++) {
        $MONTHLY_VALUE_APPROVE = $_POST['MONTHLY_VALUE_APPROVE'][$i];
        $MAL_ID = $_POST['MAL_ID'][$i];
        $m_id2 = $_POST['m_id'][$i];
        $session_id = $_SESSION['m_id'];

        $sql = "SELECT * from  veteran b where   b.m_id = $m_id2 and b.VT_ALIVE <> 0";
      
        $db->Execute($sql);
        $res = $db->getData();
        // exit;
        if (!empty($res)) {
            $sql = "INSERT INTO pay_monthly 
            (
            MAL_ID,m_id,PAY_MON_VALUE,PAY_MON_MONTH,PAY_MON_BG_YEAR,PAY_MON_P_DATE,m_id2
           ) 
            VALUES 
            (
                '$MAL_ID',
                '$session_id',
                '$MONTHLY_VALUE_APPROVE',
                '$m',
                '$y',
                '$d',
                '$m_id2'
            )";
          
            $db->Execute($sql);
        }
    }
    echo '
    <script type="text/javascript">
    
    $(document).ready(function(){
    
      swal("อนุมัติสำเร็จ!", "", "success");
        
        setTimeout(function(){window.location="vs_pay_m.php?type='.$type.'"}, 2000);
    });
    </script>
    ';
    exit;
}
