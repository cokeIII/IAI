<?php
require_once "connect.php";
header('Content-Type: text/html; charset=UTF-8');
if ($_POST["act"] == "getDistrict") {
    $code_provinces = $_POST["provinceCode"];
    $opt = "";
    $sql = "select * from amphures where province_id = '$code_provinces'";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($res)) {
        $opt .= '<option value="' . $row["id"] . '">' . $row["name_th"] . '</option>';
    }
    echo $opt;
} else if ($_POST["act"] == "getSubDistrict") {
    $code_district = $_POST["districtCode"];
    $opt = "";
    $sql = "select * from districts where amphure_id = '$code_district'";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($res)) {
        $opt .= '<option value="' . $row["id"] . '">' . $row["name_th"] . '</option>';
    }
    echo $opt;
} else if ($_POST["act"] == "getAddress") {
    $sub_district_id = $_POST["sub_district_id"];
    $sql = "select p.id as pId,a.id as aId, d.id as dId from districts d
    inner join amphures a on a.id = d.amphure_id
    inner join provinces p on p.id = a.province_id
    where d.id = '$sub_district_id'
    ";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    $data["P"] = $row["pId"];
    $data["A"] = $row["aId"];
    $data["D"] = $row["dId"];
    echo json_encode($data);
} else if ($_POST["act"] == "changePass") {
    $id_card = $_POST["id_card"];
    $old_password = md5($_POST["old_password"]);
    $new_password = md5($_POST["new_password"]);
    $sqlCheck = "select password from users where id_card = '$id_card'";
    $resCheck = mysqli_query($conn, $sqlCheck);
    $rowCheck = mysqli_fetch_array($resCheck);
    if ($rowCheck["password"] == $old_password) {
        $sql = "update users set password = '$new_password' where id_card = '$id_card'";
        $res = mysqli_query($conn, $sql);
        if ($res) {
            echo "success";
        } else {
            echo "fail";
        }
    } else {
        echo "fail";
    }
} else if ($_POST["act"] == "changePassEmp") {
    $id_card = $_POST["id_card"];
    $new_password = md5($_POST["new_password"]);
    $sql = "update users set password = '$new_password' where id_card = '$id_card'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "success";
    } else {
        echo "fail";
    }
} else if ($_POST["act"] == "getPaymentDetails") {
    $course_id = $_POST["course_id"];
    $text = "";
    $sql = "select * from course where course_id = '$course_id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    $text = $row["payment_details"];
    echo $text;
} else if ($_POST["act"] == "setStatusCourse") {
    $course_id = $_POST["course_id"];
    $status = $_POST["status"];
    $sql = "update course set status = '$status' where course_id = '$course_id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "success";
    }
} else if ($_POST["act"] == "getEmp") {
    $data = array();
    $sql = "select * from users where status = 'registrar'";
    $res = mysqli_query($conn, $sql);
    $i = 0;
    $data["data"][$i]["no"] = "";
    $data["data"][$i]["id_card"] = "";
    $data["data"][$i]["emp_name"] = "";
    $data["data"][$i]["email"] = "";
    $data["data"][$i]["dateTime"] = "";
    $data["data"][$i]["btn_del"] = "";
    $data["data"][$i]["btn_edit"] = "";
    while ($row = mysqli_fetch_array($res)) {
        $data["data"][$i]["no"] = ++$i;
        $data["data"][$i]["id_card"] = $row["id_card"];
        $data["data"][$i]["emp_name"] = $row["f_name"] . " " . $row["l_name"];
        $data["data"][$i]["email"] = $row["email"];
        $data["data"][$i]["dateTime"] = $row["date_time"];
        $data["data"][$i]["btn_edit"] = "<a class='btn btn-warning' href='editEmp.php?id_card=" . $row["id_card"] . "'>แก้ไข</a>";
        $data["data"][$i]["btn_del"] = "<button class='btn btn-danger btnDelEmp' id_card='" . $row["id_card"] . "'>ลบ</button>";
    }
    echo json_encode($data);
}
