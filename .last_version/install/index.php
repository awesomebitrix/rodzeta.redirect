<?php
/***********************************************************************************************
 * rodzeta.redirect - SEO redirects module
 * Copyright 2016 Semenov Roman
 * MIT License
 ************************************************************************************************/

defined('B_PROLOG_INCLUDED') and (B_PROLOG_INCLUDED === true) or die();

use Bitrix\Main\Application;
use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;

Loc::loadMessages(__FILE__);

class rodzeta_redirect extends CModule {

	var $MODULE_ID = "rodzeta.redirect";

	public $MODULE_VERSION;
	public $MODULE_VERSION_DATE;
	public $MODULE_NAME;
	public $MODULE_DESCRIPTION;
	public $MODULE_GROUP_RIGHTS;
	public $PARTNER_NAME;
	public $PARTNER_URI;

	//public $MODULE_GROUP_RIGHTS = 'N';
	//public $NEED_MAIN_VERSION = '';
	//public $NEED_MODULES = array();

	function __construct() {
		//$this->MODULE_ID = "rodzeta.redirect";

		$arModuleVersion = array();
		include __DIR__ . "/version.php";

		if (!empty($arModuleVersion["VERSION"])) {
			$this->MODULE_VERSION = $arModuleVersion["VERSION"];
			$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
		}

		$this->MODULE_NAME = Loc::getMessage("RODZETA_REDIRECT_MODULE_NAME");
		$this->MODULE_DESCRIPTION = Loc::getMessage("RODZETA_REDIRECT_MODULE_DESCRIPTION");
		$this->MODULE_GROUP_RIGHTS = "N";

		$this->PARTNER_NAME = "Rodzeta";
		$this->PARTNER_URI = "http://rodzeta.ru/";
	}

	function doInstall() {
		ModuleManager::registerModule($this->MODULE_ID);
		RegisterModuleDependences("main", "OnPageStart", $this->MODULE_ID);
		//RegisterModuleDependences("main", "OnPageStart", $this->MODULE_ID, "\Rodzeta\Redirects\EventHandlers", "OnPageStart", 1);


		/*
		$APPLICATION->IncludeAdminFile(
			"��������� ������ " . $this->MODULE_ID,
			$_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/" . $this->MODULE_ID . "/install/step.php"
		);
		*/
	}

	function doUninstall() {
		//UnRegisterModuleDependences("main", "OnPageStart", $this->MODULE_ID, "\Rodzeta\Redirects\EventHandlers", "OnPageStart");
		UnRegisterModuleDependences("main", "OnPageStart", $this->MODULE_ID);
		ModuleManager::unregisterModule($this->MODULE_ID);

		/*
    $APPLICATION->IncludeAdminFile(
    	"������������� ������ " . $this->MODULE_ID,
    	$_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/" . $this->MODULE_ID . "/install/unstep.php"
    );
    */
	}

}