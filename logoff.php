<?php
    session_start();
    
    //remover indíces do array da ação, ou seja, de $_SESSION => unset()
    //unset() remove o valor apenas se o índice existir, não ocorrendo erro caso não exista

    //destruir a variável de sessão por completo => session_destroy()
    //session_destroy() só passa a valer na próxima requisição, é necessário uma nova requisição pra enchergar a destruição

    session_destroy();

    header('Location: index.php');
?>