<?php
session_start();
include('db_connection.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(["message" => "User not logged in."]);
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user details for identification (including barangay and rsba_number)
$sql = "SELECT barangay, rsba_number FROM users WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo json_encode(["message" => "User does not exist."]);
    exit();
}

// Get the current timestamp
$timestamp = date("Y-m-d H:i:s");

// Fetch the barangay and rsba_number from the user data
$barangay = $user['barangay'];
$rsba_number = $user['rsba_number'];

// Check if the form is submitted and activity details are received
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['activityImage']) && isset($_POST['activityType']) && isset($_POST['activityCaption'])) {
    $activityType = $_POST['activityType'];
    $activityImage = $_FILES['activityImage'];
    $activityCaption = $_POST['activityCaption'];

    // Validate image file
    if ($activityImage['error'] == 0) {
        $file_name = basename($activityImage['name']);
        $target_dir = "activity_uploads/"; // This is where uploaded files will go
        $target_file = $target_dir . $file_name;
        $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if it's a valid image type (JPG, JPEG, PNG, GIF)
        if (in_array($image_file_type, ['jpg', 'jpeg', 'png', 'gif'])) {
            if (move_uploaded_file($activityImage['tmp_name'], $target_file)) {
                // Insert activity into the database including timestamp, barangay, and rsba_number
                $sql = "INSERT INTO activities (user_id, activity_type, activity_image, activity_caption, timestamp, rsba_number, barangay) 
                        VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("issssss", $user_id, $activityType, $file_name, $activityCaption, $timestamp, $rsba_number, $barangay);

                if ($stmt->execute()) {
                    echo json_encode(["message" => "Activity uploaded successfully.", "redirect" => "farmerportal.html"]);
                } else {
                    echo json_encode(["message" => "Error saving activity to the database."]);
                }
            } else {
                echo json_encode(["message" => "Error uploading activity image."]);
            }
        } else {
            echo json_encode(["message" => "Invalid image file type."]);
        }
    } else {
        echo json_encode(["message" => "Error uploading image."]);
    }
} else {
    echo json_encode(["message" => "Invalid request."]);
}
?>
