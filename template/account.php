<?php get_header(); 
/**
    Page Template Name: Account
**/
?>

	<!--Product-->
	<div class="container_full"> 
	    
		<div class="ac_title">
		    <h2><?php the_title(); ?></h2>
		</div>
		
		<div class="container"> 
			<div class="row"> 
				
				<div id="account_page" class="product_idx"> 
					
					<div class="col-lg-8 col-md-8 col-xs-12 cl8 nopad" style="padding:0">
						
						<?php 
							if(have_posts()) : while(have_posts()) : the_post(); 
						?>
						<div class="col-lg-12 col-md-12 col-xs-12 cl2 nopad" style="padding:0"> 
							<div id="account">
								<div class="account_img"> 
									<?php the_post_thumbnail(); ?>
								</div>
								<div class="account_cnt">
									<p><?php the_content(); ?></p>
								</div>
							</div>
						</div>
						<?php 
							endwhile;
        					endif;
						?>
					</div>
					
					<div class="col-lg-4 col-md-4 col-xs-12 cl4 nopad" style="padding:0">
						<div class="sm_in">
						    
						    <div class="single_sm_in">
                            	<div class="sdbar_infi">
                                    <?php dynamic_sidebar( 'account_side' ); ?>
                                </div>
						    </div>
						    
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	
	
	<?php get_footer(); ?>
	