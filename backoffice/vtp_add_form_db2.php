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
$VT_TITLE = $_POST['VT_TITLE'];
$VT_FNAME = $_POST['VT_FNAME'];
$VT_LNAME = $_POST['VT_LNAME'];

$year = date('Y') + 543;
$now = date('d/m/y h:s:i', strtotime('+543 years'));


// insert member เพื่อเอาค่า m_id
$sql = "INSERT INTO tbl_member (
                        VT_ID,
                        m_username,
                        m_password,
                        m_fname,
                        m_name,
                        m_lname,
                        m_email,
                        m_level

) VALUES (
                        '$VT_ID',
                        '$m_username',
                        '$m_password',
                        '$VT_TITLE',
                        '$VT_FNAME',
                        '$VT_LNAME',
                        '$m_email',
                        'member'
)";

$db->Execute($sql);
// echo $sql;
// exit;

// insert family
for ($i = 0; $i < count($VT_FM_NAME); $i++) {

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
        '" . $_POST['VT_ID'] . "',
        '" . $_POST['VT_FM_TITLE'][$i+1] . "',
        '" . $_POST['VT_FM_IDCARD'][$i+1] . "',
        '" . $_POST['VT_FM_NAME'][$i+1] . "',
        '" . $_POST['VT_FM_LNAME'][$i+1] . "',
        '" . $_POST['VT_FM_BRITH_DATE'][$i+1] . "',
        '" . $_POST['VT_FM_AGE'][$i+1] . "',
        '" . $_POST['VT_FM_RELATION'][$i+1] . "',
        '" . $_POST['VT_SEX'][$i+1] . "'
    )";

    // echo $sql;
    // exit;
    $db->Execute($sql);
}



// หา max m_id
$sql = "SELECT m_id FROM tbl_member WHERE m_alive <> 0 order by m_id desc limit 1";
$db->Execute($sql);
$res = $db->getData();
$m_id = $res['m_id'];


$sql = "SELECT VT_CARD_STEP FROM veteran WHERE VT_ID = $VT_ID AND VT_ALIVE <>0";
$db->Execute($sql);
$res = $db->getData();
$VT_CARD_STEP = $res['VT_CARD_STEP'];


// update veteran m_id ที่เป็นค่าว่างตอนแรก
$sql = "UPDATE veteran SET m_id=$m_id WHERE VT_ID=$VT_ID AND VT_ALIVE <>0";
$db->Execute($sql);


$sql = "SELECT * FROM assist_policy WHERE ATP_STATUS='Y'";
$db->Execute($sql);

$assist_policy = array(); 
while($res = $db->getData()){
    array_push($assist_policy,$res);
}

$bal_1 = $assist_policy[0]['ATP_VALUE'];
$bal_2 = $assist_policy[1]['ATP_VALUE'];
$bal_3 = $assist_policy[2]['ATP_VALUE'];
$bal_4 = $assist_policy[3]['ATP_VALUE'];
$bal_5 = $assist_policy[4]['ATP_VALUE'];
$bal_6 = $assist_policy[5]['ATP_VALUE'];
$bal_7 = $assist_policy[6]['ATP_VALUE'];
// echo '<pre>';
// print_r($assist_policy);
// echo '</pre>';
// exit;

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
        '$bal_7',
        '1',
        '0',
        '$bal_7',
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
    '$bal_1',
    '0',
    '$bal_1',
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
    '$bal_3',
    '0',
    '$bal_3',
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
    '$bal_2',
    '0',
    '$bal_2',
    '$year',
    'Y'
)";
 $db->Execute($sql);
} else {
    header('Location: login.php');
}
