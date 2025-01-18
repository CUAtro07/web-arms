<?php
header('Content-Type: application/json');
// Include your database connection
include('db_connection.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $_DELETE);
    $activityId = $_DELETE['id'];

    // Database connection
    include 'db_connection.php';

    $query = "DELETE FROM activities WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $activityId);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }

    $stmt->close();
    $conn->close();
}
?>
