<?php
include('admin/config.php');

    $pagina = isset($_GET['pagination'])?$_GET['pagination']:1;
    $registro = 6;
    $sqlT = "SELECT * FROM produto";
    $queryT = mysqli_query($conexao,$sqlT);
    $total = mysqli_num_rows($queryT);
    
    $numPaginas = ceil($total/$registro);
    $inicio = $pagina - 1;
    $inicio = ($inicio*$numPaginas);



           if (isset($_GET['pesquisa'])) {
					$sqlPesquisa = "SELECT * FROM produto WHERE nome LIKE '%".$_GET['pesquisa']."%' ORDER BY nome ASC";
					$queryPesquisa = mysqli_query($conexao,$sqlPesquisa);
					while ($pro = mysqli_fetch_assoc($queryPesquisa)) {
					echo '  
						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
	
							<!-- Block2 -->
							<div class="block2" style="width:300px; height:400px;padding:10px;margin-bottom:45px;">
								<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
									<img style="width:300px; height:400px;" src="admin/dist/img/'.$pro['img'].'" alt="IMG-PRODUCT">

									<div class="block2-overlay trans-0-4">
										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>

										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
											<a href="?acao=add&id='.$pro['idproduto'].'&page=todos" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
												Adicionar
											</a>
										</div>
									</div>
								</div>
                              <center>
								<div class="block2-txt p-t-20">
									<a href="product-detail.php?mostra='.$pro['idproduto'].'" class="block2-name dis-block s-text3 p-b-5">
										'.$pro['nome'].'
									</a>

									<span class="block2-price m-text6 p-r-5">
										preço:'.$pro['preco'].'
									</span>
								</div> </center>
							</div>
						</div>
';
}
}
if (isset($_GET['page'])) {
$sql = "SELECT * FROM produto LIMIT $inicio, $registro";
 $query = mysqli_query($conexao, $sql);

 while ($dados = mysqli_fetch_assoc($query)) {


					echo '
						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<!-- Block2 -->
					<div class="block2" style="width:300px;height:400px;padding:10px;margin-bottom:45px;">
								<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
									<img style="width:300px; height:400px;" src="admin/dist/img/'.$dados['img'].'" alt="IMG-PRODUCT">

									<div class="block2-overlay trans-0-4">
										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>

										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
											<a href="?acao=add&id='.$dados['idproduto'].'&page=todos" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
												Adicionar
											</a>
										</div>
									</div>
								</div>
                              <center>
								<div class="block2-txt p-t-20">
									<a href="product-detail.php?mostra='.$dados['idproduto'].'" class="block2-name dis-block s-text3 p-b-5">
										'.$dados['nome'].'
									</a>

									<span class="block2-price m-text6 p-r-5">
										preço:'.$dados['preco'].'
									</span>
								</div> </center>
							</div>
						</div>
';
}}




if (isset($_GET['cat'])) {
$sqlBuscaCat = "SELECT * FROM produto WHERE categoria = '".$_GET['cat']."' LIMIT $inicio, $registro";
$queryBuscaCat = mysqli_query($conexao, $sqlBuscaCat);
 while ($dado = mysqli_fetch_assoc($queryBuscaCat)) {
            
                
					echo '
						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50" >
							<!-- Block2 -->
							<div class="block2" style="width:300px; height:400px;padding:10px;margin-bottom:45px;">
								<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
									<img style="width:300px; height:400px;" src="admin/dist/img/'.$dado['img'].'" alt="IMG-PRODUCT">

									<div class="block2-overlay trans-0-4">
										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>

										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
											<a href="?acao=add&id='.$dado['idproduto'].'&cat='.$dado['categoria'].'" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
												Adicionar
											</a>
										</div>
									</div>
								</div>
                            <center>
								<div class="block2-txt p-t-20">
									<a href="product-detail.php?mostra='.$dado['idproduto'].'" class="block2-name dis-block s-text3 p-b-5">
										'.$dado['nome'].'
									</a>

									<span class="block2-price m-text6 p-r-5">
										preço:'.$dado['preco'].'
									</span>
								</div></center>
							</div>
						</div>
';
}}
						?>	