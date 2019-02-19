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
define('DB_NAME', 'ceo46pit');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '@Son0961090061');

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
define('AUTH_KEY',         '}6W1%cy6~5=!c.e^5_&X>-Hz-7AAfRT G,RQp]R4B_1C;A/~I?8utWq-nmM>umpI');
define('SECURE_AUTH_KEY',  '!:SGxe7*t%~P-kCc2]wp9:[`nl{ZM.b?,V:<GVTX-?BQq6aJ>w<c/_?]oD5w9k(C');
define('LOGGED_IN_KEY',    's-#WuB:r!sSYiT4Xy+0A:93WHjD6z&sjof2R!mo/H{Vz21;% 9~Bg1aJ0pZ?g7u ');
define('NONCE_KEY',        '4+9]`lnsY#R@8|b+V.P#S+BvU=4B.D(m9Ma?:T=&L7AT8Zt* [e O_$jk~YtI,7!');
define('AUTH_SALT',        'AP0:D!?)`?%8Jkw|&sc4TR]nK%`>vHKI(g+kRv.pU47NLlC#qtBa|lPT1!0Q8>B&');
define('SECURE_AUTH_SALT', 'y+`n.5g*&C 6[nnOdvhOlGM|m!#;8k8(wD8EGaAcj}N`Knuk;YaqURRW@Z2Tc_qT');
define('LOGGED_IN_SALT',   'F4G=6~rauK-9rq,2gpSXk}1}l~%,2GsWw0ekG8Y (WWTh 1CzWoAZ,oQ9h}3EzIR');
define('NONCE_SALT',       'XgpIe9~i2<nB42ZiCnwqIR]!VPPa`5&fI)#tkh<,jMBkXsK- j^WHDxLNhCA!5|~');

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
