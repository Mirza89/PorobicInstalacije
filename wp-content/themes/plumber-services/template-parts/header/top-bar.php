<?php 
/*
* Display Top Bar
*/
?>
<?php if( get_theme_mod('plumber_services_show_topbar', false) != false){ ?>
  <div class="top-header px-lg-5">
    <div class="container">
      <div class="row m-0">
        <div class="col-lg-5 col-md-6 text-md-start text-center contact-detail">
          <?php if(get_theme_mod('plumber_services_email') != ''){ ?>
            <a href="mailto:<?php echo esc_attr(get_theme_mod('plumber_services_email')); ?>"><span><?php echo esc_html('Email Us:', 'plumber-services'); ?></span> <?php echo esc_html(get_theme_mod('plumber_services_email')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('plumber_services_email')); ?></span></a>
          <?php }?>
        </div>
        <div class="col-lg-7 col-md-6 align-self-center contact-detail">
          <?php if( get_theme_mod( 'plumber_services_timings' ) != '') { ?>
            <p class="text-md-start text-center"><i class="fas fa-comment me-2"></i><?php echo esc_html( get_theme_mod('plumber_services_timings') ); ?></p>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
<?php }?>