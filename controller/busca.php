<?php
/* Essa classe recebe o nome de um usuário e busca no banco de dados 
 * por ele retornando a fot e o nome dele como link para o perfil */
include_once '../model/banco.php';
include_once '../controller/seguranca.php';
include_once '../view/header.php';

class BuscaPerfil {

    public $busca;
    public $nome;
    public $q;

    public function __construct() {
        $this->busca = new Banco();
        $this->buscaP();
    }

    public function buscaP() {
        $user = $_POST['busca'];
        if (!empty($user)) {
            $q = $this->busca->buscaPerfil($user);
            echo "<div id=\"resultados\">"
            . "<center>Você esta procurando por <b>\"$user\"</b></center><br>"
            . "<table border=\"0px\" width=\"400px\">";
            while ($linha = mysql_fetch_array($q)) {
                $nome = $linha['nome'];
                $imagem = $linha['linkfoto'];
                include '../view/viewmostraBusca.php';
            }
            echo "</table></div>";
        } else {
            echo "<script>alert('Campo Vazio!');document.location='../view/index.php'</script>";
        }
    }

}

new BuscaPerfil();