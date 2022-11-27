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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'porobicinstalacije' );

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
define( 'AUTH_KEY',         'cAfQ9)43;@gXP5F$!E f0{:tl(d3PbFP^v<I) ?B/FqVE_z+@){TZ)a5#KeXg3y}' );
define( 'SECURE_AUTH_KEY',  '@v9A]m!cLa@ON:wM ^$R-{!Tm8[D*Y;mpqsD x=btprTQXUQMb%HiV/hpKac+y55' );
define( 'LOGGED_IN_KEY',    '+~?4TRR#@<E:WzotpZaro,Cb?3u4|gtMmdXIZ}.~h7$RUhKWD4GHZB>9X?IAoM#}' );
define( 'NONCE_KEY',        'ObuY<wsG~Dikb+h;ta95b97mrvKXP`]LWR{m;hXN9[ !<c|3CvSP asCkM$mWP2<' );
define( 'AUTH_SALT',        '7Z!JPu9k2YP[oaWfgfN(it;E;gY=tk!7z7/e6(lZPuW=I]Y2GhoQc0l=;S<2fVC;' );
define( 'SECURE_AUTH_SALT', '@Ogl<xo]Rtfb5=R5oEpYA2T#y,}WZra)3;+~TVG@s^7#K=RyiEV}{Ur!?lAto]$4' );
define( 'LOGGED_IN_SALT',   '[%NUK#xR|V`/MXueQeui)~:=8S!9<sfNoZdhd:y%RZ^2dbz]b`*LbzgotCF4-7o&' );
define( 'NONCE_SALT',       '`ZIF_C<2qgPv[T~QzH84p1`/++v?sK7;H`u[J!WTZ{J6=-O!im,}K8yFLPL9uMkC' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
