<?php
include 'db_connection.php';

$result = $conn->query("
    SELECT 
        batch_name, 
        COUNT(*) as total_batches, 
        SUM(total_quantity) as total_quantity 
    FROM distribution_batches 
    GROUP BY batch_name
");

$batches = [];
while ($row = $result->fetch_assoc()) {
    $batches[] = $row;
}

echo json_encode($batches);

$conn->close();
?>
