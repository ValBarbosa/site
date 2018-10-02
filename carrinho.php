<?php 
								$total = 0;
								foreach ($_SESSION['carrinho'] as $id => $qnt) {
									$sqlM = "SELECT * FROM produto WHERE idproduto = '".$id."'";
									$queryM = mysqli_query($conexao,$sqlM);
									$prod = mysqli_fetch_assoc($queryM);

									echo '<tr class="table-row">
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="images/item-10.jpg" alt="IMG-PRODUCT">
								</div>
							</td>
							<td class="column-2">Men Tshirt</td>
							<td class="column-3">$36.00</td>
							<td class="column-4">
								<div class="flex-w bo5 of-hidden w-size17">
									<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>

									<input class="size8 m-text18 t-center num-product" type="number" name="num-product1" value="1">

									<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</button>
								</div>
							</td>
							<td class="column-5">$36.00</td>
						</tr>'