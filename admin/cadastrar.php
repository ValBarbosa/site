<?php
error_reporting(0);
if(isset($_POST['nome']) && isset($_POST['preco']) && isset($_POST['quant']) && isset($_POST['descricao'])  && isset($_POST['cat']) && isset($_POST['cor']) && isset($_POST['tamanho'])){
if (isset($_FILES['file'])) {
	$dir = "image/";
$extensao = substr($_FILES['file']['name'], -4);
$novo_nome = md5(microtime()).$extensao;
move_uploaded_file($_FILES['file']['tmp_name'], $dir.$novo_nome);

 $sql = "INSERT INTO produto(`idproduto`, `nome`, `preco`, `descricao`, `quantidade`,`categoria`) VALUES (DEFAULT,'".$_POST['nome']."', '".$_POST['preco']."', '".$_POST['descricao']."', '".$_POST['quant']."', '".$_POST['cat']."') ";
     $query = mysqli_query($conexao, $sql);
if ($query) {
		$sqlid = "SELECT LAST_INSERT_ID()";
		$queryid = mysqli_query($conexao, $sqlid);
		$vetor = mysqli_fetch_row($queryid);
		$id = $vetor[0];
		$sql_foto = "INSERT INTO img VALUES (DEFAULT, '".$id."', '".$novo_nome."')";
		$query_foto = mysqli_query($conexao, $sql_foto);
											
		$sql_cat = "INSERT INTO categoria(idcategoria,idproduto) VALUES (DEFAULT,'".$id."')";
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
                  echo '<option value="'.$dadobusca['idcategoria'].'">'.$dadobusca['categoria'].'</option>';
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
                  echo '<option value="'.$dadobuscacor['idcor'].'">'.$dadobuscacor['cor'].'</option>';
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
                  echo '<option value="'.$dadobuscatamanho['idtamanho'].'">'.$dadobuscatamanho['tamanho'].'</option>';
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
          <label for="exampleFormControlFile1">Foto: </label>
          <input type="file" name="file" multiple class="form-control-file" id="exampleFormControlFile1">
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