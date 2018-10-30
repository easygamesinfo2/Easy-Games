<div style="margin-left: 20%; margin-right: 20%; min-height: 60%">

<div class="ui one column grid" style="margin-top: 5%; margin-bottom: 5%">

<?php foreach ($noticias as $noticia): ?>

		<div class="column">
			<div class="ui  segment" style=";background-color: #191919">

        <h1><a style="color: white" href="noticias.php?acao=exibir&id=<?=$noticia->getId()?>"><?=$noticia->getTitulo();?></a></h1>

			</div>
		</div>

<?php endforeach;?>

</div>

</div>

