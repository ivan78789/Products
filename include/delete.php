<?php
require_once __DIR__ . '/../config/db.php';
$TitleName = 'Удаление';

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: /404');
    exit;
}

$stmt = $conn->prepare('SELECT * FROM products WHERE id = :id');
$stmt->execute([':id' => $id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    header('Location: /404');
    exit;
}

// var_dump($id, $product);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conn->prepare('DELETE FROM products WHERE id = :id');
    $stmt->execute([':id' => $id]);

    header('Location: /'); 
    exit;
}

require_once __DIR__ . '/../views/products/delete.php';
