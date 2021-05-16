<?php

session_start();
if ($_SESSION['PERMISSION'] == 'KORN') {
    include '../connect/db.php';

    $db = new DB();
    $VT_ID_ADD = $_POST['VT_ID_ADD'];
    for ($i=0; $i < count($_POST['VT_FM_TITLE_ADD']); $i++) {

        $VT_FM_TITLE_ADD = $_POST['VT_FM_TITLE_ADD'][$i+1];
        $VT_FM_NAME_ADD = $_POST['VT_FM_NAME_ADD'][$i+1];
        $VT_FM_LNAME_ADD = $_POST['VT_FM_LNAME_ADD'][$i+1];
        $VT_FM_BRITH_DATE_ADD = $_POST['VT_FM_BRITH_DATE_ADD'][$i+1];
        $VT_FM_AGE_ADD = $_POST['VT_FM_AGE_ADD'][$i+1];
        $VT_FM_RELATION_ADD = $_POST['VT_FM_RELATION_ADD'][$i+1];
        $VT_SEX_ADD = $_POST['VT_SEX_ADD'][$i+1];
        $VT_FM_IDCARD_ADD = $_POST['VT_FM_IDCARD_ADD'][$i+1];

       
        $sql = "INSERT INTO veteran_family (
            VT_ID,
            VT_FM_TITLE,
            VT_FM_IDCARD,
            VT_FM_NAME,
            VT_FM_LNAME,
            VT_FM_BRITH_DATE,
            VT_FM_AGE,
            VT_FM_RELATION,
            VT_SEX
        ) VALUES (
             $VT_ID_ADD,
            '$VT_FM_TITLE_ADD',
            '$VT_FM_IDCARD_ADD',
            '$VT_FM_NAME_ADD',
            '$VT_FM_LNAME_ADD',
            '$VT_FM_BRITH_DATE_ADD',
            '$VT_FM_AGE_ADD',
            '$VT_FM_RELATION_ADD',
            '$VT_SEX_ADD'
        )";
        $db->Execute($sql);

    }
}