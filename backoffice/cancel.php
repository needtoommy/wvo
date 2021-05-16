<?php

session_start();

include '../connect/db.php';

$db = new DB();

$id = $_POST['id'];
$s_id = $_POST['s_id'];
$type = $_POST['type'];
$reason = $_POST['reason'];
$money = $_POST['money'];
$REQ_DISA_RATE = $_POST['REQ_DISA_RATE'];
$REQ_SURVEY_DETAIL = $_POST['REQ_SURVEY_DETAIL'];
$NORMAL_PENSION_VALUE = $_POST['NORMAL_PENSION_VALUE'];
$EXTRA_PENSION_VALUE = $_POST['EXTRA_PENSION_VALUE'];
$CLIVE_VALUE = $_POST['CLIVE_VALUE'];
$m_id = $_POST['m_id'];
$now = date('d-m-Y h:i:s');
$memo = $_POST['memo'];

if (($type) == 1) {
    $header = "ค่ารักษาพยาบาล";

    if ($s_id == 7) {
        $sql = "UPDATE req_health SET s_id=$s_id , REQ_HEL_CC_REASON='$reason' WHERE REQ_HEL_ID=$id ";
        $db->Execute($sql);
    } else {
        $sql = "UPDATE req_health SET s_id=$s_id , REQ_HEL_CC_REASON='$reason', REQ_HEL_VALUE_APPROVE=$money , REQ_HEL_CHG_REASON='$memo'  WHERE REQ_HEL_ID=$id ";

        $db->Execute($sql);

        $sql = "SELECT health_value_bal_bal FROM health_value_bal  WHERE m_id=$m_id ORDER BY health_value_bal_no DESC limit 1";
        $db->Execute($sql);
        // echo $sql;
        $res = $db->getData();
        // echo $total = $res['health_value_bal_bal'] ;
        $total = $res['health_value_bal_bal'] - $money;

        //exit;
        $sql = "UPDATE health_value_bal SET health_value_bal_use=$money, health_value_bal_bal= $total  WHERE m_id=$m_id";
        $db->Execute($sql);
    }
} else if (($type) == 2) {
    $header = "เงินช่วยเหลือครั้งคราว";


    if ($s_id == 7) {
        $sql = "UPDATE req_occ SET s_id=$s_id , REQ_OCC_CC_REASON='$reason' WHERE REQ_OCC_ID=$id ";
        $db->Execute($sql);
       
    } else {
        $sql = "UPDATE req_occ SET s_id=$s_id , REQ_OCC_CC_REASON='$reason', REQ_OCC_VALUE_APPROVE=$money , REQ_OCC_CHG_REASON='$memo'  WHERE REQ_OCC_ID=$id ";
        $db->Execute($sql);

        $sql = "SELECT occ_value_bal_bal FROM occ_value_bal  WHERE m_id=$m_id ORDER BY occ_value_bal_no DESC limit 1";

        $db->Execute($sql);
        $res = $db->getData();

        $total = $res['occ_value_bal_bal'] - $money;

        $sql = "UPDATE occ_value_bal SET occ_value_bal_use=$money, occ_value_bal_bal= $total  WHERE m_id=$m_id";
        $db->Execute($sql);
    }
} else if (($type) == 3) {
    $header = "ค่าประสบภัยพิบัติ";

    $reason = $_POST['reason'];
    if (empty($reason)) {
        $sql = "UPDATE req_disa SET s_id=$s_id  WHERE REQ_DISA_ID=$id ";
        $db->Execute($sql);
  
    } else {
        $sql = "UPDATE req_disa SET s_id=$s_id, REQ_DISA_CC_REASON='$reason'  WHERE REQ_DISA_ID=$id ";
        $db->Execute($sql);
    
    }


} else if (($type) == 4) {
    $header = "ค่าคลอดบุตร";
    if ($s_id == 7) {
        $sql = "UPDATE req_maternity SET s_id=$s_id , REQ_MAT_CC_REASON='$reason' WHERE REQ_MAT_ID=$id";
        $db->Execute($sql);
    } else {
        $sql = "UPDATE req_maternity SET s_id=$s_id , REQ_MAT_CC_REASON='$reason', REQ_MAT_VALUE_APPROVE=$money  , REQ_MAT_CHG_REASON='$memo'  WHERE REQ_MAT_ID=$id";
        $db->Execute($sql);


        $sql = "SELECT mat_value_bal_bal FROM mat_value_bal  WHERE m_id=$m_id ORDER BY mat_value_bal_no DESC limit 1";
        $db->Execute($sql);
        $res = $db->getData();
        $total = $res['mat_value_bal_bal'] - $money;

        $sql = "UPDATE mat_value_bal SET mat_value_bal_use=$money, mat_value_bal_bal= $total  WHERE m_id=$m_id";
        $db->Execute($sql);
    }
} else if (($type) == 5) {
    $header = "ค่าการศึกษาบุตร";
    if ($s_id == 7) {
        $sql = "UPDATE req_edu SET s_id=$s_id , REQ_EDU_CC_REASON='$reason' WHERE REQ_EDU_ID=$id ";
        $db->Execute($sql);
    } else {
        $sql = "UPDATE req_edu SET s_id=$s_id , REQ_EDU_CC_REASON='$reason', REQ_EDU_VALUE_APPROVE=$money  , REQ_EDU_CHG_REASON='$memo' WHERE REQ_EDU_ID=$id ";
        $db->Execute($sql);

        $sql = "SELECT max(seq) as max_edu FROM edu_value_bal WHERE m_id=$m_id limit 1";
        $db->Execute($sql);
        $res = $db->getData();
        $max_edu = $res['max_edu'];


        $sql = "SELECT edu_value_bal_use,edu_value_bal_bal FROM edu_value_bal WHERE m_id=$m_id and seq=$max_edu limit 1";
        $db->Execute($sql);
        $res = $db->getData();

        $edu_value_bal_use = $res['edu_value_bal_use'];
        $edu_value_bal_bal = $res['edu_value_bal_bal'];
        $total_edu = ($edu_value_bal_use + $edu_value_bal_bal) - $money;
        $sum_bal_use = $edu_value_bal_use + $money;

        $sql = "UPDATE edu_value_bal SET edu_value_bal_use=$sum_bal_use, edu_value_bal_bal= $total_edu, upddate_datetime='$now'  WHERE m_id=$m_id and seq=$max_edu";
        $db->Execute($sql);
    }
} else if (($type) == 6) {
    $header = "เงินช่วยเหลือรายเดือน";

    if ($s_id == 7) {
        $sql = "UPDATE req_monthly SET s_id=7, REQ_MONTHLY_CC_REASON='$reason'  WHERE REQ_MOTHLY_ID=$id";
        $db->Execute($sql);
    } else {
        //ผู้ที่ไม่ได้รับบำนาญ ให้ได้รับการสงเคราะห์เดือนละ 9,000.- บาท
        if ($EXTRA_PENSION_VALUE == '0.00' && ($NORMAL_PENSION_VALUE == '0.00')) {


            if ($s_id == 3  || $s_id == 1) {
                $sql = "SELECT ATP_VALUE from assist_policy WHERE ATP_ID=5";
                $db->Execute($sql);
                $res = $db->getData();
                $ATP_VALUE_5 =  $res['ATP_VALUE'];

                $sql = "INSERT INTO monthly_approve_list (REQ_MONTHLY_ID,s_id,m_id,MAL_VALUE,create_datetime,status) VALUES ($id, 5,$m_id, $ATP_VALUE_5, '$now', '1')";
                $db->Execute($sql);
            }


            $sql = "UPDATE req_monthly SET s_id=3,MONTHLY_VALUE_APPROVE=$ATP_VALUE_5, REQ_MONTHLY_CC_REASON='$reason'  WHERE m_id=$m_id and REQ_MOTHLY_ID=$id";
            $db->Execute($sql);
        }

        //ผู้ที่ได้รับบำนาญพิเศษ ให้ได้รับการสงเคราะห์เดือนละ 6,500.- บาท
        if (($EXTRA_PENSION_VALUE > 0) && ($NORMAL_PENSION_VALUE == '0.00')) {

            if ($s_id == 3 || $s_id == 1) {
                $sql = "SELECT ATP_VALUE from assist_policy WHERE ATP_ID=4";
                $db->Execute($sql);
                $res = $db->getData();
                $ATP_VALUE_4 =  $res['ATP_VALUE'];

                $sql = "INSERT INTO monthly_approve_list (REQ_MONTHLY_ID,s_id,m_id,MAL_VALUE,create_datetime,status) VALUES ($id, '5',$m_id, $ATP_VALUE_4, '$now', '1')";
                $db->Execute($sql);
            }
            $sql = "UPDATE req_monthly SET s_id=3,MONTHLY_VALUE_APPROVE=$ATP_VALUE_4, REQ_MONTHLY_CC_REASON='$reason'  WHERE m_id=$m_id and REQ_MOTHLY_ID=$id";

            $db->Execute($sql);
        }


        //ผู้ที่ไม่ได้รับบำนาญพิเศษ แต่ได้รับบำนาญปกติ และเงินช่วยค่าครองชีพผู้รับเบี้ยหวัดบำนาญรวมกันไม่ถึงเดือนละ 9,000.- บาท ให้ได้รับการสงเคราะห์จนครบ 9,๐๐๐.- บาท

        if (($EXTRA_PENSION_VALUE == '0.00') && ($NORMAL_PENSION_VALUE > 0)) {
            if ($s_id == 3 || $s_id == 1) {
                $sql = "SELECT ATP_VALUE from assist_policy WHERE ATP_ID=6";
                $db->Execute($sql);
                $res = $db->getData();
                $ATP_VALUE_6 =  $res['ATP_VALUE'];

                if ($NORMAL_PENSION_VALUE <= 9000) {
                    $total =  $ATP_VALUE_6 - ($NORMAL_PENSION_VALUE + $CLIVE_VALUE);
                    $sql = "UPDATE req_monthly SET s_id=3,MONTHLY_VALUE_APPROVE= $total, REQ_MONTHLY_CC_REASON='$reason'  WHERE m_id=$m_id and REQ_MOTHLY_ID=$id";
                    $db->Execute($sql);

                    $sql = "INSERT INTO monthly_approve_list (REQ_MONTHLY_ID,s_id,m_id,MAL_VALUE,create_datetime,status) VALUES ($id, '5',$m_id, $total, '$now', '1')";
                    $db->Execute($sql);
                } else {
                    $sql = "UPDATE req_monthly SET s_id=3,MONTHLY_VALUE_APPROVE=$NORMAL_PENSION_VALUE, REQ_MONTHLY_CC_REASON='$reason'  WHERE m_id=$m_id and REQ_MOTHLY_ID=$id";
                    $db->Execute($sql);

                    $sql = "INSERT INTO monthly_approve_list (REQ_MONTHLY_ID,s_id,m_id,MAL_VALUE,create_datetime,status) VALUES ($id, '5',$m_id, $NORMAL_PENSION_VALUE, '$now', '1')";
                    $db->Execute($sql);
                }
            } else {
                $sql = "UPDATE req_monthly SET s_id=3, MONTHLY_VALUE_APPROVE=$NORMAL_PENSION_VALUE, REQ_MONTHLY_CC_REASON='$reason'  WHERE m_id=$m_id and REQ_MOTHLY_ID=$id";
                $db->Execute($sql);
            }
        }
    }
}


if ($s_id == 3) {
    $approve = "อนุมัติ";
    $header_approve = "อนุมัติจ่ายเงิน";
} else if ($s_id == 5) {
    $approve = "อนุมัติเบิกจ่าย";
    $header_approve = "อนุมัติเบิกจ่าย";
} else {
    $approve = "ไม่อนุมัติ";
    $header_approve = "ไม่อนุมัติจ่ายเงิน";
}
/**
 * This example shows making an SMTP connection with authentication.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Asia/Bangkok');

require '../PHPMailer/PHPMailerAutoload.php';

$sql = "SELECT * FROM tbl_member WHERE m_id = '$m_id' LIMIT 1";
$db->Execute($sql);
$res = $db->getData();


//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->CharSet = "utf-8";

$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "smtp.gmail.com";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "chocolllb@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "###66999966";
//Set who the message is to be sent from
$mail->setFrom('siraphop.yo@gmail.com', 'No-Reply@wvo');
//Set who the message is to be sent to
$mail->addAddress($res['m_email'], 'itoffside');
//Set the subject line
$mail->Subject = 'การอนุมัติจ่ายเงิน ' . $header;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('content.html'), dirname(__FILE__));
$prefix = $res['m_fname'];
$name = $res['m_name'];
$surname = $res['m_lname'];
$mail->msgHTML("คำร้องของคุณได้รับการ " . $approve . " การจ่ายเงินให้\n " . $prefix . " " . $surname . " " . $surname);

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "success";
}

// echo 'success';
