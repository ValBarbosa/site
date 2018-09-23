<?php
if(isset($_POST['nome']) && isset($_POST['preco']) && isset($_POST['quant']) && isset($_POST['descricao']) && isset($_POST['info']) && isset($_POST['cat']) && isset($_POST['cor']) && isset($_POST['tamanho'])){
if (isset($_FILES['file'])) {
	$dir = "dist/img/";
$extensao = substr($_FILES['img']['name'], -4);
$novo_nome = md5(microtime()).$extensao;
move_uploaded_file($_FILES['img']['tmp_name'], $dir.$novo_nome);

 $sql = "INSERT INTO produto(`idproduto`, `nome`, `preco`, `descricao`, `quantidade`,`categoria`) VALUES (DEFAULT,'".$_POST['nome']."', '".$_POST['preco']."', '".$_POST['descricao']."', '".$_POST['quant']."', '".$_POST['cat']."') ";
     $query = mysqli_query($conexao, $sql);
if ($query) {
		$sqlid = "SELECT LAST_INSERT_ID()";
		$queryid = mysqli_query($conexao, $sqlid);
		$vetor = mysqli_fetch_row($queryid);
		$id = $vetor[0];
		$sql_foto = "INSERT INTO img VALUES (DEFAULT, '".$id."', '".$novo_nome."')";
		$query_foto = mysqli_query($conexao, $sql_foto);
											
		$sql_cat = "INSERT INTO categoria(idcategoria,idproduto,categoria) VALUES (DEFAULT,'".$id."','".$_POST['cat']."')";
		$query_cat = mysqli_query($conexao, $sql_cat);

		$sql_cor = "INSERT INTO cor(idcor,idproduto,cor) VALUES (DEFAULT,'".$id."','".$_POST['cor']."')";
		$query_cor = mysqli_query($conexao, $sql_cor);

		$sql_tam = "INSERT INTO tamanho(idtamanho,idproduto,tamanho) VALUES (DEFAULT,'".$id."','".$_POST['tamanho']."')";
		$query_tam = mysqli_query($conexao, $sql_tam);
		echo "<script>alert('Cadastrado!!')</script>";
	} else {
		echo "<script>alert('Erro!!')</script>";
	}

} }

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>

<br><br>
	<div class="container" style="margin-left: 50px;">
		<div class="row">
			<div class="col-md-6">
				<legend>Cadastrar produto</legend>
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nome</label>
						<input placeholder="Nome do produto" class="form-control" type="text" name="nome">
					</div>
					<div class="form-group">
			<label for="categoria_produto"> Cor do produto: </label>
			<select class="form-control" name="cor" id="cor">
				<?php 
					$sqlbuscacor = "SELECT * FROM cor";
					$querybuscacor = mysqli_query($conexao, $sqlbuscacor);
					while ($dadobuscacor = mysqli_fetch_assoc($querybuscacor)) {
						
						echo '<option value="'.$dadobuscacor['idcor'].'">'.$dadobuscacor['cor'].'</option>';
					}
				?>
				
			</select>
		</div><br>
		<div class="form-group">
			<label for="categoria_produto"> Tamanho do produto: </label>
			<select class="form-control" name="tamanho" id="tamanho">
				<?php 
					$sqltamanho = "SELECT * FROM tamanho";
					$querytamanho = mysqli_query($conexao, $sqltamanho);
					while ($dadobuscatamanho = mysqli_fetch_assoc($querytamanho)) {
						
						echo '<option value="'.$dadobuscatamanho['idtamanho'].'">'.$dadobuscatamanho['tamanho'].'</option>';
					}
				?>
				
			</select>
		</div><br>
					<div class="form-group">
						<label>Preço</label>
						<div class="input-group col-md-4">
							<input placeholder="" class="form-control" type="number" name="preco">
						</div>
					</div>
					<div class="form-group">
						<label>Quantidade</label>
						<div class="input-group col-md-4">
							<input placeholder="" class="form-control" type="text" name="quant">
						</div>
					</div>
					<div class="form-group">
						<label>Descrição</label>
						<textarea class="form-control" placeholder="" style="max-width: 560px; min-width: 560px; max-height: 150px; min-height: 100px;" name="descricao"></textarea>
					</div>
					<div class="form-group">
						<label>Informação adicional</label>
						<textarea class="form-control" placeholder="" style="max-width: 560px; min-width: 560px; max-height: 150px; min-height: 100px;" name="info"></textarea>
					</div>
					<div class="form-group">
						<label>Foto</label>
						<input type="file" name="file" multiple>
					</div>
					<div class="form-group">
			<label for="categoria_produto"> Categoria do produto: </label>
			<select class="form-control" name="cat" id="cat">
				<?php 
					$sqlbusca = "SELECT * FROM categoria";
					$querybusca = mysqli_query($conexao, $sqlbusca);
					while ($dadobusca = mysqli_fetch_assoc($querybusca)) {
						
						echo '<option value="'.$dadobusca['idcategoria'].'">'.$dadobusca['categoria'].'</option>';
					}
				?>
				
			</select>
		</div><br>
					<input class="btn btn-success" value="Cadastrar" type="submit" name="submit">
					<br><br>
				</form>
			</div>
		</div>	
	</div>
</body>
</html>