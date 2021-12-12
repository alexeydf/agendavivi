CREATE DATABASE vivilira;

CREATE TABLE clientes(
  idcliente INT PRIMARY KEY auto_increment,
  nome VARCHAR(255),
  endereco VARCHAR(255),
  cpf VARCHAR(15),
  email VARCHAR(255),
  telefone VARCHAR(20),
  datacad DATETIME default current_timestamp
);
CREATE TABLE agenda(
  idagenda INT PRIMARY KEY auto_increment,
  idcliente INT,
  dataservico DATE,
  horario VARCHAR(10),
  idservico INT,
  situacao VARCHAR(15) default "Pendente",
  dataretoque DATE,
  observacao TEXT,

  CONSTRAINT fk_cliente FOREIGN KEY (idcliente) REFERENCES clientes (idcliente),
  CONSTRAINT fk_servico FOREIGN KEY (idservico) REFERENCES servicos (idservico)
);

CREATE TABLE servicos(
  idservico INT PRIMARY KEY auto_increment,
  nome VARCHAR(255),
  agendados INT default 0
);
INSERT INTO servicos(
  nome
)VALUES
('Fio a Fio Microblading'),
('Micropigmentaçâo'),
('Shadowline'),
('Fios com Shadow'),
('Shading'),
('Maquiagem definitiva nos olhos'),
('Micropigmentacao labial'),
('Revitalização Labial'),
('Nutri Gloss'),
('Lash lifting'),
('Brow lamination'),
('Blefaroplastia sem corte'),
('Limpeza de pele'),
('Remoção de verrugas'),
('Shadow');

CREATE TABLE retoques(
  idretoque INT PRIMARY KEY auto_increment,
  idcliente INT,
  idservico INT,
  dataretoque DATE,
  situacao INT default 0;

  CONSTRAINT fk_clienter FOREIGN KEY (idcliente) REFERENCES clientes (idcliente),
  CONSTRAINT fk_servicor FOREIGN KEY (idservico) REFERENCES servicos (idservico)
);

ALTER TABLE retoques ADD situacao INT default 0;