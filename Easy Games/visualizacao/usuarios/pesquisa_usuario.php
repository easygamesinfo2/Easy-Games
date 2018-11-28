<div style="margin-left: 20%; margin-right: 20%; min-height: 60%">

<div class="ui one column grid" style="margin-top: 5%; margin-bottom: 5%">

		<div class="column">
			<div class="ui  segment" style="width: 15%; color: white; background-color: teal"><h1 style="text-align: center">Usuários</h1>
                        </div>
                        <form method="POST" action="../controlador/controlador.php?acao=busca_usuario">

                                <div class="item">

                                    <div class="ui transparent icon input">

                                           <input type="text" name="pesquisa" placeholder="Pesquisar...">
                    
                                           <i class="search link icon"></i>


                                    </div>

                                </div>

                        </form>
		</div>



		<div class="column">
			<div class="ui  segment" style=";background-color: white">

        <?php 

        $user = $usuario->getTipo();
        if(isset($user)){
         ?>
        <h1 style="color: black"><?=$usuario->getTipo();?></h1>
        
        <?php
        //tipo = nome 
        //nome = cod
        //senha = email
        //email = senha
        //id = tipo
        $tipo_do_usuario = $usuario->getId();
        if($tipo_do_usuario == 1){
                $exibir = "Administrador";
        }else{
        		$exibir = "Comum";
        }

        ?>
        <p style="color: black">Tipo: <?=$exibir;?></p>
        <a href="controlador.php?acao=alterar_tipo&cod_usuario=<?=$usuario->getNome()?>&tipo_usuario=<?=$usuario->getId()?>"><button class="ui grey button" style="color: black">Dar Adm</button></a>
        <a href="controlador.php?acao=excluir_usuario_especifico&cod_usuario=<?=$usuario->getNome()?>"><button class="ui grey button" style="color: black">Excluir</button></a>
        <?php 
        }else{
        ?>
        <h1 style="color: black">Usuario não encontrado</h1>
        <?php
        }
        ?>

			</div>

		</div>



</div>

</div>
