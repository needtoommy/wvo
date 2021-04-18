<?php
session_start();
include '../connect/db.php';

$m_id = $_POST["m_id"];
$s_id = $_POST["s_id"];
$REQ_EDU_VALUE = $_POST['REQ_EDU_VALUE'];
$VT_CARD_STEP = $_POST['VT_CARD_STEP'];
$REQ_EDU_DATE = $_POST['REQ_EDU_DATE'];
$VT_FM_ID = $_POST['VT_FM_ID'];
$REQ_EDU_INSTITUTION_TYPE = $_POST['REQ_EDU_INSTITUTION_TYPE'];
$REQ_EDU_INSTITUTION_NAME = $_POST['REQ_EDU_INSTITUTION_NAME'];
$REQ_EDU_SEMESTER = $_POST['REQ_EDU_SEMESTER'];
$REQ_EDU_YEAR = $_POST['REQ_EDU_YEAR'];
$ELV_ID = $_POST['ELV_ID'];
$REQ_EDU_FACULTY = $_POST['REQ_EDU_FACULTY'];
$REQ_EDU_PROGRAM = $_POST['REQ_EDU_PROGRAM'];
$REQ_EDU_GRADE = $_POST['REQ_EDU_GRADE'];
$REQ_EDU_VALUE = $_POST['REQ_EDU_VALUE'];
$REQ_EDU_FILE = $_POST['REQ_EDU_FILE'];

$db = new DB;

$date  = date('d/m/Y h:i:s', strtotime('+543 year'));
$year_now = date('Y', strtotime('+543 year'));
$date_edu = date('d/m/Y', strtotime('+543 year'));

$sql = "SELECT max(seq) as max_seq from edu_value_bal where m_id=" . $_SESSION['m_id'] . "";
$db->Execute($sql);
$res = $db->getData();
// print_r($res);
$max_seq = $res['max_seq'];



//max_use
$sql = "SELECT SUM(edu_value_bal_use) as sum FROM edu_value_bal where m_id=" . $_SESSION['m_id'] . " and edu_value_bal_bg_year = " . $year_now . "";
$db->Execute($sql);
$res = $db->getData();
$res_maxuse = $res['sum'];



//max_balance
$sql = "SELECT edu_value_bal_bal as max_bal FROM edu_value_bal WHERE m_id=" . $_SESSION['m_id'] . " AND seq=" . $max_seq . "";
$db->Execute($sql);
$res = $db->getData();
$max_bal = $res['max_bal'];

if ($max_bal < $REQ_EDU_VALUE) {
    echo 'จำนวนวงเงินเกิน';
    exit;
}

$check_type = 0;


if ($VT_CARD_STEP == "1ท." || $VT_CARD_STEP == "1ค.") {
    $sql = "INSERT INTO  edu_value_bal VALUES  ('" . $_SESSION['m_id'] . "','12000', $max_seq+1,'$REQ_EDU_VALUE',$max_bal-$REQ_EDU_VALUE,'$year_now', 'Y',  '" . $date . "', '" . $date . "')";

    $db->Execute($sql);

    $sql = "INSERT INTO req_edu 
    (
        m_id,
        s_id,
        REQ_EDU_DATE,
        VT_FM_ID,
        REQ_EDU_INSTITUTION_TYPE,
        REQ_EDU_INSTITUTION_NAME,
        REQ_EDU_SEMESTER,
        REQ_EDU_YEAR,
        ELV_ID,
        REQ_EDU_FACULTY,
        REQ_EDU_PROGRAM,
        REQ_EDU_GRADE,
        REQ_EDU_VALUE,
        create_datetime
    ) 
    VALUES 
    (
        '$m_id',
        '$s_id',
        '$date_edu',
        '$VT_FM_ID',
        '$REQ_EDU_INSTITUTION_TYPE',
        '$REQ_EDU_INSTITUTION_NAME',
        '$REQ_EDU_SEMESTER',
        '$REQ_EDU_YEAR',
        '$ELV_ID',
        '$REQ_EDU_FACULTY',
        '$REQ_EDU_PROGRAM',
        '$REQ_EDU_GRADE',
        '$REQ_EDU_VALUE',
        '$date'

    )";

    $db->Execute($sql);

    $check_type = 1;
} else {
    if ($res_maxuse > 3000) {
        // echo 'จำนวนเงินเกิน';
        echo "<script type='text/javascript'>alert('จำนวนเงินเกิน'); window.location='index.php'</script>";
        exit;
    } else {
        $sql = "INSERT INTO  edu_value_bal VALUES ('" . $_SESSION['m_id'] . "','12000', $max_seq+1,'$REQ_EDU_VALUE',$max_bal-$REQ_EDU_VALUE,'$year_now', 'Y',  '" . $date . "', '" . $date . "')";

        $db->Execute($sql);

        $sql = "INSERT INTO req_edu 
        (
            m_id,
            s_id,
            REQ_EDU_DATE,
            VT_FM_ID,
            REQ_EDU_INSTITUTION_TYPE,
            REQ_EDU_INSTITUTION_NAME,
            REQ_EDU_SEMESTER,
            REQ_EDU_YEAR,
            ELV_ID,
            REQ_EDU_FACULTY,
            REQ_EDU_PROGRAM,
            REQ_EDU_GRADE,
            REQ_EDU_VALUE,
            create_datetime
        ) 
        VALUES 
        (
            '$m_id',
            '$s_id',
            '$date_edu',
            '$VT_FM_ID',
            '$REQ_EDU_INSTITUTION_TYPE',
            '$REQ_EDU_INSTITUTION_NAME',
            '$REQ_EDU_SEMESTER',
            '$REQ_EDU_YEAR',
            '$ELV_ID',
            '$REQ_EDU_FACULTY',
            '$REQ_EDU_PROGRAM',
            '$REQ_EDU_GRADE',
            '$REQ_EDU_VALUE',
            '$date'
    
        )";

        $db->Execute($sql);

        $check_type = 1;
    }
}

if ($check_type == 1) {
    $check = 0;

    $sql = "select max(REQ_EDU_ID) as maxid from req_edu limit 1";
    $db->Execute($sql);
    $res = $db->getData();

    $last_id = $res['maxid'];

    for ($i = 0; $i < count($_FILES['REQ_EDU_FILE']['name']); $i++) {


        $date1 = date("Ymd_His");
        $numrand = (mt_rand());
        // $c_img = (isset($_POST['REQ_EDU_FILE'][$i + 1]) ? $_POST['REQ_EDU_FILE'][$i + 1] : '');
        $upload = $_FILES['REQ_EDU_FILE']['name'][$i + 1];
        if ($upload != '') {

            $path = "../c_img/";
            $type = strrchr($_FILES['REQ_EDU_FILE']['name'][$i + 1], ".");
            $newname = $numrand . $date1 . $type;
            $path_copy = $path . $newname;
            $path_link = "../c_img/" . $newname;
            move_uploaded_file($_FILES['REQ_EDU_FILE']['tmp_name'][$i + 1], $path_copy);
        } else {
            $newname = '';
        }


        $target_dir = "../c_img/";
        $target_file = $target_dir . basename($_FILES["REQ_EDU_FILE"]["name"][$i + 1]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $sql = "INSERT INTO multi_file (m_id,req_id,type,seq,file_name, is_image,vs_id) VALUES (" . $_SESSION['m_id'] . ",$last_id,'11',$i+1,'" . $newname . "', 1,'5')";
        } else {
            $sql = "INSERT INTO multi_file (m_id,req_id,type,seq,file_name, is_image,vs_id) VALUES (" . $_SESSION['m_id'] . ",$last_id,'11',$i+1,'" . $newname . "', 0,'5')";
        }

        // echo $sql;
        // exit;

        if ($db->Execute(($sql))) {
            $check = 1;
        } else {
            $check = 0;
        }
    }



    if ($check > 0) {
        echo "success";
    } else {
        echo "fail";
    }
}
// echo $sql;

// echo $sql;
echo "<script type='text/javascript'>alert('บันทึกสำเร็จ'); window.location='index.php'</script>";
// header('Location: index.php');
exit;

$db->Execute($sql);
