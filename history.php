<?php
require 'functions.php';
$logs = getTransactions();
?>
<!DOCTYPE html><html><body>
<h2>Log Aktivitas</h2>
<table border="1" cellpadding="5">
  <tr><th>ID</th><th>Buku</th><th>Aksi</th><th>Tanggal</th><th>Catatan</th></tr>
  <?php foreach ($logs as $l): ?>
  <tr>
    <td><?= $l['id'] ?></td>
    <td><?= htmlspecialchars($l['title']) ?></td>
    <td><?= $l['action'] ?></td>
    <td><?= $l['action_date'] ?></td>
    <td><?= htmlspecialchars($l['note']) ?></td>
  </tr>
  <?php endforeach; ?>
</table>
</body></html>