<?php
/* Esse arquivo contém uma tabela que serve para organização para a edição
 * do perfil do usuário. Os dados são recuperados pelo SQL e é preenchido
 * os valores "value" com essas informações. */

include 'seguranca.php';
include '../view/header.php';
?>
<link href="../css/default.css" rel="stylesheet" type="text/css" />

<div id="conteudo">
    <?php
    $user = $_SESSION['usuarioLogin'];
    $recupera = mysql_query("SELECT * FROM perfil WHERE username LIKE '$user'") or die(mysql_error());
    $q = mysql_fetch_array($recupera); //aqui recupera o produto escolhido a ser editado	
    $foto = $q['linkfoto'];
    ?>	

    <form method="POST" action="../controller/upload.php" enctype="multipart/form-data">
        <table border="0" cellspacing="5">
            <tr>
                <td align="right">Foto Atual:</td>
                <td align="left"><img height="150" width="150" src="<?php echo $foto; ?>"/>
                    <input type="checkbox" name="semfoto" value="http://localhost/Projeto/img/no-photo.jpg" />Remover Foto
                </td>
            </tr>
            <tr>
                <td align="right">Foto:</td>
                <td align="left"><input type="file" name="file[]"></td>
            </tr>
            <tr>
                <td align="right">Nome:</td>
                <td align="left"><input type="text" name="nome" value="<?php echo $q['nome']; ?>" maxlength="100"/></td>
            </tr>
            <tr>
                <td align="right">Mensagem:</td>
                <td align="left"><input type="text" name="mensagem" value="<?php echo $q['mensagem']; ?>" maxlength="100"/></td>
            </tr>
            <tr>
                <td align="right">Data de Nascimento:</td>
                <td align="left"><input type="text" name="datanas" value="<?php echo $q['data_nasc']; ?>" maxlength="10" onkeyup="Formatadata(this,event)"/></td>
            </tr>
            <tr>
                <td align="right">E-mail:</td>
                <td align="left"><input type="text" id="email" name="email" value="<?php echo $q['email']; ?>" maxlength="50" onclick="IsEmail(document.getElementById('email').value)" onchange="IsEmail(document.getElementById('email').value)""/></td>
            </tr>
            <tr>
                <td align="right">Cidade:</td>
                <td align="left"><input type="text" id="cidade" name="local" value="<?php echo $q['local']; ?>" maxlength="50" /></td>
            </tr>
            <tr>
                <td align="right">Sobre:</td>
                <td align="left"><textarea cols="20" rows="5" name="sobre"><?php echo $q['sobre']; ?></textarea></td>
            </tr>
            <tr>
                <td align="right">Estado Civil:</td>
                <td align="left"><input type="text" name="civil" value="<?php echo $q['civil']; ?>" maxlength="50" /></td>
            </tr>
        </table> 
        <input type="submit" value="   Atualizar   " onsubmit="IsEmail(document.getElementById('email').value)"/>
    </form>
</body>
</html>