<?php

include('../connect/db.php');

$db = new DB();

$m_id = $_POST["m_id"];
$s_id = $_POST["s_id"];
$REQ_DISA_DATE = $_POST["REQ_DISA_DATE"];
$REQ_DISA_DATE_FROM = $_POST["REQ_DISA_DATE_FROM"];
$REQ_DISA_DATE_TO = $_POST["REQ_DISA_DATE_TO"];
$REQ_DST_ID   = $_POST["REQ_DST_ID"];
$REQ_DMT_TYPE = $_POST['REQ_DMT_TYPE'];
$REQ_DISA_DETAIL = $_POST['REQ_DISA_DETAIL'];
$REQ_DISA_PAY_TYPE = $_POST['REQ_DISA_PAY_TYPE'];
$REQ_DISA_FILE_NAME = $_POST[' REQ_DISA_FILE_NAME'];
$datetime = date('d/m/Y h:i:s', strtotime('+543 year'));

$sql = "INSERT INTO req_disa
	(
	m_id,
	s_id,
	REQ_DISA_DATE,
	REQ_DISA_DATE_FROM,
	REQ_DISA_DATE_TO,
	REQ_DST_ID,
	REQ_DMT_TYPE,
    REQ_DISA_DETAIL,
    REQ_DISA_PAY_TYPE,
    REQ_DISA_FILE_NAME,
    create_datetime
	)
	VALUES
	(
	'$m_id',
	'$s_id',
	'$REQ_DISA_DATE',
	'$REQ_DISA_DATE_FROM',
	'$REQ_DISA_DATE_TO',
	'$REQ_DST_ID',
	'$REQ_DMT_TYPE',
    '$REQ_DISA_DETAIL',
    '$REQ_DISA_PAY_TYPE',
    'image_00001.jpg',
    '$datetime'
	)";



$db->Execute($sql);



$sql = "select max(REQ_DISA_ID) as maxid from req_disa limit 1";
$db->Execute($sql);
$res = $db->getData();
$last_id = $res['maxid'];

$check = 0;

for ($i = 0; $i < count($_FILES['REQ_DISA_FILE_NAME']['name']); $i++) {


    $date1 = date("Ymd_His");
    $numrand = (mt_rand());
    $c_img = (isset($_POST['REQ_DISA_FILE_NAME'][$i + 1]) ? $_POST['REQ_DISA_FILE_NAME'][$i + 1] : '');
    $upload = $_FILES['REQ_DISA_FILE_NAME']['name'][$i + 1];
    if ($upload != '') {

        $path = "../c_img/";
        $type = strrchr($_FILES['REQ_DISA_FILE_NAME']['name'][$i + 1], ".");
        $newname = $numrand . $date1 . $type;
        $path_copy = $path . $newname;
        $path_link = "../c_img/" . $newname;
        move_uploaded_file($_FILES['REQ_DISA_FILE_NAME']['tmp_name'][$i + 1], $path_copy);
    } else {
        $newname = '';
    }


    $target_dir = "../c_img/";
    $target_file = $target_dir . basename($_FILES["REQ_DISA_FILE_NAME"]["name"][$i + 1]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        $sql = "INSERT INTO multi_file (m_id,req_id,type,seq,file_name, is_image,vs_id) VALUES ($m_id,$last_id,'11',$i+1,'" . $newname . "', 1,'4')";
    } else {
        $sql = "INSERT INTO multi_file (m_id,req_id,type,seq,file_name, is_image,vs_id) VALUES ($m_id,$last_id,'11',$i+1,'" . $newname . "', 0,'4')";
    }


}


if ($db->Execute($sql)) {
	echo "success";
} else {
	echo "fail";
}

mysqli_close($con);
