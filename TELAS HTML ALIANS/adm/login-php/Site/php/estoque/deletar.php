<?php
//inclui o arquivo que faz a conexão com o banco de dados
include '../../../conexao.php';

//puxa por meio do post o id que está contido no input da página anterior
$id_produto = $_POST['id_produto'];
            
			//variável que contém o metodo de delete
            $sql= "DELETE FROM TbProduto WHERE id_produto = '$id_produto'";

			//executa o metodo que está na variável $sql por meio da conexão
            $deletar = mysqli_query($conexao, $sql) or mysqli_error();
            
            //exibe mensagem ao usuário e o redireciona a página mensagem_atualiza.ph
            echo"<script>alert('Produto deletado com sucesso!');
			window.location='../../Estoque.php';
			</script>";     
?>