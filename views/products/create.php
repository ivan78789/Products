<?php
$TitleName = 'Создать';

?>
<?php require_once __DIR__ . '/../../layout/header.php'; ?>
<?php require_once __DIR__ . '/../../layout/nav.php'; ?>


<a href="/" class="btn-back">Назад</a>

<div class="form-container">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" name="name" placeholder="Название продукта" class="form-input" required>
        </div>
        
        <div class="form-group">
            <textarea name="description" placeholder="Описание продукта" class="form-input" required></textarea>
        </div>
        
        <div class="form-group">
            <input type="number" step="0.01" name="price" placeholder="Цена" class="form-input" required>
        </div>
        
        <div class="form-group">
            <label>Загрузить изображение:</label>
            <input type="file" name="image" accept="image/*" class="form-input">
        </div>
        
        <button type="submit" class="btn-submit">Создать продукт</button>
    </form>
</div>

<?php require_once __DIR__ . '/../../layout/footer.php'; ?>