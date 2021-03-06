<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage ViewR
 * @since ViewR 1.0
 */
global $post;
global $i;
global $fi;
?>
<?php
$categories = get_the_category();
if ( $categories ) {
   $deepChild = get_deep_child_category( $categories );
}
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
	
	** Status: Mostly tested. Works for Span3	
	
	** Alex: alexalspach@gmail.com
	
	
-->

<?php 
if ( of_get_option('archive_layout', '' ) == 'wide' ) {
?>
<article class="spanhalf">

<?php if ( has_post_thumbnail() ) { ?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
	<?php the_post_thumbnail('ca_thumb-wide', array('title' => get_the_title() )); ?>
	</a>
	<div class="postinfo"><?php get_rateorpostdate(); ?></div>
	<?php } 
else { ?>
	<div style="display: inline; position: relative; float: left; margin-bottom: 5px; margin-right: 10px;" class="postinfo"><?php get_rateorpostdate(); ?></div>
<?php } ?>	
	
<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
<span class="pexcerpt"><?php echo wpautop(get_the_clean_excerpt(100)); ?></span>
<?php if ( isset($deepChild) ) { ?><span class="cattag <?php echo $deepChild->slug; ?>"><a href="<?php echo get_category_link( $deepChild->term_id ); ?>" title="<?php echo sprintf( __( "View all posts in %s" ), $deepChild->name ); ?>"><?php echo $deepChild->name; ?></a></span><?php } else { ?><span class="cattag"><a href="#"><?php _e('No category','viewr'); ?></a></span><?php } ?>

</article>
<?php
if ( $fi == 2 ) { echo '<div class="clearfix"></div>'; $fi = 1; } else { $fi++; }
?>
<?php
}
?>
<?php 
if ( of_get_option('archive_layout', '' ) == 'medium' ) {
?>
<article class="span3">

<!-- If statement augmented here, also -->
<?php if ( has_post_thumbnail() ) { ?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
	<?php the_post_thumbnail('ca_thumb-medium', array('title' => get_the_title() )); ?>
	</a>
	<div class="postinfo"><?php get_rateorpostdate(); ?></div>
	<?php } 
else { ?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
	
	 <?php
	/* $default_attr = array(
	'src'	=> '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/default_thumb.jpg" />',
	'class'	=> "ca_thumb-medium",
	'alt'	=> get_the_title(),
	);
	
	the_post_thumbnail( 'ca_thumb-medium', $default_attr ); 
	*/?>
	
	<?php echo '<img itemprop="photo" width="300" height="177" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/default_thumb.jpg" class="attachment-ca_thumb-medium wp-post-image" />'; ?>
	
	</a>
	<div class="postinfo"><?php get_rateorpostdate(); ?></div>
	
<?php } ?>	
	
<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
<span class="pexcerpt"><?php echo wpautop(get_the_clean_excerpt(100)); ?></span>
<?php if ( isset($deepChild) ) { ?><span class="cattag <?php echo $deepChild->slug; ?>"><a href="<?php echo get_category_link( $deepChild->term_id ); ?>" title="<?php echo sprintf( __( "View all posts in %s" ), $deepChild->name ); ?>"><?php echo $deepChild->name; ?></a></span><?php } else { ?><span class="cattag"><a href="#"><?php _e('No category','viewr'); ?></a></span><?php } ?>

</article>
<?php
if ( $fi == 3 ) { echo '<div class="clearfix"></div>'; $fi = 1; } else { $fi++; }
?>
<?php
}
?>
<?php 
if ( of_get_option('archive_layout', '' ) == 'complete' ) {
?>
<article class="span9">

<!-- If statement augmented here, also -->
<?php if ( has_post_thumbnail() ) { ?>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
	<?php the_post_thumbnail('ca_thumb-complete', array('title' => get_the_title() )); ?>
	</a>
	<div class="postinfo"><?php get_rateorpostdate(); ?></div>
	<?php } 
else { 	?>
	<div style="display: inline; position: relative; float: left; margin-bottom: 5px; margin-right: 10px;" class="postinfo"><?php get_rateorpostdate(); ?></div>
<?php } ?>	

<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
<span class="pexcerpt"><?php echo wpautop(get_the_clean_excerpt(300)); ?></span>
<?php if ( isset($deepChild) ) { ?><span class="cattag <?php echo $deepChild->slug; ?>"><a href="<?php echo get_category_link( $deepChild->term_id ); ?>" title="<?php echo sprintf( __( "View all posts in %s" ), $deepChild->name ); ?>"><?php echo $deepChild->name; ?></a></span><?php } else { ?><span class="cattag"><a href="#"><?php _e('No category','viewr'); ?></a></span><?php } ?>

</article>
<?php
}
?>