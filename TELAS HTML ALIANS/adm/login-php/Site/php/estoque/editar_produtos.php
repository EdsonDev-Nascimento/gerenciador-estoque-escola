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
	<title>Editar Produtos</title>

	<!--Link pegando os estilos do arquivo css informado-->
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="../../css/demo.css" />
    <link rel="stylesheet" type="text/css" href="../../css/component.css" />
    <script src="../../js/modernizr.custom.js"></script>
	<script type="text/javascript">
		function limpa_campos(){
   document.getElementById('nome_produto').value = "";
   document.getElementById('quantidade_produto').value = "";
   document.getElementById('tipo_produto').value = "";
   document.getElementById('descricao_produto').value = "";
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
        <div id="titulo">Editar o Produto</div>
       <form class="form-style-7" name="method_post" action="editando.php" method="post">
        <ul>
        <li>
            <label for="Id do Produto">Id do Produto</label>
            <input type="number" name="id_produto" readonly="true" value="<?php echo $result['id_produto']?>">
            <span>Código do Produto</span>
        </li>
        <li>
            <label for="Nome do Produto">Nome do Produto</label>
            <input type="text" name="nome_produto" id="nome_produto" value="<?php echo $result['nome_produto']?>">
            <span>Nome do Produto</span>
        </li>
        <li>
            <label for="Quantidade">Quantidade</label>
            <input type="number" name="quantidade_produto" id="quantidade_produto" value="<?php echo $result['quantidade_produto']?>">
            <span>Quantidade disponível em estoque</span>
        </li>
        <li>
            <label for="Tipo do Produto">Tipo de Produto</label>
            <input type="text" name="tipo_produto" id="tipo_produto" value="<?php echo $result['tipo_produto']?>"></textarea>
            <span>Tipo de Produto</span>
        </li>
        <li>
            <label for="Descrição do Produto">Descrição do Produto</label>
            <input type="text" name="descricao_produto" id="descricao_produto" value="<?php echo $result['descricao_produto']?>">
            <span>Decrição do Produto</span>
        </li>
        <li>
            <input type="button" onclick="limpa_campos()" value="limpar"><br>
            <input type="submit" value="Editar" >
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