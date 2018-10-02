<?php
include('admin/config.php');
$nomeuser = $_GET['user'];
$emailuser = $_GET['email'];
if (isset($_GET['user']) && isset($_GET['email']) && isset($_GET['pass'])) {
     $extensao = strtolower(substr($_FILES['arquivo']['name'],-4));
     $nome = md5(time()).$extensao;
     $dir = "admin/dist/img/";

     move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$nome);

    $sqlCadastro = "INSERT INTO user(id,usuario,email,senha,img) VALUES(DEFAULT,'".$_GET['user']."','".$_GET['email']."','".$_GET['pass']."','".$nome.'.jpg'."')";
    $queryCadastro = mysqli_query($conexao,$sqlCadastro);
    if ($queryCadastro) {
             echo "<script>alert('Cadastrada!!')</script>";
             // emails para quem será enviado o formulário
  $emailenviar = $emailuser;
  $destino = $emailenviar;
  $assunto = "Seu email está sendo usado para cadastrar em nosso site";
 
      $headers  = 'MIME-Version: 1.0'."\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
      $headers .= 'From: $nomeuser <$emailuser>';
  //$headers .= "Bcc: $EmailPadrao\r\n";
   
  $enviaremail = @mail($destino, $assunto, $headers);
  if($enviaremail){
   echo "Mensagem enviada! <br> O link será enviado para o e-mail fornecido no formulário";
  } else {
  echo "ERRO AO ENVIAR E-MAIL!";
  }
            } else {
              echo "<script>alert('Erro!!')</script>";
            }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Cadastro</title>
	<link rel="stylesheet" type="text/css" href="admin/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="admin/bootstrap.min.js"></script>
	<style>
		#form { width:400px; height: 500px }
	</style>
</head> 
<body>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
		<form method="get" enctype="multipart/form-data">
		  <fieldset>
		  <div class="form-group">
		   	<legend>Cadastro</legend>
		  <div class="form-group">
		    <label for="pwd">Usuario</label>
		    <input type="text" class="form-control" id="pwd" name="user">
		  </div>
		  <div class="form-group">
		    <label for="pwd">Email Valido</label>
		    <input type="text" class="form-control" id="pwd" name="email">
		  </div>
		  <div class="form-group">
		    <label for="pwd">Senha</label>
		    <input type="password" class="form-control" id="pwd" name="pass">
		  </div>
		  <label>Foto</label>
            <input type="file" name="arquivo" class="form-control-file" id="exampleFormControlFile1">
          </div><br>
		  <button type="submit" class="btn btn-primary form-control">Cadastrar</button><br>
		  </form>
		  </fieldset>

		</div>
		<div class="col-md-4"></div>
	</div>
	
</body>
</html>