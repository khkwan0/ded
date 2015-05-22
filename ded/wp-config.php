<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ded');

/** MySQL database username */
define('DB_USER', 'ded');

/** MySQL database password */
define('DB_PASSWORD', 'letmeinbdr');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'qPT_K}Ic`oy*ab>W[G M57F,.?fGNmUCDT!B9q= pr1r+L{U~HH_%=rw@<EW+m5r');
define('SECURE_AUTH_KEY',  'dW~t#x~F7;gV`>$G,_6a6$ik3S-*=3VFFc?D}8|NWo;cVGvpi/{g3k-js$ZVJ<7n');
define('LOGGED_IN_KEY',    ']E]@u*BnvURK5|uH3`-bF/,/*ps-LdUN*J5rAt!}ABS2YnS=9E;XYN%fZPVe(*0H');
define('NONCE_KEY',        'cyb-kq&-G^S{|Q0*>eUg8nvadE|mFr*12llYJs@%ka4:;6EV/~K>S+YbH2LvxD+^');
define('AUTH_SALT',        'MqT-4x+jN/`<v<fDDu=:#P&M;{LAx]~CVc>f7/TENjA:|Y+(|e}iE~y_N}?B:jNZ');
define('SECURE_AUTH_SALT', '4*gT%0Qo5XYAVd+.(qpz`3: AfGacKM}PanbVQ[={fmN;I%4C+?i%%/}@5FXA]v0');
define('LOGGED_IN_SALT',   '4;3AiC$[rV,!s,[@+1tUYx4Y4 zH`o_V:uYvqRPCU2;wP(T4%Q/206/]D?e .EK*');
define('NONCE_SALT',       'NX5K`G)?_2y]P*ELC|<XyR8p1-pz<T8+kI;pwMK;92-Fi: PK42dC+swf7LD%s_i');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

