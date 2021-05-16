<?php
session_start();
if ($_SESSION['PERMISSION'] == 'KORN') {
	include '../connect/db.php';
	$level = $_SESSION['m_level'];
	$db = new DB();
  
    $VT_FM_ID= $_POST['VT_FM_ID'];
    $VT_ID= $_POST['VT_ID'];
    $VT_FM_TITLE= $_POST['VT_FM_TITLE'];
    $VT_FM_IDCARD= $_POST['VT_FM_IDCARD'];
    $VT_FM_NAME= $_POST['VT_FM_NAME'];
    $VT_FM_LNAME= $_POST['VT_FM_LNAME'];
    $VT_FM_BRITH_DATE= $_POST['VT_FM_BRITH_DATE'];
    $VT_FM_AGE= $_POST['VT_FM_AGE'];
    $VT_FM_RELATION= $_POST['VT_FM_RELATION'];
    $VT_FM_ALIVE= $_POST['VT_FM_ALIVE'];
    $VT_SEX= $_POST['VT_SEX'];
    $m_id = $_POST['m_id'];

    $sql = "UPDATE veteran_family SET VT_FM_TITLE='$VT_FM_TITLE', VT_FM_IDCARD='$VT_FM_IDCARD', VT_FM_NAME='$VT_FM_NAME', VT_FM_LNAME='$VT_FM_LNAME' , VT_FM_BRITH_DATE='$VT_FM_BRITH_DATE', VT_FM_AGE='$VT_FM_AGE' ,VT_FM_RELATION='$VT_FM_RELATION', VT_FM_ALIVE='$VT_FM_ALIVE' , VT_SEX='$VT_SEX' WHERE VT_FM_ID='$VT_FM_ID' AND VT_ID='$VT_ID' ";
    
    echo $sql;
    $db->Execute($sql);

}