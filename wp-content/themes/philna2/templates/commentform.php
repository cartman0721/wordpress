<?php
/**
 * comment form
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
<div id="respond" class="box icon content">
	<div id="respond_head">
		<h4><strong><?php _e('Leave a comment', YHL); ?></strong></h4>
		<?php philnaCommentSmilies(); ?>
		<div class="clear"></div>
	</div>
	<form id="commentform" action="<?php bloginfo('url'); ?>/wp-comments-post.php" method="post">
		<div id="commentbox" class="left">
			<textarea class="textfield" rows="12" cols="50" name="comment" id="comment" tabindex="1" title="<?php _e('Support: Ctrl + Enter | Ctrl + S | Alt + S | Alt + Enter',YHL);?>"></textarea>
		</div>
		<div id="comment_author_info" class="right">
			<?php if($user_ID):global $user_email ?>
			<div id="welcome_info">
				<?php echo get_avatar($user_email, 40);?>
				<p>
				<?php _e('Logged in as', YHL); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><strong><?php echo $user_identity; ?></strong></a>.
				<a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="<?php _e('Log out of this account', YHL); ?>"><?php _e('Logout &raquo;', YHL); ?></a>
				</p>
				<p><?php _e('Welcome !',YHL);?></p>
				<div class="clear"></div>
			</div>
			<?php else: ?>
			<?php if($comment_author_email):?>
			<div id="welcome_back">
				<div id="welcome_info">
					<?php echo get_avatar($comment_author_email, 50); ?>
					<p id="welcome_words"><?php printf(__('Hey! %1s, Welcome Back!'), $comment_author); ?></p>
					<p><a id="edit_profile" href="javascript:void(0);"><?php _e('Edit your profile?'); ?></a></p>
					<div class="clear"></div>
				</div>
				<div id="welcome_msg">
					<blockquote><?php echo philnaWelcomeCommentAuthorBack($comment_author_email); ?></blockquote>
				</div>
			</div>
			<?php endif;?>
			<div id="profile" class="<?php echo $comment_author_email ? 'hide' : 'profile'; ?>">
				<div class="row">
				<label for="author" class="small"><?php _e('Name', YHL); if ($req) _e('(required)', YHL); ?></label>
				<input type="text" name="author" id="author" class="textfield" value="<?php echo $comment_author; ?>" size="24" tabindex="2" />
				</div>
				<div class="row">
				<label for="email" class="small"><?php _e('E-Mail (will not be published)', YHL);if ($req) _e('(required)', YHL); ?></label>
				<input type="text" name="email" id="email" class="textfield" value="<?php echo $comment_author_email; ?>" size="24" tabindex="3" />
				</div>
				<div class="row">
				<label for="url" class="small"><?php _e('Website', YHL); ?></label>
				<input type="text" name="url" id="url" class="textfield" value="<?php echo $comment_author_url; ?>" size="24" tabindex="4" />
				</div>
			</div>
			<?php endif; /* end $user_ID */?>
			<div class="row">
				<input name="submit" type="submit" id="submit" class="button bias" tabindex="5" value="<?php _e('Submit Comment', YHL); ?>" />
				<?php comment_id_fields(); ?>
				<?php do_action('comment_form', $post->ID); ?>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
	</form>
</div>

<?php /* philna hook */ do_action('commentAfter'); ?>
<div id="allowed_tags" class="box message icon">
	<?php _e('<strong>Allowed tags:</strong> ',YHL);echo allowed_tags(); ?>
</div>