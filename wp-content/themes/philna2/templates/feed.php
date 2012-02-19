<?php
/**
 * feed box
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
<div id="feedbox" class="box">
<div id="subscribe" class="left">
	<a id="feedrss" title="<?php _e('Subscribe to this blog...', YHL); ?>" href="<?php echo $GLOBALS['philnaopt']['feed_url']; ?>" rel="bookmark"><span class="icon"><?php _e('<abbr title="Really Simple Syndication">RSS</abbr> feed', YHL); ?></span></a>
	<?php if( $GLOBALS['philnaopt']['feed_email'] && $GLOBALS['philnaopt']['feed_url_email'] ): ?>
	<a id="feedemail" title="<?php _e('Subscribe to this blog via email...', YHL); ?>" href="<?php echo $GLOBALS['philnaopt']['feed_url_email']; ?>" rel="bookmark"><span class="icon"><?php _e('Email feed', YHL); ?></span></a>
	<?php endif; ?>
</div>
<div id="readers" class="right">
	<ul>
		<li id="google_reader"><a rel="external nofollow" class="reader" title="<?php _e('Subscribe with ', YHL); _e('Google', YHL); ?>" href="http://fusion.google.com/add?feedurl=<?php echo $GLOBALS['philnaopt']['feed_url']; ?>"><span class="icon"><?php _e('Google', YHL); ?></span></a></li>
		<li id="xianguo_reader"><a rel="external nofollow" class="reader" title="<?php _e('Subscribe with ', YHL); _e('Xian Guo', YHL); ?>" href="http://www.xianguo.com/subscribe.php?url=<?php echo $GLOBALS['philnaopt']['feed_url']; ?>"><span class="icon"><?php _e('Xian Guo', YHL); ?></span></a></li>
		<li id="qqemail_reader"><a rel="external nofollow" class="reader" title="<?php _e('Subscribe with ', YHL); _e('QQ email', YHL); ?>" href="http://mail.qq.com/cgi-bin/feed?u=<?php echo $GLOBALS['philnaopt']['feed_url']; ?>"><span class="icon"><?php _e('QQ Email', YHL); ?></span></a></li>
		<li id="yahoo_reader"><a rel="external nofollow" class="reader" title="<?php _e('Subscribe with ', YHL); _e('My Yahoo!', YHL); ?>" href="http://add.my.yahoo.com/rss?url=<?php echo $GLOBALS['philnaopt']['feed_url']; ?>"><span class="icon"><?php _e('My Yahoo!', YHL); ?></span></a></li>
	</ul>
	<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
