<?php
session_start();
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profile_picture'])) {
    // Set the directory for uploads
    $upload_dir = __DIR__ . '/uploads/';

    // Check if the uploads directory exists
    if (!file_exists($upload_dir)) {
        echo json_encode(['error' => 'Upload directory does not exist.']);
        exit;
    }

    // Sanitize and move the uploaded file
    $filename = basename($_FILES['profile_picture']['name']);
    $sanitized_filename = preg_replace("/[^a-zA-Z0-9._-]/", "_", $filename);
    $target_file = $upload_dir . $sanitized_filename;

    // Move the file to the uploads directory
    if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_file)) {
        // Update user profile picture in the database
        $user_id = $_SESSION['user_id'];
        $sql = "UPDATE users SET profile_picture = ? WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $sanitized_filename, $user_id);
        $stmt->execute();
        
        // Return the new profile picture URL as JSON response
        echo json_encode(['success' => 'File uploaded successfully.', 'profile_picture' => 'uploads/' . $sanitized_filename]);
    } else {
        echo json_encode(['error' => 'Error uploading file. Please check the upload directory.']);
    }
}
?>
