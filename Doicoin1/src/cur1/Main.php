<?php

namespace cur1;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\utils\TextFormat as TF;
use pocketmine\command\CommandReader;
use pocketmine\command\CommandExecuter;
use pocketmine\command\ConsoleCommandSender;
class Main extends PluginBase implements Listener{
	public $tag = "§l§b♦§eCoin§b♦§r ";
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);

		$this->coin = $this->getServer()->getPluginManager()->getPlugin("CoinAPI");

		$this->economyAPI = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
		$this->getLogger()->info(TF::GREEN . "§d§l====================\n§l§eDoiCoin§6 BY§b CurliestDrake66 \n§d§l====================");
	}
	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
		if ($cmd == "muacoin"){
			if(empty($args[0])){
				$sender->sendMessage("§l§b♦§eCoin§b♦§r §l§9•§b /doicoin [số coin]§a ||§e Giá trị quy ước như sau: 100000 xu = 1 coin");
			return true;
		}
		$args[0]  >= 1;
		$mymoney = $this->economyAPI->myMoney($sender);
			if(!is_numeric($args[0])){
				$sender->sendMessage("§l§b♦§eCoin§b♦§r §l§e " . $args[0] . "§c phải là số");
			return true;
		}
			if($mymoney >= $args[0]*100000){
			$sender->sendMessage("§l§b♦§eCoin§b♦§r §r§l§a Bạn đã đổi§e " . $args[0] . "§a coin");
			$this->economyAPI->reduceMoney($sender, $args[0]*100000);
			$this->coin->addCoin($sender->getName(), $args[0]);
			}else{
			$sender->sendMessage("§l§b♦§eCoin§b♦§r §r§c§l Không đủ tiền để đổi coin!");
			}
		return true;
}
}
}