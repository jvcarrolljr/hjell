<?php

// // Product Post ID(s) => Post Slug(s)
function get_PostSlug($p1_id, $p2_id=null) {
	$p1_obj = get_post($p1_id); 
	$p1_data = $p1_obj->post_name;
	if ($p2_id!==null) {
		$p2_obj = get_post($p2_id); 
		$p2_data = $p2_obj->post_name;
		return array($p1_data,$p2_data);
	} else {
		return $p1_data;
	}
} // Returns str($p1) | arr[$p1,$p2]

// // Product Post ID(s) => Post Title(s)
function get_PostTitle($p1_id, $p2_id=null) {
	$p1_obj = get_post($p1_id); 
	$p1_data = $p1_obj->post_title;
	if ($p2_id!==null) {
		$p2_obj = get_post($p2_id); 
		$p2_data = $p2_obj->post_title;
		return array($p1_data,$p2_data);
	} else {
		return $p1_data;
	}
} // Returns str($p1) | arr[$p1,$p2]


// // Product Post ID(s) => Product Name(s)
function get_ProductName($p1_id, $p2_id=null) {
	$p1_data = get_field('name', $p1_id);
	if ($p2_id!==null) {
		$p2_data = get_field('name', $p2_id);
		return array($p1_data,$p2_data);
	} else {
		return $p1_data;	
	}
} // Returns str($p1) | arr[$p1,$p2]

// // Product Post ID(s) => Product Type(s)
function get_ProductType($p1_id, $p2_id=null) {
	$p1_data = get_field('product_type', $p1_id);
	if ($p2_id!==null) {
		$p2_data = get_field('product_type', $p2_id);
		return array($p1_data,$p2_data);
	} else {
		return $p1_data;	
	}
} // Returns str($p1) | arr[$p1,$p2]

// // Product Post ID(s) => Feature Type(s)
function get_FeatureType($p1_id, $p2_id=null) {
	$p1_data = get_field('feature_type', $p1_id);
	if ($p2_id!==null) {
		$p2_data = get_field('feature_type', $p2_id);
		return array($p1_data,$p2_data);
	} else {
		return $p1_data;	
	}
} // Returns str($p1) | arr[$p1,$p2]


// // Product Post ID(s) => Product Display Name(s) (Singular)
function get_ProductDisplayName($p1_id, $p2_id=null) {
	$p1_data = get_field('product_type_display_singular', $p1_id);
	if ($p2_id!==null) {
		$p2_data = get_field('product_type_display_singular', $p2_id);
		return array($p1_data,$p2_data);
	} else {
		return $p1_data;	
	}
} // Returns str($p1) | arr[$p1,$p2]

// // Product Post ID(s) => Product Display Name(s) (Plural)
function get_ProductDisplayNamePlural($p1_id, $p2_id=null) {
	$p1_data = get_field('product_type_display_plural', $p1_id);
	if ($p2_id!==null) {
		$p2_data = get_field('product_type_display_plural', $p2_id);
		return array($p1_data,$p2_data);
	} else {
		return $p1_data;	
	}
} // Returns str($p1) | arr[$p1,$p2]

// // Product Post ID(s) => Product ASIN(s)
function get_ProductASIN($p1_id, $p2_id=null) {
	$p1_data = get_field('asin', $p1_id);
	if ($p2_id!==null) {
		$p2_data = get_field('asin', $p2_id);
		return array($p1_data,$p2_data);
	} else {
		return $p1_data;	
	}
} // Returns str($p1) | arr[$p1,$p2]

// // Product Post ID(s) => Product Aff URL(s)
// + get_ProductASIN
function get_ProductAffURL($p1_id, $p2_id=null, $category='') {
  if ($category !== '') {
		$tag_build = $category . '-';
	} else {
		$tag_build = '';
	}
	
	if ($p2_id!==null) {
    [$p1_asin,$p2_asin] = get_ProductASIN($p1_id,$p2_id);
    $p1_data = aawp_get_field_value($p1_asin, 'url', array('tracking_id' => 'homejell-' . $tag_build . '20'));
    $p2_data = aawp_get_field_value($p2_asin, 'url', array('tracking_id' => 'homejell-' . $tag_build . '20'));
    return array($p1_data,$p2_data);
  } else {
    $p1_asin = get_ProductASIN($p1_id);
    $p1_data = aawp_get_field_value($p1_asin, 'url', array('tracking_id' => 'homejell-' . $tag_build . '20'));
    return $p1_data;
  }
} // Returns str($p1) | arr[$p1,$p2]

// // Product Post ID(s) => Product Price(s)
// + get_ProductASIN
function get_ProductPrice($p1_id, $p2_id=null) {
  if ($p2_id!==null) {
    [$p1_asin,$p2_asin] = get_ProductASIN($p1_id,$p2_id);
    $p1_data = aawp_get_field_value($p1_asin, 'price');
    $p2_data = aawp_get_field_value($p2_asin, 'price');
    if (strpos($p1_data, 'not') !== false) {
      $p1_data = 'Check Amazon';
    }
    if (strpos($p2_data, 'not') !== false) {
      $p2_data = 'Check Amazon';
    }
    return array($p1_data,$p2_data);
  } else {
    $p1_asin = get_ProductASIN($p1_id);
    $p1_data = aawp_get_field_value($p1_asin, 'price');
    if (strpos($p1_data, 'not') !== false) {
      $p1_data = 'Check Amazon';
    }
    return $p1_data;
  }
} // Returns str($p1) | arr[$p1,$p2]

// // Product Post ID(s) => Product Rating(s)
// + get_ProductASIN
function get_ProductRating($p1_id, $p2_id=null) {
  if ($p2_id!==null) {
    [$p1_asin,$p2_asin] = get_ProductASIN($p1_id,$p2_id);
    $p1_data = aawp_get_field_value($p1_asin, 'star_rating');
    $p2_data = aawp_get_field_value($p2_asin, 'star_rating');
    return array($p1_data,$p2_data);
  } else {
    $p1_asin = get_ProductASIN($p1_id);
    $p1_data = aawp_get_field_value($p1_asin, 'star_rating');
    return $p1_data;
  }
} // Returns str($p1) | arr[$p1,$p2]

// // Product Post ID(s) => Product Reviews(s)
// + get_ProductASIN
function get_ProductReviews($p1_id, $p2_id=null) {
  if ($p2_id!==null) {
    [$p1_asin,$p2_asin] = get_ProductASIN($p1_id,$p2_id);
    $p1_data = aawp_get_field_value($p1_asin, 'reviews');
    $p2_data = aawp_get_field_value($p2_asin, 'reviews');
    return array($p1_data,$p2_data);
  } else {
    $p1_asin = get_ProductASIN($p1_id);
    $p1_data = aawp_get_field_value($p1_asin, 'reviews');
    return $p1_data;
  }
} // Returns str($p1) | arr[$p1,$p2]

// // Product Post ID(s) => Product Thumbnail(s)
function get_ProductImageThumb($p1_id, $p2_id=null) {
	$p1_img_arr = get_field('product_image', $p1_id);
  $p1_data = $p1_img_arr['sizes']['thumbnail'];
	if ($p2_id!==null) {
		$p2_img_arr = get_field('product_image', $p2_id);
    $p2_data = $p2_img_arr['sizes']['thumbnail'];
		return array($p1_data,$p2_data);
	} else {
		return $p1_data;
	}
} // Returns str($p1) | arr[$p1,$p2]

// // Product Post ID(s) => Product Medium Image(s)
function get_ProductImageMedium($p1_id, $p2_id=null) {
	$p1_img_arr = get_field('product_image', $p1_id);
  $p1_data = $p1_img_arr['sizes']['medium'];
	if ($p2_id!==null) {
		$p2_img_arr = get_field('product_image', $p2_id);
    $p2_data = $p2_img_arr['sizes']['medium'];
		return array($p1_data,$p2_data);
	} else {
		return $p1_data;
	}
} // Returns str($p1) | arr[$p1,$p2]

// // Product Post ID(s) => Product Large Image(s)
function get_ProductImageLarge($p1_id, $p2_id=null) {
	$p1_img_arr = get_field('product_image', $p1_id);
  $p1_data = $p1_img_arr['sizes']['large'];
	if ($p2_id!==null) {
		$p2_img_arr = get_field('product_image', $p2_id);
    $p2_data = $p2_img_arr['sizes']['large'];
		return array($p1_data,$p2_data);
	} else {
		return $p1_data;
	}
} // Returns str($p1) | arr[$p1,$p2]

// //
function get_FieldObjectLabel($p_id, $field_name) {
	$field_object = get_field_object($field_name, $p_id);
	$field_label = $field_object['label'];
	return $field_label;
} // Returns str($label)

function get_FieldObjectInstructions($p_id, $field_name) {
	$field_object = get_field_object($field_name, $p_id);
	$field_instructions = $field_object['instructions'];
	return $field_instructions;
} // Returns str($instructions)

// // Product Post ID(s) => Product Rankings URL(s)
// + get_ProductType
function get_ProductRankingsURL($p1_id, $p2_id=null) {
	$p1_pt = get_ProductType($p1_id);
  $p1_data = '/' . $p1_pt . '-our-rankings/';
	if ($p2_id!==null) {
    $p2_pt = get_ProductType($p2_id);
    $p2_data = '/' . $p2_pt . '-our-rankings/';
		return array($p1_data,$p2_data);
	} else {
		return $p1_data;
	}
} // Returns str($p1) | arr[$p1,$p2]


//
// // Rankings Functions
// // // 

// // Product Post ID(s) => Product Rank(s)
function get_ProductRank($p1_id, $p2_id=null) {
	$p1_data = get_field('rank', $p1_id);
	if ($p2_id!==null) {
		$p2_data = get_field('rank', $p2_id);
		return array($p1_data,$p2_data);
	} else {
		return $p1_data;	
	}
} // Returns str($p1) | arr[$p1,$p2]


function get_SpecificProductRank($rank, $product_type, $feature_name='score') {
	$product_ids = get_ProductIDArray($product_type,$count=-1);
	$product_scores = array();
	foreach($product_ids as $product_id) {
		$score = get_field(strtolower($feature_name),$product_id);
		$product_scores[] = $score;
	}
	$scores = array_combine($product_ids, $product_scores);
	arsort($scores);
	$keys = array_keys($scores);
	$key = $keys[$rank-1];
	
	return $key;
} // Returns str($p_id)

// // Product Post ID(s) => Product Score(s)
function get_ProductScore($p1_id, $p2_id=null) {
	$p1_data = get_field('score', $p1_id);
	if ($p2_id!==null) {
		$p2_data = get_field('score', $p2_id);
		return array($p1_data,$p2_data);
	} else {
		return $p1_data;	
	}
} // Returns str($p1) | arr[$p1,$p2]

// // Product Post ID + Feature Name => Product Score
function get_SpecificProductScore($p_id, $feature='score') {
	$feature_cleaned = strtolower($feature);
	$p_data = get_field($feature_cleaned, $p_id);
	return $p_data;	
} // Returns str($p_data)

// // Desired Rank + Product Type ID(s) => Product Reviews(s)
// + get_ProductIDArray, get_ProductRank, get_ProductScore
function get_SpecificRankData($rank_number,$product_type) {
  $product_ids = get_ProductIDArray($product_type);
  
  $product_ranks = array();
  foreach ($product_ids as $product_id) {
    $rank = get_ProductRank($product_id);
    $product_ranks[] = $rank;
  }
  $key = array_search($rank_number, $product_ranks);
  $p_id = $product_ids[$key];
  return $p_id;
} // Returns str($p_id)

// // Product Post ID(s) => Product Rankings URL(s)
// + get_ProductType
function get_ProductID_fromReviewID($p1_r_id, $p2_r_id=null) {
  $p1_data = get_field('product_1', $p1_r_id);
	if ($p2_r_id!==null) {
    $p2_data = get_field('product_1', $p2_r_id);
		return array($p1_data,$p2_data);
	} else {
		return $p1_data;
	}
} // Returns str($p1) | arr[$p1,$p2]

// // Product Post ID(s) => Product Rankings URL(s)
// + get_ProductType
function get_ProductIDs_fromComparisonID($post_id) {
  $p1_data = get_field('product_1', $post_id);
	$p2_data = get_field('product_2', $post_id);
	return array($p1_data,$p2_data);
} // Returns arr($p1,$p2)

// // Product Post ID(s) => Product Rankings URL(s)
// + get_ProductType
function get_ProductIDsFromPostTitle($post_title) {
	if (strpos($post_title, 'Review') !== false) { // $title is from a review
		$clean_title = str_replace(" Review", "", $post_title);
		$products = get_posts(array(
		'numberposts'	=> -1,
		'post_type'		=> 'products',
		'meta_key'		=> 'name',
		'meta_value'	=> $clean_title
		));
		return $products[0]->ID;
	}
	
	if (strpos($post_title, 'vs.') !== false) { // $title is from a comparison
   	$p_id = explode(" vs. ", $post_title);
// 		echo "$p_id[0] and $p_id[1]";
		$p1 = get_posts(array(
			'numberposts'	=> -1,
			'post_type'		=> 'products',
			'meta_key'		=> 'name',
			'meta_value'	=> $p_id[0]
		));
		$p2 = get_posts(array(
			'numberposts'	=> -1,
			'post_type'		=> 'products',
			'meta_key'		=> 'name',
			'meta_value'	=> $p_id[1]
		));
		$p1_id = $p1[0]->ID;
		$p2_id = $p2[0]->ID;
		return array($p1_id, $p2_id);
	}
} // Returns array()

// // Query Object (get_queried_object()) => Archive Type
function run_ArchiveCheck($query_obj) {
	$slug = $query_obj->slug;
	
	if (strpos($slug, 'reviews') !== false) {
		return 'reviews';
	} elseif (strpos($slug, 'comparisons') !== false) {
		return 'comparisons';
	} elseif (strpos($slug, 'knowledge') !== false) {
		return 'knowledge';
	} else {
		return 'base';
	}
} // Returns str($archive_type)

function check_PostCategory($query_obj) {
	$category_obj = get_the_category($query_obj->ID);
	$post_category_slug = $category_obj[0]->slug;
	
	if (strpos($post_category_slug, 'reviews') !== false) {
		return 'review';
	} elseif (strpos($post_category_slug, 'comparisons') !== false) {
		return 'comparison';
	} elseif (strpos($post_category_slug, 'knowledge') !== false) {
		return 'knowledge';
	} else {
		return 'other';
	}
} // Returns str($post_category)

//
// // Comparison Functions
// // // 

// // Enter two Product Post IDs, returns the Comparison Post ID
// + getSlug, solveComparisonID   
function get_ComparisonPostID($p1_id, $p2_id) { 
	[$p1_slug, $p2_slug] = get_PostSlug($p1_id, $p2_id);
	
	$comparison_post_id = solve_ComparisonID($p1_slug, $p2_slug); // Finds post with both slugs in slug
	
	return $comparison_post_id;
} // Returns str($post_id);

// // Enter two Product Post Slugs, returns the Comparison Post ID
// +  
function solve_ComparisonID($p1_slug, $p2_slug) {
	if ( $comparison_post = get_page_by_path( $p1_slug . '-vs-' . $p2_slug, OBJECT, 'post' ) ) {
  	$comparison_post_id = $comparison_post->ID;
	} elseif ( $comparison_post = get_page_by_path( $p2_slug . '-vs-' . $p1_slug, OBJECT, 'post' ) ) {
		$comparison_post_id = $comparison_post->ID;
	} else {	
		$comparison_post_id = 0;
	}
	return $comparison_post_id;
}
//

// + get_SpecificProductScore, get_AveragePostID, get_SpecificProductScore, get_StdDev
function get_ColorClass($p_id, $product_type, $feature_name='score') {
  $p_score = get_SpecificProductScore($p_id, $feature_name);
  $avg_post_id = get_AveragePostID($product_type);
  $average_score = get_SpecificProductScore($avg_post_id, $feature_name);
  $feature_stddev = get_StdDev($product_type, $feature_name);
  $low = $average_score - $feature_stddev;
  $high = $average_score + $feature_stddev;
  if ($p_score < $low) {
    return 'under-std';
  } elseif ($p_score > $high) {
    return 'over-std';
  } else {
    return 'in-std';
  }
}

// + get_ProductIDArray, get_SpecificProductScore
function get_allScores($product_type, $feature_name='score') {
  $products = get_ProductIDArray($product_type,$count=-1);
  $scores = array();
  foreach ($products as $product) {
    $score = get_SpecificProductScore($product, $feature_name);
    $scores[] = $score;
  }
  return $scores;
} // Returns array($scores)


// + get_AveragePostID
function get_StdDev($product_type, $feature_name='score') {
  $post_id = get_AveragePostID($product_type);
	$field = strtolower($feature_name) . '_stddev';
	
	return get_field($field, $post_id);
} // Returns int($std_dev)

function calc_WinnerClass($s1,$s2) {
	if ($s1>$s2) {
		return '/wp-content/uploads/2021/10/yes.svg';
	} elseif ($s1<$s2) {
		return '/wp-content/uploads/2021/12/blank.svg';
	} else {
		return '/wp-content/uploads/2021/12/e.svg';
	}
}

// // Field Functions
// 
// // Product ID(s) => Field Label(s)
function get_FieldLabel($p1_id, $field_name, $p2_id=null) {
	$p1_obj = get_field($field_name, $p1_id);
	$p1_data = $p1_obj['label'];
	if ($p2_id!==null) {
		$p2_obj = get_field($field_name, $p2_id);
		$p2_data = $p2_obj['label'];
		return array($p1_data,$p2_data);
	} else {
		return $p1_data;	
	}
} // Returns str($p1_label) | arr[$p1,$p2]


// // Product ID(s) => Field Value(s)
function get_FieldValue($p1_id, $field_name, $p2_id=null) {
	$p1_obj = get_field($field_name, $p1_id);
	$p1_data = $p1_obj['value'];
	if ($p2_id!==null) {
		$p2_obj = get_field($field_name, $p2_id);
		$p2_data = $p2_obj['value'];
		return array($p1_data,$p2_data);
	} else {
		return $p1_data;	
	}
} // Returns str($p1_label) | arr[$p1,$p2]


// // Product ID + Field => Scorable Response (1y,0n)
// Note: ['allow_null'] = 0 (scorable) 1(non-scored)
function check_InScoreList($product_type, $field_name) {
  $settings = get_FieldSettings($product_type);
	$data = $settings["$field_name"][0];
	return $data;
} // Returns (1 yes, 0 no)

// // Product ID + Field => Better Response (1y,0n)
// Note: ['ui'] = 0 (inBetter) 1 (omitted)
function check_InBetterList($product_type, $field_name) {
  $settings = get_FieldSettings($product_type);
	$data = $settings["$field_name"][1];
	return $data;
} // Returns (1 yes, 0 no)

// // Product ID + Field => Bar Display (1y,0n)
// Note: ['required'] = 0 (notBar) 1 (isBar)
function check_IsBar($product_type, $field_name) {
  $settings = get_FieldSettings($product_type);
	$data = $settings["$field_name"][3];
	return $data;
} // Returns (1 yes, 0 no)

// // Product ID + Field => Scorable Response (1y,0n)
// + get_FieldValue
function check_BetterWorse($p1_id, $p2_id, $field_name) {
  [$p1_value, $p2_value] = get_FieldValue($p1_id, $field_name, $p2_id);
  if ($p1_value > $p2_value) {
    return 'better';
  } elseif ($p1_value < $p2_value) {
    return 'worse';
  } else {
    return 'even';
  }
} // Returns string('better', 'worse', 'even')

// // Product IDs + Feature Name => "Better" field arrays
// + get_ProductType, get_FieldArray, check_BetterWorse
function get_BetterArrays($p1_id, $p2_id, $feature_array='all-merge') {
  $product_type = get_ProductType($p1_id);
  $all_fields = get_FieldArray($product_type);

  $p1_better = array();
  $p2_better = array();
  foreach($all_fields as $field_name) {
		if (check_InScoreList($product_type,$field_name)==1 && check_InBetterList($product_type,$field_name)==1) {
			$compare_value = check_BetterWorse($p1_id, $p2_id, $field_name);
    	if ($compare_value == 'better') {
      	$p1_better[] = $field_name;
    	}
    	if ($compare_value == 'worse') {
      	$p2_better[] = $field_name;
    	}
		}
  }
  return array($p1_better, $p2_better);
} // Returns field arrays($p1_betters, $p2_betters)

// // Field name + Product Type => "Better" phrase
// + get_BetterPhrasesArray
function get_BetterPhrase($field_name, $product_type) {
  $settings = get_FieldSettings($product_type);
	$data = $settings["$field_name"][2];
	return $data;
} // Returns string($phrase)

// // Garbage
// 
function review_StdDevClass($p_id, $feature) {
  $average_post_id = get_AveragePostID(get_ProductType($p_id));

  $product_score = get_SpecificProductScore($p_id, $feature);
  $average_score = get_SpecificProductScore($average_post_id, $feature);
  $std_dev = get_StdDev(get_ProductType($p_id), $feature);

  if ($product_score >= $average_score + (2*$std_dev)) {
    $rating = 'Excellent';
    $rating_class = 'excellent';
    $score_class = 'score-e';
  } else if ($product_score >= $average_score + $std_dev) {
    $rating = 'Good';
    $rating_class = 'above-average';
    $score_class = 'score-aa';
  } else if ($product_score <= $average_score - (2*$std_dev)) {
    $rating = 'Terrible';
    $rating_class = 'terrible';
    $score_class = 'score-t';
  } else if ($product_score <= $average_score - $std_dev) {
    $rating = 'Bad';
    $rating_class = 'below-average';
    $score_class = 'score-ba';
  } else {
    $rating = 'Average';
    $rating_class = 'average';
    $score_class = 'score-average';
  }

  return array($rating, $rating_class, $score_class);

} // Returns array($rating, $rating_class, $score_class);

// Gets css.class for Non-bar Cards
function get_NonBarClass($p_id, $field_name) {
  $p_label = get_FieldLabel($p_id, $field_name);
	$clean = strtolower($p_label);
  if ($clean=='yes') {
    return 'green';
  } else if ($clean=="no") {
    return'red';
  } else if ($clean=="na" || $clean=="unknown") {
    return 'unk';
  } else {
    return 'green';
  }
}

// Get Width of Bar for Cards
function calc_BarWidth($p1_id, $field_name) {
  $p_value = get_FieldValue($p1_id, $field_name);
	$field_obj = get_field_object($field_name, $p1_id);
	$field_values = $field_obj['choices'];
	krsort($field_values);
	$max_value = array_key_first($field_values);
	$width = round(($p_value / $max_value)*100,2);	
	return $width;
}

function get_CategoryLink($product_type) {
	$cat_obj = get_category_by_slug($product_type); 
  $category_id = $cat_obj->term_id;
	$category_link = get_category_link( $category_id );

	return $category_link;
}

function getYoast() {
	echo "<div class='grid-container'>";
	if ( function_exists('yoast_breadcrumb') ) {
  	yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
	}
	echo "</div>";
}

?>