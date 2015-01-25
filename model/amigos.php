<?php

/* Essa classe seta as variaveis necessarias para a incersão no BD tabela
 * amigos. */

require_once 'banco.php';

class Amigos {

    public $banco;
    public $nomeAmigo;
    public $nomeUser;

    public function __construct() {
        $this->banco = new Banco();
    }

    public function setNomeAmigo($string) {
        $this->nomeAmigo = $string;
    }

    public function setNomeUser($string) {
        $this->nomeUser = $string;
    }

    public function getNomeAmigo() {
        return $this->nomeAmigo;
    }

    public function getNomeUser() {
        return $this->nomeUser;
    }

    public function incluir() {
        $this->banco->tabela = "amigos";
        $this->banco->campos = array("username", "nomeamigo");
        $this->banco->valores = array($this->getNomeUser(), $this->getNomeAmigo());

        $result = $this->banco->inserirRegistro();

        return $result;
    }

}
