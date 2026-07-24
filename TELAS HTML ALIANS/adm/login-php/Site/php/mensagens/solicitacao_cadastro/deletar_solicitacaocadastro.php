<?php 
 date_default_timezone_set("America/Sao_Paulo");
include '../../../../conexao.php';

$id_solicitacao_cadastro = $_GET['id'];

$sql = mysqli_query($conexao, "SELECT * FROM TbSolicitacao_cadastro WHERE id_solicitacao_cadastro = '$id_solicitacao_cadastro'");

$result = mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>

    <!--Meta para caracteres especiais e acentos.-->
<meta charset="utf-8">
<html>
<head>
	<title>Excluir Solicitação Cadastro</title>

	<!--Link pegando os estilos do arquivo css informado-->
	<link rel="stylesheet" type="text/css" href="../../../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../../css/style.css">
  	<link rel="stylesheet" type="text/css" href="../../../css/demo.css" />
  	<link rel="stylesheet" type="text/css" href="../../../css/component.css" />
  	<script src="../../../js/modernizr.custom.js"></script>
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
                  <li><img src="../../../../Imagens/logo.png"></li>
                  <li><a href="../../../home.php">Home</a></li>
                  <li><a href="../../../visualizar_dados.php">Dados</a></li>
                  <li>
                  <a href="../../../Mensagens.php">Mensagens</a>
                  <ul class="gn-submenu">
                    <li><a href="../../../php/mensagens/solicitacao_cadastro/solicitacao_cadastro.php">Solicitação de Cadastro</a></li>
                    <li><a href="../../../php/mensagens/esqueci_senha/esqueci_senha.php">Mudança de Senha</a></li>
                    <li><a href="../../../php/mensagens/mensagem_atualizacao/mensagem_atualizacao.php">Mensagem de Atualização</a></li>
                  </ul>
                </li>
                <li><a href="../../../Estoque.php">Estoque</a></li>
                <li><a href="../../../Solicitacoes.php">Solicitações</a></li>
                <li>
                  <a href="../../../Funcionarios.php">Funcionários</a>
                </li>
              </ul>
            </div><!-- /gn-scroller -->
          </nav>
        </li>
        <li><a href="../../../sair.php"><span>Sair</span></a></li>
      </ul>
      <header>
      	<div id="titulo">Tem certeza que deseja excluir esta mensagem?</div>
      	<form class="form-style-7" name="method_post" action="deletar.php" method="post">
        <ul>
        <li>
            <label for="CPF">Código da Solicitação</label>
            <input type="text" name="id_solicitacao_cadastro" readonly="true" value="<?php echo $result['id_solicitacao_cadastro']?>">
            <span>Código da Solicitação de Cadastro</span>
        </li>
        <li>
            <label for="Função">Função</label>
            <input type="text" readonly="true" name="funcao_func_cadastro" value="<?php echo $result['funcao_func_cadastro']?>">
            <span>Função do Funcionário</span>
        </li>
        <li>
            <label for="CPF">CPF</label>
            <input type="text" readonly="true" name="cpf_func_cadastro" value="<?php echo $result['cpf_func_cadastro']?>">
            <span>CPF do Funcionário</span>
        </li>
        <li>
            <label for="Data de Nascimento">Data de Nascimento</label>
            <input type="text" readonly="true" name="datanasc_func_cadastro" value="<?php echo date("d/m/y", strtotime($result['datanasc_func_cadastro']))?>">
            <span>Data de Nascimento do Funcionário</span>
        </li>
        <li>
            <label for="Nome do Funcionário">Nome do Funcionário</label>
            <input type="text" readonly="true" name="nome_func_cadastro" value="<?php echo $result['nome_func_cadastro']?>">
            <span>Nome do Funcionário</span>
        </li>
        <li>
            <label for="Email">Email</label>
            <input type="text" readonly="true" name="email_func_cadastro" value="<?php echo $result['email_func_cadastro']?>">
            <span>Email do Funcionário</span>
        </li>
        <li>
            <label for="Data da Solicitação">Data da Solicitação</label>
            <input type="text" readonly="true" name="data_func_cadastro" value="<?php echo date("d/m/y", strtotime($result['data_func_cadastro']))?>">
            <span>Data em que foi feita a Solicitação</span>
        </li>
        <li>
            <input type="submit" value="Excluir" >
        </li>
        </ul>
      </form>
			</header> 
        </div><!-- /container -->
    <script src="../../../js/classie.js"></script>
    <script src="../../../js/gnmenu.js"></script>
    <script>
      new gnMenu( document.getElementById( 'gn-menu' ) );
  </script>
</body>
</html>