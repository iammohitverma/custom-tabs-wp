<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dcube-theme
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<h5 style="text-align:center">Single Posts Template</h5>
<?php the_content(); ?>
</div><!-- #post-<?php the_ID(); ?> -->


