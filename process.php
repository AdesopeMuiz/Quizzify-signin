<?php
// Database configuration
$servername = "fdb1028.awardspace.net";
$username = "4311189_process";
$password = "mu1234iz";
$dbname = "4311189_process";

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    // Prepare SQL statement
    $sql = "INSERT INTO contacts (name, email, phone) VALUES (?, ?, ?)";

    // Prepare and bind the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $phone);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Data Submitted successfully!";

                exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
