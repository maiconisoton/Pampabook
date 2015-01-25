<?php
/* Essa classe mostra o perfil do usuario. Ela chama dois arquivos, um para
 * mostrar o perfil contento funções de busca BD e outro para mostrar os post
 * que este usuário fez. */

include_once '../controller/seguranca.php';
include_once 'header.php';
?>		
<div id="conteudo">
    <div id="editar_perfil">
        <form method="POST" action="../controller/editar_perfil.php">
            <input type="submit" value="  Editar Perfil  "/>
        </form>
    </div>
    <?php
    include '../controller/mostraPerfil.php';
    include '../controller/mostraPost.php';
    ?> 
</div>
