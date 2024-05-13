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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */

define('FS_METHOD', 'direct');

define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'Xb&7cif.~lMU}0(7t>t@rK/yWB~y+C_k3?Y2R!~Bn(`8^B`kVCY+^6op/IDR @0I' );
define( 'SECURE_AUTH_KEY',  '?^?<>zwl!u$P&ocq]IPsJ#/GPOu|y&/6q,zwMGJ<4/9R}42.s4LEt(O:tjuH@aV0' );
define( 'LOGGED_IN_KEY',    '<k8?x@>o-C8I_t`<^+u>s9*4yC0!)<bwz_5rYILj_^xS}P+,]{_i,m:yaoq@@Ai0' );
define( 'NONCE_KEY',        '{<9e]aK`oF;!`vEw]]?<B~9Mkk1`V~bQ3+u!1RT#G3fo_|G9rH4=-0fsNby$9;x^' );
define( 'AUTH_SALT',        ']C$]T.8l^nyc7W)Y#^20T,1RM]=WSB;$w8JYO&PrE2<,wR(c^#.}l)5PpNcELY~6' );
define( 'SECURE_AUTH_SALT', 'A/T&L] JBm#huncdR2*EgzL/ZQtJ^qJ=x`@rBOko3&5%r*bHePJbV,M`jJGT^)lR' );
define( 'LOGGED_IN_SALT',   'cL[O*,_9|b:g%IlLE~>@5u|&K~X_,>nH9,[uaarRbJZx+lMKG+z!j[u]04nCre:#' );
define( 'NONCE_SALT',       'zUJ <DwqUhw<VF33%Ak9@6{X6m!SgY&ye~E::)D15KnKnuB4sh)i%+;=`[m2Lp~|' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
