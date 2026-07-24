<?php
//inclui o arquivo conexão para conectar com o banco
include  '../../../conexao.php';

//pega o id que está no input da página anterior
$id_solicitacao = $_POST['id_solicitacao'];
            
            //variável armzena o metodo de exclusão usando id como paramêtro
            $sql= "DELETE FROM TbSolicitacao WHERE id_solicitacao = '$id_solicitacao'";

            //executa o metodo que está na variável $sql por meio da conexão
            $deletar = mysqli_query($conexao,$sql) or mysqli_error();

            //exibe mensagem ao usuário e o redireciona para a página Solicitacoes.php
            echo"<script>alert('Solicitação deletada com sucesso!');
			window.location='../../Solicitacoes.php';
			</script>";      
?>