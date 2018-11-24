<div style="margin-left: 20%; margin-right: 20%; min-height: 60%">

<div class="ui one column grid" style="margin-top: 5%; margin-bottom: 5%">

<div class="column">

<div class="ui  segment" style=";background-color: #191919">

<p style="color: white"><?=$comentario->getTexto();?> </p>

<div class="column" style="margin-top: 5%">

<a href="controlador.php?acao=alterar_comentario&id_comentario=<?= $comentario->getId()?>"><button class="ui grey button" style="color: black">Editar</button></a>

<a href="controlador.php?acao=excluir_comentario&id_comentario=<?= $comentario->getId()?>"><button class="ui grey button" style="color: black">Excluir</button></a>

</div>

</div>

</div>

</div>

</div>

