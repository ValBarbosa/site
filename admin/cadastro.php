<?php
error_reporting(0);

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$cod = $_POST['cod'];
$descri = $_POST['descri'];
$info = $_POST['info'];
$revi = $_POST['revi'];

$cod_certo = 'AVG'.(strtolower(md5($cod))-4);



$sql = "INSERT INTO cad_produto (nome,preco,cat,cod,descricao,informacao,reviews) VALUES ('".$nome."','".$preco."','".$cat."','".$cod_certo."','".$descri."','".$info."','0');";
			$query = mysqli_query($conexao, $sql);
			header('location:index.php');
		

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
		<fieldset>
		<label>Cadastrar Contato</label>
		    <label>Nome</label>
			<input class="form-control" type="text" name="nome" placeholder="Nome" required>
			<!--<label>Foto:</label><br>
			<input class="form-control" type="file" name="file"><br>
			<label>Size</label>
			<input class="form-control" type="text" name="size" placeholder="" required> -->
			<label>Preço</label>
			<input class="form-control" type="text" name="preco" placeholder="" required>
			<!--<label>Cor</label>
			<input class="form-control" type="text" name="cor" placeholder="" required> -->
			<label>Categoria</label>
			<select class="form-control" name="cat">
		        <option>Categoria</option>
		        <option>Feminino</option>
		        <option>Masculino</option>
		        <option>Infantil</option>
		        <option>Juvenil</option>
		        <option>Esporte</option>
        	</select><br>
        	<label>Cod</label>
			<input class="form-control" type="text" name="cod" placeholder="" required>
        	<label>Descrição</label>
			<input class="form-control" type="text" name="descri" placeholder="" required>
			<label>Informação Adicional</label>
			<input class="form-control" type="text" name="info" placeholder="" required>
			<label>Reviews</label>
			<input class="form-control" disabled type="text" name="revi" placeholder="0" required>
			
		<button class="form-control btn btn-primary" type="submit" name="enviar">Cadastrar</button>
		</fieldset>
	</form>
</body>

