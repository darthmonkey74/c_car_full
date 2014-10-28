<?php
$mod1 = "mod1";
$options = get_option('gorilla_fields');
include(TEMPLATEPATH."/functions/var/default-box-one.php");
include(TEMPLATEPATH."/includes/vloader.php");

$meta_boxes = array(
"price" => array(
	  "name" => "price", 
  	  "title" => $options['pricetext'], 
	  "description" => "Enter the full vehicle price without commas or dots.",
	  "type" => "range",
	  "class" => "range",
	  "rows" => "",
      "width" => "",
	  "hide_in_search" => $options['pricehide'],
	  "options" => ""
		), 	
  	"statustag" => array(
	  "name" => "statustag", 
	  "title" => $options['statustagtext'], 
	  "description" => "Enter vehicle condition.",
	  "type" => "dropdown",
	  "class" => "dropdown",
	  "rows" => "",
	  "width" => "",
	  "hide_in_search" => $options['statustaghide'],
	  "options" => array("1" => "None","2" => "New","3" => "Used","4" => "Sale","5" => "Reduced","6" => "Sold")

	), 
"featured" => array(
	  "name" => "featured",   
	  "title" => $options['featuredtext'],
	  "description" => "If yes this Vehicle will show up on the home page featured module.",
	  "type" => "dropdown",	
	  "class" => 'dropdown',
	  "hide_in_search" => 'Yes',
	  "options" => array("1" => "Yes", "2" => "No",)
		), 
"topdeal" => array(
	  "name" => "topdeal",   
	  "title" => $options['topdealtext'],
	  "description" => "If yes this Vehicle will show up on the Top Deals Widget.",
	  "type" => "dropdown",	
	  "class" => 'dropdown',
	  "hide_in_search" => 'Yes',
	  "options" => array("1" => "No", "2" => "Yes",)
		), 
 "year" => array(
	  "name" => "year",   
	  "title" => $options['yeartext'], 
	  "description" => "Enter vehicle year.",
	  "type" => "dropdown",
	  "class" => "dropdown",
	  "rows" => "",
	  "hide_in_search" => $options['yearhide'],
	  "width" => "",
	  "options" => generate_years( $options['yearstart'], $options['yearend'] ),
	  ),
 
"miles" => array(
	  "name" => "miles",   
	  "title" => $options['milestext'],  
	  "description" => "Enter vehicle mileage.",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "width" => "",
	   "hide_in_search" => "Yes",
	  "options" => "miles"	  
	),  
"vehicletype" => array(
	  "name" => "vehicletype",   
	  "title" => $options['vehicletypetext'],  
	  "description" => "Enter the Vehicle type.",
	  "type" => "dropdown",
	  "class" => "dropdown",
	  "rows" => "",
	  "width" => "",
	   "hide_in_search" => $options['vehicletypehide'],
	  "options" => array("1" => $options['vehicletype1'],  
	  					 "2" => $options['vehicletype2'],
	  					 "3" => $options['vehicletype3'],
	  					 "4" => $options['vehicletype4'],
	  					 "5" => $options['vehicletype5'],
	  					 "6" => $options['vehicletype6'],
	  					 "7" => $options['vehicletype7'],  
	  					 "8" => $options['vehicletype8'],
	  					 "9" => $options['vehicletype9'],
	  					 "10" => $options['vehicletype10'],
	  					 "11" => $options['vehicletype11'],
	  					 "12" => $options['vehicletype12'],    
	  					 )
	),  
"stock" => array(
	  "name" => "stock", 
	  "title" => $options['stocktext'], 
	  "description" => "Enter vehicle stock number.",
	  "type" => "text",
	  "class" => "dropdown",
	  "rows" => "",
	  "width" => "",
	  "hide_in_search" => 'Yes',
	  "options" => ""
	), 
"drive" => array(
	  "name" => "drive", 
	  "title" => $options['drivetext'],
	  "description" => "Enter vehicle drive type.",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => 'Yes',
	  "width" => "",
	  "options" => "drive"
	),
"transmission" => array(
	  "name" => "transmission", 
	  "title" => $options['transmissiontext'],
	  "description" => "Enter vehicle transmission type.",
	  "type" => "dropdown",
	  "class" => "dropdown",
	  "rows" => "",
	  "hide_in_search" => 'Yes',
	  "width" => "",
	  	  "options" => array("1" => $options['transmissionoption1'],  
	  					 	 "2" => $options['transmissionoption2'],
	  					 	 "3" => $options['transmissionoption3'],
	  					 	 "4" => $options['transmissionoption4'],
	 	  					 )
	),
"exterior" => array(
	  "name" => "exterior", 
	  "title" => $options['exteriortext'],
	  "description" => "Enter vehicle exterior color.",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => 'Yes',
	  "width" => "",
	  "options" => ""
	), 
"interior" => array(
	  "name" => "interior", 
	  "title" => $options['interiortext'],
	  "description" => "Enter vehicle interior color.",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => 'Yes',
	  "width" => "",
	  "options" => ""
	),
"EPA_CITY_MPG" => array(
	  "name" => "EPA_CITY_MPG", 
	  "title" => 'EPA City MPG',
	  "description" => "Enter EPA City MPG.",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => 'Yes',
	  "width" => "",
	  "options" => ""
	),
"EPA_HIGHWAY_MPG" => array(
	  "name" => "EPA_HIGHWAY_MPG", 
	  "title" => 'EPA Highway MPG',
	  "description" => "Enter EPA Highway MPG.",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => 'Yes',
	  "width" => "",
	  "options" => ""
	),
"vin" => array(
	  "name" => "vin", 
	  "title" => $options['vintext'],
	  "description" => "Enter vehicle identification number.",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => 'Yes',
	  "width" => "",
	  "options" => ""
	),
"carfax" => array(
"name" => "carfax", 
	  "title" => $options['carfaxtext'],
	  "description" => "Enter Carfax partner ID to offer free reports with your vehicle.",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => 'Yes',
	  "width" => "",
	  "options" => ""
	),
	 
		 );
?>
<?php	
 $mod2 = "mod2";
$options = get_option('gorilla_fields');
include(TEMPLATEPATH."/functions/var/default-box-two.php");
$feat_boxes = array(
"enginesize" => array(
	  "name" => "enginesize", 
	  "title" => $options['enginesizetext'],  
	  "description" => "Enter vehicle engine size.",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ), 
"cylinders" => array(
	  "name" => "cylinders", 
	  "title" => $options['cylinderstext'],  
	  "description" => "Enter number of cylinders.",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ),
"FRONT_AIR_CONDITIONING" => array(
	  "name" => "FRONT_AIR_CONDITIONING", 
	  "title" => 'Front Air Conditioning',  
	  "description" => "Enter Front Air Conditioning",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ),
"FRONT_BRAKE_TYPE" => array(
	  "name" => "FRONT_BRAKE_TYPE", 
	  "title" => 'Front Brake Type',  
	  "description" => "Enter Front Brake Type",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ), 
"ANTILOCK_BRAKING_SYSTEM" => array(
	  "name" => "ANTILOCK_BRAKING_SYSTEM", 
	  "title" => 'Antilock Braking System',  
	  "description" => "Enter Antilock Braking System",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ),
"BRAKING_ASSIST" => array(
	  "name" => "BRAKING_ASSIST", 
	  "title" => 'Braking Assist',  
	  "description" => "Enter Braking Assist",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ),
"REAR_BRAKE_DIAMETER" => array(
	  "name" => "REAR_BRAKE_DIAMETER", 
	  "title" => 'Rear Brake Diameter',  
	  "description" => "Enter Rear Brake Diameter",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ), 
"AUTO_DIMMING_REARVIEW_MIRROR" => array(
	  "name" => "AUTO_DIMMING_REARVIEW_MIRROR", 
	  "title" => 'Auto Dimming Rearview Mirror',  
	  "description" => "Enter Auto Dimming Rearview Mirror",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ),
"RUNNING_BOARDS" => array(
	  "name" => "RUNNING_BOARDS", 
	  "title" => 'Running Boards',  
	  "description" => "Enter Running Boards",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ),  
"ROOF_RACK" => array(
	  "name" => "ROOF_RACK", 
	  "title" => 'Roof Rack',  
	  "description" => "Enter Roof Rack",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ), 
"POWER_DOOR_LOCKS" => array(
	  "name" => "POWER_DOOR_LOCKS", 
	  "title" => 'Power Door Locks',  
	  "description" => "Enter Power Door Locks",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ),  
"ANTI_THEFT_ALARM_SYSTEM" => array(
	  "name" => "ANTI_THEFT_ALARM_SYSTEM", 
	  "title" => 'Anti Theft Alarm System',  
	  "description" => "Enter Anti Theft Alarm System",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ),  
"CRUISE_CONTROL" => array(
	  "name" => "CRUISE_CONTROL", 
	  "title" => 'Cruise Control',  
	  "description" => "Enter Cruise Control",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""  
	  ),
"1ST_ROW_VANITY_MIRRORS" => array(
	  "name" => "1ST_ROW_VANITY_MIRRORS", 
	  "title" => 'First Row Vanity Mirrors',  
	  "description" => "Enter First Row Vanity Mirrors",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ), 
"HEATED_DRIVER_SIDE_MIRROR" => array(
	  "name" => "HEATED_DRIVER_SIDE_MIRROR", 
	  "title" => 'Heated Driver Side Mirror',  
	  "description" => "Enter Heated Driver Side Mirror",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ),
"HEATED_PASSENGER_SIDE_MIRROR" => array(
	  "name" => "HEATED_PASSENGER_SIDE_MIRROR", 
	  "title" => 'Heated Driver Passenger Mirror',  
	  "description" => "Enter Heated Passenger Side Mirror",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ),
"TRAILER_WIRING" => array(
	  "name" => "TRAILER_WIRING", 
	  "title" => 'Trailer Wiring',  
	  "description" => "Enter Trailer Wiring",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ),
"TRAILER_HITCH" => array(
	  "name" => "TRAILER_HITCH", 
	  "title" => 'Trailer Hitch',  
	  "description" => "Enter Trailer Hitch",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ),
"CRUISE_CONTROLS_ON_STEERING_WHEEL" => array(
	  "name" => "CRUISE_CONTROLS_ON_STEERING_WHEEL", 
	  "title" => 'Cruise Control on Steering Wheel',  
	  "description" => "Enter Cruise Control on Steering Wheel",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ),
"AUDIO_CONTROLS_ON_STEERING_WHEEL" => array(
	  "name" => "AUDIO_CONTROLS_ON_STEERING_WHEEL", 
	  "title" => 'Audio Control on Steering Wheel',  
	  "description" => "Enter Audio Control on Steering Wheel",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ), 
"FOLDING_2ND_ROW" => array(
	  "name" => "FOLDING_2ND_ROW", 
	  "title" => 'Folding Second Row Seats',  
	  "description" => "Enter Folding Second Row Seats",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ), 
	  
	  "1ST_ROW_POWER_OUTLET" => array(
	  "name" => "1ST_ROW_POWER_OUTLET", 
	  "title" => 'First Row Power Outlet',  
	  "description" => "Enter First Row Power Outlet",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ), 
	  
	  "CARGO_AREA_POWER_OUTLET" => array(
	  "name" => "CARGO_AREA_POWER_OUTLET", 
	  "title" => 'Cargo Area Power Outlet',  
	  "description" => "Enter Cargo Area Power Outlet",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ), 
	  
	  "INDEPENDENT_SUSPENSION" => array(
	  "name" => "INDEPENDENT_SUSPENSION", 
	  "title" => 'Independent Suspension',  
	  "description" => "Enter Independent Suspension",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ), 
	    
	  "REAR_SUSPENSION_TYPE" => array(
	  "name" => "REAR_SUSPENSION_TYPE", 
	  "title" => 'Rear Suspension Type',  
	  "description" => "Enter Rear Suspension Type",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ), 
	  	  
	    
	  "FRONT_SUSPENSION_TYPE" => array(
	  "name" => "FRONT_SUSPENSION_TYPE", 
	  "title" => 'Front Suspension Type',  
	  "description" => "Enter Front Suspension Type",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ), 
	  	  
	    
	  "INDEPENDENT_SUSPENSION" => array(
	  "name" => "INDEPENDENT_SUSPENSION", 
	  "title" => 'Independent Suspension',  
	  "description" => "Enter Independent Suspension",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ), 
	  	  	  
	   "MAX_CARGO_CAPACITY" => array(
	  "name" => "MAX_CARGO_CAPACITY", 
	  "title" => 'Maximum Cargo Capacity Suspension',  
	  "description" => "Enter Maximum Cargo Capacity Suspension",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ), 
	 	  	  	  
	   "PASSENGER_AIRBAG" => array(
	  "name" => "PASSENGER_AIRBAG", 
	  "title" => 'Passenger Airbags',  
	  "description" => "Enter Passenger Airbags",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ), 
	  

/*
"torque" => array(
	  "name" => "torque", 
	  "title" => $options['torquetext'],  
	  "description" => "Enter vehicle torque.",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ), 
*/
/*
"compressionratio" => array(
	  "name" => "compressionratio", 
	  "title" => $options['compressionratiotext'],  
	  "description" => "Enter vehicle compression ratio.",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ),
*/ 	  	  
"enginetype" => array(
	  "name" => "enginetype", 
	  "title" => $options['enginetypetext'],  
	  "description" => "Enter vehicle engine type.",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ), 	  
/*
"bore" => array(
	  "name" => "bore", 
	  "title" => $options['boretext'],  
	  "description" => "Enter bore.",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ), 	  
"stroke" => array(
	  "name" => "stroke", 
	  "title" => $options['stroketext'],  
	  "description" => "Enter vehicle stroke.",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ),	  

"valvespercylinder" => array(
	  "name" => "valvespercylinder", 
	  "title" => $options['valvespercylindertext'],  
	  "description" => "Enter number of valves per cylinder.",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ),
*/
"fuelcapacity" => array(
	  "name" => "fuelcapacity", 
	  "title" => $options['fuelcapacitytext'],  
	  "description" => "Enter vehicle fuel capacity.",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ),
"wheelbase" => array(
	  "name" => "wheelbase", 
	  "title" => $options['wheelbasetext'],  
	  "description" => "Enter vehicle wheelbase.",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ),
"overalllength" => array(
	  "name" => "overalllength", 
	  "title" => $options['overalllengthtext'],  
	  "description" => "Enter vehicle overall length.",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ),
"width" => array(
	  "name" => "width", 
	  "title" => $options['widthtext'],  
	  "description" => "Enter vehicle width.",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ),	  
"height" => array(
	  "name" => "height", 
	  "title" => $options['heighttext'],  
	  "description" => "Enter vehicle height.",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ),
"curbweighttext" => array(
	  "name" => "curbweight", 
	  "title" => $options['curbweighttext'],  
	  "description" => "Enter vehicle curb weight.",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ),	  		  
"legroom" => array(
	  "name" => "legroom", 
	  "title" => $options['legroomtext'],  
	  "description" => "Enter vehicle leg room.",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ),
"headroom" => array(
	  "name" => "headroom", 
	  "title" => $options['headroomtext'],  
	  "description" => "Enter vehicle head room.",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ),
"seatingcapacity" => array(
	  "name" => "seatingcapacity", 
	  "title" => $options['seatingcapacitytext'],  
	  "description" => "Enter vehicle seating capacity.",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
		),
"tires" => array(
	  "name" => "tires", 
	  "title" => $options['tirestext'],  
	  "description" => "Enter vehicle tires.",
	  "type" => "text",
	  "class" => "text",
	  "rows" => "",
	  "hide_in_search" => "Yes",
	  "width" => "10%",
	  "options" => ""
	  ),  
);
?>
<?php
$mod3 = "mod3";
include(TEMPLATEPATH."/functions/var/default-box-three.php");
$comment_boxes = array(
  	"comment_area" => array(
	  "name" => "comment_area", 
	  "title" => $options['commentstext'],  
	  "description" => "",
	  "type" => "textarea",
	  "class" => "textarea",
	  "hide_in_search" => "Yes",
	  "rows" => "20%",
	  "width" => "80%",
	  "height" => "30%",
	  "options" => ""),
);

$feat = "feat1";
$options = get_option('gorilla_fields');
include(TEMPLATEPATH."/functions/var/default-box-one.php");
$featured_post = array(
	  "featured" => array(
	  "name" => "featured",   
	  "title" => $options['featuredtext'],
	  "description" => "If selected 'Yes' the image of this post will be displayed in the home slideshow.",
	  "type" => "dropdown",	
	  "class" => 'dropdown',
	  "hide_in_search" => 'Yes',
	  "options" => array("1" => "No", "2" => "Yes"),
		));

?>
<?php	  
function create_meta_box() {
global $mod1, $mod3, $mod2, $feat, $meta_box, $page;
if( function_exists( 'add_meta_box' ) ) {
add_meta_box( 'new-meta-box0', ' Vehicle VIN Number Decoder', 'display_api_box', 'gtcd', 'normal', 'high' );
add_meta_box($meta_box['id'], $meta_box['title'], 'show', $page, $meta_box['context'], $meta_box['priority']);
add_meta_box( 'new-meta-box1', ' Vehicle Information', 'display_meta_box', 'gtcd', 'normal', 'core' );
add_meta_box( 'new-meta-box2', ' Vehicle Specifications', 'display_specifications_box', 'gtcd', 'normal', 'core' );
add_meta_box( 'new-meta-box3', ' Vehicle Overview', 'display_comments_box', 'gtcd', 'normal', 'core' );
add_meta_box( 'new-meta-box1', ' Vehicle Information', 'display_meta_box', 'user_listing', 'normal', 'core' );
add_meta_box( 'new-meta-box2', ' Vehicle Specifications', 'display_specifications_box', 'user_listing', 'normal', 'core' );
add_meta_box( 'new-meta-box3', ' Vehicle Overview', 'display_comments_box', 'user_listing', 'normal', 'core' );
add_meta_box( 'feat-meta-box', ' Featured Post', 'display_feat_meta_box', 'post', 'side', 'core' );
}
}
function display_api_box() {
  global $post,$wpdb, $meta_boxes, $mod1;
	$APIKey = get_option('Edmund_API');
	if ($APIKey==''){
		$disabled = 'disabled';
	}else{
		$disabled = '';		
	}
?>
<div class="form-wrap vin">
<?php 	if ($APIKey==''){?>

<div class="api-legend"><a href="admin.php?page=edmund_api"><?php _e('Click here to setup your VIN Decoder','language');?></a></div>

<?php
}
?>
<div class="vin-form"><?php _e('VIN Number: ','language');?><input type="text" width="50" value="" name="VIN_Code" id="VIN_Code" <?php echo $disabled;?>/>
<input type="button" onclick="get_api_data();" id="GetData" value="Get Data" class="button" <?php echo $disabled;?>></div><div id="API_message"></div>
<div class="vin-loader"><img id="MyLoading" style="display:none;" src="<?php bloginfo('template_url');?>/images/loading.gif" height="30" width="30"/></div><div><a href="http://www.edmunds.com/?id=apis" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/common/220_color.png" alt="Edmunds"/></a></div>
</div>
<?php
}

function display_feat_meta_box() {
  global $post,$wpdb, $featured_post, $feat;
?>
<div class="form-wrap">
<?php
//wp_nonce_field( plugin_basename( __FILE__ ), $mod1 . '_wpnonce', false, true );

$output = '';
foreach($featured_post as $feat_post) { 

    $data = get_post_meta($post->ID, $feat, true);  
	$output .= '<div style="font-size:12px;color:#666;font-weight:normal;padding:20p 0x;"><br/>'.$feat_post['description'] .'</div><p style="border-bottom:1px solid #f1f1f1;padding-bottom:3px;"><div style="width:80px;padding:6px 0 20px 5px;font-size:12px;color:#252525; font-style:normal;font-weight:bold;float: left;">' . $feat_post['title'] . ':</div>' . "\n"; 
	 if(($feat_post['type'] == 'dropdown') && (!empty($feat_post['options']))) { // dropdown lists    
    
    $output .= '<select name="' . $feat_post['name'] . '">' . "\n";
    
    if (isset($data[$feat_post['name']])) {
        $output .= '<option selected>'. $data[$feat_post['name']] .'</option>' . "\n";	
    }     
		
    foreach($feat_post['options'] as $dropdown_key => $dropdown_value) {
        $output .= '<option value="' . $dropdown_value . '">' . $dropdown_value . '</option>' . "\n";
    }        
    $output .= '</select>' . "\n";		  	
  }
  $output .= '</p>' ;  
  }   
  echo '<div>' . "\n" . $output . "\n" . '</div></div><br/>' . "\n\n";
}
?>
<?php
function display_meta_box() {
  global $post,$wpdb, $meta_boxes, $mod1;
?>
<div class="form-wrap">
<?php
//wp_nonce_field( plugin_basename( __FILE__ ), $mod1 . '_wpnonce', false, true );

$output = '';
foreach($meta_boxes as $meta_box) { 

    $data = get_post_meta($post->ID, $mod1, true);  
	$output .= '<p style="border-bottom:1px solid #f1f1f1;padding-bottom:3px;"><div style="width:130px;padding:6px 0 0 5px;font-size:12px;color:#252525; font-style:normal;font-weight:bold;float: left;">' . $meta_box['title'] . ':&nbsp; </div>' . "\n"; 
	if($meta_box['type'] == 'text' || $meta_box['type'] == 'range') { // plain text input
      $output .= '<input type="text" name="' . $meta_box['name'] . '" value="' . (isset($data[$meta_box['name']]) ? $data[$meta_box['name']] : '') . '" style="margin-top:3px;width:' . $meta_box['width'] . ';" />';     
 	$output .= '<span style="font-size:11px;color:#666; font-style:italic;font-weight:normal;padding-bottom:10px;"> ' .$meta_box['description'] . '</span><br />' . "\n";      
  } else if($meta_box['type'] == 'textarea') { // textarea box
      $output .= '<textarea name="' . $meta_box['name'] . '" style="width:' . $meta_box['width'] . '; height:200px;">' . $data[$meta_box['name']] . '</textarea>'; 
    } else if(($meta_box['type'] == 'checkbox') && (!empty($meta_box['options']))) { // checkboxes
      foreach($meta_box['options'] as $checkbox_value) { 
         if(is_array($data) && $data[$meta_box['name']] != "") { // if array is empty, warnings will be issued, this circumvents it  
          $output .= '<input type="checkbox" name="' . $meta_box['name'] . '[]" value="' . $checkbox_value . '" ' . (isset($data[$meta_box['name']]) && (in_array($checkbox_value, $data[$meta_box['name']])) ? ' checked="checked"' : '') . '/> ' . $checkbox_value . ' &nbsp; ' . "\n";	
         } else {  
          $output .= '<input type="checkbox" name="' . $meta_box['name'] . '[]" value="' . $checkbox_value . '"/> ' . $checkbox_value . ' &nbsp; ' . "\n";	
         }
      }		  			
  } else if(($meta_box['type'] == 'radio') && (!empty($meta_box['options']))) { // radio buttons
  foreach($meta_box['options'] as $radio_value) {
          $output .= '<p style="padding-bottom:10px;display:inline;font-style:normal;"><input type="radio" name="' . $meta_box['name'] . '" value="' . $radio_value . '" ' . (isset($data[$meta_box['name']]) && ($data[$meta_box['name']] == $radio_value) ? ' checked="checked"' : '') . '/> ' . $radio_value . ' &nbsp; </p>' . "\n";	
      }		  	
  }
  
  else if(($meta_box['type'] == 'dropdown') && (!empty($meta_box['options']))) { // dropdown lists    
    
    $output .= '<select name="' . $meta_box['name'] . '">' . "\n";
    
    if (isset($data[$meta_box['name']])) {
        $output .= '<option selected>'. $data[$meta_box['name']] .'</option>' . "\n";	
    }     
		
    foreach($meta_box['options'] as $dropdown_key => $dropdown_value) {
        $output .= '<option value="' . $dropdown_value . '">' . $dropdown_value . '</option>' . "\n";
    }        
    $output .= '</select><span style="font-size:11px;color:#666; font-style:italic;font-weight:normal;padding-bottom:10px;"> ' . "".$meta_box['description']."</span>\n";		  	
  }
  $output .= "</p>\n\n";  
  }   
  echo '<div>' . "\n" . $output . "\n" . '</div></div>' . "\n\n";
}
?>
<?php
function display_specifications_box() {
  global $post, $feat_boxes, $mod2;
?>
<div class="form-wrap">
<?php
//wp_nonce_field( plugin_basename( __FILE__ ), $mod2 . '_wpnonce', false, true );
$output = '';
foreach($feat_boxes as $feat_box) { 
    $data = get_post_meta($post->ID, $mod2, true);       
	
  $output .= '<p style="border-bottom:1px solid #f1f1f1;padding-bottom:3px;"><div style="width:230px;padding:6px 0 0 5px;font-size:12px;color:#252525; font-style:normal;font-weight:bold;float: left;">' . $feat_box['title'] . ':&nbsp; </div>' . "\n"; 
  if($feat_box['type'] == 'text' || $feat_box['type'] == 'range') { // plain text input
      $output .= '<input type="text" name="' . $feat_box['name'] . '" value="' . (isset($data[$feat_box['name']]) ? $data[$feat_box['name']] : '') . '" style="margin-top:3px;width:' . $feat_box['width'] . ';" />';           
      $output .= '<span style="font-size:11px;color:#666; font-style:italic;font-weight:normal;padding-bottom:10px;"> ' .$feat_box['description'] . '</span><br />' . "\n";     
  }else if($feat_box['type'] == 'textarea') { // textarea box
      $output .= '<textarea name="' . $feat_box['name'] . '" style="width:' . $feat_box['width'] . '; height:100px;">' . $data[$feat_box['name']] . '</textarea>'; 
    }else if(($feat_box['type'] == 'checkbox') && (!empty($feat_box['options']))) { // checkboxes
      foreach($feat_box['options'] as $checkbox_value) { 
         if(is_array($data) && $data[$feat_box['name']] != "") { // if array is empty, warnings will be issued, this circumvents it  
          $output .= '<input type="checkbox" name="' . $feat_box['name'] . '[]" value="' . $checkbox_value . '" ' . (isset($data[$feat_box['name']]) && (in_array($checkbox_value, $data[$feat_box['name']])) ? ' checked="checked"' : '') . '/> ' . $checkbox_value . ' &nbsp; ' . "\n";	
         } else {  
          $output .= '<input type="checkbox" name="' . $feat_box['name'] . '[]" value="' . $checkbox_value . '"/> ' . $checkbox_value . ' &nbsp; ' . "\n";	
         }
      }		  			
  }else if(($feat_box['type'] == 'radio') && (!empty($feat_box['options']))) { // radio buttons        
      foreach($feat_box['options'] as $radio_value) {
          $output .= '<p style="padding-bottom:10px;display:inline;font-style:normal;"><input type="radio" name="' . $feat_box['name'] . '" value="' . $radio_value . '" ' . (isset($data[$feat_box['name']]) && ($data[$feat_box['name']] == $radio_value) ? ' checked="checked"' : '') . '/> ' . $radio_value . ' &nbsp; </p>' . "\n";	
      }		  	
  }else if(($feat_box['type'] == 'dropdown') && (!empty($feat_box['options']))) { // dropdown lists     
    $output .= '<select name="' . $feat_box['name'] . '">' . "\n";
    if (isset($data[$feat_box['name']])) {
        $output .= '<option selected>'. $data[$feat_box['name']] .'</option>' . "\n";	
    }      
		
    foreach($feat_box['options'] as $dropdown_key => $dropdown_value) {
        $output .= '<option value="' . $dropdown_value . '">' . $dropdown_value . '</option>' . "\n";
    }        
    $output .= '</select>' . "\n";		  	
  }
  $output .= "</p>\n\n";  
  }   
  echo '<div>' . "\n" . $output . "\n" . '</div></div>' . "\n\n";
}
function display_comments_box() {
  global $post, $comment_boxes, $mod3;
?>
<div class="form-wrap">
<?php
//wp_nonce_field( plugin_basename( __FILE__ ), $mod3 . '_wpnonce', false, true );
$output = '';
 foreach( $comment_boxes as $comment_box) { 
    $data = get_post_meta($post->ID, $mod3, true);  
	
	    $output .= '<p style="border-bottom:1px solid #f1f1f1;padding-bottom:3px;"><div style="width:130px;padding:6px 0 0 5px;font-size:12px;color:#252525; font-style:normal;font-weight:bold;float: left;">' . $comment_box['title'] . ':&nbsp; </div>' . "\n"; 
  if($comment_box['type'] == 'text' || $comment_box['type'] == 'range') { // plain text input
      $output .= '<input type="text" name="' . $comment_box['name'] . '" value="' . (isset($data[$comment_box['name']]) ? $data[$comment_box['name']] : '') . '" style="margin-top:3px;width:' . $comment_box['width'] . ';" />';     
      
      $output .= '<span style="font-size:11px;color:#666; font-style:italic;font-weight:normal;padding-bottom:10px;"> ' .$comment_box['description'] . '</span><br />' . "\n";      
  }else if($comment_box['type'] == 'textarea') { // textarea box
  
      $output .= '<textarea name="' . $comment_box['name'] . '" style="width:' . $comment_box['width'] . '; height:200px">' . (isset($data[$comment_box['name']]) ? $data[$comment_box['name']] : '') . '</textarea>'; 
    } else if(($comment_box['type'] == 'checkbox') && (!empty($comment_box['options']))) { // checkboxes
      foreach($comment_box['options'] as $checkbox_value) { 
         if(is_array($data) && $data[$comment_box['name']] != "") {           $output .= '<input type="checkbox" name="' . $comment_box['name'] . '[]" value="' . $checkbox_value . '" ' . (isset($data[$comment_box['name']]) && (in_array($checkbox_value, $data[$comment_box['name']])) ? ' checked="checked"' : '') . '/> ' . $checkbox_value . ' &nbsp; ' . "\n";	
         } else {  
          $output .= '<input type="checkbox" name="' . $comment_box['name'] . '[]" value="' . $checkbox_value . '"/> ' . $checkbox_value . ' &nbsp; ' . "\n";	
         }
      }		  			
  } else if(($comment_box['type'] == 'radio') && (!empty($comment_box['options']))) { // radio buttons
        
      foreach($comment_box['options'] as $radio_value) {
          $output .= '<p style="padding-bottom:10px;display:inline;font-style:normal;"><input type="radio" name="' . $comment_box['name'] . '" value="' . $radio_value . '" ' . (isset($data[$comment_box['name']]) && ($data[$comment_box['name']] == $radio_value) ? ' checked="checked"' : '') . '/> ' . $radio_value . ' &nbsp; </p>' . "\n";	
      }		  	
  } else if(($comment_box['type'] == 'dropdown') && (!empty($comment_box['options']))) { // dropdown lists
      
    $output .= '<select name="' . $comment_box['name'] . '">' . "\n";
    if (isset($data[$comment_box['name']])) {
        $output .= '<option selected>'. $data[$comment_box['name']] .'</option>' . "\n";	
    }      
		
    foreach($comment_box['options'] as $dropdown_key => $dropdown_value) {
        $output .= '<option value="' . $dropdown_value . '">' . $dropdown_value . '</option>' . "\n";
    }        
    $output .= '</select>' . "\n";		  	
  }
  $output .= "</p>\n\n";  
  } 
  echo '<div>' . "\n" . $output . "\n" . '</div></div>' . "\n\n";
}
add_action( 'admin_menu', 'create_meta_box' );
function save_feat_box( $post_id ) {
    if (!isset($_POST) || count($_POST) == 0) {
      return;
    }
   if ( (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || !isset($_POST['post_ID']) || $post_id != $_POST['post_ID'])
    return $post_id;
  global $post, $featured_post, $feat;
  foreach( $featured_post as $featured_box ) {
    $bDontUpdate = false;
    $data[ $featured_box[ 'name' ] ] = isset($_POST[ $featured_box[ 'name' ] ]) ? $_POST[ $featured_box[ 'name' ] ] : '';
    if (isset($_POST[ $featured_box[ 'name' ] ]) && is_array($_POST[ $featured_box[ 'name' ] ])) {
      $bDontUpdate = true;
      delete_post_meta($post_id, '_' . $featured_box['name']);
      foreach($_POST[ $$featured_box[ 'name' ] ] as $value) {
        add_post_meta($post_id, '_'.$featured_box['name'], $value);
      }
    }
    if(isset($_POST[ $featured_box[ 'name' ] ]) && $featured_box['type'] == 'range' && preg_match('/[\.,]/',$_POST[$feat_box[ 'name' ]])){
      $_POST[$featured_box[ 'name' ]] = preg_replace('/[\.,]/', '', $_POST[$featured_box[ 'name' ]]);
    }
    if (!$bDontUpdate) {
      update_post_meta( $post_id, '_'.$featured_box['name'], isset($_POST[$featured_box[ 'name' ]]) ? $_POST[$featured_box[ 'name' ]] : '' );
    }
  }
//	if ( !wp_verify_nonce( $_POST[ $mod1 . '_wpnonce' ], plugin_basename(__FILE__) ) )
//		return $post_id;
  if ( !current_user_can( 'edit_post', $post_id ))
    return $post_id;
  update_post_meta( $post_id, $feat, $data );
}
add_action( 'save_post', 'save_feat_box' );
function save_meta_box( $post_id ) {
    if (!isset($_POST) || count($_POST) == 0) {
      return;
    }
   if ( (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || !isset($_POST['post_ID']) || $post_id != $_POST['post_ID'])
    return $post_id;
  global $post, $meta_boxes, $mod1;
  foreach( $meta_boxes as $meta_box ) {
    $bDontUpdate = false;
    $data[ $meta_box[ 'name' ] ] = isset($_POST[ $meta_box[ 'name' ] ]) ? $_POST[ $meta_box[ 'name' ] ] : '';
    if (isset($_POST[ $meta_box[ 'name' ] ]) && is_array($_POST[ $meta_box[ 'name' ] ])) {
      $bDontUpdate = true;
      delete_post_meta($post_id, '_' . $meta_box['name']);
      foreach($_POST[ $meta_box[ 'name' ] ] as $value) {
        add_post_meta($post_id, '_'.$meta_box['name'], $value);
      }
    }
    if(isset($_POST[ $meta_box[ 'name' ] ]) && $meta_box['type'] == 'range' && preg_match('/[\.,]/',$_POST[$meta_box[ 'name' ]])){
      $_POST[$meta_box[ 'name' ]] = preg_replace('/[\.,]/', '', $_POST[$meta_box[ 'name' ]]);
    }
    if (!$bDontUpdate) {
      update_post_meta( $post_id, '_'.$meta_box['name'], isset($_POST[$meta_box[ 'name' ]]) ? $_POST[$meta_box[ 'name' ]] : '' );
    }
  }
//	if ( !wp_verify_nonce( $_POST[ $mod1 . '_wpnonce' ], plugin_basename(__FILE__) ) )
//		return $post_id;
  if ( !current_user_can( 'edit_post', $post_id ))
    return $post_id;
  update_post_meta( $post_id, $mod1, $data );
}
add_action( 'save_post', 'save_meta_box' );
function save_features_box( $post_id ) {
    if (!isset($_POST) || count($_POST) == 0) {
      return;
    }
   if ( (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || !isset($_POST['post_ID']) || $post_id != $_POST['post_ID'])
    return $post_id;


   global $post, $feat_boxes, $mod2, $feat;
  
 
  foreach( $feat_boxes as $feat_box ) {
    $bDontUpdate = false;
    $data[ $feat_box[ 'name' ] ] = isset($_POST[ $feat_box[ 'name' ] ]) ? $_POST[ $feat_box[ 'name' ] ] : '';
    if (isset($_POST[ $feat_box[ 'name' ] ]) && is_array($_POST[ $feat_box[ 'name' ] ])) {
      $bDontUpdate = true;
      delete_post_meta($post_id, '_' . $feat_box['name']);
      foreach($_POST[ $feat_box[ 'name' ] ] as $value) {
        add_post_meta($post_id, '_'.$feat_box['name'], $value);
      }
    }
    if(isset($_POST[ $feat_box[ 'name' ] ]) && $feat_box['type'] == 'range' && preg_match('/[\.,]/',$_POST[$feat_box[ 'name' ]])){
      $_POST[$feat_box[ 'name' ]] = preg_replace('/[\.,]/', '', $_POST[$feat_box[ 'name' ]]);
    }
    if (!$bDontUpdate) {
      update_post_meta( $post_id, '_'.$feat_box['name'], isset($_POST[$feat_box[ 'name' ]]) ? $_POST[$feat_box[ 'name' ]] : '' );
    }
  }
  
//	if ( !wp_verify_nonce( $_POST[ $mod2 . '_wpnonce' ], plugin_basename(__FILE__) ) )
//		return $post_id;
  if ( !current_user_can( 'edit_post', $post_id ))
    return $post_id;
  update_post_meta( $post_id, $mod2, $data );
}
add_action( 'save_post', 'save_features_box' );
function generate_years( $from, $to )
{
	$array = array();
	$i = 1;
	for( $number=$from; $number<=$to; $number++ )
	{
		$array[$i] = $number;
		$i++;
		
		$result = array_reverse($array);
		$result_num = array_reverse($array,true);
	

	}
	
	return $result_num;
}

function save_comments_box( $post_id ) {
    if (!isset($_POST) || count($_POST) == 0) {
      return;
    }
   if ( (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || !isset($_POST['post_ID']) || $post_id != $_POST['post_ID'])
    return $post_id;
   global $post, $comment_boxes, $mod3;
 
 foreach( $comment_boxes as $comment_box) { 
    $bDontUpdate = false;
    $data[ $comment_box[ 'name' ] ] = isset($_POST[ $comment_box[ 'name' ] ]) ? $_POST[ $comment_box[ 'name' ] ] : '';
    if (isset($_POST[ $comment_box[ 'name' ] ]) && is_array($_POST[ $comment_box[ 'name' ] ])) {
      $bDontUpdate = true;
      delete_post_meta($post_id, '_' . $comment_box['name']);
      foreach($_POST[ $comment_box[ 'name' ] ] as $value) {
        add_post_meta($post_id, '_'.$comment_box['name'], $value);
      }
    }
	
 if(isset($_POST[ $comment_box[ 'name' ] ]) && $comment_box['type'] == 'range' && preg_match('/[\.,]/',$_POST[$comment_box[ 'name' ]])){
      $_POST[$comment_box[ 'name' ]] = preg_replace('/[\.,]/', '', $_POST[$comment_box[ 'name' ]]);
    }

    if (!$bDontUpdate) {
      update_post_meta( $post_id, '_'.$comment_box['name'], isset($_POST[$comment_box[ 'name' ]]) ? $_POST[$comment_box[ 'name' ]] : '' );
    }
  }
  if ( !current_user_can( 'edit_post', $post_id ))
    return $post_id;
  update_post_meta( $post_id, $mod3, $data );
}
add_action( 'save_post', 'save_comments_box' );
function meta_box_craigslist()
{                                      
    add_meta_box( 'craigslist-meta-box', 
                  'Craigslist Code Generator:',     
                  'meta_box_callback', 
                  'gtcd',              
                  'normal', 
                  'low' );  
}
add_action( 'admin_menu', 'meta_box_craigslist' );
function meta_box_callback( $post )
{	global $options;$fields;$options2;$options3;$symbols;
			  $fields = get_post_meta($post->ID, 'mod1', true);
			  $symbols = get_option('gorilla_symbols');
    $values = get_post_custom( $post->ID );
    $selected = isset( $values['meta_box_craigslist_embed'] ) ? $values['meta_box_craigslist_embed'][0] : '';

    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );?> 
<p style="border-bottom:1px solid #f1f1f1;padding-bottom:3px;"><div style="height:200px;width:130px;padding:6px 0 0 5px;font-size:12px;color:#252525; font-style:normal;font-weight:bold;float: left;"><?php _e('Craigslist Code:','language');?><br/><br/><span
 style="font-weight:normal!important;font-size:11px;margin-top:15px;font-style:italic;"><?php echo _e('Copy & Paste the generated code into your Craigslist ad.','language');?></span></div></p>
<textarea name="meta_box_craigslist_embed" id="meta_box_craigslist_embed" style="width:80%;height:300px;" ><table border="0" cellspacing="2" cellpadding="2" width="750" bgcolor="#ffffff"><tbody><tr><td align="center"><h1><?php if ( $fields['year']){ echo $fields['year']; echo ' ';}else {  echo ''; }?><?php the_title();?></h1><hr /><table border="0" cellspacing="2" cellpadding="2" width="750" align="center"><tbody><tr align="center"><td></td><td align="center"><b><?php _e('Contact:','language');?></b> <?php echo $symbols['phone']; ?></td><td align="center"></td><td></td></tr></tbody></table></td></tr><tr><td align="center"><table border="0" cellspacing="2" cellpadding="2" width="500"><tbody><tr><td></td><td><ul><?php if ( $fields['price']){ echo '<li>'.$options['pricetext'].': '.$symbols['currency']; echo $fields['price'].'</li>';}else {  echo ''; } ?><?php	if ( $fields['miles']){ echo '<li>'.$options['milestext'].': '.$fields['miles'].'</li>';}else {  echo ''; }?><?php if ( $fields['vehicletype']){ echo '<li>'.$options['vehicletypetext'].': '.$fields['vehicletype'].'</li>';}else {  echo ''; }?><?php if ( $fields['drive']){ echo '<li>'.$options['drivetext'].': '.$fields['drive'].'</li>';}else {  echo ''; }?><?php if ( $fields['transmission']){ echo '<li>'.$options['transmissiontext'].': '.$fields['transmission'].'</li>';}else {  echo ''; }?></ul></td><td><ul><?php if ( $fields['exterior']){ echo '<li>'.$options['exteriortext'].': '.$fields['exterior'].'</li>';}else {  echo ''; }?><?php if ( $fields['interior']){ echo '<li>'.$options['interiortext'].':'.$fields['interior'].'</li>';}else {  echo ''; }?><?php	if ( $fields['epamileage']){ echo '<li>'.$options['epamileagetext'].': '.$fields['epamileage'].'</li>';}else {  echo ''; }?><?php if ( $fields['stock']){ echo '<li>'.$options['stocktext'].': '.$fields['stock'].'</li>';}else {  echo ''; }?><?php if ( $fields['vin']){ echo '<li>'.$options['vintext'].': '.$fields['vin'].'</li>';}else {  echo ''; }?></ul></td><td></td></tr></tbody></table></td></tr><tr><td align="center"><br/><br/></td></tr><tr><td><p><b><?php _e('Description','language');?></b></p><p></p><p><?php $trim_length = 200;$values = get_post_meta($post->ID, 'mod3', true);foreach($values as $value) {add_filter( 'custom_filter', 'wpautop' );echo apply_filters( 'custom_filter', $value );} ?><p><b><?php _e('Features','language');?></b></p><p></p><?php	if (get_the_terms($post->ID, 'features')) {$taxonomy = get_the_terms($post->ID, 'features');foreach ($taxonomy as $taxonomy_term) {?><li style="float: left;position: relative;overflow: hidden;width: 207px;padding: 10px 0px;padding-left: 24px;margin: 0px 4px 0 4px;font-size: 14px;border-bottom: 1px dotted grey;font-weight:bold;"><?php echo $taxonomy_term->name;?></li><?php } } ?><br/></p></p></td></tr><td align="center"><br/></td></tbody></table></textarea><?php }
add_action( 'save_post', 'meta_box_craigslist_save' );
function meta_box_craigslist_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;

    // now we can actually save the data
    $allowed = array( 
        'a' => array( // on allow a tags
            'href' => array() // and those anchords can only have href attribute
        )
    );

    // Probably a good idea to make sure your data is set

    if( isset( $_POST['meta_box_craigslist_embed'] ) )
        update_post_meta( $post_id, 'meta_box_craigslist_embed', $_POST['meta_box_craigslist_embed'] );
}

//New functions for Gallery
	// Check field upload and add needed actions
	add_action('wp_ajax_rw_delete_file', 'delete_file');		// ajax delete files
	add_action('wp_ajax_rw_save_gallery', 'save_gallery');		// ajax save gallery	
	add_action('wp_ajax_rw_reorder_images', 'reorder_images');	// ajax reorder images

function save_gallery() {
		if (!isset($_POST['post_id'])) die('1');
		if (!wp_verify_nonce($_POST['nonce'], 'AddGalImage')) die('1');
		
		$All_IDS = explode(',',$_POST['Gallery_IDs']);
		$All_IDS = array_unique($All_IDS);
				
		foreach( $All_IDS as $key=>$val ){
			if (intval($val)==0){
				unset($All_IDS[$key]);
			}else{
				wp_update_post( array(
						'ID' => $val,
						'post_parent' => $_POST['post_id']
					)
				);				
			}
		}		
		$All_IDS = implode(',',$All_IDS);
		
		update_post_meta($_POST['post_id'], 'CarsGallery', $All_IDS);
		global $field;
		//wp_delete_attachment($_POST['image_id']);
		$saved = get_post_custom_values('CarsGallery', $_POST['post_id']);
		$saved = explode(',',$saved[0]);
		//Get gallery images from posts table
		if (count($saved)>0){
			foreach( $saved as $image ){
				if(intval($image)>0){
				$AllImages[] = $image;
				$attachmentimage=wp_get_attachment_image($image, 'admin');
				$tmp2='{'.$field['id'].'}[]';
				echo '<li id="item_'.$image.'">'.$attachmentimage.'<a class="delete" href="#" onClick="deletePost('.$image.')" >Delete</a>
				<input type="hidden" name="'.$tmp2.'" value="'.$tmp2.'" />
				</li>';
				}
			}
		}
		die();
	}
	function save_gallery_user() {
		if (!isset($_POST['post_id'])) die('1');
		if (!wp_verify_nonce($_POST['nonce'], 'AddGalImage')) die('1');
		
		$All_IDS = explode(',',$_POST['Gallery_IDs']);
		$All_IDS = array_unique($All_IDS);
				
		foreach( $All_IDS as $key=>$val ){
			if (intval($val)==0){
				unset($All_IDS[$key]);
			}else{
				wp_update_post( array(
						'ID' => $val,
						'post_parent' => $_POST['post_id']
					)
				);				
			}
		}		
		$All_IDS = implode(',',$All_IDS);
		
		update_post_meta($_POST['post_id'], 'CarsGallery', $All_IDS);
		global $field;
		//wp_delete_attachment($_POST['image_id']);
		$saved = get_post_custom_values('CarsGallery', $_POST['post_id']);
		$saved = explode(',',$saved[0]);
		//Get gallery images from posts table
		if (count($saved)>0){
			foreach( $saved as $image ){
				if(intval($image)>0){
				$AllImages[] = $image;
				$attachmentimage=wp_get_attachment_image($image, 'admin');
				$tmp2='{'.$field['id'].'}[]';
				echo '<li id="item_'.$image.'">'.$attachmentimage.'<a class="delete" href="#" onClick="deletePost('.$image.')" >Delete</a>
				<input type="hidden" name="'.$tmp2.'" value="'.$tmp2.'" />
				</li>';
				}
			}
		}
		die();
	}

		
	function delete_file() {
		if (!isset($_POST['image_id'])) die('1');
		if (!isset($_POST['postid'])) die('1');		
		if (!wp_verify_nonce($_POST['nonce'], 'DelGalImage')) die('1');
		$saved = get_post_custom_values('CarsGallery', $_POST['postid']);
		$saved = explode(',',$saved[0]);
		$saved = array_unique($saved);
				
		foreach($saved as $key => $val){
			if ($val == $_POST['image_id']){
				unset($saved[$key]);			
				$saved = implode(',',$saved);
				update_post_meta($_POST['postid'], 'CarsGallery', $saved);			
				//wp_delete_attachment($_POST['image_id']);
				die('0');				
			}
		}
	}
	function delete_file_user() {
		if (!isset($_POST['image_id'])) die('1');
		if (!isset($_POST['postid'])) die('1');		
		if (!wp_verify_nonce($_POST['nonce'], 'DelGalImage')) die('1');
		$saved = get_post_custom_values('CarsGallery', $_POST['postid']);
		$saved = explode(',',$saved[0]);
		$saved = array_unique($saved);
				
		foreach($saved as $key => $val){
			if ($val == $_POST['image_id']){
				unset($saved[$key]);			
				$saved = implode(',',$saved);
				update_post_meta($_POST['postid'], 'CarsGallery', $saved);			
				//wp_delete_attachment($_POST['image_id']);
				die('0');				
			}
		}
	}
	
	// Ajax callback for reordering images
	function reorder_images() {
		if (!isset($_POST['data'])) die();
		list($order, $post_id, $key, $nonce) = explode('|',$_POST['data']);
		if (!wp_verify_nonce($nonce, 'rw_ajax_reorder')) die('1');
		parse_str($order, $items);
		$items['item'] = array_unique($items['item']);
		$items = implode(',',$items['item']);
		update_post_meta($post_id, 'CarsGallery', $items);					
		die('0');
	}

// Ajax callback for reordering images
	function reorder_images_user() {
		if (!isset($_POST['data'])) die();
		list($order, $post_id, $key, $nonce) = explode('|',$_POST['data']);
		if (!wp_verify_nonce($nonce, 'rw_ajax_reorder')) die('1');
		parse_str($order, $items);
		$items['item'] = array_unique($items['item']);
		$items = implode(',',$items['item']);
		update_post_meta($post_id, 'CarsGallery', $items);					
		die('0');
	}

		
add_action('add_meta_boxes', 'add');
$types = array( 'user_listing', 'gtcd' );
function add() {
add_meta_box( 'gallery', __('Photo Gallery','language'), 'show','gtcd', 'normal', 'high' );
}


add_action('add_meta_boxes', 'add_user_gallery');
function add_user_gallery() {
add_meta_box( 'gallery_user', __('Photo Gallery','language'), 'show_user','user_listing', 'normal', 'high' );
}
	function show(){
		global $wpdb, $post, $AllImages, $field;
		$meta='';
		$size='small';
		$nonce_sort = wp_create_nonce('rw_ajax_reorder');	
		wp_nonce_field(basename(__FILE__), 'rw_meta_box_nonce');
		$blogurl = get_bloginfo('template_url');
		$saved = get_post_custom_values('CarsGallery', get_the_ID());
		$saved = explode(',',$saved[0]);
		$saved = array_unique($saved);
		$all_li = '';
		foreach( $saved as $image ){
			$image = intval($image);
			if ($image>0){							
			$AllImages[] = $image;
			$attachmentimage=wp_get_attachment_image($image, 'admin');
			$tmp2='{'.$field['id'].'}[]';
			$all_li .= '<li id="item_'.$image.'">'.$attachmentimage.'<a class="delete" href="#" onClick="deletePost('.$image.')" >Delete</a>
				<input type="hidden" name="'.$tmp2.'" value="'.$tmp2.'" />
				</li>';
			}
		}
				
		?>
            <div style="height:30px !important;" >
            <?php if(count($AllImages)>0){
				$AllImagesImp = implode(',',$AllImages);
				?>
            	<div class="messagebox" id="messageBox">
					Images in gallery: <?php echo count($AllImages); ?> images
                </div>
            <?php }else{
				$AllImagesImp ='';
				?>
            	<div class="messagebox" id="messageBox" style="display:none;">					
                </div>
            <?php 						
				}
			?>
            </div>                
        <?php
		echo '<table class="form-table">';
		echo '<tr><td style="padding:0px !important">';		
		echo "<input type='hidden' class='rw-images-data' value='{$post->ID}|{$field['id']}|$nonce_sort' />";			
		//Get gallery images from posts table
		?>
        <ul class="rw-images rw-upload" id="rw-images-<?php echo $field['id'];?>">
        <?php
			echo $all_li;
		?>
        </ul>        
        <?php
		echo "</td></tr>";
		echo '</table>';
        echo '<div id="tgm-new-media-settings">';
        echo '<p><a href="#" class="tgm-open-media button button-primary" title="' . 
		esc_attr__( 'Upload Images', 'language' ) . '">' . __( 'Upload Images', 'language' ) . '</a></p>';
        echo '<input type="hidden" name="CarsGallery" id="tgm-new-media-image" size="70" value="' . $AllImagesImp . '" />';
        echo '</div>';						
	}

	
	function show_user(){
		global $wpdb, $post, $AllImages, $field;
		if ( $images = get_children(array(
		'post_parent' => get_the_ID(),
		'post_type' => 'attachment',
		'order' => 'ASC',
		'orderby' => 'menu_order',
		'post_mime_type' => 'image',
		)))
	{		foreach( $images as $image ) {
		
			$attachmenturl=wp_get_attachment_url($image->ID);
			$attachmentlink=wp_get_attachment_url($image->ID);
			$attachmentimage= wp_get_attachment_image($image->ID, 'admin' );
			$img_title = $image->post_title;
			$img_desc = $image->post_excerpt;
			
			?>
			 <ul class="user-images">
        <?php
			echo '<li>'.$attachmentimage.'</li>';
		?>
        </ul>  	
			<?php
						
						
		}
	} else {
		echo "";
}	
				
		?>
            <div style="height:30px !important;" >
            <?php if(count($AllImages)>0){
				$AllImagesImp = implode(',',$AllImages);
				?>
            	<div class="messagebox" id="messageBox">
					Images in gallery: <?php echo count($AllImages); ?> images
                </div>
            <?php }else{
				$AllImagesImp ='';
				?>
            	<div class="messagebox" id="messageBox" style="display:none;">					
                </div>
            <?php 						
				}
			?>
            </div>                
        <?php
		echo '<table class="form-table">';
		echo '<tr><td style="padding:0px !important">';		
		echo "<input type='hidden' class='rw-images-data' value='{$post->ID}|{$field['id']}|$nonce_sort' />";			
		//Get gallery images from posts table
		?>
        <ul class="rw-images rw-upload" id="rw-images-<?php echo $field['id'];?>">
        <?php
			echo $all_li;
		?>
        </ul>        
        <?php
		echo "</td></tr>";
		echo '</table>';
        echo '<div id="tgm-new-media-settings">';
        echo '<p><a href="#" class="tgm-open-media button button-primary" title="' . 
		esc_attr__( 'Add - Delete Images', 'language' ) . '">' . __( 'Add - Delete Images', 'language' ) . '</a></p>';
        echo '<input type="hidden" name="CarsGallery" id="tgm-new-media-image" size="70" value="' . $AllImagesImp . '" />';
        echo '</div>';						
	}
		
add_action( 'admin_enqueue_scripts', 'assets');
function assets() {
  //if ( ! ( 'post' == get_current_screen()->base && 'page' == get_current_screen()->id ) )
	//  return;
  // This function loads in the required media files for the media manager.
  wp_enqueue_media();
  wp_register_script( 'tgm-nmp-media', get_bloginfo('template_url') . '/media.js', array( 'jquery' ), '1.0.0', true );
  wp_localize_script( 'tgm-nmp-media', 'tgm_nmp_media',
	  array(
		  'title'     => __( 'Upload or Choose Your Custom Image File', 'language' ),
		  'button'    => __( 'Insert Image into Input Field', 'language' ) 
	  )
  );
  wp_enqueue_script( 'tgm-nmp-media' );
}
?>