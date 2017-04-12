<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if gt IE 9]> <html lang="en" class="ie"> <![endif]-->
<!--[if !IE]><!-->
<html dir="ltr" lang="en">
	<!--<![endif]-->

	<head>
		<meta charset="utf-8">
		<title><?=$pageTitle?></title>
		<meta name="description" content="The Project a Bootstrap-based, Responsive HTML5 Template">
		<meta name="author" content="htmlcoder.me">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Favicon -->
		<link rel="shortcut icon" href="<?=base_url('assets/template/images/favicon.ico')?>">

		<!-- Web Fonts -->
		<link href='//fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>

		<!-- Bootstrap core CSS -->
		<link href="<?=base_url('assets/template/bootstrap/css/bootstrap.css')?>" rel="stylesheet">

		<!-- Font Awesome CSS -->
		<link href="<?=base_url('assets/template/fonts/font-awesome/css/font-awesome.css')?>" rel="stylesheet">

		<!-- Fontello CSS -->
		<link href="<?=base_url('assets/template/fonts/fontello/css/fontello.css')?>" rel="stylesheet">

		<!-- Plugins -->
		<link href="<?=base_url('assets/template/plugins/magnific-popup/magnific-popup.css')?>" rel="stylesheet">
		<link href="<?=base_url('assets/template/plugins/rs-plugin-5/css/settings.css')?>" rel="stylesheet">
		<link href="<?=base_url('assets/template/plugins/rs-plugin-5/css/layers.css')?>" rel="stylesheet">
		<link href="<?=base_url('assets/template/plugins/rs-plugin-5/css/navigation.css')?>" rel="stylesheet">
		<link href="<?=base_url('assets/template/css/animations.css')?>" rel="stylesheet">
		<link href="<?=base_url('assets/template/plugins/owlcarousel2/assets/owl.carousel.min.css')?>" rel="stylesheet">
		<link href="<?=base_url('assets/template/plugins/owlcarousel2/assets/owl.theme.default.min.css')?>" rel="stylesheet">
		<link href="<?=base_url('assets/template/plugins/hover/hover-min.css')?>" rel="stylesheet">		
		
		<!-- The Project's core CSS file -->
		<!-- Use css/rtl_style.css for RTL version -->
		<link href="<?=base_url('assets/template/css/style.css')?>" rel="stylesheet" >
		<!-- The Project's Typography CSS file, includes used fonts -->
		<!-- Used font for body: Roboto -->
		<!-- Used font for headings: Raleway -->
		<!-- Use css/rtl_typography-default.css for RTL version -->
		<link href="<?=base_url('assets/template/css/typography-default.css')?>" rel="stylesheet" >
		<!-- Color Scheme (In order to change the color scheme, replace the blue.css with the color scheme that you prefer)-->
		<link href="<?=base_url('assets/template/css/skins/light_blue.css')?>" rel="stylesheet">
		

		<!-- Custom css --> 
		<link href="<?=base_url('assets/template/css/custom.css')?>" rel="stylesheet">
		<script src="//apis.google.com/js/platform.js" async defer></script>

		<meta name="google-signin-client_id" content="955612680288-m8287a31k3ejdceehpsr466bg38bpa56.apps.googleusercontent.com">
		<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else {
      // The person is not logged into your app or we are unable to tell.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '101771350361172',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.8' // use graph api version 2.8
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me?fields=name,email', function(response) {
    	console.log(response);
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';

        $.post("<?=base_url('api/facebooklogin')?>",response, function(data){
			  	//if(data.status == "OK") {
			  		location.href='<?=base_url("magicdoor/dashboard")?>';
			  	//}
			  });
    });
  }
</script>
		<script type="text/javascript" src="<?=base_url('assets/template/plugins/jquery.min.js')?>"></script>
	</head>

	<!-- body classes:  -->
	<!-- "boxed": boxed layout mode e.g. <body class="boxed"> -->
	<!-- "pattern-1 ... pattern-9": background patterns for boxed layout mode e.g. <body class="boxed pattern-1"> -->
	<!-- "transparent-header": makes the header transparent and pulls the banner to top -->
	<!-- "gradient-background-header": applies gradient background to header -->
	<!-- "page-loader-1 ... page-loader-6": add a page loader to the page (more info @components-page-loaders.html) -->
	<body class="no-trans  transparent-header  ">

		<!-- scrollToTop -->
		<!-- ================ -->
		<div class="scrollToTop circle"><i class="icon-up-open-big"></i></div>
		
		<!-- page wrapper start -->
		<!-- ================ -->
		<div class="page-wrapper">
		
			<!-- header-container start -->
			<div class="header-container">
				
				
				<!-- header start -->
				<!-- classes:  -->
				<!-- "fixed": enables fixed navigation mode (sticky menu) e.g. class="header fixed clearfix" -->
				<!-- "dark": dark version of header e.g. class="header dark clearfix" -->
				<!-- "full-width": mandatory class for the full-width menu layout -->
				<!-- "centered": mandatory class for the centered logo layout -->
				<!-- ================ --> 
				<header class="header  fixed  full-width  clearfix">
					
								<!-- header-second start -->
								<!-- ================ -->
								<div class="header-second clearfix">
									
								<!-- main-navigation start -->
								<!-- classes: -->
								<!-- "onclick": Makes the dropdowns open on click, this the default bootstrap behavior e.g. class="main-navigation onclick" -->
								<!-- "animated": Enables animations on dropdowns opening e.g. class="main-navigation animated" -->
								<!-- "with-dropdown-buttons": Mandatory class that adds extra space, to the main navigation, for the search and cart dropdowns -->
								<!-- ================ -->
								<div class="main-navigation  animated with-dropdown-buttons">

									<!-- navbar start -->
									<!-- ================ -->
									<nav class="navbar navbar-default" role="navigation">
										<div class="container-fluid">

											<!-- Toggle get grouped for better mobile display -->
											<div class="navbar-header">
												<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
													<span class="sr-only">Toggle navigation</span>
													<span class="icon-bar"></span>
													<span class="icon-bar"></span>
													<span class="icon-bar"></span>
												</button>
												
												<!-- header-first start -->
												<!-- ================ -->
												<div class="header-first clearfix ">

													<!-- logo -->
													<div id="logo-mobile" class="logo">
														<a href="index.html"><img id="logo-img-mobile" src="<?=base_url('assets/template/images/logo_light_blue.png')?>" alt="The Project"></a>
													</div>

													<!-- name-and-slogan -->
													<div class="site-slogan hidden-xs">
														Multipurpose HTML5 Template
													</div>

												</div>
												<!-- header-first end -->
												
											</div>

											<!-- Collect the nav links, forms, and other content for toggling -->
											<div class="collapse navbar-collapse" id="navbar-collapse-1">
												<!-- main-menu -->
												<ul class="nav navbar-nav navbar-right">

													
													<li <?=$pageName=="index"?'class="active"':''?>>
														<a href="<?=base_url('')?>">Home</a>
														
													</li>
													<li <?=$pageName=="about"?'class="active"':''?>>
														<a href="<?=base_url('about')?>">About</a>
														
													</li>
													<li <?=$pageName=="products"?'class="active"':''?>>
														<a href="<?=base_url('products')?>">Products</a>
														
													</li>
													<li <?=$pageName=="contactus"?'class="active"':''?>>
														<a href="<?=base_url('contactus')?>">Contact Us</a>
														
													</li>
													
													
												</ul>
												<!-- main-menu end -->
												
												<!-- header dropdown buttons -->
												<div class="header-dropdown-buttons hidden-xs hidden-sm">
													<div class="btn-group dropdown">
														<button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-search"></i></button>
														<ul class="dropdown-menu dropdown-menu-right dropdown-animation">
															<li>
																<form role="search" class="search-box margin-clear">
																	<div class="form-group has-feedback">
																		<input type="text" class="form-control" placeholder="Search">
																		<i class="icon-search form-control-feedback"></i>
																	</div>
																</form>
															</li>
														</ul>
													</div>
													<div class="btn-group dropdown">
														<button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-basket-1"></i><span class="cart-count default-bg">8</span></button>
														<ul class="dropdown-menu dropdown-menu-right dropdown-animation cart">
															<li>
																<table class="table table-hover">
																	<thead>
																		<tr>
																			<th class="quantity">QTY</th>
																			<th class="product">Product</th>
																			<th class="amount">Subtotal</th>
																		</tr>
																	</thead>
																	<tbody>
																		<tr>
																			<td class="quantity">2 x</td>
																			<td class="product"><a href="shop-product.html">Android 4.4 Smartphone</a><span class="small">4.7" Dual Core 1GB</span></td>
																			<td class="amount">$199.00</td>
																		</tr>
																		<tr>
																			<td class="quantity">3 x</td>
																			<td class="product"><a href="shop-product.html">Android 4.2 Tablet</a><span class="small">7.3" Quad Core 2GB</span></td>
																			<td class="amount">$299.00</td>
																		</tr>
																		<tr>
																			<td class="quantity">3 x</td>
																			<td class="product"><a href="shop-product.html">Desktop PC</a><span class="small">Quad Core 3.2MHz, 8GB RAM, 1TB Hard Disk</span></td>
																			<td class="amount">$1499.00</td>
																		</tr>
																		<tr>
																			<td class="total-quantity" colspan="2">Total 8 Items</td>
																			<td class="total-amount">$1997.00</td>
																		</tr>
																	</tbody>
																</table>
																<div class="panel-body text-right">
																	<a href="shop-cart.html" class="btn btn-group btn-gray btn-sm">View Cart</a>
																	<a href="shop-checkout.html" class="btn btn-group btn-gray btn-sm">Checkout</a>
																</div>
															</li>
														</ul>
													</div>
												</div>
												<!-- header dropdown buttons end-->
												
											</div>

										</div>
									</nav>
									<!-- navbar end -->

								</div>
								<!-- main-navigation end -->
								</div>
								<!-- header-second end -->
					
				</header>
				<!-- header end -->
			</div>
			<!-- header-container end -->

