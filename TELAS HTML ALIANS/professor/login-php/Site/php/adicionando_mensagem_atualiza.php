<!DOCTYPE html>
<html>

    <!--Meta para caracteres especiais e acentos.-->
<meta charset="utf-8">
<head>
	<title>Adicionando Mensagem Atualização</title>

	<!--Link pegando os estilos do arquivo css informado-->
	<link rel="stylesheet" type="text/css" href="../styleadd.php">
</head>
<body>
	<div id="interface">
<?php

//incluindo dados conexão uma única vez.  
include_once "../../../../conexao.php"; 

//pego o valor que foi digitado pelo usuário e insiro na variável pelo metodo post
$mensagem_atualizacao = $_POST ['mensagem_atualizacao'];
$nome_mensagematualizacao = $_POST['nome_mensagematualizacao'];
$id_funcionario = $_POST ['id_funcionario'];

//verifica se o usuário realmente colocou algo no campo, se não tiver colocado nada exibe uma mensagem e envia para a página mensagem_atualiza.php
if( empty($mensagem_atualizacao) || empty($nome_mensagematualizacao))
{
echo"<script>alert('Os campos devem ser preenchidos!');
window.location='mensagem_atualiza.php';
</script>";
return false;
}
else
{
//se o usuário colocar algo é inserido na tabela usando a conexão e o insert, exibe também uma mensagem e redireciona para a página Solicitacoes.php 
if($result=mysqli_query($conexao, "insert into TbMensagem_atualizacao (mensagem_atualizacao, nome_mensagematualizacao, id_funcionario) values ('$mensagem_atualizacao','$nome_mensagematualizacao', '$id_funcionario')") or mysqli_error())
{ 
echo"<script>alert('Mensagem enviada com sucesso!');
window.location='Visualizacao_Mensagem.php';
</script>";
}
} 

?>
</div>
</body>
</html>