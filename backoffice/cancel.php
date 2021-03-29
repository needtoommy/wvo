<?php

session_start();

include '../connect/db.php';

$db = new DB();

$id = $_POST['id'];
$s_id = $_POST['s_id'];
$type = $_POST['type'];
$reason = $_POST['reason'];
$money = $_POST['money'];
$REQ_DISA_RATE = $_POST['REQ_DISA_RATE'];
$m_id = $_POST['m_id'];
$now = date('d-m-Y h:i:s');

if (isset($type) == 1) {
    $sql = "UPDATE req_health SET s_id=$s_id , REQ_HEL_CC_REASON='$reason', REQ_HEL_VALUE_APPROVE=$money WHERE REQ_HEL_ID=$id ";
    $db->Execute($sql);

    $sql = "SELECT health_value_bal_bal FROM health_value_bal_use WHERE m_id=$m_id limit 1";
    $db->Execute($sql);
    $res = $db->getData();
    $total = $res['health_value_bal_bal'] - $money;

    $sql = "UPDATE health_value_bal SET health_value_bal_use=$money, health_value_bal_bal= $total  WHERE m_id=$m_id";
    $db->Execute($sql);
}

if (isset($type) == 2) {
    $sql = "UPDATE req_occ SET s_id=$s_id , REQ_OCC_CC_REASON='$reason', REQ_OCC_VALUE_APPROVE=$money WHERE REQ_OCC_ID=$id ";
    $db->Execute($sql);

    $sql = "SELECT occ_value_bal_bal FROM occ_value_bal_use WHERE m_id=$m_id limit 1";
    $db->Execute($sql);
    $res = $db->getData();
    $total = $res['occ_value_bal_bal'] - $money;

    $sql = "UPDATE occ_value_bal SET occ_value_bal_use=$money, occ_value_bal_bal= $total  WHERE m_id=$m_id";
    $db->Execute($sql);
}

if (isset($type) == 3) {
    $sql = "UPDATE req_disa SET s_id=$s_id , REQ_DISA_CC_REASON='$reason', REQ_DISA_VALUE_APPROVE=$money, REQ_DISA_RATE='$REQ_DISA_RATE' WHERE REQ_DISA_ID=$id ";
    $db->Execute($sql);


    $sql = "select max(REQ_DISA_ID) as maxid from req_disa limit 1";
    $db->Execute($sql);
    $res = $db->getData();
    $last_id = $res['maxid'];

    $check = 0;

    for ($i = 0; $i < count($_FILES['REQ_DISA_FILE']['name']); $i++) {


        $date1 = date("Ymd_His");
        $numrand = (mt_rand());
        $c_img = (isset($_POST['REQ_DISA_FILE'][$i + 1]) ? $_POST['REQ_DISA_FILE'][$i + 1] : '');
        $upload = $_FILES['REQ_DISA_FILE']['name'][$i + 1];
        if ($upload != '') {

            $path = "../c_img/";
            $type = strrchr($_FILES['REQ_DISA_FILE']['name'][$i + 1], ".");
            $newname = $numrand . $date1 . $type;
            $path_copy = $path . $newname;
            $path_link = "../c_img/" . $newname;
            move_uploaded_file($_FILES['REQ_DISA_FILE']['tmp_name'][$i + 1], $path_copy);
        } else {
            $newname = '';
        }


        $target_dir = "../c_img/";
        $target_file = $target_dir . basename($_FILES["REQ_DISA_FILE"]["name"][$i + 1]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $sql = "INSERT INTO multi_file (m_id,req_id,type,seq,file_name, is_image,vs_id) VALUES ($m_id,$last_id,'11',$i+1,'" . $newname . "', 1,'4')";
        } else {
            $sql = "INSERT INTO multi_file (m_id,req_id,type,seq,file_name, is_image,vs_id) VALUES ($m_id,$last_id,'11',$i+1,'" . $newname . "', 0,'4')";
        }

        $db->Execute($sql);
    }
}


if (isset($type) == 4) {
    $sql = "UPDATE req_maternity SET s_id=$s_id , REQ_MAT_CC_REASON='$reason', REQ_MAT_VALUE_APPROVE=$money WHERE REQ_MAT_ID=$id ";
    $db->Execute($sql);


    $sql = "SELECT mat_value_bal_bal FROM mat_value_bal_use WHERE m_id=$m_id limit 1";
    $db->Execute($sql);
    $res = $db->getData();
    $total = $res['mat_value_bal_bal'] - $money;

    $sql = "UPDATE mat_value_bal SET mat_value_bal_use=$money, mat_value_bal_bal= $total  WHERE m_id=$m_id";
    $db->Execute($sql);
}


if (isset($type) == 5) {
    $sql = "UPDATE req_education SET s_id=$s_id , REQ_EDU_CC_REASON='$reason', REQ_EDU_VALUE_APPROVE=$money WHERE REQ_EDU_ID=$id ";
    $db->Execute($sql);

    $sql = "SELECT max(seq) as max_edu FROM edu_value_bal WHERE m_id=$m_id limit 1";
    $db->Execute($sql);
    $res = $db->getData();
    $max_edu = $res['max_edu'];


    $sql = "SELECT edu_value_bal_use,edu_value_bal_bal FROM edu_value_bal WHERE m_id=$m_id and seq=$max_edu limit 1";
    $db->Execute($sql);
    $res = $db->getData();

    $edu_value_bal_use = $res['edu_value_bal_use'];
    $edu_value_bal_bal = $res['edu_value_bal_bal'];
    $total_edu = ($edu_value_bal_use + $edu_value_bal_bal) - $money;

    $sql = "UPDATE edu_value_bal SET edu_value_bal_use=$money, edu_value_bal_bal= $total_edu, upddate_datetime='$now'  WHERE m_id=$m_id and seq=$max_edu";
    $db->Execute($sql);
}

echo 'success';
