<?php

require_once __DIR__ . '/../config/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $description = htmlspecialchars(trim($_POST['description']));
    $price = floatval($_POST['price']);
    $error = [];

    if (empty($name) || empty($description) || empty($price) || empty($_FILES['image']['name'])) {
        $error[] = 'Заполните все поля';
    }

    if (!is_numeric($price) || $price <= 0) {
        $error[] = 'Введите корректную цену';
    }

    if (!empty($_FILES['image']['name'])) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $maxSize = 2 * 1024 * 1024;
        $fileType = $_FILES['image']['type'];
        $fileSize = $_FILES['image']['size'];

        if (!in_array($fileType, $allowedTypes))
            $error[] = 'Недопустимый формат изображения';
        if ($fileSize > $maxSize)
            $error[] = 'Файл слишком большой';
    }

    if (empty($error)) {
        try {
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

            $sql = "INSERT INTO products (name, description, price, image) VALUES (:name, :description, :price, :image)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':name' => $name,
                ':description' => $description,
                ':price' => $price,
                ':image' => $image,
            ]);

            header('Location: /');
            exit;
        } catch (PDOException $e) {
            echo "Ошибка создания: " . $e->getMessage();
        }
    }
}
require_once __DIR__ . '/../views/products/create.php';

?>



