<?php

namespace Terpz710\AutoClearLagPE;

use pocketmine\plugin\PluginBase;

use Terpz710\AutoClearLagPE\Task\ClearLagTask;

class Main extends PluginBase
{
    private static Main $main;

    public function onEnable(): void
    {
        self::$main = $this;
        $this->saveDefaultConfig();
        $this->getScheduler()->scheduleRepeatingTask(new ClearLagTask($this->getConfig()->get("time")), 20);
    }

    public static function getInstance(): Main
    {
        return self::$main;
    }
}