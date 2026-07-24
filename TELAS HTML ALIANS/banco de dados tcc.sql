DROP database Banco;
create database Banco;
use Banco;


-- CRIANDO A TABELA 'PRODUTOS' --
create table TbProduto (
id_produto int not null auto_increment Primary key,
nome_produto varchar(50) not null,
quantidade_produto int(13) not null,
tipo_produto varchar(50) not null,  
descricao_produto varchar(500) not null

);
describe TbProduto;

-- CRIANDO A TABELA 'FUNCIONARIO' --
create table TbFuncionario (
id_funcionario int not null auto_increment Primary key,
funcao_funcionario varchar(50) not null,
cpf_funcionario varchar (14) not null,
nome_login varchar(50) not null,
senha_login varchar (50)not null,
datanasc_funcionario date not null,
nome_funcionario varchar(100) not null,
email_funcionario varchar (100) not null
);
describe TbFuncionario;

-- CRIANDO A TABELA 'SOLICITAÇÃO' --
create table TbSolicitacao (
id_solicitacao int not null auto_increment Primary key,
hora_solicitacao Time not null,
data_solicitacao Date not null,
quantidade_solicitacao int (5) not null,
quantidade_produto int,
item_solicitacao varchar (100) not null,
descricao_solicitacao varchar (300) not null,
solicitante_solicitacao varchar (100) not null,
id_produto int not null,
constraint fk_Produto_Solicitacao foreign key (id_produto) references TbProduto (id_produto),
id_funcionario int not null,
-- ADICIONANDO UMA CHAVE ESTRANGEIRA, FAZENDO LIGAÇÃO ENTRE AS TABELAS 'SOLICITAÇÃO' E 'FUNCIONARIO'	
constraint fk_Funcionario_Solicitacao foreign key (id_funcionario) references TbFuncionario (id_funcionario)
);
describe TbSolicitacao;

-- criando a tabela 'SOLICITACAO DE CADASTRO' --
create table TbSolicitacao_cadastro (
id_solicitacao_cadastro int not null auto_increment primary key,
nome_func_cadastro varchar (100) not null,
funcao_func_cadastro varchar (50) not null,
cpf_func_cadastro varchar (14) not null,
datanasc_func_cadastro date not null,
email_func_cadastro varchar (100) not null,
data_func_cadastro datetime not null
);
describe TbSolicitacao_cadastro;

-- criando a tabela 'ESQUECI_SENHA' --
create table TbEsqueci_senha (
id_esqueci_senha int auto_increment primary key,
nome_func varchar(100)not null,
email_func varchar(100)not null,
cpf_func varchar(14)not null,
id_funcionario int,
foreign key (id_funcionario) references TbFuncionario (id_funcionario)
);

-- CRIANDO A TABELA DE SOLICITAÇÃO DE ATUALIZAÇÃO 
create table TbMensagem_atualizacao (
id_mensagematualizacao int not null auto_increment primary key,
nome_mensagematualizacao varchar(100)not null,
mensagem_atualizacao varchar(500) not null,
-- ADICIONANDO UMA CHAVE ESTRANGEIRA, FAZENDO LIGAÇÃO ENTRE AS TABELAS 'MENSAGEM' E 'FUNCIONARIO'
id_funcionario int not null,
constraint fk_Funci_mensagem foreign key (id_funcionario) references TbFuncionario (id_funcionario)
);

INSERT INTO `banco`.`tbfuncionario` (`id_funcionario`, `funcao_funcionario`, `cpf_funcionario`, `nome_login`, `senha_login`, `datanasc_funcionario`, `nome_funcionario`, `email_funcionario`) VALUES (NULL, 'Administrador', '111.111.111-11', 'Edson', '123', '2002-01-05', 'Edson', 'edson@edson');

drop table TbMensagem_atualizacao;



