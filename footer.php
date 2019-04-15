<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hermelen-one-page
 */

?>


</div><!-- #content -->
	<footer id="colophon" class="site-footer">
		<?php	get_template_part( 'template-parts/footer-menu', 'Footer nav' ); ?>
		<div class="copyright">
			Développé par <a href="http://hermelen.com/">Hermelen PERIS</a> avec le thème Wordpress <a href="https://underscores.me/">Underscore</a>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
