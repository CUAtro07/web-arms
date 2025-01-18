<?php
// Include your database connection file
include('db_connection.php');

// Get data from the AJAX request
$distributionBatchId = $_POST['distributionBatchId'];
$distributedQuantity = $_POST['distributedQuantity'];
$distributedTo = $_POST['distributedTo'];
$distributionDate = $_POST['distributionDate'];

// Prepare the SQL query to insert the data into the database
$sql = "INSERT INTO distribution_records (distributionBatchId, distributedQuantity, distributedTo, distributionDate) 
        VALUES (?, ?, ?, ?)";

// Prepare and bind the statement
$stmt = $conn->prepare($sql);
$stmt->bind_param("iiss", $distributionBatchId, $distributedQuantity, $distributedTo, $distributionDate);

// Execute the query
if ($stmt->execute()) {
    // Success: Return a success message
    echo "Distribution record added successfully.";
} else {
    // Error: Return an error message
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
