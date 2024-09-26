<?php get_header(); ?>

	<!--Product-->
	<div class="container_full"> 
		<div class="container"> 
			<div class="row"> 
				
				<div id="single_page"> 
					<h2><?php the_category(); ?></h2>
					<div class="col-lg-12 col-md-12 col-xs-12 nopad">
						
						<?php 
							if(have_posts()) : while(have_posts()) : the_post(); 
						?>
						<div class="col-xs-12 col-md-12 col-xs-12 cl2 nopad"> 
							<div id="idx_single_pro">
								<div class="product_img"> 
									<?php the_post_thumbnail(); ?>
								</div>
								<div class="product_img">
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
	
	

	
	
	<?php get_footer(); ?>
	