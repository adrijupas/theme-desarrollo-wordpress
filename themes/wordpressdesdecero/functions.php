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

// shortcode

function firma_guay(){
    return 'Soy Adrian';
}
add_shortcode('firma','firma_guay');

// incluimos la clase walker para los menus bootstrap
if (!class_exists('wp_bootstrap_navwalker')) {
    require_once(get_template_directory() . '/inc/wp_bootstrap_navwalker.php');
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
wp_register_style(
    'bootstrap', // nombre
    get_theme_file_uri( 'inc/bootstrap.min.css' ) // URL
);

wp_register_style(
    'dw_style',
    get_stylesheet_uri(),
    array( 'bootstrap') // array de dependencias
);

//encolamos
function encolar_estilos(){
wp_enqueue_style( 'dw_style' );
}

// gancho 

add_action('wp_enqueue_scripts','encolar_estilos');