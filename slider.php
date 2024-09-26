	<!--Slider-->
	<div class="container_full slide_bg"> 
		<div class="container"> 
			<div class="row">
				  
				<div class="col-lg-8 col-md-8 col-xs-8 cl8" style="padding: 0">
            		<div id="slider_wrapper">
            			<div class="slider-wrapper theme-default">
            				<div id="slider" class="nivoSlider">
            				    
            				    <?php
            						$query = new WP_Query('category_name=slider&posts_per_page=6&order=DESC');
            						if($query->have_posts()) : while($query->have_posts()) : $query->the_post();
            					?>
            					<div id="single_slider"> 
            						<div class="n_slide_img"> 
            							<?php the_post_thumbnail(); ?>
            						</div>
            						<div class="n_slide_art"> 
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
				
				<div class="col-lg-4 col-md-4 col-xs-4 cl4" style="padding: 0">
				    <div class="sld_right">
				        <?php 
				            $query = new WP_query('category_name=side_art&posts_per_page=1');
				            if($query->have_posts()) : while($query->have_posts()) : $query->the_post();
				        ?>
				        <div class="sld_right_img"><?php the_post_thumbnail(); ?></div>
				        <?php
				            endwhile;
				            endif;
				        ?>
				    </div>
				</div>
            	
			</div>
		</div>
	</div>