<?php 
error_reporting(0);
if (isset($_POST['size'])) {
    $sql = "INSERT INTO tamanho(idtamanho,tamanho) VALUES (DEFAULT,'".$_POST['size']."')";
            $query = mysqli_query($conexao, $sql);
            if ($query) {
              echo "<script>alert('Cadastrada!!')</script>";
            } else {
              echo "<script>alert('Erro!!')</script>";
            }
}
        ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
</head>
<body>

<br><br>
  <div class="container" style="margin-left: 50px;">
    <div class="row">
      <div class="col-md-6">
        <legend>Cadastrar Tamanho Disponiveis</legend>
        <form method="post">
          <div class="form-group">
            <label>Tamanhos</label>
            <input type="text" placeholder="" class="form-control" name="size">
          <br>
          <button class="btn btn-success btn-block">Cadastrar</button>
        </form>
      </div>
    </div>  
  </div>
</body>
</html>