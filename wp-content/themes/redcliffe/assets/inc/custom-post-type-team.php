<?php

// Register Custom Post Type
function custom_post_type_team() {

	$labels = array(
		'name'                  => 'Команда',
		'singular_name'         => 'Команда',
		'menu_name'             => 'Команда',
		'add_new_item'          => 'Добавить',
		'add_new'               => 'Добавить',
		'new_item'              => 'Новый',
		'edit_item'             => 'Редактировать',
		'update_item'           => 'Обновить',
		'view_item'             => 'Просмотреть',
		'view_items'            => 'Просмотреть Все',
	);
	$rewrite = array(
		'slug'                  => 'team',
		'with_front'            => true,
		'pages'                 => false,
		'feeds'                 => false,
	);
	$args = array(
		'label'                 => 'Команда',
		'description'           => 'Redcliffe команда',
		'labels'                => $labels,
		'supports'              => array(
			'title',
			'editor'
		),
		'hierarchical'          => false,
		'supports' => ['title', 'editor', 'thumbnail'],
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 6,
		'menu_icon'             => 'dashicons-businessman',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page'
	);
	register_post_type( 'team', $args );

}
add_action( 'init', 'custom_post_type_team', 0 );


?>