<?php

namespace PlayerReward;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener{
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->coin = $this->getServer()->getPluginManager()->getPlugin("CoinAPI");
		}
	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
		switch($cmd->getName()){
			case "lixi":
         if(!isset($args[0])){
             $sender->sendMessage("§l§6♦§a Sử dụng: §b/lixi §d[§eCoins§d] §acho toàn server");
               return true;
               }
				if($this->coin->myCoin($sender->getName()) >= count($this->getServer()->getOnlinePlayers())*$args[0]){
				foreach($this->getServer()->getOnlinePlayers() as $p){
              $this->coin->reduceCoin($sender->getName(), $args[0]);
					$this->coin->addCoin($p->getName(), $args[0]);
					$sender->sendMessage("§a✔§b Tặng cho người chơi§6 ".$p->getName()."§e ".$args[0]." Coins!");
              $p->sendMessage("§a✔§b Người chơi§6 ".$sender->getName()."§b Đã tặng bạn§e ".$args[0]." Coins!");
					}
				} else{
					$sender->sendMessage("§cĐang có ".(count($this->getServer()->getOnlinePlayers()))." Người chơi. Bạn không có đủ Coins!");
				}
			}
		}
	}