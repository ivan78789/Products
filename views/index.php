<?php
require_once __DIR__ . '/../config/db.php';
$TitleName = 'Главная';

// Получаем значения из формы поиска
$searchName = trim($_GET['search_name'] ?? '');
$minPrice = trim($_GET['min_price'] ?? '');
$maxPrice = trim($_GET['max_price'] ?? '');

// Базовый запрос
$sql = 'SELECT * FROM products WHERE 1=1';
$params = [];

if ($searchName !== '') {
    $sql .= ' AND name LIKE :name';
    $params[':name'] = "%$searchName%";
}
if ($minPrice !== '' && is_numeric($minPrice)) {
    $sql .= ' AND price >= :minPrice';
    $params[':minPrice'] = $minPrice;
}
if ($maxPrice !== '' && is_numeric($maxPrice)) {
    $sql .= ' AND price <= :maxPrice';
    $params[':maxPrice'] = $maxPrice;
}

$stmt = $conn->prepare($sql);
$stmt->execute($params);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Диапазон цен для формы
$priceRange = $conn->query('SELECT MIN(price) as min_price, MAX(price) as max_price FROM products')->fetch(PDO::FETCH_ASSOC);


require_once __DIR__ . '/../views/products/filter.php';
require_once __DIR__ . '/../layout/header.php';
require_once __DIR__ . '/../layout/nav.php';
?>
<a href="/products/create" class="btn btn-create">Создать новый продукт</a>

<div class="products-container">
    <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
            <div class="product-card">
                <?php if (!empty($product['image'])): ?>
                    <img src="/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>"
                        class="product-image">
                <?php else: ?>
                    <div class="product-image">Нет изображения</div>
                <?php endif; ?>
                <h3 class="product-title"><?= htmlspecialchars($product['name']) ?></h3>
                <p class="product-description"><?= htmlspecialchars($product['description']) ?></p>
                <p class="product-price"><strong>Цена: </strong><?= htmlspecialchars($product['price']) ?> сом</p>
                <div class="product-actions">
                    <a href="/products/update?id=<?= $product['id'] ?>" class="btn btn-edit">Редактировать</a>
                    <a href="/products/delete?id=<?= $product['id'] ?>" class="btn btn-delete">Удалить</a>
                    <a href="/products/show?id=<?= $product['id'] ?>" class="btn btn-view">Просмотреть</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="no-products">Продуктов не найдено.</p>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>