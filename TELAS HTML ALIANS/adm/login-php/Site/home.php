<?php
// verifica o login do usuário através dos seus dados para segurança
include_once('../../../verifica_login.php');
//pega o arquivo que faz a conexão com o banco de dados
include('../conexao.php');
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
  <title>Home</title>

    <!--Link pegando os estilos do arquivo css informado-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
        <div id="titulo">Bem vindo <?php echo $result['nome_funcionario'];?>!</div> 
      </header> 
    </div><!-- /container -->
    <script src="js/classie.js"></script>
    <script src="js/gnmenu.js"></script>
    <script>
      new gnMenu( document.getElementById( 'gn-menu' ) );
    </script>
</body>
</html>