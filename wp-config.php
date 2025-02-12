<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'my-car-garage' );

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
define( 'AUTH_KEY',         'Ob$=5. AqC(0]4|Q:;/,$UJ0K`2/k,J(<S5pX<+;w]%Q|MeP&XJaz^k,,AJiVf`8' );
define( 'SECURE_AUTH_KEY',  't) m5OHU5|e)y2klj,C$GBv5TqoS a,Ck <4Kp,Bg2dUx]a4<0oQ|Nl,RG>Q;v&6' );
define( 'LOGGED_IN_KEY',    'HW]%de<t_vZ%k7t&F!(,@)P}pFh6ch(y.[f-^N@mvmt(;NYNaTcGB/`b~0LerOD^' );
define( 'NONCE_KEY',        '!blm;q]Z|X2k4+f|~,KS`N[3P]r|E>j/4!,9bAMv%._Vd_Qmn<1W=Pm<SE[D{G0&' );
define( 'AUTH_SALT',        'oy-uV<4iyeT/zll_x[8irI2}v$z<3a lIsMtI{G|5FgBacXcAxIpx{L?rL,KMByJ' );
define( 'SECURE_AUTH_SALT', '?(5R2l}xNJ#JQ;*v{/f$>b6!xr9-)V BLb,#F<4b#I4y{]sZym$w_n[imOaC>K9[' );
define( 'LOGGED_IN_SALT',   'xoVEWz,D&%=FL;4+0S`/3ZFUHOk~um}TA4V<}G-}TYrr-GOaL3qX+8^XIXA.+BFg' );
define( 'NONCE_SALT',       'H4lQ9>.;Vu`nR(9PNuRY<@v}X>AL}<L#)6JKEC%UW9AcRi?fw-%l2Z.C<r]zkW.s' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
