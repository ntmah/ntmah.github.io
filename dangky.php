<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Đăng Ký</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.jpg" rel="icon">
  <link href="assets/img/logo.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Green
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/green-free-one-page-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dulieusun";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            echo "Connect error";
            die("Connection failed: " . $conn->connect_error);
        }
        if ( isset($_POST['tk']) && isset($_POST['pwd']) && isset($_POST['rpwd']) && isset($_POST['hvt'])
        && isset($_POST['ns']) && isset($_POST['nhietdo']) && isset($_POST['doam']) && isset($_POST['den'])) 
        {
            $hovaten   =  $_POST['hvt'];
            $ngaysinh   =  $_POST['ns'];
            $tk   =  $_POST['tk'];
            $pwd   =  $_POST['pwd'];
            $rpwd   =  $_POST['rpwd'];
            $nhietdo   =  $_POST['nhietdo'];
            $doam   =  $_POST['doam'];
            $den   =  $_POST['den'];

            // Kiểm tra người dùng đã nhập liệu đầy đủ chưa
            if (!$tk || !$pwd|| !$rpwd|| !$hovaten|| !$ngaysinh )
            {   
                ?>
                <div style="text-align: center;">
                    <h3 class="text-center text-primary" >Vui lòng nhập đầy đủ thông tin</h3>
                    <?php 
                        echo "<a href='javascript: history.go(-1)'>Trở lại</a>";
                        exit;
                    ?>
                </div>
                <?php
            }

            // Mã khóa mật khẩu
            $pwd = md5($pwd);

            //Kiểm tra tên đăng nhập này đã có người dùng chưa
            // if (mysql_num_rows(mysql_query("SELECT * FROM thanhvien WHERE taikhoan='$tk'")) > 0){
                // echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
                // exit;
            // }

            $sql="SELECT sdt FROM thanhvien WHERE sdt='$tk'";
            
            if ($result=mysqli_query($conn,$sql)){
            // Return the number of rows in result set
                $rowcount=mysqli_num_rows($result);
              //printf("Result set has %d rows.\n",$rowcount);
            // Free result set
            //    mysqli_free_result($result);
            }

            if($rowcount>0)
            {
                ?>
                <div style="text-align: center;">
                    <h3 class="text-center text-primary" >Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác.</h3>
                    <?php 
                        echo "<a href='javascript: history.go(-1)'>Trở lại</a>";
                        exit;
                    ?>
                    </div>
                <?php
            }

            $sql = "INSERT INTO thietbiiot (sdt, nhietdo, doam, den )
                VALUES ('$tk', '$nhietdo', '$doam', '$den')";
            $result = $conn->query($sql);
                if($result == false)
                {
                    echo $sql . "<br>";
                    echo $conn ->error;
                }
                else
                {
                    //  echo "thanh cong";
                }

            $sql = "INSERT INTO thanhvien (sdt, password, ngaysinh, hovaten, repassword )
                VALUES ('$tk', '$pwd', '$ngaysinh', '$hovaten','$rpwd')";
            $result = $conn->query($sql);
                if($result == false)
                {
                    echo $sql . "<br>";
                    echo $conn ->error;
                }
                else
                {
                    //  echo "thanh cong";
                }
        }
        else
        {
           // echo "error";
        }
        // var_dump($tk);
    $conn->close();
    ?>

    <div class="container">
        <h3 style="font-family: fangsong" class="mt-5 mb-3 text-center text-primary">CHÚC MỪNG BẠN ĐĂNG KÝ TÀI KHOẢN THÀNH CÔNG</h3>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form  action="dangnhap.html" method="post">
                        <div class="form-group" style="text-align: center;">
                            <button style="font-family: fangsong" class="btn btn-primary" type="submit" class="btn btn-default">ĐĂNG NHẬP</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>

</body>

</html>