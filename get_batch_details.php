<?php
// get_batch_details.php

$batch_id = isset($_GET['batch_id']) ? $_GET['batch_id'] : '';

if ($batch_id) {
    $sql = "SELECT total_quantity, remaining_quantity FROM distribution_batches WHERE batch_id = :batch_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':batch_id', $batch_id);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $batch = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode([
            'success' => true,
            'total_quantity' => $batch['total_quantity'],
            'remaining_quantity' => $batch['remaining_quantity']
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Batch not found']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Batch ID is required']);
}

?>
