var $ = jQuery.noConflict();

$(window).load(function(){
	
	// FADE IN BACKGROUND IMAGE ON SIGN-UP PAGES
	if($('#signup-page').length) {
		$('#background').animate({opacity:1}, 600);
	}
	
});

$(function(){

	// BODY ID
	if(!$('#signup-page').length) {
		$('body').attr('id', 'inner-page');
	} else {
		$('body').attr('id', 'signup-bodytag');	
		$('html').attr('id', 'signup-htmltag');	
	}
	
	// FADE IN SIGNUP PAGE NICELY	
	if($('#signup').length) {
	
		var bigSpinnerOpts  = { lines: 24, length: 8, width: 2, radius: 24, color: '#aaa', speed: 1.25, trail: 60, shadow: false, hwaccel: false, className: 'spinner', zIndex: 2e9, top: 'auto', left: 'auto' };
		var signupSpinnerContainer = document.getElementById('signup');
		var signupSpinner = new Spinner(bigSpinnerOpts).spin(signupSpinnerContainer);

		$('#signup-content-wrapper').imagesLoaded( function($imagesToFadeIn) {
			$('.spinner').remove();
			$('#signup-content-wrapper').animate({opacity:1}, 600);
		});
		
	}

	// IPHONE STICKY FOOTER
	if(navigator.platform == 'iPad' || navigator.platform == 'iPhone' || navigator.platform == 'iPod') {
		//$('ul#footer').css('position','static');
	}

	// EMBED WRAPPER
	$('.lepost iframe, #signup iframe, .lepost object, #signup object, .lepost embed, #signup embed').wrap('<div class="video" />');
	
		
	// MODAL POSITION
	$('.modal-trigger').click(function(){
		var modalPos = $(window).scrollTop() + 70;
		$('.jqmWindow').css('top', modalPos + 'px');
	});
	
	
	// RETURNING USER TOOLTIP
	reuserBubble();
	
	
	// ERROR MESSAGING 
	if($('.error, #error').length) {
		$('#form-layout li').click(function(){
			$(this).find('#error, .error').fadeOut('fast');
		});
		
		$('#form-layout li .fieldset').siblings('.error').addClass('fieldset-error');
	}
	
	
	// Privacy Policy Modals
	$('.jqmWindow#privacy-policy').jqm({trigger: 'a#modal-privacy', overlay:60});
	$('.jqmWindow#privacy-policy').jqmAddClose('a.close'); 


	// SUBMIT THE FORM

  	function leSubmitLoader(){
		var littleSpinnerOpts = {
			lines: 10,
			length: 3,
			width: 2,
			radius: 5,
			color: '#FFF',
			speed: 1,
			trail: 60,
			shadow: false
		};
		
		$('#submit-button-spinner').fadeIn('fast');
		var submitSpinnerContainer = document.getElementById('submit-button-spinner');
		var submitSpinner = new Spinner(littleSpinnerOpts).spin(submitSpinnerContainer);
  	}
  	
  	function leSubmitLoaderStop(){
      	$('#submit-button-spinner').hide();
  	}
	

    $("#form").submit(function(e){
 
      	e.preventDefault();
      	
		leSubmitLoader();
      	      	
        dataString = $("#form").serialize();
        var templateURL = $('#templateURL').attr('value');
        var blogURL = $('#blogURL').attr('value');
        
        $.ajax({
	        type: "POST",
	        url: templateURL + "/post.php",
	        data: dataString,
	        dataType: "json",
	        success: 
        	
        	function(data) {
        		
				function leSubmit(returning){
					
			    	$('#form, #error, #presignup-content').hide();
			    	$('#success').fadeIn(function(){
						var successScroll = $('#signup-body').offset().top - 20;
						$('html,body').animate({scrollTop:successScroll}, 300);
			    	});
			    	
			    	if (returning == true) {
		
			    		$('#returninguser, #returninguserurl').show();
		
				        var refCode = data.returncode;
		
				        $('#returninguser span.user').text(data.email);
				        $('#returninguser span.clicks').text(data.clicks);
				        $('#returninguser span.conversions').text(data.conversions);
				        $('#returninguserurl input#returningcode').attr('value', blogURL + '/?ref=' + refCode);
		
			    	} else {
						
			    		$('#success-content, #newuser').show();
			    		
						var refCode = data.code;
						
						$('#newuser input#successcode').attr('value', blogURL + '/?ref=' + refCode);
							    
					    if(data.pass_thru_error == "blocked"){
		            		$('#pass_thru_error').fadeIn();
		            		$('#pass_thru_error').html('AWeber Sync Error: Email Blocked.');
		        		} else if (data.pass_thru_error.AWeberAPIException != undefined){
							err = data.pass_thru_error.AWeberAPIException;
		            		$('#pass_thru_error').fadeIn();
		            		$('#pass_thru_error').html(err.type+': '+err.msg);
						}
		
			    	}
			        
			        // Referral URL
			        var refUrl = blogURL + '/?ref=' + refCode;
			        
			        // Twitter (note: refUrl might not show up in share box on localhost)
					var tweetUrl = 'http://twitter.com/intent?url=' + encodeURIComponent(refUrl);
					var tweetMessage = $('input#twitterMessage').attr('value');
		    		$('#tweetblock').html('<a href="https://twitter.com/share" class="twitter-share-button" data-url="'+refUrl+'" data-text="'+tweetMessage+'" data-count="none">Tweet</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>');
					
					// Facebook (note: won't work on localhost)
					$("#fblikeblock").html('<div class="fb-like" data-href="'+refUrl+'" data-send="true" data-width="120" data-show-faces="false" data-font="arial" layout="button_count"></div>');
					
					// Google +
					function renderPlusone() {
						gapi.plusone.render('plusoneblock', {'href':refUrl, 'size':'tall', 'annotation':'none'});
						}
						renderPlusone();
					
					// Tumblr
				    var tumblr_button = document.createElement("a");
				    tumblr_button.setAttribute("href", "http://www.tumblr.com/share/link?url=" + encodeURIComponent(refUrl) + "&name=" + encodeURIComponent(tumblr_link_name) + "&description=" + encodeURIComponent(tumblr_link_description));
				    tumblr_button.setAttribute("title", "Share on Tumblr");
				    tumblr_button.setAttribute("onclick", "window.open(this.href, 'tumblr', 'width=460,height=400'); return false;");
				    tumblr_button.setAttribute("style", "display:inline-block; text-indent:-9999px; overflow:hidden; width:81px; height:20px; background:url('http://platform.tumblr.com/v1/share_1.png') top left no-repeat transparent;");
				    tumblr_button.innerHTML = "Share on Tumblr";
				    document.getElementById("tumblrblock").appendChild(tumblr_button);
				    
				    // RinkedIn
				    $('#linkinblock').html('<script src="http://platform.linkedin.com/in.js" type="text/javascript"></script><script type="IN/Share" data-url="'+refUrl+'"></script>');
		
				}
				
			    if(data.email_check == "invalid") {
			       
					leSubmitLoaderStop();
			        $('#error').html('This email address is invalid.').fadeIn();
			        
			    }
			    else if(data.required.length) {
			    
			    	leSubmitLoaderStop();
			    	$('.error').hide();
			    	$d = String(data.required).split(",");
					$.each($d, function(k, v){
						$("#" + v + ".error").fadeIn();
					});
			    }
			    else {
			    	
			    	if(data.reuser == "true") {
			    		
						leSubmit(true);
						FB.XFBML.parse(document.getElementById('fblikeblock'));
			    	
			    	} else {
			    	
			    		leSubmit(false);
			    		FB.XFBML.parse(document.getElementById('fblikeblock'));
			    		          				            		
			    	}
			    	$('body').addClass('submission-success');
			            
				}
				
			}

        });          

    });
    
});

// SELECT LINK URL ON CLICK

function SelectAll(id) {
    document.getElementById(id).focus();
    document.getElementById(id).select();
}

// EASING EQUATION

$.extend($.easing,{
    def: 'easeInOutCubic',
    easeInOutCubic: function (x, t, b, c, d) {
        if ((t/=d/2) < 1) {
        	return c/2*t*t*t + b;
        }
        return c/2*((t-=2)*t*t + 2) + b;
    }
});


// RETURNING USER TOOLTIP
function reuserBubble(){
	var bubbleRight = ((124 - $('a#reusertip').width())/2)*(-1);
	var bubbleTop = ($('#reuserbubble').height() + $('a#reusertip').height() + 15) * (-1); 
 	var bubblePos = {
      'right' : bubbleRight,
      'top' : bubbleTop
    }
    
    $('#reuserbubble').css(bubblePos);
	
	$('a#reusertip').mouseenter(function(){
		$('#reuserbubble').stop().fadeIn('fast');
	}).mouseleave(function(){
		$('#reuserbubble').stop().fadeOut('fast');
	});
	
	$('a#reusertip').click(function(e){
		e.preventDefault();
	});	
}