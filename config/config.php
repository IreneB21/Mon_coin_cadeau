<?php

define('DB_USER', getenv('DB_USER') ? getenv('DB_USER') : APP_DB_USER);
define('DB_PASSWORD', getenv('DB_PASSWORD') ? getenv('DB_PASSWORD') : APP_DB_PASSWORD);
define('DB_HOST', getenv('DB_HOST') ? getenv('DB_HOST') : APP_DB_HOST);
define('DB_NAME', getenv('DB_NAME') ? getenv('DB_NAME') : APP_DB_NAME);

define('APP_VIEW_PATH', __DIR__ . '/../src/View/');

define('DB_DUMP_PATH', __DIR__ . '/../database.sql');
