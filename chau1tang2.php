<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/img/logo.jpg" rel="icon">
  <link href="assets/img/logo.jpg" rel="apple-touch-icon">
    <title>Đăng nhập</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="assets/css/style.css" rel="stylesheet">
    <script>
        $(document).ready(function() {
            setInterval(function() {
                updateData();
            }, 3000);
        });

        function updateData() {
            $.ajax({
                url: 'fetch_data.php',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('#data1').text(response.data1);
                    $('#data2').text(response.data2);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }
        
        
        
    
    </script>
    <script>function performActions() {
            changeHeading(); // Gọi hàm thực hiện hành động thứ nhất
            doSomethingElse(); // Gọi hàm thực hiện hành động thứ hai
        }
        function changeHeading() {
             var newTitle = "ĐỘNG CƠ HOẠT ĐỘNG"; // Tiêu đề mới bạn muốn thay đổi
             document.getElementById("heading").innerHTML = newTitle; // Thay đổi nội dung của tiêu đề
        }
        function doSomethingElse() {
            document.getElementById('led').src='hinhanh/on.png'
        }</script>
    <script>
        function performActions1() {
            changeHeading1(); // Gọi hàm thực hiện hành động thứ nhất
            doSomethingElse1(); // Gọi hàm thực hiện hành động thứ hai
        }
        function changeHeading1() {
             var newTitle1 = "ĐỘNG CƠ ĐANG TẮT"; // Tiêu đề mới bạn muốn thay đổi
             document.getElementById("heading").innerHTML = newTitle1; // Thay đổi nội dung của tiêu đề
        }
        function doSomethingElse1() {
            document.getElementById('led').src='hinhanh/off.png'
        }
    </script>
</head>

<body style="background: url(https://media.istockphoto.com/id/1276735645/vi/vec-to/plank-b%C3%A0n-m%C3%A0u-xanh-nh%E1%BA%A1t-tr%C3%AAn-ph%C3%B2ng-t%C6%B0%E1%BB%9Dng-cho-n%E1%BB%81n-ph%C3%B4ng-n%E1%BB%81n-m%C3%A0u-xanh-sao-ch%C3%A9p-kh%C3%B4ng-gian-%C4%91%E1%BB%83.jpg?s=612x612&w=0&k=20&c=2hJKlsiw9Im96IKt722UuqafH8FTn5SfY3kEBHP-1AU=) ;background-size: cover;
  background-repeat: no-repeat">
        <style>
            .errorMessage {
                color: rgb(185, 0, 0);
                font-size: 14px;
            }

            div.left {
            position: absolute;
            top: 200px;
            width: 800px;
            height: 300px;
            border: 0px solid #73AD21;
            }

            div.dothi {
            position: absolute;
            top: 400px;
            left: -200px;
            width: 2000px;
            height: 50px;
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
      if ( isset($_POST['tk'])) 
        {
        $tk   =  $_POST['tk'];
        }
        $sql="SELECT sdt FROM thanhvien WHERE sdt='$tk'";

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

        $sql="SELECT den, nhietdo, doam FROM thietbiIOT,thanhvien WHERE thanhvien.sdt='$tk'and thanhvien.sdt=thietbiIOT.sdt";

        $result = $conn->query($sql);
        if($result == false)
        {
            echo $sql . "<br>";
            echo $conn ->error;
        }
        else
        {
            //echo "thanh cong";
            $row = $result->fetch_assoc();
            $den= $row['den'];
            $nhietdo= $row['nhietdo'];
            $doam= $row['doam'];
        }
    $conn->close();
?>


    <h3 class="text-center text-primary" style = "margin-top:20px">THIẾT BỊ IOT</h3>
    <div style = "margin-left:300px" >
            <div class="left row justify-content-center" style="right:350px">
                    <div class="col-md-4">
                        <div id="p3" class="bd rd" style=" background-color: white">
                            <div class="form-group" style="text-align: center; margin-bottom: 1.6rem">
                                <label class="text-primary" for="ftkmssv" id="heading">ĐỘNG CƠ ĐANG TẮT <br></label>
                                <img id="led" src="hinhanh/off.png" width="120" height="145">
                            </div>
                            <div style="text-align: center;">
                                <button style="background: red" class="btn btn-primary" onclick="performActions1() ">OFF</button>
                                <button style="background: green" class="btn btn-primary" onclick="performActions()" >ON</button>
                            </div>
                            <!-- <form class="form-group" >
                            <button style = "margin-top:10px" class="btn btn-primary col-md-12" type="submit" class="btn btn-default" formaction="dothiden.php">PHÂN TÍCH</button>
                            </form> -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div id="p3" class="bd rd" style=" background-color: white">
                            <div class="form-group" style="text-align: center;">
                                <label class="text-primary" for="ftkmssv">NHIỆT ĐỘ <br></label>
                                <img id="led" src="hinhanh/nhietdo.png" width="120" height="80">
                                <h3 class="text-center text-primary"><span id="data1"></span></h3>
                            </div>
                            <form class="form-group" >
                            <button style = "margin-top:10px" class="btn btn-primary col-md-12" type="submit" class="btn btn-default" formaction="dothinhietdo.php">PHÂN TÍCH</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div id="p3" class="bd rd" style=" background-color: white">
                            <div class="form-group" style="text-align: center;">
                                <label class="text-primary" for="ftkmssv">ĐỘ ẨM <br></label>
                                <img id="led" src="hinhanh/doam.png" width="150" height="80">
                                <h3 class="text-primary"><span id="data2"></span></h3>
                            </div>
                            <form class="form-group" >
                            <button style = "margin-top:10px" class="btn btn-primary col-md-12" type="submit" class="btn btn-default" formaction="dothidoam.php">PHÂN TÍCH</button>
                            </form>
                        </div>
                    </div>
            </div>
    </div>      
</body>

</html>