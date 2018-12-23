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

        <title>Fishing Equipment Store</title>

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
                            <a class="navbar-brand" href="#">Compare Strength</a>
							
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
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="content table-responsive">
                                        <table id="dataRegister" class="table table-hover table-striped">
                                            <thead>
                                            <th>ขนาดแรงดึง (กก.)</th>
                                            <th>(เทียบปอนด์)</th>
											<th>ขนาดแรงดึงเป็นปอนด์แบบเดิม</th>
											<th>ACTION</th>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $sql = "SELECT `ID`,`strength_kg`,`strength_pound`,`strength_pound_old` FROM `Tensile_strength`";

                                                $result = $Connect->query($sql);

                                                if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    $i=1;
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td>" . $row["strength_kg"]. "</td>";
                                                        echo "<td>(" . $row["strength_pound"] . ")</td>";
														echo "<td>" . $row["strength_pound_old"] . "</td>";
														echo '<td class="text-left"><a href="rod_power_check.php?id='. base64_encode($row["ID"]).'" title="แก้ไขข้อมูล/ตรวจสอบ"><span class="glyphicon glyphicon-edit" style="margin-left: 3px; margin-right: 3px;"></span></a></td>';
                                                        echo "</tr>";
                                                        $i++;
                                                    }
                                                } else {
                                                    echo "0 results";
                                                }
                                                ?>

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js "></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script>
                    $(document).ready(function () {
                        $('#example').DataTable();
                        $('#dataRegister').DataTable();
                    });
    </script>

</html>
