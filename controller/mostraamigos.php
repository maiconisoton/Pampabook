<?php

/* Essa classe busca amigos e retorna o nome do amigo com o link da foto do
 * perfil. */

include_once '../model/banco.php';

class MostraAmigos {

    public $amigos;
    public $nome;
    public $foto;
    public $q;

    public function __construct() {
        $this->amigos = new Banco();
        $this->buscaAmigos();
    }

    public function buscaAmigos() {
        $user = $_SESSION['usuarioNome'];
        $q = $this->amigos->selecionaAmigos($user);
        echo "<div id=\"meusamigos\""
        . "<font  style=\"text-align: center; font-size: 20px; font-family: sans-serif;\">Meus Amigos</font><br/>"
        . "</div><div id=\"amigos\">"
        . "<table align=\"left\" width=\"20%\" border=\"0\"><tr>";
        while ($linha = mysql_fetch_array($q)) {
            $nomeamigo = $linha['nomeamigo'];
            $foto = $linha['linkfoto'];
            include '../view/viewmostraAmigos.php';
        }
        echo "</tr></table></div>";
    }

}

new MostraAmigos();

/* Slect pararetornar os amigos e os links das foto na mesma consulta
SELECT amigos.*, perfil.nome, perfil.linkfoto
FROM amigos
INNER JOIN perfil
ON amigos.nomeamigo = perfil.nome
WHERE amigos.username LIKE '%Maicon Isoton%'
ORDER BY amigos.nomeamigo
 */
