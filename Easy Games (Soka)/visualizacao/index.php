<html><head>
  <!-- Standard Meta -->
    <!--zxfghjk-->
    
  <meta charset="UTF-8">
  <link rel="stylesheet"  href="semantic/semantic.css">

  <style type="text/css">

    .ui.masthead.segment{
      min-height: 400px;
      padding: 1em 0em;
    }

    .ui.masthead.segment{
      background-color: black;
    }

    .hidden.menu {
      display: none;
    }

    .masthead.segment {
      min-height: 700px;
      padding: 1em 0em;
    }
    .masthead .logo.item img {
      margin-right: 1em;
    }
    .masthead .ui.menu .ui.button {
      margin-left: 0.5em;
    }
    .masthead h1.ui.header {
      margin-top: 0em;
      margin-bottom: 0em;
      font-size: 4em;
      font-weight: normal;
    }
    .masthead h2 {
      font-size: 1.7em;
      font-weight: normal;
    }

    .ui.vertical.stripe {
      padding: 8em 0em;
    }
    .ui.vertical.stripe h3 {
      font-size: 2em;
    }
    .ui.vertical.stripe .button + h3,
    .ui.vertical.stripe p + h3 {
      margin-top: 3em;
    }
    .ui.vertical.stripe .floated.image {
      clear: both;
    }
    .ui.vertical.stripe p {
      font-size: 1.33em;
    }
    .ui.vertical.stripe .horizontal.divider {
      margin: 3em 0em;
    }

    .quote.stripe.segment {
      padding: 0em;
    }
    .quote.stripe.segment .grid .column {
      padding-top: 5em;
      padding-bottom: 5em;
    }

    .footer.segment {
      padding: 5em 0em;
    }

    .secondary.pointing.menu .toc.item {
      display: none;
    }

    @media only screen and (max-width: 700px) {
      .ui.fixed.menu {
        display: none !important;
      }
      .secondary.pointing.menu .item,
      .secondary.pointing.menu .menu {
        display: none;
      }
      .secondary.pointing.menu .toc.item {
        display: block;
      }
      .masthead.segment {
        min-height: 350px;
      }
      .masthead h1.ui.header {
        font-size: 2em;
        margin-top: 1.5em;
      }
      .masthead h2 {
        margin-top: 0.5em;
        font-size: 1.5em;
      }
    }


  </style>


</head>

<body class="pushable">

<!-- Page Contents -->
<div class="pusher">
  <div class="ui inverted vertical masthead center aligned segment">

    <!--<div class="ui container">
      <div class="ui large secondary inverted pointing menu">
        <div class="right item">
          <a class=" ui  inverted teal button">Log in</a>
          <a class=" ui inverted teal button">Sign Up</a>
        </div>
      </div>
    </div>-->

    <div class="ui text container">
      <h1 class="ui header" style="color: teal">
        <br>
        Easy Games
      </h1>
      <h2 class="ui header" style="color: white">Trazendo as novidades dos Games</h2>
      <a href="app/view/login.php">
        <div class="large ui blue button">Noticias <i class="right arrow icon"></i></div>
      </a>
    </div>

  </div>

<div style="margin-left: 20%; margin-right: 20%; min-height: 60%">

<div class="ui one column grid" style="margin-top: 5%; margin-bottom: 5%">


<?php foreach ($noticias as $noticia): ?>

		<div class="column">
			<div class="ui  segment" style=";background-color: black">

        <h1><a style="color: white" href="controlador.php?acao=exibir_noticia&id_noticia=<?=$noticia->getId();?>"><?=$noticia->getTitulo();?></a></h1>

			</div>
		</div>

<?php endforeach;?>

</div>

</div>

