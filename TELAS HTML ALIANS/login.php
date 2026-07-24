<?php
//inicia a sessão como se fosse uma sala onde ficam contidas as informações do usuário que está logado no momento.
session_start();
//puxa o arquivo conexão para conectar com o banco
include('conexao.php');

//verifica se o usuário realmente colocou algo no campo
if(empty($_POST['nome_login']) || empty($_POST['senha_login'])) {
	//senão tiver colocado nada ele é redirecionado para a página index.php
	header('Location: index.php');
	exit();
}

//pego o valor que foi digitado pelo usuário e insiro na variável pelo metodo post
$usuario = mysqli_real_escape_string($conexao, $_POST['nome_login']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha_login']);

//faz um count na tabela que está no banco para fazer a comparação se já existe aquele nome de usuário e senha
$query = "select * from TbFuncionario where nome_login = '{$usuario}' and senha_login = '{$senha}'";

//md5('{$senha})'

//executa a comparação da variável query e armazena o resultado em $result
$result = mysqli_query($conexao, $query);

//armazena todo o resultado de $result na variável $rows através do mysqli_num_rows que conta todos as linhas da tabela
$row = mysqli_num_rows($result);

//se houver o nome_login e senha_login registrados na tabela
if($row == 1) {
	//pega a matriz dos resultados que foram obtidos na variável result, ou seja, os dados do usuário e armazena na variável $usuario_bd
	$usuario_bd = mysqli_fetch_assoc($result);

	//puxa os dados que foram armazenados na variável $usuario_bd e joga na sessão em que o usuário está logado
	$_SESSION['nome_login'] = $usuario_bd['nome_login'];
	$_SESSION['senha_login'] = $usuario_bd['senha_login'];
	$_SESSION['nome_funcionario'] = $usuario_bd['nome_funcionario'];
	$_SESSION['id_funcionario'] = $usuario_bd['id_funcionario'];
	$_SESSION['funcao_funcionario']  =  $usuario_bd['funcao_funcionario'];

//usando if para determinar onde cada usuário  será redirecionado através do campo função do banco de dados.
//se for administrador irá para a página de adm
if(isset($_SESSION['funcao_funcionario']) && $usuario_bd['funcao_funcionario'] == "Administrador"){
  header("Location: adm/login-php/Site/home.php");  
}else{
  //se for professor ira para a página destinada aos professores
  header("Location: professor/login-php/Site/home.php");      
}
}else{
	$_SESSION['nao_autenticado'] = true;

	//o usuário é redirecionado para a página de login novamente.
	header('Location: index.php');
	exit();
}
