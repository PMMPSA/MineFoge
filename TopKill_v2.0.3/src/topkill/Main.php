<?php

namespace topkill;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;
 use pocketmine\event\Listener;
 use pocketmine\plugin\PluginBase;
 use pocketmine\Server;
 use pocketmine\utils\TextFormat;
 use pocketmine\utils\Config;
 use pocketmine\event\player\PlayerJoinEvent;
 use pocketmine\event\player\PlayerDeathEvent;
 use pocketmine\event\entity\EntityDamageByEntityEvent;
 use pocketmine\Player;
 
 class Main extends PluginBase implements Listener {
 	
 	public function onEnable() 
 	{
 	@mkdir($this->getDataFolder());
  		$this->k = new Config($this->getDataFolder()."kill.yml",Config::YAML);
   @mkdir($this->getDataFolder());
 		$this->d = new Config($this->getDataFolder()."death.yml",Config::YAML);
 	 $this->getServer()->getPluginManager()->registerEvents($this, $this);
      $this->getLogger()->info("Plugin Được Code Bởi YTB_Jero [Edit By CurliestDrake66]");
 }
 
  public function onJoin(PlayerJoinEvent $event) {
 		$name = $event->getPlayer()->getName();
 		if($this->k->get($name) == null) {
 			$this->k->set($name,0);
 			$this->k->save();
 		}
 if($this->d->get($name) == null) {
 			$this->d->set($name,0);
 			$this->d->save();
 	}
 }
 
 public function onDeath(PlayerDeathEvent $event) {
 		$entity = $event->getEntity();
 		$cause = $entity->getLastDamageCause();
 		if($entity instanceof Player) {
 			$name = $entity->getName();
 			$this->d->set($name,$this->d->get($name) + 1);
 			$this->d->save();
 		}
 if($cause instanceof EntityDamageByEntityEvent) {
 			$killer = $event->getEntity()->getLastDamageCause()->getDamage();
 			if($killer instanceof Player) {
 				$name = $killer->getName();
 				$this->k->set($name,$this->k->get($name) + 1);
 				$this->k->save();
 }
 }
 }
 
 public function onCommand(CommandSender $sender, Command $command, $label, array $args){
	switch($command->getName()) {
		 case "topkill":
$max = 0;
foreach($this->k->getAll() as $c) {
$max += count($c);
    }
$max = ceil(($max / 5));
$page = array_shift($args);
$page = max(1, $page);
$page = min($max, $page);
$page = (int)$page;
$sender->sendMessage("§e§l⊹⊱§aBảng Xếp Hạng Kill PvP Của Máy Chủ§e Thuộc§a Trang §b".$page."§d Trên §b".$max."§a Trang§e⊰⊹");
$aa = $this->k->getAll();
arsort($aa);
$i = 1;
foreach($aa as $b=>$a) {
if(($page - 1) * 5 <= $i && $i <= ($page - 1) * 5 + 4){
$i1 = $i + 1;
$c = $this->k->get($b);
$sender->sendMessage("§l§e⊹⊱§cXếp Hạng §e".$i."§d Thuộc Về§b ".$b." §aVới§c ".$c."§b Kills§e⊰⊹");
    }
$i++;
 			}
 		}
 	}
 
 public function getKills($sender) {
 	if($sender instanceof Player) {
 	$sender = $sender->getName();
 }
 		return $this->k->get($sender);
 	}
 
 public function getDeaths($sender) {
 	if($sender instanceof Player) {
 	$sender = $sender->getName();
 }
 		return $this->d->get($sender);
 }
 }