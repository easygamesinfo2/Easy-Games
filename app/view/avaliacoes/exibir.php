<div style="margin-left: 20%; margin-right: 20%; min-height: 60%">

<div class="ui one column grid" style="margin-top: 5%">

<div class="column">

<div class="ui  segment" style="background-color: #191919">

<h1 style="color: white"><?= $avaliacao->getNome()?></h1>

<p style="color: white"><?= $avaliacao->getDescricao()?> </p>

<div class="column" style="margin-top: 5%">

<a href="avaliacoes.php?acao=alterar&id=<?= $avaliacao->getId()?>"><button class="ui grey button" style="color: black ">Editar</button></a>

<a href="avaliacoes.php?acao=excluir&id=<?= $avaliacao->getId()?>"><button class="ui grey button" style="color: black">Excluir</button></a>

</div>
</div>
</div>
</div>

    <div class="ui two column grid" style="margin-top: 5%; margin-bottom: 5%">

        <div class="column">
            <h1 style="color: white">Nota do jogo</h1>
            <i class="star large icon" style="color: yellow"></i>
            <i class="star large icon" style="color: yellow"></i>
            <i class="star large icon" style="color: yellow"></i>
            <i class="star large icon" style="color: yellow"></i>
            <i class="empty star large icon" style="color: yellow"></i>
            <br>
            <div class="ui labeled button" tabindex="0" style="margin-top: 3%;">
                <div class="ui  green button" style="color: white ">
                    <i class="thumbs up icon" style="color: white"></i> Like
                </div>
                <a class="ui basic green label">
                    41
                </a>
                <div class="ui red button" style="margin-left: 2%;color: white">
                    <i class="thumbs down icon" style="color: white "></i> Dislike
                </div>
                <a class="ui basic red label">
                    17
                </a>
            </div>

        </div>


        <div class="column">
            <div class="ui segment" style="background-color: #191919">
            <h1 style="color: white;margin-top: 2%">Sites com o jogo disponível</h1>
            <div style="margin-bottom: 2%">
                <i class="world icon" style="color: white"></i>
                <a href="" style="color: white">example.com.br/jogodesejado</a>
            </div>
            <div style="margin-bottom: 2%">
                <i class="world icon" style="color: white"></i>
                <a href="" style="color: white">example.com.br/jogodesejado</a>
            </div>
            <div style="margin-bottom: 2%">
                <i class="world icon" style="color: white"></i>
                <a href="" style="color: white">example.com.br/jogodesejado</a>
            </div>
            <div style="margin-bottom: 2%">
                <i class="world icon" style="color: white"></i>
                <a href="" style="color: white">example.com.br/jogodesejado</a>
            </div>
            <div style="margin-bottom: 2%">
                <i class="world icon" style="color: white"></i>
                <a href="" style="color: white">example.com.br/jogodesejado</a>
            </div>
        </div>
</div>

</div>
</div>
