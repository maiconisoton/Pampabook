<?php

/* Formulário de envio de mensagem. Recupera os usuários do banco e mostra
 * em uma slectbox */

$user = $_SESSION['usuarioNome'];
$sql1 = "SELECT * FROM amigos WHERE username LIKE '%$user'";
$con = mysql_query($sql1);
?>

<form action="../controller/enviarmensagem.php" method="POST">
    <input type="hidden" name="acao" value="incluir">
    Para: 
    <select name="para">
        <option selected value="0">Selecione um Amigo(a)</option>
        <?php
        if (mysql_num_rows($con) > 0) {
            while ($rs = mysql_fetch_object($con)) { // vai pegar esse objeto e ir duplicando!
                ?>
                <option value="
                        <?php echo $rs->nomeamigo; ?>">
                    <?php echo $rs->nomeamigo; ?></option>
                <?php
            }//termina while
        }//termina if
        ?>
    </select><br/>
    Mensagem: <input type="text" name="mensagem" value="" maxlength="500" size="30"/>  
    <input type="hidden" value="<?php echo $user; ?>" name="de"/>
    <input type="submit" value="   Enviar   "/>        
</form>      


