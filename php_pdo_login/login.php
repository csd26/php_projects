<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Water Management System: Login</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-8"> <br>
                <h4>Water Management System</h4>
                <form action="" method="post">
                    <div class="mb-2">
                        <div class="col-sm-9">
                            <input type="text" name="username" class="form-control" required minlength="3" placeholder="Username" value="csd26">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" required minlength="3" placeholder="Password" value="12345678">
                        </div>
                    </div>
                    <div class="d-grid gap-2 col-sm-9 mb-3">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <center>Create By Chinnawat Suwanpasert (Disk)</center>
</body>

</html>


<?php

//print_r($_POST); //ตรวจสอบมี input อะไรบ้าง และส่งอะไรมาบ้าง 
//ถ้ามีค่าส่งมาจากฟอร์ม
if (isset($_POST['username']) && isset($_POST['password'])) {
    // sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    //ไฟล์เชื่อมต่อฐานข้อมูล
    require_once 'connect.php';
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $username = $_POST['username'];
    $password = $_POST['password']; //เก็บรหัสผ่านในรูปแบบ sha1 

    //check username  & password
    $stmt = $conn->prepare("SELECT u_id, u_firstname, u_lastname FROM users WHERE u_username = :username AND u_password = :password");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->execute();

    //กรอก username & password ถูกต้อง
    if ($stmt->rowCount() == 1) {
        //fetch เพื่อเรียกคอลัมภ์ที่ต้องการไปสร้างตัวแปร session
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        //สร้างตัวแปร session
        $_SESSION['id'] = $row['u_id '];
        $_SESSION['name'] = $row['u_firstname'];
        $_SESSION['surname'] = $row['u_lastname'];

        //เช็คว่ามีตัวแปร session อะไรบ้าง
        //print_r($_SESSION);

        // exit();

        header('Location: main.php'); //login ถูกต้องและกระโดดไปหน้าตามที่ต้องการ
    } else { //ถ้า username or password ไม่ถูกต้อง

        echo '<script>
                       setTimeout(function() {
                        swal({
                            title: "เกิดข้อผิดพลาด",
                             text: "Username หรือ Password ไม่ถูกต้อง ลองใหม่อีกครั้ง",
                            type: "warning"
                        }, function() {
                            window.location = "login.php"; //หน้าที่ต้องการให้กระโดดไป
                        });
                      }, 1000);
                  </script>';
        $conn = null; //close connect db
    } //else
} //isset 
//devbanban.com
?>