<?php
require 'functions.php';
$books = getAllBooks();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Daftar Buku</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <h1>Daftar Buku</h1>
  <a href="add_book.php">Tambah Buku</a> |
  <a href="history.php">History</a>
  <table border="1" cellpadding="8">
    <tr><th>ID</th><th>Judul</th><th>Penulis</th><th>Tahun</th><th>Status</th><th>Aksi</th></tr>
    <?php foreach ($books as $b): ?>
    <tr>
      <td><?= $b['id'] ?></td>
      <td><?= htmlspecialchars($b['title']) ?></td>
      <td><?= htmlspecialchars($b['author']) ?></td>
      <td><?= $b['year'] ?></td>
      <td><?= $b['status'] ?></td>
      <td>
        <?php if ($b['status'] === 'stored'): ?>
          <a href="borrow_book.php?id=<?= $b['id'] ?>">Pinjam</a> |
          <a href="sell_book.php?id=<?= $b['id'] ?>">Jual</a>
        <?php elseif ($b['status'] === 'borrowed'): ?>
          <a href="return_book.php?id=<?= $b['id'] ?>">Kembalikan</a>
        <?php endif; ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>