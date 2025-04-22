<?php
require 'config.php';

function getAllBooks() {
    global $pdo;
    return $pdo->query("SELECT * FROM books")->fetchAll();
}

function getBook($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM books WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function addBook($title, $author, $year) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO books(title, author, year) VALUES(?,?,?)");
    if ($stmt->execute([$title, $author, $year])) {
        logAction($pdo->lastInsertId(), 'add', "Buku ditambahkan: $title");
        return true;
    }
    return false;
}

function updateBookStatus($book_id, $action, $note = '') {
    global $pdo;
    $status = $action === 'sell' ? 'sold' : ($action === 'return' ? 'stored' : 'borrowed');
    $stmt = $pdo->prepare("UPDATE books SET status = ? WHERE id = ?");
    $stmt->execute([$status, $book_id]);
    logAction($book_id, $action, $note);
}

function logAction($book_id, $action, $note = '') {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO transactions(book_id, action, note) VALUES(?,?,?)");
    $stmt->execute([$book_id, $action, $note]);
}

function getTransactions() {
    global $pdo;
    return $pdo->query(
        "SELECT t.id, b.title, t.action, t.action_date, t.note
         FROM transactions t
         JOIN books b ON t.book_id = b.id
         ORDER BY t.id ASC"
    )->fetchAll();
}