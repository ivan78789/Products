# Products
Сделал рабочий поиск по цене от меньшей до большей, и по названию продукта.
После ввода в посик нажмите на кнопку "Поиск", он выдаст вам то что вы ввели, конечно если оно есть в базе.
После желательно  нажмите на кнопку "Сброс", чтобы вернуть все.

#Реализовано:

 -- Добавление/удаление/редактирование товаров.

 -- Фильтрацию по цене.

 -- Поиск по названию.

 -- Загрузка изображения в /uploads.

 #Для заполнения базы:



CREATE DATABASE products_db;

USE products_db;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2),
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO products (name, description, price, image) VALUES
('Снимок экрана', 'Пример изображения 1', 1000.00, 'uploads/690f6d0d2b19b_Снимок экрана 2025-10-26 111452.png'),
('Изображение WhatsApp 1', 'Пример изображения 2', 1500.00, 'uploads/690f5a904ba5e_Изображение WhatsApp 2025-09-01 в 21.56.49_e6c625b3.jpg'),
('Изображение WhatsApp 2', 'Пример изображения 3', 2000.00, 'uploads/690f1c9e95a17_Изображение WhatsApp 2025-09-01 в 21.56.49_e6c625b3.jpg');
('Ноутбук Lenovo', 'Ноутбук Lenovo IdeaPad 3 с процессором Intel i5', 45000.00, 'images/lenovo_ideapad.jpg'),
('Смартфон Samsung', 'Samsung Galaxy A52, 128GB, черный', 30000.00, 'images/samsung_a52.jpg'),
('Наушники JBL', 'Беспроводные наушники JBL Tune 500BT', 7000.00, 'images/jbl_500bt.jpg'),
('Монитор LG', 'Монитор LG 24" Full HD, IPS', 12000.00, 'images/lg_24inch.jpg'),
('Клавиатура Logitech', 'Механическая клавиатура Logitech G413', 8500.00, 'images/logitech_g413.jpg'),
('Мышь Razer', 'Игровая мышь Razer DeathAdder V2', 6500.00, 'images/razer_deathadder.jpg'),
('Внешний жесткий диск', 'WD 2TB My Passport', 9000.00, 'images/wd_mypassport.jpg'),
('Смарт-часы Apple', 'Apple Watch Series 6, GPS, 44mm', 40000.00, 'images/apple_watch6.jpg'),
('Планшет Samsung', 'Samsung Galaxy Tab S6 Lite, 64GB', 25000.00, 'images/samsung_tab_s6.jpg'),
('Кофеварка Philips', 'Кофеварка Philips HD7767/00', 12000.00, 'images/philips_coffee.jpg');
