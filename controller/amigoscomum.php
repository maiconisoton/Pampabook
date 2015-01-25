<?php

/* Este arquivo recebe dois parametros e realiza a busca no banco de dados. 
 * Primeiro filtra meus amigos, depois filtra amigos do meu amigo visitado,
 * depois compara quais amigos são iguais e retorna o nome do amigo com a foto. */

$nomeT = $_SESSION['usuarioNome'];
$sql = "SELECT t1.nomeamigo AS nomeamigo, perfil.linkfoto AS linkfoto "
        . "FROM(SELECT amigos.nomeamigo AS nomeamigo FROM amigos, usuarios WHERE usuarios.nome = amigos.username AND usuarios.nome = '$nomeT') AS t1, "
        . "(SELECT amigos.nomeamigo AS nomeamigo FROM amigos, usuarios WHERE usuarios.nome = amigos.username AND usuarios.nome = '$nome') AS t2, perfil "
        . "WHERE t1.nomeamigo = t2.nomeamigo AND t1.nomeamigo = perfil.nome";
$q = mysql_query($sql);

echo "<div id=\"amigoscomum\"><table align=\"left\" width=\"20%\" border=\"0\"><tr>";
while ($linha = mysql_fetch_array($q)) {
    $nomeamigo = $linha['nomeamigo'];
    $foto = $linha['linkfoto'];
    include '../view/viewmostraAmigos.php';
}
echo "</tr></table></div>";