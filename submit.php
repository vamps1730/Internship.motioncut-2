<?php
include("php/config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "collections";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare('INSERT INTO users (name, email, username, password) VALUES (?, ?, ?, ?)');
$stmt->bind_param('ssss', $name, $email, $username, $password);

if ($stmt->execute()) {
    echo 'Registration successful!';
} else {
    echo 'Error occurred while registering. Please try again.';
}
    echo "<script>
          document.getElementById('confirmationMessage').innerHTML = '<h2>Registration Successful!</h2><p>Thank you for registering.</p>';
          </script>";

$stmt->close();
$conn->close();
}
?>