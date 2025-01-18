<?php
session_start();
include('db_connection.php');

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error_message' => 'User not logged in.']);
    exit();
}

// Get the user ID from the session
$user_id = $_SESSION['user_id'];

// Fetch user data from the database
$sql = "SELECT * FROM users WHERE user_id = ? LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Fetch activities for this user (optional, if applicable)
    $activity_sql = "SELECT * FROM activities WHERE user_id = ? ORDER BY timestamp DESC";
    $activity_stmt = $conn->prepare($activity_sql);
    $activity_stmt->bind_param("i", $user_id);
    $activity_stmt->execute();
    $activity_result = $activity_stmt->get_result();
    $activities = [];

    while ($activity = $activity_result->fetch_assoc()) {
        $activities[] = $activity;
    }

    // Return the user profile and activities data as JSON
    echo json_encode([
        'user' => $user,
        'activities' => $activities
    ]);
} else {
    echo json_encode(['error_message' => 'User data not found.']);
}
?>
