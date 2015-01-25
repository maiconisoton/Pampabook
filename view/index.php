<?php
/* Esse arquivo esta protegido pela classe protegePagina() e nele é chamado 
 * o cabeçalho, o mostra amigos que lista meus amigos adicionados e o 
 * mostra post que mostra todos os post no pampabook. */

include '../controller/seguranca.php'; // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
require_once 'header.php';
?> 
<br/><br/>   
<?php
include '../controller/mostraamigos.php';
include '../controller/mostraindex.php';

require_once 'footer.php';
