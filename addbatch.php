<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "arms_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]));
}

$data = json_decode(file_get_contents('php://input'), true);

$batchName = $data['batchName'];
$batchNumber = $data['batchNumber'];
$totalQuantity = $data['totalQuantity'];

$sql = "INSERT INTO batches (batch_name, batch_number, total_quantity) VALUES ('$batchName', '$batchNumber', '$totalQuantity')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success", "batch_id" => $conn->insert_id]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

$conn->close();
?>
