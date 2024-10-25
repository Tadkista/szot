<?php
// Connecting to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "baza";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieving form data
$data = $_POST['data'];
$osoby = $_POST['osoby'];
$telefon = $_POST['telefon'];
$zgoda = isset($_POST['zgoda']) ? 1 : 0;

// Inserting data into the database
$sql = "INSERT INTO rezerwacje (data, osoby, telefon, zgoda) VALUES ('$data', '$osoby', '$telefon', '$zgoda')";

if ($conn->query($sql) === TRUE) {
    echo "Dodano rezerwację do bazy";
} else {
    echo "Błąd: " . $sql . "<br>" . $conn->error;
}

// Closing the connection
$conn->close();
?>
