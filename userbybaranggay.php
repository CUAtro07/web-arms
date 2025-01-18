<?php
// Database connection
$servername = "localhost";
$username = "root"; // change to your DB username
$password = ""; // change to your DB password
$dbname = "arms_db"; // replace with your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if barangay is passed in the GET request
if (isset($_GET['barangay'])) {
    $barangay = $_GET['barangay'];

    // Query the database to fetch users from the specified barangay
    $sql = "SELECT * FROM users WHERE barangay = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $barangay); // bind the barangay parameter to the SQL query
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any records were found
    if ($result->num_rows > 0) {
        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row; // Store each user record in the array
        }
        echo json_encode($users); // Return the result as a JSON response
    } else {
        echo json_encode(["error" => "No records found for the selected barangay"]);
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["error" => "Barangay is required"]);
}
?>
