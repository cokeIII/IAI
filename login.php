<?php
require_once "connect.php";
require_once "function.php";
session_start();
$username = $_POST["email"];
$password = md5($_POST["password"]);

$sql = "select * from users where email = '$username' and password = '$password'";
$res = mysqli_query($conn,$sql);
$numrow = mysqli_num_rows($res);

if($numrow > 0){
    $row = mysqli_fetch_array($res);
    $_SESSION["id_card"] = $row["id_card"];
    $_SESSION["username"] = $row["f_name"]." ".$row["l_name"];
    $_SESSION["status"] = $row["status"];
    if($row["status"] == "user"){
        header("location: home.php");
    } else if($row["status"] == "admin"){
        header("location: home_admin.php");
    }
} else {
    // echo $sql;
    header("location: error-page.php?text-error=เข้าสู่ระบบไม่สำเร็จกรุณาลองใหม่");
}