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
$item = $_POST ['item_solicitacao'];
$descricao = $_POST ['descricao_solicitacao'];
$solicitante = $_POST ['solicitante_solicitacao'];
$id_funcionario = $_POST ['id_funcionario']; 

//verifica se o usuário realmente colocou algo no campo, se não tiver colocado nada exibe uma mensagem e envia para a página adicionar1.php
if(empty($solicitante) || empty($item) || empty($quantidade) || empty($data) || empty($hora) || empty($descricao))
{
echo"<script>alert('Os campos devem ser preenchidos!');
window.location='adicionar1.php';
</script>";
return false;
}
else
{
//se o usuário colocar algo é inserido na tabela usando a conexão e o insert, exibe também uma mensagem e redireciona para a página Solicitacoes.php 
if($result=mysqli_query($conexao, "insert into TbSolicitacao (hora_solicitacao, data_solicitacao, quantidade_solicitacao, item_solicitacao,descricao_solicitacao, solicitante_solicitacao, id_funcionario) values ('$hora', '$data', '$quantidade', '$item', '$descricao', '$solicitante', '$id_funcionario')") or mysqli_error())
{ 
echo"<script>alert('Solicitação adicionada com sucesso!');
window.location='../../Solicitacoes.php';
</script>";
}
} 

?>
</div>
</body>
</html>