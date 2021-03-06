<?php

require 'cons_env.php';

define('BOT_NAME', 'SilentBot');
define('BOT_TOKEN_CHATTER', ENV_BOT_TOKEN_CHATTER);
define('BOT_TOKEN_LISTENER', ENV_BOT_TOKEN_LISTENER);

define('FORWARD_FILE', 'forward.txt');
define('FORWARD_PATH', '/config/');

define('GUILD_ID', ENV_GUILD_ID);

define('DB_USEDB', ENV_DB_USEDB);
define('DB_HOST', ENV_DB_HOST);
define('DB_USERNAME', ENV_DB_USERNAME);
define('DB_PASSWORD', ENV_DB_PASSWORD);
define('DB_DBNAME', ENV_DB_DBNAME);
