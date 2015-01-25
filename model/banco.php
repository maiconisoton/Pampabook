<?php

/* Essa classe realiza as conexões com o banco de dados, assim como
 * monta as querys e as executa para a inserção e seleção de diversos outras
 * classes. */

class Banco {

    private $sql;
    private $query;
    private $result;
    private $host;
    private $usuario;
    private $senha;
    private $banco;
    public $tabela;
    public $campos; // array
    public $valores; // array
    private $camposQuery = null;
    private $valoresQuery = null;

    public function __construct() {
        $this->conexao();
    }

    /* Realzia a conexão com o banco de dados. */

    private function conexao() {
        require 'bdinfo.php';
        $this->host = $dbhost;
        $this->usuario = $dbuname;
        $this->senha = $dbpass;
        $this->banco = $dbname;

        $db = mysql_connect($this->host, $this->usuario, $this->senha);
        mysql_select_db($this->banco, $db);
    }

    /* monta a tabela da query. */

    private function montaQuery($tipo) {
        if ($tipo == 1) {
            $this->camposQuery = '`' . implode('`, `', array_values($this->campos)) . '`';
            $this->valoresQuery = "'" . implode("', '", array_values($this->valores)) . "'";
        }
    }

    /* Inseri os registros no banco de dados recebendo a query montada. */

    public function inserirRegistro() {
        $this->montaQuery(1);
        $this->sql = "INSERT INTO " . $this->tabela . " (" . $this->camposQuery . ") VALUES (" . $this->valoresQuery . ")";
        $this->query = mysql_query($this->sql);
        $this->result = mysql_affected_rows();

        return $this->result;
    }

    /* Verifica se o usuário esta cadastrado no sistema. */

    public function verificaUsername($username) {
        $this->sql = "SELECT * FROM perfil WHERE username LIKE '%" . $username . "%'";
        $this->query = mysql_query($this->sql);
        $this->result = mysql_affected_rows();

        return $this->result;
    }

    /* Retorna o perfil do usuario. */

    public function selecionaPerfil($username) {
        $this->sql = "SELECT * FROM perfil WHERE username LIKE '%" . $username . "%'";
        $this->query = mysql_query($this->sql);
        $ret = mysql_fetch_array($this->query, MYSQL_ASSOC);

        return $ret;
    }

    /* Retorna o perfil do usuário visitado. */

    public function selecionaPerfilVisitante($username) {
        $this->sql = "SELECT * FROM perfil WHERE nome LIKE '%" . $username . "'";
        $this->query = mysql_query($this->sql);
        $ret = mysql_fetch_array($this->query, MYSQL_ASSOC);

        return $ret;
    }

    /* Retorna os posts que o usuário logado fez. */

    public function selecionaPost($nome) {
        $this->sql = "SELECT * FROM post WHERE nome LIKE '%" . $nome . "%'";
        $this->query = mysql_query($this->sql);

        return $this->query;
    }

    /* Retorna todosos posts de todos usuarios para o index. */

    public function selecionaPostIndex($table) {
        $this->sql = "SELECT * FROM $table";
        $this->query = mysql_query($this->sql);

        return $this->query;
    }

    /* Retorna o perfil buscado pelo usuário. */

    public function buscaPerfil($nome) {
        $this->sql = "SELECT * FROM perfil WHERE nome LIKE '%" . $nome . "%'";
        $this->query = mysql_query($this->sql);

        return $this->query;
    }

    /* Retorna a lista de amigos do usuário logado e a foto de seus amigos. */

    public function selecionaAmigos($nome) {
        $this->sql = "
                    SELECT amigos.*, perfil.nome, perfil.linkfoto
                    FROM amigos
                    INNER JOIN perfil
                    ON amigos.nomeamigo = perfil.nome
                    WHERE amigos.username LIKE  '%" . $nome . "%'
                    ORDER BY amigos.nomeamigo";
        $this->query = mysql_query($this->sql);

        return $this->query;
    }

    /* Seleciona as mensagens privadas do usuario logado. */

    public function selecionaMensagem($nome) {
        $this->sql = "SELECT * FROM mensagem WHERE para LIKE '%" . $nome . "%'";
        $this->query = mysql_query($this->sql);

        return $this->query;
    }

}