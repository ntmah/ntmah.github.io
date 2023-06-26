<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Trang Chủ</title>
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
<body style="background: url(https://haycafe.vn/wp-content/uploads/2022/05/Background-xanh-la-dam-1.jpg);
  background-size: cover;
  background-repeat: no-repeat">
  
        <style>

            .errorMessage {
                color: rgb(185, 0, 0);
                font-size: 14px;
            }

            div.left {
            position: absolute;
            top: 100px;
            width: 700px;
            height: 400px;
            border: 0px solid #73AD21;
            }

            div.right {
            position: absolute;
            top: 400px;
            width: 700px;
            height: 300px;
            border: 0px solid #73AD21;
            }
            div.head {
            position: absolute;
            top: 400px;
            width: 700px;
            height: 300px;
            border: 0px solid #73AD21;
            }
        </style>
    
        
<?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "dulieusun";
     
     
      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
    if ( isset($_POST['tk']) && isset($_POST['pwd'])) 
    {
        $tk   =  $_POST['tk'];
        $pwd   =  $_POST['pwd'];
        
    // Kiểm tra người dùng đã nhập liệu đầy đủ chưa
        if (!$tk || !$pwd)
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
      
     $sql="SELECT sdt,password FROM thanhvien WHERE sdt='$tk'";

        if ($result=mysqli_query($conn,$sql))
        {
        // Return the number of rows in result set
            $rowcount=mysqli_num_rows($result);
        //  printf("Result set has %d rows.\n",$rowcount);
        // Free result set
         //   mysqli_free_result($result);
        }
        if($rowcount == 0)
        {
            ?>
            <div style="text-align: center;">
                <h3 class="text-center text-primary" >Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại.</h3>
                <?php 
                    echo "<a href='javascript: history.go(-1)'>Trở lại</a>";
                    exit;
                ?>
                </div>
            <?php
        }
        $sql="SELECT * FROM thanhvien WHERE sdt = '$tk' AND password='$pwd'";

        //Lấy mật khẩu trong database ra
         $result = $conn->query($sql);
        if($result->num_rows > 0)
        {
            // echo $sql . "<br>";
            // echo $conn ->error;
        }
        else
        {
            //echo "thanh cong";
            $row = $result->fetch_assoc();
            if ($pwd != $row['password'])
            {
                ?>
                <div style="text-align: center;">
                    <h3 class="text-center text-primary" >Mật khẩu không đúng. Vui lòng nhập lại.</h3>
                    <?php 
                        echo "<a href='javascript: history.go(-1)'>Trở lại</a>";
                        exit;
                    ?>
                </div>
                 <?php
            }
        }
        $sql="SELECT den,nhietdo,doam FROM thietbiIOT,thanhvien WHERE thanhvien.sdt='$tk'and thanhvien.sdt=thietbiIOT.sdt";

        $result = $conn->query($sql);
        if($result == false)
        {
            echo $sql . "<br>";
            echo $conn ->error;
        }
        else
        {
          //  echo "thanh cong";
            $row = $result->fetch_assoc();
            $den= $row['den'];
            $nhietdo= $row['nhietdo'];
            $doam= $row['doam'];
        }
    }
    else
    {
       // echo "error";
    } 
    $conn->close();
?>
    <h3  style = "color: darkblue; text-align: center; font-weight:bold ;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif" >MY HOME</h3>
    <h5 style="margin-left: 540px;margin-top: 50px;"  class="text-left text-primary" style = "margin-top:20px">TẦNG 1</h5>
    <div style = "margin-left:350px" >
            <div class="left row justify-content-center" style="right:320px; margin-top: 60px">
                    <div class="col-md-4">
                        <div id="p3" class="bd rd" style=" background-color: wheat">
                            <form class="form-group" style="text-align: center;" action="chau1tang1.php" method="POST">
                                <label class="font" for="ftkmssv">CHẬU 1 <br></label>
                                <img id="pkhach" src="hinhanh/chau.jpg" width="100" height="100">
    
                            <div style="text-align: center;">
                            <button style = "margin-top:20px" class="btn btn-primary col-md-5" type="submit" class="btn btn-default" formaction="chau1tang1.php">Open</button>
                            </div>
                            <div class="form-group" style="display: none;">
                                <label for="ftk">mssv:</label>
                                <input type="text" class="form-control" id="ftk" name="tk" value="<?=$tk?>">
                                <input type="text" class="form-control" id="fden" name="den" value="<?=$den?>">
                                <input type="text" class="form-control" id="ftk" name="nhietdo" value="<?=$nhietdo?>">
                                <input type="text" class="form-control" id="fdoam" name="doam" value="<?=$doam?>">
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div id="p3" class="bd rd" style=" background-color: wheat">
                            <form class="form-group" style="text-align: center;" action="chau2tang1.php" method="POST">
                                <label class="font" for="ftkmssv">CHẬU 2 <br></label>
                                <img id="pngu1" src="hinhanh/chau.jpg" width="100" height="100">
                                <div style="text-align: center;">
                                <button style = "margin-top:20px" class="btn btn-primary col-md-5" type="submit" class="btn btn-default" formaction="chau2tang1.php">Open</button>
                                </div>
                                <div class="form-group" style="display: none;">
                                <label for="ftk">mssv:</label>
                                <input type="text" class="form-control" id="ftk" name="tk" value="<?=$tk?>">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div id="p3" class="bd rd" style=" background-color: wheat">
                            <form class="form-group" style="text-align: center;" action="chau3tang1.php" method="POST">
                                <label class="font" for="ftkmssv">CHẬU 3 <br></label>
                                <img id="pbep" src="hinhanh/chau.jpg" width="100" height="100">
                                <div style="text-align: center;">
                                <button style = "margin-top:20px" class="btn btn-primary col-md-5" type="submit" class="btn btn-default" formaction="chau3tang1.php">Open</button>
                                </div>
                                <div class="form-group" style="display: none;">
                                <label for="ftk">mssv:</label>
                                <input type="text" class="form-control" id="ftk" name="tk" value="<?=$tk?>">
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
    </div>
    <div style = "margin-left:350px" >
            <div class="right row justify-content-center" style="right:320px">
                    <div class="col-md-4">
                    <h5 style="text-right: 0px;margin-top: 0px;" class="head text-left text-primary">TẦNG 2</h5>
                        <div id="p3" class="bd rd" style=" background-color: wheat">
                            <form class="form-group" style="text-align: center;" action="chau1tang2.php" method="POST">
                                <label class="font" for="ftkmssv">CHẬU 1 <br></label>
                                <img id="pngu2" src="hinhanh/chau.jpg" width="100" height="100">
                                <div style="text-align: center;">
                                <button style = "margin-top:20px" class="btn btn-primary col-md-5" type="submit" class="btn btn-default" formaction="chau1tang2.php">Open</button>
                                </div>
                                <div class="form-group" style="display: none;">
                                <label for="ftk">mssv:</label>
                                <input type="text" class="form-control" id="ftk" name="tk" value="<?=$tk?>">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                    <h5><br></h5>
                        <div id="p3" class="bd rd" style=" background-color: wheat">
                            <form class="form-group" style="text-align: center;" action="chau2tang2.php" method="POST">
                                <label class="font" for="ftkmssv">CHẬU 2 <br></label>
                                <img id="pngu3" src="hinhanh/chau.jpg" width="100" height="100">
                                <div style="text-align: center;">
                                <button style = "margin-top:20px" class="btn btn-primary col-md-5" type="submit" class="btn btn-default" formaction="chau2tang2.php">Open</button>
                                </div>
                                <div class="form-group" style="display: none;">
                                <label for="ftk">mssv:</label>
                                <input type="text" class="form-control" id="ftk" name="tk" value="<?=$tk?>">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                    <h5><br></h5>
                        <div id="p3" class="bd rd" style=" background-color: wheat">
                            <form class="form-group" style="text-align: center;" action="chau3tang2.php" method="POST">
                                <label class="font" for="ftkmssv">CHẬU 3 <br></label>
                                <img id="pngu4" src="hinhanh/chau.jpg" width="100" height="100">
                                <div style="text-align: center;">
                                <button style = "margin-top:20px" class="btn btn-primary col-md-5" type="submit" class="btn btn-default" formaction="chau3tang2.php">Open</button>
                                </div>
                                <div class="form-group" style="display: none;">
                                <label for="ftk">mssv:</label>
                                <input type="text" class="form-control" id="ftk" name="tk" value="<?=$tk?>">
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
    </div>
    
</body>

</html>