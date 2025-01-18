<?php
// Include your database connection
include('db_connection.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Check if the necessary POST data exists
if (isset($_POST['batchId'], $_POST['batchName'], $_POST['totalQuantity'])) {
    // Sanitize and assign the POST data to variables
    $batchId = (int)$_POST['batchId'];
    $batchName = mysqli_real_escape_string($conn, $_POST['batchName']);
    $totalQuantity = (int)$_POST['totalQuantity'];

    // Fetch the current batch data to calculate remaining quantity
    $sql = "SELECT total_quantity, remaining_quantity FROM distribution_batches WHERE batch_id = $batchId";
    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        $distributedQuantity = $row['total_quantity'] - $row['remaining_quantity'];
        
        if ($totalQuantity < $distributedQuantity) {
            echo json_encode(["status" => "error", "message" => "Total quantity cannot be less than already distributed quantity."]);
            exit;
        }

        $newRemainingQuantity = $row['remaining_quantity'] + ($totalQuantity - $row['total_quantity']);

        // Prepare SQL query to update batch data
        $updateSql = "UPDATE distribution_batches 
                      SET batch_name = '$batchName', total_quantity = $totalQuantity, remaining_quantity = $newRemainingQuantity
                      WHERE batch_id = $batchId";

        if (mysqli_query($conn, $updateSql)) {
            echo json_encode(["status" => "success", "message" => "Batch updated successfully."]);
        } else {
            echo json_encode(["status" => "error", "message" => mysqli_error($conn)]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Batch not found."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Required data missing!"]);
}

// Close the database connection
mysqli_close($conn);
?>
