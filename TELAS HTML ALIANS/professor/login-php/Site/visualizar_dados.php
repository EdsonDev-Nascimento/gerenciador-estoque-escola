<?php
// verifica o login do usuário através dos seus dados para segurança
include('../../../verifica_login.php');
//pega o arquivo que faz a conexão com o banco de dados
include('../../../conexao.php');
//insere o id_login do usuário que está na sessão em uma variável
$userid = $_SESSION['id_funcionario'];

//faz um consulta buscando todos os dados da tabela TbLogin e TbFuncionario comparando o id_login que está na variável coom o da tabela. E o id_login tem que ser o mesmo Id_funcionario, para que venha os dados do funcionário correto
$sql = mysqli_query($conexao, "SELECT * FROM TbFuncionario WHERE id_funcionario = '$userid'");

// insere esses dados em uma variável
$result = mysqli_fetch_assoc($sql);

?>

<!DOCTYPE html>
<html>

    <!--Meta para caracteres especiais e acentos.-->
<meta charset="utf-8">
<head>

	<title>Visualizar Dados</title>

  <!--Link pegando os estilos do arquivo css informado-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" type="text/css" href="css/demo.css" />
  <link rel="stylesheet" type="text/css" href="css/component.css" />
  <script src="js/modernizr.custom.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="http://code.jquery.com/jquery-1.8.1.min.js"></script>
    <!-- Parte que faz a função de tornar a senha oculta -->
	<script> function mS(tipo){ document.getElementById("senha").type = tipo; 
		$('#exibe').attr('onclick','mS("password")');
		if("password"==tipo){   
			$('#exibe').attr('onclick','mS("text")')}   
			 } 
	</script>  
</head>
<body bgcolor="#63B8FF">
  <div class="container">
      <ul id="gn-menu" class="gn-menu-main">
        <li class="gn-trigger">
          <a class="gn-icon gn-icon-menu"><span>Menu</span></a>
          <nav class="gn-menu-wrapper">
            <div class="gn-scroller">
              <ul class="gn-menu">
                <li>
                  <li style="padding-left: 30%"><img src="../Imagens/logo.png"></li>
                  <li><a href="home.php">Home</a></li>
                  <li><a href="visualizar_dados.php">Dados</a></li>
                  <li>
                  <a href="php/visualizacao_Mensagem.php">Mensagens</a>
                </li>
                <li><a href="Estoque.php">Estoque</a></li>
                <li><a href="Solicitacoes.php">Solicitações</a></li>
              </ul>
            </div><!-- /gn-scroller -->
          </nav>
        </li>
        <li><a href="sair.php"><span>Sair</span></a></li>
      </ul>
      <header>
     <center><div id="titulo">Visualizar Dados</div><br>
    <ul>
          <!-- A lista que faz a exibição de todos os dados que estão contidos na variável $result puxando pelo nome dos campos que estão na tabela -->
   		<li><div class="titulo">Nome:</div><input type="text" name="nome" class="w3-input" readonly="true" value="<?php echo $result['nome_funcionario']?>" /></li>
   		<li><div class="titulo">Email</div><input type="email" name="email" class="w3-input" readonly="true" value="<?php echo $result['email_funcionario']?>" /></li>
   		<li><div class="titulo">Nome de Usuário:</div><input type="text" name="usuario" readonly="true" class="w3-input" value="<?php echo $result['nome_login']?>" /></li>
   		<li><div class="titulo">CPF:</div><input type="text" name="cpf_funcionario" readonly="true" class="w3-input" value="<?php echo $result['cpf_funcionario']?>" /></li>
   		<li><div class="titulo">Data de nascimento:</div><input type="text" name="datanasc" readonly="true" class="w3-input" value="<?php echo date("d/m/y", strtotime($result ['datanasc_funcionario']))?>" /></li>
   		<li><div class="titulo">Senha atual:</div><input type="password" id="senha" readonly="true" name="senha" class="w3-input" value="<?php echo $result['senha_login']?>"><br><input type="checkbox" readonly="true" name="exibe" id="exibe" onclick="mS('text')"></li><br>
 	</ul>
 </center>
 </header> 
    </div><!-- /container -->
    <script src="js/classie.js"></script>
    <script src="js/gnmenu.js"></script>
    <script>
      new gnMenu( document.getElementById( 'gn-menu' ) );
    </script>
 </body>
 </html>