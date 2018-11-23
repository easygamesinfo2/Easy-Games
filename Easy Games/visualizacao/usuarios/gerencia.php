<div style="margin-left: 20%; margin-right: 20%; min-height: 60%">

<div class="ui one column grid" style="margin-top: 5%; margin-bottom: 5%">

		<div class="column">
			<div class="ui  segment" style="width: 50%; color: white; background-color: teal"><h1 style="text-align: center">Gerenciamento de Usuários</h1>

			</div>
		</div>

<?php foreach ($usuarios as $usuario): ?>

		<div class="four wide column">
			<div class="ui  segment" style=";background-color: white">

        <h1 style="color: black"><?=$usuario->getNome();?></h1>
        <p style="color: black"><?=$usuario->getEmail();?></p>
        <div class="ui form" >
        	<div class="field">
        		<select>
        		<option value="1">Comum</option>
        		<option value="2">Admin</option>
    			</select>
  			</div>
		</div>
        <button class="ui button" style="margin-top: 5% ;background: #2B2B2B"><a style="color: white" class="item" href="../controlador/controlador.php?acao=excluir_gerencia&cod_usuario=<?=$usuario->getId();?>"><i class="edit outline icon"></i>Remover</a></button>
        

			</div>
		</div>

<?php endforeach;?>

</div>

</div>
