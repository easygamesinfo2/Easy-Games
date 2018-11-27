<div style="margin-left: 20%; margin-right: 20%; min-height: 60%">

<div class="ui one column grid" style="margin-top: 5%; margin-bottom: 5%">

		<div class="column">
			<div class="ui  segment" style="width: 15%; color: white; background-color: teal"><h1 style="text-align: center">Notícias</h1>

			</div>
		</div>

<?php foreach ($noticias as $noticia): ?>

		<div class="column">
			<div class="ui  segment" style=";background-color: white">

        <h1><a style="color: black" href="controlador.php?acao=exibir_noticia&id_noticia=<?=$noticia->getId();?>"><?=$noticia->getTitulo();?></a></h1>

			</div>
		</div>

<?php endforeach;?>

</div>

</div>

