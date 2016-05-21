<?php
define('URL', 'http://www.docek-2016-nis.rs/');
define('ADMIN_URL', URL . 'admin/');

$basePath = realpath(dirname(__FILE__)) . '/';
define('BASE_PATH', $basePath);
define('LIBS', BASE_PATH.'libs/');

define('DB_TYPE', 'mysql');
define('DB_HOST', 'h90hr-mysql1');
define('DB_NAME', 'mysql73696');
define('DB_USER', 'mysql68212');
define('DB_PASS', '********');

define('SMTP_SERVER', 'smtp.gmail.com');
define('SMTP_USER', '');
define('SMTP_PASSWORD', '');
define('SMTP_PORT', '465');
define('SMTP_SSL', 1);