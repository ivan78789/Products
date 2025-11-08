<?php
$TitleName = 'Поиск';
$searchName = $searchName ?? '';
$minPrice = $minPrice ?? '';
$maxPrice = $maxPrice ?? '';
$products = $products ?? [];
$priceRange = $priceRange ?? ['min_price' => 0, 'max_price' => 100000];

?>

<form method="get" class="search-form">
    <input type="text" name="search_name" placeholder="По названию" value="<?= htmlspecialchars($searchName ?? '') ?>"
        class="search-input">

    <input type="number" step="0.01" name="min_price" placeholder="Цена от"
        value="<?= htmlspecialchars($minPrice ?? '') ?>" min="0" max="100000" class="search-input">
    <input type="number" step="0.01" name="max_price" placeholder="Цена до"
        value="<?= htmlspecialchars($maxPrice ?? '') ?>" min="0" max="100000" class="search-input">

    <button type="submit" class="btn btn-search">Поиск</button>
    <a href="/" class="btn btn-reset">Сбросить</a>
</form>
