<?php get_header(); ?>
    
    <div class="container_full">
		<div class="container">
			<div class="left_content">
				<h2>Search Results For: " <?php the_search_query(); ?> "</h2>
				<p style="color:red;padding:0 10px;"><?php $allsearch = new WP_Query("s=$s&showposts=0"); echo 'Found ' . $allsearch ->found_posts.' results .';?></p>
				    
                	<?php 
                        if(have_posts()) : while(have_posts()) : the_post();
                    ?>
                    <?php
                     $product = get_product( $post->ID );
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
                    <li class="col-lg-2 col-md-2 col-xs-6 cl2 np">
        				<div class="src_item"> 
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
                        endif;
                    ?>
				
				
				
			</div>

		</div>
	</div>
		
	<?php get_footer(); ?>
	