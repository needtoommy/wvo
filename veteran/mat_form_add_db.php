<?php

include('../connect/db.php');

$db = new DB();

$m_id = $_POST["m_id"];
$s_id = $_POST["s_id"];
$REQ_MAT_DATE = $_POST["REQ_MAT_DATE"];
$MAT_BIRTH_DATE = $_POST["MAT_BIRTH_DATE"];
$REQ_MAT_PAY_TYPE = $_POST['REQ_MAT_PAY_TYPE'];
$REQ_MAT_BRITH_FILE = $_POST['REQ_MAT_BRITH_FILE'];
$datetime = date('d/m/Y h:i:s', strtotime('+543 year'));

$sql = "INSERT INTO req_maternity
	(
	m_id,
	s_id,
	REQ_MAT_DATE,
    MAT_BIRTH_DATE,
    REQ_MAT_PAY_TYPE,
    REQ_MAT_BRITH_FILE,
    create_datetime
	)
	VALUES
	(
	'$m_id',
	'$s_id',
	'$REQ_MAT_DATE',
    '$MAT_BIRTH_DATE',
    '$REQ_MAT_PAY_TYPE',
    'image_00001.jpg',
    '$datetime'
	)";

// echo $sql;
// exit;

$db->Execute($sql);

// print_r(count($_FILES['REQ_MAT_BRITH_FILE']['name']));
$check = 0;

for ($i = 0; $i < count($_FILES['REQ_MAT_BRITH_FILE']['name']); $i++) {

   
    $sql = "select max(REQ_MAT_ID) as maxid from req_maternity limit 1";
    $db->Execute($sql);
    $res = $db->getData();
    $last_id = $res['maxid'];

   


    $date1 = date("Ymd_His");
    $numrand = (mt_rand());
    $c_img = (isset($_POST['REQ_MAT_BRITH_FILE'][$i + 1]) ? $_POST['REQ_MAT_BRITH_FILE'][$i + 1] : '');
    $upload = $_FILES['REQ_MAT_BRITH_FILE']['name'][$i + 1];
    if ($upload != '') {

        $path = "../c_img/";
        $type = strrchr($_FILES['REQ_MAT_BRITH_FILE']['name'][$i + 1], ".");
        $newname = $numrand . $date1 . $type;
        $path_copy = $path . $newname;
        $path_link = "../c_img/" . $newname;
        move_uploaded_file($_FILES['REQ_MAT_BRITH_FILE']['tmp_name'][$i + 1], $path_copy);
    } else {
        $newname = '';
    }


    $target_dir = "../c_img/";
    $target_file = $target_dir . basename($_FILES["REQ_MAT_BRITH_FILE"]["name"][$i + 1]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        $sql = "INSERT INTO multi_file (m_id,req_id,type,seq,file_name, is_image,vs_id) VALUES ($m_id,$last_id,'11',$i+1,'" . $newname . "', 1,'3')";
    } else {
        $sql = "INSERT INTO multi_file (m_id,req_id,type,seq,file_name, is_image,vs_id) VALUES ($m_id,$last_id,'11',$i+1,'" . $newname . "', 0,'3')";
       
    }

    $db->Execute($sql);
    $check = 1;



    
    
}


if ($check == 1) {
    echo "success";
} else {
    echo "fail";
}

mysqli_close($con);
