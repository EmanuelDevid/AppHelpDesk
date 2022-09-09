<?php
    session_start();

    //abrindo arquivo
    $arquivo = fopen('C:\xampp\app_help_desk\arquivo.txt', 'a');

    //tratando os valores recebidos
    $titulo = str_replace('#', '-', $_POST['titulo']);
    $categoria = str_replace('#', '-', $_POST['categoria']);
    $descricao = str_replace('#', '-', $_POST['descrição']);

    //padronizando texto e definindo # como separador de título, categoria e descrição
    $texto = $_SESSION['id'] . '#' . $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL;
    //PHP_EOL armazena a quebra de linha do SO em que roda

    //escrevendo no arquivo aberto inicialmente o texto acima
    fwrite($arquivo, $texto);

    //fechando o arquivo>
    fclose($arquivo);

    header('Location: home.php?parametro=1');
?>