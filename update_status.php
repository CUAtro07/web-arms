<?php
// Include database connection
include('db_connection.php');

// Check if the request method is POST and the required data is present
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id']) && isset($_POST['action'])) {
    $user_id = $_POST['user_id'];
    $action = $_POST['action'];

    // Determine the new status based on the action
    $new_status = ($action === 'approve') ? 'approved' : 'denied';

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("UPDATE users SET status = ? WHERE user_id = ?");
    $stmt->bind_param("si", $new_status, $user_id);

    // Execute the statement and check if it was successful
    if ($stmt->execute()) {
        echo '<script>alert("User status updated successfully."); window.location.href = "manage_users.html";</script>';
    } else {
        echo '<script>alert("Failed to update user status."); window.location.href = "manage_users.html";</script>';
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Handle invalid requests
    echo '<script>alert("Invalid request or missing data."); window.location.href = "manage_users.html";</script>';
}
?>
