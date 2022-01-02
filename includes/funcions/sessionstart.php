<?php 
session_start();
$idIsNotSet = (empty($_SESSION['id']) || !isset($_SESSION['id']));
$userIsNotLogged = (empty($_SESSION['logado']) || !isset($_SESSION['logado']));
 
if($idIsNotSet && $userIsNotLogged)
{
    echo "Você precisa estar logado para acessar esta página!<br>";
    echo "<a href='index.php'>Voltar</a>";
    exit;
}
else
{
    $USER   =   $_SESSION['usuario'];
    $FOTO   =   $_SESSION['fotoPerfil'];
    $EMAIL  =   $_SESSION['email'];
    $ID     =   $_SESSION['id'];
    $NOME   =   $_SESSION['nome'];
    $SOBRE  =   $_SESSION['sobrenome']; 
    $PATH   =   "";
?>
<?php
}
?>
