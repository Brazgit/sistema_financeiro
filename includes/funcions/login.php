<?php
require('assets/php/connect.php');

$userIsSet      = (!empty($_POST['Username']) && isset($_POST['Username']));
$passwdIsSet    = (!empty($_POST['Password']) && isset($_POST['Password']));

if($userIsSet && $passwdIsSet)
{
    $USUARIO    = $_POST['Username'];
    $SENHA      = md5($_POST['Password']);

$sql = "SELECT * FROM usuarios_tb WHERE usuario='".$USUARIO."' AND senha='".$SENHA."'";
$sql = $pdo->query($sql) or die('Erro na query de index.php');

if($sql->rowCount() == 1)
{

session_start();

foreach($sql->fetchAll() as $p)
{
    $_SESSION['usuario']    = $p['usuario'];
    $_SESSION['fotoPerfil'] = $p['fotoPerfil'];
    $_SESSION['email']      = $p['email'];
    $_SESSION['id']         = $p['id'];
    $_SESSION['nome']       = $p['nome'];
    $_SESSION['senha']      = $p['senha'];
    $_SESSION['sobrenome']  = $p['sobrenome'];
}
    header('Location: Page.php');
}
else
{
    echo "erro";
    exit();
}

}
?>