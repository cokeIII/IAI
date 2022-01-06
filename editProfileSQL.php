<?php

require_once "connect.php";
require_once "function.php";
$id_card = $_POST["id_card"];

if (!checkPID($id_card)) {
    header("location: error-page.php?text-error=รหัสบัตรประชาชนไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง");
    return;
}

$sqlGetImg = "select pic_profile from users where id_card = '$id_card'";
$resGetImg = mysqli_query($conn, $sqlGetImg);
$rowGetImg = mysqli_fetch_array($resGetImg);
$old_img = "";
if (!empty($rowGetImg["pic_profile"])) {
    $old_img = $rowGetImg["pic_profile"];
}
$file_name = "";
if (empty($_FILES["pic_profile"]["size"])) {
    $pic_profile = $old_img;
    $file_name = $old_img;
} else {
    $pic_profile = $_FILES["pic_profile"];
}
if (!empty($pic_profile["size"])) {
    $target_dir = "pic_profile/";
    $file_name = $id_card . ".jpg";
    $target_file = $target_dir . $file_name;
    $uploadOk = 1;

    // Check file size
    if ($pic_profile["size"] > 2000000) {
        header("location: error-page.php?text-error=ขนาดรูปใหญ่กินไป");
        return;
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
    } else {
        if (move_uploaded_file($pic_profile["tmp_name"], $target_file)) {
        } else {
            header("location: error-page.php?text-error=อัพโหลดรูปไม่สำเร็จ กรุณาสมัครสมาชิกใหม่อีกครั้ง <a href='sign-up.php'>ลองอีกครั้ง</a>");
            return;
        }
    }
}
$prefix = $_POST["prefix"];
$f_name = $_POST["f_name"];
$l_name = $_POST["l_name"];
$f_name_en = $_POST["f_name_en"];
$l_name_en = $_POST["l_name_en"];
$birthday = $_POST["birthday"];
$house_number = $_POST["house_number"];
$village = $_POST["village"];
$alley = $_POST["alley"];
$road = $_POST["road"];
$sub_district = $_POST["sub_district"];
$home_phone = $_POST["home_phone"];
$pic_profile = $_FILES["pic_profile"];
$occupation = $_POST["occupation"];
$job_title = $_POST["job_title"];
$workplace = $_POST["workplace"];
$work_phone = $_POST["work_phone"];
$phone = $_POST["phone"];
$email = $_POST["email"];

$sql = "update users set 
prefix = '$prefix',
f_name = '$f_name',
l_name = '$l_name',
f_name_en = '$f_name_en',
l_name_en = '$l_name_en',
birthday = '$birthday',
house_number = '$house_number',
village = '$village',
alley = '$alley',
road = '$road',
districts_id = '$sub_district',
home_phone = '$home_phone',
pic_profile = '$file_name',
occupation = '$occupation',
job_title = '$job_title',
workplace = '$workplace',
work_phone = '$work_phone',
phone = '$phone',
email = '$email'
where id_card = '$id_card'
";
$res = mysqli_query($conn, $sql);

if ($res) {
    header("location: editProfile.php");
} else {
    echo $sql;
    // header("location: error-page.php?text-error=แก้ไขข้อมูลผิดพลาด กรุณาลองใหม่อีกครั้ง");
}
