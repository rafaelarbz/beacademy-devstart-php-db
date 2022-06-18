USE db_escola;

-- INSERIR 1 REGISTRO --
INSERT INTO tb_professor (nome, email, cpf)
VALUES (
    'Chiquim', 'chiquim@email.com', '12312312311'
);

-- INSERIR + DE 1 REGISTRO --
INSERT INTO tb_professor (nome, email, cpf)
VALUES 
('Zezim', 'zezim@email.com', '12312312319'),
('Maria', 'maria@email.com', '12312312310'),
('Luiza', 'luiza@email.com', '12312312314');

-- EXCLUIR 1 REGISTRO -- 
DELETE FROM tb_professor WHERE id='10';

-- EXCLUIR TODOS OS REGISTROS --
DELETE FROM tb_professor;

-- EDITAR 1 REGISTRO --
UPDATE tb_professor SET nome='Luizinha' WHERE id='14';

-- EDITTAR TODOS OS REGISTROS --
UPDATE tb_professor SET nome='Luizinha';

-- SELECIONAR TODOS OS DADOS DE UM REGISTRO --
SELECT * FROM tb_professor WHERE id='10';

-- SELECIONAR ALGUNS DADOS DE TODOS OS REGISTROS --
SELECT nome, cpf FROM tb_professor;