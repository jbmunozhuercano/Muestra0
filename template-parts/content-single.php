<?php
/**
 * @package muestra0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php
        if ( has_post_thumbnail() ) {
            echo '<div class="single-post-thumbnail clear">';
                echo '<div class="image-shifter">';
                echo the_post_thumbnail('large-thumb');
                echo '</div>';
            echo '</div>';
        }
        ?>
        <header class="entry-header">
                
                <?php muestra0_entry_header(); ?>
            
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php muestra0_posted_on(); ?>
                        <?php muestra0_entry_comments(); ?>                        
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'muestra0' ),
				'after'  => '</div>',
			) );
		?>
            
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php muestra0_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
