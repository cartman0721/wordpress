<?php
/**
 * Main sidebar
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

?>
<div id="sidebar">
	<?php
	include_once TEMPLATEPATH . '/searchform.php';
	include_once TEMPLATEPATH . '/templates/feed.php';

	do_action('philnaWidgetsStart'); // widgets start hook

	if( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ): // top widget
	?>
	<div class="widget box icon content">
		<?php philnaWidgetPostsLink($limit = 6); // limit output ?>
	</div>
	<div class="widget box icon content">
		<h3><?php _e('Recent Comments',YHL); ?></h3>
		<ul>
			<?php philnaRecentcomments('number=5&status=approve'); ?>
		</ul>
	</div>
	<?php endif; //widget 1 ?>

	<div class="widget box icon content tag_cloud">
		<h3><?php _e('Tag Cloud',YHL); ?></h3>
		<?php wp_tag_cloud('unit=px&smallest=11&largest=18&order=RAND&number=30');//参数含义:单位(px),最小(11),最大(18),排序(随机) ?>
	</div>
	<div class="center_widget">
		<?php if( !function_exists('dynamic_sidebar') || !dynamic_sidebar(2) ): ?>
		<div class="widget left">
			<div class="center_widger_inner box icon">
				<h3><?php _e('Achive', YHL); ?></h3>
				<ul>
					<?php wp_get_archives('limit=8'); // best limit number to fit your categories ?>
				</ul>
			</div>
		</div>
		<?php endif; //widget 2 ?>
		<?php if( !function_exists('dynamic_sidebar') || !dynamic_sidebar(3) ): ?>
		<div class="widget right">
			<div class="center_widger_inner box icon">
				<h3><?php _e('Categories',YHL); ?></h3>
				<ul>
					<?php wp_list_categories('title_li=&show_last_update=true');//NOTE:2009-09-17 替换为本函数. 停止使用 wp_list_cats 函数  ?>
				</ul>
			</div>
		</div>
		<?php endif; //widget 3 ?>
		<div class="clear"></div>
	</div>
	<?php if( !function_exists('dynamic_sidebar') || !dynamic_sidebar(4) ): ?>
	<div class="widget box icon content">
		<h4><?php _e('Meta',YHL); ?></h4>
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
		</ul>
	</div>
	<?php endif; //widget 4 ?>
</div>
