<?php
//inicia a sessão como se fosse uma sala onde ficam contidas as informações do usuário que está logado no momento.
session_start();
//puxa o arquivo conexão para conectar com o banco
include("conexao.php");

//pego o valor que foi digitado pelo usuário e insiro na variável pelo metodo post
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome_func']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email_func']));
$cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf_func']));

//faz a conta para fazer a comparação para saber se já existe esse email cadastrado na tabela
$sql = "select count(*) as total from TbEsqueci_senha where cpf_func = '$cpf'";

//faz a consulta na tabela do funcionário para saber se realmente existe aquele CPF cadastrado no banco
$dados ="select count(*) as total from TbFuncionario where cpf_funcionario = '$cpf'";

//executa a consulta no banco e armazena na variável $resultado
$resultado = mysqli_query($conexao, $dados);

//faz uma matriz com colunas e linhas com o resultado da consulta
$linha = mysqli_fetch_assoc($resultado);

//executa a consulta no banco e armazena na variável $result
$result = mysqli_query($conexao, $sql);

//faz uma matriz com colunas e linhas com o resultado da consulta
$row = mysqli_fetch_assoc($result);

//se não existir o cpf no banco ele altera o status da sessão para exibir a mensagem e manda para a página esqueci_senha.php
if ($linha['total'] == 0) {
	$_SESSION['nao_existe'] = true;
	header('Location: esqueci_senha.php');
	exit;
}
//se já existir um email ele volta para a tela de esqueci a senha e mostra uma mensagem
elseif($row['total'] == 1) {
	$_SESSION['solicitacao_feita'] = true;
	//local que o usuário será enviado
	header('Location: esqueci_senha.php');
	exit;
}

$buscadados = "SELECT id_funcionario FROM TbFuncionario WHERE cpf_funcionario = '$cpf'";

//executa a consulta no banco e armazena na variável $resultado
$buscando = mysqli_query($conexao, $buscadados);

while ($array=mysqli_fetch_array($buscando)) {

                $id_funcionario= $array['id_funcionario'];
}

//código de inserção armazenado na variável sql
$sql = "INSERT INTO TbEsqueci_senha (nome_func, email_func, cpf_func, id_funcionario) VALUES ('$nome', '$email', '$cpf', '$id_funcionario')";

//se não houver nenhum outro email cadastrado nessa tabela ele executa o insert 
if($conexao->query($sql) == TRUE) {
	//altera o status da sessão para exibir uma mensagem
	$_SESSION['status_cadastro'] = true;
}

//encerra a conexão
$conexao->close();

//e envia o usuário a página de esqueci a senha
header('Location: esqueci_senha.php');
exit;
?>