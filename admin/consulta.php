<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar</title>
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
</head>
<body>
<br><br>
<h2 style="margin-left: 50px;">Produtos</h2>

<table style="margin-left: 50px;" class="table table-hover">
	<thead>
		<tr>
			<td>#</td>
			<td>Produto</td>
			<td>Categoria</td>
			<td>Valor Unid</td>
			<td>Quantidade</td>
			<td>Ações</td>
		</tr>
	</thead>

	<tbody>
		<?php
			$sql = "SELECT * FROM produto WHERE idproduto = idcategoria";
			$query = mysqli_query($conexao, $sql);

			if (mysqli_num_rows($query) > 0) {
				while ($dados = mysqli_fetch_assoc($query)) {
					echo "<tr>
						<td>".$dados['idproduto']."</td>
						<td>".$dados['nome']."</td>
						<td>".$dados['preco']."</td>
						<td>".$dados['quantidade']."</td>
						<td>".$dados['descricao']."</td>
					</tr>";
				}
			}
		?>
	</tbody>

</table>

</body>
</html>