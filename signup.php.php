<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['firstName'];
    $middleInitial = $_POST['middleInitial'];
    $lastName = $_POST['lastName'];
    $rsbaNumber = $_POST['rsbaNumber'];
    $contactNumber = $_POST['contactNumber'];
    $barangay = $_POST['barangay'];
    $homeAddress = $_POST['homeAddress'];
    $farmSize = $_POST['farmSize'] . ' ' . $_POST['farmUnit'];
    $farmLocation = $_POST['farmLocation'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $status = 'pending';

    $stmt = $conn->prepare("INSERT INTO users (first_name, middle_initial, last_name, rsba_number, contact_number, barangay, home_address, farm_size, farm_location, password, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssssssssss', $firstName, $middleInitial, $lastName, $rsbaNumber, $contactNumber, $barangay, $homeAddress, $farmSize, $farmLocation, $password, $status);

    if ($stmt->execute()) {
        echo "Signup successful! Your status is pending.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
