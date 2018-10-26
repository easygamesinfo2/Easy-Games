<form method="post" action="comentarios.php?acao=inserir">

    <div style="margin-left: 20%; margin-right: 20%">

        <div class="ui form" style=" margin-top: 5%">

            <div class="field grey">

                <h1 style="color: white;">Criar Comentário</h1>

                <input type="text" name="descricao" id="descricao" placeholder="Adicione um nome">

            </div>
        </div>

        <div class="ui form" style="margin-top: 2%;margin-bottom: 5%">

            <div class="field grey">

                <textarea name="descricao" id="descricao" cols="30" rows="3" class="ckeditor" placeholder="Adicione uma descrição"></textarea>

                <button type="submit" name="inserir" value="Inserir" class="ui  grey button" style="margin-top: 2%; color: black">Enviar</button>

            </div>
        </div>
    </div>

</form>