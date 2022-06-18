CREATE DATABASE db_store;

USE db_store;

-- TABELAS --
CREATE TABLE tb_category(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    description VARCHAR(100) NOT NULL
);
CREATE TABLE tb_product(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    description VARCHAR(100) NOT NULL,
    photo VARCHAR(255) NOT NULL,
    price FLOAT(5,2) NOT NULL,
    category_id INT(11) NOT NULL,
    quantity INT(5) NOT NULL,
    created_at DATETIME NOT NULL
);

-- REGISTROS --
INSERT INTO tb_category (name, description)
VALUES
('Informática', 'Produtos de informática e acessórios para computador'),
('Escritório','Papelaria e materiais de escritório'),
('Eletrônicos','Eletrodomésticos e Eletroportáteis');

INSERT INTO tb_product (name, description, photo, price, category_id, quantity, created_at)
VALUES
('Manual de Persuasão do FBI', 'Neste livro o Ex-agente do FBI ensina como influenciar, atrair e conquistar pessoas!', 'https://images-na.ssl-images-amazon.com/images/I/41CKWlj01ML.jpg' , 34.99, 4, 7, '2022-06-13 09:32:46'),
('Teclado Gamer USB', 'Teclado USB Gamer com Leds', 'https://cdn.dooca.store/180/products/teclado-gamer-rgb-semi-mecanico_640x640+fill_ffffff.png?v=1581015802&webp=0' , 128.67, 1, 55, '2022-06-16 11:28:57');

('Mouse', 'Mouse USB Ergonômico', 'https://m.media-amazon.com/images/I/61zdXL7k6eL._AC_SX425_.jpg' , 76.89, 1, 34, '2022-06-16 11:28:57');