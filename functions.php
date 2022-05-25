<?php

// Incluindo os arquivos da TGM
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/inc/required-plugins.php';

//Requerendo o arquivo Customizer

require get_template_directory() . '/inc/customizer.php';

// Carregando nossos scripts e folhas de estilos
function load_scripts(){
    wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array( 'jquery' ), '4.0.0', true );
    wp_enqueue_style( 'bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css', array(), '4.0.0', 'all' );
    wp_enqueue_style( 'template', get_template_directory_uri() . '/css/template.css', array(), '1.0', 'all' );
    wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/js/fitvids.js', array( 'jquery ' ),null, true );
}

function wpseguros_gutenberg_fonts(){
    wp_enqueue_style( 'lato-font', 'https://fonts.googleapis.com/css?family=Lato:400,900' );
    wp_enqueue_style( 'oswald-font', 'https://fonts.googleapis.com/css?family=Oswald:400,900' );
}
add_action( 'enqueue_block_editor_assets', 'wpseguros_gutenberg_fonts' );





add_action( 'wp_enqueue_scripts', 'load_scripts' );

//Função de configuração do tema
    function wpseguros_config(){
        // Registrando nossos menus
        register_nav_menus(
            array(
                'my_main_menu' => __( 'Main Menu', 'wpseguros' ),
                'footer_menu' => __( 'Footer Menu', 'wpseguros' )
            )
        );
        $args = array(
          'height'      => 225,
           'width'      =>1920
        );
        add_theme_support('custom-header', $args);
        add_theme_support('post-thumbnails');
        add_theme_support('post-formats', array( 'video', 'image' ) );
        add_theme_support( 'title-tag' );
        add_theme_support( 'custom-logo', array( 'height' =>110, 'width' =>200 ) );

        // Habilitando suporte a tradução

        $textdomain = 'wpseguros';
        load_theme_textdomain( $textdomain, get_stylesheet_directory() . '/languages/' );
        load_theme_textdomain( $textdomain, get_template_directory() . '/languages/' );

        // Suporte ao Gutenberg
        add_theme_support( 'align-wide' );

        add_theme_support( 'editor-styles' );
        add_editor_style( 'css/style-editor.css' );


    }
add_action('after_setup_theme', 'wpseguros_config', 0);

    add_theme_support( 'wp-block-styles' );

    // Registrando Sidebars
    add_action( 'widgets_init', 'wpseguros_sidebars' );
    function wpseguros_sidebars(){
        register_sidebar(
            array(
                'name' => __('Home Page Sidebar', 'wpseguros'),
                'id' => 'sidebar-1',
                'description' => __('Sidebar to be used on Home Page', 'wpseguros'),
                'before_widget' => '<div class="widget-wrapper">',
                'after_widget' => '</div>',
                'before-title' => '<h2 class=" widget-title">',
                'after-title' => '</h2>'

            )
        );
        register_sidebar(
            array(
                'name' => __('Blog Sidebar', 'wpseguros'),
                'id' => 'sidebar-2',
                'description' => __('Sidebar to be used on Blog Page', 'wpseguros'),
                'before_widget' => '<div class="widget-wrapper">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widget-title">',
                'after_title' => '</h2>'
            )
        );
        register_sidebar(
            array(
                'name' => __('Services 1', 'wpseguros'),
                'id' => 'services-1',
                'description' => __('First Services Area.', 'wpseguros'),
                'before_widget' => '<div class="widget-wrapper">',
                'after_widget' => '</div>',
                'before-title' => '<h2 class=" widget-title">',
                'after-title' => '</h2>'


            )
        );
        register_sidebar(
            array(
                'name' => __('Services 2', 'wpseguros'),
                'id' => 'services-2',
                'description' => __('Second Services Area.', 'wpseguros'),
                'before_widget' => '<div class="widget-wrapper">',
                'after_widget' => '</div>',
                'before-title' => '<h2 class=" widget-title">',
                'after-title' => '</h2>'


            )
        );
        register_sidebar(
            array(
                'name' => __('Services 3', 'wpseguros'),
                'id' => 'services-3',
                'description' => __('Third Services Area.', 'wpseguros'),
                'before_widget' => '<div class="widget-wrapper">',
                'after_widget' => '</div>',
                'before-title' => '<h2 class=" widget-title">',
                'after-title' => '</h2>'


            )
        );
        register_sidebar(
            array(
                'name' => __('Social Icons', 'wpseguros'),
                'id' => 'social-media',
                'description' => __('Place your media icons here', 'wpseguros'),
                'before_widget' => '<div class="widget-wrapper">',
                'after_widget' => '</div>',
                'before_title' => '<h2 class="widget-title">',
                'after_title' => '</h2>'
            )
        );

    }