<?php

namespace napthe;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener{

	public function onEnable(){

		$this->getServer()->getPluginManager()->registerEvents($this, $this);

		}

		

		public function onCommand(CommandSender $sender,Command $cmd, $label, array $args){

			if($cmd->getName() == "napthe"){
				$sender->sendMessage("§d§l♦ §cHệ Thống §6Gói Nạp Thẻ §cCủa Máy Chủ §aMINE§bDRAGON");
				$sender->sendMessage("§6§l• §620k §b[§d100LevelPickaxe,20 LevelChuyensinh,VIPI 10 Ngày§b]");
				$sender->sendMessage("§6§l• §650k §b[§d300LevelPickaxe,50 LevelChuyenSinh,VIPII 15 Ngày§b]");
				$sender->sendMessage("§6§l• §6100k §b[§d980LevelPickaxe,80 LevelChuyenSinh,VIPIII 50 Ngày§b]");
				$sender->sendMessage("§d§l♦ §bĐỂ NẠP §a§lGửi Qua Email:noobgamery567@gmail.com Như Sau");
				$sender->sendMessage("§6§l•§b(Giá Thẻ)");
				$sender->sendMessage("§6§l•§b(Số Seri Của Thẻ)");
				$sender->sendMessage("§6§l•§b(Mã Số Của Thẻ)");
				$sender->sendMessage("§bVà Nhấn Gửi");
			}
			}
			}