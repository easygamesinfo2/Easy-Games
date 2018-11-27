<div style="margin-left: 20%; margin-right: 20%; min-height: 60%">

<div class="ui one column grid" style="margin-top: 5%; margin-bottom: 5%">

		<div class="column">
			<div class="ui  segment" style="width: 15%; color: white; background-color: teal"><h1 style="text-align: center">Comentários</h1>

			</div>
		</div>

<?php foreach ($comentarios as $comentario): ?>

		<div class="column">
			<div class="ui  segment" style=";background-color: white">

        <h1><a style="color: black" href="controlador.php?acao=exibir_comentario&id_comentario=<?=$comentario->getId();?>" ><?=$comentario->getTexto();?></a></h1>

			</div>
		</div>

<?php endforeach;?>

</div>

</div>

