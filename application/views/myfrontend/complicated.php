<!-- main-container start -->
			<!-- ================ -->
			<section class="main-container">
				<div class="container">
					<div class="row">

						<!-- main start -->
						<!-- ================ -->
						<form method="post" action="<?=base_url('complicated_submit')?>">
						<div class="main col-md-12">
							<div class="row">
								<?php
								if(!empty($products)) {
									foreach($products as $v) {
								?>
								<div class="col-md-4 ">
									<div class="productEach feature-box-2 object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="100" data-productid="<?=$v['productID']?>" data-price="<?=$v['price']?>">
										<span class="icon without-bg"><i class="fa fa-diamond"></i></span>
										<div class="body">
											<h4 class="title"><?=$v['title']?></h4>
											<p>Size: <select class="size" onchange="getAllData()">
												<?php
												if(!empty($v['size'])){
													foreach($v['size'] as $v2){

												?>
												<option value="<?=$v2?>"><?=$v2?></option>
												<?php
														}
													}
												?>
											</select></p>

											<p>Color: <select class="color" onchange="getAllData()">
												<?php
												if(!empty($v['color'])){
													foreach($v['color'] as $v2){

												?>
												<option value="<?=$v2?>"><?=$v2?></option>
												<?php
														}
													}
												?>
											</select></p>

											<p>Price: <?=$v['price']?></p>
											
										</div>
									</div>
								</div>
								<?php
									}
								}
								?>
								
							</div>


								
						</div>
						
						<!-- main end -->

						<textarea id="myContainer" name="myContainer" style="width:100%; height: 200px"></textarea>
						<input type="submit" value="submit" />
						</form>
						<script>
						var cart = [];
						function getAllData(){
							cart = [];
							$(".productEach").each(function(){
								var productID = $(this).data("productid");
								var size = $(this).find(".size").val();
								var color = $(this).find(".color").val();
								var price = $(this).data("price");
								console.log(productID, size, color, price);
								cart.push({pID:productID,size:size,color:color,price:price});
							});
							$("#myContainer").val(JSON.stringify(cart));
						}

						$(document).ready(function(){
							getAllData();
						});
						</script>

					</div>
				</div>
			</section>
			<!-- main-container end -->