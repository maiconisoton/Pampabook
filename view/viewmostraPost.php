<!-- Esse arquivo mostra os post de um perfil, podendo deletar. -->

<div id="postPerfil">
    <b><?php echo $nome; ?>: </b> <?php echo $post; ?><br/>
    <a id='deletar' href="../controller/deleta.php?cod=<?php echo $id_post; ?>"> Apagar </a>
    <br/>
    <hr>
</div>

