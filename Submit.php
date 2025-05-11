<?php
// Replace with your database connection details
$servername = "localhost";
$username = "your_db_username";
$password = "your_db_password";
$database = "your_db_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data and sanitize
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$remarks = $conn->real_escape_string($_POST['remarks']);

// Insert into database
$sql = "INSERT INTO messages (name, email, remarks) VALUES ('$name', '$email', '$remarks')";

if ($conn->query($sql) === TRUE) {
    echo "Message sent successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>