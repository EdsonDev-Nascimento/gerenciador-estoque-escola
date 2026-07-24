<?php 
include '../../../conexao.php';

$id_solicitacao = $_GET['id'];

$sql = mysqli_query($conexao, "SELECT * FROM TbSolicitacao WHERE id_solicitacao = '$id_solicitacao'");

$result = mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>

    <!--Meta para caracteres especiais e acentos.-->
<meta charset="utf-8">
<html>
<head>
	<title>Deletar Solicitação</title>

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
      	<div id="titulo">Tem certeza que deseja excluir esta solicitação?</div>
      <form class="form-style-7" name="method_post" action="deletar.php" method="post">
        <ul>
        <li>
            <label for="Id da Solicitação">Id da Solicitação</label>
            <input type="text" name="id_solicitacao" readonly="true" value="<?php echo $result['id_solicitacao']?>">
            <span>Código da Solicitação</span>
        </li>
        <li>
            <label for="Hora">Hora</label> 
            <input type="time" name="hora_solicitacao" readonly="true" id="hora_solicitacao" value="<?php echo $result['hora_solicitacao']?>">
            <span>Horário em que foifeito a solicitação</span>
        </li>
        <li>
            <label for="Data">Data</label>
            <input type="date" name="data_solicitacao" readonly="true" id="data_solicitacao" value="<?php echo $result['data_solicitacao']?>">
            <span>Data em que foi feita a solicitação</span>
        </li>
        <li>
            <label for="Quantidade">Quantidade</label>
           <input type="number" name="quantidade_solicitacao" readonly="true" id="quantidade_solicitacao" value="<?php echo$result['quantidade_solicitacao']?>">
            <span>Quantidade pedida na solicitação</span>
        </li>
        <li>
            <label for="Item">Item</label>
            <input type="text" name="item_solicitacao" readonly="true" id="item_solicitacao" value="<?php echo $result['item_solicitacao']?>">
            <span>Item da solicitação</span>
        </li>
        <li>
            <label for="Descrição">Descrição</label>
            <textarea name="descricao_solicitacao" readonly="true" id="descricao_solicitacao"><?php echo $result['descricao_solicitacao'];?></textarea>
            <span>Descrição da Solicitação</span>
        </li>
        <li>
            <label for="Solicitante">Solicitante</label>
            <input type="text" name="solicitante_solicitacao" readonly="true" id="solicitante_solicitacao" value="<?php echo $result['solicitante_solicitacao']?>">
            <span>Nome do Solicitante</span>
        </li>
        <li>
            <input type="submit" value="Excluir" >
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
