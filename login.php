	<?php
	session_start();
	error_reporting(0);
	if(isset($_GET['user']) && isset($_GET['pass'])){

		require("admin/config.php");

		$sql = "SELECT `id`,`usuario`,`senha` FROM `user` WHERE usuario = '".$_GET['user']."' AND senha = '".$_GET['pass']."'";

		$query = mysqli_query($conexao, $sql);

		if(mysqli_num_rows($query) > 0){
			$_SESSION['user'] = $_GET['user'];
			header('location:index.php');

		}else{
			$_SESSION['msg'] = "<div id='alert' class='alert alert-danger'>Usuário e/ou Senha incorretos!</div>";
		}
	}
 if(isset($_GET['cadastrar'])){
		header('location:cadastrarUser.php');}
	?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="admin/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="admin/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$( "#alert" ).fadeOut(3000);
		});
	</script>
	<style>
		#form { width:400px; height: 500px }
	</style>
</head> 
<body>
	<div class="row" style="height: 100px">	
		<div class="col-md-12 text-center">	
			<label class="text-center" style="margin-top: 20px">
				<?php echo $_SESSION['msg'];?>
			</label>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
		<form method="get" id="form">
		  <fieldset>
		  <div class="form-group">
		   	<legend>Login</legend>
		  	<label for="email">Usuário</label>
		    <input type="text" class="form-control" id="email" name="user">
		  </div>
		  <div class="form-group">
		    <label for="pwd">Senha:</label>
		    <input type="password" class="form-control" id="pwd" name="pass">
		  </div>
		  <button type="submit" class="btn btn-primary form-control">Entrar</button><br>
		  </form>
		  <form method="get">
		  	<br><a href="cadastrarUser.php"><button name="cadastrar" type="submit" class="btn btn-primary form-control">Cadastrar</button></a>
		  </form>
		  </fieldset>

		</div>
		<div class="col-md-4"></div>
	</div>
	
</body>
</html>