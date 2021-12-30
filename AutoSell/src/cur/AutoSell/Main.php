<?php

namespace cur\AutoSell;

use pocketmine\{Player, Server};
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\{Command,CommandSender, CommandExecutor, ConsoleCommandSender};
use pocketmine\inventory\BaseInventory;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\utils\TextFormat;
use pocketmine\utils\config;
class Main extends PluginBase implements Listener
{
	private $config;
	private $mode = [];
	public function onEnable()
	{
        $this->getLogger()->info(TextFormat::GREEN . "Enable");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
		
    }
	public function onDisable ()
	{
		$this->getLogger()->info(TextFormat::RED . "Disable");
	}
	public function onJoin (PlayerJoinEvent $j)
	{
	    $player = $j->getPlayer()->getName();
		$this->mode[$player] = "off";
	}
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {
       if (strtolower($cmd->getName()) == "autosell") {
           if(!isset($args[0])){
               $sender->sendMessage("§b§l§aMINE§bDRAGON Cú pháp:§e /autosell§a on§r§l||§coff");
               return false;
           }
           switch ($args[0]) {
               case "on":
			       $sender->sendMessage("§b§l§aMINE§bDRAGON Đã bật chức năng tự động bán");
				   $this->mode[$sender->getName()] = "on";
				   break;
               case "off":
			       $sender->sendMessage("§b§l§aMINE§bDRAGON Đã tắt chức năng tự động bán"); 
                   $this->mode[$sender->getName()] = "off";
				   break;
               default :
                   $sender->sendMessage("§b§l§aMINE§bDRAGON Cú pháp:§e /autosell§a on§r§l||§coff");
                   break;
           }
       }
       return true;
   }
    public function handles() {
		return [
			BlockBreakEvent::class => "handleBlockBreak",
			PlayerQuitEvent::class => "handlePlayerQuit",
		];
	}
    public function handleBlockBreak(BlockBreakEvent $event) {
		$player = $event->getPlayer();
		foreach($event->getDrops() as $drop) {
			if(!$player->getInventory()->canAddItem($drop)) 
			{
				if ($this->mode[$player->getName()] == "on") 
				{
				$this->getServer()->dispatchCommand($player, "sell all");
				$event->getPlayer()->addTitle("§l§a✠§6 KHO ĐỒ ĐÃ ĐẦY §a✠", "§l§cTự động bán !!!");
				}
				break;
			}
		}
	}
    public function onQuit(PlayerQuitEvent $e){
       $a = "autosell off";
       $this->getServer()->dispatchCommand($e->getPlayer(),$a);
    }
}