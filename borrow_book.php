<?php
require 'functions.php';
$id = $_GET['id'] ?? null;
if ($id) {
    updateBookStatus($id, 'borrow', 'Dipinjam oleh user');
}
header('Location: index.php'); exit;