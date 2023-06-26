<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dulieusun";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch random data from table 1
$sql1 = "SELECT ndo FROM datanhietdo ORDER BY RAND() LIMIT 1";
$result1 = $conn->query($sql1);
$data1 = $result1->fetch_assoc()['ndo'];

// Query to fetch random data from table 2
$sql2 = "SELECT dam FROM datadoam ORDER BY RAND() LIMIT 1";
$result2 = $conn->query($sql2);
$data2 = $result2->fetch_assoc()['dam'];

$conn->close();

$response = array(
    'data1' => $data1,
    'data2' => $data2
);

echo json_encode($response);
?>
