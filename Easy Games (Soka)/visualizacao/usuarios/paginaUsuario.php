<!DOCTYPE html>
<html>
<body>
<div id="frente">
	<div class="ui center aligned container" style="height: 35%;width: 30%;margin-left: 35%;background-color: white" id="sobre_usuario" >
		<h1> Nome: <?=$_SESSION['nome_usuario']?> </h1>
		

	<?php if (isset($_SESSION['cod_usuario']) and $_SESSION['cod_usuario']) { ?>
		
		<div class="ui  buttons" id="botoes">
			<a id="botao" href="../controlador/Usuarios.php?acao=alterarUsuario">
				<div class="ui animated button" tabindex="0">
  					<div class="visible content">Alterar Informações</div>
  					<div class="hidden content">
    					<i class="settings icon"></i>
  					</div>
				</div> </a>
			<a id="botao" href="../controlador/Usuarios.php?acao=deletarUsuario"> 
			<div class="fluid ui animated negative button"  tabindex="0">
  				<div class="visible content">Deletar Conta</div>
  					<div class="hidden content">
    					<i class="trash alternate icon"></i>
  					</div>
				</div></a>
			</div>		
		
	<?php } ?>
</div>
		
</div>

	<div class="ui grid" id="conteudo">
   			   	
		<?php if ($cod_tip == '5') { ?>

       		<div class="ui horizontal section divider">Perguntas feitas por <?=$usuario['Nome']?></div>
      		<div class="ui vertically divided grid">

				<?php foreach ($perguntas as $pergunta) { ?>
		
				<div class="row">
          			<div class="sixteen wide column">
          				<a href="../controlador/Usuarios.php?acao=pergunta&id_pergunta=<?=$pergunta['id_pergunta']?>" style="color: inherit; ">
       		 				<h4 class="ui header"><?=$pergunta['titulo']?></h4>
          				
          					<?=$pergunta['descricao_pergunta']?>
          				
          				</a>
         			</div>
        		</div>

		<?php }} ?>

	    <?php if ($cod_tip == '4') { ?>

       		<div class="ui horizontal section divider">Perguntas respondidas por <?=$usuario['Nome']?></div>
      		<div class="ui vertically divided grid">

			<?php foreach ($respostas as $resposta) { ?>
		
				<div class="row">
         			<div class="sixteen wide column">
          				<a href="../controlador/Usuarios.php?acao=pergunta&id_pergunta=<?=$resposta['id_pergunta']?>" style="color: inherit; ">
       		 				<h4 class="ui header"><?=$resposta['titulo']?></h4>
          					<?=$resposta['descricao_pergunta']?>
          				</a>
          			</div>
        		</div>

		<?php }} ?>
    </div>
   		
</div>
</body>
   		

	



		




