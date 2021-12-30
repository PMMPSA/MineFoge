<?php

namespace craft2;

use pocketmine\command\Command; 
use pocketmine\command\CommandSender; 
use pocketmine\event\Listener; 
use pocketmine\plugin\PluginBase; 
use pocketmine\Server; 
use pocketmine\item\enchantment\Enchantment; 
use pocketmine\item\Item; 
use pocketmine\Player; 
use pocketmine\utils\TextFormat as TF; 
use pocketmine\command\ConsoleCommandSender;

class Main extends PluginBase{
	
	public function onEnable(){
		$this->getServer()->getLogger()->info("plugin Mua Cúp đã được bật");
		$this->eco = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
		}
		
		public function onCommand(CommandSender $sender,Command $cmd, $label, array $args){
			if ($cmd == "muacup"){
				if (empty($args[0])){
						if($this->eco->myMoney($sender->getName()) < 1000){
							$sender->sendMessage("§l§c Không đủ tiền!");
						}else{
						$this->eco->reduceMoney($sender->getName(), 1000);
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),'givecup ' . $sender->getName() . '');
							$sender->sendMessage("§l§aBạn đã §dMua Cúp");
							}
				}
			}
		return true;
	}
}
					
		