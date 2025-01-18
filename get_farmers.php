<?php
// Database connection
$conn = new mysqli('localhost', 'username', 'password', 'arms_db');

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$rsba = $_GET['rsba'];

// Use prepared statement to prevent SQL injection
$stmt = $conn->prepare("SELECT name, rsba_number FROM farmers WHERE rsba_number LIKE ?");
$searchTerm = "%$rsba%";
$stmt->bind_param('s', $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

$farmers = [];
while ($row = $result->fetch_assoc()) {
    $farmers[] = $row;
}

// Set content type to JSON
header('Content-Type: application/json');
echo json_encode($farmers);

$stmt->close();
$conn->close();
?>
