<?php
include('db_connection.php');

if (isset($_GET['batchId'])) {
    $batchId = mysqli_real_escape_string($conn, $_GET['batchId']);

    // Fetch batch details
    $batchQuery = "SELECT batch_id, batch_name FROM distribution_batches WHERE batch_id = '$batchId'";
    $batchResult = mysqli_query($conn, $batchQuery);

    // Fetch farmer details
    $farmerQuery = "SELECT rsba_number, name FROM farmers";
    $farmerResult = mysqli_query($conn, $farmerQuery);

    if ($batchResult && mysqli_num_rows($batchResult) > 0 && $farmerResult) {
        $batch = mysqli_fetch_assoc($batchResult);
        $farmers = [];

        while ($farmer = mysqli_fetch_assoc($farmerResult)) {
            $farmers[] = [
                "rsbaNumber" => $farmer['rsba_number'],
                "name" => $farmer['name']
            ];
        }

        echo json_encode([
            "status" => "success",
            "batch" => $batch,
            "farmers" => $farmers
        ]);
    } else {
        echo json_encode(["status" => "error", "message" => "Batch or farmer data not found."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Batch ID not provided."]);
}

mysqli_close($conn);
?>
