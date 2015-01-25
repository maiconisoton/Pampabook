<!-- Esse arquivo mostra os post no geral do index, o usuario so pode deletar os 
que são seus, por isso esse if que faz a comparação.-->

<b><?php echo $nome; ?>: </b> <?php echo $post; ?><br/>
<?php
if ($user == $nome) {
    echo "<a id='deletar' href=\"../controller/deleta.php?cod=$id_post\"> Apagar </a>";
}
?>
<br/>
<hr>


