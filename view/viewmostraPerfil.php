<!-- Esse arquivo contem o conteudo do perfil do usuário-->
<div id="fotom">
    <img height="150" width="150" src="<?php echo $foto; ?>" border="3px"/>
    <div id="infom">
        <b>Sobre: </b><br/> <?php echo $sobre; ?><br/>
        <b>Cidade: </b><br/> <?php echo $local; ?><br/>
        <b>Data Nascimento: </b><br/><?php echo $data_nasc; ?><br/>
        <b>Idade: </b><br/><?php echo $idade; ?><br/>
        <b>E-mail: </b><br/><?php echo $email; ?><br/>
        <b>Gênero: </b><br/><?php echo $genero; ?><br/>
        <b>Estado Civil: </b><br/><?php echo $civil; ?><br/>
    </div>
</div>

<div id="nomem">
    <?php echo $nome; ?><br>
    <div id="mensagemm" style="border-style:solid;border-color:black;">
        <?php echo $mensagem; ?>
    </div><br/>
    <div id="posts">
        <form method="POST" action="../controller/novoPost.php">
            <input type="hidden" name="acao" value="incluir">
            <input type="hidden" name="nome" value="<?php echo $nome ?>">
            <textarea name="post" cols="66" rows="3" onblur="if (this.value == '') {
                        this.value = 'O que esta pensando...';
                    }" onclick="if (this.value == 'O que esta pensando...') {
                        this.value = '';
                    }">O que esta pensando...</textarea>
            <input type="submit" value="  Publicar  "/>
        </form>
    </div>  
</div>


