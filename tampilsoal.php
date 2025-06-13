<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "braintekno";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) die("Koneksi gagal: " . $conn->connect_error);

$sql = "SELECT * FROM soal_kahoot ORDER BY id ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Jawab Soal</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      padding: 20px;
      background: #eaf4fc;
      font-family: 'Poppins', sans-serif;
    }

    .container {
      max-width: 850px;
      margin: auto;
    }

    h2 {
      font-weight: 600;
      color: #0d6efd;
      margin-bottom: 30px;
    }

    .soal-box {
      background: #ffffff;
      border-radius: 12px;
      padding: 25px;
      margin-bottom: 25px;
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
      transition: all 0.3s ease-in-out;
    }

    .soal-box:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .jawaban label {
      display: block;
      background: #f8f9fa;
      padding: 10px 15px;
      border-radius: 8px;
      border: 1px solid #ccc;
      margin-bottom: 10px;
      cursor: pointer;
      transition: background-color 0.2s ease;
    }

    .jawaban input[type="radio"] {
      margin-right: 10px;
    }

    .jawaban label:hover {
      background-color: #e0f0ff;
    }

    .btn-primary {
      font-weight: 600;
      padding: 12px;
      border-radius: 10px;
      font-size: 16px;
    }

    @media (max-width: 600px) {
      .soal-box {
        padding: 20px;
      }

      .btn-primary {
        font-size: 15px;
        padding: 10px;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <h2 class="text-center">Jawab Soal Kuis</h2>

  <form method="POST" action="hasilsoalbaru.php">
    <?php
    if ($result->num_rows > 0):
        $no = 1;
        while ($row = $result->fetch_assoc()):
    ?>
      <div class="soal-box">
        <h5>Soal <?= $no++ ?>:</h5>
        <p><?= htmlspecialchars($row['pertanyaan']) ?></p>
        <div class="jawaban">
          <label><input type="radio" name="jawaban[<?= $row['id'] ?>]" value="A" required> A. <?= htmlspecialchars($row['pilihan_a']) ?></label>
          <label><input type="radio" name="jawaban[<?= $row['id'] ?>]" value="B"> B. <?= htmlspecialchars($row['pilihan_b']) ?></label>
          <label><input type="radio" name="jawaban[<?= $row['id'] ?>]" value="C"> C. <?= htmlspecialchars($row['pilihan_c']) ?></label>
          <label><input type="radio" name="jawaban[<?= $row['id'] ?>]" value="D"> D. <?= htmlspecialchars($row['pilihan_d']) ?></label>
        </div>
      </div>
    <?php endwhile; ?>
    <button type="submit" class="btn btn-primary btn-block">Kirim Jawaban</button>
    <?php else: ?>
      <p class="alert alert-info">Belum ada soal.</p>
    <?php endif; ?>
  </form>
</div>

</body>
</html>

<?php $conn->close(); ?>
