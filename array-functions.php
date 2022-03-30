<?php

function get_ProductIDArray($product_type,$count=-1) {
	$productIDs = get_posts(array(
		'fields'     		=> 'ids',
		'numberposts'  	=> $count,
		'post_type' 		=> 'products',
		'product-type' 	=> $product_type
	));
	// returns array(product IDs) 	
	return $productIDs;
} // Returns array(post_ids)

function get_PostIDArray($category,$count=-1) {
	$postIDs = get_posts(array(
		'fields'      	=> 'ids',
		'numberposts' 	=> $count,
		'orderby' 			=> 'date', 
		'post_type' 		=> 'post',
		'category_name' => $category
	));
	// returns array(product IDs) 	
	return $postIDs;
} // Returns array(post_ids)

function get_CategoryColor($category_slug,$o1=80,$o2=90) {
  switch($category_slug) {
    case 'cameras':
    case 'indoor-cameras': 
    case 'indoor-outdoor-cameras': 
    case 'outdoor-cameras':
    	return "rgba(5,91,166, 0.$o1), rgba(0,0,0, 0.$o2)";
      break;
    case 'climate-control':
    case 'air-conditioners':
    case 'air-purifiers':
    case 'fans':
    case 'heaters':
    case 'humidifiers':
    case 'thermostats':
      return "rgba(255,69,0, 0.$o1), rgba(0,0,0, 0.$o2)";
      break;
    case 'doorbells-and-locks':
    case 'doorbells':
    case 'locks':
      return "rgba(127,255,212, 0.$o1), rgba(0,0,0, 0.$o2)";
      break;
    case 'home-entertainment':
    case 'frames':
    case 'projectors':
    case 'speakers':
    case 'streaming':
    case 'televisions':
      return "rgba(128,0,128, 0.$o1), rgba(0,0,0, 0.$o2)";
      break;
    case 'kitchen':
    case 'air-fryers':
    case 'microwaves':
    case 'sous-vide':
    case 'meat-thermometers':
      return "rgba(139,0,0, 0.$o1), rgba(0,0,0, 0.$o2)";
      break;
    case 'lawn-and-garden':
    case 'lawnmowers':
    case 'sprinklers':
    case 'weather-stations':
      return "rgba(0,100,0, 0.$o1), rgba(0,0,0, 0.$o2)";
      break;
    case 'lighting':
    case 'light-bars':
    case 'light-bulbs':
    case 'lightstrips':
    case 'switches':
      return "rgba(218,165,32, 0.$o1), rgba(0,0,0, 0.$o2)";
      break;
    case 'other':
    case 'beds':
    case 'garage-door-openers':
    case 'notebooks':
    case 'outlets':
    case 'scales':
    case 'sensors-and-detectors':
      return "rgba(186,85,211, 0.$o1), rgba(0,0,0, 0.$o2)";
      break;
    case 'pets':
		case 'pet-camera':
    case 'pet-cameras':
    case 'feeders':
    case 'toys':
    case 'treat-dispensers':
      return "rgba(0,206,209, 0.$o1), rgba(0,0,0, 0.$o2)";
      break;
    case 'security-systems':
      return "rgba(242,140,15, 0.$o1), rgba(0,0,0, 0.$o2)";
      break;
    case 'vacuums-and-mops':
    case 'mops':
    case 'vacuum-mop-combos':
    case 'vacuums':
      return "rgba(255,99,71, 0.$o1), rgba(0,0,0, 0.$o2)";
      break;
    case 'voice-assistants-and-hubs':
    case 'hubs':
    case 'voice-assistants':
      return "rgba(25,25,112, 0.$o1), rgba(0,0,0, 0.$o2)";
      break;
    case 'wifi-and-networking':
    case 'mesh-wifi':
    case 'wifi-extenders':
    case 'wifi-routers':
      return "rgba(32,178,170, 0.$o1), rgba(0,0,0, 0.$o2)";
      break;
  }
}

function get_MultiplierID($product_type) {
	$multiplierID = get_posts(array(
		'fields'          => 'ids',
		'numberposts'  => 1,
		'post_type' => 'feature-values',
		'feature-value-category' => $product_type
	));
	// returns int(featureID)
	return $multiplierID[0];
} // Returns int(post_id)

function get_FieldArray($product_type, $field_group='all') {
  switch($product_type) {
		case 'sous-vide':
			$hardware = array(
				"power", 
				"voltage", 
				"hertz", 
				"height", 
				"tube_diameter", 
				"weight", 
				"length_of_power_cord", 
				"set_flow_direction_manually", 
				"360_directional_pump"
			);
			$performance = array(
				"maximum_temperature_f", 
				"minimum_temperature_f", 
				"temperature_setting_smallest_increment_f", 
				"flow_rate_pump", 
				"motor_speed", 
				"max_water_capacity", 
				"max_water_line", 
				"min_water_line", 
				"minimum_container_depth", 
				"noise_level"
			);
			$design = array(
				"maximum_clamp_opening", 
				"adjustable_height_clamp", 
				"detachable_height_clamp", 
				"digital_display", 
				"manual_temperature_calibration", 
				"built-in_refrigeration", 
				"removable_skirt_bottom_cap", 
				"color"
			);
			$durability = array(
				"upper_tube_material_for_handling", 
				"lower_tube_material_for_cooking", 
				"max_single_cook_time_hrs", 
				"water_splash_resistance", 
				"low_water-level_alarm", 
				"low_water-level_shut-off", 
				"warranty"
			);
			$usability = array(
				"manual_controls", 
				"buttons", 
				"can_operate_in_celsius", 
				"alert_sounds", 
				"has_timer", 
				"delay_timer_scheduling", 
				"time_setting_smallest_interval", 
				"automatic_shut-down", 
				"connection", 
				"ios_app", 
				"android_app", 
				"taste_learner"
			);

    	$select_arr = strtolower($field_group);
			switch($select_arr) {
      	case 'hardware':
        	return $hardware;
        	break;
      	case 'performance':
        	return $performance;
        	break;
      	case 'design':
        	return $design;
        	break;
      	case 'durability':
        	return $durability;
        	break;
      	case 'usability':
        	return $usability;
        	break;
      	case 'all':
        	$merge = array_merge($hardware, $performance, $design, $durability, $usability);
        	return $merge;
        	break;
    	}
			break;
		case 'pet-cameras':
			$technical = array(
				'video_resolution', 
				'frames_per_second', 
				'fov', 
				'rotation_range', 
				'internet_connectivity', 
				'power', 
				'battery_back_up'
			);
			$alerts = array(
				'motion_alerts', 
				'sound_alerts', 
				'bark_meowing_notifications', 
				'motion_zones', 
				'pet_detection', 
				'movement_auto_tracking', 
				'siren'
			);
			$storage = array(
				'local_storage', 
				'cloud_storage', 
				'24_7_non_stop_recording', 
				'subscription', 
				'nas_support'
			);
			$features = array(
				'zoom', 
				'night_vision', 
				'two_way_audio', 
				'live_view', 
				'laser_for_playing', 
				'alexa_compatibility', 
				'google_assistant_compatibility', 
				'homekit_compatibility', 
				'in_app_vet_chat', 
				'time_lapse', 
				'snapshot_notifications', 
				'home_and_away_modes'
			);
			$design = array(
				'dimensions', 
				'color', 
				'mounting_options', 
				'usage', 
				'warranty'
			);

			$select_arr = strtolower($field_group);
			switch($select_arr) {
				case 'technical':
					return $technical;
					break;
				case 'alerts':
					return $alerts;
					break;
				case 'storage':
					return $storage;
					break;
				case 'features':
					return $features;
					break;
				case 'design':
					return $design;
					break;
				case 'all':
					$merge = array_merge($technical, $alerts, $storage, $features, $design);
					return $merge;
					break;
			break;
    }
	}	
} // Returns array($features)

function getNonBarList($product_type) {
  if ($product_type=='sous-vide') {
    return array('voltage', 'hertz', 'set_flow_direction_manually', 'max_water_line', 'adjustable_height_clamp', 'detachable_height_clamp', 'digital_display', 'manual_temperature_calibration', 'built-in_refrigeration', 'removable_skirt_bottom_cap', 'color', 'low_water-level_alarm', 'low_water-level_shut-off', 'manual_controls', 'can_operate_in_celsius', 'alert_sounds', 'has_timer', 'delay_timer_scheduling', 'automatic_shut-down', 'ios_app', 'android_app', 'taste_learner');
  } else if ($product_type=='pet-cameras') {
		return array('two_way_audio', 'live_view', 'laser_for_playing', 'alexa_compatibility', 'google_assistant_compatibility', 'homekit_compatibility', 'in_app_vet_chat', 'time_lapse', 'snapshot_notifications', 'home_and_away_modes', 'color', 'dimensions', 'nas_support', 'motion_alerts', 'sound_alerts', 'bark_meowing_notifications', 'motion_zones', 'movement_auto_tracking', 'siren', 'battery_back_up');
	} else {
		echo "Something's wrong...";
	}
} // Returns array(features_that_arent_displayed_as_bars)

function getFeatureGroupNames($product_type) {
  if ($product_type=='sous-vide') {
    return array('Hardware', 'Performance', 'Design', 'Durability', 'Usability');
  } else if ($product_type=='pet-cameras') {
    return array('Technical', 'Alerts', 'Storage', 'Features', 'Design');
	}
} // Returns array(names)

// // Product Type => Field Settings Array
// $arr[$field_Name][#] | isScored[0], inBetterList[1], isBetterPhrase[2], isBar[3]  
function get_FieldSettings($product_type) {
  switch($product_type) {
    case 'sous-vide':
      return array(
        'power'=>array(1, 1, 'Has more power', 1),
        'voltage'=>array(0, 0, 0, 0),
        'hertz'=>array(0, 0, 0, 0),
        'height'=>array(1, 1, 'Is shorter (height)', 1),
        'tube_diameter'=>array(1, 1, 'Has a smaller heating tube diameter', 1),
        'weight'=>array(1, 1, 'Is lighter (weight)', 1),
        'length_of_power_cord'=>array(1, 1, 'Has a longer power cord', 1),
        'set_flow_direction_manually'=>array(1, 1, 'Lets you manually set the flow direction', 0),
        '360_directional_pump'=>array(1, 1, 'Has a 360° pump', 1),
        'maximum_temperature_f'=>array(1, 1, 'Has a higher max temp', 1),
        'minimum_temperature_f'=>array(1, 1, 'Has a lower min temp', 1),
        'temperature_setting_smallest_increment_f'=>array(1, 1, 'Has a more precise temp setting', 1),
        'flow_rate_pump'=>array(1, 1, 'Has a higher flow rate', 1),
        'motor_speed'=>array(1, 1, 'Has a stronger motor speed', 1),
        'max_water_capacity'=>array(1, 1, 'Can heat a higher max water capacity', 1),
        'max_water_line'=>array(0, 0, 0, 0),
        'min_water_line'=>array(1, 1, 'Requires a lower water capacity', 1),
        'minimum_container_depth'=>array(1, 1, 'Requires a smaller container depth', 1),
        'noise_level'=>array(1, 1, 'Has a lower noise level', 1),
        'maximum_clamp_opening'=>array(1, 1, 'Has a larger clamp opening', 1),
        'adjustable_height_clamp'=>array(1, 1, 'Has an adjustable height clamp', 0),
        'detachable_height_clamp'=>array(1, 1, 'Has a detachable height clamp', 0),
        'digital_display'=>array(1, 1, 'Has a digital display', 0),
        'manual_temperature_calibration'=>array(1, 1, 'Can be calibrated manually', 0),
        'built-in_refrigeration'=>array(1, 1, 'Has built-in refrigeration', 0),
        'removable_skirt_bottom_cap'=>array(1, 1, 'Bottom section can be removed for cleaning', 0),
        'color'=>array(0, 0, 0, 0),
        'upper_tube_material_for_handling'=>array(1, 0, 0, 1),
        'lower_tube_material_for_cooking'=>array(1, 1, 'Has a more durable heating tube material', 1),
        'max_single_cook_time_hrs'=>array(1, 1, 'Has a longer consecutive max cook time', 1),
        'water_splash_resistance'=>array(1, 1, 'Has a better water & splash resistance', 1),
        'low_water-level_alarm'=>array(1, 1, 'Has a low water-level alarm', 0),
        'low_water-level_shut-off'=>array(1, 1, 'Has an automatic, )low-water-level shutdown', 0),
        'warranty'=>array(1, 1, 'Has a longer warranty', 1),
        'manual_controls'=>array(1, 1, 'Has manual controls', 0),
        'buttons'=>array(1, 0, 0, 1),
        'can_operate_in_celsius'=>array(1, 1, 'Can operate in Celsius', 0),
        'alert_sounds'=>array(1, 1, 'Has alert sounds', 0),
        'has_timer'=>array(1, 1, 'Has a timer', 0),
        'delay_timer_scheduling'=>array(1, 1, 'Can set a timer delay', 0),
        'time_setting_smallest_interval'=>array(1, 1, 'Has a more precise time setting', 1),
        'automatic_shut-down'=>array(1, 1, 'Has automatic shutdown after timer ends', 0),
        'connection'=>array(1, 0, 0, 1),
        'ios_app'=>array(1, 0, 0, 0),
        'android_app'=>array(1, 0, 0, 0),
        'taste_learner'=>array(1, 1, 'Has a Taste Learner', 0)
      );
      break;
    case 'pet-cameras':
      return array(
        'video_resolution'=>array(1, 1, 'Has better resolution', 1),
        'frames_per_second'=>array(1, 1, 'Has more frames-per-second', 1),
        'fov'=>array(1, 1, 'Has a better field of view', 1),
        'rotation_range'=>array(1, 1, 'Has a better rotation range', 1),
        'internet_connectivity'=>array(1, 1, 'Has better connectivity', 1),
        'power'=>array(0, 0, 0, 0),
        'battery_back_up'=>array(1, 1, 'Has a battery back-up', 0),
        'motion_alerts'=>array(1, 1, 'Has motion alerts', 1),
        'sound_alerts'=>array(1, 1, 'Has sound alerts', 1),
        'bark_meowing_notifications'=>array(1, 1, 'Has notifications for barking/meowing', 1),
        'motion_zones'=>array(1, 1, 'Has motion zones', 0),
        'pet_detection'=>array(1, 1, 'Can detect pets', 1),
        'movement_auto_tracking'=>array(1, 1, 'Has auto-tracking for movement', 0),
        'siren'=>array(1, 1, 'Has a siren', 0),
        'local_storage'=>array(1, 1, 'Has local storage', 1),
        'cloud_storage'=>array(1, 1, 'Has cloud storage', 1),
        '24_7_non_stop_recording'=>array(1, 1, 'Can record 24/7', 1),
        'subscription'=>array(1, 0, 0, 1),
        'nas_support'=>array(1, 1, 'Has NAS support', 0),
        'zoom'=>array(1, 1, 'Has better zoom', 1),
        'night_vision'=>array(1, 1, 'Has better night vision', 1),
        'two_way_audio'=>array(1, 1, 'Has two-way audio', 0),
        'live_view'=>array(1, 1, 'Has live view', 0),
        'laser_for_playing'=>array(1, 1, 'Has toy laser', 0),
        'alexa_compatibility'=>array(1, 0, 0, 0),
        'google_assistant_compatibility'=>array(1, 0, 0, 0),
        'homekit_compatibility'=>array(1, 0, 0, 0),
        'in_app_vet_chat'=>array(1, 1, 'Has in-app vet chat', 0),
        'time_lapse'=>array(1, 1, 'Has time lapse', 0),
        'snapshot_notifications'=>array(1, 1, 'Has snapshot notifications', 0),
        'home_and_away_modes'=>array(1, 1, 'Has home/away modes', 0),
        'dimensions'=>array(0, 0, 0, 0),
        'color'=>array(0, 0, 0, 0),
        'mounting_options'=>array(1, 0, 0, 0),
        'usage'=>array(1, 1, 'Has better usage options', 1),
        'warranty'=>array(1, 1, 'Has better warranty', 1)
    );
      break;
  }
}


function get_BetterPhrasesArray($product_type) {
  switch($product_type) {
    case 'sous-vide':
      return array(
        'power'=>'Has more power', 
        'voltage'=>'VOLTAGE', 
        'hertz'=>'HERTZ', 
        'height'=>'Is shorter (height)', 
        'tube_diameter'=>'Has a smaller heating tube diameter', 
        'weight'=>'Is lighter (weight)', 
        'length_of_power_cord'=>'Has a longer power cord', 
        'set_flow_direction_manually'=>'Lets you manually set the flow direction', 
        '360_directional_pump'=>'Has a 360° pump', 
        'maximum_temperature_f'=>'Has a higher max temp', 
        'minimum_temperature_f'=>'Has a lower min temp', 
        'temperature_setting_smallest_increment_f'=>'Has a more precise temp setting', 
        'flow_rate_pump'=>'Has a higher flow rate', 
        'motor_speed'=>'Has a stronger motor speed', 
        'max_water_capacity'=>'Can heat a higher max water capacity', 
        'max_water_line'=>'MAX WATER LINE', 
        'min_water_line'=>'Requires a lower water capacity', 
        'minimum_container_depth'=>'Requires a smaller container depth', 
        'noise_level'=>'Has a lower noise level', 
        'maximum_clamp_opening'=>'Has a larger clamp opening', 
        'adjustable_height_clamp'=>'Has an adjustable height clamp', 
        'detachable_height_clamp'=>'Has a detachable height clamp', 
        'digital_display'=>'Has a digital display', 
        'manual_temperature_calibration'=>'Can be calibrated manually', 
        'built-in_refrigeration'=>'Has built-in refrigeration', 
        'removable_skirt_bottom_cap'=>'Bottom section can be removed for cleaning', 
        'color'=>'COLOR', 
        'upper_tube_material_for_handling'=>'UPPERTUBE', 
        'lower_tube_material_for_cooking'=>'Has a more durable heating tube material', 
        'max_single_cook_time_hrs'=>'Has a longer consecutive max cook time', 
        'water_splash_resistance'=>'Has a better water & splash resistance', 
        'low_water-level_alarm'=>'Has a low water-level alarm', 
        'low_water-level_shut-off'=>'Has an automatic, low-water-level shutdown', 
        'warranty'=>'Has a longer warranty', 
        'manual_controls'=>'Has manual controls', 
        'buttons'=>'BUTTONS', 
        'can_operate_in_celsius'=>'Can operate in Celsius', 
        'alert_sounds'=>'Has alert sounds', 
        'has_timer'=>'Has a timer', 
        'delay_timer_scheduling'=>'Can set a timer delay', 
        'time_setting_smallest_interval'=>'Has a more precise time setting', 
        'automatic_shut-down'=>'Has automatic shutdown after timer ends', 
        'connection'=>'CONNECTION', 
        'ios_app'=>'IOS APP', 
        'android_app'=>'ANDROID APP', 
        'taste_learner'=>'Has a Taste Learner'
      );
      break;
    case 'pet-cameras':
      return array(
        'video_resolution'=>'Has better resolution', 
        'frames_per_second'=>'Has more frames-per-second', 
        'fov'=>'Has a better field of view', 
        'rotation_range'=>'Has a better rotation range', 
        'internet_connectivity'=>'Has better connectivity', 
        'power'=>'POWER', 
        'battery_back_up'=>'Has a battery back-up', 
        'motion_alerts'=>'Has motion alerts', 
        'sound_alerts'=>'Has sound alerts', 
        'bark_meowing_notifications'=>'Has notifications for barking/meowing', 
        'motion_zones'=>'Has motion zones', 
        'pet_detection'=>'Can detect pets', 
        'movement_auto_tracking'=>'Has auto-tracking for movement', 
        'siren'=>'Has a siren', 
        'local_storage'=>'Has local storage', 
        'cloud_storage'=>'Has cloud storage', 
        '24_7_non_stop_recording'=>'Can record 24/7', 
        'subscription'=>'SUBSCRIPTION', 
        'nas_support'=>'Has NAS support', 
        'zoom'=>'Has better zoom', 
        'night_vision'=>'Has better night vision', 
        'two_way_audio'=>'Has two-way audio', 
        'live_view'=>'Has live view', 
        'laser_for_playing'=>'Has toy laser', 
        'alexa_compatibility'=>'ALEXA', 
        'google_assistant_compatibility'=>'GOOGLEASSISTANT', 
        'homekit_compatibility'=>'HOMEKIT', 
        'in_app_vet_chat'=>'Has in-app vet chat', 
        'time_lapse'=>'Has time lapse', 
        'snapshot_notifications'=>'Has snapshot notifications', 
        'home_and_away_modes'=>'Has home/away modes', 
        'dimensions'=>'DIMENSIONS', 
        'color'=>'COLOR', 
        'mounting_options'=>'MOUNTING OPTIONS', 
        'usage'=>'Has better usage options', 
        'warranty'=>'Has better warranty' 
    );
      break;
  }
}

function getNonBetterThanResponses($product_type) {
  if ($product_type=='sous-vide') {
    return array('Has more power', 'VOLTAGE', 'HERTZ', 'Is shorter (height)', 'Has a smaller heating tube diameter', 'Is lighter (weight)', 'Has a longer power cord', 'Lets you manually set the flow direction', 'Has a 360° pump', 'Has a higher max temp', 'Has a lower min temp', 'Has a more precise temp setting', 'Has a higher flow rate', 'Has a stronger motor speed', 'Can heat a higher max water capacity', 'MAX WATER LINE', 'Requires a lower water capacity', 'Requires a smaller container depth', 'Has a lower noise level', 'Has a larger clamp opening', 'Has an adjustable height clamp', 'Has a detachable height clamp', 'Has a digital display', 'Can be calibrated manually', 'Has built-in refrigeration', 'Bottom section can be removed for cleaning', 'COLOR', 'UPPERTUBE', 'Has a more durable heating tube material', 'Has a longer consecutive max cook time', 'Has a better water & splash resistance', 'Has a low water-level alarm', 'Has an automatic, low-water-level shutdown', 'Has a longer warranty', 'Has manual controls', 'BUTTONS', 'Can operate in Celsius', 'Has alert sounds', 'Has a timer', 'Can set a timer delay', 'Has a more precise time setting', 'Has automatic shutdown after timer ends', 'CONNECTION', 'IOS APP', 'ANDROID APP', 'Has a Taste Learner');
  } else if ($product_type=='pet-cameras') {
		return array('Has better resolution', 'Has more frames-per-second', 'Has a better field of view', 'Has a better rotation range', 'Has better connectivity', 'POWER', 'Has a battery back-up', 'Has motion alerts', 'Has souns alerts', 'Has notifications for barking/meowing', 'Has motion zones', 'Can detect pets', 'Has auto-tracking for movement', 'Has a siren', 'Has local storage', 'Has cloud storage', 'Can record 24/7', 'SUBSCRIPTION', 'Has NAS support', 'Has better zoom', 'Has better night vision', 'Has two-way audio', 'Has live view', 'Has toy laser', 'ALEXA', 'GOOGLEASSISTANT', 'HOMEKIT', 'Has in-app vet chat', 'Has time lapse', 'Has snapshot notifications', 'Has home/away modes', 'DIMENSIONS', 'COLOR', 'MOUNTING OPTIONS', 'Has better usage options', 'Has better warranty' );
	}	else {
		echo "Something's wrong...";
	}
} // Returns array(strings_for_Hero_comparison_section)

function getNonBetterThanOmits($product_type) {
  if ($product_type=='sous-vide') {
    return array('upper_tube_material_for_handling', 'buttons', 'connection', 'ios_app', 'android_app');
  } else if ($product_type=='pet-cameras') {
		return array('subscription', 'alexa_compatibility',
'google_assistant_compatibility', 'homekit_compatibility', 'mounting_options');
	}	else {
		echo "Something's wrong...";
	}
} //Returns array('additional_omits') - Merge to normal Omits Array

function get_AveragePostID($product_type) {
  switch($product_type) {
    case 'sous-vide':
      return 37430;
      break;
    case 'pet-cameras':
      return 37318;
      break;
  }
} // Returns $post_id

function get_AverageImageSVG($product_type) {
  switch($product_type) {
    case 'sous-vide':
      return '/wp-content/uploads/2021/10/sous-vide-square.svg';
      break;
    case 'pet-cameras':
      return '/wp-content/uploads/2021/11/pet-cameras.svg';
      break;
  }	
}

function productRankingsList() {
	return array('sous-vide', 'pet-cameras');
}

?>