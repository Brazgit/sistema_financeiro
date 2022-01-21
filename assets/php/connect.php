<?php

//variaveis de  conexão adicionadas
$host   = 'localhost';
$db     = 'site';	
$user   = 'root';
$pass   = '';

# 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

//////////// Conexão com banco de dados //////////////////
try{

        $pdo= new PDO("mysql:dbname=$db;host=$host",$user,$pass);

        //Configurar a conexão para utf8
        $pdo->query("SET NAMES 'utf8'");
        $pdo->query('SET character_set_connection=utf8');
        $pdo->query('SET character_set_client=utf8');
        $pdo->query('SET character_set_results=utf8');

}catch(PDOException $e){

        echo "ERRO: ".$e->getMessage();
        exit;

}catch(Exception $erro){
        return $erro->getMessage();
}

?>
