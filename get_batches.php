<?php
// Include database connection
include 'db_connection.php';
header('Content-Type: application/json');
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Get the filter type (month, quarter, or year) and value from the query string
$filterType = isset($_GET['filterType']) ? $_GET['filterType'] : null;
$filterValue = isset($_GET['filterValue']) ? $_GET['filterValue'] : null;

// Base query
$sql = "SELECT batch_id, batch_name, batch_number, total_quantity, remaining_quantity, DATE_FORMAT(created_at, '%Y-%m-%d') as created_date FROM distribution_batches";

// Add filtering logic
if ($filterType === 'month') {
    // Filter by specific month (1 = January, 2 = February, etc.)
    $sql .= " WHERE MONTH(created_at) = " . intval($filterValue);
} elseif ($filterType === 'quarter') {
    // Filter by specific quarter (1 = Q1, 2 = Q2, etc.)
    $quarters = [
        1 => "1,2,3", // Q1 = January, February, March
        2 => "4,5,6", // Q2 = April, May, June
        3 => "7,8,9", // Q3 = July, August, September
        4 => "10,11,12" // Q4 = October, November, December
    ];
    if (isset($quarters[intval($filterValue)])) {
        $sql .= " WHERE MONTH(created_at) IN (" . $quarters[intval($filterValue)] . ")";
    }
} elseif ($filterType === 'year') {
    // Filter by specific year
    $sql .= " WHERE YEAR(created_at) = " . intval($filterValue);
}

// Execute the query
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $batches = array();
    while ($row = $result->fetch_assoc()) {
        $batches[] = $row; // Add each batch to the array
    }
    echo json_encode($batches); // Ensure it's an array
} else {
    echo json_encode([]); // Return an empty array if no records
}

$conn->close();
?>
