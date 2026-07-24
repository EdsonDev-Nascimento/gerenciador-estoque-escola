<?php
//inicia a sessão como se fosse uma sala onde ficam contidas as informações do usuário que está logado no momento.
session_start();

//faz a verificação se o nome_login e a senha_login que estão contidos na sessão são diferentes dos dados que estão no banco de dados
if(!$_SESSION['nome_login'] && $_SESSION['senha_login']) {
	//se forem diferentes o usuário é redirecionado para a página de login
	header('Location: ../index.php');
	exit();
}