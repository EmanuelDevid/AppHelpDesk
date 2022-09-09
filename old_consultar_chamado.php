<?php
    require_once('validador_acesso.php');
?>

<?php
    $chamados = array();

    //abrindo o arquvo a ser lido
    $arquivo = fopen('arquivo.txt', 'r');

    //feof() retorna true ou false, true se for o fim do aequivo e false caso não seja, indo de linha em linha
    while(!feof($arquivo)){
        //recupera o que estiver na linha em questão
        $registro = fgets($arquivo);
        $chamados[] = $registro;
    }

    /*echo "<pre>";
    print_r($chamados);
    echo "</pre>";*/

    fclose($arquivo);
?>

<html>
    <head>
        <meta charset="utf-8" />
        <title>App Help Desk</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <style>
        .card-consultar-chamado {
            padding: 30px 0 0 0;
            width: 100%;
            margin: 0 auto;
        }
        </style>
    </head>

    <body>

        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="#">
                <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                App Help Desk
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="logoff.php" class="nav-link">SAIR</a>
                </li>
            </ul>
        </nav>

        <div class="container">    
        <div class="row">

            <div class="card-consultar-chamado">
            <div class="card">
                <div class="card-header">
                Consulta de chamado
                </div>
                
                <div class="card-body">

                <!-- pegando cada linha de $chamados, que tem todos os chamados registrados -->
                <?php foreach($chamados as $chamado){ ?>
                    <?php
                        //dividindo título, categoria e descrição colocando no novo array definido abaixo
                        $chamado_dados = explode("#", $chamado);

                        if($_SESSION['perfil_id'] == 2){
                            if($chamado_dados[0] != $_SESSION['id']){
                                continue;
                            }
                        }
                        //conteúdo só será impresso se todas as seções (título, categoria e descrição estiverem definidas) -->
                        //este tratamento é necessário devido a quebra de linha no fim do arquivo que estava contando como uma linha de dados válida-->
                        if(count($chamado_dados) < 4){
                            continue;                        
                        }
                    ?>
                    
                    <div class="card mb-3 bg-light">
                            <div class="card-body">
                            <h5 class="card-title"><?php echo $chamado_dados[1] //título?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $chamado_dados[2] //categoria?></h6>
                            <p class="card-text"><?php echo $chamado_dados[3] //descrição?></p>

                            </div>
                        </div>
                <?php } ?>

                <div class="row mt-5">
                    <div class="col-6">
                    <a href="home.php" class="btn btn-lg btn-warning btn-block">Voltar</a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </body>
</html>