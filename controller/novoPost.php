<?php

/* Essa classe insere o post no banco de dados. */

require_once("../model/post.php");

class novoPost {

    private $posts;

    public function __construct() {
        $this->posts = new Post();

        $acao = $_POST['acao'];
        if ($acao == "incluir") {
            $this->incluir();
        }
    }

    private function incluir() {
        $nome = $_POST['nome'];
        $post = $_POST['post'];

        if (!empty($post)) {
            if ($post != 'O que esta pensando...') {
                $this->posts->setNome($nome);
                $this->posts->setPost($post);
                $result = $this->posts->incluir();
                if ($result >= 1) {
                    header("Location: ../view/perfil.php");
                } else {
                    echo "<script>alert('Erro ao Publicar!');history.back()</script>";
                }
            } else {
                echo "<script>alert('Sem Mensagem!');document.location='../view/perfil.php'</script>";
            }
        } else {
            echo "<script>alert('Sem Mensagem!');document.location='../view/perfil.php'</script>";
        }
    }

}

new novoPost();
