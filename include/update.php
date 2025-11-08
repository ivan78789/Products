<?php
require_once __DIR__ . '/../config/db.php';
$TitleName = 'Обновить продукт';


$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: /404');
    exit;
}


$stmt = $conn->prepare('SELECT * FROM products   WHERE id = :id');
$stmt->execute([':id' => $id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    header('Location: /404');
    exit;
}

$error = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $description = htmlspecialchars(trim($_POST['description']));
    $price = floatval($_POST['price']);
    $image = $product['image']; 

    if (empty($name) || empty($description) || empty($price)) {
        $error[] = 'Заполните все поля';
    }

    if (!empty($_FILES['image']['name'])) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $maxSize = 2 * 1024 * 1024;

        if (!in_array($_FILES['image']['type'], $allowedTypes))
            $error[] = 'Недопустимый формат изображения';
        if ($_FILES['image']['size'] > $maxSize)
            $error[] = 'Файл слишком большой';

        if (empty($error)) {
            $uploadDir = __DIR__ . '/../uploads/';
            if (!is_dir($uploadDir))
                mkdir($uploadDir, 0777, true);
            $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
            $uploadPath = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                $image = 'uploads/' . $fileName;
            } else {
                $error[] = 'Ошибка при загрузке файла';
            }
        }
    }

    if (empty($error)) {
        try {
            $stmt = $conn->prepare('UPDATE products SET name = :name, description = :description, price = :price, image = :image WHERE id = :id');
            $stmt->execute([
                ':name' => $name,
                ':description' => $description,
                ':price' => $price,
                ':image' => $image,
                ':id' => $id,
            ]);
            header('Location: /');
            exit;
        } catch (PDOException $e) {
            echo "Ошибка обновления: " . $e->getMessage();
        }
    }
}
require_once __DIR__ . '/../views/products/update.php';

?>

