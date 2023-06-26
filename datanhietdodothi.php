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
         $sql="SELECT nhietdo FROM dothi";
   
           $result = $conn->query($sql);
           if($result == false)
           {
               echo $sql . "<br>";
               echo $conn ->error;
           }
           $counter = 0;
           echo '[0,';
           while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
                foreach ($row as $field => $value) {
                    echo $value;
                    // echo "<td> ," . $value . "</td>"; // I just did not use "htmlspecialchars()" function. 
                }
                
                if (++$counter == mysqli_num_rows($result)) {
                    // last row
                } else {
                    // not last row
                    echo ',';
                } 
            }
            echo ']';
       $conn->close();
?>