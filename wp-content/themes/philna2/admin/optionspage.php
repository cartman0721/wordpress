<?php
/**
 * display options
 * @version $Id$
 */

// no direct access
defined('PHILNA') or die('Restricted access -- PhilNa2 gorgeous design by yinheli < http://philna.com/ >');

$title = __('PhilNa2 Settings', YHL);
screen_icon();
?>
<div class="wrap">
<h2><?php echo esc_html( $title ); ?></h2>
<?php

$msg = <<<END
<div id="message" class="updated fade">
<p><strong>%s</strong></p>
</div>
END;

$o = &$GLOBALS['philnaopt'];

// do save
if(isset($_POST['Submit']) && isset($_POST['savephilnaopt'])){
	$this->save($_POST); // $this  = class PhilNaAdmin
	printf($msg, __('Settings saved.', YHL));
	$o->reGet(); // reget the options form db
}
?>
	<form action="" method="post" style="background-color: #f1f1f1;">
	<table class="form-table">
	<tbody>
		<tr valign="top" style="border-bottom: 2px solid #fff;">
			<th scope="row"><?php _e('<h5>Meta</h5><em>Just in effect homepage</em>',YHL);?></th>
			<td class="form-field">
				<?php _e('Keywords',YHL); ?>
				<label for="keyword"><?php _e('( Separate keywords with commas )', YHL); ?></label><br/>
				<input type="text" name="keywords" id="keyword" class="code" value="<?php echo($o['keywords']); ?>"><br/><br/>
				<?php _e('Description',YHL); ?>
				<label for="desc"><?php _e('( Main decription for your blog )', YHL); ?></label><br/>
				<input type="text" name="description" id="desc" class="code" value="<?php echo($o['description']); ?>"><br/>
			</td>
		</tr>
		<tr valign="top" style="border-bottom: 2px solid #fff;">
			<th scope="row"><?php _e('<h5>Search Settings</h5>',YHL);?></th>
			<td>
				<input id="google_cse" name="google_cse" type="checkbox" value="checkbox" <?php if($o['google_cse']) echo "checked='checked'"; ?> />
				<label for="google_cse"><?php _e('Using google custom search engine.', YHL); ?>	</label><br/>
				<?php _e('CX:', YHL);?>
				<input type="text" name="google_cse_cx"  size="45" value="<?php echo $o['google_cse_cx'];?>"><br/>
				<?php _e('How to find the CX code?',YHL)?><br/>
				<?php _e('Find <code>name="cx"</code> in the <strong>Search box code</strong> of <a href="http://www.google.com/coop/cse/">Google Custom Search Engine</a>, and type the <code>value</code> here.<br/>For example: <code>011275726292926788974:fezfvqcwgmo</code>', YHL); ?>
			</td>
		</tr>
		<tr valign="top" style="border-bottom: 2px solid #fff;">
			<th scope="row"><?php _e('<h5>Notice</h5><em>HTML enabled </em>',YHL); ?></th>
			<td>
				<?php _e('Homepage notice',YHL); ?><br/>
				<input id="notice" name="notice" type="checkbox" value="checkbox"<?php if($o['notice']) echo "checked='checked'"; ?> />
				<label for="notice"><?php _e('This notice bar will display at the top of posts on homepage. ',YHL); ?></label>
				<p>
					<textarea name="notice_content" rows="5" cols="50" class="large-text"><?php echo $o['notice_content']; ?></textarea>
				</p>
			</td>
		</tr>
		<tr valign="top" style="border-bottom: 2px solid #fff;">
			<th scope="row"><?php _e('<h5>Advertisement</h5><em>This AD will show in single post instead of the \'&lt;!--more--&gt;\' tag</em>. Size: 468x60',YHL); ?></th>
			<td>
				<input id="showad" name="showad" type="checkbox" value="checkbox" <?php echo $o['showad'] ? "checked='checked'" : '';?>/>
				<label for="showad"><?php _e('Show advertisement', YHL); _e(' (Not displayed while doing ajax or the admin logged-in)', YHL); ?></label>
				<p>
					<textarea name="ad" rows="8" cols="50" class="large-text"><?php echo $o['ad']; ?></textarea>
				</p>
			</td>
		</tr>
		<tr valign="top" style="border-bottom: 2px solid #fff;">
			<th scope="row"><?php _e('<h5>Feed Settings</h5>',YHL);?></th>
			<td>
				<input id="feed" name="feed" type="checkbox" value="checkbox" <?php if($o['feed']) echo "checked='checked'"; ?> />
				<label for="feed"><?php _e('Use custom feed.', YHL); ?></label><br/>
				<?php _e('Custom feed URL:', YHL); ?>
				<input type="text" name="feed_url" id="feed_url" style="width:80%;" value="<?php echo $o['feed_url']; ?>"><br/>
				<input id="feed_email" name="feed_email" type="checkbox" value="checkbox" <?php if($o['feed_email']) echo "checked='checked'"; ?> />
				<label for="feed_email"><?php _e('Use E_mail feed.', YHL); ?></label><br/>
				<?php _e('E_mail feed URL:', YHL); ?>
				<input type="text" name="feed_url_email" class="code" style="width:80%;" value="<?php echo $o['feed_url_email']; ?>"><br/>
				<label>
				<input name="rss_additional_show" type="checkbox" value="checkbox" <?php if($o['rss_additional_show']) echo "checked='checked'"; ?> />
				<?php _e('Add custom text in your Rss <em>(such as copyright, advertisement and so on.)</em>', YHL); ?>
				</label>
				<br/>
				<label for="rss_copyright">
				<?php _e('Rss custom text goes here.', YHL); ?>
				</label>
				<br/>
				<textarea name="rss_additional" cols="50" rows="5" style="width:98%;font-size:12px;"><?php echo $o['rss_additional']; ?></textarea>
			</td>
		</tr>
		<tr valign="top" style="border-bottom: 2px solid #fff;">
			<th scope="row"><?php _e('<h5>Header background image</h5>',YHL); ?></th>
			<td>
				<label><?php _e('Select an Image (at least size 920 px by 145 px .You can upload more files to <code>themes\philna2\images\headers</code> :)',YHL); ?><br/>
				<select name="headimg"><?php echo philnaHeadImage('option'); ?></select>
				</label><br/>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><?php _e('<h5>PhilNa say</h5>',YHL); ?></th>
			<td>
			<label>
			<input id="show_philna_say" name="show_philna_say" type="checkbox" <?php if($o['show_philna_say']) echo "checked='checked'"; ?> />
			<?php _e('Show philna say on header',YHL); ?>
			</label><br/>
			<label>
			<?php  _e('Say what?(One sentence per line)',YHL); ?>
			<textarea name="philna_say" id="philna_say" cols="50" rows="15" style="width:98%;font-size:12px;"><?php echo($o['philna_say']); ?></textarea>
			</label>
			</td>
		</tr>
	</tbody>
	</table>
	<p class="submit">
		<input class="button-primary" type="submit" value="<?php _e('Save Changes', YHL); ?>" name="Submit"/>
		<input type="hidden" name="savephilnaopt" value="save" />
	</p>
	</form>

	<div class="encourage" style="background:#e3e3e3; margin-bottom:1em; padding: 5px 12px;">
		<h3>捐赠 ( Donate )</h3>
		<div class="row">
				<p>您可以通过捐赠来支持我的免费开发(开源)工作. 国内用户可以通过<strong><a href="http://www.alipay.com">支付宝</a></strong>. 我的支付宝账号是: yinheli@gmail.com</p>
		</div>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" class="alignright">
			  <input type="hidden" name="cmd" value="_s-xclick">
			  <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
			">
			  <input type="image" src="https://www.paypal.com/en_US/CH/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
			  <img alt="" border="0" src="https://www.paypal.com/zh_XC/i/scr/pixel.gif" width="1" height="1">
		</form>
		<div>
			<p>If you find my work useful and you want to encourage the development of more free resources, you can do it by donating...</p>
		</div>
		<div class="clear"></div>
	</div>
</div>