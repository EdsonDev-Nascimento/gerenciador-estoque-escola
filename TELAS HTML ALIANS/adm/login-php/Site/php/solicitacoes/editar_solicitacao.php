<?php 
// verifica o login do usuário através dos seus dados para segurança
include('../../../../../verifica_login.php');
include '../../../conexao.php';

//insere o id_login do usuário que está na sessão em uma variável
$userid = $_SESSION['id_funcionario'];

$id_solicitacao = $_GET['id'];

$sql = mysqli_query($conexao, "SELECT * FROM TbSolicitacao WHERE id_solicitacao = '$id_solicitacao'");

//faz um consulta buscando todos os dados da tabela TbLogin e TbFuncionario comparando o id_login que está na variável coom o da tabela. E o id_login tem que ser o mesmo Id_funcionario, para que venha os dados do funcionário correto
$dados = mysqli_query($conexao, "SELECT * FROM TbFuncionario WHERE id_funcionario = '$userid'");

// insere esses dados em uma variável
$resultado = mysqli_fetch_assoc($dados);

$result = mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>

    <!--Meta para caracteres especiais e acentos.-->
<meta charset="utf-8">
<html>
<head>
	<title>Editar Solicitação</title>

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
   document.getElementById('hora_solicitacao').value = "";
   document.getElementById('data_solicitacao').value = "";
   document.getElementById('quantidade_solicitacao').value = "";
   document.getElementById('item_solicitacao').value = "";
   document.getElementById('descricao_solicitacao').value = "";
   document.getElementById('solicitante_solicitacao').value = "";
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
      		<div id="titulo">Editar Solicitação</div>
      		<form class="form-style-7" name="method_post" action="editando.php" method="post">
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
            <input type="date" name="data_solicitacao" id="data_solicitacao" max="<?php echo date('Y-m-d')?>" value="<?php echo $result['data_solicitacao']?>">
            <span>Data em que foi feita a solicitação</span>
        </li>
        <li>
            <label for="Quantidade">Quantidade</label>
           <input type="number" name="quantidade_solicitacao" id="quantidade_solicitacao" value="<?php echo$result['quantidade_solicitacao']?>">
            <span>Quantidade pedida na solicitação</span>
        </li>
        <li>
            <label for="Item">Item</label>
            <input type="text" name="item_solicitacao" id="item_solicitacao" value="<?php echo $result['item_solicitacao']?>">
            <span>Item da solicitação</span>
        </li>
        <li>
            <label for="Descrição">Descrição</label>
            <textarea name="descricao_solicitacao" id="descricao_solicitacao"><?php echo $result['descricao_solicitacao'];?></textarea>
            <span>Descrição da Solicitação</span>
        </li>
        <li>
            <label for="Solicitante">Solicitante</label>
            <input type="text" name="solicitante_solicitacao" id="solicitante_solicitacao" value="<?php echo $result['solicitante_solicitacao']?>">
            <span>Nome do Solicitante</span>
        </li>
        <li>
			<input type="hidden" name="id_funcionario" value="<?php echo $resultado['id_funcionario'];?>">
        	<input type="button" onclick="limpa_campos()" value="Limpar"><br>
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