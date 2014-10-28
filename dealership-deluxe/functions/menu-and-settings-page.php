<?php
	add_action('admin_menu', 'build_page');	
function build_page() 
	{
		global $submenu;
		$submenu['edit.php?post_type=gtcd'][5][0] = __('View All Vehicles','language');
		$submenu['edit.php?post_type=user_listing'][5][0] = __('View All Vehicles','language');
		add_menu_page(__('Setup Page','language'), __('Setup Module','language'), 'add_users', 'setup_page', 'settings_page', 'dashicons-admin-generic',11.6); 
		add_submenu_page('setup_page', __('Setup Options','language'), __('Search Module','language'), 'add_users', 'setup_page', 'settings_page');
		add_submenu_page('setup_page', __('Dealership Setup','language'), __('Currency & Metrics','language'), 'add_users', 'currency_metrics', 'cm_settings_page'); 
		add_submenu_page('setup_page', __('Edmunds API Setup','language'), __('Edmunds API Setup','language'), 'add_users', 'edmund_api', 'cm_Edmund_API_page');
		
	}
	add_action('admin_init', 'reg_fields'); 
function reg_fields() 
	{
		add_settings_section('main_section', '', 'gorilla_t', 'currency_metrics');
		add_settings_section('main_section', '', 'gorilla_t', 'fields');		
		register_setting('gorilla_fields', 'gorilla_fields', 'validate_fields');
		register_setting('gorilla_symbols', 'gorilla_symbols', 'validate_symbols');		
		add_settings_field('currency', '<span class="optionmain"><strong>'.(__('Your Currency:','language')).'</strong></span>', 'currency_setting','currency_metrics', 'main_section');
		add_settings_field('metric', '<span class="optionmain"><strong>'.(__('Metric:','language')).'</strong></span>', 'metric_setting', 'currency_metrics', 'main_section');
		add_settings_field('featuredtext', '<span class="optionmain"><strong>Featured:</strong></span>', 'featured_text', 'fields', 'main_section');
		add_settings_field('topdealtext', '<span class="optionmain"><strong>Top Deal?:</strong></span>', 'topdeal_text', 'fields', 'main_section');
		add_settings_field('statustagtext', '<span class="optionmain"><strong>'.(__('Condition:','language')).'</strong></span>', 'statustag_text', 'fields', 'main_section');
 		add_settings_field('drivetext', '<span class="optionmain"><strong>'.(__('Drive:','language')).'</strong></span>', 'drive_text', 'fields', 'main_section');
 		add_settings_field('epamileagetext', '<span class="optionmain"><strong>'.(__('EPA Mileage:','language')).'</strong></span>', 'epamileage_text', 'fields', 'main_section');
 		add_settings_field('transmissiontext', '<span class="optionmain"><strong>'.(__('Transmission:','language')).'</strong></span>', 'transmission_text', 'fields', 'main_section');
 		add_settings_field('stocktext', '<span class="optionmain"><strong>'.(__('Stock #:','language')).'</strong></span>', 'stock_text', 'fields', 'main_section');
 		add_settings_field('vintext', '<span class="optionmain"><strong>'.(__('VIN:','language')).'</strong></span>', 'vin_text', 'fields', 'main_section');
 		add_settings_field('carfaxtext', '<span class="optionmain"><strong>'.(__('Carfax Partner ID:','language')).'</strong></span>', 'carfax_text', 'fields', 'main_section');
		add_settings_field('interiortext', '<span class="optionmain"><strong>'.(__('Interior:','language')).'</strong></span>', 'interior_text', 'fields', 'main_section');
		add_settings_field('exteriortext', '<span class="optionmain"><strong>'.(__('Exterior:','language')).'</strong></span>', 'exterior_text', 'fields', 'main_section');
		add_settings_field('commentstext', '<span class="optionmain"><strong>'.(__('Description','language')).'</strong></span>:', 'comments_text', 'fields', 'main_section');
		add_settings_field('torquetext', '<span class="optionmain"><strong>'.(__('Torque #:','language')).'</strong></span>', 'torque_text', 'fields', 'main_section');
		add_settings_field('pricetext', '<span class="optionmain"><strong>'.(__('Price:','language')).'</strong></span>', 'price_text', 'fields', 'main_section');
		add_settings_field('vehicletypetext', '<span class="optionmain"><strong>'.(__('Vehicle Type:','language')).'</strong></span>', 'vehicletype_text', 'fields', 'main_section');
		add_settings_field('milestext', '<span class="optionmain"><strong>'.(__('Miles:','language')).'</strong></span>', 'miles_text', 'fields', 'main_section');
		add_settings_field('year_text', '<span class="optionmain"><strong>'.(__('Year:','language')).'</strong></span>', 'year_text', 'fields', 'main_section');
		add_settings_field('yearnum_text', '<span class="optionmain"><strong>'.(__('Year Start/End Date:','language')).'</strong></span>', 'year_num', 'fields', 'main_section');
		add_settings_field('locationtext', '<span class="optionmain"><strong>'.(__('Location:','language')).'</strong></span>', 'location_text', 'fields', 'main_section');
		add_settings_field('makemodeltext', '<span class="optionmain"><strong>'.(__('Make & Model:','language')).'</strong></span>', 'makemodel_text', 'fields', 'main_section');
		add_settings_field('featurestext', '<span class="optionmain"><strong>'.(__('Features:','language')).'</strong></span>', 'features_text', 'fields', 'main_section');
		add_settings_field('enginesizetext', '<span class="optionmain"><strong>'.(__('Engine Size:','language')).'</strong></span>', 'enginesize_text', 'fields', 'main_section');
		add_settings_field('cylinderstext', '<span class="optionmain"><strong>'.(__('Number of Cylinders:','language')).'</strong></span>', 'cylinders_text', 'fields', 'main_section');
		add_settings_field('horsepowertext', '<span class="optionmain"><strong>'.(__('Horsepower:','language')).'</strong></span>', 'horsepower_text', 'fields', 'main_section');
		add_settings_field('torquetext', '<span class="optionmain"><strong>'.(__('Torque:','language')).'</strong></span>', 'torque_text', 'fields', 'main_section');
		add_settings_field('compressionratiotext', '<span class="optionmain"><strong>'.(__('Compression Ratio:','language')).'</strong></span>', 'compressionratio_text', 'fields', 'main_section');
		add_settings_field('camshaft', '<span class="optionmain"><strong>'.(__('Camshaft:','language')).'</strong></span>', 'camshaft_text', 'fields', 'main_section');
		add_settings_field('enginetypetext', '<span class="optionmain"><strong>'.(__('Engine Type:','language')).'</strong></span>', 'enginetype_text', 'fields', 'main_section');
		add_settings_field('boretext', '<span class="optionmain"><strong>'.(__('Bore:','language')).'</strong></span>', 'bore_text', 'fields', 'main_section');
		add_settings_field('stroketext', '<span class="optionmain"><strong>'.(__('Stroke:','language')).'</strong></span>', 'stroke_text', 'fields', 'main_section');
		add_settings_field('valvespercylindertext', '<span class="optionmain"><strong>'.(__('Valves per Cylinder:','language')).'</strong></span>', 'valvespercylinder_text', 'fields', 'main_section');
		add_settings_field('fuelcapacitytext', '<span class="optionmain"><strong>'.(__('Fuel Capacity:','language')).'</strong></span>', 'fuelcapacity_text', 'fields', 'main_section');
		add_settings_field('wheelbasetext', '<span class="optionmain"><strong>'.(__('Wheelbase:','language')).'</strong></span>', 'wheelbase_text', 'fields', 'main_section');
		add_settings_field('overalllength', '<span class="optionmain"><strong>'.(__('Overall Length:','language')).'</strong></span>', 'overalllength_text', 'fields', 'main_section');
		add_settings_field('widthtext', '<span class="optionmain"><strong>'.(__('Width:','language')).'</strong></span>', 'width_text', 'fields', 'main_section');
		add_settings_field('heighttext', '<span class="optionmain"><strong>'.(__('Height:','language')).'</strong></span>', 'height_text', 'fields', 'main_section');
		add_settings_field('curbweighttext', '<span class="optionmain"><strong>'.(__('Curb Weight:','language')).'</strong></span>', 'curbweight_text', 'fields', 'main_section');
		add_settings_field('legroomtext', '<span class="optionmain"><strong>'.(__('Leg Room:','language')).'</strong></span>', 'legroom_text', 'fields', 'main_section');
		add_settings_field('headroomtext', '<span class="optionmain"><strong>'.(__('Head Room:','language')).'</strong></span>', 'headroom_text', 'fields', 'main_section');
		add_settings_field('seatingcapacitytext', '<span class="optionmain"><strong>'.(__('Seating Capacity (Std.):','language')).'</strong></span>', 'seatingcapacity_text', 'fields', 'main_section');
		add_settings_field('tirestext', '<span class="optionmain"><strong>'.(__('Tires (Std.):','language')).'</strong></span>', 'tires_text', 'fields', 'main_section');
	}
function cm_settings_page() 
	{
	?>
		<div id="theme-options-wrap" class="widefat">    
	    		<div id="icon-themes" class="icon32">
				<br />
			</div> 
			<h2><?php _e('Currency & Metrics','language') ?></h2>
			<form method="post" action="options.php" enctype="multipart/form-data">
				<?php settings_fields('gorilla_symbols'); ?>  
				<div class="tabber_container">
					<div class="block">
						<p><?php _e('Select your currency and metrics.','language')?></p>
						<?php do_settings_sections('currency_metrics'); ?>
					</div>
				</div>
				<p class="submit">
				 <input type="submit" name="submit" id="publish" class="button button-primary" value="<?php esc_attr_e('Save Changes','language'); ?>" >
				</p>
			</form>
		</div>
	<?php
	}

function cm_Edmund_API_page() 
	{	
	if (isset($_POST[Edmund_API])){
		update_option('Edmund_API', $_POST[Edmund_API]);
	}
	$Edmund_API = get_option('Edmund_API');
	?>
		<div id="theme-options-wrap" class="widefat martop">    
	    		<div id="icon-themes" class="icon32">
				<br />
			</div> 
			<h2><?php _e('Edmunds API Setup','language') ?></h2>
			<form method="post" action="" enctype="multipart/form-data">
            <?php if (isset($_POST[Edmund_API]) AND $_POST[Edmund_API] == ''){
			?>
	            <div class="error"><p><?php _e('Please insert API Key!','language');?></p></div>
            <?php
			}elseif (isset($_POST[Edmund_API]) AND $_POST[Edmund_API] != ''){
			?>
	            <div class="updated"><p><?php _e('API Key Updated!','language');?></p></div>            
            <?php
			}
			?>
             <table class="form-table">
                    <tbody>
                    	<tr valign="top">
                    	<p style="line-height:22px;font-size:13px"><?php _e('Go to ','language');?><a target="_blank" href="http://developer.edmunds.com/"><?php _e('Edmunds Developer Portal','language');?></a><?php _e(" to obtain the API Key",'language');?><?php _e(' and insert the alphanumeric key in the input field.','language')?></p>
                    	    <p style="line-height:22px;font-size:13px"><?php _e('Register a new free account on Edmunds website to get your API key in order to use the Dealership VIN Decoder.','language')?></p>
                    	      
                    	    
		                    <th scope="row">
		                    
                            <label for="blogname"><?php _e('Insert Edmunds API Vehicle Key','language')?></label>
                            </th><td>
                            	<input type="text" class="ed_api" value="<?php echo $Edmund_API;?>" class="ed_api" name="Edmund_API"> 
                            </td></tr>
                    	<tr valign="top">
		                    <th scope="row">
                            </th>	<td>
                            <input type="submit" name="submit" id="publish" class="button button-primary" value="<?php esc_attr_e('Save Changes','language'); ?>" >
                            
                            </td> </tr>                    
                    </tbody></table>      
			</form>  
			<div><a href="http://developer.edmunds.com/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/common/220_color.png" alt="Edmunds"/></a></div>    
		</div>
		
	<?php
}
function settings_page() {?>
<div id="theme-options-wrap" class="widefat">    
    <div id="icon-themes" class="icon32"><br /></div> 
      <h2><?php _e('Dealership Search Options Setup','language');?></h2>
      <form method="post" action="options.php" enctype="multipart/form-data">
         <?php settings_fields('gorilla_fields'); ?>
           <p><?php _e('Rename labels and options for the search module and hide-show each field in the form.','language');?></p>
		<h3 class="tabber legend"><a href="#"><?php _e("Fields","language"); ?></a></h3>
	<div class="tabber_container">
			<div class="block">			
				<?php do_settings_sections('fields'); ?>		</div>
			</div>
         <p class="submit">
            <input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes','language'); ?>" />
         </p>
   </form>
</div>
<?php }
function currency_setting() 
	{
		$options = get_option('gorilla_symbols'); 
		if(empty($options['currency']))
		{
			$options['currency'] = '$';
		} 
		else 
		{ 
			$options['currency'];
		}		
		$items = array("$","£","€","₤","¥","R$","元","Kč","Ft","₨","kr","Rp","₪","J$","Ls","Lt","RM","﷼","B/.","Ph","zł","﷼","le","ру,;","R","₩","kr","CHF","฿","YTL","Bs");		
	   	echo "<select name='gorilla_symbols[currency]'>";
	   	foreach ($items as $item) 
		{
			$selected = ( $options['currency'] === $item ) ? 'selected = "selected"' : '';
			echo "<option value='$item' $selected>$item</option>";
	   	}
	   	echo "</select>";
	}		
function metric_setting() 
	{
		$options = get_option('gorilla_symbols');
		if(empty($options['metric']))
		{
			$options['metric'] = 'sqft';
		} 
		else 
		{ 
			$options['metric'];
		}
		
		$items = array("Miles","Kilometers"); 
		
		echo "<select name='gorilla_symbols[metric]'>";		
		foreach ($items as $item) 
		{
			$selected = ( $options['metric'] === $item ) ? 'selected = "selected"' : '';
			echo "<option value='$item' $selected>$item</option>";
		}
		echo "</select>";
	}
function featured_text() 
	{	
	   $options = get_option('gorilla_fields');
   if(empty($options['featuredtext']))
	{
    $options['featuredtext'] = 'Featured';
	}
	else
	{
  $options['featuredtext']; } 
   echo "<input name='gorilla_fields[featuredtext]' type='text' value='{$options['featuredtext']}' />"; 
           	
		
		echo "<input name='gorilla_fields[featuredhide]' type='hidden' value='Yes'>";
	}  
function topdeal_text() 
	{	
	   $options = get_option('gorilla_fields');
   if(empty($options['topdealtext']))
	{
    $options['topdealtext'] = 'Top Deal?';
	}
	else
	{
  $options['topdealtext']; } 
   echo "<input name='gorilla_fields[topdealtext]' type='text' value='{$options['topdealtext']}' />"; 
           	
		
		echo "<input name='gorilla_fields[topdealhide]' type='hidden' value='Yes'>";
	}  
function vehicletype_text() 
	{
		$options = get_option('gorilla_fields'); 
		if(empty($options['vehicletypetext']))
		{
			$options['vehicletypetext'] = 'Vehicle Type';}else{$options['vehicletypetext'];
		}
	  	
		echo "<input name='gorilla_fields[vehicletypetext]' type='text' value='{$options['vehicletypetext']}' />"; 
	   	$items = array("Yes","No");  
	   	echo "<span class='optionsearch'>Hide in Search Module:</span><select name='gorilla_fields[vehicletypehide]'>";
	   	foreach ($items as $item) 
		{
			$selected = ( $options['vehicletypehide'] === $item ) ? 'selected = "selected"' : '';
			echo "<option value='$item' $selected>$item</option>";
	   	}
	   	echo "</select>";
	   	echo  '<br/><br/>';
		
		if(empty($options['vehicletype1']))
		{
			echo "<li class='li'><strong>Option 1:</strong>&nbsp;&nbsp;<input name='gorilla_fields[vehicletype1]' type='text' value='Convertibles' /></li>";
		}
		else
		{
			echo "<li class='li'><strong>Option 1:</strong>&nbsp;&nbsp;<input name='gorilla_fields[vehicletype1]' type='text' value='{$options['vehicletype1']}' /></li>";    
		}
		
		if(empty($options['vehicletype2']))
		{
			echo "<li class='lialt'><strong>Option 2:</strong>&nbsp;&nbsp;<input name='gorilla_fields[vehicletype2]' type='text' value='Crossovers' /></li>";
		}
		else
		{
			echo "<li class='lialt'><strong>Option 2:</strong>&nbsp;&nbsp;<input name='gorilla_fields[vehicletype2]' type='text' value='{$options['vehicletype2']}' /></li>";    
		}
		
		if(empty($options['vehicletype3']))
		{
			echo "<li class='li'><strong>Option 3:</strong>&nbsp;&nbsp;<input name='gorilla_fields[vehicletype3]' type='text' value='Luxury Vehicles' /></li>";
		}
		else
		{
			echo "<li class='li'><strong>Option 3:</strong>&nbsp;&nbsp;<input name='gorilla_fields[vehicletype3]' type='text' value='{$options['vehicletype3']}' /></li>";
		}
		
		if(empty($options['vehicletype4']))
		{ 
			echo "<li class='lialt'><strong>Option 4:</strong>&nbsp;&nbsp;<input name='gorilla_fields[vehicletype4]' type='text' value='Hybrids' /></li>";
		}
		else
		{
			echo "<li class='lialt'><strong>Option 4:</strong>&nbsp;&nbsp;<input name='gorilla_fields[vehicletype4]' type='text' value='{$options['vehicletype4']}' /></li>";    
		}
		
		if(empty($options['vehicletype5']))
		{
			echo "<li class='li'><strong>Option 5:</strong>&nbsp;&nbsp;<input name='gorilla_fields[vehicletype5]' type='text' value='Minivans and Vans' /></li>";
		}
		else
		{
			echo "<li class='li'><strong>Option 5:</strong>&nbsp;&nbsp;<input name='gorilla_fields[vehicletype5]' type='text' value='{$options['vehicletype5']}' /></li>";    
	 	} 
	 	if(empty($options['vehicletype6']))
		{
			echo "<li class='li'><strong>Option 6:</strong>&nbsp;&nbsp;<input name='gorilla_fields[vehicletype6]' type='text' value='Pickup Trucks' /></li>";
		}
		else
		{
			echo "<li class='li'><strong>Option 6:</strong>&nbsp;&nbsp;<input name='gorilla_fields[vehicletype6]' type='text' value='{$options['vehicletype6']}' /></li>";    
	 	} 
	 	if(empty($options['vehicletype7']))
		{
			echo "<li class='li'><strong>Option 7:</strong>&nbsp;&nbsp;<input name='gorilla_fields[vehicletype7]' type='text' value='Sedans and Coupes' /></li>";
		}
		else
		{
			echo "<li class='li'><strong>Option 7:</strong>&nbsp;&nbsp;<input name='gorilla_fields[vehicletype7]' type='text' value='{$options['vehicletype7']}' /></li>";    
	 	} 
	 	if(empty($options['vehicletype8']))
		{
			echo "<li class='li'><strong>Option 8:</strong>&nbsp;&nbsp;<input name='gorilla_fields[vehicletype8]' type='text' value='Diesel Engines' /></li>";
		}
		else
		{
			echo "<li class='li'><strong>Option 8:</strong>&nbsp;&nbsp;<input name='gorilla_fields[vehicletype8]' type='text' value='{$options['vehicletype8']}' /></li>";    
	 	} 
	 	if(empty($options['vehicletype9']))
		{
			echo "<li class='li'><strong>Option 9:</strong>&nbsp;&nbsp;<input name='gorilla_fields[vehicletype9]' type='text' value='Sport Utilities' /></li>";
		}
		else
		{
			echo "<li class='li'><strong>Option 9:</strong>&nbsp;&nbsp;<input name='gorilla_fields[vehicletype9]' type='text' value='{$options['vehicletype9']}' /></li>";    
	 	} 
	 	 	if(empty($options['vehicletype10']))
		{
			echo "<li class='li'><strong>Option 10:</strong>&nbsp;&nbsp;<input name='gorilla_fields[vehicletype10]' type='text' value='Sports Cars' /></li>";
		}
		else
		{
			echo "<li class='li'><strong>Option 10:</strong>&nbsp;&nbsp;<input name='gorilla_fields[vehicletype10]' type='text' value='{$options['vehicletype10']}' /></li>";    
	 	} 
	 	if(empty($options['vehicletype11']))
		{
			echo "<li class='li'><strong>Option 11:</strong>&nbsp;&nbsp;<input name='gorilla_fields[vehicletype11]' type='text' value='Wagons' /></li>";
		}
		else
		{
			echo "<li class='li'><strong>Option 11:</strong>&nbsp;&nbsp;<input name='gorilla_fields[vehicletype11]' type='text' value='{$options['vehicletype11']}' /></li>";    
	 	}
	 	if(empty($options['vehicletype12']))
		{
			echo "<li class='li'><strong>Option 12:</strong>&nbsp;&nbsp;<input name='gorilla_fields[vehicletype12]' type='text' value='4WD-AWD' /></li>";
		}
		else
		{
			echo "<li class='li'><strong>Option 12:</strong>&nbsp;&nbsp;<input name='gorilla_fields[vehicletype12]' type='text' value='{$options['vehicletype12']}' /></li>";    
	 	} 
	}
function transmission_text() 
	{
		$options = get_option('gorilla_fields'); 
		if(empty($options['transmissiontext']))
		{
			$options['transmissiontext'] = 'Transmission';}else{$options['transmissiontext'];
		}
	  	
		echo "<input name='gorilla_fields[transmissiontext]' type='text' value='{$options['transmissiontext']}' />"; 			   	echo  '<br/><br/>';
		
		if(empty($options['transmissionoption1']))
		{
			echo "<li class='li'><strong>Option 1:</strong>&nbsp;&nbsp;<input name='gorilla_fields[transmissionoption1]' type='text' value='Automatic' /></li>";
		}
		else
		{
			echo "<li class='li'><strong>Option 1:</strong>&nbsp;&nbsp;<input name='gorilla_fields[transmissionoption1]' type='text' value='{$options['transmissionoption1']}' /></li>";    
		}
		
		if(empty($options['transmissionoption2']))
		{
			echo "<li class='lialt'><strong>Option 2:</strong>&nbsp;&nbsp;<input name='gorilla_fields[transmissionoption2]' type='text' value='Manual' /></li>";
		}
		else
		{
			echo "<li class='lialt'><strong>Option 2:</strong>&nbsp;&nbsp;<input name='gorilla_fields[transmissionoption2]' type='text' value='{$options['transmissionoption2']}' /></li>";    
		}
		
		if(empty($options['transmissionoption3']))
		{
			echo "<li class='li'><strong>Option 3:</strong>&nbsp;&nbsp;<input name='gorilla_fields[transmissionoption3]' type='text' value='Semi-Auto' /></li>";
		}
		else
		{
			echo "<li class='li'><strong>Option 3:</strong>&nbsp;&nbsp;<input name='gorilla_fields[transmissionoption3]' type='text' value='{$options['transmissionoption3']}' /></li>";
		}
	
		
			if(empty($options['transmissionoption4']))
		{ 
			echo "<li class='lialt'><strong>Option 4:</strong>&nbsp;&nbsp;<input name='gorilla_fields[transmissionoption4]' type='text' value='Other' /></li>";
		}
		else
		{
			echo "<li class='lialt'><strong>Option 4:</strong>&nbsp;&nbsp;<input name='gorilla_fields[transmissionoption4]' type='text' value='{$options['transmissionoption4']}' /></li>";    
		}
	} 
function miles_text() 
	{
		$options = get_option('gorilla_fields');
		
		if(empty($options['milestext']))
		{
			$options['milestext'] = 'Miles';
		}
		else
		{
			$options['milestext'];
		}
		
		echo "<input name='gorilla_fields[milestext]' type='text' value='{$options['milestext']}' />";
		
		echo "<input name='gorilla_fields[mileshide]' type='hidden' value='Yes'>";
		
	} 
function features_text() 
	{
		$options = get_option('gorilla_fields');
		
		if(empty($options['featurestext']))
		{
			$options['featurestext'] = 'Features';
		}
		else
		{
			$options['featurestext'];
		}
		
		echo "<input name='gorilla_fields[featurestext]' type='text' value='{$options['featurestext']}' />";
		
		
	} 
	function location_text() 
	{
		$options = get_option('gorilla_fields');
		
		if(empty($options['locationtext']))
		{
			$options['locationtext'] = 'Location';
		}
		else
		{
			$options['locationtext'];
		}
		
		
		echo "<input name='gorilla_fields[locationtext]' type='text' value='{$options['locationtext']}' />";
		$items = array("Yes","No"); 
		echo "<span class='optionsearch'>".(__('Hide in Search Module:','language'))."</span><select name='gorilla_fields[locationhide]'>";
		
		foreach ($items as $item) 
		{
			$selected = ( $options['locationhide'] === $item ) ? 'selected = "selected"' : '';
			echo "<option value='$item' $selected>$item</option>";
		}
		echo "</select>";
	} 

function makemodel_text() 
	{
		$options = get_option('gorilla_fields');
		
		if(empty($options['makemodeltext']))
		{
			$options['makemodeltext'] = 'Make & Model';
		}
		else
		{
			$options['makemodeltext'];
		}
		
		
		echo "<input name='gorilla_fields[makemodeltext]' type='text' value='{$options['makemodeltext']}' />";
		
		echo "<input name='gorilla_fields[makemodelhide]' type='hidden' value='No'>";
	} 
	
function year_text() 
	{
	    	$options = get_option('gorilla_fields');
	   	if(empty($options['yeartext']))
		{
		    $options['yeartext'] = 'Year';
		}
		else
		{
		    $options['yeartext'];
		}
		echo "<input name='gorilla_fields[yeartext]' type='text' value='{$options['yeartext']}' />";
		$items = array("Yes","No"); 
		echo "<span class='optionsearch'>".(__('Hide in Search Module:','language'))."</span><select name='gorilla_fields[yearhide]'>";
		
		foreach ($items as $item) 
		{
			$selected = ( $options['yearhide'] === $item ) ? 'selected = "selected"' : '';
			echo "<option value='$item' $selected>$item</option>";
		}
		echo "</select>";
	} 

function year_num() 
	{
	    	$options = get_option('gorilla_fields');
	   	if(empty($options['yeartext']))
		{
		    $options['yearstart'] = '2000';
		    $options['yearend'] = '2013';
		}
		else
		{
		    $options['yearstart'];
		    $options['yearend'];
		}
		echo "<input name='gorilla_fields[yearstart]' type='text' value='{$options['yearstart']}' />";
		
		echo '  to  ';
		
		echo "<input name='gorilla_fields[yearend]' type='text' value='{$options['yearend']}' />";
		
		
		
		
	} 




function price_text() {
	   $field = get_option('gorilla_fields');
	   if(empty($field['pricetext']))
		{
		    $field['pricetext'] = 'Price';
		}
		else
		{
		    
		}
	   echo "<input name='gorilla_fields[pricetext]' type='text' value='{$field['pricetext']}' />";
		 $items = array("Yes","No"); 
	   echo "<span class='optionsearch'>".(__('Hide in Search Module:','language'))."</span><select name='gorilla_fields[pricehide]'>";
	   foreach ($items as $item) {
		$selected = ( $field['pricehide'] === $item ) ? 'selected = "selected"' : '';
		echo "<option value='$item' $selected>$item</option>";
	   }
	   echo "</select>";
	} 
function interior_text() {
	 $options = get_option('gorilla_fields');
	 
	
	   if(isset($options['interiortext']) && !empty($options['interiortext']))
	{	    
	}
	else
	{
	    $options['interiortext'] = 'Interior';
	}
	   echo "<input name='gorilla_fields[interiortext]' type='text' value='{$options['interiortext']}' />";
	   
	   
	}
function exterior_text() {
	 $options = get_option('gorilla_fields');	
	   if(isset($options['exteriortext']) && !empty($options['exteriortext']))
	{	    
	}
	else
	{
	    $options['exteriortext'] = 'Exterior';
	}
	   echo "<input name='gorilla_fields[exteriortext]' type='text' value='{$options['exteriortext']}' />";	   	   
	}
function epamileage_text() {
	 $options = get_option('gorilla_fields');	 	
	   if(isset($options['epamileagetext']) && !empty($options['epamileagetext']))
	{
	    
	}
	else
	{
	    $options['epamileagetext'] = 'EPA Mileage';
	}
	   echo "<input name='gorilla_fields[epamileagetext]' type='text' value='{$options['epamileagetext']}' />";	   	   
	}
function stock_text() {
	 $options = get_option('gorilla_fields');	 	
	   if(isset($options['stocktext']) && !empty($options['stocktext']))
	{	    
	}
	else
	{
	    $options['stocktext'] = 'Stock #';
	}
	   echo "<input name='gorilla_fields[stocktext]' type='text' value='{$options['stocktext']}' />";	   	   
	}	
function vin_text() {
	 $options = get_option('gorilla_fields');
	 
	
	   if(isset($options['vintext']) && !empty($options['vintext']))
	{	    
	}
	else
	{
	    $options['vintext'] = 'VIN';
	}
	   echo "<input name='gorilla_fields[vintext]' type='text' value='{$options['vintext']}' />";	   	   
	}
	function carfax_text() {
	 $options = get_option('gorilla_fields');
	 
	
	   if(isset($options['carfaxtext']) && !empty($options['carfaxtext']))
	{	    
	}
	else
	{
	    $options['carfaxtext'] = 'Carfax Partner ID';
	}
	   echo "<input name='gorilla_fields[carfaxtext]' type='text' value='{$options['carfaxtext']}' />";	   	   
	}

function drive_text() {
	 $options = get_option('gorilla_fields');	 	
	   if(isset($options['drivetext']) && !empty($options['drivetext']))
	{	    
	}
	else
	{
	    $options['drivetext'] = 'Drive';
	}
	   echo "<input name='gorilla_fields[drivetext]' type='text' value='{$options['drivetext']}' />";
	   	   
	}
function statustag_text() {
	 $options = get_option('gorilla_fields');	 	
	   if(isset($options['statustagtext']) && !empty($options['statustagtext']))
	{
	}
	else
	{
	    $options['statustagtext'] = 'Condition';
	}
	    echo "<input name='gorilla_fields[statustagtext]' type='text' value='{$options['statustagtext']}' />";
		 $items = array("Yes","No"); 
	   echo "<span class='optionsearch'>".(__('Hide in Search Module:','language'))."</span><select name='gorilla_fields[statustaghide]'>";
	   foreach ($items as $item) {
		$selected = ( $options['statustaghide'] === $item ) ? 'selected = "selected"' : '';
		echo "<option value='$item' $selected>$item</option>";
	   }
	   echo "</select>";
	} 

function enginesize_text() {
	 $options = get_option('gorilla_fields');	 	
	   if(isset($options['enginesizetext']) && !empty($options['enginesizetext']))
	{	    
	}
	else
	{
	    $options['enginesizetext'] = 'Engine Size';
	}
	   echo "<input name='gorilla_fields[enginesizetext]' type='text' value='{$options['enginesizetext']}' />";	   	   
	}
		
function cylinders_text() {
	 $options = get_option('gorilla_fields');
	 
	
	   if(isset($options['cylinderstext']) && !empty($options['cylinderstext']))
	{
	    
	}
	else
	{
	    $options['cylinderstext'] = 'Number of cylinders';
	}
	   echo "<input name='gorilla_fields[cylinderstext]' type='text' value='{$options['cylinderstext']}' />";
	   	   
	}
function horsepower_text() {
	 $options = get_option('gorilla_fields');	 	
	   if(isset($options['horsepowertext']) && !empty($options['horsepowertext']))
	{	    
	}
	else
	{
	    $options['horsepowertext'] = 'Horsepower';
	}
	   echo "<input name='gorilla_fields[horsepowertext]' type='text' value='{$options['horsepowertext']}' />";	   	   
	}
function torque_text() {
	 $options = get_option('gorilla_fields');	 	
	   if(isset($options['torquetext']) && !empty($options['torquetext']))
	{
	    
	}
	else
	{
	    $options['torquetext'] = 'Torque';
	}
	   echo "<input name='gorilla_fields[torquetext]' type='text' value='{$options['torquetext']}' />";	   	   
	}	
function compressionratio_text() {
	 $options = get_option('gorilla_fields');
		if(isset($options['compressionratiotext']) && !empty($options['compressionratiotext']))
	{	    
	}
	else
	{
	    $options['compressionratiotext'] = 'Compression Ratio:';
	}
	   echo "<input name='gorilla_fields[compressionratiotext]' type='text' value='{$options['compressionratiotext']}' />";	   	   
	}	
function camshaft_text() {
	 $options = get_option('gorilla_fields');	
	   if(isset($options['camshafttext']) && !empty($options['camshafttext']))
	{	    
	}
	else
	{
	    $options['camshafttext'] = 'Camshaft:';
	}
	   echo "<input name='gorilla_fields[camshafttext]' type='text' value='{$options['camshafttext']}' />";	   	   
	}		
function enginetype_text() {
	 $options = get_option('gorilla_fields');	 	
	   if(isset($options['enginetypetext']) && !empty($options['enginetypetext']))
	{	    
	}
	else
	{
	    $options['enginetypetext'] = 'Engine Type';
	}
	   echo "<input name='gorilla_fields[enginetypetext]' type='text' value='{$options['enginetypetext']}' />";	   	   
	}
function bore_text() {
	 $options = get_option('gorilla_fields');  	 	
	   if(isset($options['boretext']) && !empty($options['boretext']))
	{	    
	}
	else
	{
	    $options['boretext'] = 'Bore';
	}
	   echo "<input name='gorilla_fields[boretext]' type='text' value='{$options['boretext']}' />";
   
	}
function stroke_text() {
	 $options = get_option('gorilla_fields');
	 if(isset($options['stroketext']) && !empty($options['stroketext']))
	{	    
	}
	else
	{
	    $options['stroketext'] = 'Stroke';
	}
	   echo "<input name='gorilla_fields[stroketext]' type='text' value='{$options['stroketext']}' />";	   
	}
function valvespercylinder_text() {
	 $options = get_option('gorilla_fields');
		if(isset($options['valvespercylindertext']) && !empty($options['valvespercylindertext']))
	{	    
	}
	else
	{
	    $options['valvespercylindertext'] = 'Valves per Cylinder';
	}
	   echo "<input name='gorilla_fields[valvespercylindertext]' type='text' value='{$options['valvespercylindertext']}' />";
	   	   
	}
function fuelcapacity_text() {
	 $options = get_option('gorilla_fields');
	 if(isset($options['fuelcapacitytext']) && !empty($options['fuelcapacitytext']))
	{	    
	}
	else
	{
	    $options['fuelcapacitytext'] = 'Fuel Capacity (gals.)';
	}
	   echo "<input name='gorilla_fields[fuelcapacitytext]' type='text' value='{$options['fuelcapacitytext']}' />";	   	   
	}
function wheelbase_text() {
	 $options = get_option('gorilla_fields');
	 if(isset($options['wheelbasetext']) && !empty($options['wheelbasetext']))
	{	    
	}
	else
	{
	    $options['wheelbasetext'] = 'Wheelbase';
	}
	   echo "<input name='gorilla_fields[wheelbasetext]' type='text' value='{$options['wheelbasetext']}' />";	   
	}
function overalllength_text() {
	 $options = get_option('gorilla_fields');
	 if(isset($options['overalllengthtext']) && !empty($options['overalllengthtext']))
	{	    
	}
	else
	{
	    $options['overalllengthtext'] = 'Overall Length';
	}
	   echo "<input name='gorilla_fields[overalllengthtext]' type='text' value='{$options['overalllengthtext']}' />";	   
	}
function width_text() {
	 $options = get_option('gorilla_fields');
	   if(isset($options['widthtext']) && !empty($options['widthtext']))
	{	    
	}
	else
	{
	    $options['widthtext'] = 'Width';
	}
	   echo "<input name='gorilla_fields[widthtext]' type='text' value='{$options['widthtext']}' />";	   
	}
function height_text() {
	 $options = get_option('gorilla_fields');
		if(isset($options['heighttext']) && !empty($options['heighttext']))
	{	    
	}
	else
	{
	    $options['heighttext'] = 'Height';
	}
	   echo "<input name='gorilla_fields[heighttext]' type='text' value='{$options['heighttext']}' />";
		   
	}
function curbweight_text() {
	 $options = get_option('gorilla_fields');
		if(isset($options['curbweighttext']) && !empty($options['curbweighttext']))
	{
	    
	}
	else
	{
	    $options['curbweighttext'] = 'Curb Weight';
	}
	   echo "<input name='gorilla_fields[curbweighttext]' type='text' value='{$options['curbweighttext']}' />";
   
	}		
function legroom_text() {
	 $options = get_option('gorilla_fields');
	 
	
	   if(isset($options['legroomtext']) && !empty($options['legroomtext']))
	{	    
	}
	else
	{
	    $options['legroomtext'] = 'Leg Room';
	}
	   echo "<input name='gorilla_fields[legroomtext]' type='text' value='{$options['legroomtext']}' />";	   
	}	
function headroom_text() {
	 $options = get_option('gorilla_fields');
		if(isset($options['headroomtext']) && !empty($options['headroomtext']))
	{	    
	}
	else
	{
	    $options['headroomtext'] = 'Head Room';
	}
	   echo "<input name='gorilla_fields[headroomtext]' type='text' value='{$options['headroomtext']}' />";	   
	}	
function seatingcapacity_text() {
	 $options = get_option('gorilla_fields');	
	   if(isset($options['seatingcapacitytext']) && !empty($options['seatingcapacitytext']))
	{	    
	}
	else
	{
	    $options['seatingcapacitytext'] = 'Seating Capacity';
	}
	   echo "<input name='gorilla_fields[seatingcapacitytext]' type='text' value='{$options['seatingcapacitytext']}' />";	   
	}
function tires_text() {
	 $options = get_option('gorilla_fields');
		if(isset($options['tirestext']) && !empty($options['tirestext']))
	{	    
	}
	else
	{
	    $options['tirestext'] = 'Tires';
	}
	   echo "<input name='gorilla_fields[tirestext]' type='text' value='{$options['tirestext']}' />";	   
	}

function comments_text() {
	$options = get_option('gorilla_fields');
	   if(empty($options['commentstext']))
	{
	    $options['commentstext'] = 'Description';
	}
	else
	{
	 $options['commentstext'];  
	}
	   echo "<input name='gorilla_fields[commentstext]' type='text' value='{$options['commentstext']}' />";
	}
?>