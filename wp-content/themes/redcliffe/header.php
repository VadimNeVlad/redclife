<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no" />
    <meta name="HandheldFriendly" content="true" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <title>
        <?php wp_title(); ?>
    </title>

    <?php wp_head(); ?>
</head>
<body>

    <?php if ( is_404() ) $header_class = 'header-404'; ?>
    <header class="header <?php echo $header_class; ?>">
        <div class="header__top">
            <div class="container">

                <?php get_search_form(); ?>
                
                <div class="header__language">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/flag.png" alt="flag">
                    <span>Eng</span>
                </div>
            </div>
        </div>
        <div class="header__bottom">
            <div class="container">
                <a href="<?php echo esc_url( home_url() ); ?>" class="header__logo">REDCLIFFE <span>PARTNERS</span></a>
                <nav class="header__menu">

                    <?php wp_nav_menu(array(
                        'theme_location'  => 'header_menu',
                        'container'       => null,
                        'menu_class'      => 'header__menu-list',
                    )); ?>

                    <a href="<?php echo esc_url( get_page_link( 117 ) ); ?>" class="btn  btn-red"><?php the_field('contact_btn_h_text', 117) ?></a>
                    <div class="mobile-menu-close">
                        <div class="cross"></div>
                    </div>
                </nav>
                <div class="burger-content">
                    <div class="burger-mob"></div>
                </div>
            </div>
        </div>
    </header>    