<!DOCTYPE html>
<html>
<head>
  <title>Ver todas</title>
  <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
</head>
<body>

<table style="margin-left: 50px;" class="table table-hover">
  <thead>
    <tr>
      <td>Nome</td>
      <td>Mensagem</td>
    </tr>
  </thead>

  <tbody>
<?php                    
  $sql = "SELECT * FROM contato, notificacao ORDER BY contato.idcontato desc";
  $query = mysqli_query($conexao, $sql);
 
    while ($dados = mysqli_fetch_assoc($query)) {
      echo "<tr>
            <td>".$dados['nome']."</td>
            <td>".$dados['mensagem']."</td>
          </tr>";
      }

?>

</tbody>

</table>

</body>
</html>
      