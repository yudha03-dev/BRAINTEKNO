<?php
$conn = new mysqli("localhost", "root", "", "braintekno");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>