<?php

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



//Get Value From recommend.php

$budgetvalue = $_SESSION["post-data"]["budget"];
$budgettxt = getBudget($budgetvalue);
$handvalue =$_SESSION["post-data"]["choosehand"];
$handtxt = getHand($handvalue);
$expvalue =$_SESSION["post-data"]["exp"];
$exptxt = getExperience($expvalue);

$waterf_txt = "";
$watertype_f = "";

if (!empty($_SESSION["post-data"]["watertype_f"])) {
  $watertype_f =  $_SESSION["post-data"]["watertype_f"];
  $waterf_txt = "น้ำจืด";
}

$waters_txt = "";
$watertype_s = "";
if (!empty($_SESSION["post-data"]["watertype_s"])) {
  $watertype_s =  $_SESSION["post-data"]["watertype_s"];
  $waters_txt = "น้ำเค็ม";
}
?>

				<table class="table table-bordered">
						<thead>
							<tr>
								<TH width="5%" SCOPE="COL"/>
								<TH width="20%" SCOPE="COL">INPUT</TH>
								<TH width="15%" SCOPE="COL">VALUE</TH>
								<TH width="15%" SCOPE="COL">DESC</TH>
								<TH width="15%" SCOPE="COL">OUTPUT</TH>
								<TH width="15%" SCOPE="COL">VALUE</TH>
							</tr>
						</thead>
						<tbody>
							<tr bgcolor="#f7f7f7">
								<th scope="row">1</th>
								<td>งบประมาณ</td>
								<td><?=$budgetvalue;?></td>
								<td><?=$budgettxt;?></td>
								<td/>
								<td/>
							</tr>
							<tr>
								<th scope="row">2</th>
								<td>มือข้างที่ถนัด</td>
								<td><?=$handvalue;?></td>
								<td><?=$handtxt;?></td>
								<td/>
								<td/>
							</tr>
							<tr bgcolor="#f7f7f7">
								<th scope="row">3</th>
								<td>ระดับประสบการณ์</td>
								<td><?=$expvalue;?></td>
								<td><?=$exptxt;?></td>
								<td/>
								<td/>
							</tr>
							<tr>
								<th scope="row">4</th>
								<td>ประเภทของแหล่งน้ำจืด</td>
								<td><?=$watertype_f;?></td>
								<td><?=$waterf_txt;?></td>
								<td><?=(!empty($watertype_f))?"สายเบ็ดจะต้องมีความยาวบรรจุอยู่ในหลอดเก็บไม่น้อยกว่า 100 เมตร":"";?> </td>
								<td/>
							</tr>
							<tr bgcolor="#f7f7f7">
								<th scope="row">5</th>
								<td>ประเภทของแหล่งน้ำเค็ม</td>
								<td><?=$watertype_s;?></td>
								<td><?=$waters_txt;?></td>
								<td><?=(!empty($watertype_s))?"สายเบ็ดจะต้องมีความยาวบรรจุอยู่ในหลอดเก็บไม่น้อยกว่า 200 เมตร":"";?> </td>
								<td/>
							</tr>
						</tbody>
					</table>