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

<body class="sign-in-basic">
  <!-- Navbar Transparent -->
  <?php require_once "menu.php"; ?>
  <!-- End Navbar -->
  <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');" loading="lazy">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container my-auto">
      <div class="row">
        <div class="col-lg-4 col-md-8 col-12 mx-auto mb-3">
          <div class="card z-index-0 fadeIn3 fadeInBottom">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">IAI training</h4>
              </div>
            </div>
            <div class="card-body">
              <form role="form" class="text-start">
                <div class="input-group input-group-outline my-3">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control">
                </div>
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label">Password</label>
                  <input type="password" class="form-control">
                </div>
                <div class="text-center">
                  <button type="button" class="btn bg-gradient-primary w-100 my-4 mb-2">เข้าสู่ระบบ</button>
                </div>
                <p class="mt-4 text-sm text-center">
                  Don't have an account?
                  <a href="sign-up.php" class="text-primary text-gradient font-weight-bold">สมัครสมาชิก</a>
                </p>
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