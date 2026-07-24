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
$id_produto = $_POST['id_produto'];
$quantidade_produto = $_POST ['quantidade_produto'];
$quantidade_solicitacao= $_POST ['quantidade_solicitacao'];



if ($quantidade_produto < $quantidade_solicitacao) {
	echo"<script>alert('Não foi possível fazer a retirada porque não tem a quantidade suficiente! A quantidade disponível do produto no momento é: $quantidade_produto ');
	window.location='../../Estoque.php';
	</script>";
}
//se o usuário colocar algo é inserido na tabela usando a conexão e o insert, exibe também uma mensagem e redireciona para a página Solicitacoes.php 
elseif($result=mysqli_query($conexao, "UPDATE TbProduto SET quantidade_produto = quantidade_produto - '$quantidade_solicitacao' WHERE id_produto = '$id_produto'") or mysqli_error())
{ 
echo"<script>alert('Produto retirado com sucesso!');
window.location='../../Estoque.php';
</script>";
}
 

?>
</div>
</body>
</html>