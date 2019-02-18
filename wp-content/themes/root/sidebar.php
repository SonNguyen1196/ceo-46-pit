<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<?php if ( is_active_sidebar( 'blog_right_1' )  ) : ?>
		<?php dynamic_sidebar( 'blog_right_1' ); ?>
<?php endif; ?>
