<?php
include 'db_connection.php';

$filter = json_decode($_POST['filter'], true);
$startDate = $filter['startDate'];
$endDate = $filter['endDate'];
$batchName = $filter['batchName'];

$stmt = $conn->prepare("
    SELECT dh.*, db.batch_name 
    FROM distribution_history dh 
    JOIN distribution_batches db ON dh.batch_id = db.id 
    WHERE dh.distribution_date BETWEEN ? AND ? 
    AND db.batch_name = ?
");
$stmt->bind_param('sss', $startDate, $endDate, $batchName);
$stmt->execute();

$result = $stmt->get_result();
$distributions = [];
while ($row = $result->fetch_assoc()) {
    $distributions[] = $row;
}

echo json_encode($distributions);

$stmt->close();
$conn->close();
?>
