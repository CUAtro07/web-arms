<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Include database connection
    include('db_connection.php');

    $recordId = $_POST['recordId'];

    $stmt = $conn->prepare("DELETE FROM distributions WHERE recordId=?");
    $stmt->bind_param('i', $recordId);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }

    $stmt->close();
    $conn->close();
}
?>
