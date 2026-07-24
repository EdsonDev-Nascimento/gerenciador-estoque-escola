<?php 
include '../../../conexao.php';

$id_funcionario = $_GET['id'];

$sql = mysqli_query($conexao, "SELECT * FROM TbFuncionario WHERE id_funcionario = '$id_funcionario'");

$result = mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>

    <!--Meta para caracteres especiais e acentos.-->
<meta charset="utf-8">
<html>
<head>
	<title>Editar Funcionário</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<!--Link pegando os estilos do arquivo css informado-->
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="../../css/demo.css" />
    <link rel="stylesheet" type="text/css" href="../../css/component.css" />
    <script src="../../js/modernizr.custom.js"></script>

</head>
<body>

<script>
    $(document).ready(function () { 
        var $seuCampoCpf = $("#CPF");
        $seuCampoCpf.mask('000.000.000-00', {reverse: true});
    });
</script>
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
      	<div id="titulo">Editar Funcionário</div>
      	<form class="form-style-7" name="method_post" action="editando.php" method="post">
        <ul>
        <li>
            <label for="Id do Funcionário">Id do Funcionário</label>
            <input type="text" name="id_funcionario" readonly="true" value="<?php echo $result['id_funcionario']?>">
            <span>Código do Funcionário</span>
        </li>
        <li>
            <label for="Função">Função</label>
            <input type="text" name="funcao_funcionario" id="funcao_funcionario" value="<?php echo $result['funcao_funcionario']?>">
            <span>Função do Funcionário</span>
        </li>
        <li>
            <label for="CPF">CPF</label>
            <input type="text" id="CPF" name="cpf_funcionario" id="CPF" value="<?php echo $result['cpf_funcionario']?>">
            <span>CPF do Funcionário</span>
        </li>
        <li>
            <label for="Nome de Usuário">Nome de Usuário</label>
            <input type="text" name="nome_login" id="nome_login" value="<?php echo$result['nome_login']?>">
            <span>Nome de Usuário do Funcionário</span>
        </li>
        <li>
            <label for="Senha">Senha</label>
            <input type="text" name="senha_login" id="senha_login" value="<?php echo $result['senha_login']?>">
            <span>Senha do Usuário</span>
        </li>
        <li>
            <label for="Data de Nascimento ">Data de Nascimento</label>
            <input type="date" name="datanasc_funcionario" id="datanasc_funcionario" value="<?php echo $result['datanasc_funcionario']?>" max="<?php echo date('Y-m-d', strtotime('-18 year'));?>">
            <span>Data de Nascimento do Funcionário</span>
        </li>
        <li>
            <label for="Nome do Funcionário">Nome do Funcionário</label>
            <input type="text" name="nome_funcionario" id="nome_funcionario" value="<?php echo $result['nome_funcionario']?>">
            <span>Nome do Funcionário</span>
        </li>
        <li>
            <label for="Email">Email</label>
            <input type="text" name="email_funcionario" id="email_funcionario" value="<?php echo $result['email_funcionario']?>">
            <span>Email do Funcionário</span>
        </li>
        <li>
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