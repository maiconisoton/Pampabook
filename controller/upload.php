<?php

/* Esse arquivo faz a atualização do perfil com upload da foto e verificação
 * de datas entre outros partes. */

include 'seguranca.php';
$user = $_SESSION['usuarioLogin'];

//recebe a imagem
$dir = "../user_img/";
$ext = array("jpg");
$campos = 1;
//Obtendo info. dos arquivos
$f_name = $_FILES['file']['name'];
$f_tmp = $_FILES['file']['tmp_name'];
$f_type = $_FILES['file']['type'];
$name = $f_name[0];
if (($name != "") and (is_file($f_tmp[0])) and (in_array(substr($name, -3), $ext))) {
    $nomei = $user . "-perfil.jpg";
    $up = move_uploaded_file($f_tmp[0], $dir . $nomei);
    $caminho = "/user_img/$nomei";
    $linkfoto = "http://maiconcc.com/Projeto$caminho";
}
//recebe o resto dos dados se preenchidos
$nome2 = $_POST['nome'];
$mensagem = $_POST['mensagem'];
$datan = ValidaData($_POST['datanas']);
$email = $_POST['email'];
$local = $_POST['local'];
$sobre = $_POST['sobre'];
$civil = $_POST['civil'];
if (!empty($_POST['semfoto'])) {
    $linkfoto = $_POST['semfoto'];
}
if (empty($linkfoto)) {
    mysql_query("UPDATE perfil SET 
                    nome='$nome2',
                    mensagem='$mensagem',
                    data_nasc='$datan',
                    local='$local',
                    email='$email',
                    sobre='$sobre',
                    civil='$civil'
             WHERE username LIKE '$user'") or die(mysql_error());
    header("location: ../view/perfil.php");
    exit;
} else {
    mysql_query("UPDATE perfil SET 
                    nome='$nome2',
                    mensagem='$mensagem',
                    linkfoto='$linkfoto',
                    data_nasc='$datan',
                    local='$local',
                    email='$email',
                    sobre='$sobre',
                    civil='$civil'              
             WHERE username LIKE '$user'") or die(mysql_error());
    header("location: ../view/perfil.php");
    exit;
}

function ValidaData($dat) {
    if (!empty($dat)) {
        if (strlen($dat) < 10) {
            echo "<script>alert('Data de Nascimento Incorreta!');document.location='../view/perfil.php'</script>";
            exit();
        }
        $data = explode("/", "$dat"); // fatia a string $dat em pedados, usando / como referência
        $d = $data[0];
        $m = $data[1];
        $y = $data[2];
        $res = checkdate($m, $d, $y);
        if ($res == 1) {
            return $dat;
        } else {
            echo "<script>alert('Data de Nascimento Incorreta!');document.location='../view/perfil.php'</script>";
        }
    }
}
