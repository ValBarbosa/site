<?php
error_reporting();

$nome = $_POST['nome'];
$sql = "INSERT INTO cor (cor) VALUES ('".$nome."');";
			$query = mysqli_query($conexao, $sql);
		
?>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale=1">
	 <link rel="stylesheet" type="text/css" href="css/bootstrap_s.min.css"> 
	 <link rel="stylesheet" type="text/css" href="css/materialize.css"> 
</head>
<body>
<form method="post" class="container">
	<label>Cadastrar cor</label>
		<fieldset>
		    <label>Nome da cor</label>
			<input class="form-control" type="text" name="nome" placeholder="Nome" required>			
		<button class="form-control btn btn-primary" type="submit" name="enviar">Cadastrar</button>
		</fieldset>
	</form>
</body>

