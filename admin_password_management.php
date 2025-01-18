<?php
include('db_connection.php');

// Check if POST data exists
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get POST data
    $userType = $_POST['user_type'] ?? null;
    $userId = $_POST['user_id'] ?? null;
    $newPassword = isset($_POST['new_password']) ? password_hash($_POST['new_password'], PASSWORD_DEFAULT) : null;

    // Debugging: Log received data
    error_log("Received data: userType=$userType, userId=$userId, newPassword=$newPassword");

    if ($userType && $userId && $newPassword) {
        // Determine table and ID column
        $table = $userType === 'admin' ? 'admins' : 'users';  // Table selection based on user type
        $idColumn = $userType === 'admin' ? 'admin_id' : 'rsba_number';  // ID column based on user type

        // Update password SQL query for admins table
        if ($userType === 'admin') {
            $sql = "UPDATE admins SET password = '$newPassword' WHERE admin_id = '$userId'";
        } else {
            // Update password SQL query for users table
            $sql = "UPDATE users SET password = '$newPassword' WHERE rsba_number = '$userId'";
        }

        // Debugging: Log the SQL query
        error_log("SQL query: $sql");

        if ($conn->query($sql) === TRUE) {
            echo json_encode(['success' => true, 'message' => 'Password reset successfully.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error resetting password: ' . $conn->error]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid input data.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}


// Close the database connection
$conn->close();
?>
