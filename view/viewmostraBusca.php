<!-- Esse arquivo mostra conteudo da table onde mostra o resultado de uma busca.
Ele é chamado do arquivo controller/busca.php-->
<tr style="background-color: #c8e7d2; ">
    <td style="width: 150px; text-align: right"><img height="80" width="80" src="<?php echo $imagem; ?>" border="3px"/></td>
    <td style="text-align: left; font-size: 20px;"><a href="../controller/mostraVisitante.php?perfil=<?php echo $nome; ?>"> <?php echo $nome; ?> </a>
</tr>

