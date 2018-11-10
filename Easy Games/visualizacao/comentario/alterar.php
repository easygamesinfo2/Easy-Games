<div style="min-height: 60%">
<form method="post" action="comentarios.php?acao=alterar">

    <input type="hidden" name="id" value="<?= $comentario->getId()?>">

    <div style="margin-left: 20%; margin-right: 20%">

        <div class="ui form" style="margin-top: 5%">

            <div class="field grey">

                <h1 style="color: white;">Editar Comentário</h1>

                <input type="text" name="nome" id="nome" value="<?=$comentario->getNome()?>">

            </div>
        </div>


        <div class="ui form" style="margin-top: 2%;margin-bottom: 5%">

            <div class="field grey">

                <textarea name="descricao" id="descricao" cols="30" class="ckeditor" rows="3"><?=$comentario->getDescricao()?></textarea>

                <button type="submit" name="gravar" value="Gravar" class="ui  grey button" style="margin-top: 2%; color: black">Enviar</button>

            </div>
        </div>
    </div>



</form>
</div>