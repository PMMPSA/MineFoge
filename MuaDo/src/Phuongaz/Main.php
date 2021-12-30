<?php

namespace Phuongaz;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\utils\TextFormat as TF;
use pocketmine\command\CommandReader;
use pocketmine\command\CommandExecuter;
use pocketmine\command\ConsoleCommandSender;
class Main extends PluginBase implements Listener{
	public $tag = "§l§d[§eＭＵＡＤＯ§d]§r ";
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->eco = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");	
		$this->point = $this->getServer()->getPluginManager()->getPlugin("CoinAPI");		
		$this->getLogger()->info(TF::GREEN . "§d§l====================\n§l§eＭＵＡＤＯ§6 BY§b Phuongaz \n§d§l====================");
	}
	public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
		if ($cmd->getName() == "muado"){
		$sender->sendMessage($this->tag."§c /muado danhsach để xem danh sách §eＭＵＡＤＯ");
		if(isset($args[0])){
				if(isset($args[0])){
				switch(strtolower($args[0])){
      case "danhsach":
      $sender->sendMessage("§a§l• §6Kiếm Noel §b[§dkiemnoel§b]§6: §c20.000.000 Xu");
      $sender->sendMessage("§a§l• §6Kiếm Bóng Tối §b[§dkiembongtoi§b]§6: §c40.000.000 Xu");
      $sender->sendMessage("§a§l• §6Kiếm MineFoge §b[§dkiemminefoge§b]§6: §c100.000.000 Xu");
      $sender->sendMessage("§a§l• §6Cúp Rohan §b[§dcuprohan§b]§6: §c20.000.000 Xu");
      $sender->sendMessage("§a§l• §6Cúp Tà Thần §b[§dcuptathan§b]§6: §c40.000.000 Xu");
      $sender->sendMessage("§a§l• §6Cúp MineFoge §b[§dcupfoge§b]§6: §c100.000.000 Xu");
      $sender->sendMessage("§a§l• §6Nón MineFoge §b[§dnonminefoge§b]§6: §c100.000.000 Xu");
      $sender->sendMessage("§a§l• §6Áo MineFoge §b[§daominefoge§b]§6: §c100.000.000 Xu");
      $sender->sendMessage("§a§l• §6Quần MineFoge §b[§dquanminefoge§b]§6: §c100.000.000 Xu");
      $sender->sendMessage("§a§l• §6Giày MineFoge §b[§dgiayminefoge§b]§6: §c100.000.000 Xu");
      }
    }
  }
      if(isset($args[0])){
				if(isset($args[0])){
				switch(strtolower($args[0])){
				case "aominefoge":
					   $item1 = Item::get(310, 0, 1);
						 $item2 = Item::get(311, 0, 1);
						 $item3 = Item::get(312, 0, 1);
						 $item4 = Item::get(313, 0, 1);
						 $item5 = Item::get(276, 0, 1);
						 $item6 = Item::get(278, 0, 1);
						 $item7 = Item::get(278, 0, 1);
						 $item8 = Item::get(279, 0, 1);
						 $item9 = Item::get(261, 0, 1);						 
						 $name1 = $item1->setCustomName("§l§b•=[§a Mũ §bVIPMASTER §b]=•");
						 $name2 = $item2->setCustomName("§6§lÁo §aMine§bFoge");
						 $name3 = $item3->setCustomName("§l§b•=[§a Quần §bVIPMASTER§b ]=•");
						 $name4 = $item4->setCustomName("§l§b•=[§a Giày §bVIPMASTER §b ]=•");
						 $name5 = $item5->setCustomName("§l§b•=[§a Kiếm §bVIPMASTER§b ]=•");
						 $name6 = $item6->setCustomName("§l§b•=[§a Cúp §cDragon§b ]=•");
						 $name9 = $item9->setCustomName("§l§b•=[§a Bow §cRỒNG§b ]=•");						 
 $money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
						  if ($money < 100000000){
							  $sender->sendMessage(TF::RED . "Bạn Không Đủ Tiền Để Mua");
						  }
						  else{
						   $item1->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
						    $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(50));
							 $item1->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item1->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item2->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
							  $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(30));
							 $item2->addEnchantment(Enchantment::getEnchantment(5)->setLevel(100));
							 $item2->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item3->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
	$item3->addEnchantment(Enchantment::getEnchantment(2)->setLevel(10));
							 $item3->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item3->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item4->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item5->addEnchantment(Enchantment::getEnchantment(9)->setLevel(1000));
							 $item5->addEnchantment(Enchantment::getEnchantment(12)->setLevel(100));
							 $item5->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item6->addEnchantment(Enchantment::getEnchantment(15)->setLevel(9));
							 $item6->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100)); 
							 $item9 ->addEnchantment(Enchantment::getEnchantment(22)->setLevel(9999));
							 $item9 ->addEnchantment(Enchantment::getEnchantment(19)->setLevel(9999));
							 $item9 ->addEnchantment(Enchantment::getEnchantment(20)->setLevel(9999));									 $item9 ->addEnchantment(Enchantment::getEnchantment(21)->setLevel(1000));						 
							   //$sender->getInventory()->addItem($item1);
							 $sender->getInventory()->addItem($item2);
							 //$sender->getInventory()->addItem($item3);
							 //$sender->getInventory()->addItem($item4);
							 //$sender->getInventory()->addItem($item5);
							 //$sender->getInventory()->addItem($item6);
							 //$sender->getInventory()->addItem($item9);							 
							 //$item1->setCustomName($name1);
							   $item2->setCustomName($name2);
							 //$item3->setCustomName($name3);
							 //$item4->setCustomName($name4);
							 //$item5->setCustomName($name5);
							 //$item6->setCustomName($name6);
							 //$item9 ->setCustomName($name9);
						  $sender->sendMessage($this->tag. "§a Mua Thành Công Áo MineFoge");
						  
						  
							  $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 100000000);
							  }
 return true;
 break;
 case "cuprohan":
					   $item1 = Item::get(310, 0, 1);
						 $item2 = Item::get(311, 0, 1);
						 $item3 = Item::get(312, 0, 1);
						 $item4 = Item::get(313, 0, 1);
						 $item5 = Item::get(276, 0, 1);
						 $item6 = Item::get(278, 0, 1);
						 $item7 = Item::get(278, 0, 1);
						 $item8 = Item::get(279, 0, 1);
						 $name1 = $item1->setCustomName("§l§b•=[§a Mũ §bThe KING §b]=•");
						 $name2 = $item2->setCustomName("§l§b•=[§a Áo §bThe KING §b]=•");
						 $name3 = $item3->setCustomName("§l§b•=[§a Quần §bThe KING§b ]=•");
						 $name4 = $item4->setCustomName("§l§b•=[§a Giày §bThe KING§b ]=•");
						 $name5 = $item5->setCustomName("§l§b•=[§a⚡ Kiếm §bSét§b ⚡]=•");
						 $name6 = $item6->setCustomName(" §e§l★ §c Cúp Rohan §e★");
 $money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
						  if ($money < 20000000){
							  $sender->sendTitle(TF::RED . "Không đủ tiền\n §b Bạn Cần Thêm Xu Để\n Sở Hữu Cúp §c Rohan");
						  }
						  else{
						   $item1->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
						    $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(50));
							 $item1->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item1->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item2->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
							  $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(30));
							 $item2->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item2->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item3->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
	$item3->addEnchantment(Enchantment::getEnchantment(2)->setLevel(10));
							 $item3->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item3->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item4->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item5->addEnchantment(Enchantment::getEnchantment(9)->setLevel(50));
							 $item5->addEnchantment(Enchantment::getEnchantment(12)->setLevel(20));
							 $item5->addEnchantment(Enchantment::getEnchantment(26)->setLevel(7));
							 $item5->addEnchantment(Enchantment::getEnchantment(17)->setLevel(10));
							 $item6->addEnchantment(Enchantment::getEnchantment(18)->setLevel(100));
							 $item6->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item6->addEnchantment(Enchantment::getEnchantment(9)->setLevel(5));
							$item6->addEnchantment(Enchantment::getEnchantment(13)->setLevel(5));
							 $item6->addEnchantment(Enchantment::getEnchantment(15)->setLevel(100));
							 $item6->addEnchantment(Enchantment::getEnchantment(12)->setLevel(2));
							
							 $player = $sender->getName();
							$item6->setLore(array("§a§l ❄§e§l Vật Phẩm Được Tinh Luyện Tại §c Rohan\n§a§l ❄§e§l Vật Phẩm Của $player\n§a§l ❄§e§l Trị Giá §c20.000.000 xu\n§a§l ❄§e§l Độ Hiếm §b✡✡"));
							
							   //$sender->getInventory()->addItem($item1);
							 //$sender->getInventory()->addItem($item2);
							 //$sender->getInventory()->addItem($item3);
							 //$sender->getInventory()->addItem($item4);
							 //$sender->getInventory()->addItem($item5);
							 $sender->getInventory()->addItem($item6);
							 //$item1->setCustomName($name1);
							 //$item2->setCustomName($name2);
							 //$item3->setCustomName($name3);
							 //$item4->setCustomName($name4);
							 //$item5->setCustomName($name5);
							 $item6->setCustomName($name6);
						  $sender->sendTitle($this->tag. "§a Mua Thành Công\n §e Bạn Đã Sở Hữu Cúp §c Rohan");
						  
						  
							  $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 20000000);
							  }
							  return true;
					  break;
					  case "quanminefoge":
					   $item1 = Item::get(310, 0, 1);
						 $item2 = Item::get(311, 0, 1);
						 $item3 = Item::get(312, 0, 1);
						 $item4 = Item::get(313, 0, 1);
						 $item5 = Item::get(276, 0, 1);
						 $item6 = Item::get(278, 0, 1);
						 $item7 = Item::get(278, 0, 1);
						 $item8 = Item::get(279, 0, 1);
						 $item9 = Item::get(261, 0, 1);						 
						 $name1 = $item1->setCustomName("§l§b•=[§a Mũ §bVIPMASTER §b]=•");
						 $name2 = $item2->setCustomName("§l§b•=[§a Áo §bCRAFT  LEGENDERY§b]=•");
						 $name3 = $item3->setCustomName("§6§lQuần kiemminefoge");
						 $name4 = $item4->setCustomName("§l§b•=[§a Giày §bVIPMASTER §b ]=•");
						 $name5 = $item5->setCustomName("§l§b•=[§a Kiếm §bVIPMASTER§b ]=•");
						 $name6 = $item6->setCustomName("§l§b•=[§a Cúp §cDragon§b ]=•");
						 $name9 = $item9->setCustomName("§l§b•=[§a Bow §cRỒNG§b ]=•");						 
 $money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
						  if ($money < 100000000){
							  $sender->sendMessage(TF::RED . "Không đủ tiền");
						  }
						  else{
						   $item1->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
						    $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(50));
							 $item1->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item1->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item2->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
							  $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(30));
							 $item2->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item2->addEnchantment(Enchantment::getEnchantment(17)->setLevel(200));
							 $item3->addEnchantment(Enchantment::getEnchantment(0)->setLevel(200));
	$item3->addEnchantment(Enchantment::getEnchantment(2)->setLevel(200));
							 $item3->addEnchantment(Enchantment::getEnchantment(5)->setLevel(200));
							 $item3->addEnchantment(Enchantment::getEnchantment(17)->setLevel(200));
							 $item4->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item4->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item5->addEnchantment(Enchantment::getEnchantment(9)->setLevel(1000));
							 $item5->addEnchantment(Enchantment::getEnchantment(12)->setLevel(100));
							 $item5->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item6->addEnchantment(Enchantment::getEnchantment(15)->setLevel(9));
							 $item6->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100)); 
							 $item9 ->addEnchantment(Enchantment::getEnchantment(22)->setLevel(9999));
							 $item9 ->addEnchantment(Enchantment::getEnchantment(19)->setLevel(9999));
							 $item9 ->addEnchantment(Enchantment::getEnchantment(20)->setLevel(9999));									 $item9 ->addEnchantment(Enchantment::getEnchantment(21)->setLevel(1000));						 
							   //$sender->getInventory()->addItem($item1);
							 //$sender->getInventory()->addItem($item2);
							 $sender->getInventory()->addItem($item3);
							 //$sender->getInventory()->addItem($item4);
							 //$sender->getInventory()->addItem($item5);
							 //$sender->getInventory()->addItem($item6);
							 //$sender->getInventory()->addItem($item9);							 
							 //$item1->setCustomName($name1);
							   //$item2->setCustomName($name2);
							 $item3->setCustomName($name3);
							 //$item4->setCustomName($name4);
							 //$item5->setCustomName($name5);
							 //$item6->setCustomName($name6);
							 //$item9 ->setCustomName($name9);							 
						  $sender->sendMessage($this->tag. "§a Mua Thành Công Quần MineFoge");
						  
						  
							  $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 100000000);
						  }
 return true;
					  break;
					  case "nonminefoge":
					   $item1 = Item::get(310, 0, 1);
						 $item2 = Item::get(311, 0, 1);
						 $item3 = Item::get(312, 0, 1);
						 $item4 = Item::get(313, 0, 1);
						 $item5 = Item::get(276, 0, 1);
						 $item6 = Item::get(278, 0, 1);
						 $item7 = Item::get(278, 0, 1);
						 $item8 = Item::get(279, 0, 1);
						 $item9 = Item::get(261, 0, 1);						 
						 $name1 = $item1->setCustomName("§6§lNón §aMine§bFoge");
						 $name2 = $item2->setCustomName("§l§b•=[§a Áo §bCRAFT  LEGENDERY§b]=•");
						 $name3 = $item3->setCustomName("§l§b•=[§a Quần §bCRAFT LEGENDERY§b ]=•");
						 $name4 = $item4->setCustomName("§l§b•=[§a Giày §bVIPMASTER §b ]=•");
						 $name5 = $item5->setCustomName("§l§b•=[§a Kiếm §bVIPMASTER§b ]=•");
						 $name6 = $item6->setCustomName("§l§b•=[§a Cúp §cDragon§b ]=•");
						 $name9 = $item9->setCustomName("§l§b•=[§a Bow §cRỒNG§b ]=•");						 
 $money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
						  if ($money < 100000000){
							  $sender->sendMessage(TF::RED . "Không đủ tiền");
						  }
						  else{
						   $item1->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
						    $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(100));
							 $item1->addEnchantment(Enchantment::getEnchantment(5)->setLevel(100));
							 $item1->addEnchantment(Enchantment::getEnchantment(17)->setLevel(200));
							 $item2->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
							  $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(30));
							 $item2->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item2->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item3->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
	$item3->addEnchantment(Enchantment::getEnchantment(2)->setLevel(10));
							 $item3->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item3->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item4->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item5->addEnchantment(Enchantment::getEnchantment(9)->setLevel(1000));
							 $item5->addEnchantment(Enchantment::getEnchantment(12)->setLevel(100));
							 $item5->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item6->addEnchantment(Enchantment::getEnchantment(15)->setLevel(9));
							 $item6->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100)); 
							 $item9 ->addEnchantment(Enchantment::getEnchantment(22)->setLevel(9999));
							 $item9 ->addEnchantment(Enchantment::getEnchantment(19)->setLevel(9999));
							 $item9 ->addEnchantment(Enchantment::getEnchantment(20)->setLevel(9999));									 $item9 ->addEnchantment(Enchantment::getEnchantment(21)->setLevel(1000));					
							 
$sender->getInventory()->addItem($item1);
							 //$sender->getInventory()->addItem($item2);
							 //$sender->getInventory()->addItem($item3);
							 //$sender->getInventory()->addItem($item4);
							 //$sender->getInventory()->addItem($item5);
							 //$sender->getInventory()->addItem($item6);
							 //$sender->getInventory()->addItem($item9);							 
							 $item1->setCustomName($name1);
							   //$item2->setCustomName($name2);
							 //$item3->setCustomName($name3);
							 //$item4->setCustomName($name4);
							 //$item5->setCustomName($name5);
							 //$item6->setCustomName($name6);
							 //$item9 ->setCustomName($name9);							 
						  $sender->sendMessage($this->tag. "§a Mua Thành Công Nón MineFoge");
						  
						  
							  $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 100000000);							  
							  }
						 return true;
					  break;
					  case "giayminefoge":
					   $item1 = Item::get(310, 0, 1);
						 $item2 = Item::get(311, 0, 1);
						 $item3 = Item::get(312, 0, 1);
						 $item4 = Item::get(313, 0, 1);
						 $item5 = Item::get(276, 0, 1);
						 $item6 = Item::get(278, 0, 1);
						 $item7 = Item::get(278, 0, 1);
						 $item8 = Item::get(279, 0, 1);
						 $item9 = Item::get(261, 0, 1);						 
						 $name1 = $item1->setCustomName("§l§b•=[§a Mũ §bVIPMASTER §b]=•");
						 $name2 = $item2->setCustomName("§l§b•=[§a Áo §bCRAFT  LEGENDERY§b]=•");
						 $name3 = $item3->setCustomName("§l§b•=[§a Quần §bCRAFT LEGENDERY§b ]=•");
						 $name4 = $item4->setCustomName("§l§b•=[§6§lGiày §aMine§bFoge");
						 $name5 = $item5->setCustomName("§l§b•=[§a Kiếm §bCRAFT LEGENDERY§b ]=•");
						 $name6 = $item6->setCustomName("§l§b•=[§a Cúp §cDragon§b ]=•");
						 $name9 = $item9->setCustomName("§l§b•=[§a Bow §cRỒNG§b ]=•");						 
 $money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
						  if ($money < 100000000){
							  $sender->sendMessage(TF::RED . "Không đủ tiền");
						  }
						  else{
						   $item1->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
						    $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(50));
							 $item1->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item1->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item2->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
							  $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(30));
							 $item2->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item2->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item3->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
	$item3->addEnchantment(Enchantment::getEnchantment(2)->setLevel(10));
							 $item3->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item3->addEnchantment(Enchantment::getEnchantment(17)->setLevel(200));
							 $item4->addEnchantment(Enchantment::getEnchantment(0)->setLevel(200));
							 $item4->addEnchantment(Enchantment::getEnchantment(5)->setLevel(20));
							 $item4->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item5->addEnchantment(Enchantment::getEnchantment(9)->setLevel(1000));
							 $item5->addEnchantment(Enchantment::getEnchantment(12)->setLevel(100));
							 $item5->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item6->addEnchantment(Enchantment::getEnchantment(15)->setLevel(9));
							 $item6->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100)); 
							 $item9 ->addEnchantment(Enchantment::getEnchantment(22)->setLevel(9999));
							 $item9 ->addEnchantment(Enchantment::getEnchantment(19)->setLevel(9999));
							 $item9 ->addEnchantment(Enchantment::getEnchantment(20)->setLevel(9999));									 $item9 ->addEnchantment(Enchantment::getEnchantment(21)->setLevel(1000));						 
							   //$sender->getInventory()->addItem($item1);
							 //$sender->getInventory()->addItem($item2);
							 //$sender->getInventory()->addItem($item3);
							 $sender->getInventory()->addItem($item4);
							 //$sender->getInventory()->addItem($item5);
							 //$sender->getInventory()->addItem($item6);
							 //$sender->getInventory()->addItem($item9);							 
							 //$item1->setCustomName($name1);
							   //$item2->setCustomName($name2);
							 //$item3->setCustomName($name3);
							 $item4->setCustomName($name4);
							 //$item5->setCustomName($name5);
							 //$item6->setCustomName($name6);
							 //$item9 ->setCustomName($name9);							 
						  $sender->sendMessage($this->tag. "§a Mua Thành Công Giày MineFoge");
						  
						  
							  $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 100000000);
						  }
						 return true;
					  break;
					  case "kiemminefoge":
					   $item1 = Item::get(310, 0, 1);
						 $item2 = Item::get(311, 0, 1);
						 $item3 = Item::get(312, 0, 1);
						 $item4 = Item::get(313, 0, 1);
						 $item5 = Item::get(276, 0, 1);
						 $item6 = Item::get(278, 0, 1);
						 $item7 = Item::get(278, 0, 1);
						 $item8 = Item::get(279, 0, 1);
						 $item9 = Item::get(261, 0, 1);						 
						 $name1 = $item1->setCustomName("§l§b•=[§a Mũ §bCRAFT LEGENDERY§b]=•");
						 $name2 = $item2->setCustomName("§l§b•=[§a Áo §bCRAFT  LEGENDERY§b]=•");
						 $name3 = $item3->setCustomName("§l§b•=[§a Quần §bCRAFT LEGENDERY§b ]=•");
						 $name4 = $item4->setCustomName("§l§b•=[§a Giày §bCRAFT LEGENDERY§b ]=•");
						 $name5 = $item5->setCustomName("§6§lKiếm §aMine§bFoge");
						 $name6 = $item6->setCustomName("§l§b•=[§a Cúp §cFoge§b ]=•");
						 $name9 = $item9->setCustomName("§l§b•=[§a Bow §cRỒNG§b ]=•");						 
 $money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
						  if ($money < 100000000){
							  $sender->sendMessage(TF::RED . "Không đủ tiền");
						  }
						  else{
						   $item1->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
						    $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(50));
							 $item1->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item1->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item2->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
							  $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(30));
							 $item2->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item2->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item3->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
	$item3->addEnchantment(Enchantment::getEnchantment(2)->setLevel(10));
							 $item3->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item3->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item4->addEnchantment(Enchantment::getEnchantment(17)->setLevel(500));
							 $item5->addEnchantment(Enchantment::getEnchantment(9)->setLevel(1000));
							 $item5->addEnchantment(Enchantment::getEnchantment(12)->setLevel(500));
							 $item5->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item6->addEnchantment(Enchantment::getEnchantment(15)->setLevel(9));
							 $item6->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100)); 
							 $item9 ->addEnchantment(Enchantment::getEnchantment(22)->setLevel(9999));
							 $item9 ->addEnchantment(Enchantment::getEnchantment(19)->setLevel(9999));
							 $item9 ->addEnchantment(Enchantment::getEnchantment(20)->setLevel(9999));									 $item9 ->addEnchantment(Enchantment::getEnchantment(21)->setLevel(1000));						 
							   //$sender->getInventory()->addItem($item1);
							 //$sender->getInventory()->addItem($item2);
							 //$sender->getInventory()->addItem($item3);
							 //$sender->getInventory()->addItem($item4);
							 $sender->getInventory()->addItem($item5);
							 //$sender->getInventory()->addItem($item6);
							 //$sender->getInventory()->addItem($item9);							 
							 //$item1->setCustomName($name1);
							   //$item2->setCustomName($name2);
							 //$item3->setCustomName($name3);
							 //$item4->setCustomName($name4);
							 $item5->setCustomName($name5);
							 //$item6->setCustomName($name6);
							 //$item9 ->setCustomName($name9);							 
						  $sender->sendMessage($this->tag. "§a Mua Thành Công Kiếm MineFoge");
						  
						  
							  $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 100000000);							  
							  }
							  return true;
							break;
					  case "kiembongtoi":
					   $item1 = Item::get(310, 0, 1);
						 $item2 = Item::get(311, 0, 1);
						 $item3 = Item::get(312, 0, 1);
						 $item4 = Item::get(313, 0, 1);
						 $item5 = Item::get(276, 0, 1);
						 $item6 = Item::get(278, 0, 1);
						 $item7 = Item::get(278, 0, 1);
						 $item8 = Item::get(279, 0, 1);
						 $name1 = $item1->setCustomName("§l§b•=[§a Mũ §bThe KING §b]=•");
						 $name2 = $item2->setCustomName("§l§b•=[§a Áo §bThe KING §b]=•");
						 $name3 = $item3->setCustomName("§l§b•=[§a Quần §bThe KING§b ]=•");
						 $name4 = $item4->setCustomName("§l§b•=[§a Giày §bThe KING§b ]=•");
						 $name5 = $item5->setCustomName("§6§lKiếm §cBóng Tối");
						 $name6 = $item6->setCustomName("§l§b•=[§a Cúp §cFoge§b ]=•");
 $money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
						  if ($money < 40000000){
							  $sender->sendMessage(TF::RED . "Không đủ tiền");
						  }
						  else{
						   $item1->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
						    $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(50));
							 $item1->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item1->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item2->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
							  $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(30));
							 $item2->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item2->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item3->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
	$item3->addEnchantment(Enchantment::getEnchantment(2)->setLevel(10));
							 $item3->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item3->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item4->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item5->addEnchantment(Enchantment::getEnchantment(9)->setLevel(50));
							 $item5->addEnchantment(Enchantment::getEnchantment(12)->setLevel(20));
							 $item5->addEnchantment(Enchantment::getEnchantment(26)->setLevel(7));
							 $item5->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item6->addEnchantment(Enchantment::getEnchantment(15)->setLevel(9));
							 $item6->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							   //$sender->getInventory()->addItem($item1);
							 //$sender->getInventory()->addItem($item2);
							 //$sender->getInventory()->addItem($item3);
							 //$sender->getInventory()->addItem($item4);
							 $sender->getInventory()->addItem($item5);
							 //$sender->getInventory()->addItem($item6);
							 //$item1->setCustomName($name1);
							 //$item2->setCustomName($name2);
							 //$item3->setCustomName($name3);
							 //$item4->setCustomName($name4);
							 $item5->setCustomName($name5);
							 //$item6->setCustomName($name6);
						  $sender->sendMessage($this->tag. "§a Mua Thành Công");
						  
						  
							  $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 40000000);
						  }
							  return true;
							break;
					  case "blockan":
					   $item1 = Item::get(310, 0, 1);
						 $item2 = Item::get(311, 0, 1);
						 $item3 = Item::get(312, 0, 1);
						 $item4 = Item::get(313, 0, 1);
						 $item5 = Item::get(133, 0, 1);
						 $item6 = Item::get(278, 0, 1);
						 $item7 = Item::get(278, 0, 1);
						 $item8 = Item::get(279, 0, 1);
						 $name1 = $item1->setCustomName("§l§b•=[§a Mũ §bThe KING §b]=•");
						 $name2 = $item2->setCustomName("§l§b•=[§a Áo §bThe KING §b]=•");
						 $name3 = $item3->setCustomName("§l§b•=[§a Quần §bThe KING§b ]=•");
						 $name4 = $item4->setCustomName("§l§b•=[§a Giày §bThe KING§b ]=•");
						 $name5 = $item5->setCustomName("§l§b•=[§aEmeral§b=•");
						 $name6 = $item6->setCustomName("§l§b•=[§a Cúp §cDragon§b ]=•");
 $money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
						  if ($money < 300000){
							  $sender->sendMessage(TF::RED . "Không đủ tiền");
						  }
						  else{
						   $item1->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
						    $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(50));
							 $item1->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item1->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item2->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
							  $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(30));
							 $item2->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item2->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item3->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
	$item3->addEnchantment(Enchantment::getEnchantment(2)->setLevel(10));
							 $item3->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item3->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item4->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item5->addEnchantment(Enchantment::getEnchantment(9)->setLevel(50));
							 $item5->addEnchantment(Enchantment::getEnchantment(12)->setLevel(20));
							 $item5->addEnchantment(Enchantment::getEnchantment(26)->setLevel(7));
							 $item5->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item6->addEnchantment(Enchantment::getEnchantment(15)->setLevel(9));
							 $item6->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							   //$sender->getInventory()->addItem($item1);
							 //$sender->getInventory()->addItem($item2);
							 //$sender->getInventory()->addItem($item3);
							 //$sender->getInventory()->addItem($item4);
							 $sender->getInventory()->addItem($item5);
							 //$sender->getInventory()->addItem($item6);
							 //$item1->setCustomName($name1);
							 //$item2->setCustomName($name2);
							 //$item3->setCustomName($name3);
							 //$item4->setCustomName($name4);
							 $item5->setCustomName($name5);
							 //$item6->setCustomName($name6);
						  $sender->sendMessage($this->tag. "§a Mua Thành Công");
						  
						  
							  $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 300000);
							  }
							  return true;
							break;
					  case "cuptathan":
					   $item1 = Item::get(310, 0, 1);
						 $item2 = Item::get(311, 0, 1);
						 $item3 = Item::get(312, 0, 1);
						 $item4 = Item::get(313, 0, 1);
						 $item5 = Item::get(276, 0, 1);
						 $item6 = Item::get(278, 0, 1);
						 $item7 = Item::get(278, 0, 1);
						 $item8 = Item::get(279, 0, 1);
						 $name1 = $item1->setCustomName("§l§b•=[§a Mũ §bThe KING §b]=•");
						 $name2 = $item2->setCustomName("§l§b•=[§a Áo §bThe KING §b]=•");
						 $name3 = $item3->setCustomName("§l§b•=[§a Quần §bThe KING§b ]=•");
						 $name4 = $item4->setCustomName("§l§b•=[§a Giày §bThe KING§b ]=•");
						 $name5 = $item5->setCustomName("§l§b•=[§a⚡ Kiếm §bSét§b ⚡]=•");
						 $name6 = $item6->setCustomName("§6§lCúp §cTà Thần");
 $money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
						  if ($money < 40000000){
							  $sender->sendMessage(TF::RED . "Không đủ tiền");
						  }
						  else{
						   $item1->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
						    $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(50));
							 $item1->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item1->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item2->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
							  $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(30));
							 $item2->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item2->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item3->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
	$item3->addEnchantment(Enchantment::getEnchantment(2)->setLevel(10));
							 $item3->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item3->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item4->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item5->addEnchantment(Enchantment::getEnchantment(9)->setLevel(50));
							 $item5->addEnchantment(Enchantment::getEnchantment(12)->setLevel(20));
							 $item5->addEnchantment(Enchantment::getEnchantment(26)->setLevel(7));
							 $item5->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item6->addEnchantment(Enchantment::getEnchantment(15)->setLevel(40));
							 $item6->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item6->addEnchantment(Enchantment::getEnchantment(18)->setLevel(20));
							$item6->addEnchantment(Enchantment::getEnchantment(26)->setLevel(10));
							  
							  $item6->setLore(array("§6▶§e■■■■■■■■■§6◀\n§e✔Thông Tin✔§r\n§a§l➩§eCúp Tà thần Được Lấy Từ Hồ Của Tà Thần§r\n§a§l➩§eCúp Có Độ Hiếm Là §b⭐⭐⭐§r\n(§bitem§r§l siêu hiếm§r)\n§a✔§eGiá Trị§a✔§r\n§a➩§e40.000.000$§r\n§a✔§eĐược Tạo Bởi:§bJero§d(ADMIN)"));
							  //$sender->getInventory()->addItem($item1);
							 //$sender->getInventory()->addItem($item2);
							 //$sender->getInventory()->addItem($item3);
							 //$sender->getInventory()->addItem($item4);
							 //$sender->getInventory()->addItem($item5);
							 $sender->getInventory()->addItem($item6);
							 //$item1->setCustomName($name1);
							 //$item2->setCustomName($name2);
							 //$item3->setCustomName($name3);
							 //$item4->setCustomName($name4);
							 //$item5->setCustomName($name5);
							 $item6->setCustomName($name6);
						  $sender->sendMessage($this->tag. "§a Mua Thành Công");
						  
						  
							  $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 40000000);
							  }
							  return true;
							break;
					  case "cupminefoge":
					   $item1 = Item::get(310, 0, 1);
						 $item2 = Item::get(311, 0, 1);
						 $item3 = Item::get(312, 0, 1);
						 $item4 = Item::get(313, 0, 1);
						 $item5 = Item::get(276, 0, 1);
						 $item6 = Item::get(278, 0, 1);
						 $item7 = Item::get(278, 0, 1);
						 $item8 = Item::get(279, 0, 1);
						 $name1 = $item1->setCustomName("§l§b•=[§a Mũ §bThe KING §b]=•");
						 $name2 = $item2->setCustomName("§l§b•=[§a Áo §bThe KING §b]=•");
						 $name3 = $item3->setCustomName("§l§b•=[§a Quần §bThe KING§b ]=•");
						 $name4 = $item4->setCustomName("§l§b•=[§a Giày §bThe KING§b ]=•");
						 $name5 = $item5->setCustomName("§l§b•=[§a⚡ Kiếm §bSét§b ⚡]=•");
						 $name6 = $item6->setCustomName("§6§lCúp §aMine§bFoge");
 $money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
						  if ($money < 100000000){
							  $sender->sendMessage(TF::RED . "Không đủ tiền");
						  }
						  else{
						   $item1->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
						    $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(50));
							 $item1->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item1->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item2->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
							  $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(30));
							 $item2->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item2->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item3->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
	$item3->addEnchantment(Enchantment::getEnchantment(2)->setLevel(10));
							 $item3->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item3->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item4->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item5->addEnchantment(Enchantment::getEnchantment(9)->setLevel(50));
							 $item5->addEnchantment(Enchantment::getEnchantment(12)->setLevel(20));
							 $item5->addEnchantment(Enchantment::getEnchantment(26)->setLevel(7));
							 $item5->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item6->addEnchantment(Enchantment::getEnchantment(15)->setLevel(50));
							 $item6->addEnchantment(Enchantment::getEnchantment(17)->setLevel(125));
							 $item6->addEnchantment(Enchantment::getEnchantment(18)->setLevel(35));
							$item6->addEnchantment(Enchantment::getEnchantment(26)->setLevel(20));
							   //$sender->getInventory()->addItem($item1);
							 //$sender->getInventory()->addItem($item2);
							 //$sender->getInventory()->addItem($item3);
							 //$sender->getInventory()->addItem($item4);
							 //$sender->getInventory()->addItem($item5);
							 $sender->getInventory()->addItem($item6);
							 //$item1->setCustomName($name1);
							 //$item2->setCustomName($name2);
							 //$item3->setCustomName($name3);
							 //$item4->setCustomName($name4);
							 //$item5->setCustomName($name5);
							 $item6->setCustomName($name6);
						  $sender->sendMessage($this->tag. "§a Mua Thành Công");
						  
						  
							  $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 100000000);
							  }
							  return true;
							break;
					  case "kiemnoel":
					   $item1 = Item::get(310, 0, 1);
						 $item2 = Item::get(311, 0, 1);
						 $item3 = Item::get(312, 0, 1);
						 $item4 = Item::get(313, 0, 1);
						 $item5 = Item::get(276, 0, 1);
						 $item6 = Item::get(278, 0, 1);
						 $item7 = Item::get(278, 0, 1);
						 $item8 = Item::get(276, 0, 1);
						 $name1 = $item1->setCustomName("§l§b•=[§a Mũ §bThe KING §b]=•");
						 $name2 = $item2->setCustomName("§l§b•=[§a Áo §bThe KING §b]=•");
						 $name3 = $item3->setCustomName("§l§b•=[§a Quần §bThe KING§b ]=•");
						 $name4 = $item4->setCustomName("§l§b•=[§a Giày §bThe KING§b ]=•");
						 $name5 = $item5->setCustomName("§l§b•=[§a⚡ Kiếm §bSét§b ⚡]=•");
						 $name8 = $item8->setCustomName("§6§lKiếm §r§lNoel");
 $money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
						  if ($money < 20000000){
							  $sender->sendMessage(TF::RED . "Không đủ tiền");
						  }
						  else{
						   $item1->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
						    $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(50));
							 $item1->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item1->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item2->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
							  $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(30));
							 $item2->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item2->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item3->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
	$item3->addEnchantment(Enchantment::getEnchantment(2)->setLevel(10));
							 $item3->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item3->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item4->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item5->addEnchantment(Enchantment::getEnchantment(9)->setLevel(50));
							 $item5->addEnchantment(Enchantment::getEnchantment(12)->setLevel(20));
							 $item5->addEnchantment(Enchantment::getEnchantment(26)->setLevel(7));
							 $item5->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item8->addEnchantment(Enchantment::getEnchantment(15)->setLevel(50));
							 $item8->addEnchantment(Enchantment::getEnchantment(17)->setLevel(125));
							 $item8->addEnchantment(Enchantment::getEnchantment(18)->setLevel(35));
							$item8->addEnchantment(Enchantment::getEnchantment(26)->setLevel(20));
							   //$sender->getInventory()->addItem($item1);
							 //$sender->getInventory()->addItem($item2);
							 //$sender->getInventory()->addItem($item3);
							 //$sender->getInventory()->addItem($item4);
							 //$sender->getInventory()->addItem($item5);
							 $sender->getInventory()->addItem($item8);
							 //$item1->setCustomName($name1);
							 //$item2->setCustomName($name2);
							 //$item3->setCustomName($name3);
							 //$item4->setCustomName($name4);
							 //$item5->setCustomName($name5);
							 $item8->setCustomName($name8);
						  $sender->sendMessage($this->tag. "§a Mua Thành Công");
						  
						  
							  $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 20000000);
							  }
							  return true;
							break;
					  case "xengsucmanh":
					   $item1 = Item::get(310, 0, 1);
						 $item2 = Item::get(311, 0, 1);
						 $item3 = Item::get(312, 0, 1);
						 $item4 = Item::get(313, 0, 1);
						 $item5 = Item::get(276, 0, 1);
						 $item6 = Item::get(277, 0, 1);
						 $item7 = Item::get(278, 0, 1);
						 $item8 = Item::get(279, 0, 1);
						 $name1 = $item1->setCustomName("§l§b•=[§a Mũ §bThe KING §b]=•");
						 $name2 = $item2->setCustomName("§l§b•=[§a Áo §bThe KING §b]=•");
						 $name3 = $item3->setCustomName("§l§b•=[§a Quần §bThe KING§b ]=•");
						 $name4 = $item4->setCustomName("§l§b•=[§a Giày §bThe KING§b ]=•");
						 $name5 = $item5->setCustomName("§l§b•=[§a⚡ Kiếm §bSét§b ⚡]=•");
						 $name6 = $item6->setCustomName("§l§b•=[§a Xẻng §4Sức Mạnh§b ]=•");
 $money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
						  if ($money < 400000){
							  $sender->sendMessage(TF::RED . "Không đủ tiền");
						  }
						  else{
						   $item1->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
						    $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(50));
							 $item1->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item1->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item2->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
							  $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(30));
							 $item2->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item2->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item3->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
	$item3->addEnchantment(Enchantment::getEnchantment(2)->setLevel(10));
							 $item3->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item3->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item4->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item5->addEnchantment(Enchantment::getEnchantment(9)->setLevel(50));
							 $item5->addEnchantment(Enchantment::getEnchantment(12)->setLevel(20));
							 $item5->addEnchantment(Enchantment::getEnchantment(26)->setLevel(7));
							 $item5->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item6->addEnchantment(Enchantment::getEnchantment(15)->setLevel(50));
							 $item6->addEnchantment(Enchantment::getEnchantment(17)->setLevel(125));
							 $item6->addEnchantment(Enchantment::getEnchantment(18)->setLevel(35));
							$item6->addEnchantment(Enchantment::getEnchantment(26)->setLevel(20));
							   //$sender->getInventory()->addItem($item1);
							 //$sender->getInventory()->addItem($item2);
							 //$sender->getInventory()->addItem($item3);
							 //$sender->getInventory()->addItem($item4);
							 //$sender->getInventory()->addItem($item5);
							 $sender->getInventory()->addItem($item6);
							 //$item1->setCustomName($name1);
							 //$item2->setCustomName($name2);
							 //$item3->setCustomName($name3);
							 //$item4->setCustomName($name4);
							 //$item5->setCustomName($name5);
							 $item6->setCustomName($name6);
						  $sender->sendMessage($this->tag. "§a Mua Thành Công");
						  
						  
							  $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 400000);
							  }
							  return true;
							break;
					  case "cupvietnam":
					   $item1 = Item::get(310, 0, 1);
						 $item2 = Item::get(311, 0, 1);
						 $item3 = Item::get(312, 0, 1);
						 $item4 = Item::get(313, 0, 1);
						 $item5 = Item::get(276, 0, 1);
						 $item6 = Item::get(278, 0, 1);
						 $item7 = Item::get(278, 0, 1);
						 $item8 = Item::get(279, 0, 1);
						 $name1 = $item1->setCustomName("§l§b•=[§a Mũ §bThe KING §b]=•");
						 $name2 = $item2->setCustomName("§l§b•=[§a Áo §bThe KING §b]=•");
						 $name3 = $item3->setCustomName("§l§b•=[§a Quần §bThe KING§b ]=•");
						 $name4 = $item4->setCustomName("§l§b•=[§a Giày §bThe KING§b ]=•");
						 $name5 = $item5->setCustomName("§l§b•=[§a⚡ Kiếm §bSét§b ⚡]=•");
						 $name6 = $item6->setCustomName("§l§b•=[§a Cúp §6Việt Nam§b ]=•");
 $money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
						  if ($money < 800000){
							  $sender->sendMessage(TF::RED . "Không đủ tiền");
						  }
						  else{
						   $item1->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
						    $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(50));
							 $item1->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item1->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item2->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
							  $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(30));
							 $item2->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item2->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item3->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
	$item3->addEnchantment(Enchantment::getEnchantment(2)->setLevel(10));
							 $item3->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item3->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item4->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item5->addEnchantment(Enchantment::getEnchantment(9)->setLevel(50));
							 $item5->addEnchantment(Enchantment::getEnchantment(12)->setLevel(20));
							 $item5->addEnchantment(Enchantment::getEnchantment(26)->setLevel(7));
							 $item5->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item6->addEnchantment(Enchantment::getEnchantment(15)->setLevel(100));
							 $item6->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item6->addEnchantment(Enchantment::getEnchantment(18)->setLevel(100));
							$item6->addEnchantment(Enchantment::getEnchantment(26)->setLevel(100));
							   //$sender->getInventory()->addItem($item1);
							 //$sender->getInventory()->addItem($item2);
							 //$sender->getInventory()->addItem($item3);
							 //$sender->getInventory()->addItem($item4);
							 //$sender->getInventory()->addItem($item5);
							 $sender->getInventory()->addItem($item6);
							 //$item1->setCustomName($name1);
							 //$item2->setCustomName($name2);
							 //$item3->setCustomName($name3);
							 //$item4->setCustomName($name4);
							 //$item5->setCustomName($name5);
							 $item6->setCustomName($name6);
						  $sender->sendMessage($this->tag. "§a Mua Thành Công");
						  
						  
							  $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 800000);
							  }
							  return true;
							break;
					  case "gaybaton":
					   $item1 = Item::get(310, 0, 1);
						 $item2 = Item::get(311, 0, 1);
						 $item3 = Item::get(312, 0, 1);
						 $item4 = Item::get(313, 0, 1);
						 $item5 = Item::get(280, 0, 1);
						 $item6 = Item::get(278, 0, 1);
						 $item7 = Item::get(278, 0, 1);
						 $item8 = Item::get(279, 0, 1);
						 $name1 = $item1->setCustomName("§l§b•=[§a Mũ §bThe KING §b]=•");
						 $name2 = $item2->setCustomName("§l§b•=[§a Áo §bThe KING §b]=•");
						 $name3 = $item3->setCustomName("§l§b•=[§a Quần §bThe KING§b ]=•");
						 $name4 = $item4->setCustomName("§l§b•=[§a Giày §bThe KING§b ]=•");
						 $name5 = $item5->setCustomName("§l§b•=[§5 Gậy §5Baton§b ]=•");
						 $name6 = $item6->setCustomName("§l§b•=[§a Cúp §4Thần Sầu§b ]=•");
 $money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
						  if ($money < 700000){
							  $sender->sendMessage(TF::RED . "Không đủ tiền");
						  }
						  else{
						   $item1->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
						    $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(50));
							 $item1->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item1->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item2->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
							  $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(30));
							 $item2->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item2->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item3->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
	$item3->addEnchantment(Enchantment::getEnchantment(2)->setLevel(10));
							 $item3->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item3->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item4->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item5->addEnchantment(Enchantment::getEnchantment(9)->setLevel(50));
							 $item5->addEnchantment(Enchantment::getEnchantment(12)->setLevel(50));
							 $item5->addEnchantment(Enchantment::getEnchantment(26)->setLevel(50));
							 $item5->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item6->addEnchantment(Enchantment::getEnchantment(15)->setLevel(50));
							 $item6->addEnchantment(Enchantment::getEnchantment(17)->setLevel(125));
							 $item6->addEnchantment(Enchantment::getEnchantment(18)->setLevel(35));
							$item6->addEnchantment(Enchantment::getEnchantment(26)->setLevel(20));
							   //$sender->getInventory()->addItem($item1);
							 //$sender->getInventory()->addItem($item2);
							 //$sender->getInventory()->addItem($item3);
							 //$sender->getInventory()->addItem($item4);
							 $sender->getInventory()->addItem($item5);
							 //$sender->getInventory()->addItem($item6);
							 //$item1->setCustomName($name1);
							 //$item2->setCustomName($name2);
							 //$item3->setCustomName($name3);
							 //$item4->setCustomName($name4);
							 $item5->setCustomName($name5);
							 //$item6->setCustomName($name6);
						  $sender->sendMessage($this->tag. "§a Mua Thành Công");
						  
						  
							  $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 700000);
							  }
							  return true;
							break;
					  case "Coin":
					   $item1 = Item::get(310, 0, 1);
						 $item2 = Item::get(311, 0, 1);
						 $item3 = Item::get(312, 0, 1);
						 $item4 = Item::get(313, 0, 1);
						 $item5 = Item::get(388, 0, 1);
						 $item6 = Item::get(278, 0, 1);
						 $item7 = Item::get(278, 0, 1);
						 $item8 = Item::get(279, 0, 1);
						 $name1 = $item1->setCustomName("§l§b•=[§a Mũ §bThe KING §b]=•");
						 $name2 = $item2->setCustomName("§l§b•=[§a Áo §bThe KING §b]=•");
						 $name3 = $item3->setCustomName("§l§b•=[§a Quần §bThe KING§b ]=•");
						 $name4 = $item4->setCustomName("§l§b•=[§a Giày §bThe KING§b ]=•");
						 $name5 = $item5->setCustomName("§l§b•=[§5 Vé §5Coin§b ]=•");
						 $name6 = $item6->setCustomName("§l§b•=[§a Cúp §4Thần Sầu§b ]=•");
 $money = $this->getServer()->getPluginManager()->getPlugin("CoinAPI")->myCoin($sender);
						  if ($money < 10){
							  $sender->sendMessage(TF::RED . "Không đủ tiền");
						  }
						  else{
						   $item1->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
						    $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(50));
							 $item1->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item1->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item2->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
							  $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(30));
							 $item2->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item2->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item3->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
	$item3->addEnchantment(Enchantment::getEnchantment(2)->setLevel(10));
							 $item3->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item3->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item4->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item5->addEnchantment(Enchantment::getEnchantment(9)->setLevel(50));
							 $item5->addEnchantment(Enchantment::getEnchantment(12)->setLevel(50));
							 $item5->addEnchantment(Enchantment::getEnchantment(26)->setLevel(50));
							 $item5->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item6->addEnchantment(Enchantment::getEnchantment(15)->setLevel(50));
							 $item6->addEnchantment(Enchantment::getEnchantment(17)->setLevel(125));
							 $item6->addEnchantment(Enchantment::getEnchantment(18)->setLevel(35));
							$item6->addEnchantment(Enchantment::getEnchantment(26)->setLevel(20));
							   //$sender->getInventory()->addItem($item1);
							 //$sender->getInventory()->addItem($item2);
							 //$sender->getInventory()->addItem($item3);
							 //$sender->getInventory()->addItem($item4);
							 $sender->getInventory()->addItem($item5);
							 //$sender->getInventory()->addItem($item6);
							 //$item1->setCustomName($name1);
							 //$item2->setCustomName($name2);
							 //$item3->setCustomName($name3);
							 //$item4->setCustomName($name4);
							 $item5->setCustomName($name5);
							 //$item6->setCustomName($name6);
						  $sender->sendMessage($this->tag. "§a Mua Thành Công");
						  
						  
							  $this->getServer()->getPluginManager()->getPlugin("CoinAPI")->reduceCoin($sender->getName(), 10);
							  }
							  return true;				
							  break;
					  case "cungsieulua":
					   $item1 = Item::get(310, 0, 1);
						 $item2 = Item::get(311, 0, 1);
						 $item3 = Item::get(312, 0, 1);
						 $item4 = Item::get(313, 0, 1);
						 $item5 = Item::get(280, 0, 1);
						 $item6 = Item::get(278, 0, 1);
						 $item7 = Item::get(278, 0, 1);
						 $item8 = Item::get(261, 0, 1);
						 $name1 = $item1->setCustomName("§l§b•=[§a Mũ §bThe KING §b]=•");
						 $name2 = $item2->setCustomName("§l§b•=[§a Áo §bThe KING §b]=•");
						 $name3 = $item3->setCustomName("§l§b•=[§a Quần §bThe KING§b ]=•");
						 $name4 = $item4->setCustomName("§l§b•=[§a Giày §bThe KING§b ]=•");
						 $name5 = $item5->setCustomName("§l§b•=[§5 Gậy §5Baton§b ]=•");
						 $name8 = $item8->setCustomName("§l§b•=[§a Cung §4Siêu Lửa§b ]=•");
 $money = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->myMoney($sender);
						  if ($money < 800000){
							  $sender->sendMessage(TF::RED . "Không đủ tiền");
						  }
						  else{
						   $item1->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
						    $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(50));
							 $item1->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item1->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item2->addEnchantment(Enchantment::getEnchantment(0)->setLevel(50));
							  $item1->addEnchantment(Enchantment::getEnchantment(2)->setLevel(30));
							 $item2->addEnchantment(Enchantment::getEnchantment(5)->setLevel(10));
							 $item2->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item3->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
	$item3->addEnchantment(Enchantment::getEnchantment(2)->setLevel(10));
							 $item3->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item3->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(0)->setLevel(100));
							 $item4->addEnchantment(Enchantment::getEnchantment(5)->setLevel(2));
							 $item4->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item5->addEnchantment(Enchantment::getEnchantment(9)->setLevel(50));
							 $item5->addEnchantment(Enchantment::getEnchantment(12)->setLevel(50));
							 $item5->addEnchantment(Enchantment::getEnchantment(26)->setLevel(50));
							 $item5->addEnchantment(Enchantment::getEnchantment(17)->setLevel(100));
							 $item8->addEnchantment(Enchantment::getEnchantment(22)->setLevel(1));
							 $item8->addEnchantment(Enchantment::getEnchantment(26)->setLevel(10));
							 $item8->addEnchantment(Enchantment::getEnchantment(19)->setLevel(30));
							$item8->addEnchantment(Enchantment::getEnchantment(20)->setLevel(20));
							$item8->addEnchantment(Enchantment::getEnchantment(21)->setLevel(15));
							$item8->addEnchantment(Enchantment::getEnchantment(17)->setLevel(75));
							   //$sender->getInventory()->addItem($item1);
							 //$sender->getInventory()->addItem($item2);
							 //$sender->getInventory()->addItem($item3);
							 //$sender->getInventory()->addItem($item4);
							 $sender->getInventory()->addItem($item8);
							 //$sender->getInventory()->addItem($item6);
							 //$item1->setCustomName($name1);
							 //$item2->setCustomName($name2);
							 //$item3->setCustomName($name3);
							 //$item4->setCustomName($name4);
							 $item8->setCustomName($name8);
							 //$item6->setCustomName($name6);
						  $sender->sendMessage($this->tag. "§a Mua Thành Công");
					
						  
							  $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->reduceMoney($sender->getName(), 8000000);
							  }
							  return true;
						}
				}
		}
}
}
}