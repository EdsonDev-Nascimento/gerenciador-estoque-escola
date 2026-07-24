<?php
// verifica o login do usuário através dos seus dados para segurança
include('../../../../verifica_login.php');
//pega o arquivo que faz a conexão com o banco de dados
include('../../../../conexao.php');
?>
<!DOCTYPE html>
<html>

    <!--Meta para caracteres especiais e acentos.-->
<meta charset="utf-8">
<head>
	<title>Adicionando</title>

	<!--Link pegando os estilos do arquivo css informado-->
	<link rel="stylesheet" type="text/css" href="../styleadd.php">
</head>
<body>
	<div id="interface">
<?php

//pego o valor que foi digitado pelo usuário e insiro na variável pelo metodo post
$hora = $_POST ['hora_solicitacao'];
$data = $_POST ['data_solicitacao'];
$quantidade = $_POST ['quantidade_solicitacao'];
$quantidade_total = $_POST ['quantidade_produto'];
$item = $_POST ['item_solicitacao'];
$descricao = $_POST ['descricao_solicitacao'];
$solicitante = $_POST ['solicitante_solicitacao'];
$id_produto = $_POST ['id_produto'];
$id_funcionario = $_POST ['id_funcionario']; 


//Verifica se a quantidade solicitada é maior que a quantidade total, se sim então o programa exibe a mensgem de erro e redireciona para a página de estoque
if($quantidade_total < $quantidade){
	echo"<script>alert('Não foi possível fazer a retirada porque não tem a quantidade suficiente! A quantidade disponível do produto no momento é: $quantidade_total ');
	window.location='../Estoque.php';
	</script>";
}
//se o usuário colocar algo é inserido na tabela usando a conexão e o insert, exibe também uma mensagem e redireciona para a página Solicitacoes.php 
elseif($result=mysqli_query($conexao, "INSERT INTO TbSolicitacao (hora_solicitacao, data_solicitacao, quantidade_solicitacao, quantidade_produto, item_solicitacao, descricao_solicitacao, solicitante_solicitacao, id_produto, id_funcionario) values ('$hora', '$data', '$quantidade', '$quantidade_total', '$item', '$descricao', '$solicitante', '$id_produto',  '$id_funcionario')") or mysqli_error())
{ 
echo"<script>alert('Solicitação adicionada com sucesso!');
window.location='../Solicitacoes.php';
</script>";
}
	 

?>
</div>
</body>
</html>