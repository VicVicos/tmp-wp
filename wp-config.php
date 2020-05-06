<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'tmp_wp' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'm|N]Gn*Nzso7BN~CAn+/LlipD<TlCF70h3*&*4GR,+UO+a*CwQ;PXzl_NybV].VI' );
define( 'SECURE_AUTH_KEY',  'Yc/`8ux}zkDJA|OONAoqQy/z$p7j?> R/>SNs@~z:04/_*mj/PQ)X%<dns}=r(UR' );
define( 'LOGGED_IN_KEY',    'jLn,`G~a$VRd]kVL*43`c uE7x+cY1iXnv@GdOsN>:9MxJ(s Ed3e:%hvy|+,cNF' );
define( 'NONCE_KEY',        '@WlT#kT!L<-$0FrH2AXA`Pi;IV#iJM#p*57f5%,>}5v9M?}mDJ5BDtW}FYzJ4S??' );
define( 'AUTH_SALT',        '5zckN8w2-N~&Y}L=B. !x^)2?&:!mIt_dAwjJ]bnrqAqy[Ba)^mOJzU{226m^ S)' );
define( 'SECURE_AUTH_SALT', 'TT&cv%al)FiAZivbVD=QbNwf0/uJxyQueE|,Mc}kCI=8dNic/^zH^>!z= &D#0n`' );
define( 'LOGGED_IN_SALT',   'N.Z-sDXeiP/[?=QfD`BB?uFAPh)Y!g<4yT_UON.g=`QO^^d..VA:[Wd>;yV[!L)N' );
define( 'NONCE_SALT',       'E5K)>b,y{WPdgl&R{=u;R69wY%+QQv[Y)Z {7jEzGS*`7hYnSzAb:w:teym_=li8' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'w2pz_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
