<!-- Esse arquivos contem o cabeçalho do site, é carregado na maioria dos
view e contem o menu. Caso seja necessario alterar algo do menu é
aqui o lugar -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>PampaBook</title>
        <link href="../css/estilos.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../css/jquery-ui.css" />
        <script src="../js/jquery-1.9.1.js"></script>
        <script src="../js/jquery-ui.js"></script>
        <script language="JavaScript" src="../js/cidades.js"></script> 
        <script language="JavaScript" src="../js/functions.js"></script> 
    </head>

    <body> 
        <div id="header">
            <a href="../view/index.php"><img border='0' src='../img/header.jpg' height="160px" width="800px"/></a><br />
        </div>

        <div id="menu">
            <form method="POST" action="../controller/busca.php" >  
                <p class="barNav">
                    <a href="../view/index.php" >Início</a> |
                    <a href="../view/perfil.php"><?php echo $_SESSION['usuarioNome']; ?></a> |
                    <a href="../view/batepapo.php" >Bate-Papo</a> |
                    <input type="type=" value="" name="busca"size="15" /><input type="submit" name="buscar" value=" Buscar "/> |
                    <a href="../controller/sair.php">Sair</a> 
                </p>
            </form> 
        </div>

