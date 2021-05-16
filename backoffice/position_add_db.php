<?php
session_start();
if ($_SESSION['PERMISSION'] == 'KORN') {

    include '../connect/db.php';
    $db = new DB();


    $p_name  = $_POST['p_name'];

    $sql = "INSERT INTO tbl_position (p_name) VALUES ('$p_name')";
    $db->Execute($sql);
    echo "success";
}
