<?php

include('../connect/db.php');

$db = new DB();



$m_id = $_POST["m_id"];
$s_id = $_POST["s_id"];
$REQ_HEL_C_F = $_POST["REQ_HEL_C_F"];
$REQ_HEL_RECEIPT = $_POST["REQ_HEL_RECEIPT"];
$REQ_HEL_VALUE = $_POST["REQ_HEL_VALUE"];
$REQ_HEL_DETAIL = $_POST["REQ_HEL_DETAIL"];
$REQ_HEL_FILE   = $_POST["REQ_HEL_FILE"];
$REQ_HEL_DATE  = $_POST["REQ_HEL_DATE"];
$REQ_HEL_PAY_TYPE  = $_POST["REQ_HEL_PAY_TYPE"];

// echo $REQ_HEL_PAY_TYPE;
// exit;

$VT_FM_ID  = $_POST["VT_FM_ID"];
$GOV_HOS_ID = $_POST['GOV_HOS_ID'];
$create_datetime = $_POST['create_datetime'];
$REQ_HEL_SICKNESS  = $_POST['REQ_HEL_SICKNESS'];
$check_hidden = $_POST['check_hidden'];

$date = date('d/m/Y', strtotime('+543 year'));

$sql = "INSERT INTO req_health
	(
	m_id,
	s_id,
	REQ_HEL_SICKNESS,
	REQ_HEL_PAY_TYPE,
	REQ_HEL_RECEIPT,
	REQ_HEL_VALUE,
	REQ_HEL_DETAIL,
	REQ_HEL_DATE,
	VT_FM_ID,
	GOV_HOS_ID,
	create_datetime
	)
	VALUES
	(
	'$m_id',
	'$s_id',
	'$REQ_HEL_SICKNESS',
	$REQ_HEL_PAY_TYPE,
	'$REQ_HEL_RECEIPT',
	'$REQ_HEL_VALUE',
	'$REQ_HEL_DETAIL',
	'$date ',
	'$check_hidden',
	'$GOV_HOS_ID',
	'$create_datetime'
	)";


$db->Execute($sql);

// mysqli_query($con, $sql);

$sql = "select max(REQ_HEL_ID) as maxid from req_health limit 1";
$db->Execute($sql);
$res = $db->getData();

$last_id = $res['maxid'];



$check = 0;


for ($i = 0; $i < count($_FILES['REQ_HEL_FILE']['name']); $i++) {


	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$c_img = (isset($_POST['REQ_HEL_FILE'][$i + 1]) ? $_POST['REQ_HEL_FILE'][$i + 1] : '');
	$upload = $_FILES['REQ_HEL_FILE']['name'][$i + 1];
	if ($upload != '') {

		$path = "../c_img/";
		$type = strrchr($_FILES['REQ_HEL_FILE']['name'][$i + 1], ".");
		$newname = $numrand . $date1 . $type;
		$path_copy = $path . $newname;
		$path_link = "../c_img/" . $newname;
		move_uploaded_file($_FILES['REQ_HEL_FILE']['tmp_name'][$i + 1], $path_copy);
	} else {
		$newname = '';
	}


	$target_dir = "../c_img/";
	$target_file = $target_dir . basename($_FILES["REQ_HEL_FILE"]["name"][$i + 1]);
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	if (
		$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif"
	) {
		$sql = "INSERT INTO multi_file (m_id,req_id,type,seq,file_name, is_image,vs_id) VALUES ($m_id,$last_id,'11',$i+1,'" . $newname . "', 1,'1')";
	} else {
		$sql = "INSERT INTO multi_file (m_id,req_id,type,seq,file_name, is_image,vs_id) VALUES ($m_id,$last_id,'11',$i+1,'" . $newname . "', 0,'1')";
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

mysqli_close($con);
