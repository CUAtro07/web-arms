<?php
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profilePicture'])) {
    $userId = $_POST['userId'];
    $targetDir = "uploads/";
    $profilePicture = $targetDir . basename($_FILES["profilePicture"]["name"]);
    
    if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $profilePicture)) {
        $sql = "UPDATE users SET profile_picture = ? WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $profilePicture, $userId);
        $stmt->execute();

        header("Location: farmersportal.html"); // Redirect back to profile
    } else {
        echo "Error uploading profile picture.";
    }
}
?>
