<?php
session_start();

// sesi login dihapus
session_destroy();
session_unset();

// tampilkan pesan logout berhasil
echo "
<script>
  alert('berhasil logout')
</script>
";

// kembali ke halaman login
header("Location: login.php");
exit;
