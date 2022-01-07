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
<style>
    .border-pic {
        border: 5px solid;
        border-radius: 5px;
        box-shadow: 5px 10px 18px #888888;
    }

    .border-left-m {
        border-left: 1px solid;
    }

    .bg-gray {
        background-color: #d4d4d4 !important;
    }
</style>

<body class="index-page bg-gray-200">


    <!-- menu -->
    <?php
    require_once "menu.php";
    require_once "connect.php";
    if (empty($_SESSION["id_card"])) {
        header("location: logout.php");
    }
    $id_card = $_GET["id_card"];
    $sql = "select * from users where id_card = '$id_card'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
    $districts_id = $row["districts_id"];
    $pic_profile = $row["pic_profile"];
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
                <form action="editEmpSQL.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-9 mx-auto py-3">
                            <div class="row">
                                <div class="col-md-5  text-center">
                                    <img id="picProfile" class="border-pic" src="<?php echo "pic_profile/" . (empty($row["pic_profile"]) ? "user-tie-solid.svg" : $row["pic_profile"]); ?>" alt="" height="250" width="250">
                                </div>
                                <div class="col-md-3 border-left-m mt-5">
                                    <label>
                                        <h5>แก้ไขรูปประจำตัว</h5>
                                    </label>
                                    <div class="input-group input-group-outline my-3">
                                        <input class="form-control input-group-outline" type="file" name="pic_profile">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-3">
                            <h5>รหัสบัตรประชาชน</h5>
                            <div class="input-group input-group-outline my-3">
                                <input id="id_card" name="id_card" type="text" class="form-control bg-gray" maxlength="13" required readonly value="<?php echo $row["id_card"] ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h5>คำนำหน้าชื่อ</h5>
                            <div class="input-group input-group-outline my-3">
                                <!-- <label class="form-label">คำนำหน้า</label> -->
                                <select name="prefix" class="form-control" required>
                                    <option value="นาย" <?php echo ($row["prefix"] == "นาย" ? "selected" : "") ?>>นาย</option>
                                    <option value="นาง" <?php echo ($row["prefix"] == "นาง" ? "selected" : "") ?>>นาง</option>
                                    <option value="นางสาว" <?php echo ($row["prefix"] == "นางสาว" ? "selected" : "") ?>>นางสาว</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h5>ชื่อ</h5>
                            <div class="input-group input-group-outline my-3">
                                <input name="f_name" type="text" class="form-control" required value="<?php echo $row["f_name"] ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h5>นามสกุล</h5>
                            <div class="input-group input-group-outline my-3">
                                <input name="l_name" type="text" class="form-control" required value="<?php echo $row["l_name"] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h5>ชื่อภาษา อังกฤษ</h5>
                            <div class="input-group input-group-outline my-3">
                                <input name="f_name_en" type="text" class="form-control" required value="<?php echo $row["f_name_en"]; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h5>นามสกุลภาษา อังกฤษ</h5>
                            <div class="input-group input-group-outline my-3">
                                <input name="l_name_en" type="text" class="form-control" required value="<?php echo $row["l_name_en"]; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h5>วันเกิด</h5>
                            <div class="input-group input-group-outline my-3">
                                <input name="birthday" type="text" class="form-control" required onfocus="(this.type='date')" onblur="(this.type='text')" value="<?php echo $row["birthday"]; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h5>บ้านเลขที่</h5>
                            <div class="input-group input-group-outline my-3">
                                <input name="house_number" type="text" class="form-control" required value="<?php echo $row["house_number"]; ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h5>หมู่</h5>
                            <div class="input-group input-group-outline my-3">
                                <input name="village" type="number" class="form-control" value="<?php echo $row["village"]; ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h5>ซอย</h5>
                            <div class="input-group input-group-outline my-3">
                                <input name="alley" type="text" class="form-control" value="<?php echo $row["alley"]; ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h5>ถนน</h5>
                            <div class="input-group input-group-outline my-3">
                                <input name="road" type="text" class="form-control" value="<?php echo $row["road"]; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h5>โทรศัพท์บ้าน</h5>
                            <div class="input-group input-group-outline my-3">
                                <input name="home_phone" type="number" class="form-control" value="<?php echo $row["home_phone"]; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h5>โทรศัพท์มือถือ</h5>
                            <div class="input-group input-group-outline my-3">
                                <input name="phone" type="number" class="form-control" required value="<?php echo $row["phone"]; ?>">
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

                    <h4>ข้อมูลการทำงาน</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <h5>อาชีพ</h5>
                            <div class="input-group input-group-outline my-3">
                                <input name="occupation" type="text" class="form-control" required value="<?php echo $row["occupation"]; ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h5>ตำแหน่งงาน</h5>
                            <div class="input-group input-group-outline my-3">
                                <input name="job_title" type="text" class="form-control" required value="<?php echo $row["job_title"]; ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h5>สถานที่ทำงาน</h5>
                            <div class="input-group input-group-outline my-3">
                                <input name="workplace" type="text" class="form-control" required value="<?php echo $row["workplace"]; ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h5>เบอร์โทรศัพที่ทำงาน</h5>
                            <div class="input-group input-group-outline my-3">
                                <input name="work_phone" type="number" class="form-control" required value="<?php echo $row["work_phone"]; ?>">
                            </div>
                        </div>
                    </div>
                    <h4>ข้อมูลการเข้าใช้งาน</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>E-mail</h5>
                            <div class="input-group input-group-outline my-3">
                                <input name="email" type="email" class="form-control bg-gray" required value="<?php echo $row["email"]; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>Password</h5>
                            <button type="button" class="btn btn-primary mt-2" id="btnChangePass">แก้ไขรหัสผ่าน</button>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-warning" type="submit">บันทึกข้อมูล</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- -------   END PRE-FOOTER 2 - simple social line w/ title & 3 buttons    -------- -->
        <?php require_once "setFoot.php"; ?>
</body>
<div class="modal" tabindex="-1" role="dialog" id="changePass">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">เปลี่ยนรหัสผ่าน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>รหัสผ่านใหม่</h5>
                <div class="input-group input-group-outline my-3">
                    <input type="password" name="new_password" id="new_password" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close" data-dismiss="modal">ปิด</button>
                <button type="button" class="btn btn-primary" id="submitPass">เปลี่ยนรหัสผ่าน</button>
            </div>
        </div>
    </div>
</div>

</html>
<script>
    $(document).ready(function() {
        d = new Date()
        $("#picProfile").attr("src", "pic_profile/<?php echo (empty($row["pic_profile"]) ? "user-tie-solid.svg" : $row["pic_profile"]); ?>?" + d.getTime());
        $(document).on("click", "#btnChangePass", function() {
            $('#changePass').modal('show');
        })
        $(document).on("click", ".close", function() {
            $('.modal').modal('hide');
        })
        $('#province').select2();
        $('#district').select2();
        $('#sub_district').select2();

        let sub_district_id = '<?php echo $districts_id; ?>'
        let dataAddress = {}
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: {
                sub_district_id: sub_district_id,
                act: 'getAddress'
            },
            success: function(result) {
                result = JSON.parse(result)
                dataAddress = result
                $("#province").val(result.P).trigger('change')
            }
        });

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
                    $("#district").val(dataAddress.A).trigger('change')

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
                    $("#sub_district").val(dataAddress.D).trigger('change')
                }
            });
        })
        $(document).on('click', '#submitPass', function() {
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: {
                    id_card: $("#id_card").val(),
                    new_password: $('#new_password').val(),
                    act: 'changePassEmp'
                },
                success: function(result) {
                    console.log(result)
                    if (result == "success") {
                        $('.modal').modal('hide')
                        $('#new_password').val("")
                        Swal.fire({
                            title: 'success',
                            text: 'เปลี่ยนรหัสผ่านสำเร็จ',
                            icon: 'success',
                            confirmButtonText: 'ปิด'
                        })
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'เปลี่ยนรหัสผ่านไม่สำเร็จ',
                            icon: 'error',
                            confirmButtonText: 'ปิด'
                        })
                    }
                }
            });
        })
    })
</script>