<?php

/* Essa classe prepara os dados do post para serem inseridos no banco
 * de dados na tabela post.  */

require_once 'banco.php';

class Post {

    public $banco;
    public $nome;
    public $post;

    public function __construct() {
        $this->banco = new Banco();
    }

    public function setNome($string) {
        $this->nome = $string;
    }

    public function setPost($string) {
        $this->post = $string;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getPost() {
        return $this->post;
    }

    public function incluir() {
        $this->banco->tabela = "post";
        $this->banco->campos = array("nome", "post");
        $this->banco->valores = array($this->getNome(), $this->getPost());
        $result = $this->banco->inserirRegistro();

        return $result;
    }

}
