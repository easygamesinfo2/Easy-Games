<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

    <link rel="stylesheet"  href="../templates/semantic/semantic.css">

    <?php


    $busca = $_GET['consulta'];
    // var_dump($_GET['consulta']);
    require_once '../../modelos/crud_noticia.php';
    require_once '../../modelos/DBconection.php';
    $crud = new crud_noticia();
    $noticia = $crud->buscar_noticia($busca);
    // var_dump($noticia);
    // exit();
    include '../../visualizacao/templates/cabecalho.php';
    // include '../visualizacao/noticias/exibir.php';
    // exit();    if ($busca == $noticia['titulo_noticia']) :?>
<br>
        <div class="column">
            <div class="ui  segment" style=";background-color: white">

        <h1><a style="color: black" href="controlador.php?acao=exibir_noticia&id_noticia=<?=$noticia['cod_noticia'];?>"><?=$noticia['0']['titulo_noticia'];?></a></h1>

            </div>
        </div>
   <? include '../../visualizacao/templates/rodape.php';
?>
</body>
</html>

