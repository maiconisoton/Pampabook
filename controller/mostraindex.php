<?php

/* Essa classe busca os posts de todos usuariso e mostra na pagina inicial. */

include_once '../model/banco.php';

class MostraPostIndex {

    public $posts;
    public $nome;
    public $q;

    public function __construct() {
        $this->posts = new Banco();
        $this->buscaPostIndex();
    }

    public function buscaPostIndex() {
        $user = $_SESSION['usuarioNome'];
        $table = "post";
        $q = $this->posts->selecionaPostIndex($table);
        echo "<div id=\"postPerfilIndex\">"
        . "<img src=\"../img/rolando.png\" />";
        while ($linha = mysql_fetch_array($q)) {
            $nome = $linha['nome'];
            $post = $linha['post'];
            $id_post = $linha['id_post'];
            $teste = explode("script", $post);
            if(count($teste)>1){
                $post = htmlspecialchars($post, ENT_QUOTES);
            }else{
                $post = MontarLink($post);
                //Transforma em link
                $exp = '/^(https?:\/\/)?(www\.)?([a-zA-Z0-9_\-]+)+\.([a-zA-Z]{2,4})(?:\.([a-zA-Z]{2,4}))?\/?(.*)$/';
                if (preg_match($exp, $post, $result)) {
                    preg_match($exp, $post, $result);
                    if (!explode("http", $result[0])) {
                        echo "POISd" . $result[0];
                        $post = "<a href=\"" . $result[0] . "\">" . $result[0] . "</a>";
                    } else {
                        $post = "<a href=\"http://" . $result[0] . "\">" . $result[0] . "</a>";
                    }
                }
            }
            include '../view/viewmostraPostIndex.php';
        }
        echo "</div>";
    }

}

new MostraPostIndex();

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