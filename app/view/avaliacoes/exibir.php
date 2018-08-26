<div style="margin-left: 20%; margin-right: 20%">

<div class="ui one column grid" style="margin-top: 5%; margin-bottom: 5%">

<div class="column">

<div class="ui  segment" style=";background-color: #191919">

<h1 style="color: white"><?= $avaliacao->getNome()?></h1>

<p style="color: white"><?= $avaliacao->getDescricao()?> </p>

<div class="column" style="margin-top: 5%">

<a href="avaliacoes.php?acao=alterar&id=<?= $avaliacao->getId()?>"><button class="ui grey button" style="color: black ">Editar</button></a>

<a href="avaliacoes.php?acao=excluir&id=<?= $avaliacao->getId()?>"><button class="ui grey button" style="color: black">Excluir</button></a>

</div>

</div>

</div>

</div>

</div>