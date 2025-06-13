<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "braintekno";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (!isset($_POST['jawaban']) || !is_array($_POST['jawaban'])) {
    echo "<p class='alert alert-warning'>Tidak ada jawaban yang dikirim. Silakan isi kuis terlebih dahulu.</p>";
    echo "<a href='index.html' class='btn btn-primary mt-3'>Kembali ke Kuis</a>";
    exit;
}

$jawaban_user = $_POST['jawaban'];
$benar = 0;
$total = count($jawaban_user);

foreach ($jawaban_user as $id => $jawaban) {
    $id = (int)$id;
    $jawaban = strtoupper(trim($jawaban));

    $query = "SELECT jawaban_kunci FROM soal_kahoot WHERE id = $id";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($jawaban === strtoupper($row['jawaban_kunci'])) {
            $benar++;
        }
    }
}

$skor = ($total > 0) ? round(($benar / $total) * 100) : 0;

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Kuis</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body { padding: 40px; background-color: #f0f8ff; font-family: sans-serif; }
        .box { max-width: 600px; margin: auto; background: white; padding: 30px; border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); text-align: center; }
        .score { font-size: 2.5rem; color: #007bff; }
    </style>
</head>
<body>
    <div class="box">
        <h2>Hasil Kuis Kamu</h2>
        <p>Jumlah Soal yang Dijawab: <strong><?= $total ?></strong></p>
        <p>Jawaban Benar: <strong><?= $benar ?></strong></p>
        <p class="score">Skor Akhir: <strong><?= $skor ?></strong></p>

        <a href="index.html" class="btn btn-success mt-3">Ulangi Kuis</a>
    </div>
</body>
</html>
