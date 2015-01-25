<!-- Esse arquivos contem o cadastro de um novo usuário, é o formulário
necessário para enviar as informaçoes pro cadastraController. -->

<form name="cadastrar" method="post" action="../controller/cadastraController.php">
    <input type="hidden" name="acao" value="incluir">
    <table width="400" border="0">
        <tr> 
            <td align="right"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Nome:</font></td>
            <td align="left"><input name="nome" type="text" id="nome" maxlength="75" size="13"></td>
        </tr>
        <tr> 
            <td align="right"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Login:</font></td>
            <td align="left"><input name="login" type="text" id="login" maxlength="30" size="13"></td>
        </tr>
        <tr> 
            <td align="right"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Senha:</font></td>
            <td align="left"><input name="senha" type="password" id="senha" maxlength="30" size="13"></td>
        </tr>
        <tr> 
            <td align="right"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Repetir Senha:</font></td>
            <td align="left"><input name="senha2" type="password" id="senha2" maxlength="30" size="13"></td>
        </tr>
        <tr>
            <td align="right">Gênro:</td>
            <td align="left">
                <input type="radio" name="genero" value="Masculino" />Masculino
                <input type="radio" name="genero" value="Feminino" />Feminino
            </td>
        </tr>
        <tr> 
            <td colspan="2">
                <div align="center"> 
                    <input name="cadastrar" type="submit" value="   Enviar Cadastro   ">
                </div>
            </td>
        </tr>
    </table>
</form>

