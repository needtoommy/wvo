<?php


session_start();

include '../connect/db.php';
$db = new DB();




$m_id = $_POST['m_id'];


$create_datetime = date('d/m/Y h:i:s', strtotime('+543 years'));
$VT_TITLE = $_POST['VT_TITLE'];
$VT_FNAME = $_POST['VT_FNAME'];
$VT_LNAME = $_POST['VT_LNAME'];
$VT_AGE = $_POST['VT_AGE'];
$REQ_DEATH_DATE = $_POST['REQ_DEATH_DATE'];
$REQ_DEATH_TYPE = $_POST['REQ_DEATH_TYPE'];
$REQ_DEATH_CAUSE = $_POST['REQ_DEATH_CAUSE'];
$REQ_DEATH_EVIDENCE = $_POST['REQ_DEATH_EVIDENCE'];
$REQ_DEATH_UDERTAKER = $_POST['REQ_DEATH_UDERTAKER'];
$REQ_DEATH_REL = $_POST['REQ_DEATH_REL'];
$REQ_DEATH_PLACE = $_POST['REQ_DEATH_PLACE'];
$REQ_DEATH_MERIT_PLACE = $_POST['REQ_DEATH_MERIT_PLACE'];
$REQ_DEATH_PROVINCE = $_POST['REQ_DEATH_PROVINCE'];


$sql = "INSERT INTO req_death (
    m_id,
    REQ_D_DATE,
    REQ_DEATH_DATE,
    REQ_DEATH_AGE,
    REQ_DEATH_TYPE,
    REQ_DEATH_CAUSE,
    REQ_DEATH_EVIDENCE,
    REQ_DEATH_UDERTAKER,
    REQ_DEATH_REL,
    REQ_DEATH_PLACE,
    REQ_DEATH_MERIT_PLACE,
    REQ_DEATH_PROVINCE,
    REQ_DEATH_APPROVE_VALUE,
    REQ_DEATH_FILE,
    REQ_DEATH_VALUE_APPROVE,
    create_datetime
  ) VALUES(
    '$m_id',
    '$REQ_D_DATE',
    '$REQ_DEATH_DATE',
    '$REQ_DEATH_AGE',
    '$REQ_DEATH_TYPE',
    '$REQ_DEATH_CAUSE',
    '$REQ_DEATH_EVIDENCE',
    '$REQ_DEATH_UDERTAKER',
    '$REQ_DEATH_REL',
    '$REQ_DEATH_PLACE',
    '$REQ_DEATH_MERIT_PLACE',
    '$REQ_DEATH_PROVINCE',
    '$REQ_DEATH_APPROVE_VALUE',
    '111',
    '15000',
    '$create_datetime'
    )";

    // echo $sql;
$db->Execute($sql);


$sql = "UPDATE veteran  SET VT_ALIVE='0' WHERE m_id = '$m_id' ";
$db->Execute($sql);

$sql = "UPDATE tbl_member SET m_alive='0' WHERE m_id = '$m_id' ";
$db->Execute($sql);


$sql = "UPDATE monthly_approve_list SET status='0' WHERE m_id = '$m_id' ";
$db->Execute($sql);
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
$sql = "select max(REQ_DEATH_ID) as maxid from req_death limit 1";
$db->Execute($sql);
$res = $db->getData();
$last_id = $res['maxid'];

for ($i = 1; $i <= count($_FILES['REQ_DEATH_FILE']['name']); $i++) {

    if ($_FILES['REQ_DEATH_FILE']['name'][$i] !== '') {

        $date1 = date("Ymd_His");
        $numrand = (mt_rand());
        $c_img = (isset($_POST['REQ_DEATH_FILE'][$i]) ? $_POST['REQ_DEATH_FILE'][$i] : '');
        $upload = $_FILES['REQ_DEATH_FILE']['name'][$i];
        if ($upload != '') {

            $path = "../c_img/";
            $type = strrchr($_FILES['REQ_DEATH_FILE']['name'][$i], ".");
            $newname = $numrand . $date1 . $type;
            $path_copy = $path . $newname;
            $path_link = "../c_img/" . $newname;
            move_uploaded_file($_FILES['REQ_DEATH_FILE']['tmp_name'][$i], $path_copy);
        } else {
            $newname = '';
        }


        $target_dir = "../c_img/";
        $target_file = $target_dir . basename($_FILES["REQ_DEATH_FILE"]["name"][$i]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $sql = "INSERT INTO multi_file (m_id,req_id,type,seq,file_name, is_image,vs_id) VALUES ($m_id,$last_id,'11',$i+1,'" . $newname . "', 1,'7')";
            $db->Execute($sql);
        } else {
            $sql = "INSERT INTO multi_file (m_id,req_id,type,seq,file_name, is_image,vs_id) VALUES ($m_id,$last_id,'11',$i+1,'" . $newname . "', 0,'7')";
            $db->Execute($sql);
        }
    }
}


echo "<script type='text/javascript'>alert('บันทึกรายการสำเร็จ'); window.location = 'death_list.php'</script>";
// header('Location: death_list.php');