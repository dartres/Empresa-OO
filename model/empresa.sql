CREATE DATABASE empresa;
USE empresa;
CREATE TABLE `cargo` (
  `nomeCargo` varchar(50) NOT NULL,
  `codCargo` int(11) NOT NULL primary key auto_increment
  );
  
CREATE TABLE `departamento` (
  `nomeDepartamento` varchar(45) NOT NULL,
  `codDepartamento` int(11) NOT NULL PRIMARY KEY auto_increment
);

CREATE TABLE `funcionario` (
  `nome` varchar(40) NOT NULL,
  `cpf` char(11) NOT NULL,
  `telefone` char(15) NOT NULL,
  `endereco` varchar(70) NOT NULL,
  `funcional` int(11) NOT NULL PRIMARY KEY,
  `codDepartamento` int(11) NOT NULL,
   CONSTRAINT fkcodDepartamento foreign key(codDepartamento) references departamento(cod),
  `codCargo` int(11) NOT NULL
)
