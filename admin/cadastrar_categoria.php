<?php 
error_reporting(0);
if (isset($_POST['categoria']) ) {
$ext = substr($_FILES['file']['name'],-4);
    $novo = substr(md5(microtime()), -8);
    $tam = $novo.$ext;
    move_uploaded_file($_FILES['file']['tmp_name'], "dist/img/".$tam);
    $sql = "INSERT INTO categoria(idcategoria,categoria,image) VALUES (DEFAULT,'".$_POST['categoria']."', '".$tam."')";
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
            <input type="file" name="file">
          </div><br>
          <button class="btn btn-success btn-block">Cadastrar</button>
        </form>
      </div>
    </div>  
  </div>
</body>
</html>