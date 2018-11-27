<div style="margin-left: 20%; margin-right: 20%; min-height: 60%">
	<div class="ui  segment" style="width: 30%; margin-top: 5%;color: white; background-color: teal"><h1 style="text-align: center">Avaliações</h1>
	</div>
<div class="ui three column grid" style="margin-top: 5%; margin-bottom: 5%">

<?php foreach ($avaliacoes as $avaliacao): ?>

		<div class="column">
			<div class="ui teal segment" style=" background-color: white">
				<div><?=$avaliacao->getImagem();?></div>
				<h1><a style="color: black" href="controlador.php?acao=exibir_avaliacao&id_avaliacao=<?=$avaliacao->getId();?>"><?=$avaliacao->getNome();?></a></h1>
			</div>
		</div>
<?php endforeach;?>
	</div>

			

</div>

</div>

