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
    $text_show = "";
    if(!empty($_GET["text-error"])){
        $text_show = $_GET["text-error"];
    } 
  ?>
</head>

<body class="sign-in-basic">
  <!-- Navbar Transparent -->
  <?php require_once "menu.php"; ?>
  <!-- End Navbar -->
  <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');" loading="lazy">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container my-auto">
      <div class="row">
        <div class="col-md-12 mx-auto mb-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center"><?php echo $text_show; ?></h4>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <?php require_once "setFoot.php"; ?>
</body>

</html>