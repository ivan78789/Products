<?php require_once __DIR__ . '/../../layout/header.php'; ?>
<?php require_once __DIR__ . '/../../layout/nav.php'; ?>



<?php if (!empty($error)): ?>
    <div style="color:red;">
        <?php foreach ($error as $err)
            echo "<p>$err</p>"; ?>
    </div>
<?php endif; ?>
<a href="/" class="btn-back">Назад</a>

<div class="form-container">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Название:</label>
            <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" class="form-input">
        </div>

        <div class="form-group">
            <label>Описание:</label>
            <textarea name="description" class="form-input"><?= htmlspecialchars($product['description']) ?></textarea>
        </div>

        <div class="form-group">
            <label>Цена:</label>
            <input type="number" step="0.01" name="price" value="<?= htmlspecialchars($product['price']) ?>"
                class="form-input">
        </div>

        <div class="form-group">
            <label>Текущая картинка:</label><br>
            <img src="/<?= $product['image'] ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="form-image"><br>
            <label>Загрузить новую картинку:</label>
            <input type="file" name="image" accept="image/*" class="form-input">
        </div>

        <button type="submit" class="btn-submit">Обновить продукт</button>
    </form>
</div>

<?php require_once __DIR__ . '/../../layout/footer.php'; ?>