<?php require_once __DIR__ . '/../../layout/header.php';?>
<?php require_once __DIR__ . '/../../layout/nav.php'; ?>


<a href="/" class="btn-back">Назад</a>

<div class="view-container">
    <?php if ($products): ?>
        <div class="view-product-card">
            <img src="/<?= htmlspecialchars($products['image']) ?>" alt="<?= htmlspecialchars($products['name']) ?>"
                class="view-product-image">
            <h3 class="view-product-title"><?= htmlspecialchars($products['name']) ?></h3>
            <p class="view-product-description"><?= htmlspecialchars($products['description']) ?></p>
            <p class="view-product-price"><strong>Цена: </strong><?= htmlspecialchars($products['price']) ?> сом</p>

            <div class="view-actions">
                <a href="/products/update?id=<?= $products['id'] ?>" class="btn btn-edit">Редактировать</a>
                <a href="/products/delete?id=<?= $products['id'] ?>" class="btn btn-delete">Удалить</a>
            </div>
        </div>
    <?php else: ?>
        <p class="no-products">Продукт не найден.</p>
    <?php endif; ?>
</div>


<?php require_once __DIR__ . '/../../layout/footer.php'; ?>