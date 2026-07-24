<?php
// verifica o login do usuário através dos seus dados para segurança
include('../../../../../verifica_login.php');
//pega o arquivo que faz a conexão com o banco de dados
include('../../../conexao.php');
?>
<!DOCTYPE html>
<html>
    <!--Meta para caracteres especiais e acentos.-->
	<meta charset="utf-8">
		<head>
			<title>Adicionando no Estoque</title>
			<!--Link pegando os estilos do arquivo css informado-->
				<link rel="stylesheet" type="text/css" href="../styleadd.php">
			</head>
		<body>
	<div id="interface">
<?php

	//pego o valor que foi digitado pelo usuário e insiro na variável pelo metodo post
	$nome_produto = $_POST ['nome_produto'];
	$quantidade_produto = $_POST ['quantidade_produto'];
	$tipo_produto = $_POST ['tipo_produto'];
	$descricao_produto = $_POST ['descricao_produto'];

		//verifica se o usuário realmente colocou algo no campo, se não tiver colocado nada exibe uma mensagem e envia para a página adicionar1.php
		if(empty($nome_produto) || empty($quantidade_produto) || empty($tipo_produto) || empty($descricao_produto))
		{
		echo"<script>alert('Os campos devem ser preenchidos!');
		window.location='adicionar.php';
		</script>";
		return false;
		}
		else
		{

			//se o usuário colocar algo é inserido na tabela usando a conexão e o insert, exibe também uma mensagem e redireciona para a página Solicitacoes.php 
			if($result=mysqli_query($conexao, "insert into TbProduto (nome_produto, quantidade_produto, tipo_produto, descricao_produto) values ('$nome_produto', '$quantidade_produto', '$tipo_produto', '$descricao_produto')") or mysqli_error())
			{ 
			echo"<script>alert('Produto adicionado com sucesso!');
			window.location='../../Estoque.php';
			</script>";
			}
		} 

?>
</div>
	</body>
</html>