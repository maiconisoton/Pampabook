<?php

/* Essa classe mostra as mensagems privadas recebidas pelo usuarios logado. */

include_once '../model/banco.php';

class MostraMensagem {

    public $Mensagem;
    public $nome;
    public $q;

    public function __construct() {
        $this->Mensagem = new Banco();
        $this->buscaMensagem();
    }

    public function buscaMensagem() {
        $nome = $_SESSION['usuarioNome'];
        $q = $this->Mensagem->selecionaMensagem($nome);
        while ($linha = mysql_fetch_array($q)) {
            $de = $linha['de'];
            $mensagem = MontarLink($linha['mensagem']);
            $teste = explode("script", $mensagem);
            if(count($teste)>1){
                $mensagem = htmlspecialchars($mensagem, ENT_QUOTES);
            }else{
                //Transforma em link
                $exp = '/^(https?:\/\/)?(www\.)?([a-zA-Z0-9_\-]+)+\.([a-zA-Z]{2,4})(?:\.([a-zA-Z]{2,4}))?\/?(.*)$/';
                if (preg_match($exp, $mensagem, $result)) {
                    preg_match($exp, $mensagem, $result);
                    if (!explode("http", $result[0])) {
                        $mensagem = "<a href=\"" . $result[0] . "\">" . $result[0] . "</a>";
                    } else {
                        $mensagem = "<a href=\"http://" . $result[0] . "\">" . $result[0] . "</a>";
                    }
                }
            }
            echo "<b>$de: </b>$mensagem <br/><hr>";
        }
    }

}

new MostraMensagem();

function MontarLink($texto) {
    if (!is_string($texto))
        return false;
    $er = "/http:\/\/(www\.|.*?\/)?(www\.)?([a-zA-Z0-9]+|_|-)+(\.(([0-9a-zA-Z]|-|_|\/|\?|=|&)+))+/i";
    preg_match_all($er, $texto, $match);
    foreach ($match[0] as $link) {
        $link = strtolower($link);
        if (strstr($link, "http://") === false)
            $link = "http://" . $link;
        //troca "&" por "&", tornando o link válido pela W3C
        $web_link = str_replace("&", "&", $link);
        $texto = str_ireplace($link, "<a href=\"" . $web_link . "\" target=\"_blank\">" . $web_link . "</a>", $texto);
    }
    return $texto;
}
