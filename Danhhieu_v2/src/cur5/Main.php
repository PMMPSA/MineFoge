<?php

namespace cur5;

use pocketmine\{Player, Server};
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\{Command,CommandSender, CommandExecutor, ConsoleCommandSender};
use pocketmine\inventory\BaseInventory;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;

class Main extends PluginBase{

	public function onEnable (){
		$this->getServer()->getLogger()->info("§a Được edit bởi§e Cur");
		$this->pointAPI = $this->getServer()->getPluginManager()->getPlugin("CoinAPI");
			@mkdir($this->getDataFolder());
				$this->config = new Config($this->getDataFolder()."players.yml",Config::YAML);
					$this->getLogger()->info("§9Enable!");	
	}
					public function onJoin(PlayerJoinEvent $event) {
$player = $event->getPlayer();
			if(!$this->config->exists(strtolower($player->getName()))){
			    $player->sendMessage("§a§lBạn Đã Nhận Được Danh Hiệu §e§lTân Thủ");
			    $sender->setNametag("§e§lTân Thủ§r\n§l§b$name ");
				$this->config->set(strtolower($player->getName()), tanthu);
				$this->config->save();
			}
	}
	
	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
		if ($cmd == "danhhieu"){
			if(empty($args[0])){
				$sender->sendMessage ("§l§a✠§d Hệ thống §cDanh Hiệu §dcủa máy chủ §aMINE§bFoge§a✠");
				$sender->sendMessage ("§l§a✠§e Phụng Hoàng Lửa §b||§e Giá: 20 Coin §b|| Cú pháp: phuhoanglua §a✠");
				$sender->sendMessage ("§l§a✠§e Bà Tân Vlog §b||§e Giá: 40 Coin §b|| Cú pháp: batanvlog §a✠");
				$sender->sendMessage ("§l§a✠§e ʈλɤ ͼɧơɩ ɰɩệʈ ʋườɳ §b||§e Giá: 60 Coin §b|| Cú pháp: taychoimv §a✠");
				$sender->sendMessage ("§l§a✠§e ɤσʉʈʉßɛɾ ɳổɩ ʈɩếɳɡ §b||§e Giá: 85 Coin §b|| Cú pháp: ytbnoitieng §a✠");
				$sender->sendMessage ("§l§a✠§e tђáภђ ๓áץ ςђủ §b||§e Giá: 115 Coin §b|| Cú pháp: thanhmaychu §a✠");
				$sender->sendMessage ("§l§a✠§b Cú pháp: /danhhieu [cú pháp] để mua danh hiệu mà các bạn chọn §l§a✠");
				return true;
			}
			if(!empty($args[0])){
				switch($args[0]){
					case "phuhoanglua":
					$player1 = $sender->getName();
					$point1 = $this->pointAPI->myCoin($player1);
						if($point1 < 20){
							$sender->sendMessage("§l§c Không đủ coin!");
						}else{
						$this->pointAPI->reduceCoin($player1, 20);
$name = $sender->getDisplayName();
						$sender->setNametag("§e§lPhụng Hoàng Lửa§r\n§l§b$name ");
							$sender->sendMessage("§l§a Bạn đã mua danh hiệu Phụng Hoàng Lửa");
							$this->config->set($player1, 1);
							$this->config->save();
						}
					break;
					case "batanvlog":
					$player2 = $sender->getName();
					$point2 = $this->pointAPI->myCoin($player2);
						if($point2 < 40){
							$sender->sendMessage("§l§c Không đủ coin!");
						}else{
						$this->pointAPI->reduceCoin($player2, 40);
$name = $sender->getDisplayName();
						$sender->setNametag("§a§lBà Tân Vlog§r\n§l§b$name");
							$sender->sendMessage("§l§a Bạn đã mua danh hiệu Bà Tân Vlog");
						}
					break;
					case "taychoimv":
					$player3 = $sender->getName();
					$point3 = $this->pointAPI->myCoin($player3);
						if($point3 < 60){
							$sender->sendMessage("§l§c Không đủ coin!");
						}else{
						$this->pointAPI->reduceCoin($player3, 60);
$name = $sender->getDisplayName();
						$sender->setNametag("§d§lʈλɤ ͼɧơɩ ɰɩệʈ ʋườɳ§r\n§l §b$name ");
							$sender->sendMessage("§l§a Bạn đã mua danh hiệu ʈλɤ ͼɧơɩ ɰɩệʈ ʋườɳ ");
						}
					break;
					case "ytbnoitieng":
					$player4 = $sender->getName();
					$point4 = $this->pointAPI->myCoin($player4);
						if($point4 < 85){
							$sender->sendMessage("§l§c Không đủ coin!");
						}else{
						$this->pointAPI->reduceCoin($player4, 85);
$name = $sender->getDisplayName();
						$sender->setNametag("§4§lɤσʉʈʉßɛɾ ɳổɩ ʈɩếɳɡ§r\n§l §b$name ");
							$sender->sendMessage("§l§a Bạn đã mua danh hiệu ɤσʉʈʉßɛɾ ɳổɩ ʈɩếɳɡ ");
						}
					break;
					case "thanhmaychu":
					$player5 = $sender->getName();
					$point5 = $this->pointAPI->myCoin($player5);
						if($point5 < 115){
							$sender->sendMessage("§l§c Không đủ coin!");
						}else{
						$this->pointAPI->reduceCoin($player5, 115);
$name = $sender->getDisplayName();
						$sender->setNametag("§a§ltђáภђ §e๓áץ§d ςђủ§r\n§l§b $name ");
							$sender->sendMessage("§l§a Bạn đã mua danh hiệu §a§ltђáภђ §e๓áץ§d ςђủ ");		
						}
					break;
					default:
				$sender->sendMessage ("§l§a✠§d Hệ thống §cDanh Hiệu §dcủa máy chủ §bCraft-Legendery §a✠");
				$sender->sendMessage ("§l§a✠§e Phụng Hoàng Lửa §b||§e Giá: 20 Coin §b|| Cú pháp: phuhoanglua §a✠");
				$sender->sendMessage ("§l§a✠§e Bà Tân Vlog §b||§e Giá: 40 Coin §b|| Cú pháp: btv §a✠");
				$sender->sendMessage ("§l§a✠§e ʈλɤ ͼɧơɩ ɰɩệʈ ʋườɳ §b||§e Giá: 60 Coin §b|| Cú pháp: taychoimv §a✠");
				$sender->sendMessage ("§l§a✠§e ɤσʉʈʉßɛɾ ɳổɩ ʈɩếɳɡ §b||§e Giá: 85 Coin §b|| Cú pháp: ytbnoitieng §a✠");
				$sender->sendMessage ("§l§a✠§e tђáภђ ๓áץ ςђủ §b||§e Giá: 115 Coin §b|| Cú pháp: thanhmaychu §a✠");
				$sender->sendMessage ("§l§a✠§b Cú pháp: /danhhieu [cú pháp] để mua danh hiệu mà các bạn chọn §l§a✠");
												break;
				}
			}
		}
		return true;
	}
}