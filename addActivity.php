<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('db_connection.php');
header('Content-Type: application/json');


if (isset($_FILES['activityImage'])) {
    $activityType = $_POST['activityType'];
    $activityCaption = $_POST['activityCaption'];
    $file = $_FILES['activityImage'];
    $target_dir = "activity_uploads/"; // This is where uploaded files will go
    $targetFile = $targetDir . basename($file['name']);
    
    // Move the file to the target directory
    if (move_uploaded_file($file['tmp_name'], $targetFile)) {
        // Insert the activity record into the database
        $userId = $_SESSION['user_id'];
        $sql = "INSERT INTO activities (user_id, type, caption, image_url) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isss", $userId, $activityType, $activityCaption, $targetFile);
        $stmt->execute();

        echo json_encode([
            "success" => true,
            "activity" => [
                "type" => $activityType,
                "caption" => $activityCaption,
                "imageUrl" => $targetFile
            ]
        ]);
    } else {
        echo json_encode(["success" => false]);
    }
}
?>
