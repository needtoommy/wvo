<?php

session_start();
if ($_SESSION['PERMISSION'] == 'KORN') {
    include '../connect/db.php';

    $db = new DB();

    $VT_TITLE = $_POST['VT_TITLE'];
    $VT_FNAME = $_POST['VT_FNAME'];
    $VT_LNAME = $_POST['VT_LNAME'];
    $VT_BRITH_DATE = $_POST['VT_BRITH_DATE'];
    $VT_AGE = $_POST['VT_AGE'];
    $VT_SEX = $_POST['VT_SEX'];
    $VT_HEIGHT = $_POST['VT_HEIGHT'];
    $VT_WEIGHT = $_POST['VT_WEIGHT'];
    $VT_PHONE = $_POST['VT_PHONE'];
    $VT_RACE = $_POST['VT_RACE'];
    $VT_NATIONALITY = $_POST['VT_NATIONALITY'];
    $VT_RELIGION = $_POST['VT_RELIGION'];
    $VT_ADD_CONTACT = $_POST['VT_ADD_CONTACT'];
    $VT_ADD_REG = $_POST['VT_ADD_REG'];
    $VT_ID_NUM = $_POST['VT_ID_NUM'];
    $VT_CARD_STEP = $_POST['VT_CARD_STEP'];
    $VT_CARD_NO = $_POST['VT_CARD_NO'];
    $VT_ARMY_ST = $_POST['VT_ARMY_ST'];

    $sql = "SELECT VT_ID_NUM FROM veteran WHERE VT_ID_NUM = '$VT_ID_NUM' ";

    $db->Execute($sql);
    $res_VT_ID_NUM = $db->getData();


    $sql = "INSERT INTO veteran (
                            VT_TITLE,
                            VT_FNAME,
                            VT_LNAME,
                            VT_BRITH_DATE,
                            VT_AGE,
                            VT_SEX,
                            VT_HEIGHT,
                            VT_WEIGHT,
                            VT_PHONE,
                            VT_RACE,
                            VT_NATIONALITY,
                            VT_RELIGION,
                            VT_ADD_CONTACT,
                            VT_ADD_REG,
                            VT_ID_NUM,
                            VT_CARD_STEP,
                            VT_CARD_NO,
                            VT_ARMY_ST
) VALUES (
                           '$VT_TITLE',
                            '$VT_FNAME',
                            '$VT_LNAME',
                            '$VT_BRITH_DATE',
                            '$VT_AGE',
                            '$VT_SEX',
                            '$VT_HEIGHT',
                            '$VT_WEIGHT',
                            '$VT_PHONE',
                            '$VT_RACE',
                            '$VT_NATIONALITY',
                            '$VT_RELIGION',
                            '$VT_ADD_CONTACT',
                            '$VT_ADD_REG',
                            '$VT_ID_NUM',
                            '$VT_CARD_STEP',
                            '$VT_CARD_NO',
                            '$VT_ARMY_ST'

)";


    if (empty($res_VT_ID_NUM)) {
        $db->Execute($sql);
    }

    $sql = "SELECT VT_ID FROM veteran order by VT_ID desc";
    $db->Execute($sql);
    $res = $db->getData();

    echo $res['VT_ID'];
} else {
    header('Location: login.php');
}
