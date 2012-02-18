<?php
/**
 * Retrieves and creates the wp-config.php file.
 *
 * The permissions for the base directory must allow for writing files in order
 * for the wp-config.php to be created using this page.
 *
 * @internal This file must be parsable by PHP4.
 *
 * @package WordPress
 * @subpackage Administration
 */

/**
 * We are installing.
 *
 * @package WordPress
 */
define('WP_INSTALLING', true);

/**
 * We are blissfully unaware of anything.
 */
define('WP_SETUP_CONFIG', true);

/**
 * Disable error reporting
 *
 * Set this to error_reporting( E_ALL ) or error_reporting( E_ALL | E_STRICT ) for debugging
 */
error_reporting(0);

/**#@+
 * These three defines are required to allow us to use require_wp_db() to load
 * the database class while being wp-content/db.php aware.
 * @ignore
 */
define('ABSPATH', dirname(dirname(__FILE__)).'/');
define('WPINC', 'wp-includes');
define('WP_CONTENT_DIR', ABSPATH . 'wp-content');
define('WP_DEBUG', false);
/**#@-*/

require_once(ABSPATH . WPINC . '/load.php');
require_once(ABSPATH . WPINC . '/version.php');
wp_check_php_mysql_versions();

require_once(ABSPATH . WPINC . '/compat.php');
require_once(ABSPATH . WPINC . '/functions.php');
require_once(ABSPATH . WPINC . '/class-wp-error.php');

if (!file_exists(ABSPATH . 'wp-config-sample.php'))
	wp_die('注意！文件 wp-config-sample.php 不存在。请重新上传这个文件。');

$configFile = file(ABSPATH . 'wp-config-sample.php');

// Check if wp-config.php has been created
if (file_exists(ABSPATH . 'wp-config.php'))
	wp_die("<p>文件 'wp-config.php' 已经存在。如果您需要修改该文件的设置，请先删除它，然后 <a href='install.php'>重新开始安装</a>。</p>");

// Check if wp-config.php exists above the root directory but is not part of another install
if (file_exists(ABSPATH . '../wp-config.php') && ! file_exists(ABSPATH . '../wp-settings.php'))
	wp_die("<p>文件 'wp-config.php' 已经存在于您的 WordPress 的上一级文件夹中。如果您需要修改该文件的设置，请先删除它，然后 <a href='install.php'>重新开始安装</a>。</p>");

if (isset($_GET['step']))
	$step = $_GET['step'];
else
	$step = 0;

/**
 * Display setup wp-config.php file header.
 *
 * @ignore
 * @since 2.3.0
 * @package WordPress
 * @subpackage Installer_WP_Config
 */
function display_header() {
	header( 'Content-Type: text/html; charset=utf-8' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WordPress &rsaquo; 安装配置文件</title>
<link rel="stylesheet" href="css/install.css" type="text/css" />

</head>
<body>
<h1 id="logo"><img alt="WordPress" src="images/wordpress-logo.png" /></h1>
<?php
}//end function display_header();

switch($step) {
	case 0:
		display_header();
?>

<p>欢迎使用 WordPress 。开始安装前，我们需要一些数据库的相关信息。您需要知道下列信息：</p>
<ol>
	<li>数据库名称</li>
	<li>数据库用户名</li>
	<li>数据库密码</li>
	<li>数据库主机</li>
	<li>数据表前缀（如果您想在同一个数据库里运行多个 WordPress）</li>
</ol>
<p><strong>如果本脚本创建文件不能正常运行，不要担心。这些信息是填入到配置文件中的。您可也可以简单地在文本编辑器中打开 <code>wp-config-sample.php</code>，填入您的信息，然后另存为 <code>wp-config.php</code>。</strong></p>
<p>这些信息是由您的空间商提供的。如果您不知道这些信息，您可以联系您的空间。如果您都准备好了&hellip;</p>

<p class="step"><a href="setup-config.php?step=1<?php if ( isset( $_GET['noapi'] ) ) echo '&amp;noapi'; ?>" class="button">开始</a></p>
<?php
	break;

	case 1:
		display_header();
	?>
<form method="post" action="setup-config.php?step=2">
	<p>您需要在下面输入您的数据库连接信息。如果您不知道，请联系你的空间商。</p>
	<table class="form-table">
		<tr>
			<th scope="row"><label for="dbname">数据库名称</label></th>
			<td><input name="dbname" id="dbname" type="text" size="25" value="wordpress" /></td>
			<td>WP 所使用的数据库的名称。</td>
		</tr>
		<tr>
			<th scope="row"><label for="uname">用户名</label></th>
			<td><input name="uname" id="uname" type="text" size="25" value="username" /></td>
			<td>您的 MySQL 用户名</td>
		</tr>
		<tr>
			<th scope="row"><label for="pwd">密码</label></th>
			<td><input name="pwd" id="pwd" type="text" size="25" value="password" /></td>
			<td>您的 MySQL 密码。</td>
		</tr>
		<tr>
			<th scope="row"><label for="dbhost">数据库主机</label></th>
			<td><input name="dbhost" id="dbhost" type="text" size="25" value="localhost" /></td>
			<td>如果 <code>localhost</code> 不能正常运行，请联系您的空间商。</td>
		</tr>
		<tr>
			<th scope="row"><label for="prefix">数据表前缀</label></th>
			<td><input name="prefix" id="prefix" type="text" id="prefix" value="wp_" size="25" /></td>
			<td>如果您需要多个WordPress使用同一个数据库，您需要修改该项。</td>
		</tr>
	</table>
	<?php if ( isset( $_GET['noapi'] ) ) { ?><input name="noapi" type="hidden" value="true" /><?php } ?>
	<p class="step"><input name="submit" type="submit" value="提交" class="button" /></p>
</form>
<?php
	break;

	case 2:
	$dbname  = trim($_POST['dbname']);
	$uname   = trim($_POST['uname']);
	$passwrd = trim($_POST['pwd']);
	$dbhost  = trim($_POST['dbhost']);
	$prefix  = trim($_POST['prefix']);
	if ( empty($prefix) )
		$prefix = 'wp_';

	// Validate $prefix: it can only contain letters, numbers and underscores
	if ( preg_match( '|[^a-z0-9_]|i', $prefix ) )
		wp_die( /*WP_I18N_BAD_PREFIX*/'<strong>错误</strong>：“数据库前缀”里只能包含数字、字母和下划线。'/*/WP_I18N_BAD_PREFIX*/ );

	// Test the db connection.
	/**#@+
	 * @ignore
	 */
	define('DB_NAME', $dbname);
	define('DB_USER', $uname);
	define('DB_PASSWORD', $passwrd);
	define('DB_HOST', $dbhost);
	/**#@-*/

	// We'll fail here if the values are no good.
	require_wp_db();
	if ( ! empty( $wpdb->error ) ) {
		$back = '<p class="step"><a href="setup-config.php?step=1" onclick="javascript:history.go(-1);return false;" class="button">Try Again</a></p>';
		wp_die( $wpdb->error->get_error_message() . $back );
	}

	// Fetch or generate keys and salts.
	$no_api = isset( $_POST['noapi'] );
	require_once( ABSPATH . WPINC . '/plugin.php' );
	require_once( ABSPATH . WPINC . '/l10n.php' );
	require_once( ABSPATH . WPINC . '/pomo/translations.php' );
	if ( ! $no_api ) {
		require_once( ABSPATH . WPINC . '/class-http.php' );
		require_once( ABSPATH . WPINC . '/http.php' );
		wp_fix_server_vars();
		/**#@+
		 * @ignore
		 */
		function get_bloginfo() {
			return ( ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . str_replace( $_SERVER['PHP_SELF'], '/wp-admin/setup-config.php', '' ) );
		}
		/**#@-*/
		$secret_keys = wp_remote_get( 'https://api.wordpress.org/secret-key/1.1/salt/' );
	}

	if ( $no_api || is_wp_error( $secret_keys ) ) {
		$secret_keys = array();
		require_once( ABSPATH . WPINC . '/pluggable.php' );
		for ( $i = 0; $i < 8; $i++ ) {
			$secret_keys[] = wp_generate_password( 64, true, true );
		}
	} else {
		$secret_keys = explode( "\n", wp_remote_retrieve_body( $secret_keys ) );
		foreach ( $secret_keys as $k => $v ) {
			$secret_keys[$k] = substr( $v, 28, 64 );
		}
	}
	$key = 0;

	foreach ($configFile as $line_num => $line) {
		switch (substr($line,0,16)) {
			case "define('DB_NAME'":
				$configFile[$line_num] = str_replace("database_name_here", $dbname, $line);
				break;
			case "define('DB_USER'":
				$configFile[$line_num] = str_replace("'username_here'", "'$uname'", $line);
				break;
			case "define('DB_PASSW":
				$configFile[$line_num] = str_replace("'password_here'", "'$passwrd'", $line);
				break;
			case "define('DB_HOST'":
				$configFile[$line_num] = str_replace("localhost", $dbhost, $line);
				break;
			case '$table_prefix  =':
				$configFile[$line_num] = str_replace('wp_', $prefix, $line);
				break;
			case "define('AUTH_KEY":
			case "define('SECURE_A":
			case "define('LOGGED_I":
			case "define('NONCE_KE":
			case "define('AUTH_SAL":
			case "define('SECURE_A":
			case "define('LOGGED_I":
			case "define('NONCE_SA":
				$configFile[$line_num] = str_replace('put your unique phrase here', $secret_keys[$key++], $line );
				break;
		}
	}
	if ( ! is_writable(ABSPATH) ) :
		display_header();
?>
<p>对不起，您的 <code>wp-config.php</code> 文件不可写。</p>
<p>您可以自己创建一个 <code>wp-config.php</code> 文件，然后将以下内容复制进去。</p>
<textarea cols="98" rows="15" class="code"><?php
		foreach( $configFile as $line ) {
			echo htmlentities($line, ENT_COMPAT, 'UTF-8');
		}
?></textarea>
<p>在您完成以上操作之后，点击“开始安装”按钮。</p>
<p class="step"><a href="install.php" class="button">开始安装</a></p>
<?php
	else :
		$handle = fopen(ABSPATH . 'wp-config.php', 'w');
		foreach( $configFile as $line ) {
			fwrite($handle, $line);
		}
		fclose($handle);
		chmod(ABSPATH . 'wp-config.php', 0666);
		display_header();
?>
<p>很好！您已经完成了安装的一部分。WordPress 已经连接上数据库了。如果您已经准备好了，现在我们&hellip;</p>

<p class="step"><a href="install.php" class="button">开始安装</a></p>
<?php
	endif;
	break;
}
?>
</body>
</html>
