<div style="margin-left: 20%; margin-right: 20%; min-height: 60%">

<div class="ui one column grid" style="margin-top: 5%; margin-bottom: 5%">

		<div class="column">
			<div class="ui  segment" style="width: 15%; color: white; background-color: teal"><h1 style="text-align: center">Usuários</h1>

			</div>
		</div>

<?php foreach ($noticias as $noticia): ?>

		<div class="column">
			<div class="ui  segment" style=";background-color: white">

        <h1 style="color: black"><?=$usuario->getNome();?></h1>
        <p style="color: black"><?=$usuario->getEmail();?></p>
        <a href="controlador.php?acao=excluir_noticia&id_noticia=<?= $noticia->getId()?>"><button class="ui grey button" style="color: black">Excluir</button></a>
			</div>
		</div>

<?php endforeach;?>

</div>

</div>
