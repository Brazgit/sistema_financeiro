<?php

require('connect.php');

#--------- PEGA A DATA E HORA ATUAL
date_default_timezone_set('America/Recife');
$dthr_atual = date("Y-m-d H:i:s");


if(!empty($_POST['Username']) && isset($_POST['Username']))
{
    $sql = "SELECT usuario FROM usuarios_tb WHERE usuario='".$_POST['Username']."'";
    $sql = $pdo->query($sql) or die('Erro na query verificação de usuário!');

    if($sql->rowCount() > 0)
    {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
      <meta charset="UTF-8" />
      <title>Acesso Negado!</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
      <link rel="icon" href="http://localhost/sistema_financeiro/assets/img/error.png">
      <style type='text/css'>

          /* CSS reset */
          *, *:before, *:after { 
            margin:0;
            padding:0;
            font-family: Arial,sans-serif;
          }

          a{
            text-decoration: none;
          }

          /* esconde as ancoras da tela */
          a.links{
            display: none;
          }

          /* content que contem os formulários */
          .content{
            width: 500px;
            margin: 0px auto;
            position: relative; 
          }

          /* formatando o cabeçalho dos formulários */ 
          h1{
            font-size: 48px;
            color: #f22112;
            padding: 10px 0;
            font-family: Arial,sans-serif;
            font-weight: bold;
            text-align: center;
            padding-bottom: 30px;
          }

          h1:after{
            content: ' ';
            display: block;
            width: 100%;
            height: 2px;
            margin-top: 10px;
            background: -webkit-linear-gradient(left, rgba(147,184,189,0) 0%,rgba(147,184,189,0.8) 20%,rgba(147,184,189,1) 53%,rgba(147,184,189,0.8) 79%,rgba(147,184,189,0) 100%); 
            background: linear-gradient(left, rgba(147,184,189,0) 0%,rgba(147,184,189,0.8) 20%,rgba(147,184,189,1) 53%,rgba(147,184,189,0.8) 79%,rgba(147,184,189,0) 100%); 
          }

          h5{
            font-size: 12px;
            color: #f22112;
            padding: 0px 0;
            font-family: Arial,sans-serif;
            font-weight: bold;
            text-align: center;
            padding-bottom: 30px;
          }

          h5:after{
            content: ' ';
            display: block;
            width: 100%;
            height: 2px;
            margin-top: 30px;
            background: -webkit-linear-gradient(left, rgba(147,184,189,0) 0%,rgba(147,184,189,0.8) 20%,rgba(147,184,189,1) 53%,rgba(147,184,189,0.8) 79%,rgba(147,184,189,0) 100%); 
            background: linear-gradient(left, rgba(147,184,189,0) 0%,rgba(147,184,189,0.8) 20%,rgba(147,184,189,1) 53%,rgba(147,184,189,0.8) 79%,rgba(147,184,189,0) 100%); 
          }

          /*estilo do botão submit */
          input[type="submit"]{
            width: 100%!important;
            cursor: pointer;  
            background: #3d9db3;
            padding: 8px 5px;
            color: #fff;
            font-size: 20px;  
            border: 1px solid #fff; 
            margin-bottom: 10px;  
            text-shadow: 0 1px 1px #333;

            -webkit-border-radius: 5px;
            border-radius: 5px;

            transition: all 0.2s linear;
          }
          input[type="submit"]:hover{
            background: #4ab3c6;
          }

          /*marcando os links para mudar de um formulário para outro */
          .link{
            position: absolute;
            background: #e1eaeb;
            color: #7f7c7c;
            left: 0px;
            height: 20px;
            width: 440px;
            padding: 17px 30px 20px 30px;
            font-size: 16px;
            text-align: center;
            border-top: 1px solid #dbe5e8;

            -webkit-border-radius: 0 0  5px 5px;
            border-radius: 0 0  5px 5px;
          }
          .link a {
            font-weight: bold;
            background: #f7f8f1;
            padding: 6px;
            color: rgb(29, 162, 193);
            margin-left: 10px;
            border: 1px solid #cbd518;

            -webkit-border-radius: 4px;
            border-radius: 4px;  

            -webkit-transition: all 0.4s linear;
            transition: all 0.4s  linear;
          }
          .link a:hover {
            color: #39bfd7;
            background: #f7f7f7;
            border: 1px solid #4ab3c6;
          }

          /* estilos para para ambos os formulários */
          #error, 
          #msgerror{
            position: absolute;
            top: 150px;
            width: 88%; 
            padding: 18px 6% 60px 6%;
            margin: 0 0 35px 0;
            background: rgb(247, 247, 247);
            border: 1px solid rgba(147, 184, 189,0.8);

            -webkit-box-shadow: 5px;
            border-radius: 5px;

            -webkit-animation-duration: 0.5s;
            -webkit-animation-timing-function: ease;
            -webkit-animation-fill-mode: both;

            animation-duration: 0.5s;
            animation-timing-function: ease;
            animation-fill-mode: both;
          }
          #error-alerta{
              text-align: center;
          }
      </style>
    </head>
    <body>
      <div class="container" >
        <div class="content">     
          <div id="error">
            <form method="post" action=""> 
                <h1><img src="http://localhost/sistema_financeiro/assets/img/error.png" width="35"> Atenção!</h1>
                <h5>Usuário já cadastrado no sistema!</h5>
              <p class="link"><a href="http://localhost/sistema_financeiro/index.php"> >>> Clique aqui para voltar <<< </a></p>
            </form>
          </div>
        </div>
      </div>
    </body>
    </html>
    <?php    
    exit();
    }

    $USUARIO    = $_POST['Username'];
    $SENHA      = md5($_POST['Password']);
    $EMAIL      = $_POST['email'];
    $NOME       = $_POST['nome'];
    $SOBRE      = $_POST['sobre'];
    $APROVACAO  = isset($_POST['aprovado']);

    $sql = "INSERT INTO usuarios_tb (usuario,senha,email,nome,sobrenome,dthr_cadastro) VALUES('$USUARIO','$SENHA','$EMAIL','$NOME','$SOBRE','$dthr_atual')";
    $sql = $pdo->prepare($sql) ;
    $sql->execute(array($USUARIO,$SENHA,$EMAIL,$NOME,$SOBRE))
    or die('Erro ao cadastrar usuário. Contate o administrador da página');
    ?>
    <!DOCTYPE html>
    <html>
    <head>
      <meta charset="UTF-8" />
      <title>Cadastro Realizado</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
      <link rel="icon" href="http://localhost/sistema_financeiro/assets/img/check-ok.png">
      <style type='text/css'>

          /* CSS reset */
          *, *:before, *:after { 
            margin:0;
            padding:0;
            font-family: Arial,sans-serif;
          }

          a{
            text-decoration: none;
          }

          /* esconde as ancoras da tela */
          a.links{
            display: none;
          }

          /* content que contem os formulários */
          .content{
            width: 500px;
            margin: 0px auto;
            position: relative; 
          }

          /* formatando o cabeçalho dos formulários */ 
          h1{
            font-size: 25px;
            color: #28a745;
            padding: 10px 0;
            font-family: Arial,sans-serif;
            font-weight: bold;
            text-align: center;
            padding-bottom: 30px;
          }

          h1:after{
            content: ' ';
            display: block;
            width: 100%;
            height: 2px;
            margin-top: 10px;
            background: -webkit-linear-gradient(left, rgba(147,184,189,0) 0%,rgba(147,184,189,0.8) 20%,rgba(147,184,189,1) 53%,rgba(147,184,189,0.8) 79%,rgba(147,184,189,0) 100%); 
            background: linear-gradient(left, rgba(147,184,189,0) 0%,rgba(147,184,189,0.8) 20%,rgba(147,184,189,1) 53%,rgba(147,184,189,0.8) 79%,rgba(147,184,189,0) 100%); 
          }

          h5{
            font-size: 12px;
            color: #333;
            padding: 0px 0;
            font-family: Arial,sans-serif;
            font-weight: bold;
            text-align: center;
            padding-bottom: 30px;
          }

          h5:after{
            content: ' ';
            display: block;
            width: 100%;
            height: 2px;
            margin-top: 30px;
            background: -webkit-linear-gradient(left, rgba(147,184,189,0) 0%,rgba(147,184,189,0.8) 20%,rgba(147,184,189,1) 53%,rgba(147,184,189,0.8) 79%,rgba(147,184,189,0) 100%); 
            background: linear-gradient(left, rgba(147,184,189,0) 0%,rgba(147,184,189,0.8) 20%,rgba(147,184,189,1) 53%,rgba(147,184,189,0.8) 79%,rgba(147,184,189,0) 100%); 
          }

          /*estilo do botão submit */
          input[type="submit"]{
            width: 100%!important;
            cursor: pointer;  
            background: #3d9db3;
            padding: 8px 5px;
            color: #fff;
            font-size: 20px;  
            border: 1px solid #fff; 
            margin-bottom: 10px;  
            text-shadow: 0 1px 1px #333;

            -webkit-border-radius: 5px;
            border-radius: 5px;

            transition: all 0.2s linear;
          }
          input[type="submit"]:hover{
            background: #4ab3c6;
          }

          /*marcando os links para mudar de um formulário para outro */
          .link{
            position: absolute;
            background: #e1eaeb;
            color: #7f7c7c;
            left: 0px;
            height: 20px;
            width: 440px;
            padding: 17px 30px 20px 30px;
            font-size: 16px;
            text-align: center;
            border-top: 1px solid #dbe5e8;

            -webkit-border-radius: 0 0  5px 5px;
            border-radius: 0 0  5px 5px;
          }
          .link a {
            font-weight: bold;
            background: #f7f8f1;
            padding: 6px;
            color: rgb(29, 162, 193);
            margin-left: 10px;
            border: 1px solid #cbd518;

            -webkit-border-radius: 4px;
            border-radius: 4px;  

            -webkit-transition: all 0.4s linear;
            transition: all 0.4s  linear;
          }
          .link a:hover {
            color: #39bfd7;
            background: #f7f7f7;
            border: 1px solid #4ab3c6;
          }

          /* estilos para para ambos os formulários */
          #error, 
          #msgerror{
            position: absolute;
            top: 150px;
            width: 88%; 
            padding: 18px 6% 60px 6%;
            margin: 0 0 35px 0;
            background: rgb(247, 247, 247);
            border: 1px solid rgba(147, 184, 189,0.8);

            -webkit-box-shadow: 5px;
            border-radius: 5px;

            -webkit-animation-duration: 0.5s;
            -webkit-animation-timing-function: ease;
            -webkit-animation-fill-mode: both;

            animation-duration: 0.5s;
            animation-timing-function: ease;
            animation-fill-mode: both;
          }
          #error-alerta{
              text-align: center;
          }


      </style>
    </head>
    <body>
      <div class="container" >
        <div class="content">     
          <div id="error">
            <form method="post" action=""> 
                <h1><img src="http://localhost/sistema_financeiro/assets/img/check-ok.png" width="35"> Cadastro realizado, com sucesso!</h1>
                <h5>Aguarde aprovação do administrador do sistema!</h5>
              <p class="link"><a href="http://localhost/sistema_financeiro/index.php"> >>> Clique aqui para voltar <<< </a></p>
            </form>
          </div>
        </div>
      </div>
    </body>
    </html>
    <?php
}
else
{
    header('Location: ../../index.php');
    exit();
}
?>
