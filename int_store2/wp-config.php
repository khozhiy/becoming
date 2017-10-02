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
define('DB_NAME', 'Int_Store2');

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
define('AUTH_KEY',         '5Q@%y;e Q$5k9D|tJD{F{6 4^I^0dzyf5%rDM#nILa*AG{`9UcimXe]k>/VCt`av');
define('SECURE_AUTH_KEY',  '9vJ(]8ICY:*K][q`zvvA0JR-,R(AEE}sP8, lH2=3R1oX9|z3FTK`M;lGdy?7*%h');
define('LOGGED_IN_KEY',    'b |6VR $-1vA>m1L)}z*xWv31mFXf3|]i!RaSfc@ux1;Ld1h5>y+x#MXEg*1&(2$');
define('NONCE_KEY',        '2%ouxzb=XeB?,#-F7VB~vr6I%(pXk611>vFs.(F1jUO{yFC@Gbc8  b))#|FJ6Q%');
define('AUTH_SALT',        'yJ7mXvb>x*` A&25<7od=O#uKP_za5qY9[5EU6q?-[-m`J%4o}wmBV/7r$;f33S1');
define('SECURE_AUTH_SALT', '1HYcb^pq.OFm!tS_3w:363.L{?46T!;{cSE(Z9f5p:kP7l`]rzQVlF8Qr*K5]QX!');
define('LOGGED_IN_SALT',   '2R7fxEp8pSX!T8K<6$77:tS@+DX6ze{&;Cjnl*Z]9AYiU%*&E{RLpeNi{ oI^8aj');
define('NONCE_SALT',       'FV7,Hf>~NIKPSmKDa?mliR 80S1}S]b#:sPo1h]Jw4s:{,On%[lvuT?s:-yLIaPU');

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
