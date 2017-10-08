<?php
/**
 * @package ThemeGrill
 * @subpackage Radiate
 * @since Radiate 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

   <?php
   if( has_post_thumbnail() ) {
      $image = '';
      $title_attribute = the_title_attribute( 'echo=0' );
      $image .= '<figure class="post-featured-image">';
      $image .= '<a href="' . get_permalink() . '" title="'.$title_attribute.'">';
      $image .= get_the_post_thumbnail( $post->ID, 'featured-image-medium', array( 'title' => $title_attribute, 'alt' => $title_attribute ) ).'</a>';
      $image .= '</figure>';

      echo $image;
   }
   ?>

   <header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<div class="entry-meta">
			<?php 
			if ( 'espresso_events' == get_post_type() && is_front_page() && function_exists( 'espresso_event_date'  ) ) :
				?><span class="posted-on"><?php echo espresso_event_date( '', '', get_the_ID() ); ?></span><?php
			elseif ( 'espresso_events' == get_post_type() && !is_front_page() ) :
				//Display something here
			elseif ( 'espresso_venues' == get_post_type() ) :
				echo radiate_ee_venue_city_state();
			else :
				radiate_posted_on();
			endif ?>
			<?php 	if ( 'espresso_events' == get_post_type() && is_front_page() && function_exists( 'espresso_view_details_btn'  ) ) : ?>	
					<form action="<?php the_permalink(); ?>" method="POST">
						<input id="ticket-selector-submit-<?php the_ID(); ?>-btn" class="ticket-selector-submit-btn view-details-btn" type="submit" value="<?php _e( 'View Details' );?>">
					</form>
					<div class="clear"></div>					
		<?php 	endif; ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Read more <span class="meta-nav">&rarr;</span>', 'radiate' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'radiate' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'radiate' ) );
				if ( $categories_list && radiate_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php echo $categories_list; ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'radiate' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php echo $tags_list; ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'radiate' ), __( '1 Comment', 'radiate' ), __( '% Comments', 'radiate' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'radiate' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
