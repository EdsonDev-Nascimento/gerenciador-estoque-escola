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
$id_funcionario = $_POST ['id_funcionario'];
$funcao_funcionario = $_POST ['funcao_funcionario'];
$cpf_funcionario = $_POST ['cpf_funcionario'];
$nome_login = $_POST ['nome_login'];
$senha_login = $_POST ['senha_login'];
$datanasc_funcionario = $_POST ['datanasc_funcionario'];
$nome_funcionario = $_POST ['nome_funcionario'];
$email_funcionario = $_POST ['email_funcionario'];

//verifica se o usuário realmente colocou algo no campo, se não tiver colocado nada exibe uma mensagem e envia para a página adicionar1.php
if(empty($id_funcionario) || empty($funcao_funcionario) || empty($cpf_funcionario) || empty($nome_funcionario) || empty($senha_login) || empty($datanasc_funcionario) || empty($nome_funcionario) || empty($email_funcionario))
{
echo"<script>alert('Os campos devem ser preenchidos!');
window.location='../../Funcionarios.php';
</script>";
return false;
}
else
{
//se o usuário colocar algo é inserido na tabela usando a conexão e o insert, exibe também uma mensagem e redireciona para a página Solicitacoes.php 
if($result=mysqli_query($conexao, "UPDATE TbFuncionario SET funcao_funcionario = '$funcao_funcionario', cpf_funcionario = '$cpf_funcionario', nome_login = '$nome_login', senha_login = '$senha_login', datanasc_funcionario = '$datanasc_funcionario', nome_funcionario = '$nome_funcionario', email_funcionario = '$email_funcionario' WHERE id_funcionario = '$id_funcionario'") or mysqli_error())
{ 
echo"<script>alert('Funcionário atualizado com sucesso!');
window.location='../../Funcionarios.php';
</script>";
}
} 

?>
</div>
</body>
</html>