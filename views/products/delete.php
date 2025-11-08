<?php require_once __DIR__ . '/../../layout/header.php'; ?>
<?php require_once __DIR__ . '/../../layout/nav.php'; ?>



<div class="delete-container">
    <h2>Удалить продукт: <?= htmlspecialchars($product['name']) ?>?</h2>

    <div class="delete-warning">Вы уверены, что хотите удалить этот продукт?</div>

    <img src="/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>"
        class="delete-product-image">

    <div class="delete-info">
        <p><strong>Описание:</strong> <?= htmlspecialchars($product['description']) ?></p>
        <p><strong>Цена:</strong> <?= htmlspecialchars($product['price']) ?> сом</p>
    </div>

    <form action="/products/delete?id=<?= $product['id'] ?>" method="post">
        <button type="submit" class="btn-delete">Удалить</button>
        <a href="/" class="btn-cancel">Отмена</a>
    </form>
</div>


<?php require_once __DIR__ . '/../../layout/footer.php'; ?>