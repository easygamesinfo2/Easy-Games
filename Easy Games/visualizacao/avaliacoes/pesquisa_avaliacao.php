<div style="margin-left: 20%; margin-right: 20%; min-height: 60%">

<div class="ui one column grid" style="margin-top: 5%; margin-bottom: 5%">

<div class="column">
			<div class="ui  segment" style="width: 30%; color: white; background-color: teal"><h1 style="text-align: center">Avaliações</h1>

			</div>
		</div>


        <div class="column">
            <div class="ui  segment" style=";background-color: white">
        <?php 

        $ava = $avaliacao->getNome();
        if(isset($ava)){
		
		?>

        <h1><a style="color: black" href="controlador.php?acao=exibir_avaliacao&id_avaliacao=<?=$avaliacao->getId()?>"><?=$avaliacao->getNome();?></a></h1>

        <?php
    	}
    	else{
    		?>
    		<h1>Jogo não encontrado</h1>
    	<?php
    	}
        ?>

            </div>
        </div>
        


</div>

</div>

