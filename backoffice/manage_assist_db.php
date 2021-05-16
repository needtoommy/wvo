<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>

<?php

session_start();
if ($_SESSION['PERMISSION'] == 'KORN') {
    include '../connect/db.php';

    $db = new DB();

    if ($_POST['never']) {

        for ($i = 0; $i < count($_POST['ATP_VALUE']); $i++) {
            $ATP_BG_YEAR = $_POST['ATP_BG_YEAR'];
            $ATP_NAME = $_POST['ATP_NAME'][$i + 1];
            $ATP_VALUE = $_POST['ATP_VALUE'][$i + 1];
            $vs_id = $_POST['vs_id'][$i + 1];
            $sql = "INSERT  INTO assist_policy_log (ATP_NAME,ATP_VALUE,vs_id,ATP_BG_YEAR) VALUES ('$ATP_NAME','$ATP_VALUE','$vs_id', '$ATP_BG_YEAR')";

            $db->Execute($sql);
        }
        ?>
       <script type='text/javascript'>swal('อัปเดตข้อมูลสำเร็จ', '', 'success');
       setTimeout(function(){ manage_assist.php?year=<?php echo date('Y') + 543 ?>"}, 2000);</script>";
        <?php
    } else {
        if ($_POST['ATP_BG_YEAR'] == date('Y') + 543) {
            for ($i = 0; $i < count($_POST['ATP_ID']); $i++) {
                $ATP_VALUE = $_POST['ATP_VALUE'][$i + 1];
                $ATP_ID = $_POST['ATP_ID'][$i + 1];
                $sql = "UPDATE assist_policy SET ATP_VALUE=$ATP_VALUE WHERE ATP_ID=$ATP_ID";
                $sql = "UPDATE assist_policy_log SET ATP_VALUE=$ATP_VALUE WHERE ATP_ID=$ATP_ID";
                // echo $sql;
                // exit;
                $db->Execute($sql);
            }
            echo '
                <script type="text/javascript">

                $(document).ready(function(){

                swal("อัปเดตข้อมูลสำเร็จ", "", "success");
                    
                    setTimeout(function(){window.history.back()}, 2000);
                });
                </script>
                ';
            header("Location: manage_assist.php");
        } else {
            echo '
            <script type="text/javascript">

            $(document).ready(function(){

            swal("ไม่สามารถอัปเดตข้อมูลปีย้อนหลังได้", "", "error");
                
                setTimeout(function(){window.history.back()}, 2000);
            });
            </script>
            ';
            header("Location: manage_assist.php?year=" . date('Y') + 543);
        }
    }
}
