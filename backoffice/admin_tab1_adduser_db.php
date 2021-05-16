<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>

<?php
session_start();
if ($_SESSION['PERMISSION'] == 'KORN') {

    include '../connect/db.php';
    $db = new DB();

    $level = $_SESSION['m_level'];

    if ($_POST['m_username']) {
        $m_username = $_POST['m_username'];
        $m_password = $_POST['m_password'];
        $m_fname = $_POST['m_fname'];
        $m_name = $_POST['m_name'];
        $m_lname = $_POST['m_lname'];
        $m_email = $_POST['m_email'];
        $m_level = $_POST['m_level'];
        $p_id = $_POST['p_id'];
        $m_img = $_POST['m_img'];

        $path = "../c_img/";
        $type = strrchr($_FILES['m_img']['name'], ".");
        $newname = $numrand . $date1 . $type;
        $path_copy = $path . $newname;
        $path_link = "../c_img/" . $newname;
        move_uploaded_file($_FILES['m_img']['tmp_name'], $path_copy);

        $sql = "INSERT INTO tbl_member (m_username,m_password,m_fname,m_name,m_lname,m_email,m_level, m_img,ref_p_id) VALUES('$m_username', '$m_password', '$m_fname', '$m_name', '$m_lname', '$m_email', '$m_level', '$newname','$p_id')";

        $checksql = $sql;
        $db->Execute($sql);

        echo '
        <script type="text/javascript">
  
        $(document).ready(function(){
  
          swal("เพิ่มรายการสำเร็จ", "", "success");
            
            setTimeout(function(){ window.history.back() }, 1500);
        });
        </script>
        ';

    }

}
?>
