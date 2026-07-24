<?php
 date_default_timezone_set('America/Sao_Paulo');

// verifica o login do usuário através dos seus dados para segurança
include('../../../../verifica_login.php');
//pega o arquivo que faz a conexão com o banco de dados
include('../../../../conexao.php');
//insere o id_login do usuário que está na sessão em uma variável
$userid = $_SESSION['id_funcionario'];

$id_produto = $_GET['id_produto'];

//faz um consulta buscando todos os dados da tabela TbLogin e TbFuncionario comparando o id_login que está na variável coom o da tabela. E o id_login tem que ser o mesmo Id_funcionario, para que venha os dados do funcionário correto
$sql = mysqli_query($conexao, "SELECT * FROM TbFuncionario WHERE id_funcionario = '$userid'");

// insere esses dados em uma variável
$result = mysqli_fetch_assoc($sql);

$sql1 = mysqli_query($conexao, "SELECT * FROM TbProduto WHERE id_produto = '$id_produto'");

// insere esses dados em uma variável
$result1 = mysqli_fetch_assoc($sql1);

?>
<!DOCTYPE html>

    <!--Meta para caracteres especiais e acentos.-->
<meta charset="utf-8">
<html>
<head>
	<title>Adicionar Solicitação</title>

	<!--Link pegando os estilos do arquivo css informado-->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" type="text/css" href="../css/demo.css" />
  <link rel="stylesheet" type="text/css" href="../css/component.css" />
  <script src="js/modernizr.custom.js"></script>
  <script type="text/javascript">
//auto expand textarea
function adjust_textarea(h) {
    h.style.height = "20px";
    h.style.height = (h.scrollHeight)+"px";
}
</script>
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
      	<div id="titulo">Fazer Solicitação:</div>
      	<form class="form-style-7" name="method_post" action="adicionando.php" method="post">
				<ul>
				<li>
				    <label for="Hora">Hora</label>
				    <input type="time" name="hora_solicitacao">
				    <span>Hora da Solicitação</span>
				</li>
				<li>
				    <label for="Data">Data</label>
				    <input type="date" name="data_solicitacao" max="<?php echo date('Y-m-d')?>">
				    <span>Data da Solicitação</span>
				</li>
				<li>
				    <label for="url">Quantidade a ser retirada</label>
				    <input type="number" name="quantidade_solicitacao" maxlength="100">
				    <span>Quantidade a ser retirada do estoque</span>
				</li>
				<li>
				    <label for="bio">Quantidade</label>
				    <input type="number" name="quantidade_produto" readonly="true" onkeyup="adjust_textarea(this)" value="<?php echo $result1['quantidade_produto'];?>"></textarea>
				    <span>Quantidade disponível no estoque</span>
				</li>
				<li>
				    <label for="bio">Item</label>
				    <input type="text" name="item_solicitacao" readonly="true" onkeyup="adjust_textarea(this)" value="<?php echo $result1['nome_produto'];?>"></textarea>
				    <span>Item do estoque</span>
				</li>
				<li>
				    <label for="bio">Descrição do Produto</label>
				    <input type="text" name="descricao_solicitacao" readonly="true" onkeyup="adjust_textarea(this)" value="<?php echo $result1['descricao_produto'];?>"></textarea>
				    <span>Descrição do produto do estoque</span>
				</li>
				<li>
				    <label for="bio">Solicitante</label>
				    <input type="text" name="solicitante_solicitacao" readonly="true" onkeyup="adjust_textarea(this)" value="<?php echo $result['nome_funcionario'];?>"></textarea>
				    <span>Nome do solicitante</span>
				</li>

				<li>
					<input type="reset" value="Limpar" >
				    <input type="submit" value="Enviar" >
				</li>
				</ul>


								<input type="hidden" name="id_funcionario" value="<?php echo $result['id_funcionario'] ?>" />


								<input type="hidden" name="id_produto" value="<?php echo $result1['id_produto']?>" />
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