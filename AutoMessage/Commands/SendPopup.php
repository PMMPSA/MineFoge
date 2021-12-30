<?php

/*
 * AutoMessage (v1.16) by SoiCon
 * Developer: SoiCon (HIGHLIGHT)
 * Website: http://youtube.com/c/soicontm
 * Date: 28/05/2017 03:34 PM (UTC)
 * Copyright & License: (C) 2017-2018 SoiCon
 * Licensed under MIT (https://youtube.com/c/soicontm)
 */

namespace AutoMessage\Commands;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\permission\Permission;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

use AutoMessage\Main;
use AutoMessage\Tasks\PopupDurationTask;

class SendPopup extends PluginBase implements CommandExecutor{
	
	public function __construct(Main $plugin){
        $this->plugin = $plugin;
    }
    
    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {
    	$fcmd = strtolower($cmd->getName());
    	switch($fcmd){
    			case "sendpopup":
    				$this->temp = $this->plugin->getConfig()->getAll();
    				if($sender->hasPermission("automessage.sendpopup")){
    					if(isset($args[0]) && isset($args[1])){
    						//Send message to all players
    						if($args[0]=="*"){
    							//Verify is $sender is Console or Player
    							if($sender instanceof CommandSender){
    								$this->plugin->getServer()->getScheduler()->scheduleRepeatingTask(new PopupDurationTask($this->plugin, $this->plugin->popupbyConsole($sender, $this->temp, $this->plugin->getMessagefromArray($args)), null, $this->temp["popup-duration"]), 10);
    							}elseif($sender instanceof Player){
									$this->plugin->getServer()->getScheduler()->scheduleRepeatingTask(new PopupDurationTask($this->plugin, $this->plugin->popupbyPlayer($sender, $this->temp, $this->plugin->getMessagefromArray($args)), null, $this->temp["popup-duration"]), 10);
    							}	
    						}else{
    							//Verify if player exists
    							if($this->plugin->getServer()->getPlayerExact($args[0])){
    								$receiver = $this->plugin->getServer()->getPlayerExact($args[0]);
    								//Verify is $sender is Console or Player
    								if($sender instanceof CommandSender){
    									$this->plugin->getServer()->getScheduler()->scheduleRepeatingTask(new PopupDurationTask($this->plugin, $this->plugin->popupbyConsole($sender, $this->temp, $this->plugin->getMessagefromArray($args)), $receiver, $this->temp["popup-duration"]), 10);
    								}elseif($sender instanceof Player){
    									$this->plugin->getServer()->getScheduler()->scheduleRepeatingTask(new PopupDurationTask($this->plugin, $this->plugin->popupbyPlayer($sender, $this->temp, $this->plugin->getMessagefromArray($args)), $receiver, $this->temp["popup-duration"]), 10);
    								}
    							}else{
    								$sender->sendMessage($this->plugin->translateColors("&", Main::PREFIX . "&cPlayer not found"));
    							}
    						}
    					}else{
    						$sender->sendMessage($this->plugin->translateColors("&", Main::PREFIX . "&cUsage: /sp <player> <message>"));
    					}
    				}else{
    					$sender->sendMessage($this->plugin->translateColors("&", "&cYou don't have permissions to use this command"));
    					return true;
    				}
				break;
    		}
    	return true;
    }
    
}
    ?>
