<!DOCTYPE HTML>
<html>

<head>
	<title>The Free Smart-Sale Website Template | Details :: w3layouts</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
	<link href="css/easy-responsive-tabs.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/global.css">
	<script src="js/slides.min.jquery.js"></script>
	<script>
		$(function () {
			$('#products').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				effect: 'slide, fade',
				crossfade: true,
				slideSpeed: 350,
				fadeSpeed: 500,
				generateNextPrev: true,
				generatePagination: false
			});
		});
	</script>
</head>

<body>
	<div class="wrap">


		<div class="main">
			<div class="details">
				<div class="product-details">
					<div class="images_3_of_2">
						<div id="container">
							<div id="products_example">
								<div id="products">
									<div class="slides_container">
										<a href="#" target="_blank"><img src="images/productslide-1.jpg" alt=" " />
										
										 <?php
										// 	$sql = "select image from product_view where id = '$id'";
										// 	$result=	$connect->query($sql);
										// if(!$result){
										// 	echo "Die".$connect->error;
										// 	exit();
										// }
										// 	while($row=$connect->fetchArray()){
										// 		echo "<a href='#' target='_blank'><img src='{$row['image']}' alt='' /></a>";												
										// 	}


										?>								 
									</div>
									<ul class="pagination">
											
									<?php
										// 	$sql = "select image from product_view where id = '$id'";
										// 	$result=	$connect->query($sql);
										// if(!$result){
										// 	echo "Die".$connect->error;
										// 	exit();
										// }
										// 	while($row=$connect->fetchArray()){
										// 		echo "<a href='#' target='_blank'><img src='{$row['image']}' alt='' /></a>";												
										// 	}


											?>	

										<li><a href="#"><img src="images/thumbnailslide-1.jpg" alt=" " /></a></li>
										<li><a href="#"><img src="images/thumbnailslide-2.jpg" alt=" " /></a></li>
										<li><a href="#"><img src="images/thumbnailslide-3.jpg" alt=" " /></a></li>
										<li><a href="#"><img src="images/thumbnailslide-2.jpg" alt=" " /></a></li>
										<li><a href="#"><img src="images/thumbnailslide-3.jpg" alt=" " /></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="desc span_3_of_2">
					
							
							<?php
										// 	$sql = "select name from product where id = '$id'";
										// 	$result=	$connect->query($sql);
										// if(!$result){
										// 	echo "Die".$connect->error;
										// 	exit();
										// }
										// $row=$connect->fetchArray();
										// 	if(empty($row)){
										// 		echo  	"<h2>Ten cua san pham {$row['name']} </h2>";
										// 		echo "<p>title cua san pham {$row['subtitle']}</p>";
										// 		echo "<div class='price'>
										// 		<p>Gia: <span>$500{$row['price']} </span></p>
										// 				</div>";
										// 	}
										
											


											?>	
       		
					
						<div class="available">
							<p>lua chon :</p>
							<ul>
								<li>Color:
									<select>
										<option>Silver</option>
										<option>Black</option>
										<option>Dark Black</option>
										<option>Red</option>
									</select>
								</li>
								<li>Size:<select>
										<option>Large</option>
										<option>Medium</option>
										<option>small</option>
										<option>Large</option>
										<option>small</option>
									</select></li>
								<li>Quality:<select>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
									</select></li>
							</ul>
						</div>
						<div class="share-desc">


							<div class="share">
								<p>Share Product :</p>
								<ul>
									<li><a href="#"><img src="images/fb.png" alt=""></a></li>
									<li><a href="#"><img src="images/twiter.png" alt=""></a></li>
									<li><a href="#"><img src="images/rss.png" alt=""></a></li>
								</ul>
							</div>
							<div class="button"><span><a href="#"> Thêm vào giỏ hàng</a></span></div>

							<div class="button col-sm-3"><span><a href="#"> Mua ngay</a> </span></div>

							<div class="clear"></div>
						</div>

					</div>
					<div class="clear"></div>
				</div>
				<div class="product_desc">
					<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
						<ul class="resp-tabs-list">
							<li class="resp-tab-item resp-tab-active" aria-controls="tab_item-0" role="tab">Product
								Details</li>
							<li class="resp-tab-item" aria-controls="tab_item-2" role="tab">Product Reviews</li>
							<div class="clear"></div>
						</ul>
						<div class="resp-tabs-container">
							<h2 class="resp-accordion resp-tab-active" role="tab" aria-controls="tab_item-0"><span
									class="resp-arrow"></span>Mieu ta san pham</h2>
							<div class="product-desc resp-tab-content resp-tab-content-active" style="display:block"
								aria-labelledby="tab_item-0">
								<p>
									MÔ TẢ SẢN PHẨM
									- ghế câu cá cao đang “hot” dành để bán cafe
									- inox 100%, bảo hành 6 tháng
									- vải ghế nhập siêu bền
									- may 1 mảnh liền khung chắc chắn , thoáng mát , không thấm nước
									- có thể dùng làm ghế trong nhà, ghế bán hàng
									- ghế lưng thấp 40*40*70cm là 98k , xếp gọn : 40*60*6 cm
									ghế lưng cao 40*40*90cm là 110k , xếp gọn : 40*80*6 cm
									- liên hệ: 0902.601155 (Tiến)
									- xưởng mình ở p.BHH B, bình tân, tphcm

									#ghe
									#ghexep
									#ghexepinox
									#ghecafe
									#ghecaphe
									#ghengoiviahe
									#ghecauca
									#ghengoicauca
									#ghedangoai
									#ghế
									#ghếtràchanh
									#ghếxếpinox
									#ghếvảidù
									#ghếxếpvảilưới
									#ghếinox
									#ghếbố
									#giườngxếpinox
									#giườngxếplưới
									#giườngbốvải
									#giườngghếbố
									#giườnginoxlưới
									#giườnginoxdù
									#giườngxếp
									#võngxếp
									#vongxep
									#võngxếpinox
									#xíchđu
								</p>

							</div>


							<h2 class="resp-accordion" role="tab" aria-controls="tab_item-2"><span
									class="resp-arrow"></span>Product Reviews</h2>
							<div class="review resp-tab-content" aria-labelledby="tab_item-2">
								<h4>Lorem ipsum Review by <a href="#">Finibus Bonorum</a></h4>
								<ul>
									<li>Price :<a href="#"><img src="images/price-rating.png" alt=""></a></li>
									<li>Value :<a href="#"><img src="images/value-rating.png" alt=""></a></li>
									<li>Quality :<a href="#"><img src="images/quality-rating.png" alt=""></a></li>
								</ul>
							
								<div class="your-review">
									<h3>How Do You Rate This Product?</h3>
									<p>Write Your Own Review?</p>
									<form>
										
										<div><span><label>Summary of Your Review<span
														class="red">*</span></label></span>
											<span><input type="text" value=""></span>
										</div>
										<div>
											<span><label>Review<span class="red">*</span></label></span>
											<span><textarea> </textarea></span>
										</div>
										<div>
											<span><input type="submit" value="SUBMIT REVIEW"></span>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<script type="text/javascript">
					$(document).ready(function () {
						$('#horizontalTab').easyResponsiveTabs({
							type: 'default', //Types: default, vertical, accordion           
							width: 'auto', //auto or any width like 600px
							fit: true   // 100% fit in a container
						});
					});
				</script>

			</div>
			<div class="sidebar">
				<div class="s-main">
					<div class="s_hdr">
						<h2>Categories</h2>
					</div>
					<div class="text1-nav">
						<ul>
							<li><a href="">Danh Muc 1</a></li>
							<li><a href="">San pham</a></li>


						</ul>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>

</body>

</html>