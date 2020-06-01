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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '/krKNJ5EhMHN/A8Bz7+co3ZZvrUSu5E5mEgb9CtSq9sqqaGrb60GrghmPdDUlJ4IBibPOroKWO+zQT7MaqYg7Q==');
define('SECURE_AUTH_KEY',  'YjTw9FHoJ6+aJlDupnKymHye4bVK9se00UiQh4qGJcUL4n9GSgpdB+d3FRY7edoVYhiz7wyfFgUoBGnZPdJ+aw==');
define('LOGGED_IN_KEY',    'umJGpb2FGdPzjIlDzocrHLnokhnXqo5dVlSe493hoXr2xX5erFb/AfoqhApwrn5z9wOmpwotQwlEReOviLkGWA==');
define('NONCE_KEY',        'ygymT2aO2bpaM40CLXuha7gLNA6e/Wnv2VS6u95mdMVAMmLC0GxuuYz+gEKrjuR2e2vf1wA4JiA0JB/wqJe26g==');
define('AUTH_SALT',        'iqqEioS4EDpRmT+L34/AM8UAbCekZ1OecNjaQuCqxXuEWW5tQUtUoozQulmwO9W/dTY25+WmQWc9yVm7IPKgOw==');
define('SECURE_AUTH_SALT', 'dwZdwKFlgAEXYZN8YnxkK9qboBRBQ4uWidd32S507JNC/mg+6WYtkMXKNkO3nTO1MSFq5Y7jm61UjM9q/niORg==');
define('LOGGED_IN_SALT',   'auCeii8GvaCl0oKh+Nqms9bX8e2YCDUSMjhNeBqj/0GnS6SuNhK8pNxqtTGTe17FxHkSbsaUQXcSWV7tXI+jyg==');
define('NONCE_SALT',       'byu4WGkCsdXTljDX3MQCWkCBXzYs9KNPABWaTewyqxCzTcZrXeGFaDxSUQXVPLs8WTXmxt0Hu6dOFZDVD7jdsg==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
