<?php

namespace CoolCrates\crate;


use CoolCrates\Utils;

class CrateContent {
 
    /** @var string */
    private $rouletteMessage;
    
    /** @var array */
    private $commands = [];
    
    /** @var string */
    private $wonMessage;
    
    /**
     * CrateContent constructor.
     * @param string $rouletteMessage
     * @param array $commands
     * @param string $wonMessage
     */
    public function __construct($rouletteMessage, array $commands, $wonMessage) {
        $this->rouletteMessage = Utils::translateColors($rouletteMessage);
        $this->commands = $commands;
        $this->wonMessage = Utils::translateColors($wonMessage);
    }
    
    /**
     * @return string
     */
    public function getRouletteMessage(){
        return $this->rouletteMessage;
    }
    
    /**
     * @return array
     */
    public function getCommands(): array {
        return $this->commands;
    }
    
    /**
     * @return string
     */
    public function getWonMessage(){
        return $this->wonMessage;
    }
    
    /**
     * @param string $rouletteMessage
     */
    public function setRouletteMessage($rouletteMessage) {
        $this->rouletteMessage = $rouletteMessage;
    }
    
    /**
     * @param array $commands
     */
    public function setCommands(array $commands) {
        $this->commands = $commands;
    }
    
    /**
     * @param string $wonMessage
     */
    public function setWonMessage($wonMessage) {
        $this->wonMessage = $wonMessage;
    }
    
}
