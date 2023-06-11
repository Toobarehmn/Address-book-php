<?php
require "config/constants.php";
session_start();
if(isset($_SESSION["uid"])){
	header("location:profile.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>BEAUTIFLIE</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
		
		<style>
			.panel1{
				
				box-shadow: 20px 20px 30px #a8e0f1 ;
			}
			.panel-heading{
				
				background-color: #f3d9dc;
				border: #f3d9dc 1px ;
             

           }

             .panel-info>.panel-heading{
			background-color: #f3d9dc;
            border-color: none;
			border-top-color: none;
            border-right-color: none;
            border-bottom-color: rgb(188, 232, 241);
            border-left-color: rgb(188, 232, 241);
			
          
           }
		   .btn-danger{
			color: #fff;
            background-color: #080808;
            border-color: #080808;}
			

			.panel-info{
			border-color: #bce8f1;
           border-top-color: rgb(8, 8, 8);
           border-right-color: rgb(8, 8, 8);
          border-bottom-color: rgb(8, 8, 8);
            border-left-color: rgb(8, 8, 8);}
		
			.footer{
             background-color: #080808;
             
			 color: #9d9d9d ;
  
			}
			
			
			
			   
			
			
			
		</style>
	</head>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only">navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand">BEAUTIFLIE</a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span>Product</a></li>
			</ul>
			<form class="navbar-form navbar-left">
		        <div class="form-group">
		          <input type="text" class="form-control" placeholder="Search" id="search">
		        </div>
		        <button type="submit" class="btn btn-primary" id="search_btn"><span class="glyphicon glyphicon-search"></span></button>
		     </form>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
					<div class="dropdown-menu" style="width:400px;">
						<div class="panel panel-success">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-3">Sl.No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in <?php echo CURRENCY; ?></div>
								</div>
							</div>

							<div class="panel-body">
								<div id="cart_product">
								<!--<div class="row">
									<div class="col-md-3">Sl.No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in $.</div>
								</div>-->
								</div>
							</div>
							<div class="panel-footer"></div>
						</div>
					</div>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>SignIn</a>
					<ul class="dropdown-menu">
						<div style="width:300px;">
							<div class="panel panel-primary">
								<div class="panel-heading">Login</div>
								<div class="panel-heading">
									<form onsubmit="return false" id="login">
										<label for="email">Email</label>
										<input type="email" class="form-control" name="email" id="email" required/>
										<label for="email">Password</label>
										<input type="password" class="form-control" name="password" id="password" required/>
										<p><br/></p>
										<a href="#" style="color:white; list-style:none;">Forgotten Password</a><input type="submit" class="btn btn-success" style="float:right;">
									</form>
								</div>
								<div class="panel-footer" id="e_msg"></div>
							</div>
						</div>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>	
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2 col-xs-12">
				<div id="get_category">
				</div>
				<!-- <div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Categories</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div> -->
				<div id="get_brand">
				</div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Brand</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div> -->
			</div>


			<div class="col-md-8 col-xs-12">
				<div class="row">
					<div class="col-md-12 col-xs-12" id="product_msg">
					</div>
				</div>
				<div class="panel1">
					<div class="panel-heading">Products</div>
					<div class="panel-body">
						<div id="get_product">
							<!--Here we get product jquery Ajax Request-->
						</div>
						
						<!-- <div class="col-md-4" style="padding-top: 5%;"  >
							<div class="panel panel-info">
								<div class="panel-heading" >mala</div>
								<div class="panel-body">
									<img class="images" src="product_images/">
								</div>
								<div class="panel-heading" >$.500.00
									<button style="float:right;" class="btn btn-danger btn-xs">AddToCart</button>
								</div>
							</div>
						</div>
						</div> -->
				
			</div>
				</div>
			</div>
			<br><br>
		</div>
		
	
	<br><br><br><br><br>

                 <!-- Footer -->
          <footer class="footer"> 

<section class="">
	<div class="container text-center text-md-start mt-5">

  <div class="row mt-3">
	 <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
		 <h3 class="text-uppercase fw-bold mb-4">
			<i class="fas fa-gem me-3"> </i>BEAUTIFLIE
		  </h3>
	   <p>
	   Our mission is to offer skincare products that will enhance
	    the appearance of our clients while providing a level of  confidence to our customers.
			</p>
		</div>

	 <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

		   <h3 class="text-uppercase fw-bold mb-4">
				Products
		</h3>
	  <p>
	 <a href="index.php" class="text-reset">cosmetics</a>
	 </p>
	   <p>
	  <a href="" class="text-reset">jewelry</a>
		 </p>

		   </div>

	  <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

	  <h3 class="text-uppercase fw-bold mb-4">
		 Useful links
		</h3>
	 <p>
	  <a href="#!" class="text-reset">Pricing</a>
		  </p>
			<p>
	  <a href="#!" class="text-reset">Settings</a>
	   </p>
	   <p>
		<a href="#!" class="text-reset">Orders</a>
		  </p>
		<p>
	<a href="#!" class="text-reset">Help</a>
 </p>
		 </div>

  <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

				<h3 class="text-uppercase fw-bold mb-4">Contact</h3>
					 <p><i class="fas fa-home me-3"></i> Johar karachi Pakistan, NY 10012</p>
				 <p>
					<i class="fas fa-envelope me-3"></i>
					   Beautiflie@gmail.com
			   </p>
	<p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
		  <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
</div>

</div>

</div>
</section>
</footer>
<!-- Footer -->


	
</body>
</html>
















































