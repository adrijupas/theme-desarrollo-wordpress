<?php 

get_header();

if(have_posts()):
    while(have_posts()):
        the_post();
// escrin¡bimos lo que va en el bucle
?>
<ul>
    <li>
        <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
        <p><span><?php the_date(); ?></span></p>
        <p><span><?php the_author(); ?></span></p>
        <p><span><?php the_category(); ?></span></p>
        <p><span><?php the_excerpt(); ?></span></p>
    </li>
<hr>
</ul>

<?php
//hasta aqui lo que va dentro del bucle
    endwhile;    

else:
    echo 'no hay resultados para su busqueda';

endif;

get_footer();


?>