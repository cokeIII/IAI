<?php

require_once "connect.php";
require_once "function.php";
$id_card = $_POST["id_card"];

if(!checkPID($id_card)){
    header("location: error-page.php?text-error=รหัสบัตรประชาชนไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง <a href='sign-up.php'>ลองอีกครั้ง</a>");
    return;
}

if(checkUser($id_card)){
    header("location: error-page.php?text-error=รหัสบัตรประชาชนมีการใช้งานแล้ว กรุณาลองใหม่อีกครั้ง <a href='sign-up.php'>ลองอีกครั้ง</a>");
    return;
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
$password = md5($_POST["password"]);

if(!empty($pic_profile["size"])){
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

$sql = "insert into users (
    `id_card`, 
    `f_name`, 
    `l_name`,
    `f_name_en`,
    `l_name_en`,
    `prefix`, 
    `birthday`, 
    `house_number`, 
    `village`, 
    `alley`, 
    `road`, 
    `districts_id`, 
    `occupation`, 
    `job_title`, 
    `workplace`, 
    `home_phone`, 
    `phone`, 
    `work_phone`, 
    `email`, 
    `password`, 
    `pic_profile`, 
    `status`)
    values(
        '$id_card',
        '$f_name',
        '$l_name',
        '$f_name_en',
        '$l_name_en',
        '$prefix',
        '$birthday',
        '$house_number',
        '$village',
        '$alley',
        '$road',
        '$sub_district',
        '$occupation',
        '$job_title',
        '$workplace',
        '$home_phone',
        '$phone',
        '$work_phone',
        '$email',
        '$password',
        '$file_name',
        'registrar'
    )
    ";

$res = mysqli_query($conn,$sql);

if($res){
    header("location: listEmp_admin.php");
} else {
    // echo $sql;
    header("location: error-page.php?text-error=เพิ่มเจ้าหน้าที่ผิดพลาด กรุณาลองใหม่อีกครั้ง");
} 
