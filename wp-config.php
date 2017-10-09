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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', '123456');

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
define('AUTH_KEY',         '`#|O5#(# j)MvI8wMb.;q^V3CKmuG(FmL3V2_5dNybD,YOJ# ;&<ciKsWk>7;W*<');
define('SECURE_AUTH_KEY',  'H%wP>@>X8u0sM3bY4Dmp1}$L>k%3<b)KM}Vz/:@?FM0gGg9VD:Y]D&b#}6)F^ayG');
define('LOGGED_IN_KEY',    'jh?HHNfv6#6z[]:DvMCz}rK)s.W=`8wB{9fgB28OKpcSy^n8<YWg{I^=kaQ),vFy');
define('NONCE_KEY',        '`OtQz&r9R,_j0!vKkCJ&lwgaB*1b:&D+/j/0|x{0?F.AQ3;?J oEU_ XHB- UwDe');
define('AUTH_SALT',        'On7)fnkTL2*HD12RnGe2OqZOS!JVcsYe/#WV>B8bPhk}N~891i6P&6n PY}1H,r)');
define('SECURE_AUTH_SALT', 'ZvR(8^(`&j,6V7Aa+#DJos_eAqB=KaDpUg-Kmb}h03bpvs,:19SSW+M/HF(RQ!|D');
define('LOGGED_IN_SALT',   'KpS=:Ir`GJ0@8^x[7_$*%e;/,Rj!fYVrT|hezU{S,OtDiPs,+rX)[fE2i;4r<m_i');
define('NONCE_SALT',       'V=sc}^eQX gi@]n;J!Q8O7u%O7A(.i?M1~CU)1 gG/j^N7? QcQ)EYFR 8 TF9zt');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
