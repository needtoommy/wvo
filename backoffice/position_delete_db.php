<?php
session_start();
if ($_SESSION['PERMISSION'] == 'KORN') {

    include '../connect/db.php';
    $db = new DB();

    $p_id = $_POST['p_id'];
    $p_name  = $_POST['p_name'];

    $sql = "UPDATE tbl_position SET p_status= 'N' WHERE p_id = $p_id";
    $db->Execute($sql);
    echo "success";
}
