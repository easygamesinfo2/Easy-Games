<div style="min-height: 60%">
<form method="post" action="noticias.php?acao=alterar">

<input type="hidden" name="id" value="<?= $noticia->getId()?>">

<div style="margin-left: 20%; margin-right: 20%">

<div class="ui form" style="margin-top: 5%">

        <div class="field grey">

            <h1 style="color: white;">Editar notícia</h1>

<input type="text" name="titulo" id="titulo" value="<?=$noticia->getTitulo()?>">

</div>
</div>


<div class="ui form" style="margin-top: 2%;margin-bottom: 5%">

<div class="field grey">

<textarea name="descricao" id="descricao" cols="30" rows="3" class="ckeditor"><?=$noticia->getDescricao()?></textarea>

<button type="submit" name="gravar" value="Gravar" class="ui  grey button" style="margin-top: 2%; color: black">Enviar</button>

</div>
</div>
</div>



</form>
</div>