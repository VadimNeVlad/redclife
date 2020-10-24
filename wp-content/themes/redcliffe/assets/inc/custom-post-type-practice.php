<?php

// Register Custom Post Type
function custom_post_type_practices() {

	$labels = array(
		'name'                  => 'Практика',
		'singular_name'         => 'Практика',
		'menu_name'             => 'Практика',
		'add_new_item'          => 'Добавить',
		'add_new'               => 'Добавить',
		'new_item'              => 'Новый',
		'edit_item'             => 'Редактировать',
		'update_item'           => 'Обновить',
		'view_item'             => 'Просмотреть',
		'view_items'            => 'Просмотреть Все',
	);
	$rewrite = array(
		'slug'                  => 'practices',
		'with_front'            => true,
		'pages'                 => false,
		'feeds'                 => false,
	);
	$args = array(
		'label'                 => 'Практика',
		'description'           => 'Redcliffe Практика',
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
		'menu_icon'             => 'dashicons-chart-area',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'practices', $args );
	register_taxonomy( 'taxonomy', [ 'practices' ], [ 
			'label'                 => '', // определяется параметром $labels->name
			'labels'                => [
				'name'              => 'Рубрика',
				'singular_name'     => 'Рубрика',
				'search_items'      => 'Искать Рубрику',
				'all_items'         => 'Все Рубрики',
				'view_item '        => 'Смотреть Рубрику',
				'edit_item'         => 'Изменить Рубрику',
				'update_item'       => 'Обновить Рубрику',
				'add_new_item'      => 'Добавить Новую Рубрику',
				'new_item_name'     => 'Новое Название Рубрики',
				'menu_name'         => 'Рубрика',
			],
			'description'           => '', // описание таксономии
			'public'                => true,
			'hierarchical'          => true,

			'rewrite'               => true,
			'capabilities'          => array(),
			'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или 
			'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного 
			'show_in_rest'          => null, // добавить в REST API
			'rest_base'             => null, // $taxonomy
		] );

}
add_action( 'init', 'custom_post_type_practices', 0 );


?>