<?php
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

define('WP_HOME', 'http://avantifellows.org'); 
define('WP_SITEURL','http://avantifellows.org');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'avantife_avantifellowWP2011');

/** MySQL database username */
define('DB_USER', 'avantife_gapple');

/** MySQL database password */
define('DB_PASSWORD', 'gapple2011');

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
define('AUTH_KEY',         '}#I+^s9>cvz,mBYi.JVB[4O 72z23~=7N#^Z&sc$e7>>*67f}=UxylC]XuGyViA;');
define('SECURE_AUTH_KEY',  'p.)k$RH6ZFzfXlh,zNP@1X`N<jt(mH2K_u.`J6oh6t+YN.8P;;9tWF:7!C!YgbbF');
define('LOGGED_IN_KEY',    '+$>[}C=klt)ZW(utrX#v([L_m,^{{V0k*H:UzW6sLlMbV:K~}4-5:aa<,?|KN.nS');
define('NONCE_KEY',        'nahvCi<b9mOy .mm: *rokc,O<CIF?Y[;2+WmFZaB.PA;[Rr6xaTRhmn4)zXM2xl');
define('AUTH_SALT',        'wL:ib>*95(sN@30T)pFriI(3-~?E=lppiH)X8Oegv{[Y$!!FH)jLhzRbBWvob:Mk');
define('SECURE_AUTH_SALT', '[a{tTEsib*?k>5d< F5/k`va##TBwZz6tToF>2 car@+9EF2eRIUzW}c?M!5[W8A');
define('LOGGED_IN_SALT',   ')-}KId8x$i#b{i`|C(7b^QNm_dWk>1Ptr82X~27G5q<ET9<$hfM]]Cx.%<W-c#S1');
define('NONCE_SALT',       '(zWqNSh+m9fE}L-mQki~MR1?~Pv[UWN@->VK)=FRlOB#JuK,H8b#oa:~}nH!5L`G');

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
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');