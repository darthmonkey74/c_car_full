<?php get_header();?>
		<?php if (have_posts()) :  while (have_posts()) : the_post();?>	 
		<?php require_once(TEMPLATEPATH."/functions/var/default-box-one.php");
			  require_once(TEMPLATEPATH."/functions/var/default-box-two.php");
			  require_once(TEMPLATEPATH."/functions/var/default-box-three.php");
			  global $options;$fields;$options2;$options3;$symbols;
			  $fields = get_post_meta($post->ID, 'mod1', true);
			  $options2 = get_post_meta($post->ID, 'mod2', true);
			  $options3 = get_post_meta($post->ID, 'mod3', true);
			  $symbols = get_option('gorilla_symbols');
			  $options = get_option('gorilla_fields');
			  ?>
			  <div class="top-single-bar hide">
            <div class="backToInventory show-for-small"><a href="javascript: history.go(-1)">< Back</a></div>
            <div class="show-for-small refine-search-single"><a id="searchBoxPop2" href="#"></a></div>
            <div class="clear"></div>
            </div>
            <div id="sidebar-search" > 
		<?php if ( ! dynamic_sidebar( 'Search Module' )) : ?>
				<?php endif; ?>
				</div>
		<?php cps_ajax_search_results(); ?>
            <div class="detail-page-content hideOnSearch">
             
               <div class="clear"></div>
	                <h3 class="show-for-small"><?php if (is_numeric( $fields['price'])){ echo $options['pricetext'].': '.$symbols['currency']; echo number_format($fields['price']);}else {  echo $fields['price']; } ?></h3>
                 <div class="clear"></div>	                    			
			<div id="gallery_holder" class="big-view hideOnSearch">	
			<div class="cpsAjaxLoaderSlider"></div> 
				<div id="gallery" class="big-view hideOnSearch">					
                  		    <?php gallery_user($post->ID,'large'); ?>               	
                            <div style="clear:both"></div>                   	
                   </div> 
                   <h1 class="hideOnSearch"><?php if ( $fields['year']){ echo $fields['year'];}else {  echo ''; }?> <?php the_title();?></h1>

                     <div style="clear:both"></div> 
                    <div class="cpsAjaxLoaderResults"></div> 
                   		<div class="small-view hideOnSearch" style="width:100%; float:left;">			
						<ul id="nav" class="elastislide-list thumbnails hideOnSearch">	
							<?php gallery_thumbs_user($post->ID,'thumbnail'); ?>							
						</ul>				
						</div>				
						</div>								
                             <span class="hide-for-small"><?php if ( ! dynamic_sidebar( 'Vehicle Details Widget' )) : ?>
				<?php endif; ?></span>    
<div class="tabs hideOnSearch">
	<span class="overview-tab active">
		<?php _e('Overview','language');?>
	</span>										
	<span class="features-tab">
		<?php _e('Features','language');?>
	</span>													
<?php $video_source = get_post_meta($post->ID, 'video_meta_box_source', true);
   $video_id = get_post_meta($post->ID, 'video_meta_box_videoid', true);               
   if(($video_source == "vimeo") && !empty($video_id)){ ?>
   <span class="video-tab"><?php _e('Video','language');?></span>                  
<?php } elseif(( $video_source == "youtube") && !empty($video_id)){ ?>
   <span class="video-tab"><?php _e('Video','language');?></span> 
   <?php  } ?>
   <span class="contact-tab">
		<?php _e('Contact','language');?>
	</span>					         										
	<div class="item-list">	<div class="cpsAjaxLoaderResults"></div> 
		<ul class="overview active first  quick-list-feat quick-glance">						
							<?php	if ( $fields['price']){ echo '<li><p class="strong">'.$options['pricetext'].':</p> '.$symbols['currency']; echo number_format($fields['price']).'</li>';}else {  echo ''; } ?> 						<?php	if ( $fields['miles']){ echo '<li><p class="strong">'.$options['milestext'].':</p> '.$fields['miles'].'</li>';}else {  echo ''; }?>
            			<?php	if ( $fields['vehicletype']){ echo '<li><p class="strong">'.$options['vehicletypetext'].':</p> '.$fields['vehicletype'].'</li>';}else {  echo ''; }?>
            			<?php	if ( $fields['drive']){ echo '<li><p class="strong">'.$options['drivetext'].':</p> '.$fields['drive'].'</li>';}else {  echo ''; }?>
            			<?php	if ( $fields['transmission']){ echo '<li><p class="strong">'.$options['transmissiontext'].':</p> '.$fields['transmission'].'</li>';}else {  echo ''; }?>
            			<?php	if ( $fields['exterior']){ echo '<li><p class="strong">'.$options['exteriortext'].':</p> '.$fields['exterior'].'</li>';}else {  echo ''; }?>
   						<?php	if ( $fields['interior']){ echo '<li><p class="strong">'.$options['interiortext'].':</p> '.$fields['interior'].'</li>';}else {  echo ''; }?>
   						<?php	if ( $fields['epamileage']){ echo '<li><p class="strong">'.$options['epamileagetext'].':</p> '.$fields['epamileage'].'</li>';}else {  echo ''; }?>
   						<?php	if ( $fields['stock']){ echo '<li><p class="strong">'.$options['stocktext'].':</p> '.$fields['stock'].'</li>';}else {  echo ''; }?>
   						<?php	if ( $fields['vin']){ echo '<li><p class="strong">'.$options['vintext'].':</p> '.$fields['vin'].'</li>';}else {  echo ''; }?>
   						<div style="background:none; padding:10px 3px 0px 3px!important;margin:0px auto;"><?php   if ( $fields['carfax']){ ?>  
   						<a class="carfax" target="_blank" href='http://www.carfax.com/VehicleHistory/p/Report.cfx?partner=<?php  echo $fields['carfax']; ?>&vin=<?php  echo $fields['vin']; ?>'><img style="border:1px solid #ccc" src='http://www.carfaxonline.com/media/img/subscriber/buyback.jpg' border='0'></a><?php  }else {   echo '';  }?>
   						</div><div style="clear:both"></div><div class="car-detail">  						
   						<h2 class="hideOnSearch"><?php if ( $fields['year']){ echo $fields['year'];}else {  echo ''; }?> <?php the_title();?></h2>						
                              	<?php 	
										$values = get_post_meta($post->ID, 'mod3', true);
										if (is_array($values))
										{
										foreach($values as $value) {
										echo wpautop($value );}
										}		
										?>	</div>
						</ul>										
					<ul class="features feature-list">	
					
					
					
                        		<?php if (get_the_terms($post->ID, 'features')) {
  									$taxonomy = get_the_terms($post->ID, 'features');									
  									foreach ($taxonomy as $taxonomy_term) {
    								?> <li><a href="#search/<?php echo strtolower(str_replace(" ", "", features)); ?>-<?php echo str_replace(' ', '+', $taxonomy_term->name);?>/"><?php echo $taxonomy_term->name;?></a></li>
    								
    								
    								
    								<?php }  						
																
									}
									
										?>				
          <?php if ( $fields['drive']){ echo '<li>'.$options['drivetext'].': '.$fields['drive'].'</li>';}else {  echo ''; }?>
  
          <?php if ( $fields2['enginetype']){ echo  '<li>'.$options['enginetypetext'].': '.$fields2['enginetype'].'</li>';}else {  echo ''; }?>
      
          <?php if ( $fields2['cylinders']){ echo '<li>'.$options['cylinderstext'].': '.$fields2['cylinders'].'</li>';}else {  echo ''; }?>
       
          <?php if ( $fields2['horsepower']){ echo '<li>'.$options['horsepowertext'].': '.$fields2['horsepower'].'</li>';}else {  echo ''; }?>
       
          <?php if ( $fields2['torque']){ echo '<li>'.$options['torquetext'].': '.$fields2['torque'].'</li>';}else {  echo ''; }?>
       
          <?php if ( $fields2['enginesize']){ echo '<li>'.$options['enginesizetext'].': '.$fields2['enginesize'].'</li>';}else {  echo ''; }?>
      
          <?php if ( $fields2['bore']){ echo '<li>'.$options['boretext'].': '.$fields2['bore'].'</li>';}else {  echo ''; }?>
      
          <?php if ( $fields2['stroke']){ echo '<li>'.$options['stroketext'].': '.$fields2['stroke'].'</li>';}else {  echo ''; }?>
       
          <?php if ( $fields2['valvespercylinder']){ echo '<li>'.$options['valvespercylindertext'].': '.$fields2['valvespercylinder'].'</li>';}else {  echo ''; }?>
        
          <?php if ( $fields2['fuelcapacity']){ echo '<li>'.$options['fuelcapacitytext'].': '.$fields2['fuelcapacity'].'</li>';}else {  echo ''; }?>
   
          <?php if ( $fields['epamileage']){ echo '<li>'.$options['epamileagetext'].': '.$fields['epamileage'].'</li>';}else {  echo ''; }?>

        <?php	if ( $fields['EPA_CITY_MPG']){ echo '<li>EPA City MPG: '.$fields['EPA_CITY_MPG'].'</li>';}else {  echo ''; }?>
			<?php	if ( $fields['EPA_HIGHWAY_MPG']){ echo '<li>EPA Highway MPG: '.$fields['EPA_HIGHWAY_MPG'].'</li>';}else {  echo ''; }?>
   				<?php	if ( $fields2['FRONT_AIR_CONDITIONING']){ echo '<li>Front Air Conditioning:</p> '.$fields2['FRONT_AIR_CONDITIONING'].'</li>';}else {  echo ''; }?>
   					   				  						   						   	<?php	if ( $fields2['FRONT_BRAKE_TYPE']){ echo '<li>Front Brake Type: '.$fields2['FRONT_BRAKE_TYPE'].'</li>';}else {  echo ''; }?>
   						   				  						   						   	<?php	if ( $fields2['ANTILOCK_BRAKING_SYSTEM']){ echo '<li>Antilock Braking System: '.$fields2['ANTILOCK_BRAKING_SYSTEM'].'</li>';}else {  echo ''; }?>
   						   				  						   						   	<?php	if ( $fields2['BRAKING_ASSIST']){ echo '<li>Braking Assist: '.$fields2['BRAKING_ASSIST'].'</li>';}else {  echo ''; }?>
   						   				  						   						   	<?php	if ( $fields2['REAR_BRAKE_DIAMETER']){ echo '<li>Rear Brake Diameter: '.$fields2['REAR_BRAKE_DIAMETER'].'</li>';}else {  echo ''; }?>
   						   				  						   						   	<?php	if ( $fields2['AUTO_DIMMING_REARVIEW_MIRROR']){ echo '<li>Auto Dimming Rearview Mirror: '.$fields2['AUTO_DIMMING_REARVIEW_MIRROR'].'</li>';}else {  echo ''; }?>
   						   				  						   						   	<?php	if ( $fields2['RUNNING_BOARDS']){ echo '<li>Running Boards: '.$fields2['RUNNING_BOARDS'].'</li>';}else {  echo ''; }?>
   						   				  						   						   	<?php	if ( $fields2['ROOF_RACK']){ echo '<li>Roof Rack: '.$fields2['ROOF_RACK'].'</li>';}else {  echo ''; }?>
   						   				  						   						   	<?php	if ( $fields2['POWER_DOOR_LOCKS']){ echo '<li>Power Door Locks: '.$fields2['POWER_DOOR_LOCKS'].'</li>';}else {  echo ''; }?>
   						   				  						   						   	<?php	if ( $fields2['ANTI_THEFT_ALARM_SYSTEM']){ echo '<li>Anti Theft Alarm System: '.$fields2['ANTI_THEFT_ALARM_SYSTEM'].'</li>';}else {  echo ''; }?>
   						   				  						   						   	<?php	if ( $fields2['CRUISE_CONTROL']){ echo '<li>Cruise Control: '.$fields2['CRUISE_CONTROL'].'</li>';}else {  echo ''; }?>
   						   				  						   						   	<?php	if ( $fields2['1ST_ROW_VANITY_MIRRORS']){ echo '<li>First Row Vanity Mirrors: '.$fields2['1ST_ROW_VANITY_MIRRORS'].'</li>';}else {  echo ''; }?>
   						   				  						   						   	<?php	if ( $fields2['HEATED_DRIVER_SIDE_MIRROR']){ echo '<li>Heated Driver Side Mirror: '.$fields2['HEATED_DRIVER_SIDE_MIRROR'].'</li>';}else {  echo ''; }?>
   						   				  						   						   	<?php	if ( $fields2['HEATED_PASSENGER_SIDE_MIRROR']){ echo '<li>Heated Driver Passenger Mirror: '.$fields2['HEATED_PASSENGER_SIDE_MIRROR'].'</li>';}else {  echo ''; }?>
   						   				  						   						   	<?php	if ( $fields2['TRAILER_WIRING']){ echo '<li>Trailer Wiring: '.$fields2['TRAILER_WIRING'].'</li>';}else {  echo ''; }?>
   						   				  						   						   	<?php	if ( $fields2['TRAILER_HITCH']){ echo '<li>Trailer Hitch: '.$fields2['TRAILER_HITCH'].'</li>';}else {  echo ''; }?>
   						   				  						   						   	<?php	if ( $fields2['CRUISE_CONTROLS_ON_STEERING_WHEEL']){ echo '<li>Cruise Control on Steering Wheel: '.$fields2['CRUISE_CONTROLS_ON_STEERING_WHEEL'].'</li>';}else {  echo ''; }?>
   						   				  						   						   	<?php	if ( $fields2['AUDIO_CONTROLS_ON_STEERING_WHEEL']){ echo '<li>Audio Control on Steering Wheel: '.$fields2['AUDIO_CONTROLS_ON_STEERING_WHEEL'].'</li>';}else {  echo ''; }?>
   						   				  						   						   	<?php	if ( $fields2['FOLDING_2ND_ROW']){ echo '<li>Folding Second Row Seats: '.$fields2['FOLDING_2ND_ROW'].'</li>';}else {  echo ''; }?>
   						   				  						   						   	<?php	if ( $fields2['1ST_ROW_POWER_OUTLET']){ echo '<li>First Row Power Outlet: '.$fields2['1ST_ROW_POWER_OUTLET'].'</li>';}else {  echo ''; }?>
   						   				  						   						   	<?php	if ( $fields2['CARGO_AREA_POWER_OUTLET']){ echo '<li>Cargo Area Power Outlet: '.$fields2['CARGO_AREA_POWER_OUTLET'].'</li>';}else {  echo ''; }?>
   						   				  						   						   	<?php	if ( $fields2['INDEPENDENT_SUSPENSION']){ echo '<li>Independent Suspension: '.$fields2['INDEPENDENT_SUSPENSION'].'</li>';}else {  echo ''; }?>
   						   				  						   						   	<?php	if ( $fields2['REAR_SUSPENSION_TYPE']){ echo '<li>Rear Suspension Type: '.$fields2['REAR_SUSPENSION_TYPE'].'</li>';}else {  echo ''; }?>
   						   				  						   						   	<?php	if ( $fields2['FRONT_SUSPENSION_TYPE']){ echo '<li>Rear Suspension Type: '.$fields2['FRONT_SUSPENSION_TYPE'].'</li>';}else {  echo ''; }?>
   						   				  						   						   	<?php	if ( $fields2['INDEPENDENT_SUSPENSION']){ echo '<li>Independent Suspension: '.$fields2['INDEPENDENT_SUSPENSION'].'</li>';}else {  echo ''; }?>
   						   				  						   						   	<?php	if ( $fields2['MAX_CARGO_CAPACITY']){ echo '<li>Maximum Cargo Capacity Suspension: '.$fields2['MAX_CARGO_CAPACITY'].'</li>';}else {  echo ''; }?>
   						   				  						   						   	<?php	if ( $fields2['PASSENGER_AIRBAG']){ echo '<li>Passenger Airbags: '.$fields2['PASSENGER_AIRBAG'].'</li>';}else {  echo ''; }?>
   		
          <?php if ( $fields2['wheelbase']){ echo '<li>'.$options['wheelbasetext'].':'.$fields2['wheelbase'].'</li>';}else {  echo ''; }?>
      
          <?php if ( $fields2['overalllength']){ echo '<li>'.$options['overalllengthtext'].': '.$fields2['overalllength'].'</li>';}else {  echo ''; }?>
      
          <?php if ( $fields2['width']){ echo '<li>'.$options['widthtext'].': '.$fields2['width'].'</li>';}else {  echo ''; }?>
      
          <?php if ( $fields2['height']){ echo '<li>'.$options['heighttext'].': '.$fields2['height'].'</li>';}else {  echo ''; }?>
      
          <?php if ( $fields2['curbweight']){ echo '<li>'.$options['curbweighttext'].': v'.$fields2['curbweight'].'</li>';}else {  echo ''; }?>
     
          <?php if ( $fields2['legroom']){ echo '<li>'.$options['legroomtext'].': '.$fields2['legroom'].'</li>';}else {  echo ''; }?>
      
          <?php if ( $fields2['headroom']){ echo '<li>'.$options['headroomtext'].': '.$fields2['headroom'].'</li>';}else {  echo ''; }?>
     
          <?php if ( $fields2['seatingcapacity']){ echo '<li>'.$options['seatingcapacitytext'].': '.$fields2['seatingcapacity'].'</li>';}else {  echo ''; }?>
        
          <?php if ( $fields2['tires']){ echo '<li>'.$options['tirestext'].': '.$fields2['tires'].'</li>';}else {  echo ''; }?>
      
          <?php if ( $fields['transmission']){ echo '<li>'.$options['transmissiontext'].': '.$fields['transmission'].'</li>';}else {  echo ''; }?>
       
                   		</ul>           																                   
						<ul class="video">
							<li><?php $video_source = get_post_meta($post->ID, 'video_meta_box_source', true);
									$video_id = get_post_meta($post->ID, 'video_meta_box_videoid', true);	
													
									if(($video_source == "vimeo") && !empty($video_id)){ ?>
									<iframe src="http://player.vimeo.com/video/<?php echo $video_id; ?>?title=0&amp;portrait=0&amp;color=e275c7" width="739" height="406" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe>
									<?php } elseif(( $video_source == "youtube") && !empty($video_id)){ ?>
									<iframe src="http://www.youtube.com/embed/<?php echo $video_id; ?>"  width="739" height="406" frameborder="0" allowfullscreen></iframe>
									<?php  } ?>
							</li>
						</ul>
						<ul class="contact-tab-form">	
					<li>
                        		<?php
//If the form is submitted

if(isset($_POST['submitted'])) {	
		
$error_message = '';

	//Check to see if the honeypot captcha field was filled in

	if(trim($_POST['checking']) !== '') {

		$captchaError = true;

	} else {	

		//Check to make sure that the name field is not empty

		if(trim($_POST['contactName']) === '') {

			$nameError = __('You forgot to enter your name.','language');
			$error_message .= 'Your Name\n';
			$hasError = true;

		} else {

			$name = trim($_POST['contactName']);

		}

		//Check to make sure sure that a valid email address is submitted

		if(trim($_POST['email']) === '')  {

			$emailError = __('You forgot to enter your email address.','language');
			$error_message .= 'Your Email\n';
			$hasError = true;

		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {

			$emailError = __('You entered an invalid email address.','language');
			$error_message .= 'Enter a valid Email\n';
			$hasError = true;

		} else {

			$email = trim($_POST['email']);

		}
		
		//Check to make sure comments were entered	

		if(trim($_POST['comments']) === '') {

			$commentError = __('You forgot to enter your comments.','language');
			$error_message .= 'Comments\n';
			$hasError = true;

		} else {

			if(function_exists('stripslashes')) {

				$comments = stripslashes(trim($_POST['comments']));

			} else {

				$comments = trim($_POST['comments']);

			}

		}

	if( $_SESSION['security_code1'] == $_POST['security_code1'] && !empty($_SESSION['security_code1'] ) ) {
			unset($_SESSION['security_code1']);
			$errors['security_code1'] = '';
	   } else {
			$errors['security_code1'] = 'Incorrect Security Code';			
			$error_message .= 'Incorrect Security Code\n';
			$hasError = true;
	   }
   
		if($hasError) echo 	'<script>alert("\nPlease re-enter mandatory fields below: " + "\n\n'.$error_message.'");</script>';

		//If there is no error, send the email

		if(!isset($hasError)) {

			$emailTo = get_the_author_meta('user_email'); 

			$subject = 'Contact Form Submission from '.$name;

			$sendCopy = trim($_POST['sendCopy']);

			$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";

			$headers = 'From: My Site <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;		

			wp_mail($emailTo, $subject, $body, $headers);

			if($sendCopy == true) {

				$subject = 'You emailed Your '.get_bloginfo('name');

				$headers = 'From:  '.get_the_author_meta('user_email');

				wp_mail($email, $subject, $body, $headers);

			}

			$emailSent = true;

		}

	}

} ?>
<?php if(isset($emailSent) && $emailSent == true) { ?>
      <div class="thanks">
        <h4>
          <?php _e('Thanks,','language');?>
          <?php $name;?>
        </h4>
        <p>
          <?php _e('Your email was successfully sent. I will be in touch soon.','language')?>
        </p>
      </div>
      <?php } else { ?>
      <?php if(isset($hasError) || isset($captchaError)) { ?>
      <p class="error">
        <?php _e('There was an error submitting the form.','language');?>
      <p>
        <?php } ?>
            <form action="" id="contactFormUs" name="contactFormUs" method="post" class="forms-contact formsec">
        <div class="pro_fields">
          <li>
            <label for="contactName">
              <?php _e('Name','language');?>
            </label>
            <br/>
            <?php $contactName = $_POST['contactName']; 
					if($contactName != '' && $contactName !='Please enter your name'){
						$contactName = $_POST['contactName']; 
					}else{
						$contactName = 'Please enter your name'; 
					}
				?>
            <input type="text" name="contactName" id="cs_contactName" class="field" value="<?php echo $contactName; ?>" class="requiredField" onblur="if(this.value == '') { this.value = 'Please enter your name'; }"  onfocus="if(this.value == 'Please enter your name') { this.value = ''; }" />
            <?php if($nameError != '') { ?>
            <span class="error">
            <?php $nameError;?>
            </span>
            <?php } ?>
          </li>
        </div>
        <div class="pro_fields">
          <li>
            <label for="email">
              <?php _e('Email','language');?>
            </label>
            <br/>
            <?php $email = $_POST['email']; 
					if($email != '' && $email !='Please enter your e-mail'){
						$email = $_POST['email']; 
					}else{
						$email = 'Please enter your e-mail'; 
					}
				?>
            <input type="text" name="email" id="cs_email" class="field" value="<?php echo $email; ?>" class="requiredField email" onblur="if(this.value == '') { this.value = 'Please enter your e-mail'; }"  onfocus ="if(this.value == 'Please enter your e-mail') { this.value = ''; }"/>
            <?php if($emailError != '') { ?>
            <span class="error">
            <?php $emailError;?>
            </span>
            <?php } ?>
          </li>
        </div>
        <div class="pro_fields">
          <li>
            <label for="commentsText">
              <?php _e('Comments','language');?>
            </label>
            <br/>
            <?php $comments = $_POST['comments']; 
					if($comments != '' && $comments !='Please enter your message'){
						$comments = $_POST['comments']; 
					}else{
						$comments = 'Please enter your message'; 
					}
				?>
            <textarea name="comments" id="cs_comments" onblur="if(this.value == '') { this.value = 'Please enter your message'; }"  onfocus ="if(this.value == 'Please enter your message') { this.value = ''; }" class="requiredField"><?php echo $comments; ?>
</textarea>
            <?php if($commentError != '') { ?>
            <br>
            <span class="error">
            <?php $commentError;?>
            </span>
            <?php } ?>
          </li>
          <div style="clear:both"></div>
          <div class="pro_fields">
            <li>
              <div class="captcha_form"> <span class="error">
                <?php $errors['security_code1'];?>
                </span>
                <div class="securityText">
                  <label>
                    <?php _e('Security Text','language');?>
                  </label>
                </div>
                <div class="securityImage1"> <img src="<?php echo get_bloginfo('template_directory'); ?>/includes/captcha/CaptchaSecurityImages1.php?width=100&height=40&characters=5" />
                  <?php if($errors['security_code1'] != '') { ?>
                  <?php } ?>
                </div>
                <div class="clear"></div>
                <div class="securityCodeText">
                  <label for="security_code"><?php _e('Security Code: ','language');?></label>
                </div>
                <div class="securityInputField">
                  <input id="security_code1" name="security_code1" value="<?php echo $_POST['security_code1']; ?>" type="text" />
                </div>
                <div class="clear"></div>
              </div>
               <div class="clear"></div>
            </li>
          </div>
          <div style="clear:both"></div>
          <input type="submit" name="submitted" id="submitted" class="send-contact" value="Send" />
          <div style="clear:both"></div>
        </div>
        <div style="clear:both"></div>
      </form>      <?php } ?>     

					</li>
                   		</ul>    
					</div>                        
                </div>                
            <div style="clear:both"></div>                     
          </div>                 
             <div id="sidebar" class="common"> 
		            	<?php if ( ! dynamic_sidebar( 'Sidebar' )) : ?>
				<?php endif; ?>
			</div>        
            <?php  endwhile; endif; ?> 
                        
			<div class="hide-for-small">
				<?php if ( ! dynamic_sidebar('Similar Cars')) : ?>
				<?php endif; ?></div>
		<div style="clear:both; width:980px; height:1px; overflow:hidden;" class="hide-for-small"></div>
        <div style="clear:both; width:100%; height:1px; overflow:hidden;"></div>		
	</div>
 <?php get_footer(); ?>