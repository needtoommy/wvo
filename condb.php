<?php
if ($_SERVER['SERVER_NAME'] == "localhost") {
    $con = mysqli_connect("localhost", "root", "", "wvo") or die("Error: " . mysqli_error($con));
} else {
    $con = mysqli_connect("27.254.174.39", "kkkornco", "FULcfk75", "kkkornco_db") or die("Error: " . mysqli_error($con));
}
mysqli_query($con, "SET NAMES 'utf8' ");
error_reporting(error_reporting() & ~E_NOTICE);
mysqli_set_charset($con, "utf8");
date_default_timezone_set('Asia/Bangkok');
//phpinfo();
