<div style="margin-left: 20%; margin-right: 20%">

    <div class="ui one column grid" style="margin-top: 5%; margin-bottom: 5%">

        <?php foreach ($comentarios as $comentario): ?>

            <div class="column">
                <div class="ui  segment" style=";background-color: #191919">

                    <h1><a style="color: white" href="comentarios.php?acao=exibir&id=<?=$comentario->getId()?>"><?=$comentario->getDescricao();?></a></h1>

                </div>
            </div>

        <?php endforeach;?>

    </div>

</div>