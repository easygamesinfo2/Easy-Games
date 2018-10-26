<div style="margin-left: 20%; margin-right: 20%">

    <div class="ui one column grid" style="margin-top: 5%">

        <div class="column">

            <div class="ui  segment" style="background-color: #191919">

                <p style="color: white"><?= $comentario->getDescricao()?> </p>

                <div class="column" style="margin-top: 5%">

                    <a href="comentarios.php?acao=alterar&id=<?= $comentario->getId()?>"><button class="ui grey button" style="color: black ">Editar</button></a>

                    <a href="comentarios.php?acao=excluir&id=<?= $comentario->getId()?>"><button class="ui grey button" style="color: black">Excluir</button></a>

                </div>
            </div>
        </div>
    </div>


</div>
