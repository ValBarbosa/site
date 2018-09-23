<?php 
error_reporting();
if (isset($_POST['cores'])) {
    $sql = "INSERT INTO cor(idcor,cor) VALUES (DEFAULT,'".$_POST['cores']."')";
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
        <legend>Cadastrar Cores Disponiveis</legend>
        <form method="post">
          <div class="form-group">
            <label>Cores</label>
            <input type="text" name="cores" placeholder="" class="form-control">
          <br>
          <button class="btn btn-success btn-block">Cadastrar</button>
        </form>
      </div>
    </div>  
  </div>
</body>
</html>