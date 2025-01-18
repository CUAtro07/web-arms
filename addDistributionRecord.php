<?php
include('db_connection.php');

// Check if necessary data is provided
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['batchId'], $data['distributedQuantity'], $data['distributedTo'], $data['distributionDate'])) {
    $batchId = mysqli_real_escape_string($conn, $data['batchId']);
    $distributedQuantity = (int) $data['distributedQuantity'];
    $distributedTo = mysqli_real_escape_string($conn, $data['distributedTo']);
    $distributionDate = mysqli_real_escape_string($conn, $data['distributionDate']);

    // Insert the distribution record into the database
    $stmt = $conn->prepare("INSERT INTO distribution_records (batch_id, distributed_quantity, distributed_to, date_distributed) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $batchId, $distributedQuantity, $distributedTo, $distributionDate);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Distribution record added successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error adding distribution record.']);
    }

    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Missing required data!']);
}

mysqli_close($conn);
?>
