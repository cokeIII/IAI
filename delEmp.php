<?php

require_once "connect.php";
require_once "function.php";
$id_card = $_POST["id_card"];

$sql = "delete from users where id_card = '$id_card'";
$res = mysqli_query($conn, $sql);
if ($res) {
    header("location: listEmp_admin.php");
} else {
    header("location: error-page.php?text-error=ลบรายการผิดพลาด กรุณาลองใหม่อีกครั้ง");
}
