<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage ViewR
 * @since ViewR 1.0
 */
?>

<!--
	** Problem:
	* The VIEW:R WordPress theme is designed to require a thumbnail for ever post. 
	When a post exerpt is available on a page, for instance the archives page, 
	the picture is shown with the post date or review rating displayed over the thumbnail.
	This style is nice, but if a thumbnail is not used, the date/rating is instead displayed
	over the title and blurb text from the post.
	
	** Solution:
	* Moved postinfo div into the if statement determining whether or not a thumbnail was used.
	* Created an else clause to produce the same date/rating box but with added css style overrides 
	to display it inline with the text and with nice looking margins.
	* This same statement is reproduced for all span sizes
	
	** Status: Untested
	
	** Alex: alexalspach@gmail.com
-->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
    	<?php if ( has_post_thumbnail() ) { ?>
			<div class="singlethumb"><div class="postinfo"><?php get_rateorpostdate(); ?></div>
			<?php the_post_thumbnail('ca_thumb-large', array('title' => get_the_title(), 'class' => "singlepostimg", )); ?>
			</div>
		<?php } 
		else { ?>
			<div style="display: inline; position: relative; float: left; margin-bottom: 5px; margin-right: 10px;" class="postinfo"><?php get_rateorpostdate(); ?></div>
		<?php } ?>
		
        <h1><?php the_title(); ?></h1>
        <hr class="caline" />
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'viewr' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
    <?php
if ( has_tag() ) { ?>
<div id="subhead" class="taglist"><?php the_tags('','',''); ?><div class="clearfix"></div></div>
<?php } ?>
		<?php edit_post_link( __( 'Edit', 'viewr' ), '<span class="edit-link">', '</span>' ); ?>

		<?php if ( get_the_author_meta( 'description' ) && ( ! function_exists( 'is_multi_author' ) || is_multi_author() ) ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries ?>
		<div id="author-info">
			<div id="author-avatar">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyeleven_author_bio_avatar_size', 68 ) ); ?>
			</div><!-- #author-avatar -->
			<div id="author-description">
				<h2><?php printf( __( 'About the author: %s', 'viewr' ), get_the_author() ); ?></h2>
				<?php the_author_meta( 'description' ); ?>
				<div id="author-link">
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
						<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'viewr' ), get_the_author() ); ?>
					</a>
				</div><!-- #author-link	-->
			</div><!-- #author-description -->
            <div class="clearfix"></div>
		</div><!-- #entry-author-info -->
		<?php endif; ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
