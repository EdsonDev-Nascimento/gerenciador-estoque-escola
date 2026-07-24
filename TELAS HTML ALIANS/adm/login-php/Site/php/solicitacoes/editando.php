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
	<title>Editando</title>

	<!--Link pegando os estilos do arquivo css informado-->
	<link rel="stylesheet" type="text/css" href="../styleadd.php">
</head>
<body>
	<div id="interface">
<?php
//pego o valor que foi digitado pelo usuário e insiro na variável pelo metodo post
$id_solicitacao = $_POST ['id_solicitacao'];
$hora_solicitacao = $_POST ['hora_solicitacao'];
$data_solicitacao = $_POST ['data_solicitacao'];
$quantidade_solicitacao = $_POST ['quantidade_solicitacao'];
$item_solicitacao = $_POST ['item_solicitacao'];
$descricao_solicitacao = $_POST ['descricao_solicitacao'];
$solicitante_solicitacao = $_POST ['solicitante_solicitacao'];
$id_funcionario = $_POST ['id_funcionario'];

//verifica se o usuário realmente colocou algo no campo, se não tiver colocado nada exibe uma mensagem e envia para a página solicitacoes.php
if(empty($id_solicitacao) || empty($hora_solicitacao) || empty($data_solicitacao) || empty($quantidade_solicitacao) || empty($item_solicitacao) || empty($descricao_solicitacao) || empty($solicitante_solicitacao) || empty($id_funcionario))
{
echo"<script>alert('Os campos devem ser preenchidos!');
window.location='../../Solicitacoes.php';
</script>";
return false;
}
else
{
//se o usuário colocar algo é atuaizado na tabela usando a conexão e o update
if($result=mysqli_query($conexao, "UPDATE TbSolicitacao SET hora_solicitacao = '$hora_solicitacao', data_solicitacao = '$data_solicitacao', quantidade_solicitacao = '$quantidade_solicitacao', item_solicitacao = '$item_solicitacao', descricao_solicitacao = '$descricao_solicitacao', solicitante_solicitacao = '$solicitante_solicitacao', id_funcionario = '$id_funcionario' WHERE id_solicitacao = '$id_solicitacao'") or mysqli_error())
{ 
// exibe também uma mensagem e redireciona para a página Solicitacoes.php 
echo"<script>alert('Solicitação atualizado com sucesso!');
window.location='../../Solicitacoes.php';
</script>";
}
} 

?>
</div>
</body>
</html>