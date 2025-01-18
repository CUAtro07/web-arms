<?php
include('db_connection.php');

$barangay = $_GET['barangay'] ?? null;
$rsba_number = $_GET['rsba_number'] ?? null;
$name = $_GET['name'] ?? null;
$activity_type = $_GET['activity_type'] ?? null;
$start_date = $_GET['start_date'] ?? null;
$end_date = $_GET['end_date'] ?? null;

$query = "SELECT * FROM activities WHERE 1=1";

// Apply filters
if ($barangay && $barangay !== 'all') {
    $query .= " AND barangay = '" . $conn->real_escape_string($barangay) . "'";
}
if ($rsba_number) {
    $query .= " AND rsba_number LIKE '%" . $conn->real_escape_string($rsba_number) . "%'";
}
if ($name) {
    $query .= " AND name LIKE '%" . $conn->real_escape_string($name) . "%'";
}
if ($activity_type) {
    $query .= " AND activity_type = '" . $conn->real_escape_string($activity_type) . "'";
}
if ($start_date && $end_date) {
    $query .= " AND DATE(timestamp) BETWEEN '" . $conn->real_escape_string($start_date) . "' AND '" . $conn->real_escape_string($end_date) . "'";
}

// Order by barangay and timestamp
$query .= " ORDER BY barangay, timestamp DESC";

$result = $conn->query($query);

$activities_by_barangay = [];
while ($row = $result->fetch_assoc()) {
    $barangay = $row['barangay'];
    if (!isset($activities_by_barangay[$barangay])) {
        $activities_by_barangay[$barangay] = [];
    }
    $activities_by_barangay[$barangay][] = $row;
}

$conn->close();

header('Content-Type: application/json');
echo json_encode(['activities_by_barangay' => $activities_by_barangay]);
?>
