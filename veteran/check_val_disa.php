<?php
include("../connect/db.php");

$db = new DB();
$money = '0';///$_POST['money'];
$id = $_POST['id'];


$sql = "SELECT * FROM health_value_bal where m_id = $id  and 	health_value_bal_bal < $money";
echo $sql;

$db->Execute($sql);
// $result = mysqli_query($con,$sql);

$res  = $db->getData();
// $res = mysqli_fetch_assoc($result);

if (empty($res)) {
  echo 'success';
} else {
  echo 'fail';
}
