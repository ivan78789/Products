<?php

require_once __DIR__ . '/router.php';


get('/', 'views/index.php');





get('/products/create', 'include/create.php');
post('/products/create', 'include/create.php');

post('/products/update', 'include/update.php');
get('/products/update', 'include/update.php');

post('/products/show', 'include/show.php');
get('/products/show', 'include/show.php');

get('/products/delete', 'include/delete.php');
post('/products/delete', 'include/delete.php');

get('/products', 'include/read.php');


any('/404', 'views/404.php');
