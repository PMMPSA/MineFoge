<?php

namespace Reincarnated;

use pocketmine\{Player, Server};
use pocketmine\command\{Command, CommandSender};
use pocketmine\event\Listener;
use pocketmine\utils\Config;
use pocketmine\event\player\{PlayerJoinEvent};
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener {

public function onEnable() {
$this->getServer()->getPluginManager()->registerEvents($this, $this);
$this->money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
$this->coin = $this->getServer()->getPluginManager()->getPlugin("CoinAPI");
//////////////// Tạo config /////////////////
@mkdir($this->getDataFolder());
$this->cfg = new Config($this->getDataFolder()."chuyensinhdata.yml",Config::YAML);
}
	////////////////// Đặt level 1 chuyển sinh khi vô máy chủ lần đầu //////////////////////////////
public function onJoin(PlayerJoinEvent $event) {
$player = $event->getPlayer();
			if(!$this->cfg->exists(strtolower($player->getName()))){
				$this->cfg->set(strtolower($player->getName()), 1);
				$this->cfg->save();
    }
}

	public function onBreak(BlockBreakEvent $event){
    $player = $event->getPlayer();
if($this->cfg->get($player) > 1){
$rand = mt_rand(1, 1500);
switch($rand) {
case "10":
$player->setMaxHealth(20 + $this->myReincarnated($player));
$event->sendMessage("§e§l⊹⊱§dChuyển Sinh§e⊰⊹ §b§lBạn Đã §dNhận Được §c". $this->myReincarnated($player) ." §etim§b Trong Quá Trình§6 Mine");
case "500":
$player->setMaxHealth(20 + $this->myReincarnated($player));
$event->sendMessage("§e§l⊹⊱§dChuyển Sinh§e⊰⊹ §b§lBạn Đã §dNhận Được §c". $this->myReincarnated($player) ." §etim§b Trong Quá Trình§6 Mine");
case "1000":
$player->setMaxHealth(20 + $this->myReincarnated($player));
$event->sendMessage("§e§l⊹⊱§dChuyển Sinh§e⊰⊹ §b§lBạn Đã §dNhận Được §c". $this->myReincarnated($player) ." §etim§b Trong Quá Trình§6 Mine");
}
}
}
///////////////////////// Câu lệnh ////////////////////////
public function onCommand(CommandSender $sender, Command $command, $label, array $args){
	switch($command->getName()) {
		case "chuyensinh":
		$player = $sender->getName();
		// Fix Bởi Nguyễn Công Danh (Danh Miner) Và Master Jero.
		$money = $this->money->myMoney($player);
		if($money < $this->myReincarnated($player) * 1000000){
			$sender->sendMessage("§e§l⊹⊱§dChuyển Sinh§e⊰⊹ §bBạn Không Đủ §cTiền §bĐể Lên §dCấp Tiếp Theo");
			$sender->sendMessage("§e§l⊹⊱§dChuyển Sinh§e⊰⊹ §bĐể Lên §dCấp Tiếp Theo§b Cần ". $this->myReincarnated($player) * 1000000 ."");
		} else {
			  $this->cfg->set($player, (int)$this->cfg->get($player) + 1);
			$sender->sendMessage("§e§l⊹⊱§dChuyển Sinh§e⊰⊹ §cHệ Thống §bĐã Thăng Cấp §dChuyển Sinh§b Của Bạn §cLên Cấp: §e". $this->myReincarnated($player) ."");
			$this->money->reduceMoney($player, $this->myReincarnated($player) * 1000000);
			  $this->cfg->save();
		}
		break;
		
		case "mychuyensinh":
		$player = $sender->getName();
		if($this->myReincarnated($player) >= 1){
			$sender->sendMessage("§e§l⊹⊱§dChuyển Sinh§e⊰⊹ §bCấp Độ §dChuyển Sinh§b Của Bạn Hiện Tại Là: §e". $this->myReincarnated($player) ."");
		} else {
			$sender->sendMessage("§e§l⊹⊱§dChuyển Sinh§e⊰⊹ §bBạn §aKhông Có §cCấp Độ §dChuyển Sinh");
			}
		break;
		
case "topchuyensinh":
$max = 0;
foreach($this->cfg->getAll() as $c) {
$max += count($c);
    }
$max = ceil(($max / 5));
$page = array_shift($args);
$page = max(1, $page);
$page = min($max, $page);
$page = (int)$page;
$sender->sendMessage("§e§l⊹⊱§aBảng Xếp Hạng Chuyển Sinh Của Máy Chủ§d [§eThuộc§a Trang §b".$page."§d Trên §b".$max."§a Trang§d]§e⊰⊹");
$aa = $this->cfg->getAll();
arsort($aa);
$i = 1;
foreach($aa as $b=>$a) {
if(($page - 1) * 5 <= $i && $i <= ($page - 1) * 5 + 4){
$i1 = $i + 1;
$c = $this->cfg->get($b);
$sender->sendMessage("§l§e⊹⊱§cXếp Hạng §e".$i."§d Thuộc Về§b ".$b." §aVới§c ".$c."§b Cấp§e⊰⊹");
    }
$i++;
}
break;
    }
}

public function myReincarnated($player) {
if($player instanceof Player) {
$player = $player->getName();
	}
$reincarnated = $this->cfg->get($player);
return $reincarnated;
    }
    public function addLevel($player, $cfg){
     if($player instanceof Player){
         $player = $player->getName();
         }
         $this->cfg = new Config($this->getDataFolder()."config.yml",Config::YAML);
         $this->cfg->set($player, (int)$this->cfg->get($player) + $cfg);
         $this->cfg->save();
    }
}