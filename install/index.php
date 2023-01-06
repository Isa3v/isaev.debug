<?php

use Bitrix\Main\ModuleManager;
use Bitrix\Main\EventManager;
use Bitrix\Main\Application;
use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Config\Option;
use Bitrix\Main\IO\Directory;

class isaev_debug extends CModule
{
    public $MODULE_ID = "isaev.debug";
    public $MODULE_VERSION;
    public $MODULE_VERSION_DATE;
    public $MODULE_NAME;
    public $MODULE_DESCRIPTION;

    public function __construct()
    {
        $arModuleVersion = array();
        include(dirname(__FILE__) . "/version.php");
        $this->MODULE_VERSION      = $arModuleVersion["VERSION"];
        $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        $this->MODULE_NAME         = 'Debug';
        $this->MODULE_DESCRIPTION  = 'Debug';
        $this->PARTNER_NAME        = 'Исаев Данил';
        $this->PARTNER_URI         = "https://isaev.digital/";
    }

    public function InstallEvents()
    {
        $eventManager = EventManager::getInstance();
        $eventManager->registerEventHandlerCompatible("main", "OnBeforeProlog", "isaev.debug");
    }

    public function UnInstallEvents()
    {
        $eventManager = EventManager::getInstance();
        $eventManager->unRegisterEventHandler("main", "OnBeforeProlog", "isaev.debug");
    }


    public function DoInstall()
    {
        ModuleManager::registerModule($this->MODULE_ID);
        Loader::includeModule($this->MODULE_ID);
        $this->InstallEvents();
    
        return true;
    }

    public function DoUninstall()
    {   
        Loader::includeModule($this->MODULE_ID);
        $this->UnInstallEvents(); // Отмена событий
        ModuleManager::unRegisterModule($this->MODULE_ID);
        return true;
    }
}
