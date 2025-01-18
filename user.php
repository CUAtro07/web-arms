<?php
// Database connection
include('db_connection.php');

// Fetch all users
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

$users = [];

while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}

// Return the users in JSON format
echo json_encode($users);
?>
