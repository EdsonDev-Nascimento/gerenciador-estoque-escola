<?php
//inicia a sessão como se fosse uma sala onde ficam contidas as informações do usuário que está logado no momento.
session_start();
//puxa o arquivo conexão para conectar com o banco
include("conexao.php");

//pego o valor que foi digitado pelo usuário e insiro na variável pelo metodo post
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome_func_cadastro']));
$funcao = mysqli_real_escape_string($conexao, trim($_POST['funcao_func_cadastro']));
$cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf_func_cadastro']));
$datanasc = mysqli_real_escape_string($conexao, trim($_POST['datanasc_func_cadastro']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email_func_cadastro']));

//faz um count na tabela que está no banco para fazer a comparação se já existe aquele cpf cadastrado na tabela TbSolicitacao_cadastro
$sql = "select count(*) as total from TbSolicitacao_cadastro where cpf_func_cadastro = '$cpf'";
//executa a consulta
$result = mysqli_query($conexao, $sql);
//executa a consulta e armazena na matriz que está na variável $row
$row = mysqli_fetch_assoc($result);

//se já existir um cpf cadastrado na tabela
if($row['total'] == 1) {
	//muda o status da sessão['usuario_existe'] para true, para a exibição de uma mensagem para o usuário
	$_SESSION['usuario_existe'] = true;
	//redireciona o usuário para a página cadastro.php
	header('Location: cadastro.php');
	exit;
}

//insere o comando de inserção dos dados na variável $sql
$sql = "INSERT INTO TbSolicitacao_cadastro (nome_func_cadastro, funcao_func_cadastro, cpf_func_cadastro, datanasc_func_cadastro, email_func_cadastro, data_func_cadastro) VALUES ('$nome', '$funcao', '$cpf', '$datanasc', '$email', NOW())";

//senão existir o CPF ele executa o comando insert que está na variável $sql
if($conexao->query($sql) == TRUE) {
	//muda o status da sessão["status_cadastro"] para true para fazer uma exibição de uma mensagem para o usuário
	$_SESSION['status_cadastro'] = true;
}

//encerra a conexão
$conexao->close();

//redireciona o usuário para a página cadastro.php
header('Location: cadastro.php');
exit;
?>