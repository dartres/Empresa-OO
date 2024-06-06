-- drop database empresa0702;
-- apaga o banco de dados

create database empresa0702;
-- comando para criar um banco de dados
use empresa0702;
-- comando para acessar o banco criado

/*
INICIO DA CRIAÇÃO DE TABELA EM SQL
*/
create table funcionario 
(
	funcional int auto_increment not null primary key,
    cpf char(11) not null unique ,
    nome varchar(40) not null,
    telefone char(15) null,
    endereco varchar(70) not null

);
-- --	-------- CAMPOS INDICES E CHAVES PRIMÁRIAS ------------------- 

/*A tabela acima possui um erro grave de REGRA DE IDENTIDADE
da forma como está, nenhum ATRIBUTO (Coluna) permite IDENTIFICAR
UM REGISTRO COMO UNICO.
Registro é a linha da tabela, que no nosso caso idenfica cada funcionário.
Para controlar duplicidade de dados devemos analisar as colunas
e verificar quais possuem as regras de NÃO SEREM NULAS e que NÃO 
DEVEM PERMITIR A INSERÇÃO DE VALORES REPETIDOS.
páginas 39 à 41 da apostila.

Analisando nossa tabela verificamos que FUNCIONAL E CPF não deveriam
aceitar duplicidade de valores, ou seja repetição e que também não
podem ser nulas.

Entre essas duas colunas, deve-se verificar qual deve ser primária 
e qual deve ser considerada única.
- CHAVE PRIMÁRIA - primary key, apenas uma coluna em cada tabela;
- CHAVE UNICA OU CANDIDATA - unique, pode ter mais que uma na tabela;
- Definiremos CPF como UNIQUE e 
-- --- inserir a chave primaria por alteração de tabela---------

-- altera a regra do mysql para exclusão de registros e atualização*/
set sql_safe_updates=1;

-- altera a tabela funcionario inserindo a chave primaria na 
-- coluna funcional

-- CRIAR TABELA DEPARTAMENTO
create table departamento (
nomeDepartamento varchar(70) not null,
codDepartamento int auto_increment not null,
constraint uqDepto unique (nomeDepartamento),
constraint primary key(codDepartamento)
);

-- ALTERAR FUNCIONARIO PARA RECEBER A CHAVE ESTRANGEIRA
-- DEPARTAMENTO 1: FUNCIONARIO N
	alter table funcionario add codDepartamento int not null;
    
    alter table funcionario add constraint fkfuncDepto
    foreign key (codDepartamento) references departamento (codDepartamento);

-- CRIAÇÃO DA TABELA CARGO
create table cargo 
(
	nomeCargo varchar(70) not null unique,
    codCargo int auto_increment not null primary key
    );
    
-- alterar funcionario e adicionar a estrangeira com Cargo
alter table funcionario add codCargo int not null;
alter table funcionario add constraint fkCargoFunc
foreign key (codCargo) references cargo (codCargo);
    
