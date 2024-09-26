<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	
	<title><?php if (is_single() || is_page()) { wp_title('',true); } elseif(is_front_page()) { bloginfo('description'); } else { bloginfo('description'); } ?> | <?php bloginfo('name');?></title>
	
	<title>Nanabidho</title>
	
	<?php wp_head(); ?>
	
</head>
<body <?php body_class(); ?>>
	
	<!--Small screen menu-->
	<nav class="overlay">
    	<a>&times;</a>
    	<div class="overlay-content">
    		<nav class="menu"> 
    			<?php 
    				$args = array(
    					'theme_location' => 'primary_menu'
    				);
    				wp_nav_menu($args);
    			?>
    		</nav>
    	</div>
    </nav>
	
	<div class="small_s_search"> 
    	<a class="close_src">&times;</a>
		<?php get_search_form(); ?>
	</div>
	
	<!--Header-->
	
	<div class="container_full ht_bg"> 
		<div class="container"> 
			<div class="row"> 
				
				<div id="header_t"> 
    				<div class="col-lg-12 col-md-12 col-xs-12" style="padding:0"> 
    				
    					<div class="col-lg-4 col-md-3 col-xs-12 cl3" style="padding:0"> 
    						<div id="web_trs"> 
    							<p>Trusted Online Shopping Site in Bangladesh</p>
    						</div>
    					</div>
    					
    					<div class="col-lg-4 col-md-6 col-xs-6 cl3"> 
    						<div id="web_trs"> 
    							<p>+8801314116293 (9am to 4pm)</p>
    						</div>
    					</div>
    					
    					<div class="col-lg-4 col-md-3 col-xs-6 cl3"> 
    						<div id="web_trs">
    						    <nav>
    						        <ul>
    						            <li><a href="#">How to Buy</a></li>
    						            <li><a href="#">About Us</a></li>
    						        </ul>
    						    </nav>
    						</div>
    					</div>
    					
					</div>
				</div>
				
			</div>
		</div>
	</div>
	
	
	<div class="rd_bg" style="border-bottom:1px solid #ddd"> 
		<div class="container"> 
			<div class="row"> 
				
			    <div class="sh_t">
			        <div class="sm_h col-lg-12 col-md-12 col-xs-12" style="padding:0">
    					<div class="col-lg-3 col-md-3 col-xs-3 cl3" style="padding:0"> 
    					    <div class="sm_ms"><span id="sm_menu" style="cursor:pointer">&#9776;</span></div>
    					</div>
        					
    					<div class="col-lg-3 col-md-3 col-xs-3 cl3" style="padding:0"> 
    						<div id="sm_s" class="sm_ms"> 
    							<i style="font-size:18px" class="fa fa-search" aria-hidden="true"></i>
    						</div>
    					</div>
    					
    					<div class="col-lg-3 col-md-3 col-xs-3 cl3" style="padding:0"> 
    						<div class="sm_ms"><a href="https://infiniteintentionbd.com/cart/">
    							<i class="fas fa-shopping-cart"></i>
                					<?php infiniteintention_header_cart(); ?>
                				</a>
    						</div>
    					</div>
    					
    					<div class="col-lg-3 col-md-3 col-xs-3 cl3" style="padding:0"> 
    						<div class="sm_ms">
    						    <a href="https://infiniteintentionbd.com/my-account/"><i class="far fa-user"></i></a>
    						</div>
    					</div>
					</div>
			    </div>
				
			</div>
		</div>
	</div>
	
	
	<div class="container_full rd_bg"> 
		<div class="container"> 
			<div class="row"> 
				
				<div class="col-lg-12 col-md-12 col-xs-12 cl12" style="padding:0"> 
					<div class="web_image"> 
						<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.PNG" alt="" /></a>
					</div>
				</div>
					
			</div>
		</div>
	</div>
	
	<div class="container_full header_bg"> 
		<div class="container"> 
			<div class="row"> 
				
				<div id="header"> 
    				<div class="col-lg-12 col-md-12 col-xs-12 hd_i" style="padding:0"> 
    				
    					<div class="col-lg-3 col-md-3 col-xs-8 cl3" style="padding:0"> 
    						<div class="web_image"> 
    							<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.PNG" alt="" /></a>
    						</div>
    					</div>
    					
    					<div class="col-lg-6 col-md-6 col-xs-8 cl6 src_mid"> 
    						<div id="search"> 
    							<?php get_search_form(); ?>
    						</div>
    					</div>
    					
    					<div class="col-lg-2 col-md-2 col-xs-8 cl2"> 
    						<div id="cart_opt"><a href="https://infiniteintentionbd.com/cart/">
    							<nav class="cart_total">
                					<?php infiniteintention_header_cart(); ?>
                					<a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
                				    <i class="fas fa-shopping-cart"></i>
                				</nav></a>
    						</div>
    					</div>
    					
    					<div class="col-lg-1 col-md-1 col-xs-8 cl1" style="padding:0"> 
    						<div id="acnt"><a href="https://infiniteintentionbd.com/my-account/">
    							<p><i class="far fa-user"></i>Account</p>
    							</a>
    						</div>
    					</div>
    					
					</div>
				</div>
				
			</div>
		</div>
	</div>
	
	<!--Manu-->
	<div class="container_full menu_bg"> 
		<div class="container"> 
			<div class="row"> 
				
				<nav class="menu"> 
					<?php 
						$args = array(
							'theme_location' => 'primary_menu'
						);
						wp_nav_menu($args);
					?>
				</nav>
			</div>
		</div>
	</div>
		    
		    
	