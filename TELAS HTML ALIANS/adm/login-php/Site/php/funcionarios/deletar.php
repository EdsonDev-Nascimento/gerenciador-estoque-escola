<?php
//inclui o arquivo que faz a conexão com o banco de dados
include '../../../conexao.php';

//puxa por meio do post o id que está contido no input da página anterior
$id_funcionario = $_POST ['id_funcionario'];
           
			//variável que contém o metodo de delete

            $sql= "DELETE FROM TbFuncionario WHERE id_funcionario = '$id_funcionario'";

			//executa o metodo que está na variável $sql por meio da conexão
            $deletar = mysqli_query($conexao, $sql) or mysqli_error();
            
            


//exibe mensagem ao usuário e o redireciona a página Funcionarios.php
            echo"<script>alert('Funcionário deletado com sucesso!');
			window.location='../../Funcionarios.php';
			</script>";     

            //executa o metodo que está na variável $sql por meio da conexão
    	

           	?>





     

        
