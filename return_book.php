<?php
require 'functions.php';
$id = $_GET['id'] ?? null;
if ($id) {
    updateBookStatus($id, 'return', 'Dikembalikan');
}
header('Location: index.php'); exit;