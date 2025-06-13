<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "braintekno";
$conn = new mysqli($host, $user, $pass, $db);


if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}


$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pertanyaan    = $_POST["pertanyaan"];
    $pilihan_a     = $_POST["pilihan_a"];
    $pilihan_b     = $_POST["pilihan_b"];
    $pilihan_c     = $_POST["pilihan_c"];
    $pilihan_d     = $_POST["pilihan_d"];
    $jawaban_kunci = $_POST["jawaban_kunci"];

    $stmt = $conn->prepare("INSERT INTO soal_kahoot (pertanyaan, pilihan_a, pilihan_b, pilihan_c, pilihan_d, jawaban_kunci) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $pertanyaan, $pilihan_a, $pilihan_b, $pilihan_c, $pilihan_d, $jawaban_kunci);

    if ($stmt->execute()) {
        $success = "Soal berhasil ditambahkan!";
    } else {
        $error = "Gagal menambahkan soal: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Soal - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <style>
        body {
            padding: 20px;
            font-family: 'Montserrat', sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-weight: 600;
            color: #0056b3;
            margin-bottom: 30px;
        }

        .form-group label {
            font-weight: 500;
            color: #333;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .back-link {
            display: inline-block;
            margin-top: 15px;
            font-weight: 500;
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: #0056b3;
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Tambah Soal Kuis</h2>

    <?php if (!empty($success)): ?>
        <div class="alert alert-success"><?= $success ?></div>
    <?php elseif (!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="form-group">
            <label for="pertanyaan">Pertanyaan</label>
            <textarea name="pertanyaan" id="pertanyaan" class="form-control" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="pilihan_a">Pilihan A</label>
            <input type="text" name="pilihan_a" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="pilihan_b">Pilihan B</label>
            <input type="text" name="pilihan_b" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="pilihan_c">Pilihan C</label>
            <input type="text" name="pilihan_c" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="pilihan_d">Pilihan D</label>
            <input type="text" name="pilihan_d" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="jawaban_kunci">Kunci Jawaban</label>
            <select name="jawaban_kunci" id="jawaban_kunci" class="form-control" required>
                <option value="">-- Pilih Jawaban Benar --</option>
                <option value="A">Pilihan A</option>
                <option value="B">Pilihan B</option>
                <option value="C">Pilihan C</option>
                <option value="D">Pilihan D</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Soal</button>
        <br>
        <a class="back-link" href="tampilanadmin.php">← Kembali ke Halaman Admin</a>
    </form>
</div>
</body>
</html>
