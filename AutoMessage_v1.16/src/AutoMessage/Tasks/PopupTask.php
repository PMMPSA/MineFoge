<?php

/*
 * AutoMessage (v1.16) by SoiCon
 * Developer: SoiCon (HIGHLIGHT)
 * Website: http://youtube.com/c/soicontm
 * Date: 28/05/2017 01:45 PM (UTC)
 * Copyright & License: (C) 2017-2018 SoiCon
 * Licensed under MIT (https://youtube.com/c/soicontm)
 */

namespace AutoMessage\Tasks;

use pocketmine\Server;
use pocketmine\scheduler\PluginTask;
use pocketmine\utils\TextFormat;

use AutoMessage\Main;

class PopupTask extends PluginTask {

    public function __construct(Main $plugin){
        parent::__construct($plugin);
        $this->plugin = $plugin;
		$this->length = -1;
    }

    public function onRun($currentTick){
    	$this->plugin = $this->getOwner();
    	$this->cfg = $this->plugin->getConfig()->getAll();
    	if($this->cfg["popup-broadcast-enabled"]==true){
    		$this->length=$this->length+1;
    		$popups = $this->cfg["popups"];
    		$popupkey = $this->length;
    		$popup = $popups[$popupkey];
    		if($this->length==count($popups)-1) $this->length = -1;
    		$this->plugin->getServer()->getScheduler()->scheduleRepeatingTask(new PopupDurationTask($this->plugin, $this->plugin->broadcast($this->cfg, $popup), null, $this->cfg["popup-duration"]), 10);
    	}
    }

}
?>
