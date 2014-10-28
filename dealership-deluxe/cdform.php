<?php 
/*
Template Name: Sell your car
*/ 
?>
<?php session_start();
$k=0;
if (isset($_POST['submit3']) && $_POST['submit3'] == 'Submit') {	
	if( $_SESSION['security_code3'] == $_POST['security_code3'] && !empty($_SESSION['security_code3'] ) ) {
			unset($_SESSION['security_code3']);
			$errors['security_code3'] = '';
	   } else {
			$errors['security_code3'] = 'Incorrect Security Code';		
			echo '<script>alert("Incorrect Security Code. \nPlease re-enter correct text and try again.");</script>';
			$hasError = true;
	   }
}
if(isset($_POST['ptitle']) &&  $k==0 && $errors['security_code3'] == '')

	{	
		if (isset($_POST['num'])!=$_SESSION ['img_number']) {
  		$k=1;
	 } else {	
		$user_name = $_POST["fname"].$_POST["lname"];
		$user_email = $_POST["email"];
		$user_id = username_exists( $user_name );
		if ( !$user_id ) {
			$random_password = wp_generate_password( 12, false );
			$user_id = wp_create_user( $user_name, $random_password, $user_email );
			} else {
			$random_password = __('User already exists.  Password inherited.','language');
			}	 
	 			$data['post_title']=$_POST['ptitle'];
	  			$data['post_status']='pending';
				$data['post_author']= $user_id;
		 		$data['post_type'] = 'user_listing';
				$post_id = wp_insert_post($data);
				$mod1_arr=array("price"=>$_POST['price'],"vehicletype"=>$_POST['vehitype'],"year"=>$_POST['yearbuilt'],"miles"=>$_POST['mileage'],"drive"=>$_POST['vdrive'],"exterior"=>$_POST['ext'],"interior"=>$_POST['int'],"vin"=>$_POST['vin']);
				$commet_arr=array("comment_area"=>$_POST['description']);
				add_post_meta($post_id, "mod1", $mod1_arr);
	    		add_post_meta($post_id, "mod3", $commet_arr);
       			add_post_meta($post_id, "_price", $_POST["price"]);
	   			add_post_meta($post_id, "_fname", $_POST["fname"]);
	   			add_post_meta($post_id, "_lname", $_POST["lname"]);
	    		add_post_meta($post_id, "_email", $_POST["email"]);
		 		add_post_meta($post_id, "_phone", $_POST["pnum"]);
		 		$makemodel = array($_POST['model'], $_POST['make']);
				wp_set_object_terms($post_id,$makemodel, 'makemodel' );
				$arrtmp=explode(',',$_POST['features']);
				wp_set_object_terms($post_id,$arrtmp, 'features' );
				$t=$_POST['tid']+1;
				for($i=0;$i<$t;$i++)
					{	if($_FILES['input_'.$i]['name']!=''){
						$wp_filetype = wp_check_filetype(basename($_FILES["input_".$i]["name"]), null );
						$sPattern = '/\s*/m';
						$sReplace = '';
						$f=$_FILES["input_".$i]["name"];
		 				$n=explode('.',$f);
		 				include_once(ABSPATH . 'wp-admin/includes/image.php');	
		 				$filename=$_FILES["input_".$i]["name"];
						$name = preg_replace( $sPattern, $sReplace, $filename );
						//$emailname = preg_replace('/^[A-Za-z][A-Za-z0-9!@#$%^&*]*$/','-',$filename); 
						$emailname = preg_replace('/(JPG|JPEG|jpg|jpeg|gif|png|bmp|tif|tiff)/','',$filename); 
						$emailname = str_replace(".","-",$emailname);
						$emailname = preg_replace( '/\s*/m', '', $emailname );
						//$emailname = strtolower($emailname); 
						$upload_path=wp_upload_dir();
						move_uploaded_file($_FILES['input_'.$i]['tmp_name'],$upload_path['path'].'/'.$name);
						$pathurl=$upload_path['url'];
						$attachment = array(
						'post_mime_type' => $wp_filetype['type'],
						'post_title' => preg_replace('/\.[^.]+$/', '', basename($_FILES["input_".$i]["name"])),
						'post_content' => '',
						'post_status' => 'inherit'
						);
						$attach_id = wp_insert_attachment( $attachment, $upload_path['path'].'/'.$name, $post_id );
						$allimgarr[]= $upload_path['url'].'/'.$emailname.'86x60.'.strtolower($n[1]);
						$attach_data = wp_generate_attachment_metadata( $attach_id, $upload_path['path'].'/'.$name);
						wp_update_attachment_metadata( $attach_id, $attach_data );	
						}
 					}  
   				$tmpURL=$_SERVER['SERVER_NAME'].$_SERVER['REDIRECT_URL'];   
  				$msgstr='';
   				if(isset($_POST['fname']))
   				{	$msgstr.='<br/><tr><td><br/>Your Personal Information<br/><br/></td></tr><tr><td><span style="font-weight:bold!important">First Name:</span></td><td>'.$_POST["fname"].'</td></tr>';	}
   				if(isset($_POST['lname']))
   				{	$msgstr.='<tr><td><span style="font-weight:bold!important">Last Name:</span></td><td>'.$_POST["lname"].'</td></tr>';	}
   				if(isset($_POST['email'])) { $msgstr.='<tr><td><span style="font-weight:bold!important">Email:</span></td><td>'.$_POST["email"].'</td></tr>';}
   				if(isset($_POST['pnum']))	{	$msgstr.='<tr><td><span style="font-weight:bold!important">Phone Number:</span></td><td>'.$_POST["pnum"].'</td></tr>';}
				?>
<?php
	   				$str='<table><tr><tr><td><span style="font-weight:bold!important">Title: </span></td><td style="margin-left:10px;">'.' '.$_POST["ptitle"].'</td></tr>
	   				<tr><td><span style="font-weight:bold!important">'.$options['vehicletypetext'].': </strong></td><td>' .$_POST["vehitype"].'</td></tr>
	   				<tr><td><span style="font-weight:bold!important">'.$options['pricetext'].': </span></td><td>' .$_POST["price"].'</td></tr>
	   				<tr><td><span style="font-weight:bold!important">'.$options['yeartext'].': </span></td><td> '.$_POST["yearbuilt"].'</td></tr>
	   				<tr><td><span style="font-weight:bold!important">'.$options['drivetext'].': </span></td><td> '.$_POST["vdrive"].'</td></tr>
	   				<tr><td><span style="font-weight:bold!important">'.$options['milestext'].': </span></td><td>' .$_POST["mileage"].'</td></tr>
	   				<tr><td><span style="font-weight:bold!important">'.$options['exteriortext'].': </span></td><td>' .$_POST["ext"].'</td></tr>
	   				<tr><td><span style="font-weight:bold!important">'.$options['interiortext'].': </span></td><td>' .$_POST["int"].'</td></tr>
	   				<tr><td><span style="font-weight:bold!important">'.$options['vintext'].': </span></td><td>' .$_POST["vin"].'</td></tr>
	   				<tr><td><span style="font-weight:bold!important">'.$options['transmissiontext'].': </span></td><td>' .$_POST["transm"].'</td></tr>
	   				</tr><br/>'.$msgstr.'</table>'.$imgmsg;
					$from = get_bloginfo('admin_email'); 
					$headers = "MIME-Version: 1.0" . "\n";
					$headers .= "Content-type:text/html;charset=utf-8" . "\n";
					$headers .= "From: $from" . "\n";
					$wp_user_search = $wpdb->get_results("SELECT ID, display_name FROM $wpdb->users ORDER BY ID");
					foreach($wp_user_search as $user)
					{   
					if( !get_the_author_meta( 'emailmsg', $user->ID ) ) 
					{
					echo '';
						} else {
	 				$email_id=get_the_author_meta( 'user_email', $user->ID );
	 				wp_mail($email_id,'New listing from '.get_bloginfo('name'),$str,$headers);
						}
					}
					if(isset($_POST['sendcopy']))
						{
						$email_id=$_POST['email'];
						wp_mail($email_id,'New listing submission from '.bloginfo('name').'',$str,$headers);
						}
						$k=2;
						}
					}
				?>
<?php get_header();?>
<?php require_once(TEMPLATEPATH."/functions/var/default-box-one.php");
			  require_once(TEMPLATEPATH."/functions/var/default-box-two.php");
			  require_once(TEMPLATEPATH."/functions/var/default-box-three.php");global $options;$fields;$options2;$options3;$symbols;$fields = get_post_meta($post->ID, 'mod1', true);$options2 = get_post_meta($post->ID, 'mod2', true);$options3 = get_post_meta($post->ID, 'mod3', true);$symbols = get_option('gorilla_symbols');$options = get_option('gorilla_fields');?>
<div>
  <div id="layer"></div>
  <div id="content-single">
    <?php cps_ajax_search_results(); ?>
    <div class="hideOnSearch" style="border:none!important">
      <div class="blog-post hideOnSearch" style="border:none!important">
        <h1 >
          <?php _e('Submit your Vehicle to','language');?>
          <?php bloginfo('name');?>
        </h1>
        <?php  include_once(TEMPLATEPATH."/includes/validation.php"); ?>
        <?php if($k==2){ ?>
        <!-- Thank you Message -->        
        <div class="thankyou_page">
          <div  style=" width:100%;color: #000000" id="cdError">
            <p>
              <?php  _e('Thank you ','language');?>
              <span style="font-weight:bold!important"><?php echo $_POST['fname'].' ';?></span><span style="font-weight:bold!important"><?php echo $_POST['lname'];?></span><?php echo',';?> <?php echo _e('your vehicle was added successfully and it will be reviewed for publishing, you will receive an e-mail when the listing goes live and we will e-mail a password for you to edit your vehicle listing in our inventory.','language');?></p>
            <br/>
            <p><strong><?php echo _e('This is a summary of your submitted listing.','language');?></strong></p>
            <?php																
					 $str='<table><tr><tr><td>'.$options['makemodeltext'].': </td><td>'.$_POST["make"].' '.$_POST["model"].'</td></tr>												
					<tr><td><span style="font-weight:bold!important">'.__('Listing Title:','language').'</span></td><td>' .$_POST["ptitle"].'</td></tr>
	   				<tr><td><span style="font-weight:bold!important">'.$options['vehicletypetext'].': </span></td><td>' .$_POST["vehitype"].'</td></tr>
	   				<tr><td><span style="font-weight:bold!important">'.$options['pricetext'].': </span></td><td> '.$_POST["price"].'</td></tr>
	   				<tr><td><span style="font-weight:bold!important">'.$options['yeartext'].': </span></td><td>' .$_POST["yearbuilt"].'</td></tr>
	   				<tr><td><span style="font-weight:bold!important">'.$options['milestext'].': </span></td><td>' .$_POST["mileage"].'</td></tr>
	   				<tr><td><span style="font-weight:bold!important">'.$options['drivetext'].': </span></td><td>' .$_POST["vdrive"].'</td></tr>
	   				<tr><td><span style="font-weight:bold!important">'.$options['exteriortext'].': </span></td><td>' .$_POST["ext"].'</td></tr>
	   				<tr><td><span style="font-weight:bold!important">'.$options['interiortext'].': </span></td><td>' .$_POST["int"].'</td></tr>
	   				<tr><td><span style="font-weight:bold!important">'.$options['vintext'].': </span></td><td>' .$_POST["vin"].'</td></tr>
	   				<tr><td><span style="font-weight:bold!important">'.$options['transmissiontext'].': </span></td><td>' .$_POST["transm"].'</td></tr>
	   				</tr>'.$msgstr.'</table>';/* .$imgmsg; */?>
            <?php echo $str;?> </div>
        </div>      
        <!-- End Thank you Message -->      
        <?php } else { ?>
        <form action="" id="pro_form" enctype="multipart/form-data" method="post">         
          <!-- Wrong Verification Code Message -->         
          <div>
            <?php if($k==1){ ?>
            <div  style=" width:100%;color:#CC0033; " id="cdError">
              <?php _e('Your verification code is wrong','language');?>
            </div>
            <?php } ?>            
            <!-- End Wrong Verification Code Message -->
            <div style="clear:both"></div>            
            <div class="pro_fields">
              <li>
                <label class="head_label">
                  <?php _e('Your Vehicle Information &raquo;','language');?>
                </label>
              </li>
            </div>            
            <!-- Make & Model Field -->            
            <div class="pro_fields">
              <div class="title_field">
                <label class="field_label">
                  <?php _e('Your listing title','language');?>
                </label>
                <?php $ptitle = $_POST['ptitle']; 
					if($ptitle != '' && $ptitle !='Enter listing title'){
						$ptitle = $_POST['ptitle']; 
					}else{
						$ptitle = 'Enter listing title'; 
					}
				?>
                <div>
                  <input type="text" onblur="if(this.value == '') { this.value = 'Enter listing title'; }"  onfocus="if(this.value == 'Enter listing title') { this.value = ''; }" value="<?php echo $ptitle;?>" class="submit_form_long_input" style="width: 388px;" autocomplete="off" id="ptitle" name="ptitle"  >
                </div>
              </div>
              <div style="clear:both"></div>
            </div>
            <div class="pro_fields">
              <div class="make_model_field">
                <li class="class="drop_single>
                  <label class="field_label" >
                    <?php _e('Make','language');?>
                  </label>
                  <div> 
                    <script type="text/javascript">
    $(function(){
        $('#make').change(function()
        {
            var $mainCat=$('#make :selected').attr('data-value');
            if(!$mainCat){
                $mainCat = $('#make').val();
            }
            $("#model").empty();
            $.ajax
            (
            {
                url:"<?php bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php", 
                type:'POST',
                data:'action=my_special_ajax_name_call&main_catid=' + $mainCat,
				success:function(results)
                {
                 options = $(results);
				 if(options.length > 1){
					 $("#model").removeAttr("disabled"); 
					 } else {
						 if(!$("#model").is(':disabled')){
							 $("#model").attr("disabled", "disabled"); 
							 }
							 }
							 $("#model").append(results); 
							 $("#model").selectBox('destroy');
							 $("#model").selectBox();    
							 }
							 }
							 ); 
							 });
							 }); 
							 </script>
							 <?php 
								 wp_dropdown_categories_custom(array(
								 'show_count' => '1' ,
								 'selected' => '1',
								 'hierarchical' => '1' ,
								 'depth' => '1' ,
								 'hide_empty' => '0' ,
								 'exclude' => '1' ,
								 'class' => 'dropdown',
								 'show_option_none' => 'Select Make',
								 'name' => 'make' ,
								 'id' => 'make' ,
								 'taxonomy' => 'makemodel' ,
								 'walker' => new Walker_CategoryDropdown_Custom() ,
								 ));?>
                  </div>
                </li>
              </div>
              <div class="make_model_field">
                <li class="class="drop_single>
                  <label class="field_label" >
                    <?php _e('Model','language');?>
                  </label>
                  <label class="field_label" >
                    <?php _e(' (select make first)','language');?>
                  </label>
                  <div>
                    <select name="model" id="model" class="dropdown" disabled="disabled">
                      <option value="">
                      <?php _e('Select Model','language');?>
                      </option>
                    </select>
                  </div>
                </li>
              </div>
              <div class="year_field">
                <li class="drop_single">
                  <label class="field_label"><?php echo $options['yeartext'];?></label>
                  <div>
                    <?php global $post,$wpdb, $meta_boxes, $mod1;
					  $output = '';
					  foreach($meta_boxes as $meta_box) { 
					  $data = get_post_meta($post->ID, $mod1, true);  
					  if(($meta_box['name'] == 'year') && (!empty($meta_box['options']))) { // dropdown lists       
					  $output .= '<select class="dropdown" id="yearbuilt" name="yearbuilt">';    
					  if (isset($data[$meta_box['name']])) {
					  $output .= '<option value="0">Select</option>';	
					  }     		
					  foreach($meta_box['options'] as $dropdown_key => $dropdown_value) {
					  if ($dropdown_value == $_POST['yearbuilt']) $output .= '<option value="' . $dropdown_value . '" SELECTED>' . $dropdown_value . '</option>';
					  else
					  	$output .= '<option value="' . $dropdown_value . '">' . $dropdown_value . '</option>';
					  }        
					  $output .= '</select>';		  	
					  }
					  }   
					  echo  $output ;
            		?>
                  </div>
                </li>
              </div>
              <div style="clear:both"></div>
            </div>
            <div class="pro_fields">
              <div class="price_field">
                <label class="field_label"><?php echo $options['pricetext'];?></label>
                 <?php $price = $_POST['price']; 
					if($price != '' && $price !='Enter vehicle price'){
						$price = $_POST['price']; 
					}else{
						$price = 'Enter vehicle price'; 
					}
				?>
                <div   style="width: 200px;">
                  <input type="text" onblur="if(this.value == '') { this.value = 'Enter vehicle price'; }"  onfocus="if(this.value == 'Enter vehicle price') { this.value = ''; }" value="<?php echo $price;?>" style="width: 200px;" autocomplete="off" class="default" id="price" name="price" >
                </div>
              </div>
              <div class="miles_field">
                <label class="field_label" ><?php echo $options['milestext'];?></label>
                 <?php $mileage = $_POST['mileage']; 
					if($mileage != '' && $mileage !='Enter vehicle miles'){
						$mileage = $_POST['mileage']; 
					}else{
						$mileage = 'Enter vehicle miles'; 
					}
				?>
                <div   style="width: 200px;">
                  <input onblur="if(this.value == '') { this.value = 'Enter vehicle miles'; }"  onfocus="if(this.value == 'Enter vehicle miles') { this.value = ''; }" type="text" style="width: 200px;" autocomplete="off"  id="mileage" value="<?php echo $mileage;?>" name="mileage" >
                </div>
              </div>
              <div style="clear:both"></div>
            </div>
            <div class="pro_fields">
              <div class="ext_field">
                <label class="field_label"><?php echo $options['exteriortext'];?></label>
                 <?php $ext1 = $_POST['ext']; 
					if($ext1 != '' && $ext1 !='Enter exterior color'){
						$ext1 = $_POST['ext']; 
					}else{
						$ext1 = 'Enter exterior color'; 
					}
				?>
                <div   style="width: 200px;">
                  <input type="text" onblur="if(this.value == '') { this.value = 'Enter exterior color'; }"  onfocus="if(this.value == 'Enter exterior color') { this.value = ''; }" value="<?php echo $ext1;?>" style="width: 200px;" autocomplete="off" class="default" id="ext" name="ext" >
                </div>
              </div>
              <div class="int_field">
                <label class="field_label" ><?php echo $options['interiortext'];?></label>
                 <?php $int1 = $_POST['int']; 
					if($int1 != '' && $int1 !='Enter interior color'){
						$int1 = $_POST['int']; 
					}else{
						$int1 = 'Enter interior color'; 
					}
				?>
                <div   style="width: 200px;">
                  <input onblur="if(this.value == '') { this.value = 'Enter interior color'; }"  onfocus="if(this.value == 'Enter interior color') { this.value = ''; }" value="<?php echo $int1;?>" type="text" style="width: 180px;" autocomplete="off"  id="int" name="int" >
                </div>
              </div>
              <div class="drive_field">
                <label class="field_label"><?php echo $options['drivetext'];?></label>
                <?php $vdrive = $_POST['vdrive']; 
					if($vdrive != '' && $vdrive !='Enter vehicle drive'){
						$vdrive = $_POST['vdrive']; 
					}else{
						$vdrive = 'Enter vehicle drive'; 
					}
				?>
                <div   style="width: 100px;">
                  <input onblur="if(this.value == '') { this.value = 'Enter vehicle drive'; }"  onfocus="if(this.value == 'Enter vehicle drive') { this.value = ''; }" value="<?php echo $vdrive;?>" type="text" style="width: 120px;" autocomplete="off"  id="vdrive" name="vdrive" >
                </div>
              </div>
              <div style="clear:both"></div>
            </div>
            <div class="pro_fields">
              <div class="vin_field">
                <label class="field_label" ><?php echo $options['vintext'];?></label>
                 <?php $vin = $_POST['vin']; 
					if($vin != '' && $vin !='Enter VIN Number'){
						$vin = $_POST['vin']; 
					}else{
						$vin = 'Enter VIN Number'; 
					}
				?>
                <div   style="width: 204px;">
                  <input onblur="if(this.value == '') { this.value = 'Enter VIN Number'; }"  onfocus="if(this.value == 'Enter VIN Number') { this.value = ''; }" value="<?php echo $vin;?>" type="text" style="width: 184px;" autocomplete="off" class="default" id="vin"  name="vin" >
                </div>
              </div>
              <div class="features_field">
                <label class="field_label" ><?php echo $options['featurestext'];?></label>
                <div  class="fourHundredWidth"  >
                 <?php $features = $_POST['features']; 
					if($features != '' && $features !='Separate features with commas (feature1, feature2, feature3)'){
						$features = $_POST['features']; 
					}else{
						$features = 'Separate features with commas (feature1, feature2, feature3)'; 
					}
				?>
                  <input type="text" class="submit_form_long_input" style="width: 390px;" autocomplete="off" class="default" id="features" name="features" onblur="if(this.value == '') { this.value = 'Separate features with commas (feature1, feature2, feature3)'; }"  onfocus="if(this.value == 'Separate features with commas (feature1, feature2, feature3)') { this.value = ''; }" value="<?php echo $features;?>" >
                </div>
              </div>
              <div style="clear:both"></div>
            </div>
            <div class="pro_fields">
              <div class="transmission_field">
                <li class="drop_single">
                  <label class="field_label"><?php echo $options['transmissiontext'];?></label>
                  <div>
                    <select class="dropdown"  name="transm" id="transm" >
                      <option value="0">
                      <?php _e('Select','language');?>
                      </option>
                      <?php  
					  	if($_POST['transm'] == $options['transmissionoption1']) $transmissionoption1 = 'SELECTED';
						if($_POST['transm'] == $options['transmissionoption2']) $transmissionoption2 = 'SELECTED';
						if($_POST['transm'] == $options['transmissionoption3']) $transmissionoption3 = 'SELECTED';
						if($_POST['transm'] == $options['transmissionoption4']) $transmissionoption4 = 'SELECTED';
					  ?>
                      <option value="<?php echo $options['transmissionoption1'];?>" <?php echo $transmissionoption1;?>><?php echo $options['transmissionoption1'];?></option>
                      <option value="<?php echo $options['transmissionoption2'];?>" <?php echo $transmissionoption2;?>><?php echo $options['transmissionoption2'];?></option>
                      <option value="<?php echo $options['transmissionoption3'];?>" <?php echo $transmissionoption3;?>><?php echo $options['transmissionoption3'];?></option>
                      <option value="<?php echo $options['transmissionoption4'];?>" <?php echo $transmissionoption4;?>><?php echo $options['transmissionoption4'];?></option>
                    </select>
                  </div>
                </li>
              </div>
              <div class="transmission_field">
                <li class="drop_single">
                  <label class="field_label"><?php echo $options['vehicletypetext'];?></label>
                  <div>
                    <select  class="dropdown" name="vehitype" id="vehitype" >
                      <option value="0">
                      <?php _e('Select','language');?>
                      </option>
                      <?php  
					  	if($_POST['vehitype'] == $options['vehicletype1']) $vehicletype1 = 'SELECTED';
						if($_POST['vehitype'] == $options['vehicletype2']) $vehicletype2 = 'SELECTED';
						if($_POST['vehitype'] == $options['vehicletype3']) $vehicletype3 = 'SELECTED';
						if($_POST['vehitype'] == $options['vehicletype4']) $vehicletype4 = 'SELECTED';
						if($_POST['vehitype'] == $options['vehicletype5']) $vehicletype5 = 'SELECTED';
						if($_POST['vehitype'] == $options['vehicletype6']) $vehicletype6 = 'SELECTED';
						if($_POST['vehitype'] == $options['vehicletype7']) $vehicletype7 = 'SELECTED';
						if($_POST['vehitype'] == $options['vehicletype8']) $vehicletype8 = 'SELECTED';
						if($_POST['vehitype'] == $options['vehicletype9']) $vehicletype9 = 'SELECTED';
						if($_POST['vehitype'] == $options['vehicletype10']) $vehicletype10 = 'SELECTED';
						if($_POST['vehitype'] == $options['vehicletype11']) $vehicletype11 = 'SELECTED';
						if($_POST['vehitype'] == $options['vehicletype12']) $vehicletype12 = 'SELECTED';					
					  ?>
                      <option value="<?php echo $options['vehicletype1'];?>" <?php echo $vehicletype1;?>><?php echo $options['vehicletype1'];?></option>
                      <option value="<?php echo $options['vehicletype2'];?>" <?php echo $vehicletype2;?>><?php echo $options['vehicletype2'];?></option>
                      <option value="<?php echo $options['vehicletype3'];?>" <?php echo $vehicletype3;?>><?php echo $options['vehicletype3'];?></option>
                      <option value="<?php echo $options['vehicletype4'];?>" <?php echo $vehicletype4;?>><?php echo $options['vehicletype4'];?></option>
                      <option value="<?php echo $options['vehicletype5'];?>" <?php echo $vehicletype5;?>><?php echo $options['vehicletype5'];?></option>
                      <option value="<?php echo $options['vehicletype6'];?>" <?php echo $vehicletype6;?>><?php echo $options['vehicletype6'];?></option>
                      <option value="<?php echo $options['vehicletype7'];?>" <?php echo $vehicletype7;?>><?php echo $options['vehicletype7'];?></option>
                      <option value="<?php echo $options['vehicletype8'];?>" <?php echo $vehicletype8;?>><?php echo $options['vehicletype8'];?></option>
                      <option value="<?php echo $options['vehicletype9'];?>" <?php echo $vehicletype9;?>><?php echo $options['vehicletype9'];?></option>
                      <option value="<?php echo $options['vehicletype10'];?>" <?php echo $vehicletype10;?>><?php echo $options['vehicletype10'];?></option>
                      <option value="<?php echo $options['vehicletype11'];?>" <?php echo $vehicletype11;?>><?php echo $options['vehicletype11'];?></option>
                      <option value="<?php echo $options['vehicletype12'];?>" <?php echo $vehicletype12;?>><?php echo $options['vehicletype12'];?></option>
                    </select>
                  </div>
                </li>
              </div>
              <div style="clear:both"></div>
            </div>
            <div class="pro_fields">
              <li>
                <label class="field_label"><?php echo $options['commentstext'];?></label>
                <div>
                  <textarea cols="50"   rows="10" class="textarea medium"  name="description"><?php echo $_POST['description'];?></textarea>
                </div>
              </li>
            </div>          
            <div class="pro_fields">
              <li class="upload_file">
                <label class="field_label" >
                  <?php _e('Property Photos','language');?>
                </label>
                <div><br/>
                  <span class="photos_text">
                  <input  type="hidden" name="tid" id="tid"  />
                  <div id="parah">
                    <div class="upload">
                      <?php _e('Upload Photo 1 ','language');?>
                      <br>
                      <input  type="file" name="input_0">
                    </div>
                    <br/>
                  </div>
                  <a href="javascript:void(0)" onclick="addInput('parah')">
                  <?php _e('More photos','language');?>
                  </a> </span> </div>
              </li>
              <li class="upload_desc">
                <p>
                  <?php _e('Click the "More photos" link to add all your images, all photos will be automatically resized to fit the property listing layout. We recommend that you upload photos in full resolution for better results.','language');?>
                <p> 
              </li>
              <div style="clear:both;"></div>
            </div>
            <div class="pro_fields">
              <li>
                <label class="head_label">
                  <?php _e('Personal Information &raquo;','language');?>
                </label>
              </li>
            </div>    
            <div class="pro_fields">
              <div class="fname_field">
                <label class="field_label">
                  <?php _e('First name','language');?>
                </label>
                 <?php $fname = $_POST['fname']; 
					if($fname != '' && $fname !='Enter your first name'){
						$fname = $_POST['fname']; 
					}else{
						$fname = 'Enter your first name'; 
					}
				?>
                <div  style="width: 270px;">
                  <input type="text" style="width: 250px;" autocomplete="off" class="default" id="fname" name="fname" onblur="if(this.value == '') { this.value = 'Enter your first name'; }"  onfocus="if(this.value == 'Enter your first name') { this.value = ''; }" value="<?php echo $fname; ?>" >
                </div>
              </div>
              <div class="lname_field">
                <label class="field_label">
                  <?php _e('Last name','language');?>
                </label>
                <?php $lname = $_POST['lname']; 
					if($lname != '' && $lname !='Enter your last name'){
						$lname = $_POST['lname']; 
					}else{
						$lname = 'Enter your last name'; 
					}
				?>
                <div>
                  <div  style="width: 260px;">
                    <input type="text" style="width: 250px;" autocomplete="off" class="default" id="lname" name="lname" onblur="if(this.value == '') { this.value = 'Enter your last name'; }"  onfocus="if(this.value == 'Enter your last name') { this.value = ''; }" value="<?php echo $lname; ?>" >
                  </div>
                  <div class="errr"  id="PT" ></div>
                </div>
              </div>
              <div style="clear:both"></div>
            </div>   
            <div id="submitsign">
              <div style="text-align:center;margin-top:-15px;">
                <?php _e('Uploading your Vehicle Information','language');?>
              </div>
              <img src="<?php bloginfo('template_url')?>/images/common/submit-loader.gif" />
              <div style="clear:both"></div>
              <span style="text-align:center;margin-top:0px;color:#666!important;">
              <?php _e('Please wait','language');?>
              </span> </div>
            <div class="pro_fields">
              <div class="email_field">
                <label class="field_label">
                  <?php _e('Email','language');?>
                </label>
                <?php $email = $_POST['email']; 
					if($email != '' && $email !='Enter your e-mail'){
						$email = $_POST['email']; 
					}else{
						$email = 'Enter your e-mail'; 
					}
				?>
                <div  style="width: 270px;">
                  <input onblur="if(this.value == '') { this.value = 'Enter your e-mail'; }"  onfocus="if(this.value == 'Enter your email') { this.value = ''; }" value="<?php echo $email; ?>" type="text" style="width: 250px;" autocomplete="off" class="default" id="email" name="email"  >
                </div>
              </div>
              <div class="phone_field">
                <label class="field_label">
                  <?php _e('Phone number','language');?>
                </label>
                 <?php $pnum = $_POST['pnum']; 
					if($pnum != '' && $pnum !='Enter your phone number'){
						$pnum = $_POST['email']; 
					}else{
						$pnum = 'Enter your phone number'; 
					}
				?>
                
                <div  style="width: 260px;">
                  <input onblur="if(this.value == '') { this.value = 'Enter your phone number'; }"  onfocus="if(this.value == 'Enter your phone number') { this.value = ''; }" value="<?php echo $pnum; ?>" type="text" style="width: 250px;" autocomplete="off" class="default" id="pnum" name="pnum" >
                </div>
              </div>
              <div style="clear:both"></div>
            </div>
          </div>
          <div class="pro_fields">
            <li>
              <label>
                <?php _e('Send copy to my email address','language');?>
              </label>
              <span>
              <?php $checked = ""; if(isset($_POST['sendcopy'])){ $checked = "checked"; } ?>
              <input type="checkbox" id="sendcopy" name="sendcopy" <?php echo $checked;?> />
              </span> </li>
          </div>
          <div style="clear:both"></div>
          <div class="pro_fields">
            <li>
              <div class="captcha_form"> <span class="error">
                <?php $errors['security_code3'];?>
                </span>
                <div class="securityText">
                  <label>
                    <?php _e('Security Text','language');?>
                  </label>
                </div>
                <div class="securityImage1"> <img src="<?php echo get_bloginfo('template_directory'); ?>/includes/captcha/CaptchaSecurityImages3.php?width=100&height=40&characters=5" />
                  <?php if($errors['security_code3'] != '') { ?>
                  <?php } ?>
                </div>
                <div class="clear"></div>
                <div class="securityCodeText">
                  <label for="security_code"><?php _e('Security Code: ','language');?></label>
                </div>
                <div class="securityInputField">
                  <input id="security_code3" name="security_code3" value="<?php echo $_POST['security_code3']; ?>" type="text" />
                </div>
                <div class="clear"></div>
              </div>
            </li>
          </div>
          <div class="pro_fields">
            <li>
              <div style="width:30%!important;color:#CC0033;margin:0 auto;padding-right:20px;" id="cdError"></div>
              <div  style="clear: both; margin: 16px 0 0;padding: 16px 0 10px;" class="searchsubmit">
                <input  type="submit" id="submit3" name="submit3"  onclick="return validation()" value="Submit"  >
              </div>
            </li>
          </div>
        </form>
        <?php } ?>
      </div>
    </div>
  </div>
  <div id="sidebar" class="common" >
    <?php if ( ! dynamic_sidebar( 'Sidebar' )) : ?>
    <?php endif; ?>
  </div>
</div>
<div class="clearfix"></div>
</div>
<?php get_footer(); ?>