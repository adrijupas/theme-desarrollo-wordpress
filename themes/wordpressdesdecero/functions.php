<?php 

function saludo(){
    return 'hola';
}

//registramos un menu
function agregar_menus(){

register_nav_menus([

    'principal' => __('principal'),
    'footer' => __('footer')

]);
}

//enganchamos el menu
add_action('init','agregar_menus');

//funcion para mostrar menu 
function mostrar_menu_principal(){
wp_nav_menu([
  
        'theme_location'  =>'principal',
        'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
	    'container'       => 'div',
	    'container_class' => 'collapse navbar-collapse',
	    'container_id'    => 'menu_principal',
        'menu_class'      => 'navbar-nav mr-auto',
        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
        'walker'          => new WP_Bootstrap_Navwalker()
]);
}

function mostrar_menu_footer(){
    wp_nav_menu([
      
            'theme_location'  =>'footer',
            'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
	        'container'       => 'div',
	        'container_class' => 'nav',
	        'container_id'    => 'menu_footer',
	        'menu_class'      => 'navbar',
	        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
	        'walker'          => new WP_Bootstrap_Navwalker()
    ]);
    }

// funcion para controlar el excerpt

function excerpt_personalizado($length){
    return 20;
}
add_filter('excerpt_length','excerpt_personalizado');
// añadimos soporte de thumbnails


add_theme_support('post-thumbnails');

//añadimos soporte para custom header 

function imagen_custom_header() {
    $args = array(
        'default-image'  	=> get_template_directory_uri() . '/img/default-image.jpg',
        'default-text-color' => '000',
        'width'          	=> 1000,
        'height'         	=> 250,
        'flex-width'     	=> true,
        'flex-height'    	=> true,
    );
    add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'imagen_custom_header' );

//añadimos soporte a logotipo personalizado

function logo_custom() {
    $defaults = array(
    'height'      => 75,
    'width'       => 300,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
   'unlink-homepage-logo' => true, 
    );
    add_theme_support( 'custom-logo', $defaults );
   }
   add_action( 'after_setup_theme', 'logo_custom' );



// shortcode

function firma_guay(){
    return 'Soy Adrian';
}
add_shortcode('firma','firma_guay');

// incluimos la clase walker para los menus bootstrap
if (!class_exists('wp-bootstrap-navwalker')) {
    require_once(get_template_directory() . '/inc/wp-bootstrap-navwalker.php');
}


// agregamos zona de widgets

function agregar_widgets(){
    register_sidebar([
        'name' => 'Widget footer 1',
        'id'   => 'wf1',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
        
    ]);

    register_sidebar([
        'name' => 'Widget footer 2',
        'id'   => 'wf2',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
        
    ]);

    register_sidebar([
        'name' => 'Widget footer 3',
        'id'   => 'wf3',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
        
    ]);

    register_sidebar([
        'name' => 'Lateral derecho',
        'id'   => 'ld',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
        
    ]);
}

add_action( 'widgets_init', 'agregar_widgets' );

// registramos
wp_register_style('bootstrap', get_theme_file_uri( 'inc/bootstrap.min.css' ) );

wp_register_style('dw_style', get_stylesheet_uri(), array( 'bootstrap') );

//encolamos
function encolar_estilos(){

    wp_enqueue_style( 'dw_style' );

}

// gancho 

add_action('wp_enqueue_scripts','encolar_estilos');

//jquery
wp_register_script( 'jquery', get_theme_file_uri( 'inc/jquery.min.js' ),'','3.5.1', true );

// Javascript

wp_register_script( 'bootstrapjs', get_theme_file_uri( 'inc/bootstrap.min.js' ),['jquery'],'4.5.1', true );



wp_register_script( 'dw_script', get_theme_file_uri( 'script.js' ),['bootstrapjs','jquery'],'', true );

//encolamos

function encolar_script(){

    wp_enqueue_script( 'dw_script' );

}


// gancho

// gancho 

add_action('wp_enqueue_scripts','encolar_script');