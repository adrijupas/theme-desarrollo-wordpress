<div class="container-fluid  bg-dark text-light border-top border-primary p-2">
  <div class="row">
    <div class="col-sm">
    <?php dynamic_sidebar( 'widget-footer-1' ); ?>
    </div>
    <div class="col-sm">
    <?php dynamic_sidebar( 'widget-footer-2' ); ?>
    </div>
    <div class="col-sm">
    <?php dynamic_sidebar( 'widget-footer-3' ); ?>
    </div>
  </div>
</div>



<footer class="container">
<?php echo saludo() ?>
  <p>&copy; Company 2017-2020 </p>
</footer>
<?php mostrar_menu_footer(); ?>

<?php wp_footer() ?>

</html>
