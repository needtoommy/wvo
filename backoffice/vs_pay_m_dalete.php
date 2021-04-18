<?php
    session_start();
    include '../connect/db.php';
    $db = new DB();
    $id = $_GET['id'];

    $sql = "UPDATE monthly_approve_list SET status = '3' WHERE REQ_MONTHLY_ID='$id'";
    $db->Execute($sql);

    echo '<script>alert("ระงับสิทธิสำเร็จ!!"); window.location="vs_pay_m.php"</script>';

?>