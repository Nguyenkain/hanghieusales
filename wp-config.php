<?php
/** Enable W3 Total Cache Edge Mode */
//define('W3TC_EDGE_MODE', true); // Added by W3 Total Cache
//define('WP_CACHE', true); //Added by WP-Cache Manager



/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
 //Added by WP-Cache Manager

//define( 'WPCACHEHOME', '/home/hangh971/domains/hanghieusales.com/public_html/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'hanghieu2');
/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '123123123');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '~T+UjX|?=w:t!P`d1r~Hb^Jc?(7^9GuL!vqX]-/1!~d9>CIJ`-![&wC>A3o8--wr');
define('SECURE_AUTH_KEY',  'GE5939M3&Zme!UHvC#|-7t`RdvWZInl78`--mIi?Nr|#yr`&<H3X$:<0D1>m_rD+');
define('LOGGED_IN_KEY',    'hw(l,O|@jFg]}Z=tFQyS%Z=6m~){,CM7+<T=f{YSz!|3=[Zi-@=Wv`9[m1p5KM6m');
define('NONCE_KEY',        'J_<ekTO&^x)Ba&I7*K8!V4:X(h?`pq[|!t*2cT$ CVr{T3;B ghUh-`(ypr_a<Af');
define('AUTH_SALT',        '4X<+Il9M_!>N&*dmpryDt:0|n1;z$=#~||Jz]X.aR;tLe+b._-stR{}B(v;|d2gQ');
define('SECURE_AUTH_SALT', 'C#5tZGNaS?<h)1~10V0}L/9D)H>VtWg.8gR.Tw8Q#DFm@Jq5ZoTvN$^i@FC|Bt&d');
define('LOGGED_IN_SALT',   ' |eV;X8^5HM8^]LLxlT:p+MnG#VZtUtn8$wH^(hg;3Zq.Qr h1,k:c}3MrWyk/!!');
define('NONCE_SALT',       '0,@IU]5S~@~0kI20ceu+A02Y~;~5b/n.S&e?YMu3]hQUi3sBD:8y6@IqKKu(zmZz');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', 'vi_VN');
// edited at 29/11/2014 by MinhTran
define( 'WP_MEMORY_LIMIT', '256M' );
// edited at 29/11/2014 by MinhTran
/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
error_reporting(0);
