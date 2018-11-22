<div style="margin-left: 20%; margin-right: 20%; min-height: 60%">

<div class="ui one column grid" style="margin-top: 5%; margin-bottom: 5%">

		<div class="column">
			<div class="ui  segment" style="width: 15%; color: white; background-color: teal"><h1 style="text-align: center">Usuários</h1>

			</div>
		</div>

<?php foreach ($usuarios as $usuario): ?>

		<div class=" four wide column">
			<div class="ui  segment" style=";background-color: white">

        <h1 style="color: black">Nome</h1>
        <p style="color: black">Email</p>
        <button class="ui button" style="background: #2B2B2B"><a style="color: white" class="item" href=""><i class="edit outline icon"></i>Excluir
			</div>
		</div>

<?php endforeach;?>

</div>

</div>
