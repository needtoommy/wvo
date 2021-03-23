<?php
session_start();
include "../connect/db.php";

$db = new DB();
if (isset($_POST['m_username'])) {

  $m_username = $_POST['m_username'];
  $m_password = $_POST['m_password'];


  $sql = "SELECT * FROM tbl_member 
                  WHERE  m_username='" . $m_username . "' 
                  AND  m_password='" . $m_password . "' ";
  echo $sql;
  $db->Execute($sql);

  $row =  $db->getData();


  if (count($row) > 1) {

    $_SESSION["m_id"] = $row["m_id"];
    $_SESSION["m_name"] = $row["m_name"];
    $_SESSION["m_level"] = $row["m_level"];


    if ($_SESSION["m_level"] == "admin") {

      echo ' r u admin';

      Header("Location: admin_vt/");
    }
    if ($_SESSION["m_level"] == "member") {

      echo 'r u member';

      Header("Location: veteran/");
    }
    if ($_SESSION["m_level"] == "technician") {

      Header("Location: technician/");
    }

    if ($_SESSION["m_level"] == "manager") {

      Header("Location: manager/");
    }
    if ($_SESSION["m_level"] == "adminvt") {

      Header("Location: admin_vt/index.php");
    }

    if ($_SESSION["m_level"] == "finbossvt") {

      Header("Location: index.php");
    }
    if ($_SESSION["m_level"] == "vsofficer") {

      Header("Location: index.php");
    }
    if ($_SESSION["m_level"] == "finoffice") {

      Header("Location: index.php");
    }
    if ($_SESSION["m_level"] == "finmanager") {

      Header("Location: fin_index.php");
    }
    if ($_SESSION["m_level"] == "vsmanager") {

      Header("Location: index.php");
    }
  } else {
    echo "<script>";
    echo "alert(\" user หรือ  password ไม่ถูกต้อง\");";
    echo "window.history.back()";
    echo "</script>";
  }
} else {


  //  Header("Location: index.php"); //user & password incorrect back to login again

}
