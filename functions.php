<?php
add_filter( 'register_post_type_args', function( $args, $post_type ) {

    // Change this to the post type you are adding support for
    if ( 'product' === $post_type ) {
        $args['show_in_graphql'] = true;
        $args['graphql_single_name'] = 'productD';
        $args['graphql_plural_name'] = 'productsD';
    }

    return $args;

}, 10, 2 );


add_filter( 'register_taxonomy_args', function( $args, $taxonomy ) {
    if ( 'product_cat' === $taxonomy ) {
        $args['show_in_graphql'] = true;
        $args['graphql_single_name'] = 'productCategory';
        $args['graphql_plural_name'] = 'productCategories';
    }
    return $args;
}, 10, 2 );




acf_add_options_page(array(
    'page_title' 	=> 'Налаштування теми',
    'menu_title'	=> 'Налаштування теми',
    'menu_slug' 	=> 'theme-general-settings',
    'capability'	=> 'edit_posts',
    'redirect'		=> false,
    'show_in_graphql' => true,
    'graphql_field_name' => 'ThemeGeneralSettings',
));

add_theme_support( 'menus' );
add_action( 'after_setup_theme', function(){
    register_nav_menus( [
        'HEADER_TOP' => 'Головне меню',
        'FOOTER_1' => 'Футер меню 1',
        'FOOTER_2' => 'Футер меню 2',
        'FOOTER_3' => 'Футер меню 3',
    ] );

} );