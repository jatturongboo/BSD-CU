<?php
header('Content-Type: text/html; charset=utf-8');

require("conf/config_mysqli.php");
mysqli_set_charset($Connect, "utf8");


//get value from input budget
function getBudget($value) {

  switch ($value) {
      case 1:
          $budgettxt = "น้อยกว่า 2,500 บาท";
          Return $budgettxt;
          break;
      case 2:
          $budgettxt = "2,501 - 5,000 บาท";
          Return $budgettxt;
          break;
      case 3:
          $budgettxt = "5,001 - 7,500 บาท";
          Return $budgettxt;
          break;
      case 4:
          $budgettxt = "7,501 - 10,000 บาท";
          Return $budgettxt;
          break;
      default:
          $budgettxt = "มากกว่า 10,000 บาท"; Return $budgettxt; }
}

//get value from input hand
function getHand($value) {

  switch ($value) {
      case 'LH':
          $text = "มือซ้าย";
          Return $text;
          break;
      case 'RH':
          $text = "มือขวา";
          Return $text;
          break;
      default:
          $text = "ทั้งสองข้าง"; Return $text; }
}

//get value from input experience
function getExperience($value) {

  switch ($value) {
      case 'N':
          $text = "ยังไม่เคยตกปลามาก่อน";
          Return $text;
          break;
      default:
          $text = "มีประสบการณ์ตกปลามาบ้างแล้ว"; Return $text; }
}

//get value from input water type
function getWaterType($value) {

  switch ($value) {
      case 'F':
          $text = "น้ำจืด";
          Return $text;
          break;
      default:
          $text = "น้ำเค็ม"; Return $text; }
}

?>
