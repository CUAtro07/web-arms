<?php
// Include your database connection
include('db_connection.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if the necessary POST data exists
if (isset($_POST['batchName'], $_POST['batchNumber'], $_POST['totalQuantity'])) {
    // Sanitize and assign the POST data to variables
    $batchName = mysqli_real_escape_string($conn, $_POST['batchName']);
    $batchNumber = mysqli_real_escape_string($conn, $_POST['batchNumber']);
    $totalQuantity = (int)$_POST['totalQuantity'];

    // Generate a custom batch ID (e.g., BATCH-<timestamp>)
    $batchId = 'BATCH-' . time();

    // Prepare SQL query to insert batch data into the database
    $sql = "INSERT INTO distribution_batches (batch_id, batch_name, batch_number, total_quantity, remaining_quantity) 
            VALUES ('$batchId', '$batchName', '$batchNumber', $totalQuantity, $totalQuantity)";

    if (mysqli_query($conn, $sql)) {
        
        // Return the new batch information as a JSON response
        echo json_encode([
            "status" => "success",
            "batch_id" => $batchId,
            "batch_name" => $batchName,
            "batch_number" => $batchNumber,
            "total_quantity" => $totalQuantity
            
        ]);
    } else {
        // Return an error response in case of failure
        echo json_encode([
            "status" => "error",
            "message" => mysqli_error($conn)
        ]);
    }
} else {
    // Return a response indicating that required data is missing
    echo json_encode([
        "status" => "error",
        "message" => "Required data missing!"
    ]);
}



// Close the database connection awawawaw
mysqli_close($conn);
?>
