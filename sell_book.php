<?php
require 'functions.php';
$id = $_GET['id'] ?? null;
if ($id) {
    updateBookStatus($id, 'sell', 'Dijual');
}
header('Location: index.php'); exit;