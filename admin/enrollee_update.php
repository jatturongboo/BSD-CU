<?php

header('Content-Type: text/html; charset=utf-8');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require("../conf/config_mysqli.php");
    mysqli_set_charset($Connect, "utf8");
    (!empty($_POST['id']) ? $id = mysqli_real_escape_string($Connect, xss_cleaner($_POST['id'])) : $id = "");
    (!empty($_POST['membertype']) ? $membertype = mysqli_real_escape_string($Connect, xss_cleaner($_POST['membertype'])) : $membertype = "");
    (!empty($_POST['memberid']) ? $memberid = mysqli_real_escape_string($Connect, xss_cleaner($_POST['memberid'])) : $memberid = "");
    (!empty($_POST['prefix']) ? $prefix = mysqli_real_escape_string($Connect, xss_cleaner($_POST['prefix'])) : $prefix = "");
    (!empty($_POST['firstname']) ? $firstname = mysqli_real_escape_string($Connect, xss_cleaner($_POST['firstname'])) : $firstname = "");
    (!empty($_POST['lastname']) ? $lastname = mysqli_real_escape_string($Connect, xss_cleaner($_POST['lastname'])) : $lastname = "");
    (!empty($_POST['certificate_id']) ? $certificate_id = mysqli_real_escape_string($Connect, xss_cleaner($_POST['certificate_id'])) : $certificate_id = "");
    (!empty($_POST['line_id']) ? $line_id = mysqli_real_escape_string($Connect, xss_cleaner($_POST['line_id'])) : $line_id = "");
    (!empty($_POST['workplace']) ? $workplace = mysqli_real_escape_string($Connect, xss_cleaner($_POST['workplace'])) : $workplace = "");
    (!empty($_POST['province']) ? $province = mysqli_real_escape_string($Connect, xss_cleaner($_POST['province'])) : $province = "");
    (!empty($_POST['phone']) ? $phone = mysqli_real_escape_string($Connect, xss_cleaner($_POST['phone'])) : $phone = "");
    (!empty($_POST['food']) ? $food = mysqli_real_escape_string($Connect, xss_cleaner($_POST['food'])) : $food = "");
    (!empty($_POST['invoice']) ? $invoice = mysqli_real_escape_string($Connect, xss_cleaner($_POST['invoice'])) : $invoice = "");
    (!empty($_POST['invoiceaddress']) ? $invoiceaddress = mysqli_real_escape_string($Connect, xss_cleaner($_POST['invoiceaddress'])) : $invoiceaddress = "");

    $modified = date("Y-m-d H:i:s");


    $strSQL = "UPDATE `registers` SET `member_type`='" . $membertype . "',`member_id`='" . $memberid . "',`prefix`='" . $prefix . "',`firstname`='" . $firstname . "',`lastname`='" . $lastname . "',`certificate_id`='" . $certificate_id . "',`line_id`='" . $line_id . "',`workplace`='" . $workplace . "',`province`='" . $province . "',`phone`='" . $phone . "',`food`='" . $food . "',`receipt_by`='" . $invoice . "',`invoice_address`='" . $invoiceaddress . "',`modified`='" . $modified . "' WHERE id = '" . $id . "'";
    $result = mysqli_query($Connect, $strSQL);
    if ($result) {
        $_SESSION['Message'] = 'บันทึกข้อมูลลงทะเบียนเรียบร้อยแล้ว';
        $_SESSION['type'] = 'success';
        header('Location: enrollee_check.php?id=' . base64_encode($id));
        exit();
    }else{
        $_SESSION['Message'] = 'ไม่สามารถบันทึกข้อมูลได้!';
        $_SESSION['type'] = 'error';
        header('Location: enrollee_check.php?id=' . base64_encode($id));
        exit();
    }
} else {
    header('Location: enrollee.php');
    exit();
}


// Cross Site Script  & Code Injection Sanitization
function xss_cleaner($input_str) {
    $return_str = str_replace(array('<', ';', '|', '&', '>', "'", '"', ')', '('), array('&lt;', '&#58;', '&#124;', '&#38;', '&gt;', '&apos;', '&#x22;', '&#x29;', '&#x28;'), $input_str);
    $return_str = str_ireplace('%3Cscript', '', $return_str);
    return $return_str;
}

?>
