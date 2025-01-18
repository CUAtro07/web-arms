<?php
// Include database connection
include('db_connection.php');

// Fetch all users with 'pending' status
$sql = "SELECT * FROM users WHERE status = 'pending'";
$result = $conn->query($sql);

$users = [];

if ($result->num_rows > 0) {
    // Fetch all users and store in an array
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

// Return the users as JSON
echo json_encode($users);

// Close connection
$conn->close();
?>
