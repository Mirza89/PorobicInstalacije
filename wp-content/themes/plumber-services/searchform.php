<?php
/**
 * Displaying search forms in Plumber Services
 * @package Plumber Services
 */
?>
<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'plumber-services' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'plumber-services' ); ?>" value="<?php echo esc_attr( get_search_query()) ?>" name="s">
	</label> 
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'plumber-services' ); ?>">
</form>