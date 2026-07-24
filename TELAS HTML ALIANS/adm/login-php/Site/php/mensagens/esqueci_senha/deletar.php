<?php
//inclui o arquivo que faz a conexão com o banco de dados
include '../../../../conexao.php';

//puxa por meio do post o id que está contido no input da página anterior
$id_esquecisenha = $_POST['id_esquecisenha'];
            
            //variável que contém o metodo de delete
            $sql= "DELETE FROM TbEsqueci_senha WHERE id_esqueci_senha = '$id_esquecisenha'";

            //executa o metodo delete que está contido na variável $sql com a conexão com o banco
            $deletar = mysqli_query($conexao,$sql) or mysqli_error();

            //exibe a mensagem para o usuário e o redireciona a página esqueci_senha.php
            echo"<script>alert('Mensagem deletada com sucesso!');
			window.location='esqueci_senha.php';
			</script>";     
?>