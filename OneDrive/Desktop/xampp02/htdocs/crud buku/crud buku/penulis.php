<?php
require './config/koneksi.php';
cek_login();

// deklarasi variable pesan
$message = false;
$message_status = false;
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $result = mysqli_query($conn, "DELETE FROM penulis WHERE id = '$id'");

  // buat pesan untuk menandakan query berhasil atau tidak
  $message = $result ? "Data berhasil dihapus" : "Data gagal dihapus";
  $message_status = $result;
}
?>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Penulis</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- bootstrap template -->
  <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">


  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #343a40;
      color: #ffffff;
      padding: 10px 0;
    }

    nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    nav a {
      color: #ffffff;
      text-decoration: none;
      padding: 10px;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    nav a:hover {
      background-color: #007bff;
    }

    main.container {
      margin: 20px;
    }

    .card {
      border: none;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
      border-radius: 10px;
      overflow: hidden;
    }

    .card-header {
      background-color: #007bff;
      color: #ffffff;
      padding: 15px;
      border: none;
      border-radius: 0;
    }

    .card-body {
      padding: 20px;
    }

    .card-title {
      color: #007bff;
    }

    .card-text {
      color: #555;
    }

    .footer {
      background-color: #343a40;
      color: #ffffff;
      text-align: center;
      padding: 20px 0;
      position: fixed;
      bottom: 0;
      width: 100%;
    }

    .footer p {
      margin: 0;
    }
  </style>
</head>

<body>
  <header>
    <nav>
      <a href="./index.php">Data Buku</a>
      <div>
        <a href="./index.php">Home</a>
        <a href="./penulis.php">Penulis</a>
        <a href="./penerbit.php">Penerbit</a>
        <a href="./buku.php">Buku</a>
        <a href="./logout.php">Logout</a>
      </div>
    </nav>
  </header>

  <main class="container">
    <?php if ($message) : ?>
      <div class="alert alert-<?= $message_status ? 'success' : 'danger' ?> alert-dismissible fade show mt-2" role="alert">
        <strong><?= $message_status ? 'Berhasil' : 'Gagal' ?></strong> <?= $message ?>
      </div>
    <?php endif; ?>
    <div class="card shadow mt-3">
      <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
          <h5 class="card-header">Data Penulis</h5>
          <a href="./penulis-form.php" class="btn btn-sm btn-info">Tambah</a>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-responsive-md table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Buku</th>
              <th scope="col">Deskripsi</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = "SELECT ps.*, (SELECT count(*) FROM buku as bu WHERE ps.id = bu.penulis_id ) as buku FROM penulis as ps";

            $result = mysqli_query($conn, $query);
            $counter = 0;
            while ($row = mysqli_fetch_assoc($result)) {
              $counter++;
              $row = (object)$row;

              $btn_edit =  '<a href="./penulis-form.php?edit=' . $row->id . '" class="btn btn-sm btn-primary">Edit</a>';
              $btn_delete =  '<a href="./penulis.php?delete=' . $row->id . '" onclick="return confirm(\'Apakah anda yakin?\')" class="btn btn-sm btn-danger">Hapus</a>';
              echo "<tr>
              <th>$counter</th>
              <td>{$row->nama}</td>
              <td>{$row->buku}</td>
              <td>{$row->deskripsi}</td>
              <td>$btn_edit  $btn_delete</td>
            </tr>";
            }
            ?>

          </tbody>
        </table>
      </div>
    </div>
  </main>

  <div class="footer bg-dark text-light py-3 mt-3">
    <div class="container">
    </div>
  </div>

  <script src="./bootstrap/jquery-3.6.0.js"></script>
  <script src="./bootstrap/js/bootstrap.min.js"></script>
</body>

</html>