<?php 
error_reporting(0);
if (isset($_POST['categoria']) && isset($_FILES['arquivo'])) {
  
    $dir = "dist/img/";
    $ext1 = strtolower(substr($_FILES['arquivo']['name'], -4));
    $novoNome1 = microtime().$ext1;
    move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$novoNome1);

    
    $sql = "INSERT INTO categoria(idcategoria,categoria,image) VALUES (DEFAULT,'".$_POST['categoria']."', '".$novoNome1."')";
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
      <form  method="post" accept-charset="utf-8" enctype="multipart/form-data">
      <div class="col-md-6">
        <legend>Cadastrar categoria</legend>
        <form method="post">
          <div class="form-group">
            <label>Categorias</label>
            <input type="text" placeholder="Nome" class="form-control" name="categoria">
          <br>
          <div class="form-group">
            <label>Foto</label>
            <input type="file" name="arquivo" class="form-control-file" id="exampleFormControlFile1">
          </div><br>
          <button class="btn btn-success btn-block">Cadastrar</button>
        </form>
      </div>
       </form>
    </div>  
  </div>
</body>
</html>