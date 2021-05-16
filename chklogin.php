<?php
session_start();
if (isset($_POST['m_username'])) {
  include("condb.php");
  $m_username = $_POST['m_username'];
  $m_password = $_POST['m_password'];


  $sql = "SELECT * FROM tbl_member 
                  WHERE  m_username='" . $m_username . "' 
                  AND  m_password='" . $m_password . "'";

  
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
?>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>


<?php
  if (count($row['m_alive'])==0){
 
    echo '
          <script type="text/javascript">

          $(document).ready(function(){

              swal("user หรือ  password ไม่ถูกต้อง", "", "success");
              
              setTimeout(function(){window.history.back()}, 2000);
          });
          </script>
        ';
  }
  else if ($row['m_alive'] == 0) {
    echo '
    <script type="text/javascript">

    $(document).ready(function(){

      swal("ไม่สามารถลงชื่อเข้าใช้ได้ เนื่องจากบุคคลนี้เสียชีวิตแล้ว!", "", "warning");
        
        setTimeout(function(){window.history.back()}, 2000);
    });
    </script>
  ';
  }


  else if ($row['m_alive']==1) {


    echo '<pre>';
    print_r($row);
    echo '</pre>';

    //exit;

    $_SESSION["m_id"] = $row["m_id"];
    $_SESSION["m_name"] = $row["m_name"];
    $_SESSION["m_level"] = $row["m_level"];


    if ($_SESSION["m_level"] == "admin") {

      echo ' r u admin';

      Header("Location: admin_vt/");
    }
    if ($_SESSION["m_level"] == "member") {

      echo 'r u member';

      Header("Location: veteran/index.php");
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

      Header("Location: finboss_vt/");
    }
    if ($_SESSION["m_level"] == "vsofficer") {

      Header("Location: vs_officer/");
    }
    if ($_SESSION["m_level"] == "finoffice") {

      Header("Location: fin_officer/");
    }
    if ($_SESSION["m_level"] == "finmanager") {

      Header("Location: fin_manager/");
    }
    if ($_SESSION["m_level"] == "vsmanager") {

      Header("Location: vs_manager/");
    }
  } 
} else {


  //  Header("Location: index.php"); //user & password incorrect back to login again

}
