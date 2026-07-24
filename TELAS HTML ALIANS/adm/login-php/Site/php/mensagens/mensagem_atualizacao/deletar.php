<?php
//inclui o arquivo que faz a conexão com o banco de dados
include '../../../../conexao.php';

//puxa por meio do post o id que está contido no input da página anterior
$id_mensagematualizacao = $_POST['id_mensagematualizacao'];
            

            //variável que contém o metodo de delete
            $sql= "DELETE FROM TbMensagem_atualizacao WHERE id_mensagematualizacao = '$id_mensagematualizacao'";

            //executa o metodo que está na variável $sql por meio da conexão
            $deletar = mysqli_query($conexao,$sql) or mysqli_error();

            //exibe mensagem ao usuário e o redireciona a página mensagem_atualiza.php
            echo"<script>alert('Mensagem deletada com sucesso!');
			window.location='mensagem_atualizacao.php';
			</script>";     
?>