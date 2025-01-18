<?php
include('db_connection.php');

// Check if necessary data is provided
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['batchId'], $data['remainingQuantity'])) {
    $batchId = mysqli_real_escape_string($conn, $data['batchId']);
    $remainingQuantity = (int) $data['remainingQuantity'];

    // Update the batch's remaining quantity
    $stmt = $conn->prepare("UPDATE distribution_batches SET remaining_quantity = ? WHERE batch_id = ?");
    $stmt->bind_param("is", $remainingQuantity, $batchId);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Batch remaining quantity updated successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error updating batch remaining quantity.']);
    }

    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Missing required data!']);
}

mysqli_close($conn);
?>
