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
	<title>Retirando</title>

	<!--Link pegando os estilos do arquivo css informado-->
	<link rel="stylesheet" type="text/css" href="../styleadd.php">
</head>
<body>
	<div id="interface">
<?php
//pego o valor que foi digitado pelo usuário e insiro na variável pelo metodo post
$id_produto = $_POST ['id_produto'];
$quantidade_produto = $_POST ['quantidade_produto'];
$retira_produto = $_POST ['retira_produto'];


//verifica se o usuário realmente colocou algo no campo, se não tiver colocado nada exibe uma mensagem e envia para a página adicionar1.php

if ($quantidade_produto < $retira_produto) {
	echo"<script>alert('Não foi possível fazer a retirada porque não tem a quantidade suficiente! A quantidade disponível do produto no momento é: $quantidade_produto ');
	window.location='../../Estoque.php';
	</script>";
}
//se o usuário colocar algo é inserido na tabela usando a conexão e o insert, exibe também uma mensagem e redireciona para a página Solicitacoes.php 
else($result=mysqli_query($conexao, "UPDATE TbProduto SET quantidade_produto = quantidade_produto - '$retira_produto' WHERE id_produto = '$id_produto'") or mysqli_error())
{ 
echo"<script>alert('Produto retirado com sucesso!');
window.location='../../Estoque.php';
</script>";
}
} 

?>
</div>
</body>
</html>