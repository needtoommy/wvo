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
    $VT_ARMY = $_POST['VT_ARMY'];
    $VT_OCCU = $_POST['VT_OCCU'];
    $VT_INCOME = $_POST['VT_INCOME'];
    $VT_MARITAL_ST_ID = $_POST['VT_MARITAL_ST_ID'];
    $VT_BANK_NAME = $_POST['VT_BANK_NAME'];
    $VT_BANK_ACC_NUM = $_POST['VT_BANK_ACC_NUM'];

    $sql = "SELECT VT_ID_NUM FROM veteran WHERE VT_ID_NUM = '$VT_ID_NUM'  AND VT_ALIVE <>0";

    $db->Execute($sql);
    $res_VT_ID_NUM = $db->getData();


    $sql = "INSERT INTO veteran (
                            VT_TITLE,
                            VT_FNAME,
                            VT_LNAME,
                            VT_BRITH_DATE,
                            VT_AGE,
                            VT_OCCU,
                            VT_SEX,
                            VT_HEIGHT,
                            VT_WEIGHT,
                            VT_INCOME,
                            VT_RACE,
                            VT_NATIONALITY,
                            VT_RELIGION,
                            VT_ADD_CONTACT,
                            VT_ADD_REG,
                            VT_ID_NUM,
                            VT_CARD_STEP,
                            VT_CARD_NO,
                            VT_ARMY_ST,
                            VT_ARMY,
                            VT_MARITAL_ST_ID,
                            VT_PHONE,
                            VT_BANK_NAME,
                            VT_BANK_ACC_NUM
) VALUES (
                           '$VT_TITLE',
                            '$VT_FNAME',
                            '$VT_LNAME',
                            '$VT_BRITH_DATE',
                            '$VT_AGE',
                            '$VT_OCCU',
                            '$VT_SEX',
                            '$VT_HEIGHT',
                            '$VT_WEIGHT',
                            '$VT_INCOME',
                            '$VT_RACE',
                            '$VT_NATIONALITY',
                            '$VT_RELIGION',
                            '$VT_ADD_CONTACT',
                            '$VT_ADD_REG',
                            '$VT_ID_NUM',
                            '$VT_CARD_STEP',
                            '$VT_CARD_NO',
                            '$VT_ARMY_ST',
                            '$VT_ARMY',
                            '$VT_MARITAL_ST_ID',
                            '$VT_PHONE',
                            '$VT_BANK_NAME',
                            '$VT_BANK_ACC_NUM'


)";


    if (empty($res_VT_ID_NUM)) {
        $db->Execute($sql);
    }

    $sql = "SELECT VT_ID FROM veteran WHERE VT_ALIVE <>0 order by VT_ID desc";
    $db->Execute($sql);
    $res = $db->getData();

    echo $res['VT_ID'];
} else {
    header('Location: login.php');
}
