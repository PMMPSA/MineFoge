<?php

namespace cdevBoss;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\entity\Entity;
use pocketmine\entity\Effect;
use pocketmine\entity\Zombie;
use pocketmine\entity\Husk;
use pocketmine\entity\PigZombie;

use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;

use pocketmine\level\Level;

use pocketmine\block\Block;
use pocketmine\item\Item;

use pocketmine\math\Vector3;
use pocketmine\level\Position;

use pocketmine\nbt\tag\FloatTag;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\inventory\Inventory;
use pocketmine\nbt\tag\DoubleTag;
use pocketmine\nbt\tag\ListTag;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class cdevBoss extends PluginBase implements Listener {

	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	
	public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		if($sender->hasPermission("boss.commands")){
			if(strtolower($command) == "boss"){
				if(isset($args[0])){
					if($args[0] == "help"){
						$sender->sendMessage("§cTrợ Giúp Về Các Lệnh Của Boss:");
						$sender->sendMessage("§c* §f/boss author §8- §fThông Tin Của Plugin.");
						$sender->sendMessage("§c* §f/boss zombie §8- §fTạo Boss Zombie");
						$sender->sendMessage("§c* §f/boss husk §8- §fTạo Boss Husk");
						$sender->sendMessage("§c* §f/boss pigzombie§8- §fTạo Boss PigZombie");
					}
					if(strtolower($args[0]) == "author"){
						$sender->sendMessage("§d§l❖§b ʙoss §d❖ §fAuthor: CrystalDev (vk.com/crystaldev).");
					}
					if(strtolower($args[0]) == "zombie"){
						$sender->sendMessage("§d§l❖§b ʙoss §d❖ §fBoss Zombie Đã Được Tạo Thành Công");
						$nbt = new CompoundTag ("", [ 
							"Pos" => new ListTag( "Pos", [ 
								new DoubleTag("", $sender->x),
								new DoubleTag("", $sender->y + $sender->getEyeHeight()),
								new DoubleTag("", $sender->z) 
							]),
							"Motion" => new ListTag ( "Motion", [ 
								new DoubleTag("", 0),
								new DoubleTag("", 0),
								new DoubleTag("", 0) 
							]),
							"Rotation" => new ListTag("Rotation", [ 
								new FloatTag("", $sender->yaw),
								new FloatTag("", $sender->pitch) 
							]) 
						]);
						$mob = Entity::createEntity(Zombie::NETWORK_ID, $sender->getLevel(), $nbt);
						$mob->setMaxHealth(30000);
						$mob->setHealth(30000);
						$mob->setNameTag("§l§dＢＯＳＳ §bＺＯＭＢＩＥ");
						$mob->spawnToAll();
					}
					if(strtolower($args[0]) == "husk"){
						$sender->sendMessage("§d§l❖§b ʙoss §d❖ §fBoss Husk Đã Được Tạo Thành Công");
						$nbt = new CompoundTag ("", [ 
							"Pos" => new ListTag( "Pos", [ 
								new DoubleTag("", $sender->x),
								new DoubleTag("", $sender->y + $sender->getEyeHeight()),
								new DoubleTag("", $sender->z) 
							]),
							"Motion" => new ListTag ( "Motion", [ 
								new DoubleTag("", 0),
								new DoubleTag("", 0),
								new DoubleTag("", 0) 
							]),
							"Rotation" => new ListTag("Rotation", [ 
								new FloatTag("", $sender->yaw),
								new FloatTag("", $sender->pitch) 
							]) 
						]);
						$mob = Entity::createEntity(Husk::NETWORK_ID, $sender->getLevel(), $nbt);
						$mob->setMaxHealth(40000);
						$mob->setHealth(40000);
						$mob->setNameTag("§d§lＢＯＳＳ §aＨＵＳＫ");
						$mob->spawnToAll();
					}
					if(strtolower($args[0]) == "pigzombie"){
						$sender->sendMessage("§d§l❖§b ʙoss §d❖ §fBoss PigZombie Đã Được Tạo Thành Công");
						$nbt = new CompoundTag ("", [ 
							"Pos" => new ListTag( "Pos", [ 
								new DoubleTag("", $sender->x),
								new DoubleTag("", $sender->y + $sender->getEyeHeight()),
								new DoubleTag("", $sender->z) 
							]),
							"Motion" => new ListTag ( "Motion", [ 
								new DoubleTag("", 0),
								new DoubleTag("", 0),
								new DoubleTag("", 0) 
							]),
							"Rotation" => new ListTag("Rotation", [ 
								new FloatTag("", $sender->yaw),
								new FloatTag("", $sender->pitch) 
							]) 
						]);
						$mob = Entity::createEntity(PigZombie::NETWORK_ID, $sender->getLevel(), $nbt);
						$mob->setMaxHealth(50000);
						$mob->setHealth(50000);
						$mob->setNameTag("§d§lＢＯＳＳ §cＰＩＧＺＯＭＢＩＥ");
						$mob->spawnToAll();
					}
				}
			}
		}
	}
	
	public function onEntityDamageEvent(EntityDamageEvent $event){
		$player = $event->getEntity();
		$x = $player->getX();
		$y = $player->getY();
		$z = $player->getZ();
		$vector = new Vector3(mt_rand(0.10, -0.10), 0, mt_rand(0.10, -0.10));
        if($event instanceof EntityDamageByEntityEvent){
			$damager = $event->getDamager();
			if($damager instanceof Player && $player instanceof Zombie){
				$event->setKnockBack(0);
				if($player->getHealth() > $event->getDamage()){
					$damager->sendTip("   §l §dＢＯＳＳ §bＺＯＭＢＩＥ\n§c§l⚠ §a{$player->getHealth()}§d/§b30000 §c⚠");
					$random = mt_rand(1, 100);
					if($random == 1){
						$damager->setHealth($damager->getHealth() - 4);
						$damager->sendMessage("§d§l❖§b ʙoss §d❖ §l§dＢＯＳＳ §bＺＯＭＢＩＥ §eĐã Gây §cSát Thương §b4 §6HP §eLên Bạn");
					}
					if($random == 2){
						$player->setHealth($player->getHealth() + 6);
						$damager->sendMessage("§d§l❖§b ʙoss §d❖ §l§dＢＯＳＳ §bＺＯＭＢＩＥ§e Đã Tự Chữa Trị Bằng Cách §aPhục Hồi §b6 §6HP §eCho Chính Mình");
					}
					if($random == 3){
						$damager->setHealth($damager->getHealth() - 2);
						$damager->sendMessage("§d§l❖§b ʙoss §d❖ §l§dＢＯＳＳ §bＺＯＭＢＩＥ §eĐã Gây §cSát Thương §b2 §6HP §eLên Bạn");
					}
				}else{
					$player->setMaxHealth(30000);
					$player->setHealth(30000);
					$this->getServer()->broadcastMessage("§d§l❖§b ʙoss §d❖ §l§dＢＯＳＳ §bＺＯＭＢＩＥ§e Đã Bị§c Tiêu Diệt §bBởi§6 ". $damager->getName() ."");
					$player->getLevel()->dropItem(new Vector3($x, $y, $z), Item::get(Item::STEAK, 0, mt_rand(3, 8)), $vector, 0);
					$player->getLevel()->dropItem(new Vector3($x, $y, $z), Item::get(Item::GOLD_SWORD, 0, 1), $vector, 0);
					$player->getLevel()->dropItem(new Vector3($x, $y, $z), Item::get(Item::IRON_BOOTS, 0, 1), $vector, 0);
					$player->getLevel()->dropItem(new Vector3($x, $y, $z), Item::get(Item::WOOD, 0, mt_rand(12, 20)), $vector, 0);
					$player->getLevel()->dropItem(new Vector3($x, $y, $z), Item::get(Item::APPLE, 0, mt_rand(3, 9)), $vector, 0);
					$player->getLevel()->dropItem(new Vector3($x, $y, $z), Item::get(Item::IRON_INGOT, 0, mt_rand(4, 9)), $vector, 0);
				}
			}elseif($damager instanceof Player && $player instanceof Husk){
				$event->setKnockBack(0);
				if($player->getHealth() > $event->getDamage()){
					$damager->sendTip("  §d  §lＢＯＳＳ §aＨＵＳＫ\n§c§l⚠ §a{$player->getHealth()}§d/§b40000 §c⚠");
					$random = mt_rand(1, 100);
					if($random == 1){
						$damager->setHealth($damager->getHealth() - 6);
						$damager->sendMessage("§d§l❖§b ʙoss §d❖ §d§lＢＯＳＳ §aＨＵＳＫ §eĐã Gây §cSát Thương §b6 §6HP §eLên Bạn");
					}
					if($random == 2){
						$damager->addEffect(Effect::getEffect(18)->setDuration(20 * 10)->setVisible(true));
						$damager->sendMessage("§d§l❖§b ʙoss §d❖ §d§lＢＯＳＳ §aＨＵＳＫ eĐang Gây §cẢnh Hưởng Tiêu Cực §eLên Bạn");
					}
					if($random == 3){
						$player->setHealth($player->getHealth() + 10);
						$damager->sendMessage("§d§l❖§b ʙoss §d❖ §d§lＢＯＳＳ §aＨＵＳＫ§e Đã Tự Chữa Trị Bằng Cách §aPhục Hồi §b10 §6HP §eCho Chính Mình");
					}
					if($random == 4){
						$damager->addEffect(Effect::getEffect(19)->setDuration(20 * 4)->setVisible(true));
						$damager->sendMessage("§d§l❖§b ʙoss §d❖ §d§lＢＯＳＳ §aＨＵＳＫ §eĐang Gây §cẢnh Hưởng Tiêu Cực §eLên Bạn");
					}
					if($random > 5){
						$damager->setHealth($damager->getHealth() - 4);
						$damager->sendMessage("§d§l❖§b ʙoss §d❖ §d§lＢＯＳＳ §aＨＵＳＫ §eĐã Gây §cSát Thương §b4 §6HP §eLên Bạn");
					}
				}else{
					$player->setMaxHealth(40000);
					$player->setHealth(40000);
					$this->getServer()->broadcastMessage("§d§l❖§b ʙoss §d❖ §d§lＢＯＳＳ §aＨＵＳＫ §eĐã Bị§c Tiêu Diệt §bBởi§6 ". $damager->getName() ."");
					$player->getLevel()->dropItem(new Vector3($x, $y, $z), Item::get(Item::STEAK, 0, mt_rand(5, 10)), $vector, 0);
					$player->getLevel()->dropItem(new Vector3($x, $y, $z), Item::get(Item::IRON_SWORD, 0, 1), $vector, 0);
					$player->getLevel()->dropItem(new Vector3($x, $y, $z), Item::get(Item::IRON_HELMET, 0, 1), $vector, 0);
					$player->getLevel()->dropItem(new Vector3($x, $y, $z), Item::get(Item::WOOD, 0, mt_rand(15, 23)), $vector, 0);
					$player->getLevel()->dropItem(new Vector3($x, $y, $z), Item::get(Item::APPLE, 0, mt_rand(4, 12)), $vector, 0);
					$player->getLevel()->dropItem(new Vector3($x, $y, $z), Item::get(Item::DIAMOND, 0, mt_rand(2, 7)), $vector, 0);
					$player->getLevel()->dropItem(new Vector3($x, $y, $z), Item::get(Item::IRON_INGOT, 0, mt_rand(3, 11)), $vector, 0);
				}
			}elseif($damager instanceof Player && $player instanceof PigZombie){
				$event->setKnockBack(0);
				if($player->getHealth() > $event->getDamage()){
					$damager->sendTip("   §d §lＢＯＳＳ §cＰＩＧＺＯＭＢＩＥ\n§l§c⚠§a {$player->getHealth()}§d/§b50000 §c⚠");
					$random = mt_rand(1, 100);
					if($random == 1){
						$damager->setHealth($damager->getHealth() - 8);
						$damager->sendMessage("§d§l❖§b ʙoss §d❖ §d§lＢＯＳＳ §cＰＩＧＺＯＭＢＩＥ §eĐã Gây §cSát Thương §b8 §6HP §eLên Bạn");
					}
					if($random == 2){
						$damager->addEffect(Effect::getEffect(18)->setDuration(20 * 10)->setVisible(true));
						$damager->sendMessage("§d§l❖§b ʙoss §d❖ §d§lＢＯＳＳ §cＰＩＧＺＯＭＢＩＥ §eĐang Gây §cẢnh Hưởng Tiêu Cực §eLên Bạn");
					}
					if($random == 3){
						$damager->addEffect(Effect::getEffect(20)->setDuration(20 * 20)->setVisible(true));
						$damager->sendMessage("§d§l❖§b ʙoss §d❖ §d§lＢＯＳＳ §cＰＩＧＺＯＭＢＩＥ §eĐang Gây §cẢnh Hưởng Tiêu Cực §eLên Bạn");
					}
					if($random == 4){
						$player->setHealth($player->getHealth() + 20);
						$damager->sendMessage("§d§l❖§b ʙoss §d❖ §d§lＢＯＳＳ §cＰＩＧＺＯＭＢＩＥ §eĐã Tự Chữa Trị Bằng Cách §aPhục Hồi §b20 §6HP §eCho Chính Mình");
					}
					if($random == 5){
						$damager->setHealth($damager->getHealth() - 4);
						$damager->sendMessage("§d§l❖§b ʙoss §d❖ §d§lＢＯＳＳ §cＰＩＧＺＯＭＢＩＥ §eĐã Gây §cSát Thương §b4 §6HP §eLên Bạn");
					}
				}else{
					$player->setMaxHealth(50000);
					$player->setHealth(50000);
					$this->getServer()->broadcastMessage("§d§l❖§b ʙoss §d❖ §d§lＢＯＳＳ §cＰＩＧＺＯＭＢＩＥ§e Đã Bị§c Tiêu Diệt §bBởi§6 ". $damager->getName() ."");
					$entity->getLevel()->dropItem(new Vector3($x, $y, $z), Item::get(Item::STEAK, 0, mt_rand(9, 15)), $vector, 0);
					$entity->getLevel()->dropItem(new Vector3($x, $y, $z), Item::get(Item::DIAMOND_SWORD, 0, 1), $vector, 0);
					$entity->getLevel()->dropItem(new Vector3($x, $y, $z), Item::get(Item::DIAMOND_HELMET, 0, 1), $vector, 0);
					$entity->getLevel()->dropItem(new Vector3($x, $y, $z), Item::get(Item::WOOD, 0, mt_rand(26, 39)), $vector, 0);
					$entity->getLevel()->dropItem(new Vector3($x, $y, $z), Item::get(Item::APPLE, 0, mt_rand(5, 16)), $vector, 0);
					$entity->getLevel()->dropItem(new Vector3($x, $y, $z), Item::get(Item::DIAMOND, 0, mt_rand(3, 9)), $vector, 0);
					$entity->getLevel()->dropItem(new Vector3($x, $y, $z), Item::get(Item::IRON_INGOT, 0, mt_rand(5, 13)), $vector, 0);
				}
			}
		}
	}
}