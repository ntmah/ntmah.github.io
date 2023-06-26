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
         $sql = "SELECT * FROM datanhietdo";
$result = $conn->query($sql);

// Khởi tạo mảng dữ liệu
$data = array();

// Kiểm tra và xử lý dữ liệu
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Thêm dữ liệu vào mảng
        $data[] = $row["nhietdo"];
    }
}

// Đóng kết nối
$conn->close();
?>