<?php
require 'functions.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    addBook($_POST['title'], $_POST['author'], $_POST['year']);
    header('Location: index.php'); exit;
}
?>
<!DOCTYPE html>
<html><body>
<h2>Tambah Buku</h2>
<form method="POST">
  Judul: <input type="text" name="title"><br>
  Penulis: <input type="text" name="author"><br>
  Tahun: <input type="number" name="year"><br>
  <button type="submit">Simpan</button>
</form>
</body></html>