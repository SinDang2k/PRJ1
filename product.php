<!DOCTYPE html>
<html>
<head>
	<title>Đồ án 1: SHOESVN</title>
	<link rel="stylesheet" type="text/css" href="css/client/header.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/client/content.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/client/footer.css" media="all" />
	<link rel="shortcut icon" type="image/x-icon" href="images/logo/shoesvn.jpg">
	<script src="https://kit.fontawesome.com/4ca587dd72.js" crossorigin="anonymous"></script>
</head>
<body>
	<?php
		if(empty($_GET['id'])){
			header('location:all_product.php');
			exit();
		}
	?>
	<?php include 'header.php' ?>
	<?php include 'menu.php' ?>
	<div class="main-all-product">
		<div class="wrap">
			<div class="breadcrumb iiii">
				<ul class="breadcrumbs">
					<li><a href="index.php">Trang chủ<i class="fas fa-home"></i></a></li>
					<?php if($_GET['id'] == 1){?>
						<li><a href="all_product.php">Tất cả giày thể thao</a></li>					 
						<li><span>New Balance</span></li>
					<?php }else if($_GET['id'] == 2){ ?>
						<li><a href="all_product.php">Tất cả giày thể thao</a></li>					 
						<li><span>Giày thể thao Nike</span></li>
					<?php }else if($_GET['id'] == 3){ ?>
						<li><a href="all_product.php">Tất cả giày thể thao</a></li>					 
						<li><span>Giày thể thao Adidas</span></li>
					<?php }else if($_GET['id'] == 4){ ?>
						<li><a href="all_product.php">Tất cả giày thể thao</a></li>					 
						<li><span>Vans</span></li>
					<?php }else if($_GET['id'] == 5){ ?>
						<li><a href="all_product.php">Tất cả giày thể thao</a></li>					 
						<li><span>Puma</span></li>
					<?php }else if($_GET['id'] == 6){ ?>
						<li><a href="all_product.php">Tất cả giày thể thao</a></li>					 
						<li><span>Converse</span></li>
					<?php }else{ ?>
						
					<?php } ?>
				</ul>
			</div>
			<div style="width: 97%; margin: auto;">
			<?php include 'side_bar.php' ?>
			<div class="list-all-product">
				<?php
					require_once 'db/connect.php';
					$sql="select * from san_pham where ma_hang='$_GET[id]'";
					$array=mysqli_query($con,$sql);
					$tong_so_san_pham = mysqli_num_rows($array);
					$limit = !empty($_GET['limit'])?$_GET['limit']:6;
					$trang_hien_tai = !empty($_GET['page'])?$_GET['page']:1;
					if(isset($_GET['page'])){
						$trang_hien_tai = $_GET['page'];
					}
					$trang_ke_tiep = ($trang_hien_tai - 1)*$limit;
					$so_trang = ceil($tong_so_san_pham / $limit);
					$sql = "$sql limit $limit offset $trang_ke_tiep";
					$array = mysqli_query($con,$sql);
				?>
				<div class="advertisement">
					<?php if($_GET['id'] == 1){?>
					 	<h1>
							New Balance
						</h1>
						<div class="description">
							<p>Hãy lựa chọn những đôi giày thể thao <strong>New Balance</strong> phù hợp với phong cách của bạn.</p>
						</div>
						<div class="images mn">
							<img src="images/logo/new_balance_logo.jpg" width="290px" height="290px" style="padding: 0px 0 32px 0 !important;">
						</div>
					<?php }else if($_GET['id'] == 2){ ?>
						<h1>
							Giày thể thao Nike
						</h1>
						<div class="description">
							<p>Hãy lựa chọn những đôi giày thể thao <strong>Nike</strong> phù hợp với phong cách của bạn.</p>
						</div>
						<div class="images">
							<img src="images/logo/nike_logo.jpg" width="350px" height="190px">
						</div>
					<?php }else if($_GET['id'] == 3){ ?>
						<h1>
							Giày thể thao Adidas
						</h1>
						<div class="description">
							<p>Hãy lựa chọn những đôi giày thể thao <strong>Adidas</strong> phù hợp với phong cách của bạn.</p>
						</div>
						<div class="images">
							<img src="images/logo/adidas_logo.png" width="290px" height="180px">
						</div>
					<?php }else if($_GET['id'] == 4){ ?>
						<h1>
							Vans
						</h1>
						<div class="description">
							<p>Hãy lựa chọn những đôi giày thể thao <strong>Vans</strong> phù hợp với phong cách của bạn.</p>
						</div>
						<div class="images">
							<img src="images/logo/vans_logo.jpg" width="290px" height="200px">
						</div>
					<?php }else if($_GET['id'] == 5){ ?>
						<h1>
							Puma
						</h1>
						<div class="description">
							<p>Hãy lựa chọn những đôi giày thể thao <strong>Puma</strong> phù hợp với phong cách của bạn.</p>
						</div>
						<div class="images">
							<img src="images/logo/puma_logo.png" width="300px" height="180px">
						</div>
					<?php }else if($_GET['id'] == 6){ ?>
						<h1>
							Converse
						</h1>
						<div class="description">
							<p>Hãy lựa chọn những đôi giày thể thao <strong>Converse</strong> phù hợp với phong cách của bạn.</p>
						</div>
						<div class="images">
							<img src="images/logo/converse_logo.jpg" width="290px" height="220">
						</div>
					<?php }else{ ?>
						<?php echo '<div class="infoss">
								    	<p> 404 Not Found! </p>
									</div>'; 
						?>
					<?php } ?>
				</div>
				<div class="toolbar" id="myDIV">
					<div class="pagination">
						<?php 
							if($trang_hien_tai > 3){ 
								$first_page = 1;
							?>
								<a href="?id=<?php echo $_GET['id'] ?>&limit=<?=$limit ?>&page=<?=$first_page ?>"><button class="so active">First</button></a>
						<?php 
							} 
							if($trang_hien_tai > 1){
								$prev_page = $trang_hien_tai - 1; 
								?>
								<a href="?id=<?php echo $_GET['id'] ?>&limit=<?=$limit ?>&page=<?=$prev_page ?>"><button class="so active">Prev</button></a>
							<?php } ?>
						<?php for($i = 1; $i <= $so_trang;$i++){ ?>
							<?php if($i != $trang_hien_tai){ ?>
							<a href="?id=<?php echo $_GET['id'] ?>&limit=<?=$limit ?>&page=<?=$i ?>"><button class="so active"><?php echo $i; ?></button></a>
							<?php }else{ ?>
								<strong class="so" style="background: #333; color: #fff" ><?=$i ?></strong>
							<?php } ?>
						<?php } ?>

						<?php 
							if($trang_hien_tai < $so_trang - 1){ 
								$next_page = $trang_hien_tai + 1;
							?>
							<a href="?id=<?php echo $_GET['id'] ?>&limit=<?=$limit ?>&page=<?=$next_page ?>"><button class="so active">Next</button></a>					
						<?php 
							}
							if($trang_hien_tai < $so_trang - 3){
								$end_page = $so_trang;
								?>
									<a href="?id=<?php echo $_GET['id'] ?>&limit=<?=$limit ?>&page=<?=$end_page ?>"><button class="so active">Last</button></a>
								<?php
							}
						?>
				    </div>
				</div>
				<div class="show-all-product">
					<?php
						while($row_brand_product = mysqli_fetch_array($array)){
							$gia_ban = ($row_brand_product['gia'] - ($row_brand_product['gia'] * $row_brand_product['sales']));
							$gia_fm = number_format($row_brand_product['gia'],"0",",",".")." "."₫";
							$gia_banfm = number_format($gia_ban,"0",",",".")." "."₫";
							$sales = ($row_brand_product['sales'] * 100)."%";
					?>
					<div class="box-bottom box-content-bottom">
						<a href="">
							<div class="view view-fifth">
						  	  <div class="top_box">
							  	<h3 class="text_3"><?php echo $row_brand_product['ten_san_pham'] ?></h3>
							  	<p class="text_2">Lorem ipsum</p>
						         	<div class="grid_img">
									   	<div class="imgs">
									   		<img src="admin/modules/product_details/uploads_product/<?php echo $row_brand_product['anh'] ?>" width="170px" height="170px"  alt=""/>
									   	</div>
									   	<a href="view_product_detail.php?ma=<?php echo $row_brand_product['ma_san_pham'] ?>">
								          	<div class="mask1">
				                       			<div class="info1">
				                       				Quick View
				                       			</div>
						                  	</div>
					                  	</a>
			                    	</div>
		                      		
		                      		<?php 
		                      		if($row_brand_product['sales'] > 0){
		                      			echo "<h6>SALE  $sales</h6>";
		                      		}else{
		                      			echo "";
		                      		}
		                      		?>  

		                      		<?php if($row_brand_product['tinh_trang'] == 0){ ?>
			                      		<p style="display: inline-block; border: 1px solid #000; position: absolute;transform: rotate(90deg);right: -52px; top: 132px; padding-top: 1px "><img src="images/cai_no.jpg" style="width: 25px;height: 20px;vertical-align: middle;transform: rotate(92deg);">Tạm hết hàng<img src="images/cai_no.jpg" style="width: 25px;height: 20px;vertical-align: middle;transform: rotate(-87deg);">
			                      		</p>      
			                      	<?php }else{ ?>

			                      	<?php } ?>         		
							   </div>
					    	</div>
					    	
					    	<div class="price">
                      			<?php
							 		if($row_brand_product['sales'] > 0){
							 			echo "<span>$gia_fm</span>";
							 			echo "$gia_banfm";
							 		}else{
							 			echo "<strong>$gia_fm</strong>"; 
							 		}
							 	?> 				
                      		</div>
					    	
		    	      		<ul class="list-product">
							  	<li>
							  		<img class="imgs-product" src="images/plus.png" alt=""/>
							  		<ul class="icon1 sub-icon1 profile_img">
								  		<li>
								  			<?php if($row_brand_product['tinh_trang'] == 1){ ?>
									  			<?php if(empty($_SESSION['ma_khach_hang'])){ ?>
									  			<a class="active-icon c1" href="login.php" onclick="return confirm('Bạn cần có tài khoản thì mới được đặt mua sản phẩm');">Add To Bag </a>
									  			<?php }else{ ?>								  				
													<a class="active-icon c1" href="add_cart1.php?ma=<?php echo $row_brand_product["ma_san_pham"] ?>" onclick="return alert('Bạn đã thêm sản phẩm vào giỏ hàng');">Add To Bag </a>
												<?php } ?>
											<?php }else { ?>
												<a class="active-icon c1" style="cursor: pointer;" onclick="return alert('Sản phẩm tạm hết hàng');">Add To Bag </a>
								  			<?php } ?>
								  		</li>
								 	</ul>
							   	</li>
					     	</ul>
					     	<div class="clear"></div>
						</a>
					</div>
					<?php
						}
					?>
				</div>
			</div>
		</div>
		</div>
	</div>
	<div class="clear"></div>
	<div class="content-bottom unm">
			<div class="wrap">
				<div class="tao-trang-chi dil">
                    <div class="phan-trang-chi">                  
                        <div class="trang-chi-img del">
                            <img src="images/icons/policy-icon5.png" width="40px" height="40px" />
                        </div>  
                        <div class="trang-chi-text">
                            <h3>THANH TOÁN NHANH GỌN</h3>
                            <p>Nhận thanh toán trực tiếp hoặc chuyển khoản</p>
                        </div>          
                    </div>
                </div>
                <div class="tao-trang-chi">
                    <div class="phan-trang-chi">
                        <div class="trang-chi-img">
                            <img src="images/icons/policy-icon4-32x32.png" width="40px" height="40px" />
                        </div>
                        <div class="trang-chi-text">
                            <h3>NHIỀU ƯU ĐÃI HẤP DẪN</h3>
                            <p>Thường nhận được ưu đãi và giảm giá</p>
                        </div>
                    </div>
                </div>
                <div class="tao-trang-chi">
                    <div class="phan-trang-chi">
                        <div class="trang-chi-img">
                            <img src="images/icons/policy-icon3.png" width="40px" height="40px" />
                        </div>
                        <div class="trang-chi-text">
                            <h3>ĐỔI SIZE MIỄN PHÍ</h3>
                            <p>Đổi size trong thời gian 5 ngày</p>
                        </div>
                    </div>
                </div>
                <div class="tao-trang-chi">
                    <div class="phan-trang-chi">
                        <div class="trang-chi-img">
                            <img src="images/icons/policy-icon2.png" width="40px" height="40px" />
                        </div>
                        <div class="trang-chi-text">
                            <h3>HỖ TRỢ 24/12</h3>
                            <p>Hỗ trợ trực tuyến 24h/ngày</p>
                        </div>
                    </div>
                </div>
                <div class="tao-trang-chi">
                    <div class="phan-trang-chi">
                        <div class="trang-chi-img">
                            <img src="images/icons/policy-icon1.png" width="40px" height="40px" />
                        </div>
                        <div class="trang-chi-text">
                            <h3>GIAO HÀNG TOÀN QUỐC</h3>
                            <p>Nhận giao hàng tận nơi</p>
                        </div>
                    </div>
                </div>
			</div>
		</div>
		<script type="text/javascript">
			function checkPrice(){
				var dem = 0;
				var select_price = document.getElementById("select_price");
				var err_select_price = document.getElementById("err_select_price");
				var value_select_price = select_price.value;
				if (value_select_price == 0) {
					select_price.style.border = "2px solid red";
					err_select_price.innerHTML = "";
					dem++;
				}
				else{
					select_price.style.border = "2px solid white";
					err_select_price.innerHTML = "";
				}

				if(dem == 0){
					return true;
				}
				else{
					return false;
				}
			}
		</script>
	<?php include 'footer.php' ?>
</body>
</html>
