<?php
/*
 * @package WordPress
 * @subpackage Zemplate
 *
 * Modifiers Post Type
 *
 */
/*------------------------------------*\
    :: Modifiers
\*------------------------------------*/
add_action('init', 'create_brokers');

function create_brokers() {
	//custom post type
	register_post_type('brokers',
		array(
			'labels'       => array(
				'name'                       => 'Brokers', 'Taxonomy General Name', 'text_domain',
				'singular_name'              => 'Broker', 'Taxonomy Singular Name', 'text_domain',
				'menu_name'                  => 'Brokers', 'text_domain',
				'all_items'                  => 'All Brokers', 'text_domain',
				'parent_item'                => 'Parent Broker', 'text_domain',
				'parent_item_colon'          => 'Parent Broker:', 'text_domain',
				'new_item_name'              => 'New Broker Name', 'text_domain',
				'add_new_item'               => 'Add New Broker', 'text_domain',
				'edit_item'                  => 'Edit Broker', 'text_domain',
				'update_item'                => 'Update Broker', 'text_domain',
				'separate_items_with_commas' => 'Separate Brokers with commas', 'text_domain',
				'search_items'               => 'Search Brokers', 'text_domain',
				'add_or_remove_items'        => 'Add or remove Brokers', 'text_domain',
				'choose_from_most_used'      => 'Choose from the most used Brokers', 'text_domain',
				'not_found'                  => 'Not Found', 'text_domain',
			),
			'public' => true,
			'has_archive' => false,
			'with_front' => true,
			'menu_icon'   => 'dashicons-businessman',
			'publicly_queryable' => true,
			'menu_position' => 20,
			'supports' => array(
				'title',
				'thumbnail',
				'editor'
			),
		)
	);
}


add_action( 'init', 'create_broker_tax' );

function create_broker_tax() {
	register_taxonomy(
		'vertical',
		'brokers',
		array(
			'label' => __( 'Verticals' ),
			'rewrite' => array( 'slug' => 'vertical' ),
			'hierarchical' => true,
		)
	);
}