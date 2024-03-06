<?php
session_start();
echo '
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
//เช็คว่ามีตัวแปร session อะไรบ้าง
//print_r($_SESSION);
//exit();
//สร้างเงื่อนไขตรวจสอบสิทธิ์การเข้าใช้งานจาก session
if (empty($_SESSION['id']) && empty($_SESSION['name']) && empty($_SESSION['surname'])) {
    echo '<script>
                setTimeout(function() {
                swal({
                title: "คุณไม่มีสิทธิ์ใช้งานหน้านี้",
                type: "error"
                }, function() {
                window.location = "login.php"; //หน้าที่ต้องการให้กระโดดไป
                });
                }, 1000);
                </script>';
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Water Management System: หน้าหลัก</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12"> <br>
                <h3>Menu</h3>
            </div>
            <div class="col-md-3">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                        <?= $_SESSION['name'] . ' ' . $_SESSION['surname']; ?>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">หน้าหลัก</a>
                    <a href="#" class="list-group-item list-group-item-action">ภาพรวม</a>
                    <a href="#" class="list-group-item list-group-item-action">จัดการ</a>
                    <a href="#" class="list-group-item list-group-item-action">รายงาน</a>
                    <a href="logout.php" class="list-group-item list-group-item-danger" onclick="return confirm('ยืนยันการออกจากระบบ');">ออกจากระบบ</a>
                </div>
            </div>
            <div class="col-md-9">
                <h1 class="text-center">Water Management System: หน้าหลัก</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">หมู่บ้าน</th>
                            <th scope="col">จำนวนประชากร</th>
                            <th scope="col">ตัวเลือก</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>โพนงาม</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>โนนศิลา</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>ถ่อนใต้</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>ดอนแดง</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>ถ่อนเหนือ</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td>หนองกก</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">7</th>
                            <td>ถ่อนโพธิ์ศรี</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">8</th>
                            <td>โพนเจริญ</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">9</th>
                            <td>โพนเจริญ (เวียงคุก)</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <center>Basic Login PHP PDO by devbanban.com 2021</center>
</body>

</html>