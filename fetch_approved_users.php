<?php
// Include database connection
include('db_connection.php');

// Fetch all users with 'approved' status
$sql = "SELECT * FROM users WHERE status = 'approved'";
$result = $conn->query($sql);

$approvedUsers = [];

if ($result->num_rows > 0) {
    // Fetch all users and store in an array
    while ($row = $result->fetch_assoc()) {
        $approvedUsers[] = $row;
    }
}

// Return the approved users as JSON
echo json_encode($approvedUsers);

// Close connection
$conn->close();
?>
