<?php
/**
 * base template
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
		<?php include_once TEMPLATEPATH . '/templates/notice.php';?>
		<?php include_once TEMPLATEPATH . '/loop.php';?>
	</div>
<?php get_footer(); ?>