<?php

require dirname(__DIR__).'/vendor/autoload.php';
require dirname(__DIR__).'/config/cons_var.php';

use Discord\Discord;
use Discord\WebSockets\Event;
use SilentBot\Lib\Manager;


$chatter = new Discord([
	'token' => BOT_TOKEN_CHATTER
]);

$chatter->on('ready', function ($chatter) {
	echo 'Chatter ready', PHP_EOL;
	
	$listener = new Discord([
		'token' => BOT_TOKEN_LISTENER,
		'loop' => $chatter->getLoop(),
	]);
	
	$listener->on('ready', function ($listener) use ($chatter) {
		echo 'Listener ready', PHP_EOL;
		
		$fwdList = Manager::loadFwdList();
		$myGuild = $chatter->guilds->get('id', GUILD_ID);
		
		if(!$myGuild) {
			echo "Guild not found, check GUILD_ID", PHP_EOL;
			echo "Exiting script...", PHP_EOL;
			die();
		}
		
		$listener->on(Event::MESSAGE_CREATE, function ($message, $listener) use ($chatter, $myGuild, $fwdList) {
			if($message->user_id != $chatter->id) {
				$key = array_search($message->channel_id, array_column($fwdList, 'from'));
				if($key !== false) {
					$fwdChannel = $myGuild->channels->get('id', $fwdList[$key]['to']);
					if($fwdChannel) {
						$embed = $chatter->factory(\Discord\Parts\Embed\Embed::class);
						$embed->setAuthor($message->author->username, $message->author->getAvatarAttribute());
						$embed->setTitle("{$message->channel->guild->name} #{$message->channel->name}");
						$embed->setDescription($message->content);
						
						$fwdChannel->sendEmbed($embed);
					}
				}
			}
		});
	});
	
});

$chatter->run();