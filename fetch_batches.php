<?php
// Include your database connection
include('db_connection.php');

// Set the content type to JSON
header('Content-Type: application/json');

// Prepare SQL query to fetch all batches from the database
$sql = "SELECT * FROM distribution_batches";

// Execute the query
$result = mysqli_query($conn, $sql);

// Initialize an array to hold the batches
$batches = [];

// Check if any batches are found
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        // Fetch each batch
        while ($batch = mysqli_fetch_assoc($result)) {
            // Add batch data to the array
            $batches[] = $batch;
        }

        // Return the batches as a JSON response
        echo json_encode([
            "status" => "success",
            "batches" => $batches
        ]);
    } else {
        // No batches found
        echo json_encode([
            "status" => "error",
            "message" => "No batches found!"
        ]);
    }
} else {
    // Query execution failed
    echo json_encode([
        "status" => "error",
        "message" => "Failed to fetch batches: " . mysqli_error($conn)
    ]);
}

// Close the database connection
mysqli_close($conn);
?>
