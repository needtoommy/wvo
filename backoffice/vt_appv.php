<?php

session_start();
include '../connect/db.php';
$db = new DB();

$req_id = $_POST['req_id'];
$m_id = $_POST['m_id'];
$s_id = $_POST['s_id'];
$id = $_POST['id'];


if ($id == 1) {
    $sql = "UPDATE req_health SET s_id=$s_id WHERE REQ_HEL_ID=$req_id AND m_id=$m_id";
    $db->Execute($sql);
}
if ($id == 2) {
    $sql = "UPDATE req_occ SET s_id=$s_id WHERE REQ_OCC_ID=$req_id AND m_id=$m_id";
    $db->Execute($sql);
}
if ($id == 3) {
    $sql = "UPDATE req_disa SET s_id=$s_id WHERE REQ_DISA_ID=$req_id AND m_id=$m_id";
    $db->Execute($sql);
}
if ($id == 4) {
    $sql = "UPDATE req_maternity SET s_id=$s_id WHERE REQ_MAT_ID=$req_id AND m_id=$m_id";
    $db->Execute($sql);
}
if ($id == 5) {
    $sql = "UPDATE req_edu SET s_id=$s_id WHERE REQ_EDU_ID=$req_id AND m_id=$m_id";
    $db->Execute($sql);
}

echo 'success';
