<?php

namespace giftcode;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\item\Item;
use onebone\economyapi\EconomyAPI;
use pocketmine\utils\Config;
use _64FF00\PurePerms\PurePerms;

class Giftcode extends PluginBase {
        
     public $used;
	 public $eco;
	 public $giftcode;
	 private static $instance = null;

	 public function onEnable() {
	    if(!is_dir($this->getDataFolder())) {
		mkdir($this->getDataFolder());
		}
		self::$instance = $this;
		$this->eco = EconomyAPI::getInstance();
		
		$this->used = new \SQLite3($this->getDataFolder() ."used-code.db");
		$this->used->exec("CREATE TABLE IF NOT EXISTS code (code);");
		
		$this->giftcode = new \SQLite3($this->getDataFolder() ."code.dn");
		$this->giftcode->exec("CREATE TABLE IF NOT EXISTS code (code);");
	 }
	 
	 public static function getInstance(){
		return self::$instance;
	}
	  
	 public function generateCode() {
	     $characters = '012345abcdeABCDE';
    $charactersLength = strlen($characters);
	$length = 10;
    $randomString = 'MINEDRAGON';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
	
		$this->addCode($this->giftcode, $randomString);
		
		$this->getServer()->getLogger()->info("§aDEBUG ". $randomString);
    return $randomString;
	 }
	 public function codeExists($file, $code) {
		 
		 
		 $query = $file->query("SELECT * FROM code WHERE code='$code';");
		 $ar = $query->fetchArray(SQLITE3_ASSOC);
		 
		 if(!empty($ar)) {
			 return true;
		 } else {
			 return false;
		 }
	 }
	 
	 public function addCode($file, $code) {
		 
		 $stmt = $file->prepare("INSERT OR REPLACE INTO code (code) VALUES (:code);");
		 $stmt->bindValue(":code", $code);
		 $stmt->execute();
		 
	 }
	 public function onCommand(CommandSender $s, Command $cmd, $label, array $args) {
	 
	 if($cmd->getName() == "taocode") {
		if($s->isOp()) {
			
		
		 $code = $this->generateCode();
		 $this->getServer()->broadcastMessage("§l§e[§l§b==================================§l§e]");
				$this->getServer()->broadcastMessage("");
				$this->getServer()->broadcastMessage("§l§b♦ §l§aCode: §l§c". $code ."");
				$this->getServer()->broadcastMessage("");
				$this->getServer()->broadcastMessage("§l§e[§l§b==================================§l§e]\n");
				$this->getServer()->broadcastMessage("");
				 $this->getServer()->broadcastMessage("§l§c⚠§d /xaicode§e [§bCode§e]§a Để Sử Dụng§c Code");
		}
	 }
	 if($cmd->getName() == "xaicode") {
	 
	    if(isset($args[0])) {
		
		
		if($this->codeExists($this->giftcode, $args[0])) {
		
		
	     if(!($this->codeExists($this->used, $args[0]))) {
		 
           $chance = mt_rand(1, 100);
		   
		   $this->addCode($this->used, $args[0]);
		   
		   $this->getServer()->getLogger()->info("§aDEBUG code:". $args[0]);
		   $this->getServer()->broadcastMessage("§l§b♦§6 ". $s->getName() ." §dĐã Sử Dụng§c Code");
		   
		switch($chance) {
		   case 50:
		     
			 $keys = array_rand(Item::$list, 4);
			 for($i = 0; $i <= 3; ++$i) {
			    $item = Item::get($keys[$i], 0, 1);
			   $s->addItem($item);
			   $s->sendMessage("§l§b♦ §aBạn§d Nhận Được §c". $item->getName() ." §aTừ §cCode");
			  
	    }
		break;
		  case 40:
		    $s->sendMessage("§l§b♦ §c Bạn §aMay Mắn Nhận §cĐược§c 10000 §6Xu §eVà §c5 §bKhối Kim Cương");
			$this->eco->addMoney($s->getName(), 10000);
			$s->getInventory()->addItem(Item::get(57, 0, 5));
			break;
			 case 99:
		    $s->sendMessage("§l§b♦ §cBạn §aMay Mắn Nhận §cĐược §eRank§d Vip §6I");
			$this->getServer()->dispatchCommand(new ConsoleCommandSender(),'setgroup ' . $sender->getName() . ' VipI');
			break;
	       default:
		    $s->sendMessage("§l§b♦ §c Bạn §aMay Mắn Nhận §cĐược§c 3000 §6Xu §eVà §c64 §6Khối Cỏ");
			$this->eco->addMoney($s->getName(), 3000);
			$s->getInventory()->addItem(Item::get(2, 0, 64));
			break;
	    }
	   } else {
	   $s->sendMessage("§l§b♦ §cCode§a Đã Được §dSử Dụng");
	   return true;
	   }
      } else {
	  $s->sendMessage("§l§b♦ §eKhông §aTìm Thấy§c Code!");
	  return true;
	  }
	 }
    }
   }
  }