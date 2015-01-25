<?php

/* Esse arquivo chama o arquivo de envio onde pega do banco de dados usuariso
 * e lista para selecionar qual usuario vai ser enviado a mensagem e chama 
 * outro arquivo que mostra as mensagens privadas. */

include '../controller/seguranca.php'; // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
require_once '../view/header.php';
echo "<div id=\"batepapo\">";
include '../controller/mensagembatepapo.php';
echo "<br/>";
include '../controller/mostramensagens.php';
echo "</div>";