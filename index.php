<?php get_header(); ?>

	<!--Slider-->
	<?php get_template_part('slider'); ?>

	
	<!--Product-->
	<div class="container_full pro_bg"> 
		<div class="container"> 
			<div class="row"> 
				
				<div id="product" class="product_idx"> 
					
					<div class="pro_menu">
						
						<div class="sng_side_cat mobile_menu">
							<h2><i class="fas fa-bars"></i>CATEGORIES</h2>
							<ul>
							    <li><a href="https://infiniteintentionbd.com/product-category/mobile/"><i class="fas fa-mobile-alt"></i>Mobile</a>
								    <?php
            						    $args = array(
            						        'theme_location' => 'mobile_menu'
            						    );
            						    wp_nav_menu($args)
            				        ?>
								</li>
								<li><a href="#"><i class="fas fa-headphones-alt"></i>Mobile Gagets</a></li>
								<li><a href="https://infiniteintentionbd.com/product-category/agricultural-product/"><i class="fas fa-tractor"></i>Agricultural Product</a>
								    <?php
            						    $args = array(
            						        'theme_location' => 'agr_pro'
            						    );
            						    wp_nav_menu($args)
            				        ?>
								</li>
								<li><a href="#"><i class="fas fa-laptop"></i>Electronics</a></li>
								<li><a href="#"><i class="fas fa-warehouse"></i>Import Warehouse</a></li>
								<li><a href="#"><i class="fas fa-paw"></i>Cattle</a></li>
							</ul>
						</div>
						
						<div id="acr_menu">
						    <h2><i class="fas fa-bars"></i>CATEGORIES</h2>
						    <ul>
						        <li>
        						    <button class="accordion"><a><i class="fas fa-mobile-alt"></i>Mobile</a></button>
                                    <div class="acr_m">
                                        <?php
                						    $args = array(
                						        'theme_location' => 'mobile_menu'
                						    );
                						    wp_nav_menu($args)
                				        ?>
                                    </div>
                                </li>
                                <li><a href="#"><i class="fas fa-headphones-alt"></i>Mobile Gagets</a></li>
								<li>
								    <button class="accordion"><a><i class="fas fa-tractor"></i>Agricultural Product</a></button>
								    <div class="acr_m">
    								    <?php
                						    $args = array(
                						        'theme_location' => 'agr_pro'
                						    );
                						    wp_nav_menu($args)
                				        ?>
            				        </div>
								</li>
								<li><a href="#"><i class="fas fa-laptop"></i>Electronics</a></li>
								<li><a href="#"><i class="fas fa-warehouse"></i>Import Warehouse</a></li>
								<li><a href="#"><i class="fas fa-paw"></i>Cattle</a></li>
						    </ul>
						</div>
					
					</div>
					
					<div class="product_sng">
						
						<?php 
                            $query = new WP_Query('category_name=test&posts_per_page=10');
                            if($query->have_posts()) : while($query->have_posts()) : $query->the_post();
                        ?>
						<div class="col-xs-12 col-md-12 col-xs-12 cl12 nopad"> 
							<div id="idx_single_pro">
								<div class="product_img"> 
									<?php the_post_thumbnail(); ?>
								</div>
								<div class="product_cnt">
									<p><?php the_content(); ?></p>
								</div>
							</div>
						</div>
						
						<?php 
							endwhile;
							endif;
						?>
					</div>
					
				</div>
				
			</div>
		</div>
	</div>
	
	
    
	<!--Mobile-->
	<div class="container_full sld_pro_bg"> 
		<div class="container"> 
			<div class="row"> 
			
			    <div class="title">
			        <h2>MOBILE PHONE</h2>
			    </div>
				
				<div id="produc" class="product_idx"> 

					<section id="slider_ow">
						<div class="row">
							<div class="large-12 columns">
								<div class="owl-carousel owl-slider owl-theme">
                    			    
                				    <?php
                                        $meta_query  = WC()->query->get_meta_query();
                                        $tax_query   = WC()->query->get_tax_query();
                                        $tax_query[] = array(
                                            'taxonomy' => 'product_cat',
                                            'field'    => 'name',
                                            'terms'    => 'Mobile',
                                            'operator' => 'IN',
                                        );
                                         
                                        $args = array(
                                            'post_type'           => 'product',
                                            'post_status'         => 'publish',
                                            'posts_per_page'      => 20,
                                            'meta_query'          => $meta_query,
                                            'tax_query'           => $tax_query,
                                        );
                                         
                                        $featured_query = new WP_Query( $args );
                                             
                                        if ($featured_query->have_posts()) {
                                         
                                            while ($featured_query->have_posts()) : 
                                             
                                                $featured_query->the_post();
                                                 
                                                $product = get_product( $featured_query->post->ID );
                                                $price = $product->get_price_html();
                                        
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
                                			
                                		}
                                        
                                    ?>
                                    <li class="product type-product status-publish instock product_cat-animalfeed has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
                        				<div class="item"> 
                                            <div class="featured-product">
                                        		
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php if ( $product->is_on_sale() ) : ?>
                                        		<div class="sf">
                                                	<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale_s cow_os" style="width:55px !important;height:55px">' . esc_html__( 'Sale!', 'woocommerce' ) . '</span>', $post, $product ); ?>
    	                                        	<?php	echo '<span class="sale-percentage_s">-' . esc_html( round($max_percentage) ) . '%</span>'; ?>
                                                </div>
                                                <?php
                                                    endif;
                                                ?>
                                                    <?php echo woocommerce_get_product_thumbnail(); ?>
                                                </a>
                                                <div class="title_price"> 
                                                    <a href="<?php the_permalink(); ?>">
                                                        <h2><?php the_title(); ?></h2>
                                                    </a>
                                                    <?php echo do_shortcode('[add_to_cart id="'.$post->ID.'"]'); ?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                            		</li>
                                    <?php
                                        endwhile;
                                        }
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                    </section>

    			</div>
				
    		</div>
    	</div>
    </div>
	

	
	
	<!--MOBILE GADGETS-->
	<div class="container_full sld_pro_bg"> 
		<div class="container mg_bg"> 
			<div class="row"> 
			
			    <div class="title">
			        <h2>MOBILE GADGERS</h2>
			    </div>
				
				<div id="produc" class="product_idx"> 

					<section id="slider_ow">
						<div class="row">
							<div class="large-12 columns">
								<div class="owl-carousel owl-slider owl-theme">
                    			    
                				    <?php
                                        $meta_query  = WC()->query->get_meta_query();
                                        $tax_query   = WC()->query->get_tax_query();
                                        $tax_query[] = array(
                                            'taxonomy' => 'product_cat',
                                            'field'    => 'name',
                                            'terms'    => 'Mobile-gadgets',
                                            'operator' => 'IN',
                                        );
                                         
                                        $args = array(
                                            'post_type'           => 'product',
                                            'post_status'         => 'publish',
                                            'posts_per_page'      => 20,
                                            'meta_query'          => $meta_query,
                                            'tax_query'           => $tax_query,
                                        );
                                         
                                        $featured_query = new WP_Query( $args );
                                             
                                        if ($featured_query->have_posts()) {
                                         
                                            while ($featured_query->have_posts()) : 
                                             
                                                $featured_query->the_post();
                                                 
                                                $product = get_product( $featured_query->post->ID );
                                                $price = $product->get_price_html();
                                        
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
                                			
                                		}
                                        
                                    ?>
                                    <li class="product type-product status-publish instock product_cat-animalfeed has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
                        				<div class="item"> 
                                            <div class="featured-product">
                                        		
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php if ( $product->is_on_sale() ) : ?>
                                        		<div class="sf">
                                                	<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale_s cow_os" style="width:55px !important;height:55px">' . esc_html__( 'Sale!', 'woocommerce' ) . '</span>', $post, $product ); ?>
    	                                        	<?php	echo '<span class="sale-percentage_s">-' . esc_html( round($max_percentage) ) . '%</span>'; ?>
                                                </div>
                                                <?php
                                                    endif;
                                                ?>
                                                    <?php echo woocommerce_get_product_thumbnail(); ?>
                                                </a>
                                                <div class="title_price"> 
                                                    <a href="<?php the_permalink(); ?>">
                                                        <h2><?php the_title(); ?></h2>
                                                    </a>
                                                    <?php echo do_shortcode('[add_to_cart id="'.$post->ID.'"]'); ?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                            		</li>
                                    <?php
                                        endwhile;
                                        }
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                    </section>

                    
    			</div>
				
			</div>
		</div>
	</div>
	
    
	<!--ELECTRONICS-->
	<div class="container_full sld_pro_bg"> 
		<div class="container"> 
			<div class="row"> 
			
			    <div class="title">
			        <h2>ELECTRONICS</h2>
			    </div>
				
				<div id="produc" class="product_idx"> 

                    <div class="pdc_style_2">
        			    
    				    <?php
                            $meta_query  = WC()->query->get_meta_query();
                            $tax_query   = WC()->query->get_tax_query();
                            $tax_query[] = array(
                                'taxonomy' => 'product_cat',
                                'field'    => 'name',
                                'terms'    => 'Mobile-gadgets',
                                'operator' => 'IN',
                            );
                             
                            $args = array(
                                'post_type'           => 'product',
                                'post_status'         => 'publish',
                                'posts_per_page'      => 20,
                                'meta_query'          => $meta_query,
                                'tax_query'           => $tax_query,
                            );
                             
                            $featured_query = new WP_Query( $args );
                                 
                            if ($featured_query->have_posts()) {
                             
                                while ($featured_query->have_posts()) : 
                                 
                                    $featured_query->the_post();
                                     
                                    $product = get_product( $featured_query->post->ID );
                                    $price = $product->get_price_html();
                            
                        ?>
                        <li class="col-lg-2 col-md-2 col-xs-6 cl2" style="padding:0">
            				<div class="sng_item"> 
                				<div class="sng_item_ic">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if ( $product->is_on_sale() ) : ?>
                                    <?php
                                        endif;
                                    ?>
                                        <?php echo woocommerce_get_product_thumbnail(); ?>
                                    </a>
                                    <div class="title_price"> 
                                        <a href="<?php the_permalink(); ?>">
                                            <h2><?php the_title(); ?></h2>
                                            <?php echo $price; ?>
                                        </a>
                                    </div>
                                </div>
                                <div class="sng_item_cart">
                                    <?php echo do_shortcode('[add_to_cart id="'.$post->ID.'"]'); ?>
                                </div>
                            </div>
                		</li>
                        <?php
                            endwhile;
                            }
                        ?>
                    
                    
        			</div>
    				
    			</div>
    		</div>
    	</div>
    </div>



	<!--AGRICULTURAL PRODUCT-->
	<div class="container_full sld_pro_bg"> 
		<div class="container"> 
			<div class="row"> 
			
			    <div class="title">
			        <h2>AGRICULTURAL PRODUCT</h2>
			    </div>
				
				<div id="produc" class="product_idx"> 

					<section id="slider_ow">
						<div class="row">
							<div class="large-12 columns">
								<div class="owl-carousel owl-slider owl-theme">
                				    <?php
                                        $meta_query  = WC()->query->get_meta_query();
                                        $tax_query   = WC()->query->get_tax_query();
                                        $tax_query[] = array(
                                            'taxonomy' => 'product_cat',
                                            'field'    => 'name',
                                            'terms'    => 'Agricultural Product',
                                            'operator' => 'IN',
                                        );
                                         
                                        $args = array(
                                            'post_type'           => 'product',
                                            'post_status'         => 'publish',
                                            'posts_per_page'      => 20,
                                            'meta_query'          => $meta_query,
                                            'tax_query'           => $tax_query,
                                        );
                                         
                                        $featured_query = new WP_Query( $args );
                                             
                                        if ($featured_query->have_posts()) {
                                         
                                            while ($featured_query->have_posts()) : 
                                             
                                                $featured_query->the_post();
                                                 
                                                $product = get_product( $featured_query->post->ID );
                                                $price = $product->get_price_html();
                                        
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
                                			
                                		}
                                        
                                    ?>
                                    <li class="product type-product status-publish instock product_cat-animalfeed has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
                        				<div class="item"> 
                                            <div class="featured-product">
                                        		
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php if ( $product->is_on_sale() ) : ?>
                                        		<div class="sf">
                                                	<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale_s cow_os" style="width:55px !important;height:55px">' . esc_html__( 'Sale!', 'woocommerce' ) . '</span>', $post, $product ); ?>
    	                                        	<?php	echo '<span class="sale-percentage_s">-' . esc_html( round($max_percentage) ) . '%</span>'; ?>
                                                </div>
                                                <?php
                                                    endif;
                                                ?>
                                                    <?php echo woocommerce_get_product_thumbnail(); ?>
                                                </a>
                                                <div class="title_price"> 
                                                    <a href="<?php the_permalink(); ?>">
                                                        <h2><?php the_title(); ?></h2>
                                                    </a>
                                                    <?php echo do_shortcode('[add_to_cart id="'.$post->ID.'"]'); ?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                            		</li>
                                    <?php
                                        endwhile;
                                        }
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                    </section>

                    
    			</div>
				
			</div>
		</div>
	</div>
	


	<!--CATTLE-->
	<div class="container_full sld_pro_bg"> 
		<div class="container"> 
			<div class="row"> 
			
			    <div class="title">
			        <h2>CATTLE</h2>
			    </div>
				
				<div id="produc" class="product_idx"> 

					<section id="slider_ow">
						<div class="row">
							<div class="large-12 columns">
								<div class="owl-carousel owl-slider owl-theme">
                    			    
                				    <?php
                                        $meta_query  = WC()->query->get_meta_query();
                                        $tax_query   = WC()->query->get_tax_query();
                                        $tax_query[] = array(
                                            'taxonomy' => 'product_cat',
                                            'field'    => 'name',
                                            'terms'    => 'Agricultural',
                                            'operator' => 'IN',
                                        );
                                         
                                        $args = array(
                                            'post_type'           => 'product',
                                            'post_status'         => 'publish',
                                            'posts_per_page'      => 20,
                                            'meta_query'          => $meta_query,
                                            'tax_query'           => $tax_query,
                                        );
                                         
                                        $featured_query = new WP_Query( $args );
                                             
                                        if ($featured_query->have_posts()) {
                                         
                                            while ($featured_query->have_posts()) : 
                                             
                                                $featured_query->the_post();
                                                 
                                                $product = get_product( $featured_query->post->ID );
                                                $price = $product->get_price_html();
                                        
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
                                			
                                		}
                                        
                                    ?>
                                    <li class="product type-product status-publish instock product_cat-animalfeed has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
                        				<div class="item"> 
                                            <div class="featured-product">
                                        		
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php if ( $product->is_on_sale() ) : ?>
                                        		<div class="sf">
                                                	<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale_s cow_os" style="width:55px !important;height:55px">' . esc_html__( 'Sale!', 'woocommerce' ) . '</span>', $post, $product ); ?>
    	                                        	<?php	echo '<span class="sale-percentage_s">-' . esc_html( round($max_percentage) ) . '%</span>'; ?>
                                                </div>
                                                <?php
                                                    endif;
                                                ?>
                                                    <?php echo woocommerce_get_product_thumbnail(); ?>
                                                </a>
                                                <div class="title_price"> 
                                                    <a href="<?php the_permalink(); ?>">
                                                        <h3><?php the_title(); ?></h3>
                                                    </a>
                                                    <?php echo do_shortcode('[add_to_cart id="'.$post->ID.'"]'); ?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                            		</li>
                                    <?php
                                        endwhile;
                                        }
                                    ?>
                                  
                                </div>
                            </div>
                        </div>
                    </section>

                    
    			</div>
				
			</div>
		</div>
	</div>
	

	<?php get_footer(); ?>
	