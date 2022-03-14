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
define( 'DB_NAME', 'wordpress-project' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'rootdb' );

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
define( 'AUTH_KEY',         '9I[iET5]Z{.A1,/(l9`TkoEcs&ORmSf_ti}dw|Y^}54}?8ljc)gQ/n]xH_q.IZ0-' );
define( 'SECURE_AUTH_KEY',  '}^#zY.!^dMRPVgV^YwNQzdH~zW<@!c8.S?$Ap_6y8E W{rZm;WoZ<mm%b0o,-qss' );
define( 'LOGGED_IN_KEY',    'R==;{]!q5>$1hgo)F^e}C.GgJ(6 lT[UF-=L!Gc1Lu7;|Mo#Ee<BR0(LT<yMjDqQ' );
define( 'NONCE_KEY',        'G[GAsR,*1V1vJ%935K`Rf2lp`AIRc?jfu+#&2+m10D$x`>3e -Q]vlxM(Un*/M9;' );
define( 'AUTH_SALT',        'BhqsmMS~1-S~7sd&g;L.4N~+%6T_40rO[aGB1/Mj^!?WAp1EZ}+MRbX>8zmC#fB-' );
define( 'SECURE_AUTH_SALT', ',}GHueo5-5hnzr,@dD*vFL*pT!s{t^KukHtJD-)oGj 4P^/&R$~jwWGTMz) ?j0X' );
define( 'LOGGED_IN_SALT',   '`Yu-m~F-ckX!&<]PtuAkQWT_CMUnF88XEm5d&jk5B(sjSY#dutb@:[YV]WA:K/is' );
define( 'NONCE_SALT',       'F2c^?ez#$WntC8[6pY,q0<53TFk%zKGRS~wehJ=B|2,q[&}-b2Q1|3%4gfoX&_[ ' );

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
