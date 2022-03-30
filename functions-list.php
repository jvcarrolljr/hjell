<?php


// Arrays Functions
get_ProductIDArray            ($product_type,$count=-1);               // array($product_ids)
get_PostIDArray               ($category,$count=-1);                   // array($post_ids)
get_AveragePostID             ($product_type);                         // string($p_id)
get_CategoryColor             ($category_slug,$opacity=90);            // string(rsa for linear-gradient)
get_BetterPhrasesArray        ($product_type);                         // array($all_phrases)
get_FieldArray                ($product_type, $field_group='all');     // array($fields)

//Base Functions
get_PostSlug                  ($p1_id, $p2_id=null);                   // string($post_slug)
get_PostTitle                 ($p1_id, $p2_id=null);                   // string($post_title)
get_ProductName               ($p1_id, $p2_id=null);                   // string($product_name)
get_ProductType               ($p1_id, $p2_id=null);                   // string($product_type)
get_FeatureType               ($p1_id, $p2_id=null);                   // string($feature_type)
get_ProductDisplayName        ($p1_id, $p2_id=null);                   // string($product_display)
get_ProductDisplayNamePlural  ($p1_id, $p2_id=null);                   // string($product_display_plural)
get_ProductASIN               ($p1_id, $p2_id=null);                   // string($product_asin)
get_ProductAffURL             ($p1_id, $p2_id=null);                   // string($product_aff_url)
get_ProductPrice              ($p1_id, $p2_id=null);                   // string($product_price)
get_ProductRating             ($p1_id, $p2_id=null);                   // unknown(stars linked)
get_ProductReviews            ($p1_id, $p2_id=null);                   // unknown(text linked)
get_ProductImageThumb         ($p1_id, $p2_id=null);                   // string($product_image_url)
get_ProductImageMedium        ($p1_id, $p2_id=null);                   // string($product_image_url)
get_ProductImageLarge         ($p1_id, $p2_id=null);                   // string($product_image_url)
get_AverageImageSVG           ($p1_id);                                // string($avg_svg_url)
get_FieldLabel                ($p1_id, $field_name, $p2_id=null);      // string($product_field_label)
get_FieldValue                ($p1_id, $field_name, $p2_id=null);      // string($product_field_value)
get_FieldObjectLabel          ($p_id, $field_name);                    // string($field_label)
get_FieldObjectInstructions   ($p_id, $field_name);                    // string($field_instructions)

get_ProductRankingsURL        ($p1_id, $p2_id=null);                   // string($product_rankings_url)
get_ProductRank               ($p1_id, $p2_id=null);                   // string($rank)
get_SpecificProductRank       ($rank, $product_type, $feature_name='score');     // str($p_id)
get_ProductScore              ($p1_id, $p2_id=null);                   // string($score)
get_SpecificProductScore      ($p_id, $feature='score');               // string($score)
get_SpecificRankData          ($rank_number,$product_type);            // ID

get_ProductIDs_fromComparisonID($post_id);                             // array($p1,$p2)
get_ProductIDsFromPostTitle   ($post_title);                           // string/array
run_ArchiveCheck              ($query_obj);                            // string($archive_type)

check_ParentPostCategory      ();                                      // string  

get_ComparisonPostID          ($p1_id, $p2_id);                        // string($comparison_post_id)

get_ColorClass                ($p_id, $product_type, $feature_name);   // string('{over}-std')
get_allScores                 ($product_type, $feature_name='score');  // array($)
get_StdDev                    ($product_type, $feature_name='score');  // Int

check_InBetterList            ($product_type,$field_name);             // int(1y 0n)
check_InScoreList             ($product_type,$field_name);             // int(1y 0n)
check_IsBar                   ($product_type, $field_name);            // int(1y 0n)

get_BetterArrays              ($p1_id, $p2_id, $feature_array='all-merge'); // Arrays($p1,$p2)
get_BetterPhrase              ($field_name, $product_type);            // string($phrase)
get_FieldSettings             ($product_type);                         // [field] + [0]isScored, [1]inBetterList, [2]isBetterPhrase, [3]isBar 

get_NonBarClass               ($p_id, $field_name);                    // string($class)
calc_BarWidth                 ($p1_id, $field_name);                   // int($width)





//
// // Comparison Functions
// 


//
// // Review Functions
// 


//
// // Garbage Functions
//




?>