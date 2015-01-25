<?php
/* Esse arquivo remove arquivos do banco de dados. Antes pedindo confirmação
 * do usuário */
include '../controller/seguranca.php';
include '../view/header.php';
error_reporting(0);
?>		
<div id="conteudo">
    <?php
    $codigo = $_GET['cod'];
    ?>
    <form action="#" method="post">
        <br /><h2>Deseja mesmo excluir?</h2><br />
        <table align="center" cellpadding="3" cellspacing="0" border="0">
            <tr>
                <td width="50 px" height="30px">Sim</td>
                <td width="50 px" height="30px"><input type="radio" name="op" value="Sim" class="op" /></td>
            </tr>
            <tr>
                <td width="50 px" height="30px">Não</td>
                <td width="50 px" height="30px"><input type="radio" name="op" value="Nao" class="op" /></td>
            </tr>
        </table><br />			
        <input type="submit" class="botao" name="enviar" value="    Confirmar    "style="text-align: center;" />			
    </form>
</div>
<?php
if ($_POST['enviar']) {
    if ($_POST['op'] == Sim) {
        $deleta = mysql_query("DELETE FROM `post` WHERE `id_post` = $codigo") or die(mysql_error());
        echo "<script>alert('Registro Excluido'); window.location='../view/perfil.php'</script>";
    }
    else
        echo "<script>alert('OK! Tome mais cuidado.'); window.location='../view/perfil.php'</script>";
}
