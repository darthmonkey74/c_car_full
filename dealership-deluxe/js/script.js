jQuery(document).ready(function(){
    $('#gallery').cycle({
        fx:     'fade',
        speed:  'slow',
        timeout: 0,
        pager:  '#nav',
        pagerAnchorBuilder: function(idx, slide) {
            // return sel string for existing anchor
            return '#nav li:eq(' + (idx) + ') a';
        }
    });
	$('ul.news > li:last-child').addClass('last-child');
	$("#contactForm").validate();
	$('.slides_container h2').show();
	$('.title-detail-tag').show();
	$(function(){
		
		$('#slides').slides({
			effect: 'fade',
			crossfade: true,
			preload: true,
			preloadImage: 'images/loading.gif',
			play: 6500,
			pause: 1000,
			hoverPause: true
		});
	});
	$('a#link').click(function(){
		var destination = $("#results").offset().top;
	$("html,body").animate({ scrollTop: destination},1100, 'swing', function() {
      
	});
	});
	$('.hideHome').hide();	
	$('#cars-container').cycle({
		fx: 'fade',
		pause: 'true',
		speed: '1000',
		autostop: true,
		autostopCount: -1
	});	
	$('.find-nav .one').click(function(){
		$('#cars-container').cycle(0);
		$('.find-nav .active').removeClass('active');
		$(this).addClass('active');
		return false;
	});	
	$('.find-nav .two').click(function(){
		$('#cars-container').cycle(1);
		$('.find-nav .active').removeClass('active');
		$(this).addClass('active');
		return false;
	});	
	$('.find-nav .three').click(function(){
		$('#cars-container').cycle(2);
		$('.find-nav .active').removeClass('active');
		$(this).addClass('active');
		return false;
	});	
	$('.find-nav .four').click(function(){
		$('#cars-container').cycle(3);
		$('.find-nav .active').removeClass('active');
		$(this).addClass('active');
		return false;
	});	
	$('.find-nav .five').click(function(){
		$('#cars-container').cycle(4);
		$('.find-nav .active').removeClass('active');
		$(this).addClass('active');
		return false;
	});	
	$('.refine-nav>li.first').addClass('active');
	$('.refine-nav>li.second ul').slideUp(1000);
	$('.refine-nav>li.third ul').slideUp(1000);
	$('.refine-nav>li.fourth ul').slideUp(1000);
	$('.refine-nav>li span').click(function(){
		
		var parent = $(this).parent('li');	
		if(parent.hasClass('active'))
		{
			if(parent.find('ul').hasClass('expanded')) 
			{
				parent.find('ul').slideUp(500).removeClass('expanded');
				parent.removeClass('active');
			}
			else
			{
				parent.find('ul').slideDown(500).addClass('expanded');
			}
		}
		else
		{	  		
	  		$('.refine-nav li.active').find('ul').slideUp(500).removeClass('expanded');
			$('.refine-nav li.active').removeClass('active');
	  		parent.addClass('active');
	  		parent.find('ul').slideDown(500).addClass('expanded');
		}
	});
	$('.overview-tab').click(function(){
		$('.tabs span').removeClass('active');
		$(this).addClass('active');
		$('.item-list ul.active').removeClass('active').fadeOut(0,function(){
			$('.overview').fadeIn(0).addClass('active');	
		})});
	$('.features-tab').click(function(){
		$('.tabs span').removeClass('active');
		$(this).addClass('active');
		$('.item-list ul.active').removeClass('active').fadeOut(0,function(){
			$('.features').fadeIn(0).addClass('active');	
		})});
	$('.video-tab').click(function(){
		$('.tabs span').removeClass('active');
		$(this).addClass('active');
		$('.item-list ul.active').removeClass('active').fadeOut(0,function(){
			$('.video').fadeIn(0).addClass('active');	
		})});		
		$('.contact-tab').click(function(){
		$('.tabs span').removeClass('active');
		$(this).addClass('active');
		$('.item-list ul.active').removeClass('active').fadeOut(0,function(){
			$('.contact-tab-form').fadeIn(0).addClass('active');	
		})});  
        var selectorE = 'a.gallery';
		var instanceE = $( selectorE ).imageLightbox(
		{
			onStart: 	 function() { overlayOn(); navigationOn( instanceE, selectorE ); },
			onEnd:	 	 function() { navigationOff(); overlayOff(); activityIndicatorOff(); },
			onLoadStart: function() { activityIndicatorOn(); },
			onLoadEnd:	 function() { navigationUpdate( selectorE ); activityIndicatorOff(); }
		});
        $('#bigphoto').imageLightbox(
		{
			onStart: 	 function() { overlayOn();  },
			onEnd:	 	 function() { navigationOff();  overlayOff(); activityIndicatorOff(); },
			onLoadStart: function() { activityIndicatorOn(); },
			onLoadEnd:	 function() { navigationUpdate( selectorE ); activityIndicatorOff(); }

		});
		var activityIndicatorOn = function()
			{
				$( '<div id="imagelightbox-loading"><div></div></div>' ).appendTo( 'body' );
			},
			activityIndicatorOff = function()
			{
				$( '#imagelightbox-loading' ).remove();
			},

			overlayOn = function()
			{
				$( '<div id="imagelightbox-overlay"></div>' ).appendTo( 'body' );
			},
			overlayOff = function()
			{
				$( '#imagelightbox-overlay' ).remove();
			},
			navigationOn = function( instance, selector )
			{
				var images = $( selector );
				if( images.length )
				{
					var nav = $( '<div id="imagelightbox-nav"></div>' );
					for( var i = 0; i < images.length; i++ )
						nav.append( '<a href="#"></a>' );

					nav.appendTo( 'body' );
					nav.on( 'click touchend', function(){ return false; });

					var navItems = nav.find( 'a' );
					navItems.on( 'click touchend', function()
					{
						var $this = $( this );
						if( images.eq( $this.index() ).attr( 'href' ) != $( '#imagelightbox' ).attr( 'src' ) )
							instance.switchImageLightbox( $this.index() );

						navItems.removeClass( 'active' );
						navItems.eq( $this.index() ).addClass( 'active' );

						return false;
					})
					.on( 'touchend', function(){ return false; });
				}
			},
			navigationUpdate = function( selector )
			{
				var items = $( '#imagelightbox-nav a' );
				items.removeClass( 'active' );
				items.eq( $( selector ).filter( '[href="' + $( '#imagelightbox' ).attr( 'src' ) + '"]' ).index( selector ) ).addClass( 'active' );
			},
			navigationOff = function()
			{
				$( '#imagelightbox-nav' ).remove();
			};
			$(".dropdown").selectBox();
			$('img').each( function () {
			$(this).removeAttr( 'width' );
			$(this).removeAttr( 'height' );
			});
});
