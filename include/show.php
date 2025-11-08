<?php
require_once __DIR__ . '/../config/db.php';
$TitleName = 'Прочитать продукт';
$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: /404');
    exit;
}

$sql = 'SELECT * FROM products WHERE id = :id';
$stmt = $conn->prepare($sql);
$stmt->execute([':id' => $id]);
$products = $stmt->fetch(PDO::FETCH_ASSOC);

require_once __DIR__ . '/../views/products/show.php';

?>

