<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <link rel="shortcut icon" href="./hinhanh/logosanpham.jpg" type="image/x-icon">
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link href="assets/img/logo.jpg" rel="icon">
  <link href="assets/img/logo.jpg" rel="apple-touch-icon">
    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body> 
        <!-- <style>
            .errorMessage {
                color: rgb(185, 0, 0);
                font-size: 14px;
            }

            div.left {
            position: absolute;
            top: 450px;
            left: 405px;
            width: 540px;
            height: 300px;
            border: 0px solid #73AD21;
            }
        </style> -->
    <tbody>
         </div>
         <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 style="font-family: fangsong" class="form-title">TÌM KIẾM THÔNG TIN</h2>
                        <form method="POST" class="register-form" action='timkiemmatkhau.php' id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input style="font-family: fangsong" type="text" id="name" placeholder="Nhập Họ và Tên" name="hvt"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-phone"></i></label>
                                <input style="font-family: fangsong" type="text" id="email" placeholder="Nhập Số Điện Thoại" name="sdt"/>
                            </div>
                            <div class="form-group">
                                <label for="fns"><i class="zmdi zmdi-calendar"></i></label>
                                <input style="font-family: fangsong" type="date" id="fns" placeholder="Nhập Ngày Sinh" name="ns"/>
                            </div>
                            <!-- <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" id="pass" placeholder="Nhập Mật Khẩu" name="pwd"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" id="re_pass" placeholder="Nhập Lại Mật Khẩu" name="rpwd"/>
                            </div> -->
                            <!-- <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div> -->
                            
                            <div class="form-group form-button">
                                <input style="font-family: fangsong" type="submit" name="signup" id="signup" formaction="trangchu.html" class="form-submit" value="Hủy"/>
                                <input style="font-family: fangsong" type="submit" name="signup" id="signup" class="form-submit" value="Tìm Kiếm"/>
                                <input style="font-family: fangsong" type="submit" name="signup" id="signup" formacion="trangchu.html" class="form-submit" value="Quay Lại"/>
                            </div>
                        </form>
            </div>
    </tbody>
    <?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "dulieusun";
     
     //session_start();
      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) 
      {
        die("Connection failed: " . $conn->connect_error);
      }
    // //Kiểm tra tên đăng nhập sai khong
    // $sql = "SELECT * FROM thanhvien WHERE taikhoan='$tk'AND password='$pwd'";
    if ( isset($_POST['sdt']) && isset($_POST['hvt']) && isset($_POST['ns'])) 
    {
        $tk   =  $_POST['sdt'];
        $hovaten   =  $_POST['hvt'];
        $ngaysinh   =  $_POST['ns'];

        // Kiểm tra người dùng đã nhập liệu đầy đủ chưa
        if (!$tk || !$hovaten || !$ngaysinh)
        {   
            ?>
                <div style="text-align: center;">
                <h4 class="text-center text-primary" >Vui lòng nhập đầy đủ thông tin</h4>
                </div>
            <?php
        }
    
        $sql= "SELECT sdt, hovaten, ngaysinh, repassword FROM thanhvien WHERE sdt='$tk' and hovaten='$hovaten'and ngaysinh='$ngaysinh'";
        $result = $conn->query($sql);
            if($result == false)
            {
                echo $sql . "<br>";
                echo $conn ->error;
            }

        else
        {
            $row = $result->fetch_assoc();
            $sdt = $row['sdt'];
            $hovaten = $row['hovaten'];
            $ngaysinh = $row['ngaysinh'];
            $matkhau = $row['repassword'];
            if($row['sdt'] && $row['hovaten'] && $row['ngaysinh'] && $row['repassword'])
            {
            ?>
            <br>
             <div class="left">
                 <h5 class="text-primary" style="text-align: center;" ><br>THÔNG TIN CỦA BẠN<br></h5>
                 <table  class="table table-hover border p-3 rounded"  style="text-align: center;">
                     <tr>
                         <td class="text-primary" >Số Điện Thoại</td>
                         <td><?=$row['sdt']?></td>
                     </tr>
                     <tr>
                         <td class="text-primary" >Mật khẩu của bạn</td>
                         <td><?=$row['repassword']?></td>
                     </tr>
                 </table>
             </div>
            <?php
            }
            else 
            {
                ?>
                <div style="text-align: center;">
                <h5 class="text-primary" ><br>BẠN CHƯA CÓ THÔNG TIN<br></h5>
                </div>
                <?php
            } 
        }     
    }
  $conn->close();
    ?>
</body>
</div>
</html>

