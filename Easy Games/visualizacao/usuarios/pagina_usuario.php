<!DOCTYPE html>
<html lang="pt-BR">
<head>

    <title>EG</title>

    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="../templates/semantic/semantic.css">


</head>
<body>
<script type="text/javascript" src="semantic/semantic.min.js"></script>


<div class="ui middle aligned center aligned grid">
    <div class="column">

        <h2 class="ui inverted image header">
            <div class="content">
                <img src="../visualizacao/imagenseg/Easy Gaming.png">
            </div>
        </h2>

        <form name="signup" method="post" class="ui large form">
            <div class="ui stacked segment">
                <div class="field">
                    <h1>Usuario: <?= $_SESSION['nome_usuario']?></h1>
                </div>
                <div class="field">
                    

                </div>
                <div class="field">
                    

                </div>
                <div class="field">

                </div>
                <a class="item" href="../controlador/controlador.php?acao=alterar_usuario"><i class="edit outline icon"></i>Alterar
                
                </a>
                 <a class="item" href="../controlador/controlador.php?acao=excluir_usuario"><i class="edit outline icon"></i>Excluir
                
                </a>
                
            </div>
            

            <div class="ui error message"></div>

        </form>


    </div>
</div>

<style type="text/css">
    body {
        background-color: #191919;
    }
    body > .grid {
        height: 100%;
    }
    .image {
        margin-top: -100px;
    }
    .column {
        max-width: 450px;
    }
</style>


</body>
</html>