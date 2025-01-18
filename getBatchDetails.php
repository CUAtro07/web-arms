<?php
include('db_connection.php');

if (isset($_GET['batchId'])) {
    $batchId = mysqli_real_escape_string($conn, $_GET['batchId']);

    $sql = "SELECT * FROM distribution_batches WHERE batch_id = '$batchId'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $batch = mysqli_fetch_assoc($result);
        echo json_encode($batch);
    } else {
        echo json_encode(null); // Batch not found
    }
} else {
    echo json_encode(null); // Invalid request
}

mysqli_close($conn);
?>
