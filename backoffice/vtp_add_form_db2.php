<?php

session_start();
if ($_SESSION['PERMISSION'] == 'KORN') {
include '../connect/db.php';
$db = new DB();

$VT_FM_NAME = $_POST['VT_FM_NAME'];
$VT_ID = $_POST['VT_ID'];
$m_username = $_POST['m_username'];
$m_password = $_POST['m_password'];
$m_email = $_POST['m_email'];

$year = date('Y') + 543;
$now = date('d/m/y h:s:i', strtotime('+543 years'));

// insert family
for ($i = 1; $i <= count($VT_FM_NAME); $i++) {

    $sql = "INSERT INTO veteran_family (
        VT_FM_TITLE,
        VT_FM_NAME,
        VT_FM_LNAME,
        VT_FM_BRITH_DATE,
        VT_FM_AGE,
        VT_SEX
    ) VALUES (
        '" . $_POST['VT_FM_TITLE'][$i] . "',
        '" . $_POST['VT_FM_NAME'][$i] . "',
        '" . $_POST['VT_FM_LNAME'][$i] . "',
        '" . $_POST['VT_FM_BRITH_DATE'][$i] . "',
        '" . $_POST['VT_FM_AGE'][$i] . "',
        '" . $_POST['VT_SEX'][$i] . "'
    )";

    // echo $sql;
    // exit;
    $db->Execute($sql);
}


// insert member เพื่อเอาค่า m_id
$sql = "INSERT INTO tbl_member (
                        VT_ID,
                        m_username,
                        m_password,
                        m_email

) VALUES (
                        '$VT_ID'.
                        '$m_username',
                        '$m_password',
                        '$m_email'
)";

$db->Execute($sql);

// หา max m_id
$sql = "SELECT m_id FROM tbl_member order by m_id desc limit 1";
$db->Execute($sql);
$res = $db->getData();
$m_id = $res['m_id'];


$sql = "SELECT VT_CARD_STEP FROM veteran WHERE VT_ID = $VT_ID ";
$db->Execute($sql);
$res = $db->getData();
$VT_CARD_STEP = $res['VT_CARD_STEP'];


// update veteran m_id ที่เป็นค่าว่างตอนแรก
$sql = "UPDATE veteran SET m_id=$m_id WHERE VT_ID=$VT_ID";
$db->Execute($sql);



if ($VT_CARD_STEP == "1ท." || $VT_CARD_STEP == "1ค.") {
    $sql = "INSERT INTO edu_value_bal VALUES (
        '$m_id',
        '99999999',
        '1',
        '0',
        '99999999',
        '$year',
        'Y',
        '$now',
        '$now'

    )";
   
    $db->Execute($sql);
} else {
    $sql = "INSERT INTO edu_value_bal VALUES (
        '$m_id',
        '12000',
        '1',
        '0',
        '12000',
        '$year',
        'Y',
        '$now',
        '$now'

    )";
     $db->Execute($sql);
}


$sql = "INSERT INTO health_value_bal (
    m_id,
    health_value_bal_begin,
    health_value_bal_use,
    health_value_bal_bal,
    health_value_bal_BG_YEAR,
    health_value_bal_status
) VALUES (
    '$m_id',
    '3500',
    '0',
    '3500',
    '$year',
    'Y'
)";

 $db->Execute($sql);


 $sql = "INSERT INTO mat_value_bal (
    m_id,
    mat_value_bal_begin,
    mat_value_bal_use,
    mat_value_bal_bal,
    mat_value_bal_BG_YEAR,
    mat_value_bal_status
) VALUES (
    '$m_id',
    '1000',
    '0',
    '1000',
    '$year',
    'Y'
)";

 $db->Execute($sql);


 $sql = "INSERT INTO occ_value_bal (
    m_id,
    occ_value_bal_begin,
    occ_value_bal_use,
    occ_value_bal_bal,
    occ_value_bal_BG_YEAR,
    occ_value_bal_status
) VALUES (
    '$m_id',
    '1000',
    '0',
    '1000',
    '$year',
    'Y'
)";
 $db->Execute($sql);
} else {
    header('Location: login.php');
}
