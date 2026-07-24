<?php
define('HOST', 'localhost');//define o host do banco de dados, ou seja, o servidor em que o banco de dados es~tá contido
define('USUARIO', 'root');//define o usuário que é root do banco de dados
define('SENHA', '');//define a senha para se conectar no banco deddos que no caso é em branco
define('DB', 'Banco');//define o nome da database do banco de dados
define('Porta', '3306');//Define a porta do servidor utilizado

//executa a conexão usando o HOST, USUARIO, SENHA, DATABASE que já foram definidos ali em cima, e se houver algum erro ele manda uma mensagem ao usuário
$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB, Porta) or die ('Não foi possível conectar');