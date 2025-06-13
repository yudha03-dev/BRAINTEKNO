<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "braintekno";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID soal tidak valid.");
}
$id = (int)$_GET['id'];

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pertanyaan    = $_POST["pertanyaan"];
    $pilihan_a     = $_POST["pilihan_a"];
    $pilihan_b     = $_POST["pilihan_b"];
    $pilihan_c     = $_POST["pilihan_c"];
    $pilihan_d     = $_POST["pilihan_d"];
    $jawaban_kunci = $_POST["jawaban_kunci"];

    $stmt = $conn->prepare("UPDATE soal_kahoot SET pertanyaan=?, pilihan_a=?, pilihan_b=?, pilihan_c=?, pilihan_d=?, jawaban_kunci=? WHERE id=?");
    $stmt->bind_param("ssssssi", $pertanyaan, $pilihan_a, $pilihan_b, $pilihan_c, $pilihan_d, $jawaban_kunci, $id);

    if ($stmt->execute()) {
        $success = "Soal berhasil diperbarui.";
    } else {
        $error = "Gagal memperbarui soal: " . $conn->error;
    }
    $stmt->close();
}

$stmt = $conn->prepare("SELECT * FROM soal_kahoot WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$soal = $result->fetch_assoc();

if (!$soal) {
    die("Soal tidak ditemukan.");
}
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Soal Kuis</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <style>
        body {
            padding: 20px;
            font-family: 'Montserrat', sans-serif;
            background-color: #f4f6f8;
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

        .btn-warning {
            font-weight: 600;
            border-radius: 8px;
            padding: 10px 20px;
            border: none;
        }

        .btn-secondary {
            border-radius: 8px;
            font-weight: 500;
            margin-left: 10px;
        }

        .alert {
            font-weight: 500;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Edit Soal Kuis</h2>

    <?php if (!empty($success)): ?>
        <div class="alert alert-success"><?= $success ?></div>
    <?php elseif (!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="form-group">
            <label for="pertanyaan">Pertanyaan</label>
            <textarea name="pertanyaan" id="pertanyaan" class="form-control" rows="3" required><?= htmlspecialchars($soal['pertanyaan']) ?></textarea>
        </div>

        <div class="form-group">
            <label for="pilihan_a">Pilihan A</label>
            <input type="text" name="pilihan_a" class="form-control" required value="<?= htmlspecialchars($soal['pilihan_a']) ?>">
        </div>

        <div class="form-group">
            <label for="pilihan_b">Pilihan B</label>
            <input type="text" name="pilihan_b" class="form-control" required value="<?= htmlspecialchars($soal['pilihan_b']) ?>">
        </div>

        <div class="form-group">
            <label for="pilihan_c">Pilihan C</label>
            <input type="text" name="pilihan_c" class="form-control" required value="<?= htmlspecialchars($soal['pilihan_c']) ?>">
        </div>

        <div class="form-group">
            <label for="pilihan_d">Pilihan D</label>
            <input type="text" name="pilihan_d" class="form-control" required value="<?= htmlspecialchars($soal['pilihan_d']) ?>">
        </div>

        <div class="form-group">
            <label for="jawaban_kunci">Kunci Jawaban</label>
            <select name="jawaban_kunci" id="jawaban_kunci" class="form-control" required>
                <option value="">-- Pilih Jawaban Benar --</option>
                <?php foreach (['A', 'B', 'C', 'D'] as $opt): ?>
                    <option value="<?= $opt ?>" <?= $soal['jawaban_kunci'] == $opt ? 'selected' : '' ?>>Pilihan <?= $opt ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
        <a href="daftar_soal.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
