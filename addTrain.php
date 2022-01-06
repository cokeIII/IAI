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
    require_once "function.php";
    ?>
</head>

<body class="index-page bg-gray-200">


    <!-- menu -->
    <?php
    require_once "menu.php";
    if (empty($_SESSION["status"])) {
        header("location: logout.php");
    } else {
        if ($_SESSION["status"] == "admin" || $_SESSION["status"] == "registrar") {
        } else {
            header("location: logout.php");
        }
    }
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
                    <div class="col-lg-10 mx-auto py-3">
                        <h4>เพิ่มรายการอบรม</h4>
                        <hr>
                        <form role="form" method="POST" action="addTrainSQl.php" class="text-start" enctype="multipart/form-data">

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">ชื่อรายการอบรม</label>
                                        <input name="course_name" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">กลุ่มเป้าหมาย</label>
                                        <input name="target" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">จำนวนผู้อบรม</label>
                                        <input name="number_trainees" type="number" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">ค่าใช้จ่าย(บาท)</label>
                                        <input name="expenses" type="number" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">วันที่เริ่มการอบรม</label>
                                        <input name="start_date" type="text" class="form-control" onblur="(this.type = 'text')" onclick="(this.type = 'datetime-local')" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">วันที่สิ้นสุดการอบรม</label>
                                        <input name="end_date" type="text" class="form-control" onblur="(this.type = 'text')" onclick="(this.type = 'datetime-local')" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">สถานที่ฝึกอบรม</label>
                                        <input name="location" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">กำหนดการเปิดรับสมัคร</label>
                                        <input name="open_applications" type="text" class="form-control" onblur="(this.type = 'text')" onclick="(this.type = 'datetime-local')" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">กำหนดการปิดรับสมัคร</label>
                                        <input name="close_applications" type="text" class="form-control" onblur="(this.type = 'text')" onclick="(this.type = 'datetime-local')" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <textarea name="payment_details" class="form-control" id="payment_details" cols="auto" rows="5" placeholder="รายละเอียดการชำระเงิน" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">เอกสารที่เกี่ยวข้องกับการอบรม</label>
                                        <input name="course_file" type="text" class="form-control" onclick="(this.type = 'file')">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <select name="course_type" id="course_type" class="form-control" required>
                                            <option value="">-- กรุเลือกหลักสูตร --</option>
                                            <?php echo optCourseType(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">รูปหน้าปก</label>
                                        <input name="pic" type="text" class="form-control" onclick="(this.type = 'file')" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-primary">เพิ่มรายการอบรม</button>
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