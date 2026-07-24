<?php
//inicia a sessão 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
    
    <!--Metas para caracteres especiais e acentos.-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mudança de Senha</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
</head>

<body>
    <script>
    $(document).ready(function () { 
        var $seuCampoCpf = $("#CPF");
        $seuCampoCpf.mask('000.000.000-00', {reverse: true});
    });
    </script>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Mudança de Senha</h3>
                    <?php 
                    //se o status da sessão['status_cadastro'] for igual a true ele exibe a mensagem abaixo ao usuário
                    if (isset($_SESSION['status_cadastro'])): ?>
                    <div class="notification is-success">
                      <p>Solicitação de mudança de senha feita com sucesso!</p><br>
                      <p>Agora aguarde o ADM atualizar a sua senha!<br><a href="index.php">Volte para o login clicando aqui!</a></p>
                    </div>
                <?php endif;
                unset($_SESSION['status_cadastro']);  ?>

                    <?php 
                    //se o status da sessão['status_cadastro'] for igual a true ele exibe a mensagem abaixo ao usuário
                    if (isset($_SESSION['nao_existe'])): ?>
                    <div class="notification is-success">
                      <p>Nenhuma informação coincide!</p><br>
                      <p>Tente novamente!<br><a href="esqueci_senha.php">Volte para o login clicando aqui!</a></p>
                    </div>
                <?php endif;
                unset($_SESSION['nao_existe']);  ?>

                    <?php
                    //se o status da sessão['solicitacao_feita'] for igual a true ele exibe a mensagem abaixo ao usuário
                    if(isset($_SESSION['solicitacao_feita'])):
                    ?>
                    <div class="notification is-danger">
                      <p>Este dados já foram enviados antes! Aguarde o ADM atualizar o seu cadastro.</p>
                      <br><p><a href="index.php">Volte para o login clicando aqui!</a></p>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['solicitacao_feita']);
                    ?>
                    <div class="box">
                        <!-- form onde contém o metodo post onde os dados são enviados pelos inputs e a ação que será feita assim que o usuário apertar o botão Enviar, que é o mandando.php -->
                        <form action="mandando.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <!-- Input onde o usuário coloca a sua senha -->
                                    <input name="nome_func" type="text" class="input is-large" placeholder="Nome" autofocus>
                                </div>
                            </div>
                      
                             <div class="field">
                                <div class="control">
                                    <!-- Input onde o usuário coloca o seu email -->
                                    <input name="email_func" type="text" class="input is-large" placeholder="Email" autofocus>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <!-- Input onde o usuário coloca a sua senha -->
                                    <input name="cpf_func" type="text" id="CPF"class="input is-large" placeholder="CPF" autofocus>
                                </div>
                            </div>
                            <button type="submit" class="button is-block is-link is-large is-fullwidth" style="margin-bottom: 3px;">Enviar</button>
                            <a href="index.php" style="font-weight: 500" class="button is-block is-link is-large is-fullwidth">Voltar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>