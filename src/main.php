<?php

require dirname(__DIR__).'/vendor/autoload.php';
require dirname(__DIR__).'/config/cons_var.php';

use Discord\Discord;
use SilentBot\Lib\Database;

$test = new Database(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DBNAME);
$result = $test->execute('select * from users');
print_r($result);
die();

$discord = new Discord([
	'token' => BOT_TOKEN
]);

$discord->on('ready', function ($discord) {
	echo "Bot is ready!", PHP_EOL;
	
	// Listen for messages.
	$discord->on('message', function ($message, $discord) {
		echo "{$message->author->username}: {$message->content}",PHP_EOL;
	});
});

$discord->run();