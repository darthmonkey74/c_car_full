<?php	$options = get_option('gorilla_fields');

	if (isset($options['pricetext']) && !empty($options['pricetext']))
		{
		  $options['pricetext'];
		}
		else
		{
		$options['pricetext'] = 'Price';
		}
		if (isset($options['tagtitletext']) && !empty($options['tagtitletext']))
		{
		  $options['tagtitletext'];
		}
		else
		{
		$options['tagtitletext'] = 'Short Tag';
		}
		if (isset($options['yearstart']) && !empty($options['yearstart']))
		{
		  $options['yearstart'];
		}
		else
		{
		$options['yearstart'] = '2000';
		}
		if (isset($options['yearend']) && !empty($options['yearend']))
		{
		  $options['yearend'];
		}
		else
		{
		$options['yearend'] = '2013';
		}		
		if (isset($options['yeartext']) && !empty($options['yeartext']))
		{
		  $options['yeartext'];
		}
		else
		{
		$options['yeartext'] = 'Year';
		}
		if (isset($options['carfaxtext']) && !empty($options['carfaxtext']))
		{
		$options['carfaxtext'];
		}
		else
		{
		$options['carfaxtext'] = '';
		}
		if (isset($options['statustagtext']) && !empty($options['statustagtext']))
		{
		$options['statustagtext'];
		}
		else
		{
		$options['statustagtext'] = 'Condition';
		}
		if (isset($options['featuredtext']) && !empty($options['featuredtext']))
		{
		  $options['featuredtext'];
		}
		else
		{
		$options['featuredtext'] = 'Featured';
		}
		if (isset($options['milestext']) && !empty($options['milestext']))
		{
		  $options['milestext'];
		}
		else
		{
		$options['milestext'] = 'Miles';
		}
		if (isset($options['stocktext']) && !empty($options['stocktext']))
		{
		  $options['stocktext'];
		}
		else
		{
		$options['stocktext'] = 'Stock #';
		}
		if (isset($options['vehicletypetext']) && !empty($options['vehicletypetext']))
		{
		  $options['vehicletypetext'];
		}
		else
		{
		$options['vehicletypetext'] = 'Vehicle Type';
		}
		if (isset($options['epamileagetext']) && !empty($options['epamileagetext']))
		{
		  $options['epamileagetext'];
		}
		else
		{
		$options['epamileagetext'] = 'EPA Mileage';
		}
		if (isset($options['vintext']) && !empty($options['vintext']))
		{
		  $options['vintext'];
		}
		else
		{
		$options['vintext'] = 'VIN';
		}
		if (isset($options['drivetext']) && !empty($options['drivetext']))
		{
		  $options['drivetext'];
		}
		else
		{
		$options['drivetext'] = 'Drive';
		}
		if(isset($options['transmissiontext']) && !empty($options['transmissiontext']))
		{
		$options['transmissiontext'];
		}
		else
		{
		$options['transmissiontext']='Transmission';			    
		}
		if(isset($options['vehicletype1']) && !empty($options['vehicletype1']))
		{
		$options['vehicletype1'];
		}
		else
		{
		$options['vehicletype1']='Convertibles';			    
		}
		if(isset($options['transmissionoption1']) && !empty($options['transmissionoption1']))
		{
		$options['transmissionoption1'];
		}
		else
		{
		$options['transmissionoption1']='Automatic';			    
		}
		if(isset($options['transmissionoption2']) && !empty($options['transmissionoption2']))
		{
		$options['transmissionoption2'];
		}
		else
		{
		$options['transmissionoption2']='Manual';			    
		}
		if(isset($options['transmissionoption3']) && !empty($options['transmissionoption3']))
		{
		$options['transmissionoption3'];
		}
		else
		{
		$options['transmissionoption3']='Semi-Auto';			    
		}
		if(isset($options['transmissionoption4']) && !empty($options['transmissionoption4']))
		{
		$options['transmissionoption4'];
		}
		else
		{
		$options['transmissionoption4']='Other';			    
		}
		if (isset($options['exteriortext']) && !empty($options['exteriortext']))
		{
		  $options['exteriortext'];
		}
		else
		{
		$options['exteriortext'] = 'Exterior color';
		}
		if (isset($options['topdealtext']) && !empty($options['topdealtext']))
      {
        $options['topdealtext'];
      }
      else
      {
      $options['topdealtext'] = 'Top Deal?';
      }
		if (isset($options['interiortext']) && !empty($options['interiortext']))
		{
		  $options['interiortext'];
		}
		else
		{
		$options['interiortext'] = 'Interior color';
		}
		if(isset($options['vehicletype1']) && !empty($options['vehicletype1']))
		{
		$options['vehicletype1'];
		}
		else
		{
		$options['vehicletype1']='Convertibles';			    
		}
		if(isset($options['vehicletype2']) && !empty($options['vehicletype2']))
		{
		$options['vehicletype2'];
		}
		else
		{
		$options['vehicletype2']='Crossovers';			    
		}
		if(isset($options['vehicletype3']) && !empty($options['vehicletype3']))
		{
		$options['vehicletype3'];
		}
		else
		{
		$options['vehicletype3']='Luxury Vehicles';			    
		}
		if(isset($options['vehicletype4']) && !empty($options['vehicletype4']))
		{
		$options['vehicletype4'];
		}
		else
		{
		$options['vehicletype4']='Hybrids';			    
		}
		if(isset($options['vehicletype5']) && !empty($options['vehicletype5']))
		{
		$options['vehicletype5'];
		}
		else
		{
		$options['vehicletype5']='Minivans and Vans';			    
		}
		if(isset($options['vehicletype6']) && !empty($options['vehicletype6']))
		{
		$options['vehicletype6'];
		}
		else
		{
		$options['vehicletype6']='Pickup Trucks';			    
		}
		if(isset($options['vehicletype7']) && !empty($options['vehicletype7']))
		{
		$options['vehicletype7'];
		}
		else
		{
		$options['vehicletype7']='Sedans and Coupes';			    
		}
		if(isset($options['vehicletype8']) && !empty($options['vehicletype8']))
		{
		$options['vehicletype8'];
		}
		else
		{
		$options['vehicletype8']='Diesel Engines';			    
		}
		if(isset($options['vehicletype9']) && !empty($options['vehicletype9']))
		{
		$options['vehicletype9'];
		}
		else
		{
		$options['vehicletype9']='Sport Utilities';			    
		}		
		if(isset($options['vehicletype10']) && !empty($options['vehicletype10']))
		{
		$options['vehicletype10'];
		}
		else
		{
		$options['vehicletype10']='Sports Cars';			    
		}	
		if(isset($options['vehicletype11']) && !empty($options['vehicletype11']))
		{
		$options['vehicletype11'];
		}
		else
		{
		$options['vehicletype11']='Wagons';			    
		}	
		if(isset($options['vehicletype12']) && !empty($options['vehicletype12']))
		{
		$options['vehicletype12'];
		}
		else
		{
		$options['vehicletype12']='4WD-AWD';			    
		}
		if(isset($options['featuredhide']) && !empty($options['featuredhide']))
		{
		$options['featuredhide'];
		}
		else
		{
		$options['featuredhide']='Yes';			    
		}
		if(isset($options['pricehide']) && !empty($options['pricehide']))
		{
		$options['pricehide'];
		}
		else
		{
		$options['pricehide']='Yes';			    
		}
		if(isset($options['yearhide']) && !empty($options['yearhide']))
		{
		$options['yearhide'];
		}
		else
		{
		$options['yearhide']='Yes';			    
		}

		if(isset($options['statustaghide']) && !empty($options['statustaghide']))
		{
		$options['statustaghide'];
		}
		else
		{
		$options['statustaghide']='Yes';			    
		}
		if(isset($options['vehicletypehide']) && !empty($options['vehicletypehide']))
		{
		$options['vehicletypehide'];
		}
		else
		{
		$options['vehicletypehide']='Yes';			    
		}
		?>