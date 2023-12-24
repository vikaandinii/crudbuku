<?php
require './crud buku/config/koneksi.php'; // Sesuaikan dengan path file koneksi.php Anda

// Fungsi untuk mengecek login, sesuaikan dengan kebutuhan aplikasi Anda
function cek_login() {
        php
            './crud buku/config/koneksi.php';
            // cek apakah admin sudah login atau belum

            if (isset($_SESSION["login"]) ? $_SESSION["login"] : false) {
            header("Location: index.php");
            exit;
            }

            // deklarasi variable error
            $errorUser = false;
            if (isset($_POST["login"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            // query ke database dengan username dan pasword yang di inputkan pengguna
            $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' and password = '$password'");


            // periksa apakah query mendapatkan hasil
            if (mysqli_num_rows($result) === 1) {
                $_SESSION['login'] = true;
                header("Location: index.php");
                exit;
                // jika tidak ada hasil maka set error
            } else {
                $errorUser = true;
            }
            }
            ?>

            <html lang="id">

            <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <title>Login</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
            <style>
                .login-form {
                width: 340px;
                margin: 50px auto;
                font-size: 15px;
                }

                .login-form form {
                margin-bottom: 15px;
                background: #f7f7f7;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 30px;
                }

                .login-form h2 {
                margin: 0 0 15px;
                }

                .form-control,
                .btn {
                min-height: 38px;
                border-radius: 2px;
                }

                .btn {
                font-size: 15px;
                font-weight: bold;
                }
            </style>
            </head>

            <body>
            <div class="login-form">
                <?php if ($errorUser) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal</strong> Password atau username salah
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>
                <form action="" method="post">
                <h6 class="text-center">Aplikasi pengelolaan data buku</h6>
                <h3 class="text-center">Log in</h3>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" name="username" value="<?= @$_POST['username'] ?>" required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" value="<?= @$_POST['password'] ?>" required="required">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" name="login">Log in</button>
                </div>
                </form>
            </div>
            </body>

            </html>
}

// Deklarasi variabel pesan
$message = false;
$message_status = false;

// Operasi DELETE
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $result = mysqli_query($conn, "UPDATE buku SET deleted_at = NOW() WHERE id = '$id'");
    // Buat pesan untuk menandakan query berhasil atau tidak
    $message = $result ? "Data berhasil dihapus" : "Data gagal dihapus";
    $message_status = $result;
}

// Operasi READ
$query = "SELECT * FROM buku";
$result = mysqli_query($conn, $query);

// ... (Operasi CREATE, UPDATE, dan bagian tampilan tabel)

?>
<!-- Bagian tampilan HTML -->
<!DOCTYPE html>
<html lang="id">
<head>
    <!-- Head HTML, termasuk Bootstrap atau CSS lainnya -->
</head>
<body>
    <!-- Tampilan tabel dan formulir -->
    <table>
        <!-- Tabel untuk menampilkan data buku -->
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Deleted_at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                // Tampilkan baris data buku
                echo "<tr>
                        <td>{$row['ID']}</td>
                        <td>{$row['Nama']}</td>
                        <td>{$row['Deskripsi']}</td>
                        <td>{$row['Created_at']}</td>
                        <td>{$row['Updated_at']}</td>
                        <td>{$row['Deleted_at']}</td>
                        <td>
                            <!-- Tombol Edit dan Delete -->
                            <a href=\"buku.php?delete={$row['ID']}\">Hapus</a>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Formulir untuk menambah data buku -->
    <form method="post" action="buku.php">
        <!-- Input form untuk Nama, Deskripsi, dll. -->
        <input type="submit" name="submit" value="Tambah">
    </form>

    <!-- Tampilkan pesan jika ada -->
    <?php if ($message): ?>
        <div><?php echo $message_status ? 'Berhasil' : 'Gagal'; ?>: <?php echo $message; ?></div>
    <?php endif; ?>
    
    <!-- Script PHP untuk operasi CREATE, UPDATE, dan lainnya -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Logika untuk operasi CREATE
    }
    ?>
</body>
</html>
