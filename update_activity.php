<?php
// Include database connection
include('db_connection.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $activityId = $input['id'];
    $activityType = $input['type'];
    $activityCaption = $input['caption'];

    // Database connection
    include 'db_connection.php';

    $query = "UPDATE activities SET type = ?, caption = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $activityType, $activityCaption, $activityId);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }

    $stmt->close();
    $conn->close();
}
?>
