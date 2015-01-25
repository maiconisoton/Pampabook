<?php

/* Essa classe seta as variaveis para a inserção no banco de dados do
 * cadastro de novos usuários. Preenche a tabela usuarios e parcialmente
 * a tabela perfil. */

require_once 'banco.php';

class Cadastro {

    public $banco;
    private $nome;
    private $login;
    private $senha;
    private $senha2;
    private $genero;

    public function __construct() {
        $this->banco = new Banco();
    }

    public function setNome($string) {
        $this->nome = $string;
    }

    public function setLogin($string) {
        $this->login = $string;
    }

    public function setSenha($string) {
        $this->senha = $string;
    }

    public function setSenha2($string) {
        $this->senha2 = $string;
    }

    public function setGenero($string) {
        $this->genero = $string;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getSenha2() {
        return $this->senha2;
    }

    public function getGenero() {
        return $this->genero;
    }

    public function incluir() {
        $this->banco->tabela = "usuarios";
        $this->banco->campos = array("nome", "usuario", "senha");
        $this->banco->valores = array($this->getNome(), $this->getLogin(), $this->getSenha());
        $result = $this->banco->inserirRegistro();

        return $result;
    }

    public function incluir2() {
        $this->banco->tabela = "perfil";
        $this->banco->campos = array("linkfoto", "nome", "username", "genero");
        $this->banco->valores = array('http://maiconcc.com/Projeto/img/no-photo.jpg', $this->getNome(), $this->getLogin(), $this->getGenero());
        $result = $this->banco->inserirRegistro();

        return $result;
    }

}
