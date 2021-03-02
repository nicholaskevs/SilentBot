<?php

require dirname(__DIR__).'/vendor/autoload.php';
require dirname(__DIR__).'/config/cons_var.php';

use Discord\Discord;
use SilentBot\Lib\Manager;


$discord = new Discord([
	'token' => BOT_TOKEN
]);

$discord->on('ready', function ($discord) {
	echo "SilentBot is ready!", PHP_EOL;
	
	$myGuild = $discord->guilds->get('id', GUILD_ID);
	$fwdList = Manager::loadFwdList();
	
	// Listen for messages.
	$discord->on('message', function ($message, $discord) use ($myGuild, $fwdList) {
		if($message->user_id != $discord->id) {
			$key = array_search($message->channel_id, array_column($fwdList, 'from'));
			if($key !== false) {
				$fwdChannel = $myGuild->channels->get('id', $fwdList[$key]['to']);
				if($fwdChannel) {
					$bodyText = "**{$message->channel->guild->name} #{$message->channel->name} @{$message->author->username}:**\n";
					$bodyText .= ">>> {$message->content}";
					$fwdChannel->sendMessage($bodyText)->done(function ($fwdMessage) {echo "{$fwdMessage->content}", PHP_EOL;});
				}
			}
		}
	});
});

$discord->run();