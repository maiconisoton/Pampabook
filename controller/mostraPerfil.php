<?php

/* Essa classe mostra o perfil do usuário na sessão */

include_once 'seguranca.php';
include_once '../model/banco.php';

class mostraPerfil {

    public $perfil;
    public $user;
    public $q;
    public $nome;

    public function __construct() {
        $this->perfil = new Banco();
        $this->buscaPerfil();
    }

    public function buscaPerfil() {
        $user = $_SESSION['usuarioLogin'];
        $q = $this->perfil->selecionaPerfil($user);
        $foto = $q['linkfoto'];
        $nome = $q['nome'];
        $mensagem = $q['mensagem'];
        $data_nasc = $q['data_nasc'];
        $genero = $q['genero'];
        $email = $q['email'];
        $local = $q['local'];
        $sobre = $q['sobre'];
        $civil = $q['civil'];
        $idade = calc_idade($data_nasc);
        include '../view/viewmostraPerfil.php';
    }

}

function calc_idade($data_nasc) {
    if (!empty($data_nasc)) {
        $data_nasc = explode("/", $data_nasc);
        $data = date("d/m/Y");
        $data = explode("/", $data);
        @$anos = $data[2] - $data_nasc[2];
        if (@$data_nasc[1] >= $data[1]) {
            if ($data_nasc[0] <= $data[0]) {
                return $anos;
            } else {
                return $anos - 1;
            }
        } else {
            return $anos;
        }
    }
}

new mostraPerfil();



