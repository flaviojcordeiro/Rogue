CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    cpf VARCHAR(20) NOT NULL UNIQUE,
    endereco TEXT NOT NULL,
    data_nascimento DATE NOT NULL,
    is_admin INT  DEFAULT 0;
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
    foto VARCHAR(300), 
    preco DECIMAL(10, 2) NOT NULL,
    quantidade_estoque INT NOT NULL,
    FOREIGN KEY (categoria_id) REFERENCES categorias_roupas(id)
);

CREATE TABLE carrinho (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    produto_id INT,
    quantidade INT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
);

CREATE TABLE chat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    atendente_id INT,
    usuario_id INT,
    mensagem TEXT,
    data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (atendente_id) REFERENCES usuarios(id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE historico_pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    total DECIMAL(10, 2) NOT NULL,
    data_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE historico_pedido_itens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pedido_id INT,
    produto_id INT,
    quantidade INT,
    preco DECIMAL(10, 2),
    FOREIGN KEY (pedido_id) REFERENCES historico_pedidos(id),
    FOREIGN KEY (produto_id) REFERENCES roupas(id)
);

CREATE TABLE preferencias (
    usuario_id INT PRIMARY KEY,
    preferencias VARCHAR(255),
    genero VARCHAR(50),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE favoritos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    id_roupa INT,
    data_favoritacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_roupa) REFERENCES roupas(id)
);
