<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */

$arResult["menuId"] = "group_panel_menu_".$arResult["Group"]["ID"];

$firstMenuItemCode = false;

/** @see \CMainInterfaceButtons::getUserOptions */
$userOptions = \CUserOptions::getOption("ui", $arResult["menuId"]);

if (
	is_array($userOptions)
	&& isset($userOptions["settings"])
	&& !empty($userOptions["settings"])
)
{
	$userOptionsSettings = json_decode($userOptions["settings"], true);
	if (
		is_array($userOptionsSettings)
		&& !empty($userOptionsSettings)
	)
	{
		$menuItems = array_keys($userOptionsSettings);
		$code = $menuItems[0];
		if ($code == $arResult["menuId"].'_chat')
		{
			$code = $menuItems[1];
		}

		$firstMenuItem = preg_match('/^'.$arResult["menuId"].'_(.*)$/i', $code, $matches);
		if (!empty($matches))
		{
			$firstMenuItemCode = $matches[1];
		}
	}

	$arResult["Urls"]["General"] = CComponentEngine::MakePathFromTemplate($arParams["PATH_TO_GROUP_GENERAL"], array("group_id" => $arResult["Group"]["ID"]));
}

if (
	$arParams["PAGE_ID"] == 'group'
	&& $firstMenuItemCode
	&& $firstMenuItemCode != 'general'
	&& isset($arResult["Urls"][$firstMenuItemCode])
)
{
	LocalRedirect($arResult["Urls"][$firstMenuItemCode]);
}

if ($this->__component->__parent && $this->__component->__parent->arResult && array_key_exists("PATH_TO_MESSAGE_TO_GROUP", $this->__component->__parent->arResult))
	$arParams["PATH_TO_MESSAGE_TO_GROUP"] = $this->__component->__parent->arResult["PATH_TO_MESSAGE_TO_GROUP"];
if ($this->__component->__parent && $this->__component->__parent->arResult && array_key_exists("PATH_TO_GROUP_FEATURES", $this->__component->__parent->arResult))
	$arParams["PATH_TO_GROUP_FEATURES"] = $this->__component->__parent->arResult["PATH_TO_GROUP_FEATURES"];
if ($this->__component->__parent && $this->__component->__parent->arResult && array_key_exists("PATH_TO_GROUP_DELETE", $this->__component->__parent->arResult))
	$arParams["PATH_TO_GROUP_DELETE"] = $this->__component->__parent->arResult["PATH_TO_GROUP_DELETE"];
if ($this->__component->__parent && $this->__component->__parent->arResult && array_key_exists("PATH_TO_GROUP_REQUESTS_OUT", $this->__component->__parent->arResult))
	$arParams["PATH_TO_GROUP_REQUESTS_OUT"] = $this->__component->__parent->arResult["PATH_TO_GROUP_REQUESTS_OUT"];
if ($this->__component->__parent && $this->__component->__parent->arResult && array_key_exists("PATH_TO_USER_REQUEST_GROUP", $this->__component->__parent->arResult))
	$arParams["PATH_TO_USER_REQUEST_GROUP"] = $this->__component->__parent->arResult["PATH_TO_USER_REQUEST_GROUP"];
if ($this->__component->__parent && $this->__component->__parent->arResult && array_key_exists("PATH_TO_USER_LEAVE_GROUP", $this->__component->__parent->arResult))
	$arParams["PATH_TO_USER_LEAVE_GROUP"] = $this->__component->__parent->arResult["PATH_TO_USER_LEAVE_GROUP"];
if ($this->__component->__parent && $this->__component->__parent->arResult && array_key_exists("PATH_TO_GROUP_SUBSCRIBE", $this->__component->__parent->arResult))
	$arParams["PATH_TO_GROUP_SUBSCRIBE"] = $this->__component->__parent->arResult["PATH_TO_GROUP_SUBSCRIBE"];

if ($this->__component->__parent && $this->__component->__parent->arParams && array_key_exists("GROUP_USE_BAN", $this->__component->__parent->arParams))
	$arParams["GROUP_USE_BAN"] = $this->__component->__parent->arParams["GROUP_USE_BAN"];
$arParams["GROUP_USE_BAN"] = $arParams["GROUP_USE_BAN"] != "N" ? "Y" : "N";	

if (intval($arResult["Group"]["IMAGE_ID"]) <= 0)
{
	$arResult["Group"]["IMAGE_ID"] = COption::GetOptionInt("socialnetwork", "default_group_picture", false, SITE_ID);
}

$arResult["Group"]["IMAGE_FILE"] = array("src" => "");

if (intval($arResult["Group"]["IMAGE_ID"]) > 0)
{
	$arFileTmp = false;
	$imageFile = CFile::GetFileArray($arResult["Group"]["IMAGE_ID"]);
	if ($imageFile !== false)
	{
		$arFileTmp = CFile::ResizeImageGet(
			$imageFile,
			array("width" => 100, "height" => 100),
			BX_RESIZE_IMAGE_EXACT,
			true
		);
	}

	if($arFileTmp && array_key_exists("src", $arFileTmp))
	{
		$arResult["Group"]["IMAGE_FILE"] = $arFileTmp;
	}
}

$arResult["Urls"]["MessageToGroup"] = CComponentEngine::MakePathFromTemplate($arParams["PATH_TO_MESSAGE_TO_GROUP"], array("group_id" => $arResult["Group"]["ID"]));
$arResult["Urls"]["Features"] = CComponentEngine::MakePathFromTemplate($arParams["PATH_TO_GROUP_FEATURES"], array("group_id" => $arResult["Group"]["ID"]));
$arResult["Urls"]["Delete"] = CComponentEngine::MakePathFromTemplate($arParams["PATH_TO_GROUP_DELETE"], array("group_id" => $arResult["Group"]["ID"]));
$arResult["Urls"]["GroupRequestsOut"] = CComponentEngine::MakePathFromTemplate($arParams["PATH_TO_GROUP_REQUESTS_OUT"], array("group_id" => $arResult["Group"]["ID"]));
$arResult["Urls"]["UserRequestGroup"] = CComponentEngine::MakePathFromTemplate($arParams["PATH_TO_USER_REQUEST_GROUP"], array("group_id" => $arResult["Group"]["ID"]));
$arResult["Urls"]["UserLeaveGroup"] = CComponentEngine::MakePathFromTemplate($arParams["PATH_TO_USER_LEAVE_GROUP"], array("group_id" => $arResult["Group"]["ID"]));
$arResult["Urls"]["Subscribe"] = CComponentEngine::MakePathFromTemplate($arParams["PATH_TO_GROUP_SUBSCRIBE"], array("group_id" => $arResult["Group"]["ID"]));

$arResult["CanView"]["chat"] = (array_key_exists("chat", $arResult["ActiveFeatures"]));
$arResult["Title"]["chat"] = ((array_key_exists("chat", $arResult["ActiveFeatures"]) && StrLen($arResult["ActiveFeatures"]["chat"]) > 0) ? $arResult["ActiveFeatures"]["search"] : GetMessage("SONET_UM_CHAT"));
$arResult["OnClicks"] = array(
	"chat" => "BXIM.openMessenger('sg".$arResult["Group"]["ID"]."');"
);

\Bitrix\Socialnetwork\WorkgroupViewTable::set(array(
	'USER_ID' => $USER->getId(),
	'GROUP_ID' => $arResult["Group"]["ID"]
));