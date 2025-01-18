<?php
session_start();
include('db_connection.php');

if (isset($_POST['login'])) {
    $rsba_number = $_POST['rsba_number'];
    $password = $_POST['password'];

    // Prepare the SQL statement to fetch user data
    $sql = "SELECT * FROM users WHERE rsba_number = ? AND status = 'approved' LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $rsba_number);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Check if the first name and last name match (optional)
        // Uncomment below if you also want to check the names
        // if ($_POST['first_name'] === $user['first_name'] && $_POST['last_name'] === $user['last_name']) {

            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Set session variables for logged-in user
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['rsba_number'] = $user['rsba_number'];
                $_SESSION['status'] = $user['status'];

                // Redirect to farmer portal with success message
                header("Location: farmersportal.html?message=Login successful&type=success");
                exit();
            } else {
                // Invalid password
                header("Location: login.html?message=Invalid password&type=error");
                exit();
            }
        // } else {
        //     // Name mismatch
        //     header("Location: login.html?message=Invalid user details&type=error");
        //     exit();
        // }
    } else {
        // User not found or not approved
        header("Location: login.html?message=Invalid RSBA number or not approved&type=error");
        exit();
    }
}


?>
