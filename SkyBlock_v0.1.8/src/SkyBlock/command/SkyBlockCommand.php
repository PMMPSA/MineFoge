<?php

namespace SkyBlock\command;

use SkyBlock\Utils;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\level\Position;
use pocketmine\Player;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use SkyBlock\invitation\Invitation;
use SkyBlock\island\Island;
use SkyBlock\SkyBlock;
use SkyBlock\reset\Reset;

class SkyBlockCommand extends Command {

    /** @var SkyBlock */
    private $plugin;

    /**
     * SkyBlockCommand constructor.
     *
     * @param SkyBlock $plugin
     */
    public function __construct(SkyBlock $plugin) {
        $this->plugin = $plugin;
        parent::__construct("island", "Main island command", "Usage: /island", ["is"]);
    }

    public function sendMessage(Player $sender, $message) {
        $sender->sendMessage(TextFormat::GREEN . "- " . TextFormat::WHITE . $message);
    }

    public function execute(CommandSender $sender, $commandLabel, array $args) {
        if($sender instanceof Player) {
            if(isset($args[0])) {
                switch($args[0]) {
                    case "join":
                        $config = $this->plugin->getSkyBlockManager()->getPlayerConfig($sender);
                        if(empty($config->get("island"))) {
                            $this->sendMessage($sender, "§c§lBạn chưa có một hòn đảo!");
                        }
                        else {
                            $island = $this->plugin->getIslandManager()->getOnlineIsland($config->get("island"));
                            if($island instanceof Island) {
                                $island->addPlayer($sender);
                                $sender->teleport(new Position(9, 36, 8, $this->plugin->getServer()->getLevelByName($island->getIdentifier())));
                                $this->sendMessage($sender, "§a§lBạn đã được dịch chuyển đến nhà đảo của bạn");
                            }
                            else {
                                $this->sendMessage($sender, "§a§lBạn không phải là một hòn đảo !!");
                            }
                        }
                        break;
                    case "play":
                        $config = $this->plugin->getSkyBlockManager()->getPlayerConfig($sender);
                        if(empty($config->get("island"))) {
                            $reset = $this->plugin->getResetHandler()->getResetTimer($sender);
                            if($reset instanceof Reset) {
                                $minutes = Utils::printSeconds($reset->getTime());
                                $this->sendMessage($sender, "Bạn sẽ có thể tạo một hòn đảo mới trong{$minutes} phút");
                            }
                            else {
                                $skyBlockManager = $this->plugin->getSkyBlockGeneratorManager();
                                if(isset($args[1])) {
                                    if($skyBlockManager->isGenerator($args[1])) {
                                        $this->plugin->getSkyBlockManager()->generateIsland($sender, $args[1]);
                                        $this->sendMessage($sender, "Bạn đã tạo thành công một {$skyBlockManager->getGeneratorIslandName($args[1])} Đảo!");
                                        $this->sendTitle($sender, "§c§lIs§6Land§r\n§a§lChúc Vui Vẻ");
                                                $sender->getInventory()->addItem(Item::get(Item::WATER, 0, 2));
        $sender->getInventory()->addItem(Item::get(Item::OAK_FENCE, 0, 2));
        $sender->getInventory()->addItem(Item::get(Item::LAVA, 0, 2));
        $sender->getInventory()->addItem(Item::get(Item::ICE, 0, 2));
        $sender->getInventory()->addItem(Item::get(Item::MELON_BLOCK, 0, 1));
        $sender->getInventory()->addItem(Item::get(Item::BONE, 0, 1));
        $sender->getInventory()->addItem(Item::get(Item::PUMPKIN_SEEDS, 0, 1));
        $sender->getInventory()->addItem(Item::get(Item::CACTUS, 0, 1));
        $sender->getInventory()->addItem(Item::get(Item::SUGARCANE, 0, 1));
        $sender->getInventory()->addItem(Item::get(Item::BREAD, 0, 1));
        $sender->getInventory()->addItem(Item::get(Item::WHEAT, 0, 1));
        $sender->getInventory()->addItem(Item::get(Item::LEATHER_BOOTS, 0, 1));
        $sender->getInventory()->addItem(Item::get(Item::LEATHER_PANTS, 0, 1));
        $sender->getInventory()->addItem(Item::get(Item::LEATHER_TUNIC, 0, 1));
        $sender->getInventory()->addItem(Item::get(Item::LEATHER_CAP, 0, 1));
        $sender->getInventory()->addItem(Item::get(Item::STONE_PICKAXE, 0, 1));
        $sender->getInventory()->addItem(Item::get(Item::STONE_AXE, 0, 1));
        $sender->getInventory()->addItem(Item::get(Item::STONE_SHOVEL, 0, 1));
                                    }
                                    else {
                                        $this->sendMessage($sender, "Đó không phải là trình tạo SkyBlock hợp lệ!");
                                    }
                                }
                                else {
                                    $this->plugin->getSkyBlockManager()->generateIsland($sender, "basic");
                                    $this->sendMessage($sender, "Bạn đã tạo thành công một hòn đảo!");
                                }
                            }
                        }
                        else {
                            $this->sendMessage($sender, "Bạn đã có một hòn đảo bầu trời!");
                        }
                        break;
                    case "home":
                        $config = $this->plugin->getSkyBlockManager()->getPlayerConfig($sender);
                        if(empty($config->get("island"))) {
                            $this->sendMessage($sender, "Bạn chưa có một hòn đảo!");
                        }
                        else {
                            $island = $this->plugin->getIslandManager()->getOnlineIsland($config->get("island"));
                            if($island instanceof Island) {
                                $home = $island->getHomePosition();
                                if($home instanceof Position) {
                                    $sender->teleport($home);
                                    $this->sendMessage($sender, "Bạn đã được dịch chuyển đến nhà đảo của bạn");
                                }
                                else {
                                    $this->sendMessage($sender, "Đảo của bạn chưa có vị trí nhà!");
                                }
                            }
                            else {
                                $this->sendMessage($sender, "Bạn không phải là một hòn đảo !!");
                            }
                        }
                        break;
                    case "sethome":
                        $config = $this->plugin->getSkyBlockManager()->getPlayerConfig($sender);
                        if(empty($config->get("island"))) {
                            $this->sendMessage($sender, "Bạn chưa có một hòn đảo!");
                        }
                        else {
                            $island = $this->plugin->getIslandManager()->getOnlineIsland($config->get("island"));
                            if($island instanceof Island) {
                                if($island->getOwnerName() == strtolower($sender->getName())) {
                                    if($sender->getLevel()->getName() == $config->get("island")) {
                                        $island->setHomePosition($sender->getPosition());
                                        $this->sendMessage($sender, "Bạn đặt đảo nhà thành công!!");
                                    }
                                    else {
                                        $this->sendMessage($sender, "Bạn phải ở trong hòn đảo của bạn để thiết lập nhà!");
                                    }
                                }
                                else {
                                    $this->sendMessage($sender, "Bạn phải là người lãnh đạo đảo để làm điều này!");
                                }
                            }
                            else {
                                $this->sendMessage($sender, "Bạn không phải là một hòn đảo !!");
                            }
                        }
                        break;
                    case "kick":
                    case "expel":
                        $config = $this->plugin->getSkyBlockManager()->getPlayerConfig($sender);
                        if(empty($config->get("island"))) {
                            $this->sendMessage($sender, "Bạn chưa có một hòn đảo!");
                        }
                        else {
                            $island = $this->plugin->getIslandManager()->getOnlineIsland($config->get("island"));
                            if($island instanceof Island) {
                                if($island->getOwnerName() == strtolower($sender->getName())) {
                                    if(isset($args[1])) {
                                        $player = $this->plugin->getServer()->getPlayer($args[1]);
                                        if($player instanceof Player and $player->isOnline()) {
                                            if($player->getLevel()->getName() == $island->getIdentifier()) {
                                                $player->teleport($this->plugin->getServer()->getDefaultLevel()->getSafeSpawn());
                                                $this->sendMessage($sender, "{$player->getName()} đã được đá từ hòn đảo của bạn!!");
                                            }
                                            else {
                                                $this->sendMessage($sender, "Người chơi không ở trong hòn đảo của bạn!");
                                            }
                                        }
                                        else {
                                            $this->sendMessage($sender, "Đó không phải là một người chơi hợp lệ");
                                        }
                                    }
                                    else {
                                        $this->sendMessage($sender, "Sử dụng: /island expel <name>");
                                    }
                                }
                                else {
                                    $this->sendMessage($sender, "Bạn phải là chủ sở hữu đảo để trục xuất bất cứ ai");
                                }
                            }
                            else {
                                $this->sendMessage($sender, "Bạn chưa có một hòn đảo!");
                            }
                        }
                        break;
                    case "lock":
                        $config = $this->plugin->getSkyBlockManager()->getPlayerConfig($sender);
                        if(empty($config->get("island"))) {
                            $this->sendMessage($sender, "Bạn chưa có một hòn đảo!");
                        }
                        else {
                            $island = $this->plugin->getIslandManager()->getOnlineIsland($config->get("island"));
                            if($island instanceof Island) {
                                if($island->getOwnerName() == strtolower($sender->getName())) {
                                    $island->setLocked(!$island->isLocked());
                                    $locked = ($island->isLocked()) ? "locked" : "unlocked";
                                    $this->sendMessage($sender, "Đảo của bạn đã được {$locked}!");
                                }
                                else {
                                    $this->sendMessage($sender, "Bạn phải là chủ sở hữu đảo để làm điều này!");
                                }
                            }
                            else {
                                $this->sendMessage($sender, "Bạn chưa có một hòn đảo!");
                            }
                        }
                        break;
                    case "addhelper":
                        $config = $this->plugin->getSkyBlockManager()->getPlayerConfig($sender);
                        if(empty($config->get("island"))) {
                            $this->sendMessage($sender, "Bạn chưa có một hòn đảo!");
                        }
                        else {
                            $island = $this->plugin->getIslandManager()->getOnlineIsland($config->get("island"));
                            if($island instanceof Island) {
                                if($island->getOwnerName() == strtolower($sender->getName())) {
                                    if(isset($args[1])) {
                                        $player = $this->plugin->getServer()->getPlayer($args[1]);
                                        if($player instanceof Player and $player->isOnline()) {
                                            $config = $this->plugin->getSkyBlockManager()->getPlayerConfig($player);
                                            if(empty($config->get("island"))) {
                                                $this->plugin->getInvitationHandler()->addInvitation($sender, $player, $island);
                                                $this->sendMessage($sender, "Bạn đã gửi lời mời đến{$player->getName()}!");
                                                $this->sendMessage($player, "{$sender->getName()} mời bạn đến đảo của anh ấy! sử Dụng /island <accept/reject> {$sender->getName()}");
                                            }
                                            else {
                                                $this->sendMessage($sender, "Người chơi này đã ở trong một hòn đảo!");
                                            }
                                        }
                                        else {
                                            $this->sendMessage($sender, "{$args[1]} không phải là người chơi hợp lệ!");
                                        }
                                    }
                                    else {
                                        $this->sendMessage($sender, "Sử Dụng: /island addhelper <player>");
                                    }
                                }
                                else {
                                    $this->sendMessage($sender, "Bạn phải là chủ sở hữu đảo để làm điều này!");
                                }
                            }
                            else {
                                $this->sendMessage($sender, "Bạn không phải là một hòn đảo !!");
                            }
                        }
                        break;
                    case "accept":
                        if(isset($args[1])) {
                            $config = $this->plugin->getSkyBlockManager()->getPlayerConfig($sender);
                            if(empty($config->get("island"))) {
                                $player = $this->plugin->getServer()->getPlayer($args[1]);
                                if($player instanceof Player and $player->isOnline()) {
                                    $invitation = $this->plugin->getInvitationHandler()->getInvitation($player);
                                    if($invitation instanceof Invitation) {
                                        if($invitation->getSender() === $player) {
                                            $invitation->accept();
                                        }
                                        else {
                                            $this->sendMessage($sender, "Bạn chưa có lời mời từ {$player->getName()}!");
                                        }
                                    }
                                    else {
                                        $this->sendMessage($sender, "Bạn chưa có lời mời từ {$player->getName()}");
                                    }
                                }
                                else {
                                    $this->sendMessage($sender, "{$args[1]} không phải là người chơi hợp lệ,");
                                }
                            }
                            else {
                                $this->sendMessage($sender, "Bạn không thể ở một hòn đảo nếu bạn muốn tham gia một hòn đảo khác!");
                            }
                        }
                        else {
                            $this->sendMessage($sender, "Sử Dụng: /island accept <name>");
                        }
                        break;
                    case "deny":
                    case "reject":
                        if(isset($args[1])) {
                            $config = $this->plugin->getSkyBlockManager()->getPlayerConfig($sender);
                            if(empty($config->get("island"))) {
                                $player = $this->plugin->getServer()->getPlayer($args[1]);
                                if($player instanceof Player and $player->isOnline()) {
                                    $invitation = $this->plugin->getInvitationHandler()->getInvitation($player);
                                    if($invitation instanceof Invitation) {
                                        if($invitation->getSender() === $player) {
                                            $invitation->deny();
                                        }
                                        else {
                                            $this->sendMessage($sender, "Bạn chưa có lời mời từ {$player->getName()}!");
                                        }
                                    }
                                    else {
                                        $this->sendMessage($sender, "Bạn chưa có lời mời từ {$player->getName()}");
                                    }
                                }
                                else {
                                    $this->sendMessage($sender, "{$args[1]} không phải là người chơi hợp lệ");
                                }
                            }
                            else {
                                $this->sendMessage($sender, "Bạn không thể ở một hòn đảo nếu bạn muốn từ chối một hòn đảo khác!");
                            }
                        }
                        else {
                            $this->sendMessage($sender, "Sử Dụng: /island accept <sender name>");
                        }
                        break;
                    case "members":
                        $config = $this->plugin->getSkyBlockManager()->getPlayerConfig($sender);
                        if(empty($config->get("island"))) {
                            $this->sendMessage($sender, "Bạn phải ở trong một hòn đảo để sử dụng lệnh này!");
                        }
                        else {
                            $island = $this->plugin->getIslandManager()->getOnlineIsland($config->get("island"));
                            if($island instanceof Island) {
                                $this->sendMessage($sender, "____| {$island->getOwnerName()}'s Members |____");
                                $i = 1;
                                foreach($island->getAllMembers() as $member) {
                                    $this->sendMessage($sender, "{$i}. {$member}");
                                    $i++;
                                }
                            }
                            else {
                                $this->sendMessage($sender, "Bạn phải ở trong một hòn đảo để sử dụng lệnh này !!");
                            }
                        }
                        break;
                    case "disband":
                        $config = $this->plugin->getSkyBlockManager()->getPlayerConfig($sender);
                        if(empty($config->get("island"))) {
                            $this->sendMessage($sender, "Bạn phải ở trong một hòn đảo để giải tán nó!");
                        }
                        else {
                            $island = $this->plugin->getIslandManager()->getOnlineIsland($config->get("island"));
                            if($island instanceof Island) {
                                if($island->getOwnerName() == strtolower($sender->getName())) {
                                    foreach($island->getAllMembers() as $member) {
                                        $memberConfig = new Config($this->plugin->getDataFolder() . "users" . DIRECTORY_SEPARATOR . $member . ".json", Config::JSON);
                                        $memberConfig->set("island", "");
                                        $memberConfig->save();
                                    }
                                    $this->plugin->getIslandManager()->removeIsland($island);
                                    $this->plugin->getResetHandler()->addResetTimer($sender);
                                    $this->sendMessage($sender, "Bạn đã xóa đảo thành công!");
                                }
                                else {
                                    $this->sendMessage($sender, "Bạn phải là chủ sở hữu để giải tán hòn đảo!");
                                }
                            }
                            else {
                                $this->sendMessage($sender, "Bạn phải ở trong một hòn đảo để giải tán nó !!");
                            }
                        }
                        break;
                    case "makeleader":
                        $config = $this->plugin->getSkyBlockManager()->getPlayerConfig($sender);
                        if(empty($config->get("island"))) {
                            $this->sendMessage($sender, "Bạn phải ở trong một hòn đảo để thiết lập một nhà lãnh đạo mới!");
                        }
                        else {
                            $island = $this->plugin->getIslandManager()->getOnlineIsland($config->get("island"));
                            if($island instanceof Island) {
                                if($island->getOwnerName() == strtolower($sender->getName())) {
                                    if(isset($args[1])) {
                                        $player = $this->plugin->getServer()->getPlayer($args[1]);
                                        if($player instanceof Player and $player->isOnline()) {
                                            $playerConfig = $this->plugin->getSkyBlockManager()->getPlayerConfig($player);
                                            $playerIsland = $this->plugin->getIslandManager()->getOnlineIsland($playerConfig->get("island"));
                                            if($island === $playerIsland) {
                                                $island->setOwnerName($player);
                                                $island->addPlayer($player);
                                                $this->sendMessage($sender, "Bạn đã gửi quyền sở hữu tới {$player->getName()}");
                                                $this->sendMessage($player, "Bạn có quyền sở hữu đảo của mình bằng cách {$sender->getName()}");
                                            }
                                            else {
                                                $this->sendMessage($sender, "Người chơi nên ở trên đảo của bạn!");
                                            }
                                        }
                                        else {
                                            $this->sendMessage($sender, "{$args[1]} không phải là một người chơi hợp lệ!");
                                        }
                                    }
                                    else {
                                        $this->sendMessage($sender, "Sử Dụng: /island makeleader <player>");
                                    }
                                }
                                else {
                                    $this->sendMessage($sender, "Bạn phải là người lãnh đạo đảo để làm điều này!");
                                }
                            }
                            else {
                                $this->sendMessage($sender, "Bạn phải ở trong một hòn đảo để thiết lập một nhà lãnh đạo mới !!");
                            }
                        }
                        break;
                    case "leave":
                        $config = $this->plugin->getSkyBlockManager()->getPlayerConfig($sender);
                        if(empty($config->get("island"))) {
                            $this->sendMessage($sender, "Bạn phải ở trong một hòn đảo để rời khỏi nó!");
                        }
                        else {
                            $island = $this->plugin->getIslandManager()->getOnlineIsland($config->get("island"));
                            if($island instanceof Island) {
                                if($island->getOwnerName() == strtolower($sender->getName())) {
                                    $this->sendMessage($sender, "Bạn không thể rời đảo nếu chủ sở hữu của bạn! Có lẽ bạn có thể thử sử dụng /skyblock disband");
                                }
                                else {
                                    $this->plugin->getChatHandler()->removePlayerFromChat($sender);
                                    $config->set("island", "");
                                    $config->save();
                                    $island->removeMember(strtolower($sender->getName()));
                                    $this->sendMessage($sender, "Bạn rời đảo !!");
                                }
                            }
                            else {
                                $this->sendMessage($sender, "Bạn phải ở trong một hòn đảo để rời khỏi nó!!");
                            }
                        }
                        break;
                    case "remove":
                        $config = $this->plugin->getSkyBlockManager()->getPlayerConfig($sender);
                        if(empty($config->get("island"))) {
                            $this->sendMessage($sender, "Bạn phải ở trong một hòn đảo để rời khỏi nó!");
                        }
                        else {
                            $island = $this->plugin->getIslandManager()->getOnlineIsland($config->get("island"));
                            if($island instanceof Island) {
                                if($island->getOwnerName() == strtolower($sender->getName())) {
                                    if(isset($args[1])) {
                                        if(in_array(strtolower($args[1]), $island->getMembers())) {
                                            $island->removeMember(strtolower($args[1]));
                                            $player = $this->plugin->getServer()->getPlayerExact($args[1]);
                                            if($player instanceof Player and $player->isOnline()) {
                                                $this->plugin->getChatHandler()->removePlayerFromChat($player);
                                            }
                                            $this->sendMessage($sender, "{$args[1]} đã bị xóa khỏi nhóm của bạn!");
                                        }
                                        else {
                                            $this->sendMessage($sender, "{$args[1]} không phải là người chơi trên đảo của bạn!");
                                        }
                                    }
                                    else {
                                        $this->sendMessage($sender, "Sử Dụng: /island remove <player>");
                                    }
                                }
                                else {
                                    $this->sendMessage($sender, "Bạn phải là chủ sở hữu đảo để làm điều này!");
                                }
                            }
                            else {
                                $this->sendMessage($sender, "Bạn phải ở trong một hòn đảo để rời khỏi nó!!");
                            }
                        }
                        break;
                    case "tp":
                        if(isset($args[1])) {
                            $island = $this->plugin->getIslandManager()->getIslandByOwner($args[1]);
                            if($island instanceof Island) {
                                if($island->isLocked()) {
                                    $this->sendMessage($sender, "Hòn đảo này đã bị khóa, bạn không thể tham gia!");
                                }
                                else {
                                    $sender->teleport(new Position(15, 7, 10, $this->plugin->getServer()->getLevelByName($island->getIdentifier())));
                                    $this->sendMessage($sender, "Bạn đã tham gia đảo thành công.");
                                }
                            }
                            else {
                                $this->sendMessage($sender, "Ít nhất một thành viên đảo phải hoạt động nếu bạn muốn nhìn thấy hòn đảo!");
                            }
                        }
                        else {
                            $this->sendMessage($sender, "Sử Dụng: /island tp <owner name>");
                        }
                        break;
                    case "reset":
                        $config = $this->plugin->getSkyBlockManager()->getPlayerConfig($sender);
                        if(empty($config->get("island"))) {
                            $this->sendMessage($sender, "Bạn phải ở trong một hòn đảo để thiết lập lại nó!");
                        }
                        else {
                            $island = $this->plugin->getIslandManager()->getOnlineIsland($config->get("island"));
                            if($island instanceof Island) {
                                if($island->getOwnerName() == strtolower($sender->getName())) {
                                    $reset = $this->plugin->getResetHandler()->getResetTimer($sender);
                                    if($reset instanceof Reset) {
                                        $minutes = Utils::printSeconds($reset->getTime());
                                        $this->sendMessage($sender, "Bạn sẽ có thể thiết lập lại hòn đảo của bạn một lần nữa trong {$minutes} minutes");
                                    }
                                    else {
                                        foreach($island->getAllMembers() as $member) {
                                            $memberConfig = new Config($this->plugin->getDataFolder() . "users" . DIRECTORY_SEPARATOR . $member . ".json", Config::JSON);
                                            $memberConfig->set("island", "");
                                            $memberConfig->save();
                                        }
                                        $generator = $island->getGenerator();
                                        $this->plugin->getIslandManager()->removeIsland($island);
                                        $this->plugin->getResetHandler()->addResetTimer($sender);
                                        $this->plugin->getSkyBlockManager()->generateIsland($sender, $generator);
                                        $this->sendMessage($sender, "Bạn đặt lại đảo thành công!");
                                    }
                                }
                                else {
                                    $this->sendMessage($sender, "Bạn phải là chủ sở hữu để thiết lập lại hòn đảo!");
                                }
                            }
                            else {
                                $this->sendMessage($sender, "Bạn phải ở trong một hòn đảo để thiết lập lại nó!!");
                            }
                        }
                        break;
                    case "info":
                        $commands = [
                            "info" => "§6-=-§aHiển thị thông tin lệnh skyblock §6-=-§AMINEFOGE§6-=-",
                            "play" => "Tạo một hòn đảo mới",
                            "join" => "Dịch chuyển bạn đến đảo của bạn",
                            "expel" => "Đá ai đó từ đảo của bạn",
                            "lock" => "Lock / unlock hòn đảo của bạn, sau đó không ai / mọi người sẽ có thể tham gia",
                            "sethome" => "Đặt nhà đảo của bạn",
                            "home" => "Dịch chuyển bạn đến đảo nhà của bạn",
                            "members" => "Hiển thị tất cả các thành viên trên đảo của bạn",
                            "tp <ownerName>" => "Dịch chuyển bạn đến một hòn đảo không phải của bạn",
                            "addhelper" => "Mời một người chơi trở thành thành viên của hòn đảo của bạn",
                            "accept/reject <sender name>" => "Chấp nhận / từ chối lời mời",
                            "leave" => "Rời khỏi hòn đảo của bạn",
                            "remove" => "Hủy bỏ hòn đảo của bạn",
                            "makeleader" => "Chuyển quyền sở hữu đảo",
                            "teamchat" => "Thay đổi cuộc trò chuyện của bạn thành cuộc trò chuyện trên đảo của bạn"
                        ];
                        foreach($commands as $command => $description) {
                            $sender->sendMessage(TextFormat::RED . "/island {$command}: " . TextFormat::YELLOW . $description);
                        }
                        break;
                    case "teamchat":
                        if($this->plugin->getChatHandler()->isInChat($sender)) {
                            $this->plugin->getChatHandler()->removePlayerFromChat($sender);
                            $this->sendMessage($sender, "Bạn đã rời khỏi nhóm trò chuyện thành công!");
                        }
                        else {
                            $config = $this->plugin->getSkyBlockManager()->getPlayerConfig($sender);
                            if(empty($config->get("island"))) {
                                $this->sendMessage($sender, "Bạn phải ở trong một hòn đảo để sử dụng lệnh này!");
                            }
                            else {
                                $island = $this->plugin->getIslandManager()->getOnlineIsland($config->get("island"));
                                if($island instanceof Island) {
                                    $this->plugin->getChatHandler()->addPlayerToChat($sender, $island);
                                    $this->sendMessage($sender, "Bạn đã tham gia phòng trò chuyện nhóm của bạn");
                                }
                                else {
                                    $this->sendMessage($sender, "Bạn phải ở trong một hòn đảo để sử dụng lệnh này !!");
                                }
                            }
                        }
                        break;
                    default:
                        $this->sendMessage($sender, "§aSử Dụng /island info nếu bạn không biết cách sử dụng lệnh!!");
                        break;
                }
            }
            else {
                $this->sendMessage($sender, "Sử Dụng /island info nếu bạn không biết cách sử dụng lệnh!");
            }
        }
        else {
            $sender->sendMessage("Xin vui lòng, chạy lệnh này trong trò chơi");
        }
    }

}