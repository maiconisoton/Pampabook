<?php

/* Esta classe recebe informações do formulário e adiciona como amigo o 
 * usuário visitado */
require_once("../model/amigos.php");

class AddAmigo {

    private $amigos;

    public function __construct() {
        $this->amigos = new Amigos();

        $acao = $_POST['acao'];
        if ($acao == "incluir") {
            $this->incluir();
        }
    }

    private function incluir() {
        $nomeAmigo = $_POST['nomeAmigo'];
        $nomeUser = $_POST['nomeUser'];

        $this->amigos->setNomeAmigo($nomeAmigo);
        $this->amigos->setNomeUser($nomeUser);

        $result = $this->amigos->incluir();
        if ($result >= 1) {
            echo "<script>alert('Amigo Adicionado!');document.location='../view/index.php'</script>";
        } else {
            echo "<script>alert('Erro ao Adicionar Amigo!');history.back()</script>";
        }
    }

}

new AddAmigo();
