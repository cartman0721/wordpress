<?php
/**
 * loop
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * Required Version:
 * 	PHP5 or higher
 * 	WordPress 2.9 or higher
 *
 * If you find my work useful and you want to encourage the development of more free resources,
 * you can do it by donating...
 * 	paypal: yinheli@gmail.com
 * 	alipay: yinheli@gmail.com
 *
 * @author yinheli <yinheli@gmail.com>
 * @link http://philna.com/
 * @copyright Copyright (C) 2009 yinheli All rights reserved.
 * @license PhilNa2 is released under the GPL.
 * @version $Id$
 */

// no direct access
defined('PHILNA') or die('Restricted access -- PhilNa2 gorgeous design by yinheli < http://philna.com/ >');

if(is_archive() || is_search()){
	include_once TEMPLATEPATH . '/templates/loophead.php';
}

if( have_posts() ) :
	// post loop start
	do_action('philnaLoopStart'); /* philna hook */
	while( have_posts() ) :
	the_post();

$postTitleTag = is_singular() ? 'h1' : 'h2';
?>

<?php if( is_single() ): ?>	<div id="position" class="box message"><a class="right_arrow icon" title="<?php _e('Back to homepage', YHL); ?>" href="<?php echo get_settings('home'); ?>/"><?php _e('Home', YHL); ?></a> &gt; <?php the_category(', '); ?> &gt; <?php the_title();?></div><?php echo "\n"; endif; ?>
<div id="post-<?php the_ID(); ?>" <?php post_class();?>>
	<<?php echo $postTitleTag; ?> class="post_title"><a class="icon" href="<?php the_permalink(); ?>" rel="bookmark inlinks permalink" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></<?php echo $postTitleTag; ?>>
	<div class="postinfo">
		<div class="left">
			<span class="date icon"><?php the_time(__('F jS, Y', YHL)); ?></span>
			<span class="author icon"><?php the_author_posts_link(); ?></span>
		</div>
		<div class="right">
		<?php if(is_singular()): ?><span id="skiptocomment" class="comments_link"><a href="#comments"><?php _e('Skip to Comments', YHL)?></a></span><?php else: ?><span class="comments_link"><sup>{ </sup><?php comments_popup_link(__('No Comments',YHL), __('1 Comment', YHL), __('% Comments', YHL));?><sub> }</sub></span><?php endif; ?>
		<?php edit_post_link(__('Edit', YHL), '<span class="edit_link icon">', '</span>'); ?>
		</div>
		<div class="clear"></div>
	</div>
	<div class="post_content content">
		<?php
		// if the post has thumbnail, display it in homepage or archive page
		if((is_home() || is_archive()) && has_post_thumbnail()) {
			the_post_thumbnail(); // you may change the size of the thumbnail by use param array(width, height);
		}
		the_content(__('Read more...', YHL));
		?>
		<div class="clear"></div>
		<?php if( is_singular() ) wp_link_pages('before=<div class="content_pages icon"><strong>'. __('Pages:', YHL).'&after=</strong></div>'); ?>
		<?php /* PhilNa hook */ do_action('philnaStatement');?>
	</div>
	<?php if(!is_page()): ?>
	<div class="meta">
		<span class="cat icon"><?php the_category(', ');?></span>
		<?php the_tags('<span class="tag icon">', ', ', '</span>');?>
	</div>
	<?php endif; // meta ?>
</div><?php /* end post */?>
<?php
endwhile;
do_action('philnaEndloop');
include_once TEMPLATEPATH . '/templates/navigation.php';
comments_template();
else: // if no posts
?>
<div class="box error icon">
	<?php
	if(is_search())
		_e('Oh no!. No posts matched your criteria. You may try other keywords.',YHL);
	else
		_e('Oh no! You\'re looking for something which just isn\'t here! Fear not however, errors are to be expected, and luckily there are tools on the sidebar for you to use in your search for what you need.',YHL);
	?>
</div>
<?php endif;?>
