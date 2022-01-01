<?php
require_once "connect.php";

function optProvince()
{
    global $conn;
    $opt = "";
    $sql = "select * from provinces";
    $res = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($res)){
        $opt .= '<option value="'.$row["id"].'">'.$row["name_th"].'</option>'; 
    }
    return $opt;
}
