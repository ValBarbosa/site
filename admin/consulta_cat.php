<!DOCTYPE html>
<html>
<head>
	<title>Consultar</title>
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
			<td>Imagem</td>
		</tr>
	</thead>

	<tbody>
		<?php
			$sql = "SELECT * FROM categoria";
			$query = mysqli_query($conexao, $sql);

			if (mysqli_num_rows($query) > 0) {
				while ($dados = mysqli_fetch_assoc($query)) {
					echo "<tr>
						<td>".$dados['idcategoria']."</td>
						<td>".$dados['categoria']."</td>";
						echo "<td><img style='width:50px; height:50px;' src='dist/img/".$dados['image']."'/></td>
					</tr>";
				}
			}
		?>
	</tbody>

</table>

</body>
</html>