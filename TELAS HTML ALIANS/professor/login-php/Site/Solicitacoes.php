<?php
// verifica o login do usuário através dos seus dados para segurança
include('../../../verifica_login.php');
//pega o arquivo que faz a conexão com o banco de dados
include('../../../conexao.php');
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
  <title>Solicitações</title>

  <!--Link pegando os estilos do arquivo css informado-->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
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
                  <a href="php/visualizacao_Mensagem.php">Mensagens</a>
                </li>
                <li><a href="Estoque.php">Estoque</a></li>
                <li><a href="Solicitacoes.php">Solicitações</a></li>
              </ul>
            </div><!-- /gn-scroller -->
          </nav>
        </li>
        <li><a href="sair.php"><span>Sair</span></a></li>
      </ul>
      <header>
                <form>
                <center>
                    <center><div id="titulo">Solicitações</div></center>
                <?php 
                date_default_timezone_set("America/Sao_Paulo");
                include_once "../../../conexao.php";

                header ("Content-type:text/html; charset = utf-8");

                // variável vetor que guadra os valores da tabela do banco de dados. 
            $sql = "SELECT * FROM TbSolicitacao WHERE id_funcionario = '$userid'";

                /*
                $ conn é o responsavel por inicar a conexão com o banco de dados
                $sql é a variável que faz a consulta de todos os dados disponiveis no banco de dados. 
                $rs á a variavel que vai armazenar todos estes valores.
                */
                $rs = mysqli_query($conexao, $sql); // mysqli_query: faz uma consulta no banco de dados. 

                // se o número de linhas imprimidos na página for maior que zero ele vai pegar todos os dados inseridos na tabela e exibir para o usuário. 
                if (mysqli_num_rows($rs) > 0) { //mysqli_num_rows: para obter quantas linhas foram retornadas para um comando SELECT, então enquanto o número de linhas for maior que zero ele continua a executar. 

                ?>
                  <div class="table-responsive">
                          <center>
                          <table class="table">
                          <thead style="background-color: #343a40; color: #fff; text-align: center;">
                          <th>Código da Solicitação:</th>
                          <th>Hora:</th>
                          <th>Data:</th>
                          <th>Quantidade:</th>
                          <th>Quantidade Total:</th>
                          <th>Item:</th>
                          <th>Descrição:</th>
                          <th>Solicitante:</th>
                          <th>Id do Produto:</th>
                          </thead>
                 <?php
                  //mysqli_fetch_assoc = ele busca o resultado de linhas e monta uma matriz associada ao nome do banco.
                  // a matriz são todas as colunas e linhas que há na tabela. 
                  while ($array=mysqli_fetch_array($rs)) {

                $id_solicitacao= $array['id_solicitacao'];
                $hora_solicitacao= $array['hora_solicitacao'];
                $data_solicitacao= $array['data_solicitacao'];
                $quantidade_solicitacao= $array['quantidade_solicitacao'];
                $quantidade_total = $array['quantidade_produto'];
                $item_solicitacao= $array['item_solicitacao'];
                $descricao_solicitacao= $array['descricao_solicitacao'];
                $solicitante_solicitacao= $array['solicitante_solicitacao'];
                $id_produto = $array['id_produto'];
            ?>
                <!--puxando os dados da matriz que foi criada através do mysqli_fetch_assoc.--> 
                <tr style="background: white; color: black; text-align: center"><td><?php echo $id_solicitacao ?></td>
                <td ><?php echo $hora_solicitacao ?></td>
                <td><?php echo date("d/m/y", strtotime($data_solicitacao)) ?></td>
                <td><?php echo $quantidade_solicitacao ?></td>
                <td><?php echo $quantidade_total ?></td>
                <td><?php echo $item_solicitacao ?></td>
                <td><?php echo $descricao_solicitacao ?></td>
                <td><?php echo $solicitante_solicitacao ?></td> 
                <td><?php echo $id_produto ?></td>
                
              <?php } ?>

                </tr>
                </table>
                </div>
                </br>
                    <!--strtotime: string para tempo, invertendo o modo da data para o modo de data do brasil.--> 
              <?php
                } else {
                  // se os dados não forem encontrados ele exibe uma mensagem ao usuário
                  echo "<div id='corpo'>Não foram encontradas solicitações no sistema</div>";
                }

                //fechamento da consulta no banco de dados. 
                mysqli_close($conexao);

                 ?>

                  
                  </center>
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