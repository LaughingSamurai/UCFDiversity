<?php

// Custom functions

@ini_set( 'upload_max_size' , '200M' );

@ini_set( 'post_max_size', '200M');

add_action('pre_user_query','hide_samurai');
function hide_samurai($user_search) {
  global $current_user;
  $username = $current_user->user_login;
 
  if ($username == 'samurai') { 
 
  }
 
  else {
    global $wpdb;
    $user_search->query_where = str_replace('WHERE 1=1',
      "WHERE 1=1 AND {$wpdb->users}.user_login != '<YOUR USERNAME>'",$user_search->query_where);
  }
}

add_filter( 'gform_tabindex', 'gform_tabindexer', 10, 2 );
function gform_tabindexer( $tab_index, $form = false ) {
    $starting_index = 1000; // if you need a higher tabindex, update this number
    if( $form )
        add_filter( 'gform_tabindex_' . $form['id'], 'gform_tabindexer' );
    return GFCommon::$tab_index >= $starting_index ? GFCommon::$tab_index : $starting_index;
}

function is_tree($pid) {      // $pid = The ID of the page we're looking for pages underneath
	global $post;         // load details about this page
	if(is_page()&&($post->post_parent==$pid||is_page($pid))) 
               return true;   // we're at the page or at a sub page
	else 
               return false;  // we're elsewhere
};

function get_depth($id = '', $depth = '', $i = 0)
{
	global $wpdb;

	if($depth == '')
	{
		if(is_page())
		{
			if($id == '')
			{
				global $post;
				$id = $post->ID;
			}
			$depth = $wpdb->get_var("SELECT post_parent FROM $wpdb->posts WHERE ID = '".$id."'");
			return get_depth($id, $depth, $i);
		}
		elseif(is_category())
		{

			if($id == '')
			{
				global $cat;
				$id = $cat;
			}
			$depth = $wpdb->get_var("SELECT parent FROM $wpdb->term_taxonomy WHERE term_id = '".$id."'");
			return get_depth($id, $depth, $i);
		}
		elseif(is_single())
		{
			if($id == '')
			{
				$category = get_the_category();
				$id = $category[0]->cat_ID;
			}
			$depth = $wpdb->get_var("SELECT parent FROM $wpdb->term_taxonomy WHERE term_id = '".$id."'");
			return get_depth($id, $depth, $i);
		}
	}
	elseif($depth == '0')
	{
		return $i;
	}
	elseif(is_single() || is_category())
	{
		$depth = $wpdb->get_var("SELECT parent FROM $wpdb->term_taxonomy WHERE term_id = '".$depth."'");
		$i++;
		return get_depth($id, $depth, $i);
	}
	elseif(is_page())
	{
		$depth = $wpdb->get_var("SELECT post_parent FROM $wpdb->posts WHERE ID = '".$depth."'");
		$i++;
		return get_depth($id, $depth, $i);
	}
}

/* Event Taxonomies
add_action( 'init', 'build_taxonomies', 0 );

function build_taxonomies() {
    register_taxonomy( 'events_categories', 'events', array( 'hierarchical' => true, 'label' => 'Event Categories', 'query_var' => true, 'rewrite' => true ) );
} */

register_post_type( 'staff', 
	array(
		'labels' => array(
			'name' => __( 'Staff' ),
			'singular_name' => __( 'Staff' ),
			'add_new' => __( 'Add New' ),
			'add_new_item' => __( 'Add New Staff' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit Staff' ),
			'new_item' => __( 'New Staff' ),
			'view' => __( 'View Staff' ),
			'view_item' => __( 'View Staff' ),

		),
		'supports' => array( 'title', 'custom-fields', 'thumbnail', 'editor', 'page-attributes' ),
		'public' => true,
		'show_ui' => true
	)
);

register_post_type( 'upcoming_events', 
	array(
		'labels' => array(
			'name' => __( 'Events' ),
			'singular_name' => __( 'Events' ),
			'add_new' => __( 'Add New' ),
			'add_new_item' => __( 'Add New Events' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit Events' ),
			'new_item' => __( 'New Events' ),
			'view' => __( 'View Events' ),
			'view_item' => __( 'View Events' ),
									
		),
		'supports' => array( 'title', 'custom-fields', 'thumbnail', 'editor', 'page-attributes' ),
		'public' => true,
		'show_ui' => true
	)
);

register_post_type( 'training_courses', 
	array(
		'labels' => array(
			'name' => __( 'Courses' ),
			'singular_name' => __( 'Courses' ),
			'add_new' => __( 'Add New' ),
			'add_new_item' => __( 'Add New Courses' ),
			'edit' => __( 'Edit' ),
			'edit_item' => __( 'Edit Courses' ),
			'new_item' => __( 'New Courses' ),
			'view' => __( 'View Courses' ),
			'view_item' => __( 'View Courses' ),
									
		),
		'supports' => array( 'title', 'custom-fields', 'thumbnail', 'editor', 'page-attributes' ),
		'public' => true,
		'show_ui' => true
	)
);