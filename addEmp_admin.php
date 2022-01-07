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
    <?php require_once "setHead.php"; ?>
</head>

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
                        <h5>เพื่มเจ้าหน้าที่</h5>
                        <hr>
                        <form role="form" method="POST" action="addEmp_adminSQL.php" class="text-start" enctype="multipart/form-data">
                            <strong>ข้อมูลส่วนตัว</strong>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">รหัสบัตรประชาชน</label>
                                        <input name="id_card" type="text" class="form-control" maxlength="13" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group input-group-outline my-3">
                                        <!-- <label class="form-label">คำนำหน้า</label> -->
                                        <select name="prefix" class="form-control" required>
                                            <option value="">-- เลือกคำนำหน้าชื่อ --</option>
                                            <option value="นาย">นาย</option>
                                            <option value="นาง">นาง</option>
                                            <option value="นางสาว">นางสาว</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">ชื่อ</label>
                                        <input name="f_name" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">นามสกุล</label>
                                        <input name="l_name" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">ชื่อภาษา อังกฤษ</label>
                                        <input name="f_name_en" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">นามสกุลภาษา อังกฤษ</label>
                                        <input name="l_name_en" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">วันเกิด</label>
                                        <input name="birthday" type="text" class="form-control" required onfocus="(this.type='date')" onblur="(this.type='text')">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">บ้านเลขที่</label>
                                        <input name="house_number" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">หมู่</label>
                                        <input name="village" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">ซอย</label>
                                        <input name="alley" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">ถนน</label>
                                        <input name="road" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <select name="province" id="province" class="form-control" required>
                                            <option value="">-- กรุณาเลือกจังหวัด --</option>
                                            <?php echo optProvince(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <select name="district" id="district" class="form-control" required>
                                            <option value="">-- กรุณาเลือกอำเภอ --</option>
                                            <option value="">-- กรุณาเลือกจังหวัดก่อน --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <select name="sub_district" id="sub_district" class="form-control" required>
                                            <option value="">-- กรุณาเลือกตำบล --</option>
                                            <option value="">-- กรุณาเลือกอำเภอก่อน --</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">โทรศัพท์บ้าน</label>
                                        <input name="home_phone" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">โทรศัพท์มือถือ</label>
                                        <input name="phone" type="number" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">รูปประจำตัว ขนาดไม่เกิน 1 MB</label>
                                        <input name="pic_profile" type="text" class="form-control" onclick="(this.type = 'file')" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                    </div>
                                </div>
                            </div>
                            <strong>ข้อมูลการทำงาน</strong>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">อาชีพ</label>
                                        <input name="occupation" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">ตำแหน่งงาน</label>
                                        <input name="job_title" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">สถานที่ทำงาน</label>
                                        <input name="workplace" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">เบอร์โทรศัพที่ทำงาน</label>
                                        <input name="work_phone" type="number" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <strong>ข้อมูลการเข้าใช้งาน</strong>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">E-mail</label>
                                        <input name="email" type="email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Password</label>
                                        <input name="password" type="password" class="form-control" minlength="8" required>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">เพิ่มเจ้าหน้าที่</button>
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
        $('#province').select2();
        $('#district').select2();
        $('#sub_district').select2();

        $(document).on('change', '#province', function() {
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: {
                    provinceCode: $('#province').val(),
                    act: 'getDistrict'
                },
                success: function(result) {
                    $('#district').html('<option value="">-- กรุณาเลือกอำเภอ --</option>' + result)
                    $('#district').select2();
                }
            });
        })

        $(document).on('change', '#district', function() {
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: {
                    districtCode: $('#district').val(),
                    act: 'getSubDistrict'
                },
                success: function(result) {
                    $('#sub_district').html('<option value="">-- กรุณาเลือกตำบล --</option>' + result)
                    $('#sub_district').select2();
                }
            });
        })
    })
</script>