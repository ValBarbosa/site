<?php
$sqlPe = "SELECT * FROM user WHERE usuario = '".$_SESSION['user']."'";
$queryPe = mysqli_query($conexao,$sqlPe);
while ($dadoU = mysqli_fetch_assoc($queryPe)) {
	$cpf = $dadoU['cpf'];
    $nome = $dadoU['usuario'];
    $email = $dadoU['email'];
    $senha = $dadoU['senha'];
}
if (isset($_GET['ed'])) {
	$cpfU = $_GET['cpf'];
	$nomeU = $_GET['nome'];
	$emailU = $_GET['email'];
	$senhaU = $_GET['senha'];
$sql_up = "UPDATE user SET usuario='$nomeU', email='$emailU', senha='$senhaU' WHERE cpf = '$cpfU'";
		$query_up = mysqli_query($conexao, $sql_up);
 		if ($query_up) {
 			echo "<script>
				alert('Atualizado com sucesso');
		    </script>";
		        
		}
	}
		?>

<form class="leave-comment" method="get">
	<div class="container">
		<div class="form-group">
		<label for="cpf">CPF</label>
		<div class="bo4">
	        <input class="form-control" disabled type="text" id="cpf" name="cpf" value="<?php echo $cpf; ?>" required>
	    </div>
	</div>
	<div class="form-group">
		<label for="nome">Nome</label>
		<div class="bo4">
	        <input class="form-control" type="text" id="nome" name="nome" value="<?php echo $nome; ?>" required>
	    </div>
	</div>
	<div class="form-group">
		<label for="email">Email</label>
		<div class="bo4">
	        <input class="form-control" type="text" id="email" name="email" value="<?php echo $email; ?>" required>
	    </div>
	    <div class="form-group">
		<label for="senha">Senha</label>
		<div class="bo4">
	        <input class="form-control" type="text" id="senha" name="senha" value="<?php echo $senha; ?>" required>
	    </div>
	</div>
	</div>
	</br>
	<a href="?ed" name="ed" class="btn btn-success pull-right">Atualizar</a>
</div>
</form> 