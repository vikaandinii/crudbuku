<?php
$mysqli = new mysqli("localhost","root","my_password","db_toko_online");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
?>

?>