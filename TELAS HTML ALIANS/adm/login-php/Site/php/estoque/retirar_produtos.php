<?php 
include '../../../conexao.php';

$id_produto = $_GET['id'];

$sql = mysqli_query($conexao, "SELECT * FROM TbProduto WHERE id_produto = '$id_produto'");

$result = mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>

    <!--Meta para caracteres especiais e acentos.-->
<meta charset="utf-8">
<html>
<head>
	<title>Retirada de Produtos</title>

	<!--Link pegando os estilos do arquivo css informado-->
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="../../css/demo.css" />
    <link rel="stylesheet" type="text/css" href="../../css/component.css" />
    <script src="../../js/modernizr.custom.js"></script>
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
                  <li><img src="../../../Imagens/logo.png"></li>
                  <li><a href="../../home.php">Home</a></li>
                  <li><a href="../../visualizar_dados.php">Dados</a></li>
                  <li>
                  <a href="../../Mensagens.php">Mensagens</a>
                  <ul class="gn-submenu">
                    <li><a href="../../php/mensagens/solicitacao_cadastro/solicitacao_cadastro.php">Solicitação de Cadastro</a></li>
                    <li><a href="../../php/mensagens/esqueci_senha/esqueci_senha.php">Mudança de Senha</a></li>
                    <li><a href="../../php/mensagens/mensagem_atualizacao/mensagem_atualizacao.php">Mensagem de Atualização</a></li>
                  </ul>
                </li>
                <li><a href="../../Estoque.php">Estoque</a></li>
                <li><a href="../../Solicitacoes.php">Solicitações</a></li>
                <li>
                  <a href="../../Funcionarios.php">Funcionários</a>
                </li>
              </ul>
            </div><!-- /gn-scroller -->
          </nav>
        </li>
        <li><a href="../../sair.php"><span>Sair</span></a></li>
      </ul>
      <header>
        <div id="titulo">Retirada de Produtos</div>
      <form class="form-style-7" name="method_post" action="retirando.php" method="post">
        <ul>
        <li>
            <label for="Id do Produto">Id do Produto</label>
            <input type="number" name="id_produto" readonly="true" value="<?php echo $result['id_produto']?>">
            <span>Código do Produto</span>
        </li>
        <li>
            <label for="Nome do Produto">Nome do Produto</label>
            <input type="text" name="nome_produto" readonly="true" value="<?php echo $result['nome_produto']?>">
            <span>Nome do Produto</span>
        </li>
        <li>
            <label for="Quantidade">Quantidade</label>
            <input type="number" name="quantidade_produto" readonly="true" value="<?php echo $result['quantidade_produto']?>">
            <span>Quantidade disponível em estoque</span>
        </li>
        <li>
            <label for="bio">Quantidade a ser retirada</label>
            <input type="number" name="quantidade_solicitacao" onkeyup="adjust_textarea(this)"></textarea>
            <span>Quantidade que vai ser retirada do estoque</span>
        </li>
        <li>
          <input type="reset" value="Limpar" >
            <input type="submit" value="Retirar" >
        </li>
        </ul>
      </form>
			</header> 
    </div><!-- /container -->
    <script src="../../js/classie.js"></script>
    <script src="../../js/gnmenu.js"></script>
    <script>
      new gnMenu( document.getElementById( 'gn-menu' ) );
  </script>	
</body>
</html>