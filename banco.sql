CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    cpf VARCHAR(20) NOT NULL,
    endereco TEXT NOT NULL,
    data_nascimento DATE NOT NULL,
    is_admin BOOLEAN DEFAULT FALSE
);

CREATE TABLE categorias_roupas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL
);

CREATE TABLE roupas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT,
    categoria_id INT,
    genero ENUM('masculino', 'feminino', 'unissex') NOT NULL,
    foto VARCHAR(300) NOT NULL, 
    preco DECIMAL(10, 2) NOT NULL,
    quantidade_estoque INT NOT NULL,
    FOREIGN KEY (categoria_id) REFERENCES categorias_roupas(id)
);

CREATE TABLE roupas_likes (
    usuario_id INT,
    roupa_id INT,
    gostou BOOLEAN,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (roupa_id) REFERENCES roupas(id),
    PRIMARY KEY (usuario_id, roupa_id)
);

CREATE TABLE carrinho (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    produto_id INT,
    quantidade INT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (produto_id) REFERENCES roupas(id)
);
