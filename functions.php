<?php

function Calling_Our_Resource(){
	
	wp_enqueue_style('main_style', get_stylesheet_uri(), '' , '1.0.0');
	wp_enqueue_style('bootstrapcss' , get_template_directory_uri() . '/css/bootstrap.min.css' , '1.0.0');
	wp_enqueue_style('nivo_theme', get_template_directory_uri() . '/themes/default/default.css', '1.0.0');
	wp_enqueue_style('nivo_css' , get_template_directory_uri() . '/css/nivo-slider.css' , '1.0.0');
	wp_enqueue_style('responsive' , get_template_directory_uri() . '/responsive.css' , '1.0.0');
	wp_enqueue_style('owl_css' , get_template_directory_uri() . '/css/owl.carousel.min.css' , '1.0.0');
	
	wp_enqueue_script('jquery_js', get_template_directory_uri() . '/js/jquery-1.9.0.min.js', '', '1.9.0');
	wp_enqueue_script('jquery_js', get_template_directory_uri() . '/js/jquery-1.9.0.min.js', '', '1.9.0');
	wp_enqueue_script('nivo_js', get_template_directory_uri() . '/js/jquery.nivo.slider.js', '', '1.0.0');
	wp_enqueue_script('owl_js', get_template_directory_uri() . '/js/owl.carousel.js', '3.0.0');
	
}

add_action('wp_enqueue_scripts' , 'Calling_Our_Resource');

function our_theme_setup(){
	register_nav_menus(array(
		'primary_menu' => 'Primary Menu',
		'agr_pro'  => 'Agriculture Product',
		'menu_cart'  => 'Menu Cart',
		'mobile_menu'  => 'Mobile Menu',
	));
	

	
	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title
	add_theme_support( 'title-tag' );

	// Support for WooCommerce
	add_theme_support( 'woocommerce', array(
		'product_grid' => array(
			'min_columns' => 2,
			'max_columns' => 8,
		),
	) );

	//Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );


	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Enable support for post formats
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat',
	) );


	// Enable support for Custom Logo
	add_theme_support( 'custom-logo', array(
		'width'		=> '',
		'height'	=> '',
		'flex-height' => true,
		'flex-width'  => true,
	) );

	// Enable support for widgets selective refresh
	add_theme_support( 'customize-selective-refresh-widgets' );


	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	
}
add_action('after_setup_theme' , 'our_theme_setup');



// Sidebar Register
add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar( array(
		'name'          => esc_html__( 'Shop Filters', 'infinityintention' ),
		'id'            => 'left_sidebar',
		'description'   => esc_html__( 'Horizontal widget area for product archives. Requires WooCommerce plugin.', 'infinityintention' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="shop-filters-widget-title">',
		'after_title'   => '</h4>',
	) );
}

// Add remove woocommerce defaults functions
add_action( 'init', 'infiniteintention_add_remove_woocommerce_defaults_functions' );

function infiniteintention_add_remove_woocommerce_defaults_functions() {
	
	// Shop page
	remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10, 0 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30, 0 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20, 0 );
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	 
	// Single page
    // remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
    // add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 25 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	
}


/**Pagination**/

function infiniteintention_pagination() {

global $wp_query;

$big = 999999999; // need an unlikely integer

$pages = paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'type'  => 'array',
		'prev_next'          => true,
		'prev_text'          => __('<i class="fa fa-angle-left"></i>'),
		'next_text'          => __('<i class="fa fa-angle-right"></i>'),

    ) );
    if( is_array( $pages ) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<div class="pagination-container"><ul class="list-inline list-unstyled">';
        foreach ( $pages as $page ) {
                echo "<li><a>$page</a></li>";
        }
       echo '</ul></div>';
        }
}



/**Sale-splash**/

add_filter( 'woocommerce_gallery_thumbnail_size', 'infiniteintention_woocommerce_gallery_thumbnail_size' );

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );

add_action( 'woocommerce_before_shop_loop_item_title', 'infiniteintention_before_loop_sale_flash', 7);
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 8 );
add_action( 'woocommerce_before_shop_loop_item_title', 'infiniteintention_after_loop_sale_flash', 9);

add_action( 'woocommerce_before_single_product_summary', 'infiniteintention_before_loop_sale_flash', 9);
add_action( 'woocommerce_before_single_product_summary', 'infiniteintention_after_loop_sale_flash', 11);


if ( !function_exists('infiniteintention_before_loop_sale_flash') ) {
	function infiniteintention_before_loop_sale_flash() {
		global $product;
		if ( $product->is_on_sale() ) {
			echo '<div class="sale-flash">';
		}
	}
}


if ( !function_exists('infiniteintention_after_loop_sale_flash') ) {
	function infiniteintention_after_loop_sale_flash() {
		global $product;
		if ( $product->is_on_sale() ) {			
			if ( ! $product->is_type( 'variable' ) && $product->get_regular_price() && $product->get_sale_price() ) {
				$discount_price = $product->get_regular_price() - $product->get_sale_price();
				if ( $discount_price > 0 ) {
					$max_percentage = ( $discount_price  / $product->get_regular_price() ) * 100;
				} else {
					$max_percentage = 0;
				}
			} else {
				$max_percentage = 0;				
				foreach ( $product->get_children() as $child_id ) {
					$variation = wc_get_product( $child_id );
					$price = $variation->get_regular_price();
					$sale = $variation->get_sale_price();
					$percentage = '';
					if ( $price != 0 && ! empty( $sale ) ) {
						$percentage = ( $price - $sale ) / $price * 100;
					}
					if ( $percentage > $max_percentage ) {
						$max_percentage = $percentage;
					}
				}
			}
			echo '<br /><span class="sale-percentage">-' . esc_html( round($max_percentage) ) . '%</span>';
			echo '</div>';
		}
	}
}


/**End sell-splash**/





/**Cart and whitwlist**/

if ( !function_exists( 'infiniteintention_header_wishlist' ) ) {
	function infiniteintention_header_wishlist() {
		if ( class_exists( 'WooCommerce' ) ) {
			if ( class_exists( 'YITH_WCWL' ) ) { ?>
				<div class="top-wishlist"><a class="infiniteintention-wishlist" href="<?php echo esc_url( YITH_WCWL()->get_wishlist_url() ); ?>" role="button"><span class="icons infiniteintention-icon-heart"></span><span class="wishlist_products_counter_number"><?php echo yith_wcwl_count_all_products(); ?></span></a></div>
			<?php } elseif ( class_exists( 'TInvWL' ) ) { ?>
				<div class="top-wishlist"> <?php
				echo do_shortcode( '[ti_wishlist_products_counter show_icon="off" show_text="off"]' ); ?>
				</div> <?php
			}
		}
	}
}


if ( !function_exists( 'infiniteintention_update_wishlist_count' ) ) {
	function infiniteintention_update_wishlist_count() {
		if( class_exists( 'YITH_WCWL' ) ){
			wp_send_json( array(
				'count' => yith_wcwl_count_all_products()
			) );
		}
	}
}
add_action( 'wp_ajax_yith_wcwl_update_wishlist_count', 'infiniteintention_update_wishlist_count' );
add_action( 'wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'infiniteintention_update_wishlist_count' );


if ( !function_exists( 'infiniteintention_header_cart' ) ) {
	function infiniteintention_header_cart() {
		if ( class_exists( 'WooCommerce' ) ) {
			$cart_items = WC()->cart->get_cart_contents_count();
			if ( $cart_items > 0 ) {
				$cart_class = ' items';
			} else {
				$cart_class = '';
			} ?>
					<div class="top-cart<?php echo $cart_class; ?>"><a class="infiniteintention-cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>" role="button"><span class="icons infiniteintention-icon-shopping-cart"></span><?php echo sprintf ( '<span class="item-count">%d</span>', $cart_items ); ?></a><div class="mini-cart"><?php woocommerce_mini_cart();?></div></div>
		<?php }
	}
}


/**
 * Update header mini-cart contents when products are added to the cart via AJAX
 */
if ( !function_exists( 'infiniteintention_header_cart_update' ) ) {
	function infiniteintention_header_cart_update( $fragments ) {
		$cart_items = WC()->cart->get_cart_contents_count();
		if ( $cart_items > 0 ) {
			$cart_class = ' items';
		} else {
			$cart_class = '';
		}
		ob_start();
		?>
		<div class="top-cart<?php echo $cart_class; ?>"><a class="infiniteintention-cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>" role="button"><span class="icons infiniteintention-icon-shopping-cart"></span><?php echo sprintf ( '<span class="item-count">%d</span>', $cart_items ); ?></a><div class="mini-cart"><?php woocommerce_mini_cart();?></div></div>
		<?php	
		$fragments['.top-cart'] = ob_get_clean();	
		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'infiniteintention_header_cart_update' );


if ( !function_exists( 'infiniteintention_yith_wishlist_icon' ) ) {
	function infiniteintention_yith_wishlist_icon() {
		if ( class_exists( 'YITH_WCWL' ) ) {
			echo do_shortcode( '[yith_wcwl_add_to_wishlist label="" product_added_text="" already_in_wishslist_text="" browse_wishlist_text=""]' );
		}
	}
}
add_action( 'woocommerce_after_shop_loop_item', 'infiniteintention_yith_wishlist_icon', 9 );


/**End whilelist and cart**/



// WooCommerce custom catalog ordering 
add_filter( 'woocommerce_catalog_orderby', 'flipmart_custom_woocommerce_catalog_orderby' );
function flipmart_custom_woocommerce_catalog_orderby( $sortby ) {
	$sortby['menu_order'] = 'Default';
	$sortby['price'] = 'Price:Lowest first';
	$sortby['price-desc'] = 'Price:HIghest first';
	$sortby['popularity'] = 'Popularity';
	unset($sortby['date']);
	unset($sortby['rating']);
	
	return $sortby;
}



add_filter( 'woocommerce_product_add_to_cart_text' , 'custom_woocommerce_product_add_to_cart_text' );
/**
 * custom_woocommerce_template_loop_add_to_cart
*/
function custom_woocommerce_product_add_to_cart_text() {
	global $product;
	
	$product_type = $product->product_type;
	
	switch ( $product_type ) {
		case 'external':
			return __( 'BUY NOW', 'woocommerce' );
		break;
		case 'grouped':
			return __( 'View products', 'woocommerce' );
		break;
		case 'simple':
			return __( 'BUY NOW', 'woocommerce' );
		break;
		case 'variable':
			return __( 'BUY NOW', 'woocommerce' );
		break;
		default:
			return __( 'Read more', 'woocommerce' );
	}
	
}






