<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<?php
session_start();
include('../connect/db.php');

$db = new DB();

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$REQ_DISA_ID = $_POST['REQ_DISA_ID'];
$REQ_DISA_DATE = $_POST['REQ_DISA_DATE'];
$REQ_DISA_DATE_FROM = $_POST['REQ_DISA_DATE_FROM'];
$REQ_DISA_DATE_TO = $_POST['REQ_DISA_DATE_TO'];
$REQ_DST_ID = $_POST['REQ_DST_ID'];
$REQ_DMT_TYPE = $_POST['REQ_DMT_TYPE'];
$REQ_DISA_EMP_ID = $_POST['REQ_DISA_EMP_ID'];
$REQ_DISA_PAY_TYPE = $_POST['REQ_DISA_PAY_TYPE'];
$REQ_DST_LV = $_POST['REQ_DST_LV'];


if ($_POST['submit'] == 'Y') {
    $sql = "UPDATE req_disa SET REQ_DISA_DATE='$REQ_DISA_DATE',REQ_DISA_DATE_FROM='$REQ_DISA_DATE_FROM' , REQ_DISA_DATE_TO = '$REQ_DISA_DATE_TO', REQ_DST_ID='$REQ_DST_ID', REQ_DMT_TYPE='$REQ_DMT_TYPE', REQ_DISA_EMP_ID='$REQ_DISA_EMP_ID', REQ_DISA_PAY_TYPE='$REQ_DISA_PAY_TYPE',REQ_DST_LV='$REQ_DST_LV',
        s_id=3 
     WHERE REQ_DISA_ID=$REQ_DISA_ID";


    if ($db->Execute($sql)) {
        echo '
    <script type="text/javascript">

    $(document).ready(function(){

        swal("อนุมัติใบคำร้องสำเร็จ", "", "success");

        setTimeout(function(){window.location="view_disa_request.php"}, 2000);
    });
    </script>
  ';
    }
} else {
    $sql = "UPDATE req_disa SET
    s_id=7
 WHERE REQ_DISA_ID=$REQ_DISA_ID";


    if ($db->Execute($sql)) {
        echo '
    <script type="text/javascript">

    $(document).ready(function(){

        swal("ยกเลิกใบคำร้องสำเร็จ", "", "success");

        setTimeout(function(){window.location="view_disa_request.php"}, 2000);
    });
    </script>
  ';
    }
}
echo $sql;
