<?php
include 'connect.php';
if (isset($_GET['delete_id'])) {
    $delete_id = $conn->real_escape_string($_GET['delete_id']);
    $sql_delete = "DELETE FROM data_login WHERE username = '$delete_id'";
    if ($conn->query($sql_delete) === TRUE) {
        echo "<script>
                alert('Data berhasil dihapus!');
                window.location.href = 'tampilanadmin.php';
              </script>";
    } else {
        echo "<script>
                alert('Data gagal dihapus: " . $conn->error . "');
              </script>";
    }
}
$sql = "SELECT username, password FROM data_login";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Data Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      padding: 0;
    }

    .navbar {
      background: linear-gradient(90deg, #007bff, #0056b3);
      padding: 15px;
    }

    .navbar a {
      color: white !important;
      font-weight: 600;
    }

    .navbar a:hover {
      color: #ffd54f !important;
    }

    .main12 {
      padding: 60px 20px;
      text-align: center;
    }

    h2 {
      font-weight: 600;
      color: #0056b3;
      margin-bottom: 30px;
    }

    table {
      margin: 0 auto;
      border-collapse: collapse;
      width: 90%;
      max-width: 800px;
      background-color: #ffffff;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
    }

    th, td {
      padding: 15px;
      text-align: center;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #007bff;
      color: white;
      font-weight: 600;
    }

    tr:hover {
      background-color: #f1f1f1;
    }

    a {
      color: #007bff;
      text-decoration: none;
      font-weight: 500;
    }

    a:hover {
      color: #0056b3;
      text-decoration: underline;
    }

    @media (max-width: 576px) {
      th, td {
        padding: 10px;
      }

      table {
        width: 100%;
      }
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <span class="navbar-brand">Admin</span>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="login.php">Log Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="main12">
    <h2>DATA USER</h2>
    <table>
      <tr>
        <th>USERNAME</th>
        <th>PASSWORD</th>
        <th>AKSI</th>
      </tr>
      <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row["username"]) . "</td>
                        <td>" . htmlspecialchars($row["password"]) . "</td>
                        <td>
                            <a href='tampilanadmin.php?delete_id=" . urlencode($row["username"]) . "' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Tidak ada data</td></tr>";
        }
      ?>
    </table>
  </main>
</body>
</html>
