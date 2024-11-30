CREATE DATABASE shop;

USE shop;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    category VARCHAR(50) NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);

INSERT INTO products (name, category, price) VALUES
('Смартфон', 'Электроника', 500.00),
('Ноутбук', 'Электроника', 1000.00),
('Футболка', 'Одежда', 20.00),
('Куртка', 'Одежда', 50.00),
('Диван', 'Мебель', 300.00),
('Стол', 'Мебель', 150.00);
