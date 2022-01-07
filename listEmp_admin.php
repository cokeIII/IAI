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
                        <h5>รายการเจ้าหน้าที่</h5>
                        <hr>
                        <table class="table" id="listEmp">
                            <thead>
                                <tr>
                                    <td>ลำดับ</td>
                                    <td>รหัสบัตรประชาชน</td>
                                    <td>ชื่อ - สกุล</td>
                                    <td>e-mail</td>
                                    <td>เวลาที่ลงทะเบียน</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
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
        $(document).on("click", ".btnDelEmp", function() {
            let id_card = $(this).attr("id_card")
            Swal.fire({
                title: 'ต้องการลบรายการใช่หรือไม่ ?',
                showCancelButton: true,
                confirmButtonText: 'ลบ',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.redirect('delEmp.php', {
                        'id_card': id_card
                    });
                }
            })
        })
        $('#listEmp').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "bDestroy": true,
            "responsive": true,
            "autoWidth": false,
            "pageLength": 30,
            "scrollX": true,
            "ajax": {
                "url": "ajax.php",
                "type": "POST",
                "data": function(d) {
                    d.act = "getEmp"
                }
            },
            'processing': true,
            "columns": [{
                    "data": "no"
                },
                {
                    "data": "id_card"
                },
                {
                    "data": "emp_name"
                },
                {
                    "data": "email"
                },
                {
                    "data": "dateTime"
                },
                {
                    "data": "btn_edit"
                },
                {
                    "data": "btn_del"
                },

            ],
            "language": {
                'processing': '<img src="img/tenor.gif" width="80">',
                "lengthMenu": "แสดง _MENU_ แถวต่อหน้า",
                "zeroRecords": "ไม่มีข้อมูล",
                "info": "กำลังแสดงข้อมูล _START_ ถึง _END_ จาก _TOTAL_ รายการ",
                "search": "ค้นหา:",
                "infoEmpty": "ไม่มีข้อมูลแสดง",
                "infoFiltered": "(ค้นหาจาก _MAX_ total records)",
                "paginate": {
                    "first": "หน้าแรก",
                    "last": "หน้าสุดท้าย",
                    "next": "หน้าต่อไป",
                    "previous": "หน้าก่อน"
                }
            }
        });


    })
</script>