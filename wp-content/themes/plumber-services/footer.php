<?php
/**
 * Displaying Footer.
 * @package Plumber Services
 */
?>
<footer role="contentinfo">
	<?php
		get_template_part( 'template-parts/footer/footer', 'widgets' );
		
		get_template_part( 'template-parts/footer/site', 'info' );
	?>
</footer>

<?php wp_footer(); ?>

</body>
</html>