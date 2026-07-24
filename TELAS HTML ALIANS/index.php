<?php
//inicia a sessão como se fosse uma sala onde ficam contidas as informações do usuário que está logado no momento.
session_start();
?>

<!DOCTYPE html>
<html>
  
<head>

    <!--Metas para caracteres especiais e acentos.-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Login</title>

    <!--Link pegando os estilos do arquivo css informado-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-grey">Login</h3>
                    <?php
                    //se o status da sessão['nao_autenticado'] for igual a true ele exibe a mensagem abaixo ao usuário
                    if(isset($_SESSION['nao_autenticado'])):
                    ?>
                    <div class="notification is-danger">
                      <p>ERRO: Usuário ou senha inválidos.</p>
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                    ?>
                    <div class="box">
                        <form action="login.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <!-- Input onde o usuário coloca o seu nome de usuário -->
                                    <input name="nome_login" name="text" class="input is-large" placeholder="Seu usuário" autofocus="">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <!-- Input onde o usuário coloca a sua senha -->
                                    <input name="senha_login" class="input is-large" type="password" placeholder="Sua senha">
                                </div>
                            </div>

                            <div class="field">
                                <!-- Link que redireciona o usuário para a página de solicitação de cadastro -->
                                <a href="cadastro.php">Cadastrar</a>
                            </div>
                            <!-- botão entrar que executa o action do form, ou seja, login.php -->
                            <button type="submit" class="button is-block is-link is-large is-fullwidth">Entrar</button>

                            <!-- Link que redireciona o usuário para a página de recuperação de senha -->
                            <a href="esqueci_senha.php" style="text-decoration: none;">Esqueceu sua senha? Clique aqui!</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>