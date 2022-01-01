<?php
require_once "connect.php";

if ($_POST["act"] == "getDistrict") {
    $code_provinces = $_POST["provinceCode"];
    $opt = "";
    $sql = "select * from amphures where province_id = '$code_provinces'";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($res)) {
        $opt .= '<option value="' . $row["id"] . '">' . $row["name_th"] . '</option>';
    }
    echo $opt;
}
