<!-- Esse arquivo é o de login onde tem as informações para o usuário se
logar ou se cadastrar. Sempre que o usuário entrar vai ter esta página até
o momento de login -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Login::PampaBook</title>
        <link href="../css/estilos.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div id="header" align="center">
            <a href="index.php"><img border='0' src='../img/header.jpg' height="160px" width="800px"/></a>
        </div>
        <div id="principal">
            <form method="post" action="../controller/valida.php">
                <label>Usuário: </label>
                <input type="text" name="usuario" maxlength="20" size="13" />
                <label>Senha: </label>
                <input type="password" name="senha" maxlength="20" size="13" />
                <input type="submit" value="  Entrar  " />
            </form>
            <br /> <br/>

            <p>Seja bem Vindo a nossa Rede Social</p>
            <p><big><big><big><big>Cadastre-se</big></big></big>
                    É gratuito!</big></p>
            <?php include "novo_usuario.php"; ?>
        </div>
    </body>
</html>