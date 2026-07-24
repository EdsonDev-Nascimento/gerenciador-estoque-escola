<?php  
include_once('../../../verifica_login.php');
?>
<!DOCTYPE html>
<html>

    <!--Meta para caracteres especiais e acentos.-->
<meta charset="utf-8">
<head>
  <title>Estoque</title>

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
        <form>
            <center>
              <center><div id="titulo">Estoque</center>
            <?php 
      
            date_default_timezone_set("America/Sao_Paulo");
      //Pegando os dados do arquivo conexao para utilizar comandos sql dentro da database
            include_once "../conexao.php";

            header ("Content-type:text/html; charset = utf-8");

            // variável vetor que guadra os valores da tabela do banco de dados. 
            $sql = "SELECT * FROM TbProduto";

            /*
            $ conexao é o responsavel por inicar a conexão com o banco de dados
            $sql é a variável que faz a consulta de todos os dados disponiveis no banco de dados. 
            $rs á a variavel que vai armazenar todos estes valores.
            */
            $rs = mysqli_query($conexao, $sql); // mysqli_query: faz uma consulta no banco de dados. 

            // se o número de linhas imprimidos na página for maior que zero ele vai pegar todos os dados inseridos na tabela e exibir para o usuário. 
            if (mysqli_num_rows($rs) > 0) { //mysqli_num_rows: para obter quantas linhas foram retornadas para um comando SELECT, então enquanto o número de linhas for maior que zero ele continua a executar. 

              ?>
              <div class="table-responsive">
                <center>
           <!--Form que manda os dados via metodo get caso o ADM queira já retirar do estoque o pedido-->
        <Form class="metodo_get" name="method_get" action="php/estoque/deletar_produtos.php" method="get">
        <!--Tabela com o titulo dos dados-->
            <table class="table">
                <thead style="background-color: #343a40; color: #fff; text-align: center;">
                  <th>Código do Produto:</th>
                    <th>Nome do Produto:</th>
                    <th>Quantidade do Produto:</th>
                  <th>Tipo do Produto:</th>
                  <th>Descrição:</th>
                <th>Ações:</th>
            </thead>
          
          <?php   
              //mysqli_fetch_assoc  busca o resultado de linhas e monta uma matriz associada ao nome do banco.
              // a matriz será todas as colunas e linhas que há na tabela. 
              while ($array=mysqli_fetch_array($rs)) {

                $id_produto= $array['id_produto'];
                $nome_produto= $array['nome_produto'];
                $quantidade_produto= $array['quantidade_produto'];
                $tipo_produto= $array['tipo_produto'];
                $descricao_produto= $array['descricao_produto'];

                ?>
                <!--puxando os dados da matriz que foi criada através do mysqli_fetch_assoc e jogando na tabela.--> 
                <tr style="background: white; text-align: center; color: black"><td><?php echo $id_produto ?></td>
                <td ><?php echo $nome_produto ?></td>
                <td><?php echo $quantidade_produto ?></td>
                <td><?php echo $tipo_produto ?></td>
                <td><?php echo $descricao_produto ?></td> 
                <td style="text-align: center;">
        
        <!--Botão pata Editar o Produto selecionado onde o id do produto será enviado para o href de destino-->
                <a class="btn btn-warning btn-sm" style="color:3fff;" title="Editar" href="php/estoque/editar_produtos.php?id=<?php echo $id_produto?>role="button"><i class=far fa-edit"></i><img src="../Imagens/lapis.png" style="width: 20px; height: 20px;"></span></a>
        
        <!--Botão pata Deletar o Produto selecionado onde o id do produto será enviado para o href de destino-->
                <a class="btn btn-warning btn-sm" title="Deletar" style="color:3fff;" href="php/estoque/deletar_produtos.php?id=<?php echo $id_produto?>role="button"><i class=far fa-edit"></i><img src="../Imagens/lixeira.png" style="width: 20px; height: 20px;"></a>
        
        <!--Botão pata Retirar o Produto selecionado onde o id do produto será enviado para o href de destino-->
              <a class="btn btn-warning btn-sm" title="Retirar" style="color:3fff;" href="php/estoque/retirar_produtos.php?id=<?php echo $id_produto?>role="button"><i class=far fa-edit"></i><img src="../Imagens/menos.png" style="width: 20px; height: 20px;"></a>
        
        <!--Botão pata Adicionar mais do Produto selecionado onde o id do produto será enviado para o href de destino-->
              <a class="btn btn-warning btn-sm" title="Adicionar" style="color:3fff;" href="php/estoque/adicionar_produtos.php?id=<?php echo $id_produto?>role="button"><i class=far fa-edit"></i><img src="../Imagens/mais.png" style="width: 20px; height: 20px;"></a></td>  
               <?php }?>
                </tr>
                </table>
              </form>     
                </div>
                </br>
                <!--strtotime: string para tempo, invertendo o modo da data para o modo de data do brasil.-->  
<?php                
              } else {
              echo "<div id='corpo'>Não foram encontrados registros cadastrados</div>";
            }

            //fechamento da consulta no banco de dados. 
            mysqli_close($conexao);

             ?>
              <!-- Botões que levam o usuário a outras páginas -->               
                    <button formaction="php/estoque/adicionar.php" title="Adicionar Novo Produto" name="Novo Produto">Novo Produto</button><br>
         </center> 
      </header> 
    </div><!-- /container -->
    <script src="js/classie.js"></script>
    <script src="js/gnmenu.js"></script>
    <script>
      new gnMenu( document.getElementById( 'gn-menu' ) );
    </script>
</body>
</html>