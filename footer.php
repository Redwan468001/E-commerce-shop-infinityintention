
	
	<!--footer-->
	<div class="container_full footer_bg"> 
		<div class="container"> 
			<div class="row"> 
				
				<div id="footer"> 
				    
				    <div class="col-lg-2 col-md-2 col-xs-12 cl2">
				        <div id="single_footer">
				            <h2>Information</h2>
				            <nav class="foot_nav">
				                <ul>
				                    <li><a href="#">About Us</a></li>
				                    <li><a href="#">Contact Us</a></li>
				                </ul>
				            </nav>
				        </div>
				    </div>
				    
				    <div class="col-lg-3 col-md-3 col-xs-12 cl3">
				        <div id="single_footer">
				            <h2>Customer Care</h2>
				            <nav class="foot_nav">
				                <ul>
				                    <li><a href="#">Help Center</a></li>
				                    <li><a href="#">How to Buy</a></li>
				                    <li><a href="#">Returns & Refunds</a></li>
				                    <li><a href="#">Contact Us</a></li>
				                </ul>
				            </nav>
				        </div>
				    </div>
				    
				    <div class="col-lg-3 col-md-3 col-xs-12 cl3">
				        <div id="single_footer">
				            <h2>Menu</h2>
				            <nav class="foot_nav">
				                <ul>
				                    <li><a href="#">Privacy Policy</a></li>
				                    <li><a href="#">Terms and Condition</a></li>
				                    <li><a href="#">Purchasing Policy</a></li>
				                </ul>
				            </nav>
				        </div>
				    </div>
				    
				    <div class="col-lg-4 col-md-4 col-xs-12 cl4">
				        <div id="single_footer">
				            <h2>Contact Us</h2>
				            <nav class="foot_nav">
				                <ul>
				                    <li><a href="#">Shop no 63, RAMC Shopping Complex, Dhap, Rangpur</a></li>
				                    <li><a href="#">Email: admin@infiniteintentionbd.com</a></li>
				                    <li><a href="#">Contact no: +8801314116293</a></li>
				                </ul>
				            </nav>
				        </div>
				    </div>
				    
				</div>
				
			</div>
		</div>
	</div>
	
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
	<!--OW Slider 01-->
	<script>
	$(document).ready(function() {
		var owl = $('.owl-slider');
		owl.owlCarousel({
			margin: 0,
			nav: true,
			loop: true,
			dots: false,
			items: 6,
            autoplayHoverPause: true,
			autoplay: true,
			responsive: {
				1000: {
					items: 6
				},
				600: {
					items: 3
				},
				0: {
					items: 2
				},
			}
		})
	})
	</script>
	
    
	<!--Nivo slider-->
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>	
	<!--End nivo slider-->
	
    
    <!--Small menu-->
    <script>
        $(document).ready(function(){
          $("#sm_menu").click(function(){
            $("nav").addClass("important");
          });
        });
        </script>
        
        <script>
        $(document).ready(function(){
          $("nav>a").click(function(){
            $("nav").removeClass("important");
          });
        });
    </script>
    
    <!--Small menu search-->
    <script>
        $(document).ready(function(){
          $("#sm_s").click(function(){
            $(".small_s_search").addClass("src_width");
          });
        });
    </script>
        
    <script>
        $(document).ready(function(){
          $("#content").click(function(){
            $(".small_s_search").removeClass("src_width");
          });
        });
    </script>
    
    <script>
        $(document).ready(function(){
          $(".container_full").click(function(){
            $(".small_s_search").removeClass("src_width");
          });
        });
    </script>
    
    <script>
        $(document).ready(function(){
          $(".close_src").click(function(){
            $(".small_s_search").removeClass("src_width");
          });
        });
    </script>
    
    <!--End small menu search-->
    
    <!--Accroding Menu-->
    <script>
        var acc = document.getElementsByTagName("button");
        var i;
        
        for (i = 0; i < acc.length; i++) {
          acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var acr_m = this.nextElementSibling;
            if (acr_m.style.maxHeight) {
              acr_m.style.maxHeight = null;
            } else {
              acr_m.style.maxHeight = acr_m.scrollHeight + "px";
            } 
          });
        }
    </script>
    
    
    
    <script> 
    
jQuery(function($){

    $(window).scroll(function(){
        var scrollTop = $(this).scrollTop();
        if( scrollTop > 0 ){
            $('#masthead').addClass('scrolled');
        }else{
            $('#masthead').removeClass('scrolled');
        }
    });

    // WooCommerce quantity buttons
    jQuery('div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)').addClass('buttons_added').append('<input type="button" value="+" class="plus" />').prepend('<input type="button" value="-" class="minus" />');

    // Target quantity inputs on product pages
    jQuery('input.qty:not(.product-quantity input.qty)').each( function() {
        var min = parseFloat( jQuery( this ).attr('min') );

        if ( min && min > 0 && parseFloat( jQuery( this ).val() ) < min ) {
            jQuery( this ).val( min );
        }
    });

    jQuery( document ).on('click', '.plus, .minus', function() {

        // Get values
        var $qty        = jQuery( this ).closest('.quantity').find('.qty'),
            currentVal  = parseFloat( $qty.val() ),
            max         = parseFloat( $qty.attr('max') ),
            min         = parseFloat( $qty.attr('min') ),
            step        = $qty.attr('step');

        // Format values
        if ( ! currentVal || currentVal === '' || currentVal === 'NaN') currentVal = 0;
        if ( max === '' || max === 'NaN') max = '';
        if ( min === '' || min === 'NaN') min = 0;
        if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN') step = 1;

        // Change the value
        if ( jQuery( this ).is('.plus') ) {

            if ( max && ( max == currentVal || currentVal > max ) ) {
                $qty.val( max );
            } else {
                $qty.val( currentVal + parseFloat( step ) );
            }

        } else {

            if ( min && ( min == currentVal || currentVal < min ) ) {
                $qty.val( min );
            } else if ( currentVal > 0 ) {
                $qty.val( currentVal - parseFloat( step ) );
            }

        }

        // Trigger change event
        $qty.trigger('change');
    });

    if ( $('.mini-account p.username-wrap').length ) {
        $('.mini-account p.username-wrap').html($('.mini-account p.username-wrap').html().replace('(','<br>('));
    }

    $( '.top-search .ibsen-icon-search' ).on( 'click', function(e) {
        $( '.top-search' ).toggleClass( 'search-open' );
    });

    $( '.top-search .search-close' ).on( 'click', function(e) {
        $( '.top-search' ).toggleClass( 'search-open' );
        $( '.top-search .ibsen-icon-search' ).focus();
    });

    $( '.toggle-nav' ).click( function() {
        $( this ).toggleClass( 'menu-open' );
        $( '#site-navigation' ).toggleClass( 'menu-open' );
    });
    $( '.sub-trigger' ).click( function() {
        $( this ).toggleClass( 'is-open' );
        $( this ).siblings( '.sub-menu' ).toggle( 300 );
    });

    $( '#site-navigation .menu-close' ).on( 'click', function(e) {
        $( '.toggle-nav' ).toggleClass( 'menu-open' );
        $( '#site-navigation' ).toggleClass( 'menu-open' );
        $( '.toggle-nav' ).focus();
    });

    $( '.shop-filter-wrap .shop-filter-toggle' ).click( function() {
        $( '.shop-filter-wrap #shop-filters' ).toggleClass( 'active' );
        $( this ).toggleClass( 'active' );
    });

    $( '.top-account .mini-account input' ).focusin( function() {
        $( '.top-account .mini-account' ).addClass( 'locked' );
    }).add( '.top-account .mini-account' ).focusout( function() {
        if ( !$( '.top-account .mini-account' ).is( ':focus' ) ) {
            $( '.top-account .mini-account' ).removeClass( 'locked' );
        }
    });

    $( '#primary-menu li.menu-item-has-children' ).focusin( function() {
        $( this ).addClass( 'locked' );
    }).add( this ).focusout( function() {
        if ( !$( this ).is( ':focus' ) ) {
            $( this ).removeClass( 'locked' );
        }
    });

    $( '.top-account #customer_login .u-column2 h2' ).click( function() {
        $( '.top-account #customer_login .u-column2' ).toggleClass( 'open' );
    });

});

    </script>
    
	<?php wp_footer(); ?>
	
	
</body>
</html>