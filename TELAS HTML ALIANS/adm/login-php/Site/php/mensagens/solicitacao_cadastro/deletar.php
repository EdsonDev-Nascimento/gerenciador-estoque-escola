<?php
//inclui o arquivo conexão para conectar com o banco
include '../../../../conexao.php';

//pega o id por meio do input que está na página anterior
$id_solicitacao_cadastro = $_POST['id_solicitacao_cadastro'];
            
            //variável que armazena o metodo delete
            $sql= "DELETE FROM TbSolicitacao_cadastro WHERE id_solicitacao_cadastro = '$id_solicitacao_cadastro'";

            //executa o metodo que está contido na variável $sql por meio da conexão
            $deletar = mysqli_query($conexao,$sql) or mysqli_error();

            //exibe mensagem ao usuário e o redireciona a página solicitacao_cadastro.php
            echo"<script>alert('Mensagem deletada com sucesso!');
			window.location='solicitacao_cadastro.php';
			</script>";     
?>