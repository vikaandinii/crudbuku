<?php
require './config/koneksi.php';
cek_login();
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Data Buku</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">

  <!-- Custom CSS -->
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
        <a href="./tanggalPerubahan.php">Tanggal Perubahan</a>
        <a href="./logout.php">Logout</a>
      </div>
    </nav>
  </header>

  <main class="container my-3">
    <div class="card">
      <h5 class="card-header">Data Buku</h5>
      <div class="card-body">
        <h5 class="card-title">Aplikasi Pengelolaan Data Buku</h5>
        <p class="card-text">Aplikasi ini dibuat untuk Ujian Akhir Semester Mata Kuliah Tool Teknologi Informasi. Dalam aplikasi ini terdapat fitur autentikasi dan beberapa tabel, antara lain tabel Administrator, Penulis, Penerbit, dan tabel buku.</p>
      </div>
    </div>
  </main>

  <div class="footer bg-dark text-light py-3 mt-3">
    <div class="container">
      <p class="m-0">&copy; 2023</p>
    </div>
  </div>

  <!-- Bootstrap JS and jQuery -->
  <script src="./bootstrap/jquery-3.6.0.js"></script>
  <script src="./bootstrap/js/bootstrap.min.js"></script>
</body>

</html>