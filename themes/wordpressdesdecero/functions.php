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



?>