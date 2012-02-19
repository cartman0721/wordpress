<?php
/**
 * Template Name: 链接页面 (Links)
 *
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


get_header();
?>
<div id="wrap">
	<div id="header" class="box">
		<div id="caption" class="icon">
			<?php philnaBlogTitleAndDesc(); ?>
		</div>
		<?php wp_page_menu('show_home=1&menu_class=navigation'); ?>
		<div class="clear"></div>
	</div>
	<div id="content">
		<div id="post-<?php the_ID(); ?>" <?php post_class();?>>
		<h1 class="post_title"><a class="icon" href="<?php the_permalink(); ?>" rel="bookmark inlinks permalink" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
		<div class="postinfo">
			<div class="left">
				<span class="date icon"><?php the_time(__('F jS, Y', YHL)); ?></span>
				<span class="author icon"><?php the_author_posts_link(); ?></span>
			</div>
			<div class="right">
			<?php edit_post_link(__('Edit', YHL), '<span class="edit_link icon">', '</span>'); ?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="post_content content">
			<!-- List all links -->
			<div id="linkcat">
				<ul id="bookmarks">
					<?php wp_list_bookmarks('title_li=&categorize=0&orderby=rand'); ?>
				</ul>
				<div class="clear"></div>
			</div>
			<?php the_content(__('Read more...', YHL)); ?>
			<div class="clear"></div>
			<?php wp_link_pages('before=<div class="content_pages icon"><strong>'. __('Pages:', YHL).'&after=</strong></div>'); ?>
		</div>
	</div><?php /* end post */?>
	<!-- no comments. just list the links -->
	</div>
<?php get_footer(); ?>