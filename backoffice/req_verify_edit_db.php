<?php
session_start();
include '../connect/db.php';

$db = new DB();


$m_id = $_SESSION["m_id"];
$REQ_HEL_VALUE_APPROVE = $_POST["REQ_HEL_VALUE_APPROVE"];
$REQ_HEL_C_F = $_POST["REQ_HEL_C_F"];
$REQ_HEL_RECEIPT = $_POST["REQ_HEL_RECEIPT"];
$REQ_HEL_DETAIL = $_POST["REQ_HEL_DETAIL"];
$REQ_HEL_FILE   = $_POST["REQ_HEL_FILE"];
$REQ_HEL_DATE  = $_POST["REQ_HEL_DATE"];
$REQ_HEL_CC_REASON  = $_POST["REQ_HEL_CC_REASON"];
$REQ_HEL_ID = $_POST["REQ_HEL_ID"];
$REQ_HEL_VALUE_APPROVE = $_POST['REQ_HEL_VALUE_APPROVE'];
$s_id = $_POST["status"];

// if ($c_detail != '') {

//     $date1 = date("Ymd_His");
//     $numrand = (mt_rand());
//     $c_img = (isset($_POST['c_img']) ? $_POST['c_img'] : '');
//     $upload = $_FILES['c_img']['name'];
//     if ($upload != '') {

//         $path = "../c_img/";
//         $type = strrchr($_FILES['c_img']['name'], ".");
//         $newname = $numrand . $date1 . $type;
//         $path_copy = $path . $newname;
//         $path_link = "../c_img/" . $newname;
//         move_uploaded_file($_FILES['c_img']['tmp_name'], $path_copy);
//     } else {
//         $newname = '';
//     }
// }

if ($s_id == 3) {

    $sql = "UPDATE req_health set
			s_id = '$s_id'
			WHERE REQ_HEL_ID= $REQ_HEL_ID";

    if ($db->Execute($sql)) {
        echo "success";
    } else {
        echo "fail";
    }
} else if ($s_id  == 7) {

    $date = date('Y') + 543;

    $sql = "UPDATE req_health set
			s_id = '$s_id',
			REQ_HEL_CC_REASON ='$REQ_HEL_CC_REASON'
			WHERE REQ_HEL_ID= $REQ_HEL_ID";

    if ($db->Execute($sql)) {
        echo "success";
    } else {
        echo "fail";
    }
}
