<?php include 'includes/funcions/login.php'; ?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sistema de Gestão Financeira</title>
  <link rel="stylesheet" href="./includes/css/style.css">
  <link rel="icon" href="assets/img/icon-financeiro.png">
</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">
  <div class="box"></div>
  <div class="container-forms">
    <div class="container-info">
        
        <div class="info-item">
          <div class="table">
            <div class="table-cell">
              <p>
                Já possui uma conta?
              </p>
              <div class="btn">
                Entrar
              </div>
            </div>
          </div>
        </div>

        <div class="info-item">
          <div class="table">
            <div class="table-cell">
              <p>
                Você não tem uma conta?
              </p>
              <div class="btn">
                Cadastrar
              </div>
            </div>
          </div>
        </div>
        
    </div>
      
    <div class="container-form">
      <div class="form-item log-in">
        <div class="table">
           
	  <div class="table-cell">

            <div class="info-item">
                <div class="table">
                    <div class="table-cell" style="text-align: center;">
                        <img src="assets/img/icon-financeiro.png" width="80" title="Sistema de Gestão Financeira">
                    </div>
                </div>
            </div>
            <br>
              
            <form method="POST">
                <input name="Username" placeholder="Nome" type="text" required/>
                <input name="Password" placeholder="Senha" type="Password" required/>
                <input class="btn" type="submit" value="Entrar">
            </form>

          </div>
        </div>
      </div>
        
      <div class="form-item sign-up">
        <div class="table">
	  <div class="table-cell">
              
                <div class="info-item">
                  <div class="table">
                      <div class="table-cell" style="text-align: center;">
                          <img src="assets/img/cadastro.png" width="50" title="Cadastro usuário">
                      </div>
                  </div>
                </div>

                <form method="POST" action="./assets/php/cadastrarUsuarios.php">
                    <input name="email" placeholder="Email" type="text" required/>
                    <input name="nome" placeholder="Nome" type="text" required/>          
                    <input name="sobre" placeholder="Sobrenome" type="text" required/>
                    <input name="Username" placeholder="Nome de usuário" type="text" required/>
                    <input name="Password" placeholder="Senha" type="Password" required/>
                    <input class="btn2" type="submit" value=" Cadastrar">
                </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--<a class="box-item" href="https://www.instagram.com/gabrielalves.code/" target="_blank"><img src="./assets/img/Logo/logo1.png" class="rabbit"> </a>-->
<!-- partial -->
  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script><script  src="./includes/js/script.js"></script>

</body>
</html>
