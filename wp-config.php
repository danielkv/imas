<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'f141382_wp_g4rfb' );

/** Database username */
define( 'DB_USER', 'f141382_wp_bvpfc' );

/** Database password */
define( 'DB_PASSWORD', '391xS#?6bBKqjSrK' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3306' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'O523&9VJQUpx28AH2nM*c/3~1TV6!uqUp1j%%:x4x:j%W*Ds5-QFfJ:91_*a09;/');
define('SECURE_AUTH_KEY', '!2Sf];|zO38L]!|6]u1BNfUuWhO6hr2%*4]xzn#L(4d-;k2+Q:C*R5M6]77N56]A');
define('LOGGED_IN_KEY', 'e6R9OuL%]:f9e!sHF80Ju5;V8qJBD(0k(;jPa2~2NKVM7Ww_E[tHw0k6P8i6u&3/');
define('NONCE_KEY', 'Xottk65hfSn!|qNyI8J):2z4aocN:z4_NIgUAG1Vkz2+~!UpW*IU6eyHZ5f3&:3B');
define('AUTH_SALT', '3(I7iY_s[vG9a;N~!B*8)bO85J6!JTPn4h4+k//1gxG:nM68F3@8*+D56E2]p0p+');
define('SECURE_AUTH_SALT', ']5!LH026XiGX[4N:BWK&dYhT%M8N6hzw+4r9vnPbw&HC1&9FkM99xC6D4l;T2lV(');
define('LOGGED_IN_SALT', '9Zi01hTa#36s+1m#!k2y1C/D:W;F(lUI192-&lvb)BPsNFw+p3v(t845Iu+x*&S(');
define('NONCE_SALT', '7*%1!C0/jg44248D!MNY~mKq6HBuVNYzr)*1a9s;Mj_Zj|_DN~71AiYoVt/kBqd#');


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 's5q9s_';


/* Add any custom values between this line and the "stop editing" line. */

define('WP_ALLOW_MULTISITE', true);
/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', true );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';