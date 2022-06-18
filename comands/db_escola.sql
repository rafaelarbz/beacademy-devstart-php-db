-- PARA CRIAR UM DB --
CREATE DATABASE db_escola;

-- PARA SELECIONAR UM DB --
USE db_escola;

-- PARA CRIAR TABELAS --
CREATE TABLE tb_professor (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    cpf CHAR(11) UNIQUE NOT NULL,
    email VARCHAR(255)  UNIQUE NOT NULL

);
CREATE TABLE tb_aluno (
    nome VARCHAR(100) NOT NULL,
    cpf CHAR(11) UNIQUE NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    matricula VARCHAR(10) UNIQUE NOT NULL

);

-- INSERIR DADOS --
INSERT INTO tb_professor (nome, email, cpf)
VALUES (
    'Alessandro', 'ale@email.com', '12312312312'
);

-- VER DADOS DE UMA TABELA -- 
SELECT * FROM tb_professor;

-- EXCLUIR TABELA -- 
DROP TABLE tb_professor;
