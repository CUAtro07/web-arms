<?php
// Include your database connection
include('db_connection.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Check if the necessary POST data exists
if (isset($_POST['batchId'])) {
    $batchId = (int)$_POST['batchId'];

    // Prepare SQL to delete the batch
    $deleteBatchSql = "DELETE FROM distribution_batches WHERE batch_id = $batchId";
    
    if (mysqli_query($conn, $deleteBatchSql)) {
        // Also delete related distribution records
        $deleteDistributionsSql = "DELETE FROM distribution_records WHERE batch_id = $batchId";
        mysqli_query($conn, $deleteDistributionsSql);
        
        echo json_encode(["status" => "success", "message" => "Batch deleted successfully."]);
    } else {
        echo json_encode(["status" => "error", "message" => mysqli_error($conn)]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Required data missing!"]);
}

// Close the database connection
mysqli_close($conn);
?>
