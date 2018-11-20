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
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="text" name="nome" id="nome" placeholder="nome" required="">
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="mail icon"></i>
                        <input type="email" name="email" id="email" placeholder="email" required="">
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input type="password" name="senha" id="senha" placeholder="senha" required="">
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input type="password" name="confirma" id="confirma" placeholder="confirma" required="">
                    </div>
                </div>
                <div>
                    <button type="submit"  value="editar" name="editar" id="editar" class="ui inverted fluid large submit button" style="background-color: #191919">Editar</button>
                </div>
                
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