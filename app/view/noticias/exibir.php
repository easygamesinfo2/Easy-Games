<div style="margin-left: 20%; margin-right: 20%">

<div class="ui one column grid" style="margin-top: 5%; margin-bottom: 5%">

<div class="column">

<div class="ui  segment" style=";background-color: #191919">

<h1 style="color: white"><?= $noticia->getTitulo()?></h1>

<p style="color: white"><?= $noticia->getDescricao()?> </p>

<div class="column" style="margin-top: 5%">

<a href="noticias.php?acao=alterar&id=<?= $noticia->getId()?>"><button class="ui grey button" style="color: black">Editar</button></a>

<a href="noticias.php?acao=excluir&id=<?= $noticia->getId()?>"><button class="ui grey button" style="color: black">Excluir</button></a>

</div>

</div>

</div>

</div>

</div>

