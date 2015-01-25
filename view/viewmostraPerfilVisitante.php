<?php
/* Esse arquivo mostra o perfil do visitante (podendo ser resultado de uma
 * busca ou clicando para visualizar um amigo. Esses IF no começo é para verificar
 * se nao for amigo mostra o botão ADD AMIGO, caso seja amigo mostra REMOVER AMIGO
 * e caso seja o próprio perfil nao mostra nada. */

include_once '../view/header.php';
$nomeT = $_SESSION['usuarioNome'];
if ($nomeT != $nome) {
    $sql = "SELECT * FROM `amigos` WHERE `username` LIKE '%$nomeT' AND `nomeamigo` LIKE '%$nome'";
    $query = mysql_query($sql);
    $result = mysql_affected_rows();
    if ($result >= 1) {
        ?>
        <div id="rem_perfil">
            <form method="POST" action="../controller/remamigo.php">
                <input type="hidden" name="nomeAmigo" value="<?php echo $nome; ?>" />
                <input type="hidden" name="nomeUser" value="<?php echo $nomeT; ?>" />
                <input type="submit" value="  Remover Amigo  "/>
            </form>
        </div>
        <?php
    } else {
        ?>
        <div id="add_perfil">
            <form method="POST" action="../controller/addamigo.php">
                <input type="hidden" name="acao" value="incluir">
                <input type="hidden" name="nomeAmigo" value="<?php echo $nome; ?>" />
                <input type="hidden" name="nomeUser" value="<?php echo $nomeT; ?>" />
                <input type="submit" value="  Adicionar Como Amigo  "/>
            </form>
        </div>
    <?php
    }
}
?>
<div id="fotom">
    <img height="150" width="150" src="<?php echo $foto; ?>" border="3px"/>
    <div id="infom">
        <b>Sobre: </b><br/> <?php echo $sobre; ?><br/>
        <b>Cidade: </b><br/> <?php echo $local; ?><br/>
        <b>Data Nascimento: </b><br/><?php echo $data_nasc; ?><br/>
        <b>Idade: </b><br/><?php echo $idade; ?><br/>
        <b>E-mail: </b><br/><?php echo $email; ?><br/>
        <b>Gênero: </b><br/><?php echo $genero; ?><br/>
        <b>Estado Civil: </b><br/><?php echo $civil; ?><br/>
        <b>Amigos em Comum: </b><br/><?php include '../controller/amigoscomum.php';?>
    </div>
</div>

<div id="nomem">
    <?php echo $nome; ?><br>
    <div id="mensagemm" style="border-style:solid;border-color:black;">
        <?php echo $mensagem; ?>
    </div><br/>
    <div id="posts">
        <?php include '../controller/mostraPostVisitante.php'; ?>        
    </div>  
</div>
