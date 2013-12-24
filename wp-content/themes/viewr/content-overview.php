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
<?php 
if ( of_get_option('archive_layout', '' ) == 'wide' ) {
?>
<article class="spanhalf">
<?php if ( has_post_thumbnail() ) { ?><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('ca_thumb-wide', array('title' => get_the_title() )); ?></a><?php } ?>
<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
<span class="pexcerpt"><?php echo wpautop(get_the_clean_excerpt(100)); ?></span>
<?php if ( isset($deepChild) ) { ?><span class="cattag <?php echo $deepChild->slug; ?>"><a href="<?php echo get_category_link( $deepChild->term_id ); ?>" title="<?php echo sprintf( __( "View all posts in %s" ), $deepChild->name ); ?>"><?php echo $deepChild->name; ?></a></span><?php } else { ?><span class="cattag"><a href="#"><?php _e('No category','viewr'); ?></a></span><?php } ?>
<div class="postinfo"><?php get_rateorpostdate(); ?></div>
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
<?php if ( has_post_thumbnail() ) { ?><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('ca_thumb-medium', array('title' => get_the_title() )); ?></a><?php } ?>
<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
<span class="pexcerpt"><?php echo wpautop(get_the_clean_excerpt(100)); ?></span>
<?php if ( isset($deepChild) ) { ?><span class="cattag <?php echo $deepChild->slug; ?>"><a href="<?php echo get_category_link( $deepChild->term_id ); ?>" title="<?php echo sprintf( __( "View all posts in %s" ), $deepChild->name ); ?>"><?php echo $deepChild->name; ?></a></span><?php } else { ?><span class="cattag"><a href="#"><?php _e('No category','viewr'); ?></a></span><?php } ?>
<div class="postinfo"><?php get_rateorpostdate(); ?></div>
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
<?php if ( has_post_thumbnail() ) { ?><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('ca_thumb-complete', array('title' => get_the_title() )); ?></a><?php } ?>
<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
<span class="pexcerpt"><?php echo wpautop(get_the_clean_excerpt(300)); ?></span>
<?php if ( isset($deepChild) ) { ?><span class="cattag <?php echo $deepChild->slug; ?>"><a href="<?php echo get_category_link( $deepChild->term_id ); ?>" title="<?php echo sprintf( __( "View all posts in %s" ), $deepChild->name ); ?>"><?php echo $deepChild->name; ?></a></span><?php } else { ?><span class="cattag"><a href="#"><?php _e('No category','viewr'); ?></a></span><?php } ?>
<div class="postinfo"><?php get_rateorpostdate(); ?></div>
</article>
<?php
}
?>