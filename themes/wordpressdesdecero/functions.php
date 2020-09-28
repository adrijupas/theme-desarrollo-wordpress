<?php 

function saludo(){
    return 'hola';
}

//registramos un menu
function agregar_menu(){

register_nav_menu('principal',__('principal'));

}

//enganchamos el menu
add_action('init','agregar_menu');

//funcion para mostrar menu 
function mostrar_menu(){

wp_nav_menu([
    'principal' => 'principal'
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





?>