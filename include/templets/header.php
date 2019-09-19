


<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.smartaddons.com/templates/html/market/home3.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Aug 2019 22:35:55 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    
    <!-- Basic page needs
	============================================ -->
	<title><?php echo getTitle() ?></title>
	<meta charset="utf-8">
    <meta name="keywords" content="boostrap, responsive, html5, css3, jquery, theme, multicolor, parallax, retina, business" />
    <meta name="author" content="Magentech">
    <meta name="robots" content="index, follow" />
   
	<!-- Mobile specific metas
	============================================ -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	
	<!-- Favicon
	============================================ -->
    <link rel="shortcut icon" href="ico/favicon.png">
	
	<!-- Google web fonts
	============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Libs CSS
============================================ -->
    <link rel="stylesheet" href="them/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="them/css/bootstrap/css/bootstrap-extend.min599c.css">
	<link href="them/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="them/js/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="them/js/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link href="them/css/themecss/lib.css" rel="stylesheet">
	<link href="them/js/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <link rel="stylesheet" href="admin/global/vendor/bootstrap-select/bootstrap-select.min599c.css?v4.0.2">


    <!-- Theme CSS
============================================ -->
    <link href="them/css/themecss/so_megamenu.css" rel="stylesheet">
    <link href="them/css/themecss/so-categories.css" rel="stylesheet">
	<link href="them/css/themecss/so-listing-tabs.css" rel="stylesheet">
    <link href="them/css/themecss/mystyle.css" rel="stylesheet">
	<link href="them/css/footer1.css" rel="stylesheet">
	<link href="them/css/header3.css" rel="stylesheet">
	<link id="color_scheme" href="them/css/home3.css" rel="stylesheet">
	<link href="them/css/responsive.css" rel="stylesheet">
    <link rel="stylesheet"  href="admin\them\css\style.css">

    <link rel="stylesheet" src="admin/global/css/bootstrap.min599c.css?v4.0.2">
    <link rel="stylesheet" src="admin/global/css/bootstrap-extend.min599c.css?v4.0.2">
    <link rel="stylesheet" href="assets/css/site.min599c.css?v4.0.2">

    <!-- Skin tools (demo site only) -->
    <link rel="stylesheet" src="admin/global/css/skintools.min599c.css?v4.0.2">
    <script src="assets/js/Plugin/skintools.min599c.js?v4.0.2"></script>



    <!-- Plugins For This Page -->
    <link rel="stylesheet" src="admin/global/vendor/bootstrap-select/bootstrap-select.min599c.css?v4.0.2">


    <!-- Page -->


</head>

<body class="common-home res layout-home3">
	
    <div id="wrapper" class="wrapper-full banners-effect-8">
	
	
	<!-- Header Container  -->
	<header id="header" class=" variantleft type_3">
	<!-- Header Top -->
	<div class="header-top">
		<div class="container">
			<div class="row">
				<div class="header-top-left form-inline col-lg-6 col-md-5 col-sm-6 compact-hidden hidden-sm ">
					<div class="form-group navbar-welcome " >
Welcome to market <a href="join.php"><strong> Join Free</strong></a>
					</div>
				</div>
				<div class="header-top-right collapsed-block text-right col-lg-6 col-md-7 col-sm-12 col-xs-12 compact-hidden">
					<h5 class="tabBlockTitle visible-xs">More<a class="expander " href="#TabBlock-1"><i class="fa fa-angle-down"></i></a></h5>
					<div class="tabBlock" id="TabBlock-1">
						<ul class="top-link list-inline">
                <?php
                if (isset($_SESSION['user'])){


                   echo '<li class="account btn-group" id="my_account">';
					echo '<a href="" title="My Account" class="btn btn-xs dropdown-toggle" data-toggle="dropdown"> <span class="hidden-xs">' . $_SESSION['user'];;
                   echo '</span> <span class="fa fa-angle-down"></span></a>';
							echo	'<ul class="dropdown-menu ">';
								echo '<li><a href="profile.php"><i class="fa fa-user"></i> Hesabım</a></li>';
                                echo '<li><a href="newitem.php"><i class="fab fa-product-hunt"></i> Yeni ürün</a></li>';
								echo '<li><a href="logout.php"><i class="fa fa-pencil-square-o"></i> Logout</a></li>';
							echo	'</ul>';
							echo'</li>';
                                            $userstatus = checkUserStatus($_SESSION['user']);

                                            if($userstatus  == $_SESSION['user']){


                                            }
                                        }else {
                    echo '<li class="account btn-group" id="my_account"><a href="login.php">login</a></li>';
                                        }
                                        ?>

							<li class="wishlist"><a href="wishlist.html" id="wishlist-total" class="top-link-wishlist" title="Wish List (2)"><span class="hidden-xs">Wish List (2)</span></a></li>
							<li class="checkout"><a href="checkout.html" class="top-link-checkout" title="Checkout"><span class="hidden-xs">Checkout</span></a></li>
							
						</ul>
						<div class="form-group languages-block ">
							<form action="http://demo.smartaddons.com/templates/html/market/index.html" method="post" enctype="multipart/form-data" id="bt-language">
								<a class="btn btn-xs dropdown-toggle" data-toggle="dropdown">
									<img src="them/image/demo/flags/gb.png" alt="English" title="English">
									<span class="hidden-xs">English</span>
									<span class="fa fa-angle-down"></span>
								</a>
								<ul class="dropdown-menu">
									<li><a href="#"><img class="image_flag" src="them/image/demo/flags/gb.png" alt="English" title="English" /> English </a></li>
									<li> <a href="#"> <img class="image_flag" src="them/image/demo/flags/lb.png" alt="Arabic" title="Arabic" /> Arabic </a> </li>
								</ul>
							</form>
						</div>

						<div class="form-group currencies-block">
							<form action="http://demo.smartaddons.com/templates/html/market/index.html" method="post" enctype="multipart/form-data" id="currency">
								<a class="btn btn-xs dropdown-toggle" data-toggle="dropdown">
									<span class="icon icon-credit "></span> US Dollar <span class="fa fa-angle-down"></span>
								</a>
								<ul class="dropdown-menu btn-xs">
									<li> <a href="#">(€)&nbsp;Euro</a></li>
									<li> <a href="#">(£)&nbsp;Pounds	</a></li>
									<li> <a href="#">($)&nbsp;US Dollar	</a></li>
								</ul>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //Header Top -->

	<!-- Header center -->
	<div class="header-center left">
		<div class="container">
			<div class="row">
				<!-- Logo -->
				<div class="navbar-logo col-md-3 col-sm-12 col-xs-12">
					<a href="index.php"><img src="them/image/demo/logos/theme_logo.png" title="Your Store" alt="Your Store" /></a>
				</div>
				<!-- //end Logo -->



				<!-- Secondary menu -->
				<div class="col-md-2 col-sm-3 col-xs-12 shopping_cart pull-right">
					<!--cart-->
					<div id="cart" class=" btn-group btn-shopping-cart">
						<a href="<?php 
                                        
                                        if (isset($_SESSION['uid']) > 0){

                                            echo "cart.php";
                                        }else{
                                            echo "login.php";
                                        }
                                        
                                        
                                        ?>" data-loading-text="Loading..." class="top_cart dropdown-toggle">
							<div class="shopcart">
								<span class="handle pull-left"></span>
								<span class="title">My cart</span>
								<p class="text-shopping-cart cart-total-full">2 item(s)</p>
							</div>
						</a>

						<ul class="tab-content content dropdown-menu pull-right shoppingcart-box" role="menu">
							<li>
								<table class="table table-striped">
									<tbody>
										<tr>
											<td class="text-center" style="width:70px">
												<a href="product.html"> <img src="them/image/demo/shop/product/resize/2.jpg" style="width:70px" alt="Filet Mign" title="Filet Mign" class="preview"> </a>
											</td>
											<td class="text-left"> <a class="cart_product_name" href="product.html">Filet Mign</a> </td>
											<td class="text-center"> x1 </td>
											<td class="text-center"> $1,202.00 </td>
											<td class="text-right">
												<a href="product.html" class="fa fa-edit"></a>
											</td>
											<td class="text-right">
												<a onclick="cart.remove('2');" class="fa fa-times fa-delete"></a>
											</td>
										</tr>
										<tr>
											<td class="text-center" style="width:70px">
												<a href="product.html"> <img src="them/image/demo/shop/product/resize/3.jpg" style="width:70px" alt="Canon EOS 5D" title="Canon EOS 5D" class="preview"> </a>
											</td>
											<td class="text-left"> <a class="cart_product_name" href="product.html">Canon EOS 5D</a> </td>
											<td class="text-center"> x1 </td>
											<td class="text-center"> $60.00 </td>
											<td class="text-right">
												<a href="product.html" class="fa fa-edit"></a>
											</td>
											<td class="text-right">
												<a onclick="cart.remove('1');" class="fa fa-times fa-delete"></a>
											</td>
										</tr>
									</tbody>
								</table>
							</li>
							<li>
								<div>
									<table class="table table-bordered">
										<tbody>
											<tr>
												<td class="text-left"><strong>Sub-Total</strong>
												</td>
												<td class="text-right">$1,060.00</td>
											</tr>
											<tr>
												<td class="text-left"><strong>Eco Tax (-2.00)</strong>
												</td>
												<td class="text-right">$2.00</td>
											</tr>
											<tr>
												<td class="text-left"><strong>VAT (20%)</strong>
												</td>
												<td class="text-right">$200.00</td>
											</tr>
											<tr>
												<td class="text-left"><strong>Total</strong>
												</td>
												<td class="text-right">$1,262.00</td>
											</tr>
										</tbody>
									</table>
									<p class="text-right"> <a class="btn view-cart" href="cart.html"><i class="fa fa-shopping-cart"></i>View Cart</a>&nbsp;&nbsp;&nbsp; <a class="btn btn-mega checkout-cart" href="checkout.html"><i class="fa fa-share"></i>Checkout</a> </p>
								</div>
							</li>
						</ul>
					</div>
					<!--//cart-->
				</div>
			</div>

		</div>
	</div>
	<!-- //Header center -->

	<!-- Header Bottom -->
	<div class="header-bottom">
		<div class="container">
			<div class="row">
				<div class="sidebar-menu megamenu-hori col-md-8 col-sm-4 col-xs-6 ">
					<div class="responsive so-megamenu ">
	<nav class="navbar-default">
		<div class=" container-megamenu  horizontal">

			<div class="navbar-header">
				<button type="button" id="show-megamenu" data-toggle="collapse" class="navbar-toggle">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
Navigation
			</div>

			<div class="megamenu-wrapper">
				<span id="remove-megamenu" class="fa fa-times"></span>
				<div class="megamenu-pattern">
					<div class="container">
						<ul class="megamenu " data-transition="slide" data-animationtime="250">
							<li class="home hover">
								<a href="index.php">anasayfa</a>
							</li>
							<li class="with-sub-menu hover">

                                <a href="#" class="clearfix">
                                    <strong>hizmetlermiz</strong>                                </a>
							</li>
							<li class="with-sub-menu hover">
								<a href="#" class="clearfix">
									<strong>fırsat</strong>
								</a>
							</li>
							<li class="with-sub-menu hover">
								<p class="close-menu"></p>
								<a href="#" class="clearfix">
									<strong>satıcı ol</strong>
									<span class="label"></span>
								</a>
							</li>
						</ul>
						
					</div>
				</div>
			</div>
		</div>
	</nav>
</div>
										</div>
				
				<!-- Search -->
				<div class="header-bottom-right  collapsed-block col-md-4 col-sm-8 col-xs-6 ">
					<h5 class="tabBlockTitle visible-xs"><i class="fa fa-search"></i> Search <a class="expander " href="#sosearchpro"><i class="fa fa-angle-down"></i></a></h5>
					<div id="sosearchpro" class="col-sm-7 search-pro tabBlock">
						<form method="GET" action="http://demo.smartaddons.com/templates/html/market/index.html">
							<div id="search0" class="search input-group">
								<input class="autosearch-input form-control" type="text" value="" size="50" autocomplete="off" placeholder="Search" name="search">
								<span class="input-group-btn">
								<button type="submit" class="button-search btn btn-primary" name="submit_search"><i class="fa fa-search"></i></button>
								</span>
							</div>
							<input type="hidden" name="route" value="product/search" />
						</form>
					</div>
				</div>
				<!-- //end Search -->
				
			</div>
		</div>

	</div>

	<!-- Navbar switcher -->
	<!-- //end Navbar switcher -->
	</header>
	<!-- //Header Container  -->
