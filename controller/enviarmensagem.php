<?php

/* Essa clare recebe a mensagem para incluir no BD */
require_once("../model/mensagem.php");

class enviarMensagem {

    private $SMS;

    public function __construct() {
        $this->SMS = new Mensagem();

        $acao = $_POST['acao'];
        if ($acao == "incluir") {
            $this->incluir();
        }
    }

    private function incluir() {
        $para = $_POST['para'];
        $de = trim($_POST['de']);
        $mensagem = $_POST['mensagem'];

        if ($para == '0') {
            echo "<script>alert('Esqueceu de Selecionar um Amigo!');history.back()</script>";
        }
        if (empty($mensagem)) {
            echo "<script>alert('Equeceu a Mensagem!');history.back()</script>";
        }
        $this->SMS->setDe($de);
        $this->SMS->setPara($para);
        $this->SMS->setMensagem($mensagem);
        $result = $this->SMS->incluir();
        if ($result >= 1) {
            echo "<script>alert('Mensagem Enviada!');document.location='../view/batepapo.php'</script>";
        } else {
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }

}

new enviarMensagem();
