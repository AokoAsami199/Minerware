<?php

/**
 *  ███╗   ███╗██╗███╗   ██╗███████╗██████╗ ██╗    ██╗ █████╗ ██████╗ ███████╗
 *  ████╗ ████║██║████╗  ██║██╔════╝██╔══██╗██║    ██║██╔══██╗██╔══██╗██╔════╝
 *  ██╔████╔██║██║██╔██╗ ██║█████╗  ██████╔╝██║ █╗ ██║███████║██████╔╝█████╗
 *  ██║╚██╔╝██║██║██║╚██╗██║██╔══╝  ██╔══██╗██║███╗██║██╔══██║██╔══██╗██╔══╝
 *  ██║ ╚═╝ ██║██║██║ ╚████║███████╗██║  ██║╚███╔███╔╝██║  ██║██║  ██║███████╗
 *  ╚═╝     ╚═╝╚═╝╚═╝  ╚═══╝╚══════╝╚═╝  ╚═╝ ╚══╝╚══╝ ╚═╝  ╚═╝╚═╝  ╚═╝╚══════╝
 *
 * This is a private project, your not allow to redistribute nor resell it.
 * The only ones with that power are this project's contributors.
 *
 * Copyright 2021 © Minerware
 */

declare(strict_types=1);

namespace minerware\command\commands;

use minerware\Minerware;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat as T;

final class MinerwareCommand extends Command {
    
    public function __construct(private Minerware $plugin) {
        parent::__construct("minerware", "Minerware main command.");
        $this->setPermission("minerware.command");
    }
    
    public function execute(CommandSender $sender, string $commandLabel, array $args): void {
        if (!$sender instanceof Player) {
            $sender->sendMessage(T::RED . "In-game only command.");
            return;
        }
        
        if (!$this->testPermission($sender)) {
            return;
        }
        
        if (!isset($args[0])) {
            $sender->sendMessage(T::RED . "Command not found! use " . T::WHITE . "/minerware help");
            return;
        }
        
        switch ($args[0]) {
            case "create":
                $sender->sendMessage(T::RED . "This function is under development, please wait for it!");
            break;

            case 'credits':
                $sender->sendMessage(
                    "§a---- §6Minerware §bCredits §a----"."\n"."\n".
                    "§eAuthors: §7JustJ0rd4n, IvanCraft623, TheModDev"."\n".
                    "§eStatus: §7Private"
                );
            break;

            default:
                $sender->sendMessage("SOON");
            break;
        }
    }
}
