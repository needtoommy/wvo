<?php

include('../connect/db.php');

$db = new DB();

$m_id = $_POST["m_id"];
$s_id = $_POST["s_id"];
$REQ_MOTHLY_DATE = $_POST["REQ_MOTHLY_DATE"];
$EXTRA_PENSION_ST = $_POST["EXTRA_PENSION_ST"];
$EXTRA_PEN_AGENT_PAY = $_POST["EXTRA_PEN_AGENT_PAY"];
$PEN_AGENT_PAY  = $_POST["PEN_AGENT_PAY"];
$EXTRA_PENSION_VALUE = $_POST['EXTRA_PENSION_VALUE'];
$NORMAL_PENSION_ST = $_POST['NORMAL_PENSION_ST'];
$NORMAL_PENSION_VALUE = $_POST['NORMAL_PENSION_VALUE'];
$REQ_MONTHLY_FILE_NAME = $_POST['REQ_MONTHLY_FILE_NAME'];
$REQ_MONTHLY_PAY_TYPE = $_POST['REQ_MONTHLY_PAY_TYPE'];

$datetime = date('d/m/Y h:i:s', strtotime('+543 year'));

$sql = "INSERT INTO req_monthly
	(
	m_id,
	s_id,
	REQ_MOTHLY_DATE,
	EXTRA_PENSION_ST,
	EXTRA_PEN_AGENT_PAY,
	PEN_AGENT_PAY,
	EXTRA_PENSION_VALUE,
    NORMAL_PENSION_ST,
    NORMAL_PENSION_VALUE,
    REQ_MONTHLY_FILE_NAME,
    REQ_MONTHLY_PAY_TYPE,
    create_datetime
	)
	VALUES
	(
	'$m_id',
	'$s_id',
	'$REQ_MOTHLY_DATE',
	'$EXTRA_PENSION_ST',
	'$EXTRA_PEN_AGENT_PAY',
	'$PEN_AGENT_PAY',
	'$EXTRA_PENSION_VALUE',
    '$NORMAL_PENSION_ST',
    '$NORMAL_PENSION_VALUE',
    'image_00001.jpg',
    '$REQ_MONTHLY_PAY_TYPE',
    '$datetime'
	)";



$db->Execute($sql);



$sql = "select max(REQ_DISA_ID) as maxid from req_disa limit 1";
$db->Execute($sql);
$res = $db->getData();
$last_id = $res['maxid'];

$check = 0;

for ($i = 0; $i < count($_FILES['REQ_MONTHLY_FILE_NAME']['name']); $i++) {


    $date1 = date("Ymd_His");
    $numrand = (mt_rand());
    $c_img = (isset($_POST['REQ_MONTHLY_FILE_NAME'][$i + 1]) ? $_POST['REQ_MONTHLY_FILE_NAME'][$i + 1] : '');
    $upload = $_FILES['REQ_MONTHLY_FILE_NAME']['name'][$i + 1];
    if ($upload != '') {

        $path = "../c_img/";
        $type = strrchr($_FILES['REQ_MONTHLY_FILE_NAME']['name'][$i + 1], ".");
        $newname = $numrand . $date1 . $type;
        $path_copy = $path . $newname;
        $path_link = "../c_img/" . $newname;
        move_uploaded_file($_FILES['REQ_MONTHLY_FILE_NAME']['tmp_name'][$i + 1], $path_copy);
    } else {
        $newname = '';
    }


    $target_dir = "../c_img/";
    $target_file = $target_dir . basename($_FILES["REQ_MONTHLY_FILE_NAME"]["name"][$i + 1]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        $sql = "INSERT INTO multi_file (m_id,req_id,type,seq,file_name, is_image,vs_id) VALUES ($m_id,$last_id,'11',$i+1,'" . $newname . "', 1,'6')";
    } else {
        $sql = "INSERT INTO multi_file (m_id,req_id,type,seq,file_name, is_image,vs_id) VALUES ($m_id,$last_id,'11',$i+1,'" . $newname . "', 0,'6')";
    }


}


if ($db->Execute($sql)) {
	echo "success";
} else {
	echo "fail";
}

mysqli_close($con);
