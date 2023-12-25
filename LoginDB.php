<?php
$host = "localhost";
$dbname = "calculates";
$username = "root";
$password = "";

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection error: " . $mysqli->connect_error);
}

$sql = "INSERT INTO Logins (Email, Password) VALUES (?, ?)";
$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ss", $_POST["email"], $_POST["password"]);

if ($stmt->execute()) {
    header("Location: Expenses.html");
    exit;
} 

?>
