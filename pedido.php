<?php 
								$total = 0;
						foreach ($_SESSION['carrinho'] as $id => $qnt) {
								
					    $sqlM = "SELECT * FROM produto WHERE idproduto = '".$id."'";
									$queryM = mysqli_query($conexao,$sqlM);
									$prod = mysqli_fetch_assoc($queryM);

									echo '<center>
									<div class="row col-md-12" style="margin-bottom:30px;">
							<div class="col-md-1">
								<div class="cart-img-product b-rad-4 o-f-hidden" >
									<img src="admin/dist/img/'.$prod['img'].'" alt="IMG-PRODUCT">
								</div>
							</div>
							<div class="col-md-1"><label>'.$prod['nome'].'</label></div>
							<div class="col-md-1"><label>R$'.$prod['preco'].'</label></div>
						</div>
						</center>' 
					;
					}
?>
