<?php

/* Essa classe prepara as variavesi para a inserção da mensagem no banco
 * de dados na tabela mensagem. */

require_once 'banco.php';

class Mensagem {

    public $banco;
    private $de;
    private $para;
    private $mensagem;

    public function __construct() {
        $this->banco = new Banco();
    }

    public function setDe($string) {
        $this->de = $string;
    }

    public function setPara($string) {
        $this->para = $string;
    }

    public function setMensagem($string) {
        $this->mensagem = $string;
    }

    public function getDe() {
        return $this->de;
    }

    public function getPara() {
        return $this->para;
    }

    public function getMensagem() {
        return $this->mensagem;
    }

    public function incluir() {
        $this->banco->tabela = "mensagem";
        $this->banco->campos = array("de", "para", "mensagem");
        $this->banco->valores = array($this->getDe(), $this->getPara(), $this->getMensagem());
        $result = $this->banco->inserirRegistro();

        return $result;
    }

}
