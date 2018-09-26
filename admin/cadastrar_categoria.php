<?php 
error_reporting();
if (isset($_POST['categoria']) ) {
    $ext1 = substr($_FILES['arquivo']['name'], -4);
    $novo1 = substr(md5(microtime()), -8);
    move_uploaded_file($_FILES['arquivo']['tmp_name'], "dist/img/" .$novo1.$ext1);
    
    $sql = "INSERT INTO categoria(idcategoria,categoria,image) VALUES (DEFAULT,'".$_POST['categoria']."', '".$novo1.$ext1."')";
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
        <legend>Cadastrar categoria</legend>
        <form method="post">
          <div class="form-group">
            <label>Categorias</label>
            <input type="text" placeholder="Nome" class="form-control" name="categoria">
          <br>
          <div class="form-group">
            <label>Foto</label>
            <input type="file" name="arquivo">
          </div><br>
          <button class="btn btn-success btn-block">Cadastrar</button>
        </form>
      </div>
    </div>  
  </div>
</body>
</html>