<?php
// verifica o login do usuário através dos seus dados para segurança
include('../../../../../../verifica_login.php');
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
$id_funcionario = $_POST['id_funcionario'];
$senha_login = $_POST ['senha_login'];


//verifica se o usuário realmente colocou algo no campo, se não tiver colocado nada exibe uma mensagem e envia para a página adicionar1.php
if(empty($id_funcionario) || empty($senha_login))
{
echo"<script>alert('Os campos devem ser preenchidos!');
window.location='mudar.php';
</script>";
return false;
}
else
{
//se o usuário colocar algo é inserido na tabela usando a conexão e o insert, exibe também uma mensagem e redireciona para a página Solicitacoes.php 
if($result=mysqli_query($conexao, "UPDATE TbFuncionario SET senha_login = '$senha_login' WHERE id_funcionario = '$id_funcionario'") or mysqli_error())
{ 
echo"<script>alert('Senha alterada com sucesso!');
window.location='../../../Funcionarios.php';
</script>";
}
} 

?>
</div>
</body>
</html>