<!--
=========================================================
* Material Kit 2 - v3.0.0
=========================================================

* Product Page:  https://www.creative-tim.com/product/material-kit 
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
    <?php
    require_once "setHead.php";
    ?>
</head>
<style>
    .ratings i {
        font-size: 16px;
        color: red
    }

    .strike-text {
        color: red;
        text-decoration: line-through
    }

    .product-image {
        width: 100%
    }

    .dot {
        height: 7px;
        width: 7px;
        margin-left: 6px;
        margin-right: 6px;
        margin-top: 3px;
        background-color: blue;
        border-radius: 50%;
        display: inline-block
    }

    .spec-1 {
        color: #938787;
        font-size: 15px
    }

    .para {
        font-size: 16px
    }
</style>

<body class="index-page bg-gray-200">


    <!-- menu -->
    <?php
    require_once "menu.php";
    if (empty($_SESSION["status"])) {
        header("location: logout.php");
    } else {
        if ($_SESSION["status"] == "admin") {
        } else {
            header("location: logout.php");
        }
    }
    require_once "connect.php";
    require_once "function.php";
    $course_id = $_GET["course_id"];
    $sql = "select * from course where course_id = '$course_id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    ?>
    <!-- end menu -->

    <header>
        <div class="page-header min-height-400" style="background-image: url('assets/img/city-profile.jpg');" loading="lazy">
            <span class="mask bg-gradient-dark opacity-8"></span>
        </div>
    </header>
    <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6">
        <section class="pt-3 pb-4" id="count-stats">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 mx-auto py-3">
                        <h5>แก้ไขรายการอบรม</h5>
                        <hr>
                        <form role="form" method="POST" action="editCourseSQL.php" class="text-start" enctype="multipart/form-data">
                            <input type="hidden" value="<?php echo $course_id;?>" name="course_id">
                            <div class="row">

                                <div class="col-md-6">
                                    <h5>ชื่อรายการอบรม</h5>
                                    <div class="input-group input-group-outline my-3">
                                        <input name="course_name" type="text" class="form-control" required value="<?php echo $row["course_name"]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5>กลุ่มเป้าหมาย</h5>
                                    <div class="input-group input-group-outline my-3">
                                        <input name="target" type="text" class="form-control" required value="<?php echo $row["target"]; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>จำนวนผู้อบรม</h5>
                                    <div class="input-group input-group-outline my-3">
                                        <input name="number_trainees" type="number" class="form-control" required value="<?php echo $row["number_trainees"]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <h5>ค่าใช้จ่าย(บาท)</h5>
                                    <div class="input-group input-group-outline my-3">
                                        <input name="expenses" type="number" class="form-control" required value="<?php echo $row["expenses"] ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <h5>วันที่เริ่มการอบรม</h5>
                                    <div class="input-group input-group-outline my-3">
                                        <input name="start_date" type="datetime-local" class="form-control" required value="<?php echo date("Y-m-d\TH:i:s", strtotime($row['start_date'])); ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <h5>วันที่สิ้นสุดการอบรม</h5>
                                    <div class="input-group input-group-outline my-3">
                                        <input name="end_date" type="datetime-local" class="form-control" required value="<?php echo date("Y-m-d\TH:i:s", strtotime($row['end_date'])); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>สถานที่ฝึกอบรม</h5>
                                    <div class="input-group input-group-outline my-3">
                                        <input name="location" type="text" class="form-control" required value="<?php echo $row["location"]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h5>กำหนดการเปิดรับสมัคร</h5>
                                    <div class="input-group input-group-outline my-3">
                                        <input name="open_applications" type="datetime-local" class="form-control" required value="<?php echo date("Y-m-d\TH:i:s", strtotime($row['open_applications'])); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h5>กำหนดการปิดรับสมัคร</h5>
                                    <div class="input-group input-group-outline my-3">
                                        <input name="close_applications" type="datetime-local" class="form-control" required value="<?php echo date("Y-m-d\TH:i:s", strtotime($row['close_applications'])); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>รายละเอียดการชำระเงิน</h5>
                                    <div class="input-group input-group-outline my-3">
                                        <textarea name="payment_details" class="form-control" id="payment_details" cols="auto" rows="5" placeholder="รายละเอียดการชำระเงิน" required>
                                            <?php echo $row["payment_details"];?>
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5>เอกสารที่เกี่ยวข้องกับการอบรม : <u><?php echo (empty($row["course_file"])?"":"<a href='file_uploads/".$row["course_file"]."' target='_blank'>ดูเอกสาร</a>")?></u></h5>
                                    <div class="input-group input-group-outline my-3">
                                        <input name="course_file" type="text" class="form-control" onclick="(this.type = 'file')">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>หลักสูตร</h5>
                                    <div class="input-group input-group-outline my-3">
                                        <select name="course_type" id="course_type" class="form-control" required>
                                            <?php echo optCourseType(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h5>รูปหน้าปก :  <u><?php echo (empty($row["pic"])?"":"<a href='file_uploads/img/".$row["pic"]."' target='_blank'>ดูรูปภาพ</a>")?></u></h5>
                                    <div class="input-group input-group-outline my-3">
                                        <input name="pic" type="text" class="form-control" onclick="(this.type = 'file')" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-warning">แก้ไขรายการอบรม</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
        <!-- -------   END PRE-FOOTER 2 - simple social line w/ title & 3 buttons    -------- -->
        <?php require_once "setFoot.php"; ?>
</body>

</html>
<script>
    $(document).ready(function() {
        $("#course_type").val('<?php echo $row["course_type"];?>')
    })
</script>