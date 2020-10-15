<?php
	include_once "dbconnect.php";
    error_reporting (E_ALL ^ E_NOTICE);
    //session_start();
    ob_start();

    if(!isset($_SESSION['id_user'])){
        //redirect("login.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Online Book Store | Books</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<style type="text/css">
	.pagesearch{
		border: 1px black solid;
		margin: 20px;
	}
</style>
<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- header -->
	<div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">
				<p>SALE UP TO 30% OFF. <a href="books.php">SHOP NOW</a></p>
			</div>
			<div class="agile-login">
				<ul>
					<li><a href="registered.php"> Create Account </a></li>
					<li><a href="login.php">Login</a></li>
					
				</ul>
			</div>



			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="logo_products">
		<div class="container">
		<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>Order online or call us : (+0123) 234 567</li>
					
				</ul>
			</div>
			<div class="w3ls_logo_products_left">
				<h1><a href="index.php">Book Store</a></h1>
			</div>
		<div class="w3l_search">
			<form action="#" method="post">
				<input type="search" name="Search" placeholder="Search for a Book..." required="">
				<button type="submit" class="btn btn-default search" aria-label="Left Align" name="submit-search">
					<i class="fa fa-search" aria-hidden="true"> </i>
				</button>
				<div class="clearfix"></div>
			</form>
		</div>
			
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- navigation -->
	<div class="navigation-agileits">
		<div class="container">
			<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div> 
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">
									<li class="active"><a href="index.php" class="act">Home</a></li>	
									<!-- Mega Menu -->
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Books<b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														<h6>All Books</h6>
														<li><a href="books.php">Computer Science, Information & General Works.</a></li>
														<li><a href="books.php">Philosophy & Psychology</a></li>
														<li><a href="books.php">Religion</a></li>
														<li><a href="books.php">Social sciences</a></li>
														<li><a href="books.php">Literatures</a></li>
														<li><a href="books.php">Algebra</a></li>
													</ul>
												</div>		
												
											</div>
										</ul>
									</li>
									<li><a href="offers.php">Offers</a></li>
									<li><a href="contact.php">Contact</a></li>
								</ul>
							</div>
							</nav>
			</div>
		</div>
		
<!-- //navigation -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Books</li>

			</ol>
		</div>
	</div>
			<!-- Search Page -->										
	<div class="products">
		<?php

			if (!empty($_POST['Search'])) {
					$search = $_POST['Search'];
					$sql = "SELECT * FROM book_articles WHERE book_title LIKE '%$search%' OR book_details LIKE '%$search%'";
					$result = mysqli_query($conn, $sql);
					$queryResult = mysqli_num_rows($result);

		?>

		<div class="container" style="margin-bottom: 50px; text-decoration: underline; ">
			<h3><?php echo "There are " . $queryResult. " results!"?></h3>
		</div>

		<?php
			if ($queryResult > 0) {
				while ($row = mysqli_fetch_assoc($result)) {


			

		?>


		<div class="container" style="margin-bottom: 30px;">

			<div class="agileinfo_single">
				
				<div class="col-md-4 agileinfo_single_left">
					<a href="booksarticle.php"><img id="example" src="<?php echo $row['book_img']?>" alt=" " class="img-responsive"></a>
				</div>
				<div class="col-md-8 agileinfo_single_right">
				<h2><a href="booksarticle.php"><?php echo $row['book_title']?></h2></a>

					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
						
							<h3 class="m-sing"><?php echo $row['book_price']?></h3>

						</div>

					<div class="w3agile_description">
						<h4>Description :</h4>
						<p style="text-align: justify;"><a href="booksarticle.php" style="color: grey;"><?php echo $row['book_details']?></a></p>
					</div>

						<div class="snipcart-details agileinfo_single_right_details">
							<form action="#" method="post">
								<fieldset>
									<input type="hidden" name="cmd" value="_cart">
									<input type="hidden" name="add" value="1">
									<input type="hidden" name="business" value=" ">
									<input type="hidden" name="item_name" value="<?php echo $row['book_title']?>">
									<input type="hidden" name="amount" value="<?php echo $row['book_price']?>">
									<input type="hidden" name="discount_amount" value="1.00">
									<input type="hidden" name="currency_code" value="USD">
									<input type="hidden" name="return" value=" ">
									<input type="hidden" name="cancel_return" value=" ">

								</fieldset>
							</form>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
<?php
			}
		}
	}
	else if(!empty($_SESSION['X'])){
		$search = $_SESSION['X'];
		$sql = "SELECT * FROM book_articles WHERE book_title LIKE '%$search%' OR book_details LIKE '%$search%'";
		unset($_SESSION['X']);
		$result = mysqli_query($conn, $sql);
		$queryResult = mysqli_num_rows($result);
	
?>
		<div class="container" style="margin-bottom: 50px; text-decoration: underline; ">
			<h3><?php echo "There are " . $queryResult. " results!"?></h3>
		</div>

<?php
			if ($queryResult > 0) {
				while ($row = mysqli_fetch_assoc($result)) {	
?>
		<div class="container" style="margin-bottom: 30px;">

			<div class="agileinfo_single">
				
				<div class="col-md-4 agileinfo_single_left">
					<a href="booksarticle.php"><img id="example" src="<?php echo $row['book_img']?>" alt=" " class="img-responsive"></a>
				</div>
				<div class="col-md-8 agileinfo_single_right">
				<h2><a href="booksarticle.php"><?php echo $row['book_title']?></h2></a>

					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
						
							<h3 class="m-sing"><?php echo $row['book_price']?></h3>

						</div>

					<div class="w3agile_description">
						<h4>Description :</h4>
						<p style="text-align: justify;"><a href="booksarticle.php" style="color: grey;"><?php echo $row['book_details']?></a></p>
					</div>

						<div class="snipcart-details agileinfo_single_right_details">
							<form action="#" method="post">
								<fieldset>
									<input type="hidden" name="cmd" value="_cart">
									<input type="hidden" name="add" value="1">
									<input type="hidden" name="business" value=" ">
									<input type="hidden" name="item_name" value="<?php echo $row['book_title']?>">
									<input type="hidden" name="amount" value="<?php echo $row['book_price']?>">
									<input type="hidden" name="discount_amount" value="1.00">
									<input type="hidden" name="currency_code" value="USD">
									<input type="hidden" name="return" value=" ">
									<input type="hidden" name="cancel_return" value=" ">

								</fieldset>
							</form>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>

<?php
			}
		}
	}
?>
	</div>





<!-- //footer -->
<div class="footer">
		<div class="container">
			<div class="w3_footer_grids">
				<div class="col-md-3 w3_footer_grid">
					<h3>Contact</h3>
					
					<ul class="address">
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>1234k Avenue, 4th block, <span>New York City.</span></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">info@example.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 567</li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Information</h3>
					<ul class="info"> 
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="contact.php">Contact Us</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="books.php">Special Products</a></li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Profile</h3>
					<ul class="info"> 
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="books.php">Store</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="login.php">Login</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="registered.php">Create Account</a></li>
					</ul>
					
					
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		

		
	</div>	
	<div class="footer-botm">
			<div class="container">
				<div class="w3layouts-foot">
					<ul>
						<li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
						<li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="payment-w3ls">	
					<img src="images/card.png" alt=" " class="img-responsive">
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
<!-- //footer -->	
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<!-- top-header and slider -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<script src="js/minicart.min.js"></script>
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>
<!-- main slider-banner -->
<script src="js/skdslider.min.js"></script>
<link href="css/skdslider.css" rel="stylesheet">
<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
						
			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper').width(jQuery(this).val());
			});
			
		});
</script>	
<!-- //main slider-banner --> 

</body>
</html>

<?php
	}
	else{
    	$id = $_SESSION['id_user'];
    	$query = "SELECT * FROM users where User_ID='$id';";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
           $data = mysqli_fetch_assoc($result);
        }
        $name = $data['First_Name'];   			

?>
<!DOCTYPE html>
<html>
<head>
<title>Online Book Store | Books</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<style type="text/css">
	.pagesearch{
		border: 1px black solid;
		margin: 20px;
	}
</style>
<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- header -->
	<div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">
				<p>SALE UP TO 30% OFF. <a href="books.php">SHOP NOW</a></p>
			</div>
			<div class="agile-login">
				<ul>
					<li><a href="#"><?php echo $name;?></a></li>
					<li><a href="logout_conn.php">Logout</a></li>
					<li><a href="contact.php">Help</a></li>
					
				</ul>
			</div>
			<form action="#" method="post" class="last"> 
					<input type="hidden" name="cmd" value="_cart">
					<input type="hidden" name="display" value="1">
					<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
			</form>  


			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="logo_products">
		<div class="container">
		<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>Order online or call us : (+0123) 234 567</li>
					
				</ul>
			</div>
			<div class="w3ls_logo_products_left">
				<h1><a href="index.php">Book Store</a></h1>
			</div>
		<div class="w3l_search">
			<form action="#" method="post">
				<input type="search" name="Search" placeholder="Search for a Book..." required="">
				<button type="submit" class="btn btn-default search" aria-label="Left Align" name="submit-search">
					<i class="fa fa-search" aria-hidden="true"> </i>
				</button>
				<div class="clearfix"></div>
			</form>
		</div>
			
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- navigation -->
	<div class="navigation-agileits">
		<div class="container">
			<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div> 
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">
									<li class="active"><a href="index.php" class="act">Home</a></li>	
									<!-- Mega Menu -->
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Books<b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														<h6>All Books</h6>
														<li><a href="books.php">Computer Science, Information & General Works.</a></li>
														<li><a href="books.php">Philosophy & Psychology</a></li>
														<li><a href="books.php">Religion</a></li>
														<li><a href="books.php">Social sciences</a></li>
														<li><a href="books.php">Literatures</a></li>
														<li><a href="books.php">Algebra</a></li>
													</ul>
												</div>		
												
											</div>
										</ul>
									</li>
									<li><a href="offers.php">Offers</a></li>
									<li><a href="contact.php">Contact</a></li>
								</ul>
							</div>
							</nav>
			</div>
		</div>
		
<!-- //navigation -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Books</li>

			</ol>
		</div>
	</div>
			<!-- Search Page -->										
	<div class="products">
		<?php

			if (!empty($_POST['Search'])) {
					$search = $_POST['Search'];
					$sql = "SELECT * FROM book_articles WHERE book_title LIKE '%$search%' OR book_details LIKE '%$search%'";
					$result = mysqli_query($conn, $sql);
					$queryResult = mysqli_num_rows($result);

		?>

		<div class="container" style="margin-bottom: 50px; text-decoration: underline; ">
			<h3><?php echo "There are " . $queryResult. " results!"?></h3>
		</div>

		<?php
			if ($queryResult > 0) {
				while ($row = mysqli_fetch_assoc($result)) {


			

		?>


		<div class="container" style="margin-bottom: 30px;">

			<div class="agileinfo_single">
				
				<div class="col-md-4 agileinfo_single_left">
					<a href="booksarticle.php"><img id="example" src="<?php echo $row['book_img']?>" alt=" " class="img-responsive"></a>
				</div>
				<div class="col-md-8 agileinfo_single_right">
				<h2><a href="booksarticle.php"><?php echo $row['book_title']?></h2></a>

					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
						
							<h3 class="m-sing"><?php echo $row['book_price']?></h3>

						</div>

					<div class="w3agile_description">
						<h4>Description :</h4>
						<p style="text-align: justify;"><a href="booksarticle.php" style="color: grey;"><?php echo $row['book_details']?></a></p>
					</div>

						<div class="snipcart-details agileinfo_single_right_details">
							<form action="#" method="post">
								<fieldset>
									<input type="hidden" name="cmd" value="_cart">
									<input type="hidden" name="add" value="1">
									<input type="hidden" name="business" value=" ">
									<input type="hidden" name="item_name" value="<?php echo $row['book_title']?>">
									<input type="hidden" name="amount" value="<?php echo $row['book_price']?>">
									<input type="hidden" name="discount_amount" value="1.00">
									<input type="hidden" name="currency_code" value="USD">
									<input type="hidden" name="return" value=" ">
									<input type="hidden" name="cancel_return" value=" ">

								</fieldset>
							</form>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
<?php
			}
		}
	}
	else if(!empty($_SESSION['X'])){
		$search = $_SESSION['X'];
		$sql = "SELECT * FROM book_articles WHERE book_title LIKE '%$search%' OR book_details LIKE '%$search%'";
		unset($_SESSION['X']);
		$result = mysqli_query($conn, $sql);
		$queryResult = mysqli_num_rows($result);
	
?>
		<div class="container" style="margin-bottom: 50px; text-decoration: underline; ">
			<h3><?php echo "There are " . $queryResult. " results!"?></h3>
		</div>

<?php
			if ($queryResult > 0) {
				while ($row = mysqli_fetch_assoc($result)) {	
?>
		<div class="container" style="margin-bottom: 30px;">

			<div class="agileinfo_single">
				
				<div class="col-md-4 agileinfo_single_left">
					<a href="booksarticle.php"><img id="example" src="<?php echo $row['book_img']?>" alt=" " class="img-responsive"></a>
				</div>
				<div class="col-md-8 agileinfo_single_right">
				<h2><a href="booksarticle.php"><?php echo $row['book_title']?></h2></a>

					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
						
							<h3 class="m-sing"><?php echo $row['book_price']?></h3>

						</div>

					<div class="w3agile_description">
						<h4>Description :</h4>
						<p style="text-align: justify;"><a href="booksarticle.php" style="color: grey;"><?php echo $row['book_details']?></a></p>
					</div>

						<div class="snipcart-details agileinfo_single_right_details">
							<form action="#" method="post">
								<fieldset>
									<input type="hidden" name="cmd" value="_cart">
									<input type="hidden" name="add" value="1">
									<input type="hidden" name="business" value=" ">
									<input type="hidden" name="item_name" value="<?php echo $row['book_title']?>">
									<input type="hidden" name="amount" value="<?php echo $row['book_price']?>">
									<input type="hidden" name="discount_amount" value="1.00">
									<input type="hidden" name="currency_code" value="USD">
									<input type="hidden" name="return" value=" ">
									<input type="hidden" name="cancel_return" value=" ">

								</fieldset>
							</form>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>

<?php
			}
		}
	}
?>
	</div>





<!-- //footer -->
<div class="footer">
		<div class="container">
			<div class="w3_footer_grids">
				<div class="col-md-3 w3_footer_grid">
					<h3>Contact</h3>
					
					<ul class="address">
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>1234k Avenue, 4th block, <span>New York City.</span></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">info@example.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 567</li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Information</h3>
					<ul class="info"> 
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="contact.php">Contact Us</a></li>

						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="books.php">Special Products</a></li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Profile</h3>
					<ul class="info"> 
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="books.php">Store</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="logout_conn.php">Logout</a></li>

					</ul>
					
					
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		

		
	</div>	
	<div class="footer-botm">
			<div class="container">
				<div class="w3layouts-foot">
					<ul>
						<li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
						<li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="payment-w3ls">	
					<img src="images/card.png" alt=" " class="img-responsive">
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
<!-- //footer -->	
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<!-- top-header and slider -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<script src="js/minicart.min.js"></script>
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>
<!-- main slider-banner -->
<script src="js/skdslider.min.js"></script>
<link href="css/skdslider.css" rel="stylesheet">
<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
						
			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper').width(jQuery(this).val());
			});
			
		});
</script>	
<!-- //main slider-banner --> 

</body>
</html>
<?php
	}
?>