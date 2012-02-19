<?php
/**
 * footer
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

 /* It would be great if you’d leave the link back to my site in the footer */

// no direct access
defined('PHILNA') or die('Restricted access -- PhilNa2 gorgeous design by yinheli < http://philna.com/ >');

is_404() || get_sidebar(); // if 404 page, no sidebar!
?>
<!-- footer -->
<div id="footer">
	<div id="footer_content" class="box content">
		<a id="top" rel="nofollow" href="#header">TOP</a>
		<p>
		<a id="powered" class="icon" title="<?php _e('powered by WordPress', YHL); ?>" href="http://wordpress.org">WordPress</a>
		Copyright &copy; <?php echo date('Y'),' '; bloginfo('name'); ?><sup>&reg;</sup>
		<?php do_action('philnaFooterContent'); ?>
		</p>
		<p id="footerinfo"><?php _e('Theme PhilNa2 gorgeous design by <a rel="acquaintance themeAuthor" href="http://philna.com" title="The author of PhilNa2">yinheli</a>.', YHL); do_action('philnaFooterInfo'); ?></p>
		<!-- <p><span id="loadstate"><?php _e('Page load: ', YHL); //echo get_num_queries(), 'queries.'; ?> <?php timer_stop(1); ?> seconds.</span></p> -->
	</div>
</div>
<div class="clear"></div>
</div><!--#wrap-->
<?php wp_footer(); ?>
</body>
</html>