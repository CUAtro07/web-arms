<?php
// get_farmer_by_rsba.php

// Assuming you already have a database connection established
require 'db_connection.php';  // Include your DB connection file

// Get the RSBA number from the query string
$sql = "SELECT rsba_number, name FROM farmers WHERE rsba_number = ? AND status = 'approved'";

// Prepare and execute the query to find the farmer based on RSBA number
if ($rsbaNumber) {
    $stmt = $pdo->prepare("SELECT name FROM farmers WHERE rsba_number = ?");
    $stmt->execute([$rsbaNumber]);

    // Check if a farmer is found
    if ($stmt->rowCount() > 0) {
        $farmer = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode(['success' => true, 'farmerName' => $farmer['name']]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Farmer not found']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'RSBA number is required']);
}
?>
