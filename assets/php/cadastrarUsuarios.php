<?php
require('connect.php');  

if(!empty($_POST['Username']) && isset($_POST['Username']))
{
    $sql = "SELECT usuario FROM usuarios_tb WHERE usuario='".$_POST['Username']."'";
    $sql = $pdo->query($sql) or die('Erro na query verificação de usuário!');

    if($sql->rowCount() > 0)
    {
        echo "Usuário já cadastrado!";
        echo "<a href='../../index.php'>Voltar</a>";
        exit();
    }

    $USUARIO    = $_POST['Username'];
    $SENHA      = md5($_POST['Password']);
    $EMAIL      = $_POST['email'];
    $NOME       = $_POST['nome'];
    $SOBRE      = $_POST['sobre'];

    $sql = "INSERT INTO usuarios_tb (usuario,senha,email,nome,sobrenome) VALUES('$USUARIO','$SENHA','$EMAIL','$NOME','$SOBRE')";
    $sql = $pdo->prepare($sql) ;
    $sql->execute(array($USUARIO,$SENHA,$EMAIL,$NOME,$SOBRE))
    or die('Erro ao cadastrar usuário. Contate o administrador da página');

    echo "<h2>Cadastro enviado com sucesso para a base de dados, aguarde aprovação</h2>";
    echo "<a href='../../index.php'>Voltar</a>";

}
else
{
    header('Location: ../../index.php');
    exit();
}
?>
