<?php  
include_once('../../../verifica_login.php');
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
            <center>
              <center><div id="titulo">Funcionários</div></center>
               
            <?php 
            date_default_timezone_set("America/Sao_Paulo");
            include_once "../conexao.php";

            header ("Content-type:text/html; charset = utf-8");

            // variável vetor que guadra os valores da tabela do banco de dados. 
            $sql = "SELECT * FROM TbFuncionario";

            /*
            $ conn é o responsavel por inicar a conexão com o banco de dados
            $sql é a variável que faz a consulta de todos os dados disponiveis no banco de dados. 
            $rs á a variavel que vai armazenar todos estes valores.
            */
            $rs = mysqli_query($conexao, $sql); // mysqli_query: faz uma consulta no banco de dados. 

            // se o número de linhas imprimidos na página for maior que zero ele vai pegar todos os dados inseridos na tabela e exibir para o usuário. 
            if (mysqli_num_rows($rs) > 0) { //mysqli_num_rows: para obter quantas linhas foram retornadas para um comando SELECT, então enquanto o número de linhas for maior que zero ele continua a executar. 
             
              ?>
                
                 <div class='table-responsive'>

               
                <center>
                     <!--Form que manda os dados via metodo get caso o ADM queira já retirar do estoque o pedido-->
               <form class="metodo_get" name="method_get" action="php/funcionarios/deletar_funcionarios.php" method="get">
                <table class="table table-striped">
                <thead style="background-color: #343a40; color: #fff; text-align: center;">
                <th>Código do Funcionário:</th>
                <th>Função:</th>
                <th>CPF:</th>
                <th>Nome de Usuário:</th>
                <th>Senha:</th>
                <th>Data de Nascimento:</th>
                <th>Nome do Funcionário:</th>
                <th>Email:</th>
                <th>Ações:</th>
                </thead>


<?php 
              //mysqli_fetch_assoc = ele busca o resultado de linhas e monta uma matriz associada ao nome do banco.
              // a matriz são todas as colunas e linhas que há na tabela. 
              while ($array=mysqli_fetch_array($rs)) {

                $id_funcionario= $array['id_funcionario'];
                $funcao_funcionario= $array['funcao_funcionario'];
                $cpf_funcionario= $array['cpf_funcionario'];
                $nome_login= $array['nome_login'];
                $senha_login= $array['senha_login'];
                $datanasc_funcionario= $array['datanasc_funcionario'];
                $nome_funcionario= $array['nome_funcionario'];
                $email_funcionario= $array['email_funcionario'];

                ?>
                <!--puxando os dados da matriz que foi criada através do mysqli_fetch_assoc.--> 
                <tr style="background: white; color: black; text-align: center">
                <td><?php echo $id_funcionario ?></td>
                <td><?php echo $funcao_funcionario ?></td>
                <td><?php echo $cpf_funcionario ?></td>
                <td><?php echo $nome_login ?></td>
                <td><?php echo $senha_login ?></td>
                <td><?php echo date("d/m/y", strtotime($datanasc_funcionario)) ?></td>
                <td><?php echo $nome_funcionario ?></td>
                <td><?php echo $email_funcionario ?></td>
                 <td style="align-items: center">
                <a class="btn btn-warning btn-sm" title="Editar" style="color:3fff;" href="php/funcionarios/editar_funcionarios.php?id=<?php echo $id_funcionario?>role="button"><i class=far fa-edit"></i><img src="../Imagens/lapis.png" style="width: 20px; height: 20px;"></a>
                <a class="btn btn-warning btn-sm" title="Deletar" style="color:3fff;" href="php/funcionarios/deletar_funcionarios.php?id=<?php echo $id_funcionario?>role="button"><i class=far fa-edit"></i><img src="../Imagens/lixeira.png" style="width: 20px; height: 20px;"></a></td> 
                
                <?php }?>

                </tr>
                </table>
                </form>
                </div>
                </br>
            <?php
                //strtotime: string para tempo, invertendo o modo da data para o modo de data do brasil.  
            } else {
              echo "<div id='corpo'>Não foram encontrados registros cadastrados</div>";
            }

            //fechamento da consulta no banco de dados. 
            mysqli_close($conexao);

             ?>
             <form>
              <!-- Botões que levam o usuário a outras páginas -->               
                    <button formaction="php/funcionarios/adicionar.php" name="Novo Funcionário">Novo Funcionário</button>
           </form>
         </center>
</body>
</html>
      </header> 
    </div><!-- /container -->
    <script src="js/classie.js"></script>
    <script src="js/gnmenu.js"></script>
    <script>
      new gnMenu( document.getElementById( 'gn-menu' ) );
    </script>
