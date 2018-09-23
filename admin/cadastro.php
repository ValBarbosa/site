<?php
error_reporting(0);

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$cod = $_POST['cod'];
$descri = $_POST['descri'];
$cat = $_POST['cat'];
$cat = $_POST['cor'];
$info = $_POST['info'];
$revi = $_POST['revi'];
// colocando no cad_produto
$cod_certo = 'AVG'.(strtolower(md5($cod))-4);
$sql = "INSERT INTO cad_produto (nome,preco,cat,cod,descricao,informacao,reviews) VALUES ('".$nome."','".$preco."','".$cat."','".$cod_certo."','".$descri."','".$info."','0');";
			$query = mysqli_query($conexao, $sql);

			//inserindo na categoria
			$sql_categoria = "SELECT LAST_INSERT_ID()";
			$query_categoria = mysqli_query($conexao,$sql_categoria);
			$res = mysqli_fetch_row($query_categoria);
			$id_categoria = $res[0];
			$sqlCategoria = "INSERT INTO categoria(id_prod) VALUES ('".$id_categoria.",'0'')";
			$query_notify = mysqli_query($conexao,$sqlCategoria);
//
			//inserindo na categoria
			$sql_cor = "SELECT LAST_INSERT_ID()";
			$query_cor = mysqli_query($conexao,$sql_cor);
			$res_cor = mysqli_fetch_row($query_cor);
			$id_cor = $res_cor[0];
			$sqlCor = "INSERT INTO cor(id_prod) VALUES ('".$id_cor.",'0'')";
			$query_cor = mysqli_query($conexao,$sqlCor);
		

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
			<label>Cor</label>
			<?php
			$sqli = "SELECT * FROM cor";
			$query_cat = mysqli_query($conexao, $sqli);
			echo '<select class="form-control" name="cor">';
			while ($cor = mysqli_fetch_assoc($query_cat)){
				echo '
		        <option>'.$cor['cor'].'</option>';
        }
        echo '</select><br>';
        	?>
			<label>Categoria</label>
			<?php
			$sqli = "SELECT * FROM categoria";
			$query_cat = mysqli_query($conexao, $sqli);
			echo '<select class="form-control" name="cat">';
			while ($dado = mysqli_fetch_assoc($query_cat)){
				echo '
		        <option>'.$dado['categoria'].'</option>';
        }
        echo '</select><br>';
        	?>
        	<br>
        	<label>Cod</label>
			<input class="form-control" disabled type="text" name="cod" placeholder="" required>
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

