<?php

declare(strict_types=1);

namespace xenialdan\MagicWE2\commands;

use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use pocketmine\utils\TextFormat;
use xenialdan\MagicWE2\API;
use xenialdan\MagicWE2\Loader;
use xenialdan\customui\API as UIAPI;

class BrushCommand extends PluginCommand{
	public function __construct(Plugin $plugin){
		parent::__construct("/brush", $plugin);
		$this->setPermission("we.command.brush");
		$this->setDescription("Opens the brush tool menu");
	}

	public function getUsage(): string{
		return parent::getUsage(); // TODO: Change the autogenerated stub
	}

	public function execute(CommandSender $sender, string $commandLabel, array $args){
		/** @var Player $sender */
		$return = true;
		try{
			UIAPI::showUIbyID(Loader::getInstance(), Loader::$uis['brushUI'], $sender);
		} catch (\TypeError $error){
			$sender->sendMessage(Loader::$prefix . TextFormat::RED . "Looks like you are missing an argument or used the command wrong!");
			$sender->sendMessage(Loader::$prefix . TextFormat::RED . $error->getMessage());
			$return = false;
		} finally{
			return $return;
		}
	}
}