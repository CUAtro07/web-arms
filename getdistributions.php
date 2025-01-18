<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "arms_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]));
}

$batchId = $_GET['batchId'];

$sql = "SELECT * FROM distributions WHERE batch_id = '$batchId'";
$result = $conn->query($sql);

$distributions = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $distributions[] = $row;
    }
}

echo json_encode($distributions);

$conn->close();
?>
