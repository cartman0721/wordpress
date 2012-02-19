<?php
/**
 * functions
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
defined('ABSPATH') or die('Restricted access -- PhilNa2 gorgeous design by yinheli < http://philna.com/ >');

/*
Note:
	加载顺序:
	1.读取主题配置(部分自定义函数要使用)
	2.加载自定义函数
	3.Ajax判断(自动调用已定义的函数)
*/


// debug all
//error_reporting(E_ALL);

// hide error (note: 开启隐藏所有错误时, 一旦出现严重错误将导致'白屏')
error_reporting(0);

define('YHL', 'philna2');
define('PHILNA', 'philna2');
define('THEME_NAME', 'PhilNa2');
define('THEME_AUTHOR', 'yinheli');

// debug - if true the errors will display below footer when admin login
define('PHILNA_DEBUG', false);

// app dir
define('PHILNA_APP', TEMPLATEPATH.'/app');
// custom-functions dir
define('PHILNA_CUS', TEMPLATEPATH.'/custom-functions');


// Load theme textdomain
load_theme_textdomain(YHL, TEMPLATEPATH.'/languages');

// befor load my function we load the base
// functions for other functions
include_once PHILNA_APP.'/base/options.php';
include_once PHILNA_APP.'/base/format.php';
include_once PHILNA_APP.'/base/base.php';
include_once PHILNA_APP.'/base/json.php';
include_once PHILNA_APP.'/base/ajax.php';

// init philna options
$GLOBALS['philnaopt'] = PhilNaGetOpt::getInstance();

header('Theme:'.THEME_NAME);

/**
 * include all PHP script
 * @param string $dir
 * @return unknown_type
 */
function philnaIncludeAll($dir){
	$dir = realpath($dir);
	if($dir){
		$files = scandir($dir);
		sort($files);
		foreach($files as $file){
			if($file == '.' || $file == '..'){
				continue;
			}elseif(preg_match('/\.php$/i', $file)){
				include_once $dir.'/'.$file;
			}
		}
	}
}

// include functions by yinheli
philnaIncludeAll( PHILNA_APP );

// include functions by user
philnaIncludeAll( PHILNA_CUS );

// admin panel
!is_admin() || include_once TEMPLATEPATH.'/admin/admin.php';

do_action('PhilNaReady');