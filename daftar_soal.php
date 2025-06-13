<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "braintekno";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $conn->query("DELETE FROM soal_kahoot WHERE id = $id");
    header("Location: daftar_soal.php");
    exit;
}

$result = $conn->query("SELECT * FROM soal_kahoot ORDER BY id DESC");

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Soal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body { padding: 30px; font-family: sans-serif; }
        .container { max-width: 900px; margin: auto; }
        table { font-size: 14px; }
    </style>
</head>
<body>
<div class="container">
    <h2 class="mb-4">Daftar Soal Kuis</h2>

    

    <?php if ($result->num_rows > 0): ?>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Pertanyaan</th>
                    <th>Pilihan A</th>
                    <th>Pilihan B</th>
                    <th>Pilihan C</th>
                    <th>Pilihan D</th>
                    <th>Jawaban Benar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= htmlspecialchars($row['pertanyaan']) ?></td>
                        <td><?= htmlspecialchars($row['pilihan_a']) ?></td>
                        <td><?= htmlspecialchars($row['pilihan_b']) ?></td>
                        <td><?= htmlspecialchars($row['pilihan_c']) ?></td>
                        <td><?= htmlspecialchars($row['pilihan_d']) ?></td>
                        <td><strong><?= $row['jawaban_kunci'] ?></strong></td>
                        <td>
                            <a href="?delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus soal ini?')">Hapus</a>
                           <a href="edit_soal.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-info">Edit</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">Belum ada soal yang ditambahkan.</div>
    <?php endif; ?>
<a href="tampilanadmin.php" class="btn btn-primary mb-3">KEMBALI</a>
</div>

</body>
</html>
