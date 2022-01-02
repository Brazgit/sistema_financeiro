<?php
require('connect.php');
$id = $_SESSION['id'];

$sql = "UPDATE usuarios_tb set fotoPerfil = 'bobo.jpg' WHERE id ='$id'";
$sql = $pdo->query($sql) or die();

$_SESSION['fotoPerfil'] = 'bobo.jpg';

header("Location: /project-256/perfil.php");