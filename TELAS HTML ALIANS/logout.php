<?php
//inicia a sessão por segurança
session_start();
//e depois destrói a sessão
session_destroy();
//o usuário é redirecionado para a página de login
header('Location: index.php');
exit();