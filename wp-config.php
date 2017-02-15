<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'vojtovka');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '5.(Wyy!nI~|3wlQf~U&SSU;7?=wQ#zT%(Er^<Z-SX7rc[t{Bj1PNh3Ho3_+A.r:X');
define('SECURE_AUTH_KEY',  ':r9y;m9vbGT)dsn|S$*/}<k6j$J[><S*hIMu wHw6Qeu: P&HA7?T-Awd0DB>GlC');
define('LOGGED_IN_KEY',    'y~f1a8+3AJ7BK#o4O]=HnS.4x>Mh_}XuWZoA00{k^e<m+eb_UIo|k{9;2-eZRQ]K');
define('NONCE_KEY',        '-j}j}5URR>~SVNk<^}jn-i/:c3bcJtc#K)|L*)kTwa?r)f_jwHW])94F1@Vt*3JN');
define('AUTH_SALT',        '.H*}$*W3&Zm&3->g<mw=y$s4ST8!u+F,nSo#AWxxdF.!H{#8YWS]?9v72:oC_FgT');
define('SECURE_AUTH_SALT', 'bSqL|/P9`=&,C,gUWi9SSz<xTcj@;<3+I,#m/VzG~Eg.TM;]8pZ-3d_tKU;a=FWm');
define('LOGGED_IN_SALT',   '65&kI*|a6bKY{GZO^*@Z!K/$/ Dl;Zf#L~.rm=R^hRr&[b2pgB#yySqXD!!L:P{5');
define('NONCE_SALT',       'L8QReC0|u:aRxe~vdM5%m9~WP.Xgm;O^6,Ez%%:}Wxm0G0.JA3T}`mY_)Dre1}B]');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
