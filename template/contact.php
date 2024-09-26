<?php get_header(); 
/**
    Page Template Name: Contact
**/
?>

	<!--Product-->
	<div class="container_full"> 
	    
		<div class="cnt_title">
		    <h2><?php the_title(); ?></h2>
		</div>
		
		<div class="container"> 
			<div class="row"> 
				
				<div id="account_page" class="product_idx"> 
					
					<div class="col-lg-12 col-md-12 col-xs-12 nopad" style="padding:0">
						
						<div class="col-lg-12 col-md-12 col-xs-12 cl2 nopad">
						    <div id="cnt_page">
						        <div class="col-lg-3 col-md-3 col-xs-12 cl3"> 
        							<div class="cnt_top">
        							    <h1><i class="fas fa-phone"></i></h1>
        							    <h2>Phone</h2>
        							    <p>+8801314116293</p>
        							</div>
        						</div>
        						
        						<div class="col-lg-3 col-md-3 col-xs-12 cl3"> 
        							<div class="cnt_top">
        							    <h1><i class="fas fa-map-marker-alt"></i></h1>
        							    <h2>Address</h2>
        							    <p>Shop no 63, RAMC Shopping Complex, Dhap, Rangpur</p>
        							</div>
        						</div>
        						
        						<div class="col-lg-3 col-md-3 col-xs-12 cl3"> 
        							<div class="cnt_top">
        							    <h1><i class="far fa-clock"></i></h1>
        							    <h2>Open Time</h2>
        							    <p>9 am to 4 PM</p>
        							</div>
        						</div>
        						
        						<div class="col-lg-3 col-md-3 col-xs-12 cl3"> 
        							<div class="cnt_top">
        							    <h1><i class="far fa-envelope"></i></h1>
        							    <h2>Email</h2>
        							    <p>admin@infiniteintentionbd.com</p>
        							</div>
        						</div>
						    </div>
    					</div>
    						
    				</div>
    				
    			</div>
    		</div>
    	</div>
    </div>
    					
	<div class="container_full lc_map"> 
	    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3593.2513779530373!2d89.2300471254471!3d25.76225923433856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e331f38dafe217%3A0xd551eebcdf40fda!2sRAMC%20Shopping%20Complex!5e0!3m2!1sen!2sbd!4v1592584584106!5m2!1sen!2sbd" width="1200" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
	</div>    
				
    <div class="container_full"> 
	    
		<div class="container"> 
			<div class="row"> 
				
				<div id="account_page" class="product_idx"> 					
					<div class="col-lg-12 col-md-12 col-xs-12 cl2 nopad" style="padding:0"> 
						<div id="cnt_message">
						    <h2>Leave Message</h2>
						    <?php 
    							if(have_posts()) : while(have_posts()) : the_post(); 
    						?>
    						<div class="col-lg-12 col-md-12 col-xs-12 cl2 nopad" style="padding:0"> 
    							<div id="contact">
    								<div class="cnt_sec">
    									<?php the_content(); ?>
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
	</div>
	
	
	<?php get_footer(); ?>
	