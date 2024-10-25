<?php
// rezerwacja.php

// Połączenie z bazą danych
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baza";

// Utworzenie połączenia
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

// Pobieranie danych z formularza
$data_rez = $_POST['data_rez'];
$liczba_osob = $_POST['liczba_osob'];
$telefon = $_POST['telefon'];

// Zapytanie SQL do wstawienia danych do tabeli rezerwacje
$sql = "INSERT INTO rezerwacje (data_rez, liczba_osob, telefon) VALUES (?, ?, ?)";

// Przygotowanie zapytania
$stmt = $conn->prepare($sql);

// Powiązanie parametrów i wykonanie zapytania
$stmt->bind_param("sis", $data_rez, $liczba_osob, $telefon);
if ($stmt->execute()) {
    echo "Dodano rezerwację do bazy";
} else {
    echo "Błąd: " . $stmt->error;
}

// Zamknięcie zapytania
$stmt->close();

// Zamknięcie połączenia
$conn->close();
?>
