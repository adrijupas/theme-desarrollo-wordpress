<?php get_header() ?>
  <div class="container">
    <!-- Example row of columns -->
    <div class="row">
      <?php 
        if(have_posts()){
          while(have_posts()){
            the_post(); ?>

              <div class="col-md-4 sm-6 lg-4">
                <figure class="list-posts">
                <?php if ( has_post_thumbnail() ) : ?>
                  <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php the_post_thumbnail('medium'); ?>
                  </a>
                <?php endif; ?>

                </figure>
                  <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                  <div><?php the_excerpt  () ?></div>
                  <p><a class="btn btn-secondary" href="<?php the_permalink() ?>" role="button">Ver detalles &raquo;</a></p>
              </div>
              

            <?php  
          }
          ?>
          <div class="nav-previous alignleft"><?php next_posts_link( 'Artículos antiguos' ); ?></div>

          <div class="nav-next alignright"><?php previous_posts_link( 'Artículos Recientes' ); ?></div>
<?php  

        }else{
          echo 'no tienes ningun post';
        }
      
      ?>
    </div>  

   

  </div> <!-- /container -->

</main>

<?php get_footer() ?>
