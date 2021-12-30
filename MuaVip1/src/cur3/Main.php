<?php

namespace cur3;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;

class Main extends PluginBase{

	public function onEnable (){
		$this->getServer()->getLogger()->info("§a Được edit bởi§e Cur");
		$this->pointAPI = $this->getServer()->getPluginManager()->getPlugin("CoinAPI");
				$this->moneyAPI = $this->getServer()->getPluginManager()->getPlugin("EcomoneyAPI");
	}

	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
		if ($cmd == "muavip"){
			if(empty($args[0])){
				$sender->sendMessage ("§l§a✠§d Hệ thống Mua Vip của máy chủ Craft-Legendery §a✠");
				$sender->sendMessage ("§l§a✠§e VIP I: 10 Ngày &b||&e Giá: 20 Coin &b|| Cú pháp: v1 §a✠");
				$sender->sendMessage ("§l§a✠§e VIP II: 20 Ngày &b||&e Giá: 40 Coin &b|| Cú pháp: v2 §a✠");
				$sender->sendMessage ("§l§a✠§e VIP III: 30 Ngày &b||&e Giá: 60 Coin &b|| Cú pháp: v3 §a✠");
				$sender->sendMessage ("§l§a✠§b Cú pháp: /muavip [cú pháp] để mua loại VIP mà các bạn chọn §l§a✠");
				return true;
			}
			if(!empty($args[0])){
				switch($args[0]){
					case "v1":
					$player1 = $sender->getName();
					$point1 = $this->pointAPI->myCoin($player1);
						if($point1 < 20){
							$sender->sendMessage("§l§c Không đủ coin!");
						}else{
						$this->pointAPI->reduceCoin($player1, 20);
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),'setvip ' . $player1 . ' VipI 10');
							$sender->sendMessage("§l§a Bạn đã mua gói VIP I");
						$this->getServer()->addTitle("§l§a✠§e$player1 đã mua gói VIP I§a✠");
						}
					break;
					case "v2":
					$player2 = $sender->getName();
					$point2 = $this->pointAPI->myCoin($player2);
						if($point2 < 40){
							$sender->sendMessage("§l§c Không đủ coin!");
						}else{
						$this->pointAPI->reduceCoin($player2, 40);
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),'setvip ' . $player2 . ' VipII 20');
							$sender->sendMessage("§l§a Bạn đã mua gói VIP II");
						$this->getServer()->addTitle("§l§a✠§e$player2 đã mua gói VIP II§a✠");
						}
					break;
					case "v3":
					$player3 = $sender->getName();
					$point3 = $this->pointAPI->myCoin($player3);
						if($point3 < 60){
							$sender->sendMessage("§l§c Không đủ coin!");
						}else{
						$this->pointAPI->reduceCoin($player3, 60);
						$this->getServer()->dispatchCommand(new ConsoleCommandSender(),'setvip ' . $player3 . ' VipIII 30');
							$sender->sendMessage("§l§a Bạn đã mua gói VIP III");
						$this->getServer()->addTitle("§l§a✠§e$player1 đã mua gói VIP III§a✠");
						}
					break;
					default:
				$sender->sendMessage ("§l§a✠§d Hệ thống Mua Vip của máy chủ Craft-Legendery §a✠");
				$sender->sendMessage ("§l§a✠§e VIP I: 10 Ngày &b||&e Giá: 20 Coin &b|| Cú pháp: v1 §a✠");
				$sender->sendMessage ("§l§a✠§e VIP II: 20 Ngày &b||&e Giá: 40 Coin &b|| Cú pháp: v2 §a✠");
				$sender->sendMessage ("§l§a✠§e VIP III: 30 Ngày &b||&e Giá: 60 Coin &b|| Cú pháp: v3 §a✠");
				$sender->sendMessage ("§l§a✠§b Cú pháp: /muavip [cú pháp] để mua loại VIP mà các bạn chọn §l§a✠");
						break;
				}
			}
		}
		return true;
	}
}