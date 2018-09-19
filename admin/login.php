<!-- REQUIRE(), SESSION_START() E ERROR_REPORTING(0) -->
<?php
    error_reporting(0);
    require('config.php');
    session_start();
?>
<!-- /REQUIRE() E SESSION_START() -->
<?php
    if (isset($_POST['usuario']) && isset($_POST['senha'])) {

        $sql_verificar_login_usuario = "SELECT * FROM users_admin WHERE usuario = '".$_POST['usuario']."' and senha = '".$_POST['senha']."'";
        $query_verificar_login_usuario = mysqli_query($conexao, $sql_verificar_login_usuario);

        if (mysqli_num_rows($query_verificar_login_usuario) > 0) {
            
            $_SESSION['user'] = $_POST['usuario'];
            header('location: index2.php');

        } else {

            echo "<script>
                    function ErroLogin(){

                        document.getElementById('alerta').className = 'form-control alert alert-danger';
                        document.getElementById('alerta').innerHTML = 'Usuário ou senha incorreto!';
                        
                    }
                </script>";
            
        }

    }
?>
<!-- /VERIFICAR LOGIN -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous"> 
    <!-- OCULTAR/MOSTRA SENHA -->
    <script>
        function VeSenha() {
            
            var pass = document.getElementById('senha');

            if (pass.type == "password") {
                
                pass.type = "text";
                document.getElementById('eye').className = 'far fa-eye-slash';

            } else {

                pass.type = "password";
                document.getElementById('eye').className = 'far fa-eye';

            }

        }
    </script>
    <!-- /OCULTAR/MOSTRA SENHA -->
</head>
<body class="container-fluid" onload="ErroLogin()">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form method="post">
                <div class="form-group">
                    <label for="usuario">User</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="User" required>
                </div>
                <div class="form-group">
                    <label for="senha">Password</label>
                    <div class="input-group mb-2">
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Password" required>
                        <div class="input-group-text"><a onclick="VeSenha()"><i id="eye" class='far fa-eye'></i></a></div>
                    </div>
                </div>
                <div class="form-group">
                    <p class="form_control" id="alerta"></p>
                </div>
                <input class="btn btn-success" type="submit" value="Entrar">
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</body>
</html>