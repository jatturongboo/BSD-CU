<?php

header('Content-Type: text/html; charset=utf-8');

require("../conf/config_mysqli.php");
mysqli_set_charset($Connect, "utf8");

$menu = 'registerAll';
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Infusion Nurse Network of Thailand</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />


        <!-- Bootstrap core CSS     -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="assets/css/animate.min.css" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

        <!-- Animation library for notifications   -->
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet"/>


        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="assets/css/adminstyle.css" rel="stylesheet" />


        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    </head>
    <body>

        <div class="wrapper">
            <?php include('element/sidebar.php'); ?>

            <div class="main-panel">
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">ตรวจสอบหลักฐานการชำระเงิน</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-left">
                            </ul>

                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="logout.php">
                                        <p>Log out</p>
                                    </a>
                                </li>
                                <li class="separator hidden-lg hidden-md"></li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">ข้อมูลผู้ลงทะเบียน</h4>
                                    </div>
                                    <?php
                                    $sql = "SELECT `id`, `member_type`, `member_id`, `prefix`, `firstname`, `lastname`, `certificate_id`, `line_id`, `workplace`, `province`, `phone`, `food`, `receipt_by`, `invoice_address`,
									`image`, `status` ,CASE status 
									WHEN '1' THEN 'ลงทะเบียนแล้ว' 
									WHEN '2' THEN 'อัพหลักฐานชำระเงินแล้ว' 
									WHEN '3' THEN 'ยืนยันการชำระเงินแล้ว' 
									END AS status_text 
									FROM `registers` where id = '" . mysqli_real_escape_string($Connect, base64_decode($_GET['id'])) . "'";

                                    $result = $Connect->query($sql);
                                    $status = '';
                                    $id = '';
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        $row = $result->fetch_assoc();
                                        echo "<div class='col-lg-12 col-md-12'>สถานะ  : " . $row["status_text"] . "</div>";
                                        $status = $row["status"];
                                        $id = $row["id"];
                                    } else {
                                        echo "0 results";
                                    }
                                    ?>
                                    <div class="content">
                                        <form name="register" method="post" action="enrollee_update.php" id="register" class="comment-form">
                                            <div class="row">
                                                <div class="col col-lg-6 col-md-6  col-sm-12 col-xs-12">
                                                    <input type="text" value="<?= $row["id"] ?>" name="id" hidden>
                                                    <label class="radio-inline">
                                                        <input type="radio" value="สมาชิกชมรมฯ" name="membertype" <?= (($row["member_type"] == 'สมาชิกชมรมฯ') ? 'checked' : '') ?> disabled>
                                                        สมาชิกชมรมฯ </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" value="บุคคลทั่วไป" name="membertype" <?= (($row["member_type"] == 'บุคคลทั่วไป') ? 'checked' : '') ?> disabled>
                                                        บุคคลทั่วไป </label>
                                                </div>
                                                <!-- .col -->
                                            </div>
                                            <!-- .row -->
                                            <div class="row">
                                                <div class="col col-lg-12">
                                                    <input type="text" name="memberid" class="form-control" value="<?= $row["member_id"] ?>"  autocomplete="off" maxlength="12" id="memberid" placeholder="เลขที่สมาชิก" disabled>
                                                </div>
                                                <!-- .col -->
                                            </div>
                                            <!-- .row -->
                                            <div class="row">
                                                <div class="col col-lg-2 col-md-12  col-sm-12 col-xs-12">
                                                    <select name="prefix" class="form-control"  placeholder="คำนำหน้า" required disabled>
                                                        <option value="">คำนำหน้า</option>
                                                        <option value="นาย" <?= (($row["prefix"] == 'นาย') ? 'selected' : '') ?>>นาย</option>
                                                        <option value="นาง" <?= (($row["prefix"] == 'นาง') ? 'selected' : '') ?>>นาง</option>
                                                        <option value="นางสาว" <?= (($row["prefix"] == 'นางสาว') ? 'selected' : '') ?>>นางสาว</option>
                                                    </select>
                                                </div>
                                                <!-- .col -->
                                                <div class="col col-lg-5 col-md-6  col-sm-12 col-xs-12">
                                                    <input type="text" name="firstname" class="form-control"  value="<?= $row["firstname"] ?>" autocomplete="off" placeholder="ชื่อ" required disabled>
                                                </div>
                                                <!-- .col -->
                                                <div class="col col-lg-5 col-md-6  col-sm-12 col-xs-12">
                                                    <input type="text" name="lastname" class="form-control"  value="<?= $row["lastname"] ?>" autocomplete="off" placeholder="นามสกุล" required disabled>
                                                </div>
                                                <!-- .col -->
                                            </div>
                                            <!-- .row -->
                                            <div class="row">
                                                <div class="col col-lg-6 col-md-6  col-sm-12 col-xs-12">
                                                    <input type="text"  maxlength="12" class="form-control" value="<?= $row["certificate_id"] ?>" autocomplete="off" name="certificate_id" placeholder="เลขใบประกอบวิชาชีพ" disabled>
                                                </div>
                                                <!-- .col -->
                                                <div class="col col-lg-6 col-md-6  col-sm-12 col-xs-12">
                                                    <input type="text" name="line_id" class="form-control" value="<?= $row["line_id"] ?>" autocomplete="off" placeholder="ID Line :เพื่อตรวจสอบความถูกต้องกรุณาระบุ ID Line ของผู้สมัคร" disabled>
                                                </div>
                                                <!-- .col -->
                                            </div>
                                            <div class="row">
                                                <div class="col col-lg-8 col-md-6  col-sm-12 col-xs-12">
                                                    <input type="text" name="workplace" class="form-control" value="<?= $row["workplace"] ?>" autocomplete="off" placeholder="สถานที่ทำงาน" disabled>
                                                </div>
                                                <!-- .col -->
                                                <div class="col col-lg-4 col-md-6  col-sm-12 col-xs-12 autocomplete">
                                                    <input type="text" id="province" name="province" class="form-control" value="<?= $row["province"] ?>" autocomplete="off" placeholder="จังหวัด" required disabled>
                                                </div>
                                                <!-- .col -->
                                            </div>
                                            <!-- .row -->
                                            <div class="row">
                                                <div class="col col-lg-6 col-md-6  col-sm-12 col-xs-12">
                                                    <input type="text" name="phone" class="form-control" value="<?= $row["phone"] ?>" autocomplete="off" maxlength="10" placeholder="เบอร์โทรศัพท์ เช่น 0851234567" required disabled>
                                                </div>
                                                <!-- .col -->
                                                <div class="col col-lg-6 col-md-6  col-sm-12 col-xs-12">อาหาร :
                                                    <label class="radio-inline">
                                                        <input type="radio" value="ธรรมดา" name="food" <?= (($row["food"] == 'ธรรมดา') ? 'checked' : '') ?> disabled>
                                                        ธรรมดา </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" value="มังสวิรัติ" name="food" <?= (($row["food"] == 'มังสวิรัติ') ? 'checked' : '') ?> disabled>
                                                        มังสวิรัติ </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" value="อิสลาม" name="food" <?= (($row["food"] == 'อิสลาม') ? 'checked' : '') ?> disabled>
                                                        อิสลาม </label>
                                                </div>
                                                <!-- .col -->
                                            </div>
                                            <div class="row">
                                                <div class="col col-12">ออกใบเสร็จในนาม</div>
                                            </div>
                                            <div class="row">
                                                <div class="col col-lg-6 col-md-6  col-sm-12 col-xs-12">
                                                    <label class="radio-inline">
                                                        <input type="radio" value="ผู้สมัคร" id="personal" <?= (($row["receipt_by"] == 'ผู้สมัคร') ? 'checked' : '') ?>  name="invoice" disabled>
                                                        ผู้สมัคร </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" value="หน่วยงาน" id="org" <?= (($row["receipt_by"] == 'หน่วยงาน') ? 'checked' : '') ?>  name="invoice" disabled>
                                                        หน่วยงาน </label>
                                                </div>
                                                <!-- .col -->
                                            </div>
                                            <!-- .row -->
                                            <div class="row">
                                                <div class="col col-12">
                                                    <textarea name="invoiceaddress" value="<?= $row["invoiceaddress"] ?>" class="form-control" id="invoiceaddress" disabled></textarea>
                                                </div>
                                                <!-- .col -->
                                            </div>
                                            <!-- .row -->
                                            <div class="row">
                                                <div class="col col-12 text-center">
                                                    <button type="submit" class="btn btn-primary" disabled>บันทึกข้อมูล</button>
                                                    <a type="button" href="enrollee_edit.php?id=<?= $_GET['id'] ?>" id="edit-btn" class="btn btn-danger">แก้ไขข้อมูล</a>
                                                </div>
                                                <!-- .col -->
                                            </div>
                                            <!-- .row -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if ($status >= 2) {
                                ?>
                                <div class="col-md-4">
                                    <div class="card card-user">
                                        <!--<div class="">-->
                                        <img class="img-responsive" src="<?= ((empty($row["image"])) ? '' : $row["image"]) ?>" alt=""/>
                                        <!--</div>-->

                                    </div>
                                    <div class="row">
                                        <div class="col col-12 text-center">
                                            <form name="update_status" method="post" action="update_status.php" class="comment-form">
                                                <?php
                                                if ($status == 2) {
                                                    ?><button type="submit" class="btn btn-primary">ยืนยันข้อมูล</button>
                                                    <input type="text" value="<?= $id ?>" name="id" hidden>
                                                    <input type="text" value="3" name="status" hidden>
                                                    <?php
                                                }
                                                ?>
                                            </form>
                                        </div>
                                        <!-- .col -->
                                    </div>
                                </div>
                                <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>

                <?php include('element/footer.php'); ?>


            </div>
        </div>


    </body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js "></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    
    <?php include('../element/Message.php'); ?>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
            $('#dataRegister').DataTable();
        });
    </script>

</html>
