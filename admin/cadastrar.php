<?php
error_reporting(0);
if(isset($_POST['nome']) && isset($_POST['preco']) && isset($_POST['quant']) && isset($_POST['descricao'])  && isset($_POST['cat']) && isset($_POST['cor']) && isset($_POST['tamanho'])){

	$ext1 = substr($_FILES['arquivo1']['name'], -4);
    $novo1 = substr(md5(microtime()), -8);
    move_uploaded_file($_FILES['arquivo1']['tmp_name'], "dist/img/" .$novo1.$ext1);
    //IMAGE2
    $ext2 = substr($_FILES['arquivo2']['name'], -4);
    $novo2 = substr(md5(microtime()), -8);
    move_uploaded_file($_FILES['arquivo2']['tmp_name'], "dist/img/" .$novo2.$ext2);
    //IMAGE3
    $ext3 = substr($_FILES['arquivo3']['name'], -4);
    $novo3 = substr(md5(microtime()), -8);
    move_uploaded_file($_FILES['arquivo3']['tmp_name'], "dist/img/" .$novo3.$ext3);

 $sql = "INSERT INTO produto(`idproduto`, `nome`, `preco`, `descricao`, `quantidade`,`categoria`,`cor`,`tamanho`,`img`) VALUES (DEFAULT,'".$_POST['nome']."', '".$_POST['preco']."', '".$_POST['descricao']."', '".$_POST['quant']."', '".$_POST['cat']."', '".$_POST['cor']."', '".$_POST['tamanho']."', '".$novo1.$ext1."') ";
     $query = mysqli_query($conexao, $sql);
if ($query) {
		$sqlid = "SELECT LAST_INSERT_ID()";
		$queryid = mysqli_query($conexao, $sqlid);
		$vetor = mysqli_fetch_row($queryid);
		$id = $vetor[0];

		$sql_foto = "INSERT INTO img VALUES (DEFAULT, '".$id."', '".$novo1.$ext1."', '".$novo2.$ext2."', '".$novo3.$ext3."')";
		$query_foto = mysqli_query($conexao, $sql_foto);

		echo "<script>alert('Cadastrado!!')</script>";
	} else {
		echo "<script>alert('Erro!!')</script>";
	}

} 

?>
<!doctype html>
<html>
  <head>
    
    <title>Cadastrar Produto</title>
  </head>
  <body>
    <div class="container">
      <h4>Cadastrar Produtos</h4>
      <form method="POST" enctype="multipart/form-data">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Nome: </label>
            <input type="text" name="nome" class="form-control" id="inputEmail4" placeholder="Vestido Quintess Barrado e Listras Manga Curta">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Preço: </label>
            <input type="number" name="preco" class="form-control" id="inputPassword4" placeholder="R$ 259,90">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputAddress">Quantidade Disponível: </label>
            <input type="text" name="quant" class="form-control" id="inputAddress" placeholder="20 disponíveis">
          </div>
          <div class="form-group col-md-6">
            <label for="inputState">Categorias: </label>
            <select name="cat" id="cat" class="form-control">
              <option>Categorias</option>
              <?php 
                include 'config.php';
                $sqlbusca = "SELECT * FROM categoria";
                $querybusca = mysqli_query($conexao, $sqlbusca);
                while ($dadobusca = mysqli_fetch_assoc($querybusca)) {
                  echo '<option value="'.$dadobusca['categoria'].'">'.$dadobusca['categoria'].'</option>';
                }
              ?>
            </select>
          </div>
        </div>
         <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputState">Cor do Produto: </label>
            <select class="form-control" name="cor" id="cor">
              <option>Cores</option>
              <?php
                include 'config.php';
                $sqlbuscacor = "SELECT * FROM cor";
                $querybuscacor = mysqli_query($conexao, $sqlbuscacor);
                while ($dadobuscacor = mysqli_fetch_assoc($querybuscacor)) {
                  echo '<option value="'.$dadobuscacor['cor'].'">'.$dadobuscacor['cor'].'</option>';
                }
              ?>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="inputState">Tamanhos Disponíveis: </label>
            <select class="form-control" name="tamanho" id="tamanho">
              <option>Tamanhos</option>
              <?php 
                include 'config.php';
                $sqltamanho = "SELECT * FROM tamanho";
                $querytamanho = mysqli_query($conexao, $sqltamanho);
                while ($dadobuscatamanho = mysqli_fetch_assoc($querytamanho)) {
                  echo '<option value="'.$dadobuscatamanho['tamanho'].'">'.$dadobuscatamanho['tamanho'].'</option>';
                }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddress2">Descrição do Produto: </label>
          <textarea class="form-control" name="descricao" id="exampleFormControlTextarea1" rows="3" placeholder="Vestido em malha de poliéster com elastano. Possui manga, recortes abaixo do busto e corte a fio."></textarea>
        </div>
        <div class="form-group">
          <label for="exampleFormControlFile1">Imagens Pricipal </label>
          <input type="file" name="arquivo1" class="form-control-file" id="exampleFormControlFile1">
          <input type="file" name="arquivo2" class="form-control-file" id="exampleFormControlFile1">
          <input type="file" name="arquivo3" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <input class="btn btn-primary" value="CADASTRAR" type="submit" name="submit">
        <!-- <button type="submit" name="enviar" class="btn btn-primary">CADASTRAR</button> -->
        <!-- <button type="submit" name="cancelar" class="btn btn-danger">CANCELAR</button> -->
      </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>