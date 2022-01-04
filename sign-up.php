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
  require_once "connect.php";
  ?>
</head>
<style>
  .card-mt-top {
    margin-top: 10%;
  }
</style>

<body class="sign-in-basic">
  <!-- Navbar Transparent -->
  <?php require_once "menu.php"; ?>
  <!-- End Navbar -->
  <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');" loading="lazy">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container my-auto">
      <div class="row card-mt-top">
        <div class="col-10 mx-auto mb-3">
          <div class="card z-index-0 fadeIn3 fadeInBottom">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">IAI training</h4>
              </div>
            </div>
            <div class="card-body">
              <form role="form" method="POST" action="userRegis.php" class="text-start" enctype="multipart/form-data">
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
                  <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">สมัครสมาชิก</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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