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
define( 'DB_NAME', 'monsite' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'n7[r G.)}DM_}ipu4s-6T?/^sJza7+dBfF}3A9`@.K,UPTV,fWse^/{.07Lw^H-V' );
define( 'SECURE_AUTH_KEY',  '7Xf#t5/qG[`u$@n[y_lyWW:@~F*aMg,-4#e0+i5[g!Ow&:o=Dmd`X+[a<XHp;6!$' );
define( 'LOGGED_IN_KEY',    '@,h*%Q`U^<)0m.{d+ e9>hk<(=BRaNf^5M/+(9)sJ*t;m:gr0W!.a/JIx7x:?8aN' );
define( 'NONCE_KEY',        'ab<(>r+FK/J%MdC%#[H[3cx/dzk?OFba9_GuNX[9y#Hu3B?dqQJF,mZt.12iZ?VM' );
define( 'AUTH_SALT',        '!W.-bGvj2#*,V{s4(KIl2Hd]#JWw4y2t4L0Kz0o`R~&[.y>X]Jx#@@4w$50Iq}I[' );
define( 'SECURE_AUTH_SALT', 'Mh{,Vh<Rq-y]qjeNjokKp~V5x6`k;m9:l}bY*LmO21ZNXI5Qiko!Ih0|VRyhACl#' );
define( 'LOGGED_IN_SALT',   'i<`_l%K`e[8zsP7E7Ek uQh@2T5~K_8B{%KCG5~9t;E6NmWWmxp~ ^!j$[Fl@+no' );
define( 'NONCE_SALT',       'mwU]N{PJxVrTYs0vJebFZPy*sXzf7gOl)AZN**JENcV$1_/xFALM+nLRcgv&g{lM' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
