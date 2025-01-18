<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Include database connection
    include('db_connection.php');

    $recordId = $_POST['recordId'];
    $newQuantity = $_POST['distributedQuantity'];
    $newDate = $_POST['distributionDate'];

    $stmt = $conn->prepare("UPDATE distributions SET distributedQuantity=?, distributionDate=? WHERE recordId=?");
    $stmt->bind_param('isi', $newQuantity, $newDate, $recordId);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }

    $stmt->close();
    $conn->close();
}
?>
