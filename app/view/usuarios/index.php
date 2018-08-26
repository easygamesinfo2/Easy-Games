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
                <img src="../imagenseg/Easy Gaming.png">
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
                        <button type="submit"  value="entrar" name="entrar" id="entrar" class="ui inverted fluid large submit button" style="background-color: #191919">Entrar</button>
                    </div>
            </div>

            <div class="ui error message"></div>

    <?php
    require_once "crud_usuario.php";
        if (isset($_POST['entrar'])) {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $novo_usuario = new usuario($nome,$email,$senha);
            $crud = new crud_usuario();
            $crud->insert_usuario($novo_usuario);
            header('Location: login.php');
        }
     ?>

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