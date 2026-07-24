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
                <div id="titulo">Solicitações</div></center>
                    <?php 
                        
                          date_default_timezone_set("America/Sao_Paulo");
                          include_once "../conexao.php";
                          header ("Content-type:text/html; charset = utf-8");

                          // variável vetor que guadra os valores da tabela do banco de dados. 
                          $sql = "SELECT * FROM TbSolicitacao";

                          /* $conexão é o responsavel por inicar a conexão com o banco de dados
                          $sql é a variável que faz a consulta de todos os dados disponiveis no banco de dados. 
                          $rs á a variavel que vai armazenar todos estes valores.*/
                          $rs = mysqli_query($conexao, $sql); 
                          // mysqli_query: faz uma consulta no banco de dados. 

                          // se o número de linhas imprimidos na página for maior que zero ele vai pegar todos os dados inseridos na tabela e exibir para o usuário. 
                          if (mysqli_num_rows($rs) > 0) { 
                          //mysqli_num_rows: para obter quantas linhas foram retornadas para um comando SELECT, então enquanto o número de linhas for maior que zero ele continua a executar. 

                    ?>
 <div class="table-responsive">
    <center>
          <!--Form que manda os dados via metodo get caso o ADM queira já retirar do estoque o pedido-->
        <form class="metodo_get" name="method_get" action="Solicitacoes_detalhada.php" method="get">
              <!--Tabela com a parte dos titulos da mesma-->
              <table class="table">
                    <thead style="background-color: #343a40; color: #fff; text-align: center;">
                          <th>Código da Solicitação:</th>
                          <th>Hora:</th>
                          <th>Data:</th>
                          <th>Item:</th>
                          <th>Solicitante:</th>
						  <th>Quantidade a ser retirada:</th>
                          <th>Ações:</th>
                   </thead>
           <?php  
                //mysqli_fetch_assoc = ele busca o resultado de linhas e monta uma matriz associada ao nome do banco.
                  
                  while ($array=mysqli_fetch_array($rs)) {
                 // a matriz são todas as colunas e linhas que há na tabela. 
                $id_solicitacao= $array['id_solicitacao'];
                $hora_solicitacao= $array['hora_solicitacao'];
                $data_solicitacao= $array['data_solicitacao'];
                $quantidade_solicitacao= $array['quantidade_solicitacao'];
                $quantidade_produto= $array['quantidade_produto'];
                $item_solicitacao= $array['item_solicitacao'];
                $descricao_solicitacao= $array['descricao_solicitacao'];
                $solicitante_solicitacao= $array['solicitante_solicitacao'];
                $id_produto = $array['id_produto'];
            ?>

                          <!--puxando os dados da matriz que foi criada através do mysqli_fetch_assoc.--> 
                      <tr style="background: white; color: black; text-align: center">
                          <td><?php echo $id_solicitacao ?></td>
                          <td style="padding-right: 10px; padding-left: 10px"><?php echo $hora_solicitacao ?></td>
                          <td style="padding-right: 10px; padding-left: 10px"><?php echo date("d/m/y", strtotime($data_solicitacao)) ?></td>
                          <td style="padding-right: 10px; padding-left: 10px"><?php echo $item_solicitacao ?></td>
                          <td><?php echo $solicitante_solicitacao ?></td> 
						  <td><?php echo $quantidade_solicitacao ?></td> 
                
                          <!--botões com links que irão enviar o valor da váriavel informada para o destino por meio da URL -->  
                          <td style="text-align: center;">
                              <a class="btn btn-warning btn-sm" title="Editar" style="color:3fff;" href="php/solicitacoes/editar_solicitacao.php?id=<?php echo $id_solicitacao?>role="button"><i class=far fa-edit"></i><img src="../Imagens/lapis.png" style="width: 20px; height: 20px;"></a>

                              <a class="btn btn-warning btn-sm" title="Deletar" style="color:3fff;" href="php/solicitacoes/deletar_solicitacao.php?id=<?php echo $id_solicitacao?>role="button"><i class=far fa-edit"></i><img src="../Imagens/lixeira.png" style="width: 20px; height: 20px;"></a>

                              <a class="btn btn-warning btn-sm" type="Enviar" title="Detalhes da Solicitação" style="color:3fff;" margin-bottom: "5px;" href="Solicitacoes_detalhada.php?id_solicitacao=<?php echo $id_solicitacao?>role="button"><i class=far fa-edit">Aprovar</i></a></td>  

                          </td>

            
              <?php } ?>

                        </tr>
              </table>
          </form>
      </div>
  </br>
<!--strtotime: string para tempo, invertendo o modo da data para o modo de data do brasil.--> 
<?php
      } else {
                  // se os dados não forem encontrados ele exibe uma mensagem ao usuário
                  echo "<center><div id='corpo'>Não foram encontrados registros cadastrados</div></center>";
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