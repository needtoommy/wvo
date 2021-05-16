<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<?php
session_start();
include('../connect/db.php');

$db = new DB();

$m_id = $_POST["m_id"];
$s_id = $_POST["s_id"];
$REQ_DISA_DATE = $_POST["REQ_DISA_DATE"];
$REQ_DISA_DATE_FROM = $_POST["REQ_DISA_DATE_FROM"];
$REQ_DISA_DATE_TO = $_POST["REQ_DISA_DATE_TO"];
$REQ_DST_ID   = $_POST["REQ_DST_ID"];
$REQ_DMT_TYPE = $_POST['REQ_DMT_TYPE'];
$REQ_DISA_DETAIL = $_POST['REQ_DISA_DETAIL'];
$REQ_DISA_PAY_TYPE = $_POST['REQ_DISA_PAY_TYPE'];
$REQ_DISA_FILE_NAME = $_POST[' REQ_DISA_FILE_NAME'];
$REQ_DISA_EMP_ID = $_POST['REQ_DISA_EMP_ID'];
$datetime = date('d/m/Y h:i:s', strtotime('+543 year'));
$year = date('Y') + 543;
$vm_id = $_POST['vm_id'];
$REQ_DISA_ID = $_POST['REQ_DISA_ID'];

$m_id_manager = $_SESSION['m_id'];
$REQ_DST_LV = $_POST['REQ_DST_LV'];

if ($_SESSION['m_level'] == "vsofficer") {
    if ($_POST['list']) {

        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        $total_price = 0;
        for ($i = 0; $i < count($_POST['list']); $i++) {
            $price = $_POST['price'][$i + 1];
            $total_price += $price;
        }

        if ($REQ_DST_LV == 1) {
            if ($total_price >= 5000) {
                echo '
                <script type="text/javascript">
      
                $(document).ready(function(){
      
                    swal("จำนวนเงินห้ามเกิน 5,000 บาท", "", "error");
      
                    setTimeout(function(){window.location="view_disa_request.php"}, 2000);
                });
                </script>
              ';
              exit;
            }
 
        }


        if ($REQ_DST_LV == 2) {
            if ($total_price >= 10000) {
                echo '
                <script type="text/javascript">
      
                $(document).ready(function(){
      
                    swal("จำนวนเงินห้ามเกิน 10,000 บาท", "", "error");
      
                    setTimeout(function(){window.location="view_disa_request.php"}, 2000);
                });
                </script>
              ';
              exit;
            }
          
        }

      
        for ($i = 0; $i < count($_POST['list']); $i++) {
            $list = $_POST['list'][$i + 1];
            $price = $_POST['price'][$i + 1];
            $date = date('d/m/y h:i:s', strtotime("+543 years"));

            $sql = "INSERT INTO disa_item_list (REQ_DISA_ID,DISA_ITEM_NAME,DISA_ITEM_PRICE) VALUES ('$REQ_DISA_ID', '$list','$price')";
            $db->Execute($sql);
        
        }

        // echo $total_price;

        $sql = "UPDATE req_disa SET s_id=2,  REQ_DST_LV='$REQ_DST_LV', REQ_DISA_VALUE_APPROVE='$total_price'
        WHERE REQ_DISA_ID='$REQ_DISA_ID'";

        $db->Execute($sql);
    } else {
        $sql = "INSERT INTO req_disa
        (
        s_id,
        REQ_DISA_DATE,
        REQ_DISA_DATE_FROM,
        REQ_DISA_DATE_TO,
        REQ_DISA_BG_YEAR,
        REQ_DST_ID,
        REQ_DMT_TYPE,
        REQ_DISA_DETAIL,
        REQ_DISA_PAY_TYPE,
        REQ_DISA_FILE_NAME,
        create_datetime,
        REQ_DISA_EMP_ID,
        vm_id
        )
        VALUES
        (
        '$s_id',
        '$REQ_DISA_DATE',
        '$REQ_DISA_DATE_FROM',
        '$REQ_DISA_DATE_TO',
        '$year',
        '$REQ_DST_ID',
        '$REQ_DMT_TYPE',
        '$REQ_DISA_DETAIL',
        '$REQ_DISA_PAY_TYPE',
        'image_00001.jpg',
        '$datetime',
        '$REQ_DISA_EMP_ID',
        '$vm_id'
        )";
    }
} else {

    // echo $sql;

    $sql = "UPDATE req_disa SET m_id='$m_id_manager', REQ_DST_LV='$REQ_DST_LV',
        REQ_DISA_EMP_ID='$REQ_DISA_EMP_ID' WHERE REQ_DISA_ID='$REQ_DISA_ID'";

    $db->Execute($sql);
    echo $sql;
}

// print_r($_POST);


$db->Execute($sql);
// echo $sql;


$sql = "select max(REQ_DISA_ID) as maxid from req_disa limit 1";
$db->Execute($sql);
$res = $db->getData();
$last_id = $res['maxid'];

$check = 0;
for ($i = 0; $i < count($_FILES['REQ_DISA_FILE_NAME']['name']); $i++) {


    $date1 = date("Ymd_His");
    $numrand = (mt_rand());
    $c_img = (isset($_POST['REQ_DISA_FILE_NAME'][$i + 1]) ? $_POST['REQ_DISA_FILE_NAME'][$i + 1] : '');
    $upload = $_FILES['REQ_DISA_FILE_NAME']['name'][$i + 1];
    if ($upload != '') {

        $path = "../c_img/";
        $type = strrchr($_FILES['REQ_DISA_FILE_NAME']['name'][$i + 1], ".");
        $newname = $numrand . $date1 . $type;
        $path_copy = $path . $newname;
        $path_link = "../c_img/" . $newname;
        move_uploaded_file($_FILES['REQ_DISA_FILE_NAME']['tmp_name'][$i + 1], $path_copy);
    } else {
        $newname = '';
    }


    $target_dir = "../c_img/";
    $target_file = $target_dir . basename($_FILES["REQ_DISA_FILE_NAME"]["name"][$i + 1]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        $sql = "INSERT INTO multi_file (m_id,req_id,type,seq,file_name, is_image,vs_id,flag_up_by) VALUES ($vm_id,$last_id,'11',$i+1,'" . $newname . "', 1,'4',1)";
    } else {
        $sql = "INSERT INTO multi_file (m_id,req_id,type,seq,file_name, is_image,vs_id,flag_up_by) VALUES ($vm_id,$last_id,'11',$i+1,'" . $newname . "', 0,'4',1)";
    }
    // echo $sql;
    $db->Execute($sql);
}


$success = 'success';
if ($_SESSION['m_level'] != "vsmanager") {
    if ($success) {

        echo '
              <script type="text/javascript">
    
              $(document).ready(function(){
    
                  swal("บันทึกรายการสำเร็จ", "", "success");
    
                  setTimeout(function(){window.location="view_disa_request.php"}, 2000);
              });
              </script>
            ';
    } else {

        echo '
              <script type="text/javascript">
    
              $(document).ready(function(){
    
                  swal("บันทึกรายการไม่สำเร็จ", "error");
    
                  setTimeout(function(){window.location="view_disa_request.php"}, 2000);
              });
              </script>
            ';
    }
} else {
    if ($success) {

        echo '
              <script type="text/javascript">
    
              $(document).ready(function(){
    
                  swal("บันทึกรายการสำเร็จ", "", "success");
    
                  setTimeout(function(){window.location="assign_em_search.php"}, 2000);
              });
              </script>
            ';
    } else {

        echo '
              <script type="text/javascript">
    
              $(document).ready(function(){
    
                  swal("บันทึกรายการไม่สำเร็จ", "error");
    
                  setTimeout(function(){window.location="assign_em_search.php"}, 2000);
              });
              </script>
            ';
    }
}



mysqli_close($con);
