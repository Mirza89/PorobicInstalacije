<?php
/**
 * Template Name: Home Custom Page
 */
?>

<?php get_header(); ?>

<main id="main" role="main">
  <?php do_action( 'plumber_services_above_slider' ); ?>

  <?php if( get_theme_mod('plumber_services_slider_hide_show', false) != ''){ ?> 
    <section id="slider" class="m-0 p-0 mw-100">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel"> 
        <?php $plumber_services_content_pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'plumber_services_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $plumber_services_content_pages[] = $mod;
            }
          }
          if( !empty($plumber_services_content_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $plumber_services_content_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php the_post_thumbnail(); ?>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <h1><?php the_title(); ?></h1>
                  <p class="my-2"><?php $excerpt = get_the_excerpt(); echo esc_html( plumber_services_string_limit_words( $excerpt,15 ) ); ?></p>
                  <div class="read-btn mt-4">
                    <a href="<?php echo esc_url(get_permalink()); ?>"><span><?php esc_html_e( 'Read More', 'plumber-services' ); ?></span><span class="screen-reader-text"><?php esc_html_e( 'Read More', 'plumber-services' );?></span></a>
                  </div>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
          <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span><span class="screen-reader-text"><?php esc_html_e( 'Previous', 'plumber-services' );?></span>
        </a>
        <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
          <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span><span class="screen-reader-text"><?php esc_html_e( 'Next', 'plumber-services' );?></span>
        </a>
      </div>   
      <div class="clearfix"></div>
    </section>
  <?php }?>

  <?php do_action( 'plumber_services_below_slider' ); ?>

  <?php if( get_theme_mod('plumber_services_section_title') != '' || get_theme_mod('plumber_services_service_category') != ''){ ?>
    <section id="service-section" class="py-5">
      <div class="container">     
        <div class="service-head mb-5 text-center">
          <?php if( get_theme_mod('plumber_services_section_title') != ''){ ?>
            <h2 class="text-center"><?php echo esc_html(get_theme_mod('plumber_services_section_title')); ?></h2>
          <?php }?>
        </div>
        <div class="row">
          <?php $plumber_services_catData =  get_theme_mod('plumber_services_service_category');
          if($plumber_services_catData){
            $page_query = new WP_Query(array( 'category_name' => esc_html($plumber_services_catData,'plumber-services'))); ?>
            <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>  
              <div class="col-lg-4 col-md-4">
                <div class="service-box mb-4">
                  <div class="service-img">
                   <?php the_post_thumbnail(); ?>
                 </div>
                  <div class="service-content">
                    <h3><a href="<?php echo esc_url( get_permalink() );?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
                    <p><?php $excerpt = get_the_excerpt(); echo esc_html( plumber_services_string_limit_words( $excerpt,12 ) ); ?></p>
                    <div class="service-btn mt-3">
                      <a href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e( 'Read More', 'plumber-services' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Read More', 'plumber-services' );?></span></a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile; 
            wp_reset_postdata();
          } ?>
        </div>
      </div>
    </section>
  <?php }?>
  <?php do_action( 'plumber_services_below_best_sellers' ); ?>

  <div class="container entry-content">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
</main>
<?php get_footer(); ?>