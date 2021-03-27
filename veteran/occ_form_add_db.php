<?php

include('../connect/db.php');

$db = new DB();



$m_id = $_POST["m_id"];
$s_id = $_POST["s_id"];
$REQ_OCC_DATE = $_POST["REQ_OCC_DATE"];
$REQ_OCC_VALUE = $_POST["REQ_OCC_VALUE"];
$REQ_OCC_REASON = $_POST["REQ_OCC_REASON"];
$REQ_OCC_REMARK   = $_POST["REQ_OCC_REMARK"];
$REQ_OCC_TIMESTAMP = $_POST['REQ_OCC_TIMESTAMP'];
$REQ_OCC_PAY_TYPE = $_POST['REQ_OCC_PAY_TYPE'];

$sql = "INSERT INTO req_occ
	(
	m_id,
	s_id,
	REQ_OCC_DATE,
	REQ_OCC_VALUE,
	REQ_OCC_REASON,
	REQ_OCC_REMARK,
	REQ_OCC_PAY_TYPE,
	REQ_OCC_TIMESTAMP
	)
	VALUES
	(
    
	'$m_id',
	'$s_id',
	'$REQ_OCC_DATE',
	'$REQ_OCC_VALUE',
	'$REQ_OCC_REASON',
	'$REQ_OCC_REMARK',
	'$REQ_OCC_PAY_TYPE',
	'$REQ_OCC_TIMESTAMP'
	)";


// echo $sql;
// exit;

/// mysqli_query($con, $sql);




// $check = 0;
/*

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
**/




if ($db->Execute($sql)) {
	echo "success";
} else {
	echo "fail";
}

mysqli_close($con);
