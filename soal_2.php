<?php
require 'connect.php';

$a = "";
$b = "";
$c = "";
$d = "";
$e = "";
$f = "";
$g = "";
$h = "";
$i = "";
$j = "";
$k = "";
$l = "";
$m = "";
$n = "";
$o = "";
$p = "";
$q = "";

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = isset($_POST["a"]) ? strtoupper(mysqli_real_escape_string($conn, $_POST["a"])) : "";
    $b = isset($_POST["b"]) ? strtoupper(mysqli_real_escape_string($conn, $_POST["b"])) : "";
    $c = isset($_POST["c"]) ? strtoupper(mysqli_real_escape_string($conn, $_POST["c"])) : "";
    $d = isset($_POST["d"]) ? strtoupper(mysqli_real_escape_string($conn, $_POST["d"])) : "";
    $e = isset($_POST["e"]) ? strtoupper(mysqli_real_escape_string($conn, $_POST["e"])) : "";
    $f = isset($_POST["f"]) ? strtoupper(mysqli_real_escape_string($conn, $_POST["f"])) : "";
    $g = isset($_POST["g"]) ? strtoupper(mysqli_real_escape_string($conn, $_POST["g"])) : "";
    $h = isset($_POST["h"]) ? strtoupper(mysqli_real_escape_string($conn, $_POST["h"])) : "";
    $i = isset($_POST["i"]) ? strtoupper(mysqli_real_escape_string($conn, $_POST["i"])) : "";
    $j = isset($_POST["j"]) ? strtoupper(mysqli_real_escape_string($conn, $_POST["j"])) : "";
    $k = isset($_POST["k"]) ? strtoupper(mysqli_real_escape_string($conn, $_POST["k"])) : "";
    $l = isset($_POST["l"]) ? strtoupper(mysqli_real_escape_string($conn, $_POST["l"])) : "";
    $m = isset($_POST["m"]) ? strtoupper(mysqli_real_escape_string($conn, $_POST["m"])) : "";
    $n = isset($_POST["n"]) ? strtoupper(mysqli_real_escape_string($conn, $_POST["n"])) : "";
    $o = isset($_POST["o"]) ? strtoupper(mysqli_real_escape_string($conn, $_POST["o"])) : "";
    $p = isset($_POST["p"]) ? strtoupper(mysqli_real_escape_string($conn, $_POST["p"])) : "";
    $q = isset($_POST["q"]) ? strtoupper(mysqli_real_escape_string($conn, $_POST["q"])) : "";

    // Validasi: semua kolom harus terisi
    if (in_array("", [$a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q])) {
        $error_message = "<h5>Semua kotak harus diisi terlebih dahulu!</h5>";
    } else {
        // Ambil jawaban kunci dari database
        $query_sql = "SELECT * FROM soal_1 LIMIT 1";
        $result = mysqli_query($conn, $query_sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Bandingkan satu per satu huruf
            if (
                strtoupper($row['a']) === $a &&
                strtoupper($row['b']) === $b &&
                strtoupper($row['c']) === $c &&
                strtoupper($row['d']) === $d &&
                strtoupper($row['e']) === $e &&
                strtoupper($row['f']) === $f &&
                strtoupper($row['g']) === $g &&
                strtoupper($row['h']) === $h &&
                strtoupper($row['i']) === $i &&
                strtoupper($row['j']) === $j &&
                strtoupper($row['k']) === $k &&
                strtoupper($row['l']) === $l &&
                strtoupper($row['m']) === $m &&
                strtoupper($row['n']) === $n &&
                strtoupper($row['o']) === $o &&
                strtoupper($row['p']) === $p &&
                strtoupper($row['q']) === $q
            ) {
                header("Location: jawab1.html");
                exit;
            } else {
                $error_message = "<h5>JAWABAN Anda Salah. Silahkan Coba Kembali.</h5>";
            }
        } else {
            $error_message = "<h5>Data kunci jawaban tidak ditemukan di database.</h5>";
        }
    }
}
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BRAINTEKNO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: url('gambar/logov7.jpg');
            background-size: cover;
            position: relative;
            height: 100%;
            width: 100%;
        }

        .navbar {
            background-color: #007bff !important;
            padding: 15px;
        }

        .navbar a {
            color: white !important;
            font-weight: bold;
        }

        .navbar a:hover {
            color: #ffc107 !important;
        }

        section {
            text-align: center;
            padding: 50px 20px;
            background: white;
            border-radius: 10px;
            width: 80%;
            max-width: 700px;
            margin: 50px auto;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #007bff;
            margin-bottom: 30px;
        }

        .tts-grid {
            display: grid;
            grid-template-columns: repeat(5, 50px);
            grid-template-rows: repeat(5, 50px);
            justify-content: center;
            gap: 5px;
            margin-bottom: 20px;
        }

        .tts-grid input {
            width: 50px;
            height: 50px;
            font-size: 24px;
            text-align: center;
            border: 2px solid #007bff;
            border-radius: 5px;
            text-transform: uppercase;
        }

        .btn-input {
            background: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-input:hover {
            background: #0056b3;
        }

        .error-msg {
            color: red;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand">BRAINTEKNO</a>
    </nav>

    <section>
        <h5>NOTE : JAWAB MENGGUNAKAN CAPS LOCK</h5>
        <h6>1.Mendatar <br>Bahasa yang digunakan untuk mengatur tampilan dan format halaman web yang dibuat dengan HTML
        </h6>
        <h6>1.Menurun<br>Bahasa pemrograman yang digunakan untuk membuat halaman web menjadi interaktif dan dinamis</h6>
        <h6>2.Mendatar <br>Bahasa markup yang digunakan untuk membuat struktur halaman website agar dapat ditampilkan
            pada web browser.</h6>
        <h6>2.Menurun<br>bahasa pemrograman yang bekerja melalui query–query terstruktur</h6>

        <form method="POST" action="">
            <div class="tts-grid">
                <!-- TTS Horizontal (baris ke-3 kolom 2-4): a-b-c -->
                <input type="text" placeholder="1" name="a" maxlength="1" style="grid-column: 1; grid-row: 5;"
                    value="<?php echo htmlspecialchars($a); ?>">
                <input type="text" name="b" maxlength="1" style="grid-column: 2; grid-row: 5;"
                    value="<?php echo htmlspecialchars($b); ?>">
                <input type="text" name="c" maxlength="1" style="grid-column: 3; grid-row: 5;"
                    value="<?php echo htmlspecialchars($c); ?>">
                <input type="text" placeholder="1" name="d" maxlength="1" style="grid-column: 3; grid-row: 1;"
                    value="<?php echo htmlspecialchars($d); ?>">
                <input type="text" name="e" maxlength="1" style="grid-column: 3; grid-row: 2;"
                    value="<?php echo htmlspecialchars($e); ?>">
                <input type="text" name="f" maxlength="1" style="grid-column: 3; grid-row: 3;"
                    value="<?php echo htmlspecialchars($f); ?>">
                <input type="text" name="g" maxlength="1" style="grid-column: 3; grid-row: 4;"
                    value="<?php echo htmlspecialchars($g); ?>">
                <input type="text" name="h" maxlength="1" style="grid-column: 3; grid-row: 6;"
                    value="<?php echo htmlspecialchars($h); ?>">
                <input type="text" name="i" maxlength="1" style="grid-column: 3; grid-row: 7;"
                    value="<?php echo htmlspecialchars($i); ?>">
                <input type="text" name="j" maxlength="1" style="grid-column: 3; grid-row: 8;"
                    value="<?php echo htmlspecialchars($j); ?>">
                <input type="text" name="k" maxlength="1" style="grid-column: 3; grid-row: 9;"
                    value="<?php echo htmlspecialchars($k); ?>">
                <input type="text" name="l" maxlength="1" style="grid-column: 3; grid-row: 10;"
                    value="<?php echo htmlspecialchars($l); ?>">
                <input type="text" placeholder="2" name="m" maxlength="1" style="grid-column: 2; grid-row: 10;"
                    value="<?php echo htmlspecialchars($m); ?>">
                <input type="text" name="n" maxlength="1" style="grid-column: 4; grid-row: 10;"
                    value="<?php echo htmlspecialchars($n); ?>">
                <input type="text" name="o" maxlength="1" style="grid-column: 5; grid-row: 10;"
                    value="<?php echo htmlspecialchars($o); ?>">
                <input type="text" placeholder="2" name="p" maxlength="1" style="grid-column: 5; grid-row: 8;"
                    value="<?php echo htmlspecialchars($p); ?>">
                <input type="text" name="q" maxlength="1" style="grid-column: 5; grid-row: 9;"
                    value="<?php echo htmlspecialchars($q); ?>">
            </div>

            <button type="submit" class="btn-input" name="jawab">Jawab</button>

            <?php if (!empty($error_message)): ?>
                <div class="error-msg"><?php echo $error_message; ?></div>
            <?php endif; ?>
        </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>