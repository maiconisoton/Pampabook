<?php
/* Esse arquivo deleta o amigo alvo. Pedindo confirmação antes de deletar. */

include '../controller/seguranca.php';
include '../view/header.php';
error_reporting(0);
$nome = $_POST['nomeAmigo'];
$nomeT = $_POST['nomeUser'];
?>		
<div id="conteudo">
    <form action="#" method="post">
        <input type="hidden" name="nomeAmigo" value="<?php echo $nome; ?>" />
         <input type="hidden" name="nomeUser" value="<?php echo $nomeT; ?>" />
        <br /><h2>Deseja remover o amigo?</h2><br />
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
        <input type="submit" class="botao" name="enviar" value="    Confirmar    " style="text-align: center;" />			
    </form>
</div>
<?php
if ($_POST['enviar']) {
    if ($_POST['op'] == Sim) {
        $nome = $_POST['nomeAmigo'];
        $nomeT = $_POST['nomeUser'];
        
        $deleta = mysql_query("DELETE FROM amigos WHERE username = '$nomeT' AND nomeamigo = '$nome'") or die(mysql_error());
        echo "<script>alert('Amigo Removido'); window.location='../view/index.php'</script>";
    } else
        echo "<script>alert('OK! Tome mais cuidado.'); window.location='../view/perfil.php'</script>";
}
?>
</body>
</html>