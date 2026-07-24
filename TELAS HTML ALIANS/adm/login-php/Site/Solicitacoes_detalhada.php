<?php
// verifica o login do usuário através dos seus dados para segurança

//pega o arquivo que faz a conexão com o banco de dados
include('../conexao.php');
//insere o id_login do usuário que está na sessão em uma variável


$id_solicitacao = $_GET['id_solicitacao'];


$sql = mysqli_query($conexao, "SELECT * FROM TbSolicitacao WHERE id_solicitacao = '$id_solicitacao'");

// insere esses dados em uma variável
$result = mysqli_fetch_assoc($sql);

?>
<!DOCTYPE html>

    <!--Meta para caracteres especiais e acentos.-->
<meta charset="utf-8">
<html>
<head>
	<title>Adicionar Solicitação</title>

	<!--Link pegando os estilos do arquivo css informado-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
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
                  <li style="padding-left: 30%"><img src="../Imagens/logo.png"></li>
                  <li><a href="home.php">Home</a></li>
                  <li><a href="visualizar_dados.php">Dados</a></li>
                  <li>
                  <a href="Mensagens.php">Mensagens</a>
                  <ul class="gn-submenu">
                    <li><a href="php/mensagens/solicitacao_cadastro/solicitacao_cadastro.php">Solicitação de Cadastro</a></li>
                    <li><a href="php/mensagens/esqueci_senha/esqueci_senha.php">Mudança de Senha</a></li>
                    <li><a href="php/mensagens/mensagem_atualizacao/mensagem_atualizacao.php">Mensagem de Atualização</a></li>
                  </ul>
                </li>
                <li><a href="Estoque.php">Estoque</a></li>
                <li><a href="Solicitacoes.php">Solicitações</a></li>
                <li>
                  <a href="Funcionarios.php">Funcionários</a>
                </li>
              </ul>
            </div><!-- /gn-scroller -->
          </nav>
        </li>
        <li><a href="sair.php"><span>Sair</span></a></li>
      </ul>
      <header>
      	<div id="titulo">Aprovar Solicitação</div>
      		<form class="form-style-7" name="method_post" action="php/estoque/retirando.php" method="post">
        <ul>
        <li>
            <label for="Id da Solicitação">Id da Solicitação</label>
            <input type="text" name="id_solicitacao" readonly="true" value="<?php echo $result['id_solicitacao']?>">
            <span>Código da Solicitação</span>
        </li>
        <li>
            <label for="Hora">Hora</label>
            <input type="time" name="hora_solicitacao" id="hora_solicitacao" value="<?php echo $result['hora_solicitacao']?>">
            <span>Horário em que foifeito a solicitação</span>
        </li>
        <li>
            <label for="Data">Data</label>
            <input type="date" name="data_solicitacao" id="data_solicitacao" value="<?php echo $result['data_solicitacao']?>">
            <span>Data em que foi feita a solicitação</span>
        </li>
         <li>
            <label for="Id do Produto">Id do Produto</label>
          <input type="number" name="id_produto" readonly="true" value="<?php echo $result['id_produto']?>">
            <span>Código do Produto</span>
        </li>
        <li>
            <label for="Quantidade">Quantidade a ser retirada</label>
          <input type="number" name="quantidade_solicitacao" readonly="true" value="<?php echo $result['quantidade_solicitacao']?>">
            <span>Quantidade que vai ser retirada do estoque</span>
        </li>
        <li>
            <label for="Quantidade Total">Quantidade Total</label>
           <input type="number" name="quantidade_produto" readonly="true" value="<?php echo $result['quantidade_produto']?>">
            <span>Quantidade total no estoque</span>
        </li>
        <li>
            <label for="Item">Item</label>
            <input type="text" name="item_solicitacao" id="item_solicitacao" value="<?php echo $result['item_solicitacao']?>">
            <span>Item da solicitação</span>
        </li>
        <li>
            <label for="Descrição">Descrição do Produto</label>
            <textarea name="descricao_solicitacao" id="descricao_solicitacao"><?php echo $result['descricao_solicitacao'];?></textarea>
            <span>Descrição da Solicitação</span>
        </li>
        <li>
            <label for="Solicitante">Solicitante</label>
            <input type="text" name="solicitante_solicitacao" id="solicitante_solicitacao" value="<?php echo $result['solicitante_solicitacao']?>">
            <span>Nome do Solicitante</span>
        </li>
        <li>
            <label for="Id do Solicitante">Id do Solicitante</label>
           <input type="text" name="id_funcionario" readonly="true" value="<?php echo $result['id_funcionario'] ?>">
            <span>Código do Solicitante</span>
        </li>
        <li>
            <input type="submit" value="Aprovar" >
        </li>
        </ul>
      </form>
      </header> 
    </div><!-- /container -->
    <script src="js/classie.js"></script>
    <script src="js/gnmenu.js"></script>
    <script>
      new gnMenu( document.getElementById( 'gn-menu' ) );
    </script>
</body>
</html>