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
        if ($_SESSION["status"] == "user") {
        } else {
            header("location: logout.php");
        }
    }
    require_once "connect.php";
    require_once "function.php";
    $id_card = $_SESSION["id_card"];
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
                        <h5>รายการอบรม</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group input-group-outline">
                                    <input type="search" class="form-control rounded mt-2" placeholder="Search" aria-label="Search" id="cardsearchinput" />
                                </div>
                            </div>
                        </div>
                        <div id="carddata">
                            <?php
                            $sql = "select * from course 
                            where course_id not in(
                                select cr.course_id from course_regis cr
                                inner join course c on c.course_id = cr.course_id
                                where  cr.id_card = '$id_card'
                            )";
                            $res = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($res)) {
                            ?>
                                <div class="row p-2 bg-white border rounded mt-3 card-data">
                                    <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="file_uploads/img/<?php echo $row["pic"] ?>"></div>
                                    <div class="col-md-6 mt-1">
                                        <h5 class="key"><?php echo $row["course_name"]; ?></h5>
                                        <div class="mt-1 mb-1 spec-1">
                                            <span class="dot"></span>
                                            <span class="key">หลักสูตร <?php echo getCourseType($row["course_type"]); ?></span>
                                            <br>
                                            <span class="dot"></span>
                                            <span class="key">กลุ่มเป้าหมาย <?php echo $row["target"]; ?> จำนวน <?php echo $row["number_trainees"]; ?> คน</span>
                                            <br>
                                            <span class="dot"></span>
                                            <span class="key">วันที่เริ่มการอบรม <?php echo $row["start_date"]; ?></span>
                                            <br>
                                            <span class="dot"></span>
                                            <span class="key">วันที่สิ้นสุดการอบรม <?php echo $row["end_date"]; ?></span>
                                            <br>
                                            <span class="dot"></span>
                                            <span class="key">รับสมัครตั้งแต่ <?php echo $row["open_applications"]; ?> ถึง <?php echo $row["close_applications"]; ?></span>
                                            <br>
                                            <span class="dot"></span>
                                            <span class="key">สถานที่ฝึกอบรม <?php echo $row["location"]; ?></span>

                                        </div>
                                        <p class="text-justify text-truncate para mb-0">
                                            <!-- datail text -->
                                        </p>
                                    </div>
                                    <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                        <div class="d-flex flex-row align-items-center">
                                            <h4 class="mr-1">ค่าใช้จ่าย <span class="key"><?php echo $row["expenses"]; ?></span> บาท</h4>
                                        </div>
                                        <input type="hidden" class="key" value="<?php echo $row["payment_details"]; ?>">
                                        <h6><button class="btn btn-outline-primary" id="payDetail" course_id="<?php echo $row["course_id"]; ?>">รายละเอียดการชำระเงิน</button></h6>
                                        <div class="d-flex flex-column mt-2">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form action="courseRegis.php" method="post">
                                                        <input type="hidden" name="course_id" value="<?php echo $row["course_id"]; ?>">
                                                        <button class="btn btn-primary btn-sm mt-2" type="submit" course_id="<?php echo $row["course_id"]; ?>">ลงทะเบียน</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- -------   END PRE-FOOTER 2 - simple social line w/ title & 3 buttons    -------- -->
        <?php require_once "setFoot.php"; ?>
</body>
<div class="modal" tabindex="-1" role="dialog" id="payment_details">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">รายละเอียดการชำระเงิน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="detail-text"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close" data-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>

</html>
<script>
    $(document).ready(function() {
        $("#carddata").searcher({
            itemSelector: ".card-data",
            textSelector: ".key",
            inputSelector: "#cardsearchinput",
            toggle: function(item, containsText) {
                // use a typically jQuery effect instead of simply showing/hiding the item element
                if (containsText)
                    $(item).fadeIn();
                else
                    $(item).fadeOut();
            }
        });
        $(document).on("click", ".close", function() {
            $('.modal').modal('hide')
            $("#detail-text").html("")
        })
        $(document).on("click", "#payDetail", function() {
            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: {
                    course_id: $(this).attr("course_id"),
                    act: 'getPaymentDetails'
                },
                success: function(result) {
                    $("#detail-text").html(result)
                    $('#payment_details').modal('show')
                }
            });
        })

    })
</script>