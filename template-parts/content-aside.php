<?php
/**
 * @package muestra0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <div class="index-box">
       
        <header class="entry-header">
            <?php
            if ( is_sticky() ) {
                echo '<i class="fa fa-thumb-tack sticky-post"></i>';
            }
            ?>		
	</header><!-- .entry-header -->

	<div class="entry-content">  
            <?php the_content(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer continue-reading">
            <?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
                    <?php 
                        muestra0_posted_on();
                        muestra0_entry_comments(); 
                        edit_post_link( esc_html__( 'Edit', 'muestra0' ), '<span class="edit-link">', '</span>' );
                    ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</footer><!-- .entry-footer -->
    </div><!-- .index-box -->
</article><!-- #post-## -->