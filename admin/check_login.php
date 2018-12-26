<?php


require("../conf/config_mysqli.php");
$strSQL = "SELECT * FROM users WHERE Username = '" . mysqli_real_escape_string($Connect, $_POST['Username']) . "'";
echo $strSQL;
$objQuery = mysqli_query($Connect, $strSQL);
$objResult = mysqli_fetch_array($objQuery);

mysqli_close($Connect);
$verify = passwordverify($_POST['Password'], $objResult["Password"], $objResult["Salt"]);

if ($verify) {
    $_SESSION["UserID"] = $objResult["UserID"];
    $_SESSION["Status"] = $objResult["Status"];

    session_write_close();

    if ($objResult["Status"] == "ADMIN") {
        header("location:index.php");
    } else {
        header("location:login.php");
    }
} else {
    $_SESSION['Message'] = 'Username and Password Incorrect!';
    $_SESSION['type'] = 'error';
    header("location:login.php");
}

function passwordverify($passwordinput, $password, $salt) {

    $hash = hash('sha256', $passwordinput . $salt);

    if ($hash === $password) {

        return true;
    } else {
        return false;
    }
}

//mysqli_close();
?>