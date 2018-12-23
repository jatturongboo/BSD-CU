<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
  require("../conf/config_mysqli.php");
  mysqli_set_charset($Connect,"utf8");
  (!empty($_POST['status']) ? $status = mysqli_real_escape_string($Connect, xss_cleaner($_POST['status'])) : $status = "");
  (!empty($_POST['id']) ? $id = mysqli_real_escape_string($Connect, xss_cleaner($_POST['id'])) : $id = "");

  $modified = date("Y-m-d H:i:s");
  
  $sql = "UPDATE `registers` SET `status`='".$status."',`modified`='".$modified."' WHERE `id` = '".$id."'";

    $result = mysqli_query($Connect,$sql);
    if($result){
      $_SESSION['Message'] = 'บันทึกข้อมูลเรียบร้อยแล้ว';
      $_SESSION['type']   = 'success';
      header('Location: enrollee_check.php?id='. base64_encode($id));
         exit();
    }

}else{
  header('Location: index.php');
     exit();
}


// Cross Site Script  & Code Injection Sanitization
function xss_cleaner($input_str) {
    $return_str = str_replace( array('<',';','|','&','>',"'",'"',')','('), array('&lt;','&#58;','&#124;','&#38;','&gt;','&apos;','&#x22;','&#x29;','&#x28;'), $input_str );
    $return_str = str_ireplace( '%3Cscript', '', $return_str );
    return $return_str;
}
 ?>
