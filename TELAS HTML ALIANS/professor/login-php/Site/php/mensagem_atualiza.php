<?php
// verifica o login do usuário através dos seus dados para segurança
include('../../../../verifica_login.php');
//pega o arquivo que faz a conexão com o banco de dados
include('../../../../conexao.php');
//insere o id_login do usuário que está na sessão em uma variável
$userid = $_SESSION['id_funcionario'];

//faz um consulta buscando todos os dados da tabela TbLogin e TbFuncionario comparando o id_login que está na variável coom o da tabela. E o id_login tem que ser o mesmo Id_funcionario, para que venha os dados do funcionário correto
$sql = mysqli_query($conexao, "SELECT * FROM TbFuncionario WHERE id_funcionario = '$userid'");

// insere esses dados em uma variável
$result = mysqli_fetch_assoc($sql);

?>
<!DOCTYPE HTML>

    <!--Meta para caracteres especiais e acentos.-->
<meta charset="utf-8">
<html>
<head>
	<title>Mensagem de Atualização</title>

	<!--Link pegando os estilos do arquivo css informado-->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" type="text/css" href="../css/demo.css" />
  <link rel="stylesheet" type="text/css" href="../css/component.css" />
  <script src="js/modernizr.custom.js"></script>
</head>
<body>
<div class="container">
      <ul id="gn-menu" class="gn-menu-main">
        <li class="gn-trigger">
          <a class="gn-icon gn-icon-menu"><span>Menu</span></a>
          <nav class="gn-menu-wrapper">
            <div class="gn-scroller">
              <ul class="gn-menu">
                <li>
                  <li style="padding-left: 30%"><img src="../../Imagens/logo.png"></li>
                  <li><a href="../home.php">Home</a></li>
                  <li><a href="../visualizar_dados.php">Dados</a></li>
                  <li>
                  <a href="visualizacao_Mensagem.php">Mensagens</a>
                </li>
                <li><a href="../Estoque.php">Estoque</a></li>
                <li><a href="../Solicitacoes.php">Solicitações</a></li>
              </ul>
            </div><!-- /gn-scroller -->
          </nav>
        </li>
        <li><a href="../sair.php"><span>Sair</span></a></li>
      </ul>
      <header>    
		<form class="metodo_post" name="metodo_post" method="post" action="adicionando_mensagem_atualiza.php">
					<center>
							<div id="titulo">Mandar Mensagem de Atualização da Solicitação:</div><br>
							<input type="hidden" name="id_funcionario" value="<?php echo $result['id_funcionario'] ?>" />

							<input type="hidden" name="nome_mensagematualizacao" value="<?php echo $result['nome_funcionario']?>">
									
							<div class="form-group">
							    <label id="corpo">Mensagem</label>
							    <textarea class="form-control" id="Mensagem" name="mensagem_atualizacao" rows="3"></textarea>
							  </div>
							<button type="reset" value="reset" title="Limpar">Limpar</button>
							<button type="submit" name="submit" class="formobjects" value="Enviar" title="Enviar">Enviar</button>
						</center>
				</form>
				</header> 
    </div><!-- /container -->
    <script src="../js/classie.js"></script>
    <script src="../js/gnmenu.js"></script>
    <script>
      new gnMenu( document.getElementById( 'gn-menu' ) );
    </script>
</body>
</html>