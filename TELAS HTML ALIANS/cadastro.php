<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>

    <!--Metas para caracteres especiais e acentos.-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Solicitação de Cadastro</title>

    <!--Link pegando os estilos do arquivo css informado-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>

    <script type="text/javascript">
         var data = new Date(new Date().getFullYear() - 10, 11, 31).toISOString().slice(0,10);
         document.getElementsByName("dataNasc")[0].setAttribute("max", data);
    </script>
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
                    <h3 class="title has-text-grey">Solicitação de Cadastro</h3>
                    <?php 

                    //se o status da sessão['status_cadastro'] for igual a true ele exibe a mensagem abaixo ao usuário
                    if (isset($_SESSION['status_cadastro'])): ?>
                    <div class="notification is-success">
                      <p>Solicitação de Cadastro Efetuado!</p><br>
                      <p>Agora aguarde o ADM efetuar o seu cadastro!<br>
                      <a href="index.php">Volte para o login clicando aqui!</a></p>
                    </div>
                <?php endif;
                unset($_SESSION['status_cadastro']);  ?>
                    <?php

                    //se o status da sessão['solicitacao_feita'] for igual a true ele exibe a mensagem abaixo ao usuário
                    if(isset($_SESSION['usuario_existe'])):
                    ?>
                    <div class="notification is-danger">
                      <p>Este dados já foram enviados antes! Aguarde o ADM efetuar o seu cadastro.<br> 
                      <a href="index.php">Volte para o login clicando aqui!</a></p>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['usuario_existe']);
                    ?>
                    <div class="box">

                        <!-- form onde contém o metodo post onde os dados são enviados pelos inputs e a ação que será feita assim que o usuário apertar o botão Enviar, que é o cadastrar.php -->
                        <form action="cadastrar.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <!-- Input onde o usuário coloca o seu nome -->
                                    <input name="nome_func_cadastro" type="text" class="input is-large" placeholder="Nome" autofocus required="required">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <!-- Select onde o usuário coloca a sua função -->
                                    <select class="input is-large" name="funcao_func_cadastro" required="required">
                                      <option value="" disabled selected>Função</option>
                                      <option value="Professor">Professor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <!-- Input onde o usuário coloca o seu CPF -->
                                    <input name="cpf_func_cadastro" class="input is-large" type="text" placeholder="CPF" id="CPF" maxlength="14" required="required">
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <center><p>Data de Nascimento:</p></center>
                                    <!-- Input onde o usuário coloca a sua data de nascimento -->
                                    <input name="datanasc_func_cadastro" id="dataNasc" type="date" class="input is-large" placeholder="Data de Nascimento" required="required" max="<?php echo date('Y-m-d', strtotime('-18 year'));?>">
                                </div>
                            </div>
                             <div class="field">
                                <div class="control">
                                    <!-- Input onde o usuário coloca o seu email -->
                                    <input name="email_func_cadastro" type="text" class="input is-large" placeholder="Email" autofocus required="required">
                                </div>
                            </div>
                            <!--Botão que envia as informações-->
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