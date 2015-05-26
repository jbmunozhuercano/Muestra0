<?php
/**
 * @package muestra0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="index-box">
        <?php 
        if( !is_paged() && is_front_page() ) { // Custom template for the first post on the front page
        
            if (has_post_thumbnail()) {
                echo '<div class="small-index-thumbnail clear">';
                echo '<a href="' . get_permalink() . '" title="' . __('Read ', 'my-simone') . get_the_title() . '" rel="bookmark">';
                echo the_post_thumbnail('index-thumb');
                echo '</a>';
                echo '</div>';
            }
        }
        ?>
        <header class="entry-header">
            <?php
            if ( is_sticky() ) {
                echo '<i class="fa fa-thumb-tack sticky-post"></i>';
            }
            ?>
            <?php
            $category_list = get_the_category_list( __(', ', 'muestra0') );
            
            if (muestra0_categorized_blog() ) {
                echo '<div class="category-list">' . $category_list . "</div>";
            }
            
            
            ?>
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
                    <?php 
                        muestra0_posted_on();
                        muestra0_entry_comments(); 
                        edit_post_link( esc_html__( 'Edit', 'muestra0' ), '<span class="edit-link">', '</span>' );
                    ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
        
          <?php
            if ( !is_paged() && is_front_page() ) { ?>
                <div class="entry-content">  
                    <?php the_excerpt(); ?>
                </div><!-- .entry-content -->
                <footer class="entry-footer continue-reading">
                    <?php echo '<a href="' . get_permalink() . '" title="' . esc_html__('Continue Reading ', 'muestra0') . get_the_title() . '" rel="bookmark">Continue Reading<i class="fa fa-arrow-circle-o-right"></i></a>'; ?>
                </footer><!-- .entry-footer -->
            <?php } ?>
	

	
    </div><!-- .index-box -->
</article><!-- #post-## -->