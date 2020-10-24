<?php

// Register Custom Post Type
function custom_post_type_careers() {

	$labels = array(
		'name'                  => 'Вакансии',
		'singular_name'         => 'Вакансии',
		'menu_name'             => 'Вакансии',
		'add_new_item'          => 'Добавить',
		'add_new'               => 'Добавить',
		'new_item'              => 'Новая',
		'edit_item'             => 'Редактировать',
		'update_item'           => 'Обновить',
		'view_item'             => 'Просмотреть',
		'view_items'            => 'Просмотреть Все',
	);
	$rewrite = array(
		'slug'                  => 'careers',
		'with_front'            => true,
		'pages'                 => false,
		'feeds'                 => false,
	);
	$args = array(
		'label'                 => 'Вакансии',
		'description'           => 'Redcliffe команда',
		'labels'                => $labels,
		'supports'              => array(
			'title',
			'editor'
		),
		'hierarchical'          => false,
		// 'taxonomies'  => array( 'category' ),
		'supports' => ['title', 'editor', 'thumbnail'],
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 6,
		'menu_icon'             => 'dashicons-media-document',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page'
	);
	register_post_type( 'careers', $args );

}
add_action( 'init', 'custom_post_type_careers', 0 );


?>