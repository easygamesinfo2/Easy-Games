<div style="margin-left: 20%; margin-right: 20%; min-height: 60%">

<div class="ui one column grid" style="margin-top: 5%">

<div class="column">
<div class="ui  segment" style="background-color: white">
<div><?=$avaliacao->getImagem();?></div>
</div>

<div class="ui  segment" style="background-color: white">

<h1 style="color: black"><?=$avaliacao->getNome();?></h1>

<p style="color: black"><?=$avaliacao->getDescricao();?> </p>

<div class="column" style="margin-top: 5%">
<?php
    if (isset($_SESSION['cod_usuario'])) { 
        if ($_SESSION['tipo_usuario']==1) {
               ?>

<a href="controlador.php?acao=alterar_avaliacao&id_avaliacao=<?= $avaliacao->getId()?>"><button class="ui grey button" style="color: white; background-color: #191919 ">Editar</button></a>

<a href="controlador.php?acao=excluir_avaliacao&id_avaliacao=<?= $avaliacao->getId()?>"><button class="ui grey button" style="color: white; background-color: #191919 ">Excluir</button></a>

<?php }} ?>
</div>
</div>
</div>
</div>

    <div class="ui two column grid" style="margin-top: 5%; margin-bottom: 5%">

        <div class="column">
            <h1 style="color: white">Nota do jogo</h1>
            <?php 
            if ($nota_jogo > 0 AND $nota_jogo <= 1.3) {
            
            ?>    
            <i class="star large icon" style="color: yellow"></i>
            <i class="star outline large icon" style="color: yellow"></i>
            <i class="star outline large icon" style="color: yellow"></i>
            <i class="star outline large icon" style="color: yellow"></i>
            <i class="star outline large icon" style="color: yellow"></i>
            <?php
            }elseif ($nota_jogo >1.3  AND $nota_jogo <= 1.7) {
            ?>
            <i class="star large icon" style="color: yellow"></i>
            <i class="star large icon" style="color: yellow"></i>
            <i class="star outline large icon" style="color: yellow"></i>
            <i class="star outline large icon" style="color: yellow"></i>
            <i class="star outline large icon" style="color: yellow"></i>
            <?php
            }elseif ($nota_jogo > 1.7 AND $nota_jogo <= 2.5) {
            ?>
            <i class="star large icon" style="color: yellow"></i>
            <i class="star large icon" style="color: yellow"></i>
            <i class="star large icon" style="color: yellow"></i>
            <i class="star outline large icon" style="color: yellow"></i>
            <i class="star outline large icon" style="color: yellow"></i>
            <?php
            }elseif ($nota_jogo > 2.5 AND $nota_jogo <= 5) {
            ?>
            <i class="star large icon" style="color: yellow"></i>
            <i class="star large icon" style="color: yellow"></i>
            <i class="star large icon" style="color: yellow"></i>
            <i class="star large icon" style="color: yellow"></i>
            <i class="star outline large icon" style="color: yellow"></i>
            <?php
            }elseif($nota_jogo > 5){
            ?> 
            <i class="star large icon" style="color: yellow"></i>
            <i class="star large icon" style="color: yellow"></i>
            <i class="star large icon" style="color: yellow"></i>
            <i class="star large icon" style="color: yellow"></i>
            <i class="star large icon" style="color: yellow"></i>
            <?php
            }elseif($nota_jogo <= 0){
            ?> 
            <i class="star outline large icon" style="color: yellow"></i>
            <i class="star outline large icon" style="color: yellow"></i>
            <i class="star outline large icon" style="color: yellow"></i>
            <i class="star outline large icon" style="color: yellow"></i>
            <i class="star outline large icon" style="color: yellow"></i>
            <?php
            }
            ?>
            <br>
            <?php
    if (isset($_SESSION['cod_usuario'])) { 
        if ($_SESSION['tipo_usuario']==1) {
               ?>
            <div class="ui labeled button" tabindex="0" style="margin-top: 3%;">
                <a href="controlador.php?acao=curtir&id_avaliacao=<?=$avaliacao->getId()?>">
                <div class="ui  green button" style="color: white">                    
                    <i class="thumbs up icon" style="color: white"></i> 
                    </a>
                </div>
                <a class="ui basic green label" >
                    <?=$num_curtidas['numero_curtida'];?>
                </a>
                <div class="ui red button" style="margin-left: 2%;color: white">
                <a href="controlador.php?acao=descurtida&id_avaliacao=<?=$avaliacao->getId()?>"><i class="thumbs down icon" style="color: white"></i> 
                    </a>
                </div>
                <a class="ui basic green label">
                    <?=$num_descurtidas['numero_descurtida'];?>
                </a>
            </div>
            <?php }} ?>


        </div>


</div>
</div>
