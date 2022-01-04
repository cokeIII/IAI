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


function checkPID($pid) {
    if(strlen($pid) != 13) return false;
       for($i=0, $sum=0; $i<12;$i++)
       $sum += (int)($pid{$i})*(13-$i);
       if((11-($sum%11))%10 == (int)($pid{12}))
       return true;
    return false;
 }

 function checkUser($pid){
    global $conn;
    $sql = "select * from users where id_card = '$pid'";
    $res = mysqli_query($conn,$sql);
    $numrow = mysqli_num_rows($res);
    if($numrow > 0){
        return true;
    }
    return false;
 }