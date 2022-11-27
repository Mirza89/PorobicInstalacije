<?php
/**
 * Display Header.
 * @package Plumber Services
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}?>
	<header role="banner">
		<a class="screen-reader-text skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'plumber-services' ); ?></a>
		<div class="header-box ps-lg-5 ps-md-4">
			<div class="row m-0">
				<div class="col-lg-3 col-md-3 align-self-center ps-lg-5">
					<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
				</div>
				<div class="col-lg-9 col-md-9 align-self-center pe-0">
					<?php  get_template_part( 'template-parts/header/top', 'bar' ); ?>
					<div class="menu-section ps-lg-5">
						<div class="row m-0">
							<div class="col-lg-8 col-md-6 col-3 align-self-center">
								<div class="<?php if( get_theme_mod( 'plumber_services_sticky_header', false) != '') { ?>sticky-menubox<?php } else { ?>close-sticky <?php } ?>">
						    		<?php get_template_part( 'template-parts/navigation/site', 'nav' ); ?>
								</div>
							</div>
							<?php if(get_theme_mod('plumber_services_phoneno') != '' || get_theme_mod('plumber_services_phone_text') != ''){ ?>
								<div class="col-lg-4 col-md-6 col-9 phone pe-md-5">
									<div class="row">
										<div class="col-lg-2 col-md-2 align-self-center">
											<i class="fas fa-phone"></i>
										</div>
										<div class="col-lg-10 col-md-10 align-self-center">
											<?php if(get_theme_mod('plumber_services_phone_text') != ''){?>
												<span class="phone-text"><?php echo esc_html(get_theme_mod('plumber_services_phone_text')); ?></span>
											<?php }?>
											<?php if(get_theme_mod('plumber_services_phoneno') != ''){?>
												<a href="tel:<?php echo esc_attr(get_theme_mod('plumber_services_phoneno')); ?>"><?php echo esc_html(get_theme_mod('plumber_services_phoneno')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('plumber_services_phoneno')); ?></span></a>
											<?php }?>
										</div>
									</div>
								</div>
					        <?php }?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>