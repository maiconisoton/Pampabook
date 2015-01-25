<?php

/* Essa classe realiza o cadastro de novos usuarios populando 
 * duas tabelas do banco de dados */
require_once("../model/cadastro.php");

class CadastroController {

    private $cadastro;

    public function __construct() {
        $this->cadastro = new Cadastro();

        $acao = $_POST['acao'];
        if ($acao == "incluir") {
            $this->incluir();
        }
    }

    private function incluir() {
        $login = $_POST['login'];
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        $senha2 = $_POST['senha2'];
        $genero = $_POST['genero'];
        $errors = 0;
        //verifica se existe o username no banco
        $user = $this->cadastro->banco->verificaUsername($_POST['login']);
        if ($user >= 1) {
            echo "<script>alert('Username Existente!');document.location='../view/login.php'</script>";
            exit();
        }
        if ($login == "") {
            $errors++;
            echo "<script>alert('Voce nao digitou um login');document.location='../view/login.php'</script>";
        }

        if ($senha == "") {
            $errors++;
            echo "<script>alert('Voce nao digitou uma senha');document.location='../view/login.php'</script>";
        }

        if ($senha != $senha2) {
            $errors++;
            echo "<script>alert('Voce digitou 2 senhas diferentes');document.location='../view/login.php'</script>";
        }

        $this->cadastro->setNome($nome);
        $this->cadastro->setLogin($login);
        $this->cadastro->setSenha(md5("pampabook" . $senha));
        $this->cadastro->setSenha2(md5("pampabook" . $senha2));
        $this->cadastro->setGenero($genero);

        if ($errors == 0) { //checa se houve ou não erros no cadastro
            //insere os dados iniciais nas duas tabelas do banco
            $result2 = $this->cadastro->incluir2();
            $result = $this->cadastro->incluir();
            if (($result >= 1) && ($result2 >= 1)) {
                echo "<script>alert('Registro incluido com sucesso!');document.location='../view/login.php'</script>";
            } else {
                echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
            }
        }
    }

}

new CadastroController();
